@extends('layouts.header')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jabatan</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#exampleModal">
            <i class="fas fa-download fa-sm text-white-50"></i>Tambah Pegawai
        </button>
    </div>
    @if ($message = Session::get('status'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @elseif ($message = Session::get('edit'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @elseif ($message = Session::get('hapus'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 ">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jabatan</th>
                        <th>Hak Akses</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>@php $i=1 @endphp
                    @foreach ($jabatan as $jabatan)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$jabatan->jabatan}}</td>
                        <td>{{$jabatan->role['namaRule']}}</td>
                        <td>{{$jabatan->created_at}}</td>
                        <td>{{$jabatan->updated_at}}</td>
                        <td>
                            <button type="button" data-id="{{$jabatan->id}}" data-jabatan="{{$jabatan->jabatan}}" data-toggle="modal" data-target="#edit"
                                class="btn btn-warning btn-circle">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a title="Hapus Data" href="jabatan/hapus/{{$jabatan->id}}"
                                onClick="return confirm('Yakin Ingin menghapus data?')"
                                class="btn btn-danger btn-circle"><span class="fas fa-trash"></span></a>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
    @include('Jabatan.modal')
    @push('script')
    @include('Jabatan.script')
    @endpush
