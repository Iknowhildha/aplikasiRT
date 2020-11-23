@extends('layouts.master')

@section('title', 'Dashboard User')

@section('content')

  <a href="{{ url('admin/tambahuser') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah User</a><br><br>


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
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($user->total() > 0)
                @foreach($user as $data)
                <tr>
                    <td>{{ ($user->currentPage() - 1) * $user->perPage() + $loop->iteration }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->level }}</td>
                    <td>
            <a href="{{ url('admin/edituser', $data->id) }}" class="btn bg-purple margin btn-xs">Edit</a>
            <a href="{{ url('admin/deleteuser', $data->id) }}" class="btn bg-purple margin btn-xs">Hapus</a>
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
                  <th>Username</th>
                  <th>Email</th>
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