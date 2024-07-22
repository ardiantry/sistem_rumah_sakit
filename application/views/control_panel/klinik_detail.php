<style type="text/css">
    .upload-msg {
        text-align: center;
        padding: 50px;
        font-size: 22px;
        color: #aaa;
        width: 260px;
        margin: 50px auto;
        border: 1px solid #aaa;
    }

    .upload-demo-wrap,
    .upload-result,
    .form-upload.ready .upload-msg {
        display: none;
    }

    .form-upload.ready .upload-demo-wrap {
        display: block;
    }

    .upload-demo-wrap {
        width: 300px;
        height: 300px;
        margin: 0 auto;
    }
</style>
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
        <form method="post" action="<?php echo site_url('ControlPanel/klinik_save'); ?>">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulir Klinik</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="hidden" id="id_owner" name="id_owner" value="<?= $this->session->flashdata('klinik')['klinik']['id_owner'] ?? $klinik->id_owner; ?>" data-input="id_owner">
                                <input type="hidden" id="id_klinik" name="id_klinik" value="<?= $this->session->flashdata('klinik')['klinik']['id'] ?? $klinik->id; ?>" data-input="id_klinik">
                                <label for="nama_owner">Nama Owner</label>
                                <?= form_dropdown('nama_owner', $listOwner, $this->session->flashdata('klinik')['klinik']['id_owner'] ?? $klinik->id_owner, 'class="form-control form-control-sm custom-select custom-select-sm" id="nama_owner" required'); ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_klinik">Nama Klinik/Apotek</label>
                                <input type="text" id="nama_klinik" name="nama_klinik" class="form-control form-control-sm" value="<?= $this->session->flashdata('klinik')['klinik']['nama_klinik'] ?? $klinik->nama_klinik; ?>" data-input="nama_klinik">
                            </div>
                            <div class="form-group">
                                <label for="tipe_layanan">Tipe Layanan</label>
                                <?= form_dropdown('tipe_layanan', $listTipeLayanan, $this->session->flashdata('klinik')['klinik']['tipe'] ?? $klinik->tipe, 'class="form-control form-control-sm custom-select custom-select-sm" id="tipe_layanan" required'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-sm" value="<?= $this->session->flashdata('klinik')['klinik']['email'] ?? $klinik->email; ?>" data-input="email" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telpon</label>
                                <input type="number" id="no_telp" name="no_telp" class="form-control form-control-sm" value="<?= $this->session->flashdata('klinik')['klinik']['no_telp'] ?? $klinik->no_telp; ?>" data-input="no_telp">
                            </div>
                            <div class="form-group">
                                <label for="no_fax">No Fax</label>
                                <input type="number" id="no_fax" name="no_fax" class="form-control form-control-sm" value="<?= $this->session->flashdata('klinik')['klinik']['no_fax'] ?? $klinik->no_fax; ?>" data-input="no_fax">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-success img-change" style="width: 300px; margin-bottom: 10px;" data-toggle="modal" data-target="#modal-image">Ganti Logo</button>

                                        <div id="upload-demo-i" style="background:#e1e1e1;width:300px; height:300px;">
                                            <img id="logo_img" src="<?=  base_url() . "assets/img/" . ($klinik->logo ?? "logo_invoice.jpeg"); ?>" alt="Logo" class="brand-image-xl single d-block" style="width: 200px; margin:0 auto; padding-top:20px;" id="current_logo">
                                            <input id="logo_filename" name="logo_filename" type="hidden" value="<?= ($klinik->logo ?? "logo_invoice.jpeg"); ?>">
                                        </div>

                                        <div class="row" id="button-logo" style="display:none;">
                                            <div class="col">
                                                <button type="button" class="btn btn-success img-save" style="width: 100%;">Simpan</button>
                                            </div>
                                            <div class="col">
                                                <button type="button" class="btn btn-danger img-cancel" style="width: 100%;">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control form-control-sm" rows="3" data-input="alamat"><?= $this->session->flashdata('klinik')['klinik']['alamat'] ?? $klinik->alamat; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" id="kota" name="kota" class="form-control form-control-sm" value="<?= $this->session->flashdata('klinik')['klinik']['kota'] ?? $klinik->kota; ?>" data-input="kota">
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi" class="form-control form-control-sm" value="<?= $this->session->flashdata('klinik')['klinik']['provinsi'] ?? $klinik->provinsi; ?>" data-input="provinsi">
                            </div>
                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos" class="form-control form-control-sm" value="<?= $this->session->flashdata('klinik')['klinik']['kode_pos'] ?? $klinik->kode_pos; ?>" data-input="kode_pos">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea id="keterangan" name="keterangan" class="form-control form-control-sm" rows="3" data-input="keterangan"><?= $this->session->flashdata('klinik')['klinik']['keterangan'] ?? $klinik->keterangan; ?></textarea>
                            </div>
                            <div class="form-group d-none">
                                <label for="logo">Logo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary float-right btn-nonactive <?= (($klinik->status == 1) && ($klinik->id != 0)) ? 'd-blok' : 'd-none'; ?>">Nonaktifkan</button>
                    <button type="button" class="btn btn-success float-right btn-active <?= (($klinik->status != 1) && ($klinik->id != 0)) ? 'd-blok' : 'd-none'; ?>">Aktifkan</button>
                </div>
            </div>
            <!-- /.card -->
        </form>
    </div>
    <div class="col-md-12 <?= ($klinik->id != 0) ? 'd-blok' : 'd-none'; ?>">
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
                            <dd class="col-sm-8">: <?= $klinik->email; ?></dd>
                            <dt class="col-sm-4">Password</dt>
                            <dd class="col-sm-8">: <?= $klinik->random_password; ?></dd>
                        </dl>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Satu Sehat</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <form method="post" action="<?php echo site_url('ControlPanel/klinik_org_save'); ?>">                    
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" id="id_klinik" name="id_klinik" value="<?= $klinik->id; ?>" data-input="id_klinik">                            
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_klinik">Organisasi ID</label>
                                    <input type="text" id="organization_id" name="organization_id" class="form-control form-control-sm" data-input="organization_id" 
                                    value="<?= $org->organization_id; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_klinik">Status</label>
                                    <input type="text" id="is_active" name="is_active" class="form-control form-control-sm" data-input="is_active" 
                                    value="<?= ($org->is_active) ? "Aktif" : "Tidak Active"; ?>" disabled>
                                </div>                                
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_klinik">Client ID</label>
                                    <input type="text" id="client_id" name="client_id" class="form-control form-control-sm" data-input="client_id" 
                                    value="<?= $org->client_id; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_klinik">Client Secret</label>
                                    <input type="text" id="client_secret" name="client_secret" class="form-control form-control-sm" data-input="client_secret" 
                                    value="<?= $org->client_secret; ?>" required>
                                </div>                                
                            </div>                            
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary float-right btn-nonactive-ihs <?= (($klinik->status == 1) && ($klinik->id != 0)) ? 'd-blok' : 'd-none'; ?>">Nonaktifkan</button>
                        <button type="button" class="btn btn-success float-right btn-active <?= (($klinik->status != 1) && ($klinik->id != 0)) ? 'd-blok' : 'd-none'; ?>">Aktifkan</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>            
            <div class="col-lg-6 col-md-12 col-sm-12 d-none">
                <div class="card card-info d-none">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Pembayaran</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Aktif Sampai</th>
                                    <th>Jumlah</th>
                                    <th>Tipe Layanan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>14/11/2020</td>
                                    <td>14/11/2021</td>
                                    <td><?= rupiah(1000000); ?></td>
                                    <td>Klinik & Apotek</td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>14/11/2019</td>
                                    <td>14/11/2020</td>
                                    <td><?= rupiah(800000); ?></td>
                                    <td>Klinik & Apotek</td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modal-image">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Logo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="upload" accept="image/*">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-upload">
                        <div class="upload-msg">
                            Upload a file to start cropping
                        </div>
                        <div class="upload-demo-wrap">
                            <div id="upload-demo"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btn-save-logo">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->