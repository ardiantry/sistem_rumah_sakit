<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Petugas</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddPetugas">
                            <i class="fas fa-plus"></i>
                            Tambah Petugas
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tablePetugas">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>Nama Petugas</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Email</th>                
                            <th>KTP</th>                
                            <th>ID</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                            <th style="width: 20%">&nbsp;</th>
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

<div class="modal fade" id="modal-formPetugas">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="FormPetugas">
                <div class="modal-header">
                    <h4 class="modal-title">Form Petugas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="hidden" id="formIdPetugas" name="formIdDokter" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formNamaPetugas" name="formNamaDokter" class="form-control form-control-sm" value="" data-input="nama_petugas" required>                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formKTP">KTP</label>
                                <input type="text" id="formKTP" name="formKTP" class="form-control form-control-sm" value="" data-input="ktp" required>                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formNoTelp">No Telp</label>
                                <input type="number" id="formNoTelp" name="formNoTelp" class="form-control form-control-sm" value="" data-input="no_telp">                                
                            </div>                        
                        </div>                                                                                                 
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formAlamat">Alamat</label>
                                <textarea id="formAlamat" name="formAlamat" class="form-control form-control-sm" rows="2" data-input="alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formEmail">Email</label>
                                <input type="email" id="formEmail" name="formEmail" class="form-control form-control-sm" value="" data-input="email">                                
                            </div>
                        </div>           
                        <div class="col-sm-3"></div>                                     
                    </div>                                                            
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSavePetugas">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->