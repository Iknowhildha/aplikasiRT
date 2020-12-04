@extends('layouts.master')

@section('title', 'Edit inventaris')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit inventaris</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="{{ route('inventaris.update', $inventaris->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $inventaris->nama_inventaris }}">
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $inventaris->jumlah }}">
              </div>
              <div class="form-group">
                <label>Satuan </label>
                <select class="form-control" id="satuan" name="satuan">
                  <option>-- Pilih Satuan --</option>
                  <option @if ($inventaris->satuan == "Biji") selected @else  @endif>Biji</option>
                  <option @if ($inventaris->satuan == "Meter") selected @else  @endif>Meter</option>
                  <option @if ($inventaris->satuan == "Paket") selected @else  @endif>Paket</option>
                </select>              
              </div>
              <div class="form-group">
                <label>Tanggal Beli</label>
                <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli" value="{{ $inventaris->tanggal_beli}}">
              </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" rows="3" id="keterangan" name="keterangan"> {{ $inventaris->keterangan_inventaris }}</textarea>
            </div>
            <button type="submit" class="btn bg-purple margin">Update</button>
          </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection