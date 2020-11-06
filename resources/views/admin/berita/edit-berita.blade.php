@extends('layouts.master')

@section('title', 'Edit Berita')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Berita</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="{{ route('berita.update', $berita->id) }}" method="POST">
          @csrf
          @method('PATCH')
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul }}">
              </div>
              <div class="form-group">
                <label>Isi</label>
                <textarea class="form-control" rows="3" id="isi" name="isi">{!! $berita->isi !!} </textarea>
              </div>
              <div class="form-group">
                <label>Headline</label>
                <input type="text" class="form-control" id="headline" name="headline" value="{{ $berita->headline }}">
              </div>
              <div class="form-group">
                <label>Sumber</label>
                <input type="text" class="form-control" id="sumber" name="sumber" value="{{ $berita->sumber }}">
              </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $berita->tanggal_berita }}">
              </div>
            <button type="submit" class="btn bg-purple margin">Update</button>
          </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection