<?php
class Hosp_orden_medica_drugs extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
	 $this->ID_CENTRO =$this->session->userdata('id_centro');
	$this->load->model("model_clinical_hist");
    $this->load->library("user_register_info");
	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
$this->load->model("model_hospitalization");
}

 function autoCompleteInputHospMed()
{
$keyword=$this->input->post('keyword');
if(!empty($keyword)) {
$data['field_name_in_table']= 'sub_groupo';
$data['input_name']=  'hospOrdenMedicaMed';
$data['div_result']=  'hosp-suggestion-drugs-list-ord';

$sql ="SELECT sub_groupo FROM  centros_tarifarios_test WHERE groupo LIKE '%medica%' AND sub_groupo LIKE '" . $keyword . "%' AND centro_id=$this->ID_CENTRO GROUP BY groupo LIMIT 0,20";
$data['query']=$this->db->query($sql); 
$this->load->view('clinical-history/auto-complete-field-results', $data);


    }


}

public function save_orden_medica_recetas() {

if( $this->input->post('ordenMedicaMed') == "" || $this->input->post('ordenMedMedPres') == ""
      || $this->input->post('ordenMedFre') == "" || $this->input->post('ordenMedVia') == ""  || $this->input->post('ordenMedicaCantidad') == "" ){
        $response['message'] = "Campo con <span style='color:red'>*</span> son obligatorios.";
        $response['status']  = 1;
        
        }else{
   
			
			$medicamento1=$this->hospitalization_emgergency->select('id')->where('name',$this->input->post('ordenMedicaMed'))->get('emergency_medicaments')->row('id'); 
		 if($medicamento1){
			 $medicamento=$medicamento1;
		 }else{
			$medicamento=$this->input->post('ordenMedicaMed'); 
		 }
			
			 if($this->input->post('idReceta')==0){
              $data = array( 
                'medica' => $medicamento,
                'presentacion' => $this->input->post('ordenMedMedPres'),
				'dosis' => $this->input->post('dosis'),
                'frecuencia'=> $this->input->post('ordenMedFre'),
                'via'=> $this->input->post('ordenMedVia'),
				'cantidad' => $this->input->post('ordenMedicaCantidad'),
				'new_cant' => $this->input->post('ordenMedicaCantidad'),
                'nota'=> $this->input->post('ordenMedNota'),
				'id_register'=> $this->input->post('id_register'),
                 'historial_id' => $this->ID_PATIENT,
                'operator' => $this->ID_USER,
                'updated_by' => $this->ID_USER,
				'centro' => $this->ID_CENTRO,
                 'insert_date' => date("Y-m-d H:i:s"),
                 'updated_time' => date("Y-m-d H:i:s"),
               
             );
            
           $this->hospitalization_emgergency->insert('hosp_orden_medica_recetas',$data);
          
          }else{
                $data = array( 
                    'medica' => $this->input->post('ordenMedicaMed'),
					'cantidad'=> $this->input->post('ordenMedicaCantidad'),
					'dosis' => $this->input->post('dosis'),
					'new_cant' => $this->input->post('ordenMedicaCantidad'),
                    'presentacion' => $this->input->post('ordenMedMedPres'),
                    'frecuencia'=> $this->input->post('ordenMedFre'),
                    'via'=> $this->input->post('ordenMedVia'),
                    'nota'=> $this->input->post('ordenMedNota'),
                    'updated_by' => $this->ID_USER,
                    'updated_time' => date("Y-m-d H:i:s"),
                    
                 );
                $where= array(
                    'id ' =>$this->input->post('idReceta')
                  );
                  
                $this->hospitalization_emgergency->where($where);
               $this->hospitalization_emgergency->update('hosp_orden_medica_recetas',$data);
             
            }
			 [$num_drugs]= $this->model_hospitalization->count_total_each_table($this->input->post('idReceta'));
    	     $response['message'] = $num_drugs;
            $response['status']  = 0;
} 
       
         echo json_encode($response);
}


public function drugs() {

    $data['user_id']= $this->ID_USER;
    $data['perfil']= "Admin";
	$ordenMedInsertedId=$this->input->post('ordenMedInsertedId');
	 $sql="SELECT * FROM  hosp_orden_medica_recetas WHERE id_register=$ordenMedInsertedId AND historial_id=$this->ID_PATIENT AND canceled=0 ORDER BY id DESC";
    $query= $this->hospitalization_emgergency->query($sql);
    $data['ordenMedReRows']=$query;
	 $data['num_rows']= ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query->num_rows().' registro(s)</span> '; 
   $this->load->view('hospitalization/clinical-history/medical-order/drugs/table', $data);
    
}




function fetch_single_drug()  
{  
     $output = array();  
     $id=$this->input->post('id');
     $query=$this->hospitalization_emgergency->query("SELECT * FROM hosp_orden_medica_recetas WHERE id=$id");
   
   foreach($query->result() as $row) {
              
          $output['medica'] = $row->medica;  
          $output['presentacion'] = $row->presentacion;  
		   $output['dosis'] = $row->dosis;  
          $output['frecuencia'] = $row->frecuencia; 
		  $output['cantidad'] = $row->cantidad; 
          $output['via'] = $row->via; 
          $output['nota'] = $row->nota;  
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