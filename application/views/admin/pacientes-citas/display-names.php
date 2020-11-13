<?php
$executionStartTime = microtime(true);
$query_admedicall = $this->model_admin->findPatientByNombre($nombre,$patient_apellido,$patient_apellido2);
$count_admedciall=count($query_admedicall);

$val = array(
  'patient_nombres'=> $nombre,
  'patient_apellido'=> $patient_apellido,
  'patient_apellido2'=> $patient_apellido2
  );

 //else if ($count_admedciall==0)
 $total_rows_pad= $this->padron_model->getPatientNameOnSelectPadCount($val);
 if($this->input->get('base_de_datos')=="padron")
 {
 $executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
//$data['patient_padron']=$query_padron;
$data['base']="Padron";
$data['number_found']=$this->padron_model->getPatientNameOnSelectPadCount($val);
$data['now'] =number_format($now,3);

$config = array();
if($perfil=='Admin'){
$config["base_url"] = base_url() . "admin/patient_paginate";
}else{
$config["base_url"] = base_url() . "medico/patient_paginate";
}
$config["total_rows"] = $this->padron_model->getPatientNameOnSelectPadCount($val);
$config["per_page"] = 10;
$config["uri_segment"] = 3;
$config['use_page_numbers'] = TRUE;
$config['reuse_query_string']=TRUE;
$config['full_tag_open']    = "<ul class='pagination'>";
       $config['full_tag_close']   = "</ul>";
       $config['num_tag_open']     = '<li>';
       $config['num_tag_close']    = '</li>';
       $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
       $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
       $config['next_tag_open']    = "<li>";
       $config['next_tagl_close']  = "</li>";
       $config['prev_tag_open']    = "<li>";
       $config['prev_tagl_close']  = "</li>";
       $config['first_tag_open']   = "<li>";
       $config['first_tagl_close'] = "</li>";
       $config['last_tag_open']    = "<li>";
       $config['last_tagl_close']  = "</li>";
       $config['first_link'] = 'Primero';
       $config['last_link'] = 'Último';
$this->pagination->initialize($config);

$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

$data["links"] = $this->pagination->create_links();

$data['patient_padron'] = $this->padron_model->getPatientNameOnSelectPad($val, $config["per_page"], $page);

$this->load->view('admin/pacientes-citas/search-patient-result-padron-by-name', $data);

 }

else{
$data['user_id']=$user_id;
  $data['patient_admedicall']=$query_admedicall;
  $data['base']="Admedicall";
  $data['number_found']=$count_admedciall;
  $executionEndTime = microtime(true);
  $now = $executionEndTime - $executionStartTime;
  $data['now'] =number_format($now,3);

  $this->load->view('admin/pacientes-citas/search-patient-result-nec', $data);

}
?>
