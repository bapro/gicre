<?php
class Modal_orden_medica extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
    $this->ID_CENTRO =$this->session->userdata('id_centro');
	$this->clinical_history = $this->load->database('clinical_history', TRUE);
	$this->load->model("model_clinical_hist");
    $this->load->library("user_register_info");
	$this->load->library("create_forms");
	 $this->load->library("get_table_data_by_id");
	 $this->load->library('medico_see_all_pat_hist');
			  $this->WHERE_ID_USER =  $this->medico_see_all_pat_hist->index();
 
}



public function create_orden_medica() {


    if( $this->input->post('id_centro') == "" || $this->input->post('sala') == ""  || $this->input->post('fecha') == ""){
        $response['message'] = "Campo con <span style='color:red'>*</span> son obligatorios.";
        $response['status']  = 1;
        
        }else {
            
            $fecha = date("Y-m-d", strtotime($this->input->post('fecha')));
            if($this->input->post('id')==0){
              $data = array( 
                'centro' => $this->input->post('id_centro'),
                'name' => $this->input->post('sala'),
                'fecha_ingreso' => $fecha,
                'diagno_ing'=> $this->input->post('diagnos'),
                'direction'=> 1,
                'id_historial' => $this->ID_PATIENT,
                'inserted_by' => $this->ID_USER,
				'updated_by' => $this->ID_USER,
                'inserted_time' => date("Y-m-d H:i:s"),
               
             );
            
           $this->clinical_history->insert('orden_medica_sala',$data);
           $last_id = $this->clinical_history->insert_id();
           
            }else{
                $data = array( 
                    'centro' => $this->input->post('id_centro'),
                    'name' => $this->input->post('sala'),
                    'fecha_ingreso' => $fecha,
                    'diagno_ing'=> $this->input->post('diagnos'),
					'updated_by' => $this->ID_USER,
                   'updated_time' => date("Y-m-d H:i:s"),
                    
                 );
                $where= array(
                    'id' =>$this->input->post('id')
                  );
                  
                $this->clinical_history->where($where);
               $this->clinical_history->update('orden_medica_sala',$data);
               $last_id = $this->input->post('id');
            }
            $response['message'] =  $last_id;
            $response['status']  = 0;
            
        }
         echo json_encode($response);
}


public function pagination() {
    $sql="SELECT * FROM orden_medica_sala WHERE id_historial=$this->ID_PATIENT $this->WHERE_ID_USER ORDER BY id  DESC";
     $query= $this->clinical_history->query($sql);
     $data['num_rows']= $query->num_rows();
     $data['rows']=$query;
    $this->load->view('clinical-history/medical-order/pagination', $data);
	
    
}



public function form() {
    $data['id_patient']=$this->ID_PATIENT;
    $data['id_user']=$this->ID_USER;
    $page= $this->input->get('page');
    $data['orden_medica_data'] = $this->input->get('signo');
    $sql="SELECT * FROM orden_medica_sala WHERE id=$page";
    $data['query_orden_med']= $this->clinical_history->query($sql);
    [$num_drugs, $num_est, $num_lab, $num_mg]= $this->model_clinical_hist->count_total_each_table($page);
    //echo $num_drugs;
    $data['num_drugs'] = $num_drugs;
    $data['num_est'] = $num_est;
    $data['num_lab'] = $num_lab;
    $data['num_mg'] = $num_mg;
	  	 [$result_centro_medicos]= $this->create_forms->getCentroAndSeguroByPerfil(0);
	$data['result_centro_medicos']=$result_centro_medicos;
   $this->load->view('clinical-history/medical-order/forms', $data);
         echo "<script> $('.spinner-border').hide()</script>"; 
    
}





public function repetirOrdenMedica()
{
$this->clinical_history->trans_begin();
$idsala= $this->input->post('idsala');
$sql = "select * from orden_medica_sala WHERE id=$idsala";
$datas= $this->clinical_history->query($sql);
foreach ($datas->result() as $rowSala) 
$save1 = array(
'name'=> $rowSala->name,
'id_user' => $rowSala->inserted_by,
'id_historial' => $rowSala->id_historial,
'centro' => $rowSala->centro,
'inserted_by' => $rowSala->inserted_by,
'inserted_time' =>date("Y-m-d H:i:s"),
'updated_by' => $rowSala->updated_by,
'updated_time' =>date("Y-m-d H:i:s")

);
$this->clinical_history->insert("orden_medica_sala",$save1);
$id_last=$this->clinical_history->insert_id();
//-------------------------------------------------------------------------------------
$id_sala_rec=$this->clinical_history->select('id_sala')->where('id_sala',$idsala)->get('orden_medica_recetas')->row('id_sala');
if($id_sala_rec){
$sql = "select * from orden_medica_recetas WHERE id_sala=$idsala";
$datarec= $this->clinical_history->query($sql);
foreach ($datarec->result() as $row) {
	$save2 = array(
'medica'=> $row->medica,
'presentacion'=> $row->presentacion,
'frecuencia'=> $row->frecuencia,
'via' => $row->via,
'oyo' => $row->oyo,
'operator' => $rowSala->inserted_by,
'insert_date'=>date("Y-m-d H:i:s"),
'historial_id' =>$row->historial_id,
'updated_by' =>$rowSala->inserted_by,
'updated_time'=>date("Y-m-d H:i:s"),
'nota' => $row->nota,
'printing'=>$row->printing,
'id_sala'=>$id_last,
'centro'=>$row->centro,
'cantidad'=>$row->cantidad,
'cobertura' => $row->cobertura,
'idem' => $row->idem,
'descuento' => $row->descuento
);
$this->clinical_history->insert("orden_medica_recetas",$save2);
}
}

//---------------------------------------------------------------------------------------------------
$id_sala_rec=$this->clinical_history->select('id_sala')->where('id_sala',$idsala)->get('orden_medica_estudios')->row('id_sala');
if($id_sala_rec){
$sql = "select * from orden_medica_estudios WHERE id_sala=$idsala";
$datarec= $this->clinical_history->query($sql);
foreach ($datarec->result() as $row) {
$save3 = array(
'estudio'=> $row->estudio,
'cuerpo'=> $row->cuerpo,
'lateralidad' => $row->lateralidad,
'observacion' => $row->observacion,
'historial_id' =>$row->historial_id,
'operator' => $rowSala->inserted_by,
'updated_by' => $rowSala->inserted_by,
'insert_date'=> date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
'printing'=> $row->printing,
'id_sala'=>$id_last,
'centro'=>$row->centro,
'cobertura' => $row->cobertura,
'idemes' => $row->idemes,
'cantidad' => $row->cantidad,
'descuento' => $row->descuento
);
$this->clinical_history->insert("orden_medica_estudios",$save3);
}
}


//---------------------------------------------------------------------------------------------------
$id_sala_lab=$this->clinical_history->select('id_sala')->where('id_sala',$idsala)->get('orden_medcia_lab')->row('id_sala');
if($id_sala_lab){
$sql = "select * from orden_medcia_lab WHERE id_sala=$idsala";
$datarec= $this->clinical_history->query($sql);
foreach ($datarec->result() as $row) {

$save3 = array(
  'laboratory'  =>$row->laboratory,
  'operator'=> $row->operator,
  'historial_id' =>$row->historial_id,
 'insert_time'=>date("Y-m-d H:i:s"),
 'updated_by'=> $rowSala->inserted_by,
 'updated_time'=>date("Y-m-d H:i:s"),
  'printing'=>$row->printing,
  'user_id'=>$rowSala->inserted_by,
 'id_sala'=> $id_last,
 'centro'=> $row->centro,
'cobertura' => $row->cobertura,
'idemlab' => $row->idemlab,
'cantidad' => $row->cantidad,
'descuento' => $row->descuento

  );
$this->clinical_history->insert("orden_medcia_lab",$save3);
}
}

//---------------------------------------------------------------------------------------------------
$id_sala_gnrl=$this->clinical_history->select('id_sala')->where('id_sala',$idsala)->get('ord_med_med_gen')->row('id_sala');
if($id_sala_gnrl){
$sql = "select * from ord_med_med_gen WHERE id_sala=$idsala";
$datarec= $this->clinical_history->query($sql);
foreach ($datarec->result() as $row) {
$save = array(
'medidas_gen'=>$row->medidas_gen,
'descripcion_mg'=>$row->descripcion_mg,
'intervalo_de_real'=>$row->intervalo_de_real,
'id_user' => $rowSala->inserted_by,
'id_patient' =>$row->id_patient,
'inserted_by' => $rowSala->inserted_by,
'inserted_time' =>date("Y-m-d H:i:s"),
'printing' =>$row->printing,
'id_sala' =>$id_last,
'centro' =>$row->centro
);
$this->clinical_history->insert("ord_med_med_gen",$save);
}
}
$this->clinical_history->trans_complete();
if ($this->clinical_history->trans_status() === FALSE)
			{
			$this->clinical_history->trans_rollback();
			  echo '<i class="bi bi-x-square text-danger fs-4"></i>';
			}
			else
			{
			 echo '<i class="bi bi-check-lg text-success fs-4"></i>';
			}


}













}