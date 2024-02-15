@extends('layouts.backend')
@section('subTitle','Data Barang')
@section('page','Data Barang')
@section('subPage','Semua Data')
@section('user-login')
{{ Auth::user()->name }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manajemen Data Barang</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa fa-plus"></i>&nbsp;Tambah Data
                    </button>
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
                            <th style="vertical-align:middle">Nama Barang</th>
                            <th style="vertical-align:middle">kategori Barang</th>
                            <th style="vertical-align:middle">Kondisi Barang</th>
                            <th style="vertical-align:middle">Merk Barang</th>
                            <th style="vertical-align:middle">Jumlah Barang</th>
                            <th style="vertical-align:middle">Tambah Foto</th>
                            {{--  <th style="vertical-align:middle">Tambah File</th>  --}}
                            <th style="vertical-align:middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($barangs as $index => $barang)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori_barang }}</td>
                                <td>{{ $barang->kondisi_barang }}</td>
                                <td>{{ $barang->merk_barang }}</td>
                                <td>{{ $barang->jumlah_barang }}</td>
                                <td>
                                    <img src="{{ Storage::url($barang->tambah_foto) }}" height="100" alt="">
                                </td>
                                {{--  <td>
                                    <td>
                                        <a href="{{ route('barang.downloadFile',[$barang->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-download"></i>&nbsp; Download</a>
                                    </td>
                                </td>  --}}
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a onclick="editBarang({{ $barang->id }})" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('barang.delete',[$barang->id]) }}" method="POST" class="form">
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
            @include('barang.partials.modal_add')
        </div>
        @include('barang.partials.modal_edit')
    </div>
</div>
@endsection

@include('barang.partials.js')
