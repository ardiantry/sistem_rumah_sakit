<!-- step 4 -->

<style>
	table#tableObatKeluar tbody {
		display:block;
		height:100px;
		overflow:auto;
	}
	table#tableObatKeluar thead, table#tableObatKeluar tbody tr {
		display:table;
		width:100%;
		table-layout:fixed;
	}
	table#tableObatKeluar thead {
		width: calc( 100% - 1em )
	}
	table#tableObatKeluar {
		width:100%;
	}
</style>

<div class="row">
	<div class="col-sm-12">
		<div class="card card-danger">
			<div class="card-header">
				<h3 class="card-title">Data Apotek</h3>
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
							<label for="inputNoReg2">No Reg - Nama (No RM)</label>
							<input type="text" id="inputNoReg2" class="form-control form-control-sm" readonly required value="">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="inputTanggalPenyerahanResep">Tanggal Penyerahan
								Resep</label>
							<div class="input-group date datepicker" id="dateTanggalPenyerahanResep" data-target-input="nearest">
								<input type="text" id="inputTanggalPenyerahanResep" name="inputTanggalPenyerahanResep" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalPenyerahanResep" required />
								<div class="input-group-append" data-target="#dateTanggalPenyerahanResep" data-toggle="datetimepicker">
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
				<label>Rincian Obat</label>
				<div class="input-group input-group-sm mb-1" id="inputRincianObat">
					<input class="form-control form-control-sm" placeholder="Ketik Obat" id="inputObat" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-secondary btn-cari-obat" type="button">Cari</button>
					</div>
				</div>
				<div class="table-responsive-sm">
					<table class="table table-hover table-sm" id="tableObat">
						<thead class="thead-light">
							<tr>
								<th class="d-none" data-label="id_obat">ID Obat</th>
								<th data-label="jumlah_obat" class="text-center align-middle" style="width:20%;">Jumlah</th>
								<th data-label="nama_obat" class="text-left align-middle">Nama Obat</th>
								<th data-label="harga_obat" class="text-left align-middle">Harga</th>
								<th data-label="button_delete" class="text-right align-middle"></th>
							</tr>
						</thead>
						<tbody>
							<td colspan="5" class="text-center" data-label="empty_row">Tidak ada data</td>
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
				<div class="form-group">
					<label for="inputKeterangan3">Keterangan</label>            
<textarea class="form-control form-control-sm" rows="3" id="inputKeterangan3" name="inputKeterangan3" placeholder="Ketik Keterangan">Kode user:</textarea>                
				</div>         
			</div>
		</div>   
	</div>    
	<!-- /.col -->			
	<div class="col-lg-6 col-sm-12">
		<div class="card">
			<div class="card-body p-2">
				<label>Obat yang sudah keluar</label>
				<div class="table-responsive-sm">
					<table class="table table-hover table-sm" id="tableObatKeluar">
						<thead class="thead-light">
							<tr>
								<th class="d-none" data-label="id_obat">ID Obat</th>
								<th data-label="tanggal_obat" class="text-left align-middle">Tanggal</th>
								<th data-label="jumlah_obat" class="text-center align-middle">Jumlah</th>
								<th data-label="nama_obat" class="text-left align-middle">Nama Obat</th>
								<th data-label="harga_obat" class="text-left align-middle">Harga</th>
							</tr>
						</thead>
						<tbody>
							<td colspan="5" class="text-center" data-label="empty_row">Tidak ada data</td>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>   
	<!-- /.col -->	
</div>
<div class="row no-print">
	<div class="col-12">
		<button type="button" class="btn btn-success float-right pembayaran-apotek-step <?= ($apotek_privilege != 2) ? 'd-none' : '' ?>">
			<span class="spinner-border spinner-border-sm overlay" role="status" aria-hidden="true" style="display: none;"></span>									                                                                                                            
			Pembayaran
		</button>
		<button type="button" class="btn btn-warning float-right release-step <?= ($apotek_privilege != 2) ? 'd-none' : '' ?>" style="margin-right: 5px;">
			<span class="spinner-border spinner-border-sm overlay" role="status" aria-hidden="true" style="display: none;"></span>									                                                                                                            
			Keluarkan Obat
		</button>
		<button type="button" class="btn btn-primary float-right save-step <?= ($apotek_privilege != 2) ? 'd-none' : '' ?>" style="margin-right: 5px;">
			<span class="spinner-border spinner-border-sm overlay" role="status" aria-hidden="true" style="display: none;"></span>									                                                                                                            
			Simpan Draft
		</button>
		<button type="button" class="btn btn-default float-right prev-step <?= ($apotek_privilege != 2) ? 'd-none' : '' ?>" style="margin-right: 5px;">
			Sebelumnya
		</button>
	</div>
</div>