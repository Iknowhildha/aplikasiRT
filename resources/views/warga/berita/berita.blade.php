@extends('layouts.master-warga')

@section('title', 'Berita')

@section('content')
        @foreach ($berita2 as $item)
        <div class="col-md-6 col-lg-6 mb-3">
        <div class="card mb-2">
            <div class="card-header">
                <span class="username">{{ $item->user->username }}</span>
                <span class="description">{{ $item->created_at }}</span>
            </div>
            <div class="card-body">
                <h4>{{ $item->judul }}</h4>
                <p>{{ $item->isi }}</p>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($beritaall as $item)
    <div class="col-md-6 col-lg-4 mb-3">
    <div class="card mb-2">
        <div class="card-header">
            <span class="username">{{ $item->user->username }}</span>
            <span class="description">{{ $item->created_at }}</span>
        </div>
        <div class="card-body">
            <a href="{{ route('berita.show', $item->id) }}"><h4>{{ $item->judul }}</h4></a>
            <p>{{ $item->isi }}</p>
                   <!-- Attachment -->
        <div class="attachment-block clearfix">
            Sumber : {{ $item->sumber }}
        </div>
        </div>
    </div>
</div>
@endforeach
@endsection