@extends('layouts.master')

@section('title','Data surat')

@section('content')

<div class="col-md-3 mb-3">
    <a href="{{ url('formttd') }}" class="btn btn-primary btn-block">Upload Foto Tanda Tangan</a>
</div>
<div class="col-md-12 col-sm-12 mt-3">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data surat</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
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
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->status_perkawinan }}</td>
                    <td>{{ $data->pelayanan }}</td>
                    <td>{{ $data->pekerjaan }}</td>
                    <td>@if ($data->status == 'Belum Tervalidasi')
                        <span class="label label-warning">{{ $data->status }}</span>
                    @else
                    <span class="label label-success">{{ $data->status }}</span>
                    @endif</td>
                    <td>
                                <form  action="{{ route('suratpengantar.destroy', $data->id) }}" id="delete" method="post">
                                  @csrf
                                  @method('delete')
                                  <a href="{{ url('admin/suratpengantar/'.$data->id).'/edit' }}"
                                    class="btn btn-info btn-sm">Detail</a>
                                    <button type="submit" 
                                      onclick="return confirm('Apakah kamu yakin ingin menghapus ?')"
                                      class="btn btn-danger btn-sm">Hapus</button>
                                      <a href="{{ url('cetak', $data->id) }}"
                                        class="btn btn-default btn-sm">Cetak</a>
                              </form>
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
        <br>
        {{ $surat->links() }}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
@endsection