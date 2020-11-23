@extends('layouts.master')

@section('title', 'Dashboard Agenda')

@section('content')

  <a href="{{ route('') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah User</a><br><br>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($user->total() > 0)
                @foreach($user as $data)
                <tr>
                    <td>{{ ($user->currentPage() - 1) * $user->perPage() + $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->jenis_kelamnin }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>{{ $data->level }}</td>
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
                    <th>Username</th>
                    <th>No HP</th>
                    <th>Jenis Kelamin</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        <br>
        {{ $user->links() }}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection