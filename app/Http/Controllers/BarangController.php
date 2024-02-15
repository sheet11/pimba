<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'tambah_foto'     =>   'required|file|mimes:jpeg,png,gif,webp',
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

        $attributes = [
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'kondisi_barang' => $request->kondisi_barang,
            'merk_barang' => $request->merk_barang,
            'jumlah_barang' => $request->jumlah_barang,
        ];

        if ($request->hasFile('tambah_foto') && $request->file('tambah_foto')->isValid()) {
            $file = $request->file('tambah_foto');
            $fileNameFoto = $file->store('tambah_fotos', 'public');
            $attributes['tambah_foto'] = $fileNameFoto;
        }

        if ($request->hasFile('tambah_file') && $request->file('tambah_file')->isValid()) {
            $file = $request->file('tambah_file');
            $fileNameFile = $file->store('tambah_files', 'public');
            $attributes['tambah_file'] = $fileNameFile;
        }


        // Buat entri baru
        $simpan = Barang::insert($attributes);

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
            'tambah_foto'     =>   'file|mimes:jpeg,png,gif,webp',
            // 'tambah_file'     =>  'file|mimes:pdf,doc,docx',

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



        $attributes = [
            'nama_barang' => $request->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'kondisi_barang' => $request->kondisi_barang,
            'merk_barang' => $request->merk_barang,
            'jumlah_barang' => $request->jumlah_barang,
        ];

        if ($request->hasFile('tambah_foto') && $request->file('tambah_foto')->isValid()) {
            $file = $request->file('tambah_foto');
            $fileName = $file->store('tambah_fotos', 'public');
            $attributes['tambah_foto'] = $fileName;
        }

        if ($request->hasFile('tambah_file') && $request->file('tambah_file')->isValid()) {
            $file = $request->file('tambah_file');
            $fileName = $file->store('tambah_files', 'public');
            $attributes['tambah_file'] = $fileName;
        }

        $update = Barang::where('id',$request->barang_id)->update($attributes);

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

    public function downloadFile(Barang $barang){
        if ($barang) {
            $filePath = storage_path("app/public/{$barang->tambah_file}");
            if (Storage::disk('public')->exists("{$barang->tambah_file}")) {
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
