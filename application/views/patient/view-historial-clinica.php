<?php

$data['selectOne']=$this->model_admin->selectOne();
$data['selectTwo']=$this->model_admin->selectTwo();
$ctutor=$this->model_admin->CountTutor($historial_id);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($historial_id);
$data['HISTORIAL_MEDICAL'] = $this->model_admin->historial_medical($historial_id);
$data['rowpm']=$this->model_admin->countPatMed($historial_id);
$data['desa'] = $this->model_admin->showDesarollo($historial_id);

$data['historial_id']=$historial_id;
$data['id_historial']=$historial_id;
$data['patientAdress'] = $this->model_admin->historial_medical($historial_id);

//---------------------------------------------------------------------
$idpatient= $historial_id;
$data['nec'] = $this->model_admin->getNec();
$data['idpatient']=$idpatient;
$data['patient'] = $this->model_admin->historial_medical($idpatient);
$data['patid']=$idpatient;

$data['drug']=$this->model_admin->droga();
$rows=$this->model_admin->countAnte1($historial_id);
$data['antege']=$rows;
$data['user_id']=$user_id;
$data['perfil']='Patiente';
  $data['areaid']=0;
$this->load->view('admin/historial-medical1/js-links');
 $data['desa'] = $this->model_admin->showDesarollo($historial_id);
$data['AntOtros']=$this->model_admin->GetAntOtros($historial_id);
$data['HABITOS']=$this->model_admin->GetHabitos($historial_id);
$data['droga'] = $this->model_admin->showDrug($historial_id);
 
$row_ant = $this->model_admin->showAnte($historial_id);
$data['row_ant']=$row_ant;

$today=date('Y-m-d');
 
echo '<style>
font{display:none}
</style>'
;
//$this->load->view('patient/header-empty-data',$data);

//$this->load->view('patient/menu-aside',$data);
if($rows < 1){
$this->load->view('patient/historial-medical', $data);
$this->load->view('admin/historial-medical1/footer-empty');
}else{
$this->load->view('patient/data/historial-medical', $data);
$this->load->view('admin/historial-medical1/all-data/footer-ant-general');	
}
$data['centro_medico'] =0;
$data['type'] =0;
$data['id_apoint'] =0;
$data['id_segu'] =0;
$data['emergency_id'] =0;
$data['hist'] =0;
$this->load->view('admin/historial-medical1/footer-commun', $data);

$this->load->view('patient/saveHistStandart', $data);

echo '<div class="modal fade" id="relacion_familiares"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>';
?>