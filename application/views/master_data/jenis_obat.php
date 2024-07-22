<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Jenis Obat</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add d-none" id="btnAddJenisObat">
                            <i class="fas fa-plus"></i>
                            Tambah Jenis Obat
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableJenisObat">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>ID</th>                            
                            <th>Jenis Obat</th>
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

<div class="modal fade" id="modal-formJenisObat">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormJenisObat">
                <div class="modal-header">
                    <h4 class="modal-title">Form Jenis Obat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formJenisObat">Jenis Obat</label>
                                <input type="hidden" id="formIdJenisObat" name="formIdJenisObat" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formJenisObat" name="formJenisObat" class="form-control form-control-sm" value="" data-input="jenis_obat" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveJenisObat">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->