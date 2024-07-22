<!-- step 2 -->
<div class="row">
	<div class="col-sm-6 d-none"></div>
	<div class="col-sm-12">
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
					<div class="col-sm-6">
						<div class="form-group">
							<label for="inputNoRMNama">No RM - Nama</label>
							<input type="text" id="inputNoRMNama" class="form-control form-control-sm" readonly required value="">
							<input type="hidden" id="inputIdRegistrasi" name="inputIdRegistrasi" value="0" data-bind="id_registrasi" />
						</div>
						<div class="form-group">
							<label for="inputTanggalPeriksa">Tanggal Periksa</label>
							<div class="input-group date datepicker" id="dateTanggalPeriksa" data-target-input="nearest">
								<input type="text" id="inputTanggalPeriksa" name="inputTanggalPeriksa" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalPeriksa" required>
								<div class="input-group-append" data-target="#dateTanggalPeriksa" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputUnitLayanan">Unit Layanan</label>
							<select class="form-control form-control-sm custom-select custom-select-sm" id="inputUnitLayanan" name="inputUnitLayanan" required>
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
							<label for="inputDokterUnitLayanan">Dokter</label>
							<select class="form-control form-control-sm custom-select custom-select-sm" id="inputDokterUnitLayanan" name="inputDokterUnitLayanan" required>
								<option value="" selected disabled>--pilih dokter--</option>
							</select>
						</div>
						<div class="form-group">
							<label for="inputTipePasien">Tipe Pasien</label>
							<select class="form-control form-control-sm custom-select custom-select-sm" id="inputTipePasien" name="inputTipePasien" required>
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
							<textarea name="inputKeterangan1" id="inputKeterangan1" class="form-control form-control-sm" rows="3">Kode User:
Kode Usia:
Kode partner:
Kode corner:
Kode rujukan: website/facebook/instagram/twiter/kolega/partner/lewat/lainnya (sebutkan)
Kode datang: B/L/BL/U
No.asuransi:</textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="inputTacc">Tacc</label>
							<select class="form-control form-control-sm custom-select custom-select-sm" id="inputTacc" name="Tacc" data-input="Tacc" required>
								<option value="-1">Tanpa TACC</option>   								
								<option value="1">Time</option>
								<option value="2 ">Age</option>
								<option value="3">Complication</option>
								<option value="4">Comorbidity</option>
                            </select>
						</div>												
						<div class="form-group">
							<label for="inputKeluhan">Keluhan</label>
							<input type="text" id="inputKeluhan" class="form-control form-control-sm" required value="-">
						</div>						
						<div class="form-group">
							<label for="inputKesadaran">Kesadaran</label>
							<select class="form-control form-control-sm custom-select custom-select-sm" id="inputKesadaran" name="inputKesadaran" required>
								<option value="01">Compos mentis</option>
								<option value="02">Somnolence</option>
								<option value="03">Sopor</option>
								<option value="04">Coma</option>
							</select>							
						</div>				
						<div class="row">
							<div class="col-6">		
								<div class="form-group">
									<label for="inputSistol">Sistol</label>
									<input type="number" id="inputSistol" class="form-control form-control-sm" required value="0">
								</div>								
							</div>
							<div class="col-6">		
								<div class="form-group">
									<label for="inputDiastole">Diastole</label>
									<input type="number" id="inputDiastole" class="form-control form-control-sm" required value="0">
								</div>
							</div>							
						</div>						
						<div class="row">
							<div class="col-6">		
								<div class="form-group">
								<label for="inputBeratBadan">Berat Badan</label>
								<input type="number" id="inputBeratBadan" class="form-control form-control-sm" required value="0">
							</div>	
						</div>
							<div class="col-6">		
								<div class="form-group">
									<label for="inputTinggiBadan">Tinggi Badan</label>
									<input type="number" id="inputTinggiBadan" class="form-control form-control-sm" required value="0">
								</div>									
							</div>							
						</div>
						<div class="row">
							<div class="col-6">		
								<div class="form-group">
									<label for="inputRespRate">Resp Rate</label>
									<input type="number" id="inputRespRate" class="form-control form-control-sm" required value="0">
								</div>
							</div>
							<div class="col-6">		
								<div class="form-group">
									<label for="inputHeartRate">Heart Rate</label>
									<input type="number" id="inputHeartRate" class="form-control form-control-sm" required value="0">
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

<div class="row no-print">
	<div class="col-sm-12">
		<button type="button" class="btn btn-primary float-right next-step <?= ($pendaftaran_privilege != 2) ? 'd-none' : '' ?>">
		<span class="spinner-border spinner-border-sm overlay" role="status" aria-hidden="true" style="display: none;"></span>									                                                                        
			Selanjutnya
		</button>
		<button type="button" class="btn btn-default float-right prev-step <?= ($pendaftaran_privilege != 2) ? 'd-none' : '' ?>" style="margin-right: 5px;">
			Sebelumnya
		</button>
	</div>
</div>