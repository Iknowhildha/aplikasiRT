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
              <label>Uraian</label>
              <textarea name="uraian" id="" class="form-control" cols="30" rows="2"></textarea>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="jenis" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                <option value="uangmasuk">Uang Masuk</option>
                <option value="uangkeluar">Uang Keluar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Nominal</label>
              <input type="number" class="form-control"  name="nominal">
            </div>
            <div class="form-group">
              <label>Penanggung Jawab</label>
              <select name="tanggung" class="form-control">
                <option value="">-- Pilih Penanggung Jawab --</option>
                @foreach ($user as $item)
                <option value="{{ $item->user_id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
          <button type="submit" class="btn bg-purple margin">Tambah</button>
        </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection