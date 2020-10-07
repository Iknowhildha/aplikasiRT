<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi RT | Registrasi Warga</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/iCheck/square/blue.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ asset('register') }}"><b>APLIKASI </b>RT</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register Warga</p>

            <form action="{{ url('/registerPost') }}" method="post">
                @csrf
                <div class="form-group @error('username') has-feedback @enderror">
                    <label for="">Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('email') has-feedback @enderror">
                    <label for="">Email</label>
                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('password') has-feedback @enderror">
                    <label for="">Password</label>
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                    <span class="glyphicon glyphicon-wrench form-control-feedback"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <label for="">Password Konfirmasi</label>
                    <input id="password-confirm" type="password" name="password_confirmation" class="form-control"
                        placeholder="Password Konfirmasi" value="{{ old('password_confirmation') }}">
                    <span class="glyphicon glyphicon-wrench form-control-feedback"></span>
                </div>
                <div class="form-group @error('no_kk') has-feedback @enderror">
                    <label for="">Nomor Kartu Keluarga</label>
                    <input id="no_kk" type="no_kk" class="form-control" placeholder="Nomor Kartu Keluarga" name="no_kk" value="{{ old('no_kk') }}">
                    <span class="glyphicon glyphicon-book form-control-feedback"></span>
                    @error('no_kk')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('nik') has-feedback @enderror">
                    <label for="">NIK (Nomor Induk Kependudukan)</label>
                    <input id="nik" type="nik" class="form-control" placeholder="Nomor Induk Kependudukan" name="nik" value="{{ old('nik') }}">
                    <span class="glyphicon glyphicon-book form-control-feedback"></span>
                    @error('nik')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('nama') has-feedback @enderror">
                    <label for="">Nama Lengkap</label>
                    <input id="nama" type="nama" class="form-control" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}">
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('tempat_lahir') has-feedback @enderror">
                    <label for="">Tempat Lahir</label>
                    <input id="tempat_lahir" type="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                        name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                    <span class="glyphicon glyphicon-object-align-bottom form-control-feedback"></span>
                    @error('tempat_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('tanggal_lahir') has-feedback @enderror">
                    <label for="">Tanggal Lahir</label>
                    <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    @error('tanggal_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('agama') has-feedback @enderror">
                    <label for="">Agama</label>
                    <select id="agama" class="form-control" name="agama">
                        <option value="">-- Pilih Agama --</option>
                        <option value="Islam" {{ old('agama') == 'Islam' ? "selected" : "" }}>Islam</option>
                        <option value="Protestan" {{ old('agama') == 'Protestan' ? "selected" : "" }}>Protestan</option>
                        <option value="Katolik" {{ old('agama') == 'Katolik' ? "selected" : "" }}>Katolik</option>
                        <option value="Buddha" {{ old('agama') == 'Buddha' ? "selected" : "" }}>Buddha</option>
                        <option value="Hindu" {{ old('agama') == 'Hindu' ? "selected" : "" }}>Hindu</option>
                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? "selected" : "" }}>Konghucu</option>
                    </select>
                    <span class="glyphicon glyphicon-email form-control-feedback"></span>
                    @error('agama')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('jenis_kelamin') has-feedback @enderror">
                    <label for="">Jenis Kelamin</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki" @if(old('jenis_kelamin')) checked @endif
                            >
                            Laki Laki
                        </label>
                        <label>
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" @if(old('jenis_kelamin')) checked @endif
                            >
                            Perempuan
                        </label>
                    </div>
                    @error('jenis_kelamin')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('no_hp') has-feedback @enderror">
                    <label for="">Nomor HP</label>
                    <input id="no_hp" type="number" class="form-control" name="no_hp" placeholder="Nomor HP" value="{{ old('no_hp') }}">
                    <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                    @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('alamat') has-feedback @enderror">
                    <label for="">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"
                        placeholder="Alamat Lengkap">{{old('alamat')}}</textarea>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                </div>
            </form>
            <br>
            <a href="{{ url('login') }}" class="text-left"><i class="fa fa-sign-in"></i> Sudah punya akun, Login
                Warga</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>
