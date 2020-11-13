<?php
$where = array(
  'id_p'=>$patient_id,
  'id_doc'=>$user_id,
  'id_cm'=>$this->uri->segment(5),
  'origine'=>1
);

$this->db->where($where);
$this->db->delete('hc_save_cied_doc'); 

$data['patient_id']=$patient_id;
$data['user_id']=$user_id;

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
$data['idg'] =1;

$sql ="SELECT *  FROM  hosp_orden_medica_recetas WHERE historial_id=$patient_id && kardex=0 order by id_i_m desc";
$query=$this->db->query($sql);
$data['queryexneu'] =$query;
$data['nb_ex_neu'] =$query->num_rows();
//-----------------------------------------------------------------------------------
$sqlkx ="SELECT *  FROM  hosp_orden_medica_recetas WHERE historial_id=$patient_id && kardex=1 order by id_i_m desc";
$querykx=$this->db->query($sqlkx);
$data['querykardex'] =$querykx;
$data['nb_kardex'] =$querykx->num_rows();



$this->load->view('hospitalizacion/historial/hospitalizacion-general', $data);
//$this->load->view('admin/emergencia/general/emergency-general-data', $data);

//}

$data['num_count_es']=$this->model_admin->hist_count_es($patient_id);

$this->load->view('hospitalizacion/historial/footer', $data);

//$this->load->view('admin/historial-medical1/footer-commun', $data);
?>