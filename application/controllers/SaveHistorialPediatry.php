<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaveHistorialPediatry extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_medical_history');
        $this->load->library('form_validation');

 $this->ID_USER =$this->session->userdata('sessionIdUuser');
  $this->ID_CENTRO =$this->session->userdata('id_centro');
  $this->ID_PATIENT =$this->session->userdata('id_patient');
    }
  
    function savePediatria()
    {
		$id=$this->input->post('id_pedia');
      if($this->input->post('text') > 0 || $this->input->post('checkbox')  > 0 || $this->input->post('radio') > 0 ){
                $ale1                  = $this->input->post('ale1');
                $ale                   = (isset($ale1)) ? 1 : 0;
                $hep1                  = $this->input->post('hep1');
                $hep                   = (isset($hep1)) ? 1 : 0;
                $amig1                 = $this->input->post('amig1');
                $amig                  = (isset($amig1)) ? 1 : 0;
                $infv1                 = $this->input->post('infv1');
                $infv                  = (isset($infv1)) ? 1 : 0;
                $asm1                  = $this->input->post('asm1');
                $asm                   = (isset($asm1)) ? 1 : 0;
                $nig1                  = $this->input->post('nig1');
                $nig                   = (isset($nig1)) ? 1 : 0;
                $neum1                 = $this->input->post('neum1');
                $neum                  = (isset($neum1)) ? 1 : 0;
                $nig1                  = $this->input->post('nig1');
                $nig                   = (isset($nig1)) ? 1 : 0;
                $cirug1                = $this->input->post('cirug1');
                $cirug                 = (isset($cirug1)) ? 1 : 0;
                $otot1                 = $this->input->post('otot1');
                $otot                  = (isset($otot1)) ? 1 : 0;
                $deng1                 = $this->input->post('deng1');
                $deng                  = (isset($deng1)) ? 1 : 0;
                $pape1                 = $this->input->post('pape1');
                $pape                  = (isset($pape1)) ? 1 : 0;
                $diar1                 = $this->input->post('diar1');
                $diar                  = (isset($diar1)) ? 1 : 0;
                $paras1                = $this->input->post('paras1');
                $paras                 = (isset($paras1)) ? 1 : 0;
                $zika1                 = $this->input->post('zika1');
                $zika                  = (isset($zika1)) ? 1 : 0;
                $saram1                = $this->input->post('saram1');
                $saram                 = (isset($saram1)) ? 1 : 0;
                $chicun1               = $this->input->post('chicun1');
                $chicun                = (isset($chicun1)) ? 1 : 0;
                $varicela1             = $this->input->post('varicela1');
                $varicela              = (isset($varicela1)) ? 1 : 0;
                $falc1                 = $this->input->post('falc1');
                $falc                  = (isset($falc1)) ? 1 : 0;
                $lactamat1             = $this->input->post('lactamat1');
                $lactamat              = (isset($lactamat1)) ? 1 : 0;
                $leche1                = $this->input->post('leche1');
                $leche                 = (isset($leche1)) ? 1 : 0;
                $editpedia             = $this->input->post('editpedia');
                $save                  = array(
                    'evo' => $this->input->post('evo'),
                    'evol_text' => $this->input->post('evol_text'),
                    'tnaci' => $this->input->post('tnaci'),
                    'describa' => $this->input->post('describa'),
                    'edad_gest' => $this->input->post('edad_gest'),
                    'peso' => $this->input->post('pesopd'),
                    'talla' => $this->input->post('talla'),
                    'lactamat' => $lactamat,
                    'leche' => $leche,
                    'otrosinfo' => $this->input->post('otrosinfo'),
                    'traum_text' => $this->input->post('traum_text'),
                    'trans_text' => $this->input->post('trans_text'),
					 'traum' => $this->input->post('traum'),
					 'trans' => $this->input->post('trans'),
					  'motor1' => $this->input->post('moto_grueso'),
					  'motor2' => $this->input->post('moto_fino'),
					   'motor1_text' => $this->input->post('textgrueso'),
                       'motor2_text' => $this->input->post('textfino'),
                    'ale' => $ale,
                    'hep' => $hep,
                    'amig' => $amig,
                    'infv' => $infv,
                    'asm' => $asm,
                    'neum' => $neum,
                    'cirug' => $cirug,
                    'otot' => $otot,
                    'deng' => $deng,
                    'pape' => $pape,
                    'diar' => $diar,
                    'paras' => $paras,
                    'zika' => $zika,
                    'saram' => $saram,
                    'chicun' => $chicun,
                    'varicela' => $varicela,
                    'falc' => $falc,
                    'otros_t_text' => $this->input->post('otros_t_text'),
					'lenguaje' => $this->input->post('ped_lang'),
                    'lenguaje_text' => $this->input->post('textlenguage'),
                    'social_text' => $this->input->post('textsocial'),
					'social' => $this->input->post('ped_social'),
                    'maltratof' => $this->input->post('textmaltrato'),
                    'abusos' => $this->input->post('textabuso'),
                    'negligencia' => $this->input->post('textneg'),
                    'maltrato' => $this->input->post('maltratoemo'),
                    'inserted_by' => $this->ID_USER,
                    'updated_by' => $this->ID_USER,
                    'hist_id' => $this->ID_PATIENT,
                    'inserted_time' => date('Y-m-d H:i:s'),
                    'updated_time' => date('Y-m-d H:i:s'),
                    'id_user' => $this->ID_USER
                );
				
				if($id == 0){
                $this->model_medical_history->savePedia($save);
               $get_id = $this->db->insert_id();
				}else{
				 $this->db->where('id', $id);
                    $this->db->update('h_c_ant_pedia', $save);
                   // echo '<i class="bi bi-check  text-green" ></i>';
                $get_id = $id;					
				}
               $this->saveVacunation($get_id);
	  }
            }
			
			
			 function saveVacunation($id)
    {
        $nacer_chk1                  = $this->input->post('nacer_chk1');
        $nacer_chk11                   = (isset($nacer_chk1)) ? 1 : 0;

        $nacer_chk2                 = $this->input->post('nacer_chk2');
        $nacer_chk21                  = (isset($nacer_chk2)) ? 1 : 0;

        $mes2_chk1                = $this->input->post('mes2_chk1');
        $mes2_chk11                  = (isset($mes2_chk1)) ? 1 : 0;

        $mes2_chk2                  = $this->input->post('mes2_chk2');
        $mes2_chk21                   = (isset($mes2_chk2)) ? 1 : 0;

        $mes2_chk3                  = $this->input->post('mes2_chk3');
        $mes2_chk31                   = (isset($mes2_chk3)) ? 1 : 0;

        $mes2_chk4                 = $this->input->post('mes2_chk4');
        $mes2_chk41                  = (isset($mes2_chk4)) ? 1 : 0;

        $mes4_chk1                  = $this->input->post('mes4_chk1');
        $mes4_chk11                   = (isset($mes4_chk1)) ? 1 : 0;

        $mes4_chk2                = $this->input->post('mes4_chk2');
        $mes4_chk21                 = (isset($mes4_chk2)) ? 1 : 0;

        $mes4_chk3                 = $this->input->post('mes4_chk3');
        $mes4_chk31                  = (isset($mes4_chk3)) ? 1 : 0;

        $mes4_chk4                 = $this->input->post('mes4_chk4');
        $mes4_chk41                  = (isset($mes4_chk4)) ? 1 : 0;

        $mes6_chk1                 = $this->input->post('mes6_chk1');
        $mes6_chk11                  = (isset($mes6_chk1)) ? 1 : 0;

        $mes6_chk2                 = $this->input->post('mes6_chk2');
        $mes6_chk21                  = (isset($mes6_chk2)) ? 1 : 0;


        $mes12_chk1                = $this->input->post('mes12_chk1');
        $mes12_chk11                 = (isset($mes12_chk1)) ? 1 : 0;



        $mes12_chk2                = $this->input->post('mes12_chk2');
        $mes12_chk21                 = (isset($mes12_chk2)) ? 1 : 0;



        $mes18_chk1                = $this->input->post('mes18_chk1');
        $mes18_chk11                 = (isset($mes18_chk1)) ? 1 : 0;


        $mes18_chk2               = $this->input->post('mes18_chk2');
        $mes18_chk21                = (isset($mes18_chk2)) ? 1 : 0;

        $mes18_chk3             = $this->input->post('mes18_chk3');
        $mes18_chk31              = (isset($mes18_chk3)) ? 1 : 0;

        $year4_chk1                 = $this->input->post('year4_chk1');
        $year4_chk11                  = (isset($year4_chk1)) ? 1 : 0;

        $year4_chk2             = $this->input->post('year4_chk2');
        $year4_chk21              = (isset($year4_chk2)) ? 1 : 0;

        $year9_14_chk1                = $this->input->post('year9_14_chk1');
        $year9_14_chk11                 = (isset($year9_14_chk1)) ? 1 : 0;


        $year9_14_mas_chk1                = $this->input->post('year9_14_mas_chk1');
        $year9_14_mas_chk11                 = (isset($year9_14_mas_chk1)) ? 1 : 0;

        $data = array(
            'nacer_chk1' => $nacer_chk11,
            'nacer_chk2' => $nacer_chk21,
            'mes2_chk1' => $mes2_chk11,
            'mes2_chk2' => $mes2_chk21,
            'mes2_chk3' => $mes2_chk31,
            'mes2_chk4' => $mes2_chk41,
            'mes4_chk1' => $mes4_chk11,
            'mes4_chk2' => $mes4_chk21,
            'mes4_chk3' => $mes4_chk31,
            'mes4_chk4' => $mes4_chk41,
            'mes6_chk1' => $mes6_chk11,
            'mes6_chk2' => $mes6_chk21,
            'mes12_chk1' => $mes12_chk11,
            'mes12_chk2' => $mes12_chk21,
            'mes18_chk1' => $mes18_chk11,
            'mes18_chk2' => $mes18_chk21,
            'mes18_chk3' => $mes18_chk31,
            'year4_chk1' => $year4_chk11,
            'year4_chk2' => $year4_chk21,
            'year9_14_chk1' => $year9_14_chk11,
            'year9_14_mas_chk1' => $year9_14_mas_chk11,
            'nacer_fecha1' => $this->input->post('nacer_fecha1'),
            'nacer_fecha2' => $this->input->post('nacer_fecha2'),
            'mes2_fecha1' => $this->input->post('mes2_fecha1'),
            'mes2_fecha2' => $this->input->post('mes2_fecha2'),
            'mes2_fecha3' => $this->input->post('mes2_fecha3'),
            'mes2_fecha4' => $this->input->post('mes2_fecha4'),
            'mes4_fecha2' => $this->input->post('mes4_fecha2'),
            'mes4_fecha1' => $this->input->post('mes4_fecha1'),
            'mes4_fecha3' => $this->input->post('mes4_fecha3'),
            'mes4_fecha4' => $this->input->post('mes4_fecha4'),
            'mes6_fecha2' => $this->input->post('mes6_fecha2'),
			'mes6_fecha1' => $this->input->post('mes6_fecha1'),
            'mes12_fecha1' => $this->input->post('mes12_fecha1'),

            'mes12_fecha2' => $this->input->post('mes12_fecha2'),
            'mes18_fecha1' => $this->input->post('mes18_fecha1'),

            'mes18_fecha2' => $this->input->post('mes18_fecha2'),
            'mes18_fecha3' => $this->input->post('mes18_fecha3'),
            'year4_fecha1' => $this->input->post('year4_fecha1'),
            'year4_fecha2' => $this->input->post('year4_fecha2'),
            'year9_14_fecha1' => $this->input->post('year9_14_fecha1'),
            'otras_va' => $this->input->post('otras_va'),
            'year9_14_mas_fecha1' => $this->input->post('year9_14_mas_fecha1'),
            'id_pedia' => $id
        );
        if ($id == 0) {
            $result = $this->db->insert('h_c_vacunation_new', $data);
        } else {
            $this->db->where('id_pedia', $id);
             $result = $this->db->update('h_c_vacunation_new', $data);
           
        }
		if($result){
			 echo '<i class="bi bi-check  text-green" ></i>';
		}else{
		 echo '<i class="bi bi-check  text-danger" ></i>';	
		}
    }
     
 
}


