<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Supplier</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddSupplier">
                            <i class="fas fa-plus"></i>
                            Tambah Supplier
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableSupplier">
                    <thead>
                        <tr>
                            <th style="width:20px;">No</th>
                            <th>ID</th>                            
                            <th>Nama Supplier</th>
                            <th>Kode Supplier</th>
                            <th>Alamat</th>                                                        
                            <th>Kota</th>
                            <th>Kontak</th>
                            <th>No Telp</th>
                            <th>No Fax</th> 
                            <th>No Hp</th>                                                                                                                                           
                            <th></th>
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

<div class="modal fade" id="modal-formSupplier">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormSupplier">
                <div class="modal-header">
                    <h4 class="modal-title">Form Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="formNamaSupplier">Nama Supplier</label>
                                <input type="hidden" id="formIdSupplier" name="formIdSupplier" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formNamaSupplier" name="formNamaSupplier" class="form-control form-control-sm" value="" data-input="nama_supplier" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formKodeSupplier">Kode Supplier</label>
                                <input type="text" id="formKodeSupplier" name="formKodeSupplier" class="form-control form-control-sm" value="" data-input="kode_supplier">
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="formAlamat">Alamat</label>
                                <input type="text" id="formAlamat" name="formAlamat" class="form-control form-control-sm" value="" data-input="alamat">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formKota">Kota</label>
                                <input type="text" id="formKota" name="formKota" class="form-control form-control-sm" value="" data-input="kota">
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="formKontak">Kontak</label>
                                <input type="text" id="formKontak" name="formKontak" class="form-control form-control-sm" value="" data-input="contact_person">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formNoTelp">No Telp</label>
                                <input type="number" id="formNoTelp" name="formNoTelp" class="form-control form-control-sm" value="" data-input="no_telp">
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="formNoFax">No Fax</label>
                                <input type="number" id="formNoFax" name="formNoFax" class="form-control form-control-sm" value="" data-input="no_fax">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="formNoHp">No Hp</label>
                                <input type="number" id="formNoHp" name="formNoHp" class="form-control form-control-sm" value="" data-input="no_hp">
                            </div>
                        </div>                        
                    </div>                                                            
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveSupplier">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->