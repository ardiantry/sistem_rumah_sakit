<input type="hidden" id="modulePrivilege" name="modulePrivilege" class="form-control form-control-sm" value="<?= $apotek_privilege ?>">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Obat Racikan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddObatRacikan">
                            <i class="fas fa-plus"></i>
                            Tambah Racikan
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableObatRacikan">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Obat</th>
                            <th>Satuan</th>
                            <th>Jenis Racikan</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Keterangan</th>
                            <th>Id Spesifikasi</th>
                            <th>Id Satuan</th>
                            <th>Id Jenis Obat</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->

<div class="modal fade" id="modal-formObatRacikan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormObatRacikan">
                <div class="modal-header">
                    <h4 class="modal-title">Form Obat Racikan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formNamaObat">Nama Obat Racikan</label>
                                <input type="hidden" id="formIdObat" name="formIdObat" class="form-control form-control-sm" value="0" data-input="id">
                                <input type="text" id="formNamaObat" name="formNamaObat" class="form-control form-control-sm" value="" data-input="nama_obat" placeholder="Nama Obat" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formSpesifikasi">Spesifikasi</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="formSpesifikasi" name="formSpesifikasi" data-input="spesifikasi" required>
                                    <option value="" selected disabled>--pilih spesifikasi--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formSatuan">Satuan</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="formSatuan" name="formSatuan" data-input="satuan" required>
                                    <option value="" selected disabled>--pilih satuan--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formJenisRacikan">Jenis Racikan</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="formJenisRacikan" name="formJenisRacikan" data-input="jenis_racikan" required>
                                    <option value="" selected disabled>--pilih jenis racikan--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formHargaBeli">Harga Dasar</label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" id="formHargaBeli" name="formHargaBeli" class="form-control form-control-sm" data-input="harga_beli" value="0" step="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formHargaJual">Harga Jual</label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" id="formHargaJual" name="formHargaJual" class="form-control form-control-sm" data-input="harga_jual" value="0" step="1" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formKeterangan">Keterangan</label>
                                <textarea id="formKeterangan" class="form-control form-control-sm" rows="3"></textarea>
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Bahan Racikan</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <button type="button" class="btn btn-default btn-sm btn-add" id="btnAddBahan">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table" id="tableBahanRacikan" style="margin-top:0 !important;">
                                        <thead>
                                            <tr>
                                                <th class="d-none" data-label="id_obat">ID Obat</th>
                                                <th data-label="jumlah_obat" class="text-center align-middle" style="width:20%;">Jumlah</th>
                                                <th data-label="nama_obat" class="text-left align-middle">Nama Obat</th>
                                                <th data-label="harga_obat" class="text-right align-middle">Harga Dasar</th>
                                                <th data-label="button_delete" class="text-right align-middle"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveObatRacikan">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-Bahan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormBahan">
                <div class="modal-header">
                    <h4 class="modal-title">Form Bahan Racikan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" id="tableModalBahanRacikan">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Nama Obat</th>
                                        <th>Satuan</th>
                                        <th>Harga Dasar</th>
                                        <th></th>                                        
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->