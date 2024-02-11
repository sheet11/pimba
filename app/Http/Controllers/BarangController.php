<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index(){
        $barangs = Barang::orderBy('created_at', 'desc')
                                ->get();
        return view('barang.index',[
            'barangs' =>  $barangs,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_barang'      =>  'required',
            'kategori_barang'     =>  'required',
            'kondisi_barang'      =>  'required',
            'merk_barang'     =>  'required',
            'jumlah_barang'      =>  'numeric|required',

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
        $simpan = Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'kondisi_barang' => $request->kondisi_barang,
            'merk_barang' => $request->merk_barang,
            'jumlah_barang' => $request->jumlah_barang,

        ]);

        if ($simpan) {
            return response()->json([
                'text' => 'Berhasil, data barang berhasil disimpan',
                'url' => url('/data_barang/'),
            ]);
        } else {
            return response()->json(['text' => 'Gagal, data barang gagal disimpan']);
        }
    }


    public function edit(Barang $barang){
        return $barang;
    }

    public function update(Request $request){
        $rules = [
            'nama_barang'      =>  'required',
            'kategori_barang'     =>  'required',
            'kondisi_barang'      =>  'required',
            'merk_barang'     =>  'required',
            'jumlah_barang'      =>  'numeric|required',

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

        $barang = Barang::where('id',$request->barang_id)->first();

        $update = $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'kondisi_barang' => $request->kondisi_barang,
            'merk_barang' => $request->merk_barang,
            'jumlah_barang' => $request->jumlah_barang,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Berhasil, data barang berhasil diupdate',
                'url'   =>  url('/data_barang/'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data barang gagal diupdate']);
        }
    }

    public function delete(Barang $barang){
        $delete = $barang->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Berhasil, data barang dihapus',
                'url'   =>  url('/data_barang/'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data barang gagal dihapus']);
        }
    }
}
