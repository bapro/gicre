<?php defined('BASEPATH') or exit('No direct script access allowed');
class Print_page_emergency extends CI_Controller
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
		  $this->ID_PATIENT =$this->session->userdata('id_patient');
		$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency', TRUE);
		  if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			 redirect('login');
			}
    }
	
	public function emergency_data($id_hosp,$id_patient,$id_seguro,$id_centro )
    {
        
        ini_set("pcre.backtrack_limit", "5000000");
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $mpdf->setFooter('{PAGENO}');
       //$mpdf = new \Mpdf\Mpdf(['debug' => true]);
        $this->data['id_hosp'] = $id_hosp;
        $paciente = $this
            ->db
            ->select('id_p_a,nombre,tel_resi,tel_cel,email,afiliado,plan,cedula,photo,ced1,ced2,ced3,date_nacer,provincia,municipio,barrio,calle,nacionalidad,contacto_em_nombre,contacto_em_cel,contacto_em_tel1,contacto_em_tel2')
            ->where('id_p_a', $id_patient)->get('patients_appointments')
            ->row_array();
     
        $this->data['paciente_nombre'] = $paciente['nombre'];
        $this->data['tel_resi'] = $paciente['tel_resi'];
        $this->data['tel_cel'] = $paciente['tel_cel'];
        $this->data['cedula'] = $paciente['cedula'];
        $this->data['afiliado'] = $paciente['afiliado'];
        $this->data['email'] = $paciente['email'];
        $this->data['num_pat'] = $paciente['id_p_a'];
        $this->data['nacionalidad'] = $paciente['nacionalidad'];
        $date_nacer = $paciente['date_nacer'];
        $this->data['paciente_barrio'] = $paciente['barrio'];
        $this->data['paciente_calle'] = $paciente['calle'];
        $this->data['dato_accom_name'] = $paciente['contacto_em_nombre'];
        $this->data['parentecto'] = $paciente['contacto_em_cel'];
        $this->data['cel1'] = $paciente['contacto_em_tel1'];
        $this->data['cel2'] = $paciente['contacto_em_tel2'];
        $age = '';
        $diff = date_diff(date_create() , date_create($date_nacer));
        $years = $diff->format("%y");
        $months = $diff->format("%m");
        $days = $diff->format("%d");
        if ($years)
        {
            $age = ($years < 2) ? '1 año' : "$years años";
        }
        else
        {
            $age = '';
            if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
            if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
        }
        $this->data['age'] = trim($age);
        $nss = $this
            ->db
            ->select('input_name,inputf')
            ->where('patient_id', $id_patient)->get('saveinput')
            ->row_array();
			if(!$nss){
				 $this->data['input_name'] = '';
        $this->data['inputf'] = '';
			}else{
        $this->data['input_name'] = $nss['input_name'];
        $this->data['inputf'] = $nss['inputf'];
			}
        $this->data['pat_prov'] = $this
            ->db
            ->select('title')
            ->where('id', $paciente['provincia'])->get('provinces')
            ->row('title');
        $this->data['pat_muni'] = $this
            ->db
            ->select('title_town')
            ->where('id_town', $paciente['municipio'])->get('townships')
            ->row('title_town');
       
        $seguro = $this
            ->db
            ->select('title,rnc')
            ->where('id_sm', $id_seguro)->get('seguro_medico')
            ->row_array();
        $this->data['seguro'] = $seguro['title'];
        $this->data['rnc'] = $seguro['rnc'];
        $this->data['tipo'] = $paciente['afiliado'];
        $this->data['plan'] = $this
            ->db
            ->select('name')
            ->where('id', $paciente['plan'])->get('seguro_plan')
            ->row('name');
      
        $dato_ing = $this
            ->hospitalization_emgergency
            ->select('causa,via,timeinserted,inserted,timeupdated,updated,fecha_alta, refered_by')
            ->where('id', $id_hosp)->get('emergency_data')
            ->row_array();
			
		
		 $this->data['refered_by'] = $dato_ing['refered_by'];	
        $this->data['causa'] = $dato_ing['causa'];
        $this->data['via'] = $dato_ing['via'];
     
     
        $this->data['timeinserted'] = $dato_ing['timeinserted'];
        $this->data['updated'] = $dato_ing['updated'];
        $this->data['timeupdated'] = $dato_ing['timeupdated'];
        $this->data['usernameuPdate'] = $this
            ->db
            ->select('name')
            ->where('id_user', $dato_ing['updated'])->get('users')
            ->row('name');
        $this->data['username'] = $this
            ->db
            ->select('name')
            ->where('id_user', $dato_ing['inserted'])->get('users')
            ->row('name');
			
			$this->headerHosp($id_centro, $id_patient, 1, $id_hosp, 'ADMISION HOSPITALARIA');
			$this->data['orden_time'] = '';
			$html1 = $this->load->view('print-page/emergency/header', $this->data, true);
        $html2 = $this->load->view('print-page/emergency/emergency-data', $this->data, true);
        $mpdf->WriteHTML($html1);
		$mpdf->WriteHTML($html2);
        $mpdf->Output();
    }
	
	
	
	function headerHosp($id_centro, $id_patient, $id_doctor, $id_hosp, $print_title){
		
		$this->data['print_title'] = $print_title;
		//--HOSPITALIZATION INFORMACION--
		$sala=$this->hospitalization_emgergency->select('causa, timeinserted, fecha_alta')->where('id',$id_hosp)->get('emergency_data')->row_array();
     
			$this->data['sala'] = $sala;
			

		//------CENTRO QUERY-----------------
	 $centro = $this
            ->db
            ->select('name,logo,rnc,primer_tel,segundo_tel,provincia,municipio,barrio,calle')
            ->where('id_m_c', $id_centro)->get('medical_centers')
            ->row_array();
        $this->data['centro_name'] = $centro['name'];
        $this->data['centro_logo'] = $centro['logo'];
        $this->data['primer_tel'] = $centro['primer_tel'];
		$this->data['rnc_centro'] = $centro['rnc'];
        $this->data['segundo_tel'] = $centro['segundo_tel'];
        $this->data['barrio'] = $centro['barrio'];
        $this->data['calle'] = $centro['calle'];
        $this->data['centro_prov'] = $this
            ->db
            ->select('title')
            ->where('id', $centro['provincia'])->get('provinces')
            ->row('title');
        $this->data['centro_muni'] = $this
            ->db
            ->select('title_town')
            ->where('id_town', $centro['municipio'])->get('townships')
            ->row('title_town');
			
			//---PATIENT QUERY-----------------
			$paciente=$this->db->select('id_p_a, provincia,municipio,nombre,tel_resi,tel_cel,email,cedula,photo,ced1,ced2,ced3,nacionalidad,date_nacer,seguro_medico,afiliado,plan,calle')->where('id_p_a',$id_patient)
			->get('patients_appointments')->row_array();
              $this->data['pacient_name'] = $paciente['nombre'];
			  $this->data['pacient_afiliado'] = $paciente['afiliado'];
			 $this->data['pacient_cedula'] = $paciente['cedula'];
             $this->data['pacient_nacionalidad'] = $paciente['nacionalidad'];
			 $this->data['date_nacer'] = $paciente['date_nacer'];
			 	 $this->data['hce'] = $paciente['id_p_a'];
			 $this->data['pacient_tel'] = $paciente['tel_resi']. "/". $paciente['tel_cel'];
			$seguron=$this->db->select('title,logo')->where('id_sm',$paciente['seguro_medico'])->get('seguro_medico')->row_array();

			if($seguron['logo']==""){
			$logoseg="<span style='font-size:12px'><strong>Seguro Medico</strong> Privado</span>";
			}
			else{
			$logoseg='<img  style="max-width:7%;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';
			}
            $this->data['logoseg'] = $logoseg;

			$nss=$this->db->select('input_name,inputf')->where('patient_id',$id_patient)
			->get('saveinput')->row_array();
            $this->data['nss'] = $nss;
			$pacient_plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
			 $this->data['pacient_plan'] = $pacient_plan;
			 
			 //---DOCTOR QUERY-----------------
			  $doc = $this
            ->db
            ->select('name,exequatur,area')
            ->where('id_user', $id_doctor)->get('users')
            ->row_array();
        $this->data['doctor'] = $doc['name'];
        $this->data['exequatur'] = $doc['exequatur'];
		
           $doc_area= $this->db->select('title_area')->where('id_ar', $doc['area'])->get('areas')->row('title_area');
		   $this->data['area']= $doc_area;
		

}
	
	
	 public function printKardex()
    {
		  ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
		$this->data['orden_time'] = '';
        $fechaImp = "Fecha de impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
		 $CURRENT_PRINT_KARDEX_TIME=$this->session->userdata('CURRENT_PRINT_KARDEX_TIME');
			 $query = $this->hospitalization_emgergency->query("SELECT * FROM emerg_orden_medica_recetas
           INNER JOIN emerg_kardex_print ON emerg_orden_medica_recetas.id=emerg_kardex_print.id WHERE print_session ='$CURRENT_PRINT_KARDEX_TIME' AND id_user=$this->ID_USER AND historial_id=$this->ID_PATIENT");
		   
		  foreach ($query->result() as $row) 
		   $id_hosp= $this->hospitalization_emgergency->select('id_hosp')->where('id', $row->id_register)->get('emerg_orden_medica')->row('id_hosp');
		   $this->headerHosp($row->centro, $row->historial_id,$row->kardex_user, $id_hosp, 'KARDEX DE MEDICAMENTOS');
		   	$html1 = $this->load->view('print-page/emergency/header', $this->data, true);
			   $mpdf->WriteHTML($html1);
			    $this->data['query'] = $query;
			   	$html2 = $this->load->view('print-page/emergency/kardex-drugs/index', $this->data, true);
			   $mpdf->WriteHTML($html2);
			   $mpdf->Output();
			 $this->hospitalization_emgergency->where('print_session',$CURRENT_PRINT_KARDEX_TIME);
        $this->hospitalization_emgergency->delete('emerg_kardex_print');
		}
		
		
	
	
	

	
 public function medical_order($user_id,$patient_id,$id_register)
    {
        ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
        $fechaImp = "Fecha de impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
       $this->data['mpdf'] = $mpdf;
        $this->data['patient_id'] = $patient_id;
        $this->data['user_id'] = $user_id;
        $this->data['id_doc'] = $user_id;
  
        if ($id_register == 0)
        {
            $register = $this
                ->hospitalization_emgergency
                ->select('*')
                ->where("inserted_by", $user_id)->where("id_historial", $patient_id)->order_by('id', 'desc')
                ->limit(1)
                ->get('emerg_orden_medica')
                ->row_array();
				$id_register = $register['id'];
				$id_centro = $register['centro'];
        }
        else
        {
			$register = $this
                ->hospitalization_emgergency
                ->select('*')->where("id", $id_register)->get('emerg_orden_medica')->row_array();
            $id_register = $id_register;
			$id_centro = $register['centro'];
        }
        $this->data['id_register'] = $id_register;
		$this->data['id_hosp'] = $register['id_hosp'];
		$this->data['orden_time'] = date("d-m-Y", strtotime($register['fecha_ingreso'])). " " .$register['hour_ingreso'] ;
		
		
		 $sql2 = "SELECT * FROM emerg_orden_medica_estudios WHERE id_register=$id_register AND historial_id=$patient_id AND  canceled=0";
        $this->data['estudios'] = $this
            ->hospitalization_emgergency
            ->query($sql2);
		 $sql1 = "SELECT * FROM emerg_orden_medica_recetas where id_register=$id_register AND historial_id=$patient_id AND  canceled=0";
        $this->data['recetas'] = $this
            ->hospitalization_emgergency
            ->query($sql1);
			$sql3 = "SELECT * FROM emerg_orden_medcia_lab where id_register=$id_register AND historial_id=$patient_id AND  canceled=0";
        $this->data['lab'] = $this
            ->hospitalization_emgergency
            ->query($sql3);
			
			  $sql4 = "SELECT * FROM emerg_ord_med_gen where id_register=$id_register AND id_patient=$patient_id  AND  canceled=0";
        $this->data['med_med_gen'] = $this
            ->hospitalization_emgergency
            ->query($sql4);
		$this->headerHosp($id_centro, $patient_id,$user_id, $register['id_hosp'], 'ORDEN MEDICA');
       	$html1 = $this->load->view('print-page/emergency/header', $this->data, true);
        $html2 = $this->load->view('print-page/emergency/medical-orden/index', $this->data, true);
		 $this->data['id_doctor'] = $user_id;
		$html3 = $this->load->view('print-page/footer-medico', $this->data, true);
        $mpdf->WriteHTML($html1);
		$mpdf->WriteHTML($html2);
		$mpdf->WriteHTML($html3);
        $mpdf->Output();
    }
	
	
	
	
	
	

 public function print_notas($id)
    {
        ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
        $fechaImp = "Fecha de impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);	
		$signos = $this->hospitalization_emgergency->select('*')->where('id_nota', $id)->get('emerg_signo_vitales')->row_array();
		$notas = $this->hospitalization_emgergency->select('centro,id_patient,nombre_nota,description_nota,inserted_by,updated_time, id_hosp')->where('id', $id)->get('emerg_exam_fis_nota')->row_array();
		$this->headerHosp($notas['centro'], $notas['id_patient'], $notas['inserted_by'],$notas['id_hosp'], 'NOTAS');
		$this->data['signos'] = $signos;
		$this->data['notas'] = $notas;
		$this->data['orden_time'] = '';
		$this->data['id_doctor']=$notas['inserted_by'];
		$html1 = $this->load->view('print-page/emergency/header', $this->data, true);
		 $html2 = $this->load->view('print-page/emergency/notas/index', $this->data, true);
		 $html3 = $this->load->view('print-page/footer-medico', $this->data, true);
		 $mpdf->WriteHTML($html1);
        $mpdf->WriteHTML($html2);
		$mpdf->WriteHTML($html3);
		  $mpdf->Output();
}


		

 public function conclusion_egreso1($id, $id_ord='', $id_signos='')
    {
		  ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
		$this->data['orden_time'] = '';
		$this->data['id_ord'] = $id_ord;
        $fechaImp = "Fecha de impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
		 $sql = "select * from  emerg_conclusion_ingreso where id=$id";
      $querydatasave = $this->hospitalization_emgergency->query($sql);
		   
		  foreach ($querydatasave->result() as $row) 
		   
		   $this->headerHosp($row->id_centro, $row->id_patient, $row->inserted_by, $row->id_hosp, 'CONCLUSIÓN DE EGRESO');
		   	$html1 = $this->load->view('print-page/emergency/header', $this->data, true);
			   $mpdf->WriteHTML($html1);
			    $this->data['query'] = $querydatasave;
			
			   	$html2 = $this->load->view('print-page/emergency/conclusion-egreso/index', $this->data, true);
				$mpdf->WriteHTML($html2);
				
				if($id_signos){
			   
			   $querysv = $this->hospitalization_emgergency->query("SELECT * FROM emerg_signo_vitales WHERE id_exam_fisico=$id_signos");
		   $this->data['signos_vitales'] = $querysv;
		   $html4 =$this->load->view('print-page/emergency/examen-fisico/only-data-test', $this->data, true);
			$mpdf->WriteHTML($html4);
			
			
				}
				if($id_ord){
					$mpdf->WriteHTML("<br/><strong>ORDEN MEDICA</strong><br/>");
				//------------ORDEN MEDICA----------------------------------
					 $sql2 = "SELECT * FROM emerg_orden_medica_estudios WHERE id_register=$id_ord AND historial_id=$row->id_patient AND  canceled=0";
        $this->data['estudios'] = $this
            ->hospitalization_emgergency
            ->query($sql2);
		 $sql1 = "SELECT * FROM emerg_orden_medica_recetas where id_register=$id_ord AND historial_id=$row->id_patient AND  canceled=0";
        $this->data['recetas'] = $this
            ->hospitalization_emgergency
            ->query($sql1);
			$sql3 = "SELECT * FROM emerg_orden_medcia_lab where id_register=$id_ord AND historial_id=$row->id_patient AND  canceled=0";
        $this->data['lab'] = $this
            ->hospitalization_emgergency
            ->query($sql3);
			
			  $sql4 = "SELECT * FROM emerg_ord_med_gen where id_register=$id_ord AND id_patient=$row->id_patient  AND  canceled=0";
        $this->data['med_med_gen'] = $this
            ->hospitalization_emgergency
            ->query($sql4);
				  $html3= $this->load->view('print-page/emergency/medical-orden/index', $this->data, true);
				  $mpdf->WriteHTML($html3);
				}
				
			   
     $html5 =$this->load->view('print-page/footer-simple', $this->data, true);
			$mpdf->WriteHTML($html5);
			   
			   $mpdf->Output();
		}

	 public function conclusion_egreso($id, $id_ord='', $id_signos='')
    {
		  ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
		$this->data['orden_time'] = '';
		$this->data['id_ord'] = $id_ord;
        $fechaImp = "Fecha de impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
		 $sql = "select * from  emerg_conclusion_ingreso where id=$id";
      $querydatasave = $this->hospitalization_emgergency->query($sql);
		   
		  foreach ($querydatasave->result() as $row) 
		   
		   $this->headerHosp($row->id_centro, $row->id_patient, $row->inserted_by, $row->id_hosp, 'CONCLUSIÓN DE EGRESO');
		   	$html1 = $this->load->view('print-page/emergency/header', $this->data, true);
			   $mpdf->WriteHTML($html1);
			    $this->data['query'] = $querydatasave;
			
			   	$html2 = $this->load->view('print-page/emergency/conclusion-egreso/index', $this->data, true);
				$mpdf->WriteHTML($html2);
				
				if($id_signos){
			   
			   $querysv = $this->hospitalization_emgergency->query("SELECT * FROM emerg_signo_vitales WHERE id_exam_fisico=$id_signos");
		   $this->data['signos_vitales'] = $querysv;
		   $html4 =$this->load->view('print-page/emergency/examen-fisico/only-data', $this->data, true);
			$mpdf->WriteHTML($html4);
			
			
				}
				if($id_ord){
					$mpdf->WriteHTML("<br/><strong>ORDEN MEDICA</strong><br/>");
				//------------ORDEN MEDICA----------------------------------
					 $sql2 = "SELECT * FROM emerg_orden_medica_estudios WHERE id_register=$id_ord AND historial_id=$row->id_patient AND  canceled=0";
        $this->data['estudios'] = $this
            ->hospitalization_emgergency
            ->query($sql2);
		 $sql1 = "SELECT * FROM emerg_orden_medica_recetas where id_register=$id_ord AND historial_id=$row->id_patient AND  canceled=0";
        $this->data['recetas'] = $this
            ->hospitalization_emgergency
            ->query($sql1);
			$sql3 = "SELECT * FROM emerg_orden_medcia_lab where id_register=$id_ord AND historial_id=$row->id_patient AND  canceled=0";
        $this->data['lab'] = $this
            ->hospitalization_emgergency
            ->query($sql3);
			
			  $sql4 = "SELECT * FROM emerg_ord_med_gen where id_register=$id_ord AND id_patient=$row->id_patient  AND  canceled=0";
        $this->data['med_med_gen'] = $this
            ->hospitalization_emgergency
            ->query($sql4);
				  $html3= $this->load->view('print-page/emergency/medical-orden/index', $this->data, true);
				  $mpdf->WriteHTML($html3);
				}
				
			   
     $html5 =$this->load->view('print-page/footer-simple', $this->data, true);
			$mpdf->WriteHTML($html5);
			   
			   $mpdf->Output();
		}


public function farma_interna($id_patient, $icentro, $id_hosp)
{	
	
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8')]);

$this->data['print_user']=$this->NAME_USER;
$this->data['print_time'] = date("d-m-Y H:i:s", strtotime(date("Y-m-d H:i:s")));


$sql4="SELECT *
FROM  emerg_orden_medica_recetas WHERE  historial_id=$id_patient && kardex=1 AND centro=$icentro  AND drug_is_dispatched=1 ORDER BY id DESC ";
$this->data['query4'] = $this->hospitalization_emgergency->query($sql4);


$sql5="SELECT *
 FROM  emerg_peticion WHERE id_patient=$id_patient  AND centro=$icentro AND drug_is_dispatched=1 ORDER BY id DESC";
$this->data['query5'] = $this->hospitalization_emgergency->query($sql5);

$this->data['id_hosp']=$id_hosp;
$this->data['id_m_c']=$icentro;
//$html1 = $this->load->view('hospitalizacion/centro-stamped',$this->data,TRUE);
$this->data['orden_time'] = '';
	$this->headerHosp($icentro, $id_patient,$this->ID_USER, $id_hosp, 'DESPACHO DE MEDICAMENTOS E INSUMOS');
       	$html1 = $this->load->view('print-page/emergency/header', $this->data, true);
//$html2 = $this->load->view('admin/print/header-print-hospitalizacion',$this->data,TRUE);
$html3 = $this->load->view('print-page/emergency/internal-pharma/dispatch-drug',$this->data,TRUE);
$html4 = $this->load->view('print-page/emergency/internal-pharma/footer-info-print',$this->data,TRUE);
$mpdf->WriteHTML($html1);
/*$mpdf->WriteHTML($html2);
$mpdf->WriteHTML($html3);
*/
$mpdf->WriteHTML($html3);
$mpdf->WriteHTML($html4);
$mpdf->Output();

 $update1="UPDATE emerg_orden_medica_recetas SET is_print = 1, drug_is_dispatched=0 WHERE drug_dispatched_user = $this->ID_USER AND centro=$icentro AND historial_id=$id_patient AND drug_is_dispatched=1";
$this->hospitalization_emgergency->query($update1);

  $update2="UPDATE emerg_peticion SET is_print = 1, drug_is_dispatched=0  WHERE drug_dispatched_user = $this->ID_USER AND centro=$icentro AND id_patient=$id_patient AND drug_is_dispatched=1";
$this->hospitalization_emgergency->query($update2); 
   
 
}

	 public function contro_signos_vitales()
    {
		  ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
		$this->data['orden_time'] = '';
        $fechaImp = "Fecha de impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
		 $CURRENT_PRINT_CSV_TIME=$this->session->userdata('CURRENT_PRINT_CSV_TIME');
			 $query = $this->hospitalization_emgergency->query("SELECT *, emerg_control_signos_vitales.id_user AS idUser FROM emerg_control_signos_vitales
           INNER JOIN emerg_csv_print ON emerg_control_signos_vitales.id=emerg_csv_print.id WHERE print_session ='$CURRENT_PRINT_CSV_TIME' AND emerg_csv_print.id_user=$this->ID_USER AND id_patient=$this->ID_PATIENT");
		   
		  foreach ($query->result() as $row) 
		   $this->headerHosp($row->centro, $row->id_patient,$row->idUser, $row->id_hosp, 'CONTROL DE SIGNOS VITALES');
		   	$html1 = $this->load->view('print-page/emergency/header', $this->data, true);
			   $mpdf->WriteHTML($html1);
			    $this->data['query'] = $query;
			   	$html2 = $this->load->view('print-page/emergency/control-signo-vitales/index', $this->data, true);
			   $mpdf->WriteHTML($html2);
			   $mpdf->Output();
		}



 public function printInsumo()
    {
		  ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
		$this->data['orden_time'] = '';
        $fechaImp = "Fecha de impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
		$CURRENT_PRINT_INSUMO_TIME=$this->session->userdata("CURRENT_PRINT_INSUMO_TIME-emerg_insumo_print");
			 $query = $this->hospitalization_emgergency->query("SELECT * FROM emerg_peticion_link
           INNER JOIN emerg_insumo_print ON emerg_peticion_link.id=emerg_insumo_print.id WHERE print_session ='$CURRENT_PRINT_INSUMO_TIME' AND id_user=$this->ID_USER");
		   
		  foreach ($query->result() as $row) 
		
		   $this->headerHosp($row->cent, $row->pat,$row->user, $row->id_hosp, 'PETICIÓN DE INSUMO');
		   	$html1 = $this->load->view('print-page/emergency/header', $this->data, true);
			   $mpdf->WriteHTML($html1);
			    $this->data['querydatasave'] = $query;
				$this->data['table_insumo'] = 'emerg_peticion';
			   	$html2 = $this->load->view('print-page/emergency/insumo/index', $this->data, true);
			   $mpdf->WriteHTML($html2);
			   $mpdf->Output();
			   
			   $this->hospitalization_emgergency->where('print_session',$CURRENT_PRINT_INSUMO_TIME);
        $this->hospitalization_emgergency->delete('emerg_insumo_print');
		$this->session->unset_userdata('CURRENT_PRINT_INSUMO_TIME-emerg_insumo_print');	
			   
		}
		
		
		
	
				 public function examen_fisico($id)
    {
		  ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
		$this->data['orden_time'] = '';
        $fechaImp = "Fecha de impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
	
	
	$this->data['diagnostico'] =  $this->hospitalization_emgergency->select('diag_alta_diag1')->where('id_hosp', $this->session->userdata('ID_HOSP'))->get('emerg_conclusion_ingreso')->row('diag_alta_diag1');
		  
	
			 $query = $this->hospitalization_emgergency->query("SELECT * FROM emerg_exam_fisico
           INNER JOIN emerg_signo_vitales ON emerg_exam_fisico.id=emerg_signo_vitales.id_exam_fisico WHERE emerg_exam_fisico.id=$id");
		   
		  foreach ($query->result() as $row) 
		   $this->headerHosp($row->centro, $row->id_patient, $row->inserted_by, $this->session->userdata('ID_HOSP'), 'EXAMEN FISICO');
		   	$html1 = $this->load->view('print-page/emergency/header-examf', $this->data, true);
			   $mpdf->WriteHTML($html1);
			    $this->data['query'] = $query;
				$this->data['created_by'] = $row->inserted_by;
			   	$html2 = $this->load->view('print-page/emergency/examen-fisico/index', $this->data, true);
			   $mpdf->WriteHTML($html2);
			   $mpdf->Output();
		}	
		
		
		
		
		
		
}