<div
	class="modal fade"
	id="modal-foto-editor"
	tabindex="-1"
	role="dialog"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true">	
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Foto Editor</h5>
				<button
				type="button"
				class="close"
				data-dismiss="modal"
				aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">    
				<div class="row">
				<div class="col-md-6">
					<div
					style="
						position: relative;
						display: flex;
						flex-direction: column;
						align-items: center;
						justify-content: center;">
					<!-- we are putting a copy of the original image under the result image so it's always annotation-free -->
					<img
						id="sourceImage"
						src="<?php echo base_url(); ?>assets/img/29_1660532552.png"
						class="img-fluid"
						style="max-height: 80%;"
					/>
					<img
						id="targetImage"
						src="<?php echo base_url(); ?>assets/img/29_1660532552.png"
						class="img-fluid"                  
						style="max-height: 100%; position: absolute;"
					/>
					</div>                     
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama Pemeriksaan</label>
						<input type="text" id="inputPemeriksaanFisik" placeholder="Enter ..." name="inputPemeriksaanFisik" class="form-control " value="" required>
					</div>  					
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" rows="5" placeholder="Enter ..." id="inputKeteranganFisik" name="inputKeteranganFisik"></textarea>
					</div>                                   
				</div>                  
			</div>               
		</div>
		<div class="modal-footer">
			<button
				type="button" id="btnBackPemeriksaanFisik"
				class="btn btn-secondary">
				Batal
			</button>
			<button type="button" class="btn btn-primary" id="btnSavePemeriksaanFisik">
				Simpan
			</button>
		</div>
		</div>
	</div>	
</div>				
<!-- Modal -->