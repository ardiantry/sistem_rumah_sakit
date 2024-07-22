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
                                                        <label>Tanggal Rujukan</label>
                                                        <div class="input-group date datetimepicker" id="dateTanggalRujukan" data-target-input="nearest">
                                                            <input type="text" id="inputTanggalRujukan" name="inputTanggalRujukan" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalPeriksa" disabled required>
                                                            <div class="input-group-append" data-target="#dateTanggalRujukan" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputUnitLayanan">Unit Layanan Rujukan</label>
                                                        <select class="form-control form-control-sm custom-select custom-select-sm" id="inputUnitLayanan" name="inputUnitLayanan" disabled required>
                                                            <option value="" selected disabled>--pilih unit layanan--</option>
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
                            <label for="inputKelas">Kelas</label>
                            <select class="form-control form-control-sm custom-select custom-select-sm" id="inputKelas" name="inputKelas" required>
                                <option value="" selected disabled>--pilih kelas--</option>
                                <?php								
									foreach($kelas as $rows)
									{
										echo "<option value='{$rows->id}'>{$rows->nama_kelas}</option>";
									}
								?>	 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputRuangan">Ruangan</label>
                            <select class="form-control form-control-sm custom-select custom-select-sm" id="inputRuangan" name="inputRuangan" required>
                                <option value="" selected disabled>--pilih ruangan--</option>                                                                                                                                                                               
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="inputBed">Bed</label>
                            <select class="form-control form-control-sm custom-select custom-select-sm" id="inputBed" name="inputBed" required>
                                <option value="" selected disabled>--pilih bed--</option>                                                                                                                                                                                  
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