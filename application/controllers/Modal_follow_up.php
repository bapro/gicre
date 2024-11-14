<?php
	class Modal_follow_up extends CI_Controller {
    public function __construct() {
        parent::__construct();
	 $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
    $this->ID_CENTRO =$this->session->userdata('id_centro');
	$this->clinical_history = $this->load->database('clinical_history',TRUE);
	 $this->load->library("load_history_resume");
    }
	
	
	
	
	public function content() {
		
		[$con_diags, $list_cie10, $current_disease, $signo_vitales, $doc_area, $doc_name, $centro, $doctor_area] = $this->load_history_resume->history_summary($this->ID_PATIENT);
		 if($con_diags){
		$data['id_user']=$this->ID_USER;
		$query=$this->evolution_list($this->ID_PATIENT);
		$data['query']=$query;
		$data['con_diags']=$con_diags;
		$data['list_cie10']=$list_cie10;
		$data['current_disease']=$current_disease;
		$data['signo_vitales']=$signo_vitales;
		$is_today_saved=$this->clinical_history->select('inserted_time')
		->where("DATE(inserted_time)",date('Y-m-d'))
		->where('id_patient',$this->ID_PATIENT)
		->get('h_c_conclusion_diagno_evolution')->row('inserted_time');
		$data['is_today_saved']=date("Y-m-d",strtotime($is_today_saved));
		$data['show_evolution']=$this->input->post('origine');
		$data['active']='';
		$data['show']='';
		$data['ident']='-f';
		$data['current_disease_id']=$current_disease['id'];
		$data['doc_name']=$doc_name;
		$data['doc_area_id']=$doc_area;
		$data['centro_name']=$centro['name'];
		$data['doctor_area']=$doctor_area;
		$data['id_patient']=$this->input->post('id_patient');
		
		
		$last_row_med=$this->clinical_history->select("DATE(insert_time)")
		->limit(1)
		->order_by('id_i_m','DESC')
		->get('h_c_indicaciones_medicales')->row("DATE(insert_time)");
		
		 $query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_medicales WHERE historial_id=$this->ID_PATIENT AND insert_time LIKE '%$last_row_med%'");
		$data['querymED']=$query->result();
		
		//------------------------ESTUDIO-------------------------------------------------------------------------------
		
		$last_row_est=$this->clinical_history->select("DATE(insert_time)")
		->limit(1)
		->order_by('id_i_e','DESC')
		->get('h_c_indicaciones_estudio')->row("DATE(insert_time)");
		
		 $queryEST=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_estudio WHERE historial_id=$this->ID_PATIENT AND insert_time LIKE '%$last_row_est%'");
		$data['querymEST']=$queryEST->result();
		
		
		//------------------------LABORATORIOS-------------------------------------------------------------------------------
		
		$last_row_lab=$this->clinical_history->select("DATE(insert_time)")
		->limit(1)
		->order_by('id_lab','DESC')
		->get('h_c_indications_labs')->row("DATE(insert_time)");
		
		 $queryLAB=$this->clinical_history->query("SELECT * FROM  h_c_indications_labs WHERE historial_id=$this->ID_PATIENT AND insert_time LIKE '%$last_row_lab%'");
		$data['querymLAB']=$queryLAB->result();
		
		
		
		if($this->input->post('origine')=='follow'){
		$this->load->view('clinical-history/follow-up/content', $data);
		}else{
			$data['is_to_show']=1;
			$data['sello_doc']='';
			$this->load->view('clinical-history/resume/form', $data);
		}
		 }else{
			 echo "<div class='alert alert-danger'>No tiene historia clinica</div>";  
		 }
		
	}
	

	public function save_evolution() {
		if ($this->input->post('conDiagEvo') != "") {
			 $response['status']  = 0;
			 
	   $data = array(
                'evolution' => $this->input->post('conDiagEvo'),
                'id_user' => $this->ID_USER,
				'id_patient' =>$this->input->post('id_patient'),
				'inserted_time' => date("Y-m-d H:i:s"),
				'id_con' => $this->input->post('id_cdia')
				);
		   $this->clinical_history->insert('h_c_conclusion_diagno_evolution',$data);
		   
		   $query=$this->evolution_list($this->input->post('id_patient'));
		   $evolution_lists = [];
		    foreach ($query->result() as $row) {
			$inserted_time=date("d-m-Y H:i:s",strtotime($row->inserted_time));
				$evolution_lists []='<li class="page-item paginate-signovitales-li" id="'.$row->id.'"><a class="page-link" href="#">'.$inserted_time.'</a></li>';
	           }
			  $response['list']=$evolution_lists; 
		}else{
			$response['list']="";
		 $response['status']  = 1;	
		}
		echo json_encode($response);
			}
	

		public function evolution_list($id_patient){
	$sql="SELECT * FROM h_c_conclusion_diagno_evolution WHERE id_patient='$id_patient' && id_user=$this->ID_USER ORDER BY id DESC ";
		$query= $this->clinical_history->query($sql);
		return $query;
	}
	
	
	
	public function form() {
		$page= $this->input->post('page');
		$evolution=$this->clinical_history->select('evolution')
		->where('id',$page)
		->get('h_c_conclusion_diagno_evolution')->row('evolution');
		echo trim($evolution);	
	}
	
	
	
		public function update_evolution() {
		if ($this->input->post('conDiagEvo') != "") {
	$data = array(
                'evolution' => $this->input->post('conDiagEvo'),
                'updated_time' => date("Y-m-d H:i:s"),
				'updated_by' => $this->ID_USER
				);
			$where = array(
			'id' =>$this->input->post('id_con_evo')
			);
			$this->clinical_history->where($where);
			$this->clinical_history->update("h_c_conclusion_diagno_evolution",$data);
			
			 $response['status']  = 0;
			 $response['message']  = '<i class="bi bi-check fs-3 text-green" ></i>';
			
		  
		}
			}
	
	
	
	
	
	
	
	
	
	
	}