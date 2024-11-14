<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rejuvenate_api extends CI_Controller {
public function __construct()
{
parent::__construct();
   $this->load->model('rejuvenate_model');
   $this->load->library("get_table_data_by_id");
   
}

 function index()
 {
  $data = $this->rejuvenate_model->fetch_all();
  echo json_encode($data->result_array());
 }
 
 
  public function getPatientInfo($id_patient){
 $get_patient_info_by_id=$this->db->select('*')->where('id_p_a',$id_patient)->get('patients_appointments_view')->row_array();
 
 $get_patient_seguro_info_by_id=$this->db->select('*')->where('id_sm',$get_patient_info_by_id['seguro_medico'])->get('seguro_medico')->row_array();
 
 $provincia=$this->db->select('title')->where('id',$get_patient_info_by_id['provincia'])->get('provinces')->row('title');
$patient_adress = $provincia. ", ". $get_patient_info_by_id['calle']. ", ". $get_patient_info_by_id['barrio'];
return [$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id];

}
 
 
function fetch_single()
 {
  if($this->input->post('id'))
  {
   /*$data = $this->rejuvenate_model->fetch_single_user($this->input->post('id'));
   foreach($data as $row)
   {
    $output['first_name'] = $row["nombre"];
    $output['last_name'] = $row["cedula"];
   }*/
   
   $factura_row1=$this->db->select('*')->where('idfacc',$this->input->post('id'))->get('factura2_view')->row_array();
  //---DATOS DEL PACIENTE----

  [$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id]= $this->getPatientInfo($factura_row1['paciente']);
    $output['numero_documento'] = $this->input->post('id');
   $output['paciente_nombres'] = $get_patient_info_by_id["nombre"];
   $output['paciente_cedula'] =$get_patient_info_by_id['cedula'];
  $output['paciente_telefono'] = $get_patient_info_by_id['tel_cel'];
   $output['paciente_correo'] =$get_patient_info_by_id['email'];
    $output['paciente_seguro'] = $get_patient_seguro_info_by_id["title"];
    $output['paciente_plan'] = $get_patient_info_by_id["plan"];
   $output['paciente_direccion'] = $patient_adress;
   
   //----DATOS DEL CENTRO---------------
   
   [$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($factura_row1['centro_medico']);
$data['centro_adress']=$centro_adress;
$centro_type=$get_centro_info_by_id['type'];
   //--DATOS DE LA FACTURA
   
   $datas = $this->rejuvenate_model->fetch_patient_billing($this->input->post('id'));
  // echo json_encode($data->result());
     echo "DATOS DEL PACIENTE\n";
   echo json_encode($output);
   echo "\n------------------------------------------------------------------\nDATOS DE LA FACTURA\n";
    //echo json_encode($data->result_array());
	
	
	foreach($datas as $record) {
if($centro_type=="privado") {
	
$service=$this->db->select('procedimiento')->where('id_tarif',$record->service)->get('tarifarios_test_view')->row('procedimiento');
	
} else {	 
$service=$this->db->select('sub_groupo')->where('id_c_taf',$record->service)->get('centros_tarifarios_test_view')->row('sub_groupo');
}
    $arr[] = array(
                'servicio' => $service,
                'cantidad' => $record->cantidad,
                'precio_unitario' => $record->preciouni,
                'sub_total' => $record->subtotal,
				 'descuento' => $record->descuento,
				 'totpapat' => $record->totpapat,
				 'fecha' => $record->fecha_fac,
            );//assign each sub-array to the newly created array
} 
echo json_encode($arr);
	
  }
 }





}