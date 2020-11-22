@extends('layouts.master-warga')

@section('title', 'List Beritaku')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Beritaku</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Sumber</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($berita->total() > 0)
                        @foreach($berita as $data)
                        <tr>
                            <td>{{ ($berita->currentPage() - 1) * $berita->perPage() + $loop->iteration }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>{{ $data->sumber }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>
                                <form  action="{{ route('berita.destroy', $data->id) }}" id="delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('berita.edit', $data->id) }}"
                                      class="btn btn-primary btn-sm">Edit</a>
                                      <button type="submit" 
                                        onclick="return confirm('Apakah kamu yakin ingin menghapus ?')"
                                        class="btn btn-danger btn-sm">Hapus</button>
                                </form>
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
                            <th>Judul</th>
                            <th>Sumber</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                <br>
                {{ $berita->links() }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection