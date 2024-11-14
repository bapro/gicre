<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Print_page_historia_clinica extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		  $this->clinical_history = $this->load->database('clinical_history',TRUE);
		 $this->ID_USER=$this->session->userdata['user_id'];
		 $this->ID_CENTRO =$this->session->userdata('id_centro');
		 $this->ID_PATIENT = $this->session->userdata('ID_PATIENT');
		    if($this->session->userdata('is_logged_in')=='')
			{
			$this->session->set_flashdata('msg','Please Login to Continue');
			redirect('login/backTologin');
			}
	
		
	}
	
	
		public function headerHist($id_centro, $id_patient, $id_doctor, $print_title){
	
		$this->data['print_title'] = $print_title;
		if($print_title=="CONTROL PRENATAL"){
			$last_period_date=$this->clinical_history->select('fecha_ul_m')->where('inserted_by', $id_doctor)->where('hist_id', $id_patient)->order_by('id', 'desc')->get('h_c_ant_ssr')->row('fecha_ul_m');
		$this->data['last_period_date'] = date("d-m-Y", strtotime($last_period_date));
		}else{
		$this->data['last_period_date'] ='';
		}
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
		   $sello_doc=$this->db->select('sello')->where('doc',$id_doctor)->where('dist',0)->get('doctor_sello')->row('sello');
		$this->data['sello_doc']=$sello_doc;
		$this->data['firma_doc']="$id_doctor-1.png";
		

}
	
	
	
	
	
	public function print_control_prenatal($id, $id_cen)
    {
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $this->data['mpdf'] = $mpdf;
		$this->data['orden_time'] = '';
        $fechaImp = "Fecha de impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
		 $query = $this->clinical_history->query("SELECT * FROM  h_c_control_prenatal WHERE id_registro=$id ORDER BY id ASC");
		  foreach ($query->result() as $row) 
		$this->headerHist($id_cen, $row->historial_id, $row->inserted_by, 'CONTROL PRENATAL');
		$html1 = $this->load->view('print-page/clinical-history/header', $this->data, true);
		$mpdf->WriteHTML($html1);
		$this->data['query'] = $query;
		$html2 = $this->load->view('print-page/clinical-history/control-prenatal/index', $this->data, true);
		$mpdf->WriteHTML($html2);

		$html3 = $this->load->view('print-page/clinical-history/sign-seal', $this->data, true);
		$mpdf->WriteHTML($html3);
		$mpdf->Output();
		}
		
		
		
}		
		
		?>