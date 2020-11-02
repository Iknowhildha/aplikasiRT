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
                <label>Isi</label>
                <input type="text" class="form-control" id="isi" name="isi" disabled value="{{ $agenda->isi_agenda }}">
              </div>
              <div class="form-group">
                <label>Tanggal </label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" disabled value="{{ $agenda->tanggal_agenda }}">
              </div>
              <div class="form-group">
                <label>Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" disabled value="{{ $agenda->tempat_agenda }}">
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