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
            <div class="card card-danger card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Day</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Month</a>
                                    </li>
                                    <li class="nav-item">
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
                <button id="clearDataset">Clear Data</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Table Laporan</h5>
            </div>
            <!-- /.card-header -->  
            <div class="card card-danger card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li id="tab_1" class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-1-tab" data-toggle="pill" href="#custom-tabs-one-1" role="tab" aria-controls="custom-tabs-one-1" aria-selected="true">Dataset 1</a>
                                    </li>
                                    <li id="tab_2" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-2-tab" data-toggle="pill" href="#custom-tabs-one-2" role="tab" aria-controls="custom-tabs-one-2" aria-selected="false">Dataset 2</a>
                                    </li>
                                    <li id="tab_3" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-3-tab" data-toggle="pill" href="#custom-tabs-one-3" role="tab" aria-controls="custom-tabs-one-3" aria-selected="false">Dataset 3</a>
                                    </li>
                                    <li id="tab_4" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-4-tab" data-toggle="pill" href="#custom-tabs-one-4" role="tab" aria-controls="custom-tabs-one-4" aria-selected="false">Dataset 4</a>
                                    </li>
                                    <li id="tab_5" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-5-tab" data-toggle="pill" href="#custom-tabs-one-5" role="tab" aria-controls="custom-tabs-one-5" aria-selected="false">Dataset 5</a>
                                    </li>
                                    <li id="tab_6" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-6-tab" data-toggle="pill" href="#custom-tabs-one-6" role="tab" aria-controls="custom-tabs-one-6" aria-selected="false">Dataset 6</a>
                                    </li>
                                    <li id="tab_7" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-7-tab" data-toggle="pill" href="#custom-tabs-one-7" role="tab" aria-controls="custom-tabs-one-7" aria-selected="false">Dataset 7</a>
                                    </li>
                                    <li id="tab_8" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-8-tab" data-toggle="pill" href="#custom-tabs-one-8" role="tab" aria-controls="custom-tabs-one-8" aria-selected="false">Dataset 8</a>
                                    </li>
                                    <li id="tab_9" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-9-tab" data-toggle="pill" href="#custom-tabs-one-9" role="tab" aria-controls="custom-tabs-one-9" aria-selected="false">Dataset 9</a>
                                    </li>
                                    <li id="tab_10" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-10-tab" data-toggle="pill" href="#custom-tabs-one-10" role="tab" aria-controls="custom-tabs-one-10" aria-selected="false">Dataset 10</a>
                                    </li>
                                    <li id="tab_11" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-11-tab" data-toggle="pill" href="#custom-tabs-one-11" role="tab" aria-controls="custom-tabs-one-11" aria-selected="false">Dataset 11</a>
                                    </li>
                                    <li id="tab_12" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-12-tab" data-toggle="pill" href="#custom-tabs-one-12" role="tab" aria-controls="custom-tabs-one-12" aria-selected="false">Dataset 12</a>
                                    </li>
                                    <li id="tab_13" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-13-tab" data-toggle="pill" href="#custom-tabs-one-13" role="tab" aria-controls="custom-tabs-one-13" aria-selected="false">Dataset 13</a>
                                    </li>
                                    <li id="tab_14" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-14-tab" data-toggle="pill" href="#custom-tabs-one-14" role="tab" aria-controls="custom-tabs-one-14" aria-selected="false">Dataset 14</a>
                                    </li>
                                    <li id="tab_15" class="nav-item d-none">
                                        <a class="nav-link" id="custom-tabs-one-15-tab" data-toggle="pill" href="#custom-tabs-one-15" role="tab" aria-controls="custom-tabs-one-15" aria-selected="false">Dataset 15</a>
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
                                                        <th colspan="6">  Filter : <p id="filterTable1"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-2" role="tabpanel" aria-labelledby="custom-tabs-one-2-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan2" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable2"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-3" role="tabpanel" aria-labelledby="custom-tabs-one-3-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan3" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable3"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-4" role="tabpanel" aria-labelledby="custom-tabs-one-4-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan4" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable4"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-5" role="tabpanel" aria-labelledby="custom-tabs-one-5-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan5" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable5"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-6" role="tabpanel" aria-labelledby="custom-tabs-one-6-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan6" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable6"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-7" role="tabpanel" aria-labelledby="custom-tabs-one-7-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan7" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable7"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-8" role="tabpanel" aria-labelledby="custom-tabs-one-8-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan8" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable8"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-9" role="tabpanel" aria-labelledby="custom-tabs-one-9-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan9" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable9"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-10" role="tabpanel" aria-labelledby="custom-tabs-one-10-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan10" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable10"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-11" role="tabpanel" aria-labelledby="custom-tabs-one-11-tab">
                                        <div class="card-body table-responsive">
                                            <table id="table_laporan11" class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="6">  Filter : <p id="filterTable11"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-12" role="tabpanel" aria-labelledby="custom-tabs-one-12-tab">
                                        <div class="card-body table-responsive">
                                                <table id="table_laporan12" class="table table-hover text-nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th colspan="6">  Filter : <p id="filterTable12"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-13" role="tabpanel" aria-labelledby="custom-tabs-one-13-tab">
                                        <div class="card-body table-responsive">
                                                <table id="table_laporan13" class="table table-hover text-nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th colspan="6">  Filter : <p id="filterTable13"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-14" role="tabpanel" aria-labelledby="custom-tabs-one-14-tab">
                                        <div class="card-body table-responsive">
                                                <table id="table_laporan14" class="table table-hover text-nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th colspan="6">  Filter : <p id="filterTable14"></p> </th>
                                                    </tr>
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
                                    <div class="tab-pane fade" id="custom-tabs-one-15" role="tabpanel" aria-labelledby="custom-tabs-one-15-tab">
                                        <div class="card-body table-responsive">
                                                <table id="table_laporan15" class="table table-hover text-nowrap">
                                                    <thead>
                                                    <tr>
                                                    <th colspan="6">  Filter : <p id="filterTable15"></p> </th>
                                                    </tr>
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
                            </div>
                        <!-- /.card-body -->
                    </div>

           
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->