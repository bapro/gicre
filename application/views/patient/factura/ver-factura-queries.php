<?php
$id=decrypt_url($id);
$identificar=decrypt_url($identificar);
if($id==""){
redirect("$controller/billing_medicos");	
}
$idt=$this->db->select('medico,seguro_medico,paciente,centro_medico, comment, autopor, numauto, canceled')->where('idfacc',$id)->where('canceled',0)->get('factura2')->row_array();
if($idt){
$get= array(
'id_seguro' => $idt['seguro_medico'],
'id_doctor' =>$idt['medico']

);


/*$id_apoint=$this->db->select('id_rdv')->where('idfacc',$id)->get('factura2')->row('id_rdv');

$lastPatConDiag= $this->db->select('id_cdia, procedimiento, otros_diagnos')
->where('historial_id',$idt['paciente'])
->where('id_user',$idt['medico'])
->order_by('id_cdia','DESC')
->get('h_c_conclusion_diagno')
->row_array();

$data['procedimiento']=$lastPatConDiag['procedimiento'];
$data['otros_diagnos']=$lastPatConDiag['otros_diagnos'];	
$con_id_link=$lastPatConDiag['id_cdia'];

 $data['con_id_link']=$con_id_link;
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($con_id_link);
*/
$factura_row1=$this->db->select('*')->where('idfacc',$id)->get('factura2')->row_array();
$data['factura_row1']=$factura_row1;
$array =array(
'patient'=>$factura_row1['paciente'],	
'seguro'=>$factura_row1['seguro_medico'],
'centro'=>$factura_row1['centro_medico'],
'doctor'=>$factura_row1['medico']	
);



[$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id]= $this->get_table_data_by_id->getPatientInfo($idt['paciente']);
$data['patient_adress']=$patient_adress;

[$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($factura_row1['centro_medico']);
$data['centro_adress']=$centro_adress;


[$get_doctor_info_by_id, $doctor_area]= $this->get_table_data_by_id->getDoctorInfo($factura_row1['medico']);
$data['get_doctor_info_by_id']=$get_doctor_info_by_id;
$data['doctor_area']=$doctor_area;
[$codigo_contrato, $password, $cedulaFormat, $disabledNap]= $this->get_table_data_by_id->getCodigoContrato($get_centro_info_by_id['type'], $factura_row1['centro_medico'], $factura_row1['seguro_medico'], $factura_row1['medico']);

$data['get_centro_info_by_id']=$get_centro_info_by_id;

$data['codigo_contrato']=$codigo_contrato;
$data['get_patient_seguro_info_by_id']=$get_patient_seguro_info_by_id;
$data['get_patient_info_by_id']=$get_patient_info_by_id;


 $sessions_data = array(
'seguroTitle'=> $get_patient_seguro_info_by_id['title'],
'patientPlan'  =>$get_patient_info_by_id['plan'],
'doctor'  =>$factura_row1['medico'],
'centro'  =>$factura_row1['centro_medico'],
'seguroId'  =>$factura_row1['seguro_medico']
);
$data['values_container_decrpyted']= $sessions_data;
 //$tarifarios= $this->get_table_data_by_id->getTarifariosPorDoctorPrivado($sessions_data);
//$tarifarios_centro= $this->get_table_data_by_id->getTarifariosPorCentro($factura_row1['centro_medico'], $factura_row1['seguro_medico']);
//$data['tarifarios']=$tarifarios;
//$data['tarifarios_centro']=$tarifarios_centro;

if($get_centro_info_by_id['type']=="privado") {
$tipo_tarifario="Doctor Tarifarios";
 $controller_to_search_tariff_monto='get_service_precio';

} else{
$tipo_tarifario="Centro Tarifarios";
 $controller_to_search_tariff_monto='get_service_precio_centro';
}

$data['tipo_tarifario']=$tipo_tarifario;

$data['centro_type']=$get_centro_info_by_id['type'];
$data['idfacc']=$id;
$data['controller_to_search_tariff_monto']=$controller_to_search_tariff_monto;

$data['fecha_factura']=$factura_row1['fecha'];	
$data['comment']=$idt['comment'];
$data['autopor']=$idt['autopor'];
$data['numauto']=$idt['numauto'];
//if($factura_row1['seguro_medico']==11){
$factura_modalidad_pago=$this->db->select('*')->where('id_factura',$id)->get('factura_modalidad_pago')->row_array();
if($factura_modalidad_pago){
$tasa_cambio_amt=$this->db->select('tasa_dolar, tasa_euro')->where('id_doctor',$idt['medico'])->get('tasa_de_cambio')->row_array();
$data['pendienteCaja']=$factura_modalidad_pago['pendienteCaja'];
$data['tarjeta']=$factura_modalidad_pago['tarjeta'];
$data['transferencia']=$factura_modalidad_pago['transferencia'];
$data['effectivo']=$factura_modalidad_pago['effectivo'];
$data['cheque']=$factura_modalidad_pago['cheque'];	
$data['disabled_modalidad_de_pago']='disabled';
$data['checqueNumero']=$factura_modalidad_pago['checqueNumero'];
$data['modalidadDePagoId']=$factura_modalidad_pago['id'];
$data['btn_fecha_com']="";	
$data['tipo_monena']=$factura_modalidad_pago['money_device'];
if($factura_modalidad_pago['money_device'] =="USD$")	{
	$data['tasa_cambio']=$tasa_cambio_amt['tasa_dolar'];	
}elseif($factura_modalidad_pago['money_device'] =="€"){
	$data['tasa_cambio']=$tasa_cambio_amt['tasa_euro'];	
}else{
	$data['tasa_cambio']=0;		
}
}else{
	
$data['pendienteCaja']='';
$data['tarjeta']='';
$data['transferencia']='';
$data['effectivo']='';
$data['cheque']='';	
$data['disabled_modalidad_de_pago']='disabled';
$data['checqueNumero']='';
$data['modalidadDePagoId']='';
$data['btn_fecha_com']="";	
$data['tipo_monena']='';	
	
$data['tasa_cambio']='RD$';	
}
$data['centro_type_get']=$get_centro_info_by_id['type'];
$data['USER_CONTROLLER']=$this->session->userdata('USER_CONTROLLER');
$data['disabledNap']='';
$data['ws']='none';

 $facturaInfo=$this->db->select('inserted_time, updated_time, created_by, updated_by, pat_id')->where('id2',$id)->get('factura')->row_array();
  $created_by=$this->db->select('name')->where('id_user',$facturaInfo['created_by'])->get('users')->row('name');
   $updated_by=$this->db->select('name')->where('id_user',$facturaInfo['updated_by'])->get('users')->row('name');
   
  $insed_time = date("d-m-Y H:i:s", strtotime($facturaInfo['inserted_time']));
 $upda_time = date("d-m-Y H:i:s", strtotime($facturaInfo['updated_time']));
$data['patId']=$facturaInfo['pat_id'];
$this->load->view('patient/factura/patient-invoice',$data);

echo "<div class='alert alert-primary p-1 text-center' style='font-size:13px' role='alert'>
creado por $created_by $insed_time cambiado por $updated_by $upda_time 
</div>";

}else{
	$data['canceled_fac_id']=$id;
	$this->load->view('patient/factura/canceled-invoice-page',$data);
}

	
?>