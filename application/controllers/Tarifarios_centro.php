<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tarifarios_centro extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
		$this->load->model('excel_import_model');
		$this->USER_PERFIL =$this->session->userdata('user_perfil');
		$this->ID_USER =$this->session->userdata('user_id');
		$this->load->model('navigation/account_demand_model');
		$this->load->library("get_table_data_by_id");
		$this->load->library("create_forms");
	 if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
		
	}

 
 
 public function getSeguroWithTariff()
{
$id_centro=$this->input->post('id');
$sql ="SELECT id_sm, title  FROM  seguro_medico
LEFT JOIN codigo_contrato ON seguro_medico.id_sm = codigo_contrato.id_seguro
WHERE id_centro=$id_centro";

//$sql ="SELECT id_seguro, id_centro  FROM  codigo_contrato WHERE id_centro=$id_centro";
//$query= $this->db->query($sql);
$results = $this->model_admin->display_centro_medical_seguro($id_centro);
echo "<option></option>";
foreach($results as $row) {
//$seguro=$this->db->select('title')->where('id_sm',$row->id_seguro)->get('seguro_medico')->row('title');	

echo "<option value='$row->id_sm'>$row->title</option>";
}

}
 

  public function getSeguroNoTariff()
{
$id_centro=$this->input->post('id');
$sql ="SELECT seguro_id, id_medical_center  FROM  medical_centro_seguro WHERE id_medical_center=$id_centro";
$query= $this->db->query($sql);
echo "<option></option>";
foreach($query->result() as $row) {
$seguro=$this->db->select('title')->where('id_sm',$row->seguro_id)->get('seguro_medico')->row('title');	

$id_seguro=$this->db->select('id_seguro')->where('id_centro',$id_centro)->where('id_seguro',$row->seguro_id)->get('codigo_contrato')->row('id_seguro');
if($id_seguro==$row->seguro_id){
	$disabled='disabled';

}else{
$disabled='';

}


echo "<option $disabled value='$row->seguro_id'>$seguro</option>";
}

}
 
 
 

 

public function display_tarif_centro_categoria()
{
$data['user_name']=$this->session->userdata['user_id'];
$id_seguro=$this->input->post('id_seguro');
$id_centro=$this->input->post('id_centro');
$results= $this->model_admin->display_tarif_centro_categoria($id_centro,$id_seguro);
$data['results']=$results;
$data['id_seguro']=$id_seguro;
$data['id_centro']=$id_centro;
if($results){
	$data['searchTarif']="";
$this->load->view('tarifario/centro/display_tarif_centro', $data);
}else{
	echo 0;
}
} 
 
 
public function display_centro_tarif_cat()
{
$id_seguro=$this->input->post('id_seguro');
$id_centro=$this->input->post('id_centro');
$results= $this->model_admin->display_tarif_centro_categoria($id_centro,$id_seguro);
$data['results']=$results;
$data['count']=count($results);
$this->load->view('tarifario/centro/display_centro_tarif_cat', $data);

} 
 
 
 
public function centro_categoria_servicios()
{

$data['categoria']=$this->input->post('categoria');
$data['id_centro']=$this->input->post('id_centro');
$data['id_seguro']=$this->input->post('id_seguro');

$this->load->view('tarifario/centro/centro_categoria_servicios', $data);
}
 
 
 public function loadCatTarif()
{
$data['updated_by']=$this->session->userdata['user_id'];
$val = array(
'categoria'=>$this->input->post('categoria'),
'id_centro'=>$this->input->post('id_centro'),
'id_seguro'=>$this->input->post('id_seguro')
 );
$data['categoria']=$this->input->post('categoria');
$data['id_centro']=$this->input->post('id_centro');
$data['id_seguro']=$this->input->post('id_seguro');
$results= $this->model_admin->centro_categoria_servicios($val);
$data['results']=$results;
$data['count']=count($results);
$this->load->view('tarifario/centro/loadCatTarif', $data);
}
 
 
 

