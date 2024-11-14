<?php
class H_c_orden_medica_medidas_generales extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_USER =$this->session->userdata('user_id');
	$this->clinical_history = $this->load->database('clinical_history', TRUE);
    $this->load->library("user_register_info");
 
}



public function save_orden_medica_mg() {


    if( $this->input->post('ordenMedicaMedGen') == "" ){
        $response['message'] = "Campo con <span style='color:red'>*</span> son obligatorios.";
        $response['status']  = 1;
        
        }else {
         
            if($this->input->post('id')==0){
              $data = array( 
                'medidas_gen' => $this->input->post('ordenMedicaMedGen'),
                'descripcion_mg' => $this->input->post('ordenMedicaMedGenDesc'),
                'intervalo_de_real'=> $this->input->post('ordenMedicaMedGenLat'),
                'id_sala'=> $this->input->post('ordenMedInsertedId'),
                'id_patient' => $this->input->post('id_patient'),
                'inserted_by' => $this->ID_USER,
				'id_user' => $this->ID_USER,
                'updated_by' => $this->ID_USER,
                'centro' => $this->input->post('id_centro'),
				'printing' => 1,
                 'inserted_time' => date("Y-m-d H:i:s"),
                 'updated_time' => date("Y-m-d H:i:s"),
               
             );
            
           $this->clinical_history->insert('ord_med_med_gen',$data);
          
            }else{
                $data = array( 
                'medidas_gen' => $this->input->post('ordenMedicaMedGen'),
                'descripcion_mg' => $this->input->post('ordenMedicaMedGenDesc'),
                'intervalo_de_real'=> $this->input->post('ordenMedicaMedGenLat'),
                    'updated_by' => $this->ID_USER,
                    'updated_time' => date("Y-m-d H:i:s"),
                    
                 );
                $where= array(
                    'idem ' =>$this->input->post('id')
                  );
                  
                $this->clinical_history->where($where);
               $this->clinical_history->update('ord_med_med_gen',$data);
             
            }
            $response['message'] =  "";
            $response['status']  = 0;
            
        }
         echo json_encode($response);
}


public function medidas_generales() {
   $id_sala= $this->input->post('ordenMedInsertedId');
    $data['user_id']= $this->ID_USER;
    $data['perfil']= "Admin";
    $sql="SELECT * FROM  ord_med_med_gen WHERE id_sala=$id_sala ORDER BY idem  DESC";
     $query= $this->clinical_history->query($sql);
     $data['ordenMedReRows']=$query;
	 $data['num_rows']= ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query->num_rows().' registro(s)</span> '; 
    $this->load->view('clinical-history/medical-order/medida-general/table', $data);
    
}




function fetch_single_mg()  
{  
     $output = array();  
     $id=$this->input->post('id');
     $query=$this->clinical_history->query("SELECT * FROM ord_med_med_gen WHERE idem=$id");
   
   foreach($query->result() as $row) {
              
          $output['medidas_gen'] = $row->medidas_gen;  
          $output['intervalo_de_real'] = $row->intervalo_de_real;  
          $output['descripcion_mg'] = $row->descripcion_mg;  
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


function deleteMedidaGen()
{
    $id = $this->input->post('id');
  $this->clinical_history->query("DELETE FROM ord_med_med_gen WHERE idem=$id");
}


}