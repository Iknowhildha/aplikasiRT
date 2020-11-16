@extends('layouts.master-warga')

@section('title', 'Berita')

@section('content')
<div class="text-center mb-3">
    <a href="{{ route('berita.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Berita</a>
    <a href="{{ url('beritalist', Session::get('id')) }}" class="btn btn-primary"><i class="fa fa-list"></i> List Beritaku</a>
</div>
<div class="row">
    @foreach ($berita2 as $item)
    <div class="col-md-6 col-lg-6 mb-3">
        <div class="card mb-2">
            <div class="card-header">
                <span class="username"><span class="badge badge-primary">{{ $item->user->username }}</span></span>
                <span class="description">{{ $item->created_at }}</span>
            </div>
            <div class="card-body">
                <a href="{{ route('berita.show', $item->id) }}" class="stretched-link">
                    <h4>{{ $item->judul }}</h4>
                </a>
                <p>{{ substr($item->isi, 0,50) }}...</p>
                <div class="attachment-block clearfix">
                    Sumber : {{ $item->sumber }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($beritaall as $item)
    <div class="col-md-6 col-lg-4 mb-3">
        <div class="card mb-2">
            <div class="card-header bg-primary text-white">
                <span class="username"><span class="badge badge-warning">{{ $item->user->username }}</span></span>
                <span class="description">{{ $item->created_at }}</span>
            </div>
            <div class="card-body">
                <a href="{{ route('berita.show', $item->id) }}" class="stretched-link">
                    <h4>{{ $item->judul }}</h4>
                </a>
                <p>{{ substr($item->isi, 0,50) }}...</p>
                <!-- Attachment -->
                <div class="attachment-block clearfix">
                    Sumber : {{ $item->sumber }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection