    <?php
	class Intra_vio_ant_otro extends CI_Controller {
    public function __construct() {
        parent::__construct();
     
    }
	
	
	
	
	
	public function updateViolenciaIntraOtroAnt() {
	$data = array(
                 'quirurgicos' => $this->input->post('quirurgicos'),
                'gineco' => $this->input->post('gineco'),
                'abdominal' => $this->input->post('abdominal'),
                'toracica' => $this->input->post('toracica'),
                'transfusion' => $this->input->post('transfusion'),
                'otros1' => $this->input->post('otros1_g'),
                'hepatis' => $this->input->post('hepatis'),
                'hpv' => $this->input->post('hpv'),
                'toxoide' => $this->input->post('toxoide'),
                'grouposang' => $this->input->post('grouposang'),
                'tipificacion' => $this->input->post('tipificacion'),
                'rh' => $this->input->post('rhoa'),
                'violencia1' => $this->input->post('violencia1'),
                'violencia2' => $this->input->post('violencia2'),
                'violencia3' => $this->input->post('violencia3'),
                'violencia4' => $this->input->post('violencia4'),
				'update_by' => $this->input->post('id_user'),
                'update_time' => date("Y-m-d H:i:s")
				);
				
				$this->db->where('id', $this->input->post('id'));
		  $result= $this->db->update('h_c_ante_otros',$data);
		  if($result){
		   echo '<i class="bi bi-check-lg text-success fs-4"></i>';
		  }
	}
	
	
	
	
	
	
	
	
	
	}