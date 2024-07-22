<div class="row">
    <div class="col-sm-12">
        <section>
            <div class="wizard">
                <div class="wizard-inner">
                    <ul class="nav nav-tabs" role="tablist">
                        
                        <li role="presentation" class="disabled">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <span class="step-icon"><i class="fas fa-building"></i></span>
                                <span class="step-number">Langkah 1 : Pendaftaran</span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                <span class="step-icon"><i class="fas fa-clipboard-check"></i></span>
                                <span class="step-number">Langkah 2 : Pemeriksaan</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <form id="wizardForm" role="form">
                    <div class="tab-content">
                        
                        <div class="tab-pane" role="tabpanel" id="step1">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Data Pendaftaran</h3>
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
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputNoRMNama">No RM - Nama</label>
                                                        <input type="text" id="inputNoRMNama" class="form-control form-control-sm" readonly required value="">
                                                        <input type="hidden" id="inputIdRegistrasi" name="inputIdRegistrasi" value="0" data-bind="id_registrasi" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputTanggalPeriksa">Tanggal Rujukan</label>
                                                        <div class="input-group date datetimepicker" id="dateTanggalPeriksa" data-target-input="nearest">
                                                            <input type="text" id="inputTanggalPeriksa" name="inputTanggalPeriksa" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalPeriksa" disabled required>
                                                            <div class="input-group-append" data-target="#dateTanggalPeriksa" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputUnitLayanan">Unit Layanan Rujukan</label>
                                                        <select class="form-control form-control-sm custom-select custom-select-sm" id="inputUnitLayanan" name="inputUnitLayanan" disabled required>
                                                            <option value="" selected disabled>--pilih unit layanan--</option>
                                                            <option value="-1">Rawat Inap</option>
                                <?php								
									foreach($unit_layanan as $rows)
									{
										echo "<option value='{$rows->id}' data-item='".json_encode($rows)."'>{$rows->nama_unit_layanan}</option>";
									}
								?>	                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputDokterUnitLayanan">Dokter Rujukan</label>
                                                        <select class="form-control form-control-sm custom-select custom-select-sm" id="inputDokterUnitLayanan" name="inputDokterUnitLayanan" disabled required>
                                                            <option value="" selected disabled>--pilih dokter--</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputTipePasien">Tipe Pasien</label>
                                                        <select class="form-control form-control-sm custom-select custom-select-sm" id="inputTipePasien" name="inputTipePasien" disabled required>
                                                        <option value="" selected disabled>--pilih tipe pasien--</option>
                                <?php								
								foreach($tipe_pasien as $rows)
									{
										echo "<option value='{$rows->id}'>{$rows->tipe_pasien}</option>";
									}
								?>	                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputKeterangan1">Keterangan</label>
                                                        <textarea name="inputKeterangan1" id="inputKeterangan1" class="form-control form-control-sm" rows="3">
Kode User:
Kode Usia:
Kode partner:
Kode corner:
Kode rujukan: website/facebook/instagram/twiter/kolega/partner/lewat/lainnya (sebutkan)
Kode datang: B/L/BL/U
No.asuransi:
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="inputTanggalPeriksa">Tanggal Masuk</label>
                                                        <div class="input-group date datetimepicker" id="dateTanggalMasuk" data-target-input="nearest">
                                                            <input type="text" id="inputTanggaMasuk" name="inputTanggalMasuk" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalMasuk" required>
                                                            <div class="input-group-append" data-target="#dateTanggalMasuk" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPetugas">Petugas</label>
                                                        <select class="form-control form-control-sm custom-select custom-select-sm" id="inputPetugas" name="inputPetugas" required>
                                                            <option value="" selected disabled>--pilih petugas--</option>
                                <?php								
									foreach($petugas as $rows)
									{
										echo "<option value='{$rows->id}' data-item='".json_encode($rows)."'>{$rows->nama_petugas}</option>";
									}
								?>	                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputJenisLab">Jenis Labolatorium</label>
                                                        <select class="form-control form-control-sm custom-select custom-select-sm" id="inputJenisLab" name="inputJenisLab" disabled required>
                                                            <option selected disabled value="">--pilih jenis lab--</option>
                                                            <?php								
						foreach($lab_type as $rows)
							{
								$jrow = json_encode($rows);
								echo "<option value='{$rows->id}' data-item='{$jrow}'>{$rows->laboratory_type_desc}</option>";
							}
						?>	
                                                        </select>
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

                            <div class="row no-print">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary float-right next-step <?= ($pendaftaran_privilege != 2) ? 'd-none' : '' ?>">
                                    <span class="spinner-border spinner-border-sm overlay" role="status" aria-hidden="true" style="display: none;"></span>									                                                                        
                                        Selanjutnya
                                    </button>
                                   
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
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
                                                        <div class="input-group date datetimepicker" id="dateTanggalPemeriksaan" data-target-input="nearest">
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
            <label for="inputExpertise">Expertise</label>            
            <textarea class="form-control form-control-sm" rows="3" id="inputExpertise" name="inputExpertise" placeholder="Ketik Expertise" required></textarea>
        </div>
    </div>
