    <?php
    class Cipaginationmodel extends CI_Model {
        function __construct()
        {
          parent::__construct();
        }
		//----rehabilitacion-------------------------------------
      function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from('rehabilitacion');
        $this->db->order_by('inserted_time','desc');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
	
	//----oftalmologia-------------------------------------
	
	
	  function getRowsOftal($params = array())
    {
        $this->db->select('*');
        $this->db->from('oftalmologia');
        $this->db->order_by('inserted_time','desc');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
	
	
	
	
	
	
	     function getRowsSSR($params = array())
    {
        $this->db->select('*');
        $this->db->from('h_c_ant_ssr');
        $this->db->order_by('idssr','desc');
        
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get();
        
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }
	
	
	
	
	public function getRecetaForFarmacia($limit,$start,$id_farma)  {
$this->db->select('id_i_m, historial_id,branch,despachada');
$this->db->from('h_c_indicaciones_medicales');
$this->db->where('farma',$id_farma);
//$this->db->group_by('encrypt_recetas');
$this->db->order_by('id_i_m','desc');
$this->db->limit($limit, $start);
$query = $this->db->get();
 return $query->result();

}

	
	
	
	
	
	}
	
    ?>