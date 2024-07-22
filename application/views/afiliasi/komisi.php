<style type="text/css">
    .input-group.input-group-sm {
  width: 217px;
  display: inline-flex;
  margin-left: 15px;
}
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Komisi Afiliator</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                 <div class="table-responsive">
                     <table class="table table-hover text-nowrap" id="AfiliasiKomisi">
                        <thead>
                            <tr>
                                <th>Afiliator</th> 
                                <th>Email Afiliator</th>  
                                <th>Tanggal</th>  

                                <th>Layanan</th>                            
                                <th>Pasien</th>
                                <th>Status</th>  
                                <th>Komisi</th> 
                                <th>Ubah Status</th> 
                                <th>Detail</th>  
                            </tr>
                        </thead>
                        <tbody></tbody>

                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card --> 
    </div>
</div>
<div class="row mt-3">
            <div class="col-md-4 mb-3"> 
                <div class="card component-card_3">
                    <div class="card-body">

                        <h5 class="card-user_name">Total Komisi Diterima</h5>
                        <p class="card-user_occupation" id="ttl_kmisi">0<p>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card component-card_3">
                    <div class="card-body">

                        <h5 class="card-user_name">Total Komisi Dibatalkan</h5>
                        <p class="card-user_occupation" id="ttl_ditolak">0</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card component-card_3">
                    <div class="card-body">

                        <h5 class="card-user_name">Total Komisi Belum Dibayar</h5>
                        <p class="card-user_occupation" id="ttl_diproses">0</p>

                    </div>
                </div>
            </div>
        </div>
<!-- /.row --> 
<div class="modal fade" id="modal-Ubah-komisi">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <label>Ubah Status Komisi <span id="Namaafiliasi"></span></label>
            </div>
            <div class="modal-body table-responsive">
                <form id="simpanstatuskomisi" name="simpanstatuskomisi">
                    <div class="form-group">
                        <label>Nominal Komisi</label>
                        <input type="text" name="komisi" class="form-control" disabled="">
                    </div>
                     <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="selesai">Sudah Di Bayar</option>
                            <option value="proses">Belum Di Bayar</option>
                            <option value="batal">Tolak</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
