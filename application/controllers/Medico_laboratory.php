<?php
	class Medico_laboratory extends CI_Controller
	{
		  public function __construct() {
        parent::__construct();
  $this->ID_USER =$this->session->userdata('user_id');
	   $this->clinical_history = $this->load->database('clinical_history',TRUE);
    }
	

		
	 public function listarGroupLab()
{
	$id_doc=$this->session->userdata['user_id'];		
	
	$data['id_user'] =$id_doc;
 $sql ="SELECT * FROM h_c_groupo_lab  WHERE rmvd=0 && id_doc=$id_doc GROUP BY groupo ORDER BY groupo ASC";
$data['query']= $this->clinical_history->query($sql);

 $this->load->view('medico/laboratory/lab-groupo',$data);
}	
		


public function deleteLabGrouped()
{

$where = array(
'id' =>$this->input->post('id')
);
$this->clinical_history->where($where);
$this->clinical_history->delete("h_c_groupo_lab");

}






	function autoCompleteInput()
{
$keyword=$this->input->post('keyword');
if(!empty($keyword)) {
$table= $this->input->post('table');
$data['field_name_in_table']= "name";
$data['input_name']=  $this->input->post('input');
$data['div_result']= $this->input->post('div');
$sql ="SELECT name FROM laboratories  WHERE removed=0 AND name LIKE '" . $keyword . "%' GROUP BY name LIMIT 0,10 ";
$data['query']=$this->clinical_history->query($sql); 
$this->load->view('clinical-history/auto-complete-field-results', $data);


    }


}


public function deleteLab()
{
$data = array(
'removed'=>1
);
$where = array(
'id' =>$this->input->post('id')
);
$this->clinical_history->where($where);
$this->clinical_history->update("laboratories",$data);

}

	

 public function listarLab()
{
//&& id_user=$id_user 
$id_user =$this->session->userdata['user_id'];

$data['id_user'] =$id_user;
$sql ="SELECT *  FROM laboratories WHERE removed=0 GROUP BY name ORDER BY id DESC LIMIT 10 ";
$query = $this->clinical_history->query($sql);
$data['query'] = $query;
$data['totatlabo'] = $query->num_rows();
$this->load->view('medico/laboratory/lab-datas',$data);
}	


public function nuevoLab()
{
$save = array(
'name'  =>$this->input->post('nuevolab'),
'id_user'  =>$this->ID_USER
);
$this->clinical_history->insert("laboratories",$save);

$id_last=$this->clinical_history->insert_id();


  $saveS= array(
	'groupo' =>$this->input->post('groupo'),
	'lab_id' => $id_last,
	'lab_name'  =>$this->input->post('nuevolab'),
	'id_doc'  =>$this->ID_USER
	

	);

$this->clinical_history->insert("h_c_groupo_lab",$saveS);

 $this->clinical_history->query("DELETE FROM h_c_groupo_lab WHERE groupo=''");
 $this->clinical_history->query("DELETE FROM laboratories WHERE name=''");
	
}



 public function groupDetailedLab()
{
$groupo=$this->input->post('groupo');

$id_user =$this->ID_USER;
$data['id_user'] =$id_user;
$sql ="SELECT * FROM h_c_groupo_lab  WHERE groupo='$groupo' && rmvd=0 && id_doc =$this->ID_USER ORDER BY groupo ASC ";
$data['groupo'] ="$groupo";
$query = $this->clinical_history->query($sql);
$data['query']=$query;
$data['total_g_d'] = $query->num_rows();
$data['show_select']="style='display:none'";
$this->load->view('medico/laboratory/groupo-lab-datas',$data);
}



public function edit_lab()
{

$data = array(
'name'=> $this->input->post('edit-lab')
);

$where = array(
'id' =>$this->input->post('id')
);
$this->clinical_history->where($where);
$this->clinical_history->update("laboratories",$data);

}


public function edit_lab_groupo()
{

$data = array(
'lab_name'=> $this->input->post('edit-lab')
);

$where = array(
'id' =>$this->input->post('id')
);
$this->clinical_history->where($where);
$this->clinical_history->update("h_c_groupo_lab",$data);

}


		}