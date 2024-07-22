<div class="row">
    <div class="col-12">
        <div class="card card-danger card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-ringkasan-tab" data-toggle="pill" href="#custom-tabs-one-ringkasan" role="tab" aria-controls="custom-tabs-one-ringkasan" aria-selected="true">Data Ringkasan Obat</a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Data Rincian Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Obat Akan Kadaluarsa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Obat Kadaluarsa</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-ringkasan" role="tabpanel" aria-labelledby="custom-tabs-one-ringkasan-tab">
                        <table id="tableRingkasanStok" class="table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Stok Opname</th>
                                    <th>Stok Gudang</th>
                                    <th>Stok Order</th>
                                    <th>Stok Bebas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>                
                    <div class="tab-pane fade" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <table id="tableStok" class="table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Obat</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>No Faktur</th>
                                    <th>Tanggal Faktur</th>
                                    <th>Stok Opname</th>
                                    <th>Stok Gudang</th>
                                    <th>Id Obat</th>
                                    <th>Id</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <table id="tableWarning" class="table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Obat</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>No Faktur</th>
                                    <th>Tanggal Faktur</th>
                                    <th>Stok Opname</th>
                                    <th>Stok Gudang</th>
                                    <th>Id Obat</th>
                                    <th>Id</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                        <table id="tableExpired" class="table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Obat</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>No Faktur</th>
                                    <th>Tanggal Faktur</th>
                                    <th>Stok Opname</th>
                                    <th>Stok Gudang</th>
                                    <th>Id Obat</th>
                                    <th>Id</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->

<div class="modal fade" id="modal-koreksi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormKoreksi" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Form Koreksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control form-control-sm" id="id_stok_koreksi" name="id_stok_koreksi" value="" data-input="id_stok_koreksi">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_obat">Nama Obat</label>
                                <input type="text" class="form-control form-control-sm" name="nama_obat" value="" data-input="nama_obat" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="no_faktur">No Faktur</label>
                                <input type="text" class="form-control form-control-sm" name="no_faktur" value="" data-input="no_faktur" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_koreksi">Tanggal Koreksi</label>
                                <div class="input-group date datepicker" id="dateFormTanggalKoreksi" data-target-input="nearest" data-input="tanggal_lahir">
                                    <input type="text" id="tanggal_koreksi" name="tanggal_koreksi" class="form-control form-control-sm datetimepicker-input" data-target="#dateFormTanggalKoreksi" required />
                                    <div class="input-group-append" data-target="#dateFormTanggalKoreksi" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Stok Opname</h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="current_stok_opname">Stok Saat Ini</label>
                                        <input type="number" class="form-control form-control-sm" id="current_stok_opname" name="current_stok_opname" value="" step="1" data-input="current_stok_opname" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_stok_opname">Stok Baru</label>
                                        <input type="number" id="new_stok_opname" name="new_stok_opname" class="form-control form-control-sm" value="0" step="1" data-input="new_stok_opname" min="0">
                                    </div>
                                </div>
                                <!-- /.card-body -->


                            </div>
                        </div>
                        <div class="col">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Stok Gudang</h3>
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="current_stok_gudang">Stok Saat Ini</label>
                                        <input type="number" class="form-control form-control-sm" id="current_stok_gudang" name="current_stok_gudang" value="" step="1" data-input="current_stok_opname" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_stok_gudang">Stok Baru</label>
                                        <input type="number" id="new_stok_gudang" name="new_stok_gudang" class="form-control form-control-sm" value="0" step="1" data-input="new_stok_opname" min="0">
                                    </div>
                                </div>
                                <!-- /.card-body -->


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="alasan_koreksi">Alasan</label>
                                <textarea id="alasan_koreksi" name="alasan_koreksi" class="form-control form-control-sm" rows="3" data-input="alasan_koreksi"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveKoreksi">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-mutasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormMutasi" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Form Mutasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control form-control-sm" id="id_stok_mutasi" name="id_stok_mutasi" value="" data-input="id_stok_mutasi">
                    <input type="hidden" class="form-control form-control-sm" id="stok_opname" name="stok_opname" value="" step="1" data-input="stok_opname">
                    <input type="hidden" class="form-control form-control-sm" id="stok_gudang" name="stok_gudang" value="" step="1" data-input="stok_gudang">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_obat">Nama Obat</label>
                                <input type="text" class="form-control form-control-sm" name="nama_obat" value="" data-input="nama_obat" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="no_faktur">No Faktur</label>
                                <input type="text" class="form-control form-control-sm" name="no_faktur" value="" data-input="no_faktur" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_mutasi">Tanggal Mutasi</label>
                                <div class="input-group date datepicker" id="dateFormTanggalMutasi" data-target-input="nearest" data-input="tanggal_mutasi">
                                    <input type="text" id="tanggal_mutasi" name="tanggal_mutasi" class="form-control form-control-sm datetimepicker-input" data-target="#dateFormTanggalMutasi" required />
                                    <div class="input-group-append" data-target="#dateFormTanggalMutasi" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="lokasi">Lokasi Mutasi</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="lokasi" name="lokasi" data-input="lokasi" required>
                                    <option value="" selected disabled>--pilih mutasi--</option>
                                    <option value="opname">Gudang &#x1F87A; Opname</option>
                                    <option value="gudang">Gudang &#x1F878; Opname</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="no_faktur">Jumlah</label>
                                <input type="number" class="form-control form-control-sm" id="jumlah" name="jumlah" value="0" step="1" data-input="jumlah" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="alasan_mutasi">Alasan</label>
                                <textarea id="alasan_mutasi" name="alasan_mutasi" class="form-control form-control-sm" rows="3" data-input="alasan_mutasi"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveMutasi">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-retur">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormRetur" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Form Retur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control form-control-sm" id="id_stok_retur" name="id_stok_retur" value="" data-input="id_stok_retur">
                    <input type="hidden" class="form-control form-control-sm" id="stok_opname_retur" name="stok_opname_retur" value="" step="1" data-input="stok_opname_retur">
                    <input type="hidden" class="form-control form-control-sm" id="stok_gudang_retur" name="stok_gudang_retur" value="" step="1" data-input="stok_gudang_retur">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_obat">Nama Obat</label>
                                <input type="text" class="form-control form-control-sm" name="nama_obat" value="" data-input="nama_obat" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="no_faktur">No Faktur</label>
                                <input type="text" class="form-control form-control-sm" name="no_faktur" value="" data-input="no_faktur" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_retur">Tanggal Retur</label>
                                <div class="input-group date datepicker" id="dateFormTanggalMutasi" data-target-input="nearest" data-input="tanggal_retur">
                                    <input type="text" id="tanggal_retur" name="tanggal_retur" class="form-control form-control-sm datetimepicker-input" data-target="#dateFormTanggalRetur" required />
                                    <div class="input-group-append" data-target="#dateFormTanggalRetur" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="lokasi_retur">Lokasi Retur</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="lokasi_retur" name="lokasi_retur" data-input="lokasi_retur" required>
                                    <option value="" selected disabled>--pilih lokasi--</option>
                                    <option value="opname">Opname</option>
                                    <option value="gudang">Gudang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="jumlah_retur">Jumlah</label>
                                <input type="number" class="form-control form-control-sm" id="jumlah_retur" name="jumlah_retur" value="0" step="1" data-input="jumlah_retur" min="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="transaksi">Retur Sebagai</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="master_akun" name="master_akun" data-input="master_akun">
                                    <option value="" selected disabled>--pilih Akun--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="alasan_retur">Alasan</label>
                                <textarea id="alasan_retur" name="alasan_retur" class="form-control form-control-sm" rows="3" data-input="alasan_retur"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveRetur">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-konversi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormKonversi" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Form Retur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control form-control-sm" id="id_stok_konversi" name="id_stok_konversi" value="" data-input="id_stok_konversi">
                    <input type="hidden" class="form-control form-control-sm" id="id_obat_konversi" name="id_obat_konversi" value="" data-input="id_obat_konversi">                    
                    <input type="hidden" class="form-control form-control-sm" id="id_faktur" name="id_faktur" value="" data-input="id_faktur">                    
                    <input type="hidden" class="form-control form-control-sm" id="harga_beli" name="harga_beli" value="" data-input="harga_beli">                                        
                    <input type="hidden" class="form-control form-control-sm" id="stok_opname_konversi" name="stok_opname_konversi" value="" step="1" data-input="stok_opname_konversi">
                    <input type="hidden" class="form-control form-control-sm" id="stok_gudang_konversi" name="stok_gudang_konversi" value="" step="1" data-input="stok_gudang_konversi">
                    <input type="hidden" class="form-control form-control-sm" id="jumlah_obat_konversi" name="jumlah_obat_konversi" value="" step="1" data-input="jumlah_obat_konversi">                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_obat">Nama Obat</label>
                                <input type="text" class="form-control form-control-sm" name="nama_obat_konversi" value="" data-input="nama_obat_konversi" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="no_faktur">No Faktur</label>
                                <input type="text" class="form-control form-control-sm" name="no_faktur_konversi" value="" data-input="no_faktur_konversi" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                                <input type="text" class="form-control form-control-sm" name="tanggal_kadaluarsa" value="" data-input="tanggal_kadaluarsa" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="satuan_awal">Satuan Awal</label>
                                <input type="text" class="form-control form-control-sm" name="satuan_awal" value="" data-input="satuan_awal" readonly>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_retur">Tanggal Konversi</label>
                                <div class="input-group date datepicker" id="dateFormTanggalKonversi" data-target-input="nearest" data-input="tanggal_konversi">
                                    <input type="text" id="tanggal_konversi" name="tanggal_konversi" class="form-control form-control-sm datetimepicker-input" data-target="#dateFormTanggalKonversi" required />
                                    <div class="input-group-append" data-target="#dateFormTanggalKonversi" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lokasi_konversi">Lokasi Konversi</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="lokasi_konversi" name="lokasi_konversi" data-input="lokasi_konversi" required disabled>
                                    <option value="" selected disabled>--pilih lokasi--</option>
                                    <option value="opname">Opname</option>
                                    <option value="gudang">Gudang</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="jumlah_konversi">Jumlah Konversi</label>
                                <input type="number" class="form-control form-control-sm" id="jumlah_konversi" name="jumlah_konversi" value="1" step="1" data-input="jumlah_konversi" min="1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="jumlah_konversi">Jumlah Akhir</label>
                                <input type="number" class="form-control form-control-sm" id="jumlah_konversi_akhir" name="jumlah_konversi_akhir" value="0" step="1" data-input="jumlah_konversi_akhir" min="0" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="hari_kadaluarsa">Hari Kadaluarsa</label>
                                <input type="number" class="form-control form-control-sm" id="hari_kadaluarsa" name="hari_kadaluarsa" value="0" step="1" data-input="hari_kadaluarsa" min="0">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="satuan_akhir">Satuan Akhir</label>
                                <input type="text" class="form-control form-control-sm" id="satuan_akhir" name="satuan_akhir" data-input="satuan_akhir" readonly required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveKonversi">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->