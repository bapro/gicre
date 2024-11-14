<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_document_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('navigation/account_demand_model');
		$this->load->model('model_general');
		$this->load->model('model_admin');
		$this->load->helper('download');
	 $this->ID_USER=$this->session->userdata['user_id'];
		   $this->clinical_history = $this->load->database('clinical_history',TRUE);
	   	    if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
}
		
	}


 function listFolders()  
{
$data['from']=$this->input->post('from');	
$id_patient=$this->input->post('id_patient');
$data['id_patient']=$id_patient;
$table=$this->input->post('table_name');

if($table=='patients_folders'){
$db='db';	
}else{
$db='clinical_history';	
}



$data['folder_name']=$this->input->post('folder_name');
$data['table_name']=$table;
$sql ="SELECT * FROM  $table WHERE id_p_a=$id_patient ORDER BY id DESC";
$query= $this->$db->query($sql);
$data['query']=$query;

$this->load->view('patient/folders/data',$data);
	
}
 



public function downloadDoc($id){
       
        $fileName = $this->db->select('folder')->where('id',$id)->get('patients_folders')->row('folder'); 
        $file = './assets/img/patients-folder/'.$fileName;
        force_download($file, NULL);
	}

public function downloadDocEmp($id){
      
        $fileName = $this->db->select('folder')->where('id',$id)->get('employee_folders')->row('folder'); 
        $file = './assets/img/employee-folder/'.$fileName;
        force_download($file, NULL);
	}

public function downloadDocDescQ($id){
     
        $fileName = $this->clinical_history->select('folder')->where('id',$id)->get('hc_quirurgica_patient_images')->row('folder'); 
        $file = './assets_new/img/description-surgery/'.$fileName;
        force_download($file, NULL);
	}


public function downloadGeneralRep($id){
        
        $fileName = $this->clinical_history->select('folder')->where('id',$id)->get('hc_general_report_documents')->row('folder'); 
        $file = './assets_new/img/general-report/'.$fileName;
        force_download($file, NULL);
	}

function uploadDocumento()  
{ 
$countfiles = count($_FILES['files']['name']);
  
      for($i=0;$i<$countfiles;$i++){
  
        if(!empty($_FILES['files']['name'][$i])){
  
        // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
          // Set preference
          $config['upload_path'] = "./".$this->input->post('folder_name');
        $config['allowed_types'] = '*';
          $config['max_size'] = '4000'; // max_size in kb
          $config['file_name'] = $_FILES['files']['name'][$i];
  
          //Load upload library
          $this->load->library('upload',$config); 
		  
		  
		  
		  
         // $arr = array('msg' => 'something went wrong', 'success' => false);
          // File upload
		  
          if($this->upload->do_upload('file')){
           
         $data = $this->upload->data(); 
           $imageExtention = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
			$type=$_FILES[ 'file' ][ 'type' ];     
			$extensions=array( 'image/jpeg', 'image/png', 'image/gif' );
			if( in_array( $type, $extensions )){
			$imageType='img';
			}else{
			$imageType='doc';	
			}
			$save = array(
			'folder'  =>$data['file_name'],
			//'complete_folder_name' =>  $_FILES['file']['name'],
			'id_p_a' => $this->input->post('id_p_a'),
			'inserted_date' =>date("Y-m-d H:i:s"),
			'inserted_by' => $this->ID_USER,
			'file_type' => $imageType,
			'file_ext' => $imageExtention,
			'file_size' =>$_FILES['file']['size']

			);
if($this->input->post('table_name')=='patients_folders'){
$db='db';	
}else{
$db='clinical_history';	
}
$this->$db->insert($this->input->post('table_name'),$save);
$get = $this->$db->insert_id();		   
   $arr = array('msg' => 'Subido correctamente.', 'success' => true);
 
          }else{
			//if(!$this->upload->do_upload('image_file'))  
//{  
$error =  $this->upload->display_errors(); 

 $arr = array('msg' => $error , 'success' => false);
//}  
		  }
        }
  
      }
      echo json_encode($arr);


}


  function show_report_general_file($id)
{


$imag=$this->clinical_history->select('folder, file_type')->where('id',$id)->get('hc_general_report_documents')->row_array();
$image = $imag['folder'];
$show_image= "./assets_new/img/general-report/$image";

$img= '<img oncontextmenu="return false" style="width:40%" src="'.base_url().$show_image.'"  />';

echo "<div  style='text-align:center'><h3>$image </h3>$img</div>";
}

 function show_patient_image($id)
{
$folder_name="assets/img/patients-folder";	
$folder_location="./assets/update/";	
$imag=$this->db->select('folder, file_type')->where('id',$id)->get('patients_folders')->row_array();
$image = $imag['folder'];
$show_image= "./$folder_name/$image";

$show_image2= $folder_location.$image;
if($imag['file_type']){
$img= '<div style="text-align:center"><img oncontextmenu="return false" style="width:40%;" src="'.base_url().$show_image.'"  /></div>';
}else{

	$img= '<img oncontextmenu="return false" style="width:40%" src="'.base_url().$show_image2.'"  />';
}
echo "<div  style='text-align:center'><h3>$image </h3>$img</div>";
}




 function show_patient_image_ds($id)
{


$imag=$this->clinical_history->select('folder, file_type')->where('id',$id)->get('hc_quirurgica_patient_images')->row_array();
$image = $imag['folder'];
$show_image= "./assets_new/img/description-surgery/$image";

$img= '<img oncontextmenu="return false" style="width:40%" src="'.base_url().$show_image.'"  />';

echo "<div  style='text-align:center'><h3>$image </h3>$img</div>";
}





 function show_patient_image_dq($id)
{


$imag=$this->clinical_history->select('folder, file_type')->where('id',$id)->get('hc_quirurgica_patient_images')->row_array();
$image = $imag['folder'];
$show_image= "./assets_new/img/description-surgery/$image";

$img= '<img oncontextmenu="return false" style="width:40%" src="'.base_url().$show_image.'"  />';

echo "<div  style='text-align:center'><h3>$image </h3>$img</div>";
}








 function delPatDoc()
 {

if($this->input->post('table_name')=='patients_folders'){
$db='db';
$folder_location="./assets/update/";	
}else{
$db='clinical_history';
$folder_location="./assets_new/img/general-report/";	
}


	 
$folder=$this->$db->select('folder, file_type')->where('id',$this->input->post('id'))->get($this->input->post('table_name'))->row_array();	
if($folder['file_type']){
unlink( "./".$this->input->post('folder_name').$folder['folder']);	 
}else{
unlink( $folder_location.$folder['folder']);
}	
$where = array(
'id' =>$this->input->post('id')
);

$this->$db->where($where);
$this->$db->delete($this->input->post('table_name'));

$query_files=$this->$db->select('id_p_a')->where('id_p_a',$this->input->post('id_patient'))->get($this->input->post('table_name'));
echo "(".$query_files->num_rows().")";

 }


 
 
}