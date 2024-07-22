<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/ico.png" sizes="32x32">
  <title>SIMRAISHA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="preload" href="<?php echo base_url(); ?>assets/themes/adminLTE/plugins/fontawesome-free/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" media="all">
  <noscript><link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/adminLTE/plugins/fontawesome-free/css/all.min.css" media="all"></noscript>

  <!-- Bootstrap 4 -->
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" integrity="sha512-tDXPcamuZsWWd6OsKFyH6nAqh/MjZ/5Yk88T5o+aMfygqNFPan1pLyPFAndRzmOWHKT+jSDzWpJv8krj6x1LMA==" crossorigin="anonymous" media="all">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha512-tDXPcamuZsWWd6OsKFyH6nAqh/MjZ/5Yk88T5o+aMfygqNFPan1pLyPFAndRzmOWHKT+jSDzWpJv8krj6x1LMA==" crossorigin="anonymous" media="all"></noscript>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
  <?php
  /** -- Start CSS -- */
  foreach ($css as $file) {
    echo "\n\t\t"; ?>
    <link rel="preload" href="<?= $file; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" media="all">
    <noscript><link rel="stylesheet" href="<?= $file; ?>" media="all"></noscript>    
  <?php
  }
  echo "\n\t";
  /** -- End CSS -- */
  ?>

  <!-- Theme style -->
  <link rel="preload" href="<?php echo base_url(); ?>assets/themes/adminLTE/dist/css/adminlte.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/adminLTE/dist/css/adminlte.min.css"></noscript>
  
  <!-- overlayScrollbars -->
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.12.0/css/OverlayScrollbars.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" media="all">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.12.0/css/OverlayScrollbars.min.css" media="all"></noscript>     
  

  <style>
    .custom-select-sm {
      font-size: inherit;
    }
    .highcharts-credits{
        display:none;
    }    
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }    

    ul{
	padding-inline-start: 0;
}
.filtr-container{
	padding: 1rem;
}
.filtr-container .filtr-item .item-desc {
    bottom: 0.5rem;
    left: 0.5rem;
}
.filtr-container .filtr-item .item-desc, .filtr-container .filtr-item .item-index {
    position: absolute;
    color: #fff;
    text-transform: uppercase;
	  font-size: 0.5rem;
    padding: 0 0.5rem;
    background-color: rgba(0,0,0,.5);
    border-radius: 3px;
    z-index: 1;
}

@media only screen and (max-width: 768px) {
  .fltr-controls.btn {
    font-size: 0.75rem;
  }
  .filtr-container .filtr-item .item-desc {
    font-size: 0.4rem;	  
  }
  .filtr-container .filtr-item.col-md-2 {
      -ms-flex: 0 0 20%;
      flex: 0 0 20%;
      max-width: 20%;
  }  
}    
  </style>
</head>

