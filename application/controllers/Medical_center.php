<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medical_center extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
		$this->load->model('model_admin');
		$this->load->model('navigation/account_demand_model');
		$this->ID_USER =$this->session->userdata('user_id');
		$this->PERFIL_USER =$this->session->userdata('user_perfil');
		$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
    }
    
   
	  
	    public function medicalCenterTable(){
		$this->load->view('medical-center/table-data');  
		  
	  }
	  
	 public function getMedicalCenter(){
		 $rowid=$this->input->post("rowid");
		  $query = $this->db->query("SELECT * FROM medical_centers WHERE id_m_c=$rowid");
		  foreach($query->result() as $row)
		    $response['name'] = $row->name; 
			 $response['rnc'] = $row->rnc; 
			echo json_encode($response);
	 }		 
	  
	 
 public function listMedicalCenters(){
    $draw=intval($this->input->get("draw"));
    $start=intval($this->input->get("start"));
    $length=intval($this->input->get("length"));
   $admin_position_centro=$this->session->userdata['admin_position_centro'];
if($admin_position_centro){

  $query = $this->db->query("SELECT * FROM medical_centers WHERE id_m_c=$admin_position_centro");
}else{

  $query = $this->db->query('SELECT * FROM medical_centers');

}
	
  $data= [];
    foreach($query->result() as $row) {
	$img= '<img width="50" height="50" class="img-thumbnail" src="'.base_url().'/assets/img/centros_medicos/'.$row->logo.'"  />';		
	$see ='<a  href="'.site_url().'admin/see_medical_center/'.$row->id_m_c.'" >'.$row->name.' </a>';
	 if($row->activate==0){
			
			$isBtnActiveAction = '<button type="button"   id="'.$row->id_m_c.'" title="Desactivar '.$row->name.'" class="action-centro btn btn-danger btn-sm 1"><i class="bi bi-x-octagon"></i></button>';
		}else{
	
         $isBtnActiveAction = '<button type="button"   id="'.$row->id_m_c.'" title="Activar '.$row->name.'" class="action-centro btn btn-success btn-sm 0"><i class="bi bi-check2-circle"></i></button>';
		}
	 
	 
	 
	 
	 $sub_array = array();
	  $sub_array[] = $row->id_m_c;
	 $sub_array[] = $see. "<br/>$row->type";
         $sub_array[] = $img;	
     $sub_array[] = $row->primer_tel;
	 $sub_array[] = $isBtnActiveAction;
     $data[] = $sub_array; 
}

    $result=array(
             "draw"=>$draw,
               "recordsTotal"=>$query->num_rows(),
               "recordsFiltered"=>$query->num_rows(),
               "data"=>$data
          );
    echo json_encode($result);
    exit();

 } 


public function saveCentroMedico(){
$name=$this->input->post('nombre');
$municipio  = $this->input->post('municipio');
$especialidad  = $this->input->post('especialidad');
$seguro_medico  = $this->input->post('seguro_medico');

if($_FILES["logo"]['tmp_name'] != '')
{
$extension = explode('.', $_FILES['logo']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/centros_medicos/' . $logo;
move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
 }

else {
$old_logo=$this->db->select('logo')->where('id_m_c',$this->input->post('idcentro'))->get('medical_centers')->row('logo');
$logo = $old_logo;

	}

$data = array(
  'name'  => $name,
  'logo'  => $logo,
  'rnc'=> $this->input->post('rnc'),
  'primer_tel'=> $this->input->post('primer_tel'),
  'segundo_tel' => $this->input->post('segundo_tel'),
  'email' => $this->input->post('email'),
   'fax' => $this->input->post('fax'),
 'provincia'=> $this->input->post('provincia'),
  'municipio' => $this->input->post('municipio'),
   'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'pagina_web'=> $this->input->post('pagina_web'),
  'created_by'=> $this->input->post('created_by'),
  'updated_by'=>$this->input->post('updated_by'),
 'insert_date'=> $this->input->post('insert_date'),
  'modify_date' => $this->input->post('modify_date'),
  'type' => $this->input->post('typo')
  );
  if($especialidad > 0){
$id_m_c=$this->model_admin->save_seguro_medico($data);
  }else{
	  $this->model_admin->SaveUpdateCentroMedico($this->input->post('idcentro'),$data);
  }
if($especialidad > 0){
$this->model_admin->deleteCentroEsp($id_m_c);

foreach ($especialidad as $esp) {

	$saveE= array(
	'id_medical_center' =>$id_m_c,
	'especialidad' => $esp
	);

	$this->model_admin->SaveCentroEsp($saveE);
}
}
if($seguro_medico > 0){
$this->model_admin->deleteCentroSeguro($id_m_c);

foreach ($seguro_medico as $seg) {

	$saveSe= array(
	'id_medical_center' =>$id_m_c,
	'seguro_id' => $seg
	);

	$this->model_admin->SaveCentroSeg($saveSe);
}
}
$msg = "<div  style='text-align:center'>El Centro Medico : <span style='color:green'>$name</span> se guada con exito .</div>";
$this->session->set_flashdata('success_msg', $msg);
if($especialidad > 0){
redirect("admin/medical_centers");
}else{
redirect($_SERVER['HTTP_REFERER']);	
}
}



function updateCentroSeguroMed(){
	$id_m_c=$this->input->post('id_centro');
$seguro_medico  = $this->input->post('seguro_medico_');
$this->model_admin->deleteCentroSeguro($id_m_c);

	$segArray =  array(); 		
for ($i = 0; $i < count($seguro_medico); ++$i ) {
$seg = $seguro_medico[$i];
 $segArray[] = array(
'id_medical_center' =>$id_m_c,
	'seguro_id' => $seg
); 
}
$this->db->insert_batch('medical_centro_seguro', $segArray);
redirect($_SERVER['HTTP_REFERER']);
	
}




public function deshabilitarCamaMapa(){
		
$update = array(
  'cancelar' =>1
);

$where = array(
  'id'=> $this->input->post('id')
);

$this->hospitalization_emgergency->where($where);
$this->hospitalization_emgergency->update("mapa_de_cama",$update);	

}






public function load_mapa_cama()
{
$id_centro=$this->input->post('id_centro');

$sqlct ="SELECT * from  mapa_de_cama where centro=$id_centro && cancelar=0 ORDER BY id DESC";
$data['queryct'] = $this->hospitalization_emgergency->query($sqlct);
$this->load->view('medical-center/mapa-de-cama', $data);
}



 public function saveEditMapaCama(){

$data = array(
'sala' =>$this->input->post('sala'),
'num_cama' => $this->input->post('num_cama'),
'servicio' =>$this->input->post('servicio')
);

$where = array(
  'id'=> $this->input->post('id')
);

$this->hospitalization_emgergency->where($where);
$this->hospitalization_emgergency->update("mapa_de_cama",$data);	

}


public function saveNewMapaCama()
{
	$data= array(
	'sala' =>$this->input->post('sala'),
	'num_cama' => $this->input->post('cama'),
	'servicio' =>$this->input->post('servicio'),
	'centro' =>$this->input->post('centro')
	);

	$this->hospitalization_emgergency->insert("mapa_de_cama",$data);
}


public function uploadMapaDeCama(){
	$this->load->library('excel');
if($_FILES["mapacama"]["name"])
{

$path = $_FILES["mapacama"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=2; $row<=$highestRow; $row++)
{
$sala = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
$num_cama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$servicio = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$datamp[] = array(
'sala'=>$sala,
'num_cama'=>$num_cama,
'servicio'=>$servicio,
'centro'=>$this->input->post('idcentromapa')
);
}

}
$this->hospitalization_emgergency->insert_batch('mapa_de_cama', $datamp);


}	
}


public function action_centro()
{
	$data = array(
  'activate' => $this->input->post('action'),
  'updated_by' => $this->ID_USER,
  'modify_date' => date("Y-m-d H:i:s")
  );
$this->model_admin->delete_centro_medico($this->input->post('id'),$data);
}
	
}