@extends('layouts.master-warga')

@section('title', 'Tambah Berita')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Berita</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Tambah</button>
          </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection