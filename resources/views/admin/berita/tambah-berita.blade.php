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
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" >
              </div>
              <div class="form-group">
                <label>Isi</label>
                <textarea class="form-control" rows="3" id="isi" name="isi"></textarea>
              </div>
              <div class="form-group">
                <label>Headline</label>
                <input type="text" class="form-control" id="headline" name="headline">
              </div>
              <div class="form-group">
                <label>Sumber</label>
                <input type="text" class="form-control" id="sumber" name="sumber">
              </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
              </div>
            <button type="submit" class="btn bg-purple margin">Tambah</button>
          </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection