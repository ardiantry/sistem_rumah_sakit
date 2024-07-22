<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Master Data Dokter</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddDokter">
                            <i class="fas fa-plus"></i>
                            Tambah Dokter
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap" id="tableDokter">
                    <thead>
                        <tr>
                            <th style="width:10%;">No</th>
                            <th>Nama Dokter</th>
                            <th>NIP</th>
                            <th>SIP</th>
                            <th>Gelar Depan</th>                                                                                    
                            <th>Gelar Belakang</th>                                                                                                                
                            <th>Dokter Ahli</th> 
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Email</th>                
                            <th>KTP</th>                
                            <th>IHS ID</th>                
                            <th>KdDokter</th>                
                            <th>ID</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                            <th style="width: 20%">&nbsp;</th>
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

<div class="modal fade" id="modal-formDokter">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="FormDokter">
                <div class="modal-header">
                    <h4 class="modal-title">Form Dokter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formNamaDokter">Nama Dokter</label>
                                <input type="hidden" id="formIdDokter" name="formIdDokter" class="form-control form-control-sm" value="0" data-input="id">                                
                                <input type="text" id="formNamaDokter" name="formNamaDokter" class="form-control form-control-sm" value="" data-input="nama_dokter" required>                                
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="formKTP">KTP</label>
                                <input type="text" id="formKTP" name="formKTP" class="form-control form-control-sm" value="" data-input="ktp" required>                                
                            </div>
                        </div>
                        <div class="col-3">
                        <div class="form-group">
                            <span class="spinner-input" style="display: none;">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="sr-only">Loading...</span>                                        
                            </span>

                            <label for="inputNoTelp">Status IHS</label>                                        
                            <input type="text" id="formStatusIHS" class="form-control form-control-sm" value="" readonly>                                        
                            <input type="hidden" id="formIHS_ID" class="form-control form-control-sm" value="" readonly>
                        </div>                           
                    </div>                                                                                                 
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formNIP">NIP</label>
                                <input type="text" id="formNIP" name="formNIP" class="form-control form-control-sm" value="" data-input="nip">                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formSIP">SIP</label>
                                <input type="text" id="formSIP" name="formSIP" class="form-control form-control-sm" value="" data-input="sip">                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formSIP">Kode Dokter BPJS</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" id="formKdDokter" name="formKdDokter" class="form-control form-control-sm" value="" readonly="">
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-default btn-flat" id="btn-cari-dokter-bpjs">Cari</button>
                                    </span>
                                </div>                                
                            </div>                                                    
                        </div>      
                        <div class="col-sm-3">
                            <div class="form-group d-none">
                                <label for="formSIP">Nama Dokter BPJS</label>
                                <input type="text" id="formNmDokter" name="formNmDokter" class="form-control form-control-sm" value="" readonly="">                                
                            </div>
                        </div>                                          
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formDokterAhli">Dokter Ahli</label>
                                <input type="text" id="formDokterAhli" name="formDokterAhli" class="form-control form-control-sm" value="" data-input="dokter_ahli">                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formGelarDepan">Gelar Depan</label>
                                <input type="text" id="formGelarDepan" name="formGelarDepan" class="form-control form-control-sm" value="" data-input="gelar_depan">                                
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formGelarBelakang">Gelar Belakang</label>
                                <input type="text" id="formGelarBelakang" name="formGelarBelakang" class="form-control form-control-sm" value="" data-input="gelar_belakang">                                
                            </div>
                        </div>                         
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formAlamat">Alamat</label>
                                <textarea id="formAlamat" name="formAlamat" class="form-control form-control-sm" rows="2" data-input="alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formEmail">Email</label>
                                <input type="email" id="formEmail" name="formEmail" class="form-control form-control-sm" value="" data-input="email">                                
                            </div>
                        </div>           
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="formNoTelp">No Telp</label>
                                <input type="number" id="formNoTelp" name="formNoTelp" class="form-control form-control-sm" value="" data-input="no_telp">                                
                            </div>
                        </div>                                     
                    </div>                                                            
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSaveDokter">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-DokterBPJS">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">List Dokter BPJS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">                
                        <table class="table" id="tableDokterBPJS">
                            <thead>
                                <tr>
                                    <th></th>                            
                                    <th>Kode Dokter</th>
                                    <th>Nama Dokter</th>                            
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