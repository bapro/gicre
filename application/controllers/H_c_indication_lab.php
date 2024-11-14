<?php
class H_c_indication_lab extends CI_Controller {
public function __construct() {
    parent::__construct();
    $this->ID_USER =$this->session->userdata('user_id');
  $this->USER_PERFIL=$this->session->userdata('user_perfil');
  	$this->load->model("model_clinical_hist");
	 $this->clinical_history = $this->load->database('clinical_history',TRUE);
}

function patient_laboratories(){
		
		 $id_patient=$this->input->post("id_patient");
		
		 $query=$this->clinical_history->query("SELECT insert_time, historial_id, centro, operator FROM h_c_indications_labs WHERE historial_id=$id_patient GROUP BY DATE(insert_time) ORDER BY insert_time DESC");
	$data['query_grouped']=$query->result();
	$data['query_grouped_num']=$query->num_rows();
	
	$update2 = array(
	
	'printing' => 0,
	);

	$this->clinical_history->where('operator', $this->ID_USER);
	$this->clinical_history->update('h_c_indications_labs',$update2);
	 $this->load->view('clinical-history/indications/laboratory/register-by-date', $data);
		 
		 
		 
	}
   /* function patient_laboratories()
    {  
$id_sala = $this->input->post('id_sala'); 
$id_patient= $this->input->post('id_patient');
$data['id_patient']=$id_patient;
 $id_centro=$this->input->post("id_centro");
 $this->session->set_userdata('id_centro', $id_centro);
 $data['id_centro']=$this->session->userdata('id_centro');
$this->session->set_userdata('id_patient', $id_patient);

$data['user_id']=$this->ID_USER;
if($this->input->post('display_div') =="patient-labs-content"){
$this->load->view('clinical-history/indications/laboratory/patient-laboratories', $data);
}else{
$sql ="SELECT * FROM orden_medcia_lab WHERE id_sala=$id_sala ORDER BY id_lab DESC";
$query=$this->clinical_history->query($sql);
$data['query']=$query;
$data['num_rows']= ' <span class="badge bg-warning text-black badge-number number_alergy" > '.$query->num_rows().' registro(s)</span> '; 
$this->load->view('clinical-history/medical-order/lab/table', $data);
}	
    }*/

	


public function showIndicationsByDateList(){
		
		$date = $this->input->post('date');
		$id_pat = $this->input->post('id_pat');
		$query=$this->clinical_history->query("SELECT * FROM  h_c_indications_labs WHERE historial_id=$id_pat
		AND DATE(insert_time)='$date' ORDER BY id_lab DESC");
		
	$data= [];
		foreach($query->result() as $r) {
            $lab=$this->clinical_history->select('name')->where('id',$r->laboratory)
            ->get('laboratories')->row('name');
			$op=$this->db->select('name')->where('id_user',$r->operator)->get('users')->row('name');
			$fecha = date("d-m-Y", strtotime($r->insert_time));


			if($r->operator==$this->ID_USER  AND $fecha == date("d-m-Y")) {
				$button_delete ='<button type="button" name="update" id="'.$r->id_lab.'" class="btn btn-danger btn-sm delete-this-lab"><i class="bi bi-x-square"></i></button>';
			}else{
				$button_delete='<i style="color:red" class="fa fa-ban"></i>';
				
			}

      if($r->printing==1){
			$checked = "checked";
			}else{
			$checked=""; 
			}
			
			
			if($r->operator==$this->ID_USER){
				   $checkbox = "<input type='checkbox'  class='check-labo-print' $checked value='$r->id_lab' />";
			}else{
				$checkbox='';

			}
			
			
              
			 echo "<tr>
       <td>$lab</td>
	   <td>$checkbox</td>
	   <td></td>
	    <td>$button_delete</td>
	
       </tr>";
			 
			 
			 
			 

	}
  
		

	 }







function repeatIndicationLabs(){

$id_patient=$this->input->post("id_patient");
$date=$this->input->post("date");
$query=$this->clinical_history->query("SELECT * FROM h_c_indications_labs WHERE historial_id=$id_patient AND operator=$this->ID_USER AND DATE(insert_time)='$date' ");
	foreach($query->result() as $labData) {

 $save = array(
            'laboratory' => $labData->laboratory,
            'operator' =>$this->ID_USER,
            'historial_id' =>$this->input->post('id_patient'), 
            'centro' =>$labData->centro,
            'insert_time' => date("Y-m-d H:i:s") ,
            'updated_by' =>$this->ID_USER ,
            'updated_time' => date("Y-m-d H:i:s") ,
            'printing' => 1,
			 'singular_id' => 1,
            'user_id' =>$this->ID_USER,
            'emergency' => 0
        );




$this->clinical_history->insert("h_c_indications_labs",$save);
	}
}





function labGroupResult()
{
$groupo= $this->input->post('groupo');
$data['id_patient']=$this->getIdPatient();
$data['id_centro']=$this->getIdCentro();

$sql ="SELECT id, lab_id, lab_name  FROM h_c_groupo_lab  WHERE groupo='$groupo' && rmvd=0  ORDER BY groupo ASC";
$data['query']=$this->clinical_history->query($sql); 
$this->load->view('clinical-history/indications/laboratory/lab-group-result', $data);
}


function getIdPatient(){
		 $id_patient =$this->session->userdata('id_patient');
		 return $id_patient;
	 }

function getIdCentro(){
		 $id_centro =$this->session->userdata('id_centro');
		 return $id_centro;
	 }



function save_indication_lab()
    {
        $labCheckded = $this->input->post('lab');
		
		if($labCheckded==0){
		$newLab= array(
		'name' =>$this->input->post('keyword')
		);
		$this->clinical_history->insert("laboratories",$newLab);
		$labCheckded = $this->clinical_history->insert_id(); 
		 }else{
			$labCheckded =$labCheckded ; 
		 }
		
		$table = $this->input->post('table');
		$this->session->set_userdata('is_shown_print_lag', 1);
       if($table=='h_c_indications_labs'){
		
        $save = array(
            'laboratory' => $labCheckded,
            'operator' =>$this->ID_USER,
            'historial_id' =>$this->input->post('id_patient'), 
            'centro' =>$this->input->post('id_centro'),
            'insert_time' => date("Y-m-d H:i:s") ,
            'updated_by' =>$this->ID_USER ,
            'updated_time' => date("Y-m-d H:i:s") ,
            'printing' => 1,
			 'singular_id' => 1,
            'user_id' =>$this->ID_USER,
            'emergency' => 0
        );
        $this->clinical_history->insert($table,$save);
	}else{
		
		 $save = array(
            'laboratory' => $labCheckded,
            'operator' =>$this->ID_USER,
          'historial_id' =>$this->input->post('id_patient'), 
            'centro' =>$this->input->post('id_centro'),
            'insert_time' => date("Y-m-d H:i:s") ,
            'updated_by' =>$this->ID_USER ,
            'updated_time' => date("Y-m-d H:i:s") ,
            'printing' => 1,
            'user_id' =>$this->ID_USER,
			'id_sala' =>$this->input->post('id_sala'),
            //'emergency' => 0
        );
        $this->clinical_history->insert($table,$save);
	}
	
    }



    function save_indication_lab_by_group()
    {
        $labCheckded = $this->input->post('lab');
		$this->session->set_userdata('is_shown_print_lag', 1);
       
        foreach ($labCheckded as $key => $id)
        {
            $save = array(
                'laboratory' => $id,
                'operator' => $this->ID_USER,
                'historial_id' =>$this->getIdPatient(),
                'centro' =>$this->input->post('id_centro'),
                'insert_time' => date("Y-m-d H:i:s") ,
                'updated_by' =>$this->ID_USER,
                'updated_time' => date("Y-m-d H:i:s") ,
                'printing' => 1,
				'singular_id' =>1,
                'user_id' => $this->ID_USER,
                'emergency' =>0
            );
            $this->clinical_history->insert('h_c_indications_labs',$save);
			
        }
		echo $this->getIdPatient();
    }


    function remove_this_selected_lab()
    {
		$table = $this->input->post('table');
        $labCheckded = $this->input->post('lab');
       // this is for remove every previous checked lab for this patient by this user
        $where = array(
            'laboratory' => $labCheckded,
          'historial_id' =>$this->getIdPatient(),
          'operator' =>$this->ID_USER
        );
       
        $this->clinical_history->where($where);
        $this->clinical_history->delete($table, $where);
   
    }




    public function lab_list(){
		$draw=intval($this->input->get("draw"));
		$start=intval($this->input->get("start"));
		$length=intval($this->input->get("length"));
		//$id_patient= $this->input->get('id_patient');
		$id_patient=$this->session->userdata('session_id_pat_lab');
		$this->session->set_userdata('is_shown_print_lag', 0);
		$query=$this->clinical_history->query("SELECT * FROM h_c_indications_labs WHERE historial_id=$id_patient");
		$data= [];
		foreach($query->result() as $r) {
            $lab=$this->clinical_history->select('name')->where('id',$r->laboratory)
            ->get('laboratories')->row('name');
			$op=$this->db->select('name')->where('id_user',$r->operator)->get('users')->row('name');
			$fecha = date("d-m-Y H:i:s", strtotime($r->insert_time));


			if($r->operator==$this->ID_USER || $this->USER_PERFIL=="Admin") {
				$button_delete ='<button type="button" name="update" id="'.$r->id_lab.'" class="btn btn-danger btn-sm delete-this-lab"><i class="bi bi-x-square"></i></button>';
			}else{
				$button_delete='<i style="color:red" class="fa fa-ban"></i>';
				
			}


             if($r->singular_id==1){
				$checked = "checked";
			 }else{
				$checked=""; 
			 }

			 $sub_array = array(); 
             $sub_array[] = $r->id_lab;			 
			 $sub_array[] = $fecha;  
			 $sub_array[] = $lab;  
			 $sub_array[] = $op;  
			 $sub_array[] = '<input type="checkbox" title="'.$r->singular_id.'" '.$checked.' class="check-this-lab-to-print"  value="'.$r->id_lab.'" />';   
			 $sub_array[] = $button_delete;
			 $data[] = $sub_array; 

	}
  
		$result=array(
				 "draw"=>$draw,
				   "recordsTotal"=>$query->num_rows(),
				   "recordsFiltered"=>$query->num_rows(),
				   "data"=>$data
			  );
		echo json_encode($result);
		exit();

	 }


     function check_lab()
     {
         $where = array(
             'id_lab' => $this->input->post('labid'),
          );
         $update = array(
            'printing' => 0,
            
             'singular_id' => $this->input->post('print')
         );
         $this->clinical_history->where($where);
         $this->clinical_history->update("h_c_indications_labs", $update);
         
     }


     function delete_lab_by_id(){
        $where = array(
             'id_lab' => $this->input->post('id')
         );
         $this->clinical_history->where($where);
         $this->clinical_history->delete($this->input->post('table'), $where);

     }
	 
	 
	
	 
	 


}









