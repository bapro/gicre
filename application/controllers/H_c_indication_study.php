<?php
class H_c_indication_study extends CI_Controller {
public function __construct() {
    parent::__construct();
 $this->ID_USER =$this->session->userdata('user_id');
$this->clinical_history = $this->load->database('clinical_history',TRUE);
}



	
	function indication_study_data(){
		
		 $id_patient=$this->input->post("id_patient");
		 $query=$this->clinical_history->query("SELECT insert_time, historial_id, centro, operator FROM h_c_indicaciones_estudio WHERE historial_id=$id_patient GROUP BY DATE(insert_time) ORDER BY insert_time DESC");
	$data['query_grouped']=$query->result();
	$data['query_grouped_num']=$query->num_rows();
	
 $this->load->view('clinical-history/indications/study/register-by-date', $data);
		 	 
	}
	
	
	
	function repeatIndicationStudy(){

$id_patient=$this->input->post("id_patient");
$date=$this->input->post("date");
$query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_estudio WHERE historial_id=$id_patient AND operator=$this->ID_USER AND DATE(insert_time)='$date' ");
	foreach($query->result() as $studyData) {

$save1 = array(
'estudio' => $studyData->estudio,
'cuerpo' => $studyData->cuerpo,
'lateralidad' => $studyData->lateralidad,
'observacion' => $studyData->observacion,
'insert_time' => date("Y-m-d H:i:s"),
'historial_id' => $studyData->historial_id,
'operator' => $this->ID_USER,
'centro' =>$studyData->centro,
'updated_time' => date("Y-m-d H:i:s"),
'updated_by' => $this->ID_USER,

);

$this->clinical_history->insert("h_c_indicaciones_estudio",$save1);
	}
}
	
	
	
	
	
	
	
	
	
	
 function getIdPatient(){
		 $id_patient =$this->session->userdata('id_patient');
		 return $id_patient;
	 }

function getIdCentro(){
		 $id_centro =$this->session->userdata('id_centro');
		 return $id_centro;
	 }
function saveStudy()
{

if( $this->input->post('floatingIndEst') == "" ||  $this->input->post('floatingIndBody') == ""  ){
    $response['message'] = "Campo con <span style='color:red'>*</span> son obligatorios.";
    $response['status']  = 1;
    
    }else {
        if($this->input->post('id')==0){
          $data = array( 
            'estudio' => $this->input->post('floatingIndEst'),
            'cuerpo' => $this->input->post('floatingIndBody'),
            'lateralidad' => $this->input->post('floatingIndLat'),
            'observacion' => $this->input->post('floatingIndObs'),
            'insert_time' => date("Y-m-d H:i:s"),
            'historial_id' => $this->getIdPatient(),
            'operator' => $this->ID_USER,
            'centro' =>$this->input->post('id_centro'),
            'updated_time' => date("Y-m-d H:i:s"),
            'updated_by' => $this->ID_USER,
            
         );
        
       $this->clinical_history->insert('h_c_indicaciones_estudio',$data);
        } else{
            $data = array( 
                'estudio' => $this->input->post('floatingIndEst'),
                'cuerpo' => $this->input->post('floatingIndBody'),
                'lateralidad' => $this->input->post('floatingIndLat'),
                'observacion' => $this->input->post('floatingIndObs'),
                'updated_time' => date("Y-m-d H:i:s"),
                'updated_by' => $this->ID_USER,
                
             );
             $where= array(
                'id_i_e' =>$this->input->post('id')
              );
              
            $this->clinical_history->where($where);
           $this->clinical_history->update('h_c_indicaciones_estudio',$data);

        }
        $response['message'] = "";
        $response['status']  = 0;
		$response['getIdPatient']  = $this->getIdPatient();
		$response['getIdCentro']  = $this->getIdCentro();
        
    }
     echo json_encode($response);
}



public function showIndicationsByDateList(){
		
		$date = $this->input->post('date');
		$id_pat = $this->input->post('id_pat');
		$query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_estudio WHERE historial_id=$id_pat
		AND DATE(insert_time)='$date' ORDER BY id_i_e  DESC");
		
		foreach($query->result() as $r) {
				$fecha = date("d-m-Y", strtotime($r->insert_time));
				if($r->operator==$this->ID_USER AND $fecha == date("d-m-Y")) {
				
				
				$actions =
				'<div class="btn-group" >
	  <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
  
		<ul class="dropdown-menu" >
		 <li class="list-group-item"><button  type="button"  id="'.$r->id_i_e.'" class="text-primary update-this-study dropdown-item" ><i class="bi bi-pencil-square"></i> Editar </button></li>
		<li class="list-group-item"><button  type="button"  id="'.$r->id_i_e.'" class="text-danger delete-this-study dropdown-item"><i class="bi bi-x-square"></i> Eliminar</button></li>
		
            </ul>
		
		</div>';
			$one=1;
          $zero=0;
			
		
			}else{
				$actions='<i style="color:red" class="fa fa-ban"></i>';
			
				
			}
if($r->printing==1){
			$checked = "checked";
			}else{
			$checked=""; 
			}

if($r->operator==$this->ID_USER){
				   $checkbox = "<input type='checkbox'  class='check-estudio-print' $checked value='$r->id_i_e' />";
			}else{
				$checkbox='';

			}


           
     echo "<tr>
      <td>$r->estudio</td>
	   <td>$r->cuerpo</td>
	   <td>$r->lateralidad</td>
	   <td>$r->observacion</td>
	   <td>$checkbox</td>
	    <td>$actions</td>
		
	 <td></td>
       </tr>";

	}
  
		

	 }
	



public function study_list(){
    $perfil="Admin";
    $draw=intval($this->input->get("draw"));
    $start=intval($this->input->get("start"));
    $length=intval($this->input->get("length"));
	  $id_patient=$this->input->get("id_patient");
    $query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_estudio WHERE historial_id=$id_patient  ORDER BY id_i_e  DESC");
    $data= [];
    foreach($query->result() as $rwesy) {
        $op=$this->db->select('name')->where('id_user',$rwesy->operator)->get('users')->row('name');
        $fecha = date("d-m-Y H:i:s", strtotime($rwesy->insert_time));


        if($rwesy->operator==$this->ID_USER) {
              $button_action = '
        <div class="btn-group dropend ">
  
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu"  >
  
       <li class="data-li">
      <a  id="'.$rwesy->id_i_e.'" href="#" class="update-this-study dropdown-item">Editar Registro</a>
      </li>
     
        <li class="data-li">
       <a  id="'.$rwesy->id_i_e.'" href="#" class="copy-this-study dropdown-item">Copiar Registro</a>
       </li>
        <li class="data-li">
      <a id="'.$rwesy->id_i_e.'" href="#" class="delete-this-study dropdown-item">Eliminar Registro</a> 
       </li>
       
  </ul>
</div> ';
         
        }else{
            $button_action='<i style="color:red" class="fa fa-ban"></i>';
            
        }

      
        $one=1;
        $zero=0;
        $print = '
        <div class="btn-group dropend ">
  
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu"  >
   <li>
      <a class="dropdown-item">FORMATO VERTICAL</a> 
    </li>
       <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/study/'.$id_patient.'/'.$rwesy->id_i_e.'/'.$one.'/vert/'.$rwesy->centro.'" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/study/'.$id_patient.'/'.$rwesy->id_i_e.'/'.$zero.'/vert/'.$rwesy->centro.'" target="_blank">sin la foto</a>
       </li>
       <li>
       <a class="dropdown-item">FORMATO HORIZONTAL</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/study/'.$id_patient.'/'.$rwesy->id_i_e.'/'.$one.'/horiz/'.$rwesy->centro.'" target="_blank">con la foto</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/study/'.$id_patient.'/'.$rwesy->id_i_e.'/'.$zero.'/horiz/'.$rwesy->centro.'" target="_blank">sin la foto</a>
       </li>
  </ul>
</div> ';


;




    $sub_array = array();  
     $sub_array[] = $rwesy->id_i_e; 
         $sub_array[] = $fecha;  
         $sub_array[] = $rwesy->estudio;  
         $sub_array[] = $rwesy->cuerpo; 
         $sub_array[] = $rwesy->lateralidad; 
         $sub_array[] = $rwesy->observacion;
        $sub_array[] = $op; 
        $sub_array[] = $print; 
        $sub_array[] = $button_action; 
         
         
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




 function fetch_single_estudio()  
 {  
      $output = array();  
      $id=$this->input->post('id');
      $query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_estudio WHERE id_i_e=$id");
    
    foreach($query->result() as $row) {
       
           $output['estudio'] = $row->estudio;  
           $output['cuerpo'] = $row->cuerpo;
           $output['lateralidad'] = $row->lateralidad;  
           $output['observacion'] = $row->observacion;   
        //    if($row->image != '')  
        //    {  
        //         $output['user_image'] = '<img src="'.base_url().'upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
        //    }  
        //    else  
        //    {  
        //         $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
        //    }  
      }  
      echo json_encode($output);  
 }




function delete()
{
    $id = $this->input->post('id');
  $this->clinical_history->query("DELETE FROM h_c_indicaciones_estudio WHERE id_i_e=$id");
}










}