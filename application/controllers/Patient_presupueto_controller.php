<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_presupueto_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('navigation/account_demand_model');
		$this->load->model('model_general');
		$this->load->model('model_admin');
		 $this->load->library('form_validation'); 
		 $this->load->library("create_forms");
		 $this->load->library("user_register_info");
		 $this->ID_USER=$this->session->userdata['user_id'];
		 $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		 $this->ID_PATIENT = $this->session->userdata('ID_PATIENT');
		 	$this->clinical_history = $this->load->database('clinical_history', TRUE);
		$this->PERFIL =$this->session->userdata('user_perfil');
	
		
	}



 function showForm()
{
 [$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers]= $this->create_forms->getCentroAndSeguroByPerfil(0);
    $data['result_centro_medicos'] = $result_centro_medicos;
  $data['result_doc_by_centers'] = $result_doc_by_centers;
$this->load->view('patient/presupuesto/create-presupuesto-form', $data);
}


  function addNewPresupuesto() {
        $save = array(
		'centro' => $this->input->post('centro'),
		'conclucion_diag' => $this->input->post('conc'),
		'procedimiento' => $this->input->post('proced'),
		'patient' => $this->ID_PATIENT, 
		'user' => $this->input->post('id_doc'), 
		'inserted_by' => $this->ID_USER,
		'updated_by' => $this->ID_USER,
		'time_created' => date("Y-m-d H:i:s"), 
		'updated_time' => date("Y-m-d H:i:s"),
		'id_cd' => 0,
		'precio' => $this->input->post('precio'),
		'autoNomber' => $this->input->post('autoNomber')
		);
        $this->clinical_history->insert("h_c_procedimiento_tarif", $save);
		echo 1;
    }




function paginationProcedFacDataDefault() {
        $user_id = $this->ID_USER;
        $id_doc = $this->input->get('id_doc');
        $patient = $this->ID_PATIENT;
        $autoNomber = $this->clinical_history->select('autoNomber')->where('user', $id_doc)->where('patient', $patient)->order_by('id', 'desc')->limit(1)->get('h_c_procedimiento_tarif')->row('autoNomber');
        if ($autoNomber) {
            $sql = "SELECT * FROM h_c_procedimiento_tarif WHERE autoNomber=$autoNomber ORDER BY id DESC";
            $this->paginationProcedFacData_($sql, $autoNomber);
        } else {
            echo "<em>no hay presupuesto</em>";
        }
    }



 function paginationProcedFacData_($sql, $autoNum) {
        $data['user_id'] = $this->ID_USER;;
        $data['patient'] = $this->ID_PATIENT;
        $data['autoNum'] = $autoNum;
        $procedInfo = $this->clinical_history->select('*')->where('autoNomber', $autoNum)->where('id_cd', 0)->get('h_c_procedimiento_tarif')->row_array();
       
        $data['conclucion_diag'] = $procedInfo['conclucion_diag'];
        $data['centro_proced'] = $procedInfo['centro'];
        $data['user_proced']= $procedInfo['user'];
		$data['patient_proced']= $procedInfo['patient'];
		$data['inserted_by']= $procedInfo['inserted_by'];
		$data['inserted_time']= $procedInfo['time_created'];
		$data['id']= $autoNum;
		$data['idDelete']= $procedInfo['id'];
		
        $data['query'] = $this->clinical_history->query($sql);
        $this->load->view('patient/presupuesto/pagination-data', $data);
    }




 function paginationResult() {
	 	$page= $this->input->get('page');
	 $procedimientoData=$this->clinical_history->select('*')->where('autoNomber', $page)->get('h_c_procedimiento_tarif')->row_array();
	
         if ($procedimientoData) {
			
		$data['action'] = $this->input->get('action');
	$query=$this->clinical_history->query("SELECT *, autoNomber AS id FROM  h_c_procedimiento_tarif WHERE autoNomber =$page");
	$data['query']= $query->result();
	$data['inserted_by']= $procedimientoData['inserted_by'];
		$data['inserted_time']= $procedimientoData['time_created'];
	$data['conclucion_diag']= $procedimientoData['conclucion_diag'];
	$data['centro_proced']= $procedimientoData['centro'];
	$data['patient_proced']= $procedimientoData['patient'];
	$data['user_proced']= $procedimientoData['user'];
		$data['id']= $page;
		$data['idDelete']= $procedimientoData['id'];
	$this->load->view('patient/presupuesto/pagination-data', $data);
		 }
	else {
            echo "<em>no hay presupuesto</em>";
        }
    }




