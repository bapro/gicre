<?php
class Vulvoscopy extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->ID_USER = $this->session->userdata('id_user');
        $this->ID_PATIENT = $this->session->userdata('id_patient');
        $this->ID_CENTRO = $this->session->userdata('id_centro');
		$this->clinical_history = $this->load->database('clinical_history',TRUE);
        $this->load->library("user_register_info");
    }


    public function pagination()
    {
        $sql = "SELECT * FROM h_c_vulvoscopia WHERE id_patient=$this->ID_PATIENT ORDER BY id DESC";
        $query = $this->clinical_history->query($sql);
        $data['num_rows'] = $query->num_rows();
        $data['rows'] = $query;
        $this->load->view('clinical-history/ginecology/vulvoscopy/pagination', $data);
    }


    public function form()
    {
        $this->load->library("user_register_info");
        $page = $this->input->get('page');
        $data['vulvoscopy_data'] = $this->input->get('signo');
        $query_vu = $this->clinical_history->query("SELECT * FROM  h_c_vulvoscopia WHERE id=$page");
        $data['query_vu'] = $query_vu->result();
        $data['id_user'] = $this->ID_USER;
        $data['id_centro'] = $this->ID_CENTRO;
        $data['id_patient'] = $this->ID_PATIENT;
        $this->load->view('clinical-history/ginecology/vulvoscopy/form', $data);
         echo "<script> $('.spinner-border').hide()</script>"; 
    }

    function saveFields()
    {
$insert_date=$this->input->post('in_time');

$up_date=$this->input->post('up_time');
$in_by=$this->input->post('in_by');
$up_by=$this->input->post('up_by');

$id= $this->input->post('id');

$vulvo_color_white= $this->input->post('vulvo_color_white');
$vulvo_color_white1 = (isset($vulvo_color_white)) ? 1 : 0;

$vulvo_color_pig= $this->input->post('vulvo_color_pig');
$vulvo_color_pig1 = (isset($vulvo_color_pig)) ? 1 : 0;

$vulvo_color_red= $this->input->post('vulvo_color_red');
$vulvo_color_red1 = (isset($vulvo_color_red)) ? 1 : 0;

$part_vas_au= $this->input->post('part_vas_au');
$part_vas_au1 = (isset($part_vas_au)) ? 1 : 0;

$part_vas_mos= $this->input->post('part_vas_mos');
$part_vas_mos1 = (isset($part_vas_mos)) ? 1 : 0;

$part_vas_vas= $this->input->post('part_vas_vas');
$part_vas_vas1 = (isset($part_vas_vas)) ? 1 : 0;

$vul_loc_ar_mu= $this->input->post('vul_loc_ar_mu');
$vul_loc_ar_mu1 = (isset($vul_loc_ar_mu)) ? 1 : 0;


$vul_loc_ar_mu= $this->input->post('vul_loc_ar_mu');
$vul_loc_ar_mu1 = (isset($vul_loc_ar_mu)) ? 1 : 0;


$vul_loc_ar_pi= $this->input->post('vul_loc_ar_pi');
$vul_loc_ar_pi1 = (isset($vul_loc_ar_pi)) ? 1 : 0;

$vul_top_uni= $this->input->post('vul_top_uni');
$vul_top_uni1 = (isset($vul_top_uni)) ? 1 : 0;


$part_vas_mot= $this->input->post('part_vas_mot');
$part_vas_mot1 = (isset($part_vas_mot)) ? 1 : 0;


$vul_top_mul= $this->input->post('vul_top_mul');
$vul_top_mul1 = (isset($vul_top_mul)) ? 1 : 0;

$vul_super_sob= $this->input->post('vul_super_sob');
$vul_super_sob1 = (isset($vul_super_sob)) ? 1 : 0;

$vul_super_plena= $this->input->post('vul_super_plena');
$vul_super_plena1 = (isset($vul_super_plena)) ? 1 : 0;

$vul_super_micro= $this->input->post('vul_super_micro');
$vul_super_micro1 = (isset($vul_super_micro)) ? 1 : 0;

$vul_taking_bio= $this->input->post('vul_taking_bio');

$vul_les_prer_1= $this->input->post('vul_les_prer_1');

$vul_les_prer_2= $this->input->post('vul_les_prer_2');


$data= array(
'vulvo_color_white'=> $vulvo_color_white1,
'vulvo_color_pig'=> $vulvo_color_pig1,
'vulvo_color_red'=> $vulvo_color_red1,
'part_vas_au'=> $part_vas_au1,
'part_vas_mos'=> $part_vas_mos1,
'part_vas_vas'=> $part_vas_vas1,
'vul_loc_ar_mu'=> $vul_loc_ar_mu1,
'part_vas_mot'=> $part_vas_mot1,
'vul_loc_ar_pi'=> $vul_loc_ar_pi1,
'vul_top_uni'=> $vul_top_uni1,
'vul_top_mul'=> $vul_top_mul1,
'vul_super_sob'=> $vul_super_sob1,
'vul_super_plena'=> $vul_super_plena1,
'vul_super_micro'=> $vul_super_micro1,
'vul_taking_bio'=> $vul_taking_bio,
'vul_les_prer_1'=> $vul_les_prer_1,
'vul_les_prer_2'=> $vul_les_prer_2,
'id_patient'=> $this->ID_PATIENT,
'inserted_by'=> $in_by,
'updated_by'=> $up_by,
'inserted_time'=> $insert_date,
'updated_time'=>$up_date,
'id_centro'=>$this->ID_CENTRO


);

        if ($id == 0) {
            $result = $this->clinical_history->insert("h_c_vulvoscopia", $data);
            $print = '
                     <a class="btn btn-primary btn-sm m-1"  href="' . base_url() . 'printings/vulvoscopy/' . $this->ID_PATIENT . '/' . $this->ID_USER . '/' . $this->ID_CENTRO . '/r" target="_blank"><i class="fa fa-print"></i> </span> Vert.</a>
                    <a class="btn btn-primary btn-sm m-1"  href="' . base_url() . 'printings/vulvoscopy/' . $this->ID_PATIENT . '/' . $this->ID_USER . '/' . $this->ID_CENTRO . '/r" target="_blank"><i class="fa fa-print" ></i> </span> Horiz.</a>
                     ';
        } else {
            $this->clinical_history->where('id', $id);
            $result = $this->clinical_history->update('h_c_vulvoscopia', $data);
            $print = '';
        }

        if ($result) {
            $response['status'] = 1;
            $response['message'] = $print;
        } else {
            $response['status'] = 0;
            $response['message'] = '<i class="bi bi-check-lg text-danger fs-4"></i>!';
        }


        echo json_encode($response);
    }
}
