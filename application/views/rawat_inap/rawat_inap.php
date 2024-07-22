<div class="row">
    <div class="col-sm-12">
        <section>
            <div class="wizard">
                <div class="wizard-inner">
                    <ul class="nav nav-tabs" role="tablist">
                        <!-- <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <span class="step-icon"><i class="fas fa-clipboard-list"></i></span>
                                <span class="step-number">Langkah 1 : Pilih Pasien</span>
                            </a>
                        </li> -->
                        <li role="presentation" class="active">
                            <a href="#step1rawatinap" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <span class="step-icon"><i class="fas fa-building"></i></span>
                                <span class="step-number">Langkah 1 : Pendaftaran</span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step2rawatinap" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                <span class="step-icon"><i class="fas fa-clipboard-check"></i></span>
                                <span class="step-number">Langkah 2 : Pemeriksaan</span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step3rawatinap" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                <span class="step-icon"><i class="fas fa-capsules"></i></span>
                                <span class="step-number">Langkah 3 : Apotek</span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                <span class="step-icon"><i class="fas fa-money-check"></i></span>
                                <span class="step-number">Langkah 4 : Pembayaran</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <form id="wizardForm" role="form">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1rawatinap">
                            <?= $step1 ?>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2rawatinap">
                            <?= $step2 ?>                            
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3rawatinap">
                            <?= $step3 ?>                                                        
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <?= $step4 ?>                                                                                    
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<?= $modal_registrasi ?>
<?= $modal_layanan ?>
<?= $modal_icd10 ?>
<?= $modal_icd9 ?>
<?= $modal_pemeriksaan_fisik ?>
<?= $modal_obat ?>
<?= $modal_riwayat ?>