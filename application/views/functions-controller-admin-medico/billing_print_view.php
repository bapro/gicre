<?php

$identificar = $this->input->get('identificar');

$last_bill_id=$this->db->select('idfacc,paciente')->order_by('idfacc','desc')->limit(1)->get('factura2')->row_array();
$data['idfacc']=$last_bill_id['idfacc'];
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($last_bill_id['paciente']);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($last_bill_id['paciente']);
$data['billing1']=$this->model_admin->showBilling1($last_bill_id['idfacc']);
$data['billing2']=$this->model_admin->showBilling2($last_bill_id['idfacc']);
if($identificar=="doctor"){
$this->load->view('admin/billing/bill/print_view',$data);
} else {
$this->load->view('admin/billing/bill/centro/print_view',$data);
}
?>