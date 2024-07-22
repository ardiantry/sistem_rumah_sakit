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
        <form id="FormStok">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Kriteria Pencarian</h3>
                </div>
                <div class="card-body p-0">
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
                                        <option value="tanggal_po" selected>Tanggal Pesan</option>
                                        <option value="expired_date">Tanggal Kadaluarsa</option>
                                        <option value="tanggal_faktur">Tanggal Faktur</option>
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
                                        <input type="text" name="tanggal" class="form-control float-right" id="reservation">
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
                                    Stok
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse show">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>No PO</label>
                                    <input type="text" name="no_po" class="form-control form-control-sm float-right">
                                </div>
                                <!-- /.form group -->

                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select class="form-control form-control-sm custom-select custom-select-sm" name="supplier">
                                        <option value="" selected>Semua Supplier</option>
                                        <?php
                                        foreach ($master['supplier'] as $key => $value) {
                                        ?>
                                            <option value="<?= $value->id ?>"><?= $value->nama_supplier ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label for="layanan">Nama Obat</label>
                                    <input type="text" id="NamaObat" name="nama_obat" class="form-control form-control-sm float-right">
                                </div>
                                <!-- /.form group -->


                                <div class="form-group">
                                    <label>No Faktur</label>
                                    <input type="text" name="no_faktur" class="form-control form-control-sm float-right">
                                </div>
                                <!-- /.form group -->

                                <div class="form-group">
                                    <label for="dokter">Stok Opname</label>
                                    <div class="row">
                                        <div class="input-group input-group-sm col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    From
                                                </span>
                                            </div>
                                            <input type="number" name="opname_from" class="form-control float-right">
                                        </div>
                                        <!-- /.input group -->

                                        <div class="input-group input-group-sm col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    To
                                                </span>
                                            </div>
                                            <input type="number" name="opname_to" class="form-control float-right">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label for="dokter">Stok Gudang</label>
                                    <div class="row">
                                        <div class="input-group input-group-sm col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    From
                                                </span>
                                            </div>
                                            <input type="number" name="gudang_from" class="form-control float-right">
                                        </div>
                                        <!-- /.input group -->

                                        <div class="input-group input-group-sm col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    To
                                                </span>
                                            </div>
                                            <input type="number" name="gudang_to" class="form-control float-right">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <!-- /.form group -->
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer justify-content-between">
                    <div class="form-group d-none">
                        <label for="pilih_tanggal">Menampilkan</label>
                        <select class="form-control form-control-sm custom-select custom-select-sm" name="pilih_tipe" id="pilih_tipe">
                            <option value="total" selected>Jumlah</option>
                            <option value="stok_opname">Stok Opname</option>
                            <option value="stok_gudang">Stok Gudang</option>
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
                <h5 class="card-title">Laporan Stok Apotek</h5>
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
                            <th>No Po</th>
                            <th>Supplier</th>
                            <th>Nama Obat</th>
                            <th>No Faktur</th>
                            <th>Stok Opname</th>
                            <th>Stok Gudang</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->