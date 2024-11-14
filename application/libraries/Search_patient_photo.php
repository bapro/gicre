<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_patient_photo {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
					$this->CI->load->model('model_admin');
				
					   
        }



       
		
		
		  public function search_patient($data)
        {
		$id_patient=$data['id_p_a'];
		$cedula=$data['cedula'];
		$image_class=$data['image_class'];
		$style=$data['style'];
		$this->CI->padron_database = $this->CI->load->database('padron',TRUE);
		
		$databaseGicre=$this->CI->db->select('cedula, photo')->where('id_p_a',$id_patient)->get('patients_appointments')->row_array();
		
		if($databaseGicre){
		if($databaseGicre['photo'] !='padron' && $databaseGicre['photo'] !=""){
	 $photo= '<img  class=" ' .$image_class. ' " " ' .$style. ' " src="'.base_url().'/assets/img/patients-pictures/'.$databaseGicre['photo'].'"  />';
             }elseif($databaseGicre['photo']=='padron'){
				 $photoPadron=$this->CI->padron_database->select('Imagen')->where('Cedula',$cedula)->get('padron_photos')->row('Imagen');
				  if($photoPadron){
					 $photo= '<img class=" ' .$image_class. ' " " ' .$style. ' "  src="data:image/gif;base64,'. base64_encode(pack("H*", $photoPadron)) .'" />';
				 }else{
					$photo= '<img  class=" ' .$image_class. ' " " ' .$style. ' " src="'.base_url().'/assets_new/img/user-d.jpg"  />'; 
				 }
			 }else{
				 $photo= '<img  class=" ' .$image_class. ' " " ' .$style. ' " src="'.base_url().'/assets_new/img/user-d.jpg"  />';	 
			 }
		}
			 return $photo;
		
        }
		
		

}


	


				
