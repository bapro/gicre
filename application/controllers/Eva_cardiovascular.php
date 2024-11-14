<?php
    class Eva_cardiovascular extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->ID_PATIENT = $this->session->userdata('id_patient');
            $this->ID_USER = $this->session->userdata('user_id');
            $this->ID_CENTRO = $this->session->userdata('id_centro');
            $this->load->library("user_register_info");
			$this->load->library("get_table_data_by_id");
			$this->load->library("create_forms");
            $this->load->helper('form');
            $this->load->model('model_medical_history');
            $this->load->model('model_signo_vital');
			 $this->clinical_history = $this->load->database('clinical_history',TRUE);
        }

function updatedAllTablesEvaCard($table, $insert_id_table ){
	
$where = array(
'id' => $insert_id_table
);

$data   = array(
'eva_cardio' =>$this->session->userdata('lastIdCarDIns')
);	
	
$this->clinical_history->where($where);
$result = $this->clinical_history->update($table, $data);	
}


function updatedTableEvaCard($update_id){
	
$where = array(
'id' => $update_id
);

$data   = array(
 'updated_time' =>date("Y-m-d H:i:s"),  
 'updated_by' => $this->ID_USER 
);	
	
$this->clinical_history->where($where);
$result = $this->clinical_history->update('eva_car_patient', $data);	
}





        function save_cardio_vas()
        {
             if($this->input->post('id_centro_evaCard') == "") {
               $response['status'] = 2;
                $response['print_btn'] = "";
               $response['message'] = '<i class="text-danger">Seleccione un centro médico</i>';
              
            } else {
                $card_eva_riesgos_me    = $this->input->post('card_eva_riesgos_me');
                $card_eva_riesgos_me1   = (isset($card_eva_riesgos_me)) ? 1 : 0;

                $card_eva_riesgos_ma    = $this->input->post('card_eva_riesgos_ma');
                $card_eva_riesgos_ma1   = (isset($card_eva_riesgos_ma)) ? 1 : 0;

                $card_eva_riesgos_int    = $this->input->post('card_eva_riesgos_int');
                $card_eva_riesgos_int1   = (isset($card_eva_riesgos_int)) ? 1 : 0;
  
                $dataEc               = array(
                    'id_patient' => $this->input->post('id_patient'),
                    'id_user' => $this->ID_USER,
                    'updated_by' => $this->input->post('eva_card_up_by'),
                    'inserted_by' => $this->input->post('eva_card_in_by'),
                    'inserted_time' => $this->input->post('eva_card_in_time'),
                    'updated_time' => $this->input->post('eva_card_up_time'),
                    'card_eva_pre_quir' => $this->input->post('card_eva_pre_quir'),
                    'card_eva_sin_act' => $this->input->post('card_eva_sin_act'),
                    'card_eva_med_act' => $this->input->post('card_eva_med_act'),
                    'card_eva_electrocar' => $this->input->post('card_eva_electrocar'),
                    'card_eva_hiper_art' => $this->input->post('card_eva_hiper_art'),
                    'card_eva_otro' => $this->input->post('card_eva_otro'),
                    'card_eva_riesgos' => $this->input->post('card_eva_riesgos'),
                    'card_eva_diag_obs_rec' => $this->input->post('card_eva_diag_obs_rec'),
                    'card_eva_rad_to' => $this->input->post('card_eva_rad_to'),
                    'card_eva_lab' => $this->input->post('card_eva_lab'),
                    'card_eva_riesgos_me' => $card_eva_riesgos_me1,
                    'card_eva_riesgos_ma' => $card_eva_riesgos_ma1,
                    'card_eva_riesgos_int' => $card_eva_riesgos_int1,
                    'card_eva_riesgos_me_txt' => $this->input->post('card_eva_riesgos_me_txt'),
                    'card_eva_riesgos_ma_txt' => $this->input->post('card_eva_riesgos_ma_txt'),
                    'card_eva_riesgos_int_txt' => $this->input->post('card_eva_riesgos_int_txt'),
                    'id_centro' => $this->input->post("id_centro_evaCard"),
                );
				
				
                if ($this->input->post('id') == 0) {
                    $result = $this->clinical_history->insert("eva_car_patient", $dataEc);
                    $id_cardio_save = $this->clinical_history->insert_id();
					
				 $this->session->set_userdata('lastIdCarDIns', $id_cardio_save);
					
                    $print = '
					
					 <div class="btn-group dropend ">
  
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-printer"></i> <span class="visually-hidden">Toggle Dropdown</span>
  </button>
	 <ul class="dropdown-menu"  >
   <li>
      <a class="dropdown-item">FORMATO VERTICAL</a> 
    </li>
       <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/eva_cardio/'.$this->ID_PATIENT.'/'.$id_cardio_save.'/1/'.$this->input->post("id_centro_evaCard").'" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/eva_cardio/'.$this->ID_PATIENT.'/'.$id_cardio_save.'/0/'.$this->input->post("id_centro_evaCard").'" target="_blank">con la foto</a>
       </li>
       <li>
       <a class="dropdown-item">FORMATO HORIZONTAL</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/eva_cardio/'.$this->ID_PATIENT.'/'.$id_cardio_save.'/1/'.$this->input->post("id_centro_evaCard").'" target="_blank">con la foto</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/eva_cardio/'.$this->ID_PATIENT.'/'.$id_cardio_save.'/0/'.$this->input->post("id_centro_evaCard").'" target="_blank">con la foto</a>
       </li>
  </ul>
  </div>
					
  ';
                } else {
				
                    $where = array(
                        'id' => $this->input->post('id')
                    );
                    $this->clinical_history->where($where);
                    $result = $this->clinical_history->update("eva_car_patient", $dataEc);
                    $print = '';
             
                }
				
				
                if ($result) {
                    $response['status'] = 1;
                    $response['print_btn'] = $print;
                  
                    $response['message'] = '<i class="text-success">Guardado con exito</i>';
					
					
                } else {
                    $response['status'] = 0;
                    $response['print_btn'] = "";
                    $response['message'] = '<i class="text-danger">Grabacion fallo</i>';
                   
                }
           }
            echo json_encode($response);
        }



       function saveAntPerFam(){
		 	//-----------------------------------MARQUE POSITIVO------------------------------------
					
					$check_all       = $this->input->post('check_all');
            $check_all1      = (isset($check_all)) ? 1 : 0;
            $car_nin_check    = $this->input->post('car_nin_check');
            $car_nin_check1   = (isset($car_nin_check)) ? 1 : 0;
            $madre_check      = $this->input->post('madre_check');
            $madre_check1     = (isset($madre_check)) ? 1 : 0;
            $padre_check      = $this->input->post('padre_check');
            $padre_check1     = (isset($padre_check)) ? 1 : 0;
            $car_h_check      = $this->input->post('car_h_check');
            $car_h_check1     = (isset($car_h_check)) ? 1 : 0;
            $car_pe_check     = $this->input->post('car_pe_check');
            $car_pe_check1    = (isset($car_pe_check)) ? 1 : 0;
            $nin_check2       = $this->input->post('nin_check2');
            $nin_check22      = (isset($nin_check2)) ? 1 : 0;
            $madre_check2     = $this->input->post('madre_check2');
            $madre_check22    = (isset($madre_check2)) ? 1 : 0;
            $padre_check2     = $this->input->post('padre_check2');
            $padre_check22    = (isset($padre_check2)) ? 1 : 0;
            $h_check2         = $this->input->post('h_check2');
            $h_check22        = (isset($h_check2)) ? 1 : 0;
            $pe_check2        = $this->input->post('pe_check2');
            $pe_check22       = (isset($pe_check2)) ? 1 : 0;
            $nin_check3       = $this->input->post('nin_check3');
            $nin_check33      = (isset($nin_check3)) ? 1 : 0;
            $madre_check3     = $this->input->post('madre_check3');
            $madre_check33    = (isset($madre_check3)) ? 1 : 0;
            $padre_check3     = $this->input->post('padre_check3');
            $padre_check33    = (isset($padre_check3)) ? 1 : 0;
            $h_check3         = $this->input->post('h_check3');
            $h_check33        = (isset($h_check3)) ? 1 : 0;
            $pe_check3        = $this->input->post('pe_check3');
            $pe_check33       = (isset($pe_check3)) ? 1 : 0;
            $nin_check4       = $this->input->post('nin_check4');
            $nin_check44      = (isset($nin_check4)) ? 1 : 0;
            $madre_check4     = $this->input->post('madre_check4');
            $madre_check44    = (isset($madre_check4)) ? 1 : 0;
            $padre_check4     = $this->input->post('padre_check4');
            $padre_check44    = (isset($padre_check4)) ? 1 : 0;
            $h_check4         = $this->input->post('h_check4');
            $h_check44        = (isset($h_check4)) ? 1 : 0;
            $pe_check4        = $this->input->post('pe_check4');
            $pe_check44       = (isset($pe_check4)) ? 1 : 0;
            $nin_check5       = $this->input->post('nin_check5');
            $nin_check55      = (isset($nin_check5)) ? 1 : 0;
            $madre_check5     = $this->input->post('madre_check5');
            $madre_check55    = (isset($madre_check5)) ? 1 : 0;
            $padre_check5     = $this->input->post('padre_check5');
            $padre_check55    = (isset($padre_check5)) ? 1 : 0;
            $h_check5         = $this->input->post('h_check5');
            $h_check55        = (isset($h_check5)) ? 1 : 0;
            $pe_check5        = $this->input->post('pe_check5');
            $pe_check55       = (isset($pe_check5)) ? 1 : 0;
            $nin_check05      = $this->input->post('nin_check05');
            $nin_check055     = (isset($nin_check05)) ? 1 : 0;
            $madre_check05    = $this->input->post('madre_check05');
            $madre_check055   = (isset($madre_check05)) ? 1 : 0;
            $padre_check05    = $this->input->post('padre_check05');
            $padre_check055   = (isset($padre_check05)) ? 1 : 0;
            $h_check05        = $this->input->post('h_check05');
            $h_check055       = (isset($h_check05)) ? 1 : 0;
            $pe_check05       = $this->input->post('pe_check05');
            $pe_check055      = (isset($pe_check05)) ? 1 : 0;
            $nin_check6       = $this->input->post('nin_check6');
            $nin_check66      = (isset($nin_check6)) ? 1 : 0;
            $madre_check6     = $this->input->post('madre_check6');
            $madre_check66    = (isset($madre_check6)) ? 1 : 0;
            $padre_check6     = $this->input->post('padre_check6');
            $padre_check66    = (isset($padre_check6)) ? 1 : 0;
            $h_check6         = $this->input->post('h_check6');
            $h_check66        = (isset($h_check6)) ? 1 : 0;
            $pe_check6        = $this->input->post('pe_check6');
            $pe_check66       = (isset($pe_check6)) ? 1 : 0;
            $nin_check7       = $this->input->post('nin_check7');
            $nin_check77      = (isset($nin_check7)) ? 1 : 0;
            $madre_check7     = $this->input->post('madre_check7');
            $madre_check77    = (isset($madre_check7)) ? 1 : 0;
            $padre_check7     = $this->input->post('padre_check7');
            $padre_check77    = (isset($padre_check7)) ? 1 : 0;
            $h_check7         = $this->input->post('h_check7');
            $h_check77        = (isset($h_check7)) ? 1 : 0;
            $pe_check7        = $this->input->post('pe_check7');
            $pe_check77       = (isset($pe_check7)) ? 1 : 0;
            $nin_check8       = $this->input->post('nin_check8');
            $nin_check88      = (isset($nin_check8)) ? 1 : 0;
            $madre_check8     = $this->input->post('madre_check8');
            $madre_check88    = (isset($madre_check8)) ? 1 : 0;
            $padre_check8     = $this->input->post('padre_check8');
            $padre_check88    = (isset($padre_check8)) ? 1 : 0;
            $h_check8         = $this->input->post('h_check8');
            $h_check88        = (isset($h_check8)) ? 1 : 0;
            $pe_check8        = $this->input->post('pe_check8');
            $pe_check88       = (isset($pe_check8)) ? 1 : 0;
            $nin_check9       = $this->input->post('nin_check9');
            $nin_check99      = (isset($nin_check9)) ? 1 : 0;
            $madre_check9     = $this->input->post('madre_check9');
            $madre_check99    = (isset($madre_check9)) ? 1 : 0;
            $padre_check9     = $this->input->post('padre_check9');
            $padre_check99    = (isset($padre_check9)) ? 1 : 0;
            $h_check9         = $this->input->post('h_check9');
            $h_check99        = (isset($h_check9)) ? 1 : 0;
            $pe_check9        = $this->input->post('pe_check9');
            $pe_check99       = (isset($pe_check9)) ? 1 : 0;
            $nin_check10      = $this->input->post('nin_check10');
            $nin_check1010    = (isset($nin_check10)) ? 1 : 0;
            $madre_check10    = $this->input->post('madre_check10');
            $madre_check1010  = (isset($madre_check10)) ? 1 : 0;
            $padre_check10    = $this->input->post('padre_check10');
            $padre_check1010  = (isset($padre_check10)) ? 1 : 0;
            $h_check10        = $this->input->post('h_check10');
            $h_check1010      = (isset($h_check10)) ? 1 : 0;
            $pe_check10       = $this->input->post('pe_check10');
            $pe_check1010     = (isset($pe_check10)) ? 1 : 0;
            $nin_check11      = $this->input->post('nin_check11');
            $nin_check1111    = (isset($nin_check11)) ? 1 : 0;
            $madre_check11    = $this->input->post('madre_check11');
            $madre_check1111  = (isset($madre_check11)) ? 1 : 0;
            $padre_check11    = $this->input->post('padre_check11');
            $padre_check1111  = (isset($padre_check11)) ? 1 : 0;
            $h_check11        = $this->input->post('h_check11');
            $h_check1111      = (isset($h_check11)) ? 1 : 0;
            $pe_check11       = $this->input->post('pe_check11');
            $pe_check1111     = (isset($pe_check11)) ? 1 : 0;
            $neop_check12     = $this->input->post('neop_check12');
            $neop_check1212   = (isset($neop_check12)) ? 1 : 0;
            $madre_check12    = $this->input->post('madre_check12');
            $madre_check1212  = (isset($madre_check12)) ? 1 : 0;
            $padre_check12    = $this->input->post('padre_check12');
            $padre_check1212  = (isset($padre_check12)) ? 1 : 0;
            $h_check12        = $this->input->post('h_check12');
            $h_check1212      = (isset($h_check12)) ? 1 : 0;
            $pe_check12       = $this->input->post('pe_check12');
            $pe_check1212     = (isset($pe_check12)) ? 1 : 0;
            $psi_check13      = $this->input->post('psi_check13');
            $psi_check1313    = (isset($psi_check13)) ? 1 : 0;
            $madre_check13    = $this->input->post('madre_check13');
            $madre_check1313  = (isset($madre_check13)) ? 1 : 0;
            $padre_check13    = $this->input->post('padre_check13');
            $padre_check1313  = (isset($padre_check13)) ? 1 : 0;
            $h_check13        = $this->input->post('h_check13');
            $h_check1313      = (isset($h_check13)) ? 1 : 0;
            $pe_check13       = $this->input->post('pe_check13');
            $pe_check1313     = (isset($pe_check13)) ? 1 : 0;
            $obs_check14      = $this->input->post('obs_check14');
            $obs_check1414    = (isset($obs_check14)) ? 1 : 0;
            $madre_check14    = $this->input->post('madre_check14');
            $madre_check1414  = (isset($madre_check14)) ? 1 : 0;
            $padre_check14    = $this->input->post('padre_check14');
            $padre_check1414  = (isset($padre_check14)) ? 1 : 0;
            $h_check14        = $this->input->post('h_check14');
            $h_check1414      = (isset($h_check14)) ? 1 : 0;
            $pe_check14       = $this->input->post('pe_check14');
            $pe_check1414     = (isset($pe_check14)) ? 1 : 0;
            $ulp_check15      = $this->input->post('ulp_check15');
            $ulp_check1515    = (isset($ulp_check15)) ? 1 : 0;
            $madre_check15    = $this->input->post('madre_check15');
            $madre_check1515  = (isset($madre_check15)) ? 1 : 0;
            $padre_check15    = $this->input->post('padre_check15');
            $padre_check1515  = (isset($padre_check15)) ? 1 : 0;
            $h_check15        = $this->input->post('h_check15');
            $h_check1515      = (isset($h_check15)) ? 1 : 0;
            $pe_check15       = $this->input->post('pe_check15');
            $pe_check1515     = (isset($pe_check15)) ? 1 : 0;
            $art_check16      = $this->input->post('art_check16');
            $art_check1616    = (isset($art_check16)) ? 1 : 0;
            $madre_check16    = $this->input->post('madre_check16');
            $madre_check1616  = (isset($madre_check16)) ? 1 : 0;
            $padre_check16    = $this->input->post('padre_check16');
            $padre_check1616  = (isset($padre_check16)) ? 1 : 0;
            $h_check16        = $this->input->post('h_check16');
            $h_check1616      = (isset($h_check16)) ? 1 : 0;
            $pe_check16       = $this->input->post('pe_check16');
            $pe_check1616     = (isset($pe_check16)) ? 1 : 0;
            $art_check016     = $this->input->post('art_check016');
            $art_check01616   = (isset($art_check016)) ? 1 : 0;
            $madre_check016   = $this->input->post('madre_check016');
            $madre_check01616 = (isset($madre_check016)) ? 1 : 0;
            $padre_check016   = $this->input->post('padre_check016');
            $padre_check01616 = (isset($padre_check016)) ? 1 : 0;
            $h_check016       = $this->input->post('h_check016');
            $h_check01616     = (isset($h_check016)) ? 1 : 0;
            $pe_check016      = $this->input->post('pe_check016');
            $pe_check01616    = (isset($pe_check016)) ? 1 : 0;
            $zika_check17     = $this->input->post('zika_check17');
            $zika_check1717   = (isset($zika_check17)) ? 1 : 0;
            $madre_check17    = $this->input->post('madre_check17');
            $madre_check1717  = (isset($madre_check17)) ? 1 : 0;
            $padre_check17    = $this->input->post('padre_check17');
            $padre_check1717  = (isset($padre_check17)) ? 1 : 0;
            $h_check17        = $this->input->post('h_check17');
            $h_check1717      = (isset($h_check17)) ? 1 : 0;
            $pe_check17       = $this->input->post('pe_check17');
            $pe_check1717     = (isset($pe_check17)) ? 1 : 0;
			//----------------------------------------------------------
			
$epoc_nin       = $this->input->post('epoc_nin');
$epoc_nin1      = (isset($epoc_nin)) ? 1 : 0;

$epoc_pe       = $this->input->post('epoc_pe');
$epoc_pe1      = (isset($epoc_pe)) ? 1 : 0;



$epoc_p       = $this->input->post('epoc_p');
$epoc_p1      = (isset($epoc_p)) ? 1 : 0;



$epoc_m       = $this->input->post('epoc_m');
$epoc_m1      = (isset($epoc_m)) ? 1 : 0;


$epoc_h       = $this->input->post('epoc_h');
$epoc_h1      = (isset($epoc_h)) ? 1 : 0;


$hta_nin       = $this->input->post('hta_nin');
$hta_nin1      = (isset($hta_nin)) ? 1 : 0;

$hta_pe       = $this->input->post('hta_pe');
$hta_pe1      = (isset($hta_pe)) ? 1 : 0;

$hta_p       = $this->input->post('hta_p');
$hta_p1      = (isset($hta_p)) ? 1 : 0;

$iam_nin       = $this->input->post('iam_nin');
$iam_nin1      = (isset($iam_nin)) ? 1 : 0;

$iam_pe       = $this->input->post('iam_pe');
$iam_pe1      = (isset($iam_pe)) ? 1 : 0;

$iam_p       = $this->input->post('iam_p');
$iam_p1      = (isset($iam_p)) ? 1 : 0;

$iam_m       = $this->input->post('iam_m');
$iam_m1      = (isset($iam_m)) ? 1 : 0;

$iam_h       = $this->input->post('iam_h');
$iam_h1      = (isset($iam_h)) ? 1 : 0;

$hta_m       = $this->input->post('hta_m');
$hta_m1      = (isset($hta_m)) ? 1 : 0;

$angina_pecho_card_nin       = $this->input->post('angina_pecho_card_nin');
$angina_pecho_card_nin1      = (isset($angina_pecho_card_nin)) ? 1 : 0;

$angina_pecho_card_pe       = $this->input->post('angina_pecho_card_pe');
$angina_pecho_card_pe1      = (isset($angina_pecho_card_pe)) ? 1 : 0;

$angina_pecho_card_p       = $this->input->post('angina_pecho_card_p');
$angina_pecho_card_p1      = (isset($angina_pecho_card_p)) ? 1 : 0;

$angina_pecho_card_m       = $this->input->post('angina_pecho_card_m');
$angina_pecho_card_m1      = (isset($angina_pecho_card_m)) ? 1 : 0;

$angina_pecho_card_h       = $this->input->post('angina_pecho_card_h');
$angina_pecho_card_h1      = (isset($angina_pecho_card_h)) ? 1 : 0;

$insuf_card_nin       = $this->input->post('insuf_card_nin');
$insuf_card_nin1      = (isset($insuf_card_nin)) ? 1 : 0;

$insuf_card_pe       = $this->input->post('insuf_card_pe');
$insuf_card_pe1      = (isset($insuf_card_pe)) ? 1 : 0;

$insuf_card_p       = $this->input->post('insuf_card_p');
$insuf_card_p1      = (isset($insuf_card_p)) ? 1 : 0;

$insuf_card_m       = $this->input->post('insuf_card_m');
$insuf_card_m1      = (isset($insuf_card_m)) ? 1 : 0;

$insuf_card_h       = $this->input->post('insuf_card_h');
$insuf_card_h1      = (isset($insuf_card_h)) ? 1 : 0;

$neum_nin       = $this->input->post('neum_nin');
$neum_nin1      = (isset($neum_nin)) ? 1 : 0;
$neum_pe       = $this->input->post('neum_pe');
$neum_pe1      = (isset($neum_pe)) ? 1 : 0;
$neum_p       = $this->input->post('neum_p');
$neum_p1      = (isset($neum_p)) ? 1 : 0;
$neum_m       = $this->input->post('neum_m');
$neum_m1      = (isset($neum_m)) ? 1 : 0;

$neum_h       = $this->input->post('neum_h');
$neum_h1      = (isset($neum_h)) ? 1 : 0;
 $hta_h       = $this->input->post('hta_h');
$hta_h1      = (isset($hta_h)) ? 1 : 0;
$num_text= $this->input->post('num_text');
 $ant_pan_tera= $this->input->post('ant_pan_tera');
$ant_diagnosticos= $this->input->post('ant_diagnosticos');

            $data             = array(
			'ant_diagnosticos'=>$ant_diagnosticos,
			'hta_h'=>$hta_h1,
			'epoc_pe'=>$epoc_pe1,
			'ant_pan_tera'=>$ant_pan_tera,
			'neum_nin'=>$neum_nin1,
			'neum_pe'=>$neum_pe1,
			'neum_p'=>$neum_p1,
			'neum_m'=>$neum_m1,
			'neum_h'=>$neum_h1,
                'todo' => $check_all1,
                'car_nin' => $car_nin_check1,
                'car_m' => $madre_check1,
                'car_p' => $padre_check1,
                'car_h' => $car_h_check1,
                'car_pe' => $car_pe_check1,
                'car_text' => $this->input->post('car_text'),
                'hip_nin' => $nin_check22,
                'hip_m' => $madre_check22,
                'hip_p' => $padre_check22,
                'hip_h' => $h_check22,
                'hip_pe' => $pe_check22,
                'hip_text' => $this->input->post('hip_text'),
                'ec_nin' => $nin_check33,
                'ec_m' => $madre_check33,
                'ec_p' => $padre_check33,
                'ec_h' => $h_check33,
                'ec_pe' => $pe_check33,
                'ec_text' => $this->input->post('ec_text'),
                'ep_nin' => $nin_check44,
                'ep_m' => $madre_check44,
                'ep_p' => $padre_check44,
                'ep_h' => $h_check44,
                'ep_pe' => $pe_check44,
                'ep_text' => $this->input->post('ep_text'),
                'as_nin' => $nin_check55,
                'as_m' => $madre_check55,
                'as_p' => $padre_check55,
                'as_h' => $h_check55,
                'as_pe' => $pe_check55,
                'as_text' => $this->input->post('as_text'),
                'enre_nin' => $nin_check055,
                'enre_m' => $madre_check055,
                'enre_p' => $padre_check055,
                'enre_h' => $h_check055,
                'enre_pe' => $pe_check055,
                'enre_text' => $this->input->post('enre_text'),
                'tub_nin' => $nin_check66,
                'tub_m' => $madre_check66,
                'tub_p' => $padre_check66,
                'tub_h' => $h_check66,
                'tub_pe' => $pe_check66,
                'tub_text' => $this->input->post('tub_text'),
                'dia_nin' => $nin_check77,
                'dia_m' => $madre_check77,
                'dia_p' => $padre_check77,
                'dia_h' => $h_check77,
                'dia_pe' => $pe_check77,
                'dia_text' => $this->input->post('dia_text'),
                'tir_nin' => $nin_check88,
                'tir_m' => $madre_check88,
                'tir_p' => $padre_check88,
                'tir_h' => $h_check88,
                'tir_pe' => $pe_check88,
                'tir_text' => $this->input->post('tir_text'),
                'hep_tipo' => $this->input->post('hep_tipo'),
                'hep_nin' => $nin_check99,
                'hep_m' => $madre_check99,
                'hep_p' => $padre_check99,
                'hep_h' => $h_check99,
                'hep_pe' => $pe_check99,
                'hep_text' => $this->input->post('hep_text'),
                'enfr_nin' => $nin_check1010,
                'enfr_m' => $madre_check1010,
                'enfr_p' => $padre_check1010,
                'enfr_h' => $h_check1010,
                'enfr_pe' => $pe_check1010,
                'enfr_text' => $this->input->post('enfr_text'),
                'falc_nin' => $nin_check1111,
                'falc_m' => $madre_check1111,
                'falc_p' => $padre_check1111,
                'falc_h' => $h_check1111,
                'falc_pe' => $pe_check1111,
                'falc_text' => $this->input->post('falc_text'),
                'neop_nin' => $neop_check1212,
                'neop_m' => $madre_check1212,
                'neop_p' => $padre_check1212,
                'neop_h' => $h_check1212,
                'neop_pe' => $pe_check1212,
                'neop_text' => $this->input->post('neop_text'),
                'psi_nin' => $psi_check1313,
                'psi_m' => $madre_check1313,
                'psi_p' => $padre_check1313,
                'psi_h' => $h_check1313,
                'psi_pe' => $pe_check1313,
                'psi_text' => $this->input->post('psi_text'),
                'obs_nin' => $obs_check1414,
                'obs_m' => $madre_check1414,
                'obs_p' => $padre_check1414,
                'obs_h' => $h_check1414,
                'obs_pe' => $pe_check1414,
                'obs_text' => $this->input->post('obs_text'),
                'ulp_nin' => $ulp_check1515,
                'ulp_m' => $madre_check1515,
                'ulp_p' => $padre_check1515,
                'ulp_h' => $h_check1515,
                'ulp_pe' => $pe_check1515,
                'ulp_text' => $this->input->post('ulp_text'),
                'art_nin' => $art_check1616,
                'art_m' => $madre_check1616,
                'art_p' => $padre_check1616,
                'art_h' => $h_check1616,
                'art_pe' => $pe_check1616,
                'art_text' => $this->input->post('art_text'),
                'hem_nin' => $art_check01616,
                'hem_m' => $madre_check01616,
                'hem_p' => $padre_check01616,
                'hem_h' => $h_check01616,
                'hem_pe' => $pe_check01616,
                'hem_text' => $this->input->post('hem_text'),
                'zika_nin' => $zika_check1717,
                'zika_m' => $madre_check1717,
                'zika_p' => $padre_check1717,
                'zika_h' => $h_check1717,
                'zika_pe' => $pe_check1717,
                'zika_text' => $this->input->post('zika_text'),
                'otros' => $this->input->post('otros'),
                'insuf_card_text'=>$this->input->post('insuf_card_text'),
			   'angina_pecho_card_text'=>$this->input->post('angina_pecho_card_text'),
			   'epoc_text'=>$this->input->post('epoc_text'),
			   'iam_text'=>$this->input->post('iam_text'),
			   'hta_text'=>$this->input->post('hta_text'),
			   'epoc_nin' => $epoc_nin1,
				'epoc_p' => $epoc_p1,
				'epoc_m' => $epoc_m1,
				'epoc_h' => $epoc_h1,
				'hta_nin' => $hta_nin1,
				'hta_pe' => $hta_pe1,
				'hta_p' => $hta_p1,
				'iam_nin' => $iam_nin1,
				'iam_pe' => $iam_pe1,
				'iam_p' => $iam_p1,
				'iam_m' => $iam_m1,
				'iam_h' => $iam_h1,
				'hta_m' => $hta_m1,
				'angina_pecho_card_nin' => $angina_pecho_card_nin1,
				'angina_pecho_card_pe' => $angina_pecho_card_pe1,
				'angina_pecho_card_p' => $angina_pecho_card_p1,
				'angina_pecho_card_m' => $angina_pecho_card_m1,
				'angina_pecho_card_h' => $angina_pecho_card_h1,
				'insuf_card_nin' => $insuf_card_nin1,
				'insuf_card_pe' => $insuf_card_pe1,
				'insuf_card_p' => $insuf_card_p1,
				'insuf_card_m' => $insuf_card_m1,
				'insuf_card_h' => $insuf_card_h1,
				'ant_al_radio'=>$this->input->post('ant_al_radio'),
				'ant_med'=>$this->input->post('ant_med'),
				'ant_especifique'=>$this->input->post('ant_especifique'),
				'ant_quirurgico'=>$this->input->post('ant_quirurgico')
    );
		if($this->input->post('id') ==0){
			 $this->clinical_history->insert("eva_car_marque_positivo", $data);
			 $insert_id_table = $this->clinical_history->insert_id();
			 $this->updatedAllTablesEvaCard('eva_car_marque_positivo', $insert_id_table);
		}else{
       $this->clinical_history->where('eva_cardio', $this->input->post('id'));
           $this->clinical_history->update('eva_car_marque_positivo', $data);
		   $this->updatedTableEvaCard($this->input->post('id'));
		   echo "<i class='bi bi-check-lg'></i>";
		}
					//-----------------------------------------------------------------------  
		   
	   }
     
   function examenFisico()
        {
           	
				$neuro_normal = $this->input->post('neuro_normal');
                  $neuro_normal1 = (isset($neuro_normal)) ? 1 : 0;
				
				$cabeza_normal= $this->input->post('cabeza_normal');
				$cabeza_normal1 = (isset($cabeza_normal)) ? 1 : 0;
				
				$cuello_normal= $this->input->post('cuello_normal');
				$cuello_normal1 = (isset($cuello_normal)) ? 1 : 0;
				
				$abd_inspex_normal= $this->input->post('abd_inspex_normal');
				$abd_inspex_normal1 = (isset($abd_inspex_normal)) ? 1 : 0;
				
				$ext_sup_normal= $this->input->post('ext_sup_normal');
				$ext_sup_normal1 = (isset($ext_sup_normal)) ? 1 : 0;
				
				$ext_infex_normal= $this->input->post('ext_infex_normal');
				$ext_infex_normal1 = (isset($ext_infex_normal)) ? 1 : 0;
				
				$toraxex_normal= $this->input->post('toraxex_normal');
				$toraxex_normal1 = (isset($toraxex_normal)) ? 1 : 0;
				
                $dataExF              = array(
                    'neuro_s' => $this->input->post('neuro_s'),
                    'neuro_text' => $this->input->post('neuro_text'),
                    'cabeza' => $this->input->post('cabeza'),
                    'cabeza_text' => $this->input->post('cabeza_text'),
                    'cuello' => $this->input->post('cuello'),
                    'cuello_text' => $this->input->post('cuello_text'),
                    'abd_insp' => $this->input->post('abd_insp'),
                    'abd_inspext' => $this->input->post('abd_inspext'),
                    'ext_sup_text' => $this->input->post('ext_sup_text'),
                    'ext_sup' => $this->input->post('ext_sup'),
					'ext_inft'=>$this->input->post('ext_inft'),
                    'torax' => $this->input->post('torax'),
                    'torax_text' => $this->input->post('torax_text'),
					'neuro_normal' => $neuro_normal1,
					'cabeza_normal'=>$cabeza_normal1,
					'cuello_normal' => $cuello_normal1,
					'abd_inspex_normal' => $abd_inspex_normal1,
					'ext_sup_normal' => $ext_sup_normal1,
					'ext_infex_normal' => $ext_infex_normal1,
					'toraxex_normal' => $toraxex_normal1,
                );
                 if ($this->input->post('id') == 0) {
                    $this->clinical_history->insert("eva_car_examen_fisico", $dataExF);
                    $insert_id_table = $this->clinical_history->insert_id();
					 $this->updatedAllTablesEvaCard('eva_car_examen_fisico', $insert_id_table);
                  
                } else {
                    $this->clinical_history->where('eva_cardio', $this->input->post('id'));
                    $this->clinical_history->update('eva_car_examen_fisico', $dataExF);
					$this->updatedTableEvaCard($this->input->post('id'));
		           echo "<i class='bi bi-check-lg'></i>";
                    
                }
                  
               
				
           
        }



 public function saveHabToxico()
        {
            $data    = array(
                'cafe_cant' => $this->input->post('hab_c_caf'),
                'cafe_cant_desc' => $this->input->post('cafe_cant_desc'),
                'cafe_frec' => $this->input->post('hab_f_caf'),
               'alc_can' => $this->input->post('hab_c_al'),
                'alc_frec' => $this->input->post('hab_f_al'),
                'alc_can_desc' => $this->input->post('desc_alco'),
                'tab_can' => $this->input->post('hab_c_tab'),
                'tab_can_desc' => $this->input->post('desc_tab'),
                'hab_t_drug' => $this->input->post('hab_t_drug'),
                'tab_frec' => $this->input->post('hab_f_tab'),
                'hab_c_drug' => $this->input->post('hab_c_drug'),
                'hab_f_drug' => $this->input->post('hab_f_drug'),
                'hab_c_drug_desc' => $this->input->post('desc_drug'),
                'hookah' => $this->input->post('hookah'),
                'hab_f_hookah' => $this->input->post('hab_f_hookah'),
                'hookah_desc' => $this->input->post('desc_hooka'),
				

            );
            if ($this->input->post('id') == 0) {
				
               $this->clinical_history->insert("eva_car_habitos_toxicos", $data);
				$insert_id_table = $this->clinical_history->insert_id();
				 $this->updatedAllTablesEvaCard('eva_car_habitos_toxicos', $insert_id_table);
                echo $this->input->post('hab_c_caf');
            } else {
                $where = array(
                    'eva_cardio' => $this->input->post('id')
                );

                $this->clinical_history->where($where);
                $this->clinical_history->update('eva_car_habitos_toxicos', $data);
				
				$this->updatedTableEvaCard($this->input->post('id'));
		      echo "<i class='bi bi-check-lg'></i>";
				
            }
        }





	public function saveEditExamRstCrdv() {
		
		$id=$this->input->post('id');
			
			$data = array(
                'rx_torax_radio' => $this->input->post('rx_torax_radio'),
                'rx_torax_txt' => $this->input->post('rx_torax_txt'),
                'ekg_radio_radio' => $this->input->post('ekg_radio_radio'),
                'ekg_radio_txt' => $this->input->post('ekg_radio_txt'),
                'otros_hallazgo_radio' => $this->input->post('otros_hallazgo_radio'),
                'otros_hallazgo_txt' => $this->input->post('otros_hallazgo_txt'),
                'especifique' => $this->input->post('especifique'),
                //'utilizo' => $this->input->post('utilizo'),
                'conclusion' => $this->input->post('evcconclusion'),
                'asa' => $this->input->post('asa')
				
            );
			if($this->input->post('id') > 0){
            $this->clinical_history->where('eva_cardio', $this->input->post('id'));
            $result = $this->clinical_history->update('eva_car_resultado_exam', $data);
			$this->updatedTableEvaCard($this->input->post('id'));
			}else{
				$result =$this->clinical_history->insert("eva_car_resultado_exam", $data);
				$insert_id_table = $this->clinical_history->insert_id();
				 $this->updatedAllTablesEvaCard('eva_car_resultado_exam', $insert_id_table);
			}
            if ($result) {
               echo '<i class="bi bi-check-lg text-success fs-4"></i>';
            } else {
              
                echo '<i class="bi bi-check-lg text-danger fs-4"></i>!';
            }
	
		
		
	}




  function saveSignosVitales()
        {
              $id = $this->input->post('id');
                $rowSigVit = array(
                    'peso' => $this->input->post('signo_v_peso_lb'),
                    'kg' => $this->input->post('signo_v_peso_kg'),
                    'talla' => $this->input->post('signo_v_talla'),
                    'imc' => $this->input->post('signo_v_talla_imc'),
                    'talla_imc' => $this->input->post('signo_v_talla_m'),
                    'ta' => $this->input->post('signo_v_ta_mm'),
                    'fr' => $this->input->post('signo_v_fr'),
                    'fc' => $this->input->post('signo_v_fc'),
                    'hg' => $this->input->post('signo_v_ta_hg'),
                    'tempo' => $this->input->post('signo_v_temp'),
                    'pulso' => $this->input->post('signo_v_pulso'),
                    'glicemia' => $this->input->post('signo_v_glicemia'),
                    'radio' => $this->input->post('signo_v_aspecto_general'),
                    'signo_v_per_cef' => $this->input->post('signo_v_per_cef'),
                    'signo_v_sat_ox' => $this->input->post('signo_v_sat_ox'),
                
                );


                if ($this->input->post('id') == 0) {

                    $this->clinical_history->insert('eva_car_signo_vitales', $rowSigVit);
                     $insert_id_table = $this->clinical_history->insert_id();
			      $this->updatedAllTablesEvaCard('eva_car_signo_vitales', $insert_id_table);
					
					   $rowSigVitRslt = array(
                        'fr' => $this->input->post('signo_fr_result'),
                        'fc' => $this->input->post('signo_fc_result'),
                        'ft' => $this->input->post('signo_temp_result'),
                        'sist' => $this->input->post('tens_art_sis_result'),
                        'diast' => $this->input->post('tens_art_dias_result'),
                        'glicemia' => $this->input->post('glicemia_rslt'),
                        'id_sig' => $insert_id_table
                      
                    );
                    $this->clinical_history->insert('eva_car_signos_vitales_results', $rowSigVitRslt);
					 $insert_id_table2 = $this->clinical_history->insert_id();
					$this->updatedAllTablesEvaCard('eva_car_signos_vitales_results', $insert_id_table2);
                } else {
                    $this->clinical_history->where('eva_cardio', $id);
                    $this->clinical_history->update('eva_car_signo_vitales', $rowSigVit);
                    $row = array(
                        'fr' => $this->input->post('signo_fr_result'),
                        'fc' => $this->input->post('signo_fc_result'),
                        'ft' => $this->input->post('signo_temp_result'),
                        'sist' => $this->input->post('tens_art_sis_result'),
                        'diast' => $this->input->post('tens_art_dias_result'),
                        'glicemia' => $this->input->post('glicemia_rslt')
                    );
                    $this->clinical_history->where('eva_cardio', $id);
                    $this->clinical_history->update('eva_car_signos_vitales_results', $row);
                     $this->updatedTableEvaCard($id);
		            echo "<i class='bi bi-check-lg'></i>";
                }
           
        }






