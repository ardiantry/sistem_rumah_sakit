<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMRAISHA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/ico.png" sizes="32x32">
  
  <!-- Font Awesome -->

    <style type="text/css">
    .fa,.fab,.fad,.fal,.far,.fas {
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        line-height: 1
    }
    
    .fa,.far,.fas {
        font-family: "Font Awesome 5 Free"
    }
    
    .fa,.fas {
        font-weight: 900
    }
    </style>
  
  <!-- Bootstrap 4 -->
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" integrity="sha512-tDXPcamuZsWWd6OsKFyH6nAqh/MjZ/5Yk88T5o+aMfygqNFPan1pLyPFAndRzmOWHKT+jSDzWpJv8krj6x1LMA==" crossorigin="anonymous" media="all">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha512-tDXPcamuZsWWd6OsKFyH6nAqh/MjZ/5Yk88T5o+aMfygqNFPan1pLyPFAndRzmOWHKT+jSDzWpJv8krj6x1LMA==" crossorigin="anonymous" media="all"></noscript>  
  

  <!-- icheck bootstrap -->
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" media="all">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" media="all"></noscript>  
  
  <!-- Theme style -->
  <link rel="preload" href="<?php echo base_url(); ?>assets/themes/adminLTE/dist/css/adminlte.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/adminLTE/dist/css/adminlte.min.css"></noscript>
  
  <link rel="preload" as="image" href="<?= base_url(); ?>assets/img/klinik_raisha.webp">  
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
    </div>

    <div id="infoMessage">
      <?= $message; ?>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <img src="<?= base_url(); ?>assets/img/klinik_raisha.webp" class="img-fluid mx-auto d-block" alt="Responsive image" width="320" height="124.27" />
        <p class="login-box-msg"></p>
        <form method="post" action="<?= site_url('index.php/auth/login'); ?>">
          <div class="input-group mb-3">
            <input name="identity" id="identity" type="text" value="" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" id="password" type="password" class="form-control" placeholder="Kata Sandi" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember" value="1">
                <label for="remember">
                  Ingat Saya
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-1">
          <a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>  
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha512-Ah5hWYPzDsVHf9i2EejFBFrG2ZAPmpu4ZJtW4MfSgpZacn+M9QHDt+Hd/wL1tEkk1UgbzqepJr6KnhZjFKB+0A==" crossorigin="anonymous"></script>
  </script>

  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/themes/adminLTE/dist/js/adminlte.min.js"></script>
  <script type="text/javascript" language="javascript">
  window.history.forward(1);
  document.addEventListener("onkeydown", my_onkeydown_handler);
  function my_onkeydown_handler()
  {
    switch (event.keyCode)
    {
      case 116 : // F5;
      event.returnValue = false;
      event.keyCode = 0;
      window.status = "We have disabled F5";
      break;
    }
  }
  </script>

</body>

</html>