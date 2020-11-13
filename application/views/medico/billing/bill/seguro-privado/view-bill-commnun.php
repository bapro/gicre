<?php
$idt=$this->db->select('medico,seguro_medico,paciente,centro_medico,numfac2')->where('idfacc',$id)->get('factura2')->row_array();
$get= array(
'id_seguro' => $idt['seguro_medico'],
'id_doctor' =>$idt['medico']

);
$data['patient_data']=$this->model_admin->historial_medical($idt['paciente']); 
$data['edit_tarifario_centro']=$this->model_admin->tarifario_centro_bill($idt['centro_medico']);
$data['EditProcedTarif']=$this->model_admin->EditProcedTarif($get);
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($idt['paciente'],$idt['medico'],$idt['centro_medico'],0);

$data['procedimiento'] =$this->db->select('procedimiento')->
where('historial_id',$idt['paciente'])->
where('id_user',$idt['medico'])->
where('centro_medico',$idt['centro_medico'])->
get('h_c_conclusion_diagno')->row('procedimiento');

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
$num=$idt['numfac2'];

$data['header']="<div class='row'>
<div class='col-md-12'>
<h2 class='h2' align='center'>FACTURA # $num</h2>
</div>
";
$this->load->view('medico/billing/bill/seguro-privado/header-factura',$data);


$this->load->view('medico/billing/bill/seguro-privado/view_bill',$data);	
?>