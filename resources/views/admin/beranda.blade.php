@extends('layouts.master')

@section('title', 'Beranda')

@section('content')

<?php
include '../koneksi.php';
ini_set('date.timezone', 'Asia/Jakarta');
$date = date('Y-m-d');
$query1 = mysqli_query($koneksi, "SELECT users.`id`,warga.`id`
FROM users,warga
WHERE users.`level`= 'Warga'
AND warga.`status`= 'Confirmed'
AND users.`id`= warga.`user_id`");
$jumlah_warga = mysqli_num_rows($query1);
$query2 = mysqli_query($koneksi, "SELECT * FROM surat_pengantar WHERE tanggal='$date'");
$jumlah_surat = mysqli_num_rows($query2);
$query3 = mysqli_query($koneksi, "SELECT SUM(uang_masuk) - SUM(uang_keluar) AS total FROM keuangan");
  while ($data = mysqli_fetch_array($query3)) {
      $totaluang = $data['total'];
  }
$query4 = mysqli_query($koneksi, "SELECT * FROM users WHERE level='Admin'");
$jumlah_user = mysqli_num_rows($query4);
?>

<div class="callout callout-warning">
    <h4>Selamat datang {{Session::get('nama')}}</h4>
    <h5>Anda Berhasil Login sebagai {{Session::get('level')}}</h5>
  </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-id-card-o"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Warga</span>
                  <span class="info-box-number"><?php echo $jumlah_warga ?></span>
    
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                      <span class="progress-description">
                        <a href="{{ url('admin/warga') }}" class="btn btn-info btn-xs">Lihat Data Warga</a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-envelope-o"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Surat Masuk Hari Ini</span>
                  <span class="info-box-number"><?php echo $jumlah_surat ?></span>
    
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                      <span class="progress-description">
                        <a href="{{ url('admin/suratpengantar') }}" class="btn btn-success btn-xs">Lihat Data Surat Pengantar</a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-money"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Saldo Terakhir</span>
                  <span class="info-box-number">Rp. <?php echo $totaluang ?></span>
    
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                      <span class="progress-description">
                        <a href="{{ url('admin/keuangan') }}" class="btn btn-warning btn-xs">Lihat Data Keuangan</a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-user"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-text">Jumlah User</span>
                  <span class="info-box-number"><?php echo $jumlah_user ?></span>
    
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                      <span class="progress-description">
                        <a href="{{ url('admin/user') }}" class="btn btn-danger btn-xs">Lihat Data User</a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
    
@endsection