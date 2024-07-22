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
    #modal-registrasi-success .mb-3 {
  background: rgb(219, 216, 216);
  padding: 30px;
  border: 1px solid #ccc;
  box-shadow: 0px 0px 6px 2px rgba(94, 86, 86, 0.33);
  border-radius: 5px;
  margin-top: 30px;
  text-align: justify;
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
     
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <img src="<?= base_url(); ?>assets/img/klinik_raisha.webp" class="img-fluid mx-auto d-block" alt="Responsive image" width="320" height="124.27" />
        <p class="login-box-msg"></p>
        <form method="post" id="simpanRegistrasi" name="simpanRegistrasi" action="#">
          <div class="msg-alert"></div>
          <div class="input-group mb-3">
            <input name="first_name" id="first_name" type="text" value="" maxlength="100" minlength="2" class="form-control" placeholder="Nama Lengkap" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>



          <div class="input-group mb-3">
            <input name="identity" id="identity" type="email" value="" maxlength="100"  minlength="2" class="form-control" placeholder="Email" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input name="no_wa" id="no_wa" type="text" value="" maxlength="14" minlength="10" class="form-control" placeholder="Nomor WA" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input name="kantor" id="kantor" type="text" value="" maxlength="100" minlength="2" class="form-control" placeholder="Nama Tempat Usaha" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <textarea name="alamat_kantor" id="alamat_kantor"  class="form-control" placeholder="Lokasi Tempat Usaha" ></textarea>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <textarea name="keterangan" id="keterangan"  class="form-control" placeholder="keterangan" ></textarea>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input name="password" id="password" autocomplete="new-password"  type="password" maxlength="100" minlength="2" class="form-control" placeholder="Kata Sandi" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input name="re_password" id="re_password" autocomplete="new-password" type="password" maxlength="100" minlength="2" class="form-control" placeholder="Ulang Kata Sandi" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="form-gorup mb-3" >
                             <div id="html_element"></div>   
                        </div>
            <div class="input-group mb-3">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
           
        </form>

        <p class="mb-1">
          <a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.registrasi-box -->

<div class="modal fade" id="modal-registrasi-success">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Terimakasih</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
              <div class="text-center">
                
                  <img src="<?= base_url(); ?>assets/img/klinik_raisha.webp" class="img-fluid mx-auto d-block" alt="Responsive image" width="320" height="124.27" />
                  <div class="mb-3">
                    <h5>Terimakasi sudah melakukan pendaftaran</h5>
                    <p>Data anda akan segera kami tindak lanjuti.</p>
                    <p>Mohon di tunggu, untuk proses aktifasi selambat-lambatnya 7hari kerja</p> 
                    <p>Untuk registrasi package premium silahkan melanjutkan pembayaran melalui tombol 
                      <a class="mayar-product-embed" href="https://kliksimraisha.mayar.link/payme" data-hide-merchant-logo="true" data-hide-product-images="true" data-hide-header="true" data-hide-badge-secure="true" data-hide-language="true" >Bayar</a>
<script type="text/javascript" src="https://pub-fa933e278fb7467aa20592e0a61f5082.r2.dev/mayar-embed.js"></script></p>
                    <p>Untuk info lebih lanjut silahkan hubungi admin SIMRaisha 081953529664 </p>
                  </div>
              </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


  <!--  SCRIPTS -->
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>  
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha512-Ah5hWYPzDsVHf9i2EejFBFrG2ZAPmpu4ZJtW4MfSgpZacn+M9QHDt+Hd/wL1tEkk1UgbzqepJr6KnhZjFKB+0A==" crossorigin="anonymous"></script>
  </script>

  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/themes/adminLTE/dist/js/adminlte.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback"  async defer> </script>
<script type="text/javascript">
    var pbl_key='6LeplC8UAAAAABIan4W8Dh80_IfapIDAUCkiWO7t';
    var onloadCallback = function() {
    grecaptcha.render('html_element', {
      'sitekey' : pbl_key
    });
  };
</script>
  <script type="text/javascript" language="javascript">
  $(document).ready(function()
  {

<?php 
    echo @$this->uri->segment(3) === 'premium'?'var package="premium";':'var package="free";';
 ?>

    $('body').delegate('#simpanRegistrasi','submit',function(e)
  {
    e.preventDefault(); 
    var this_=$(this);
    this_.find('.msg-alert').empty();
    this_.find('.form-control').removeClass('is-invalid').removeAttr('title');
    this_.find('button[type="submit"]').html('loading...');
    this_.find('button[type="submit"]').attr('disabled','disabled');  
    const formsimpan  = document.forms.namedItem('simpanRegistrasi'); 
    const Form_reg  = new FormData(formsimpan); 
    Form_reg.append('package',`${package}`);
    fetch(`<?php echo base_url(); ?>/Member/simpanRegistrasi`, { method: 'POST',body:Form_reg}).then(res => res.json()).then(data => 
    {  
      this_.find('button[type="submit"]').html('Proses');
      this_.find('button[type="submit"]').removeAttr('disabled');
      grecaptcha.reset();
      if(data.error)
      {
        const key=Object.keys(data.alert);
        for(let k of key)
        {
            if(k!=='alert')
            {
                $(`#${k}`).addClass('is-invalid');
                $(`#${k}`).attr('title',`${data.alert[k]}`);
            }
            else
            {
              this_.find('.msg-alert').html(`<div class="alert alert-danger">${data.alert[k]}</div>`);
            }
        }
      
      }
      else
      {
        this_.find('.msg-alert').html(`<div class="alert alert-success">${data.alert.alert}</div>`); 
        setTimeout(function(){ 
                 $('#modal-registrasi-success').modal('show');
              },1000);
      }

    }).catch(error => {
        grecaptcha.reset();
        this_.find('button[type="submit"]').html('Proses');
        this_.find('button[type="submit"]').removeAttr('disabled'); 
        alert(`koneksi terputus`);
        }); 
  }); 

  });
  </script>

</body>

</html>