@extends('layouts.master-warga')

@section('title','Dashboard Warga')

@section('content')
<div class="row text-center">
    <div class="col-md-4 col-sm-4 mb-5">
        <div class="card">
            <h5 class="card-header">DATA WARGA</h5>
            <div class="card-body">
                <p class="card-text">Informasi mengenai data warga yang berada pada RT 42</p>
                <a href="{{ url('warga') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-5">
        <div class="card">
            <h5 class="card-header">SURAT PENGANTAR</h5>
            <div class="card-body">
                <p class="card-text">Mengajukan surat pengantar cukup melalui website dengan mengisi form yang tersedia</p>
                <a href="{{ url('suratpengantar') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-5">
        <div class="card">
            <h5 class="card-header">AGENDA</h5>
            <div class="card-body">
                <p class="card-text">informasi tentang kegiatan yang diadakan di lingkungan Rt 42</p>
                <a href="{{ url('agenda') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-2">
        <div class="card">
            <h5 class="card-header">BERITA</h5>
            <div class="card-body">
                <p class="card-text">Menampikan berita dan informasi terkini. Sebagai warga anda juga bisa membagikan berita</p>
                <a href="{{ url('berita') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-2">
        <div class="card">
            <h5 class="card-header">KEUANGAN</h5>
            <div class="card-body">
                <p class="card-text">Informasi mengenai pemasukan dan pengeluaran data keuangan warga RT 42</p>
                <a href="{{ url('keuangan') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-2">
        <div class="card">
            <h5 class="card-header">INVENTARIS</h5>
            <div class="card-body">
                <p class="card-text">Barang-barang inventaris dapat dipergunakan oleh seluruh warga sesuai kebutuhan</p>
                <a href="{{ url('inventaris') }}" class="btn btn-primary"><i class="fa fa-eye"></i> Tampil</a>
            </div>
        </div>
    </div>
</div>
@endsection