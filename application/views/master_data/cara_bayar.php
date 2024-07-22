<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Cara Bayar</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddCaraBayar">
                            <i class="fas fa-plus"></i>
                            Tambah Cara Bayar
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableCaraBayar">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>ID</th>                            
                            <th>Cara Bayar</th>
                            <th>Akun</th>                            
                            <th>Id Akun</th>                            
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

<div class="modal fade" id="modal-formCaraBayar">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormCaraBayar">
                <div class="modal-header">
                    <h4 class="modal-title">Form Cara Bayar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formCaraBayar">Cara Bayar</label>
                                <input type="hidden" id="formIdCaraBayar" name="formIdCaraBayar" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formCaraBayar" name="formCaraBayar" class="form-control form-control-sm" value="" data-input="cara_bayar" required>
                            </div>
                            <div class="form-group">
                                <label for="transaksi">Akun</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="master_akun" name="master_akun" data-input="master_akun">
                                    <option value="" selected disabled>--pilih Akun--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveCaraBayar">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->