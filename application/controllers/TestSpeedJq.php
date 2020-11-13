<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TestSpeedJq extends CI_Controller {
public function __construct()
{
parent::__construct();

$this->load->model('navigation/account_demand_model');
$this->load->model('model_admin');
$this->load->model('product');
 $this->load->library("pagination");

}

public function index()
{

$data['iduser']=1;
$data['perfil']='admin';
$data['name']='Baptiste Prophete';
$querycentro = $this->account_demand_model->getCentroMedico();
$data['centro_medico']=$querycentro;
$data['countc']=count($querycentro);
$appointments = $this->model_admin->getConfirmSolicitud();
$data['count']=count($appointments);
 

$data['appointments'] = $appointments;
 

$qt=$this->db->select('id_patient')->where('filter_date',date("Y-m-d"))->get('rendez_vous');
$data['num_r']=$qt->num_rows();
$data['area_id']=0;
$data['controller']='admin';
/*$hoy=date("d-m-Y");
$sql = "SELECT * FROM rendez_vous where confirmada=0  && cancelar=0 order by id_apoint desc";
$result = $this->db->query($sql);
$data['result']=$result;*/

$appointments = $this->model_admin->getConfirmSolicitud();
$data['count']=count($appointments);
$this->load->view('test_speed_j',$data);

}


public function paginate_data_cita_hoy(){
$per_page = 10;
if($_GET)
{
 $page= $this->input->get('page');
}
$start = ($page-1)*$per_page;
$hoy=date("d-m-Y");
/*$sql = "SELECT * FROM rendez_vous where confirmada=0  && cancelar=0 order by id_apoint limit $start,$per_page";
$result = $this->db->query($sql);
$data['appointments'] = $result->result();*/
$data['controller']='admin';
$data['perfil']='admin';
$data['iduser']=1;
$appointments = $this->model_admin->getConfirmSolicitud();
$data['total']=count($appointments);
//$data['pageTot'] = $start + 10;
$data['st'] = $start + 1;
$data['appointments'] = $this->product->getConfirmSolicitudTestSpeed($per_page,$start);

$this->load->view('paginate_data_cita_hoy',$data);
}




}