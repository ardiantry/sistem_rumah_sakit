<div class="row">
    <div class="col-sm-12">
        <section>
            <div class="wizard wizard-apotek">
                <div class="wizard-inner">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <span class="step-icon"><i class="fas fa-clipboard-list"></i></span>
                                <span class="step-number">Langkah 1 : Pemesanan Obat</span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                <span class="step-icon"><i class="fas fa-building"></i></span>
                                <span class="step-number">Langkah 2 : Penerimaan Obat</span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                <span class="step-icon"><i class="fas fa-money-check"></i></span>
                                <span class="step-number">Langkah 3 : Pembayaran</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <form id="wizardForm" role="form">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Data Pemesanan Obat</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="hidden" id="inputIdPo" class="form-control form-control-sm" readonly value="0">
                                                        <label for="inputNoPo">No Purchasing Order</label>
                                                        <input type="text" id="inputNoPo" name="inputNoPo" class="form-control form-control-sm" readonly required value="<?= $Pembelian->no_po; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputTanggalPesan">Tanggal Pesan</label>
                                                        <div class="input-group date datepicker" id="dateTanggalPesan" data-target-input="nearest">
                                                            <input type="text" id="inputTanggalPesan" name="inputTanggalPesan" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalPesan" required value="<?= $Pembelian->tanggal_po; ?>" />
                                                            <div class="input-group-append" data-target="#dateTanggalPesan" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputSupplier">Supplier</label>
                                                        <div class="input-group input-group-sm mb-1">
                                                            <select class="form-control form-control-sm custom-select custom-select-sm" id="inputSupplier" name="inputSupplier" required>
                                                                <option selected disabled>--pilih supplier--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                    <label for="inputObatPo">Rincian Obat</label>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <input class="form-control form-control-sm" placeholder="Ketik Obat" id="inputObatPo" autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary btn-cari-obat" type="button">Cari</button>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive-sm">
                                                        <table class="table table-hover table-sm" id="tableObatPo">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th class="d-none" data-label="id">ID Obat</th>
                                                                    <th data-label="jumlah" class="text-center align-middle" style="width:20%;">Jumlah</th>
                                                                    <th data-label="nama" class="text-left align-middle">Nama Obat</th>
                                                                    <th data-label="harga" class="d-none">Harga Beli</th>
                                                                    <th data-label="harga" class="d-none">Exp Date</th>
                                                                    <th data-label="button_delete" class="text-right align-middle"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <td colspan="6" class="text-center" data-label="empty_row">Tidak ada data</td>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-6">
                                                    <label for="inputKeteranganPO">Keterangan</label>
                                                    <textarea class="form-control form-control-sm" rows="3" id="inputKeteranganPO" name="inputKeteranganPO" placeholder="Ketik Keterangan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-print">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary float-right next-step <?= ($apotek_privilege != 2) ? 'd-none' : '' ?>">
                                        Selanjutnya
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Data Penerimaan Obat</h3>
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm">
                                                    <button type="button" class="btn btn-default btn-sm mr-1" data-toggle="modal" data-target="#modal-Po">
                                                        <i class="fas fa-search"></i>
                                                        Data PO
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="hidden" id="inputIdPr" class="form-control form-control-sm" readonly value="0">
                                                        <label for="inputNoFaktur">No Faktur</label>
                                                        <input type="text" id="inputNoFaktur" name="inputNoFaktur" class="form-control form-control-sm" required value="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputTanggalFaktur">Tanggal Faktur</label>
                                                        <div class="input-group date datepicker" id="dateTanggalFaktur" data-target-input="nearest">
                                                            <input type="text" id="inputTanggalFaktur" name="inputTanggalFaktur" class="form-control form-control-sm datetimepicker-input" data-target="#dateTanggalFaktur" required value="<?= $Pembelian->tanggal_pr; ?>" />
                                                            <div class="input-group-append" data-target="#dateTanggalFaktur" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputNamaSupplier">Supplier</label>
                                                        <input type="text" id="inputNamaSupplier" name="inputNamaSupplier" class="form-control form-control-sm" readonly required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputNoPoPr">No Purchasing Order</label>
                                                        <div class="input-group input-group-sm mb-1">
                                                            <input type="text" id="inputNoPoPr" name="inputNoPoPr" class="form-control form-control-sm" readonly required value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="inputLokasi">Lokasi Penerimaan</label>
                                                        <div class="input-group input-group-sm mb-1">
                                                            <select class="form-control form-control-sm custom-select custom-select-sm" id="inputLokasi" name="inputLokasi" required>
                                                                <option selected disabled>--pilih lokasi--</option>
                                                                <option value="Gudang">Gudang</option>
                                                                <option value="Opname">Opname</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label for="inputObatPr">Rincian Obat</label>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <input class="form-control form-control-sm" placeholder="Ketik Obat" id="inputObatPr" autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary btn-cari-obatPr" type="button">Cari</button>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive-sm">
                                                        <table class="table table-hover table-sm text-nowarp" id="tableObatPr">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th class="d-none" data-label="id_obat">ID Obat</th>
                                                                    <th data-label="jumlah_obat" class="text-center align-middle" style="width:10%;">Jumlah</th>
                                                                    <th data-label="nama_obat" class="text-center align-middle">Nama Obat</th>
                                                                    <th data-label="harga_obat" class="text-center align-middle" style="width:15%;">Harga Beli</th>
                                                                    <th data-label="total" class="text-center align-middle" style="width:15%;">Total</th>
                                                                    <th data-label="exp_date" class="text-center align-middle" style="width:10%;">Tanggal Kadaluarsa</th>
                                                                    <th data-label="batch_no" class="text-center align-middle d-none" style="width:10%;">Batch Number</th>
                                                                    <th data-label="button_delete" class="text-right align-middle" style="width:80px;"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <td colspan="8" class="text-center" data-label="empty_row">Tidak ada data</td>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <label for="inputKeteranganPr">Keterangan</label>
                                                    <textarea class="form-control form-control-sm" rows="3" id="inputKeteranganPr" name="inputKeteranganPr" placeholder="Ketik Keterangan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-print">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary float-right next-step <?= ($apotek_privilege != 2) ? 'd-none' : '' ?>">
                                        Selanjutnya
                                    </button>
                                    <button type="button" class="btn btn-default float-right prev-step <?= ($apotek_privilege != 2) ? 'd-none' : '' ?>" style="margin-right: 5px;">
                                        Sebelumnya
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">Data Pembayaran</h3>
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm">
                                                    <button type="button" class="btn btn-default btn-sm mr-1" data-toggle="modal" data-target="#modal-Pr">
                                                        <i class="fas fa-search"></i>
                                                        Data Faktur
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!-- info row -->
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                    <table class="table table-borderless table-sm">
                                                        <tr>
                                                            <th class="fit-content">No Purchasing Order</th>
                                                            <td>:&nbsp; <strong><span id="NoPo"></span></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fit-content">No Faktur</th>
                                                            <td>:&nbsp; <strong><span id="NoFaktur"></span></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="fit-content">Tanggal Pembayaran</th>
                                                            <td>:&nbsp; <span id="TanggalPembayaran"></td>
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
                                                            <th class="fit-content">Nama Supplier</th>
                                                            <td>:&nbsp; <span id="NamaSupplier"></span></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
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
                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                            <label for="tableInvoiceObat">Rincian Obat</label>
                                                            <div class="table-responsive-sm">
                                                                <table class="table table-hover table-sm" id="tableInvoiceObat">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th class="text-center align-middle" style="width:10%;">Jumlah</th>
                                                                            <th class="text-left align-middle">Nama Obat</th>
                                                                            <th class="text-right align-middle" style="width:20%;">Harga</th>
                                                                            <th class="text-right align-middle" style="width:20%;">Total</th>
                                                                            <th class="text-right align-middle" style="width:20%;">Exp Date</th>
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
                                                            <label for="inputKeteranganPembayaran">Keterangan</label>
                                                            <textarea class="form-control form-control-sm" rows="3" id="inputKeteranganPembayaran" name="inputKeteranganPembayaran" placeholder="Ketik Keterangan"></textarea>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-5">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <label for="RincianPembayaran">Rincian Tagihan</label>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm">
                                                                <tr>
                                                                    <th class="text-left align-middle" style="width:40%">Subtotal:</th>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="modal-Resep">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Resep</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="tableResepObat" class="table table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No Transaksi</th>
                            <th>No Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Penyerahan Resep</th>
                            <th>Keterangan</th>
                            <th>Id Transaksi</th>
                            <th>Id Pelanggan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-Pelanggan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="tablePelanggan" class="table table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                            <th>Id Jenis Kelamin</th>
                            <th>Id Pelanggan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-formPelanggan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="FormPelanggan" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Form Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" id="formIdPelanggan" name="id_pelanggan" value="0" data-input="id_pelanggan">
                            <div class="form-group">
                                <label for="formNamaPelanggan">Nama Pelanggan</label>
                                <input type="text" id="formNamaPelanggan" name="nama_pasien" class="form-control form-control-sm" value="" required data-input="nama_pelanggan">
                            </div>
                            <div class="form-group">
                                <label for="formTanggalLahir">Tanggal Lahir</label>
                                <div class="input-group date datepicker" id="dateFormTanggalLahir" data-target-input="nearest" data-input="tanggal_lahir">
                                    <input type="text" id="formTanggalLahir" name="tanggal_lahir" class="form-control form-control-sm datetimepicker-input" data-target="#dateFormTanggalLahir" required />
                                    <div class="input-group-append" data-target="#dateFormTanggalLahir" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formJenisKelamin">Jenis Kelamin</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="formJenisKelamin" name="jenis_kelamin" data-input="jenis_kelamin">
                                    <option value="" selected disabled>--pilih Jenis Kelamin--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formKeterangan">Keterangan</label>
                                <textarea id="formKeterangan" name="keterangan" class="form-control form-control-sm" rows="3" data-input="keterangan"></textarea>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="formUmur">Umur</label>
                                <input type="number" id="formUmur" name="formUmur" class="form-control form-control-sm" value="" step="1" data-input="umur">
                            </div>
                            <div class="form-group">
                                <label for="formAlamat">Alamat</label>
                                <textarea id="formAlamat" name="alamat" class="form-control form-control-sm" rows="3" data-input="alamat"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSavePelanggan">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-Po">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pemesanan Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="tablePemesananObat" class="table table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No Purchasing Order</th>
                            <th>Tanggal Pemesanan Obat</th>
                            <th>Nama Supplier</th>
                            <th>Keterangan</th>
                            <th>Id</th>
                            <th>Id Supplier</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-Pr">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Penerimaan Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="tablePenerimaanObat" class="table table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No Faktur</th>
                            <th>No PO</th>
                            <th>Tanggal Faktur</th>
                            <th>Nama Supplier</th>
                            <th>Keterangan</th>
                            <th>Keterangan Po</th>
                            <th>Id</th>
                            <th>Id Supplier</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-obat">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="tableObatModal" class="table table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Obat</th>
                            <th>Harga Beli</th>
                            <th>Id</th>
                            <th></th>
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

<div class="modal fade" id="modal-obatPr">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Obat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="tableObatPrModal" class="table table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Obat</th>
                            <th>Harga Beli</th>
                            <th>Id</th>
                            <th></th>
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