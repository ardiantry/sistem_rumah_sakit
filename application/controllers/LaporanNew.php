<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LaporanNew extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model');
        $this->load->model('Jurnal_model');
        $this->load->model('Agama_model');
        $this->load->model('GolonganDarah_model');
        $this->load->model('Pekerjaan_model');
        $this->load->model('UnitLayanan_model');
        $this->load->model('Dokter_model');
        $this->load->model('TipePasien_model');
        $this->load->model('Layanan_model');
        $this->load->model('Obat_model');
        $this->load->model('CaraBayar_model');
        $this->load->model('Supplier_model');
        $this->load->model('Dokter_model');
        $this->_init();
    }

    private function _init()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } else if ((!$this->ion_auth->is_admin()) && (!$this->ion_auth->in_group(['super_admin_klinik', 'administrator_klinik'])))
        //else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }

        $this->load->model('Menu_model');
        $data['menu'] = $this->Menu_model->get();

        $this->load->section('sidebar', 'template/sidebar', $data);

        $this->output->set_template('adminLTE');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css');        
        $this->load->css('https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css');
        $this->load->css('https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css');
        $this->load->css('https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css');

        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
        $this->load->css('assets/themes/adminLTE/plugins/tag/fm.tagator.jquery.min.css');
        $this->load->css('assets/themes/adminLTE/dist/css/wizard.css');

        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.32/moment-timezone-with-data.min.js');

        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js');        
        $this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
        $this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
        $this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js');
        $this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js');
        $this->load->js('https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js');
        $this->load->js('https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js');
        $this->load->js('https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js');
        $this->load->js('https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js');

        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
        $this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');

        $this->load->js('https://code.highcharts.com/highcharts.js');
        $this->load->js('https://code.highcharts.com/modules/data.js');
        $this->load->js('https://code.highcharts.com/modules/exporting.js');
        $this->load->js('https://code.highcharts.com/modules/export-data.js');
        $this->load->js('https://code.highcharts.com/modules/accessibility.js');

        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');
        $this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');
        $this->load->js('https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js');
        $this->load->js('assets/themes/adminLTE/plugins/tag/fm.tagator.jquery.js');

        $this->load->js('assets/js/helper.20211205.js');
        $this->load->js('https://cdn.jsdelivr.net/npm/chart.js');
        $this->load->js('assets/js/laporan_new.20211205.js');
    }

    private function master()
    {
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $agama = $this->Agama_model->get();
        $golonganDarah = $this->GolonganDarah_model->get();
        $jenisKelamin = ['L' => 'Laki-laki', 'P' => 'Perempuan'];
        $pekerjaan = $this->Pekerjaan_model->getByKlinik($id_klinik);
        $unitLayanan = $this->UnitLayanan_model->getByKlinik($id_klinik);
        $dokter = $this->Dokter_model->getByKlinik($id_klinik);
        $tipePasien = $this->TipePasien_model->getByKlinik($id_klinik);
        $layanan = $this->Layanan_model->getByKlinik($id_klinik);
        $cara_bayar = $this->CaraBayar_model->getByKlinik($id_klinik);
        $supplier = $this->Supplier_model->getByKlinik($id_klinik);

        $data['agama'] = $agama;
        $data['golongan_darah'] = $golonganDarah;
        $data['jenis_kelamin'] = $jenisKelamin;
        $data['pekerjaan'] = $pekerjaan;
        $data['unit_layanan'] = $unitLayanan;
        $data['dokter'] = $dokter;
        $data['tipe_pasien'] = $tipePasien;
        $data['layanan'] = $layanan;
        $data['cara_bayar'] = $cara_bayar;
        $data['supplier'] = $supplier;

        return $data;
    }

    public function test()
    {
        $this->output->unset_template();
        $test = ['A', 'O'];
        echo "'" . implode("','", $test) . "'";
    }

    public function rawat_jalan()
    {
        $data['page_title'] = "Laporan";
        $data['page_menu'] = "LaporanLayanan";
        $data['master'] = $this->master();
        $this->load->view('laporan/rawat_jalan_new', $data);
    }

    public function penjualan_apotek()
    {
        $data['page_title'] = "Laporan";
        $data['page_menu'] = "LaporanPenjualanApotek";
        $data['master'] = $this->master();
        $this->load->view('laporan/penjualan_apotek_new', $data);
    }    

    public function stok()
    {
        $data['page_title'] = "Laporan";
        $data['page_menu'] = "LaporanStok";
        $data['master'] = $this->master();
        $this->load->view('laporan/stok_new', $data);
    }     

    public function getLaporanLayanan()
    {
        $this->output->unset_template();
        $r = [];

        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $p = $this->getRawatJalanParameter($postData);

        $query = "CALL GetLaporanLayanan( " . ltrim(str_repeat(',?', count($p)), ',') . " );";
        $_db = new MysqliMultiResult($this->db->conn_id);
        $stmt = $_db->prepare_statement($query,  ...$p);
        $r = $stmt->execute_results();

        if (!count($r)) {
            header('Content-Type: application/json');
            echo json_encode([]);
        } else {
            $table["data"] = $r[0];
            $table["columns"] = [
                ['data' => 'tanggal_pendaftaran', 'name' => 'Tanggal Pendaftaran'],
                ['data' => 'no_registrasi', 'name' => 'No Registrasi'],
                ['data' => 'no_rm', 'name' => 'No RM'],
                ['data' => 'nama_pasien', 'name' => 'Nama Pasien'],
                ['data' => 'no_telp', 'name' => 'No Telp'],
                ['data' => 'tempat_lahir', 'name' => 'Tempat Lahir'],
                ['data' => 'tanggal_lahir', 'name' => 'Tanggal Lahir'],
                ['data' => 'golongan_darah', 'name' => 'Golongan Darah', 'className' => "text-center"],
                ['data' => 'jenis_kelamin', 'name' => 'Jenis Kelamin', 'className' => "text-center"],
                ['data' => 'pekerjaan', 'name' => 'Pekerjaan'],
                ['data' => 'agama', 'name' => 'Agama', 'className' => "text-center"],
                ['data' => 'alamat', 'name' => 'Alamat'],
                ['data' => 'ketarangan_pasien', 'name' => 'Keterangan Pasien'],
                ['data' => 'tanggal_unit_layanan', 'name' => 'Tanggal Unit Layanan'],
                ['data' => 'unit_layanan', 'name' => 'Unit Layanan'],
                ['data' => 'dokter', 'name' => 'Dokter'],
                ['data' => 'tipe_pasien', 'name' => 'Tipe Pasien'],
                ['data' => 'keterangan_unit_layanan', 'name' => 'Keterangan Unit Layanan'],
                ['data' => 'tanggal_pemeriksaan', 'name' => 'Tanggal Pemeriksaan'],
                ['data' => 'diagnosa', 'name' => 'Diagnosa'],
                ['data' => 'icd_10', 'name' => 'ICD 10'],
                ['data' => 'rincian_layanan', 'name' => 'Rincian Layanan'],
                ['data' => 'icd_9', 'name' => 'ICD 9'],
                ['data' => 'keterangan_pemeriksaan', 'name' => 'Keterangan Pemeriksaan'],
                ['data' => 'tanggal_penyerahan_resep', 'name' => 'Tanggal Penyerahan Resep'],
                ['data' => 'rincian_obat', 'name' => 'Rincian Obat'],
                ['data' => 'keterangan_apotek', 'name' => 'Keterangan Apotek'],
                ['data' => 'tanggal_pembayaran', 'name' => 'Tanggal Pembayaran'],
                ['data' => 'keterangan_pembayaran', 'name' => 'Keterangan Pembayaran'],                
                ['data' => 'rincian_tambahan', 'name' => 'Tambahan'],
                ['data' => 'pendapatan_layanan', 'name' => 'Pendapatan Layanan', 'className' => "text-right"],
                ['data' => 'pendapatan_obat', 'name' => 'Pendapatan Obat', 'className' => "text-right"],
                ['data' => 'pendapatan_tambahan', 'name' => 'Pendapatan Tambahan', 'className' => "text-right"],
                ['data' => 'total_diskon', 'name' => 'Diskon', 'className' => "text-right"],
                ['data' => 'total_pajak', 'name' => 'Pajak', 'className' => "text-right"],
                ['data' => 'total_tagihan', 'name' => 'Tagihan', 'className' => "text-right"],
            ];
            $table['additional_data'] = count($r[4]);

            foreach ($r[4] as $key => $value) {
                array_push($table['columns'], ['data' => $value['cara_bayar_column'], 'name' => $value['cara_bayar'], 'className' => "text-right"]);
            }

            header('Content-Type: application/json');
            echo json_encode(["chart" => ['chart_day' => $r[1], 'chart_month' => $r[2], 'chart_year' => $r[3]], "table" => $table]);
        }
    }

    public function getLaporanPenjualanApotek()
    {
        $this->output->unset_template();
        $r = [];

        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $p = $this->getPenjualanApotekParameter($postData);

        $query = "CALL GetLaporanApotek( " . ltrim(str_repeat(',?', count($p)), ',') . " );";
        $_db = new MysqliMultiResult($this->db->conn_id);
        $stmt = $_db->prepare_statement($query,  ...$p);
        $r = $stmt->execute_results();

        if (!count($r)) {
            header('Content-Type: application/json');
            echo json_encode([]);
        } else {
            $table["data"] = $r[0];
            $table["columns"] = [
                ['data' => 'tanggal_penyerahan_resep', 'name' => 'Tanggal Penyerahan Resep'],
                ['data' => 'no_transaksi', 'name' => 'No Transaksi'],
                ['data' => 'rincian_obat', 'name' => 'Rincian Obat'],                
                ['data' => 'keterangan_transaksi', 'name' => 'Keterangan Transaksi'],                
                ['data' => 'no_pelanggan', 'name' => 'No Pelanggan'],
                ['data' => 'nama_pelanggan', 'name' => 'Nama Pelanggan'],
                ['data' => 'no_telp', 'name' => 'No Telp'],
                ['data' => 'tanggal_lahir', 'name' => 'Tanggal Lahir'],
                ['data' => 'jenis_kelamin', 'name' => 'Jenis Kelamin', 'className' => "text-center"],
                ['data' => 'alamat', 'name' => 'Alamat'],
                ['data' => 'keterangan_pelanggan', 'name' => 'Keterangan Pelanggan'],
                ['data' => 'tanggal_pembayaran', 'name' => 'Tanggal Pembayaran'],
                ['data' => 'keterangan_pembayaran', 'name' => 'Keterangan Pembayaran'],                
                ['data' => 'pendapatan_obat', 'name' => 'Pendapatan Obat', 'className' => "text-right"],
                ['data' => 'total_diskon', 'name' => 'Diskon', 'className' => "text-right"],
                ['data' => 'total_pajak', 'name' => 'Pajak', 'className' => "text-right"],
                ['data' => 'total_tagihan', 'name' => 'Tagihan', 'className' => "text-right"],
            ];
            $table['additional_data'] = count($r[4]);

            foreach ($r[4] as $key => $value) {
                array_push($table['columns'], ['data' => $value['cara_bayar_column'], 'name' => $value['cara_bayar'], 'className' => "text-right"]);
            }

            header('Content-Type: application/json');
            echo json_encode(["chart" => ['chart_day' => $r[1], 'chart_month' => $r[2], 'chart_year' => $r[3]], "table" => $table]);
        }
    }
    
    public function getLaporanStok()
    {
        $this->output->unset_template();
        $r = [];

        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $p = $this->getStokParameter($postData);

        $query = "CALL GetLaporanStok( " . ltrim(str_repeat(',?', count($p)), ',') . " );";
        $_db = new MysqliMultiResult($this->db->conn_id);
        $stmt = $_db->prepare_statement($query,  ...$p);
        $r = $stmt->execute_results();

        if (!count($r)) {
            header('Content-Type: application/json');
            echo json_encode([]);
        } else {
            $table["data"] = $r[0];
            $table["columns"] = [
                ['data' => 'tanggal_pemesanan', 'name' => 'Tanggal Pemesanan'],
                ['data' => 'no_po', 'name' => 'No Po'],
                ['data' => 'nama_supplier', 'name' => 'Supplier'],                
                ['data' => 'keterangan_pemesanan', 'name' => 'Keterangan Pemesanan'],                
                ['data' => 'tanggal_faktur', 'name' => 'Tanggal Faktur'],                
                ['data' => 'no_faktur', 'name' => 'No Faktur'],                
                ['data' => 'lokasi', 'name' => 'Lokasi'],
                ['data' => 'nama_obat', 'name' => 'Nama Obat'],
                ['data' => 'jumlah', 'name' => 'Jumlah Penerimaan', 'className' => "text-right"],
                ['data' => 'harga_beli', 'name' => 'Harga Beli', 'className' => "text-right"],
                ['data' => 'sub_total', 'name' => 'Total', 'className' => "text-right"],
                ['data' => 'stok_opname', 'name' => 'Stok Opname', 'className' => "text-right"],
                ['data' => 'stok_gudang', 'name' => 'Stok Gudang', 'className' => "text-right"],
                ['data' => 'expired_date', 'name' => 'Expired Date'],
                ['data' => 'keterangan_penerimaan', 'name' => 'Keterangan Penerimaan'],                                
                ['data' => 'tanggal_pembayaran', 'name' => 'Tanggal Pembayaran'],                
                ['data' => 'keterangan_pembayaran', 'name' => 'Keterangan Pembayaran'],                
            ];

            header('Content-Type: application/json');
            echo json_encode(["chart" => ['chart_day' => $r[1], 'chart_month' => $r[2], 'chart_year' => $r[3]], "table" => $table]);
        }
    }    

    public function getRawatJalanParameter($postData)
    {
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $filter_tanggal = NULL;
        $date_from = NULL;
        $date_to = NULL;
        $no_rm_from = NULL;
        $no_rm_to = NULL;
        $nama_pasien = NULL;
        $no_telp = NULL;
        $tempat_lahir = NULL;
        $tanggal_lahir_from = NULL;
        $tanggal_lahir_to = NULL;
        $golongan_darah = NULL;
        $jenis_kelamin = NULL;
        $pekerjaan = NULL;
        $agama = NULL;
        $alamat = NULL;
        $keterangan_pasien = NULL;
        $unit_layanan = NULL;
        $dokter = NULL;
        $tipe_pasien = NULL;
        $keterangan_unit_layanan = NULL;
        // pemeriksaan
        $layanan = NULL;
        $layanan_from = NULL;
        $layanan_to = NULL;
        $diagnosa = NULL;
        $icd9 = NULL;
        $icd10 = NULL;
        $keterangan_pemeriksaan = NULL;
        // apotek
        $obat = NULL;
        $obat_from = NULL;
        $obat_to = NULL;
        $keterangan_apotek = NULL;
        // pembayaran
        $tambahan = NULL;
        $tambahan_from = NULL;
        $tambahan_to = NULL;
        $diskon_from = NULL;
        $diskon_to = NULL;
        $pajak_from = NULL;
        $pajak_to = NULL;
        $tagihan_from = NULL;
        $tagihan_to = NULL;
        $keterangan_pembayaran = NULL;
        $cara_bayar = NULL;


        if (isset($postData->pilih_tanggal)) {
            $filter_tanggal = $postData->pilih_tanggal[0];
        }

        if (isset($postData->tanggal_filter)) {
            $tanggal = explode(' - ', $postData->tanggal_filter[0]);
            $date_from = dateFormatDb($tanggal[0]);
            $date_to = dateFormatDb($tanggal[1]);
        }

        if (isset($postData->no_rm_from) && isset($postData->no_rm_to)) {
            $no_rm_from = $postData->no_rm_from[0];
            $no_rm_to = $postData->no_rm_to[0];
        }

        if (isset($postData->nama_pasien))
            $nama_pasien = $postData->nama_pasien[0];


        if (isset($postData->no_telp))
            $no_telp = $postData->no_telp[0];

        if (isset($postData->tempat_lahir))
            $tempat_lahir = $postData->tempat_lahir[0];

        if(isset($postData->tanggal_lahir)){
            $tanggal = explode(' - ', $postData->tanggal_lahir[0]);    
            $tanggal_lahir_from = dateFormatDb($tanggal[0]);
            $tanggal_lahir_to = dateFormatDb($tanggal[1]);            
        }    

        if (isset($postData->golongan_darah))
            $golongan_darah = "'" . implode("','", $postData->golongan_darah) . "'";

        if (isset($postData->jenis_kelamin))
            $jenis_kelamin = "'" . implode("','", $postData->jenis_kelamin) . "'";

        if (isset($postData->pekerjaan))
            $pekerjaan = "'" . implode("','", $postData->pekerjaan) . "'";

        if (isset($postData->agama))
            $agama = "'" . implode("','", $postData->agama) . "'";

        if(isset($postData->alamat))
            $alamat = $postData->alamat[0];

        if (isset($postData->keterangan_pasien))
            $keterangan_pasien = $postData->keterangan_pasien[0];

        if (isset($postData->unit_layanan))
            $unit_layanan = $postData->unit_layanan[0];

        if (isset($postData->dokter))
            $dokter = $postData->dokter[0];        

        if (isset($postData->tipe_pasien))
            $tipe_pasien = $postData->tipe_pasien[0];
        

        if (isset($postData->keterangan_unit_layanan))
            $keterangan_unit_layanan = $postData->keterangan_unit_layanan[0];

        if(isset($postData->layanan))
            $layanan = "'" . implode("','", $postData->layanan) . "'";            

        if(isset($postData->layanan_from) && isset($postData->layanan_to)){
            $layanan_from = $postData->layanan_from[0];
            $layanan_to = $postData->layanan_to[0];
        }            

        if (isset($postData->diagnosis))
            $diagnosa = $postData->diagnosis[0];

        if (isset($postData->icd9))
            $icd9 = $postData->icd9[0];

        if (isset($postData->icd10))
            $icd10 = $postData->icd10[0];                 

        if(isset($postData->keterangan_pemeriksaan))
            $keterangan_pemeriksaan = $postData->keterangan_pemeriksaan[0];                    
        
        if(isset($postData->nama_obat)){
            $nama_obat = explode(',', $postData->nama_obat[0]);                
            $obat = "'" . implode("','", $nama_obat) . "'";                
        }
        
        if(isset($postData->obat_from) && isset($postData->obat_to)){
            $obat_from = $postData->obat_from[0];
            $obat_to = $postData->obat_to[0];
        }

        if(isset($postData->keterangan_apotek))
            $keterangan_apotek = $postData->keterangan_apotek[0];                     

        if(isset($postData->rincian_tambahan))
            $tambahan = $postData->rincian_tambahan[0];                                    


        if(isset($postData->tambahan_from) && isset($postData->tambahan_to)){
            $tambahan_from = $postData->tambahan_from[0];
            $tambahan_to = $postData->tambahan_to[0];
        }


        if(isset($postData->diskon_from) && isset($postData->diskon_to)){
            $diskon_from = $postData->diskon_from[0];
            $diskon_to = $postData->diskon_to[0];            
        }

        if(isset($postData->pajak_from) && isset($postData->pajak_to)){
            $pajak_from = $postData->pajak_from[0];
            $pajak_to = $postData->pajak_to[0];            
        }                                         

        if(isset($postData->tagihan_from) && isset($postData->tagihan_to)){
            $tagihan_from = $postData->tagihan_from[0];
            $tagihan_to = $postData->tagihan_to[0];   
        }    
        
        if(isset($postData->keterangan_pembayaran))
            $keterangan_pembayaran = $postData->keterangan_pembayaran[0];                    

        if(isset($postData->cara_bayar))
            $cara_bayar = $postData->cara_bayar[0];


        $parameter = [
            [
                "bind_types" => "i", "bind_value" => $id_klinik
            ],
            [
                "bind_types" => "s", "bind_value" => $filter_tanggal
            ],
            [
                "bind_types" => "s", "bind_value" => $date_from
            ],
            [
                "bind_types" => "s", "bind_value" => $date_to
            ],
            [
                "bind_types" => "s", "bind_value" => $no_rm_from
            ],
            [
                "bind_types" => "s", "bind_value" => $no_rm_to
            ],
            [
                "bind_types" => "s", "bind_value" => $nama_pasien
            ],
            [
                "bind_types" => "s", "bind_value" => $no_telp
            ],
            [
                "bind_types" => "s", "bind_value" => $tempat_lahir
            ],
            [
                "bind_types" => "s", "bind_value" => $tanggal_lahir_from
            ],
            [
                "bind_types" => "s", "bind_value" => $tanggal_lahir_to
            ],
            [
                "bind_types" => "s", "bind_value" => $golongan_darah
            ],
            [
                "bind_types" => "s", "bind_value" => $jenis_kelamin
            ],
            [
                "bind_types" => "s", "bind_value" => $pekerjaan
            ],
            [
                "bind_types" => "s", "bind_value" => $agama
            ],
            [
                "bind_types" => "s", "bind_value" => $alamat
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_pasien
            ],
            [
                "bind_types" => "s", "bind_value" => $unit_layanan
            ],
            [
                "bind_types" => "s", "bind_value" => $dokter
            ],
            [
                "bind_types" => "s", "bind_value" => $tipe_pasien
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_unit_layanan
            ],
            [
                "bind_types" => "s", "bind_value" => $layanan
            ],
            [
                "bind_types" => "d", "bind_value" => $layanan_from
            ],
            [
                "bind_types" => "d", "bind_value" => $layanan_to
            ],
            [
                "bind_types" => "s", "bind_value" => $diagnosa
            ],
            [
                "bind_types" => "s", "bind_value" => $icd9
            ],
            [
                "bind_types" => "s", "bind_value" => $icd10
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_pemeriksaan
            ],
            [
                "bind_types" => "s", "bind_value" => $obat
            ],
            [
                "bind_types" => "d", "bind_value" => $obat_from
            ],
            [
                "bind_types" => "d", "bind_value" => $obat_to
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_apotek
            ],
            [
                "bind_types" => "s", "bind_value" => $tambahan
            ],
            [
                "bind_types" => "d", "bind_value" => $tambahan_from
            ],
            [
                "bind_types" => "d", "bind_value" => $tambahan_to
            ],
            [
                "bind_types" => "d", "bind_value" => $diskon_from
            ],
            [
                "bind_types" => "d", "bind_value" => $diskon_to
            ],
            [
                "bind_types" => "d", "bind_value" => $pajak_from
            ],
            [
                "bind_types" => "d", "bind_value" => $pajak_to
            ],
            [
                "bind_types" => "d", "bind_value" => $tagihan_from
            ],
            [
                "bind_types" => "d", "bind_value" => $tagihan_to
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_pembayaran
            ],
            [
                "bind_types" => "s", "bind_value" => $cara_bayar
            ],
        ]; 

        return $parameter;
    }

    public function getPenjualanApotekParameter($postData)
    {
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $filter_tanggal = NULL;
        $date_from = NULL;
        $date_to = NULL;
        $keterangan_transaksi = NULL;        
        // pelanggan       
        $no_pelanggan_from = NULL;
        $no_pelanggan_to = NULL;
        $nama_pelanggan = NULL;
        $no_telp = NULL;
        $tanggal_lahir_from = NULL;
        $tanggal_lahir_to = NULL;
        $umur_from = NULL;
        $umur_to = NULL;        
        $jenis_kelamin = NULL;
        $alamat = NULL;
        $keterangan_pelanggan = NULL;
        $obat = NULL;
        $obat_from = NULL;
        $obat_to = NULL;
        // pembayaran
        $diskon_from = NULL;
        $diskon_to = NULL;
        $pajak_from = NULL;
        $pajak_to = NULL;
        $tagihan_from = NULL;
        $tagihan_to = NULL;
        $keterangan_pembayaran = NULL;
        $cara_bayar = NULL;


        if (isset($postData->pilih_tanggal)) {
            $filter_tanggal = $postData->pilih_tanggal[0];
        }

        if (isset($postData->tanggal_filter)) {
            $tanggal = explode(' - ', $postData->tanggal_filter[0]);
            $date_from = dateFormatDb($tanggal[0]);
            $date_to = dateFormatDb($tanggal[1]);
        }

        if (isset($postData->keterangan_transaksi))
            $keterangan_transaksi = $postData->keterangan_transaksi[0];

        if (isset($postData->nama_pelanggan))
            $nama_pelanggan = $postData->nama_pelanggan[0];


        if (isset($postData->no_telp))
            $no_telp = $postData->no_telp[0];

        if(isset($postData->tanggal_lahir)){
            $tanggal = explode(' - ', $postData->tanggal_lahir[0]);    
            $tanggal_lahir_from = dateFormatDb($tanggal[0]);
            $tanggal_lahir_to = dateFormatDb($tanggal[1]);            
        }    

        if(isset($postData->umur_from) && isset($postData->umur_to)){
            $umur_from = $postData->umur_from[0];
            $umur_to = $postData->umur_to[0];
        }                      

        if (isset($postData->jenis_kelamin))
            $jenis_kelamin = "'" . implode("','", $postData->jenis_kelamin) . "'";

        if(isset($postData->alamat))
            $alamat = $postData->alamat[0];

        if (isset($postData->keterangan_pelanggan))
            $keterangan_pelanggan = $postData->keterangan_pelanggan[0];

        if(isset($postData->nama_obat)){
            $nama_obat = explode(',', $postData->nama_obat[0]);                
            $obat = "'" . implode("','", $nama_obat) . "'";                
        }
        
        if(isset($postData->obat_from) && isset($postData->obat_to)){
            $obat_from = $postData->obat_from[0];
            $obat_to = $postData->obat_to[0];
        }

        if(isset($postData->diskon_from) && isset($postData->diskon_to)){
            $diskon_from = $postData->diskon_from[0];
            $diskon_to = $postData->diskon_to[0];            
        }

        if(isset($postData->pajak_from) && isset($postData->pajak_to)){
            $pajak_from = $postData->pajak_from[0];
            $pajak_to = $postData->pajak_to[0];            
        }                                         

        if(isset($postData->tagihan_from) && isset($postData->tagihan_to)){
            $tagihan_from = $postData->tagihan_from[0];
            $tagihan_to = $postData->tagihan_to[0];   
        }    
        
        if(isset($postData->keterangan_pembayaran))
            $keterangan_pembayaran = $postData->keterangan_pembayaran[0];                    

        if(isset($postData->cara_bayar))
            $cara_bayar = $postData->cara_bayar[0];


        $parameter = [
            [
                "bind_types" => "i", "bind_value" => $id_klinik
            ],
            [
                "bind_types" => "s", "bind_value" => $filter_tanggal
            ],
            [
                "bind_types" => "s", "bind_value" => $date_from
            ],
            [
                "bind_types" => "s", "bind_value" => $date_to
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_transaksi
            ],
            [
                "bind_types" => "s", "bind_value" => $nama_pelanggan
            ],
            [
                "bind_types" => "s", "bind_value" => $no_telp
            ],
            [
                "bind_types" => "s", "bind_value" => $tanggal_lahir_from
            ],
            [
                "bind_types" => "s", "bind_value" => $tanggal_lahir_to
            ],
            [
                "bind_types" => "i", "bind_value" => $umur_from
            ],
            [
                "bind_types" => "i", "bind_value" => $umur_to
            ],            
            [
                "bind_types" => "s", "bind_value" => $jenis_kelamin
            ],
            [
                "bind_types" => "s", "bind_value" => $alamat
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_pelanggan
            ],
            [
                "bind_types" => "s", "bind_value" => $obat
            ],
            [
                "bind_types" => "d", "bind_value" => $obat_from
            ],
            [
                "bind_types" => "d", "bind_value" => $obat_to
            ],
            [
                "bind_types" => "d", "bind_value" => $diskon_from
            ],
            [
                "bind_types" => "d", "bind_value" => $diskon_to
            ],
            [
                "bind_types" => "d", "bind_value" => $pajak_from
            ],
            [
                "bind_types" => "d", "bind_value" => $pajak_to
            ],
            [
                "bind_types" => "d", "bind_value" => $tagihan_from
            ],
            [
                "bind_types" => "d", "bind_value" => $tagihan_to
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_pembayaran
            ],
            [
                "bind_types" => "s", "bind_value" => $cara_bayar
            ],
        ]; 

        return $parameter;
    }    

    public function getStokParameter($postData)
    {
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $filter_tanggal = NULL;
        $date_from = NULL;
        $date_to = NULL;

        // pemesanan       
        $no_po = NULL;
        $tanggal_po = NULL;
        $keterangan_pemesanan = NULL;
        $supplier = NULL;
        // penerimaan
        $no_faktur = NULL;
        $tanggal_faktur = NULL;
        $lokasi = NULL;
        $keternagan_penerimaan = NULL;        
        $obat = NULL;
        $stok_opname_from = NULL;
        $stok_opname_to = NULL;
        $stok_gudang_from = NULL;
        $stok_gudang_to = NULL;
        $obat_to = NULL;
        // pembayaran
        $diskon_from = NULL;
        $diskon_to = NULL;
        $pajak_from = NULL;
        $pajak_to = NULL;
        $tagihan_from = NULL;
        $tagihan_to = NULL;
        $keterangan_pembayaran = NULL;
        $cara_bayar = NULL;


        if (isset($postData->pilih_tanggal)) {
            $filter_tanggal = $postData->pilih_tanggal[0];
        }

        if (isset($postData->tanggal_filter)) {
            $tanggal = explode(' - ', $postData->tanggal_filter[0]);
            $date_from = dateFormatDb($tanggal[0]);
            $date_to = dateFormatDb($tanggal[1]);
        }

        if (isset($postData->no_po))
            $no_po = $postData->no_po[0];        

        if (isset($postData->supplier))
            $supplier = $postData->supplier[0];

        if (isset($postData->keterangan_pemesanan))
            $keterangan_pemesanan = $postData->keterangan_pemesanan[0];            

        if (isset($postData->no_faktur))
            $no_faktur = $postData->no_faktur[0];

        if (isset($postData->keternagan_penerimaan))
            $keternagan_penerimaan = $postData->keternagan_penerimaan[0];                        

        if(isset($postData->nama_obat)){
            $nama_obat = explode(',', $postData->nama_obat[0]);                
            $obat = "'" . implode("','", $nama_obat) . "'";                
        }

        if(isset($postData->stok_opname_from) && isset($postData->stok_opname_to)){
            $stok_opname_from = $postData->stok_opname_from[0];
            $stok_opname_to = $postData->stok_opname_to[0];
        }        

        if(isset($postData->stok_gudang_from) && isset($postData->stok_gudang_to)){
            $stok_gudang_from = $postData->stok_gudang_from[0];
            $stok_gudang_to = $postData->stok_gudang_to[0];
        }                
        
        if(isset($postData->obat_from) && isset($postData->obat_to)){
            $obat_from = $postData->obat_from[0];
            $obat_to = $postData->obat_to[0];
        }

        if(isset($postData->diskon_from) && isset($postData->diskon_to)){
            $diskon_from = $postData->diskon_from[0];
            $diskon_to = $postData->diskon_to[0];            
        }

        if(isset($postData->pajak_from) && isset($postData->pajak_to)){
            $pajak_from = $postData->pajak_from[0];
            $pajak_to = $postData->pajak_to[0];            
        }                                         

        if(isset($postData->tagihan_from) && isset($postData->tagihan_to)){
            $tagihan_from = $postData->tagihan_from[0];
            $tagihan_to = $postData->tagihan_to[0];   
        }    
        
        if(isset($postData->keterangan_pembayaran))
            $keterangan_pembayaran = $postData->keterangan_pembayaran[0];                    

        if(isset($postData->cara_bayar))
            $cara_bayar = $postData->cara_bayar[0];


        $parameter = [
            [
                "bind_types" => "i", "bind_value" => $id_klinik
            ],
            [
                "bind_types" => "s", "bind_value" => $filter_tanggal
            ],
            [
                "bind_types" => "s", "bind_value" => $date_from
            ],
            [
                "bind_types" => "s", "bind_value" => $date_to
            ],
            [
                "bind_types" => "s", "bind_value" => $no_po
            ],
            [
                "bind_types" => "s", "bind_value" => $supplier
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_pemesanan
            ],
            [
                "bind_types" => "s", "bind_value" => $no_faktur
            ],
            [
                "bind_types" => "s", "bind_value" => $keternagan_penerimaan
            ],
            [
                "bind_types" => "s", "bind_value" => $keterangan_pembayaran
            ],            
            [
                "bind_types" => "s", "bind_value" => $obat
            ],
            [
                "bind_types" => "d", "bind_value" => $stok_opname_from
            ],
            [
                "bind_types" => "d", "bind_value" => $stok_opname_to
            ],
            [
                "bind_types" => "d", "bind_value" => $stok_gudang_from
            ],
            [
                "bind_types" => "d", "bind_value" => $stok_gudang_to
            ],
        ]; 

        return $parameter;
    }    
}

