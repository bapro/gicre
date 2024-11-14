    <?php
	class Hosp_exam_neuro extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('user_register_info_hospitalization'); 
  
 $this->ID_PATIENT= $this->session->userdata('id_patient');
	$this->ID_USER = $this->session->userdata('user_id');
    $this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
	 $this->ID_CENTRO = $this->session->userdata('id_centro');
    }
	
	
	public function form() {
		 $this->load->library("user_register_info");
            $page = $this->input->get('page');
			 $data['exn_data'] = $this->input->get('signo');
            $query_exn = $this->hospitalization_emgergency->query("SELECT * FROM  hosp_exam_neuro WHERE id=$page");
            $data['query_exn'] = $query_exn->result();
            $this->load->view('hospitalization/clinical-history/exam-neuro/form', $data);
			echo "<script>$('.spinner-border').hide()</script>";
		
	}
	
		
	public function saveUpdateExamNeuro(){
if ($this->input->post('text') > 0 || $this->input->post('checkbox')  > 0 || $this->input->post('radio') > 0) {
$this->hospitalization_emgergency->trans_start();
$espontanea= $this->input->post('espontanea');
$espontanea1 = (isset($espontanea)) ? 1 : 0;
$a_la_orden_verbal= $this->input->post('a_la_orden_verbal');
$a_la_orden_verbal1 = (isset($a_la_orden_verbal)) ? 1 : 0;
$a_estimulo_doloroso= $this->input->post('a_estimulo_doloroso');
$a_estimulo_doloroso1 = (isset($a_estimulo_doloroso)) ? 1 : 0;
$no_ay_respuesta= $this->input->post('no_ay_respuesta');
$no_ay_respuesta1 = (isset($no_ay_respuesta)) ? 1 : 0;
$orientada= $this->input->post('orientada');
$orientada1 = (isset($orientada)) ? 1 : 0;
$confusa= $this->input->post('confusa');
$confusa1 = (isset($confusa)) ? 1 : 0;
$inapropriada= $this->input->post('inapropriada');
$inapropriada1 = (isset($inapropriada)) ? 1 : 0;
$incomprensible= $this->input->post('incomprensible');
$incomprensible1 = (isset($incomprensible)) ? 1 : 0;
$a_la_orden_verbal_6= $this->input->post('a_la_orden_verbal_6');
$a_la_orden_verbal_61 = (isset($a_la_orden_verbal_6)) ? 1 : 0;
$localizar_dolor= $this->input->post('localizar_dolor');
$localizar_dolor1 = (isset($localizar_dolor)) ? 1 : 0;
$retiro_ante_el_dolor= $this->input->post('retiro_ante_el_dolor');
$retiro_ante_el_dolor1 = (isset($retiro_ante_el_dolor)) ? 1 : 0;
$flexion_normal= $this->input->post('flexion_normal');
$flexion_normal1 = (isset($flexion_normal)) ? 1 : 0;
$extension= $this->input->post('extension');
$extension1 = (isset($extension)) ? 1 : 0;
$no_hay_respuesta= $this->input->post('no_hay_respuesta');
$no_hay_respuesta1 = (isset($no_hay_respuesta)) ? 1 : 0;
  $saveExamNeuro= array(
'exam_gen_neuro'=> $this->input->post('exam_gen_neuro'),
'olfatorio'=> $this->input->post('olfatorio'),
'optico'=> $this->input->post('optico'),
'motor_ocr_com'=> $this->input->post('motor_ocr_com'),
'patetica'=> $this->input->post('patetica'),
'trigemino'=>$this->input->post('trigemino'),
'motor_ocu_ext'=> $this->input->post('motor_ocu_ext'),
'facial'=> $this->input->post('facial'),
'estatoacustico'=> $this->input->post('estatoacustico'),
'glosofaringeo'=> $this->input->post('glosofaringeo'),
'neumogastrico'=>$this->input->post('neumogastrico'),
'espinal'=> $this->input->post('espinal'),
'hipo_mayor'=>$this->input->post('hipo_mayor'),
'sistema_motor'=> $this->input->post('sistema_motor'),
  'marcha'=> $this->input->post('marcha'),
 'espontanea'=> $espontanea1,
'a_la_orden_verbal'=> $a_la_orden_verbal1,
'a_estimulo_doloroso'=> $a_estimulo_doloroso1,
'no_ay_respuesta'=> $no_ay_respuesta1,
'orientada'=>$orientada1,
'confusa'=> $confusa1,
'inapropriada'=> $inapropriada1,
'incomprensible'=> $incomprensible1,
'a_la_orden_verbal_6'=> $a_la_orden_verbal_61,
'localizar_dolor'=>$localizar_dolor1,
'retiro_ante_el_dolor'=> $retiro_ante_el_dolor1,
'flexion_normal'=>$flexion_normal1,
'extension'=>$extension1,
'no_hay_respuesta'=> $no_hay_respuesta1,
'bicipital'=> $this->input->post('bicipital'),
'tricipital'=> $this->input->post('tricipital'),
'aquileo_y_clonus'=> $this->input->post('aquileo_y_clonus'),
'patelar_y_clonus'=> $this->input->post('patelar_y_clonus'),
'dedo_dedo'=> $this->input->post('dedo_dedo'),
'dedo_nariz'=> $this->input->post('dedo_nariz'),
'talon_rod'=> $this->input->post('talon_rod'),
'patelar_y_clonus'=> $this->input->post('patelar_y_clonus'),
'romberg'=> $this->input->post('romberg'),
'sensibilidad1'=> $this->input->post('sensibilidad1'),
'sensibilidad2'=> $this->input->post('sensibilidad2'),
'fondo_de_ojo'=> $this->input->post('fondo_de_ojo'),
'id_pat'=> $this->ID_PATIENT,
'id_centro'=> $this->ID_CENTRO,
 'updated_by'=> $this->session->userdata('exn_up_by'),
'updated_time'=> $this->session->userdata('exn_up_time'),
 'inserted_by'=> $this->session->userdata('exn_in_by'),
'inserted_time'=> $this->session->userdata('exn_in_time')

);
if($this->input->post('id') > 0){
$where = array(
  'id' =>$this->input->post('id')
);

$this->hospitalization_emgergency->where($where);
$this->hospitalization_emgergency->update('hosp_exam_neuro',$saveExamNeuro);
}else{
$this->hospitalization_emgergency->insert('hosp_exam_neuro',$saveExamNeuro);	
}
$this->hospitalization_emgergency->trans_complete();

if ($this->hospitalization_emgergency->trans_status() === FALSE)
{
   echo 'error';
}else{
	echo 'hecho';
}

}
else{
	echo 0;
}
}


	public function pagination() {
    $sql="SELECT * FROM hosp_exam_neuro WHERE id_pat=$this->ID_PATIENT && id_centro=$this->ID_CENTRO ORDER BY id DESC";
     $query= $this->hospitalization_emgergency->query($sql);
     
    $params = array('id_paginate' => 'paginate-exam-neruo-li', 'rows'=>$query->result(), 'id'=>'id', 'total'=>$query->num_rows());
        echo $this->user_register_info_hospitalization->list_patients_registers_by_date($params);
    
}
	
	}