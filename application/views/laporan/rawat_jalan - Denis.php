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
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="unit_layanan">
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
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="dokter">
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
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="tipe_pasien">
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
                                        <select class="form-control form-control-sm custom-select custom-select-sm" name="layanan">
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
            <!-- /.card-header -->
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description"></p>
                </figure>
                <!-- /.chart-responsive -->
                <br>
                <br>
                <button id="randomizeData" class="d-none">Randomize Data</button>
                <button id="addDataset" class="d-none">Add Dataset</button>
                <button id="removeDataset" class="d-none">Remove Dataset</button>
                <button id="addData" class="d-none">Add Data</button>
                <button id="removeData" class="d-none">Remove Data</button>
                <button id="clearDataset">Clear Data</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Table Laporan</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="table_laporan" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No Registrasi</th>
                            <th>No RM</th>
                            <th>Nama Pasien</th>
                            <th>No Telp</th>
                            <th>Tempat Lahir</th>
                            <th>Golongan Darah</th>
                            <th>Jenis Kelamin</th>
                            <th>Pekerjaan</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                            <th>Unit Layanan</th>
                            <th>Dokter</th>
                            <th>Tipe Pasien</th>
                            <th>Diagnosa</th>
                            <th>Keterangan Pendaftaran</th>
                            <th>Keterangan Pemeriksaan</th>
                            <th>Keterangan Apotek</th>
                            <th>ICD 9</th>
                            <th>ICD 10</th>
                            <th>Tambahan</th>
                            <th>Pendapatan Layanan</th>
                            <th>Pendapatan Obat</th>
                            <th>Pendapatan Tambahan</th>
                            <th>Diskon</th>
                            <th>Pajak</th>
                            <th>Total Tambahan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->