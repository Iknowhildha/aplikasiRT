@extends('layouts.master-warga')

@section('title', 'Agenda Warga')

@section('content')
<div class="col-md-12 col-sm-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Agenda Warga</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Tempat</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($agenda->total() > 0)
                @foreach($agenda as $data)
                <tr>
                    <td>{{ ($agenda->currentPage() - 1) * $agenda->perPage() + $loop->iteration }}</td>
                    <td>{{ $data->nama_agenda }}</td>
                    <td>{{ $data->isi_agenda }}</td>
                    <td>{{ $data->tanggal_agenda }}</td>
                    <td>{{ $data->tempat_agenda }}</td>
                    <td>{{ $data->keterangan_agenda }}</td>
                    <td>
                      <a href="{{ route('agenda.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
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
                    <th>Isi</th>
                    <th>Tanggal</th>
                    <th>Tempat</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        <br>
        {{ $agenda->links() }}
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection