<?php
$id=$this->uri->segment(3);
$type=$this->uri->segment(4);

$idt=$this->db->select('medico,seguro_medico,paciente,centro_medico')->where('idfacc',$id)->get('factura2')->row_array();
$get= array(
'id_seguro' => $idt['seguro_medico'],
'id_doctor' =>$idt['medico']

);
$centro_medico =$idt['centro_medico'];
$data['edit_tarifario_centro']=$this->model_admin->tarifario_centro_bill($centro_medico);
$data['EditProcedTarif']=$this->model_admin->EditProcedTarif($get);
//$data['serv']=$this->model_admin->Serviciomssm($id_doctor);
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($idt['paciente']);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($idt['paciente']);
$data['billings2']=$this->model_admin->ViewFact2($id);
$data['billings']=$this->model_admin->ViewFact($id);
$data['diag_pro']=$this->model_admin->Diag_pro();
$data['diag_pres']=$this->model_admin->Diag_pres();

if($type=="privado"){
$this->load->view('admin/billing/bill/bill',$data);
} else{
$this->load->view('admin/billing/bill/centro/bill',$data);	
}
?>