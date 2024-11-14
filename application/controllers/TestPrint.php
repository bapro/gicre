	<?php defined('BASEPATH') or exit('No direct script access allowed');
class TestPrint extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('print_page_model');
       $this->load->library('get_table_data_by_id');
	   	$this->load->library("search_patient_photo");
	    $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		  $this->ID_USER=$this->session->userdata('user_id');
		  $this->NAME_USER=$this->session->userdata('user_name');
		  $this->clinical_history = $this->load->database('clinical_history',TRUE);
		  if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			 redirect('login');
			}
    }
	
	public function indicationHeader($historial_id, $table, $centro, $ifphoto, $userInfo){
		echo $centro;
		$id_user=$userInfo['operator'];
		$this->data['insert_time']=$userInfo['insert_time'];
		$this->data['id_user']=$id_user;
		//---doctor info----------------
		$doc=$this->db->select('*')->where('id_user',$id_user)->get('users')->row_array();
		$this->data['exequatur']=$doc['exequatur'];
			$this->data['area']=$doc['area'];
			$this->data['author']=$doc['name'];
			 $logo_tipo=$this->db->select('sello')->where('doc',$id_user)->where('dist',1)->get('doctor_sello')->row('sello');
		 $this->data['logo_tipo']=$logo_tipo;
		$sello_doc=$this->db->select('sello')->where('doc',$id_user)->where('dist',0)->get('doctor_sello')->row('sello');
		$this->data['sello_doc']=$sello_doc;
		$especialidad=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
		$this->data['especialidad']=$especialidad;
			
			
			$this->data['id_historial']=$historial_id;
			 $paciente=$this->db->select('id_p_a, provincia,municipio,nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,nacionalidad,date_nacer,seguro_medico,afiliado,plan,calle')->where('id_p_a',$historial_id)
         ->get('patients_appointments')->row_array();
		 $this->data['paciente']=$paciente;
		 
		 
		 $provincia=$this->db->select('title')->where('id',$paciente['provincia'])
 ->get('provinces')->row('title');
$this->data['centro_prov']=$provincia;

$municipio=$this->db->select('title_town')->where('id_town',$paciente['municipio'])
 ->get('townships')->row('title_town');

$this->data['centro_muni']=$municipio;		 
		 
		 
	$array_values_for_photo = array(
			'id_p_a' => $paciente['id_p_a'],
			'cedula' => $paciente['cedula'],
			'image_class' => "rounded-circle",
			'style' => 'width=60'

		);
		$photo= $this->search_patient_photo->search_patient($array_values_for_photo);	 
		if($ifphoto==1){
	$this->data['photo']=$photo;	
		}else{
			$this->data['photo']="";
		}
$seguron=$this->db->select('title,logo')->where('id_sm',$paciente['seguro_medico'])->get('seguro_medico')->row_array();
$this->data['seguron']=$seguron;
if($seguron['logo']==""){
	$logoseg="<span style='font-size:12px'><strong>Seguro Medico</strong> Privado</span>";
}
else{
$logoseg='<img  style="width:50px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';
}
$this->data['logoseg']=$logoseg;

 $nss=$this->db->select('input_name,inputf')->where('patient_id',$historial_id)
 ->get('saveinput')->row_array();
$this->data['nss']=$nss;

  $plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
$this->data['plan']=$plan;

$centroInfo=$this->db->select('name,logo,rnc,primer_tel,segundo_tel,provincia,municipio,barrio,calle,type')->where('id_m_c',$centro)
->get('medical_centers')->row_array();

$this->data['centroInfo']=$centroInfo;




}
	
	
	
	 public function print_indicaciones($historial_id,$position,$ifphoto,$col,$table, $centro=0)
	  
    {
		echo $centro;
		ini_set('memory_limit', '1024M');
		$userInfo=$this->clinical_history->select('operator, insert_time, centro')->where($col,1)->where('historial_id',$historial_id)->get($table)->row_array();
		if($userInfo){
		 $this->indicationHeader($historial_id, $table, $centro, $ifphoto,$userInfo);
		} else{
			echo '<p style="text-align:center">La impresion se mostra una sola vez</p>';
			return false; 
		}
	 $query_rows = $this->print_page_model->print_indicaciones($historial_id, $col, $table);
		   if ($query_rows != NULL)
        {
			
			$this->data['query_rows'] = $query_rows;
			 $this->data['centroId'] = $userInfo['centro'];
		 if ($position == 'vert')
            {
                $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path', 'format' => 'A5']);
            }
            else
            {
                $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path', array(
                    'mode' => 'utf-8',
                    'format' => 'A5-L'
                ) ]);
            }
			
			 $this->data['mpdf'] = $mpdf;
			  if ($table == 'h_c_indicaciones_medicales')
            {
                $this->data['title'] = "RECETAS";
            }
            else if ($table == 'h_c_indications_labs')
            {
                $this->data['title'] = "LABORATORIOS";
            }
            $this->data['table'] = $table;
           
         $html1 = $this->load->view('print-page/header1', $this->data, true);
            $html2 = $this ->load->view('print-page/clinical-history/indications/indications', $this->data, true);
            
            $mpdf->WriteHTML($html1);
			//$mpdf->WriteHTML($html2);
			$mpdf->Output();
			//echo $doc['name'];
			
			
		}
		else
        {
            echo "Lo siento, vuelve a seleccionar...";
        }
		
	}
	
	
	
	
	}