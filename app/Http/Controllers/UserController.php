<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $attributes = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        // if ($request->hasFile('tambah_foto') && $request->file('tambah_foto')->isValid()) {
        //     $file = $request->file('tambah_foto');
        //     $fileNameFoto = $file->store('tambah_fotos', 'public');
        //     $attributes['tambah_foto'] = $fileNameFoto;
        // }

        // if ($request->hasFile('tambah_file') && $request->file('tambah_file')->isValid()) {
        //     $file = $request->file('tambah_file');
        //     $fileNameFile = $file->store('tambah_files', 'public');
        //     $attributes['tambah_file'] = $fileNameFile;
        // }

         // kalau passwor harus dikasih bcrypt untuk tidak menampilkan isi password di databes

        $simpan = User::insert($attributes);

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
            'tambah_foto'     =>   'file|mimes:jpeg,png,gif,webp',
            'tambah_file'     =>  'file|mimes:pdf,doc,docx',

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
            'password' => bcrypt($request->password),
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
    public function downloadFile(User $user){
        if ($user) {
            $filePath = storage_path("app/public/{$user->tambah_file}");
            if (Storage::disk('public')->exists("{$user->tambah_file}")) {
                return response()->download($filePath);
            } else {
                // Handle file not found in storage
                abort(404);
            }
        } else {
            // Handle file record not found in the database
            abort(404);
        }
    }
}
