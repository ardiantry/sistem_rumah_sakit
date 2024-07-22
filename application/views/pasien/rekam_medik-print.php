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
                        <div class="col-2">
                            <img src="<?php echo base_url(); ?>assets/img/logo_invoice.jpeg" alt="SIMRAISHA Logo" class="brand-image-xl single d-block" style="opacity: .8; height: 100px;">
                        </div>
                        <div class="col-8">
                            <h3 class="text-center text-bold">KLINIK RAISHA</h3>
                            <h6 class="text-center">
                                <address>
                                    JL. Magelang Km 4,5 Kutuh Dukuh No. 123<br>
                                    Rt.06 Rw.28 Sinduadi, Mlati Sleman<br>
                                    Tlp +62 821 343 042 04
                                </address>
                            </h6>
                        </div>
                        <div class="col-2">

                        </div>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <hr style="border-top: 3px solid #000; padding: 1px 0; border-bottom: 1px solid #000; margin:0; text-align: center; background-color:white;" />

            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50%;">LEMBAR POLIKLINIK</th>
                                <th>NO. RM : <?= $pasien->no_rm; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama Pasien / Name</td>
                                <td><?= $pasien->nama_pasien; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin / Sex</td>
                                <td><?= $pasien->jenis_kelamin_display; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir / Place, Date Of Birth</td>
                                <td><?= $pasien->tempat_lahir .", ". dateFormat($pasien->tanggal_lahir); ?></td>
                            </tr>
                            <tr>
                                <td>Agama / Religion</td>
                                <td><?= $pasien->agama; ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan / Work</td>
                                <td><?= $pasien->pekerjaan_display; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat / Address</td>
                                <td><?= $pasien->alamat; ?></td>
                            </tr>
                            <tr>
                                <td>No Telepon / Telephone Number</td>
                                <td><?= $pasien->no_telp; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
            <p>
                Dalam keadaan penting harap hubungi / Incase of emergency situation whose person should be contacted
                <table class="table table-borderless">
                    <tr>
                        <td style="width: 1px; white-space: nowrap;">Nama / Name</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td style="width: 1px; white-space: nowrap;">No Telepon / Telephone Number</td>
                        <td>: </td>
                    </tr>
                    <tr>
                        <td style="width: 1px; white-space: nowrap;">Alamat / Address</td>
                        <td>: </td>
                    </tr>
                </table>

            </p>
            <br />

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Unit Layanan</th>
                        <th class="text-center">Diagnosis</th>                        
                        <th class="text-center">ICD</th>                                                
                        <th class="text-center">Dokter</th>                           
                        <th class="text-center">Layanan</th>                           
                        <th class="text-center">Obat</th>                                                                                                                        
                    </tr>
                </thead>
                <tbody>
                <?php
            		if (count($rekam_medik) > 0) {
                        foreach($rekam_medik as $key => $row){                        
                ?>                    
                    <tr>
                        <td><?= dateFormat($row->tanggal_pemeriksaan); ?></td>
                        <td><?= $row->nama_unit_layanan; ?></td>
                        <td><?= $row->diagnosa; ?></td>  
                        <td><?= $row->list_icd; ?></td>     
                        <td><?= $row->nama_dokter; ?></td>     
                        <td><?= $row->list_layanan; ?></td>     
                        <td><?= $row->list_obat; ?></td>                                                                        
                    </tr>
                <?php
                        }
            		}
                ?>                     
                </tbody>
            </table>
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>