<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Control_signos_vitales extends CI_Controller {
public function __construct()
{
parent::__construct();

  $this->load->library('form_validation'); 
}




public function saveControlSignosVitales(){
$id=$this->input->post('id');
if($id==0){
$time=$this->input->post('time');	
$updated_time=$this->input->post('time');
$insertedBy=$this->input->post('id_user');
}else{
$timeupdate=$this->db->select('inserted_time, id_user')->where('id',$id)->get('hosp_control_signos_vitales')->row_array();
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
'id_patient'=>$this->input->post('id_patient'),
'id_user'=>$insertedBy,
'updated_by'=>$this->input->post('id_user'),
'inserted_time'=>$time,
'updated_time'=>$updated_time,
);
if($id==0){
$this->db->insert("hosp_control_signos_vitales",$data);
}else{
$where= array(
  'id' =>$this->input->post('id')
);
$this->db->where($where);

$this->db->update("hosp_control_signos_vitales",$data);	
}


if($this->db->affected_rows() > 0){
	echo 1;
}else{
   echo 0;
}



}






 function loadContSigVit(){
$data['user_id']=$this->input->post('id_user');
$data['id_historial']=$this->input->post('id_patient');
$this->load->view('hospitalizacion/historial/control-signos-vitales/content',$data);
}


public function listContSigVital(){
$id_patient=$this->input->post('id_patient');
$data['id_patient']=$id_patient;
$data['user_id']=$this->input->post('id_user');
$sql = "select * from  hosp_control_signos_vitales where id_patient=$id_patient  ORDER BY id desc";
$data['query']= $this->db->query($sql);
$this->load->view('hospitalizacion/historial/control-signos-vitales/list',$data);
}




public function contSigVitalForm(){
$id=$this->input->post('id');

$data['id_historial']=$this->input->post('id_patient');
$data['user_id']=$this->input->post('id_user');
$data['idContSigVit']= $id;
if($id > 0){
$sql = "select * from  hosp_control_signos_vitales where id=$id  ORDER BY id desc";
$query= $this->db->query($sql);
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
	contSigVitalForm();
	
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
$this->load->view('hospitalizacion/historial/control-signos-vitales/form', $data);
}






public function deleteControSigVital(){
$where= array(
  'id'=>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('hosp_control_signos_vitales');
}








}