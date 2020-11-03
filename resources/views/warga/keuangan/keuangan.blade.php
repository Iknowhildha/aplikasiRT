@extends('layouts.master-warga')

@section('title', 'Data Keuangan')

@section('content')
<div class="col-md-12 col-sm-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Keuangan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Uang Masuk</th>
                    <th>Uang Keluar</th>
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
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>


@endsection