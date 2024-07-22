<style>
    .dataTables_filter, .dataTables_length {
        display: none;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Jurnal Umum</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-info btn-sm btn-add d-none" id="btnAddTransaksi">
                            <i class="fas fa-plus"></i>
                            Tambah Transaksi
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="pilih_length">Menampilkan</label>
                            <select class="form-control form-control-sm custom-select custom-select-sm" name="pilih_length" id="pilih_length">
                                <option value='10'>10</option>
                                <option value='50'>50</option>
                                <option value='100'>100</option>
                                <option value='150'>150</option>
                                <option value='-1'>Semua</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">

                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Filter Tanggal</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="tanggal_transaksi" class="form-control float-right" id="tanggal_transaksi">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>                    
                    <div class="col-3">
                        <div class="form-group">
                            <label>Filter Nama</label>
                            <input type="text" name="nama" class="form-control form-control-sm float-right" id="nama">
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
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
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->