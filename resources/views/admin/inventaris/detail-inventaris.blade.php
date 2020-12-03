@extends('layouts.master')

@section('title', 'Detail inventaris')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Inventaris</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" disabled value="{{ $inventaris->nama_inventaris }}">
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" disabled value="{{ $inventaris->jumlah_inventaris }}">
              </div>
              <div class="form-group">
                <label>Satuan </label>
                <input type="text" class="form-control" id="satuan" name="satuan" disabled value="{{ $inventaris->satuan_inventaris }}">
              </div>
              <div class="form-group">
                <label>Tanggal Beli</label>
                <input type="text" class="form-control" id="tanggal_beli" name="tanggal_beli" disabled value="{{ $inventaris->tanggal_beli_inventaris }}">
              </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" rows="3" id="keterangan" name="keterangan" disabled> {{ $inventaris->keterangan_inventaris }}</textarea>
            </div>
          </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection