<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Radiologi</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddRad">
                            <i class="fas fa-plus"></i>
                            Tambah Radiologi
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableRad">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Tarif</th>
                            <th>ID</th>                            
                            <th>ID Klinik</th>
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

<div class="modal fade" id="modal-formRad">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormRad">
                <div class="modal-header">
                    <h4 class="modal-title">Form Radiologi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="hidden" id="formIdRad" name="formIdRad" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formKodeRad" name="formNamaRad" class="form-control form-control-sm" value="" data-input="kode_rad" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama</label>                             
                                <input type="text" id="formNamaRad" name="formNamaRad" class="form-control form-control-sm" value="" data-input="nama_rad" required>
                            </div>
                        </div>                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tarif</label>
                                <input type="number" id="formTarif" name="formTarif" class="form-control form-control-sm" value="" data-input="tarif" required>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveRad">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->