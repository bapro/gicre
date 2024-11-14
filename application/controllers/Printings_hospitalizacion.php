<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Printings_hospitalizacion extends CI_Controller {
public function __construct()
{
parent::__construct();


$this->padron_database = $this->load->database('padron',TRUE);
}


public function farma_interna($id_patient, $id_user)
{
if(empty($this->session->userdata['is_patient_dispatched']) && empty($id_user)){
redirect('/page404');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'A5-L')]);

$this->data['print_user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$this->data['print_time'] = date("d-m-Y H:i:s", strtotime(date("Y-m-d H:i:s")));


$sql4="SELECT id_i_m, medica, cantidad, new_cant, dosis, via, hosp_orden_medica_recetas.updated_time AS med_operator_time,
 hosp_orden_medica_recetas.updated_by AS med_operator
FROM  hosp_orden_medica_recetas WHERE id_i_m  IN (select id_med from dispatched_drug WHERE  id_pat=$id_patient AND drug_id=0 AND printing_now=1) ";
$this->data['query4'] = $this->db->query($sql4);


$sql5="SELECT id, insumo, cantidad, hosp_peticion.updated_time AS insumo_operator_time,
 hosp_peticion.updated_by AS insumo_operator
FROM  hosp_peticion WHERE id IN (select id_med from dispatched_drug WHERE id_pat=$id_patient AND drug_id=1  AND printing_now=1) ";
$this->data['query5'] = $this->db->query($sql5);



$dispatched_drug=$this->db->select('id_hosp_, id_centro_')->where('id_pat',$id_patient)->where('id_centro_ !=',0)->get('dispatched_drug')->row_array();
$this->data['id_hosp']=$dispatched_drug['id_hosp_'];
$this->data['id_m_c']=$dispatched_drug['id_centro_'];

$html1 = $this->load->view('hospitalizacion/centro-stamped',$this->data,TRUE);

 $date_nacer=$this->db->select('date_nacer')->where('id_p_a',$id_patient)->get('patients_appointments')->row('date_nacer');
$this->data['date_nacer']=$date_nacer;
  $this->load->view('getPatientAge');
$this->data['title']="DESPACHO DE MEDICAMENTOS Y INSUMOS";
$html2 = $this->load->view('admin/print/header-print-hospitalizacion',$this->data,TRUE);
$html3 = $this->load->view('admin/print/reception-petition',$this->data,TRUE);
$html4 = $this->load->view('hospitalizacion/footer-info-print',$this->data,TRUE);
$mpdf->WriteHTML($html1);
$mpdf->WriteHTML($html2);
$mpdf->WriteHTML($html3);
$mpdf->WriteHTML($html4);
$mpdf->Output();

}


}