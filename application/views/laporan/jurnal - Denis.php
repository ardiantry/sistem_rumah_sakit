<?php
//var_dump($master);
//die();
?>

<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>

<div class="row">
    <div class="col-4">
        <form id="FormJurnal">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Kriteria Pencarian</h3>
                </div>
                <div class="card-body">
                    <!-- Date range -->
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="tanggal_transaksi" class="form-control float-right" id="reservation">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        <label>Uraian</label>
                        <input type="text" name="uraian" class="form-control form-control-sm float-right">
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        <label for="layanan">Kode Akun</label>
                        <input type="text" id="KodeAkun" name="kode_akun" class="form-control form-control-sm float-right">
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        <label for="dokter">Debit</label>
                        <div class="row">
                            <div class="input-group input-group-sm col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>
                                <input type="number" name="debit_from" class="form-control float-right">
                            </div>
                            <!-- /.input group -->

                            <div class="input-group input-group-sm col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        To
                                    </span>
                                </div>
                                <input type="number" name="debit_to" class="form-control float-right">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        <label for="dokter">Kredit</label>
                        <div class="row">
                            <div class="input-group input-group-sm col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>
                                <input type="number" name="kredit_from" class="form-control float-right">
                            </div>
                            <!-- /.input group -->

                            <div class="input-group input-group-sm col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        To
                                    </span>
                                </div>
                                <input type="number" name="kredit_to" class="form-control float-right">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <!-- /.form group -->
                </div>
                <div class="card-footer justify-content-between">
                    <div class="form-group">
                        <label for="pilih_tanggal">Menampilkan</label>
                        <select class="form-control form-control-sm custom-select custom-select-sm" name="pilih_tipe" id="pilih_tipe">
                            <option value="total" selected>Jumlah</option>
                            <option value="total_debit">Debit</option>
                            <option value="total_kredit">Kredit</option>
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
                <h5 class="card-title">Laporan Jurnal</h5>
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
                            <th>Uraian</th>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->