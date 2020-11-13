<?php
$plan=$this->db->select('plan')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('plan');
$identificar=$this->db->select('type')->where('id_m_c',$id_cm)->get('medical_centers')->row('type');  
$id_apoint='fac';
$data['id_apoint']=$id_apoint;
$data['id_p_a']=$id_p_a;
$data['id_seguro']=$id_seg;
$data['id_doc']=$id_d;
$data['id_cm']=$id_cm;

 $doc_seg = array(
'id_doctor'=> $id_d,
'id_seguro'  =>$id_seg,
'plan'  =>$plan
);

 $doc_seg_privado = array(
'id_doctor'=> $id_d,
'id_seguro'  =>$id_seg,
'id_cm'  =>$id_cm
);

 $seguro_name=$this->db->select('title, rnc')->where('id_sm',$id_seg)
 ->get('seguro_medico')->row_array();
 $data['seguro_name']=$seguro_name['title'];
  $data['rnc']=$seguro_name['rnc'];
$doc=$this->db->select('area,exequatur')->where('id_user',$id_d)->get('users')->row_array();
$data['exequatur']=$doc['exequatur'];
$data['area']=$doc['area'];
$filter_date=$patient=$this->db->select('filter_date')->where('id_apoint',$id_apoint)->where('filter_date',date('Y-m-d'))->get('rendez_vous')->row('filter_date');
$data['patient_data']=$this->model_admin->historial_medical($id_p_a); 
$serv=$this->model_admin->Serviciomssm($doc_seg); 
$servprivado=$this->model_admin->ServiciomssmPrivado($doc_seg_privado);
$serv_centro=$this->model_admin->Service_centro($id_cm,$id_seg);  
$data['serv_centro']=$serv_centro;
$data['show_diagno_pat'] = $this->model_admin->show_diagno_pat($id_p_a,$id_d,$id_cm,$filter_date);
$h_c_conclusion_diagno =$this->db->select('procedimiento,otros_diagnos')->
where('historial_id',$id_p_a)->
where('id_user',$id_d)->
where('centro_medico',$id_cm)->
where('current_day',$filter_date)->
get('h_c_conclusion_diagno')->row_array();
$data['procedimiento']=$h_c_conclusion_diagno['procedimiento'];
$data['otros_diagnos']=$h_c_conclusion_diagno['otros_diagnos'];

$data['billing']="FACTURACION";
if($identificar=="privado"){ 
$data['cod']=$this->db->select('codigo')->where('id_seguro',$id_seg)->where('id_doctor',$id_d)
->get('codigo_contrato')->row('codigo');
} else {
	
$data['cod']=$this->db->select('codigo')->where('id_centro',$id_cm)
->get('codigo_contrato')->row('codigo');
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
$this->load->view('medico/billing/bill/get-patient-name-for-billing-after-create-new-cita',$data);	
}

	
?>	
