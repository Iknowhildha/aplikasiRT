@extends('layouts.master-warga')

@section('title', 'Detail Agenda')

@section('content')
<div class="col-md-12 col-sm-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail {{ $agenda->nama_agenda }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
            <div class="form-group">
              <a href="{{ url('agenda') }}" class="btn btn-info btn-block">Kembali</a>
            </div>
          </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection