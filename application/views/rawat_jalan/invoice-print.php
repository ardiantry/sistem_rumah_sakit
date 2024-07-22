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
              <h3 class="text-center text-bold">KUITANSI</h3>
              <h5 class="text-center">
                <small>No Transaksi: <b><?= $register->no_registrasi; ?></b></small><br>
              </h5>
            </div>
            <div class="col">
              <h5 class="float-right">
                <small>Tanggal: <?= dateFormat($register->tanggal_bayar); ?></small><br>
              </h5>
            </div>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <hr />
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
          Telah diterima oleh:
          <address>
            <strong><?= $klinik->nama_klinik; ?></strong><br>
            <?= $klinik->alamat; ?> <br />
            <?= $klinik->kota; ?>, <?= $klinik->provinsi; ?> <br />
            Tlp <?= $klinik->no_telp; ?> 
          </address>
        </div>
        <!-- /.col -->
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 offset-xl-4 offset-lg-4">
          Dari:
          <address>
            <strong><?= $register->nama_pasien; ?> (<?= $register->no_rm; ?>)</strong><br>
            <?= $register->alamat; ?><br>
            Tlp <?= $register->no_telp; ?>
          </address>
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
                <th>Nama</th>
                <th class="text-right" style="width: 10%;">Jumlah</th>
                <th class="text-right text-nowrap" style="width: 15%;">Harga</th>
                <th class="text-center" style="width: 10%;">Satuan</th>
                <th class="text-right text-nowrap" style="width: 15%;">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $i = 1;              
            		if (count($layanan) > 0) {
              ?>            
              <tr>
                <td class="text-right"></td>
                <td colspan="5">
                  <b>Rincian Layanan</b>
                </td>
              </tr>
              <?php
                  foreach($layanan as $key => $row){
                    ?>
                      <tr>
                        <td class="text-right"><?= $i ?></td>
                        <td><?= $row->nama_layanan; ?></td>
                        <td class="text-right"><?= $row->jumlah; ?></td>
                        <td class="text-right text-nowrap"><?= rupiah($row->harga_layanan); ?></td>
                        <td class="text-center">-</td>
                        <td class="text-right text-nowrap"><?= rupiah($row->jumlah * $row->harga_layanan); ?></td>
                      </tr>                    
                    <?php
                    $i++;
                  }
                }
              ?>
              <?php
            		if (count($obat) > 0) {
              ?>
              <tr>
                <td class="text-right"></td>
                <td colspan="5">
                  <b><?= ($register->jenis_pemeriksaan == 'Paket Layanan' && $register->id_reference == NULL) ? "Rincian Paket" : "Rincian Obat"; ?></b>
                </td>
              </tr>
              <?php
                  foreach($obat as $key => $row){
                    ?>
                      <tr>
                        <td class="text-right"><?= $i ?></td>
                        <td><?= $row->nama_obat; ?></td>
                        <td class="text-right"><?= ($register->jenis_pemeriksaan == 'Paket Layanan' && $register->id_reference == NULL) ? $register->jumlah_paket : $row->jumlah; ?></td>
                        <td class="text-right text-nowrap"><?= rupiah($row->harga_jual); ?></td>
                        <td class="text-center"><?= $row->nama_satuan; ?></td>
                        <td class="text-right text-nowrap"><?= ($register->jenis_pemeriksaan == 'Paket Layanan' && $register->id_reference == NULL) ? rupiah($register->jumlah_paket * $row->harga_jual) : rupiah($row->jumlah * $row->harga_jual); ?></td>
                      </tr>                    
                    <?php
                    $i++;
                  }
                }                  
              ?>
              <?php
            		if ((count($obatTambahan) > 0) && ($register->jenis_pemeriksaan == 'Paket Layanan')) {
              ?>
              <tr>
                <td class="text-right"></td>
                <td colspan="5">
                  <b>Rincian Obat Tambahan</b>
                </td>
              </tr>
              <?php
                  foreach($obatTambahan as $key => $row){
                    ?>
                      <tr>
                        <td class="text-right"><?= $i ?></td>
                        <td><?= $row->nama_obat; ?></td>
                        <td class="text-right"><?= $row->jumlah; ?></td>
                        <td class="text-right text-nowrap"><?= rupiah($row->harga_jual); ?></td>
                        <td class="text-center"><?= $row->nama_satuan; ?></td>
                        <td class="text-right text-nowrap"><?= rupiah($row->jumlah * $row->harga_jual); ?></td>
                      </tr>                    
                    <?php
                    $i++;
                  }
                }                  
              ?>                
              <?php
            		if (count($lab) > 0) {
              ?>                          
              <tr>
                <td class="text-right"></td>
                <td colspan="5">
                  <b>Rincian Laboratorium</b>
                </td>
              </tr>
              <?php
                }
                  foreach($lab as $key => $row){
                    ?>
                      <tr>
                        <td class="text-right"><?= $i ?></td>
                        <td><?= $row->laboratory_type_desc; ?></td>
                        <td class="text-right">1</td>
                        <td class="text-right text-nowrap"><?= rupiah($row->tarif); ?></td>
                        <td class="text-center">-</td>
                        <td class="text-right text-nowrap"><?= rupiah($row->tarif); ?></td>
                      </tr>                    
                    <?php
                    $i++;                    
                  }
              ?>   
              <?php
            		if (count($rad) > 0) {
              ?>                          
              <tr>
                <td class="text-right"></td>
                <td colspan="5">
                  <b>Rincian Radiologi</b>
                </td>
              </tr>
              <?php
                }
                  foreach($rad as $key => $row){
                    ?>
                      <tr>
                        <td class="text-right"><?= $i ?></td>
                        <td><?= $row->radiology_type_desc; ?></td>
                        <td class="text-right">1</td>
                        <td class="text-right text-nowrap"><?= rupiah($row->tarif); ?></td>
                        <td class="text-center">-</td>
                        <td class="text-right text-nowrap"><?= rupiah($row->tarif); ?></td>
                      </tr>                    
                    <?php
                    $i++;                    
                  }
              ?>                 
              <?php
            		if (count($tambahan) > 0) {
              ?>                          
              <tr>
                <td class="text-right"></td>
                <td colspan="5">
                  <b>Rincian Tambahan</b>
                </td>
              </tr>
              <?php
                }
                  foreach($tambahan as $key => $row){
                    ?>
                      <tr>
                        <td class="text-right"><?= $i ?></td>
                        <td><?= $row->nama_tambahan; ?></td>
                        <td class="text-right"><?= $row->jumlah; ?></td>
                        <td class="text-right text-nowrap"><?= rupiah($row->harga); ?></td>
                        <td class="text-center">-</td>
                        <td class="text-right text-nowrap"><?= rupiah($row->jumlah * $row->harga); ?></td>
                      </tr>                    
                    <?php
                    $i++;                    
                  }
              ?>                                  
              <tr>
                <td colspan="5" class="text-right"><b>Subtotal: </b></td>
                <td class="text-right text-nowrap"><b><?= rupiah($register->subtotal); ?></b></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
          <p class="lead">Rincian Pembayaran:</p>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th class="text-left">Cara Bayar</th>
                <th class="text-right">Jumlah</th>
              </tr>
            </thead>
            <tbody>
            <?php
                  foreach($bayar as $key => $row){
                    ?>
                      <tr>
                        <td class="text-left"><?= $row->cara_bayar; ?></td>
                        <td class="text-right" style="width: 1%;white-space:nowrap;"><?= rupiah($row->jumlah); ?></td>
                      </tr>                    
                    <?php
                  }
              ?>              
              <tr>
                <td class="text-right"><b>Total: </b></td>
                <td class="text-right" style="width: 1%;white-space:nowrap;"><b><?= rupiah($register->total_bayar - $register->kembalian); ?></b></td>
              </tr>
            </tbody>
          </table>
          <p class="lead">Keterangan:</p>        
          <table class="table table-bordered">
            <tr>
              <td>
                <div style="min-height:100px"><?= $register->keterangan4; ?></div>                
              </td>
            </tr>
          </table>            
        </div>
        <!-- /.col -->
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 offset-xl-4 offset-lg-4">
          <p class="lead">Rincian Tagihan:</p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal</th>
                <td class="text-right"><?= rupiah($register->subtotal); ?></td>
              </tr>
              <tr>
                <th>Diskon</th>
                <td class="text-right"><?= rupiah($register->total_diskon); ?></td>
              </tr>
              <tr>
                <th>Pajak (<?= $register->pajak; ?>%)</th>
                <td class="text-right"><?= rupiah($register->total_pajak); ?></td>
              </tr>
              <tr>
                <th>Total Tagihan</th>
                <td class="text-right"><?= rupiah($register->total_tagihan); ?></td>
              </tr>
              <tr>
                <th>Total Bayar</th>
                <td class="text-right"><?= rupiah($register->total_bayar); ?></td>
              </tr>
              <tr>
                <th>Kembalian</th>
                <td class="text-right"><?= rupiah($register->kembalian); ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <br />
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          &nbsp;
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
            echo $user->first_name ." ". $user->last_name;
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