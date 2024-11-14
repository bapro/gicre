<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_factura_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('navigation/account_demand_model');
		$this->load->model('model_general');
		$this->load->model('model_admin');
		 $this->load->library('form_validation'); 
		 $this->load->library("create_patient_form_lib");
		 $this->load->library("get_table_data_by_id");
		 $this->ID_USER=$this->session->userdata['user_id'];
		 $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		 $this->ID_PATIENT = $this->session->userdata('ID_PATIENT');
		   $this->ADMIN_POSITION_CENTRO = $this->session->userdata('admin_position_centro');
		  $this->PERFIL = $this->session->userdata('user_perfil');
		    if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login/backTologin');
}
	
		
	}
	
	
	
	
  function getCentroType() {
        $type = $this->db->select('type')->where('id_m_c', $this->input->post('id_centro'))->get('medical_centers')->row('type');
        echo $type;
    }


 function showForm()
{

 [$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors]= $this->create_patient_form_lib->getCentroAndSeguroByPerfil(0);
    $data['result_centro_medicos'] = $result_centro_medicos;
  $data['result_doc_by_centers'] = $result_doc_by_centers;
$data['result_doctors'] = $result_doctors;
$this->load->view('patient/factura/search', $data);
}


function saveInvoice()
{
if($this->input->post('numauto') !="" &&
 $this->input->post('autopor') !="" &&
 $this->input->post('fecha') !="" &&
 $this->input->post('service') !="" &&
 $this->input->post('cant') !="" &&
 $this->input->post('prec') !="" &&
 $this->input->post('servField') !=""
 )
 {

 
 $response['status'] = 0;
$response['message'] = "";
$this->save_factura_register($this->input->post('centro_medico'), $this->input->post('medico'));

//-----------------------------------------------------------------------------------------------


$insert_date=date("Y-m-d H:i:s");
//$filter_date=date("Y-m-d");
$filter_date=date("Y-m-d", strtotime($this->input->post('fecha')));
$save2= array(
'medico' =>$this->input->post('medico'),
'area' =>$this->input->post('area'),
'centro_medico' =>$this->input->post('centro_medico'),
'seguro_medico' =>$this->input->post('seguro_medico'),
'codigoprestado' =>$this->input->post('codigoprestado'),
'paciente' =>$this->ID_PATIENT,
'fecha' =>$this->input->post('fecha'),
'filter_date' =>$filter_date,
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'comment' =>$this->input->post('comment'),
'numfac' =>$this->session->userdata('exnum3'),
'numfac2' =>$this->session->userdata('num3'),
'inserted_by' =>$this->ID_USER,
'inserted_time' =>$insert_date,
'update_date' =>$insert_date,
'updated_by' =>$this->ID_USER,
'id_rdv' =>$this->input->post('id_apoint')
);
$last_bill_id=$this->model_admin->SaveBill2($save2);

if($last_bill_id){
		
	
$response['status'] = encrypt_url($last_bill_id);
$response['message'] = '';
$fecha_fac=date("d-m-Y H:i", strtotime($this->input->post('fecha')));
$exequatur=$this->db->select('exequatur')->where('id_user',$this->input->post('medico'))->get('users')->row('exequatur');

//===========================================================
$service = $this->input->post('service');
$cantidad = $this->input->post('cantidad');
$preciouni = $this->input->post('preciouni');
$subtotal = $this->input->post('subtotal');
$totalpaseg = $this->input->post('totalpaseg');
$descuento = $this->input->post('descuento');
$totpapat = $this->input->post('totpapat');
$medico =$this->input->post('medico');
$seguro_medico =$this->input->post('seguro_medico');

for ($i = 0; $i < count($service); ++$i ) {
$serv = $service[$i];
$cant = $cantidad[$i];
$pre = $preciouni[$i];
$sub = $subtotal[$i];
$totpas = $totalpaseg[$i];
$desc = $descuento[$i];
$totpap = $totpapat[$i];


if($serv){
$save= array(
'service' =>$serv,
'cantidad' => $cant,
'preciouni' =>$pre,
'subtotal' => $sub,
'totalpaseg' =>$totpas,
'descuento' => $desc,
'totpapat' => $totpap,
'id2' =>$last_bill_id,
'pat_id' =>$this->ID_PATIENT,
'area_id' =>$this->input->post('area'),
'medico2' =>$this->input->post('medico'),
'seguro' =>$this->input->post('seguro_medico'),
'center_id' =>$this->input->post('centro_medico'),
'filter' =>$filter_date,
'created_by' =>$this->ID_USER,
'inserted_time' =>$insert_date,
'updated_time' =>$insert_date,
'updated_by' =>$this->ID_USER,
'fecha_fac' =>$fecha_fac
);
$this->model_admin->SaveBill($save);
}
if($this->db->affected_rows() == 0) // data not inserted
{
$response['status'] =  2;
$response['message'] = "la inserción fallo (id:$last_bill_id)";
//delete new entry in factura2 and factura
$this->model_admin->delete_factura2($last_bill_id);
$this->model_admin->delete_factura($last_bill_id);
}
}
$response['status'] = encrypt_url($last_bill_id);
$response['message'] = "la inserción fallo (id:$last_bill_id)";
$this->model_admin->DeleteEmptyBill();




} else{
$response['status'] =  1;
$response['message'] = 'la inserción fallo!';
}
}else{
 $response['status'] =  3;
$response['message'] = "Los campos con bordillos rojos son obligatorios !";	
}




}











function save_factura_register($centro, $medico){
$query = $this->db->get_where('factura_num',array('centro'=>$centro));
if($query->num_rows() == 0)
{
$save= array(
'centro' =>$this->input->post('centro_medico'),
'num' =>1
);
$idnum=$this->model_admin->SaveBillNum($save);
}
else{
$num=$this->db->select('num')->where("centro",$centro)->order_by('id','desc')->limit(1)->get('factura_num')->row('num');
$num=$num+1;
$save= array(
'centro' =>$this->input->post('centro_medico'),
'num' =>$num
);
$idnum=$this->model_admin->SaveBillNum($save);
}

$num=$this->db->select('centro,num')->where('id',$idnum)->get('factura_num')->row_array();
$num1=$num['centro'];
$num2=$num['num'];
$num3="$num1-$num2";

//----------------------------------------------------------------------------------------
$exequatur=$this->db->select('exequatur')->where('id_user',$medico)->get('users')->row('exequatur');


$query2 = $this->db->get_where('factura_num',array('exequatur'=>$exequatur));
if($query2->num_rows() == 0)
{
$save= array(
'exequatur' =>$exequatur,
'num' =>1
);
$idnum2=$this->model_admin->SaveBillNum($save);
}
else{
$num=$this->db->select('num')->where("exequatur",$exequatur)->order_by('id','desc')->limit(1)->get('factura_num')->row('num');
$num=$num+1;
$save= array(
'exequatur' =>$exequatur,
'num' =>$num
);
$idnum2=$this->model_admin->SaveBillNum($save);
}

$exnum=$this->db->select('exequatur,num')->where('id',$idnum2)->get('factura_num')->row_array();
$exnum1=$exnum['exequatur'];
$exnum2=$exnum['num'];
$exnum3="$exnum1-$exnum2";

$data = array(
'exnum3'=>$exnum3,
'num3'=>$num3
);
$this->session->set_userdata($data);
}














