<!-- modal-formPasien -->
<div class="modal fade" id="modal-formPasien">
    <div class="modal-dialog modal-xl">        
        <div class="modal-content">           
            <form id="FormPasien" role="form">
                <div class="modal-header">
                    <h4 class="modal-title">Form Pasien</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="hidden" id="formIdPasien" name="id_pasien" value="0" data-input="id_pasien">
                                <label for="formNoRM">No RM</label>
                                <input type="text" id="formNoRM" name="no_rm" class="form-control form-control-sm" value="" data-input="no_rm" required>
                            </div>
                            <div class="form-group">
                                <label for="formNamaPasien">Nama Pasien</label>
                                <input type="text" id="formNamaPasien" name="nama_pasien" class="form-control form-control-sm" value="" required data-input="nama_pasien">
                            </div>
                            <div class="form-group">
                                <label for="formTempatLahir">Tempat Lahir</label>
                                <input type="text" id="formTempatLahir" name="tempat_lahir" class="form-control form-control-sm" value="" data-input="tempat_lahir" required>
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
                                <label for="formAgama">Agama</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="formAgama" name="agama" data-input="agama">
                                    <option value="" selected disabled>--pilih agama--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen ">Kristen </option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                    <option value="-">-</option>                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formAlamat">Alamat</label>
                                <textarea id="formAlamat" name="alamat" class="form-control form-control-sm" rows="3" data-input="alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="formNoTelp">KTP</label>
                                        <input type="text" id="formKTP" name="no_telp" class="form-control form-control-sm" value="" data-input="ktp" required>
                                    </div>                                      
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <span class="spinner-input" style="display: none;">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            <span class="sr-only">Loading...</span>                                        
                                        </span>
                                        <label for="inputNoTelp">Status IHS</label>                                        
                                        <input type="text" id="formStatusIHS" class="form-control form-control-sm" value="" readonly>                                        
                                        <input type="hidden" id="formIHS_ID" class="form-control form-control-sm" value="" readonly>
                                    </div>                           
                                </div>                                   
                            </div>
                            <div class="row">
                                <div class="col-6">							
                                    <div class="form-group">
                                        <label for="inputNoBPJS">No Kartu BPJS</label>
                                        <input type="text" id="formNoBPJS" class="form-control form-control-sm" value="" required>
                                    </div>
                                </div> 														
                                <div class="col-6">							
                                    <div class="form-group">
                                        <label for="inputStatusBPJS">Status BPJS</label>
                                        <input type="text" id="formtStatusBPJS" class="form-control form-control-sm" value="" readonly>     
                                    </div>
                                </div> 
                            </div>                          
                            <div class="form-group">
                                <label for="formNoTelp">No Telp</label>
                                <input type="number" id="formNoTelp" name="no_telp" class="form-control form-control-sm" value="" step="1" data-input="no_telp">
                            </div>
                            <div class="row">
                                <div class="col-6">	                            
                                    <div class="form-group">
                                        <label for="formGolonganDarah">Golongan Darah</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm" id="formGolonganDarah" name="golongan_darah" data-input="golongan_darah">
                                            <option selected disabled>--pilih golongan darah--</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>   
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">	                                                            
                                    <div class="form-group">
                                        <label for="formJenisKelamin">Jenis Kelamin</label>
                                        <select class="form-control form-control-sm custom-select custom-select-sm" id="formJenisKelamin" name="jenis_kelamin" data-input="jenis_kelamin">
                                            <option value="" selected disabled>--pilih jenis kelamin--</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>                                    
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formPekerjaan">Pekerjaan</label>
                                <select class="form-control form-control-sm custom-select custom-select-sm" id="formPekerjaan" name="pekerjaan" data-input="pekerjaan">
                                    <option value="" selected disabled>--pilih pekerjaan--</option>
                                    <?php								
                                        foreach($pekerjaan as $rows)
                                        {
                                            echo "<option value='{$rows->id}'>{$rows->pekerjaan}</option>";
                                        }
                                    ?>		                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formKeterangan">Keterangan</label>
                                <textarea id="formKeterangan" name="keterangan" class="form-control form-control-sm" rows="3" data-input="keterangan"></textarea>
                            </div>
                        </div>
                    </div>                   
                </div>                               
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" id="btnSavePasien">Simpan</button>
                </div>
            </form>                    
        </div>                                     
    </div>
    <!-- /.modal-dialog -->    
</div>
<!-- /.modal -->