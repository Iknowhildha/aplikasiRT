@extends('layouts.master')

@section('title', 'Edit User')

@section('content')

              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Edit User</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <form role="form" action="{{ url('admin/updateuser', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="">Username</label>
                          <input type="text" id="username" class="form-control" placeholder="Username" name="username" value="{{ $user->username }}">
                      </div>
                      <div class="form-group">
                          <label for="">Email</label>
                          <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}">
                      </div>
                      <div class="form-group">
                          <label for="">Password</label>
                          <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                      </div>
                      <div class="form-group">
                          <label for="">Nama Lengkap</label>
                          <input id="nama" type="nama" class="form-control" placeholder="Nama Lengkap" name="nama" value="{{ $warga->nama }}">
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="radio">
                            <label>
                              <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" @if ($warga->jenis_kelamin == "Laki-laki") checked @else value="" @endif  >
                              Laki-laki
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" @if ($warga->jenis_kelamin == "Perempuan") checked @else value="" @endif >
                              Perempuan
                            </label>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="">Nomor HP</label>
                          <input id="no_hp" type="number" class="form-control" name="no_hp" placeholder="Nomor HP" value="{{ $warga->no_hp }}">
                          
                      
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
              
              
            <button type="submit" class="btn bg-purple margin">Edit</button>
          </form>
    </div>
    <!-- /.box-body -->



@endsection