@extends('layouts.master')

@section('title', 'Tambah Inventaris')

@section('content')

<div class="box">
  <div class="box-header">
      <h3 class="box-title">Tambah inventaris</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <form role="form" action="{{ route('inventaris.store') }}" method="POST">
          @csrf
          <div class="form-group" @error('nama') has-feedback @enderror>
              <label>Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              @error('nama')
              <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group" @error('jumlah') has-feedback @enderror>
              <label>Jumlah</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              @error('jumlah')
              <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Satuan </label>
              <select class="form-control" id="satuan" name="satuan">
                <option value="">-- Pilih Satuan --</option>
                <option value="Biji" {{ old('satuan') == 'Biji' ? "selected" : "" }}>Biji</option>
                <option value="Meter" {{ old('satuan') == 'Meter' ? "selected" : "" }}>Meter</option>
                <option value="Paket" {{ old('satuan') == 'Paket' ? "selected" : "" }}>Paket</option>
              </select> 
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              @error('satuan')
              <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
              </span>
              @enderror             
            </div>
            <div class="form-group" @error('tanggal_beli') has-feedback @enderror>
              <label>Tanggal Beli</label>
              <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" value="{{ old('tanggal_beli') }}">
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              @error('tanggal_beli')
              <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
              </span>
              @enderror
            </div>
          <!-- textarea -->
          <div class="form-group" @error('keterangan') has-feedback @enderror>
            <label>Keterangan</label>
            <textarea class="form-control" rows="3" id="keterangan" name="keterangan">{{ old('keterangan') }}</textarea>
            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              @error('keterangan')
              <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
              </span>
              @enderror
          </div>
          <button type="submit" class="btn bg-purple margin">Tambah</button>
        </form>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection