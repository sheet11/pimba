<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at', 'desc')
                                ->get();
        return view('user.index',[
            'users' =>  $users,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'      =>  'required',
            'email'     =>  'required',
            'password'      =>  'required',

            //numeric itu harus angka dan required itu harus di isi
        ];
        $text = [
            'required'              => 'Kolom :attribute harus diisi.',
            'numeric'               => 'Kolom :attribute harus berupa angka.',
            'unique'                => ':attribute sudah digunakan.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }
        // Buat entri baru
        $simpan = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

            // kalau passwor harus dikasih bcrypt untuk tidak menampilkan isi password di databes

        ]);

        if ($simpan) {
            return response()->json([
                'text' => 'Berhasil, data user berhasil disimpan',
                'url' => url('/data_user/'),
            ]);
        } else {
            return response()->json(['text' => 'Gagal, data user gagal disimpan']);
        }
    }


    public function edit(User $user){
        return $user;
    }

    public function update(Request $request){
        $rules = [
            'name'      =>  'required',
            'email'     =>  'required',
            'password'      =>  'required',

            //numeric itu harus angka dan required itu harus di isi
        ];
        $text = [
            'required'              => 'Kolom :attribute harus diisi.',
            'numeric'               => 'Kolom :attribute harus berupa angka.',
            'unique'                => ':attribute sudah digunakan.',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $user = User::where('id',$request->user_id)->first();

        $update = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Berhasil, data user berhasil diupdate',
                'url'   =>  url('/data_user/'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data user gagal diupdate']);
        }
    }

    public function delete(User $user){
        $delete = $user->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Berhasil, data user dihapus',
                'url'   =>  url('/data_user/'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data user gagal dihapus']);
        }
    }
}
