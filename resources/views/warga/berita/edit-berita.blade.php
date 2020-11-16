@extends('layouts.master-warga')

@section('title', 'Edit Berita')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Berita</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
                        <input type="text" class="form-control" id="headline" name="headline"
                            value="{{ $berita->headline }}">
                    </div>
                    <div class="form-group">
                        <label>Sumber</label>
                        <input type="text" class="form-control" id="sumber" name="sumber" value="{{ $berita->sumber }}">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ $berita->tanggal_berita }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection