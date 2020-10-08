@extends('layouts.master')

@section('title', 'Dashboard Data Warga')

@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Warga</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Tanggal</th>
          <th>Uraian</th>
          <th>Uang Masuk</th>
          <th>Uang Keluar</th>
          <th>Saldo</th>
        </tr>
        </thead>
        <tbody >
        <tr>
          <td>25 September 2020</td>
          <td>Membeli Banner</td>
          <td>-</td>
          <td>Rp. 250.000,-</td>
          <td>Rp. 4.500.000,-</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th>Tanggal</th>
            <th>Uraian</th>
            <th>Uang Masuk</th>
            <th>Uang Keluar</th>
            <th>Saldo</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@endsection