function saveInvoicePrivado()
{
if($this->input->post('numauto') !="" &&
 $this->input->post('autopor') !="" &&
 $this->input->post('fecha') !="" &&
 $this->input->post('service') !="" &&
 $this->input->post('cant') !="" &&
 $this->input->post('prec') !="" &&
 $this->input->post('servField') !="" &&
$this->input->post('pendienteCaja') ==0
 )
 {

 
 $response['status'] = 0;
$response['message'] = "";
$this->save_factura_register($this->input->post('centro_medico'), $this->input->post('medico'));

//-----------------------------------------------------------------------------------------------


$insert_date=date("Y-m-d H:i:s");
//$filter_date=date("Y-m-d");
$filter_date=date("Y-m-d", strtotime($this->input->post('fecha')));
$save2= array(
'medico' =>$this->input->post('medico'),
'area' =>$this->input->post('area'),
'centro_medico' =>$this->input->post('centro_medico'),
'seguro_medico' =>$this->input->post('seguro_medico'),
'codigoprestado' =>$this->input->post('codigoprestado'),
'paciente' =>$this->ID_PATIENT,
'fecha' =>$this->input->post('fecha'),
'filter_date' =>$filter_date,
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'comment' =>$this->input->post('comment'),
'numfac' =>$this->session->userdata('exnum3'),
'numfac2' =>$this->session->userdata('num3'),
'inserted_by' =>$this->ID_USER,
'inserted_time' =>$insert_date,
'update_date' =>$insert_date,
'updated_by' =>$this->ID_USER,
'id_rdv' =>$this->input->post('id_apoint')
);
$last_bill_id=$this->model_admin->SaveBill2($save2);

if($last_bill_id){
	

$mod= array(
'pendienteCaja' =>$this->input->post('pendienteCaja'),
'tarjeta' =>$this->input->post('tarjeta'),
'transferencia' =>$this->input->post('transferencia'),
'effectivo' =>$this->input->post('effectivo'),
'cheque' =>$this->input->post('cheque'),
'id_patient' =>$this->ID_PATIENT,
'checqueNumero' =>$this->input->post('checqueNumero'),
'inserted_time' =>$filter_date,
'id_factura' =>$last_bill_id,
'id_rendv' =>$this->input->post('id_apoint'),
'inserted_by' =>$this->ID_USER,
'money_device'=>$this->input->post('money_device')

);
$this->db->insert('factura_modalidad_pago', $mod);	
	
	
	
$response['status'] = encrypt_url($last_bill_id);
$response['message'] = '';
$fecha_fac=date("d-m-Y H:i", strtotime($this->input->post('fecha')));

$this->session->set_userdata('last_bill_id',$last_bill_id);
$this->session->set_userdata('medico',$this->input->post('medico'));
$this->session->set_userdata('factura_inserted_by',$this->input->post('inserted_by'));
$centro_type=$this->db->select('type')->where('id_m_c',$this->input->post('centro_medico'))->get('medical_centers')->row('type');
$this->session->set_userdata('centro_medico',$this->input->post('centro_medico'));
$this->session->set_userdata('centro_type',$centro_type);
$this->session->set_userdata('is_admin',$this->input->post('is_admin'));
$exequatur=$this->db->select('exequatur')->where('id_user',$this->input->post('medico'))->get('users')->row('exequatur');

//===========================================================
$service = $this->input->post('service');
$cantidad = $this->input->post('cantidad');
$preciouni = $this->input->post('preciouni');
$subtotal = $this->input->post('subtotal');
$totalpaseg = $this->input->post('totalpaseg');
$descuento = $this->input->post('descuento');
$totpapat = $this->input->post('totpapat');
$medico =$this->input->post('medico');
$seguro_medico =$this->input->post('seguro_medico');

for ($i = 0; $i < count($service); ++$i ) {
$serv = $service[$i];
$cant = $cantidad[$i];
$pre = $preciouni[$i];
$sub = $subtotal[$i];
$totpas = $totalpaseg[$i];
$desc = $descuento[$i];
$totpap = $totpapat[$i];


if($serv){
$save= array(
'service' =>$serv,
'cantidad' => $cant,
'preciouni' =>$pre,
'subtotal' => $sub,
'totalpaseg' =>$totpas,
'descuento' => $desc,
'totpapat' => $totpap,
'id2' =>$last_bill_id,
'pat_id' =>$this->ID_PATIENT,
'area_id' =>$this->input->post('area'),
'medico2' =>$this->input->post('medico'),
'seguro' =>$this->input->post('seguro_medico'),
'center_id' =>$this->input->post('centro_medico'),
'filter' =>$filter_date,
'created_by' =>$this->ID_USER,
'inserted_time' =>$insert_date,
'updated_time' =>$insert_date,
'updated_by' =>$this->ID_USER,
'fecha_fac' =>$fecha_fac
);
$this->model_admin->SaveBill($save);
}
if($this->db->affected_rows() == 0) // data not inserted
{
$response['status'] =  2;
$response['message'] = "la inserción fallo (id:$last_bill_id)";
//delete new entry in factura2 and factura
$this->model_admin->delete_factura2($last_bill_id);
$this->model_admin->delete_factura($last_bill_id);
}
}
$response['status'] = encrypt_url($last_bill_id);
$response['message'] = "la inserción fallo (id:$last_bill_id)";
$this->model_admin->DeleteEmptyBill();
} else{
$response['status'] =  1;
$response['message'] = 'la inserción fallo!';
}
}else{
 $response['status'] =  3;
$response['message'] = "Los campos con bordillos rojos son obligatorios !";	
}
echo json_encode($response);

}


