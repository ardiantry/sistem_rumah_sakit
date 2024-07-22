<div class="row">
    <div class="col-sm-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Data Pembayaran</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <button type="button" class="btn btn-default btn-sm mr-1" data-toggle="modal" data-target="#modal-registrasi">
                            <i class="fas fa-search"></i>
                            Data Pasien
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- info row -->
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <table class="table table-borderless table-sm text-nowrap">
                            <tr>
                                <th style="width:30%">No Nota</th>
                                <td>:&nbsp; <strong><span id="NoReg"></span></strong></td>
                            </tr>
                            <tr>
                                <th>Tanggal Nota</th>
                                <td>:&nbsp; <span id="TglNota"></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-4 col-md-6 col-sm-6 order-sm-12">
                        &nbsp;
                    </div>
                    <!-- /.col -->
                    <div class="col-lg-4 col-md-6 col-sm-6 order-lg-12">
                        <table class="table table-borderless table-sm text-nowrap">
                            <tr>
                                <th style="width:30%">No Rekam Medik</th>
                                <td>:&nbsp; <span id="NoRM"></span></td>
                            </tr>
                            <tr>
                                <th>Nama Pasien</th>
                                <td>:&nbsp; <span id="NamaPasien"></span></td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>:&nbsp; <span id="NoTelp"></span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="overlay" style="display: none;">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>	                                        
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12" id="rincian_paket" style="display: none;">
                                <label for="tableInvoicePaket">Rincian Paket</label>
                                <div class="table-responsive-sm">
                                    <table class="table table-hover table-sm text-nowrap" id="tableInvoicePaket">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center align-middle" style="width:10%;">Jumlah</th>
                                                <th class="text-left align-middle">Nama Obat</th>
                                                <th class="text-right align-middle" style="width:20%;">Harga</th>
                                                <th class="text-right align-middle" style="width:10%;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                                                    
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label for="tableInvoiceLayanan">Rincian Layanan</label>
                                <div class="table-responsive-sm">
                                    <table class="table table-hover table-sm text-nowrap" id="tableInvoiceLayanan">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center align-middle" style="width:10%;">Jumlah</th>
                                                <th class="text-left align-middle">Nama Layanan</th>
                                                <th class="text-right align-middle" style="width:20%;">Harga</th>
                                                <th class="text-right align-middle" style="width:10%;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12" id="rincian_obat">
                                <label for="tableInvoiceObat">Rincian Obat <span id="span-invoice-obat" style="display: none;">Paket</span></label>
                                <div class="table-responsive-sm">
                                    <table class="table table-hover table-sm text-nowrap" id="tableInvoiceObat">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center align-middle" style="width:10%;">Jumlah</th>
                                                <th class="text-left align-middle">Nama Obat</th>
                                                <th class="text-right align-middle" style="width:20%;">Harga</th>
                                                <th class="text-right align-middle" style="width:10%;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12" id="rincian_obat_tambahan" style="display: none;">
                                <label for="tableInvoiceObatTambahan">Rincian Obat Tambahan</label>
                                <div class="table-responsive-sm">
                                    <table class="table table-hover table-sm text-nowrap" id="tableInvoiceObatTambahan">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center align-middle" style="width:10%;">Jumlah</th>
                                                <th class="text-left align-middle">Nama Obat</th>
                                                <th class="text-right align-middle" style="width:20%;">Harga</th>
                                                <th class="text-right align-middle" style="width:10%;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                                                        
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label for="tableInvoiceTambahan">Rincian Tambahan</label>
                                <div class="input-group input-group-sm mb-1">
                                    <input type="number" class="form-control form-control-sm" placeholder="Jumlah" style="max-width:20%;" id="inputJumlahTambahan" name="inputJumlahTambahan" step="1" value="1">
                                    <input class="form-control form-control-sm" placeholder="Ketik Tambahan" id="inputNamaTambahan" name="inputNamaTambahan">
                                    <input type="number" class="form-control form-control-sm" placeholder="Harga" style="max-width:20%;" id="inputHargaTambahan" name="inputHargaTambahan" step="1">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" id="btnTambahan">Tambah</button>
                                    </div>
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-hover table-sm text-nowrap" id="tableInvoiceTambahan">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center align-middle" style="width:10%;">Jumlah</th>
                                                <th class="text-left align-middle">Nama Tambahan
                                                </th>
                                                <th class="text-right align-middle" style="width:20%;">Harga</th>
                                                <th class="text-right align-middle" style="width:10%;">Total</th>
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
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label for="inputKeterangan4">Keterangan</label>
                                <textarea class="form-control form-control-sm" rows="3" id="inputKeterangan4" name="inputKeterangan4" placeholder="Ketik Keterangan"></textarea>
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="RincianPembayaran">Rincian Tagihan</label>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tr>
                                        <th class="text-left align-middle" style="width:40%">
                                            Subtotal:</th>
                                        <td style="width:30%"></td>
                                        <td class="text-right align-middle"><span id="spanSubtotal"></span></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left align-middle">Diskon</th>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" placeholder="ketik diskon" value="0" id="inputDiskon" name="inputDiskon" onkeypress="return isNumberKey(event)">
                                        </td>
                                        <td class="text-right align-middle"><span id="spanDiskon"></span></td>
                                    </tr>
                                    <tr>
                                        <th class="text-left align-middle">Pajak (%)</th>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" placeholder="ketik pajak" value="10" step="1" id="inputPajak" name="inputPajak">
                                        </td>
                                        <td class="text-right align-middle"><span id="spanPajak"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="RincianPembayaran">Rincian Pembayaran</label>
                            <div class="input-group input-group-sm mb-1">
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="inputCaraBayar" name="inputCaraBayar">
                                    <option selected disabled>--pilih cara bayar--</option>
                                </select>
                                <input type="number" class="form-control form-control-sm" placeholder="Jumlah" id="inputJumlahBayar" name="inputJumlahBayar" step="1">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="btnCaraBayar">Tambah</button>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-hover table-sm" id="tableCaraBayar">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width:50%;" class="text-center align-middle">Cara Bayar</th>
                                            <th class="text-right align-middle">Jumlah</th>
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
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="small-box bg-info pull-right">
                                <div class="inner text-right">
                                    <table class="table table-sm table-borderless">
                                        <tr>
                                            <td class="text-left align-middle" style="width:40%">
                                                <h4>Total Tagihan</h4>
                                            </td>
                                            <td>
                                                <h4><span id="spanTotalTagihan"></span></h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left align-middle">Total Bayar</td>
                                            <td><span id="spanTotalBayar"></span></td>
                                        </tr>
                                        <tr class="bg-danger">
                                            <td class="text-left align-middle">Kembalian</td>
                                            <td><span id="spanKembalian"></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <button type="button" class="btn btn-secondary btn-print <?= ($pembayaran_privilege != 2) ? 'd-none' : '' ?>"><i class="fas fa-print"></i> Cetak</button>
                        <button id="btnPembayaran" type="button" class="btn btn-success float-right <?= ($pembayaran_privilege != 2) ? 'd-none' : '' ?>"><i class="far fa-credit-card"></i> Proses Pembayaran</button>
                        <button type="button" class="btn btn-default float-right prev-step <?= ($pembayaran_privilege != 2) ? 'd-none' : '' ?>" style="margin-right: 5px;">
                            Sebelumnya
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="overlay" style="display: none;">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>	                                        
        </div>
    </div>
</div>