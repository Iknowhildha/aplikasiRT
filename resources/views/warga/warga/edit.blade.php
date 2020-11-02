@extends('layouts.master-warga')

@section('title', 'Edit Profil')

@section('content')
<div class="col-sm-12 col-md-12">
          <div class="card card-warning">
            <div class="card-header with-border">
              <h3 class="card-title">Form Edit Data Profil</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form role="form" action="{{ url ('/updateProfil', $warga->user_id) }}" method="POST">
                {{ csrf_field() }}
                @method('patch')
                <!-- text input -->
                <div class="form-group">
                  <label>Nomor Kartu Keluarga</label>
                  <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $warga->no_kk }}">
                </div>
                <div class="form-group">
                  <label>Nomor Induk Kependudukan</label>
                  <input type="text" class="form-control" id="nik" name="nik" value="{{ $warga->nik }}">
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $warga->nama }}">
                  </div>
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $warga->tempat_lahir }}">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}">
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                  <select class="form-control" id="agama" name="agama">
                    <option>-- Pilih Agama --</option>
                    <option @if ($warga->agama == "Islam") selected @endif>Islam</option>
                    <option @if ($warga->agama == "Protestan") selected @endif>Protestan</option>
                    <option @if ($warga->agama == "Katolik") selected @endif>Katolik</option>
                    <option @if ($warga->agama == "Buddha") selected @endif>Buddha</option>
                    <option @if ($warga->agama == "Hindu") selected @endif>Hindu</option>
                    <option @if ($warga->agama == "Konghucu") selected @endif>Konghucu</option>
                  </select>
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
                    <label>Nomor HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $warga->no_hp }}">
                  </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" id="alamat" name="alamat">{{ $warga->alamat }}</textarea>
                </div>
                <a href="{{ url('/beranda') }}" class="btn btn-info">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>

             
            
            <!-- /.card-body -->
          </div>
          </div>
        </div>
@endsection