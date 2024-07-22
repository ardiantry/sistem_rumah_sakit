<div class="row">
    <div class="col-12">
        <?php
        if ($this->session->flashdata()) {
        ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i> <?= $this->session->flashdata('success'); ?>
            </div>
        <?php
        }
        ?>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Lokasi</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddLokasi">
                            <i class="fas fa-plus"></i>
                            Tambah Lokasi
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableLocation">
                    <thead>
                        <tr>
                            <th>Lokasi ID</th>
                            <th>Kode Lokasi</th>                            
                            <th>Nama Lokasi</th>                            
                            <th>Deskripsi</th>                            
                            <th>Status</th>                            
                            <th>Tipe Lokasi </th>
                            <th>Tipe Lokasi Code</th>                            
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

<div class="modal fade" id="modal-formLokasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormLokasi" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Form Lokasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formLokasi">Kode Lokasi</label>
                                <input type="hidden" id="formIdLokasi" name="formIdLokasi" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formKodeLokasi" name="formKodeLokasi" class="form-control form-control-sm" value="" data-input="kodelokasi" required>
                            </div>
                            <div class="form-group">
                                <label for="formLokasi">Name Lokasi</label>
                                <input type="text" id="formNamaLokasi" name="formNamaLokasi" class="form-control form-control-sm" value="" data-input="namalokasi" required>
                            </div>    
                            <div class="form-group">
                                <label for="formLokasi">Deskripsi</label>
                                <input type="text" id="formDeskripsiLokasi" name="formDeskripsiLokasi" class="form-control form-control-sm" value="" data-input="deskripsilokasi" required>
                            </div>                                                      
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveLokasi">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->