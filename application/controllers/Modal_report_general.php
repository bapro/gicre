<?php
class Modal_report_general extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
    $this->ID_CENTRO =$this->session->userdata('id_centro');
	   $this->load->library("create_forms");
	   $this->load->library("get_table_data_by_id");
		$this->clinical_history = $this->load->database('clinical_history',TRUE);
    $this->load->library("user_register_info");
	 $this->load->library('medico_see_all_pat_hist');
			  $this->WHERE_ID_USER =  $this->medico_see_all_pat_hist->index();
 
}

function searchText(){
$textNameId = $this->input->post('textNameId');	
	$textName= $this->clinical_history->select('default_text')->where('id_name', $textNameId)->get('hc_reporte_general_default_text')->row('default_text');	
   if($textName==""){
	   $response['status'] =0;
   }else{
	  $response['status'] =1; 
   }
	  $response['message'] = $textName;
	  echo json_encode($response);
}


public function saveTextName()
{
		
 $save = array(
'id_name'=> $this->input->post('textNameId'),
'default_text'  => $this->input->post('textName'),
'inserted_by' =>  $this->ID_USER, 

 );


if($this->input->post('action') ==0){
$this->clinical_history->insert('hc_reporte_general_default_text', $save);
}else{
$where = array(
	'id_name'=> $this->input->post('textNameId')
	);
	$this->clinical_history->where($where);
$this->clinical_history->update("hc_reporte_general_default_text",$save);
}
 
if($this->clinical_history->affected_rows() > 0){	
$response['status'] =  1;
 $response['message']='<i class="bi bi-check-lg text-success fs-2"></i>';
}else{
   $response['status'] =  2;
  $response['message'] = 'No se ha guadado!'; 
}
echo json_encode($response);
}




public function loadReporteName() {
	  $data['id']=$this->input->post('id');
	  $rPname= $this->clinical_history->select('reporte')->where('id', $this->input->post('id'))->get('hc_cirugia_reporte')->row('reporte');	
   $data['rPname']=$rPname;
   $this->load->view('clinical-history/general-report/loadReporteName', $data);
    
}

public function pagination() {
    $sql="SELECT * FROM hc_cirugia_reporte WHERE id_patient=$this->ID_PATIENT  $this->WHERE_ID_USER  ORDER BY id DESC";
     $query= $this->clinical_history->query($sql);
     $data['num_rows']= $query->num_rows();
     $data['rows']=$query;
    $this->load->view('clinical-history/general-report/pagination', $data);
    
}


public function form() {
    $data['id_patient']=$this->ID_PATIENT;
    $data['id_user']=$this->ID_USER;
    $page= $this->input->get('page');
    $data['general_repo_data'] = $this->input->get('signo');
    $sql="SELECT * FROM hc_cirugia_reporte WHERE id=$page";
    $data['query']= $this->clinical_history->query($sql);
	$lastIdGr= $this->clinical_history->select('id')->where('historial_id', $this->ID_PATIENT)->where('inserted_by', $this->ID_USER)->order_by('id','desc')->limit(1)->get('h_c_enfermedad_actual')->row('id');	
  $data['lastIdGr']=$lastIdGr;
  	 [$result_centro_medicos]= $this->create_forms->getCentroAndSeguroByPerfil(0);
	$data['result_centro_medicos']=$result_centro_medicos;
  $this->load->view('clinical-history/general-report/form', $data);
        echo "<script> 
		$('.spinner-border').hide();
		$('.form-select3').select2({
			theme: 'bootstrap-5',
			width: '100%'
			});
			$('.change_date_report_general').mask('00-00-0000 00:00:00');
			
			 loadReporteName($page);
		</script>";  
    
}

function delete()
{
    $id = $this->input->post('id');
  $this->clinical_history->query("DELETE FROM hc_cirugia_reporte WHERE id=$id");
}


function attachHistToGeneralReport(){
$id_patient = $this->input->post('id_patient');
$idEa= $this->clinical_history->select('id')->where('historial_id', $id_patient)->where('inserted_by', $this->ID_USER)->order_by('id','desc')->limit(1)->get('h_c_enfermedad_actual')->row('id');

$idCd= $this->clinical_history->select('id')->where('historial_id', $id_patient)->where('inserted_by', $this->ID_USER)->order_by('id','desc')->limit(1)->get('h_c_conclusion_diagno')->row('id');	

$lastIdGr= $this->clinical_history->select('id')->where('id_patient', $id_patient)->where('inserted_by', $this->ID_USER)->order_by('id','desc')->limit(1)->get('hc_cirugia_reporte')->row('id');	

$data = array( 
'id_enf' => $idEa,
'id_cond' => $idCd,
);

$where= array(
'id' =>$lastIdGr
);

$this->clinical_history->where($where);
$result=$this->clinical_history->update('hc_cirugia_reporte',$data);
if($result){
echo '<em class="text-danger" >Historia Actual esta anexada.</em>';
}else{
	echo 0;
}

}

function create_new_name(){
	$newVal = array( 
            'name' => $this->input->post('reportGeneralName'),
          );
        
       $this->clinical_history->insert('hc_reporte_general_name',$newVal);
}


public function save_reporte_general() {
	//$reportGeneralName=preg_replace('/[0-9&#;?]/s','', $this->input->post('reportGeneralName'));	
   if( $this->input->post('reportGeneralName') == "" || $this->input->post('id_centro')==""|| $this->input->post('change_date')==""){
        $response['message'] = "Los campos con * son obligatorios.";
        $response['status']  = 1;
        $response['lst_id_rp']  = '';
        }else {
			
		
		$query1 = $this->clinical_history->get_where('hc_reporte_general_name',array('name'=>$this->input->post('reportGeneralName')));
	if($query1->num_rows() ==0)
	{
      $this->create_new_name();  
	} 
			
			
			
            if($this->input->post('id')==0){
              $data = array( 
                'days_amount' => "Se recomienda ". $this->input->post('days_amount_rest'). " días de reposo",
                'reporte' => $this->input->post('reportGeneralName'),
                'detalle' => $this->input->post('reporte_general_detail'),
                'id_patient' => $this->ID_PATIENT,
                'inserted_by' =>  $this->session->userdata('repor_g_in_by'),
                'id_centro' =>$this->input->post('id_centro'),
                'id_cond'=> $this->input->post('id_con'),
                'id_enf'=> $this->input->post('id_enf'),
                'inserted_time' => $this->session->userdata('repor_g_in_time'),
                'updated_by' => $this->session->userdata('repor_g_up_by'),
                'updated_time' => $this->session->userdata('repor_g_up_time')
             );
            
           $this->clinical_history->insert('hc_cirugia_reporte',$data);
		   $lst_id=$this->clinical_history->insert_id();
           $print='
  <div class="btn-group dropend ">
  
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-printer"></i> <span class="visually-hidden">Toggle Dropdown</span>
  </button>
	 <ul class="dropdown-menu"  >
   <li>
      <a class="dropdown-item">FORMATO VERTICAL</a> 
    </li>
       <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/general_report/'.$this->ID_PATIENT.'/'.$lst_id.'/1/vert/'.$this->input->post('id_centro').'" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/general_report/'.$this->ID_PATIENT.'/'.$lst_id.'/0/vert/'.$this->input->post('id_centro').'" target="_blank">sin la foto</a>
       </li>
       <li>
       <a class="dropdown-item">FORMATO HORIZONTAL</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/general_report/'.$this->ID_PATIENT.'/'.$lst_id.'/1/horiz/'.$this->input->post('id_centro').'" target="_blank">con la foto</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/general_report/'.$this->ID_PATIENT.'/'.$lst_id.'/0/horiz/'.$this->input->post('id_centro').'" target="_blank">sin la foto</a>
       </li>
  </ul>
  </div>

';
            } else{
				$lst_id=$this->input->post('id');
                $print='';
                $data = array( 
                     'days_amount' => "Se recomienda ". $this->input->post('days_amount_rest'). " días de reposo",
                    'reporte' => $this->input->post('reportGeneralName'),
                    'detalle' => $this->input->post('reporte_general_detail'),
					 'inserted_time' => date("Y-m-d H:i:s",strtotime($this->input->post('change_date'))),
                     'updated_by' => $this->session->userdata('repor_g_up_by'),
                     'updated_time' => $this->session->userdata('repor_g_up_time')
                    
                 );
                 $where= array(
                    'id' =>$lst_id
                  );
                  
                $this->clinical_history->where($where);
               $this->clinical_history->update('hc_cirugia_reporte',$data);
    
            }
            $response['message'] = $print;
            $response['status']  = 0;
			 $response['lst_id_rp']  = $lst_id;
            
        }
         echo json_encode($response);
}




 function delete_this_report(){
        $where = array(
             'id' => $this->input->post('id')
         );
         $this->clinical_history->where($where);
         $this->clinical_history->delete('hc_cirugia_reporte');

     }
	 






public function repeatReportGeneral()
{
$this->clinical_history->trans_begin();
$id= $this->input->post('id');
$reportData=$this->clinical_history->select('*')->where('id',$id)->get('hc_cirugia_reporte')->row_array();


$save1 = array(

'days_amount' => $reportData['days_amount'],
'reporte' => $reportData['reporte'],
'detalle' => $reportData['detalle'],
'id_patient' => $this->ID_PATIENT,
'inserted_by' =>   $this->ID_USER,
'id_centro' =>$reportData['id_centro'],
'id_cond'=> $reportData['id_cond'],
'id_enf'=> $reportData['id_enf'],
'inserted_time' => date("Y-m-d H:i:s"),
'updated_by' =>  $this->ID_USER,
'updated_time' => date("Y-m-d H:i:s")

);

$this->clinical_history->insert("hc_cirugia_reporte",$save1);
$lst_id=$this->clinical_history->insert_id();
$this->clinical_history->trans_complete();
if ($this->clinical_history->trans_status() === FALSE)
			{
			$this->clinical_history->trans_rollback();
		$response['message'] = "La repetición fallo.";
        $response['status']  = 0;
			}
			else
			{
			$response['status']  = $lst_id;
			$response['message'] = "";
			}
			echo json_encode($response);


}






}