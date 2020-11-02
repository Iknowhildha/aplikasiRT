@extends('layouts.master-warga')

@section('title', 'Detail Profil')

@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border">
            <h3 class="card-title">About Me</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <strong><i class="fa fa-book margin-r-5"></i> Nomor Kartu Keluarga</strong>

                    <p class="text-muted">
                        {{ $warga->no_kk }}
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Nomor Induk Kependudukan</strong>

                    <p class="text-muted">{{ $warga->nik }}</p>
                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Nama Lengkap</strong>

                    <p class="text-muted">{{ $warga->nama }}</p>
                    <hr>

                    <strong><i class="fa fa-calendar margin-r-5"></i> Tempat Tanggal Lahir</strong>

                    <p class="text-muted">{{ $warga->tempat_lahir }} {{ $warga->tanggal_lahir}}</p>
                </div>

                <div class="col-md-6">
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Agama</strong>

                    <p class="text-muted">{{ $warga->agama }}</p>
                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Jenis Kelamin</strong>

                    <p class="text-muted">{{ $warga->jenis_kelamin }}</p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Nomor HP</strong>

                    <p>{{ $warga->no_hp }}</p>
                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Alamat Lengkap</strong>

                    <p>{{ $warga->alamat }}</p>
                </div>
            </div>


        </div>
        <!-- /.card-body -->

        <a href="{{ url('warga') }}" class="btn bg-purple margin">Kembali</a>
        <a href="{{ url('editProfile', $warga->user_id) }}" class="btn bg-purple margin">Edit</a>
    </div>
    <!-- /.card -->
</div>
@endsection