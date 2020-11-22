@extends('layouts.master-warga')

@section('title', 'Detail Berita')

@section('content')

<!-- /.col -->
<div class="col-md-12">
    <!-- card Comment -->
    <div class="card">
        <div class="card-header with-border">
            <div class="user-block">
                <span class="username">{{ $berita->user->username }}</span>
                <span class="description">{{ $berita->created_at }}</span>
            </div>
            <!-- /.user-block -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- post text -->
            <h3>{{ $berita->judul }}</h3>
            <p>{!! $berita->isi !!}</p>

            <!-- Attachment -->
            <div class="attachment-block clearfix">
                Sumber : {{ $berita->sumber }}
            </div>
            <!-- /.attachment-block -->


        </div>
        <!-- /.card-body -->
        <div class="card-footer card-comments">

            @foreach ($komentar as $item)
            <div class="card-comment">
                <div class="comment-text">
                    <span class="username">
                        {{ $item->user->username }}
                        <span class="text-muted pull-right">{{ $item->created_at }}</span>
                    </span><!-- /.username -->
                    {{ $item->isi_komentar }}
                    @if ($item->user_id == Session::get('id'))
                    <a class="badge badge-primary" data-toggle="collapse" href="#komen{{ $item->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Edit
                    </a>
                    <a href="{{ url('komentarhapus', $item->id) }}" class="badge badge-danger">Hapus</a>
                    <div class="collapse" id="komen{{ $item->id }}">
                        <div class="card card-body">
                          <form action="{{ url('komentaredit', $item->id) }}">
                            <div class="input-group">
                              <input type="text" name="komentar" placeholder="Edit Message ..." class="form-control">
                              <span class="input-group-btn">
                                  <button type="submit" class="btn btn-info btn-flat">Edit</button>
                              </span>
                          </div>
                          </form>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- /.comment-text -->
            </div>
            @endforeach
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
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
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->


@endsection