@extends('layouts.master-warga')

@section('title', 'Detail Inventaris')

@section('content')
<div class="col-md-12 col-sm-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail {{ $inventaris->nama_inventaris }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form role="form">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" disabled value="{{ $inventaris->nama_inventaris }}">
              </div>
              <div class="form-group">
                <label>jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" disabled value="{{ $inventaris->jumlah }}">
              </div>
              <div class="form-group">
                <label>satuan </label>
                <input type="text" class="form-control" id="satuan" name="satuan" disabled value="{{ $inventaris->satuan }}">
              </div>
              <div class="form-group">
                <label>tanggal beli</label>
                <input type="text" class="form-control" id="tanggal_beli" name="tanggal_beli" disabled value="{{ $inventaris->tanggal_beli }}">
              </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" rows="3" id="keterangan" name="keterangan" disabled> {{ $inventaris->keterangan_inventaris }}</textarea>
            </div>
            <div class="form-group">
              <a href="{{ url('inventaris') }}" class="btn btn-info btn-block">Kembali</a>
            </div>
          </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection