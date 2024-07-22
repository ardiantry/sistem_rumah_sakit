<!-- step 3 -->
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
						<div class="row">
							<div class="col-12">
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
					<label for="inputKeterangan2">Keterangan</label>            
<textarea class="form-control form-control-sm" rows="3" id="inputKeterangan2" name="inputKeterangan2" placeholder="Ketik Keterangan">Kode user:
KU:
GCS:EVM
TD:
N:
RR:
T:
BB/PB:
LK:
LLA:
S:
O:
A:
P:
Rencana kontrol: dd/mm/yyyy
Kontrol terkait:
Hasil lab penting:
Hb:
Leu:
Plt:   		
</textarea>                
				</div>         
			</div>
		</div>   
	</div>    
	<!-- /.col -->	
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
					<table class="table table-hover table-sm" id="tableLayanan">
						<thead class="thead-light">
							<tr>
								<th class="d-none" data-label="id_layanan">ID Layanan</th>
								<th data-label="jumlah_layanan" class="text-center align-middle" style="width:20%;">Jumlah</th>
								<th data-label="nama_layanan" class="text-left align-middle">Nama Layanan</th>
								<th data-label="harga_layanan" class="text-left align-middle">Harga Layanan</th>
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
	<!-- /.col -->	
	<div class="col-lg-6 col-sm-12">
		<div class="card">
			<div class="card-body p-2">
				<label for="inputLayanan">ICD 10</label>            
				<div class="input-group input-group-sm mb-1">
					<input class="form-control form-control-sm" placeholder="Ketik ICD 10" id="inputIcd10" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-secondary btn-cari-icd10" type="button">Cari</button>
					</div>
				</div>
				<div class="table-responsive-sm">
					<table class="table table-hover table-sm" id="tableIcd10">
						<thead class="thead-light">
							<tr>
								<td class="d-none" data-label="id_icd10">ID ICD 10
								</td>
								<th data-label="jumlah_icd10" class="text-center align-middle d-none" style="width:20%;">Jumlah</th>
								<th data-label="nama_icd10" class="text-left align-middle">Nama ICD 10</th>
								<th data-label="button_delete" class="text-right align-middle"></th>
							</tr>
						</thead>
						<tbody>
							<td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>   
	<!-- /.col -->			
	<div class="col-lg-6 col-sm-12">
		<div class="card">
			<div class="card-body p-2">
				<label for="inputLayanan">ICD 9</label>            
				<div class="input-group input-group-sm mb-1">
					<input class="form-control form-control-sm" placeholder="Ketik ICD 9" id="inputIcd9" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-secondary btn-cari-icd9" type="button">Cari</button>
					</div>
				</div>
				<div class="table-responsive-sm">
					<table class="table table-hover table-sm" id="tableIcd9">
						<thead class="thead-light">
							<tr>
								<td class="d-none" data-label="id_icd9">ID ICD 9
								</td>
								<th data-label="jumlah_icd9" class="text-center align-middle d-none" style="width:20%;">Jumlah</th>
								<th data-label="nama_icd9" class="text-left align-middle">Nama ICD 9</th>
								<th data-label="button_delete" class="text-right align-middle"></th>
							</tr>
						</thead>
						<tbody>
							<td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>   
	<!-- /.col -->	
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
                <table class="table table-hover table-sm" id="tableObservasi">
                    <thead class="thead-light">
                        <tr>
                            <th class="d-none">ID</th>                                                                    
                            <th style="width:20%;" class="align-middle">Tanggal Observasi</th>
							<th style="width:20%;" class="align-middle">Jam Observasi</th>								
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
	<!-- /.col -->								
	<div class="col-lg-6 col-sm-12">
		<div class="card">
			<div class="card-body p-2">
				<label for="RincianPembayaran">Rencana Kontrol</label>
				<div class="row">
					<div class="col-lg-4 col-sm-6">
						<div class="input-group date datepicker" id="dateTanggalRencanaKontrol" data-target-input="nearest">
							<input type="text" id="inputTanggalRencanaKontrol" name="inputTanggalRencanaKontrol" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalKunjunganSelanjutnya">
							<div class="input-group-append" data-target="#dateTanggalRencanaKontrol" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
							</div>
						</div>                                                                                                                                             
					</div>
					<div class="col-lg-8 col-sm-6">
						<div class="input-group input-group-sm mb-1">                                                                                                                                                                             
							<input type="text" class="form-control form-control-sm" placeholder="Alasan Kontrol" id="inputAlasanRencanaKontrol" name="inputAlasanRencanaKontrol">
							<div class="input-group-append">
								<button class="btn btn-secondary" type="button" id="btnRencanaKontrol">Tambah</button>
							</div>
						</div>                                                            
					</div>                                                            
				</div>
				<div class="table-responsive-sm">
					<table class="table table-hover table-sm" id="tableRencanaKontrol">
						<thead class="thead-light">
							<tr>
								<th style="width:20%;" class="align-middle">Tanggal Kontrol</th>
								<th class="align-middle">Alasan Kontrol</th>
								<th style="width:50px;"></th>
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
	<!-- /.col -->		
	<div class="col-lg-6 col-sm-12">
		<div class="card">
			<div class="card-body p-2">
				<label for="Lab">Rujuk Labolatorium</label>
				<div class="row">
					<div class="col-lg-4 col-sm-6">
						<div class="input-group date datetimepicker" id="dateTanggalLab" data-target-input="nearest">
							<input type="text" id="inputTanggalLab" name="inputTanggalLab" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalLab">
							<div class="input-group-append" data-target="#dateTanggalLab" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
							</div>
						</div>                                                                                                                                             
					</div>
					<div class="col-lg-8 col-sm-6">
						<div class="input-group input-group-sm mb-1">                                                                                                                                                                             
							<select class="form-control form-control-sm custom-select custom-select-sm" id="inputJenisLab" name="inputJenisLab">
								<option selected disabled value="">--pilih jenis lab--</option>
						<?php								
							foreach($lab_type as $rows)
							{
								$jrow = json_encode($rows);
								echo "<option value='{$rows->id}' data-item='{$jrow}'>{$rows->laboratory_type_desc}</option>";
							}
						?>									
							</select>
							<div class="input-group-append">
								<button class="btn btn-secondary" type="button" id="btnAddLab">Tambah</button>
							</div>
						</div>                                                            
					</div>                                                            
				</div>
				<div class="table-responsive-sm">
					<table class="table table-hover table-sm" id="tableLab">
						<thead class="thead-light">
							<tr>
								<th class="d-none">ID</th>                                                                    
								<th style="width:20%;" class="align-middle">Tanggal Rujukan</th>
								<th style="width:20%;" class="align-middle">Jam Rujukan</th>								
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
	<!-- /.col -->			
	<div class="col-lg-6 col-sm-12">
		<div class="card">
			<div class="card-body p-2">
				<label for="Lab">Rujuk Radiologi</label>
				<div class="row">
					<div class="col-lg-4 col-sm-6">
						<div class="input-group date datetimepicker" id="dateTanggalRad" data-target-input="nearest">
							<input type="text" id="inputTanggalRad" name="inputTanggalRad" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalRad">
							<div class="input-group-append" data-target="#dateTanggalRad" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
							</div>
						</div>                                                                                                                                             
					</div>
					<div class="col-lg-8 col-sm-6">
						<div class="input-group input-group-sm mb-1">                                                                                                                                                                             
							<select class="form-control form-control-sm custom-select custom-select-sm" id="inputJenisRad" name="inputJenisRad">
							<option selected disabled value="">--pilih jenis lab--</option>
							<?php								
								foreach($rad_type as $rows)
								{
									$jrow = json_encode($rows);
									echo "<option value='{$rows->id}' data-item='{$jrow}'>{$rows->radiology_type_desc}</option>";
								}
							?>				               
							</select>
							<div class="input-group-append">
								<button class="btn btn-secondary" type="button" id="btnAddRad">Tambah</button>
							</div>
						</div>                                                            
					</div>                                                            
				</div>
				<div class="table-responsive-sm">
					<table class="table table-hover table-sm" id="tableRad">
						<thead class="thead-light">
							<tr>
								<th class="d-none">ID</th>                                                                    
								<th style="width:20%;" class="align-middle">Tanggal Rujukan</th>
								<th style="width:20%;" class="align-middle">Jam Rujukan</th>
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
	<!-- /.col -->		        
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
	<!-- /.col -->		        	
