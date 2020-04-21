
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI Surat | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/'); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/'); ?>dist/css/AdminLTE.min.css">
  <style type="text/css">
    .login-container{
      margin-top: 5%;
      margin-bottom: 5%;
    }

    .login-container form{
      padding: 10%;
    }


    .carousel-inner>.item>img{
      height: 390px;
    } 

    body{
      background: url(assets/gambar/pattern.jpg);
    }

    .login-page, .register-page {
      height: 390px;
      background: #fff;
    }
    .login-logo, .register-logo {
      font-size: 20px;
      margin-bottom: 0;
    }
    .login-box-body, .register-box-body {
      padding-top: 0;
    }
    .login-container form {
      padding: 3%;
    }

/*    .carousel::after {
      content: '';
      display: block;
      width: 100%;
      height: 80%;
      bottom: 0;
      background-image: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
      position: absolute;
    }*/
    .item::after {
      content: '';
      display: block;
      width: 100%;
      height: 80%;
      bottom: 0;
      /*background-image: linear-gradient(45deg, black, transparent);*/
      background-image: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
      position: absolute;
    }

  </style>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body >
  <div class="container login-container">
    <div class="row">
      <div class="col-md-7 col-12" style="padding-right: 0">
       <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <img src="<?= base_url('assets/gambar/poltek1.jpg'); ?>" alt="First slide">
            <div class="carousel-caption">
              <h3 style="color: yellow;">SISTEM INFORMASI AKADEMIK</h3>
              <h4 style="color: white;">POLITEKNIK ACEH SELATAN</h4>
            </div>
          </div>
          <div class="item">
            <img src="<?= base_url('assets/gambar/poltek1.jpg'); ?>" alt="Second slide">
            <div class="carousel-caption">
              <h3 style="color: yellow;">SISTEM INFORMASI AKADEMIK</h3>
              <h4 style="color: white;">POLITEKNIK ACEH SELATAN</h4>
            </div>
          </div>
        </div>
<!--         <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="fa fa-angle-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="fa fa-angle-right"></span>
        </a> -->          
      </div>
    </div>
    <div class="col-md-5 col-12 hold-transition login-page">

      <div class="login-box">
        <div class="login-logo">
          <img src="<?= base_url('assets/logo/logo_poltas.jpg') ?>" width="80px"><br>
          <a href="<?= base_url('assets/adminlte/'); ?>index2.html">Silahkan Login</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
          <form action="<?= site_url('auth/cekLogin'); ?>" method="post">
            <div class="form-group has-feedback">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="uname" id="uname" placeholder="Username" autocomplete="off">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="username">Password</label>
              <input type="password" class="form-control" name="upass" id="upass" placeholder="Password" autocomplete="off">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-7">

              </div>
              <!-- /.col -->
              <div class="col-xs-5">
                <button type="submit" name="login" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Login</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

        </div>
        <!-- /.login-box-body -->
      </div>

    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/adminlte/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/adminlte/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