function passProcedDown(){
 $procedimiento = $this->db->select('procedimiento')->where('id_tarif', $this->input->post('presupId'))->get('tarifarios_test')->row('procedimiento');
$response['addProcedimientoName'] = $procedimiento; 
$response['addProcedimientoId'] = $this->input->post('presupId'); 
echo json_encode($response);	
}



	 function saveNewPresupuesto() {
        $save = array(
		'procedimiento' => $this->input->post('procedimientoId'),
		'price' => $this->input->post('precio'), 
		'id_primary_table' => $this->input->post('idPrimaryTable'),
		'id_user' => $this->ID_USER,
		'id_patient' => $this->ID_PATIENT,
		);
        $this->clinical_history->insert("h_c_procedimiento_patient_precio", $save);
    }


 function paginationPatientPresupuestos() {
        
		if($this->USER_CONTROLLER=='Medico'){
			$id_doc = $this->ID_USER;
		}else{
			$id_doc = $this->input->post('id_doc');
		}
		$sql ="SELECT id AS NOTiD, autoNomber AS id, time_created AS inserted_time FROM   h_c_procedimiento_tarif WHERE  patient=$this->ID_PATIENT && user=$id_doc && id_cd=0 GROUP BY autoNomber ORDER BY NOTiD DESC";
        $data['rows']= $this->clinical_history->query($sql);
		
		
        $this->load->view('patient/presupuesto/pagination-number', $data);
    }







public function deleteFacProc()
{
$where = array(
 'id'   =>$this->input->post('id')
);

$this->clinical_history->where($where);
$this->clinical_history->delete('h_c_procedimiento_tarif');
//------------------------------------------------------------

}




     function loadProcedimientoDoc() {
        $id_doc = $this->input->post('id_doc');
        $seguro = $this->input->post('seguro');
        $sqlpt = "select id_tarif, procedimiento,monto FROM tarifarios_test WHERE id_seguro=$seguro AND id_doctor=$id_doc GROUP BY procedimiento";
        $proct = $this->db->query($sqlpt);
		if($proct->result() !=NULL){
		echo '<option>Seleccione</option>';
        foreach ($proct->result() as $rowTaf) {
            echo '<option value="' . $rowTaf->id_tarif . '">' . $rowTaf->procedimiento . '</option>';
        }
		}else{
		echo '<option>no hay procedimiento</option>';	
		}
    }
	

	
	

	
	
	   function editFacproced() {
        $user_id = $this->ID_USER;
        $autoNomber = $this->input->post('autoNomber');
        $data = array('procedimiento' => $this->input->post('edit-proced'), 'conclucion_diag' => $this->input->post('edit-conc'), 'precio' => $this->input->post('edit-precio'), 'updated_by' => $user_id, 'updated_time' => date("d-m-Y H:i:s"));
        $where = array('id' => $this->input->post('id'));
        $this->clinical_history->where($where);
        $this->clinical_history->update("h_c_procedimiento_tarif", $data);
        $sql = "SELECT * FROM h_c_procedimiento_tarif WHERE autoNomber=$autoNomber";
        $query = $this->clinical_history->query($sql);
        $tot = 0;
        foreach ($query->result() as $row) {
            $tot+= $row->precio;
        }
        $response['total'] = "RD$" . number_format($tot, 2);
        echo json_encode($response);
    }
 
	
	
}