<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invoice_ars_report_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_general');
		$this->load->model('model_admin');
		$this->load->library('search_patient_photo');
		$this->ID_USER=$this->session->userdata('user_id');
		$this->PERFIL=$this->session->userdata('user_perfil');
		$this->load->library("header_user");
		$this->admin_position_centro=$this->session->userdata('admin_position_centro');
		if ($this->session->userdata('is_logged_in') == '') {
			$this->session->set_flashdata('msg', 'Please Login to Continue');
			redirect('login');
		}
		
	}
 function get_fac_ars1()
    {
        
        $desde = $this
            ->input
            ->get('desde');
        $hasta = $this
            ->input
            ->get('hasta');
        $areas = $this
            ->input
            ->get('areas');
        $medico = $this
            ->input
            ->get('medico');
        $centro = $this
            ->input
            ->get('centro');
        $patient = $this
            ->input
            ->get('patient');
        $checktype = $this
            ->input
            ->get('checktype');
        if ($patient != "")
        {
            $data['patient'] = $patient;
        }
        else
        {
            $data['patient'] = 0;
        }

        if($centro==""){
          $search_centro_medico="";
          $search_center_id="";
        }else{
        $search_centro_medico="AND centro_medico= $centro";
        $search_center_id="AND center_id= $centro";
        }

        $seguro_medico = $this
            ->input
            ->get('ars');
        $data['desde'] = $desde;
        $data['hasta'] = $hasta;
        $data['area'] = $areas;
        $data['centro'] = $centro;
        $data['seguro_medico'] = $seguro_medico;
      if ($checktype == 'privado')
        {
            if ($patient == "" && $areas == "" && $medico != "")
            {
                $data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND  seguro_medico= $seguro_medico  $search_centro_medico AND medico=$medico";
                $data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "'  $search_center_id AND medico=$medico AND seguro_medico=$seguro_medico";
            }
            elseif ($patient == "" && $areas != "" && $medico != "")
            {
                $data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' $search_centro_medico AND seguro_medico= $seguro_medico AND area=$areas AND  medico=$medico";
                $data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' $search_center_id AND area_id=$areas AND seguro_medico=$seguro_medico AND  medico=$medico";
            }
            else
            {
                $data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' $search_centro_medico AND seguro_medico= $seguro_medico AND medico=$medico AND paciente = $patient";
                $data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' $search_center_id AND seguro_medico=$seguro_medico AND medico=$medico AND paciente = $patient";
            }
        }
        else
        {
            $data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND seguro_medico=$seguro_medico $search_centro_medico";
            $data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "' AND seguro_medico=$seguro_medico $search_center_id";
        }
       
        $this
            ->load
            ->view('factura-con-ncf/show-report', $data);
    }
	
	
	
	/* function saveInvoiceArsClaim()
    {
        $fecha = $this
            ->input
            ->post('fecha');
        $nota = $this
            ->input
            ->post('nota');
        $ncf = $this
            ->input
            ->post('ncf');
        $paciente = $this
            ->input
            ->post('paciente');
        $num_af = $this
            ->input
            ->post('num_af');
        $numauto = $this
            ->input
            ->post('numauto');
        $tsubtotal = $this
            ->input
            ->post('tsubtotal');
        $totpagseg = $this
            ->input
            ->post('totpagseg');
        $totpagpa = $this
            ->input
            ->post('totpagpa');
        $medico = $this
            ->input
            ->post('medico');
        $area = $this
            ->input
            ->post('area');
        $centro = $this
            ->input
            ->post('centro');
        $servicio = $this
            ->input
            ->post('servicio');
        $codigoprestado = $this
            ->input
            ->post('codigoprestado');
        $rnc = $this
            ->input
            ->post('rnc');
        $seguro_medico = $this
            ->input
            ->post('seguro_medico');
        $idfacc = $this
            ->input
            ->post('idfacc');
        $idfac2 = $this
            ->input
            ->post('idfac2');
        $time = date("Y-m-d H:i:s");
        $data = array(
            'value' => $this->input->post('ncf'),
			'vec_fec' => $this->input->post('vencimientoFecha'),
            'nota' => $this->input->post('nota')
        );
        $id_ncf = $this->model_admin->ncf($data);
		
		

	$arrayData =  array(); 		
	for ($i = 0; $i < count($fecha); ++$i ) {
	 $f = $fecha[$i];
            $ar = $area[$i];
            $cent = $centro[$i];
            $pa = $paciente[$i];
            $nf = $num_af[$i];
            $na = $numauto[$i];
            $ts = $tsubtotal[$i];
            $tp = $totpagseg[$i];
            $tpg = $totpagpa[$i];
            $med = $medico[$i];
            $serv = $servicio[$i];
            $cod = $codigoprestado[$i];
            $rn = $rnc[$i];
            $sm = $seguro_medico[$i];
            $if = $idfacc[$i];
            $if2 = $idfac2[$i];
	$arrayData[] = array(
	            'fecha' => $f,
                'paciente' => $pa,
                'num_af' => $nf,
                'numauto' => $na,
                'tsubtotal' => $ts,
                'totpagseg' => $tp,
                'totpagpa' => $tpg,
                'medico' => $med,
                'center_id' => $cent,
                'area_id' => $ar,
                'servicio' => $serv,
                'codigoprestado' => $cod,
                'rnc' => $rn,
                'seguro_medico' => $sm,
                'inserted_by' => $this->ID_USER,
                'updated_by' => $this->ID_USER,
                'inserted_time' => $time,
                'updated_date' => $time,
                'ncf_id' => $id_ncf,
                'id_fac2' => $if,
                'id_f' => $if2 
	); 
	}
	$this->db->insert_batch('invoice_ars_claims', $arrayData);

  $this->session->set_userdata('id_ncf', $id_ncf);
       
        $this->session->set_userdata('desde', $this->input->post('desde'));
        $this->session->set_userdata('hasta', $this->input->post('hasta'));
        $this ->session->set_userdata('id_patient', $this->input->post('id_patient'));
    }*/
	
	
	 function saveInvoiceArsClaim()
    {
		if($this->input->post('ncf')=="" || $this->input->post('vencimientoFecha')==""){
	        $response['status'] = 0;
				$response['message'] = "<p class='alert alert-danger'>Numero Comprobante Fiscal y Vecimiento Secuencia son obligatorios!</p>";
		} else{
        $id_fact_save = $this->input->post('id_fac');
       $data = array(
            'value' => $this->input->post('ncf'),
			'vec_fec' => $this->input->post('vencimientoFecha'),
            'nota' => $this->input->post('nota')
        );
        $id_ncf = $this->model_admin->ncf($data);
		
		 $this->session->set_userdata('id_ncf', $id_ncf);
       
        $this->session->set_userdata('desde', $this->input->post('desde'));
        $this->session->set_userdata('hasta', $this->input->post('hasta'));
 
		
		$action_time = date("Y-m-d H:i:s");
	     foreach ($id_fact_save as $key => $val) {
            $arrayData[] = array(
               'idfac' => $id_fact_save[$key],
               'is_checked_ars_claim' => 1,
               'fecha_ars_claimed' => $action_time,
             'ars_claimed_created_by'=>$this->ID_USER               
            );
         }         
         $this->db->update_batch('factura', $arrayData, 'idfac'); 
	
	$query= $this->db->query("SELECT * FROM factura WHERE ars_claimed_created_by =$this->ID_USER AND is_checked_ars_claim=1 AND fecha_ars_claimed='$action_time'");	
$arrayBatch =  array(); 
foreach ($query->result() as $row) {
	 $facTable=$this->db->select('num_af, numauto, rnc, codigoprestado')->where('idfacc',$row->id2)
	 ->get('factura2')->row_array();
$arrayBatch[] = array(
	             'fecha' => $row->filter,
                'paciente' => $row->pat_id,
                'num_af' => $facTable['num_af'],
                'numauto' => $facTable['numauto'],
                'tsubtotal' => $row->subtotal,
                'totpagseg' => $row->totalpaseg,
                'totpagpa' => $row->totpapat,
                'medico' => $row->medico2,
                'center_id' => $row->center_id,
                'area_id' => $row->area_id,
                'servicio' => $row->service,
                'codigoprestado' => $facTable['codigoprestado'],
                'rnc' => $facTable['rnc'],
                'seguro_medico' => $row->seguro,
                'inserted_by' => $this->ID_USER,
                'updated_by' => $this->ID_USER,
                'inserted_time' => $action_time,
                'updated_date' => $action_time,
                'ncf_id' =>   $id_ncf,
                'id_fac2' => $row->idfac,
                'id_f' => $row->id2
	 );  
} 
$this->db->insert_batch('invoice_ars_claims', $arrayBatch);
if ($this->db->affected_rows() > 0) {
				$response['status'] = 1;
				$response['message'] = "<p class='alert alert-success'>Grabado con exito!</p>";
				$response['last_id_ncf'] = $id_ncf;

			} else {
				$response['status'] = -1;
				$response['message'] = "<p class='alert alert-danger'>Grabacion fallo!</p>";
			}
			
	}
	
	echo json_encode($response);
	
    }
	
	
	
	 function invoice_ars_p_v()
    {
       
        $id_ncf = $this
            ->session
            ->userdata['id_ncf'];
    
        $data['desde'] = $this
            ->session
            ->userdata['desde'];
       // $data['id_patient'] = $this
           // ->session
          //  ->userdata['id_patient'];
        $data['hasta'] = $this
            ->session
            ->userdata['hasta'];
        $data['areas'] = $this
            ->model_admin
            ->get_serv_fac2_doc(0);
        $data['area'] = "";
        $data['after_save'] = 1;
        $data['area_id'] = "";
        $data['id_ncf'] = $id_ncf;
        $invoice = $this->model_admin->getNewinvoice($id_ncf);
        $data['invoice'] = $invoice;
        $data['cnt'] = count($invoice);
        $data['nota_ncf'] = $this
            ->model_admin
            ->getNcf($id_ncf);
			
$data['controller'] = $this->session->userdata('USER_CONTROLLER');
$this->header_user->headerMedico($this->ID_USER);
        $this
            ->load
            ->view('factura-con-ncf/redirect-after-save', $data);
    }
	
	
	 function patient_invoice_ncf_old($id_ncf, $desde, $hasta)
    {
       
        $data['desde'] = $desde;
       
        $data['hasta'] = $hasta;
        $data['areas'] = $this
            ->model_admin
            ->get_serv_fac2_doc(0);
        $data['area'] = "";
        $data['after_save'] = 1;
        $data['area_id'] = "";
        $data['id_ncf'] = $id_ncf;
        //$invoice = $this->model_admin->getNewinvoice($id_ncf);
		$invoice =$this->model_admin->print_ars_fac_found($id_ncf, $desde,$hasta);
        $data['invoice'] = $invoice;
        $data['cnt'] = count($invoice);
        $data['nota_ncf'] = $this
            ->model_admin
            ->getNcf($id_ncf);
			
$data['controller'] = $this->session->userdata('USER_CONTROLLER');
$this->header_user->headerMedico($this->ID_USER);
        $this
            ->load
            ->view('factura-con-ncf/redirect-after-save', $data);
    }
	
	
	
	 function patient_invoice_ncf($id_ncf, $desde, $hasta)
    {
       
        $data['desde'] = $desde;
       
        $data['hasta'] = $hasta;
        $data['areas'] = $this
            ->model_admin
            ->get_serv_fac2_doc(0);
        $data['area'] = "";
        $data['after_save'] = 1;
        $data['area_id'] = "";
        $data['id_ncf'] = $id_ncf;
      $condition="invoice_ars_claims.fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta . "'";
	  
	   $sql = "SELECT *
	   FROM  invoice_ars_claims INNER JOIN factura2 ON invoice_ars_claims.id_f = factura2.idfacc
	   WHERE $condition AND ncf_id=$id_ncf  ORDER BY invoice_ars_claims.fecha ASC";
	    $query = $this->db->query($sql);
	
        $data['invoice'] = $query->result();
        $data['cnt'] = $query->num_rows();
        $data['nota_ncf'] = $this
            ->model_admin
            ->getNcf($id_ncf);
			
$data['controller'] = $this->session->userdata('USER_CONTROLLER');
$this->header_user->headerMedico($this->ID_USER);
        $this
            ->load
            ->view('factura-con-ncf/invoice-ncf-report', $data);
    }
	
	
	
	 public function factura_reporte_con_ars() {
        if ($this->PERFIL == "Medico") {
            $data["where_report"] = "where medico=$this->ID_USER";
        } elseif ($this->PERFIL == "Admin") {
            if ($this->admin_position_centro) {
                $data[
                    "where_report"
                ] = "where center_id=$this->admin_position_centro";
            } else {
                $data["where_report"] = "";
            }
        } else {
            $data["where_report"] = "where inserted_by=$this->ID_USER";
        }
        $this->load->view(
            "factura-con-ncf/report-fac-ars",
            $data
        );
    }
	
	
	 function ncfDateRange()
    {
        $id_user = $this->input->post("id_user");
        $sql = "SELECT fecha FROM  invoice_ars_claims WHERE medico=$id_user group by fecha ORDER BY fecha DESC";
        $querysig = $this->db->query($sql);
        echo '<option value="" ></option>';
        foreach ($querysig->result() as $row) {
            $fecha = date("d-m-Y", strtotime($row->fecha));
            echo '<option value="' . $row->fecha . '">' . $fecha . "</option>";
        }
    }
	
	
	public function cancel_ncf(){

$where1 = array(
  'ncf_id'=>$this->input->post('id_ncf')
);

$this->db->where($where1);
$this->db->delete('invoice_ars_claims');
//----------------------------------------------------------
$where2 = array(
  'id_ncf'=>$this->input->post('id_ncf')
);

$this->db->where($where2);
$this->db->delete('ncf');

}
}