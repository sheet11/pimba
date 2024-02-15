@extends('layouts.backend')
@section('subTitle','Data Peminjam')
@section('page','Data Peminjam')
@section('subPage','Semua Data')
@section('user-login')
{{ Auth::user()->name }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manajemen Data Peminjam</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa fa-plus"></i>&nbsp;Tambah Data
                    </button>
                    <a target="_blank" href="{{ route('peminjam.download') }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-download"></i>&nbsp; Download Data Peminjaman</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="fa fa-success-circle"></i><strong>Berhasil :</strong> {{ $message }}
                    </div>
                @endif
                <table class="table table-striped table-bordered" id="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th style="vertical-align:middle">No</th>
                            <th style="vertical-align:middle">Nama Peminjam</th>
                            <th style="vertical-align:middle">Barang</th>
                            <th style="vertical-align:middle">Unit Peminjam</th>
                            <th style="vertical-align:middle">Tanggal Peminjam</th>
                            <th style="vertical-align:middle">Tanggal Pengembalian</th>
                            <th style="vertical-align:middle">Lama Minjam</th>
                            <th style="vertical-align:middle">Status Minjam</th>
                            <th style="vertical-align:middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($peminjams as $index => $peminjam)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $peminjam->nama_peminjam }}</td>
                                <td>{{ $peminjam->barang->nama_barang }}</td>
                                <td>{{ $peminjam->unit_peminjaman }}</td>
                                <td>{{ $peminjam->tanggal_peminjaman }}</td>
                                <td>
                                    @if ($peminjam->tanggal_pengembalian == null)
                                        <small class="label label-danger">belum dikembalikan</small>
                                    @else
                                        {{ $peminjam->tanggal_pengembalian }}
                                    @endif
                                </td>
                                <td>{{ $peminjam->lama_minjam }}</td>
                                <td>{{ $peminjam->status_minjam }}</td>
                                <td>
                                    <table>
                                        <tr>
                                            @if ($peminjam->tanggal_pengembalian == null)
                                                <td>
                                                    <a onclick="pengembalianPeminjam({{ $peminjam->id }})" class="btn btn-success btn-sm btn-flat"><i class="fa fa-pengembalian"></i>&nbsp; Pengembalian</a>
                                                </td>
                                            @endif
                                            <td>
                                                <a onclick="editPeminjam({{ $peminjam->id }})" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('peminjam.delete',[$peminjam->id]) }}" method="POST" class="form">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm btnSubmit"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('peminjam.partials.modal_add')
        </div>
        @include('peminjam.partials.modal_edit')
    </div>
    @include('peminjam.partials.modal_pengembalian')

</div>
@endsection

@include('peminjam.partials.js')
