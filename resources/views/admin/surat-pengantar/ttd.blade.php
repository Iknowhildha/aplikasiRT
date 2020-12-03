@extends('layouts.master')

@section('title', 'Upload Foto Tanda Tangan')

@section('content')
<div class="col-md-12 col-sm-12">
<div class="box">
  <div class="box-header">
      <h3 class="box-title">Upload Foto Tanda Tangan</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <form role="form" action="{{ url('simpanttd', $data->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
            </div>
            <div class="form-group">
                <label>Foto Tanda Tangan</label>
                <input type="file" class="form-control" name="file">
              </div>
              <div class="form-group">
                <img src="{{ asset("/img/foto/".$data->foto) }}" width="100" height="100" alt="" srcset="">
              </div>
              <div class="form-group">
                <label>Foto Stempel</label>
                <input type="file" class="form-control" name="filestempel">
              </div>
              <div class="form-group">
                <img src="{{ asset("/img/foto/".$data->stempel) }}" width="100" height="100" alt="" srcset="">
              </div>

          <button type="submit" class="btn btn-success btn-block">Update</button>
        </form>

  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>
@endsection