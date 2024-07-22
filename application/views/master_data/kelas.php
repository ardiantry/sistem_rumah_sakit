<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Kelas</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddKelas">
                            <i class="fas fa-plus"></i>
                            Tambah Kelas
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableKelas">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>Nama Kelas</th>
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

<div class="modal fade" id="modal-formKelas">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormKelas">
                <div class="modal-header">
                    <h4 class="modal-title">Form Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="hidden" id="formIdKelas" name="formIdKelas" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formNamaKelas" name="formNamaKelas" class="form-control form-control-sm" value="" data-input="nama_kelas" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveKelas">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->