public function saveNewTarifCentro()
{
if($this->input->post('consulta') !="" && $this->input->post('monto') !=""){
$save = array(
'cups'  => $this->input->post('cups'),
'simons' => $this->input->post('simons'),
'sub_groupo' => $this->input->post('consulta'),
'groupo' => $this->input->post('categoria'),
'monto' =>$this->input->post('monto'),
'centro_id' =>$this->input->post('id_centro'),
'seguro_id' =>$this->input->post('id_seguro'),
'inserted_date' => date("Y-m-d H:i"),
'inserted_by' =>$this->session->userdata['user_id'],
'updated_by' =>$this->session->userdata['user_id'],
'updated_date' =>date("Y-m-d H:i")
);

$this->model_admin->saveNewTarifCentro($save);
}
}
 
 public function save_edit_tarifario_centro(){
$updated_date=date("Y-m-d H:i:s");
$id  = $this->input->post('id_c_taf');
$data = array(
'cups'=>$this->input->post('cups'),
'simons'=>$this->input->post('simons'),
'sub_groupo'=>$this->input->post('sub_groupo'),
 'monto'=>$this->input->post('monto'),
  'updated_by'=>$this->session->userdata['user_id'],
   'updated_date'=>$updated_date
  );
$this->model_admin->save_edit_tarifario_centro($id,$data);


}


  function get_service_for_public_center() {
$groupo = $this->input->post('groupo');
$centro = $this->input->post('centro');
$seguro = $this->input->post('seguro');
$select_servicios = $this->db->query("SELECT id_c_taf, sub_groupo FROM  centros_tarifarios_test WHERE centro_id=$centro  && seguro_id=$seguro && groupo='$groupo' GROUP BY sub_groupo");  

$tarifarios_centro = '';
$tarifarios_centro = '<option value="">Seleccione</option>';
foreach($select_servicios->result() as $row) {

$tarifarios_centro .= '<option value="' . $row->id_c_taf.'" >' . $row->sub_groupo . '</option>';	

}
echo $tarifarios_centro;
}



  public function import_exel_centro()
{
$this->load->library('excel');
$this->db->trans_begin();

 if(isset($_FILES["file"]["name"]))
{
$inserted_date=date("Y-m-d H:i:s");
$path = $_FILES["file"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=2; $row<=$highestRow; $row++)
{
$cups= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
$groupo = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$simon = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$sub_groupo = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
$monto = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
$data[] = array(
'cups'=>$cups,
'groupo'=>$groupo,
'simons'=>$simon,
'sub_groupo'=>$sub_groupo,
'monto'=>$monto,
'centro_id'=>$this->input->post('centro'),
'seguro_id'=>$this->input->post('seguro_id'),
'inserted_by'=>$this->ID_USER,
'updated_by'=>$this->ID_USER,
'inserted_date'=>$inserted_date,
'updated_date'=>$inserted_date
);
}

}
$this->excel_import_model->insert_centro($data);


$data = array(
'codigo'=>$this->input->post('codigo_centro'),
'id_centro'=>$this->input->post('centro'),
'id_seguro'=>$this->input->post('seguro_id'),
'updated_by'=>$this->ID_USER,
'inserted_by'=>$this->ID_USER,
'updated_time'=>$inserted_date,
'inserted_time'=>$inserted_date
);
$this->model_admin->save_codigo_contrato($data);
}


	if ($this->db->trans_status() === FALSE)
	{
	$this->db->trans_rollback();
	echo 0;
	}
	else
	{
	$this->db->trans_commit();
	echo  1;
	}	
	//echo json_encode($response);
}
 
  public function save_edit_c_c(){

$codigo_id=$this->input->post('codigo_id');
$date=date("Y-m-d H:i:s");
$data2 = array(
  'codigo'=>$this->input->post('codigo'),
  'updated_by'=>$this->ID_USER,
  'updated_time'=>$date
);
$this->model_admin->save_edit_codigo_prestador($codigo_id,$data2);

}


public function deleteTarifCentro()
{

$where = array(
 'centro_id'   =>$this->input->post('id'),
  'seguro_id'   =>$this->input->post('id_seguro')
);

$this->db->where($where);
$this->db->delete('centros_tarifarios_test');


$where1 = array(
 'id_centro'   =>$this->input->post('id'),
  'id_seguro'   =>$this->input->post('id_seguro')
);
$this->db->where($where1);
//$this->db->delete('codigo_contrato');
//--------------------------------------------------------------------------------------------------

}
 
 
}