</div>     
<div class="col-lg-6 col-sm-12">
    <div class="card">
        <div class="card-body p-2">
            <label for="Lab">Hasil Labolatorium</label>
            <div class="row">
                <div class="col-8 offset-4">
                    <div class="input-group input-group-sm mb-1">                                                                                                                                                                             
                        <select class="form-control form-control-sm custom-select custom-select-sm" id="inputObservLaboratory" name="inputObservLaboratory">
                            <option selected disabled value="">--pilih jenis pemeriksaan--</option>
                            <option value="RLAB001" data-observation='{
            "ref_laboratory_code": "RLAB001", 
            "ref_laboratory_desc": "Hemoglobin", 
            "result": 0,
            "ref_laboratory_range": "12-14",
            "uom": "g/dl"
            }'>Hemoglobin</option>        
                            <option value="RLAB002" data-observation='{
                "ref_laboratory_code": "RLAB002", 
                "ref_laboratory_desc": "Hematokrit", 
                "result": "0",
                "ref_laboratory_range": "40-50",
                "uom": "%"
            }'>Hematokrit</option>    
                            <option value="RLAB003" data-observation='{
                "ref_laboratory_code": "RLAB003", 
                "ref_laboratory_desc": "Leukosit", 
                "result": "0",
                "ref_laboratory_range": "5000-10000",
                "uom": "10/ul"
            }'>Leukosit</option>    
                            <option value="RLAB004" data-observation='{
                "ref_laboratory_code": "RLAB004", 
                "ref_laboratory_desc": "Trombosit", 
                "result": 0,
                "ref_laboratory_range": "150-450",
                "uom": "10^3/ul"
            }'>Trombosit</option>    
                            <option value="RLAB005" data-observation='{
                "ref_laboratory_code": "RLAB005", 
                "ref_laboratory_desc": "Glukosa", 
                "result": 0,
                "ref_laboratory_range": "70-50",
                "uom": "mg/dl"
            }'>Glukosa</option>    
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button" id="btnAddObservLaboratory">Tambah</button>
                        </div>
                    </div>                                                            
                </div>                                                            
            </div>
            <div class="table-responsive-sm">
                <table class="table table-hover table-bordered table-sm" id="tableObservLaboratory">
                    <thead class="thead-light">
                        <tr>
                            <th class="d-none">ID</th>                                                                    
                            <th class="align-middle">Pemeriksaan</th>
                            <th class="text-center align-middle">Hasil</th>
                            <th class="text-center align-middle">Nilai Rujukan</th>                            
                            <th class="text-center align-middle">Satuan</th>                            
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
                                    <button type="button" class="btn btn-primary float-right next-step <?= ($pemeriksaan_privilege != 2) ? 'd-none' : '' ?>">
                                        <span class="spinner-border spinner-border-sm overlay" role="status" aria-hidden="true" style="display: none;"></span>									                                                                        
                                        Selesai
                                    </button>
                                    <button type="button" class="btn btn-default float-right prev-step <?= ($pemeriksaan_privilege != 2) ? 'd-none' : '' ?>" style="margin-right: 5px;">
                                        Sebelumnya
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
 

<div class="modal fade" id="modal-registrasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
                <h4 class="modal-title">Data Laboratory</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  table-responsive"> 
                   <table id="tablePasienLaboratory" class="table table-striped text-nowrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No registrasi</th>
                                <th>Nama Pasien</th>
                                <th>No RM</th>
                                <th>Nama Dokter</th>
                                <th>Dokter Ahli</th>
                                <th>Tanggal Daftar</th>
                                <th>Tanggal Pemeriksaan</th> 
                                <th>Id Pasien</th>
                                <th>Id</th> 


                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                     </table>         
                </div>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
