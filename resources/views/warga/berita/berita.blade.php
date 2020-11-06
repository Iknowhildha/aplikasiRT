@extends('layouts.master-warga')

@section('title', 'Berita')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @foreach ($berita2 as $item)
            <div class="card">
                <div class="card-body">
                    <h4>{{ $item->judul }}</h4>
                    <p>{{ $item->isi }}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="row">
       <div class="col-md-12">
        @foreach ($beritaall as $item)
            <div class="card">
                <div class="card-body">
                    <h4>{{ $item->judul }}</h4>
                    <p>{{ $item->isi }}</p>
                </div>
            </div>
        @endforeach
       </div>
    </div>
@endsection