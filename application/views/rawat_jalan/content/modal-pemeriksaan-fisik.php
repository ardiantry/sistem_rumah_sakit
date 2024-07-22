    <!-- Modal -->
    <div
    class="modal fade"
    id="modal-foto"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pilih Foto</h5>
            <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <!-- Filter Controls - Simple Mode -->
        <div class="row">
            <div class="col-lg-12">
                <!-- A basic setup of simple mode filter controls, all you have to do is use data-filter="all"
                for an unfiltered gallery and then the values of your categories to filter between them -->
                <ul class="btn-group w-100 mb-2 simplefilter d-none">
                    <li class="fltr-controls btn btn-primary" data-filter="all">All</li>
                    <li class="fltr-controls btn btn-primary" data-filter="gigi mulut">Gigi Mulut</li>
                    <li class="fltr-controls btn btn-primary" data-filter="kaki">Kaki</li>
                    <li class="fltr-controls btn btn-primary" data-filter="kelamin">Kelamin</li>
                    <li class="fltr-controls btn btn-primary" data-filter="kepala">Kepala</li>
                    <li class="fltr-controls btn btn-primary" data-filter="mata">Mata</li>
                    <li class="fltr-controls btn btn-primary" data-filter="organ dalam">Organ Dalam</li>                  
                    <li class="fltr-controls btn btn-primary" data-filter="tangan">Tangan</li>                  
                    <li class="fltr-controls btn btn-primary" data-filter="tht">THT</li>                                                      
                    <li class="fltr-controls btn btn-primary" data-filter="lain-lain">Lain-lain</li>                                                                         
                </ul>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
        <div class="col-md-6">	
        	<div class="form-group">
        		<label>Cari</label>	  
        			<form class="form-inline mb-2">
	            		<div class="input-group input-group-sm w-100">
			                    <input class="form-control fltr-controls filtr-search" type="search" placeholder="Search" 
			                    aria-label="Search" name="filtr-search"
			                    data-search>
			                    <div class="input-group-append">
			                        <button class="btn btn-primary btn-sm" type="submit">
			                            <i class="fas fa-search"></i>
			                        </button>
			                    </div>
            			</div> 
        		</form>	
            </div>	
        </div>
        <div class="col-md-6">
        	 <form id="uploadgambarpemeriksaan" name="uploadgambarpemeriksaan">
            	<div class="form-group">
            		<label>Unggah foto pemeriksaan</label>
            		<div class="input-group">
            		<input type="file" id="fotopemeriksaan" class="form-control" accept="image/*">
            			<span class="input-group-append"><button class="btn btn-primary btn-sm" type="submit">Unggah</button></span>
            		</div>

            	</div>
            </form>
        </div>
        </div>
        <!-- /.row -->	
        <div class="row">
        <div class="col-lg-12">	
            <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
            attribute, which starts from the value 1 and goes up from there -->
            
            <div class="filtr-container p-0">
                <?php foreach($pemeriksaan_fisik_files as $pemeriksaan_fisik_file) { ?>
                    <div class="filtr-item col-md-2 col-xl-1" data-category="<?= $pemeriksaan_fisik_file->filename ?>" data-sort="<?= $pemeriksaan_fisik_file->filename ?>">
                            <img
                            class="img-fluid"
                            src="<?=  base_url() . "assets/pemeriksaan_fisik/m/" . $pemeriksaan_fisik_file->filename ?>"
                            alt="<?= $pemeriksaan_fisik_file->filename ?>"
                            />
                            <span class="item-desc"><?= str_replace(".jpg", "", $pemeriksaan_fisik_file->filename) ?></span>
                        </div>
                <?php } ?>                                                                                                                                                                                                                                                                                                                                                                                                   
            </div>			
        </div>
        </div>
        <!-- /.row -->				
        </div>
        <!-- Modal Body-->						
        </div>
    </div>
</div>
<!-- Modal -->			

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
						<input type="text" id="inputPemeriksaanFisik" placeholder="Enter ..." name="inputPemeriksaanFisik" class="form-control form-control-sm" value="" required>
					</div>  					
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control form-control-sm" rows="5" placeholder="Enter ..." id="inputKeteranganFisik" name="inputKeteranganFisik"></textarea>
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