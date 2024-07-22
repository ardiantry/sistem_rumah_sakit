<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Bed</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddBed">
                            <i class="fas fa-plus"></i>
                            Tambah Bed
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableBed">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>Nama Bed</th>
                            <th>Tarif</th>
                            <th>Nama Ruangan</th>
                            <th>Nama Kelas</th>
                            <th>ID</th>                            
                            <th>ID Ruangan</th>
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

<div class="modal fade" id="modal-formBed">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormBed">
                <div class="modal-header">
                    <h4 class="modal-title">Form Bed</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Bed</label>
                                <input type="hidden" id="formIdBed" name="formIdBed" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formNamaBed" name="formNamaBed" class="form-control form-control-sm" value="" data-input="nama_bed" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tarif</label>
                                <input type="number" id="formTarif" name="formTarif" class="form-control form-control-sm" value="" data-input="tarif" required>
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
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputKelas">Ruangan</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="inputRuangan" name="inputRuangan" required>
                                    <option value="" selected disabled>--pilih ruangan--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveBed">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->