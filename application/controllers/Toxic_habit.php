    <?php
	class Toxic_habit extends CI_Controller {
    public function __construct() {
        parent::__construct();
     
    }
	
	
	
	
	
	public function update_habit_toxic() {
	$data = array(
              'cafe_cant' => $this->input->post('hab_c_caf'),
				'cafe_cant_desc' => $this->input->post('cafe_cant_desc'),
                'cafe_frec' => $this->input->post('hab_f_caf'),
                'pipa_cant' => $this->input->post('hab_c_pip'),
				'pipa_cant_desc' => $this->input->post('desc_pipa'),
                'pipa_frec' => $this->input->post('hab_f_pip'),
                'ciga_can' => $this->input->post('hab_c_ciga'),
                'ciga_frec' => $this->input->post('hab_f_ciga'),
				'ciga_can_desc' => $this->input->post('desc_cig'),
                'alc_can' => $this->input->post('hab_c_al'),
                'alc_frec' => $this->input->post('hab_f_al'),
				'alc_can_desc' => $this->input->post('desc_alco'),
                'tab_can' => $this->input->post('hab_c_tab'),
				'tab_can_desc' => $this->input->post('desc_tab'),
                'tab_frec' => $this->input->post('hab_f_tab'),
                'hab_c_drug' => $this->input->post('hab_c_drug'),
				'hab_t_drug' => $this->input->post('hab_t_drug'),
                'hab_f_drug' => $this->input->post('hab_f_drug'),
				 'hab_c_drug_desc' => $this->input->post('desc_drug'),
                'hookah' => $this->input->post('hookah'),
                'hab_f_hookah' => $this->input->post('hab_f_hookah'),
				'hookah_desc' => $this->input->post('desc_hooka'),
				'updated_by' => $this->input->post('sessionIdUuser'),
                'updated_time' => date("Y-m-d H:i:s")
				);
				
	
		     $where= array(
                    'id' =>$this->input->post('id')
                  );
                  
                $this->db->where($where);
               $this->db->update('h_c_habitos_toxicos',$data);
		  
		         
		   echo '<i class="bi bi-check-lg text-success fs-4"></i>';
	}
	
	
	
	
	
	
	
	
	
	}