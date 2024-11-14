<?php
 $doc_seg_privado = array(
'id_doctor'=> $id_d,
'id_seguro'  =>$id_seg,
'id_cm'  =>$id_cm
);
$data['id_apoint']=$id_apoint;

$plan=$this->db->select('plan')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('plan');

 $doc_seg = array(
'id_doctor'=> $id_d,
'id_seguro'  =>$id_seg,
'plan'  =>$plan
);



$data['id_doc']=$id_d;
$data['id_cm']=$id_cm;
$data['id_seguro']=$id_seg;
 $seguro_name=$this->db->select('title, rnc')->where('id_sm',$id_seg)
 ->get('seguro_medico')->row_array();
 $data['seguro_name']=$seguro_name['title'];
  $data['rnc']=$seguro_name['rnc'];
$doc=$this->db->select('area,exequatur')->where('id_user',$id_d)->get('users')->row_array();
$data['exequatur']=$doc['exequatur'];
$data['area']=$doc['area'];
$data['consultaMedEsp']=$this->db->select('procedimiento')->where('id_doctor',$id_d)->where('id_seguro',$id_seg)->like('procedimiento','CONSULTAMEDICINAESPECIALIZADA')->get('tarifarios')->row('procedimiento');
$data['id_p_a']=$id_p_a;
$data['patient_data']=$this->model_admin->historial_medical($id_p_a); 

$serv=$this->model_admin->Serviciomssm($doc_seg); 
$servprivado=$this->model_admin->ServiciomssmPrivado($doc_seg_privado);
$serv_centro=$this->model_admin->Service_centro($id_cm,$id_seg);  
$data['serv_centro']=$serv_centro;


$lastPatConDiag= $this->db->select('id_cdia, procedimiento, otros_diagnos')
->where('historial_id',$id_p_a)
->where('id_user',$id_d)
->order_by('id_cdia','DESC')
->get('h_c_conclusion_diagno')
->row_array();

$data['procedimiento']=$lastPatConDiag['procedimiento'];
$data['otros_diagnos']=$lastPatConDiag['otros_diagnos'];	
$con_id_link=$lastPatConDiag['id_cdia'];

 $data['con_id_link']=$con_id_link;
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($con_id_link);


$data['billing']="FACTURACION";
if($identificar=="privado"){ 
$data['cod']=$this->db->select('codigo')->where('id_seguro',$id_seg)->where('id_doctor',$id_d)->get('codigo_contrato')->row('codigo');
$password=$this->db->select('passwordDoc')->where('id_doctor',$id_d)->where('id_seguro',$id_seg)->get('doctor_web_services_credentials')->row('passwordDoc');

$cedulaDoc=$this->db->select('cedula')->where('id_user',$id_d)->get('users')->row('cedula');
$disabledNap="";
$data['consultar_nap']="consultar_nap";
} else {
$data['cod']=$this->db->select('codigo')->where('id_centro',$id_cm)->where('id_seguro',$id_seg)->get('codigo_contrato')->row('codigo');

$credentialsCentro=$this->db->select('passwordCentro, id_user')->where('id_centro',$id_cm)->where('id_seguro',$id_seg)->get('doctor_web_services_credentials')->row_array();
$password=$credentialsCentro['passwordCentro'];

$cedulaDoc=$this->db->select('cedula')->where('id_user',$credentialsCentro['id_user'])->get('users')->row('cedula');

$disabledNap="disabled";
$data['consultar_nap']="consultar_nap_centro";
}

$ced1=substr($cedulaDoc,0,3);
$ced2=substr($cedulaDoc,3,7);
$ced3=substr($cedulaDoc,-1);

$data['cedulaFormat'] = $ced1.'-'.$ced2.'-'.$ced3;

$data['password']=$password;
$data['disabledNap']=$disabledNap;
if($password){
	$data['ws'] = "";
}else{
$data['ws'] = "none";

}
$data['identificar']=$identificar;
if($seguro_name['title']=="PRIVADO"){
$this->load->view('medico/billing/bill/seguro-privado/header-factura',$data);
$data['serv']=$servprivado;
$data['planOcentro']=$id_cm;
$this->load->view('medico/billing/bill/seguro-privado/get-patient-name-for-billing-after-create-new-cita',$data);
}else{
$this->load->view('medico/billing/bill/header-factura',$data);
$data['serv']=$serv;
$data['planOcentro']=$plan;
$data['patientNss']=$this->db->select('input_name')->where('patient_id',$id_p_a)->get('saveinput')->row('input_name');
//$data['patientNss']="021827151";
$this->load->view('medico/billing/bill/consultar-nap',$data);
$data['wslCentro']="http://arssenasa2.gob.do/webservices/webservicesautorizaciones/WSAutorizacionLaboratorio.asmx?WSDL";
$this->load->view('medico/billing/bill/original-get-patient-name-for-billing-after-create-new-cita',$data);
//$this->load->view('medico/billing/bill/factura-footer',$data);
}


?>