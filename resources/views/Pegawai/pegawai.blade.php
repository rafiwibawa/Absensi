@extends('layouts.header')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pegawai</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-download fa-sm text-white-50"></i>Tambah Pegawai
          </button>
    </div>
    
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 ">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Join Date</th>
                        <th>Email</th>
                        <th>Tempat Tgl lahir</th>
                        <th>Alamat</th>
                        <th>Barcode</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>@php $i=1 @endphp
                    @foreach ($user as $user)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->Jabatan['jabatan']}}</td>
                        <td>{{$user->join_date}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->tempat_lahir}}, {{$user->tgl_lahir}}</td>
                        <td>{{$user->alamat}}</td>
                        <td>{{$user->barcode}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <button type="button" data-id="{{$user->id}}" data-user="{{$user->name}}" data-toggle="modal" data-target="#edit"
                                class="btn btn-warning btn-circle">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a title="Hapus Data" href="jabatan/hapus/{{$user->id}}"
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
    @include('Pegawai.modal')
    @endsection

    
    @push('script')
        @include('Pegawai.script')
    @endpush
