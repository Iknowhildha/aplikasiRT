@extends('layouts.master')

@section('title', 'Tambah Keuangan')

@section('content')

<div class="box">
  <div class="box-header">
      <h3 class="box-title">Tambah Keuangan</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <form role="form" action="{{ route('keuangan.store') }}" method="POST">
          @csrf
          <div class="form-group">
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="form-group">
              <label>uraian</label>
              <textarea name="uraian" id="" class="form-control" cols="30" rows="2"></textarea>
            </div>
            <div class="form-group">
              <label>Uang Masuk</label>
              <input type="number" class="form-control"  name="uangmasuk">
            </div>
            <div class="form-group">
              <label>Uang Keluar</label>
              <input type="number" class="form-control" name="uangkeluar">
            </div>
          <button type="submit" class="btn bg-purple margin">Tambah</button>
        </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection