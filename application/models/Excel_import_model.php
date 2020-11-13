<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('id_tarif', 'DESC');
		$query = $this->db->get('tarifarios');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('tarifarios', $data);
	}
	
	
	function insert_centro($data)
	{
		$this->db->insert_batch('centros_tarifarios', $data);
	}
	
	
		function select_centros()
	{
		$this->db->order_by('id_c_taf', 'DESC');
		$query = $this->db->get('centros_tarifarios');
		return $query;
	}
	
	function insert_medicamentos($data)
	{
		$this->db->insert_batch('emergency_medicaments', $data);
	}
	
}
