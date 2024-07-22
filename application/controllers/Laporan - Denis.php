<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $this->load->model('Akun_model');                                                                                          				                        
        $this->_init();
	}

	private function _init()
	{        
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if((!$this->ion_auth->is_admin()) && (!$this->ion_auth->in_group(['super_admin_klinik', 'administrator_klinik'])))			
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
        $this->load->css('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/css/dataTables.checkboxes.css');                              
        $this->load->css('https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css');                      
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css');                           
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
        $this->load->css('assets/themes/adminLTE/plugins/tag/fm.tagator.jquery.min.css');                
		$this->load->css('assets/themes/adminLTE/dist/css/wizard.css');

		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
		$this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js');
        $this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js');
        $this->load->js('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/js/dataTables.checkboxes.min.js');
        $this->load->js('https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js');        
        $this->load->js('https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js');                
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js');                        
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js');                                
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js');                                        
        $this->load->js('https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js');                                                
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
        $this->load->js('https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js');	   		        
        $this->load->js('assets/themes/adminLTE/plugins/tag/fm.tagator.jquery.js');        
        
        $this->load->js('assets/js/helper.js');
        $this->load->js('https://www.chartjs.org/samples/latest/utils.js');                        
        $this->load->js('assets/js/laporan.js');        

    }

	public function rawat_jalan()
	{      
        $data['page_title'] = "Laporan";
		$data['page_menu'] = "LaporanLayanan";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['master'] = $this->master();
		$this->load->view('laporan/rawat_jalan', $data);
    }    

	public function penjualan_apotek()
	{      
        $data['page_title'] = "Laporan";
		$data['page_menu'] = "LaporanPenjualanApotek";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['master'] = $this->master();
		$this->load->view('laporan/penjualan_apotek', $data);
    }

	public function jurnal()
	{      
        $data['page_title'] = "Laporan";
		$data['page_menu'] = "LaporanJurnal";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['master'] = $this->master();
		$this->load->view('laporan/jurnal', $data);
    }    

	public function pendaftaran()
	{      
        $data['page_title'] = "Laporan";
		$data['page_menu'] = "LaporanPendaftaran";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['master'] = $this->master();
		$this->load->view('laporan/pendaftaran', $data);
    } 
    
	public function unit_layanan()
	{      
        $data['page_title'] = "Laporan";
		$data['page_menu'] = "LaporanUnitLayanan";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['master'] = $this->master();
		$this->load->view('laporan/unit_layanan', $data);
    }     
    
	public function pemeriksaan()
	{      
        $data['page_title'] = "Laporan";
		$data['page_menu'] = "LaporanPemeriksaan";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['master'] = $this->master();
		$this->load->view('laporan/pemeriksaan', $data);
    }
    
	public function apotek()
	{      
        $data['page_title'] = "Laporan";
		$data['page_menu'] = "LaporanApotek";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['master'] = $this->master();
		$this->load->view('laporan/apotek', $data);
    }

	public function stok()
	{      
        $data['page_title'] = "Laporan";
		$data['page_menu'] = "LaporanStok";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['master'] = $this->master();
		$this->load->view('laporan/stok', $data);
    }
    
	public function pembayaran()
	{      
        $data['page_title'] = "Laporan";
		$data['page_menu'] = "LaporanPembayaran";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['master'] = $this->master();
		$this->load->view('laporan/pembayaran', $data);
    }    
    
    public function getObat(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $obat = $this->Obat_model->getByKlinik($id_klinik);	        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($obat);		
    }    

    public function getAkun(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $akun = $this->Akun_model->get();	        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($akun);		
    }        

    public function getDatatable(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0";
        $result = $this->Jurnal_model->getDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
    } 
    
	public function master()
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
		//header('Content-Type: application/json');
		//echo json_encode($data);		
    } 


	public function getDataPendaftaran()
	{
        $this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;                
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $filter_tanggal = "created_at";
        $data = [];

        $where_tanggal = 
        $where_nama_pasien = 
        $where_no_telp = 
        $where_tempat_lahir = 
        $where_diagnosa = 
        $where_keterangan_pasien = 
        $where_keterangan_unit_layanan = 
        $where_keterangan_pemeriksaan = 
        $where_keterangan_apotek = 
        $where_no_rm = 
        $where_golongan_darah = 
        $where_jenis_kelamin = 
        $where_pekerjaan = 
        $where_agama =               
        $where_unit_layanan =                      
        $where_dokter =        
        $where_tipe_pasien =        		        
        $where_diskon =        
        $where_pajak = 		 
        $where_tagihan = 	
        $where_icd9 =        		               
        $where_icd10 =      
        $where_tambahan =
        $where_layanan =               
        $where_harga_layanan =
        $where_nama_obat = 
        $where_harga_obat = 
        $where_harga_tambahan = 
        $where_cara_bayar = 
        $where_not_null_obat = 
        $where_not_null_layanan = 
        $where_not_null_cara_bayar = "";

        if(isset($postData->tanggal_pendaftaran)){
            if($postData->tanggal_pendaftaran[0] !== ''){
                $tanggal = explode(' - ', $postData->tanggal_pendaftaran[0]);    
                $data['tanggal_pendaftaran_from'] = $tanggal[0];
                $data['tanggal_pendaftaran_to'] = $tanggal[1];                                
                $where_tanggal = " AND tanggal BETWEEN '". dateFormatDb($tanggal[0]) ."' AND '". dateFormatDb($tanggal[1]) ."'";                
            }
        }

        if(isset($postData->pilih_tanggal)){
            if($postData->pilih_tanggal[0] !== ''){
                $filter_tanggal = $postData->pilih_tanggal[0];
            }
        }

        if(isset($postData->rm_from) && isset($postData->rm_to)){
            if(($postData->rm_from[0] !== '') && ($postData->rm_to[0] !== '')){
                if($postData->rm_from[0] < $postData->rm_to[0]){
                    $rm = array_map(function ($i){
                        return $i;
                    }, range($postData->rm_from[0], $postData->rm_to[0]));
                    $where_no_rm = " AND `no_rm` IN ('" .implode("','", $rm). "')";                    
                }
            }
        }    

        if(isset($postData->nama_pasien))
            $where_nama_pasien = " AND  `nama_pasien` LIKE '%" . $postData->nama_pasien[0] . "%' ESCAPE '!'";            

        if(isset($postData->no_telp))
            $where_no_telp = " AND  `pasien`.`no_telp` LIKE '%" . $postData->no_telp[0] . "%' ESCAPE '!'";                        

        if(isset($postData->tempat_lahir)) 
            $where_tempat_lahir = " AND  `tempat_lahir` LIKE '%" . $postData->tempat_lahir[0] . "%' ESCAPE '!'";                                    

        if(isset($postData->golongan_darah))
            $where_golongan_darah = " AND `golongan_darah` IN ('" .implode("','", $postData->golongan_darah). "')";             
        
        if(isset($postData->jenis_kelamin))
            $where_jenis_kelamin = " AND `jenis_kelamin` IN ('" .implode("','", $postData->jenis_kelamin). "')";                         

        if(isset($postData->pekerjaan))
            $where_pekerjaan = " AND `pekerjaan` IN ('" .implode("','", $postData->pekerjaan). "')";           

        if(isset($postData->agama))
            $where_agama = " AND `agama` IN ('" .implode("','", $postData->agama). "')";                   

        if(isset($postData->keterangan))
            $where_keterangan_pasien = " AND  `pasien`.`keterangan` LIKE '%" . $postData->keterangan[0] . "%' ESCAPE '!'";               
            
        if(isset($postData->keterangan_unit_layanan))
            $where_keterangan_unit_layanan = " AND  `keterangan1` LIKE '%" . $postData->keterangan_unit_layanan[0] . "%' ESCAPE '!'";                       

        if(isset($postData->keterangan_pemeriksaan))
            $where_keterangan_pemeriksaan = " AND  `keterangan2` LIKE '%" . $postData->keterangan_pemeriksaan[0] . "%' ESCAPE '!'";                               

        if(isset($postData->keterangan_apotek))
            $where_keterangan_apotek = " AND  `keterangan3` LIKE '%" . $postData->keterangan_apotek[0] . "%' ESCAPE '!'";                     
            
        if(isset($postData->unit_layanan)){
            if($postData->unit_layanan[0] !== '')                    
                $where_unit_layanan = " AND `id_unit_layanan` IN ('" .implode("','", $postData->unit_layanan). "')";                
        }

        if(isset($postData->dokter)){
            if($postData->dokter[0] !== '')                        
                $where_dokter = " AND `id_dokter` IN ('" .implode("','", $postData->dokter). "')";                            
        }

        if(isset($postData->tipe_pasien)){
            if($postData->tipe_pasien[0] !== '')                    
                $where_tipe_pasien = " AND `id_tipe_pasien` IN ('" .implode("','", $postData->tipe_pasien). "')";                                        
        }

        if(isset($postData->diagnosis))
            $where_diagnosa = " AND  `diagnosa` LIKE '%" . $postData->diagnosis[0] . "%' ESCAPE '!'";                               

        if(isset($postData->icd9))
            $where_icd9 = " AND  `icd9_name` LIKE '%" . $postData->icd9[0] . "%' ESCAPE '!'";                    

        if(isset($postData->icd10))
            $where_icd10 = " AND  `icd10_name` LIKE '%" . $postData->icd10[0] . "%' ESCAPE '!'";                            

        if(isset($postData->layanan)){
            if($postData->layanan[0] !== '')                            
                $where_layanan = " AND `id_layanan` IN ('" .implode("','", $postData->layanan). "')";                                                    
                $where_not_null_layanan = " AND harga_layanan IS NOT NULL";
        }

        if(isset($postData->layanan_from) && isset($postData->layanan_to)){
            if(($postData->layanan_from[0] !== '') && ($postData->layanan_to[0] !== ''))            
                $where_harga_layanan = " AND harga_layanan BETWEEN ". str_pad($postData->layanan_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->layanan_to[0] ."";
        }
        
        if(isset($postData->nama_obat)){
            if($postData->nama_obat[0] !== ''){
                $nama_obat = explode(',', $postData->nama_obat[0]);
                $where_nama_obat = " AND `nama_obat` IN ('" .implode("','", $nama_obat). "')";                                                                              
                $where_not_null_obat = " AND harga_obat IS NOT NULL";
            }                
        }

        if(isset($postData->obat_from) && isset($postData->obat_to)){
            if(($postData->obat_from[0] !== '') && ($postData->obat_to[0] !== ''))
                $where_harga_obat = " AND harga_obat BETWEEN ". str_pad($postData->obat_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->obat_to[0] ."";                
        }

        if(isset($postData->rincian_tambahan))
            $where_tambahan = " AND  `tambahan_name` LIKE '%" . $postData->rincian_tambahan[0] . "%' ESCAPE '!'";                                    


        if(isset($postData->tambahan_from) && isset($postData->tambahan_to)){
            if(($postData->tambahan_from[0] !== '') && ($postData->tambahan_to[0] !== ''))
                $where_harga_tambahan = " AND harga_tambahan BETWEEN ". str_pad($postData->tambahan_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->tambahan_to[0] ."";                            
        }


        if(isset($postData->diskon_from) && isset($postData->diskon_to)){
            if(($postData->diskon_from[0] !== '') && ($postData->diskon_to[0] !== ''))            
                $where_diskon = " AND total_diskon BETWEEN ". str_pad($postData->diskon_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->diskon_to[0] ."";                                        
        }

        if(isset($postData->pajak_from) && isset($postData->pajak_to)){
            if(($postData->pajak_from[0] !== '') && ($postData->pajak_to[0] !== ''))
                $where_pajak = " AND total_pajak BETWEEN ". str_pad($postData->pajak_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->pajak_to[0] ."";                                                    
        }                                         

        if(isset($postData->cara_bayar)){
            if($postData->cara_bayar[0] !== ''){
                $where_cara_bayar = " AND `nama_obat` IN ('" .implode("','", $postData->cara_bayar). "')"; 
                $where_not_null_cara_bayar = " AND jumlah_pembayaran IS NOT NULL";                 
            }                
        }



        if(isset($postData->tagihan_from) && isset($postData->tagihan_to)){
            if(($postData->tagihan_from[0] !== '') && ($postData->tagihan_to[0] !== ''))            
                $where_tagihan = " AND total_tagihan BETWEEN ". str_pad($postData->tagihan_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->tagihan_to[0] ."";                                                                
        }

        $query = "SELECT * FROM (
            SELECT 
                   `register_pasien`.`id`,
                   `register_pasien`.`no_registrasi`,
                   DATE(register_pasien.$filter_tanggal) tanggal,
                   `pasien`.`no_rm`,
                   `pasien`.`nama_pasien`,
                   `pasien`.`no_telp`,
                   `pasien`.`tempat_lahir`,
                   `pasien`.`golongan_darah`,
                   `pasien`.`jenis_kelamin`,
                   `pekerjaan`.`pekerjaan`,
                   `pasien`.`agama`,
                   `pasien`.`alamat`,
                   `pasien`.`keterangan`,
                   `unit_layanan`.`nama_unit_layanan`,
                   `dokter`.`nama_dokter`,
                   `tipe_pasien`.`tipe_pasien`,
                   `register_pasien`.`diagnosa`,
                   `register_pasien`.`keterangan1`,
                   `register_pasien`.`keterangan2`,
                   `register_pasien`.`keterangan3`,
                   COALESCE(icd9_name, '') icd9_name,
                   COALESCE(icd10_name, '') icd10_name,
                   COALESCE(tambahan_name, '') tambahan_name,
                   harga_layanan,
                   harga_obat,
                   harga_tambahan,
                   total_diskon,
                   total_pajak,
                   total_tagihan,
                jumlah_pembayaran       
            FROM `register_pasien`
            JOIN `pasien` ON `pasien`.`id` = `register_pasien`.`id_pasien`
            LEFT JOIN `pekerjaan` ON `pekerjaan`.`id` = `pasien`.`pekerjaan`
            LEFT JOIN `unit_layanan` ON `unit_layanan`.`id` = `register_pasien`.`id_unit_layanan`
            LEFT JOIN `dokter` ON `dokter`.`id` = `register_pasien`.`id_dokter`
            LEFT JOIN `tipe_pasien` ON `tipe_pasien`.`id` = `register_pasien`.`id_tipe_pasien`
            LEFT JOIN (
                SELECT `id_register_pasien`,
                GROUP_CONCAT(DISTINCT icd9_name) icd9_name
                FROM `register_pasien_icd9` 
                LEFT JOIN `icd9` 
                ON `icd9`.`id` = `register_pasien_icd9`.`id_icd9`
                GROUP BY `id_register_pasien`
            ) t_icd9
            ON t_icd9.id_register_pasien = `register_pasien`.`id`
            LEFT JOIN (
                SELECT `id_register_pasien`,
                GROUP_CONCAT(DISTINCT icd10_name) icd10_name
                FROM `register_pasien_icd10` 
                LEFT JOIN `icd10` 
                ON `icd10`.`id` = `register_pasien_icd10`.`id_icd10`
                GROUP BY `id_register_pasien`
            ) t_icd10
            ON t_icd10.id_register_pasien = `register_pasien`.`id`
            LEFT JOIN (
                SELECT `id_register_pasien`,
                SUM(register_pasien_layanan.harga * register_pasien_layanan.jumlah) harga_layanan
                FROM `register_pasien_layanan` 
                WHERE 1=1  $where_layanan  
                GROUP BY `id_register_pasien`
            ) t_layanan
            ON t_layanan.id_register_pasien = `register_pasien`.`id`
            LEFT JOIN (
                SELECT `id_register_pasien`,
                SUM(register_pasien_obat.harga * register_pasien_obat.jumlah) harga_obat
                FROM `register_pasien_obat`
                LEFT JOIN `obat` ON `obat`.`id` = `register_pasien_obat`.`id_obat` 
               WHERE 1=1 $where_nama_obat  		      		               		
                GROUP BY `id_register_pasien`
            ) t_obat
            ON t_obat.id_register_pasien = `register_pasien`.`id`
            LEFT JOIN (
                SELECT `id_register_pasien`,
                GROUP_CONCAT(DISTINCT nama_tambahan) tambahan_name,
                SUM(register_pasien_tambahan.harga * register_pasien_tambahan.jumlah) harga_tambahan
                FROM `register_pasien_tambahan` 
                GROUP BY `id_register_pasien`
            ) t_tambahan
            ON t_tambahan.id_register_pasien = `register_pasien`.`id`
            LEFT JOIN (
                SELECT `id_register_pasien`,
                COUNT(*) jumlah_pembayaran
                FROM `register_pasien_pembayaran` 
                WHERE 1=1 $where_cara_bayar  
                GROUP BY `id_register_pasien`
            ) t_pembayaran
            ON t_pembayaran.id_register_pasien = `register_pasien`.`id`		
            WHERE (`register_pasien`.`id_klinik` = $id_klinik
                   AND `register_pasien`.`is_deleted` =0
                   $where_nama_pasien
                   $where_no_telp
                   $where_tempat_lahir
                   $where_diagnosa
                   $where_keterangan_pasien
                   $where_keterangan_unit_layanan
                   $where_keterangan_pemeriksaan
                   $where_keterangan_apotek
                   $where_no_rm
                   $where_golongan_darah
                   $where_jenis_kelamin
                   $where_pekerjaan
                   $where_agama              
                   $where_unit_layanan                     
                   $where_dokter       
                   $where_tipe_pasien       		        
                   $where_diskon       
                   $where_pajak		 
                   $where_tagihan		 
            )
        )t
        WHERE 1=1
        $where_tanggal
        $where_icd9       		               
        $where_icd10       
        $where_tambahan              
        $where_harga_layanan
        $where_harga_obat
        $where_harga_tambahan
        $where_not_null_obat
        $where_not_null_layanan
        $where_not_null_cara_bayar
        ";


        $final_query = $this->db->query("SELECT UNIX_TIMESTAMP(id) * 1000 id, COALESCE(total, 0) total
        , COALESCE(harga_layanan, 0) harga_layanan
        , COALESCE(harga_obat, 0) harga_obat
        , COALESCE(harga_tambahan, 0) harga_tambahan
        , COALESCE(total_diskon, 0) total_diskon
        , COALESCE(total_pajak, 0) total_pajak
        , COALESCE(total_tagihan, 0) total_tagihan FROM (
            SELECT a.id
            FROM (
                SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY AS id
                FROM (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as a
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as b
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as c
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as d
            ) a
            WHERE a.id BETWEEN '". dateFormatDb($data['tanggal_pendaftaran_from']) ."' AND '". dateFormatDb($data['tanggal_pendaftaran_to']) ."'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(*) AS total, SUM(harga_layanan) harga_layanan, SUM(harga_obat) harga_obat, SUM(harga_tambahan) harga_tambahan, SUM(total_diskon) total_diskon, SUM(total_pajak) total_pajak, SUM(total_tagihan) total_tagihan FROM (
                " .$query. "
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;");

        $result_chart = $final_query->result();
        $result_table = $this->db->query($query)->result();        

        header('Content-Type: application/json');
        echo json_encode(["chart" => $result_chart, "table" => $result_table]);	                
    }

	public function getDataPendaftaran2()
	{
        $this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;                
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $filter_tanggal = "created_at";
        $data = [];
        if(isset($postData->tanggal_pendaftaran)){
            if($postData->tanggal_pendaftaran[0] !== ''){
                $tanggal = explode(' - ', $postData->tanggal_pendaftaran[0]);    
                $data['tanggal_pendaftaran_from'] = $tanggal[0];
                $data['tanggal_pendaftaran_to'] = $tanggal[1];                
            }
        }

        if(isset($postData->pilih_tanggal)){
            if($postData->pilih_tanggal[0] !== ''){
                $filter_tanggal = $postData->pilih_tanggal[0];
            }
        }

        $this->db->select("register_pasien.id, register_pasien.no_registrasi, DATE(register_pasien.$filter_tanggal) tanggal, pasien.no_rm, 
        pasien.nama_pasien, 
        pasien.no_telp, 
        pasien.tempat_lahir, 
        pasien.golongan_darah, 
        pasien.jenis_kelamin, 
        pekerjaan.pekerjaan, 
        pasien.agama, 
        pasien.alamat, 
        pasien.keterangan, 
        unit_layanan.nama_unit_layanan,
        dokter.nama_dokter,
        tipe_pasien.tipe_pasien,  
        register_pasien.diagnosa,
        register_pasien.keterangan1,
        register_pasien.keterangan2,
        register_pasien.keterangan3,		         
        COALESCE(Group_concat(DISTINCT icd9_name),'')                              icd9_name, 
        COALESCE(Group_concat(DISTINCT icd10_name),'')                             icd10_name, 
        COALESCE(Group_concat(DISTINCT nama_tambahan),'')                          tambahan_name,
        SUM(register_pasien_layanan.harga * register_pasien_layanan.jumlah) harga_layanan, SUM(register_pasien_obat.harga * register_pasien_obat.jumlah) harga_obat, SUM(register_pasien_tambahan.harga * register_pasien_tambahan.jumlah) harga_tambahan, SUM(total_diskon) total_diskon
        , SUM(total_pajak) total_pajak
        , SUM(total_tagihan) total_tagihan");
        $this->db->join('pasien', 'pasien.id = register_pasien.id_pasien');        
        $this->db->join('register_pasien_icd9', 'register_pasien_icd9.id_register_pasien = register_pasien.id', 'LEFT');                
        $this->db->join('icd9', 'icd9.id = register_pasien_icd9.id_icd9', 'LEFT');                
        $this->db->join('register_pasien_icd10', 'register_pasien_icd10.id_register_pasien = register_pasien.id', 'LEFT');                        
        $this->db->join('icd10', 'icd10.id = register_pasien_icd10.id_icd10', 'LEFT');                
        $this->db->join('register_pasien_layanan', 'register_pasien_layanan.id_register_pasien = register_pasien.id', 'LEFT');                        
        $this->db->join('register_pasien_obat', 'register_pasien_obat.id_register_pasien = register_pasien.id', 'LEFT');                                
        $this->db->join('obat', 'obat.id = register_pasien_obat.id_obat', 'LEFT');                                        
        $this->db->join('register_pasien_tambahan', 'register_pasien.id = register_pasien_tambahan.id_register_pasien', 'LEFT');                                                
        $this->db->join('register_pasien_pembayaran', 'register_pasien.id = register_pasien_pembayaran.id_register_pasien', 'LEFT');                                                        
        $this->db->join('pekerjaan', 'pekerjaan.id = pasien.pekerjaan', 'LEFT');                                                                
        $this->db->join('unit_layanan', 'unit_layanan.id = register_pasien.id_unit_layanan', 'LEFT');                                                                
        $this->db->join('dokter', 'dokter.id = register_pasien.id_dokter', 'LEFT');                                                                
        $this->db->join('tipe_pasien', 'tipe_pasien.id = register_pasien.id_tipe_pasien', 'LEFT');                                                                        
        $this->db->group_by("register_pasien.id, DATE(register_pasien.$filter_tanggal)");         
        $this->db->group_start(); 
                
        $this->db->where(['register_pasien.id_klinik' => $id_klinik, 'register_pasien.is_deleted' => 0]);  

        if(isset($postData->rm_from) && isset($postData->rm_to)){
            if(($postData->rm_from[0] !== '') && ($postData->rm_to[0] !== '')){
                if($postData->rm_from[0] < $postData->rm_to[0]){
                    $rm = array_map(function ($i){
                        return $i;
                    }, range($postData->rm_from[0], $postData->rm_to[0]));
                    $this->db->where_in('no_rm', $rm);                
                }
            }
        }
        
        if(isset($postData->nama_pasien))
            $this->db->like('nama_pasien', $postData->nama_pasien[0]);
        
        if(isset($postData->no_telp))
            $this->db->like('pasien.no_telp', $postData->no_telp[0]);            

        if(isset($postData->tempat_lahir))
            $this->db->like('tempat_lahir', $postData->tempat_lahir[0]);

        if(isset($postData->golongan_darah))
            $this->db->where_in('golongan_darah', $postData->golongan_darah);

        if(isset($postData->jenis_kelamin))
            $this->db->where_in('jenis_kelamin', $postData->jenis_kelamin);

        if(isset($postData->pekerjaan))
            $this->db->where_in('pekerjaan', $postData->pekerjaan);

        if(isset($postData->agama))
            $this->db->where_in('agama', $postData->agama);

        if(isset($postData->keterangan))
            $this->db->like('pasien.keterangan', $postData->keterangan[0]);            

        if(isset($postData->keterangan_unit_layanan))
            $this->db->like('keterangan1', $postData->keterangan_unit_layanan[0]);            

        if(isset($postData->keterangan_pemeriksaan))
            $this->db->like('keterangan2', $postData->keterangan_pemeriksaan[0]);            

        if(isset($postData->keterangan_apotek))
            $this->db->like('keterangan3', $postData->keterangan_apotek[0]);            

        if(isset($postData->unit_layanan))
            if($postData->unit_layanan[0] !== '')        
                $this->db->where_in('id_unit_layanan', $postData->unit_layanan);

        if(isset($postData->dokter))
            if($postData->dokter[0] !== '')                        
                $this->db->where_in('id_dokter', $postData->dokter);

        if(isset($postData->tipe_pasien))
            if($postData->tipe_pasien[0] !== '')        
                $this->db->where_in('id_tipe_pasien', $postData->tipe_pasien);

        if(isset($postData->diagnosis))
            $this->db->like('diagnosa', $postData->diagnosis[0]);

        if(isset($postData->icd9))
            $this->db->having("icd9_name LIKE '%".$postData->icd9[0]."%' ESCAPE '!'");                

        if(isset($postData->icd10))
            $this->db->having("icd10_name LIKE '%".$postData->icd10[0]."%' ESCAPE '!'");        

        if(isset($postData->layanan))
            if($postData->layanan[0] !== '')                
                $this->db->where_in('id_layanan', $postData->layanan[0]);            

        if(isset($postData->layanan_from) && isset($postData->layanan_to))
            if(($postData->layanan_from[0] !== '') && ($postData->layanan_to[0] !== ''))
                $this->db->having("harga_layanan BETWEEN ". str_pad($postData->layanan_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->layanan_to[0] ."");
        
        if(isset($postData->nama_obat))
            if($postData->nama_obat[0] !== ''){
                $nama_obat = explode(',', $postData->nama_obat[0]);
                $this->db->where_in('nama_obat', $nama_obat);                
            }        

        if(isset($postData->obat_from) && isset($postData->obat_to))
            if(($postData->obat_from[0] !== '') && ($postData->obat_to[0] !== ''))
                $this->db->having("harga_obat BETWEEN ". str_pad($postData->obat_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->obat_to[0] ."");

        if(isset($postData->rincian_tambahan))
            $this->db->having("tambahan_name LIKE '%".$postData->rincian_tambahan[0]."%' ESCAPE '!'");

        if(isset($postData->tambahan_from) && isset($postData->tambahan_to))
            if(($postData->tambahan_from[0] !== '') && ($postData->tambahan_to[0] !== ''))
                $this->db->having("harga_tambahan BETWEEN ". str_pad($postData->tambahan_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->tambahan_to[0] ."");            

        if(isset($postData->diskon_from) && isset($postData->diskon_to))
            if(($postData->diskon_from[0] !== '') && ($postData->diskon_to[0] !== ''))
                $this->db->having("total_diskon BETWEEN ". str_pad($postData->diskon_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->diskon_to[0] ."");                            

        if(isset($postData->pajak_from) && isset($postData->pajak_to))
            if(($postData->pajak_from[0] !== '') && ($postData->pajak_to[0] !== ''))
                $this->db->having("total_pajak BETWEEN ". str_pad($postData->pajak_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->pajak_to[0] ."");                                            

        if(isset($postData->cara_bayar))
            if($postData->cara_bayar[0] !== '')                
                $this->db->where_in('id_cara_bayar', $postData->cara_bayar[0]);                            

        if(isset($postData->tagihan_from) && isset($postData->tagihan_to))
            if(($postData->tagihan_from[0] !== '') && ($postData->tagihan_to[0] !== ''))
                $this->db->having("total_tagihan BETWEEN ". $postData->tagihan_from[0] ." AND " .$postData->tagihan_to[0] ."");                                            

            $this->db->group_end();                       
        
        $query = $this->db->get_compiled_select('register_pasien');
        $q = "SELECT id, COALESCE(total, 0) total
        , COALESCE(harga_layanan, 0) harga_layanan
        , COALESCE(harga_obat, 0) harga_obat
        , COALESCE(harga_tambahan, 0) harga_tambahan
        , COALESCE(total_diskon, 0) total_diskon
        , COALESCE(total_pajak, 0) total_pajak
        , COALESCE(total_tagihan, 0) total_tagihan FROM (
            SELECT a.id
            FROM (
                SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY AS id
                FROM (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as a
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as b
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as c
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as d
            ) a
            WHERE a.id BETWEEN '". dateFormatDb($data['tanggal_pendaftaran_from']) ."' AND '". dateFormatDb($data['tanggal_pendaftaran_to']) ."'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(*) AS total, SUM(harga_layanan) harga_layanan, SUM(harga_obat) harga_obat, SUM(harga_tambahan) harga_tambahan, SUM(total_diskon) total_diskon, SUM(total_pajak) total_pajak, SUM(total_tagihan) total_tagihan FROM (
                " .$query. "
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;";

        $final_query = $this->db->query("SELECT id, COALESCE(total, 0) total
        , COALESCE(harga_layanan, 0) harga_layanan
        , COALESCE(harga_obat, 0) harga_obat
        , COALESCE(harga_tambahan, 0) harga_tambahan
        , COALESCE(total_diskon, 0) total_diskon
        , COALESCE(total_pajak, 0) total_pajak
        , COALESCE(total_tagihan, 0) total_tagihan FROM (
            SELECT a.id
            FROM (
                SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY AS id
                FROM (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as a
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as b
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as c
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as d
            ) a
            WHERE a.id BETWEEN '". dateFormatDb($data['tanggal_pendaftaran_from']) ."' AND '". dateFormatDb($data['tanggal_pendaftaran_to']) ."'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(*) AS total, SUM(harga_layanan) harga_layanan, SUM(harga_obat) harga_obat, SUM(harga_tambahan) harga_tambahan, SUM(total_diskon) total_diskon, SUM(total_pajak) total_pajak, SUM(total_tagihan) total_tagihan FROM (
                " .$query. "
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;");
        $result = $final_query->result();
        $result2 = $this->db->query(
            "SELECT * FROM (
                " .$query. "
                )t WHERE tanggal BETWEEN '" . dateFormatDb($data['tanggal_pendaftaran_from']) . "' AND '". dateFormatDb($data['tanggal_pendaftaran_to']) ."'"
            )->result();
        header('Content-Type: application/json');
        echo json_encode(["chart" => $result, "table" => $result2]);	        
    }


	public function getDataPenjualanApotek()
	{
        $this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;                
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $data = [];
        if(isset($postData->tanggal_transaksi)){
            if($postData->tanggal_transaksi[0] !== ''){
                $tanggal = explode(' - ', $postData->tanggal_transaksi[0]);    
                $data['tanggal_transaksi_from'] = $tanggal[0];
                $data['tanggal_transaksi_to'] = $tanggal[1];                
            }
        }

        $this->db->select("transaksi_obat.id, DATE(transaksi_obat.tanggal_bayar) tanggal, GROUP_CONCAT(DISTINCT nama_obat) nama_obat, SUM(transaksi_obat_detail.harga * transaksi_obat_detail.jumlah) harga_obat, transaksi_obat.keterangan");
        $this->db->join('transaksi_obat_detail', 'transaksi_obat_detail.id_transaksi_obat = transaksi_obat.id', 'LEFT');                                
        $this->db->join('obat', 'obat.id = transaksi_obat_detail.id_obat', 'LEFT');                                        
        $this->db->group_by("transaksi_obat.id, DATE(transaksi_obat.tanggal_bayar)");         
        $this->db->group_start(); 
                
        $this->db->where(['transaksi_obat.id_klinik' => $id_klinik, 'transaksi_obat.is_deleted' => 0, 'transaksi_obat.state_index' => 1]);  

        if(isset($postData->keterangan))
            $this->db->like('transaksi_obat.keterangan', $postData->keterangan[0]);            
        
        if(isset($postData->nama_obat)){
            if($postData->nama_obat[0] !== ''){
                $nama_obat = explode(',', $postData->nama_obat[0]);
                $this->db->where_in('nama_obat', $nama_obat);
            }        
        }


        if(isset($postData->obat_from) && isset($postData->obat_to)){
            if(($postData->obat_from[0] !== '') && ($postData->obat_to[0] !== ''))
                $this->db->having("harga_obat BETWEEN ". $postData->obat_from[0] ." AND " .$postData->obat_to[0] ."");                                       
        }


        $this->db->group_end();                       
        
        $query = $this->db->get_compiled_select('transaksi_obat');
        $final_query = $this->db->query("SELECT UNIX_TIMESTAMP(id) * 1000 id, COALESCE(total, 0) total
        , COALESCE(harga_obat, 0) harga_obat FROM (
            SELECT a.id
            FROM (
                SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY AS id
                FROM (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as a
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as b
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as c
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as d
            ) a
            WHERE a.id BETWEEN '". dateFormatDb($data['tanggal_transaksi_from']) ."' AND '". dateFormatDb($data['tanggal_transaksi_to']) ."'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(*) AS total, SUM(harga_obat) harga_obat FROM (
                " .$query. "
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;");
        $result = $final_query->result();
        $result2 = $this->db->query(
            "SELECT * FROM (
                " .$query. "
                )t WHERE tanggal BETWEEN '" . dateFormatDb($data['tanggal_transaksi_from']) . "' AND '". dateFormatDb($data['tanggal_transaksi_to']) ."'"
            )->result();
        header('Content-Type: application/json');
        echo json_encode(["chart" => $result, "table" => $result2]);	                
    }    

	public function getData()
	{
        $this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;                
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);   
        
        $this->db->select("register_pasien.id, register_pasien.tanggal_periksa, GROUP_CONCAT(icd9_name) icd9_name, GROUP_CONCAT(icd10_name) icd10_name, GROUP_CONCAT(nama_tambahan) tambahan_name, SUM(register_pasien_layanan.harga * register_pasien_layanan.jumlah) harga_layanan, SUM(register_pasien_obat.harga * register_pasien_obat.jumlah) harga_obat, SUM(register_pasien_tambahan.harga * register_pasien_tambahan.jumlah) harga_tambahan, SUM(total_diskon) total_diskon
        , SUM(total_pajak) total_pajak
        , SUM(total_tagihan) total_tagihan");
        $this->db->join('pasien', 'pasien.id = register_pasien.id_pasien');        
        $this->db->join('register_pasien_icd9', 'register_pasien_icd9.id_register_pasien = register_pasien.id', 'LEFT');                
        $this->db->join('icd9', 'icd9.id = register_pasien_icd9.id_icd9', 'LEFT');                
        $this->db->join('register_pasien_icd10', 'register_pasien_icd10.id_register_pasien = register_pasien.id', 'LEFT');                        
        $this->db->join('icd10', 'icd10.id = register_pasien_icd10.id_icd10', 'LEFT');                
        $this->db->join('register_pasien_layanan', 'register_pasien_layanan.id_register_pasien = register_pasien.id', 'LEFT');                        
        $this->db->join('register_pasien_obat', 'register_pasien_obat.id_register_pasien = register_pasien.id', 'LEFT');                                
        $this->db->join('obat', 'obat.id = register_pasien_obat.id_obat', 'LEFT');                                        
        $this->db->join('register_pasien_tambahan', 'register_pasien.id = register_pasien_tambahan.id_register_pasien', 'LEFT');                                                
        $this->db->join('register_pasien_pembayaran', 'register_pasien.id = register_pasien_pembayaran.id_register_pasien', 'LEFT');                                                        
        $this->db->group_by("register_pasien.id, register_pasien.tanggal_periksa");         
        $this->db->group_start(); 
                
        $this->db->where(['register_pasien.id_klinik' => $id_klinik, 'register_pasien.is_deleted' => 0]);  

        if(isset($postData->rm_from) && isset($postData->rm_to)){
            if(($postData->rm_from[0] !== '') && ($postData->rm_to[0] !== '')){
                if($postData->rm_from[0] < $postData->rm_to[0]){
                    $rm = array_map(function ($i){
                        return $i;
                    }, range($postData->rm_from[0], $postData->rm_to[0]));
                    $this->db->where_in('no_rm', $rm);                
                }
            }
        }
        
        if(isset($postData->nama_pasien))
            $this->db->like('nama_pasien', $postData->nama_pasien[0]);
        
        if(isset($postData->no_telp))
            $this->db->like('no_telp', $postData->no_telp[0]);            

        if(isset($postData->tempat_lahir))
            $this->db->like('tempat_lahir', $postData->tempat_lahir[0]);

        if(isset($postData->golongan_darah))
            $this->db->where_in('golongan_darah', $postData->golongan_darah);

        if(isset($postData->jenis_kelamin))
            $this->db->where_in('jenis_kelamin', $postData->jenis_kelamin);

        if(isset($postData->pekerjaan))
            $this->db->where_in('pekerjaan', $postData->pekerjaan);

        if(isset($postData->agama))
            $this->db->where_in('agama', $postData->agama);

        if(isset($postData->unit_layanan))
            if($postData->unit_layanan[0] !== '')        
                $this->db->where_in('id_unit_layanan', $postData->unit_layanan);

        if(isset($postData->dokter))
            if($postData->dokter[0] !== '')                        
                $this->db->where_in('id_dokter', $postData->dokter);

        if(isset($postData->tipe_pasien))
            if($postData->tipe_pasien[0] !== '')        
                $this->db->where_in('id_tipe_pasien', $postData->tipe_pasien);

        if(isset($postData->diagnosis))
            $this->db->like('diagnosa', $postData->diagnosis[0]);

        if(isset($postData->icd9))
            $this->db->having("icd9_name LIKE '%".$postData->icd9[0]."%' ESCAPE '!'");                

        if(isset($postData->icd10))
            $this->db->having("icd10_name LIKE '%".$postData->icd10[0]."%' ESCAPE '!'");        

        if(isset($postData->layanan))
            if($postData->layanan[0] !== '')                
                $this->db->where_in('id_layanan', $postData->layanan[0]);            

        if(isset($postData->layanan_from) && isset($postData->layanan_to))
            if(($postData->layanan_from[0] !== '') && ($postData->layanan_to[0] !== ''))
                $this->db->having("harga_layanan BETWEEN ". $postData->layanan_from[0] ." AND " .$postData->layanan_to[0] ."");
        
        if(isset($postData->nama_obat))
            if($postData->nama_obat[0] !== ''){
                $nama_obat = explode(',', $postData->nama_obat[0]);
                $this->db->where_in('nama_obat', $nama_obat);                
            }        

        if(isset($postData->obat_from) && isset($postData->obat_to))
            if(($postData->obat_from[0] !== '') && ($postData->obat_to[0] !== ''))
                $this->db->having("harga_obat BETWEEN ". $postData->obat_from[0] ." AND " .$postData->obat_to[0] ."");

        if(isset($postData->rincian_tambahan))
            $this->db->having("tambahan_name LIKE '%".$postData->rincian_tambahan[0]."%' ESCAPE '!'");

        if(isset($postData->tambahan_from) && isset($postData->tambahan_to))
            if(($postData->tambahan_from[0] !== '') && ($postData->tambahan_to[0] !== ''))
                $this->db->having("harga_tambahan BETWEEN ". $postData->tambahan_from[0] ." AND " .$postData->tambahan_to[0] ."");            

        if(isset($postData->diskon_from) && isset($postData->diskon_to))
            if(($postData->diskon_from[0] !== '') && ($postData->diskon_to[0] !== ''))
                $this->db->having("total_diskon BETWEEN ". $postData->diskon_from[0] ." AND " .$postData->diskon_to[0] ."");                            

        if(isset($postData->pajak_from) && isset($postData->pajak_to))
            if(($postData->pajak_from[0] !== '') && ($postData->pajak_to[0] !== ''))
                $this->db->having("total_pajak BETWEEN ". $postData->pajak_from[0] ." AND " .$postData->pajak_to[0] ."");                                            

        if(isset($postData->cara_bayar))
            if($postData->cara_bayar[0] !== '')                
                $this->db->where_in('id_cara_bayar', $postData->cara_bayar[0]);                            

        if(isset($postData->tagihan_from) && isset($postData->tagihan_to))
            if(($postData->tagihan_from[0] !== '') && ($postData->tagihan_to[0] !== ''))
                $this->db->having("total_pajak BETWEEN ". $postData->tagihan_from[0] ." AND " .$postData->tagihan_to[0] ."");                                            

            $this->db->group_end();                       
        
        $query = $this->db->get_compiled_select('register_pasien');
        $final_query = $this->db->query("SELECT id, COALESCE(total, 0) total
        FROM 
        helper_date
        LEFT JOIN (
            SELECT tanggal_periksa, COUNT(*) as total FROM (
                " .$query. "
            )t GROUP BY tanggal_periksa
        )t ON t.`tanggal_periksa` = STR_TO_DATE(CONCAT('". $postData->periode[0] ."','-', helper_date.id), '%Y-%m-%e')");
        $result = $final_query->result();
        header('Content-Type: application/json');
		echo json_encode($result);	        
    }
    
	public function getDataStok()
	{
        $this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;                
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);   
        $filter_tanggal = "expired_date";
        $data = [];
        if(isset($postData->tanggal)){
            if($postData->tanggal[0] !== ''){
                $tanggal = explode(' - ', $postData->tanggal[0]);    
                $data['tanggal_from'] = $tanggal[0];
                $data['tanggal_to'] = $tanggal[1];                
            }
        }

        if(isset($postData->pilih_tanggal)){
            if($postData->pilih_tanggal[0] !== ''){
                $filter_tanggal = $postData->pilih_tanggal[0];
            }
        }        

        $this->db->select("pemesanan.id id_po, pemesanan.no_po, supplier.nama_supplier, penerimaan.id id_faktur, penerimaan.no_faktur, obat.id id_obat, obat.nama_obat, $filter_tanggal tanggal, obat_stok.stok_opname, obat_stok.stok_gudang");
        $this->db->join('obat', 'obat.id = obat_stok.id_obat');        
        $this->db->join('penerimaan', 'penerimaan.id = obat_stok.id_faktur');                
        $this->db->join('pemesanan', 'pemesanan.id = penerimaan.id_po');                        
        $this->db->join('supplier', 'pemesanan.id_supplier = supplier.id');                                
        //$this->db->group_by("pemesanan.id, penerimaan.id, obat.id, $filter_tanggal");                 
        $this->db->group_start(); 
                
        $this->db->where(['obat.id_klinik' => $id_klinik, 'obat.is_deleted' => 0, 'obat_stok.is_deleted' => 0, 'penerimaan.is_deleted' => 0, 'pemesanan.is_deleted' => 0]);  

        if(isset($postData->nama_obat)){
            if($postData->nama_obat[0] !== ''){
                $nama_obat = explode(',', $postData->nama_obat[0]);
                $this->db->where_in('nama_obat', $nama_obat);                
            }        
        }

        if(isset($postData->no_po))
            $this->db->like('no_po', $postData->no_po[0]);

        if(isset($postData->no_faktur))
            $this->db->like('no_faktur', $postData->no_faktur[0]);
        
        if (isset($postData->opname_from) && isset($postData->opname_to))
            if (($postData->opname_from[0] !== '') && ($postData->opname_to[0] !== ''))
                $this->db->where("stok_opname BETWEEN " . str_pad($postData->opname_from[0], 2, STR_PAD_LEFT) . " AND " . $postData->opname_to[0] . "");
            
        if (isset($postData->gudang_from) && isset($postData->gudang_to))
            if (($postData->gudang_from[0] !== '') && ($postData->gudang_to[0] !== ''))
                $this->db->where("stok_gudang BETWEEN  " . str_pad($postData->gudang_from[0], 2, STR_PAD_LEFT) . " AND " . $postData->gudang_to[0] . "");                            
        
        $this->db->group_end();                       
        
        $query = $this->db->get_compiled_select('obat_stok');
        $s = "SELECT h.id, COALESCE(total, 0) total FROM (
            SELECT a.id
            FROM (
                SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY AS id
                FROM (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as a
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as b
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as c
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as d
            ) a
            WHERE a.id BETWEEN '". dateFormatDb($data['tanggal_from']) ."' AND '". dateFormatDb($data['tanggal_to']) ."'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(*) AS total FROM (
                " .$query. "
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;";
        $final_query = $this->db->query("SELECT UNIX_TIMESTAMP(h.id) * 1000 id, COALESCE(total, 0) total FROM (
            SELECT a.id
            FROM (
                SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY AS id
                FROM (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as a
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as b
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as c
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as d
            ) a
            WHERE a.id BETWEEN '". dateFormatDb($data['tanggal_from']) ."' AND '". dateFormatDb($data['tanggal_to']) ."'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(*) AS total FROM (
                " .$query. "
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;");
        $result = $final_query->result();
        $result2 = $this->db->query(
            "SELECT * FROM (
                " .$query. "
                )t WHERE tanggal BETWEEN '" . dateFormatDb($data['tanggal_from']) . "' AND '". dateFormatDb($data['tanggal_to']) ."'"
            )->result();
        header('Content-Type: application/json');
        echo json_encode(["chart" => $result, "table" => $result2]);	                        
    }
    
	public function getDataJurnal()
	{
        $this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;                
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $data = [];

        $sum_debit_t = " ";
        $sum_kredit_t = " ";
        $nama_t = " ";
        $kode_akun_t = " ";
        $tanggal_t = " ";

        if(isset($postData->tanggal_transaksi)){
            if($postData->tanggal_transaksi[0] !== ''){
                $tanggal = explode(' - ', $postData->tanggal_transaksi[0]);    
                $data['tanggal_transaksi_from'] = $tanggal[0];
                $data['tanggal_transaksi_to'] = $tanggal[1];                
                $tanggal_t = " AND tanggal BETWEEN '" . dateFormatDb($tanggal[0]) . "' AND '". dateFormatDb($tanggal[1]) ."'";                     
            }
        }

        $this->db->select("v_jurnal.id_jurnal_header, DATE(tanggal) tanggal, nama, GROUP_CONCAT(DISTINCT kode_akun SEPARATOR '<br />') kode_akun, GROUP_CONCAT(DISTINCT nama_akun SEPARATOR '<br />') nama_akun, SUM(debit) debit, SUM(kredit) kredit");                             
        $this->db->group_by("v_jurnal.id_jurnal_header");                         
        $this->db->group_start(); 
                
        $this->db->where(['v_jurnal.id_klinik' => $id_klinik, 'v_jurnal.is_deleted' => 0]);  

        if(isset($postData->uraian)){
            $this->db->like('nama', $postData->uraian[0]);                        
            $nama_t = " AND  `nama` LIKE '%" . $postData->uraian[0] . "%' ESCAPE '!'";            
        }

        
        if(isset($postData->kode_akun)){
            if($postData->kode_akun[0] !== ''){
                $kode_akun = explode(',', $postData->kode_akun[0]);
                $this->db->where_in("CONCAT(kode_akun, ' - ', nama_akun)", $kode_akun);
                $kode_akun_t = " AND CONCAT(kode_akun, ' - ', nama_akun) IN ('" .implode("','", $kode_akun). "')";

            }        
        }


        if(isset($postData->debit_from) && isset($postData->debit_to)){
            if(($postData->debit_from[0] !== '') && ($postData->debit_to[0] !== '')){
                $this->db->having("debit BETWEEN ". str_pad($postData->debit_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->debit_to[0] ."");                                                       
                $sum_debit_t = " AND total_debit BETWEEN " . str_pad($postData->debit_from[0], 2, STR_PAD_LEFT) . " AND " .$postData->debit_to[0] ."";                
            }
        }


        if(isset($postData->kredit_from) && isset($postData->kredit_to)){
            if(($postData->kredit_from[0] !== '') && ($postData->kredit_to[0] !== '')){
                $this->db->having("kredit BETWEEN ". str_pad($postData->kredit_from[0], 2, STR_PAD_LEFT) ." AND " .$postData->kredit_to[0] ."");                                       
                $sum_kredit_t = " AND total_kredit BETWEEN " . str_pad($postData->kredit_from[0], 2, STR_PAD_LEFT) . " AND " .$postData->kredit_to[0] ."";                                
            }

        }        

        $this->db->group_end();       
        


        $query_table = "SELECT 
        id_jurnal_header
        , tanggal
        , nama
        , kode_akun
        , nama_akun
        , debit
        , kredit
        , debit_display
        , kredit_display
        , (
        SELECT SUM(debit)
        FROM v_jurnal v
        WHERE v.id_jurnal_header = v_jurnal.id_jurnal_header
        $kode_akun_t        
        ) AS total_debit
        , (
        SELECT SUM(kredit)
        FROM v_jurnal v
        WHERE v.id_jurnal_header = v_jurnal.id_jurnal_header
        $kode_akun_t        
        ) AS total_kredit
        FROM v_jurnal
        WHERE 1=1
        $nama_t
        $kode_akun_t
        $tanggal_t        
        AND id_klinik = $id_klinik AND is_deleted = 0
        HAVING 1=1        
        $sum_debit_t
        $sum_kredit_t
        ORDER BY 
        tanggal DESC
        , id_jurnal_header DESC
        , debit DESC
        , kredit DESC;";        
        
        $query = $this->db->get_compiled_select('v_jurnal');
        $final_query = $this->db->query("SELECT UNIX_TIMESTAMP(id) id, COALESCE(total, 0) total
        , COALESCE(total_debit, 0) total_debit 
        , COALESCE(total_kredit, 0) total_kredit         
        FROM (
            SELECT a.id
            FROM (
                SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY AS id
                FROM (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as a
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as b
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as c
                CROSS JOIN (SELECT 0 as a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) as d
            ) a
            WHERE a.id BETWEEN '". dateFormatDb($data['tanggal_transaksi_from']) ."' AND '". dateFormatDb($data['tanggal_transaksi_to']) ."'
        )h
        LEFT JOIN ( 
            SELECT tanggal, COUNT(DISTINCT id_jurnal_header) AS total, SUM(debit) total_debit, SUM(kredit) total_kredit FROM (
                " .$query. "
            )t 
            GROUP BY tanggal 
        )t ON t.tanggal = h.id ORDER BY h.id ASC;");
        $result = $final_query->result();
        $result2 = $this->db->query($query_table)->result();
        header('Content-Type: application/json');
        echo json_encode(["chart" => $result, "table" => $result2]);	                
    }      
}
