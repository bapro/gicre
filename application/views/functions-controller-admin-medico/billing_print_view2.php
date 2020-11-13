<?php
$idfacc = $this->input->get('idfacc');	
$identificar = $this->input->get('identificar');

$paciente=$this->db->select('paciente')->where('idfacc',$idfacc)->get('factura2')->row('paciente');
$data['idfacc']=$idfacc;
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($paciente);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($paciente);
$data['billing1']=$this->model_admin->showBilling1($idfacc);
$data['billing2']=$this->model_admin->showBilling2($idfacc);
if($identificar=="doctor"){
$this->load->view('admin/billing/bill/print_view',$data);
} else {
$this->load->view('admin/billing/bill/centro/print_view',$data);
}
?>