<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Ruangan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddRuangan">
                            <i class="fas fa-plus"></i>
                            Tambah Ruangan
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableRuangan">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>Nama Ruangan</th>
                            <th>Nama Kelas</th>
                            <th>ID</th>                            
                            <th>ID Kelas</th>
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

<div class="modal fade" id="modal-formRuangan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormRuangan">
                <div class="modal-header">
                    <h4 class="modal-title">Form Ruangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Ruangan</label>
                                <input type="hidden" id="formIdRuangan" name="formIdRuangan" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formNamaRuangan" name="formNamaRuangan" class="form-control form-control-sm" value="" data-input="nama_ruangan" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputKelas">Kelas</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="inputKelas" name="inputKelas" required>
                                    <option value="" selected disabled>--pilih kelas--</option>
                                    <?php								
									    foreach($kelas as $rows)
									    {
										    echo "<option value='{$rows->id}'>{$rows->nama_kelas}</option>";
									    }
								    ?>	 
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveRuangan">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->