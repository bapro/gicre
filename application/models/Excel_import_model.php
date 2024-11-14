<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('id_tarif', 'DESC');
		$query = $this->db->get('tarifarios_test');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('tarifarios_test', $data);
	}
	
	
	function insertEmployees($data)
	{
		$this->db->insert_batch('employees', $data);
	}	
	
	
	
	
	function insert_centro($data)
	{
		$this->db->insert_batch('centros_tarifarios_test', $data);
	}
	
	
	
	
	function insert_medicamentos($data)
	{
		$this->db->insert_batch('emergency_medicaments', $data);
	}
	
}
