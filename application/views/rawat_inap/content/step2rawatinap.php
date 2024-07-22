<div class="row">
    <div class="col-sm-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Data Pemeriksaan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-default btn-sm mr-1" data-toggle="modal" data-target="#modal-registrasi">
                            <i class="fas fa-search"></i>
                            Data Pasien
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputNoReg1">No Reg - Nama (No RM) <a id="btn-riwayat-pasien" href="#" data-toggle="modal" data-target="#modal-riwayat" style="display:none;"> - Lihat riwayat pasien</a></label>
                            <input type="text" id="inputNoReg1" class="form-control form-control-sm" readonly required value="">
                            <input type="hidden" id="inputNoReg" class="form-control form-control-sm" required value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="inputTanggalPemeriksaan">Tanggal Pemeriksaan</label>
                            <div class="input-group date datepicker" id="dateTanggalPemeriksaan" data-target-input="nearest">
                                <input type="text" id="inputTanggalPemeriksaan" name="inputTanggalPemeriksaan" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalPemeriksaan" required>
                                <div class="input-group-append" data-target="#dateTanggalPemeriksaan" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>                                                   
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="overlay" style="display: none;">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>	                                        
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">                  
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body p-2">
                <div class="form-group">
                    <label for="inputDiagnosa">Diagnosa</label>            
                    <textarea class="form-control form-control-sm" rows="3" id="inputDiagnosa" name="inputDiagnosa" placeholder="Ketik Diagnosa" required></textarea>
                </div>   
                <div class="form-group">
                    <label for="inputDiagnosa">Keterangan</label>            
                    <textarea class="form-control form-control-sm" rows="3" id="inputKeterangan3" name="inputKeterangan3" placeholder="Ketik Keterangan">
