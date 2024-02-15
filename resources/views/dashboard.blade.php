@extends('layouts.backend')
@section('subTitle','Dashboard')
@section('page','Dashboard')
@section('subPage','Semua Data')
@section('user-login')
{{ Auth::user()->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="panel" style="margin-bottom:20px;">
                <header class="bg-primary" style="color: #ffffff;background-color: #3c8dbc;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-home"></i>&nbsp;Dashboard
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row" style="margin-right:-15px; margin-left:-15px;">
                        <div class="col-md-12">Selamat datang <strong> {{ Auth::user()->name }} </strong> di halaman Dashboard Operator <b> Peminjaman Barang Poltekkes Kemenkes Bengkulu </b></div>
                    </div>
                </div>
            </section>

            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #3c8dbc;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Informasi Aplikasi
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    {{--  <div class="row">
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-aqua" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>  </h3>

                                <p>Proposal Penelitian</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-file-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-red" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3></h3>

                                <p>Proposal Penelitian Tahun Ini</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-file-pdf-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-yellow" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3></h3>

                                <p>Proposal Pengabdian</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-wpforms"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-green" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3></h3>

                                <p>Proposal Pengabdian Tahun Ini</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-file-excel-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Barang</span>
                                    <span class="info-box-number">{{ $barang }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-list"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Peminjam</span>
                                    <span class="info-box-number">{{ $peminjam }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah User</span>
                                    <span class="info-box-number">{{ $user }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-check-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Nama User Login</span>
                                    <span class="info-box-number">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
