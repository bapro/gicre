<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Model{
    function __construct() {
       // $this->userTbl = 'users';
	 }


	  public function areaDocProd($data1,$data2,$centro,$medico)
    {
	 $condition = "h_c_sinopsis.filter_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->db->select('count(historial_id) as Paciente, user_id as idMed');
$this->db->from('h_c_sinopsis');
$this->db->join('users', 'users.id_user= h_c_sinopsis.user_id');
 $this->db->where($condition);
$this->db->where('user_id !=',348);
$this->db->where('signopsis !=','');
$this->db->where('enf_motivo !=','');
$this->db->where('centro_medico',$centro);

$this->db->group_by('area');
$this->db->order_by('Paciente','desc');
$query = $this->db->get();
  return $query->result();
    }
	


	
public function areaDocTurn($data1,$data2,$centro,$medico)
    {
	 $condition = "h_c_sinopsis.filter_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->db->select('gbl_shift,count(gbl_shift) as tot_pat');
$this->db->from('h_c_sinopsis');
 $this->db->join('employees', 'h_c_sinopsis.historial_id= employees.id_p_a');
 $this->db->where($condition);
$this->db->where('user_id !=',348);
$this->db->where('signopsis !=','');
$this->db->where('enf_motivo !=','');
$this->db->where('centro_medico',$centro);
$this->db->group_by('gbl_shift');
$query = $this->db->get();
  return $query->result();
    }	
	
	
	
		  public function nurseReport($data1,$data2,$centro,$medico)
    {
	 $condition = " DATE(nota_med_salud_ocupacional.inserted_time)  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->db->select('count(id_patient) as Paciente, nota_med_salud_ocupacional.inserted_by as idAs, name');
$this->db->from('nota_med_salud_ocupacional');
$this->db->join('users', 'users.id_user= nota_med_salud_ocupacional.inserted_by');
 $this->db->where($condition);
$this->db->where('perfil =','Asistente Medico');
$this->db->where('id_centro',$centro);
$this->db->group_by('nota_med_salud_ocupacional.inserted_by');
$query = $this->db->get();
  return $query->result();
    }
	
	
	
	
	
}