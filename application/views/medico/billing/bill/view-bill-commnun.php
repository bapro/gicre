<?php
$idt=$this->db->select('medico,seguro_medico,paciente,centro_medico')->where('idfacc',$id)->get('factura2')->row_array();
$get= array(
'id_seguro' => $idt['seguro_medico'],
'id_doctor' =>$idt['medico']

);
$data['patient_data']=$this->model_admin->historial_medical($idt['paciente']); 
$data['edit_tarifario_centro']=$this->model_admin->tarifario_centro_bill($idt['centro_medico']);
$data['EditProcedTarif']=$this->model_admin->EditProcedTarif($get);

$id_apoint=$this->db->select('id_rdv')->where('idfacc',$id)->get('factura2')->row('id_rdv');

//$filter_date=$this->db->select('filter_date')->where('id_apoint',$id_apoint)->where('filter_date',date('Y-m-d'))->get('rendez_vous')->row('filter_date');
 $filter_date=$this->db->select('insert_date')->where('p_id',$idt['paciente'])->where('user_id',$idt['medico'])->where('centro_medico',$idt['centro_medico'])->order_by('insert_date','desc')->limit(1)->get('h_c_diagno_def_link')->row('insert_date');
 
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($idt['paciente'],$idt['medico'],$idt['centro_medico'],$filter_date);
$h_c_conclusion_diagno =$this->db->select('procedimiento,otros_diagnos')->
where('historial_id',$idt['paciente'])->
where('id_user',$idt['medico'])->
where('centro_medico',$idt['centro_medico'])->
like('inserted_time',date("Y-m-d"))->
get('h_c_conclusion_diagno')->row_array();
$data['procedimiento']=$h_c_conclusion_diagno['procedimiento'];
$data['otros_diagnos']=$h_c_conclusion_diagno['otros_diagnos'];	
$data['billings2']=$this->model_admin->ViewFact2($id);
$data['billings']=$this->model_admin->ViewFact($id);
	//$this->load->view('medico/header',$data);
if($identificar=="privado"){ 
$data['cod']=$this->db->select('codigo')->where('id_seguro',$idt['seguro_medico'])->where('id_doctor',$idt['medico'])
->get('codigo_contrato')->row('codigo');
} else {
	
$data['cod']=$this->db->select('codigo')->where('id_centro',$idt['centro_medico'])
->get('codigo_contrato')->row('codigo');
}
 $seguro_name=$this->db->select('title, rnc')->where('id_sm',$idt['seguro_medico'])
 ->get('seguro_medico')->row_array();
 $data['seguro_name']=$seguro_name['title'];
  $data['rnc']="";
$idt['id_p_a']="";
$data['id_seguro']="";
$data['id_doc']=$idt['medico'];

$doc=$this->db->select('area,exequatur')->where('id_user',$idt['medico'])->get('users')->row_array();
$data['exequatur']=$doc['exequatur'];
$data['area']=$doc['area'];

$data['id_cm']=$idt['centro_medico'];
$data['id_p_a']=$idt['paciente'];
$data['idfacc']=$id;

$data['identificar']=$identificar;
 $data['header']="<div class='row'>
<div class='col-md-12'>
<h2 class='h2' align='center'>FACTURA # $id</h2>
</div>
";
$this->load->view('medico/billing/bill/header-factura',$data);


$this->load->view('medico/billing/bill/view_bill',$data);	
?>