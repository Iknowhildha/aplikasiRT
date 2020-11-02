@extends('layouts.master-warga')

@section('title','Data Warga')

@section('content')
<div class="col-md-12 col-sm-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Warga</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nomer KK</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>jenis Kelamin</th>
                    <th>Nomer HP</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($warga->total() > 0)
                @foreach($warga as $data)
                <tr>
                    <td>******</td>
                    <td>******</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>
                        <a href="{{ url('/detail', $data->user_id) }}"
                          class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @endforeach
                @else
                <td class="text-center bg-danger" colspan="4">Data Tidak Ditemukan</td>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Nomer KK</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>jenis Kelamin</th>
                    <th>Nomer HP</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        <br>
        {{ $warga->links() }}
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection