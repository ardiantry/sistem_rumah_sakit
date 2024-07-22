<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Transaksi Lain</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add" id="btnAddTransaksi">
                            <i class="fas fa-plus"></i>
                            Tambah Transaksi
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="tableTransaksi" class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th class="text-right">Debit</th>
                            <th class="text-right">Kredit</th>
                            <th>id_transaksi_header</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->


<div class="modal fade" id="modal-formTransaksi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormTransaksi" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Form Transaksi Lain</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" id="id_transaksi" name="id_transaksi" class="form-control form-control-sm" value="0" data-input="id_transaksi">
                            <div class="form-group">
                                <label for="tanggal_transaksi">Tanggal Transaksi</label>
                                <div class="input-group date datepicker" id="dateTanggal_transaksi" data-target-input="nearest" data-input="tanggal_transaksi">
                                    <input type="text" id="tanggal_transaksi" name="tanggal_transaksi" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggal_transaksi" disabled="disabled" required />
                                    <div class="input-group-append" data-target="#dateTanggal_transaksi" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_transaksi">Nama Transaksi</label>
                                <input type="text" id="nama_transaksi" name="nama_transaksi" class="form-control form-control-sm" value="" data-input="nama_transaksi" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="transaksi">Transaksi</label>
                                    <select class="form-control form-control-sm custom-select custom-select-sm" id="master_akun" name="master_akun" data-input="master_akun">
                                        <option value="" selected disabled>--pilih Akun--</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="transaksi">Arus</label>
                                    <select class="form-control form-control-sm custom-select custom-select-sm" id="arus" name="arus">
                                        <option value="Debit">Debit</option>
                                        <option value="Kredit">Kredit</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="nilai">Nilai</label>
                                    <input type="number" id="nilai" name="nilai" class="form-control form-control-sm" value="" data-input="nilai">
                                </div>
                                <div class="col-sm-2">
                                    <label for="transaksi">&nbsp;</label>
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary float-right" type="button" id="btnTambahan">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="tableRincianTransaksi">Rincian Transaksi</label>
                            <div class="table-responsive-sm">
                                <table class="table table-hover table-sm" id="tableRincianTransaksi">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="d-none">ID</th> 
                                            <th class="text-left align-middle">Transaksi</th>
                                            <th class="text-left align-middle">Arus</th> 
                                            <th class="text-right align-middle">Nilai</th>
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
                <div class="modal-footer justify-content-between">
                    <div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-danger pull-right" id="btnDeleteTransaksi">Hapus</button>
                        <button class="btn btn-primary pull-right" id="btnSaveTransaksi">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    const id_af_pas='<?php echo @$_GET['id'];?>';
    const no_reg='<?php echo 'AF'.date('ymdhis');?>';
</script>