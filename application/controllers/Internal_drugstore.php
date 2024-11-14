<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Internal_drugstore extends CI_Controller { 
public function __construct()
{
parent::__construct();

}


function dispatchMedFarma(){
if($this->input->post('action') == 0){

$where= array(
'id_med' =>$this->input->post('id_med'),
'id_pat'=> $this->input->post('id_pat'),
//'id_user'=>$this->input->post('id_user')
);
$this->db->where($where);
$this->db->delete('dispatched_drug');
}else{
$save = array(
'id_med'=> $this->input->post('id_med'),
'id_pat'=> $this->input->post('id_pat'),
'id_user'=>$this->input->post('id_user'),
'date_time'=>date("Y-m-d H:i:s"),
'drug_id'=>$this->input->post('drug_id'),
'user_dispatcher'=>$this->input->post('id_user'),
'date_time_dispatched'=>date("Y-m-d H:i:s")

);
$this->db->insert("dispatched_drug",$save);

}

}




public function save_farma_interna(){
$print_id  = $this->input->post('imprimir-one');	
 $id_patient  = $this->input->post('id_patient');
 $id_user  = $this->input->post('id_user');

$update = array(
'printing_now'=> 0
);

$where= array(
'id_pat'=> $id_patient
);

$this->db->where($where);
$this->db->update("dispatched_drug",$update);



foreach ($print_id as $key=>$id_p) {
	 $drug_id  = $this->input->post("drug-id-$id_p");
	 $id_centro  = $this->input->post("centro-id-$id_p");
	 $id_hosp  = $this->input->post("hosp-id-$id_p");

$update2 = array(
'is_printed'=>1,
'printing_now'=>1,
'id_hosp_'=>$id_hosp,
'id_centro_'=>$id_centro
);

$where2= array(
'id_med'=> $id_p,
'id_pat'=> $id_patient
);

$this->db->where($where2);
$this->db->update("dispatched_drug",$update2);
	
	
	
}

redirect("printings_hospitalizacion/farma_interna/$id_patient/$id_user");
}




public function searchPatientRecord()
{
$id_user=$this->input->get('iduser');
$id_centro=$this->input->get('id_centro');
$data['id_user']=$id_user;
$data['isFromDrug']="display:none";
$userName=$this->db->select('name')->where('id_user',$this->input->get('iduser'))->get('users')->row('name');
$data['userName'] =$userName;

if($id_centro == -1){
$id_patient=$this->db->select('historial_id')->where('historial_id',$this->input->get('id'))->get('hosp_orden_medica_recetas')->row('historial_id');

}else{
$id_patient=$this->db->select('historial_id')->where('historial_id',$this->input->get('id'))->where('centro',$id_centro)->get('hosp_orden_medica_recetas')->row('historial_id');
}


if($id_patient){
	
	

	
$data['id_patient'] =$id_patient;
$sql ="SELECT * FROM hospitalization_data  WHERE id_patient=$id_patient";
$data['query'] = $this->db->query($sql);
$this->load->view('hospitalizacion/list-data',$data);
$sql2="SELECT id_i_m, medica, cantidad, new_cant, dosis, via, updated_time, updated_by, drug_id, centro, id_hosp, operator
FROM  hosp_orden_medica_recetas WHERE id_i_m NOT IN (select id_med from dispatched_drug WHERE drug_id = 0) AND  historial_id=$id_patient && kardex=1 ORDER BY id_i_m DESC";

$data['query2'] = $this->db->query($sql2);


$sql3="SELECT id, insumo, updated_time, cantidad, drug_id, updated_by, centro, idemp
 FROM  hosp_peticion WHERE id NOT IN (select id_med from dispatched_drug WHERE drug_id = 1) AND id_patient=$id_patient  ORDER BY id DESC";

$data['query3'] = $this->db->query($sql3);


/*$sql4="SELECT id_i_m, medica, cantidad, new_cant, dosis, via, dispatched_drug.id_user, dispatched_drug.date_time, dispatched_drug.drug_id, centro, id_hosp
FROM  hosp_orden_medica_recetas
RIGHT JOIN dispatched_drug ON  hosp_orden_medica_recetas.id_i_m = dispatched_drug.id_med
WHERE historial_id=$id_patient AND dispatched_drug.drug_id=0";
$data['query4'] = $this->db->query($sql4);


$sql5="SELECT hosp_peticion.id, insumo, cantidad, dispatched_drug.drug_id, dispatched_drug.id_user, dispatched_drug.date_time, idemp, centro
FROM  hosp_peticion
RIGHT JOIN dispatched_drug ON  hosp_peticion.id = dispatched_drug.id_med
WHERE id_patient=$id_patient AND dispatched_drug.drug_id=1";
$data['query5'] = $this->db->query($sql5);*/

$this->load->view('internal-drugstore/reception-peticion',$data);	
}else{
	echo "<em>No se ha encontrado en kardex</em>";
}

}

public function reload_reception_petition(){

$id_patient=$this->input->post('id_patient');
$data['id_patient']=$id_patient;
$data['id_user']=$this->input->post('id_user');
$data['is_patient_dispatched']=$id_patient;
$data['userName']=$this->input->post('userName');
$data['id_m_c']=$this->input->post('id_m_c');

$data['id_hosp']=$this->input->post('id_hosp');
$sql4="SELECT id_i_m, medica, cantidad, new_cant, dosis, via, dispatched_drug.id_user, dispatched_drug.date_time, dispatched_drug.drug_id, centro, id_hosp
FROM  hosp_orden_medica_recetas
RIGHT JOIN dispatched_drug ON  hosp_orden_medica_recetas.id_i_m = dispatched_drug.id_med
WHERE historial_id=$id_patient AND dispatched_drug.drug_id=0 ORDER BY date_time DESC";
$data['query4'] = $this->db->query($sql4);


$sql5="SELECT hosp_peticion.id, insumo, cantidad, dispatched_drug.drug_id, dispatched_drug.id_user, dispatched_drug.date_time, idemp, centro
FROM  hosp_peticion
RIGHT JOIN dispatched_drug ON  hosp_peticion.id = dispatched_drug.id_med
WHERE id_patient=$id_patient AND dispatched_drug.drug_id=1 ORDER BY date_time DESC";
$data['query5'] = $this->db->query($sql5);



$this->load->view('internal-drugstore/peticion_patient_data',$data);
}









public function searchPatientNombre()
{
$keyword=$this->input->post('keyword');
$data['iduser']=$this->input->post('iduser');
$data['signo_id']=10;
$query ="SELECT nombre, id_p_a FROM  patients_appointments WHERE nombre like '" . $keyword . "%' GROUP BY nombre ORDER BY nombre LIMIT 0,6";
$data['result'] = $this->db->query($query);
$this->load->view('internal-drugstore/select-nombre', $data );


 }


}