<div class="row">
    <div class="col-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Hak Akses</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputNamaUnitLayanan">Nama</label>
                    <input type="hidden" id="inputIdUnitLayanan" class="form-control" value="" readonly>
                    <input type="text" id="inputNamaUnitLayanan" class="form-control" value="" readonly>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Register Dokter</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-default btn-sm btn-add" id="btnAddRegisterDokter">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table" id="tableRegisterDokter" style="margin-top:0 !important;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Dokter</th>
                            <th>SIP</th>
                            <th>ID Unit Layanan</th>
                            <th>ID Dokter</th>
                            <th style="width:10%;"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Register Layanan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-default btn-sm btn-add" id="btnAddRegisterLayanan">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table" id="tableRegisterLayanan" style="margin-top:0 !important;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Layanan</th>
                            <th>Tarif</th>
                            <th>ID Unit Layanan</th>
                            <th>ID Layanan</th>
                            <th style="width:10%;"></th>
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
<div class="row">
    <div class="col-12">
        <a href="<?= site_url("MasterData/unit_layanan") ?>" class="btn btn-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali ke daftar unit layanan</a>
    </div>
</div>