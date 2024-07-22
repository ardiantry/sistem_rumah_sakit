<?php
//var_dump($master);
//die();
?>

<div class="row">
    <div class="col-4">
        <form id="FormPendaftaran">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Kriteria Pencarian</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div id="accordion">
                        <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Filter Tanggal
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse show">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="pilih_tanggal">Pilih Filter Tanggal</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="pilih_tanggal">
                                            <option value="created_at" selected>Tanggal Pendaftaran</option>
                                            <option value="tanggal_periksa">Tanggal Daftar Layanan</option>
                                            <option value="tanggal_pemeriksaan">Tanggal Periksa</option>
                                            <option value="tanggal_penyerahan_resep">Tanggal Penyerahan Resep</option>
                                            <option value="tanggal_bayar">Tanggal Nota</option>
                                        </select>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="tanggal_pendaftaran" class="form-control float-right" id="tanggal_pendaftaran">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group d-none">
                                        <label>Tanggal Daftar Layanan</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="tanggal_daftar_layanan" class="form-control float-right" id="tanggal_daftar_layanan">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group d-none">
                                        <label>Tanggal Periksa</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="tanggal_periksa" class="form-control float-right" id="tanggal_periksa">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group d-none">
                                        <label>Tanggal Penyerahan Resep</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="tanggal_penyerahan_resep" class="form-control float-right" id="tanggal_penyerahan_resep">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group d-none">
                                        <label>Tanggal Nota</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="tanggal_nota" class="form-control float-right" id="tanggal_nota">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                            </div>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Pendaftaran
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="card-body">
                                    <div class="form-group d-none">
                                        <label>Periode Transaksi</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="month" class="form-control float-right" name="periode">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group d-none">
                                        <label>Periode Transaksi</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="periode_transaksi" class="form-control float-right" id="reservation">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>No RM</label>
                                        <div class="row">
                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        From
                                                    </span>
                                                </div>
                                                <input type="number" name="rm_from" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->

                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        To
                                                    </span>
                                                </div>
                                                <input type="number" name="rm_to" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input type="text" name="nama_pasien" class="form-control form-control-sm float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="text" name="no_telp" class="form-control form-control-sm float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control form-control-sm float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Golongan Darah</label>
                                        <?php
                                        foreach ($master['golongan_darah'] as $key => $value) {
                                        ?>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="<?= "checkboxGolonganDarah" . $key ?>" type="checkbox" name="golongan_darah" value="<?= $value ?>">
                                                <label for="<?= "checkboxGolonganDarah" . $key ?>" class="custom-control-label"><?= $value ?></label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <?php
                                        foreach ($master['jenis_kelamin'] as $key => $value) {
                                        ?>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="<?= "checkboxJenisKelamin" . $key ?>" name="jenis_kelamin" value="<?= $key ?>">
                                                <label for="<?= "checkboxJenisKelamin" . $key ?>" class="custom-control-label"><?= $value ?></label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <?php
                                        foreach ($master['pekerjaan'] as $key => $value) {
                                        ?>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="<?= "checkboxPekerjaan" . $key ?>" name="pekerjaan" value="<?= $value->id ?>">
                                                <label for="<?= "checkboxPekerjaan" . $key ?>" class="custom-control-label"><?= $value->pekerjaan ?></label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <?php
                                        foreach ($master['agama'] as $key => $value) {
                                        ?>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="<?= "checkboxAgama" . $key ?>" name="agama" value="<?= $value ?>">
                                                <label for="<?= "checkboxAgama" . $key ?>" class="custom-control-label"><?= $value ?></label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" class="form-control float-right">
                                    </div>
                                    <!-- /.form group -->
                                </div>
                            </div>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Unit Layanan
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="unit_layanan">Unit Layanan</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm unit_layanan" name="unit_layanan">
                                            <option value="" selected>Semua Unit Layanan</option>
                                            <?php
                                            foreach ($master['unit_layanan'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id ?>"><?= $value->nama_unit_layanan ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" id="nama_unit_layanan" name="nama_unit_layanan" value="">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Dokter</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm dokter" name="dokter">
                                            <option value="" selected>Semua Dokter</option>
                                            <?php
                                            foreach ($master['dokter'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id ?>"><?= $value->nama_dokter ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" id="nama_dokter" name="nama_dokter" value="">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Tipe Pasien</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm tipe_pasien" name="tipe_pasien">
                                            <option value="" selected>Semua Tipe Pasien</option>
                                            <?php
                                            foreach ($master['tipe_pasien'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id ?>"><?= $value->tipe_pasien ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" id="nama_tipe_pasien" name="nama_tipe_pasien" value="">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan_unit_layanan" class="form-control float-right">
                                    </div>
                                    <!-- /.form group -->
                                </div>
                            </div>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                        Pemeriksaan
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="layanan">Nama Layanan</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm nama_layanan" name="layanan">
                                            <option value="" selected>Semua Layanan</option>
                                            <?php
                                            foreach ($master['layanan'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id ?>"><?= $value->nama_layanan ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" id="nama_layanan_text" name="nama_layanan_text" value="">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Harga Layanan</label>
                                        <div class="row">
                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        From
                                                    </span>
                                                </div>
                                                <input type="number" name="layanan_from" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->

                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        To
                                                    </span>
                                                </div>
                                                <input type="number" name="layanan_to" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Diagnosis</label>
                                        <input type="text" name="diagnosis" class="form-control form-control-sm float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>ICD 9</label>
                                        <input type="text" name="icd9" class="form-control form-control-sm float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>ICD 10</label>
                                        <input type="text" name="icd10" class="form-control form-control-sm float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan_pemeriksaan" class="form-control float-right">
                                    </div>
                                    <!-- /.form group -->
                                </div>
                            </div>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                        Apotek
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse">
                                <div class="card-body">
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="layanan">Nama Obat</label>
                                        <input type="text" id="NamaObat" name="nama_obat" class="form-control form-control-sm float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Harga Obat</label>
                                        <div class="row">
                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        From
                                                    </span>
                                                </div>
                                                <input type="number" name="obat_from" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->

                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        To
                                                    </span>
                                                </div>
                                                <input type="number" name="obat_to" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan_apotek" class="form-control float-right">
                                    </div>
                                    <!-- /.form group -->
                                </div>
                            </div>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                        Pembayaran
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSix" class="panel-collapse collapse">
                                <div class="card-body">
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Nama Rincian Tambahan</label>
                                        <input type="text" name="rincian_tambahan" class="form-control form-control-sm float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Harga Rincian Tamabahan</label>
                                        <div class="row">
                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        From
                                                    </span>
                                                </div>
                                                <input type="number" name="tambahan_from" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->

                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        To
                                                    </span>
                                                </div>
                                                <input type="number" name="tambahan_to" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Diskon</label>
                                        <div class="row">
                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        From
                                                    </span>
                                                </div>
                                                <input type="number" name="diskon_from" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->

                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        To
                                                    </span>
                                                </div>
                                                <input type="number" name="diskon_to" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Pajak</label>
                                        <div class="row">
                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        From
                                                    </span>
                                                </div>
                                                <input type="number" name="pajak_from" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->

                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        To
                                                    </span>
                                                </div>
                                                <input type="number" name="pajak_to" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="layanan">Cara Bayar</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="cara_bayar">
                                            <option value="" selected>Semua Cara Bayar</option>
                                            <?php
                                            foreach ($master['cara_bayar'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id ?>"><?= $value->cara_bayar ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Total Tagihan</label>
                                        <div class="row">
                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        From
                                                    </span>
                                                </div>
                                                <input type="number" name="tagihan_from" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->

                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        To
                                                    </span>
                                                </div>
                                                <input type="number" name="tagihan_to" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan_pembayaran" class="form-control float-right">
                                    </div>
                                    <!-- /.form group -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer justify-content-between">
                    <div class="form-group">
                        <label for="pilih_tanggal">Menampilkan</label>
                        <select class="form-control form-control-sm custom-select custom-select-sm" name="pilih_tipe" id="pilih_tipe">
                            <option value="total" selected>Jumlah</option>
                            <option value="harga_layanan">Harga Layanan</option>
                            <option value="harga_obat">Harga Penjualan Obat</option>
                            <option value="harga_tambahan">Harga Rincian Tambahan</option>
                            <option value="total_diskon">Diskon</option>
                            <option value="total_pajak">Pajak</option>
                            <option value="total_tagihan">Total Tagiahan</option>
                        </select>
                    </div>
                    <button class="btn btn-primary float-right" id="show_data">Tampilkan Data</button>
                </div>
            </div>
            <div class="card card-primary d-none">
                <div class="card-header">
                    <h3 class="card-title">Kriteria Pencarian</h3>
                </div>
                <div class="card-body">
                    <!-- Date range -->

                </div>

            </div>
        </form>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Laporan Layanan</h5>
            </div>
            
            <div class="card-body"> <!-- Miqdad RUBAH DI SINI Start-->

            <div class="card card-danger card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Day</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Month</a>
                                    </li>
                                    <li   class="nav-item  ">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Year</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                        <figure class="highcharts-figure">
                                        <div id="container"></div>
                                        <p class="highcharts-description"></p>
                                        </figure>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                        <figure class="highcharts-figure">
                                        <div id="containerMonth"></div>
                                        <p class="highcharts-description"></p>
                                        </figure>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                        <figure class="highcharts-figure">
                                        <div id="containerYear"></div>
                                        <p class="highcharts-description"></p>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        <!-- /.card-body -->
                    </div>
               
                <!-- /.chart-responsive -->
                <br>
                <br>
                <button id="randomizeData" class="d-none">Randomize Data</button>
                <button id="addDataset" class="d-none">Add Dataset</button>
                <button id="removeDataset" class="d-none">Remove Dataset</button>
                <button id="addData" class="d-none">Add Data</button>
                <button id="removeData" class="d-none">Remove Data</button>
                <button id="clearDataset">Clear Data</button>
            </div> <!-- Miqdad RUBAH DI SINI End-->
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Table Laporan</h5></br>
               
            </div>
            <!-- /.card-header -->

            <div class="card card-danger card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li id="tab_1" class="nav-item  ">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-1" role="tab" aria-controls="custom-tabs-one-1" aria-selected="true">Dataset1</a>
                                    </li>
                                    <li id="tab_2" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-2" role="tab" aria-controls="custom-tabs-one-2 aria-selected="false">Dataset2</a>
                                    </li>
                                    <li id="tab_3" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-3" role="tab" aria-controls="custom-tabs-one-3" aria-selected="false">Dataset3</a>
                                    </li>
                                    <li id="tab_4" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-4" role="tab" aria-controls="custom-tabs-one-4" aria-selected="false">Dataset4</a>
                                    </li>
                                    <li id="tab_5" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-5" role="tab" aria-controls="custom-tabs-one-5" aria-selected="false">Dataset5</a>
                                    </li>
                                    <li id="tab_6" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-6" role="tab" aria-controls="custom-tabs-one-6" aria-selected="false">Dataset6</a>
                                    </li>
                                    <li id="tab_7" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-7" role="tab" aria-controls="custom-tabs-one-7" aria-selected="false">Dataset7</a>
                                    </li>
                                    <li id="tab_8" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-8" role="tab" aria-controls="custom-tabs-one-8" aria-selected="false">Dataset8</a>
                                    </li>
                                    <li id="tab_9" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-9" role="tab" aria-controls="custom-tabs-one-9" aria-selected="false">Dataset9</a>
                                    </li>
                                    <li id="tab_10" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-10" role="tab" aria-controls="custom-tabs-one-10" aria-selected="false">Dataset10</a>
                                    </li>
                                    <li id="tab_11" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-11" role="tab" aria-controls="custom-tabs-one-11" aria-selected="false">Dataset11</a>
                                    </li>
                                    <li id="tab_12" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-12" role="tab" aria-controls="custom-tabs-one-12" aria-selected="false">Dataset12</a>
                                    </li>
                                    <li id="tab_13" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-13" role="tab" aria-controls="custom-tabs-one-13" aria-selected="false">Dataset13</a>
                                    </li>
                                    <li id="tab_14" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-14" role="tab" aria-controls="custom-tabs-one-14" aria-selected="false">Dataset14</a>
                                    </li>
                                    <li id="tab_15" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-15" role="tab" aria-controls="custom-tabs-one-15" aria-selected="false">Dataset15</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-1" role="tabpanel" aria-labelledby="custom-tabs-one-1-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan1" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable1"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-2" role="tabpanel" aria-labelledby="custom-tabs-one-2-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan2" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable2"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-3" role="tabpanel" aria-labelledby="custom-tabs-one-3-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan3" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable3"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-4" role="tabpanel" aria-labelledby="custom-tabs-one-4-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan4" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable4"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-5" role="tabpanel" aria-labelledby="custom-tabs-one-5-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan5" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable5"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-6" role="tabpanel" aria-labelledby="custom-tabs-one-6-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan6" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable6"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-7" role="tabpanel" aria-labelledby="custom-tabs-one-7-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan7" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable7"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-8" role="tabpanel" aria-labelledby="custom-tabs-one-8-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan8" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable8"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-9" role="tabpanel" aria-labelledby="custom-tabs-one-9-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan9" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable9"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-10" role="tabpanel" aria-labelledby="custom-tabs-one-10-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan10" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable10"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-11" role="tabpanel" aria-labelledby="custom-tabs-one-11-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan11" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable11"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-12" role="tabpanel" aria-labelledby="custom-tabs-one-12-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan12" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable12"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-13" role="tabpanel" aria-labelledby="custom-tabs-one-13-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan13" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable13"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-14" role="tabpanel" aria-labelledby="custom-tabs-one-14-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan14" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable14"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-15" role="tabpanel" aria-labelledby="custom-tabs-one-15-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan15" class="table table-hover text-nowrap">
                                                <thead>
                                                <tr>
                                                <th colspan="13">
                                                Filter : <p id="filterTable15"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No Registrasi</th>
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>No Telp</th>
                                                        <th>Tempat Lahir</th> 
                                                        <th>Tanggal Lahir</th> 
                                                        <th>Golongan Darah</th> 
                                                        <th>Jenis Kelamin</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Agama</th>
                                                        <th>Alamat</th>
                                                        <th>Keterangan Pasien</th>
                                                        
                                                        <th>Tanggal Unit Layanan</th>
                                                        <th>Unit Layanan</th>
                                                        <th>Dokter</th>
                                                        <th>Tipe Pasien</th> 
                                                        <th>Keterangan Unit Layanan</th>
                                                        
                                                        
                                                        <th>Tanggal Pemeriksaan</th> 
                                                        <th>Diagnosa</th>
                                                        <th>ICD 10</th> 
                                                        <th>Rincian Layanan</th>
                                                        <th>ICD 9</th>
                                                        
                                                        
                                                        <th>Tanggal Penyerahan Resep</th>  
                                                        <th>Rincian Obat</th> 
                                                        <th>Keterangan Apotek</th> 
                                                        
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Tambahan</th>
                                                        <th>Pendapatan Layanan</th>
                                                        <th>Pendapatan Obat</th>
                                                        <th>Pendapatan Tambahan</th>
                                                        <th>Diskon</th>
                                                        <th>Pajak</th>
                                                        <th>Total Tagihan</th>
                                                        <th>Cara Pembayaran 1</th>
                                                        <th>Total Pembayaran 1</th>
                                                        <th>Cara Pembayaran 2</th>
                                                        <th>Total Pembayaran 2</th>
                                                        <th>Cara Pembayaran 3</th>
                                                        <th>Total Pembayaran 3</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                        <!-- /.card-body -->
                    </div>


           
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->