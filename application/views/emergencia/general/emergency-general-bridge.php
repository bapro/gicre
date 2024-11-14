<?php
$where = array(
  'id_p'=>$patient_id,
  'id_doc'=>$user_id,
  'id_cm'=>$this->uri->segment(5),
  'origine'=>1
);

$this->db->where($where);
$this->db->delete('hc_save_cied_doc'); 


$data['GinecOb']=$this->model_admin->GinecOb();
$data['selectOne']=$this->model_admin->selectOne();
$data['selectTwo']=$this->model_admin->selectTwo();
$data['drug']=$this->model_admin->droga();
$data['tutor']=$this->model_admin->getTutor($patient_id);
$sql ="SELECT * FROM  emergency_signo_vitales WHERE historial_id=$patient_id";
$data['examenFisico']= $this->db->query($sql);
$pat=$this->db->select('sexo,date_nacer')->where('id_p_a',$patient_id)->get('patients_appointments')->row_array();
$data['sexo']=$pat['sexo'];
$data['date_nacer']=$pat['date_nacer'];
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['patient'] = $this->model_admin->historial_medical($patient_id);
$rows=$this->model_admin->countAnte1($patient_id);
$data['rows']=$rows;
$data['antege']=$rows;
$data['operator']=$user_id;
$data['emergency_id']=1;
$data['idg'] ='';
$this->load->view('emergencia/general/js-links');
$this->load->view('emergencia/general/header',$data);
$this->load->view('emergencia/general/menu-aside',$data);
$data['count_pedia']=$this->model_admin->countant_pedia($patient_id);
$data['how_exam_fis_title']='';
$data['nota_nombre']='none';
$data['nota_signo_vitales']="Hallazgo Positivo";
$data['pedia']=$this->model_admin->Getpedia($patient_id);
$data['row_ant'] = $this->model_admin->showAnte($patient_id);
$data['desa'] = $this->model_admin->showDesarollo($patient_id);
$data['AntOtros']=$this->model_admin->GetAntOtros($patient_id);
$data['HABITOS']=$this->model_admin->GetHabitos($patient_id);
$data['droa'] = $this->model_admin->showDrug($patient_id);

$data['estudios'] = $this->model_admin->estudios();
$data['cuerpo'] = $this->model_admin->cuerpo();
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($patient_id);

$this->load->view('emergencia/general/emergency-general', $data);
//$this->load->view('emergencia/general/emergency-general-data', $data);

//}

$data['num_count_es']=$this->model_admin->hist_count_es($patient_id);

$this->load->view('emergencia/general/footer', $data);

//$this->load->view('admin/historial-medical1/footer-commun', $data);
?>