//--------------------------------------------------------------------------------------------------




        public function pagination()
        {
            $sql = "SELECT * FROM eva_car_patient WHERE id_patient=$this->ID_PATIENT ORDER BY id DESC";
            $query = $this->clinical_history->query($sql);
            $data['num_rows'] = $query->num_rows();
            $data['rows'] = $query;
            $this->load->view('clinical-history/cardiovascular-evaluation/pagination', $data);
        }

        public function form()
        {

            $page = $this->input->get('page');

            $data['id_patient'] = $this->ID_PATIENT;
            $data['id_user'] = $this->ID_USER;
            $data['data_eva_cardio'] = $page;
			//[$result_centro_medicos]= $this->create_forms->getCentroAndSeguroByPerfil(0);
			if($this->input->get('signo') > 0 ){
			$query = $this->clinical_history->query("SELECT * FROM  eva_car_patient WHERE id=$page");
            $query_eva_card = $query->result();
			$data['query_eva_card'] =$query_eva_card;
			  foreach ($query_eva_card as $row_evc)
			 
			 //----ANTECEDENTES----------------------------
			 
				$query_ant_p_f = $this->clinical_history->query("SELECT * FROM   eva_car_marque_positivo WHERE  eva_cardio=$row_evc->id");

				$data['query_ant_p_f'] = $query_ant_p_f;
			 //-----------------------HBITOS TOXICOS-------------------------------------
			 
			 $query_toxic_habits = $this->clinical_history->query("SELECT * FROM   eva_car_habitos_toxicos WHERE  eva_cardio=$row_evc->id");

				$data['query_toxic_habits'] = $query_toxic_habits;
				
			 //--------------------SIGNOS VITALES------------------------------
			 
			 
			 $signos_vitales_sql = $this->clinical_history->query("SELECT * from  eva_car_signo_vitales WHERE eva_cardio=$row_evc->id");
			 
			 $data['signos_vitales_by_id'] = $signos_vitales_sql->result();
			
			  $signos_vitales_by_id_result = $this->clinical_history->query("SELECT * from  eva_car_signos_vitales_results WHERE eva_cardio=$row_evc->id");
			
			 $data['signos_vitales_by_id_result']=$signos_vitales_by_id_result->result();
			 //--------------EXAMEN FISICO-------------------------------
			 $query_ex_uro=$this->clinical_history->query("SELECT * FROM  eva_car_examen_fisico WHERE eva_cardio=$row_evc->id");
	       $data['query_ex_fis']= $query_ex_uro->result();
		   
		   //-------------------RESULTADO EXAMEN-------------------------
		   
		    $query_ex_rst=$this->clinical_history->query("SELECT * FROM  eva_car_resultado_exam WHERE eva_cardio=$row_evc->id");
	       $data['query_ex_rst']= $query_ex_rst->result();
			}
			 $this->load->view('clinical-history/cardiovascular-evaluation/form', $data);
              echo "<script> 
			  $('.spinner-border').hide();
               </script>";			  
        }
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    }
