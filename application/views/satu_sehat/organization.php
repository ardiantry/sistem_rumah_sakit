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
                <h3 class="card-title">Daftar Organization</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm d-none">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddOrganisasi">
                            <i class="fas fa-plus"></i>
                            Tambah Organisasi
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableOrganization">
                    <thead>
                        <tr>
                            <th>Organisasi ID</th>
                            <th>Nama Organisasi</th>                            
                            <th>Tipe Organisasi </th>
                            <th>Tipe Organisasi Code</th>                            
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

<div class="modal fade" id="modal-formOwner">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="FormPekerjaan" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Form Pekerjaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="formPekerjaan">Pekerjaan</label>
                                <input type="hidden" id="formIdPekerjaan" name="formIdPekerjaan" class="form-control form-control-sm" value="0" data-input="id">
                                <input type="text" id="formPekerjaan" name="formPekerjaan" class="form-control form-control-sm" value="" data-input="pekerjaan" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSavePekerjaan">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->