<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMRAISHA | Invoice Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/adminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/adminLTE/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice p-2">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header row">
            <div class="col">
              <img src="<?php echo base_url(); ?>assets/img/<?= $klinik->logo; ?>" alt="SIMRAISHA Logo" class="brand-image-xl single d-block" style="opacity: .8; height: 100px;">
            </div>
            <div class="col">
              <h3 class="text-center text-bold">FAKTUR HUTANG</h3>
            </div>
            <div class="col">
              <h5 class="float-right">
                <small>Tanggal: <?= dateFormat($transaksi->tanggal_bayar); ?></small><br>
              </h5>
            </div>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <hr />
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col">
          Kepada:
          <address>
            <strong><?= $transaksi->nama_supplier; ?></strong><br>
            <?= $transaksi->alamat; ?><br>
            Tlp <?= $transaksi->no_telp; ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col">
          &nbsp;
        </div>
        <!-- /.col -->
        <div class="col">
          <table class="table table-sm table-borderless d-none">
            <tr>
              <td>No Po</td>
              <td>: <b><?= $transaksi->no_po; ?></b></td>
            </tr>
            <tr>
              <td>No Faktur</td>
              <td>: <b><?= $transaksi->no_faktur; ?></b></td>
            </tr>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th class="text-right" style="width: 5%;">No</th>
                <th>Uraian</th>
                <th class="text-right" style="width: 15%;">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-right text-nowrap">1</td>
                <td class="text-left text-nowrap">Pembayaran Faktur <b><?= $transaksi->no_faktur; ?></b></td>
                <td class="text-right text-nowrap"><?= rupiah($transaksi->jumlah); ?></td>
              </tr>
            </tbody>
          </table>                               
        </div>
      </div>
      <!-- /.row -->
      <br />
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
        <p class="lead">Keterangan:</p>        
          <table class="table table-bordered">
            <tr>
              <td>
                <div style="min-height:100px"><?= $transaksi->keterangan3; ?></div>                
              </td>
            </tr>
          </table>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          &nbsp;
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col text-center">
          Kasir<br /><br /><br /><br /><br />


          <?php
          $user = $this->ion_auth->user()->row();
          echo $user->first_name . " " . $user->last_name;
          ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->

  <script type="text/javascript">
    window.addEventListener("load", window.print());
  </script>
</body>

</html>