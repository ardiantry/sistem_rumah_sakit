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
        <div class="col-lg-12">		  
            <form class="form-inline mb-2">
                <div class="input-group input-group-sm w-100">
                    <input class="form-control fltr-controls filtr-search" type="search" placeholder="Search" 
                    aria-label="Search" name="filtr-search"
                    data-search>
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
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