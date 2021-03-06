@extends('layouts.master')

@section('title', 'Data Warga')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Warga</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example13" class="table table-bordered table-striped">
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
                    <td>{{ $data->no_kk }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>
                            @if($data->status == "Waiting")
                            <a href="{{ url('admin/detail', $data->user_id) }}"
                              class="btn bg-purple margin btn-xs">Details</a>
                              <a href="{{ url('admin/deleteWarga', $data->user_id) }}"
                                  onclick="return confirm('Apakah kamu yakin ingin menghapus ?')"
                                  class="btn bg-purple margin btn-xs">Hapus</a>
                              <a href="{{ url('admin/validasi', $data->user_id) }}" class="btn bg-purple margin btn-xs">Validasi</a>
                              @else
                              <a href="{{ url('admin/detail', $data->user_id) }}"
                                class="btn bg-purple margin btn-xs">Details</a>
                                <a href="{{ url('admin/deleteWarga', $data->user_id) }}"
                                    onclick="return confirm('Apakah kamu yakin ingin menghapus ?')"
                                    class="btn bg-purple margin btn-xs">Hapus</a>
                                @endif
                    </td>
                </tr>
                @endforeach
                @else
                <td class="text-center bg-danger" colspan="7">Data Tidak Ditemukan</td>
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
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
