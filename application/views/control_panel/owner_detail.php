<div class="row">
    <div class="col-md-12">
        <?php
        if ($this->session->flashdata('success')) {
        ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i> <?= $this->session->flashdata('success'); ?>
            </div>
        <?php
        }
        ?>
        <?php
        if ($this->session->flashdata('error')) {
        ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i> <?= $this->session->flashdata('error'); ?>
            </div>
        <?php
        }
        ?>
        <form method="post" action="<?php echo site_url('ControlPanel/owner_save'); ?>">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulir Owner</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="hidden" id="id_owner" name="id_owner" value="<?= $this->session->flashdata('owner')['owner']['id'] ?? $owner->id; ?>" data-input="id_owner">
                                <label for="nama_depan">Nama Depan</label>
                                <input type="text" id="nama_depan" name="nama_depan" class="form-control form-control-sm" value="<?= $this->session->flashdata('owner')['owner']['nama_depan'] ?? $owner->nama_depan; ?>" required data-input="nama_depan">
                            </div>
                            <div class="form-group">
                                <label for="nama_belakang">Nama Belakang</label>
                                <input type="text" id="nama_belakang" name="nama_belakang" class="form-control form-control-sm" value="<?= $this->session->flashdata('owner')['owner']['nama_belakang'] ?? $owner->nama_belakang; ?>" data-input="nama_belakang">
                            </div>
                            <div class="form-group">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control form-control-sm" value="<?= $this->session->flashdata('owner')['owner']['nama_perusahaan'] ?? $owner->nama_perusahaan; ?>" data-input="nama_perusahaan">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-sm" value="<?= $this->session->flashdata('owner')['owner']['email'] ?? $owner->email; ?>" data-input="email" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telpon</label>
                                <input type="number" id="no_telp" name="no_telp" class="form-control form-control-sm" value="<?= $this->session->flashdata('owner')['owner']['no_telp'] ?? $owner->no_telp; ?>" data-input="no_telp">
                            </div>
                            <div class="form-group">
                                <label for="no_fax">No Fax</label>
                                <input type="number" id="no_fax" name="no_fax" class="form-control form-control-sm" value="<?= $this->session->flashdata('owner')['owner']['no_fax'] ?? $owner->no_fax; ?>" data-input="no_fax">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control form-control-sm" rows="3" data-input="alamat"><?= $this->session->flashdata('owner')['owner']['alamat'] ?? $owner->alamat; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" id="kota" name="kota" class="form-control form-control-sm" value="<?= $this->session->flashdata('owner')['owner']['kota'] ?? $owner->kota; ?>" data-input="kota">
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi" class="form-control form-control-sm" value="<?= $this->session->flashdata('owner')['owner']['provinsi'] ?? $owner->provinsi; ?>" data-input="provinsi">
                            </div>
                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos" class="form-control form-control-sm" value="<?= $this->session->flashdata('owner')['owner']['kode_pos'] ?? $owner->kode_pos; ?>" data-input="kode_pos">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea id="keterangan" name="keterangan" class="form-control form-control-sm" rows="3" data-input="keterangan"><?= $this->session->flashdata('owner')['owner']['keterangan'] ?? $owner->keterangan; ?> </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.card -->
        </form>
    </div>
    <div class="col-md-12 <?= ($owner->id != 0) ? 'd-blok' : 'd-none'; ?>">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Akun Login</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8">: <?= $owner->email; ?></dd>
                            <dt class="col-sm-4">Password</dt>
                            <dd class="col-sm-8">: <?= $owner->random_password; ?></dd>
                        </dl>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-12 <?= ($owner->id != 0) ? 'd-blok' : 'd-none'; ?>">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Klinik</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Klinik</th>
                                    <th>Tipe Layanan</th>
                                    <th>Status</th>
                                    <th>Aktif Sampai</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($owner->klinik as $klinik) {
                                ?>
                                    <tr>
                                        <td><?= $klinik->nama_klinik; ?></td>
                                        <td><?= $listTipeLayanan[$klinik->tipe]; ?></td>
                                        <td><?= ($klinik->status == 1) ? "Aktif" : "Tidak Aktif"; ?></td>
                                        <td><?= dateFormat($klinik->aktif_sampai); ?></td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    <?php
                                }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>