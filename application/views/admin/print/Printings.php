<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Printings extends CI_Controller { 
public function __construct()
{
parent::__construct();

$this->load->model('model_admin');
$this->load->model("padron_model");
 $this->load->model('navigation/account_demand_model');

}



public function print_ant_gnrl()
{
	$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
	$historial_id= $this->uri->segment(3);
	$this->data['id_historial']=$historial_id;
$this->data['row_ant']=$this->model_admin->showAnte($historial_id);
$this->data['desa'] = $this->model_admin->showDesarollo($historial_id);
$this->data['AntOtros']=$this->model_admin->GetAntOtros($historial_id);
$this->data['medicamentos'] = $this->model_admin->medicamentos();
$this->data['selectOne']=$this->model_admin->selectOne();
$this->data['selectTwo']=$this->model_admin->selectTwo();

$this->data['HABITOS']=$this->model_admin->GetHabitos($historial_id);
$data['drug']=$this->model_admin->droga();
$this->data['title']="HISTORIAL CLINICA (Antecedented Generales)";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_ant_gnrl',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();


}


public function print_enf_act()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->uri->segment(3);
$this->data['id_historial']=$this->db->select('historial_id')->where('id_enf',$id)->get('h_c_enfermedad')->row('historial_id');
$this->data['print_enf_act'] = $this->model_admin->show_enfermedad($id);
$this->data['title']="ENFERMEDAD ACTUAL";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_enf_act',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();


}



public function print_conc_d()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->uri->segment(3);
$this->data['id_historial']=$this->db->select('historial_id')->where('id_cdia',$id)->get('h_c_conclusion_diagno')->row('historial_id');

$this->data['print_cond'] = $this->model_admin->show_con_by_id($id);

$this->data['title']="CONCLUSION DIAGNOSTIC";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_conc_d',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();


}


public function print_recetas()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);


$historial_id= $this->uri->segment(3);
$this->data['id_historial']=$historial_id;

$this->data['print_recetas'] = $this->model_admin->print_recetas($historial_id);	
$updt = array(
'singular_id'=>0
 );
$this->model_admin->UpdateSingularId($historial_id,$updt);
$this->data['user_id']= $this->uri->segment(4);
$this->data['area_id']= $this->uri->segment(5);
$this->data['title']="RECETAS";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/recetas',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();
}


public function recetas1()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
$historial_id= $this->uri->segment(3);
$this->data['id_historial']=$historial_id;
$this->data['print_recetas'] = $this->model_admin->Recetas1($this->uri->segment(4));
$this->data['user_id']= $this->uri->segment(5);
$this->data['area_id']= $this->uri->segment(6);
$this->data['title']="RECETAS";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/recetas',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();
}






public function print_estudios()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
$historial_id= $this->uri->segment(3);
$this->data['id_historial']=$historial_id;
$this->data['estudios']=$this->model_admin->print_estudio($this->uri->segment(4));
$this->data['title']="ESTUDIOS";
$this->data['area']= $this->uri->segment(5);
$this->data['user_id']= $this->uri->segment(6);
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/estudios',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();

}



public function print_laboratorios()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);

$historial_id= $this->uri->segment(3);

$this->data['id_historial']=$historial_id;
$this->data['area']= $this->uri->segment(4);
$this->data['user_id']= $this->uri->segment(5);
$print = array(
  'historial_id'  => $historial_id,
  'print'=>1
);
$this->data['IndicacionesLab'] = $this->model_admin->Printlaboratorios($print);
//--------------------------------------------------------------------------------------------------
$updt = array(
'printing'=>0
 );
$this->model_admin->updateIndicacionesLab($updt,$historial_id);
//---------------------------------------------------------------------------------------------------
$this->data['title']="LABORATORIOS";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/lab',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();

}




public function print_rehab()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->uri->segment(3);
$this->data['id_historial']=$this->db->select('id_historial')->where('id_rehab',$id)->get('h_c_rehabilitacion')->row('id_historial');
$this->data['showRehabilidad'] = $this->model_admin->showRehabById($id);
$this->data['title']="REHABILITACION";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/rehab',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();


}

public function print_exa_f()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->uri->segment(3);
$this->data['id_historial']=$this->db->select('historial_id')->where('id_sig',$id)->get('h_c_signos_vitales')->row('historial_id');

$this->data['show_signo_by_id'] = $this->model_admin->show_signo_by_id($id);
$this->data['show_neuro'] = $this->model_admin->showNeurologiaById($id);
$this->data['show_examenes_ambas'] = $this->model_admin->showExamAmbasById($id);
$this->data['show_examene_pelv'] = $this->model_admin->showExamPelById($id);
$this->data['title']="EXAMEN FISICO";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_exa_f',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();


}

public function print_exam_sis()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->uri->segment(3);
$this->data['id_historial']=$this->db->select('historial_id')->where('id_exs',$id)->get('h_c_examen_sistema')->row('historial_id');

$this->data['show_examsis_by_id'] = $this->model_admin->show_examsis_by_id($id);

$this->data['title']="EXAMEN SISTEMA";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_exam_sis',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();


}



public function print_ssr()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->uri->segment(3);
$this->data['id_historial']=$this->db->select('hist_id')->where('idssr',$id)->get('h_c_ant_ssr')->row('hist_id');

$this->data['ssr'] = $this->model_admin->data_ssr_by_id($id);

$this->data['title']="ANTECEDENTE S.S.R";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_ssr',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();


}



public function print_ant_obs()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->uri->segment(3);
$this->data['id_historial']=$this->db->select('hist_id')->where('idobs',$id)->get('h_c_ante_obs1')->row('hist_id');
$this->data['obs']=$this->model_admin->getObs($id);
$this->data['obs2']=$this->model_admin->getObs2($id);
$this->data['obs3']=$this->model_admin->getObs3($id);
$this->data['obs4']=$this->model_admin->getObs4($id);
$this->data['title']="ANTECEDENTE OBSTETRICO";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_ant_obs',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();


}


public function print_ant_pedia()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->uri->segment(3);
$id_historial=$this->db->select('hist_id')->where('id',$id)->get('h_c_ant_pedia')->row('hist_id');

$this->data['id_historial']=$id_historial;

$this->data['vacuna'] = $this->model_admin->getVacunaData($id_historial);
$this->data['pediaid'] = $this->model_admin->getPediaId($id);
$this->data['title']="ANTECEDENTE PEDIATRICO";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_ant_pedia',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();
}



public function print_cont_p()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->uri->segment(3);
$id_historial=$this->db->select('historial_id')->where('id_c1',$id)->get('h_c_control_prenatal1')->row('historial_id');

$this->data['id_historial']=$id_historial;

$this->data['showSelectContP1'] = $this->model_admin->showSelectContP1($id);
$this->data['showSelectContP2'] = $this->model_admin->showSelectContP2($id);
$this->data['showSelectContP3'] = $this->model_admin->showSelectContP3($id);
$this->data['showSelectContP4'] = $this->model_admin->showSelectContP4($id);
$this->data['showSelectContP5'] = $this->model_admin->showSelectContP5($id);
$this->data['showSelectContP6'] = $this->model_admin->showSelectContP6($id);
$this->data['showSelectContP7'] = $this->model_admin->showSelectContP7($id);
$this->data['showSelectContP8'] = $this->model_admin->showSelectContP8($id);
$this->data['showSelectContP9'] = $this->model_admin->showSelectContP9($id);

$this->data['title']="CONTROL PRENATAL";
$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_cont_p',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();


}


public function invoice_ars_claim_()
{
	$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
	$last_id=$this->db->select('id_ncf')->order_by('id_ncf','desc')->limit(1)->get('ncf')->row('id_ncf');
    //$last_id=2;
	$this->data['last_id'] =$last_id;
	$this->data['invoice'] = $this->model_admin->getNewinvoice($last_id);
	$this->data['nota_ncf'] = $this->model_admin->getNcf($last_id);
    $html = $this->load->view('admin/print/print_invoice_ars',$this->data,true);
	$mpdf->WriteHTML($html);
    $mpdf->setFooter('{PAGENO}');
    $mpdf->Output();
}



public function print_ars_fac_found()
{
	echo "sfsfdfsd";
	/*$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
	
	$get= array(
		'ncf_id' =>$this->uri->segment(3),
		'desde' =>$this->uri->segment(4),
        'hasta' =>$this->uri->segment(5)
		);
			//$last_id=2;
	$this->data['last_id'] =$this->uri->segment(3);
	$this->data['invoice'] = $this->model_admin->print_ars_fac_found($get);
	$this->data['nota_ncf'] = $this->model_admin->getNcf($this->uri->segment(3));
    $html = $this->load->view('admin/print/print_invoice_ars',$this->data,true);
	$mpdf->WriteHTML($html);
    $mpdf->setFooter('{PAGENO}');
    $mpdf->Output();*/
}

public function medical_insurance_audit_profile_print()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$data = array(
'desde' =>$this->uri->segment(3),
'hasta' =>$this->uri->segment(4),
'medico' =>$this->uri->segment(5)
);
$this->data['desde']=$this->uri->segment(3);
$this->data['hasta']=$this->uri->segment(4);
$this->data['medico']=$this->uri->segment(5);
$this->data['last_id']=$this->db->select('id')->order_by('id','desc')->limit(1)->get('medical_insurance_audit_profile')->row('id');
$results=$this->model_admin->show_patient_arc_report($data);
$this->data['patient_rows']=$results;
$this->data['count']=count($results);
$html = $this->load->view('admin/print/medical_insurance_audit_profile',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->setFooter('{PAGENO}');
$mpdf->Output();
}


}