function updatedModalidadDePago(){
		$mod= array(
'pendienteCaja' =>$this->input->post('pendienteCaja'),
'tarjeta' =>$this->input->post('tarjeta'),
'transferencia' =>$this->input->post('transferencia'),
'effectivo' =>$this->input->post('effectivo'),
'cheque' =>$this->input->post('cheque'),
'checqueNumero' =>$this->input->post('checqueNumero'),
'updated_time' =>date("Y-m-d H:i:s"),
'updated_by' =>$this->ID_USER

);
$where = array(
'id' => $this->input->post('modalidadDePagoId')
);
  $this->db->where($where);
$result=$this->db->update('factura_modalidad_pago', $mod);
echo 	$this->input->post('modalidadDePagoId');
}


function update_factura_fecha_com(){
		if($this->input->post('fecha') =="" || $this->input->post('numauto')=="" || $this->input->post('autopor')=="" )
			{
			$response['status'] =  0;
			$response['message'] = "Los campos con * son obligatorios.";
			}else{
		  $save2 = array(
		'updated_by' => $this->ID_USER,
		'fecha'=>$this->input->post('fecha'),
		'filter_date'=>$this->input->post('fecha'),
		'numauto'=>$this->input->post('numauto'),
		'autopor'=>$this->input->post('autopor'),
		'comment'=>$this->input->post('comment'),
		'update_date' => date("Y-m-d H:i:s")
		);
        $this->model_admin->UpdateBill2($this->input->post('idfacc'), $save2);	
		$response['status'] =  1;
			$response['message'] = "Hecho.";
			}
			echo json_encode($response);
}


  function addNewFactura() {
        $update_date = date("Y-m-d H:i:s");
		 $idfacc = $this->input->post('idfacc');

			if($this->input->post('service') =="" || $this->input->post('cantidad') == "" || $this->input->post('preciouni') == "" || $this->input->post('pendienteCaja') !='0.00')
			{
			$response['status'] =  1;
			$response['message'] = "Servicio, cantidad, precio unitario son requeridos <br/> y Pendiente de caja debe igual a 0.00";	
			} else{

			$save = array(
			'service' => $this->input->post('service'), 
			'cantidad' => $this->input->post('cantidad'),
			'preciouni' => $this->input->post('preciouni'),
			'subtotal' => $this->input->post('subtotal'),
			'totalpaseg' => $this->input->post('totalpaseg'), 
			'descuento' => $this->input->post('descuento'), 
			'totpapat' => $this->input->post('totpapat'), 
			'pat_id' => $this->ID_PATIENT,
			'medico2' => $this->input->post('medico'),
			'area_id' => $this->input->post('area_id'),
			'seguro' => $this->input->post('seguro'), 
			'center_id' => $this->input->post('centro'), 
			'filter' => date('Y-m-d'),
			'id2' => $this->input->post('idfacc'),
			'updated_by' => $this->ID_USER,
			'updated_time' => $update_date, 
			'created_by' => $this->ID_USER,
			'inserted_time' => $update_date, 
			'fecha_fac' => date("d-m-Y H:i"));
            $this->model_admin->SaveBill($save);
			
			if($this->input->post('pendienteCaja') =='0.00'){
			
				$mod= array(
				'pendienteCaja' =>$this->input->post('pendienteCaja'),
				'tarjeta' =>$this->input->post('tarjeta'),
				'transferencia' =>$this->input->post('transferencia'),
				'effectivo' =>$this->input->post('effectivo'),
				'cheque' =>$this->input->post('cheque'),
				'checqueNumero' =>$this->input->post('checqueNumero'),
				'updated_time' =>date("Y-m-d H:i:s"),
				'updated_by' =>$this->ID_USER

				);
				$where = array(
				'id' => $this->input->post('modalidadDePagoId')
				);
				$this->db->where($where);
				$result=$this->db->update('factura_modalidad_pago', $mod);
			}
				 $response['status'] =  0;
          $response['message'] = "";
		}
	echo json_encode($response);
    }



    function updateFactura() {
        $update_date = date("Y-m-d H:i:s");
		 $idfacc = $this->input->post('idfacc');
      
if($this->input->post('service') =="" || $this->input->post('cantidad') == "" || $this->input->post('preciouni') == "" || $this->input->post('totalpaseg') == "")
{
 $response['status'] =  1;
$response['message'] = "Servicio, cantidad, precio unitario son requeridos !";	
} else {
            $save = array('service' => $this->input->post('service'),
			'cantidad' => $this->input->post('cantidad'),
			'preciouni' => $this->input->post('preciouni'), 
			'subtotal' => $this->input->post('subtotal'),
			'totalpaseg' => $this->input->post('totalpaseg'),
			'descuento' => $this->input->post('descuento'),
			'totpapat' => $this->input->post('totpapat'),
			'updated_by' => $this->ID_USER,
			'updated_time' => $update_date
			);
            $this->model_admin->UpdateBill1($this->input->post('id_to_update'), $save);
			
		  $sql = "SELECT sum(subtotal) as t1, sum(totalpaseg) as t2, sum(totpapat) as t3 FROM factura WHERE id2=$idfacc";
            $query = $this->db->query($sql);
            foreach ($query->result() as $row) 
			$update = array(
			'tsubtotal' => $row->t1,
			'totpagseg' => $row->t2,
			'totpagpa' => $row->t3
			);
            $where = array('id_f' => $this->input->post('idfacc'));
            $this->db->where($where);
            $this->db->update("invoice_ars_claims", $update);
			 $response['status'] =  0;
     $response['message'] = "";	
        }
		
	
	echo json_encode($response);
    }


  function getOfPreviosFacturas() {
        $data['billings2'] = $this->model_admin->ViewFact2($this->input->post('id_facc'));
		$data['centro_type']=$this->input->post('centro_type');
		$privado = $this->input->post('privado');
	    $data['privado'] =$privado;
        $billings = $this->model_admin->ViewFact($this->input->post('id_facc'));
        $data['billings'] = $billings;
        $data['count'] = count($billings);
        $data['idfacc'] = $this->input->post('id_facc');
        $data['user'] = $this->ID_USER;
       
        $data['id_patient'] = $this->ID_PATIENT;
        $patient = $this->db->select('plan,seguro_medico')->where('id_p_a', $this->ID_PATIENT)->get('patients_appointments')->row_array();
       $data['seguro_id'] = $this->input->post('patient_seguro_from_factura');
  if ($patient['seguro_medico'] != $this->input->post('patient_seguro_from_factura')) {
            $data['seguro_as_been_changed'] = '<span style="color:red">El seguro del paciente ha sido cambiado, esa factura pertenece al seguro anterior. Es recomendable de crear otra factura con el nuevo seguro.<br/></span>';
        } else {
            $data['seguro_as_been_changed'] = '';
        }
		
		
$data['billings']=$this->model_admin->ViewFact($this->input->post('id_facc'));
if($privado==1){
$data['money_device']=$this->db->select('money_device')->where('id_factura',$this->input->post('id_facc'))->get('factura_modalidad_pago')->row('money_device');
}else{
$data['money_device']='RD$';	
}
        $this->load->view('patient/factura/list-of-previos-facturas-privadas', $data);
    }


