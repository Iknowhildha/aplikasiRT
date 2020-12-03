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
              <label>Uraian</label>
              <textarea name="uraian" id="" class="form-control" cols="30" rows="2">{{ $keuangan->uraian }}</textarea>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="jenis" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                <option value="uangmasuk" @if ($keuangan->uang_masuk != 0) selected @endif>Uang Masuk</option>
                <option value="uangkeluar" @if ($keuangan->uang_keluar != 0) selected @endif >Uang Keluar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Nominal</label>
              <input type="number" class="form-control"  name="nominal" @if($keuangan->uang_masuk != 0) value="{{ $keuangan->uang_masuk }}" @else value="{{ $keuangan->uang_keluar }}" @endif value="">
            </div>
            <div class="form-group">
              <label>Penanggung Jawab</label>
              <select name="tanggung" class="form-control">
                <option value="">-- Pilih Penanggung Jawab --</option>
                @foreach ($user as $item)
                <option value="{{ $keuangan->id }}" @if ($keuangan->user_id == $item->id)
                    Selected
                @endif>{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
          <button type="submit" class="btn bg-purple margin">Update</button>
        </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection