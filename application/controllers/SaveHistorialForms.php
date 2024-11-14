<?php
    class SaveHistorialForms extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->ID_PATIENT = $this->session->userdata('id_patient');
            $this->ID_USER = $this->session->userdata('user_id');
            $this->ID_CENTRO = $this->session->userdata('id_centro');
            $this->INSERTED_TIME = date("Y-m-d H:i:s");
            $this->load->library("user_register_info");
            $this->load->helper('form');
            $this->load->model('model_medical_history');
            $this->load->model('model_signo_vital');
			$this->clinical_history = $this->load->database('clinical_history',TRUE);
        }


        function saveEnfermedadActual()
        {
			if($this->input->post('ifGeneralHumanBody') ==1){
		$upload_dir = './assets_new/img/historia-general/';
		
		$human_body_image_f = $upload_dir . "human-body-" . time() . ".png";
		$human_body_img = $_POST['saveDrawImageHumB'];
		$human_body_img = substr($human_body_img, strpos($human_body_img, ",") + 1);
		$data1 = base64_decode($human_body_img);
		file_put_contents($human_body_image_f, $data1);
		$diagram = "human-body-" . time() . ".png";
		}else{
		$diagram = NULL;	
		}
          $data               = array(
                'enf_motivo' => $this->input->post('enf_motivo'),
                'signopsis' => $this->input->post('enf_signopsis'),
                'laboratorios' => $this->input->post('enf_laboratorios'),
                'estudios' => $this->input->post('enf_estudios'),
                'historial_id' => $this->ID_PATIENT,
                'inserted_by' => $this->ID_USER,
                'inserted_time' => $this->INSERTED_TIME,
                'updated_time' => date("Y-m-d H:i:s"),
                'updated_by' => $this->ID_USER,
                'centro_medico' => $this->ID_CENTRO,
				'human_boy_image'=>$diagram,
            );

            $this->clinical_history->insert("h_c_enfermedad_actual", $data);
			 $response['message'] = "ok";
         $response['status']  = 0;
		 //echo json_encode($response);
        }

        function saveConclusionDiag()
        {

            $saveConD               = array(
                
                'otros_diagnos' => $this->input->post('floatingDiagOtros'),
                'plan' => $this->input->post('con_dia_plan'),
                'procedimiento' => $this->input->post('floatingProcedimiento'),
                'historial_id' => $this->ID_PATIENT,
                'inserted_by' => $this->ID_USER,
                'inserted_time' => $this->INSERTED_TIME,
                'updated_time' => date("Y-m-d H:i:s"),
                'updated_by' => $this->ID_USER,
                'centro_medico' => $this->ID_CENTRO
            );
            $this->clinical_history->insert("h_c_conclusion_diagno", $saveConD);
		$insert_id = $this->clinical_history->insert_id();
 $cie10Ids=$this->input->post('cie10Id');
 if($cie10Ids){
$cie10Array =  array(); 		
for ($i = 0; $i < count($cie10Ids); ++$i ) {
$cie10Id = $cie10Ids[$i];
 $cie10Array[] = array(
'con_id_link'=>$insert_id,
'p_id'=>$this->ID_PATIENT,
'user_id'=>$this->ID_USER,
'centro_medico'=>$this->ID_CENTRO,
'insert_date'=>date('Y-m-d H:i:s'),				
'diagno_def'=>$cie10Id  
); 
} 
$this->clinical_history->insert_batch('h_c_diagno_def_link', $cie10Array);
		}
if($this->clinical_history->affected_rows() > 0){
 $response['message'] = "ok";
$response['status']  = 5;
		}else{
 $response['message'] = "fail";
$response['status']  = 6;
}

//echo json_encode($response);

     }

			function saveEnfermedadActualConclusionDiag()
			{
             if(empty($this->input->post('enf_motivo'))) {
                $response['message'] = "<strong>Enfemedad Actual</strong><br/> * El Motivo de consulta es obligatorio.". $this->input->post('is_plan_empty');
                $response['status']  = 1;
            }
          elseif(empty($this->input->post('is_sinopsis_empty'))) {
                $response['message'] = "CAMPO REQUERIDO <br/> Enfemedad Actual: El Signopsis es obligatorio.";
                $response['status']  = 2;
            } elseif(empty($this->input->post('floatingDiagOtros')) && empty($this->input->post('isCied10Emty'))) {
                $response['message'] = "CAMPO REQUERIDO <br/> Conclusión Diagnóstica: El campo CIE10 es obligatorio.".$this->input->post('is_plan_empty');
                $response['status']  = 3;
            }

        elseif(empty($this->input->post('isPlanEmpry'))) {
                $response['message'] = "CAMPO REQUERIDO <br/> Conclusión Diagnóstica: El plan es obligatorio.";
                $response['status']  = 4;
            }
            
			else {
			$this->clinical_history->trans_begin();

			$this->saveEnfermedadActual();
			$this->saveConclusionDiag();
			$this->clinical_history->trans_complete();
			

			if ($this->clinical_history->trans_status() === FALSE)
			{
			$this->clinical_history->trans_rollback();
			  $response['message'] = "Grabacion fallo";
                $response['status']  = 5;
			}
			else
			{
			$this->clinical_history->trans_commit();
			 $response['message'] = "Grabacion logro";
                $response['status']  = 6;
			}
			}
			echo json_encode($response);
			}










       


        function saveAntPerFam()
        {
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
            $data             = array(
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
                'historial_id' => $this->ID_PATIENT,
                'inserted_time' => $this->INSERTED_TIME,
                'updated_time' => date("Y-m-d H:i:s"),
                'inserted_by' => $this->ID_USER,
                'updated_by' => $this->ID_USER,
                'id_user' => $this->ID_USER,
				'eva_cardio'=>$this->input->post('eva_cardio')
            );
            // when edit_or_save = 0, means we must insert
            if ($this->input->post('id') == 0) {

                $idMarPos = $this->model_medical_history->marquePositivo($data);
                    $counMarP = $this->model_medical_history->countAnte1($this->ID_PATIENT);
                    if ($counMarP > 1 && $this->input->post('eva_cardio') == 0) {
                        $this->model_medical_history->DeleteDuplicateMarqueP($idMarPos);
                    }
               
            } else {
                 $this->model_medical_history->updateMarquePositivo($this->input->post('id'), $data);
                echo '<i class="bi bi-check-lg text-success fs-4"></i>';
            }
			
        }


        function saveHabToxico()
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
                'historial_id' => $this->ID_PATIENT,
                'inserted_by' =>  $this->session->userdata('ta_in_by'),
                'updated_by' =>  $this->session->userdata('ta_up_by'),
                'inserted_time' => $this->session->userdata('ta_in_time'),
                'updated_time' =>  $this->session->userdata('ta_up_time'),
				'eva_cardio'=>$this->input->post('eva_cardio')

            );
            if ($this->input->post('id') == 0) {
                $idHabT = $this->model_medical_history->saveHabitosToxicos($data);
                //if last argument is 0 we should save only once
                   $counHabT = $this->model_medical_history->countHabitosToxicos($this->ID_PATIENT);
                    if ($counHabT > 1  && $this->input->post('eva_cardio') == 0) {
                        $this->model_medical_history->DeleteEmptyHabitosToxicos($idHabT);
                    }
                
            } else {
                $where = array(
                    'id' => $this->input->post('id')
                );

                $this->clinical_history->where($where);
                $this->clinical_history->update('h_c_habitos_toxicos', $data);
                echo '<i class="bi bi-check-lg text-success fs-4"></i>';
            }
        }



        function saveSignosVitales()
        {
            if ($this->input->post('form_inputs') > 0) {

              
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
                    'id_patient' => $this->ID_PATIENT,
                    'inserted_by' => $this->ID_USER,
                    'inserted_time' => $this->INSERTED_TIME,
                    'updated_by' => $this->ID_USER,
                    'updated_time' => date("Y-m-d H:i:s"),
                    'id_user' => $this->ID_USER,
					'eva_cardio' => $this->input->post('eva_cardio')

                );


                if ($this->input->post('id') == 0) {

                    $this->clinical_history->insert('h_c_signo_vitales', $rowSigVit);
                    $insert_id = $this->clinical_history->insert_id();
                      $rowSigVitRslt = array(
                        'fr' => $this->input->post('signo_fr_result'),
                        'fc' => $this->input->post('signo_fc_result'),
                        'ft' => $this->input->post('signo_temp_result'),
                        'sist' => $this->input->post('tens_art_sis_result'),
                        'diast' => $this->input->post('tens_art_dias_result'),
                        'glicemia' => $this->input->post('glicemia_rslt'),
                        'id_sig' => $insert_id,
                        'eva_cardio' => $this->input->post('eva_cardio')
                    );
                    $this->clinical_history->insert('h_c_signos_vitales_results', $rowSigVitRslt);
                } else {
                    $this->clinical_history->where('id', $id);
                    $this->clinical_history->update('h_c_signo_vitales', $rowSigVit);
                    $row = array(
                        'fr' => $this->input->post('signo_fr_result'),
                        'fc' => $this->input->post('signo_fc_result'),
                        'ft' => $this->input->post('signo_temp_result'),
                        'sist' => $this->input->post('tens_art_sis_result'),
                        'diast' => $this->input->post('tens_art_dias_result'),
                        'glicemia' => $this->input->post('glicemia_rslt')
                    );
                    $this->clinical_history->where('id_sig', $id);
                    $this->clinical_history->update('h_c_signos_vitales_results', $row);
                    echo '<i  class="bi bi-check-lg text-success fs-4" ></i>';
                }
            }
        }


	public function saveUrologyAntPerFam(){
		//if($this->input->post('form') > 0){
		 $uro_sin_ha_1 = $this->input->post('uro_sin_ha_1');
        $uro_sin_ha_11 = (isset($uro_sin_ha_1)) ? 1 : 0;
        $uro_ant_escl = $this->input->post('uro_ant_escl');
        $uro_ant_escl1 = (isset($uro_ant_escl)) ? 1 : 0;
        $uro_ant_imp = $this->input->post('uro_ant_imp');
        $uro_ant_imp1 = (isset($uro_ant_imp)) ? 1 : 0;
        $uro_ant_ane_fal = $this->input->post('uro_ant_ane_fal');
        $uro_ant_ane_fal1 = (isset($uro_ant_ane_fal)) ? 1 : 0;
        $uro_ant_vari = $this->input->post('uro_ant_vari');
        $uro_ant_vari1 = (isset($uro_ant_vari)) ? 1 : 0;
        $uro_ant_fimosis = $this->input->post('uro_ant_fimosis');
        $uro_ant_fimosis1 = (isset($uro_ant_fimosis)) ? 1 : 0;
        $uro_ant_hid = $this->input->post('uro_ant_hid');
        $uro_ant_hid1 = (isset($uro_ant_hid)) ? 1 : 0;
        $uro_sin_ha_2 = $this->input->post('uro_sin_ha_2');
        $uro_sin_ha_21 = (isset($uro_sin_ha_2)) ? 1 : 0;
        $uro_ant_cancer_prostata = $this->input->post('uro_ant_cancer_prostata');
        $uro_ant_cancer_prostata1 = (isset($uro_ant_cancer_prostata)) ? 1 : 0;
        $uro_ant_poli_renal = $this->input->post('uro_ant_poli_renal');
        $uro_ant_poli_renal1 = (isset($uro_ant_poli_renal)) ? 1 : 0;
        $uro_ant_uroli = $this->input->post('uro_ant_uroli');
        $uro_ant_uroli1 = (isset($uro_ant_uroli)) ? 1 : 0;
        $uro_ant_cist = $this->input->post('uro_ant_cist');
        $uro_ant_cist1 = (isset($uro_ant_cist)) ? 1 : 0;
        $data = array('uro_sin_ha_1' => $uro_sin_ha_11,
		'uro_ant_escl' => $uro_ant_escl1,
		'uro_ant_imp' => $uro_ant_imp1,
		'uro_ant_ane_fal' => $uro_ant_ane_fal1,
		'uro_ant_vari' => $uro_ant_vari1,
		'uro_ant_fimosis' => $uro_ant_fimosis1,
		'uro_ant_hid' => $uro_ant_hid1,
		'uro_ant_its' => $this->input->post('uro_ant_its'),
		'uro_ant_tumorales' => $this->input->post('uro_ant_tumorales'),
		'uro_ant_otros' => $this->input->post('uro_ant_otros'),
		'uro_sin_ha_2' => $uro_sin_ha_21,
		'uro_ant_cancer_prostata' => $uro_ant_cancer_prostata1,
		'uro_ant_poli_renal' => $uro_ant_poli_renal1,
		'uro_ant_uroli' => $uro_ant_uroli1,
		'uro_ant_cist' => $uro_ant_cist1,
		'uro_ant_otros2' => $this->input->post('uro_ant_otros2'),
		'inserted_by' => $this->session->userdata('uro_in_by'),
		'updated_by' => $this->session->userdata('uro_up_by'),
		 'inserted_time' => $this->session->userdata('uro_in_time'),
		'updated_time' =>$this->session->userdata('uro_up_time'),
		'id_patient' => $this->ID_PATIENT,
		'id_centro' => $this->ID_CENTRO
		);
		
		
		if($this->input->post('id')==0){
				 $result = $this->clinical_history->insert("h_c_urology_antecedentes", $data);
			}else{
		
		 	$this->clinical_history->where('id', $this->input->post('id'));
		
        $result = $this->clinical_history->update("h_c_urology_antecedentes", $data);
			}
       if ($result) {
                    echo '<i class="bi bi-check-lg text-success fs-4"></i>';
                } else {

                    echo '<i class="bi bi-check-lg text-danger fs-4"></i>!';
                }
		//}
	}
      


     



        function saveOtherAntAntViolenciaIntraF()
        {
            $data = array(
                'quirurgicos' => $this->input->post('quirurgicos'),
                'gineco' => $this->input->post('gineco'),
                'abdominal' => $this->input->post('abdominal'),
                'toracica' => $this->input->post('toracica'),
                'transfusion' => $this->input->post('transfusion'),
                'otros1' => $this->input->post('otros1_g'),
                'hepatis' => $this->input->post('hepatis'),
                'hpv' => $this->input->post('hpv'),
                'toxoide' => $this->input->post('toxoide'),
                'grouposang' => $this->input->post('grouposang'),
                'tipificacion' => $this->input->post('tipificacion'),
                'rh' => $this->input->post('rhoa'),
                'violencia1' => $this->input->post('violencia1'),
                'violencia2' => $this->input->post('violencia2'),
                'violencia3' => $this->input->post('violencia3'),
                'violencia4' => $this->input->post('violencia4'),
                'historial_id' => $this->ID_PATIENT,
                 'inserted_time' => $this->session->userdata('vio_in_time'),
                'updated_time' => $this->session->userdata('vio_up_time'),
                'inserted_by' => $this->session->userdata('vio_in_by'),
                'updated_by' =>  $this->session->userdata('vio_up_by'),
				'eva_cardio'=>$this->input->post('eva_cardio')
            );
            if ($this->input->post('id') == 0) {
                $idAtO = $this->model_medical_history->saveAnteOtros($data);
                $counAntOt = $this->model_medical_history->countAntOtros($this->ID_PATIENT);
                if ($counAntOt > 1 && $this->input->post('eva_cardio')==0) {
                    $this->model_medical_history->DeleteAntOtros($idAtO);
                }
            } else {
                $this->clinical_history->where('id', $this->input->post('id'));
                $this->clinical_history->update('h_c_ante_otros', $data);
               
            }
			 echo '<i class="bi bi-check  text-green" ></i>';
        }




        function saveSospechaAbuseMaltrato()
        {
			//if($this->input->post('isData') > 0){
            $data = array(
                'maltratof' => $this->input->post('textmaltrato_g'),
                'abusos' => $this->input->post('textabuso_g'),
                'negligencia' => $this->input->post('textneg_g'),
                'maltrato' => $this->input->post('maltratoemo_g'),
                'historial_id' => $this->ID_PATIENT,
                'inserted_time' => $this->session->userdata('sab_in_time'),
                'updated_time' => $this->session->userdata('sab_up_time'),
                'inserted_by' => $this->session->userdata('sab_in_by'),
                'updated_by' =>  $this->session->userdata('sab_up_by'),
            );
            if ($this->input->post('id') == 0) {
                $idDes = $this->model_medical_history->saveAbuseSuspition($data);
                $counDesa = $this->model_medical_history->countAbuseSuspition($this->ID_PATIENT);
                if ($counDesa > 1) {
                    $this->model_medical_history->deleteEmptyAbuseSuspition($idDes);
                }
            } else {
                $this->clinical_history->where('id', $this->input->post('id'));
                $this->clinical_history->update('h_c_abuse_suspition', $data);
               
            }
			 echo '<i class="bi bi-check  text-green" ></i>';
		//}
        }





        function examenFisico()
        {
            if ($this->input->post('form_inputs') == 1) {
               
              $id = $this->input->post('id');
			  if($this->input->post('ifExamenMamasOnce') ==1){
			$upload_dir = './assets_new/img/examen-mamas/';
	        $mamas_image = $upload_dir . "mamas-" . time() . ".png";
            $image_mamas = $_POST['image_mamas'];
            $image_mamas = substr($image_mamas, strpos($image_mamas, ",") + 1);
            $data1 = base64_decode($image_mamas);
            file_put_contents($mamas_image, $data1);
			$diagram = "mamas-" . time() . ".png";
			  }else{
				$diagram = NULL;  
			  }
				
				
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
                    'torax' => $this->input->post('torax'),
                    'torax_text' => $this->input->post('torax_text'),
                    'ext_inf' => $this->input->post('ext_inf'),
                    'ext_inft' => $this->input->post('ext_inft'),
                    'cuad_inf_ext1' => $this->input->post('cuad_inf_ext1'),
                    'mama_izq1' => $this->input->post('mama_izq1'),
                    'cuad_sup_ext1' => $this->input->post('cuad_sup_ext1'),
                    'cuad_inf_ext11' => $this->input->post('cuad_inf_ext11'),
                    'region_retro1' => $this->input->post('region_retro1'),
                    'region_areola_pezon1' => $this->input->post('region_areola_pezon1'),
                    'region_ax1' => $this->input->post('region_ax1'),
                    'cuad_inf_ext2' => $this->input->post('cuad_inf_ext2'),
                    'mama_izq2' => $this->input->post('mama_izq2'),
                    'cuad_sup_ext2' => $this->input->post('cuad_sup_ext2'),
                    'cuad_inf_ext22' => $this->input->post('cuad_inf_ext22'),
                    'region_retro2' => $this->input->post('region_retro2'),
                    'region_areola_pezon2' => $this->input->post('region_areola_pezon2'),
                    'region_ax2' => $this->input->post('region_ax2'),
                    //-----------------------examen fisico3-----------------------------------
                    'especuloscopia' => $this->input->post('especuloscopia'),
                    'tacto_bima' => $this->input->post('tacto_bima'),
                    'cervix' => $this->input->post('cervix'),
                    'cervix_text' => $this->input->post('cervix_text'),
                    'utero' => $this->input->post('utero'),
                    'utero_text' => $this->input->post('utero_text'),
                    'anexo_derecho' => $this->input->post('anexo_derecho'),
                    'anexo_izquierdo' => $this->input->post('anexo_izquierdo'),
                    'anexo_derecho_text' => $this->input->post('anexo_derecho_text'),
                    'anexo_iz_text' => $this->input->post('anexo_iz_text'),
                    'inspection_vulval' => $this->input->post('inspection_vulval'),
                    'inspection_vulval_text' => $this->input->post('inspection_vulval_text'),
                    'rectal_text' => $this->input->post('rectal_text'),
                    'rectal' => $this->input->post('rectal'),
                    'genitalm' => $this->input->post('genitalm'),
                    'genitalm_text' => $this->input->post('genitalm_text'),
                    'genitalf_text' => $this->input->post('genitalf_text'),
                    'genitalf' => $this->input->post('genitalf'),
                    'vagina' => $this->input->post('vagina'),
                    'vagina_text' => $this->input->post('vagina_text'),
                    'updated_by' => $this->session->userdata('exam_fisup_by'),
                    'historial_id' => $this->ID_PATIENT,
                    'inserted_by' => $this->session->userdata('exam_fisin_by'),
                    'inserted_time' => $this->session->userdata('exam_fisin_time'),
                    'updated_time' => $this->session->userdata('exam_fisup_time'),
					'mamas_img'=>$diagram,
					'eva_cardio' => $this->input->post('eva_cardio'),
					'neuro_normal' => $neuro_normal1,
					'cabeza_normal'=>$cabeza_normal1,
					'cuello_normal' => $cuello_normal1,
					'abd_inspex_normal' => $abd_inspex_normal1,
					'ext_sup_normal' => $ext_sup_normal1,
					'ext_infex_normal' => $ext_infex_normal1,
					'toraxex_normal' => $toraxex_normal1,
                );
                if ($this->input->post('id') == 0) {
                    $this->clinical_history->insert("h_c_examen_fisico", $dataExF);
                    $insert_id = $this->clinical_history->insert_id();
                  
                } else {
                    $this->clinical_history->where('id', $id);
                    $this->clinical_history->update('h_c_examen_fisico', $dataExF);
                    
                }
				echo '<i class="bi bi-check  text-green" ></i>';
            }
        }



        function upadeEvaCardioField($table, $insert_id, $origine, $id)
        {
            if ($origine == 1) {
                $field = $id;
            } else {
                $field = 0;
            }
            $update_eva_cardio = array(
                'eva_cardio' => $field
            );

            $this->clinical_history->where('id', $insert_id);
            $this->clinical_history->update($table, $update_eva_cardio);
            echo $insert_id . $origine . $id;
        }









        function saveExamenSistema()
        {
            if ($this->input->post('form_inputs') == 1) {
                $data              = array(
                    'sisneuro' => $this->input->post('sisneuro'),
                    'neurologico' => $this->input->post('neurologico'),
                    'siscardio' => $this->input->post('siscardio'),
                    'cardiova' => $this->input->post('cardiova'),
                    'sist_uro' => $this->input->post('sist_uro'),
                    'urogenital' => $this->input->post('urogenital'),
                    'sis_mu_e' => $this->input->post('sis_mu_e'),
                    'musculoes' => $this->input->post('musculoes'),
                    'sist_resp' => $this->input->post('sist_resp'),
                    'nervioso' => $this->input->post('nervioso'),
                    'nerviosostext' => $this->input->post('nerviosostext'),
                    'linfatico' => $this->input->post('linfatico'),
                    'linfaticotext' => $this->input->post('linfaticotext'),
                    'digestivo' => $this->input->post('digestivo'),
                    'respiratorio' => $this->input->post('respiratorio'),
                    'genitourinario' => $this->input->post('genitourinario'),
                    'genitourinariotext' => $this->input->post('genitourinariostext'),
                    'sist_diges' => $this->input->post('sist_diges'),
                    'sist_endo' => $this->input->post('sist_endo'),
                    'endocrino' => $this->input->post('endocrino'),
                    'sist_rela' => $this->input->post('sist_rela'),
                    'otros_ex_sis' => $this->input->post('otros_ex_sis'),
                    'cardiova' => $this->input->post('cardiova'),
                    'dorsales' => $this->input->post('dorsales'),
                    'dorsalestext' => $this->input->post('dorsalesstext'),
                   'historial_id' => $this->ID_PATIENT,
                    'inserted_by' =>  $this->session->userdata('ta_in_by'),
                'updated_by' =>  $this->session->userdata('si_up_by'),
                'inserted_time' => $this->session->userdata('si_in_time'),
                'updated_time' =>  $this->session->userdata('si_up_time'),

                );
                if ($this->input->post('id') == 0) {
                    $this->clinical_history->insert("h_c_examen_sistema", $data);
                } else {
                    $this->clinical_history->where('id', $this->input->post('id'));
                    $this->clinical_history->update('h_c_examen_sistema', $data);
                    echo '<i class="bi bi-check  text-green" ></i>';
                }
            }
        }







        public function saveEnfermedadActualCirujanoVas()
        {
            $upload_dir = './assets_new/img/cirujano-vascular/';
			$id = $this->input->post('id');
			//if($id > 0){
			 //$remove = $this->clinical_history->select('diagrama_cirugia_vascular') ->where('id', $id)->get('h_c_cirujano_vascular')->row('diagrama_cirugia_vascular');
            //unlink("./assets_new/img/cirujano-vascular/" . $remove);
			//
			//}
			
			if($this->input->post('ifVasSurgery') ==1){
            $image = $upload_dir . "diagrama-" . time() . ".png";
            $saveDrawCanEndo = $_POST['saveDrawCanEndo'];
            $saveDrawCanEndo = substr($saveDrawCanEndo, strpos($saveDrawCanEndo, ",") + 1);
            $data1 = base64_decode($saveDrawCanEndo);
            file_put_contents($image, $data1);
			$diagrama = "diagrama-" . time() . ".png";
			}else{
				$diagrama = NULL;
			}
			
            $cir_vas_dol = $this->input->post('cir_vas_dol');
            $cir_vas_dol1 = (isset($cir_vas_dol)) ? 1 : 0;
            $cir_vas_edema = $this->input->post('cir_vas_edema');
            $cir_vas_edema1 = (isset($cir_vas_edema)) ? 1 : 0;
            $cir_vas_pesadez = $this->input->post('cir_vas_pesadez');
            $cir_vas_pesadez1 = (isset($cir_vas_pesadez)) ? 1 : 0;
            $cir_vas_cansancio = $this->input->post('cir_vas_cansancio');
            $cir_vas_cansancio1 = (isset($cir_vas_cansancio)) ? 1 : 0;
            $cir_vas_quemazo = $this->input->post('cir_vas_quemazo');
            $cir_vas_quemazo1 = (isset($cir_vas_quemazo)) ? 1 : 0;
            $cir_vas_calambred = $this->input->post('cir_vas_calambred');
            $cir_vas_calambred1 = (isset($cir_vas_calambred)) ? 1 : 0;
            $cir_vas_purito = $this->input->post('cir_vas_purito');
            $cir_vas_purito1 = (isset($cir_vas_purito)) ? 1 : 0;
            $cir_vas_hiper = $this->input->post('cir_vas_hiper');
            $cir_vas_hiper1 = (isset($cir_vas_hiper)) ? 1 : 0;
            $cir_vas_ulceras = $this->input->post('cir_vas_ulceras');
            $cir_vas_ulceras1 = (isset($cir_vas_ulceras)) ? 1 : 0;
            $cir_vas_pares = $this->input->post('cir_vas_pares');
            $cir_vas_pares1 = (isset($cir_vas_pares)) ? 1 : 0;
            $cir_vas_claud = $this->input->post('cir_vas_claud');
            $cir_vas_claud1 = (isset($cir_vas_claud)) ? 1 : 0;
            $cir_vas_necrosis = $this->input->post('cir_vas_necrosis');
            $cir_vas_necrosis1 = (isset($cir_vas_necrosis)) ? 1 : 0;
            $cir_vas_necrosis = $this->input->post('cir_vas_necrosis');
            $cir_vas_necrosis1 = (isset($cir_vas_necrosis)) ? 1 : 0;
            $data = array(
                'cir_vas_dol' => $cir_vas_dol1,
                'cir_vas_edema' => $cir_vas_edema1,
                'cir_vas_pesadez' => $cir_vas_pesadez1,
                'cir_vas_cansancio' => $cir_vas_cansancio1,
                'cir_vas_quemazo' => $cir_vas_quemazo1,
                'cir_vas_calambred' => $cir_vas_calambred1,
                'cir_vas_purito' => $cir_vas_purito1,
                'cir_vas_hiper' => $cir_vas_hiper1,
                'cir_vas_ulceras' => $cir_vas_ulceras1,
                'cir_vas_pares' => $cir_vas_pares1,
                'cir_vas_claud' => $cir_vas_claud1,
                'cir_vas_necrosis' => $cir_vas_necrosis1,
                'cir_vas_otros' => $this->input->post('cir_vas_otros'),
                'cir_vas_historial' => $this->input->post('enf_historia'),
                'id_historial' => $this->ID_PATIENT,
                'inserted_by' => $this->ID_USER,
                'inserted_time' => date("Y-m-d H:i:s"),
                'updated_by' => $this->ID_USER,
                'updated_time' => date("Y-m-d H:i:s"),
				'centro_medico'=>$this->ID_CENTRO,
                'diagrama_cirugia_vascular' => $diagrama
            );

          if($id==0){
            $this->clinical_history->insert("h_c_cirujano_vascular", $data);
			}else{
				$this->clinical_history->where('id', $id);
                    $this->clinical_history->update('h_c_cirujano_vascular', $dataExamUro);
                    echo '<i class="bi bi-check  text-green" ></i>'; 
			 }
        }


	function saveEnfermedadActualConclusionDiagCirujanoVas()
			{
             if(empty($this->input->post('is_historia_empty'))) {
                $response['message'] = "<strong>Enfemedad Actual</strong><br/> * la historia de consulta es obligatorio.". $this->input->post('is_historia_empty');
                $response['status']  = 1;
            }
           elseif(empty($this->input->post('floatingDiagOtros')) && empty($this->input->post('isCied10Emty'))) {
                $response['message'] = "CAMPO REQUERIDO <br/> Conclusión Diagnóstica: El campo CIE10 es obligatorio.".$this->input->post('is_plan_empty');
                $response['status']  = 3;
            }

        elseif(empty($this->input->post('isPlanEmpry'))) {
                $response['message'] = "CAMPO REQUERIDO <br/> Conclusión Diagnóstica: El plan es obligatorio.";
                $response['status']  = 4;
            }
            
			else {
			$this->clinical_history->trans_begin();

		 $this->saveEnfermedadActualCirujanoVas();
            $this->saveConclusionDiag();
			$this->clinical_history->trans_complete();
			

			if ($this->clinical_history->trans_status() === FALSE)
			{
			$this->clinical_history->trans_rollback();
			  $response['message'] = "Grabacion fallo";
                $response['status']  = 5;
			}
			else
			{
			$this->clinical_history->trans_commit();
			 $response['message'] = "Grabacion logro";
                $response['status']  = 6;
			}
			}
			echo json_encode($response);
			}

		
	
	function saveExamFisUrologo(){
		 $textarea = $this->input->post('textarea');
		 if($textarea > 0){
			 $id = $this->input->post('id');
			 if($this->input->post('isUroDiagram')==1){
			 	$upload_dir = './assets_new/img/urology/';
	 //$remove = $this->clinical_history->select('image') ->where('id', $id)->get('h_c_urology')->row('image');
           // unlink("./assets_new/img/urology/" . $remove);
            $eyes_image = $upload_dir . "uro-" . time() . ".png";
            $saveDrawImage = $_POST['saveDrawImage'];
            $saveDrawImage = substr($saveDrawImage, strpos($saveDrawImage, ",") + 1);
            $data1 = base64_decode($saveDrawImage);
            file_put_contents($eyes_image, $data1);
			$uroDiag="uro-" . time() . ".png";
			 }else{
				$oldUro=$this->clinical_history->select('image')->where('id', $id)->get('h_c_urology')->row('image'); 
				$uroDiag=$oldUro;
			 }
		 $tacto_rect = $this->input->post('tacto_rect');
		    $tacto_rect1   = (isset($tacto_rect)) ? 1 : 0;
             $dataExamUro = array( 
                'uro_pene' => $this->input->post('uro_pene'),
                'uro_testicule' => $this->input->post('uro_testicule'),
                'uro_epididimos' => $this->input->post('uro_epididimos'),
               'uro_tacto_rectal_done'=>$tacto_rect1,
				 'uro_tato_rec_pros' => $this->input->post('uro_tato_rec_pros'),
                'uro_geni_mujer' => $this->input->post('uro_geni_mujer'),
                'uro_vejiga' => $this->input->post('uro_vejiga'),
                'uro_loins' => $this->input->post('uro_loins'),
				 'uro_otros' => $this->input->post('uro_otros'),
				 'id_patient' =>$this->ID_PATIENT, 
				 'inserted_by' => $this->session->userdata('uroex_in_by'),
				 'inserted_time' => $this->session->userdata('uroex_in_time'),
				'updated_time' => $this->session->userdata('uroex_up_time'),
				'updated_by' => $this->session->userdata('uroex_up_by'),
				'id_centro' => $this->ID_CENTRO,
				'image'=>$uroDiag,
				
            );
			if($id==0){
			 $this->clinical_history->insert('h_c_urology',$dataExamUro);
			 }else{
				$this->clinical_history->where('id', $id);
                    $this->clinical_history->update('h_c_urology', $dataExamUro);
                    echo '<i class="bi bi-check  text-green" ></i>'; 
			 }
		 }
		
	}
		
	 public function saveNewContPrena()
        {
            if ($this->input->post('has_value') == 1) {
				 if ($this->input->post('id_registro') > 0 ) {
					 $id_registro = $this->input->post('id_registro');
				$this->clinical_history->query("DELETE FROM h_c_control_prenatal WHERE id_registro=$id_registro");
				 }
				 $lastIns = $this->clinical_history->select('id')->where('historial_id', $this->ID_PATIENT)->order_by('id', 'desc')->limit(1)->get('h_c_control_prenatal')->row('id');
				 $registro = $lastIns ? $lastIns : $this->ID_PATIENT;
				 
                $fecha = $this->input->post('fecha');
                //echo $fecha;
                $semana = $this->input->post('semana');
                $peso = $this->input->post('peso');
                $tension_art_max = $this->input->post('tension_art_max');
                $tension_art_min = $this->input->post('tension_art_min');
                $alt_ult = $this->input->post('alt_ult');
                $pubis_f = $this->input->post('pubis_f');
                $pelv_tr = $this->input->post('pelv_tr');
                $lat_min = $this->input->post('lat_min');
                $mov_fet = $this->input->post('mov_fet');
                $edema = $this->input->post('edema');
                $varices = $this->input->post('varices');
                $otro = $this->input->post('otro');
                $evolution = $this->input->post('evolution');
                $position = $this->input->post('position');
                for ($i = 0; $i < count($fecha); ++$i) {
                    $fecha1 = $fecha[$i];
                    $semana1 = $semana[$i];
                    $peso1 = $peso[$i];
                    $tension_art_max1 = $tension_art_max[$i];
                    $tension_art_min1 = $tension_art_min[$i];
                    $alt_ult1 = $alt_ult[$i];
                    $pubis_f1 = $pubis_f[$i];
                    $pelv_tr1 = $pelv_tr[$i];
                    $lat_min1 = $lat_min[$i];
                    $mov_fet1 = $mov_fet[$i];
                    $edema1 = $edema[$i];
                    $varices1 = $varices[$i];
                    $otro1 = $otro[$i];
                    $evolution1 = $evolution[$i];
                    $position1 = $position[$i];
                    $data            = array(
                        'position' => $position1,
                        'fecha' => $fecha1,
                        'semana' => $semana1,
                        'peso' => $peso1,
                        'tension_art_max' => $tension_art_max1,
                        'tension_art_min' => $tension_art_min1,
                        'alt_ult' => $alt_ult1,
                        'pubis_f' => $pubis_f1,
                        'pelv_tr' => $pelv_tr1,
                        'lat_min' => $lat_min1,
                        'mov_fet' => $mov_fet1,
                        'edema' => $edema1,
                        'varices' => $varices1,
                        'otro' => $otro1,
                        'evolution' => $evolution1,
                        'historial_id ' =>$this->ID_PATIENT, 
                        'inserted_by' => $this->ID_USER,
                        'inserted_time' => date('Y-m-d H:i:s'),
                        'id_registro' => $registro,
                        'updated_by' => $this->ID_USER,
                        'updated_time' => date('Y-m-d H:i:s'),

                    );


                    $this->clinical_history->insert("h_c_control_prenatal", $data);
                }



                echo '<i class="bi bi-check-lg text-success fs-4"></i>';
            }
        }
	
		
	   public function saveSSR()
        {
			if($this->input->post('text') > 0 || $this->input->post('radio') > 0){
			$id=$this->input->post('id');

            $sifilisc = $this->input->post('sifilisc');
            $sifilisc1 = (isset($sifilisc)) ? 1 : 0;

            $gonorreac = $this->input->post('gonorreac');
            $gonorreac1 = (isset($gonorreac)) ? 1 : 0;

            $clamidiac = $this->input->post('clamidiac');
            $clamidiac1 = (isset($clamidiac)) ? 1 : 0;

            $data = array(
                'optradio' => $this->input->post('optradio'),
                'edad' => $this->input->post('edad'),
                'numero' => $this->input->post('numero'),
                'sexual' => $this->input->post('sexual'),
                'pareja' => $this->input->post('pareja'),
                'califica' => $this->input->post('califica'),
                'califica_text' => $this->input->post('califica_text'),
                //'utilizo' => $this->input->post('utilizo'),
                'sexual2' => $this->input->post('sexual2'),
                'planif' => $this->input->post('planif'),
				'prueba_vih' => $this->input->post('prueba_vih'),
				'prueba_vih_resultado' => $this->input->post('prueba_vih_resultado'),
                'planif_text' => $this->input->post('planif_text'),
                'embara' => $this->input->post('embara'),
                'menarquia' => $this->input->post('menarquia'),
                'fecha_ul_m' => $this->input->post('fecha_ul_m'),
                'fecha_ovulacion' => $this->input->post('fechaOvulacion'),
                'semana_fertil' => $this->input->post('semanaFertil'),
                'amenorea_text' => $this->input->post('amenoreaText'),
                'amenorea_tiempo' => $this->input->post('amenoreaTiempo'),
                'menaop' => $this->input->post('menaop'),
                'cliclo' => $this->input->post('cliclo'),
                'cliclo_text' => $this->input->post('cliclo_text'),
                'dura_sang' => $this->input->post('dura_sang'),
                'dismeno' => $this->input->post('dismeno'),
                'fecha_ul_pap' => $this->input->post('fecha_ul_pap'),
                'ant_pap_re' => $this->input->post('ant_pap_re'),
                'ant_pap_re_text' => $this->input->post('ant_pap_re_text'),
                'realiza_auto' => $this->input->post('realiza_auto'),
                'realiza_auto_text' => $this->input->post('realiza_auto_text'),
                'fecha_ul_mama' => $this->input->post('fecha_ul_mama'),
                'p' => $this->input->post('p'),
                'a' => $this->input->post('a'),
                'c' => $this->input->post('c'),
                'e' => $this->input->post('e'),
                'totalGest' => $this->input->post('totalGest'),
                'otro_infeccion1' => $this->input->post('otro_infeccion'),
                'cant_sang' => $this->input->post('cant_sang'),
                'nuligesta' => $this->input->post('nuligesta'),
                'complica' => $this->input->post('complica'),
                'complica_text' => $this->input->post('complica_text'),
                'complica_dur' => $this->input->post('complica_dur'),
                'complica_dur_text' => $this->input->post('complica_dur_text'),
                'centro_medico'=> $this->ID_CENTRO,
                'infeccion1' => $sifilisc1,
                'infeccion2' => $gonorreac1,
                'infeccion3' => $clamidiac1,
                'hist_id' =>$this->ID_PATIENT, 
                'infec_tran' => $this->input->post('infec_tran'),
				'inserted_by' => $this->session->userdata('ssrin_by'),
				'inserted_time' => $this->session->userdata('ssrin_time'),
                'updated_by' => $this->session->userdata('ssrup_by'),
                'updated_time' => $this->session->userdata('ssrup_time')
            );
			if($id > 0){
            $this->clinical_history->where('id', $id);
            $result = $this->clinical_history->update('h_c_ant_ssr', $data);
			}else{
				$result =$this->clinical_history->insert("h_c_ant_ssr", $data);
			}
            if ($result) {
               echo '<i class="bi bi-check-lg text-success fs-4"></i>';
            } else {
              
                echo '<i class="bi bi-check-lg text-danger fs-4"></i>!';
            }
			}
			
        }	
		
		
		 public function saveOBS()
        {
         
            if($this->input->post('textC') > 0 || $this->input->post('radioCS') > 0 || $this->input->post('ckkC')  > 0){
			$id=$this->input->post('id');
        
		 $fiebre1 = $this->input->post('fiebre1');
            $fiebre = (isset($fiebre1)) ? 1 : 0;

            $artra1 = $this->input->post('artra1');
            $artra = (isset($artra1)) ? 1 : 0;

            $mia1 = $this->input->post('mia1');
            $mia = (isset($mia1)) ? 1 : 0;

            $exa1 = $this->input->post('exa1');
            $exa = (isset($exa1)) ? 1 : 0;

            $con1 = $this->input->post('con1');
            $con  = (isset($con1)) ? 1 : 0;
          
		    $vdrl11 = $this->input->post('vdrl');
            $vdrl1 = (isset($vdrl11)) ? 1 : 0;
            $vdrl22 = $this->input->post('vdr2');
            $vdrl2 = (isset($vdrl22)) ? 1 : 0;
		  
		  
             $obs1 = array(
                'dia1' => $this->input->post('dia1'),
                'tbc1' => $this->input->post('tbc1'),
                'hip1' => $this->input->post('hip1'),
                'pelv' => $this->input->post('pelv'),
                'infert' => $this->input->post('inf'),
                'otros1' => $this->input->post('otros1'),
                'otros1_text' => $this->input->post('otros1_text'),
                'dia2' => $this->input->post('dia2'),
                'tbc2' => $this->input->post('tbc2'),
                'hip2' => $this->input->post('hip2'),
                'gem' => $this->input->post('gem'),
                'otros2' => $this->input->post('otros2'),
				 'rn' => $this->input->post('rn'),
                'fin' => $this->input->post('fin'),
                'otros2_text' => $this->input->post('otros2_text'),
				'fiebre' => $fiebre,
                'artra' => $artra,
                'mia' => $mia,
                'exa' => $exa,
                'con' => $con,
				
				'vdr1' => $vdrl1,
                'vdr2' => $vdrl2,
                'fecha1' => $this->input->post('fecha1'),
				'sono1' => $this->input->post('sono1'),
				'sonodia1' => $this->input->post('sonodia1'),
				'diarest1' => $this->input->post('diarest1'),
				'rest1' => $this->input->post('rest1'),
				 'peso1' => $this->input->post('peso1'),
                'talla1' => $this->input->post('talla1'),
				'fpp1'=> $this->input->post('fpp1'),
                'fum_cal_ges' => $this->input->post('fum_cal_ges'),
                'fpp_cal_ges' => $this->input->post('fpp_cal_ges'),
                'semana_amorea' => $this->input->post('sem_act_a'),
                'prev_act' => $this->input->post('prev_act'),
                'prev_act_mes' => $this->input->post('prev_act_mes'),
                'rr' => $this->input->post('r2'),
                'sencibil' => $this->input->post('sencibil'),
                'rh' => $this->input->post('rh'),
                'odont' => $this->input->post('odont'),
                'papani' => $this->input->post('papani'),
                'pelvis' => $this->input->post('pelvis'),
                'colp' => $this->input->post('colp'),
                'cevix' => $this->input->post('cevix'),
                'diasmes' => $this->input->post('diasmes'),
                'rh_option' => $this->input->post('rh_option'),
				'hist_id'=>$this->ID_PATIENT,
                'inserted_by' => $this->session->userdata('obs_in_by'),
                'inserted_time' => $this->session->userdata('obs_in_time'),
				 'updated_by' => $this->session->userdata('obs_up_by'),
                'updated_time' => $this->session->userdata('obs_up_time'),
            );
       //
			if($id == 0){
				$get_id_insert = $this->model_medical_history->saveObstetrico($obs1);
				$get_id = $get_id_insert;
           }else{
				 $this->model_medical_history->upObstetrico($obs1, $id);
				 $get_id = $id;
			}
			
             if ($get_id) {
               echo '<i class="bi bi-check-lg text-success fs-4"></i>';
            } else {
              
                echo '<i class="bi bi-check-lg text-danger fs-4"></i>!';
            }

			}
		}
		
	
		public function saveOphtalmology(){
		
	
		$id=$this->input->post('id');
		
		
			
       $data= array(
  'od_sin_con'=> $this->input->post('od_sin_con'),
  'od_con_cor'=> $this->input->post('od_con_cor'),
  'od_mas_o_meno'=> $this->input->post('od_mas_o_meno'),
  'od_cor_act'=> $this->input->post('od_cor_act'),
  'os_sin_con'=> $this->input->post('os_sin_con'),
  'os_con_cor'=> $this->input->post('os_con_cor'),
  'os_mas_o_meno'=> $this->input->post('os_mas_o_meno'),
  'os_cor_act'=> $this->input->post('os_cor_act'),
  'retine1'=> $this->input->post('retine1'),
  'retine2'=> $this->input->post('retine2'),
  'retine3'=> $this->input->post('retine3'),
   'retine4'=> $this->input->post('retine4'),
 'retine5'=> $this->input->post('retine5'),
 'retine6'=> $this->input->post('retine6'),
  'retine7'=> $this->input->post('retine7'),
 'retine8'=> $this->input->post('retine8'),
  'masomenos1'=> $this->input->post('masomenos1'),
  'masomenos2'=> $this->input->post('masomenos2'),
  'masomenos3'=> $this->input->post('masomenos3'),
   'masomenos4'=> $this->input->post('masomenos4'),
 'masomenos5'=> $this->input->post('masomenos5'),
 'masomenos6'=> $this->input->post('masomenos6'),
  'masomenos7'=> $this->input->post('masomenos7'),
 'masomenos8'=> $this->input->post('masomenos8'),
'ppm'=> $this->input->post('ppm'),
'converg'=> $this->input->post('converg'),
'ducvers'=> $this->input->post('ducvers'),
'convertest'=> $this->input->post('convertest'),
'nota'=> $this->input->post('notaof'),
'conj1'=> $this->input->post('conj1'),
'conj2'=> $this->input->post('conj2'),
'cornea1'=> $this->input->post('cornea1'),
'cornea2'=> $this->input->post('cornea2'),
'pup1'=> $this->input->post('pup1'),
'pup2'=> $this->input->post('pup2'),
'crist1'=> $this->input->post('crist1'),
'crist2'=> $this->input->post('crist2'),
'vitreo1'=> $this->input->post('vitreo1'),
'vitreo2'=> $this->input->post('vitreo2'),
'fondos1'=> $this->input->post('fondos1'),
'fondos2'=> $this->input->post('fondos2'),
'id_historial'=>$this->ID_PATIENT,
'inserted_by'=> $this->session->userdata('of_in_by'),
'updated_by'=> $this->session->userdata('of_up_by'),
'inserted_time'=>$this->session->userdata('of_in_time'),
'updated_time'=>$this->session->userdata('of_up_time'),
);
   if($id == 0){
	        $result = $this->clinical_history->insert("h_c_oftalmologia", $data);
			
			$insert_id = $this->clinical_history->insert_id();
			//-------INSERT CANVAS ONLY WHEN CREATE NEW REGISTER
			
			
			if($this->input->post('showDrawingToolsOphtal') ==1){
		
		  $upload_dir = './assets/img/oftal/';
         $eyes_image = $upload_dir . "eyes-" . time() . ".png";
            $saveDrawEyesImage = $_POST['saveDrawEyesImage'];
            $saveDrawEyesImage = substr($saveDrawEyesImage, strpos($saveDrawEyesImage, ",") + 1);
            $data1 = base64_decode($saveDrawEyesImage);
            file_put_contents($eyes_image, $data1);
			
			 $eyes_fondos = $upload_dir . "fondos-" . time() . ".png";
			 $saveDrawEyesFondos = $_POST['saveDrawEyesFondos'];
            $saveDrawEyesFondos = substr($saveDrawEyesFondos, strpos($saveDrawEyesFondos, ",") + 1);
            $data2 = base64_decode($saveDrawEyesFondos);
            file_put_contents($eyes_fondos, $data2);
			$oyos = "eyes-" . time() . ".png";
			$fondos = "fondos-" . time() . ".png";
		}else{
			// WHEN USE UPDATE
			$oyos = NULL;
			
			$fondos = NULL;
		}
			
			
			
		$where = array('id' => $insert_id);
        $this->clinical_history->where($where);
		
			$dataCanv= array(
			'ojo'=>$oyos,
			'fondo'=>$fondos
			);
		
	$this->clinical_history->update("h_c_oftalmologia", $dataCanv);	
			
			
			
   }else{
        $where = array('id' => $id);
        $this->clinical_history->where($where);
		
        $result = $this->clinical_history->update("h_c_oftalmologia", $data);
   }
        if ($result) {
            echo '<i class="bi bi-check-lg text-success fs-4"></i>';
        } else {
            echo '<i class="bi bi-check-lg text-danger fs-4"></i>!';
        }
       
	
	

	
	
	}	
		
	

 function saveUpdatePediatry()
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
                    'inserted_by' => $this->session->userdata('pd_in_by'),
                    'updated_by' => $this->session->userdata('pd_up_by'),
                    'hist_id' => $this->ID_PATIENT,
                    'inserted_time' => $this->session->userdata('pd_in_time'),
                    'updated_time' => $this->session->userdata('pd_up_time'),
                    'id_user' => $this->session->userdata('pd_in_by')
                );
				if($id==0){
              $counPedia = $this->model_medical_history->countPediatry($this->ID_PATIENT);
			  if($counPedia==0){
				 $this->model_medical_history->savePedia($save);
			    }
				}else{
			$this->clinical_history->where('id', $id);
			$result= $this->clinical_history->update('h_c_ant_pedia', $save);
			if($result){
			echo '<i class="bi bi-check  text-green" ></i>';
			}else{
			echo '<i class="bi bi-check  text-danger" ></i>';	
			}			 
				}
                  
	  }
            }
	


	 function saveUpdateVacunacion()
    {
		
	   $id=$this->input->post('id_pedia');
		   if($this->input->post('chk') > 0 || $this->input->post('input')  > 0 ){
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
			'hist_id' => $this->ID_PATIENT,
			'inserted_by' => $this->session->userdata('va_in_by'),
			'updated_by' => $this->session->userdata('va_up_by'),
			'inserted_time' => $this->session->userdata('va_in_time'),
			'updated_time' => $this->session->userdata('va_up_time'),
			
        );
		
if($id==0){
$count = $this->model_medical_history->countVacunation($this->ID_PATIENT);
  if($count==0){
 $result=$this->clinical_history->insert('h_c_vacunation_new', $data);
   }

}else{
$this->clinical_history->where('id', $id);
$result= $this->clinical_history->update('h_c_vacunation_new', $data);	
}

if($result){
 echo '<i class="bi bi-check  text-green" ></i>';
}else{
echo '<i class="bi bi-check  text-danger" ></i>';	
}
}
}

	
	
		
    }
