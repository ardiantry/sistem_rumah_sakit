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
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="pilih_tanggal" id="pilih_tanggal">
                                            <option value="created_at" selected>Tanggal Pendaftaran</option>
                                            <option value="tanggal_periksa">Tanggal Daftar Layanan</option>
                                            <option value="tanggal_pemeriksaan">Tanggal Periksa</option>
                                            <option value="tanggal_penyerahan_resep">Tanggal Penyerahan Resep</option>
                                            <option value="tanggal_bayar">Tanggal Pembayaran</option>
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
                                            <input type="text" name="tanggal_filter" class="form-control float-right" id="tanggal_filter" required>
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
                                                <input type="number" name="no_rm_from" class="form-control float-right">
                                            </div>
                                            <!-- /.input group -->

                                            <div class="input-group input-group-sm col">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        To
                                                    </span>
                                                </div>
                                                <input type="number" name="no_rm_to" class="form-control float-right">
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
                                    <div class="form-group  ">
                                        <label> Tanggal Lahir</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="tanggal_lahir" class="form-control float-right" id="tanggal_lahir">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
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
                                                <input class="custom-control-input" type="checkbox" id="<?= "checkboxPekerjaan_" . $value->id ?>" name="pekerjaan" value="<?= $value->id ?>" data-label="<?= $value->pekerjaan ?>">
                                                <label for="<?= "checkboxPekerjaan_" . $value->id ?>" class="custom-control-label"><?= $value->pekerjaan ?></label>
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
                                        <input type="text" name="keterangan_pasien" class="form-control float-right">
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
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="unit_layanan" id="unit_layanan">
                                            <option value="" selected>Semua Unit Layanan</option>
                                            <?php
                                            foreach ($master['unit_layanan'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id ?>"><?= $value->nama_unit_layanan ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Dokter</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="dokter" id="dokter">
                                            <option value="" selected>Semua Dokter</option>
                                            <?php
                                            foreach ($master['dokter'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id ?>"><?= $value->nama_dokter ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Tipe Pasien</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="tipe_pasien" id="tipe_pasien">
                                            <option value="" selected>Semua Tipe Pasien</option>
                                            <?php
                                            foreach ($master['tipe_pasien'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id ?>"><?= $value->tipe_pasien ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
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
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="layanan" id="layanan">
                                            <option value="" selected>Semua Layanan</option>
                                            <?php
                                            foreach ($master['layanan'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id ?>"><?= $value->nama_layanan ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Pendapatan Layanan</label>
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
                                        <input type="text" id="nama_obat" name="nama_obat" class="form-control form-control-sm float-right">
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group">
                                        <label for="dokter">Pendapatan Obat</label>
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
                                        <label for="dokter">Pendapatan Tamabahan</label>
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
                                        <label for="layanan">Cara Bayar</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="cara_bayar" id="cara_bayar">
                                            <option value="" selected>Semua Cara Bayar</option>
                                            <?php
                                            foreach ($master['cara_bayar'] as $key => $value) {
                                            ?>
                                                <option value="<?= $value->cara_bayar_column ?>"><?= $value->cara_bayar ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
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
                            <option value="pendapatan_layanan">Pendapatan Layanan</option>
                            <option value="pendapatan_obat">Pendapatan Penjualan Obat</option>
                            <option value="pendapatan_tambahan">Pendapatan Tambahan</option>
                            <option value="total_diskon">Diskon</option>
                            <option value="total_pajak">Pajak</option>
                            <option value="total_tagihan">Total Tagihan</option>
                        </select>
                    </div>
                    <button class="btn btn-primary float-right" id="show_data">Tampilkan Data</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Grafik Laporan Layanan</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="card card-danger card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="chart-card-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab_day" data-toggle="pill" href="#tab_day_content" role="tab" aria-controls="tab_day_content" aria-selected="true">Day</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab_month" data-toggle="pill" href="#tab_month_content" role="tab" aria-controls="tab_month_content" aria-selected="false">Month</a>
                            </li>
                            <li class="nav-item  ">
                                <a class="nav-link" id="tab_year" data-toggle="pill" href="#tab_year_content" role="tab" aria-controls="tab_year_content" aria-selected="false">Year</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="chart-card-tabs-content">
                            <div class="tab-pane fade show active" id="tab_day_content" role="tabpanel" aria-labelledby="tab_day">
                                <figure class="highcharts-figure">
                                    <div id="containerDay"></div>
                                    <p class="highcharts-description"></p>
                                </figure>
                            </div>
                            <div class="tab-pane fade" id="tab_month_content" role="tabpanel" aria-labelledby="tab_month">
                                <figure class="highcharts-figure">
                                    <div id="containerMonth"></div>
                                    <p class="highcharts-description"></p>
                                </figure>
                            </div>
                            <div class="tab-pane fade" id="tab_year_content" role="tabpanel" aria-labelledby="tab_year">
                                <figure class="highcharts-figure">
                                    <div id="containerYear"></div>
                                    <p class="highcharts-description"></p>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description"></p>
                </figure>
                <!-- /.chart-responsive -->
                <br>
                <br>
                <button id="clearDataset" class="btn btn-secondary">Clear Data</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Table Laporan Layanan</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive" id="table-card">
                <div class="card card-danger card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="table-card-tabs" role="tablist">

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="table-card-tabs-content">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->