<body class="hold-transition sidebar-mini text-sm">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-white navbar-light">

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <?php
          if (isset($secondaryMenu)) {
          ?>
            <li class="nav-item dropdown <?= ($secondaryMenu->is_active == "pendaftaran") ? "active" : ""; ?>">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Pendaftaran</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= site_url('MasterData/agama') ?>" class="dropdown-item d-none">Agama </a></li>
                <li><a href="<?= site_url('MasterData/pekerjaan') ?>" class="dropdown-item">Pekerjaan</a></li>
                <li><a href="<?= site_url('MasterData/golongan_darah') ?>" class="dropdown-item d-none">Golongan Darah</a></li>
                <li><a href="<?= site_url('MasterData/tipe_pasien') ?>" class="dropdown-item">Tipe Pasien</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown <?= ($secondaryMenu->is_active == "unit_layanan") ? "active" : ""; ?>">
              <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Unit Layanan</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li><a href="<?= site_url('MasterData/unit_layanan') ?>" class="dropdown-item">Unit Layanan </a></li>
                <li><a href="<?= site_url('MasterData/dokter') ?>" class="dropdown-item">Dokter</a></li>
                <li><a href="<?= site_url('MasterData/petugas') ?>" class="dropdown-item">Petugas</a></li>
                <li><a href="<?= site_url('MasterData/layanan') ?>" class="dropdown-item">Layanan</a></li>
                <li><a href="<?= site_url('MasterData/laboratory') ?>" class="dropdown-item">Laboratorium</a></li>
                <li><a href="<?= site_url('MasterData/radiology') ?>" class="dropdown-item">Radiologi</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown <?= ($secondaryMenu->is_active == "apotek") ? "active" : ""; ?>">
              <a id="dropdownSubMenu3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Apotek</a>
              <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                <li><a href="<?= site_url('MasterData/jenis_obat') ?>" class="dropdown-item d-none">Jenis Obat </a></li>
                <li><a href="<?= site_url('MasterData/satuan') ?>" class="dropdown-item d-none">Satuan</a></li>
                <li><a href="<?= site_url('MasterData/spesifikasi') ?>" class="dropdown-item d-none">Spesifikasi</a></li>
                <li><a href="<?= site_url('MasterData/jenis_racikan') ?>" class="dropdown-item d-none">Jenis Racikan</a></li>
                <li><a href="<?= site_url('Apotek/master_obat') ?>" class="dropdown-item">Obat BHP</a></li>
                <li><a href="<?= site_url('Apotek/master_racikan') ?>" class="dropdown-item">Obat Racikan</a></li>
                <li><a href="<?= site_url('MasterData/supplier') ?>" class="dropdown-item">Supplier</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown <?= ($secondaryMenu->is_active == "pembayaran") ? "active" : ""; ?>">
              <a id="dropdownSubMenu4" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Pembayaran</a>
              <ul aria-labelledby="dropdownSubMenu4" class="dropdown-menu border-0 shadow">
                <li><a href="<?= site_url('MasterData/cara_bayar') ?>" class="dropdown-item">Cara Bayar </a></li>
              </ul>
            </li>
            <li class="nav-item dropdown <?= ($secondaryMenu->is_active == "rawat_inap") ? "active" : ""; ?>">
              <a id="dropdownSubMenu4" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Rawat Inap</a>
              <ul aria-labelledby="dropdownSubMenu4" class="dropdown-menu border-0 shadow">
                <li><a href="<?= site_url('MasterData/kelas') ?>" class="dropdown-item">Kelas </a></li>
                <li><a href="<?= site_url('MasterData/ruangan') ?>" class="dropdown-item">Ruangan </a></li>
                <li><a href="<?= site_url('MasterData/bed') ?>" class="dropdown-item">Bed </a></li>
              </ul>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown d-none">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <?php
            $user = $this->ion_auth->user()->row();
            echo $user->first_name . " " . $user->last_name;
            ?>
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
            <a href="<?= site_url('Auth/logout'); ?>" class="dropdown-item logout">
              <i class="fas fa-sign-out-alt mr-2"></i> Keluar
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <?php echo $this->load->get_section('sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
              <?php
              if (isset($listKlinik)) {
              ?>
                <div class="form-group">
                  <label for="pilih_klinik" class="mr-3">Pilih klinik/apotek: </label>
                  <?= form_dropdown('nama_klinik', $listKlinik, 0, 'class="form-control form-control-sm custom-select custom-select-sm col-4" id="nama_klinik"'); ?>
              </div>
                <?php 
                }
                ?>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <?php
                  if (isset($TanggalDashboard)) {
                  ?>
                    <div class="form-group row">
                      <label for="pilih_tanggal" class="col-4 col-form-label">Pilih Tanggal: </label>
                      <div class="col-8">
                        <div class="input-group date datepicker" id="datePilihTanggal" data-target-input="nearest" data-input="pilih_tanggal">
                          <input type="text" id="pilih_tanggal" name="pilih_tanggal" class="form-control form-control-sm datetimepicker-input" data-target="#datePilihTanggal" />
                          <div class="input-group-append" data-target="#datePilihTanggal" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <?php echo $output; ?>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- Default to the left -->
      <strong>Copyright &copy; 2020 <a href="https://www.simraisha.com/">SIMRAISHA</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
<?php
$this->load->view('themes/modal');
?>
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
   
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>   -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js" integrity="sha512-ubuT8Z88WxezgSqf3RLuNi5lmjstiJcyezx34yIU2gAHonIi27Na7atqzUZCOoY4CExaoFumzOsFQ2Ch+I/HCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
  <!-- Bootstrap 4 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha512-Ah5hWYPzDsVHf9i2EejFBFrG2ZAPmpu4ZJtW4MfSgpZacn+M9QHDt+Hd/wL1tEkk1UgbzqepJr6KnhZjFKB+0A==" crossorigin="anonymous"></script> -->

  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/themes/adminLTE/dist/js/adminlte.min.js"></script>

  <!-- overlayScrollbars -->
  <script scr="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.12.0/js/OverlayScrollbars.min.js"></script>

  <script type="text/javascript">
    const BASE_URL = "<?= base_url(); ?>";
    const WIZARD_INDEX = "<?= (isset($wizard_index)) ? $wizard_index : 0; ?>";
    const PAGE_MENU = "<?= (isset($page_menu)) ? $page_menu : "Dashboard"; ?>";
  </script>

  <?php
  /** -- Start JS -- */
  foreach ($js as $file) {
    echo "\n\t\t"; ?>
    <script src="<?= $file; ?>"></script>
  <?php
  }
  echo "\n\t";
  /** -- End JS -- */
  ?>
  
  <script type="text/javascript">
    $(document).ready(function() {
      var menu;
      $menu = $('#menu_' + PAGE_MENU);
      $menu.toggleClass('active');
      $menu.closest('ul').closest('li').toggleClass('menu-open').find(' > .nav-link').toggleClass('active');

      $("a.logout").on("click", function(e) {
        var link = this;
        e.preventDefault();

        bootbox.confirm({
          title: "Konfirmasi",
          message: "Apakah benar mau keluar ?",
          centerVertical: true,
          buttons: {
            cancel: {
              label: '<i class="fa fa-times"></i> Tidak',
              className: 'btn-danger'
            },
            confirm: {
              label: '<i class="fa fa-check"></i> Ya',
              className: 'btn-success'
            }
          },
          callback: function(result) {
            if (result === true) {
              window.location = link.href;
            }
          }
        });

      });
    });
  </script>

</body>

</html>