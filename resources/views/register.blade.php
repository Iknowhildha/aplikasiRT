<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{ asset('') }}index2.html"><b>APLIKASI </b>RT</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register</p>

    <form action="{{ url('/registerPost') }}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="text" id="username" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="email" type="email" class="form-control" placeholder="Email" name="email" >
        <span class="glyphicon glyphicon-email form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" placeholder="Password" name="password" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" placeholder="Password Konfirmasi" name="password" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="no_kk" type="no_kk" class="form-control" placeholder="Nomor Kartu Keluarga" name="no_kk" >
        <span class="glyphicon glyphicon-email form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="nik" type="nik" class="form-control" placeholder="Nomor Induk Kependudukan" name="nik" >
        <span class="glyphicon glyphicon-email form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="nama" type="nama" class="form-control" placeholder="Nama Lengkap" name="nama" >
        <span class="glyphicon glyphicon-email form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="tempat_lahir" type="tempat_lahir" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" >
        <span class="glyphicon glyphicon-email form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" >
        <span class="glyphicon glyphicon-email form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select id="agama" class="form-control" name="agama" >
          <option value="">-- Pilih Agama --</option>
          <option value="islam">Islam</option>
          <option value="protestan">Protestan</option>
          <option value="katolik">Katolik</option>
          <option value="buddha">Buddha</option>
          <option value="hindu">Hindu</option>
          <option value="konghucu">Konghucu</option>
        </select>
        <span class="glyphicon glyphicon-email form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <label for=""> Jenis Kelamin</label>
      <div class="radio">
        <label>
          <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L">
          Laki Laki
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P">
          Perempuan
        </label>
      </div>
    </div>
    <div class="form-group has-feedback">
      <input id="no_hp" type="number" class="form-control" name="no_hp" placeholder="Nomor HP">
      <span class="glyphicon glyphicon-email form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Alamat Lengkap"></textarea>
      <span class="glyphicon glyphicon-email form-control-feedback"></span>
    </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="login.html" class="text-center">I already have a membership</a>
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
