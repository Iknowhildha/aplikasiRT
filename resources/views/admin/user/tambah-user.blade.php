@extends('layouts.master')

@section('title', 'Tambah User')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="{{ route('') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" id="username" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input id="email" type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input id="password" type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input id="nama" type="nama" class="form-control" placeholder="Nama Lengkap" name="nama">
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <div class="radio">
                <label>
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki"
                    >
                    Laki Laki
                </label>
                <label>
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"
                    >
                    Perempuan
                </label>
            </div>
           
        </div>
        <div class="form-group">
            <label for="">Nomor HP</label>
            <input id="no_hp" type="number" class="form-control" name="no_hp" placeholder="Nomor HP" >
            
        </div>
        <div class="form-group">
          <label for="">Level</label>
          <select id="level" class="form-control" name="level">
              <option value="">-- Pilih Level --</option>
              <option>Admin</option>
              <option>Warga</option>
          </select>
      </div>
            <button type="submit" class="btn bg-purple margin">Tambah</button>
          </form>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


@endsection