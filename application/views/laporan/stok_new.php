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
                                    <select class="form-control form-control-sm custom-select custom-select-sm" name="pilih_tanggal" id="pilih_tanggal">
                                        <option value="tanggal_po" selected>Tanggal Pesan</option>
                                        <option value="tanggal_faktur">Tanggal Faktur</option>                                        
                                        <option value="obat_stok.expired_date">Tanggal Kadaluarsa</option>
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
                                    <select class="form-control form-control-sm custom-select custom-select-sm supplier" name="supplier" id="supplier">
                                        <option value="" selected>Semua Supplier</option>
                                        <?php
                                        foreach ($master['supplier'] as $key => $value) {
                                        ?>
                                            <option value="<?= $value->id ?>"><?= $value->nama_supplier ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" id="nama_supplier" name="nama_supplier" value="">

                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label for="layanan">Nama Obat</label>
                                    <input type="text" id="nama_obat" name="nama_obat" class="form-control form-control-sm float-right">
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
                                            <input type="number" name="stok_opname_from" class="form-control float-right">
                                        </div>
                                        <!-- /.input group -->

                                        <div class="input-group input-group-sm col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    To
                                                </span>
                                            </div>
                                            <input type="number" name="stok_opname_to" class="form-control float-right">
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
                                            <input type="number" name="stok_gudang_from" class="form-control float-right">
                                        </div>
                                        <!-- /.input group -->

                                        <div class="input-group input-group-sm col">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    To
                                                </span>
                                            </div>
                                            <input type="number" name="stok_gudang_to" class="form-control float-right">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Keterangan Pembayaran</label>
                                    <input type="text" name="keterangan_pembayaran" class="form-control float-right">
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
                <h5 class="card-title">Grafik Laporan Stok</h5>
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
                <h5 class="card-title">Table Laporan Stok</h5>
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