@extends('layouts.master')

@section('title', 'Dashboard Keuangan')

@section('content')

  <a href="{{ url('admin/keuangan/create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah keuangan</a><br><br>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Keuangan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Uang Masuk</th>
                    <th>Uang Keluar</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($keuangan->total() > 0)
                @foreach($keuangan as $data)
                <tr>
                    <td>{{ ($keuangan->currentPage() - 1) * $keuangan->perPage() + $loop->iteration }}</td>
                    <td>{{ $data->updated_at->format('d-M-Y') }}</td>
                    <td>{{ $data->uraian }}</td>
                    <td>{{ $data->uang_masuk }}</td>
                    <td>{{ $data->uang_keluar }}</td>
                    @foreach ($data->user->warga as $item)
                    <td>{{ $item->nama }}</td>
                    @endforeach
                    <td>
                      @if (Session::get('level') == "Warga")
                      <a href="{{ url('admin/keuangan/show', $data->id) }}" class="btn bg-purple margin btn-xs">Detail</a>
                            @else
                            
                              <form  action="{{ route('keuangan.destroy', $data->id) }}" id="delete" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ url('admin/keuangan/'.$data->id.'/edit') }}"
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
                  <th colspan="3">Total Uang Masuk & Keluar</th>
                  <td style="background-color:green; color:white">Rp.@if ($keuangan->total() > 0) {{ number_format($data->sum('uang_masuk')) }} @else 0 @endif  </td>
                  <td style="background-color:red; color:white">Rp.@if ($keuangan->total() > 0)  {{ number_format($data->sum('uang_keluar')) }} @else 0 @endif </td>
                </tr>
                <tr>
                  <th colspan="3">Total Saldo</th>
                  <td style="background-color:blue; color:white" colspan="2">Rp.@if ($keuangan->total() > 0) {{ number_format($data->sum('uang_masuk') - $data->sum('uang_keluar')) }} @else 0 @endif </td>
                </tr>
            </tfoot>
        </table>
        <br>
        {{ $keuangan->links() }}
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection