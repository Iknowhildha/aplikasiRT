@extends('layouts.master-warga')

@section('title', 'Tambah Data Surat Pengantar')

@section('content')
<div class="col-md-12 col-sm-12">
<div class="card">
  <div class="card-header">
      <h3 class="card-title">Tambah Surat Pegantar</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
      <form role="form" action="{{ route('suratpengantar.store') }}" method="POST">
          @csrf
          <div class="form-group">
              <label>Nomor Surat</label>
              <input type="text" class="form-control" name="nomor" value="{{ $nomorotomatis }}" readonly>
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="form-group">
              <label>Status Perkawinan </label>
              <select class="form-control" name="status">
                <option>-- Pilih Status Perkawinan --</option>
                <option>Kawin</option>
                <option>Belum Kawin</option>
              </select>              
            </div>
            <div class="form-group">
              <label>Perkerjaan</label>
              <input type="text" class="form-control" name="pekerjaan">
            </div>
          <!-- textarea -->
          <div class="form-group">
            <label>Pelayanan</label>
            <input type="text" class="form-control" name="pelayanan">
        </div>
          <button type="submit" class="btn btn-primary btn-block">Tambah</button>
        </form>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection