<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Report_model extends CI_Model{
    function __construct() {
       // $this->userTbl = 'users';
	 }



  public function doctor_report($from,$to,$centro,$group_by)
    {
		$condition = "h_c_sinopsis.inserted_time  BETWEEN " . "'" . $from . "'" . " AND " . "'" . $to . "'";
	 
$this->db->select('count(historial_id) as tot_patients, user_id as idMed');
$this->db->from('h_c_sinopsis');
$this->db->join('users', 'users.id_user= h_c_sinopsis.user_id');
 $this->db->where($condition);
$this->db->where('h_c_sinopsis.inserted_by  !=',348);
$this->db->where('signopsis !=','');
$this->db->where('enf_motivo !=','');
$this->db->where('centro_medico',$centro);

$this->db->group_by($group_by);
//$this->db->order_by('name','ASC');
$query = $this->db->get();
  return $query->result();
    }

	
public function doctor_report_turno($data1,$data2,$centro,$group_by)
    {
	 $condition = "h_c_sinopsis.filter_date  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->db->select('count(historial_id) as tot_patients, gbl_shift, user_id as idMed');
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
	
	
	
		  public function nurseReportNombre($data1,$data2,$centro)
    {
	 $condition = " nota_med_salud_ocupacional.inserted_time  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->db->select('count(id_patient) as tot_patients, name AS idMed');
$this->db->from('nota_med_salud_ocupacional');
$this->db->join('users', 'users.id_user= nota_med_salud_ocupacional.inserted_by');
 $this->db->where($condition);
$this->db->where('perfil =','Asistente Medico');
$this->db->where('id_centro',$centro);
$this->db->group_by('nota_med_salud_ocupacional.inserted_by');
$query = $this->db->get();
  return $query->result();
    }
	
	
	 public function nurseReportMed($data1,$data2,$centro)
    {
	 $condition = "medicamento_salud_ocupacional.inserted_time  BETWEEN " . "'" . $data1 . "'" . " AND " . "'" . $data2 . "'";
$this->db->select('count(id_med) as tot_patients, name AS idMed');
$this->db->from('medicamento_salud_ocupacional');
$this->db->join('users', 'users.id_user= medicamento_salud_ocupacional.id_user');
 $this->db->where($condition);
$this->db->where('perfil =','Asistente Medico');
$this->db->where('id_centro',$centro);
$this->db->group_by('medicamento_salud_ocupacional.id_user');
$query = $this->db->get();
  return $query->result();
    }
	
	
}