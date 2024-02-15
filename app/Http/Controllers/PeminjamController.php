<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Barang;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        $peminjams = Peminjam::orderBy('created_at', 'desc')
                                ->get();
        return view('peminjam.index',[
            'peminjams' =>  $peminjams,
            'barangs' =>  $barangs,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_peminjam'      =>  'required',
            'unit_peminjaman'     =>  'required',
            'tanggal_peminjaman'      =>  'required',
            // 'tanggal_pengembalian'     =>  'required',
            'lama_minjam'      =>  'required',
            'status_minjam'      =>  'required',
            'barang_id'      =>  'required',

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
        $simpan = Peminjam::create([
            'nama_peminjam' => $request->nama_peminjam,
            'unit_peminjaman' => $request->unit_peminjaman,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            // 'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'lama_minjam' => $request->lama_minjam,
            'status_minjam' => $request->status_minjam,
            'barang_id' => $request->barang_id,

        ]);

        if ($simpan) {
            return response()->json([
                'text' => 'Berhasil, data peminjam berhasil disimpan',
                'url' => url('/data_peminjam/'),
            ]);
        } else {
            return response()->json(['text' => 'Gagal, data peminjam gagal disimpan']);
        }
    }


    public function edit(Peminjam $peminjam){
        return $peminjam;
    }

    public function update(Request $request){
        $rules = [
            'nama_peminjam'      =>  'required',
            'unit_peminjaman'     =>  'required',
            'tanggal_peminjaman'      =>  'required',
            // 'tanggal_pengembalian'     =>  'required',
            'lama_minjam'      =>  'required',
            'status_minjam'      =>  'required',
            'barang_id'      =>  'required',


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

        $peminjam = Peminjam::where('id',$request->peminjam_id)->first();

        $update = $peminjam->update([
            'nama_peminjam' => $request->nama_peminjam,
            'unit_peminjaman' => $request->unit_peminjaman,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            // 'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'lama_minjam' => $request->lama_minjam,
            'status_minjam' => $request->status_minjam,
            'barang_id' => $request->barang_id,

        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Berhasil, data peminjam berhasil diupdate',
                'url'   =>  url('/data_peminjam/'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data peminjam gagal diupdate']);
        }
    }

    public function pengembalian(Request $request){
        $rules = [

            'tanggal_pengembalian'     =>  'required',

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

        $peminjam = Peminjam::where('id',$request->pengembalian_id)->first();

        $update = $peminjam->update([

            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Berhasil, data peminjam berhasil diupdate',
                'url'   =>  url('/data_peminjam/'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data peminjam gagal diupdate']);
        }
    }

    public function delete(Peminjam $peminjam){
        $delete = $peminjam->delete();

        if ($delete) {
            return response()->json([
                'text'  =>  'Berhasil, data peminjam dihapus',
                'url'   =>  url('/data_peminjam/'),
            ]);
        }else {
            return response()->json(['text' =>  'Gagal, data peminjam gagal dihapus']);
        }
    }

    public function download(){
        $peminjams = Peminjam::with(['barang'])->get();
        $hari = date('d');
        $bulan= date('m');
        $tahun = date('Y');

        $tanggal = [
            'hari' => $hari,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        $pdf = Pdf::loadView('peminjam.download',[
            'peminjams' =>  $peminjams,
            'tanggal' =>  $tanggal
        ]);
        $pdf->setPaper('a4','portrait');
        return $pdf->stream('laporan_peminjaman' . \Carbon\Carbon::now() . '.pdf');
    }
}
