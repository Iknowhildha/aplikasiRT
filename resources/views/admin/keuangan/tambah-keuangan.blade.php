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
          <div class="form-group" @error('tanggal') has-feedback @enderror>
              <label>Tanggal</label>
              <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              @error('tanggal')
              <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group" @error('uraian') has-feedback @enderror>
              <label>Uraian</label>
              <textarea name="uraian" id="" class="form-control" cols="30" rows="2">{{ old('uraian') }}</textarea>
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              @error('uraian')
              <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group" @error('jenis') has-feedback @enderror>
              <label>Kategori</label>
              <select name="jenis" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                <option value="uangmasuk" {{ old('jenis') == 'uangmasuk' ? "selected" : "" }}>Uang Masuk</option>
                <option value="uangkeluar" {{ old('jenis') == 'uangkeluar' ? "selected" : "" }}>Uang Keluar</option>
              </select>
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              @error('jenis')
              <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group" @error('nominal') has-feedback @enderror>
              <label>Nominal</label>
              <input type="number" class="form-control"  name="nominal" value="{{ old('nominal') }}">
              <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
              @error('nominal')
              <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group" >
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