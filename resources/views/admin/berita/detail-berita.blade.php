@extends('layouts.master')

@section('title', 'Detail Berita')

@section('content')

<!-- /.col -->
<div class="row">
    <div class="col-md-12">
    <!-- Box Comment -->
    <div class="box">
      <div class="box-header with-border">
        <div class="user-block">
            <img class="img-circle" src="{{ asset('adminlte/dist/img/user1-128x128.jpg') }}" alt="User Image">

          <span class="username">{{ $berita->user->username }}</span>
          <span class="description">{{ $berita->created_at }}</span>
        </div>
        <!-- /.user-block -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <!-- post text -->
        <h3>{{ $berita->judul }}</h3>
        <p>{!! $berita->isi !!}</p>

        <!-- Attachment -->
        <div class="attachment-block clearfix">
            Sumber : {{ $berita->sumber }}
        </div>
        <!-- /.attachment-block -->

      
      </div>
      <!-- /.box-body -->
      <div class="box-footer box-comments">

        @foreach ($komentar as $item)
        <div class="box-comment">
            <img class="img-circle img-sm" src="{{ asset('adminlte/dist/img/user3-128x128.jpg') }}" alt="User Image">

            <div class="comment-text">
                  <span class="username">
                    {{ $item->user->username }}
                    <span class="text-muted pull-right">{{ $item->created_at }}</span>
                  </span><!-- /.username -->
              {{ $item->isi_komentar }}
            </div>
            <!-- /.comment-text -->
          </div>
          
        @endforeach
      </div>
      <!-- /.box-footer -->
      <div class="box-footer">
        <form action="{{ url('komentaradmin', $berita->id) }}" method="post">
            @csrf
            <div class="input-group">
              <input type="text" name="komentar" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-success btn-flat">Kirim</button>
                  </span>
            </div>
          </form>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
</div>
  </div>
  <!-- /.col -->


@endsection