Kode user:                                                        
                    </textarea>                
                </div>         
            </div>
        </div>   
    </div>    
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body p-2">
                <label for="inputLayanan">Layanan</label>            
                <div class="input-group input-group-sm mb-1">
                    <input class="form-control form-control-sm" placeholder="Ketik Layanan" id="inputLayanan" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-secondary btn-cari-layanan" type="button">Cari</button>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered table-sm" id="tableLayanan">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none" data-label="id_layanan">ID Layanan</th>
                                <th data-label="jumlah_layanan" class="text-center align-middle" style="width:20%;">Jumlah</th>
                                <th data-label="nama_layanan" class="text-left align-middle">Nama Layanan</th>
                                <th data-label="harga_layanan" class="text-right align-middle d-none">Harga</th>
                                <th data-label="button_delete" class="text-right align-middle"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center" data-label="empty_row">Tidak ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>      
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body p-2">
            <label for="Observasi">Observasi</label>
            <div class="row">
                <div class="col-4">
                    <div class="input-group date datetimepicker" id="dateTanggalObservasi" data-target-input="nearest">
                        <input type="text" id="inputTanggalObservasi" name="inputTanggalObservasi" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalObservasi">
                        <div class="input-group-append" data-target="#dateTanggalObservasi" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                        </div>
                    </div>                                                                                                                                             
                </div>
                <div class="col-8">
                    <div class="input-group input-group-sm mb-1">                                                                                                                                                                             
                        <input type="text" class="form-control form-control-sm" placeholder="Keterangan" id="inputKeteranganObservasi" name="inputKeteranganObservasi">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="btnAddObservasi">Tambah</button>
                        </div>
                    </div>                                                            
                </div>                                                            
            </div>
            <div class="table-responsive-sm">
                <table class="table table-hover table-bordered table-sm" id="tableObservasi">
                    <thead class="thead-light">
                        <tr>
                            <th class="d-none">ID</th>                                                                    
                            <th style="width:20%;" class="align-middle">Tanggal Observasi</th>
                            <th class="align-middle">Keterangan</th>
                            <th style="width:50px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>
                        </tr>
                    </tbody>
                </table>
            </div>  
            </div>
        </div>
    </div>                 
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body p-2">
                <label for="Resep">Resep</label>
                <div class="row">
                    <div class="col-4">
                        <div class="input-group date datetimepicker" id="dateTanggalResep" data-target-input="nearest">
                            <input type="text" id="inputTanggalResep" name="inputTanggalResep" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalResep">
                            <div class="input-group-append" data-target="#dateTanggalResep" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                            </div>
                        </div>                                                                                                                                             
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-1">                                                                                                                                                                             
                            <input type="text" class="form-control form-control-sm" placeholder="Resep" id="inputKeteranganResep" name="inputKeteranganResep">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="btnAddResep">Tambah</button>
                            </div>
                        </div>                                                            
                    </div>                                                            
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered table-sm" id="tableResep">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none">ID</th>                                                                    
                                <th style="width:20%;" class="align-middle">Tanggal Resep</th>
                                <th class="align-middle">Resep</th>
                                <th style="width:20%;" class="align-middle">Status</th>                                                                    
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body p-2">
                <label for="Gizi">Gizi</label>
                <div class="row">
                    <div class="col-4">
                        <div class="input-group date datetimepicker" id="dateTanggalGizi" data-target-input="nearest">
                            <input type="text" id="inputTanggalGizi" name="inputTanggalGizi" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalGizi">
                            <div class="input-group-append" data-target="#dateTanggalGizi" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                            </div>
                        </div>                                                                                                                                             
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-1">                                                                                                                                                                             
                            <select class="form-control form-control-sm custom-select custom-select-sm" id="inputKeteranganGizi" name="inputKeteranganGizi">
                                <option selected disabled value="">--pilih jenis diet--</option>
                                <option value="D001">Diet Protein</option>        
                                <option value="D002">Diet Karbohidrat</option>    
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="btnAddGizi">Tambah</button>
                            </div>
                        </div>                                                            
                    </div>                                                            
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered table-sm" id="tableGizi">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none">ID</th>                                                                    
                                <th style="width:20%;" class="align-middle">Tanggal Diet</th>
                                <th class="align-middle">Jenis Diet</th>
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center" data-label="empty_row">Tidak ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body p-2">
                <label for="Lab">Rujuk Labolatorium</label>
                <div class="row">
                    <div class="col-4">
                        <div class="input-group date datetimepicker" id="dateTanggalLab" data-target-input="nearest">
                            <input type="text" id="inputTanggalLab" name="inputTanggalLab" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalLab">
                            <div class="input-group-append" data-target="#dateTanggalLab" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                            </div>
                        </div>                                                                                                                                             
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-1">                                                                                                                                                                             
                            <select class="form-control form-control-sm custom-select custom-select-sm" id="inputJenisLab" name="inputJenisLab">
                                <option selected disabled value="">--pilih jenis lab--</option>
                                <option value="L001">Cek Darah</option>        
                                <option value="L002">Cek Urin</option>    
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="btnAddLab">Tambah</button>
                            </div>
                        </div>                                                            
                    </div>                                                            
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered table-sm" id="tableLab">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none">ID</th>                                                                    
                                <th style="width:20%;" class="align-middle">Tanggal Lab</th>
                                <th class="align-middle">Jenis Lab</th>
                                <th style="width:20%;" class="align-middle">Status</th>                            
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center" data-label="empty_row">Tidak ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>      
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body p-2">
                <label for="Lab">Rujuk Radiologi</label>
                <div class="row">
                    <div class="col-4">
                        <div class="input-group date datetimepicker" id="dateTanggalRad" data-target-input="nearest">
                            <input type="text" id="inputTanggalRad" name="inputTanggalRad" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalRad">
                            <div class="input-group-append" data-target="#dateTanggalRad" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                            </div>
                        </div>                                                                                                                                             
                    </div>
                    <div class="col-8">
                        <div class="input-group input-group-sm mb-1">                                                                                                                                                                             
                            <select class="form-control form-control-sm custom-select custom-select-sm" id="inputJenisRad" name="inputJenisRad">
                                <option selected disabled value="">--pilih jenis radiologi--</option>
                                <option value="R001">Gigi</option>        
                                <option value="R002">Paru-paru</option>    
                                <option value="R003">CT-Scan</option>                                
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="btnAddRad">Tambah</button>
                            </div>
                        </div>                                                            
                    </div>                                                            
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered table-sm" id="tableRad">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none">ID</th>                                                                    
                                <th style="width:20%;" class="align-middle">Tanggal Radiologi</th>
                                <th class="align-middle">Jenis Radiologi</th>
                                <th style="width:20%;" class="align-middle">Status</th>                            
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center" data-label="empty_row">Tidak ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>            
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body p-2">
                <label for="Exam">Pemeriksaan Fisik</label>
                <div class="row">
                    <div class="col-12">
                        <div class="input-group-sm mb-1 float-right">                                                                                                                                                                             
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="btnAddExam">Tambah</button>
                            </div>
                        </div>                                                            
                    </div>                                                            
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered table-sm" id="tableExam">
                        <thead class="thead-light">
                            <tr>
                                <th class="d-none">ID</th>                                                                    
                                <th style="width:20%;" class="align-middle">Nama</th>
                                <th class="align-middle">Keterangan</th>
                                <th style="width:20%;" class="align-middle">Foto</th>                            
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center" data-label="empty_row">Tidak ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>         
</div>

<div class="row no-print">
    <div class="col-12">                                   
    <button type="button" class="btn btn-success float-right next-step <?= ($pemeriksaan_privilege != 2) ? 'd-none' : '' ?>">
            <span class="spinner-border spinner-border-sm overlay" role="status" aria-hidden="true" style="display: none;"></span>									                                                                        
            Lanjut ke Pembayaran
        </button>                                    
        <button type="button" class="btn btn-primary float-right next-step <?= ($pemeriksaan_privilege != 2) ? 'd-none' : '' ?>" style="margin-right: 5px;">
            <span class="spinner-border spinner-border-sm overlay" role="status" aria-hidden="true" style="display: none;"></span>									                                                                        
            Selanjutnya
        </button>
        <button type="button" class="btn btn-default float-right prev-step <?= ($pemeriksaan_privilege != 2) ? 'd-none' : '' ?>" style="margin-right: 5px;">
            Sebelumnya
        </button>
    </div>
</div>