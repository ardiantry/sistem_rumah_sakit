<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    function __construct()
	{
		parent::__construct();
    }

    public function get(){
        $user = $this->ion_auth->user()->row();
        $query = $this->db->get_where('v_register_privilege', array('id_user'=> $user->user_id));
        $menuPrivilege = $query->result();                
        $menu = $this->master();


        foreach($menuPrivilege as $key => $value){
            if($value->privilege_status == "0"){                
                unset($menu[$value->id_menu]);
            }
        }

		if (! $this->ion_auth->is_admin()) 
		{
            unset($menu[11]);
        }        

        $group_admin = array('super_admin_klinik', 'administrator_klinik');    

		if ((! $this->ion_auth->is_admin()) && (! $this->ion_auth->in_group($group_admin)))
		{
            unset($menu[10]);
        }        

		if ($this->ion_auth->in_group("owner"))
		{
            $menu[0] = array("id" => "menu_D4", "menu_name" => "Dasbor", "navigate_url" => "Dashboard/d4", "icon" => "fa-tachometer-alt");
		}                                

		if ($this->ion_auth->in_group("super_admin_klinik"))
		{
            $menu[0] = array("id" => "menu_D1", "menu_name" => "Dasbor", "navigate_url" => "Dashboard/d1", "icon" => "fa-tachometer-alt");
		}                        

		if ($this->ion_auth->in_group("administrator_klinik"))
		{
            $menu[0] = array("id" => "menu_D2", "menu_name" => "Dasbor", "navigate_url" => "Dashboard/d2", "icon" => "fa-tachometer-alt");
		}                

		if ($this->ion_auth->in_group("operator_klinik"))
		{
            $menu[0] = array("id" => "menu_D3", "menu_name" => "Dasbor", "navigate_url" => "Dashboard/d3", "icon" => "fa-tachometer-alt");
		}        
        return $menu;
    }

    public function getById($id){
        $user = $this->ion_auth->user()->row();
        $query = $this->db->get_where('v_register_privilege', array('id_user'=> $user->user_id, 'id_menu' => $id));
        return $query->row();                
    }    

    public function master(){
        $menu[0] = array("id" => "menu_ParentDashboard", "menu_name" => "Dasbor", "navigate_url" => "#", "icon" => "fa-tachometer-alt", "child" =>
        array(
            array("id" => "menu_D4", "menu_name" => "Dasbor Owner", "navigate_url" => "Dashboard/d4", "icon" => ""),                        
            array("id" => "menu_D1", "menu_name" => "Dasbor Super Admin Klinik", "navigate_url" => "Dashboard/d1", "icon" => ""),
            array("id" => "menu_D2", "menu_name" => "Dasbor Admin Klinik", "navigate_url" => "Dashboard/d2", "icon" => ""),
            array("id" => "menu_D3", "menu_name" => "Dasbor Operator", "navigate_url" => "Dashboard/d3", "icon" => ""),
        ),);

        $menu[1] = array("id" => "menu_Pendaftaran", "menu_name" => "Pendaftaran", "navigate_url" => "#", "icon" => "fa-clipboard-list", "child" =>
			array(
				array("id" => "menu_RawatJalan", "menu_name" => "Rawat Jalan", "navigate_url" => "RawatJalan", "icon" => ""),                        
				array("id" => "menu_RI_Admisi", "menu_name" => "Rawat Inap", "navigate_url" => "RawatInap/admisi", "icon" => ""),
			)		
		);
		
        $menu[2] = array("id" => "menu_PemeriksaanH", "menu_name" => "Pemeriksaan", "navigate_url" => "#", "icon" => "fa-clipboard-check", "child" =>
			array(
				array("id" => "menu_Pemeriksaan", "menu_name" => "Rawat Jalan", "navigate_url" => "RawatJalan/pemeriksaan", "icon" => ""),                        
				array("id" => "menu_RI_Observation", "menu_name" => "Rawat Inap", "navigate_url" => "RawatInap/observasi", "icon" => ""),
			)			
		);
		
        $menu[3] = array("id" => "menu_ParentApotek", "menu_name" => "Apotek", "navigate_url" => "#", "icon" => "fa-pills", "child" =>
        array(
            array("id" => "menu_Apotek", "menu_name" => "Tebus Obat Rawat Jalan", "navigate_url" => "RawatJalan/apotek", "icon" => ""),
            array("id" => "menu_RI_Apotek", "menu_name" => "Tebus Obat Rawat Inap", "navigate_url" => "RawatInap/apotek", "icon" => ""),            
            array("id" => "menu_ResepLuar", "menu_name" => "Resep Luar", "navigate_url" => "ResepLuar", "icon" => ""),
            array("id" => "menu_Pembelian", "menu_name" => "Pembelian Obat", "navigate_url" => "Pembelian", "icon" => ""),
            array("id" => "menu_Penerimaan", "menu_name" => "Penerimaan Obat", "navigate_url" => "Pembelian/penerimaan", "icon" => ""),            
            array("id" => "menu_StokOpname", "menu_name" => "Stok Opname", "navigate_url" => "Stok", "icon" => "")
        ));

        $menu[4] = array("id" => "menu_ParentPembayaran", "menu_name" => "Pembayaran", "navigate_url" => "#", "icon" => "fa-money-check", "child" =>
        array(
            array("id" => "menu_Pembayaran", "menu_name" => "Rawat Jalan", "navigate_url" => "RawatJalan/pembayaran", "icon" => ""),
            array("id" => "menu_RI_Pembayaran", "menu_name" => "Rawat Inap", "navigate_url" => "RawatInap/pembayaran", "icon" => ""),                        			
            array("id" => "menu_PembayaranResepLuar", "menu_name" => "Resep Luar", "navigate_url" => "ResepLuar/pembayaran", "icon" => ""),
            array("id" => "menu_PembayaranObat", "menu_name" => "Pembayaran Obat", "navigate_url" => "Pembelian/pembayaran", "icon" => ""),
            array("id" => "menu_PembayaranHutangSupplier", "menu_name" => "Hutang Supplier", "navigate_url" => "Hutang", "icon" => ""),                        
            array("id" => "menu_TransaksiLain", "menu_name" => "Transaksi Lainnya", "navigate_url" => "TransaksiLain", "icon" => "")
        ));

        $menu[5] = array("id" => "menu_Pembukuan", "menu_name" => "Pembukuan", "navigate_url" => "#", "icon" => "fa-book", "child" =>
        array(
            array("id" => "menu_JurnalUmum", "menu_name" => "Jurnal Umum", "navigate_url" => "Pembukuan/jurnal", "icon" => ""),
            array("id" => "menu_Neraca", "menu_name" => "Neraca", "navigate_url" => "Pembukuan/neraca", "icon" => ""),
            array("id" => "menu_RugiLaba", "menu_name" => "Rugi Laba", "navigate_url" => "Pembukuan/rugilaba", "icon" => ""),
            array("id" => "menu_ArusKas", "menu_name" => "Arus Kas", "navigate_url" => "Pembukuan/aruskas", "icon" => "")
        ));

        $menu[6] = array("id" => "menu_Laboratory", "menu_name" => "Laboratorium", "navigate_url" => "#", "icon" => "fa-users-cog", "child" =>
        array(
            array("id" => "menu_LAB_Admisi", "menu_name" => "Pendaftaran", "navigate_url" => "Laboratory/admisi", "icon" => ""),
            array("id" => "menu_LAB_Observation", "menu_name" => "Pemeriksaan", "navigate_url" => "Laboratory/observasi", "icon" => "")
        ));    
        $menu[7] = array("id" => "menu_Radiology", "menu_name" => "Radiologi", "navigate_url" => "#", "icon" => "fa-users-cog", "child" =>
        array(
            array("id" => "menu_RAD_Admisi", "menu_name" => "Pendaftaran", "navigate_url" => "Radiology/admisi", "icon" => ""),
            array("id" => "menu_RAD_Observation", "menu_name" => "Pemeriksaan", "navigate_url" => "Radiology/observasi", "icon" => "")
        ));                           
		
        $menu[8] = array("id" => "menu_RekamMedik", "menu_name" => "Rekam Medik", "navigate_url" => "Pasien/rekam_medik", "icon" => "fa-user-md");

        $menu[9] = array("id" => "menu_Laporan", "menu_name" => "Laporan", "navigate_url" => "#", "icon" => "fa-chart-line", "child" =>
        array(
            array("id" => "menu_LaporanLayanan", "menu_name" => "Laporan Layanan", "navigate_url" => "LaporanNew/rawat_jalan", "icon" => ""),            
            array("id" => "menu_LaporanPenjualanApotek", "menu_name" => "Laporan Penjualan Apotek", "navigate_url" => "LaporanNew/penjualan_apotek", "icon" => ""),                        
            array("id" => "menu_LaporanStok", "menu_name" => "Laporan Stok Apotek", "navigate_url" => "Laporan/stok", "icon" => ""),            
            array("id" => "menu_LaporanReminder", "menu_name" => "Laporan Reminder", "navigate_url" => "Laporan/reminder", "icon" => ""),                                             
            array("id" => "menu_LaporanJurnal", "menu_name" => "Laporan Jurnal", "navigate_url" => "Laporan/jurnal", "icon" => ""),                        
            array("id" => "menu_LaporanNeraca", "menu_name" => "Laporan Neraca", "navigate_url" => "Laporan/neraca", "icon" => ""),                        
            array("id" => "menu_LaporanRugiLaba", "menu_name" => "Laporan Rugi Laba", "navigate_url" => "Laporan/rugilaba", "icon" => ""),   
            array("id" => "menu_LaporanAruskas", "menu_name" => "Laporan Arus Kas", "navigate_url" => "Laporan/aruskas", "icon" => ""),            
        ));
        $menu[10] = array("id" => "afiliasi", "menu_name" => "Afiliasi", "navigate_url" => "#", "icon" => "fa fa-link",'child'=>
            array(
            array("id" => "program_afiliasi", "menu_name" => "Program Afiliasi", "navigate_url" => "Afiliasi/ProgramAfiliasi", "icon" => ""),
            array("id" => "Komisi", "menu_name" => "Komisi", "navigate_url" => "Afiliasi/Komisi", "icon" => ""),                                    
            ) 
            );  

        $menu[11] = array("id" => "menu_Pengaturan", "menu_name" => "Pengaturan", "navigate_url" => "#", "icon" => "fa-cogs", "child" =>
        array(
            array("id" => "menu_User", "menu_name" => "User & Hak Akses", "navigate_url" => "User", "icon" => ""),
            array("id" => "menu_MasterData", "menu_name" => "Master Data", "navigate_url" => "MasterData/pekerjaan", "icon" => ""),
            array("id" => "menu_Organisasi", "menu_name" => "Organisasi IHS", "navigate_url" => "SatuSehat/organization", "icon" => ""),                        
            array("id" => "menu_Lokasi", "menu_name" => "Lokasi IHS", "navigate_url" => "SatuSehat/location", "icon" => "")                                    
        ));
        //$menu[12] = array("id" => "generate_Link", "menu_name" => "Link Appointment", "navigate_url" => "#", "icon" => "fa fa-link");  

        $menu[12] = array("id" => "menu_ControlPanel", "menu_name" => "Control Panel", "navigate_url" => "#", "icon" => "fa-users-cog", "child" =>
        array(
            array("id" => "menu_Owner", "menu_name" => "Owner", "navigate_url" => "ControlPanel/owner", "icon" => ""),
            array("id" => "menu_Klinik", "menu_name" => "Klinik", "navigate_url" => "ControlPanel/klinik", "icon" => ""),
            array("id" => "menu_Klinik", "menu_name" => "New registrar", "navigate_url" => "ControlPanel/Newregistrar", "icon" => ""),

        ));          
        return $menu;
    }       
}