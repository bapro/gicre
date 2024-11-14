<?php
class Hosp_orden_medica_estudy extends CI_Controller {
public function __construct() {
    parent::__construct();
  $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
    $this->ID_CENTRO =$this->session->userdata('id_centro');
	$this->load->model("model_clinical_hist");
    $this->load->library("user_register_info");
 	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
}



public function save_orden_medica_sutdy() {


    if( $this->input->post('ordenMedicaEstEst') == "" || $this->input->post('ordenMedicaEstBodyPart') == ""){
        $response['message'] = "Campo con <span style='color:red'>*</span> son obligatorios.";
        $response['status']  = 1;
        
        }else {
         $estudio=$this->db->select('id_c_taf')->where('sub_groupo',$this->input->post('ordenMedicaEstEst'))->get('centros_tarifarios_test')->row('id_c_taf'); 
		 if($estudio){
			 $estudio=$estudio;
		 }else{
			$estudio=$this->input->post('ordenMedicaEstEst'); 
		 }
            if($this->input->post('id')==0){
              $data = array( 
                'estudio' => $estudio,
                'cuerpo' => $this->input->post('ordenMedicaEstBodyPart'),
                'lateralidad'=> $this->input->post('ordenMedicaEstLat'),
                'observacion'=> $this->input->post('ordenMedicaEstNota'),
				'id_register'=>$this->input->post('id_register'),
                'historial_id' => $this->ID_PATIENT,
                'operator' => $this->ID_USER,
                'updated_by' => $this->ID_USER,
                'centro' => $this->ID_CENTRO,
                 'insert_date' => date("Y-m-d H:i:s"),
                 'updated_time' => date("Y-m-d H:i:s"),
               
             );
            
           $this->hospitalization_emgergency->insert('hosp_orden_medica_estudios',$data);
          
            }else{
                $data = array( 
                'estudio' => $estudio,
                'cuerpo' => $this->input->post('ordenMedicaEstBodyPart'),
                'lateralidad'=> $this->input->post('ordenMedicaEstLat'),
                'observacion'=> $this->input->post('ordenMedicaEstNota'),
                    'updated_by' => $this->ID_USER,
                    'updated_time' => date("Y-m-d H:i:s"),
                    
                 );
                $where= array(
                    'id ' =>$this->input->post('id')
                  );
                  
                $this->hospitalization_emgergency->where($where);
               $this->hospitalization_emgergency->update('hosp_orden_medica_estudios',$data);
             
            }
			
            $response['message'] =  "";
            $response['status']  = 0;
            
        }
         echo json_encode($response);
}


public function studies() {
   $data['user_id']= $this->ID_USER;
    $data['perfil']= "Admin";
	$ordenMedInsertedId=$this->input->post('ordenMedInsertedId');
    $sql="SELECT * FROM  hosp_orden_medica_estudios WHERE id_register=$ordenMedInsertedId AND historial_id=$this->ID_PATIENT AND canceled=0  ORDER BY id  DESC";
     $query= $this->hospitalization_emgergency->query($sql);
     $data['ordenMedReRows']=$query;
	 $data['num_rows']= ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query->num_rows().' registro(s)</span> '; 
    $this->load->view('hospitalization/clinical-history/medical-order/study/table', $data);
    
}




function fetch_single_study()  
{  
     $output = array();  
     $id=$this->input->post('id');
     $query=$this->hospitalization_emgergency->query("SELECT * FROM hosp_orden_medica_estudios WHERE id=$id");
   
   foreach($query->result() as $row) {
           
		 if(is_numeric($row->estudio)){
			 $estudio=$this->db->select('sub_groupo')->where('id_c_taf',$row->estudio)->get('centros_tarifarios_test')->row('sub_groupo'); 
			 $estudio=$estudio;
		 }else{
			$estudio=$row->estudio; 
		 }    
          $output['estudio'] = $estudio;  
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


function delete_study()
{
    $id = $this->input->post('id');
  $this->hospitalization_emgergency->query("DELETE FROM hosp_orden_medica_estudios WHERE id=$id");
}


}