<?php
	class H_c_indication_drug extends CI_Controller {
    public function __construct() {
        parent::__construct();
     $this->ID_USER =$this->session->userdata('user_id');
	  $this->PERFIL_USER =$this->session->userdata('user_perfil');
	 $this->clinical_history = $this->load->database('clinical_history',TRUE);
	 $this->load->library("load_history_resume");
	
    }
	
	/*function indication_med_table(){
		
		 $id_patient=$this->input->post("id_patient");
		  $id_centro=$this->input->post("id_centro");
		 $this->session->set_userdata('id_patient', $id_patient);
		 $this->session->set_userdata('id_centro', $id_centro);
          $sql="SELECT * FROM   h_c_indicaciones_medicales WHERE historial_id=$id_patient";
	      $query_results=$this->clinical_history->query($sql);
		  $data['total_recetas']=$query_results->num_rows();
		  $data['historial_id']  = $id_patient;
		   $data['centro_medico']  = $id_centro;
		 
		   $data['id_position']  =$this->input->post('id');
		   
		  $this->load->view('clinical-history/indications/receipt/indication-med-table', $data);
	}*/	
	
	
	
	
	
	
	
	
		
	
		function indication_med_table(){
		
		 $id_patient=$this->input->post("id_patient");
		 $table=$this->input->post("table");
		 $query=$this->clinical_history->query("SELECT insert_time, historial_id, centro, operator FROM $table WHERE historial_id=$id_patient GROUP BY DATE(insert_time) ORDER BY insert_time DESC");
	$data['query_grouped']=$query->result();
	$data['query_grouped_num']=$query->num_rows();
	$data['table']=$table;
	
	
	
	
	
	
 $this->load->view('clinical-history/indications/receipt/register-by-date', $data);
		 
		 
		 
	}	
	
	
function repeatIndicationDrugs(){

$id_patient=$this->input->post("id_patient");
$date=$this->input->post("date");
$query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_medicales WHERE historial_id=$id_patient AND operator=$this->ID_USER AND DATE(insert_time)='$date' ");
	foreach($query->result() as $drugData) {

$save1 = array(
'medica' => $drugData->medica,
'dosis' => $drugData->dosis,
'presentacion' => $drugData->presentacion,
'frecuencia' => $drugData->frecuencia,
'cantidad' => $drugData->cantidad,
'via' => $drugData->via,
'oyo' => $drugData->oyo,
'insert_time' => date("Y-m-d H:i:s"),
'historial_id' => $drugData->historial_id,
'operator' => $this->ID_USER,
'centro' =>$drugData->centro,
'updated_time' => date("Y-m-d H:i:s"),
'updated_by' => $this->ID_USER,
//'singular_id' => 1,
'printing' => 1

);

$this->clinical_history->insert("h_c_indicaciones_medicales",$save1);
	}
}
	
	
	
	public function showIndicationsByDateList(){
		
		$date = $this->input->post('date');
		$id_pat = $this->input->post('id_pat');
		$query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_medicales WHERE historial_id=$id_pat
		AND DATE(insert_time)='$date' ORDER BY id_i_m  DESC");
		
		foreach($query->result() as $r) {
			$op=$this->db->select('name')->where('id_user',$r->operator)->get('users')->row('name');
			$fecha = date("d-m-Y", strtotime($r->insert_time));


           
        if($r->printing==1){
			$checked = "checked";
			}else{
			$checked=""; 
			}


			if($r->operator==$this->ID_USER AND $fecha == date("d-m-Y") ) {
				
				
				$actions =
				'<div class="btn-group" >
	  <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
  
		<ul class="dropdown-menu" >
		 <li class="list-group-item"><button  type="button"  id="'.$r->id_i_m.'" class="text-primary update-this-drug dropdown-item" ><i class="bi bi-pencil-square"></i> Editar </button></li>
		<li class="list-group-item"><button  type="button"  id="'.$r->id_i_m.'" class="text-danger delete-recetas dropdown-item"><i class="bi bi-x-square"></i> Eliminar</button></li>
		
            </ul>
		
		</div>';
			
			}else{
				$actions='<i style="color:red" class="fa fa-ban"></i>';
				
			}
			if($r->operator==$this->ID_USER){
				   $checkbox = "<input type='checkbox'  class='check-recet-print' $checked value='$r->id_i_m' />";
			}else{
				$checkbox='';

			}
			 if($r->cantidad=='uso continuo'){
			$uso_continuo = ' (uso continuo)';
			}else{
				$uso_continuo ='' ;
			}

		echo "<tr>
       <td>$r->medica <br><em>($r->dosis)</em></td>
       <td>$r->presentacion</td>
	   <td>$r->frecuencia</td>
	   <td>$r->via</td>
	   <td>$r->cantidad $uso_continuo</td>
	   <td>$checkbox</td>
	   <td>$actions</td>
	
       </tr>";

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
	
	
	
function saveMedicamento()
{
	$this->session->unset_userdata('is_shown_print_drug');
	$this->session->set_userdata('is_shown_print_drug', 1);
	if( $this->input->post('indicationMed') == "" || 
	     $this->input->post('floatingPres') == "" || 
		 $this->input->post('floatingFrequency') == "" || 
		 $this->input->post('floatingVia') == "" ){
		$response['message'] = "Campo con <span style='color:red'>*</span> son obligatorios.";
        $response['status']  = 1;
		
        }else {
			
			$usoCont= $this->input->post('usoCont');
            $usoCont1 = (isset($usoCont)) ? 1 : 0;
			if($usoCont1==1){
				$cantidad = 'uso continuo';
			}else{
				$cantidad = $this->input->post('floatingCantidad');
			}
			if($this->input->post('id')==0){
              $data = array( 
                'medica' => $this->input->post('indicationMed'),
                'dosis' => $this->input->post('floatingDosis'),
                'presentacion' => $this->input->post('floatingPres'),
                'frecuencia' => $this->input->post('floatingFrequency'),
				'cantidad' => $cantidad,
				'via' => $this->input->post('floatingVia'),
				'oyo' => $this->input->post('viaOft'),
				'insert_time' => date("Y-m-d H:i:s"),
				'historial_id' => $this->getIdPatient(),
				'operator' => $this->ID_USER,
				'centro' =>$this->input->post('id_centro'),
			    'updated_time' => date("Y-m-d H:i:s"),
				'updated_by' => $this->ID_USER,
				//'singular_id' => 1,
				'printing' => 1
				
            );
			
		   $this->clinical_history->insert('h_c_indicaciones_medicales',$data);
		}else{
			$data = array( 
                'medica' => $this->input->post('indicationMed'),
                'dosis' => $this->input->post('floatingDosis'),
                'presentacion' => $this->input->post('floatingPres'),
                'frecuencia' => $this->input->post('floatingFrequency'),
				'cantidad' => $cantidad,
				'via' => $this->input->post('floatingVia'),
				'oyo' => $this->input->post('viaOft'),
				 'updated_time' => date("Y-m-d H:i:s"),
				'updated_by' => $this->ID_USER,
				
				
            );
			$where= array(
                'id_i_m' =>$this->input->post('id')
              );
              
            $this->clinical_history->where($where);
		   $this->clinical_history->update('h_c_indicaciones_medicales',$data);

		}
			$response['message'] = '';
            $response['status']  = 0;
			
		}
		 echo json_encode($response);
}
	


	
	public function medicamentos_list(){
		$this->session->set_userdata('is_shown_print_drug', '');
		$draw=intval($this->input->get("draw"));
		$start=intval($this->input->get("start"));
		$length=intval($this->input->get("length"));
		 $id_patient=$this->input->get("id_patient_lab");
		$query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_medicales WHERE historial_id=$id_patient");
		$data= [];
		foreach($query->result() as $r) {
			$op=$this->db->select('name')->where('id_user',$r->operator)->get('users')->row('name');
			$fecha = date("d-m-Y H:i:s", strtotime($r->insert_time));


			if($r->operator==$this->ID_USER) {
				$actions =
				'<div class="btn-group" >
	  <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
  
		<ul class="dropdown-menu" >
		 <li class="list-group-item"><button  type="button"  id="'.$r->id_i_m.'" class="text-primary update-this-drug dropdown-item" ><i class="bi bi-pencil-square"></i> Editar </button></li>
		<li class="list-group-item"><button  type="button"  id="'.$r->id_i_m.'" class="text-danger delete-recetas dropdown-item"><i class="bi bi-x-square"></i> Eliminar</button></li>
		

		</ul>
		
		</div>';
				
				
			
			
			}else{
				$actions='<i style="color:red" class="fa fa-ban"></i>';
				
			}

			if($r->singular_id==1){
			$checked = "checked";
			}else{
			$checked=""; 
			}


			 $sub_array = array();
             $sub_array[] = $r->id_i_m; 			 
			 $sub_array[] = $fecha;  
			 $sub_array[] = $r->medica ."<br/><em>$r->dosis</em>";  
			 $sub_array[] = $r->presentacion; 
			 $sub_array[] = $r->frecuencia; 
			 $sub_array[] = $r->via ."<br/><em>$r->oyo</em>";
			 $sub_array[] = $r->cantidad; 
			 $sub_array[] = '<input type="checkbox"  class="check-recet-print" '.$checked.' value="'.$r->id_i_m.'" />'; 
			 $sub_array[] = $op;  
			 $sub_array[] = $actions;  
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




	

	
	
	
	
    function DeleteRecetas()
    {
        $id_lab = $this->input->post('id');
      $this->clinical_history->query("DELETE FROM h_c_indicaciones_medicales WHERE id_i_m=$id_lab");
    }
	
	
	function fetch_single_drug()  
 {  
      $output = array();  
      $id=$this->input->post('id');
      $query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_medicales WHERE id_i_m=$id");
    
    foreach($query->result() as $row) {
		       
           $output['medica'] = $row->medica;  
           $output['dosis'] = $row->dosis;
           $output['presentacion'] = $row->presentacion;  
           $output['frecuencia'] = $row->frecuencia; 
		   $output['via'] = $row->via; 
		   $output['oyo'] = $row->oyo; 
		   $output['cantidad'] = $row->cantidad;   
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
	
	
	
	
	
	
	
	}