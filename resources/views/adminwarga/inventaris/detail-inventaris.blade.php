@extends('layouts.master')

@section('title', 'Detail Agenda')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Detail Agenda</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" disabled value="{{ $agenda->nama_agenda }}">
              </div>
              <div class="form-group">
                <label>jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" disabled value="{{ $agenda->jumlah_agenda }}">
              </div>
              <div class="form-group">
                <label>satuan </label>
                <input type="text" class="form-control" id="satuan" name="satuan" disabled value="{{ $agenda->satuan_agenda }}">
              </div>
              <div class="form-group">
                <label>tanggal beli</label>
                <input type="text" class="form-control" id="tanggal_beli" name="tanggal_beli" disabled value="{{ $agenda->tanggal_beli_agenda }}">
              </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" rows="3" id="keterangan" name="keterangan" disabled> {{ $agenda->keterangan_agenda }}</textarea>
            </div>
          </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection