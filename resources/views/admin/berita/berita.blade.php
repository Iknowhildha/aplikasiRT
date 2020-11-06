@extends('layouts.master')

@section('title', 'Berita')

@section('content')
<a href="{{ route('berita.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Berita</a><br><br>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Berita</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Headline</th>
                    <th>Isi</th>
                    <th>Sumber</th>
                    <th>Tanggal Berita</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($berita->total() > 0)
                @foreach($berita as $data)
                <tr>
                    <td>{{ ($berita->currentPage() - 1) * $berita->perPage() + $loop->iteration }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->headline }}</td>
                    <td>{{ $data->isi }}</td>
                    <td>{{ $data->sumber }}</td>
                    <td>{{ $data->tanggal_berita }}</td>
                    <td>{{ $data->user->username }}</td>
                    <td>
                              <form  action="{{ route('berita.destroy', $data->id) }}" id="delete" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('berita.show', $data->id) }}"
                                    class="btn bg-purple margin btn-xs">Detail</a>
                                <a href="{{ route('berita.edit', $data->id) }}"
                                  class="btn bg-purple margin btn-xs">Edit</a>
                                  <button type="submit" 
                                    onclick="return confirm('Apakah kamu yakin ingin menghapus ?')"
                                    class="btn bg-purple margin btn-xs">Hapus</button>
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
                    <th>Headline</th>
                    <th>Isi</th>
                    <th>Sumber</th>
                    <th>Tanggal Berita</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        <br>
        {{ $berita->links() }}
    </div>
    <!-- /.box-body -->
</div>
@endsection