<!-- step 1 -->
<div class="row">
	<div class="col-sm-12">
		<div class="card card-danger">
			<div class="card-header">
				<h3 class="card-title d-none d-sm-inline">Data Pasien</h3>

				<div class="card-tools">
					<div class="input-group input-group-sm">
						<button type="button" class="btn btn-default btn-sm mr-1" data-toggle="modal" data-target="#modal-pasien">
							<i class="fas fa-search d-none d-sm-inline"></i>
							Data Pasien
						</button>

						<button type="button" class="btn btn-info btn-sm mr-1 <?= ($pendaftaran_privilege != 2) ? 'd-none' : '' ?>" data-toggle="modal" data-target="#modal-formPasien">
							<i class="fas fa-plus d-none d-sm-inline"></i>
							Tambah Pasien
						</button>

						<button type="button" class="btn btn-secondary btn-sm mr-1" data-toggle="modal" data-target="#modal-booking">
							<i class="fas fa-plus d-none d-sm-inline"></i>
							Pasien Booking
						</button>  
						<button type="button" class="btn btn-secondary btn-sm mr-1" data-toggle="modal" data-target="#modal-generate-link">
							<i class="fa fa-link"></i>
							 Link Appointment
						</button>                                                      
					</div>
				</div>
			</div>
			<div class="card-body"> 
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="hidden" id="inputIdPasien" name="inputIdPasien" value="" data-bind="id_pasien">
							<label for="inputNoRM">No RM</label>
							<input type="text" id="inputNoRM" name="inputNoRM" class="form-control form-control-sm" value="" required readonly data-bind="no_rm">
						</div>
						<div class="form-group">
							<label for="inputNamaPasien">Nama Pasien</label>
							<input type="text" id="inputNamaPasien" name="inputNamaPasien" class="form-control form-control-sm" value="" required data-bind="nama_pasien">
						</div>
						<div class="form-group">
							<label for="inputTempatLahir">Tempat Lahir</label>
							<input type="text" id="inputTempatLahir" name="inputTempatLahir" class="form-control form-control-sm" value="" required data-bind="tempat_lahir">
						</div>

						<div class="form-group">
							<label for="inputTanggalLahir">Tanggal Lahir</label>
							<div class="input-group date datepicker" id="dateTanggalLahir" data-target-input="nearest" data-bind="tanggal_lahir">
								<input type="text" id="inputTanggalLahir" name="inputTanggalLahir" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalLahir" required />
								<div class="input-group-append" data-target="#dateTanggalLahir" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputAgama">Agama</label>
							<select class="form-control form-control-sm custom-select custom-select-sm" id="inputAgama" name="inputAgama" data-bind="agama">
								<option value="" selected disabled>--pilih agama--</option>
								<option value="Islam">Islam</option>
								<option value="Kristen ">Kristen </option>
								<option value="Katholik">Katholik</option>
								<option value="Hindu">Hindu</option>
								<option value="Budha">Budha</option>
								<option value="Kong Hu Cu">Kong Hu Cu</option>
								<option value="-">-</option>   
							</select>
						</div>
						<div class="form-group">
							<label for="inputAlamat">Alamat</label>
							<textarea id="inputAlamat" class="form-control form-control-sm" rows="3" data-bind="alamat"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="inputNoTelp">KTP</label>
									<input type="text" id="inputKTP" class="form-control form-control-sm" value="" required>
								</div>                           
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="inputStatusIHS">Status IHS</label>
									<input type="text" id="inputStatusIHS" class="form-control form-control-sm" value="" readonly>     
									<input type="hidden" id="inputIHS_ID" class="form-control form-control-sm" value="" readonly>									
								</div>            								                 
							</div>                                                        
						</div>
						<div class="row">
							<div class="col-6">							
								<div class="form-group">
									<label for="inputNoBPJS">No Kartu BPJS</label>
									<input type="text" id="inputNoBPJS" class="form-control form-control-sm" value="" required>
								</div>
							</div> 														
							<div class="col-6">							
								<div class="form-group">
									<label for="inputStatusBPJS">Status BPJS</label>
									<input type="text" id="inputStatusBPJS" class="form-control form-control-sm" value="" readonly>     
								</div>
							</div> 
						</div>

						<div class="form-group">
							<label for="inputNoTelp">No Telp</label>
							<input type="number" id="inputNoTelp" class="form-control form-control-sm" value="" step="1">
						</div>

						<div class="row">
							<div class="col-6">		
								<div class="form-group">
									<label for="inputGolonganDarah">Golongan Darah</label>
									<select class="form-control form-control-sm custom-select custom-select-sm" id="inputGolonganDarah">
										<option value="" selected disabled>--pilih golongan darah--</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="AB">AB</option>
										<option value="O">O</option>                                                         
									</select>
								</div>	
							</div>
							<div class="col-6">		
								<div class="form-group">
									<label for="inputJenisKelamin">Jenis Kelamin</label>
									<select class="form-control form-control-sm custom-select custom-select-sm" id="inputJenisKelamin">
										<option value="" selected disabled>--pilih jenis kelamin--</option>
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>   
									</select>
								</div>	
							</div>
						</div>	



						<div class="form-group">
							<label for="inputPekerjaan">Pekerjaan</label>
							<select class="form-control form-control-sm custom-select custom-select-sm" id="inputPekerjaan">
								<option value="" selected disabled>--pilih pekerjaan--</option>
								<?php								
									foreach($pekerjaan as $rows)
									{
										echo "<option value='{$rows->id}'>{$rows->pekerjaan}</option>";
									}
								?>																	
							</select>
						</div>
						<div class="form-group">
							<label for="inputKeterangan">Keterangan</label>
							<textarea id="inputKeterangan" class="form-control form-control-sm" rows="3"></textarea>
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