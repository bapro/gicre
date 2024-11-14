<?php
$data['patient_id']=$patient_id;
$data['user_id']=$user_id;
$data['id_hosp']=$id_hosp;

$data['GinecOb']=$this->model_admin->GinecOb();
$data['selectOne']=$this->model_admin->selectOne();
$data['selectTwo']=$this->model_admin->selectTwo();
$data['drug']=$this->model_admin->droga();
$data['tutor']=$this->model_admin->getTutor($patient_id);
$pat=$this->db->select('sexo,date_nacer')->where('id_p_a',$patient_id)->get('patients_appointments')->row_array();
$data['sexo']=$pat['sexo'];
$data['date_nacer']=$pat['date_nacer'];
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['how_exam_fis_title']='';
$data['nota_signo_vitales']="Hallazgo Positivo";
$data['patient'] = $this->model_admin->historial_medical($patient_id);
$rows=$this->model_admin->countAnte1($patient_id);
$data['rows']=$rows;
$data['antege']=$rows;
$data['operator']=$user_id;
$data['user_medico_name']=$this->db->select('name')->where('id_user',$user_id)->get('users')->row('name');
$data['emergency_id']=1;
$this->load->view('hospitalizacion/historial/js-links');
$this->load->view('hospitalizacion/historial/header',$data);
$this->load->view('hospitalizacion/historial/menu-aside',$data);
$data['count_pedia']=$this->model_admin->countant_pedia($patient_id);
$data['pedia']=$this->model_admin->Getpedia($patient_id);
$data['row_ant'] = $this->model_admin->showAnte($patient_id);
$data['desa'] = $this->model_admin->showDesarollo($patient_id);
$data['AntOtros']=$this->model_admin->GetAntOtros($patient_id);
$data['HABITOS']=$this->model_admin->GetHabitos($patient_id);
$data['droa'] = $this->model_admin->showDrug($patient_id);

$data['estudios'] = $this->model_admin->estudios();
$data['cuerpo'] = $this->model_admin->cuerpo();
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($patient_id);
$data['signo_id'] =3;
$data['id_patient'] =$patient_id;
//------------------------------------------------------------------------------------------------------
$sqlce ="SELECT *  FROM  hosp_conclusion_ingreso WHERE id_patient=$patient_id  order by id desc";
$querycs=$this->db->query($sqlce);
$data['queryce'] =$querycs;
$data['nb_ce'] =$querycs->num_rows();

$this->load->view('hospitalizacion/historial/hospitalizacion-general', $data);
//$this->load->view('admin/emergencia/general/emergency-general-data', $data);

//}

$data['num_count_es']=$this->model_admin->hist_count_es($patient_id);
$this->load->view('hospitalizacion/historial/exam-fisico/footer', $data);

$this->load->view('hospitalizacion/historial/save-no-discharge', $data);

$this->load->view('hospitalizacion/historial/footer', $data);

//$this->load->view('admin/historial-medical1/footer-commun', $data);
?>