<div class="row">
    <div class="col-4">
        <form id="FormReminder">
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
                                            <option value="tanggal_reminder_paket">Tanggal Reminder Paket</option>
                                            <option value="tanggal_reminder_kontrol_1">Tanggal Kontrol 1</option>
                                            <option value="tanggal_reminder_kontrol_2">Tanggal Kontrol 2</option>
                                            <option value="tanggal_reminder_kontrol_3">Tanggal Kontrol 3</option>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer justify-content-between">
                    <button class="btn btn-primary float-right" id="show_data">Tampilkan Data</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-8">
    <div id="container" style="display: none;"></div>
    <div id="containerMonth" style="display: none;"></div>
    <div id="containerYear" style="display: none;"></div>        
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable1"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable2"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable3"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable4"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable5"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable6"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable7"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable8"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable9"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable10"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable11"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable12"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable13"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable14"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
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
                                                <th colspan="11">
                                                 Filter : <p id="filterTable15"></p>
                                                </th>
                                                </tr>
                                                                
                                                    <tr>
                                                        <th>Tanggal Pendaftaran</th>   
                                                        <th>No RM</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Reminder Paket</th>
                                                        <th>Tanggal Reminder Paket</th> 
                                                        <th>Tanggal Kontrol 1</th> 
                                                        <th>Alasan Kontrol 1</th> 
                                                        <th>Tanggal Kontrol 2</th> 
                                                        <th>Alasan Kontrol 2</th>                                                 
                                                        <th>Tanggal Kontrol 3</th> 
                                                        <th>Alasan Kontrol 3</th>                                                         
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                        <!-- /.card-body -->
<div class="card-footer justify-content-between">
    <button class="btn btn-default" id="clearDataset">Clear Data</button>                        
                </div>                        
                    </div>

        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->