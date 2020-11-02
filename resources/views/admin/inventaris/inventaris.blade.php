@extends('layouts.master')

@section('title', 'Dashboard inventaris')

@section('content')

  <a href="{{ url('admin/inventaris/create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah inventaris</a><br><br>


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
                      @if (Session::get('level') == "Warga")
                      <a href="{{ url('admin/inventaris/show', $data->id) }}" class="btn bg-purple margin btn-xs">Detail</a>
                            @else
                            
                              <form  action="{{ route('inventaris.destroy', $data->id) }}" id="delete" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ url('admin/inventaris/'.$data->id.'/edit') }}"
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
        {{ $inventaris->links() }}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection