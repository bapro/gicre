<?php
class H_c_orden_medica_estudy extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_USER =$this->session->userdata('user_id');
	$this->load->model("model_clinical_hist");
    $this->load->library("user_register_info");
		$this->clinical_history = $this->load->database('clinical_history',TRUE);
 
}



public function save_orden_medica_sutdy() {


    if( $this->input->post('ordenMedicaEstEst') == "" || $this->input->post('ordenMedicaEstBodyPart') == ""){
        $response['message'] = "Campo con <span style='color:red'>*</span> son obligatorios.";
        $response['status']  = 1;
        
        }else {
         
            if($this->input->post('id')==0){
              $data = array( 
                'estudio' => $this->input->post('ordenMedicaEstEst'),
                'cuerpo' => $this->input->post('ordenMedicaEstBodyPart'),
                'lateralidad'=> $this->input->post('ordenMedicaEstLat'),
                'observacion'=> $this->input->post('ordenMedicaEstNota'),
                'id_sala'=> $this->input->post('ordenMedInsertedId'),
                'historial_id' => $this->input->post('id_patient'),
                'operator' => $this->ID_USER,
                'updated_by' => $this->ID_USER,
                'centro' => $this->input->post('id_centro'),
                 'insert_date' => date("Y-m-d H:i:s"),
                 'updated_time' => date("Y-m-d H:i:s"),
               
             );
            
           $this->clinical_history->insert('orden_medica_estudios',$data);
          
            }else{
                $data = array( 
                'estudio' => $this->input->post('ordenMedicaEstEst'),
                'cuerpo' => $this->input->post('ordenMedicaEstBodyPart'),
                'lateralidad'=> $this->input->post('ordenMedicaEstLat'),
                'observacion'=> $this->input->post('ordenMedicaEstNota'),
                    'updated_by' => $this->ID_USER,
                    'updated_time' => date("Y-m-d H:i:s"),
                    
                 );
                $where= array(
                    'id_i_e ' =>$this->input->post('id')
                  );
                  
                $this->clinical_history->where($where);
               $this->clinical_history->update('orden_medica_estudios',$data);
             
            }
			
            $response['message'] =  "";
            $response['status']  = 0;
            
        }
         echo json_encode($response);
}


public function studies() {
   $id_sala= $this->input->post('ordenMedInsertedId');
    $data['user_id']= $this->ID_USER;
    $data['perfil']= "Admin";
    $sql="SELECT * FROM  orden_medica_estudios WHERE id_sala=$id_sala ORDER BY id_sala  DESC";
     $query= $this->clinical_history->query($sql);
     $data['ordenMedReRows']=$query;
	 $data['num_rows']= ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query->num_rows().' registro(s)</span> '; 
    $this->load->view('clinical-history/medical-order/study/table', $data);
    
}




function fetch_single_study()  
{  
     $output = array();  
     $id=$this->input->post('id');
     $query=$this->clinical_history->query("SELECT * FROM orden_medica_estudios WHERE id_i_e=$id");
   
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


function deleteStudy()
{
    $id = $this->input->post('id');
  $this->clinical_history->query("DELETE FROM orden_medica_estudios WHERE id_i_e=$id");
}


}