</div>
<div class="row d-none">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
                                            
					<div class="col-sm-12 col-md-12 col-lg-6 table-responsive">
						<label for="inputIcd9">Pemeriksaan Fisik</label>
						<div class="input-group input-group-sm mb-1">
<div class="input-group-append">
<button
type="button"
class="btn btn-secondary"
data-toggle="modal"
data-target="#modal-foto">
Tambah
</button>
</div>                                                        

						</div>
						<div class="table-responsive-sm">
						<table class="table table-hover table-sm" id="tablePemeriksaanFisik">
							<thead class="thead-light">
								<tr>
									<th data-label="nama" class="align-middle" style="width:20%;">Nama</th>
									<th data-label="keterangan" class="align-middle">Keterangan</th>
									<th data-label="foto" class="align-middle" style="width:20%;">Foto</th>
									<th data-label="original" class="align-middle d-none">Orignial</th>
									<th data-label="is_delete" class="align-middle d-none">Delete</th>                                                                                                                                
									<th data-label="button_delete" class="text-right align-middle"></th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td colspan="6" class="text-center" data-label="empty_row">Tidak ada data</td>
							</tr>
							</tbody>
						</table>
						</div>
					</div>
					<!-- /.col -->                                                
				</div>
			</div>
			<!-- /.card-body -->
			<div class="overlay" style="display: none;">
				<i class="fas fa-2x fa-sync-alt fa-spin"></i>
			</div>	                                                                                    
		</div>
	</div>
</div>

<div class="row no-print">
	<div class="col-12">
		<button type="button" class="btn btn-success float-right pembayaran-step <?= ($apotek_privilege != 2) ? 'd-none' : '' ?>">
			<span class="spinner-border spinner-border-sm overlay" role="status" aria-hidden="true" style="display: none;"></span>									                                                                                                            
			Pembayaran
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