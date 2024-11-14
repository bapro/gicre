<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Factura_reporte_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('model_general');
		$this->load->model('print_page_model');
		  $this->ID_USER=$this->session->userdata('user_id');
		 $this->ADMIN_POSITION_CENTRO = $this->session->userdata('admin_position_centro');
		  $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
	
	
		
	}
	
	
	
 function get_factura_reporte_general() {
        $centro = $this->input->get('centro');
        $doctor = $this->input->get('doctor');
        $desde = $this->input->get('desde');
        $hasta = $this->input->get('hasta');
        $moneda = $this->input->get('moneda');
		
        $query = $this->print_page_model->get_factura_reporte_general($desde,$hasta,$moneda,$doctor, $centro);
		$data['data']=$query->result_array();
		$data['num_rows']=$query->num_rows();
		 $data['desde'] = $desde;
        $data['hasta'] = $hasta;
		$data['centro'] = $centro;
		$data['doctor'] = $doctor;
		$data['moneda'] = $moneda;
		$data['location'] = 1;
       $this->load->view('factura/reporte-de-facturas/report-general-data', $data);
    }
	
 
    function getDateRangeReport() {
		 $centro = $this->input->get('centro');
        $sql = "SELECT * FROM factura  WHERE center_id=$centro  group by filter";
        $query= $this->db->query($sql);
        echo '<option value="" >none</option>';
        foreach ($query->result() as $rf) {
            $date = date("d-m-Y", strtotime($rf->filter));
            echo '<option value="' . $rf->filter. '">' . $date . '</option>';
        }
    }
	
	
	
 
}