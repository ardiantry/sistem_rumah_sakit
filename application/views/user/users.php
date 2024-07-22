<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pengguna</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm mr-1 btn-add" id="btnAddUser">
                            <i class="fas fa-plus"></i>
                            Tambah User
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableUsers">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Email</th>
                            <th>No Telp</th>
                            <th>Role Pengguna</th>
                            <th>Active</th>
                            <th>Group</th>
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

<div class="modal fade" id="modal-formUser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormUser" autocomplete="off">
                <div class="modal-header">
                    <h4 class="modal-title">Form Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formNamaDepan">Nama Depan</label>
                                <input type="hidden" id="formIdUser" name="formIdUser" class="form-control form-control-sm" value="0" data-input="id">
                                <input type="text" id="formNamaDepan" name="formNamaDepan" class="form-control form-control-sm" value="" data-input="nama_depan" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formNamaBelakang">Nama Belakang</label>
                                <input type="text" id="formNamaBelakang" name="formNamaBelakang" class="form-control form-control-sm" value="" data-input="nama_belakang" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formEmail">Email</label>
                                <input type="email" id="formEmail" name="formEmail" class="form-control form-control-sm" value="" data-input="email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formNoTelp">No Telp</label>
                                <input type="number" id="formNoTelp" name="formNoTelp" class="form-control form-control-sm" value="" data-input="no_telp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formPassword">Password</label>
                                <input type="password" id="formPassword" name="formPassword" class="form-control form-control-sm" value="" data-input="password" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formPasswordConfirmation">Konfirmasi Password</label>
                                <input type="password" id="formPasswordConfirmation" name="formPasswordConfirmation" class="form-control form-control-sm" value="" data-input="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group <?= $hakAkses; ?>">
                                <label for="formUserGroup">Role Pengguna</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="formUserGroup1" name="formUserGroup" class="custom-control-input" value="4">
                                        <label class="custom-control-label" for="formUserGroup1">Administrator</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="formUserGroup2" name="formUserGroup" class="custom-control-input" value="5" checked>
                                        <label class="custom-control-label" for="formUserGroup2">Operator</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formPasswordConfirmation">Aktif User</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="formIsActive1" name="formIsActive" class="custom-control-input" value="1" checked>
                                        <label class="custom-control-label" for="formIsActive1">Ya</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="formformIsActive2" name="formIsActive" class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="formformIsActive2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveUser">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-formUserEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormUserEdit" autocomplete="off">
                <div class="modal-header">
                    <h4 class="modal-title">Form Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formNamaDepanEdit">Nama Depan</label>
                                <input type="hidden" id="formIdUserEdit" name="formIdUserEdit" class="form-control form-control-sm" value="0" data-input="id">
                                <input type="text" id="formNamaDepanEdit" name="formNamaDepanEdit" class="form-control form-control-sm" value="" data-input="nama_depan" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formNamaBelakangEdit">Nama Belakang</label>
                                <input type="text" id="formNamaBelakangEdit" name="formNamaBelakangEdit" class="form-control form-control-sm" value="" data-input="nama_belakang" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formEmailEdit">Email</label>
                                <input type="email" id="formEmailEdit" name="formEmail" class="form-control form-control-sm" value="" data-input="email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formNoTelpEdit">No Telp</label>
                                <input type="number" id="formNoTelpEdit" name="formNoTelp" class="form-control form-control-sm" value="" data-input="no_telp">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formPasswordEdit">Password</label>
                                <input type="password" id="formPasswordEdit" name="formPasswordEdit" class="form-control form-control-sm" value="" data-input="password" autocomplete="off">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Isi jika mengubah password
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formPasswordConfirmationEdit">Konfirmasi Password</label>
                                <input type="password" id="formPasswordConfirmationEdit" name="formPasswordConfirmationEdit" class="form-control form-control-sm" value="" data-input="password_confirmation">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Isi jika mengubah password
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group <?= $hakAkses; ?>">
                                <label for="formUserGroup">Role Pengguna</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="formUserGroupEdit1" name="formUserGroupEdit" class="custom-control-input" value="4">
                                        <label class="custom-control-label" for="formUserGroupEdit1">Administrator</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="formUserGroupEdit2" name="formUserGroupEdit" class="custom-control-input" value="5">
                                        <label class="custom-control-label" for="formUserGroupEdit2">Operator</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formPasswordConfirmation">Aktif User</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="formIsActiveEdit1" name="formIsActiveEdit" class="custom-control-input" value="1" checked>
                                        <label class="custom-control-label" for="formIsActiveEdit1">Ya</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="formIsActiveEdit2" name="formIsActiveEdit" class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="formIsActiveEdit2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveUserEdit">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-formUserPrivilege">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormUserPrivilege" autocomplete="off">
                <input type="hidden" id="IdUserPrivilege" name="IdUserPrivilege" class="form-control form-control-sm" value="0" data-input="id">
                <div class="modal-header">
                    <h4 class="modal-title">Hak Akses</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" id="tableUserPrivilege">
                                <thead>
                                    <tr>
                                        <th>ID User</th>
                                        <th>ID Menu</th>                                        
                                        <th>Menu</th>
                                        <th class="text-center">Hak Akses</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveUserPrivilege">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->