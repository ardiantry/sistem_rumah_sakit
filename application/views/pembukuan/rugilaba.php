<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Rugi Laba</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th class="text-right">Debit</th>
                            <th class="text-right">Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $grand_total_debit = $grand_total_kredit = 0;
                            foreach($rugilaba as $row){
                                $grand_total_debit += $row->total_debit;
                                $grand_total_kredit += $row->total_kredit;                                                                
                        ?>

                            <?php
                                if($row->is_pilih == 0){
                                    ?>
                                        <tr style="background-color: rgba(0,0,0,.05);">                                    
                                            <td style="white-space: nowrap;"><strong><?= $row->kode_akun ?></strong></td>
                                            <td style="white-space: nowrap;" colspan="3"><strong><?= $row->nama_akun ?></strong></td>
                                        </tr>
                                    <?php
                                }
                                else{
                                    ?>
                                    <tr>
                                        <td style="white-space: nowrap;"><?= $row->kode_akun ?></td>
                                        <td style="white-space: nowrap;"><?= $row->nama_akun ?></td>
                                        <td style="white-space: nowrap;" class="text-right"><?= (isset($row->total_debit)) ? rupiah($row->total_debit) : ''  ?></td>
                                        <td style="white-space: nowrap;" class="text-right"><?= (isset($row->total_kredit)) ? rupiah($row->total_kredit) : '' ?></td>                                    
                                    </tr>
                                    <?php
                                }                                    
                            ?>
                        <?php
                            }
                        ?>
                        <tr>
                            <td style=" white-space: nowrap;" colspan="2"><strong>JUMLAH</strong></td>
                            <td style=" white-space: nowrap;" class="text-right"><strong><?= rupiah($grand_total_debit) ?></strong></td>
                            <td style=" white-space: nowrap;" class="text-right"><strong><?= rupiah($grand_total_kredit) ?></strong></td>
                        </tr>
                        <tr>
                            <td style=" white-space: nowrap;" colspan="3"><strong>LABA <span style="color:red">(RUGI)</span></strong></td>
                            <td style=" white-space: nowrap;" class="text-right"><?= (($grand_total_kredit - $grand_total_debit) < 0) ? "<span style='color:red'>(" . rupiah(ABS($grand_total_debit - $grand_total_kredit)) . ")</span>" : rupiah(ABS($grand_total_debit - $grand_total_kredit)) ?></td>
                        </tr>                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->