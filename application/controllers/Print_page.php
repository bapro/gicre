<?php defined('BASEPATH') or exit('No direct script access allowed');
class Print_page extends CI_Controller
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
	
	
	
	
 public function general_invoice_report()
    {
		ini_set('memory_limit', '1024M');
		 $centro = $this->input->get('centro');
        $doctor = $this->input->get('doctor');
        $desde = $this->input->get('desde');
        $hasta = $this->input->get('hasta');
        $moneda = $this->input->get('moneda');
        
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
		//$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path', 'mode' => 'utf-8', 'format' => 'A5']);
		$fechaImp = "impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
        $mpdf->setFooter("Página {PAGENO} de {nb}<br/>Generado por ". $this->NAME_USER);
      
	    $query = $this->print_page_model->get_factura_reporte_general($desde,$hasta,$moneda,$doctor, $centro);
		$this->data['data']=$query->result_array();
		$this->data['num_rows']=$query->num_rows();
	  
	   $this->data['desde'] = $desde;
        $this->data['hasta'] = $hasta;
		$this->data['centro'] = $centro;
		$this->data['doctor'] = $doctor;
		$this->data['moneda'] = $moneda;
		  [$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($centro);
		$this->data['get_centro_name'] = $get_centro_info_by_id['name'];
	  $this->data['location'] = 0;
	 $this->data['date_range'] = "Desde " . date("d-m-Y", strtotime($desde)). " Hasta ". date("d-m-Y", strtotime($hasta));
	
	  $html = $this->load->view('factura/reporte-de-facturas/report-general-data', $this->data, true);
        $mpdf->WriteHTML($html);
     
        $mpdf->Output();
    }
	
	 public function general_invoice_report_test()
    {
		ini_set('memory_limit', '1024M');
		 $centro = $this->input->get('centro');
        $doctor = $this->input->get('doctor');
        $desde = $this->input->get('desde');
        $hasta = $this->input->get('hasta');
        $moneda = $this->input->get('moneda');
        
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
		//$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path', 'mode' => 'utf-8', 'format' => 'A5']);
		$fechaImp = "impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
        $mpdf->setFooter("Página {PAGENO} de {nb}<br/>Generado por ". $this->NAME_USER);
      
	    $query = $this->print_page_model->get_factura_reporte_general($desde,$hasta,$moneda,$doctor, $centro);
		$this->data['data']=$query->result_array();
		$this->data['num_rows']=$query->num_rows();
	  
	   $this->data['desde'] = $desde;
        $this->data['hasta'] = $hasta;
		$this->data['centro'] = $centro;
		$this->data['doctor'] = $doctor;
		$this->data['moneda'] = $moneda;
		  [$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($centro);
		$this->data['get_centro_name'] = $get_centro_info_by_id['name'];
	  $this->data['location'] = 0;
	 $this->data['date_range'] = "Desde " . date("d-m-Y", strtotime($desde)). " Hasta ". date("d-m-Y", strtotime($hasta));
	
	  $html = $this->load->view('factura/reporte-de-facturas/report-general-data-test', $this->data, true);
        $mpdf->WriteHTML($html);
     
        $mpdf->Output();
    }
	
	 public function print_ars_fac_found($id_ncf,$id_centro,$desdeinv,$hastainv,$id_patient)
    {
       
       ini_set('memory_limit', '1024M');
       
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $mpdf->setFooter('{PAGENO}');
        $this->data['id_ncf'] = $id_ncf;
        $this->data['id_centro'] = $id_centro;
        $invoice = $this
            ->model_admin
            ->print_ars_fac_found($id_ncf, $id_patient);
        $this->data['invoice'] = $invoice;
        $this->data['cntinv'] = count($invoice);
        $this->data['nota_ncf'] = $this
            ->model_admin
            ->getNcf($id_ncf);
        $this->data['desde'] = $desdeinv;
        $this->data['hasta'] = $hastainv;
        $html = $this->load->view('print-page/ars-ncf/print_invoice_ars', $this->data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
	
	
	
	
	public function patients_invoice_report()
    {
		ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
		
      $centro = $this->input->get('centro-search');
        $doctor = $this->input->get('doctor-rg');
		 $seguro = $this->input->get('seguro');
        $desde = $this->input->get('desde-search');
        $hasta = $this->input->get('hasta-search');
		 $centro_type = $this->input->get('select-centro');
		  $this->data['break_after'] = "break-after";
		    $this->data['push_down'] = "";
        $this->data['seguro'] = $seguro;
        $this->data['centro'] = $centro;
        $this->data['desde'] = $desde;
        $this->data['hasta'] = $hasta;
		if($centro_type=='privado'){
		  $this->data['print'] = 'medico'; 
		}else{
		$this->data['print'] = 'centro'; 	
		}
        //$mpdf->AddPage('L');
        $mpdf->setFooter("Página {PAGENO} de {nb}");
		
       
		  if ($centro && $doctor)
        {
            $where = "AND centro_medico=$centro AND medico=$doctor";
        }
        elseif ($doctor)
        {
            $where = "AND medico=$doctor";
        }
        else
        {
        	if($centro==''){
         $where = '';
        	}else{
            $where = "AND centro_medico=$centro";
        }
        }
        $querySql = $this->db->query("SELECT * FROM factura2  WHERE CAST(filter_date AS DATE) BETWEEN '$desde' AND '$hasta' AND factura2.canceled=0 AND seguro_medico=$seguro  $where GROUP BY numauto ORDER BY filter_date DESC");
       $queryRst=$querySql->result();
	      $this->data['num_rows'] =  $querySql->num_rows();
	   $this->data['display_report'] =  $queryRst;
	   $this->data['report_type'] =  'all-patients';
        $html = $this->load->view('print-page/invoice/patient-invoice', $this->data, true);
        
		
        $mpdf->WriteHTML($html);
       $mpdf->Output();
    }
	
	
	
	
	
	
	
	
	 public function printInvoice($desde,$hasta,$ncf_id, $centro, $id_doc, $id_seguro)
    {
     ini_set('memory_limit', '1024M');
       $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $mpdf->setFooter('{PAGENO}');
        $this->data['id_user'] = $id_doc;
       $this->data['id_centro'] = $centro;
       // $this->data['id_patient'] = $patient;
        $this->data['after_save'] = 0;
        $this->data['areas'] = $this->model_admin->get_serv_fac2_doc(0);
        $this->data['area'] = "";
		  $this->data['desde'] = $desde;
		    $this->data['hasta'] = $hasta;
        $this->data['area_id'] = "";
        $this->data['id_ncf'] = $ncf_id;
		 $condition="invoice_ars_claims.fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "'";
         $sql = "SELECT *
	   FROM  invoice_ars_claims INNER JOIN factura2 ON invoice_ars_claims.id_f = factura2.idfacc
	   WHERE $condition AND ncf_id=$ncf_id  ORDER BY invoice_ars_claims.fecha ASC";
	    $query = $this->db->query($sql);
	
         $this->data['invoice'] = $query->result();
			
        $this->data['cntinv'] = $query->num_rows();
        $this->data['nota_ncf'] = $this ->model_admin->getNcf($ncf_id);
        $this->data['is_admin'] = 'no';
		if($query->result() !=NULL){
		 $html = $this->load->view('print-page/ars-ncf/print_invoice_ars', $this->data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
		}else{
			echo "No se puede mostrar la pagina.";
		}
		
    }
	
	
	
	
	
		 public function patient_invoice()
    {
			ini_set('memory_limit', '1024M');
		 $idfacc = $this->input->get('idfacc');
        $print = $this->input->get('print');
        $this->data['seguro'] = $this->input->get('seguro');
       $this->data['print'] = $print;
	   $this->data['idfacc'] = $idfacc;
	   $this->data['break_after'] = "";
	   $this->data['push_down'] = "absolute-element-footer2";
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        
        $mpdf->setFooter('{PAGENO}');
        
        $this->data['display_report'] = $this->model_admin->showBilling1($idfacc);
		 $this->data['report_type'] =  'one-patient';	
        $html = $this->load->view('print-page/invoice/patient-invoice', $this->data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
	
	
	
	 public function patient_invoice_private()
    {
		ini_set('memory_limit', '1024M');
      $idfacc = $this->input->get('idfacc');
        $print = $this->input->get('print'); 
        $this->data['seguro'] = $this->input->get('seguro'); 
		$this->data['print'] = $print;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
       
        $mpdf->setFooter('{PAGENO}');
       
        $pm = $this
            ->db
            ->select('paciente,medico,centro_medico')
            ->where('idfacc', $idfacc)->get('factura2')
            ->row_array();
        $this->data['last_bill_id'] = $idfacc;
        $this->data['id_doc'] = $pm['medico'];
     
        $this->data['billing1'] = $this
            ->model_admin
            ->showBilling1($idfacc);
        $billing2 = $this
            ->model_admin
            ->showBilling2($idfacc);
        $this->data['billing2'] = $billing2;
        $this->data['count'] = count($billing2);
		 $this->data['money_device'] = $this->db->select('money_device')->where('id_factura', $idfacc)->get('factura_modalidad_pago')->row('money_device');
        $html = $this
            ->load
            ->view('print-page/invoice/patient-invoice-private', $this->data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
	
	
	
	
		public function indicationHeader($historial_id, $table, $centro, $ifphoto, $userInfo){
		$id_user=$userInfo['operator'];
		$this->data['insert_time']=$userInfo['insert_time'];
		$this->data['id_user']=$id_user;
		//---doctor info----------------
		$doc=$this->db->select('*')->where('id_user',$id_user)->get('users')->row_array();
		$this->data['exequatur']=$doc['exequatur'];
			$this->data['area']=$doc['area'];
			$this->data['author']=$doc['name'];
			$this->data['doc_cedula']=$doc['cedula'];
			$this->data['doc_email']=$doc['correo'];
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
	/*public function print_indicaciones($id_patient,$position,$ifphoto,$col,$table, $centro, $operator)
	 //public function print_indicaciones($table,$date,$id_patient,$operator, $centro, $position, $ifphoto)
    {
		echo $table ;
		ini_set('memory_limit', '1024M');
		$userInfo=$this->clinical_history->select('operator, insert_time, centro')->where('operator',$operator)->get($table)->row_array();
		$this->data['registerInfo'] = $userInfo;
		if($userInfo){
		 $this->indicationHeader($id_patient, $table, $centro, $ifphoto,$userInfo);
		} else{
			echo '<p style="text-align:center">La impresion se mostra una sola vez</p>';
			return false; 
		}
	
			
		
			 $this->data['centroId'] = $centro;
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
			//$mpdf = new \Mpdf\Mpdf(['debug' => true]);
			 $this->data['mpdf'] = $mpdf;
			  if ($table == 'h_c_indicaciones_medicales')
            {
                $this->data['title'] = "RECETAS";
				$query_rows= $this->clinical_history->query("SELECT * FROM  h_c_indicaciones_medicales WHERE operator=$operator AND historial_id=$id_patient  AND DATE(insert_time)='$date'");
				$this->data['query_rows'] =$query_rows->result();
            }
            elseif ($table == 'h_c_indications_labs')
            {
                $this->data['title'] = "LABORATORIOS";
				
				$this->data['partlab1']= $this->clinical_history->query("SELECT * FROM  h_c_indications_labs WHERE  historial_id=$id_patient AND operator=$operator AND DATE(insert_time)='$date' LIMIT 10");
	            $this->data['partlab2']= $this->clinical_history->query("SELECT * FROM  h_c_indications_labs WHERE  historial_id=$id_patient AND operator=$operator AND DATE(insert_time)='$date' LIMIT 10, 60");
			}else{
				
			$this->data['title'] = "ESTUDIOS";
				$query_rows= $this->clinical_history->query("SELECT * FROM  h_c_indicaciones_estudio WHERE operator=$operator AND historial_id=$id_patient  AND DATE(insert_time)='$date'");
				$this->data['query_rows'] =$query_rows->result();	
			}
            $this->data['table'] = $table;
           
         $html1 = $this->load->view('print-page/header1', $this->data, true);
            $html2 = $this ->load->view('print-page/clinical-history/indications/indications', $this->data, true);
            
            $mpdf->WriteHTML($html1);
			$mpdf->WriteHTML($html2);
			$mpdf->Output();
			
			
			
		
		
	}*/
	
	
	
	public function print_indicaciones($historial_id,$position,$ifphoto,$col,$table, $centro, $operator)
    {
		ini_set('memory_limit', '1024M');
		$userInfo=$this->clinical_history->select('operator, insert_time, centro')->where($col,1)->where('historial_id',$historial_id)->get($table)->row_array();
			$this->data['registerInfo'] = $userInfo;
		if($userInfo){
		 $this->indicationHeader($historial_id, $table, $userInfo['centro'], $ifphoto,$userInfo);
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
				
				$this->data['partlab1']= $this->clinical_history->query("SELECT * FROM  h_c_indications_labs WHERE operator=$operator AND $col=1 AND historial_id=$historial_id ORDER BY id_lab ASC LIMIT 10 ");
	            $this->data['partlab2']= $this->clinical_history->query("SELECT * FROM  h_c_indications_labs WHERE operator=$operator AND $col=1 AND historial_id=$historial_id ORDER BY id_lab ASC LIMIT 10, 60");
				
			  }else{
				$this->data['title'] = "ESTUDIOS"; 
				$query_rows= $this->clinical_history->query("SELECT * FROM  h_c_indicaciones_estudio WHERE operator=$operator AND historial_id=$historial_id  AND $col=1 ORDER BY id_i_e ASC");
				$this->data['query_rows'] =$query_rows->result();
			  }
            $this->data['table'] = $table;
           
         $html1 = $this->load->view('print-page/header1', $this->data, true);
            $html2 = $this ->load->view('print-page/clinical-history/indications/indications', $this->data, true);
            $mpdf->WriteHTML($html1);
			$mpdf->WriteHTML($html2);
			$mpdf->Output();
			
			
		}
		else
        {
            echo "Lo siento, vuelve a seleccionar...";
        }
		
	}
	
	
	

	
	
	
	
	public function study($historial_id,$id_es, $ifphoto, $position, $id_centro=0)
    {
		ini_set('memory_limit', '1024M');
		if($id_centro==0){
			echo 'Disculpa por la molestia. Contacta el administrador para ver esa impresión.';
		}else{
		
		
		$userInfo=$this->clinical_history->select('operator, insert_time')->where('id_i_e',$id_es)->get('h_c_indicaciones_estudio')->row_array();
		
		$this->indicationHeader($historial_id, 'h_c_indicaciones_estudio', $id_centro, $ifphoto, $userInfo);
	
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
        $this->data['id_historial'] = $historial_id;
        $this->data['title'] = "ESTUDIOS";
        $estudios = $this
            ->print_page_model
            ->print_estudio($id_es);
        $this->data['estudios'] = $estudios;
         $html1 = $this->load->view('print-page/header1', $this->data, true);
       $html2 = $this ->load->view('print-page/clinical-history/indications/estudios', $this->data, true);
        $mpdf->WriteHTML($html1);
        $mpdf->WriteHTML($html2);
        $mpdf->Output();
		}
    }
	
	
	public function resume_historial($historial_id=0, $id_user=0, $id_centro=0, $table='')
    {
		
		
		$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
		 $this->data['title'] = "RESUMEN DE LA ÚLTIMA CONSULTA";
		$userInfo=$this->clinical_history->select('inserted_by as operator, inserted_time as insert_time')->where('id',$id_user)->get('h_c_enfermedad_actual')->row_array();
		$this->indicationHeader($historial_id, $table, $id_centro, $ifphoto, $userInfo);
		   $html1 = $this->load->view('print-page/header1', $this->data, true);
		   //----------------------------------------------------------------------------------
		   $this->load->library("load_history_resume");
		   [$con_diags, $list_cie10, $current_disease, $signo_vitales, $doc_area, $doc_name, $centro, $doctor_area] = $this->load_history_resume->history_summary($historial_id);
		 
		  
		$sql="SELECT * FROM h_c_conclusion_diagno_evolution WHERE id_patient='$historial_id'  ORDER BY id DESC ";
		$query= $this->clinical_history->query($sql);
		$this->data['query']=$query;
		$this->data['con_diags']=$con_diags;
		$this->data['list_cie10']=$list_cie10;
		$this->data['current_disease']=$current_disease;
		$this->data['signo_vitales']=$signo_vitales;
		$is_today_saved=$this->clinical_history->select('inserted_time')
		->where("DATE(inserted_time)",date('Y-m-d'))
		->where('id_patient',$historial_id)
		->get('h_c_conclusion_diagno_evolution')->row('inserted_time');
		$this->data['is_today_saved']=date("Y-m-d",strtotime($is_today_saved));
		$this->data['show_evolution']=$this->input->post('origine');
		$this->data['active']='';
		$this->data['show']='';
		$this->data['ident']='-f';
		$this->data['current_disease_id']=$current_disease['id'];
		$this->data['doc_name']=$doc_name;
		$this->data['doc_area_id']=$doc_area;
		$this->data['centro_name']=$centro['name'];
		$this->data['doctor_area']=$doctor_area;
		$this->data['id_patient']=$historial_id;
		
		
		$last_row_med=$this->clinical_history->select("DATE(insert_time)")
		->limit(1)
		->order_by('id_i_m','DESC')
		->get('h_c_indicaciones_medicales')->row("DATE(insert_time)");
		
		 $query=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_medicales WHERE historial_id=$historial_id AND insert_time LIKE '%$last_row_med%'");
		$this->data['querymED']=$query->result();
		
		//------------------------ESTUDIO-------------------------------------------------------------------------------
		
		$last_row_est=$this->clinical_history->select("DATE(insert_time)")
		->limit(1)
		->order_by('id_i_e','DESC')
		->get('h_c_indicaciones_estudio')->row("DATE(insert_time)");
		
		 $queryEST=$this->clinical_history->query("SELECT * FROM h_c_indicaciones_estudio WHERE historial_id=$historial_id AND insert_time LIKE '%$last_row_est%'");
		$this->data['querymEST']=$queryEST->result();
		
		
		//------------------------LABORATORIOS-------------------------------------------------------------------------------
		
		$last_row_lab=$this->clinical_history->select("DATE(insert_time)")
		->limit(1)
		->order_by('id_lab','DESC')
		->get('h_c_indications_labs')->row("DATE(insert_time)");
		
		 $queryLAB=$this->clinical_history->query("SELECT * FROM  h_c_indications_labs WHERE historial_id=$historial_id AND insert_time LIKE '%$last_row_lab%'");
		$this->data['querymLAB']=$queryLAB->result();
		$this->data['is_to_show']=0;
		   $html2 = $this->load->view('clinical-history/resume/form', $this->data, true);
		 //----------------------------------------------------------------------------------- 
       $mpdf->WriteHTML($html1);
	   $mpdf->WriteHTML($html2);
	     $mpdf->Output();
		
	}
	
	
public function general_report($historial_id,$id_es, $ifphoto, $position, $id_centro=0)
    {
		ini_set('memory_limit', '1024M');
		if($id_centro==0){
			echo 'Disculpa por la molestia. Contacta el administrador para ver esa impresión.';
		}else{
		
		
		$userInfo=$this->clinical_history->select('inserted_by as operator, inserted_time as insert_time')->where('id',$id_es)->get('hc_cirugia_reporte')->row_array();
		
		$this->indicationHeader($historial_id, 'hc_cirugia_reporte', $id_centro, $ifphoto, $userInfo);
	
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
		$mpdf->tabSpaces = 3;
        $this->data['mpdf'] = $mpdf;
        $this->data['id_historial'] = $historial_id;
       
        $cirugia_toracico = $this->clinical_history->query("SELECT * FROM  hc_cirugia_reporte WHERE id=$id_es");
		$this->data['cirugia_toracico'] = $cirugia_toracico;
		 foreach($cirugia_toracico->result()as $rowdef)
		 $this->data['title'] = "$rowdef->reporte";
         $html1 = $this->load->view('print-page/header1', $this->data, true);
       $html2 = $this ->load->view('print-page/clinical-history/general-report/index', $this->data, true);
        $mpdf->WriteHTML($html1);
        $mpdf->WriteHTML($html2);
        $mpdf->Output();
		}
    }
	
	
	
	  public function medical_order($user_id,$patient_id,$id_sala)
    {
        ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
        $fechaImp = "impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
       
        $this->data['patient_id'] = $patient_id;
        $this->data['user_id'] = $user_id;
        $this->data['id_doc'] = $user_id;
     
        $doc = $this
            ->db
            ->select('name,exequatur')
            ->where('id_user', $user_id)->get('users')
            ->row_array();
        $this->data['doctor'] = $doc['name'];
        $this->data['exequatur'] = $doc['exequatur'];
        $this->data['id_historial'] = $patient_id;
        $this->data['updated_by'] = '';
        $this->data['date_modif'] = '';
        $this->data['doc_ingo'] = '';
        if ($id_sala == 0)
        {
            $sala = $this
                ->clinical_history
                ->select('id')
                ->where("inserted_by", $user_id)->where("id_historial", $patient_id)->order_by('id', 'desc')
                ->limit(1)
                ->get('orden_medica_sala')
                ->row('id');
        }
        else
        {
            $sala = $id_sala;
        }
        $this->data['id_sala'] = $sala;
        $paciente = $this
            ->db
            ->select('id_p_a,photo,ced1,ced2,ced3,cedula')
            ->where('id_p_a', $patient_id)->get('patients_appointments')
            ->row_array();
			
       	$array_values_for_photo = array(
			'id_p_a' => $paciente['id_p_a'],
			'cedula' => $paciente['cedula'],
			'image_class' => "rounded-circle",
			'style' => 'width=60'

		);
		$imgpat= $this->search_patient_photo->search_patient($array_values_for_photo);	 
          $this->data['title'] = "ORDEN MEDICA";
        $this->data['display'] = "<td style='width:40px'>$imgpat</td>";
        $sql2 = "SELECT * FROM orden_medica_estudios where id_sala=$sala";
        $this->data['estudios'] = $this
            ->clinical_history
            ->query($sql2);
        $sql3 = "SELECT * FROM orden_medcia_lab where id_sala=$sala";
        $this->data['lab'] = $this
            ->clinical_history
            ->query($sql3);
        $sql4 = "SELECT * FROM ord_med_med_gen where id_sala=$sala";
        $this->data['med_med_gen'] = $this
            ->clinical_history
            ->query($sql4);
        $sql1 = "SELECT * FROM orden_medica_recetas where id_sala=$sala";
        $this->data['recetas'] = $this
            ->clinical_history
            ->query($sql1);
        $this->data['orden_medica_recetas'] = "orden_medica_recetas";
        $this->data['ord_med_gen'] = "ord_med_med_gen";
        $this->data['orden_medcia_lab'] = "orden_medcia_lab";
        $this->data['orden_medica_estudios'] = "orden_medica_estudios";
        $this->data['orden_medica_sala'] = "orden_medica_sala";
        $html2 = $this
            ->load
            ->view('print-page/clinical-history/medical-order/index', $this->data, true);
        $mpdf->WriteHTML($html2);
        $mpdf->Output();
    }
	
	


public function print_quirurgica($historial_id,$id_es, $ifphoto, $id_centro)
    {
		ini_set('memory_limit', '1024M');
		$userInfo=$this->clinical_history->select('inserted_by as operator, inserted_time as insert_time')->where('id',$id_es)->get('hc_quirurgica')->row_array();
		
		$this->indicationHeader($historial_id, 'hc_quirurgica', $id_centro, $ifphoto, $userInfo);
	
       
           $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        
        $this->data['mpdf'] = $mpdf;
        $this->data['id_historial'] = $historial_id;
        $fechaImp = "impresión " . date('d-m-Y h:i:s');
       // $mpdf->SetHeader($fechaImp);
        $cirugia_toracico = $this->clinical_history->query("SELECT * FROM  hc_quirurgica WHERE id=$id_es");
		$this->data['cirugia_toracico'] = $cirugia_toracico;
		      $this->data['title'] = "DESCRIPCION QUIRURGICA";
         $html1 = $this->load->view('print-page/header2', $this->data, true);
       $html2 = $this ->load->view('print-page/clinical-history/quirugica/index', $this->data, true);
        $mpdf->WriteHTML($html1);
        $mpdf->WriteHTML($html2);
        $mpdf->Output();
    }





public function eva_cardio($historial_id,$id_card, $ifphoto, $id_centro)
    {
		ini_set('memory_limit', '1024M');
		$userInfo=$this->clinical_history->select('inserted_by as operator, inserted_time as insert_time')->where('id',$id_card)->get('eva_car_patient')->row_array();
		
		$this->indicationHeader($historial_id, 'eva_car_patient', $id_centro, $ifphoto, $userInfo);
	   $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        
        $this->data['mpdf'] = $mpdf;
        $this->data['id_historial'] = $historial_id;
        $fechaImp = "impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
     
	 
	  //----ANTECEDENTES----------------------------
			 
				$query_ant_p_f = $this->clinical_history->query("SELECT * FROM   eva_car_marque_positivo WHERE  eva_cardio=$id_card");

				$this->data['query_ant_p_f'] = $query_ant_p_f;
			 //-----------------------HBITOS TOXICOS-------------------------------------
			 
			 $query_toxic_habits = $this->clinical_history->query("SELECT * FROM   eva_car_habitos_toxicos WHERE  eva_cardio=$id_card");

				$this->data['query_toxic_habits'] = $query_toxic_habits;
				
			 //--------------------SIGNOS VITALES------------------------------
			 $signos = $this->clinical_history->select('*')->where('eva_cardio', $id_card)->get('eva_car_signo_vitales')->row_array();
			 
			 $this->data['signos'] = $signos;
			
			  $signos_vitales_by_id_result = $this->clinical_history->query("SELECT * from  eva_car_signos_vitales_results WHERE eva_cardio=$id_card");
			
			 $this->data['signos_vitales_by_id_result']=$signos_vitales_by_id_result->result();
			 //--------------EXAMEN FISICO-------------------------------
			 $query_ex_uro=$this->clinical_history->query("SELECT * FROM  eva_car_examen_fisico WHERE eva_cardio=$id_card");
	       $this->data['query_ex_fis']= $query_ex_uro->result();
		   
		   //-------------------RESULTADO EXAMEN-------------------------
		   
		    $query_ex_rst=$this->clinical_history->query("SELECT * FROM  eva_car_resultado_exam WHERE eva_cardio=$id_card");
	       $this->data['query_ex_rst']= $query_ex_rst->result();
	 
	 
	 
		 $this->data['title'] = "EVALUACION CARDIOVASCULAR";
         $html1 = $this->load->view('print-page/header2', $this->data, true);
       $html2 = $this ->load->view('print-page/clinical-history/eva_cardio/index', $this->data, true);
        $mpdf->WriteHTML($html1);
        $mpdf->WriteHTML($html2);
        $mpdf->Output();
    }











	   public function printNcf()
    {
        
		$medico=$this->input->get('medico-ncf');
		$date1=$this->input->get('desde-ncf');
		$date2=$this->input->get('hasta-ncf');
		
		
		ini_set('memory_limit', '1024M');
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $mpdf->setFooter('{PAGENO}');
       
       
        $condition = "CAST(fecha AS DATE) between " . "'" . $date1 . "'" . " AND " . "'" . $date2 . "'";
        $sql = "SELECT ncf_id,value, seguro_medico,medico, fecha, sum(totpagseg) as t2 FROM invoice_ars_claims
JOIN ncf ON invoice_ars_claims.ncf_id=ncf.id_ncf
WHERE $condition && medico=$medico && value !='' group by value ORDER BY fecha DESC";
        $this->data['query'] = $this
            ->db
            ->query($sql);
        $this->data['from'] = $date1;
        $this->data['to'] = $date2;
        $this->data['medico'] = $medico;
        $html = $this
            ->load
            ->view('admin/print/ncf_reporte', $this->data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
	
	
	
	
	
	public function refraction($historial_id,$id_es, $ifphoto, $position, $id_centro)
    {
		ini_set('memory_limit', '1024M');
		$userInfo=$this->clinical_history->select('inserted_by as operator, inserted_time as insert_time')->where('id',$id_es)->get('h_c_of_refracion')->row_array();
		
		$this->indicationHeader($historial_id, 'h_c_of_refracion', $id_centro, $ifphoto, $userInfo);
	
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
        $this->data['id_historial'] = $historial_id;
       
        $refraction_sql = $this->clinical_history->query("SELECT * FROM  h_c_of_refracion WHERE id=$id_es");
		$this->data['show_oft'] = $refraction_sql->result();
		  $this->data['title'] = "REFRACCION";
		  $html1 = $this->load->view('print-page/header1', $this->data, true);
       $html2 = $this ->load->view('print-page/refraction/index', $this->data, true);
        $mpdf->WriteHTML($html1);
        $mpdf->WriteHTML($html2);
        $mpdf->Output();
    }
	
	
	
	
	
	
	 public function print_presupuesto($id, $idPat, $foto, $pos, $originFac, $centroTimbrado)
    {
       ini_set('memory_limit', '1024M'); 
        if (empty($id))
        {
            redirect('/page404');
        }
		
		$userInfo=$this->clinical_history->select('user as operator, time_created as insert_time')->where('autoNomber',$id)->get('h_c_procedimiento_tarif')->row_array();
		
		$this->indicationHeader($idPat, 'h_c_procedimiento_tarif', $centroTimbrado, $foto, $userInfo);
        if ($pos == 'v')
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
        $fechaImp = "fecha de impresión " . date('d-m-Y h:i A');
        $mpdf->SetHeader($fechaImp);
        
         $this->data['title'] = "PRESUPUESTO";
        $this->data['id'] = $id;
       $html1 = $this->load->view('print-page/header1', $this->data, true);
       $html2 = $this->load->view('print-page/presupuesto/index', $this->data, true);
        $mpdf->WriteHTML($html1);
      $mpdf->WriteHTML($html2);
        $mpdf->Output();
    }
	
	
}