<div class="row">
    <div class="col-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Unit Layanan Detail</h3>
            </div>
            <div class="card-body">
                <div class="row">
					<div class="col-6">                
                        <div class="form-group">
                            <label for="inputNamaUnitLayanan">Unit Layanan</label>
                            <input type="hidden" id="inputIdUnitLayanan" class="form-control form-control-sm" value="<?= $unit_layanan->id ?>" readonly>
                            <input type="text" id="inputNamaUnitLayanan" class="form-control form-control-sm" value="<?= $unit_layanan->nama_unit_layanan ?>" readonly>
                        </div>
                    </div>
                    <div class="col-6"> 
                        <div class="form-group">                        
                            <label for="inputNamaUnitLayanan">IHS Location</label>                                                       
                            <div class="input-group input-group-sm">
                            <input type="text" id="inputIHSLocation" class="form-control form-control-sm" value="<?= $unit_layanan->ihs_location ?>" readonly>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-default btn-flat" id="btn-cari-ihs-lokasi">Cari</button>
                                    <button type="button" class="btn btn-default btn-flat" id="btn-clear-ihs-lokasi">Hapus</button>                                    
                                </span>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Daftar Dokter</h3>
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
                <h3 class="card-title">Daftar Layanan</h3>
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


<div class="modal fade" id="modal-RegisterDokter">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormRegisterDokter">
                <div class="modal-header">
                    <h4 class="modal-title">Form Register Dokter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" id="tableModalRegisterDokter">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Nama Dokter</th>
                                        <th>SIP</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveRegisterDokter">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-RegisterLayanan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormRegisterLayanan">
                <div class="modal-header">
                    <h4 class="modal-title">Form Register Layanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table" id="tableModalRegisterLayanan">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Layanan</th>
                                        <th>Tarif</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveRegisterLayanan">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-IHSLokasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">IHS Lokasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">                
                        <table class="table" id="tableLocation">
                            <thead>
                                <tr>
                                    <th></th>                            
                                    <th>Lokasi ID</th>
                                    <th>Nama Lokasi</th>                            
                                    <th>Tipe Lokasi </th>
                                    <th>Tipe Lokasi Code</th>                            
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>    
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->