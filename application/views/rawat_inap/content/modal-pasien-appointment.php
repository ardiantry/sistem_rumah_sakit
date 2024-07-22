<div class="modal fade" id="modal-pasien-appointment">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <span id="appointmentId" class="d-none"></span>
                <span id="appointmentUnitLayanan" class="d-none"></span>
                <span id="appointmentDokter" class="d-none"></span>
                <span id="appointmentTipePasien" class="d-none"></span>                
                <span id="appointmentTgl" class="d-none"></span>

                <dl class="row">
                    <dt class="col-sm-4">Nama Lengkap</dt>
                    <dd class="col-sm-8"><span id="appointmentName"></span></dd>
                    <dt class="col-sm-4">Tanggal Lahir</dt>
                    <dd class="col-sm-8"><span id="appointmentTglLahir"></span></dd>
                    <dt class="col-sm-4">No Handphone</dt>
                    <dd class="col-sm-8"><span id="appointmentHp"></span></dd>
                </dl>
                
                <strong><i class="fas fa-id-card mr-1"></i> Pilih Pasien</strong>
                <hr>
                <table id="tablePasienAppointment" class="table table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>No RM</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>No Telp</th>
                            <th>Agama</th>
                            <th>Gol. Darah</th>
                            <th>Jenis Kelamin</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                            <th>Id Jenis Kelamin</th>
                            <th>Id Pekerjaan</th>
                            <th>Id Pasien</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->