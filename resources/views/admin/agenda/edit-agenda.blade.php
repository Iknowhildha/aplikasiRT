@extends('layouts.master')

@section('title', 'Edit Agenda')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Agenda</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="{{ route('agenda.update', $agenda->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $agenda->nama_agenda }}">
              </div>
              <div class="form-group">
                <label>Isi</label>
                <input type="text" class="form-control" id="isi" name="isi" value="{{ $agenda->isi_agenda }}">
              </div>
              <div class="form-group">
                <label>Tanggal </label>
                <input type="date" class="form-control" id="tanggal" name="tanggal"  value="{{ $agenda->tanggal_agenda }}">
              </div>
              <div class="form-group">
                <label>Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $agenda->tempat_agenda }}">
              </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" rows="3" id="keterangan" name="keterangan"> {{ $agenda->keterangan_agenda }}</textarea>
            </div>
            <button type="submit" class="btn bg-purple margin">Update</button>
          </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection