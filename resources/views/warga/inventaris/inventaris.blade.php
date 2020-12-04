@extends('layouts.master-warga')

@section('title', 'Dashboard inventaris')

@section('content')
<div class="col-md-12 col-sm-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Inventaris</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Tanggal Beli</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($inventaris->total() > 0)
                @foreach($inventaris as $data)
                <tr>
                    <td>{{ ($inventaris->currentPage() - 1) * $inventaris->perPage() + $loop->iteration }}</td>
                    <td>{{ $data->nama_inventaris }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ $data->satuan }}</td>
                    <td>{{ $data->tanggal_beli }}</td>
                    <td>{{ $data->keterangan_inventaris }}</td>
                    <td>
                      <a href="{{ route('inventaris.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
                @else
                <td class="text-center bg-danger" colspan="7">Data Tidak Ditemukan</td>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Tanggal Beli</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        <br>
        {{ $inventaris->links() }}
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

@endsection