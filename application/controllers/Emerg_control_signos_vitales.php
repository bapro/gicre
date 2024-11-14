<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emerg_control_signos_vitales extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->CENTRO_ID=$this->session->userdata('id_centro');
$this->PATIENT_ID=$this->session->userdata('id_patient');
$this->ID_USER = $this->session->userdata('user_id');
$this->ID_HOSP = $this->session->userdata('ID_HOSP');
$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
}




public function saveControlSignosVitales(){
$id=$this->input->post('id');
if($id==0){
$time=$this->input->post('time');	
$updated_time=$this->input->post('time');
$insertedBy=$this->ID_USER;
}else{
$timeupdate=$this->hospitalization_emgergency->select('inserted_time, id_user')->where('id',$id)->get('emerg_control_signos_vitales')->row_array();
$time=$timeupdate['inserted_time'];
$updated_time=$this->input->post('time');
$insertedBy=$timeupdate['id_user'];		
}
$data = array(
'csv_sat'=>$this->input->post('csv_sat'),
'csv_ta1'=>$this->input->post('csv_ta1'),
'csv_ta2'=>$this->input->post('csv_ta2'),
'csv_fc'=>$this->input->post('csv_fc'),
'csv_fr'=>$this->input->post('csv_fr'),
'csv_glicemia'=>$this->input->post('csv_glicemia'),
'csv_pulso'=>$this->input->post('csv_pulso'),
'csv_temperatura'=>$this->input->post('csv_temperatura'),
'csv_diuresis'=>$this->input->post('csv_diuresis'),
'csv_dep'=>$this->input->post('csv_dep'),
'id_patient'=>$this->PATIENT_ID,
'id_user'=>$insertedBy,
'updated_by'=>$this->ID_USER,
'inserted_time'=>$time,
'updated_time'=>$updated_time,
'centro'=>$this->CENTRO_ID,
'id_hosp'=>$this->ID_HOSP
);
if($id==0){
$this->hospitalization_emgergency->insert("emerg_control_signos_vitales",$data);
}else{
$where= array(
  'id' =>$this->input->post('id')
);
$this->hospitalization_emgergency->where($where);

$this->hospitalization_emgergency->update("emerg_control_signos_vitales",$data);	
}


if($this->hospitalization_emgergency->affected_rows() > 0){
	echo 1;
}else{
   echo 0;
}



}






 function loadContSigVit(){
$data['user_id']=$this->ID_USER;
$data['id_historial']=$this->PATIENT_ID;
$this->load->view('emergency/clinical-history/control-signo-vitales/content',$data);
}


public function listContSigVital(){
$data['id_patient']=$this->PATIENT_ID;
$data['user_id']=$this->ID_USER;
$sql = "select * from  emerg_control_signos_vitales where id_patient=$this->PATIENT_ID && centro=$this->CENTRO_ID ORDER BY id desc";
$data['query']= $this->hospitalization_emgergency->query($sql);
$this->load->view('emergency/clinical-history/control-signo-vitales/list',$data);
}




public function contSigVitalForm(){
$id=$this->input->post('id');

$data['id_historial']=$this->PATIENT_ID;
$data['user_id']=$this->ID_USER;
$data['idContSigVit']= $id;
if($id > 0){
$sql = "select * from  emerg_control_signos_vitales where id=$id  ORDER BY id desc";
$query= $this->hospitalization_emgergency->query($sql);
foreach($query->result() as $rowCsV)
$data['csv_sat']=$rowCsV->csv_sat;
$data['csv_ta1']=$rowCsV->csv_ta1;
$data['csv_ta2']=$rowCsV->csv_ta2;
$data['csv_fc']=$rowCsV->csv_fc;
$data['csv_fr']=$rowCsV->csv_fr;
$data['csv_glicemia']=$rowCsV->csv_glicemia;
$data['csv_pulso']=$rowCsV->csv_pulso;
$data['csv_temperatura']=$rowCsV->csv_temperatura;
$data['csv_diuresis']=$rowCsV->csv_diuresis;
$data['csv_dep']=$rowCsV->csv_dep;
$data['btn_txt1']="Editar";
$data['fa_fa']='<i class="fa fa-pencil"></i>';
$data['cancel']='<button type="button" class="btn btn-sm btn-default" id="csv-cancel-btn" > Cancelar</button>';

echo "<script>

   $('#csv-cancel-btn').on('click', function(event){
	contSigVitalForm($id);
	
	})

</script>";
}else{
	
$data['csv_sat']="";
$data['csv_ta1']="";
$data['csv_ta2']="";
$data['csv_fc']="";
$data['csv_fr']="";
$data['csv_glicemia']="";
$data['csv_pulso']="";
$data['csv_temperatura']="";
$data['csv_diuresis']="";
$data['csv_dep']="";
$data['btn_txt1']="Agregar";
$data['fa_fa']='<i class="fa fa-plus"></i>';
$data['cancel']='';
}
$data['id_sig_vit']=$id;
$this->load->view('emergency/clinical-history/control-signo-vitales/form', $data);
}






public function deleteControSigVital(){
$where= array(
  'id'=>$this->input->post('id')
);

$this->hospitalization_emgergency->where($where);
$this->hospitalization_emgergency->delete('emerg_control_signos_vitales');

$sql = "select * from  emerg_control_signos_vitales where id_patient=$this->PATIENT_ID && centro=$this->CENTRO_ID";
$query= $this->hospitalization_emgergency->query($sql);
echo "Total:". $query->num_rows();
}



function savePrintCsv(){
 $id_print = $this->input->post('id_print');
  $action_time = date("Y-m-d H:i:s");
 $this->session->set_userdata('CURRENT_PRINT_CSV_TIME', $action_time);
 
	     foreach ($id_print as $key => $val) {
            $arrayData[] = array(
               'id' => $id_print[$key],
                'print_session' => $action_time,
             'id_user'=>$this->ID_USER               
            );
         }         
        $this->hospitalization_emgergency->insert_batch('emerg_csv_print', $arrayData);
 
 
}




}