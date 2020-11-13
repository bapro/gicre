<?php

$identificar=$this->uri->segment(3);
$id_p_a=$this->uri->segment(4);
$id_d=$this->uri->segment(5);
$id_cm=$this->uri->segment(6);
$data['id_apoint']=$id_p_a;
$data['patient_data']=$this->model_admin->historial_medical($id_p_a); 
$data['rdv_data']=$this->model_admin->getPatientId($id_p_a); 
$data['serv']=$this->model_admin->Serviciomssm($id_d); 
$data['serv_centro']=$this->model_admin->Service_centro($id_cm);  
$data['show_diagno_pat'] = $this->model_admin->show_diagno_pat($id_p_a);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($id_p_a);

$data['billing']="FACTURACION";
if($identificar=="medico"){ 
$this->load->view('admin/billing/bill/get-patient-name-for-billing-after-create-new-cita',$data);
} else{
$this->load->view('admin/billing/bill/centro/get-patient-name-for-billing-after-create-new-cita',$data);
}
?>