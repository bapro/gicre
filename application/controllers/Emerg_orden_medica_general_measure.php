<?php
class Emerg_orden_medica_general_measure extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_PATIENT =$this->session->userdata('id_patient');
    $this->ID_USER =$this->session->userdata('user_id');
	 $this->ID_CENTRO =$this->session->userdata('id_centro');
    $this->load->library("user_register_info");
 $this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
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
				'id_register'=>$this->input->post('id_register'),
                'id_patient' => $this->ID_PATIENT,
                'inserted_by' => $this->ID_USER,
				'id_user' => $this->ID_USER,
                'updated_by' => $this->ID_USER,
                'centro' => $this->ID_CENTRO,
				'printing' => 1,
                 'inserted_time' => date("Y-m-d H:i:s"),
                 'updated_time' => date("Y-m-d H:i:s"),
               
             );
            
           $this->hospitalization_emgergency->insert('emerg_ord_med_gen',$data);
          //$error = $this->hospitalization_emgergency->error();
            }else{
                $data = array( 
                'medidas_gen' => $this->input->post('ordenMedicaMedGen'),
                'descripcion_mg' => $this->input->post('ordenMedicaMedGenDesc'),
                'intervalo_de_real'=> $this->input->post('ordenMedicaMedGenLat'),
                    'updated_by' => $this->ID_USER,
                    'updated_time' => date("Y-m-d H:i:s"),
                    
                 );
                $where= array(
                    'id ' =>$this->input->post('id')
                  );
                  
                $this->hospitalization_emgergency->where($where);
               $this->hospitalization_emgergency->update('emerg_ord_med_gen',$data);
             
            }
            $response['message'] =  "";
            $response['status']  = 0;
            
        }
         echo json_encode($response);
}


public function medidas_generales() {
   $id_register= $this->input->post('id_register');
    $data['user_id']= $this->ID_USER;
    $data['perfil']= "Admin";
    $sql="SELECT * FROM  emerg_ord_med_gen WHERE id_register=$id_register  AND id_patient=$this->ID_PATIENT AND canceled=0 ORDER BY id  DESC";
     $query= $this->hospitalization_emgergency->query($sql);
     $data['ordenMedReRows']=$query;
	 $data['num_rows']= ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query->num_rows().' registro(s)</span> '; 
    $this->load->view('emergency/clinical-history/medical-order/medida-general/table', $data);
    
}




function fetch_single_mg()  
{  
     $output = array();  
     $id=$this->input->post('id');
     $query=$this->hospitalization_emgergency->query("SELECT * FROM emerg_ord_med_gen WHERE id=$id");
   
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


function delete_mg()
{
    $id = $this->input->post('id');
  $this->hospitalization_emgergency->query("DELETE FROM emerg_ord_med_gen WHERE id=$id");
}


}