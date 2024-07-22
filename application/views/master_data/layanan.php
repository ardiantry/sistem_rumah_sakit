<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Layanan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddLayanan">
                            <i class="fas fa-plus"></i>
                            Tambah Layanan
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableLayanan">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>ID</th>                            
                            <th>Nama Layanan</th>
                            <th>Tarif</th>                            
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

<div class="modal fade" id="modal-formLayanan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormLayanan">
                <div class="modal-header">
                    <h4 class="modal-title">Form Layanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formLayanan">Layanan</label>
                                <input type="hidden" id="formIdLayanan" name="formIdLayanan" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formNamaLayanan" name="formNamaLayanan" class="form-control form-control-sm" value="" data-input="nama_layanan" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formHargaLayanan">Tarif</label>
                                <input type="text" id="formHargaLayanan" name="formHargaLayanan" class="form-control form-control-sm" value="0" data-input="harga_layanan" required>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveLayanan">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->