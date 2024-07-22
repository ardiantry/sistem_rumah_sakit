<input type="hidden" id="modulePrivilege" name="modulePrivilege" class="form-control form-control-sm" value="<?= $apotek_privilege ?>">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Obat BHP</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm mr-1 btn-add" id="btnAddObat">
                            <i class="fas fa-plus"></i>
                            Tambah Obat
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableObat">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Obat</th>
                            <th>Satuan</th>
                            <th>Jenis Obat</th>
                            <th>Stok</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok Min</th>
                            <th>Stok Max</th>
                            <th>Keterangan</th>
                            <th>Id Spesifikasi</th>
                            <th>Id Satuan</th>
                            <th>Id Jenis Obat</th>
                            <th>Id Obat Konversi</th>
                            <th>Jumlah Obat Konversi</th>                                                        
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

<div class="modal fade" id="modal-formObat">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormObat">
                <div class="modal-header">
                    <h4 class="modal-title">Form Obat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formNamaObat">Nama Obat</label>
                                <input type="hidden" id="formIdObat" name="formIdObat" class="form-control form-control-sm" value="0" data-input="id">
                                <input type="text" id="formNamaObat" name="formNamaObat" class="form-control form-control-sm" value="" data-input="nama_obat" required>
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
                                <label for="formJenisObat">Jenis Obat</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="formJenisObat" name="formJenisObat" data-input="jenis_obat" required>
                                    <option value="" selected disabled>--pilih jenis obat--</option>
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
                                    <input type="number" id="formHargaBeli" name="formHargaBeli" class="form-control form-control-sm" data-input="harga_beli" value="0" required>
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
                                    <input type="number" id="formHargaJual" name="formHargaJual" class="form-control form-control-sm" data-input="harga_jual" value="0" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"></div>                    
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formHargaPaket">Harga Paket</label>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" id="formHargaPaket" name="formHargaPaket" class="form-control form-control-sm" data-input="harga_paket" value="0">
                                </div>
                            </div>
                        </div>                        
                    </div>                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formStokMin">Stok Min</label>
                                <input type="number" id="formStokMin" name="formStokMin" class="form-control form-control-sm" data-input="stok_min" value="0" step="1" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formStokMax">Stok Max</label>
                                <input type="number" id="formStokMax" name="formStokMax" class="form-control form-control-sm" data-input="stok_max" value="0" step="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formStokMin">Konversi Obat</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="formObatKonversi" name="formObatKonversi" data-input="obat_konversi">
                                    <option value="" selected>--Tidak Ada Konversi--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formStokMin">Satuan konversi</label>
                                <input type="text" id="formSatuanKonversi" name="formSatuanKonversi" class="form-control form-control-sm" data-input="satuan_konversi" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formStokMin">Jumlah konversi</label>
                                <input type="number" id="formJumlahKonversi" name="formJumlahKonversi" class="form-control form-control-sm" data-input="jumlah_konversi" value="0" step="1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formStokMin">Jumlah Order Paket</label>
                                <input type="number" id="formJumlahOrderPaket" name="formJumlahOrderPaket" class="form-control form-control-sm" data-input="jumlah_order_paket" value="0" step="1">
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
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveObat">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->