@extends('layouts.master')

@section('title', 'Tambah Berita')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Berita</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="{{ route('berita.store') }}" method="POST">
          @csrf
            <div class="form-group" @error('judul') has-feedback @enderror>
                <label>Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" >
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="form-group" @error('isi') has-feedback @enderror>
                <label>Isi</label>
                <textarea class="form-control" rows="3" id="isi" name="isi">{{ old('isi') }}</textarea>
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('isi')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="form-group" @error('headline') has-feedback @enderror>
                <label>Headline</label>
                <input type="text" class="form-control" id="headline" name="headline" value="{{ old('headline') }}">
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('headline')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="form-group" @error('sumber') has-feedback @enderror>
                <label>Sumber</label>
                <input type="text" class="form-control" id="sumber" name="sumber" value="{{ old('sumber') }}">
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('sumber')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
            <div class="form-group" @error('tanggal') has-feedback @enderror>
                <label>Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('tanggal')
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