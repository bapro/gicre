<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Save_colcoscopy extends CI_Controller {
public function __construct()
{
parent::__construct();

$this->load->library('form_validation'); 
}

function saveFields(){

$insert_date=$this->input->post('in_time');

$up_date=$this->input->post('up_time');
$in_by=$this->input->post('in_by');
$up_by=$this->input->post('up_by');
$id_patient= $this->input->post('id_patient');
$id_centro= $this->input->post('id_centro');
$colcos_data_per_id= $this->input->post('colcos_data_per_id');
$col_is_preg=$this->input->post('col_is_preg');
$col_age_known_sex=$this->input->post('col_age_known_sex');
 $col_last_pap=$this->input->post('col_last_pap');
 $col_ref_motive=$this->input->post('col_ref_motive');
 $col_ac_sat=$this->input->post('col_ac_sat');

$col_local= $this->input->post('col_local');
$col_local1 = (isset($col_local)) ? 1 : 0;

$col_comp_end1= $this->input->post('col_comp_end1');
$col_comp_end11 = (isset($col_comp_end1)) ? 1 : 0;

$col_comp_end2= $this->input->post('col_comp_end2');
$col_comp_end21 = (isset($col_comp_end2)) ? 1 : 0;

$col_finding_no= $this->input->post('col_finding_no');
$col_finding_no1 = (isset($col_finding_no)) ? 1 : 0;

$col_finding_minor_change= $this->input->post('col_finding_minor_change');
$col_finding_minor_change1 = (isset($col_finding_minor_change)) ? 1 : 0;

$col_finding_major_change= $this->input->post('col_finding_major_change');
$col_finding_major_change1 = (isset($col_finding_major_change)) ? 1 : 0;

$col_finding_tenue= $this->input->post('col_finding_tenue');
$col_finding_tenue1 = (isset($col_finding_tenue)) ? 1 : 0;



$col_finding_show_fast= $this->input->post('col_finding_show_fast');
$col_finding_show_fast1 = (isset($col_finding_show_fast)) ? 1 : 0;


$col_finding_dense= $this->input->post('col_finding_dense');
$col_finding_dense1 = (isset($col_finding_dense)) ? 1 : 0;

$col_finding_acet_change= $this->input->post('col_finding_acet_change');
$col_finding_acet_change1 = (isset($col_finding_acet_change)) ? 1 : 0;

$col_finding_image= $this->input->post('col_finding_image');
$col_finding_image1 = (isset($col_finding_image)) ? 1 : 0;

$col_finding_loc_cuad= $this->input->post('col_finding_loc_cuad');
$col_finding_loc_cuad1 = (isset($col_finding_loc_cuad)) ? 1 : 0;

$col_finding_inf_iz= $this->input->post('col_finding_inf_iz');
$col_finding_inf_iz1 = (isset($col_finding_inf_iz)) ? 1 : 0;

$col_finding_inf_der= $this->input->post('col_finding_inf_der');
$col_finding_inf_der1 = (isset($col_finding_inf_der)) ? 1 : 0;

$col_finding_sup_der= $this->input->post('col_finding_sup_der');
$col_finding_sup_der1 = (isset($col_finding_sup_der)) ? 1 : 0;

$col_mos_mos= $this->input->post('col_mos_mos');
$col_mos_mos1 = (isset($col_mos_mos)) ? 1 : 0;

$col_ext1= $this->input->post('col_ext1');
$col_ext11 = (isset($col_ext1)) ? 1 : 0;

$col_ext2 =$this->input->post('col_ext2');
$col_ext21 = (isset($col_ext2)) ? 1 : 0;

$col_ext3=$this->input->post('col_ext3');
$col_ext31 = (isset($col_ext3)) ? 1 : 0;

$col_ext4=$this->input->post('col_ext4');
$col_ext41 = (isset($col_ext4)) ? 1 : 0;

$col_ext_f=$this->input->post('col_ext_f');
$col_ext_f1 = (isset($col_ext_f)) ? 1 : 0;

$col_ext_g=$this->input->post('col_ext_g');
$col_ext_g1 = (isset($col_ext_g)) ? 1 : 0;

$col_vas_at=$this->input->post('col_vas_at');
$col_vas_at1 = (isset($col_vas_at)) ? 1 : 0;

$col_vas_orq=$this->input->post('col_vas_orq');
$col_vas_orq1 = (isset($col_vas_orq)) ? 1 : 0;

$col_vas_s_c=$this->input->post('col_vas_s_c');
$col_vas_s_c1 = (isset($col_vas_s_c)) ? 1 : 0;

$col_vas_sac=$this->input->post('col_vas_sac');
$col_vas_sac1 = (isset($col_vas_sac)) ? 1 : 0;

$col_vas_vad=$this->input->post('col_vas_vad');
$col_vas_vad1 = (isset($col_vas_vad)) ? 1 : 0;

$col_vas_dil=$this->input->post('col_vas_dil');
$col_vas_dil1 = (isset($col_vas_dil)) ? 1 : 0;

$col_sug_ul=$this->input->post('col_sug_ul');
$col_sug_ul1 = (isset($col_sug_ul)) ? 1 : 0;

$col_sug_bor=$this->input->post('col_sug_bor');
$col_sug_bor1 = (isset($col_sug_bor)) ? 1 : 0;

$col_sug_sit=$this->input->post('col_sug_sit');
$col_sug_sit1 = (isset($col_sug_sit)) ? 1 : 0;

$col_sug_pl=$this->input->post('col_sug_pl');
$col_sug_pl1 = (isset($col_sug_pl)) ? 1 : 0;

$col_sug_perf=$this->input->post('col_sug_perf');
$col_sug_perf1 = (isset($col_sug_perf)) ? 1 : 0;

$col_sug_elev=$this->input->post('col_sug_elev');
$col_sug_elev1 = (isset($col_sug_elev)) ? 1 : 0;

$col_sug_reg=$this->input->post('col_sug_reg');
$col_sug_reg1 = (isset($col_sug_reg)) ? 1 : 0;

$col_sug_cent=$this->input->post('col_sug_cent');
$col_sug_cent1 = (isset($col_sug_cent)) ? 1 : 0;

$col_sug_irreg=$this->input->post('col_sug_irreg');
$col_sug_irreg1 = (isset($col_sug_irreg)) ? 1 : 0;

$col_sug_sob=$this->input->post('col_sug_sob');
$col_sug_sob1 = (isset($col_sug_sob)) ? 1 : 0;

$col_iodo_pos=$this->input->post('col_iodo_pos');
$col_iodo_pos1 = (isset($col_iodo_pos)) ? 1 : 0;

$col_iodo_par=$this->input->post('col_iodo_par');
$col_iodo_par1 = (isset($col_iodo_par)) ? 1 : 0;

$col_iodo_neg=$this->input->post('col_iodo_neg');
$col_iodo_neg1 = (isset($col_iodo_neg)) ? 1 : 0;

$col_loc_ant=$this->input->post('col_loc_ant');
$col_loc_ant1 = (isset($col_loc_ant)) ? 1 : 0;

$col_loc_post_cent=$this->input->post('col_loc_post_cent');
$col_loc_post_cent1 = (isset($col_loc_post_cent)) ? 1 : 0;

$col_loc_iz_cent=$this->input->post('col_loc_iz_cent');
$col_loc_iz_cent1 = (isset($col_loc_iz_cent)) ? 1 : 0;

$col_loc_de_cent=$this->input->post('col_loc_de_cent');
$col_loc_de_cent1 = (isset($col_loc_de_cent)) ? 1 : 0;

 $col_mos_fino=$this->input->post('col_mos_fino');
$col_mos_fino1 = (isset($col_mos_fino)) ? 1 : 0;

 $col_mos_grueso=$this->input->post('col_mos_grueso');
$col_mos_grueso1 = (isset($col_mos_grueso)) ? 1 : 0;



$col_taking_bio=$this->input->post('col_taking_bio');
$col_real_leg_end=$this->input->post('col_real_leg_end');

$data= array(
'col_is_preg'=> $col_is_preg,
'col_age_known_sex'=> $col_age_known_sex,
'col_last_pap'=> $col_last_pap,
'col_ref_motive'=> $col_ref_motive,
'col_ac_sat'=> $col_ac_sat,
'col_local'=> $col_local1,
'col_comp_end1'=> $col_comp_end11,
'col_comp_end2'=> $col_comp_end21,
'col_finding_no'=> $col_finding_no1,
'col_finding_minor_change'=> $col_finding_minor_change1,
'col_finding_major_change'=> $col_finding_major_change1,
'col_finding_tenue'=> $col_finding_tenue1,
'col_finding_dense'=> $col_finding_dense1,
'col_finding_acet_change'=> $col_finding_acet_change1,
'col_finding_image'=> $col_finding_image1,
'col_finding_loc_cuad'=> $col_finding_loc_cuad1,
'col_finding_inf_iz'=> $col_finding_inf_iz1,
'col_finding_inf_der'=> $col_finding_inf_der1,
'col_finding_sup_der'=> $col_finding_sup_der1,
'col_mos_mos'=> $col_mos_mos1,
'col_ext1'=>$col_ext11, 
'col_ext2'=>$col_ext21,
'col_ext3'=>$col_ext31,
'col_ext4'=>$col_ext41 ,
'col_ext_f'=>$col_ext_f1,
'col_ext_g'=>$col_ext_g1,
 'col_mos_grueso'=>$col_mos_grueso1,
'col_finding_show_fast'=>$col_finding_show_fast1,
'col_mos_fino'=>$col_mos_fino1,
'col_vas_at'=>$col_vas_at1, 
'col_vas_orq'=>$col_vas_orq1,
'col_vas_s_c'=>$col_vas_s_c1,
'col_vas_sac'=>$col_vas_sac1,
'col_vas_vad'=>$col_vas_vad1 ,
'col_vas_dil'=>$col_vas_dil1 ,
'col_sug_ul'=>$col_sug_ul1,
'col_sug_bor'=>$col_sug_bor1,
'col_sug_sit'=>$col_sug_sit1,
'col_sug_pl'=>$col_sug_pl1,
'col_sug_perf'=>$col_sug_perf1,
'col_sug_elev'=>$col_sug_elev1,
'col_sug_reg'=>$col_sug_reg1,
'col_sug_cent'=>$col_sug_cent1,
'col_sug_irreg'=>$col_sug_irreg1, 
'col_sug_sob'=>$col_sug_sob1,
'col_iodo_pos'=>$col_iodo_pos1,
'col_iodo_par'=>$col_iodo_par1 ,
'col_iodo_neg'=>$col_iodo_neg1,
'col_loc_ant'=>$col_loc_ant1,
'col_loc_post_cent'=>$col_loc_post_cent1,
'col_loc_iz_cent'=>$col_loc_iz_cent1,
'col_loc_de_cent'=>$col_loc_de_cent1,
'col_taking_bio'=>$col_taking_bio,
'col_real_leg_end'=>$col_real_leg_end,
'id_patient'=> $id_patient,
'inserted_by'=> $in_by,
'updated_by'=> $up_by,
'inserted_time'=> $insert_date,
'updated_time'=>$up_date,
'id_centro'=>$id_centro


);

if($colcos_data_per_id==0){
$result=$this->db->insert("h_c_colposcopy_dh",$data);
}else{
  $this->db->where('id', $colcos_data_per_id);
  $result=$this->db->update('h_c_colposcopy_dh', $data);
}

if($result){  
  $response['message'] = "Guardado"; 
  $response['status'] =  0;
  }else{
    $response['message'] = "Fallo"; 
  $response['status'] =  1;
  }


echo json_encode($response);
}






  


}