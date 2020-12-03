@extends('layouts.master')

@section('title', 'Tambah Agenda')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Agenda</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="{{ route('agenda.store') }}" method="POST">
          @csrf
            <div class="form-group" @error('nama') has-feedback @enderror>
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" >
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="form-group" @error('isi') has-feedback @enderror>
                <label>Isi</label>
                <input type="text" class="form-control" id="isi" name="isi" value="{{ old('isi') }}">
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('isi')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="form-group" @error('tanggal') has-feedback @enderror>
                <label>Tanggal </label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('tanggal')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="form-group" @error('tempat') has-feedback @enderror>
                <label>Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ old('tempat') }}">
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('tempat')
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