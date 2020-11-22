@extends('layouts.master-warga')

@section('title','Data surat')

@section('content')

<div class="col-md-12 col-sm-12">
    <a href="{{ route('suratpengantar.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a><br><br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data surat</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal</th>
                    <th>Status Perkawinan</th>
                    <th>Pelayanan</th>
                    <th>Pekerjaan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($surat->total() > 0)
                @foreach($surat as $data)
                <tr>
                    @foreach ($data->user->warga as $item)
                    <td>{{ $item->nik }}</td>
                    @endforeach
                    <td>{{ $data->nomor_surat }}</td>
                    <td>{{ date('d-m-Y', strtotime($data->tanggal)) }}</td>
                    <td>{{ $data->status_perkawinan }}</td>
                    <td>{{ $data->pelayanan }}</td>
                    <td>{{ $data->pekerjaan }}</td>
                    <td>@if ($data->status == 'Belum Tervalidasi')
                        <span class="badge badge-warning">{{ $data->status }}</span>
                    @else
                    <span class="badge badge-success">{{ $data->status }}</span>
                    @endif</td>
                    <td class="text-center">
                        @if ($data->status == "Belum Tervalidasi")                              
                                <form  action="{{ route('suratpengantar.destroy', $data->id) }}" id="delete" method="post">
                                  @csrf
                                  @method('delete')
                                  <a href="{{ url('suratpengantar/'.$data->id).'/edit' }}"
                                    class="btn btn-info btn-sm">Edit</a>
                                    <button type="submit" 
                                      onclick="return confirm('Apakah kamu yakin ingin menghapus ?')"
                                      class="btn btn-danger btn-sm">Hapus</button>
                              </form>
                              @else
                              <a href="{{ url('cetak', $data->id) }}"
                                class="btn btn-info btn-sm">Cetak</a>
                                @endif
                    </td>
                </tr>
                @endforeach
                @else
                <td class="text-center bg-danger text-white" colspan="8">Anda Belum Mengajukan Surat Pengantar</td>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>NIK</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal</th>
                    <th>Status Perkawinan</th>
                    <th>Pelayanan</th>
                    <th>Pekerjaan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        </div>
        <br>
        {{ $surat->links() }}
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection