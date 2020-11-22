@extends('layouts.master-warga')

@section('title','Dashboard Warga')

@section('content')
<div class="row text-center">
    <div class="col-md-4 col-sm-4 mb-5">
        <div class="card">
            <h5 class="card-header">DATA WARGA</h5>
            <div class="card-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{ url('warga') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-5">
        <div class="card">
            <h5 class="card-header">SURAT PENGANTAR</h5>
            <div class="card-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-5">
        <div class="card">
            <h5 class="card-header">AGENDA</h5>
            <div class="card-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-2">
        <div class="card">
            <h5 class="card-header">BERITA</h5>
            <div class="card-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-2">
        <div class="card">
            <h5 class="card-header">KEUANGAN</h5>
            <div class="card-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-2">
        <div class="card">
            <h5 class="card-header">INVENTARIS</h5>
            <div class="card-body">
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
</div>
@endsection