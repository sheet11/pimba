<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barang = Barang::count();
        $peminjam = Peminjam::count();
        $user = User::count();
        return view('dashboard',compact('barang','peminjam','user'));
    }
}