function new_factura_input(){
 $seguroTitle = $this->input->post('seguroTitle');
  $value = $this->input->post('value');
   $data['value'] = $value;
  $patientPlan = $this->input->post('patientPlan');
  $medico = $this->input->post('medico');
  $centro = $this->input->post('centro');
  $seguro = $this->input->post('seguro');
    $id_fact = $this->input->post('id_fact');
	$data['centro_type'] = $this->input->post('centro_type');
	$privado = $this->input->post('privado');
	$data['privado'] =$privado;
   	 $values = array(
'seguroTitle'=> $seguroTitle,
'patientPlan'  =>$patientPlan,
'doctor'  =>$medico,
'centro'  =>$centro,
'seguroId'  =>$seguro
);
$this->session->set_userdata("GET_PATIENT_FACTURA_DATA", $values);
$data['seguro']= $seguro;

 $tarifarios= $this->get_table_data_by_id->getTarifariosPorDoctorPrivado($values);
  $data['tarifarios'] = $tarifarios;
   $tarifarios_centro= $this->get_table_data_by_id->getTarifariosPorCentro($centro, $seguro);
    $data['tarifarios_centro'] = $tarifarios_centro;
	
  if($value==1){
 //$button_action='Guardar';
 //$button_icon="save";
 $buttonFac= '<button class="btn btn-sm btn-primary" type="button" id="update_factura"  ><i class="bi bi-save"></i> Guardar</button>';
	 $invoice_by_regiser = $this->db->select('*')->where('idfac', $this->input->post('id_to_update'))->get('factura')->row_array();
  }else{
	  $invoice_by_regiser=0;
	  //$button_action='Agregar';
	 //$button_icon="plus";
	 $buttonFac="";
  }
   $data['buttonFac'] = $buttonFac;
     $data['invoice_by_regiser'] = $invoice_by_regiser;
	 $data['money_device']=$this->db->select('money_device')->where('id_factura',$this->input->post('id_facc'))->get('factura_modalidad_pago')->row('money_device');
  if($privado==1){
	
	$data['buttonFacAdd']=  '';
  $data['buttonFac']='';
 }else{
	 $data['money_device']='RD$'; 
	 $data['buttonFacAdd']= '';
  }
  if($privado==1 && $value==1){
	   $data['buttonFacAdd']= '<button class="btn btn-sm btn-primary" type="button" id="update_factura"  ><i class="bi bi-save"></i> Guardar</button>';
  }
$this->load->view('patient/factura/new-factura-inputs', $data);	
}



