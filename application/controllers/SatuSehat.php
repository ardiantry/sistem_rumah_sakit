<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SatuSehat extends MY_Controller {

	private $configurations = [];
	private $org;

	function __construct()
	{
        parent::__construct();
		require_once APPPATH . 'libraries/SatuSehatService.php';
		$this->load->model('Owner_model');                        				        
        $this->load->model('Klinik_model');   
        $this->load->model('Organization_model');   
		$this->_init();
	}
	
	private function _init()
	{        
		$data['menu'] = $this->Menu_model->get();	
		$this->load->section('sidebar', 'template/sidebar', $data);		

		$this->output->set_template('adminLTE');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css');
		$this->load->css('https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css');
        $this->load->css('https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css');                
        $this->load->css('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/css/dataTables.checkboxes.css');                                
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css');						
		$this->load->css('assets/themes/adminLTE/dist/css/wizard.css');

		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
        $this->load->js('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/js/dataTables.checkboxes.min.js');                                                
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
		$this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');		
		$this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');	   
		$this->load->js('https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js');	   		               			
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js');	   		               									
        $this->load->js('assets/js/helper.20211205.js');		
        $this->load->js('assets/js/satu.sehat.js');		        

        $id_klinik = $this->ion_auth->user()->row()->id_klinik;		
		$this->org = $this->Organization_model->getMainOrg($id_klinik);
		if($this->org != NULL){
			$this->configurations = [
				'client_id' => $this->org->client_id,
				'client_secret' => $this->org->client_secret,
			];		
		}	
    }	
	
	public function organization(){
		$data['page_title'] = "Organisasi";
		$data['page_menu'] = "Organisasi";        				
		$this->load->view('satu_sehat/organization', $data);
    }

	public function location(){
		$data['page_title'] = "Lokasi";
		$data['page_menu'] = "Lokasi";        				
		$this->load->view('satu_sehat/location', $data);
    }	

	public function org_get_part_of(){		
		$this->output->unset_template();
		if($this->org == NULL){
			header('Content-Type: application/json');
			echo json_encode(['data' => []]);
			die();			
		}
		$satuSehatService = new SatuSehatService($this->configurations);				
		$response = $satuSehatService->get('Organization/?partof='.$this->org->organization_id);
		$org_ihs = json_decode($response);
		foreach($org_ihs->body->entry as $org){
			$data[] = [
				'id' => $org->resource->id,
				'name' => $org->resource->name,
				'type_display' => $org->resource->type[0]->coding[0]->display,
				'type_code' => $org->resource->type[0]->coding[0]->code,
			];
		}
		header('Content-Type: application/json');
		echo json_encode(['data' => $data]);
    }	

	public function loc_get_part_of(){
		$this->output->unset_template();	
		if($this->org == NULL){
			header('Content-Type: application/json');
			echo json_encode(['data' => []]);
			die();			
		}			
		$satuSehatService = new SatuSehatService($this->configurations);	
		$response = $satuSehatService->get('Location');
		$loc_ihs = json_decode($response);
		$data = [];
		foreach($loc_ihs->body->entry as $loc){		
			$data[] = [
				'id' => $loc->resource->id,
				'code' => $loc->resource->identifier[0]->value,
				'name' => $loc->resource->name,				
				'description' => $loc->resource->description,								
				'status' => $loc->resource->status,								
				'type_display' => $loc->resource->physicalType->coding[0]->display,
				'type_code' => $loc->resource->physicalType->coding[0]->code,
			];
		}
		header('Content-Type: application/json');
		echo json_encode(['data' => $data]);
    }	

	public function get_pasien($ktp){
		$this->output->unset_template();			
		if($this->org == NULL){
			header('Content-Type: application/json');
			echo json_encode(['data' => []]);
			die();
		}		
		$satuSehatService = new SatuSehatService($this->configurations);	
		$response = $satuSehatService->get('Patient?identifier=https://fhir.kemkes.go.id/id/nik|'.$ktp);
		$pasien_ihs = json_decode($response);	
		$data = [];
		if($pasien_ihs->code === 500){
			header('Content-Type: application/json');
			echo json_encode(['data' => $data]);			
			die();
		}		

		// if($pasien_ihs->body->total > 0){
		// 	foreach($pasien_ihs->body->entry as $p){
		// 		$data = [
		// 			'id' => $p->resource->id,
		// 			//'name' => $p->resource->name[0]->text,
		// 			'name' => "",
		// 			//'gender' => $p->resource->gender,
		// 			'gender' => "",
		// 		];
		// 	}
		// }
		header('Content-Type: application/json');
		echo json_encode(['data' => $pasien_ihs->body]);
    }		

	public function get_dokter($ktp){
		$this->output->unset_template();			
		if($this->org == NULL){
			header('Content-Type: application/json');
			echo json_encode(['data' => []]);
			die();			
		}		
		$satuSehatService = new SatuSehatService($this->configurations);	
		$response = $satuSehatService->get('Practitioner?identifier=https://fhir.kemkes.go.id/id/nik|'.$ktp);
		$pasien_ihs = json_decode($response);	
		$data = [];
		if($pasien_ihs->code === 500){
			header('Content-Type: application/json');
			echo json_encode(['data' => $data]);			
			die();
		}		
		if($pasien_ihs->body->total > 0){
			foreach($pasien_ihs->body->entry as $p){
				$data = [
					'id' => $p->resource->id,
					'name' => $p->resource->name[0]->text,
					'gender' => $p->resource->gender,
				];
			}
		}
		header('Content-Type: application/json');
		echo json_encode(['data' => $data]);
    }	

	public function post_rawat_jalan(){
		$this->output->unset_template();

		if($this->org == NULL){
			header('Content-Type: application/json');
			echo json_encode(['data' => []]);
			die();			
		}		
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$param = json_decode($dataClear);

		$this->load->helper('date');		
		$this->load->helper('guidv4');		
		$encounter_guid = guidv4();
		$condition_guid = guidv4();
		
		$datestring = '%d/%m/%Y';

		$StartTime = time();
		$EndTime = time() + 60*60;		

		$tanggal = mdate($datestring, $StartTime);

		$encounter = [
			"reference" => "urn:uuid:{$encounter_guid}", 
			"display" => "Kunjungan {$param->patient->display} pada tanggal {$tanggal}" 
		];
		
		$patient = [
			"reference" => "Patient/{$param->patient->ihs_id}", 
			"display" => "{$param->patient->display}" 
		];
		$participant = [
			"reference" => "Practitioner/{$param->participant->ihs_id}", 
			"display" => "{$param->participant->display}" 
		];

		$period = [
			"start" => date(DATE_ATOM, $StartTime), 
			"end" => date(DATE_ATOM, $EndTime) 
		];

		$location = [
			"reference" => "Location/{$param->location->ihs_id}", 
			"display" => "{$param->location->display}" 
		];

		$icd10 = [
			"system" => "http://hl7.org/fhir/sid/icd-10", 
			"code" => "{$param->condition->code}", 
			"display" => "{$param->condition->display}" 
		]; 

		$condition = [
			"reference" => "urn:uuid:{$condition_guid}", 
			"display" => $icd10["display"]
		];

		$organization = [
			"reference" => "Organization/{$this->org->organization_id}" 
		];

		$identifier = [
			"system" => "http://sys-ids.kemkes.go.id/encounter/{$param->id}", 
			"value" => "{$param->noRegistrasi}" 
		]; 

		$ihs = [
		  "resourceType" => "Bundle", 
		  "type" => "transaction", 
		  "entry" => [
				[
				   "fullUrl" => $encounter["reference"], 
				   "resource" => [
					  "resourceType" => "Encounter", 
					  "status" => "finished", 
					  "class" => [
						 "system" => "http://terminology.hl7.org/CodeSystem/v3-ActCode", 
						 "code" => "AMB", 
						 "display" => "ambulatory" 
					  ], 
					  "subject" => $patient, 
					  "participant" => [
							   [
								  "type" => [
									 [
										"coding" => [
										   [
											  "system" => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType", 
											  "code" => "ATND", 
											  "display" => "attender" 
										   ] 
										] 
									 ] 
								  ], 
								  "individual" => $participant
							   ] 
							], 
					  "period" => $period, 
					  "location" => [["location" => $location]], 
					  "diagnosis" => [
										[
											"condition" => $condition, 
											"use" => [
													"coding" => [
													[
														"system" => "http://terminology.hl7.org/CodeSystem/diagnosis-role", 
														"code" => "DD", 
														"display" => "Discharge diagnosis" 
													] 
													] 
												], 
											"rank" => 1 
										]
									], 
					  "statusHistory" => [
											[
												"status" => "arrived", 
												"period" => [
													"start" => date(DATE_ATOM, $StartTime), 
													"end" => date(DATE_ATOM, $StartTime) 
												] 
											], 
											[
												"status" => "in-progress", 
												"period" => [
													"start" => date(DATE_ATOM, $StartTime), 
													"end" => date(DATE_ATOM, $StartTime) 
												] 
											], 
											[
												"status" => "finished", 
												"period" => [
													"start" => date(DATE_ATOM, $EndTime), 
													"end" => date(DATE_ATOM, $EndTime) 
												] 
											] 
										], 
					  "serviceProvider" => $organization, 
					  "identifier" => [$identifier] 
				   ], 
				   "request" => [
						"method" => "POST", 
						"url" => "Encounter" 
					] 
				], 
				[
					"fullUrl" => $condition["reference"], 
					"resource" => [
						"resourceType" => "Condition", 
						"clinicalStatus" => [
							"coding" => [
								[
									"system" => "http://terminology.hl7.org/CodeSystem/condition-clinical", 
									"code" => "active", 
									"display" => "Active" 
								] 
							] 
						], 
						"category" => [[
							"coding" => [
								[
									"system" => "http://terminology.hl7.org/CodeSystem/condition-category", 
									"code" => "encounter-diagnosis", 
									"display" => "Encounter Diagnosis" 
								] 
							] 
						]], 
						"code" => [
							"coding" => [$icd10] 
						], 
						"subject" => $patient, 
						"encounter" => $encounter
					], 
					"request" => [
						"method" => "POST", 
						"url" => "Condition" 
					] 
				],  
			] 
	    ]; 

		$satuSehatService = new SatuSehatService($this->configurations);				
		$response = $satuSehatService->post(json_encode($ihs));
		header('Content-Type: application/json');
		echo json_encode(['data' => $response]);
    }		

	public function post_rawat_inap(){
		header('Content-Type: application/json');
		echo json_encode(['data' => []]);
		die();			
	}

	public function saveLocation(){
		$this->output->unset_template();			
		if($this->org == NULL){
			header('Content-Type: application/json');
			echo json_encode(['data' => []]);
			die();			
		}
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;				
		$klinik = $this->Klinik_model->getById($id_klinik);		
		$OrgID = $this->org->organization_id;
		$id = $postData->id;
		$LocationCode = $postData->location_code;
		$LocationName = $postData->location_name;
		$LocationDesc = $postData->location_description;
		$Phone = $klinik->no_telp;
		$Email = $klinik->email;				

        $LocArr = [
            "resourceType" => "Location",
            "identifier" => [
                [
                    "system" => "http://sys-ids.kemkes.go.id/location/{$OrgID}",
                    "value" => "{$LocationCode}",
                ],
            ],
            "status" => "active",
            "name" => "{$LocationName}",
            "description" => "{$LocationDesc}",
            "mode" => "instance",
            "telecom" => [
                [
                    "system" => "phone",
                    "value" => "{$Phone}",
                    "use" => "work",
                ],
                [
                    "system" => "email",
                    "value" => "{$Email}",
                    "use" => "work",
                ],
            ],
            "physicalType" => [
                "coding" => [
                    [
                        "system" => "http://terminology.hl7.org/CodeSystem/location-physical-type",
                        "code" => "ro",
                        "display" => "Room",
                    ],
                ],
            ],
            "managingOrganization" => [
                "reference" => "Organization/{$OrgID}",
            ],
        ];

		$satuSehatService = new SatuSehatService($this->configurations);			
		if($id != '0'){
			$LocArr["id"] = $id;
			$response = $satuSehatService->put(json_encode($LocArr), '/Location/'.$id);
		}
		else{
			$response = $satuSehatService->post(json_encode($LocArr), "/Location");			
		}			
		header('Content-Type: application/json');
		echo json_encode(['data' => $response, 'status'=> true]);
    }		

	function deleteLocation()
	{
		$this->output->unset_template();
		if($this->org == NULL){
			header('Content-Type: application/json');
			echo json_encode(['data' => []]);
			die();			
		}		
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$param = [
			[
				"op" => "replace",
				"path" => "/status",
				"value" => "inactive"
			],
		];
		$satuSehatService = new SatuSehatService($this->configurations);			   
		$response = $satuSehatService->patch(json_encode($param), '/Location/'.$id);
		//add the header here
        header('Content-Type: application/json');
		echo json_encode(['data' => $response, 'status'=> true]);
    } 	
}