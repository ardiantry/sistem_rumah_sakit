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
        <form id="FormLaporan">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kriteria Pencarian</h3>
                </div>
                <div class="card-body">
                    <!-- Date range -->
                    <div class="form-group">
                        <label>Periode Transaksi</label>
                        <div class="input-group">
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
                        <div class="input-group">
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
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>
                                <input type="number" name="rm_from" class="form-control float-right">
                            </div>
                            <!-- /.input group -->

                            <div class="input-group col">
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
                        <input type="text" name="nama_pasien" class="form-control float-right">
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" name="no_telp" class="form-control float-right">
                    </div>
                    <!-- /.form group -->
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
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>
                                <input type="number" name="layanan_from" class="form-control float-right">
                            </div>
                            <!-- /.input group -->

                            <div class="input-group col">
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
                        <label for="layanan">Nama Obat</label>
                        <input type="text" id="NamaObat" name="nama_obat" class="form-control float-right" >
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        <label for="dokter">Harga Obat</label>
                        <div class="row">
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>
                                <input type="number" name="obat_from" class="form-control float-right">
                            </div>
                            <!-- /.input group -->

                            <div class="input-group col">
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
                        <label>Nama Rincian Tambahan</label>
                        <input type="text" name="rincian_tambahan" class="form-control float-right">
                    </div>
                    <!-- /.form group -->
                    <div class="form-group">
                        <label for="dokter">Harga Rincian Tamabahan</label>
                        <div class="row">
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>
                                <input type="number" name="tambahan_from" class="form-control float-right">
                            </div>
                            <!-- /.input group -->

                            <div class="input-group col">
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
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>
                                <input type="number" name="diskon_from" class="form-control float-right">
                            </div>
                            <!-- /.input group -->

                            <div class="input-group col">
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
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>
                                <input type="number" name="pajak_from" class="form-control float-right">
                            </div>
                            <!-- /.input group -->

                            <div class="input-group col">
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
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>
                                <input type="number" name="tagihan_from" class="form-control float-right">
                            </div>
                            <!-- /.input group -->

                            <div class="input-group col">
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
                        <input type="text" name="keterangan" class="form-control float-right">
                    </div>
                    <!-- /.form group -->
                </div>
                <div class="card-footer justify-content-between">
                    <button class="btn btn-primary float-right" id="show_data">Tampilkan Data</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Laporan Pembayaran</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="canvas"></canvas>
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
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->