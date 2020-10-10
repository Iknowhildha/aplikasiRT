@extends('layouts.master')

@section('title', 'Tambah Agenda')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Agenda</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="{{ route('agenda.store') }}" method="POST">
          @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" >
              </div>
              <div class="form-group">
                <label>Isi</label>
                <input type="text" class="form-control" id="isi" name="isi">
              </div>
              <div class="form-group">
                <label>Tanggal </label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
              </div>
              <div class="form-group">
                <label>Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat">
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