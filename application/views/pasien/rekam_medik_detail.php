<style>
    td.details-control {
        background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
    }

    tr.shown td.details-control {
        background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
    }
</style>
<input type="hidden" id="idPasien" name="idPasien" class="form-control form-control-sm" value="<?= $pasien->id; ?>" data-input="id">
<div class="row">
    <div class="col-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Rekam Medik Detail</h3>
            </div>
            <div class="card-body">
                <!-- info row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <table class="table table-borderless table-sm">
                            <tr>
                                <th>No Rekam Medik</th>
                                <td>:&nbsp; <strong><?= $pasien->no_rm; ?></strong></td>
                            </tr>
                            <tr>
                                <th>Nama Pasien</th>
                                <td>:&nbsp; <?= $pasien->nama_pasien; ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td>:&nbsp; <?= $pasien->tempat_lahir; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:&nbsp; <?= date("d/m/Y", strtotime($pasien->tanggal_lahir)); ?></td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td>:&nbsp; <?= $pasien->agama; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:&nbsp; <?= $pasien->alamat; ?></td>
                            </tr>                            
                        </table>
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-4 col-md-6 col-sm-6 order-sm-12">
                    &nbsp;
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-4 col-md-6 col-sm-6 order-lg-12">
                        <table class="table table-borderless table-sm">
                            <tr>
                                <th>No Telp</th>
                                <td>:&nbsp; <?= $pasien->no_telp; ?></td>
                            </tr>
                            <tr>
                                <th>Golongan Darah</th>
                                <td>:&nbsp; <?= $pasien->golongan_darah; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamain</th>
                                <td>:&nbsp; <?= $pasien->jenis_kelamin_display; ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>:&nbsp; <?= $pasien->pekerjaan_display; ?></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>:&nbsp; <?= $pasien->keterangan; ?></td>
                            </tr>                            
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="float-right">
                    <button class="btn btn-secondary btn-print"><i class="fas fa-print"></i> Cetak</button>
                    <button class="btn btn-danger btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Rekam Medik</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="tableRegistrasi" class="table table-striped" style="width: 2200px;">
                <thead>
                        <tr>
                            <th>Tanggal Periksa</th>
                            <th>Dokter</th>
                            <th>Diagnosa</th>
                            <th>ICD 9</th>
                            <th>ICD 10</th>                                                        
                            <th>Layanan</th>
                            <th>Keterangan Pemeriksaan</th>                            
                            <th>Obat</th>
                            <th>Keterangan Obat</th>
                            <th>Rencana Kontrol</th>                            
                            <th>Pemeriksaan Fisik</th>                                                        
                            <th>Id</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->