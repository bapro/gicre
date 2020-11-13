<?php
$data['countries'] = $this->model_admin->getCountries();
$data['nec'] = $this->model_admin->getNec();
$data['municipios'] = $this->model_admin->getTownships();
$data['provinces']=$this->model_admin->getProvinces();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['causa']=$this->model_admin->getCausa();
$data['doctors'] = $this->model_admin->display_all_doctors();
 	$insert_date= $this->db->select('insert_date')->where('id_user',$id_user)->get('users')->row('insert_date');
	$data['insert_date']= date("d-m-Y H:i",strtotime($insert_date));
	$delay= date('d-m-Y H:i:s', strtotime("+3 months", strtotime($insert_date)));
	$data['delay'] =$delay;
$val = array(
  'MUN_CED' => $ced1,
  'SEQ_CED' => $ced2,
  'VER_CED' => $ced3
  );
$data['photo']=$this->padron_model->getPhoto($val);
$patient = $this->padron_model->getPatientCedulaPad($val);
$data['patient']=$patient;
$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
$lidp=$last_patient_id + 1;
$data['patid']=$lidp;
$ctutor=$this->model_admin->CountTutor($lidp);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($lidp);
 if($perfil=="Medico"){
$data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
$data['seguro_medico'] = $this->model_admin->view_doctor_seguro($id_user);
}else if($perfil=="Asistente Medico"){
$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
$as_medico_centro=$this->db->select('centro_medico')->where('id_doctor',$id_user)->get('doctor_centro_medico')->row('centro_medico');
$data['seguro_medico'] = $this->model_admin->view_doctor_seguro_as($as_medico_centro);
}else{
  $data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
  $data['centro_medico'] = $this->account_demand_model->getCentroMedico();
}
$this->load->view('medico/pacientes-citas/patient-found-in-padron', $data);
 $this->load->view('admin/pacientes-citas/footer_patient_search');
$this->load->view('medico/pacientes-citas/cita-footer');
?>
