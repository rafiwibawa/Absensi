@extends('layouts.header')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cetak ID-CARD</h1>
        {{-- <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-download fa-sm text-white-50"></i>Tambah Pegawai
          </button> --}}
    </div>

    <div class="row">
        <div class="col-xl-12 ">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Barcode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>@php $i=1 @endphp
                    @foreach ($user as $user)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->Jabatan['jabatan']}}</td>
                        <td>{{$user->barcode}}
                            @php
                            
                            @endphp
                        </td>
                        <td>
                            <a title="Hapus Data" href="cetak/id_card/{{$user->id}}"
                                onClick="return confirm('Yakin Ingin Print Id-Card?')"
                                class="btn btn-primary btn-circle"><span class="fas fa-print"></span></a>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
    {{-- @include('ID_Card.modal') --}}

    @push('script')
    @include('ID_Card.script')
    @endpush
