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
		  $this->load->library('table_cancelation_info'); 
		 $this->load->library("create_forms");
		 $this->load->library("get_table_data_by_id");
		 $this->ID_USER=$this->session->userdata['user_id'];
		 $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		 $this->ID_PATIENT = $this->session->userdata('ID_PATIENT');
		   $this->ADMIN_POSITION_CENTRO = $this->session->userdata('admin_position_centro');
		  $this->PERFIL = $this->session->userdata('user_perfil');
		  //  if($this->session->userdata('is_logged_in')=='')
   // {
    // $this->session->set_flashdata('msg','Please Login to Continue');
   //  redirect('login/backTologin');
//}
	
		
	}
	
	
	
	
  function getCentroType() {
        $type = $this->db->select('type')->where('id_m_c', $this->input->post('id_centro'))->get('medical_centers')->row('type');
        echo $type;
    }


 function showForm()
{

[$result_centro_medicos_cita]= $this->create_forms->getCentroMedicoForCita(0);

$data['result_centro_medicos'] =  $result_centro_medicos_cita;
$this->load->view('patient/factura/create-factura-ambulatoria', $data);
}





function saveInvoice()
{
	$id_patient = $this->input->post('id_patient');
$query = $this->db->get_where('factura2',array('numauto'=>$this->input->post('numauto'), 'canceled'=> 0));
	if($query->num_rows() > 0 && $this->input->post('numauto') !="" && $this->input->post('numauto') !=0){
		 $response['status'] =  0;
   $response['message'] = "Ese numero de autorización: <strong> ".$this->input->post('numauto')."</strong> ha sido usado.";		
	}
		
elseif($this->input->post('grupo_area_req') !="" &&
$this->input->post('numauto') !="" &&
 $this->input->post('autopor') !="" &&
 $this->input->post('fecha') !="" &&
 $this->input->post('service') !="" &&
 $this->input->post('cant') !="" &&
 $this->input->post('prec') !="" &&
 $this->input->post('servField') !="" &&
$this->input->post('pendienteCaja') ==0
 )
 {

$this->save_factura_register($this->input->post('centro_medico'), $this->input->post('medico'));
$this->db->trans_begin();
$insert_date=date("Y-m-d H:i:s");
//$filter_date=date("Y-m-d");
$filter_date=date("Y-m-d", strtotime($this->input->post('fecha')));
$fecha_fac=date("d-m-Y H:i", strtotime($this->input->post('fecha')));
$save2= array(
'medico' =>$this->input->post('medico'),
'area' =>$this->input->post('area'),
'area_public_centro_asegurado' =>$this->input->post('grupo_area_req'),
'centro_medico' =>$this->input->post('centro_medico'),
'seguro_medico' =>$this->input->post('seguro_medico'),
'codigoprestado' =>$this->input->post('codigoprestado'),
'paciente' =>$id_patient,
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

$mod= array(
'pendienteCaja' =>$this->input->post('pendienteCaja'),
'tarjeta' =>$this->input->post('tarjeta'),
'transferencia' =>$this->input->post('transferencia'),
'effectivo' =>$this->input->post('effectivo'),
'cheque' =>$this->input->post('cheque'),
'id_patient' =>$id_patient,
'checqueNumero' =>$this->input->post('checqueNumero'),
'inserted_time' =>$filter_date,
'id_factura' =>$last_bill_id,
'id_rendv' =>$this->input->post('id_apoint'),
'inserted_by' =>$this->ID_USER,
'money_device'=>$this->input->post('money_device')

);
$this->db->insert('factura_modalidad_pago', $mod);	

$grupo_area = $this->input->post('grupo_area');
$service = $this->input->post('service');
$cantidad = $this->input->post('cantidad');
$preciouni = $this->input->post('preciouni');
$subtotal = $this->input->post('subtotal');
$totalpaseg = $this->input->post('totalpaseg');
$descuento = $this->input->post('descuento');
$totpapat = $this->input->post('totpapat');
$medico =$this->input->post('medico');
$seguro_medico =$this->input->post('seguro_medico');



	$facturaArray =  array(); 

for ($i = 0; $i < count($service); ++$i ) {
$grupo_ar = $grupo_area[$i];
$serv = $service[$i];
$cant = $cantidad[$i];
$pre = $preciouni[$i];
$sub = $subtotal[$i];
$totpas = $totalpaseg[$i];
$desc = $descuento[$i];
$totpap = $totpapat[$i];

if($serv){
 $facturaArray[] = array(
'grupo_area'=>$grupo_ar,
'service' =>$serv,
'cantidad' => $cant,
'preciouni' =>$pre,
'subtotal' => $sub,
'totalpaseg' =>$totpas,
'descuento' => $desc,
'totpapat' => $totpap,
'id2' =>$last_bill_id,
'pat_id' =>$id_patient,
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
} 
}
$this->db->insert_batch('factura', $facturaArray);
$this->db->trans_complete();

	if ($this->db->trans_status() === FALSE)
			{
			$this->db->trans_rollback();
			  $response['message'] = "fallo";
                $response['status']  = 0;
			}
			else
			{
			$this->db->trans_commit();
			 $response['message'] = "";
               $response['status'] = encrypt_url($last_bill_id);
			}

 }else{
		 $response['status'] =  1;
$response['message'] = "Los campos con * son requeridos !";		
		}
		
	
	echo json_encode($response);
 
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





    function updateFactura() {
        $update_date = date("Y-m-d H:i:s");
		 $idfacc = $this->input->post('idFact');
      
if(
 $this->input->post('cant') !="" &&
 $this->input->post('prec') !="" &&
 $this->input->post('pendienteCaja') ==0
 )
{

 $response['status'] =  0;
     $response['message'] = "";			
	
	$this->db->trans_begin();
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
'id' => $this->input->post('modalidadId')
);
  $this->db->where($where);
$this->db->update('factura_modalidad_pago', $mod);
	
	
$eachIdFac = $this->input->post('eachIdFac');
$cantidad = $this->input->post('cantidad');
$preciouni = $this->input->post('preciouni');
$subtotal = $this->input->post('subtotal');
$totalpaseg = $this->input->post('totalpaseg');
$descuento = $this->input->post('descuento');
$totpapat = $this->input->post('totpapat');

	
	
	$facturaArray =  array(); 

for ($i = 0; $i < count($eachIdFac); ++$i ) {
$eachId = $eachIdFac[$i];
$cant = $cantidad[$i];
$pre = $preciouni[$i];
$sub = $subtotal[$i];
$totpas = $totalpaseg[$i];
$desc = $descuento[$i];
$totpap = $totpapat[$i];
 $facturaArray[] = array(
 'idfac'=>$eachId,
'cantidad' => $cant,
'preciouni' =>$pre,
'subtotal' => $sub,
'totalpaseg' =>$totpas,
'descuento' => $desc,
'totpapat' => $totpap,
'updated_time' =>date('Y-m-d H:i:s'),
'updated_by' =>$this->ID_USER,

); 
} 
$this->db->update_batch('factura', $facturaArray, 'idfac'); 
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
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
			{
			$this->db->trans_rollback();
			  $response['message'] = "fallo";
                $response['status']  = 5;
			}
			else
			{
			$this->db->trans_commit();
			 $response['message'] = "Hecho";
                $response['status']  = 6;
			}
		
		
		
        }else{
		 $response['status'] =  1;
$response['message'] = "Cantidad, precio unitario son requeridos !";		
		}
		
	
	echo json_encode($response);
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
		
		
$save1= array(
'filter'=>$this->input->post('fecha')
);
$where = array(
'id2' => $this->input->post('idfacc')
);
  $this->db->where($where);
$this->db->update('factura', $save1);
		
	$response['status'] =  1;
			$response['message'] = "Hecho.";
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
       $id_pat= $this->input->post('id_pat');
        $data['id_patient'] = $id_pat;
        $patient = $this->db->select('plan,seguro_medico')->where('id_p_a', $id_pat)->get('patients_appointments')->row_array();
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
        $this->load->view('patient/factura/invoices-list', $data);
    }






public function create_tarifarios_for_current_user()
{
$this->get_table_data_by_id->tarifarios_temporal_for_current_user($this->session->userdata("GET_PATIENT_FACTURA_DATA"));
}


public function cancelInvoice()
{
	
$id_facc=$this->input->post('id_facc');	
$this->db->trans_begin();	
$mod1= array(
'canceled' =>1,
'cancelation_reason'=>$this->input->post('reazon')
);
$where = array(
'idfacc' => $id_facc
);
  $this->db->where($where);
$this->db->update('factura2', $mod1);	
//-------------------------------------------------------------	

$mod2= array(
'canceled' =>1,
);
$where2 = array(
'id2' => $id_facc
);
  $this->db->where($where2);	
	$this->db->update('factura', $mod2);
//--------------------------------------------------
$mod3= array(
'canceled' =>1,
);
$where3 = array(
 'id_factura' =>$id_facc
);

$this->db->where($where3);
//$this->db->delete('factura_modalidad_pago');
$this->db->update('factura_modalidad_pago', $mod3);
	if ($this->db->trans_status() === FALSE)
	{
	$this->db->trans_rollback();
	echo 0;
	}
	else
	{
	$this->db->trans_commit();
	echo 1;
	$this->table_cancelation_info->save("factura2", $id_facc);
	}

}




function getFacturasAmb(){
 $val = array(
'id_patient'=>$this->input->post('id_patient'),
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
	 function loadSimon() {
        $sql = "select * from simon_pdss order by grupo DESC";
        $query = $this->db->query($sql);
        echo "<option value=''>Entrar codigo simon</option>";
        foreach ($query->result() as $row) {
            echo '<option value="' . $row->simon . '">' . $row->simon . '-' . $row->procedimientos . '</option>';
        }
    }
 
}