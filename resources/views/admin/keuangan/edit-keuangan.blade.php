@extends('layouts.master')

@section('title', 'Update Keuangan')

@section('content')

<div class="box">
  <div class="box-header">
      <h3 class="box-title">Edit Keuangan</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <form role="form" action="{{ route('keuangan.update', $keuangan->id) }}" method="POST">
        @csrf
        @method('patch')
          <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal" value="{{ $keuangan->tanggal_keuangan }}">
            </div>
            <div class="form-group">
              <label>uraian</label>
              <textarea name="uraian" id="" class="form-control" cols="30" rows="2">{{ $keuangan->uraian }}</textarea>
            </div>
            <div class="form-group">
              <label>Uang Masuk</label>
              <input type="number" class="form-control"  name="uangmasuk" value="{{ $keuangan->uang_masuk }}">
            </div>
            <div class="form-group">
              <label>Uang Keluar</label>
              <input type="number" class="form-control" name="uangkeluar" value="{{ $keuangan->uang_keluar }}">
            </div>
          <button type="submit" class="btn bg-purple margin">Update</button>
        </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection