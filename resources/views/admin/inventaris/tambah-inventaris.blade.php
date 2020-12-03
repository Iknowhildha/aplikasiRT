@extends('layouts.master')

@section('title', 'Tambah Agenda')

@section('content')

<div class="box">
  <div class="box-header">
      <h3 class="box-title">Edit inventaris</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <form role="form" action="{{ route('inventaris.store') }}" method="POST">
          @csrf
          <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
              <label>Jumlah</label>
              <input type="text" class="form-control" id="jumlah" name="jumlah">
            </div>
            <div class="form-group">
              <label>Satuan </label>
              <select class="form-control" id="satuan" name="satuan">
                <option>-- Pilih Satuan --</option>
                <option>Biji</option>
                <option>Meter</option>
                <option>Paket</option>
              </select>              
            </div>
            <div class="form-group">
              <label>Tanggal Beli</label>
              <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli">
            </div>
          <!-- textarea -->
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" rows="3" id="keterangan" name="keterangan"></textarea>
          </div>
          <button type="submit" class="btn bg-purple margin">Tambah</button>
        </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection