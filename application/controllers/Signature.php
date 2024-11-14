<?php defined('BASEPATH') or exit('No direct script access allowed');
class Signature extends CI_Controller
{
    public function __construct()
    {
		 parent::__construct();
       	$this->load->library("search_patient_photo");
    }
	



 public function create_patient_signature($pat_id,$idfacc, $page=1)
    {
$data['id_fac'] = $idfacc;
$paciente=$this->db->select('id_p_a,cedula,nombre')->where('id_p_a',$pat_id)
->get('patients_appointments')->row_array();
$data['pat_id']=$pat_id;
$data['patiente'] = $paciente['nombre'];
$array_values_for_photo = array(
'id_p_a' =>$paciente['id_p_a'],
'cedula' =>$paciente['cedula'],
'image_class' => "img-fluid",
'style'=>"style='width:120px'"

);
$data['imgpat'] =  $this->search_patient_photo->search_patient($array_values_for_photo);;
$this->load->view('signature/signature-patient', $data);
    }




 public function sign_without_pencil($paciente,$idfacc)
    {
$data['id_fac'] = $idfacc;
$paciente=$this->db->select('id_p_a,cedula,nombre')->where('id_p_a',$paciente)
->get('patients_appointments')->row_array();
$this->data['paciente']=$paciente;
$data['patiente'] = $paciente['nombre'];
$array_values_for_photo = array(
'id_p_a' =>$paciente['id_p_a'],
'cedula' =>$paciente['cedula'],
'image_class' => "img-fluid",
'style'=>"with:30px"

);
$isSignFound=$this->db->select('id_fac')->where('id_fac',$idfacc)->get('factura_patient_firma')->row('id_fac');
if($isSignFound==$idfacc){
	echo "<h4 style='text-align:center; color:red'>Ya la factura #$idfacc tiene firma.</h4>";
}else{
$data['imgpat'] =  $this->search_patient_photo->search_patient($array_values_for_photo);
$this->load->view('signature/signature-factura-sin-topaz', $data);
}
    }




 public function saveSignaturePatientSinTopaz()
    {
        $upload_dir = './assets/update/';
        $id_fac = $_POST['id_fac'];
        $file2 = $upload_dir . "$id_fac.png";
        $img = $_POST['canvasImage'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        file_put_contents($file2, $fileData);
        $save = array(
            'firma' => "$id_fac.png",
            'created_time' => date('Y-m-d H:i:s') ,
            'id_fac' => $id_fac
        );
        $this
            ->db
            ->insert("factura_patient_firma", $save);
    }




	
}