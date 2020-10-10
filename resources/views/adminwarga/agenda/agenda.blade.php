@extends('layouts.master')

@section('title', 'Dashboard Agenda')

@section('content')

  <a href="{{ route('agenda.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Agenda</a><br><br>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Warga</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
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
                      @if (Session::get('level') == "Warga")
                      <a href="{{ route('agenda.show', $data->id) }}" class="btn bg-purple margin btn-xs">Detail</a>
                            @else
                            
                              <form  action="{{ route('agenda.destroy', $data->id) }}" id="delete" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('agenda.edit', $data->id) }}"
                                  class="btn bg-purple margin btn-xs">Edit</a>
                                  <button type="submit" 
                                    onclick="return confirm('Apakah kamu yakin ingin menghapus ?')"
                                    class="btn bg-purple margin btn-xs">Hapus</button>
                            </form>
    
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
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection