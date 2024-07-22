<?php
$id_linik_=$this->ion_auth->user()->row()->id_klinik;
//print_r($this->ion_auth->users()->row());
$klinik_invew =&get_instance();
$klinik_invew->load->model('Klinik_model');
$tb_klinik = $klinik_invew->Klinik_model->generate_slug_klinik($id_linik_);
//$link_klinik='https://afiliasi.simraisha.id/login?k='.@$tb_klinik->slug;
$link_klinik='http://127.0.0.1/afiliasi.simraisha/login?k='.@$tb_klinik->slug;

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tarif afiliasi layanan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <a href="#" id="AturModal" class="btn btn-success btn-sm" style="margin-right:5px;">Atur Komisi Default</a>
                        <a href="#" id="generate_Link" class="btn btn-primary btn-sm" style="margin-right:5px;">Link Afiliasi</a>
                        <a href="<?= base_url()?>/MasterData/layanan" class="btn btn-info btn-sm btn-add" >
                            <i class="fas fa-plus"></i>
                            Tambah Layanan
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <form id="UpdateLayanan" name="UpdateLayanan">
                <table class="table table-hover text-nowrap" id="tableLayanan">
                    <thead>
                        <tr>
                            <th>Nama Layanan</th>                            
                            <th>Harga</th>
                            <th>Status</th>                
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
<div class="modal fade" id="modal-generate-link">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <label>Link Appointment Klinik <?php echo @$tb_klinik->nama_klinik;?></label>
            </div>
            <div class="modal-body table-responsive">
                <form>
                    <div class="form-group">
                        
                        <div class="input-group">
                            <input type="text" name="link" class="form-control" value="<?php echo $link_klinik;?>">
                            <span class="input-group-append"><button class="btn btn-primary" id="copy--generate-link">Copy</button></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-atur-harga">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <label>Atur Komisi Default</label>
            </div>
            <div class="modal-body table-responsive">
                <form id="simpanhargadefault" name="simpanhargadefault" >
                    <div class="form-group">
                        
                        <div class="input-group">
                            <input type="text" name="harga" class="form-control" value="<?php echo @$harga;?>">
                            <span class="input-group-append"><button class="btn btn-primary" type="submit">simpan</button></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>