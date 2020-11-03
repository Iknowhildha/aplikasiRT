@extends('layouts.master')

@section('title', 'Validasi Data Surat Pengantar')

@section('content')
<div class="col-md-12 col-sm-12">
<div class="box">
  <div class="box-header">
      <h3 class="box-title">Validasi Surat Pegantar</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <form role="form" action="{{ route('suratpengantar.update', $surat->id) }}" method="POST">
          @csrf
          @method('Patch')
          <div class="form-group">
              <label>Nomor Surat</label>
              <input type="text" class="form-control" name="nomor" value="{{ $surat->nomor_surat }}">
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal" value="{{ $surat->tanggal }}">
            </div>
            <div class="form-group">
              <label>Status Perkawinan </label>
              <select class="form-control" name="statusperkawinan">
                <option>-- Pilih Status Perkawinan --</option>
                <option @if ($surat->status_perkawinan == 'Kawin') Selected @endif>Kawin</option>
                <option @if ($surat->status_perkawinan == 'Belum Kawin') Selected @endif>Belum Kawin</option>
              </select>              
            </div>
            <div class="form-group">
              <label>Perkerjaan</label>
              <input type="text" class="form-control" name="pekerjaan" value="{{ $surat->pekerjaan }}">
            </div>
          <!-- textarea -->
          <div class="form-group">
            <label>Pelayanan</label>
            <input type="text" class="form-control" name="pelayanan" value="{{ $surat->pelayanan }}">
        </div>
        <div class="form-group">
          <label>Status Surat </label>
          <select class="form-control" name="status">
            <option>-- Pilih Status Surat --</option>
            <option @if ($surat->status == 'Belum Tervalidasi') Selected @endif>Belum Tervalidasi</option>
            <option @if ($surat->status == 'Tervalidasi') Selected @endif>Tervalidasi</option>
          </select>              
        </div>
          <button type="submit" class="btn btn-success btn-block">Validasi</button>
        </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
@endsection