public function create_tarifarios_for_current_user()
{
$this->get_table_data_by_id->tarifarios_temporal_for_current_user($this->session->userdata("GET_PATIENT_FACTURA_DATA"));
}


public function delete_this_fac()
{
	$id_facc=$this->input->post('id_facc');
	$count=$this->input->post('count');

$query = $this->db->get_where('factura',array('idfac'=>$id_facc));
foreach ($query->result() as $row) {
   $this->db->insert('factura_deleted',$row);
}


$where = array(
 'idfac'   =>$id_facc
);

$this->db->where($where);
$this->db->delete('factura');
//---------------------------------------------------
//--IF THERE IS ONLY ONE FACTURA WE CAN DELETE AS IN THE PRIMARY TABLE
if($count==1){
$where2 = array(
 'idfacc'   =>$id_facc
);

$this->db->where($where2);
$this->db->delete('factura2');
}

$save = array(
'idfac' =>$id_facc,
'reazon' =>$this->input->post('reazon'),
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'deleted_by' =>$this->ID_USER,
'deleted_time' =>date("Y-m-d H:i:s")
);
$this->db->insert("delete_fac_razon",$save);

}




function getFacturasAmb(){
 $val = array(
'id_patient'=>$this->ID_PATIENT,
'doctor'=>$this->input->post('doctor'),
'centro_medico'=>$this->input->post('centro_medico')

);


$controller=$this->USER_CONTROLLER ;

$factura_sin_cita=$this->model_admin->facturaSinCita($val);
if($factura_sin_cita !=NULL){ 
echo "<h6>Facturas previas</h6>";
echo "<table class='table fixed table-striped' align='center' id='facsincita' style='font-size:10px;background:#E0E5E6;' >";
echo '<thead>';
echo '<tr style="background:#38a7bb;color:white">';
echo '<th>CENTRO MEDICO</th>';
echo '<th> MEDICO</th>';
echo '<th> ARS</th>';
echo '<th>FECHA</th>';
echo '<th>Accion</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach($factura_sin_cita as $row)
{ 

$seguro_title=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
if($row->medico==1){
$medico=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$medico = $medico." <em><strong>(as. médico)</strong></em>";
}else{
	
$medico=$this->db->select('name')->where('id_user',$row->medico)->get('users')->row('name');
}
$centro=$this->db->select('name,type')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row_array();
$type=$centro['type'];	
	if($row->seguro_medico==11){
		$goto="viewPrivateBill";
	} else{
		$goto="bill";
	}

echo "<tr>";
echo "<td>" . $centro["name"] . "</td>"; 
echo "<td>" . $medico . "</td>"; 
echo "<td>" . $seguro_title . "</td>"; 
echo "<td>" .date("d-m-Y", strtotime($row->fecha)). "</td>"; 
echo "<td>";
$id_fac = encrypt_url($row->idfacc);
$typ = encrypt_url($type);
echo "<a target='_blank'  href='".base_url()."$controller/factura_by_id/$id_fac/$typ' >VER FACTURA</a>";

echo "</td>";
			
  echo "</tr>";
}
  echo "</tbody>";
echo "</table>";

		echo "<script> 
$('#facsincita').DataTable( {
'language': {
'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
},
'aaSorting': [ [0,'desc'] ],

});
</script>";
}
}


 
	
	
	   function getCentroFacDateRange() {
        $admin_centro = $this->ADMIN_POSITION_CENTRO;
       $checktype = $this->input->post('checktype');
        if ($this->PERFIL  == "Asistente Medico") {
            $centro = $this->model_admin->view_as_doctor_centro_fac($this->ID_USER, $checktype);
        } else {
            $centro = $this->model_admin->report_bill_by_date_centro_fac($this->ID_USER, $this->PERFIL , $checktype, $admin_centro);
        }
        echo '<option value="" hidden></option>';
        foreach ($centro as $rowc) {
            $centroc = $this->db->select('name')->where('id_m_c', $rowc->centro_medico)->get('medical_centers')->row('name');
            echo "<option value='$rowc->centro_medico' >$centroc</option>";
        }
    }
	
	    function get_date_range_seguro_patient() {
        $id_doc = $this->input->get('id_doc');
        $id_centro = $this->input->get('id_centro');
        $seguro = $this->input->get('seguro');
        $sort = $this->input->get('sort');
        if ($sort == 0) {
            $order_by = "ORDER BY filter DESC";
        } else {
            $order_by = "ORDER BY filter ";
        }
        if ($id_doc) {
            $where = "&& medico2=$id_doc";
        } else {
            $where = "&& center_id=$id_centro";
        }
        echo "<option value='' ></option>";
        $sqlpl = "SELECT filter from factura where seguro=$seguro && seguro !=11 $where group by filter $order_by";
        $queryp = $this->db->query($sqlpl);
        foreach ($queryp->result() as $row) {
            $date = date("d-m-Y", strtotime($row->filter));
            echo "<option value='$row->filter'>$date</option>";
        }
    }
	
	
	  function get_fac_date_report() {
        $checkval = $this->input->get('checkval');
        $centro = $this->input->get('centro');
        $doctor = $this->input->get('doctor');
        $desde = $this->input->get('desde');
        $hasta = $this->input->get('hasta');
    
        $data1 = array('doctor' => $doctor,
		'centro' => $centro,
		'desde' => $desde,
		'hasta' => $hasta,
		'perfil' => $this->PERFIL,
		'id_user' => $this->ID_USER,
		'checkval' => $checkval
		);
        if ($this->PERFIL == "Admin") {
            $data['controller'] = "admin";
        } else {
            $data['controller'] = "medico";
        }
        $data['checkval'] = $checkval;
        $data['desde'] = $desde;
        $data['hasta'] = $hasta;
        $data['perfil'] = $this->PERFIL;
        $data['id_user'] = $this->ID_USER;
        $data['centro'] = $centro;
        $data['doctor'] = $doctor;
        if ($checkval == "privado") {
            $data['title'] = "REPOTE DE FACTURAS PACIENTES PRIVADOS";
            $data['display'] = "style='display:none'";
            $data['thnum'] = 6;
            if ($doctor == "") {
                $data['display_report'] = $this->model_admin->get_fac_date_report_privado($data1);
            } else {
                $data['display_report'] = $this->model_admin->get_fac_date_report_centro_privado($data1);
            }
        } else {
            $data['title'] = "REPOTE DE FACTURAS GENERAL";
            $data['display'] = "";
            $data['thnum'] = 9;
            if ($doctor == "") {
                $data['display_report'] = $this->model_admin->get_fac_date_report_general($data1);
            } else {
                $data['display_report'] = $this->model_admin->get_fac_date_report_general_centro_privado($data1);
            }
        }
		
        $this->load->view('patient/factura/report', $data);
    }
	
	
	 function getDateRanch()
    {
       
        $begin = $this->input->post('begin');
        if ($begin == 0)
        {
            $order_by = "ORDER BY filter_date DESC";
        }
        else
        {
            $order_by = "ORDER BY filter_date ";
        }
        $group_by = 'GROUP BY filter_date';
        if ($this->PERFIL == 'Admin')
        {
            $where = "WHERE seguro_medico !=11";
        }
        elseif ($this->PERFIL == "Medico")
        {
            $where = "WHERE seguro_medico !=11 AND medico=$this->ID_USER";
        }
        else
        {
            $where = "JOIN doctor_centro_medico ON doctor_centro_medico.centro_medico=factura2.centro_medico WHERE seguro_medico !=11  AND id_doctor=$this->ID_USER";
        }
        $sql = "SELECT factura2.centro_medico, filter_date FROM factura2 $where $group_by $order_by";
        $query = $this->db->query($sql);
        echo "<option value=''></option>";
        foreach ($query->result() as $dr)
        {
            $desde = date("d-m-Y", strtotime($dr->filter_date));
            echo '<option value="' . $dr->filter_date . '">' . $desde . '</option>';
        }
    }
	
	
	  function invoiceARS()
    {
       
        $hasta = $this->input->get('hasta');
        $desde = $this->input->get('desde');
       
        if ($this->PERFIL  == "Admin")
        {
            $sql = "SELECT seguro_medico FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' GROUP BY seguro_medico";
            $query = $this->db->query($sql);
        }
        else if ($this->PERFIL  == "Medico")
        {
            $sql = "SELECT seguro_medico FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' AND medico=$this->ID_USER GROUP BY seguro_medico";
            $query = $this->db->query($sql);
        }
        else
        {
            $as_medico_centro = $this->db->select('centro_medico')->where('id_doctor', $this->ID_USER)->get('doctor_centro_medico')->row('centro_medico');
            $sql = "SELECT seguro_medico FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta'  GROUP BY seguro_medico";
            $query = $this->db->query($sql);
        }
        echo '<option value="" ></option>';
        foreach ($query->result() as $row)
        {
            $seguro = $this
                ->db
                ->select('title')
                ->where('id_sm', $row->seguro_medico)
                ->get('seguro_medico')
                ->row('title');
            echo '<option value="' . $row->seguro_medico . '">' . $seguro . '</option>';
        }
    }
	
	 function invoicePatient()
    {
        
        $hasta = $this->input->get('hasta');
        $desde = $this->input->get('desde');
        
        if ($this->PERFIL == "Admin")
        {
            $sql = "SELECT paciente FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' GROUP BY paciente";
            $query = $this
                ->db
                ->query($sql);
        }
        else if ($this->PERFIL == "Medico")
        {
            $sql = "SELECT paciente FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' AND medico=$this->ID_USER  GROUP BY paciente";
            $query = $this
                ->db
                ->query($sql);
        }
        else
        {
            $as_medico_centro = $this
                ->db
                ->select('centro_medico')
                ->where('id_doctor', $this->ID_USER)->get('doctor_centro_medico')
                ->row('centro_medico');
            $sql = "SELECT paciente FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' GROUP BY paciente";
            $query = $this
                ->db
                ->query($sql);
        }
        echo '<option value="" ></option>';
        foreach ($query->result() as $row)
        {
            $paciente = $this
                ->db
                ->select('nombre')
                ->where('id_p_a', $row->paciente)
                ->get('patients_appointments')
                ->row('nombre');
            echo '<option value="' . $row->paciente . '">' . $paciente . '</option>';
        }
    }
	
 
}