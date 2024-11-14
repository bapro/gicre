    <?php
	class Medico extends CI_Controller {
    public function __construct() {
        parent::__construct();
     // $this->load->model('model_medico');
	  $this->load->model('model_enfermedad_actual');
	  $this->load->model('model_conclusion_diagno');
	  $this->load->model('model_alergy');
	  $this->load->model('model_signo_vital');
	  $this->load->model('model_general');
	  $this->load->library("user_register_info");
	  //$this->load->library("pagination");
       // if ($this->session->userdata('medico_is_logged_in') == '') {
           // $this->session->set_flashdata('msg', 'Please Login to Continue');
           // redirect('login');
        //}
    }
	public function index() {
        $config = array();
		/*$total_results = $this->model_medico->get_patients_facs_total();
        $config["base_url"] = base_url() . "medico/index";
        $config["total_rows"] = count($total_results);
		 $data["total_rows"] = count($total_results);
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li class='page-item'>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li class='page-item'>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link'] = 'Primero';
        $config['last_link'] = 'Último';
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $hoy = date("d-m-Y");
           // $results = $this->model_medico->get_patients_facs($config["per_page"], $page);
            
			
      
        $data['patients_facts'] = $results;
    */
        $this->load->view('medico/index');
      
    
        //if ($area_id == 87) {
          //  $this->load->view('optica/optometra/index', $data);
        //} else {
        //    $this->load->view('medico/index', $data);
       // }
    }
	
	public function clinical_history_pediatry($patient, $doctor, $area, $centro, $id_user, $id_rdv, $id_apoint,$id_seguro, $centro_type ) {
		
	//$patient = decrypt_url($patient);
	$patient = 917;
	$doctor = decrypt_url($doctor);
	$area = decrypt_url($area);
	$centro = decrypt_url($centro);
	$id_user = decrypt_url($id_user);
	$id_rdv = decrypt_url($id_rdv);
   $id_apoint = decrypt_url($id_apoint);
      $id_seguro = decrypt_url($id_seguro); 
   $centro_type = decrypt_url($centro_type); 
   
$data['doctor'] = $doctor;
$data['area'] = $area;
$data['centro_medico'] = $centro;
$data['id_user'] = $id_user;
$data['id_rdv'] = $id_rdv;
$data['centro_type'] = $centro_type;
$data['id_seguro'] = $id_seguro;
$data['id_patient'] = $patient;
$data['id_apoint'] = $id_apoint;
	$data['date_nacer']="";
	
	$patient_info=$this->model_general->calculatePatientAge($patient);
	
$data['birthday']=$patient_info['birthday'];
  
    $data['edad']=$patient_info['age'];
	$this->session->set_userdata('sessionPatientAge',$patient_info['age']);
		$this->session->set_userdata('sessionIdUuser',$id_user);
		$this->session->set_userdata('id_patient',$patient);
		$this->session->set_userdata('id_centro',$centro);
		
$total_alery=$this->model_alergy->saveAlergyTotal($patient);
$data['total_alery']=$total_alery;

$total_usual_drug=$this->model_alergy->saveUsualDrugTotal($patient);
$data['total_usual_drug']=$total_usual_drug;


	//---------ENFERMEDAD ACTUAL ------------------------------------
	$enfermedad=$this->model_enfermedad_actual->enfermedad($patient);
	$data['enfermedad'] = $enfermedad;
    $data['count_enf']=count($enfermedad);
    $data['enfermedad_data'] = 0;
	$this->load->view('clinical-history/header', $data);
	
	//------ANTECEDENTES PERSONALES Y FAMILIARES
	$sql_ant_p_f="SELECT * FROM   h_c_marque_positivo WHERE historial_id=$patient";
	$query_ant_p_f=$this->db->query($sql_ant_p_f);
	 if($query_ant_p_f->num_rows() > 0){
		 $data['ant_p_f_data'] = 1;
	 }else{
		$data['ant_p_f_data']= 0; 
	 }
	$data['query_ant_p_f']= $query_ant_p_f;
	
	

	//---------------CONCLUSION DIAG----------------------
	$data['conclusion_data'] = 0;
	$concluciones = $this->model_conclusion_diagno->concluciones($patient);
	$data['count_conc']=count($concluciones);
	$data['concluciones']=$concluciones;
	
		//---------------SIGNOS VITALES----------------------
	$data['signo_data'] = 0;

	
	$signos_vitales = $this->model_signo_vital->signos_vitales($patient);
	$data['signos_vitales']=$signos_vitales;
	$data['signos_vitales_conc']=count($signos_vitales);
	
	//Violencia intrafamilia y antecedentes otros
	
	$sql_v_at="SELECT * FROM  h_c_ante_otros WHERE historial_id=$patient";
	$query_sql_v_at=$this->db->query($sql_v_at);
	 if($query_sql_v_at->num_rows() > 0){
		 $data['v_at_data'] = 1;
	 }else{
		$data['v_at_data']= 0; 
	 }
	$data['query_sql_v_at']= $query_sql_v_at;
	
	
	//SOSPECHA DE ABUSO O MALTRATO
	
	
	$sql_abuse_mistreat="SELECT * FROM h_c_abuse_suspition WHERE historial_id=$patient";
	$query_abuse_mistreat=$this->db->query($sql_abuse_mistreat);
	 if($query_abuse_mistreat->num_rows() > 0){
		 $data['abuse_mistreat_data'] = 1;
	 }else{
		$data['abuse_mistreat_data']= 0; 
	 }
	 
	$data['query_abuse_mistreat']= $query_abuse_mistreat;
	
	
	//ANT PEDIATRIA
	
	
	$sql_query_ant_ped="SELECT * FROM h_c_ant_pedia 
	INNER JOIN  h_c_vacunacion
    ON h_c_ant_pedia.id=h_c_vacunacion.id_pedia
	WHERE hist_id=$patient";
	$query_ant_ped=$this->db->query($sql_query_ant_ped);
	 if($query_ant_ped->num_rows() > 0){
		 $data['ant_ped_data'] = 1;
	 }else{
		$data['ant_ped_data']= 0; 
	 }
	 
	$data['query_ant_ped']= $query_ant_ped;
	
	
	
	//HABITOS TOXICOS
	
	$sql_toxic_habits="SELECT * FROM h_c_habitos_toxicos WHERE historial_id=$patient";
	$query_toxic_habits=$this->db->query($sql_toxic_habits);
	 if($query_toxic_habits->num_rows() > 0){
		 $data['hab_tox_data'] = 1;
	 }else{
		$data['hab_tox_data']= 0; 
	 }
	 
	$data['query_toxic_habits']= $query_toxic_habits;
	
	$data['general_repo_data']=0;
	$data['orden_medica_data']=0;
	$this->load->view('clinical-history/pediatry/index', $data);
	  $this->load->view('clinical-history/vital-signals/footer',$data);
	$this->load->view('clinical-history/pressBtnHistEvent', $data);
	//$this->load->view('clinical-history/pediatry/save-footer-pediatry', $data);
	//$this->load->view('clinical-history/save-inputs-to-localstorage', $data);
	$this->load->view('clinical-history/indications/footer', $data);
		$this->load->view('auto-complete-select-js', $data);
		$this->load->view('clinical-history/footer', $data);
	}
	
	
	
	
	
	
	public function clinical_history_urology($patient, $doctor, $area, $centro, $id_user, $id_rdv, $id_apoint,$id_seguro, $centro_type ) {
		
	//$patient = decrypt_url($patient);
	$patient = 800001;
	$doctor = decrypt_url($doctor);
	$area = decrypt_url($area);
	$centro = decrypt_url($centro);
	$id_user = decrypt_url($id_user);
	$id_rdv = decrypt_url($id_rdv);
   $id_apoint = decrypt_url($id_apoint);
      $id_seguro = decrypt_url($id_seguro); 
   $centro_type = decrypt_url($centro_type); 
   
$data['doctor'] = $doctor;
$data['area'] = $area;
$data['centro_medico'] = $centro;
$data['id_user'] = $id_user;
$data['id_rdv'] = $id_rdv;
$data['centro_type'] = $centro_type;
$data['id_seguro'] = $id_seguro;
$data['id_patient'] = $patient;
$data['id_apoint'] = $id_apoint;
	$data['date_nacer']="";
	
	$patient_info=$this->model_general->calculatePatientAge($patient);
	
$data['birthday']=$patient_info['birthday'];
  
    $data['edad']=$patient_info['age'];
	$this->session->set_userdata('sessionPatientAge',$patient_info['age']);
		$this->session->set_userdata('sessionIdUuser',$id_user);
		$this->session->set_userdata('id_patient',$patient);
		$this->session->set_userdata('id_centro',$centro);
		
$total_alery=$this->model_alergy->saveAlergyTotal($patient);
$data['total_alery']=$total_alery;

$total_usual_drug=$this->model_alergy->saveUsualDrugTotal($patient);
$data['total_usual_drug']=$total_usual_drug;


	//---------ENFERMEDAD ACTUAL ------------------------------------
	$enfermedad=$this->model_enfermedad_actual->enfermedad($patient);
	$data['enfermedad'] = $enfermedad;
    $data['count_enf']=count($enfermedad);
    $data['enfermedad_data'] = 0;
	$this->load->view('clinical-history/header', $data);
	

$sql_ex_uro="SELECT * FROM  h_c_urology WHERE id_patient=$patient";
	$query_ex_uro=$this->db->query($sql_ex_uro);
	$data['ex_uro_totals'] =$query_ex_uro->num_rows();
	 $data['ant_ex_uro_data'] = 0;
	 
	$data['query_ex_uro']= $query_ex_uro->result();



	//---------------CONCLUSION DIAG----------------------
	$data['conclusion_data'] = 0;
	$concluciones = $this->model_conclusion_diagno->concluciones($patient);
	$data['count_conc']=count($concluciones);
	$data['concluciones']=$concluciones;
	
		//---------------SIGNOS VITALES----------------------
	$data['signo_data'] = 0;

	
	$signos_vitales = $this->model_signo_vital->signos_vitales($patient);
	$data['signos_vitales']=$signos_vitales;
	$data['signos_vitales_conc']=count($signos_vitales);
	
	//ANTECEDENTES UROLOGO
	
	$sql_ant_uro="SELECT * FROM  h_c_urology_antecedentes WHERE id_patient=$patient";
	$query_ant_uro=$this->db->query($sql_ant_uro);
	 if($query_ant_uro->num_rows() > 0){
		 $data['ant_uro_data'] = 1;
	 }else{
		$data['ant_uro_data']= 0; 
	 }
	$data['query_ant_uro']= $query_ant_uro;
	
	
	$sql_v_at="SELECT * FROM  h_c_ante_otros WHERE historial_id=$patient";
	$query_sql_v_at=$this->db->query($sql_v_at);
	 if($query_sql_v_at->num_rows() > 0){
		 $data['v_at_data'] = 1;
	 }else{
		$data['v_at_data']= 0; 
	 }
	$data['query_sql_v_at']= $query_sql_v_at;
	
	
	
	
	
	//HABITOS TOXICOS
	
	$sql_toxic_habits="SELECT * FROM h_c_habitos_toxicos WHERE historial_id=$patient";
	$query_toxic_habits=$this->db->query($sql_toxic_habits);
	 if($query_toxic_habits->num_rows() > 0){
		 $data['hab_tox_data'] = 1;
	 }else{
		$data['hab_tox_data']= 0; 
	 }
	 
	$data['query_toxic_habits']= $query_toxic_habits;
	
	$data['general_repo_data']=0;
	$data['orden_medica_data']=0;
	$this->load->view('clinical-history/urology/index', $data);
	  $this->load->view('clinical-history/vital-signals/footer',$data);
	$this->load->view('clinical-history/pressBtnHistEvent', $data);
	//$this->load->view('clinical-history/save-inputs-to-localstorage', $data);
	$this->load->view('clinical-history/indications/footer', $data);
		$this->load->view('auto-complete-select-js', $data);
		$this->load->view('clinical-history/footer', $data);
	}
	
	
	
	
	
	}