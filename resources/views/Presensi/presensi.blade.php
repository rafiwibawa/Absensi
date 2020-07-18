@extends('layouts.header')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Presensi Per-{{$pil}}</h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
        data-target="#exampleModal">
        <i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan
    </button>
    </div>
    
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 "> 
            <div class="modal-body">
                <form class="form-inline" action="/presensi" method="POST">
                    @csrf
                    <div class="form-group  mb-2">
                      <input type="date" class="form-control" @error('date') is-invalid @enderror  
                      value="{{ old('date') }}" required id="date" name="date">
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group  mb-2">
                        <select class="form-control " id="pilihan" name="pilihan">
                        <option value="Hari">Hari</option>
                        <option value="Bulan">Bulan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
            </div>
        </div>
        <div class="col-xl-12 "> 
            <div class="form-group">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Hari</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                        </tr>
                    </thead>
                    <tbody>@php $i=1 @endphp
                    @foreach ($absen as $absen)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$absen->Detail_absensi->absensi['name']}}</td>
                            <td>{{$absen->Detail_absensi->absensi->Jabatan['jabatan']}}</td>
                            <td>{{$hari[date('l',strtotime($absen->time_in))]}}</td>
                            <td>{{$absen->time_in}}</td>
                            <td>{{$absen->time_out}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>      
    @include('presensi.modal')
    @endsection

    @push('script')
        @include('Presensi.script')
    @endpush
   