class MysqliMultiResult extends mysqli
{
    private $link;

    function __construct($link)
    {
        parent::__construct();
        $this->link = $link;
    }

    public function prepare_statement($query, ...$paramters)
    {
        return new stmt($this->link, $query, $paramters);
    }
}

class stmt extends mysqli_stmt
{
    private $parameters = [];
    private $parameter_types = [];
    private $parameter_values = [];

    public function __construct($link, $query, $paramters)
    {
        $this->clear_parameter();
        $this->parameters = $paramters;
        parent::__construct($link, $query);
    }

    public function clear_parameter()
    {
        unset($this->parameter_values);
        unset($this->parameter_types);
        $this->parameter_values = [];
        $this->parameter_types = [];
    }

    public function set_parameter($type, $param)
    {
        $this->parameter_types[] = $type;
        $this->parameter_values[] = $param;
    }

    public function bind_parameter()
    {
        foreach ($this->parameters as $key => $value) {
            $this->set_parameter($value["bind_types"], $value["bind_value"]);
        }
        $params = array_merge([implode("", $this->parameter_types)], $this->parameter_values);
        return call_user_func_array([$this, 'bind_param'], $this->makeValuesReferenced($params));
    }

    private function makeValuesReferenced($arr)
    {
        $refs = [];
        foreach ($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }

    public function execute()
    {
        if (count($this->parameters))
            $this->bind_parameter();

        return parent::execute();
    }

    public function execute_results()
    {
        $r = [];
        if (count($this->parameters))
            $this->bind_parameter();

        parent::execute();

        do {
            if (FALSE != $result = parent::get_result()) {
                array_push($r, $result->fetch_all(MYSQLI_ASSOC));
                parent::next_result();
            }
        } while (parent::more_results());

        return $r;
    }
}
