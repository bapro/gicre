    <?php
	class Hist_abuse_mistreat extends CI_Controller {
    public function __construct() {
        parent::__construct();
     
    }
	
	
	
	
	
	public function updateAbuseMistreat() {
	$data = array(
                 'maltratof' => $this->input->post('textmaltrato_g'),
                'abusos' => $this->input->post('textabuso_g'),
                'negligencia' => $this->input->post('textneg_g'),
				'maltrato' => $this->input->post('maltratoemo_g'),
                'updated_time' => date("Y-m-d H:i:s"),
                'updated_by' => $this->input->post('id_user')
               );
				
				$this->db->where('id', $this->input->post('id'));
		   $this->db->update('h_c_abuse_suspition',$data);
		  
		        
		     echo '<i class="bi bi-check-lg text-success fs-4"></i>';
	}
	
	
	
	
	
	
	
	
	
	}