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
          <th>Nomer KK</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th>jenis Kelamin</th>
          <th>Nomer HP</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody >
        <tr>
          <td>Trident</td>
          <td>Internet</td>
          <td>Win 95+</td>
          <td> 4</td>
          <td>X</td>
          <td>X</td>
          <td><button type="button" class="btn bg-purple margin btn-xs">Details</button></td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th>Nomer KK</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>jenis Kelamin</th>
            <th>Nomer HP</th>
            <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@endsection