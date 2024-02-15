@extends('layouts.backend')
@section('subTitle','Data User')
@section('page','Data User')
@section('subPage','Semua Data')
@section('user-login')
{{ Auth::user()->name }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manajemen Data User</h3>
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
                            <th style="vertical-align:middle">Name</th>
                            <th style="vertical-align:middle">Email</th>
                            {{--  <th style="vertical-align:middle">Tambah Foto</th>
                            <th style="vertical-align:middle">Tambah File</th>  --}}
                            <th style="vertical-align:middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                {{--  <td>
                                     <img src="{{ Storage::url($user->tambah_foto) }}" height="100" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('user.downloadFile',[$user->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-download"></i>&nbsp; Download</a>
                                </td>  --}}
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <a onclick="editUser({{ $user->id }})" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('user.delete',[$user->id]) }}" method="POST" class="form">
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
            @include('user.partials.modal_add')
        </div>
        @include('user.partials.modal_edit')
    </div>
</div>
@endsection

@include('user.partials.js')
