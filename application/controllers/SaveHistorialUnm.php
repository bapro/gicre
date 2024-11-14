<?php defined('BASEPATH') or exit('No direct script access allowed');
class SaveHistorial extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this
            ->load
            ->model('model_admin');
        $this
            ->load
            ->library('form_validation');
    }
    function saveGinecologia()
    {
        $insert_date = date("Y-m-d H:i:s");
        $user_id = $this
            ->input
            ->post('user_id');
        $idenfact = $this
            ->session
            ->userdata['update_enf_act'];
        $upEnf = array(
            'enf_motivo' => $this
                ->input
                ->post('enf_motivo') ,
            'signopsis' => $this
                ->input
                ->post('enf_signopsis') ,
            'laboratorios' => $this
                ->input
                ->post('enf_laboratorios') ,
            'estudios' => $this
                ->input
                ->post('enf_estudios')
        );
        $whereEnf = array(
            'id_enf' => $idenfact
        );
        $this
            ->db
            ->where($whereEnf);
        $this
            ->db
            ->update("h_c_sinopsis", $upEnf);
        $whereimg = array(
            'id_patient' => $this
                ->input
                ->post('hist_id') ,
            'userid' => $this
                ->input
                ->post('user_id') ,
            'id_enfermedad' => 0
        );
        $updimg = array(
            'id_enfermedad' => $idenfact
        );
        $this
            ->db
            ->where($whereimg);
        $this
            ->db
            ->update("saveEnfImage", $updimg);
        $query1 = $this
            ->db
            ->get_where('type_reasons', array(
            'title' => $this
                ->input
                ->post('enf_motivo')
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'title' => $this
                    ->input
                    ->post('enf_motivo') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => $insert_date,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => $insert_date
            );
            $this
                ->model_admin
                ->save_new_causa($save);
        }
        $hab_t_drug = $this
            ->input
            ->post('hab_t_drug');
        $todo_check = $this
            ->input
            ->post('todo_check');
        $todo_check1 = (isset($todo_check)) ? 1 : 0;
        $car_nin_check = $this
            ->input
            ->post('car_nin_check');
        $car_nin_check1 = (isset($car_nin_check)) ? 1 : 0;
        $madre_check = $this
            ->input
            ->post('madre_check');
        $madre_check1 = (isset($madre_check)) ? 1 : 0;
        $padre_check = $this
            ->input
            ->post('padre_check');
        $padre_check1 = (isset($padre_check)) ? 1 : 0;
        $car_h_check = $this
            ->input
            ->post('car_h_check');
        $car_h_check1 = (isset($car_h_check)) ? 1 : 0;
        $car_pe_check = $this
            ->input
            ->post('car_pe_check');
        $car_pe_check1 = (isset($car_pe_check)) ? 1 : 0;
        $nin_check2 = $this
            ->input
            ->post('nin_check2');
        $nin_check22 = (isset($nin_check2)) ? 1 : 0;
        $madre_check2 = $this
            ->input
            ->post('madre_check2');
        $madre_check22 = (isset($madre_check2)) ? 1 : 0;
        $padre_check2 = $this
            ->input
            ->post('padre_check2');
        $padre_check22 = (isset($padre_check2)) ? 1 : 0;
        $h_check2 = $this
            ->input
            ->post('h_check2');
        $h_check22 = (isset($h_check2)) ? 1 : 0;
        $pe_check2 = $this
            ->input
            ->post('pe_check2');
        $pe_check22 = (isset($pe_check2)) ? 1 : 0;
        $nin_check3 = $this
            ->input
            ->post('nin_check3');
        $nin_check33 = (isset($nin_check3)) ? 1 : 0;
        $madre_check3 = $this
            ->input
            ->post('madre_check3');
        $madre_check33 = (isset($madre_check3)) ? 1 : 0;
        $padre_check3 = $this
            ->input
            ->post('padre_check3');
        $padre_check33 = (isset($padre_check3)) ? 1 : 0;
        $h_check3 = $this
            ->input
            ->post('h_check3');
        $h_check33 = (isset($h_check3)) ? 1 : 0;
        $pe_check3 = $this
            ->input
            ->post('pe_check3');
        $pe_check33 = (isset($pe_check3)) ? 1 : 0;
        $nin_check4 = $this
            ->input
            ->post('nin_check4');
        $nin_check44 = (isset($nin_check4)) ? 1 : 0;
        $madre_check4 = $this
            ->input
            ->post('madre_check4');
        $madre_check44 = (isset($madre_check4)) ? 1 : 0;
        $padre_check4 = $this
            ->input
            ->post('padre_check4');
        $padre_check44 = (isset($padre_check4)) ? 1 : 0;
        $h_check4 = $this
            ->input
            ->post('h_check4');
        $h_check44 = (isset($h_check4)) ? 1 : 0;
        $pe_check4 = $this
            ->input
            ->post('pe_check4');
        $pe_check44 = (isset($pe_check4)) ? 1 : 0;
        $nin_check5 = $this
            ->input
            ->post('nin_check5');
        $nin_check55 = (isset($nin_check5)) ? 1 : 0;
        $madre_check5 = $this
            ->input
            ->post('madre_check5');
        $madre_check55 = (isset($madre_check5)) ? 1 : 0;
        $padre_check5 = $this
            ->input
            ->post('padre_check5');
        $padre_check55 = (isset($padre_check5)) ? 1 : 0;
        $h_check5 = $this
            ->input
            ->post('h_check5');
        $h_check55 = (isset($h_check5)) ? 1 : 0;
        $pe_check5 = $this
            ->input
            ->post('pe_check5');
        $pe_check55 = (isset($pe_check5)) ? 1 : 0;
        $nin_check05 = $this
            ->input
            ->post('nin_check05');
        $nin_check055 = (isset($nin_check05)) ? 1 : 0;
        $madre_check05 = $this
            ->input
            ->post('madre_check05');
        $madre_check055 = (isset($madre_check05)) ? 1 : 0;
        $padre_check05 = $this
            ->input
            ->post('padre_check05');
        $padre_check055 = (isset($padre_check05)) ? 1 : 0;
        $h_check05 = $this
            ->input
            ->post('h_check05');
        $h_check055 = (isset($h_check05)) ? 1 : 0;
        $pe_check05 = $this
            ->input
            ->post('pe_check05');
        $pe_check055 = (isset($pe_check05)) ? 1 : 0;
        $nin_check6 = $this
            ->input
            ->post('nin_check6');
        $nin_check66 = (isset($nin_check6)) ? 1 : 0;
        $madre_check6 = $this
            ->input
            ->post('madre_check6');
        $madre_check66 = (isset($madre_check6)) ? 1 : 0;
        $padre_check6 = $this
            ->input
            ->post('padre_check6');
        $padre_check66 = (isset($padre_check6)) ? 1 : 0;
        $h_check6 = $this
            ->input
            ->post('h_check6');
        $h_check66 = (isset($h_check6)) ? 1 : 0;
        $pe_check6 = $this
            ->input
            ->post('pe_check6');
        $pe_check66 = (isset($pe_check6)) ? 1 : 0;
        $nin_check7 = $this
            ->input
            ->post('nin_check7');
        $nin_check77 = (isset($nin_check7)) ? 1 : 0;
        $madre_check7 = $this
            ->input
            ->post('madre_check7');
        $madre_check77 = (isset($madre_check7)) ? 1 : 0;
        $padre_check7 = $this
            ->input
            ->post('padre_check7');
        $padre_check77 = (isset($padre_check7)) ? 1 : 0;
        $h_check7 = $this
            ->input
            ->post('h_check7');
        $h_check77 = (isset($h_check7)) ? 1 : 0;
        $pe_check7 = $this
            ->input
            ->post('pe_check7');
        $pe_check77 = (isset($pe_check7)) ? 1 : 0;
        $nin_check8 = $this
            ->input
            ->post('nin_check8');
        $nin_check88 = (isset($nin_check8)) ? 1 : 0;
        $madre_check8 = $this
            ->input
            ->post('madre_check8');
        $madre_check88 = (isset($madre_check8)) ? 1 : 0;
        $padre_check8 = $this
            ->input
            ->post('padre_check8');
        $padre_check88 = (isset($padre_check8)) ? 1 : 0;
        $h_check8 = $this
            ->input
            ->post('h_check8');
        $h_check88 = (isset($h_check8)) ? 1 : 0;
        $pe_check8 = $this
            ->input
            ->post('pe_check8');
        $pe_check88 = (isset($pe_check8)) ? 1 : 0;
        $nin_check9 = $this
            ->input
            ->post('nin_check9');
        $nin_check99 = (isset($nin_check9)) ? 1 : 0;
        $madre_check9 = $this
            ->input
            ->post('madre_check9');
        $madre_check99 = (isset($madre_check9)) ? 1 : 0;
        $padre_check9 = $this
            ->input
            ->post('padre_check9');
        $padre_check99 = (isset($padre_check9)) ? 1 : 0;
        $h_check9 = $this
            ->input
            ->post('h_check9');
        $h_check99 = (isset($h_check9)) ? 1 : 0;
        $pe_check9 = $this
            ->input
            ->post('pe_check9');
        $pe_check99 = (isset($pe_check9)) ? 1 : 0;
        $nin_check10 = $this
            ->input
            ->post('nin_check10');
        $nin_check1010 = (isset($nin_check10)) ? 1 : 0;
        $madre_check10 = $this
            ->input
            ->post('madre_check10');
        $madre_check1010 = (isset($madre_check10)) ? 1 : 0;
        $padre_check10 = $this
            ->input
            ->post('padre_check10');
        $padre_check1010 = (isset($padre_check10)) ? 1 : 0;
        $h_check10 = $this
            ->input
            ->post('h_check10');
        $h_check1010 = (isset($h_check10)) ? 1 : 0;
        $pe_check10 = $this
            ->input
            ->post('pe_check10');
        $pe_check1010 = (isset($pe_check10)) ? 1 : 0;
        $nin_check11 = $this
            ->input
            ->post('nin_check11');
        $nin_check1111 = (isset($nin_check11)) ? 1 : 0;
        $madre_check11 = $this
            ->input
            ->post('madre_check11');
        $madre_check1111 = (isset($madre_check11)) ? 1 : 0;
        $padre_check11 = $this
            ->input
            ->post('padre_check11');
        $padre_check1111 = (isset($padre_check11)) ? 1 : 0;
        $h_check11 = $this
            ->input
            ->post('h_check11');
        $h_check1111 = (isset($h_check11)) ? 1 : 0;
        $pe_check11 = $this
            ->input
            ->post('pe_check11');
        $pe_check1111 = (isset($pe_check11)) ? 1 : 0;
        $neop_check12 = $this
            ->input
            ->post('neop_check12');
        $neop_check1212 = (isset($neop_check12)) ? 1 : 0;
        $madre_check12 = $this
            ->input
            ->post('madre_check12');
        $madre_check1212 = (isset($madre_check12)) ? 1 : 0;
        $padre_check12 = $this
            ->input
            ->post('padre_check12');
        $padre_check1212 = (isset($padre_check12)) ? 1 : 0;
        $h_check12 = $this
            ->input
            ->post('h_check12');
        $h_check1212 = (isset($h_check12)) ? 1 : 0;
        $pe_check12 = $this
            ->input
            ->post('pe_check12');
        $pe_check1212 = (isset($pe_check12)) ? 1 : 0;
        $psi_check13 = $this
            ->input
            ->post('psi_check13');
        $psi_check1313 = (isset($psi_check13)) ? 1 : 0;
        $madre_check13 = $this
            ->input
            ->post('madre_check13');
        $madre_check1313 = (isset($madre_check13)) ? 1 : 0;
        $padre_check13 = $this
            ->input
            ->post('padre_check13');
        $padre_check1313 = (isset($padre_check13)) ? 1 : 0;
        $h_check13 = $this
            ->input
            ->post('h_check13');
        $h_check1313 = (isset($h_check13)) ? 1 : 0;
        $pe_check13 = $this
            ->input
            ->post('pe_check13');
        $pe_check1313 = (isset($pe_check13)) ? 1 : 0;
        $obs_check14 = $this
            ->input
            ->post('obs_check14');
        $obs_check1414 = (isset($obs_check14)) ? 1 : 0;
        $madre_check14 = $this
            ->input
            ->post('madre_check14');
        $madre_check1414 = (isset($madre_check14)) ? 1 : 0;
        $padre_check14 = $this
            ->input
            ->post('padre_check14');
        $padre_check1414 = (isset($padre_check14)) ? 1 : 0;
        $h_check14 = $this
            ->input
            ->post('h_check14');
        $h_check1414 = (isset($h_check14)) ? 1 : 0;
        $pe_check14 = $this
            ->input
            ->post('pe_check14');
        $pe_check1414 = (isset($pe_check14)) ? 1 : 0;
        $ulp_check15 = $this
            ->input
            ->post('ulp_check15');
        $ulp_check1515 = (isset($ulp_check15)) ? 1 : 0;
        $madre_check15 = $this
            ->input
            ->post('madre_check15');
        $madre_check1515 = (isset($madre_check15)) ? 1 : 0;
        $padre_check15 = $this
            ->input
            ->post('padre_check15');
        $padre_check1515 = (isset($padre_check15)) ? 1 : 0;
        $h_check15 = $this
            ->input
            ->post('h_check15');
        $h_check1515 = (isset($h_check15)) ? 1 : 0;
        $pe_check15 = $this
            ->input
            ->post('pe_check15');
        $pe_check1515 = (isset($pe_check15)) ? 1 : 0;
        $art_check16 = $this
            ->input
            ->post('art_check16');
        $art_check1616 = (isset($art_check16)) ? 1 : 0;
        $madre_check16 = $this
            ->input
            ->post('madre_check16');
        $madre_check1616 = (isset($madre_check16)) ? 1 : 0;
        $padre_check16 = $this
            ->input
            ->post('padre_check16');
        $padre_check1616 = (isset($padre_check16)) ? 1 : 0;
        $h_check16 = $this
            ->input
            ->post('h_check16');
        $h_check1616 = (isset($h_check16)) ? 1 : 0;
        $pe_check16 = $this
            ->input
            ->post('pe_check16');
        $pe_check1616 = (isset($pe_check16)) ? 1 : 0;
        $art_check016 = $this
            ->input
            ->post('art_check016');
        $art_check01616 = (isset($art_check016)) ? 1 : 0;
        $madre_check016 = $this
            ->input
            ->post('madre_check016');
        $madre_check01616 = (isset($madre_check016)) ? 1 : 0;
        $padre_check016 = $this
            ->input
            ->post('padre_check016');
        $padre_check01616 = (isset($padre_check016)) ? 1 : 0;
        $h_check016 = $this
            ->input
            ->post('h_check016');
        $h_check01616 = (isset($h_check016)) ? 1 : 0;
        $pe_check016 = $this
            ->input
            ->post('pe_check016');
        $pe_check01616 = (isset($pe_check016)) ? 1 : 0;
        $zika_check17 = $this
            ->input
            ->post('zika_check17');
        $zika_check1717 = (isset($zika_check17)) ? 1 : 0;
        $madre_check17 = $this
            ->input
            ->post('madre_check17');
        $madre_check1717 = (isset($madre_check17)) ? 1 : 0;
        $padre_check17 = $this
            ->input
            ->post('padre_check17');
        $padre_check1717 = (isset($padre_check17)) ? 1 : 0;
        $h_check17 = $this
            ->input
            ->post('h_check17');
        $h_check1717 = (isset($h_check17)) ? 1 : 0;
        $pe_check17 = $this
            ->input
            ->post('pe_check17');
        $pe_check1717 = (isset($pe_check17)) ? 1 : 0;
        $save = array(
            'todo' => $todo_check1,
            'car_nin' => $car_nin_check1,
            'car_m' => $madre_check1,
            'car_p' => $padre_check1,
            'car_h' => $car_h_check1,
            'car_pe' => $car_pe_check1,
            'car_text' => $this
                ->input
                ->post('car_text') ,
            'hip_nin' => $nin_check22,
            'hip_m' => $madre_check22,
            'hip_p' => $padre_check22,
            'hip_h' => $h_check22,
            'hip_pe' => $pe_check22,
            'hip_text' => $this
                ->input
                ->post('hip_text') ,
            'ec_nin' => $nin_check33,
            'ec_m' => $madre_check33,
            'ec_p' => $padre_check33,
            'ec_h' => $h_check33,
            'ec_pe' => $pe_check33,
            'ec_text' => $this
                ->input
                ->post('ec_text') ,
            'ep_nin' => $nin_check44,
            'ep_m' => $madre_check44,
            'ep_p' => $padre_check44,
            'ep_h' => $h_check44,
            'ep_pe' => $pe_check44,
            'ep_text' => $this
                ->input
                ->post('ep_text') ,
            'as_nin' => $nin_check55,
            'as_m' => $madre_check55,
            'as_p' => $padre_check55,
            'as_h' => $h_check55,
            'as_pe' => $pe_check55,
            'as_text' => $this
                ->input
                ->post('as_text') ,
            'enre_nin' => $nin_check055,
            'enre_m' => $madre_check055,
            'enre_p' => $padre_check055,
            'enre_h' => $h_check055,
            'enre_pe' => $pe_check055,
            'enre_text' => $this
                ->input
                ->post('enre_text') ,
            'tub_nin' => $nin_check66,
            'tub_m' => $madre_check66,
            'tub_p' => $padre_check66,
            'tub_h' => $h_check66,
            'tub_pe' => $pe_check66,
            'tub_text' => $this
                ->input
                ->post('tub_text') ,
            'dia_nin' => $nin_check77,
            'dia_m' => $madre_check77,
            'dia_p' => $padre_check77,
            'dia_h' => $h_check77,
            'dia_pe' => $pe_check77,
            'dia_text' => $this
                ->input
                ->post('dia_text') ,
            'tir_nin' => $nin_check88,
            'tir_m' => $madre_check88,
            'tir_p' => $padre_check88,
            'tir_h' => $h_check88,
            'tir_pe' => $pe_check88,
            'tir_text' => $this
                ->input
                ->post('tir_text') ,
            'hep_tipo' => $this
                ->input
                ->post('hep_tipo') ,
            'hep_nin' => $nin_check99,
            'hep_m' => $madre_check99,
            'hep_p' => $padre_check99,
            'hep_h' => $h_check99,
            'hep_pe' => $pe_check99,
            'hep_text' => $this
                ->input
                ->post('hep_text') ,
            'enfr_nin' => $nin_check1010,
            'enfr_m' => $madre_check1010,
            'enfr_p' => $padre_check1010,
            'enfr_h' => $h_check1010,
            'enfr_pe' => $pe_check1010,
            'enfr_text' => $this
                ->input
                ->post('enfr_text') ,
            'falc_nin' => $nin_check1111,
            'falc_m' => $madre_check1111,
            'falc_p' => $padre_check1111,
            'falc_h' => $h_check1111,
            'falc_pe' => $pe_check1111,
            'falc_text' => $this
                ->input
                ->post('falc_text') ,
            'neop_nin' => $neop_check1212,
            'neop_m' => $madre_check1212,
            'neop_p' => $padre_check1212,
            'neop_h' => $h_check1212,
            'neop_pe' => $pe_check1212,
            'neop_text' => $this
                ->input
                ->post('neop_text') ,
            'psi_nin' => $psi_check1313,
            'psi_m' => $madre_check1313,
            'psi_p' => $padre_check1313,
            'psi_h' => $h_check1313,
            'psi_pe' => $pe_check1313,
            'psi_text' => $this
                ->input
                ->post('psi_text') ,
            'obs_nin' => $obs_check1414,
            'obs_m' => $madre_check1414,
            'obs_p' => $padre_check1414,
            'obs_h' => $h_check1414,
            'obs_pe' => $pe_check1414,
            'obs_text' => $this
                ->input
                ->post('obs_text') ,
            'ulp_nin' => $ulp_check1515,
            'ulp_m' => $madre_check1515,
            'ulp_p' => $padre_check1515,
            'ulp_h' => $h_check1515,
            'ulp_pe' => $pe_check1515,
            'ulp_text' => $this
                ->input
                ->post('ulp_text') ,
            'art_nin' => $art_check1616,
            'art_m' => $madre_check1616,
            'art_p' => $padre_check1616,
            'art_h' => $h_check1616,
            'art_pe' => $pe_check1616,
            'art_text' => $this
                ->input
                ->post('art_text') ,
            'hem_nin' => $art_check01616,
            'hem_m' => $madre_check01616,
            'hem_p' => $padre_check01616,
            'hem_h' => $h_check01616,
            'hem_pe' => $pe_check01616,
            'hem_text' => $this
                ->input
                ->post('hem_text') ,
            'zika_nin' => $zika_check1717,
            'zika_m' => $madre_check1717,
            'zika_p' => $padre_check1717,
            'zika_h' => $h_check1717,
            'zika_pe' => $pe_check1717,
            'zika_text' => $this
                ->input
                ->post('zika_text') ,
            'otros' => $this
                ->input
                ->post('otros') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'date_modif' => $insert_date,
            'operator' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id') ,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $idMarPos = $this
            ->model_admin
            ->marquePositivo($save);
        $counMarP = $this
            ->model_admin
            ->countAnte1($this
            ->input
            ->post('hist_id'));
        if ($counMarP > 1)
        {
            $this
                ->model_admin
                ->DeleteDuplicateMarqueP($idMarPos);
        }
        $newMpat = $this
            ->input
            ->post('newMpat');
        if ($newMpat)
        {
            foreach ($newMpat as $key => $med)
            {
                $savecd = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'part' => 'gnl',
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($savecd);
            }
        }
        $save2 = array(
            'maltratof' => $this
                ->input
                ->post('textmaltrato_g') ,
            'abusos' => $this
                ->input
                ->post('textabuso_g') ,
            'negligencia' => $this
                ->input
                ->post('textneg_g') ,
            'maltrato' => $this
                ->input
                ->post('maltratoemo_g') ,
            'alimentos' => $this
                ->input
                ->post('alimentos_al') ,
            'medicamentos' => $this
                ->input
                ->post('medicamentos_al') ,
            'otros' => $this
                ->input
                ->post('otros_al') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'update_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id')
        );
        $idDes = $this
            ->model_admin
            ->DesantAl($save2);
        $counDesa = $this
            ->model_admin
            ->countDesarollo($this
            ->input
            ->post('hist_id'));
        if ($counDesa > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyDesarollo($idDes);
        }
        $save3 = array(
            'quirurgicos' => $this
                ->input
                ->post('quirurgicos') ,
            'gineco' => $this
                ->input
                ->post('gineco') ,
            'abdominal' => $this
                ->input
                ->post('abdominal') ,
            'toracica' => $this
                ->input
                ->post('toracica') ,
            'transfusion' => $this
                ->input
                ->post('transfusion') ,
            'otros1' => $this
                ->input
                ->post('otros1_g') ,
            'hepatis' => $this
                ->input
                ->post('hepatis') ,
            'hpv' => $this
                ->input
                ->post('hpv') ,
            'toxoide' => $this
                ->input
                ->post('toxoide') ,
            'grouposang' => $this
                ->input
                ->post('grouposang') ,
            'tipificacion' => $this
                ->input
                ->post('tipificacion') ,
            'rh' => $this
                ->input
                ->post('rhoa') ,
            'violencia1' => $this
                ->input
                ->post('violencia1') ,
            'violencia2' => $this
                ->input
                ->post('violencia2') ,
            'violencia3' => $this
                ->input
                ->post('violencia3') ,
            'violencia4' => $this
                ->input
                ->post('violencia4') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id')
        );
        $idAtO = $this
            ->model_admin
            ->saveAnteOtros($save3);
        $counAntOt = $this
            ->model_admin
            ->countAntOtros($this
            ->input
            ->post('hist_id'));
        if ($counAntOt > 1)
        {
            $this
                ->model_admin
                ->DeleteAntOtros($idAtO);
        }
        if (!empty($medicine))
        {
            foreach ($medicine as $med)
            {
                $save = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($save);
            };
        };
        $this
            ->model_admin
            ->deleteMedNinguno();
        $save4 = array(
            'cafe_cant' => $this
                ->input
                ->post('hab_c_caf') ,
            'cafe_frec' => $this
                ->input
                ->post('hab_f_caf') ,
            'pipa_cant' => $this
                ->input
                ->post('hab_c_pip') ,
            'pipa_frec' => $this
                ->input
                ->post('hab_f_pip') ,
            'ciga_can' => $this
                ->input
                ->post('hab_c_ciga') ,
            'ciga_frec' => $this
                ->input
                ->post('hab_f_ciga') ,
            'alc_can' => $this
                ->input
                ->post('hab_c_al') ,
            'alc_frec' => $this
                ->input
                ->post('hab_f_al') ,
            'tab_can' => $this
                ->input
                ->post('hab_c_tab') ,
            'tab_frec' => $this
                ->input
                ->post('hab_f_tab') ,
            'hab_c_drug' => $this
                ->input
                ->post('hab_c_drug') ,
            'hab_f_drug' => $this
                ->input
                ->post('hab_f_drug') ,
            'hookah' => $this
                ->input
                ->post('hookah') ,
            'hab_f_hookah' => $this
                ->input
                ->post('hab_f_hookah') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'update_time' => $insert_date
        );
        $idHabT = $this
            ->model_admin
            ->saveHabitosToxicos($save4);
        $counHabT = $this
            ->model_admin
            ->countHabitosToxicos($this
            ->input
            ->post('hist_id'));
        if ($counHabT > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyHabitosToxicos($idHabT);
        }
        if (!empty($hab_t_drug))
        {
            foreach ($hab_t_drug as $drug)
            {
                $save = array(
                    'name' => $drug,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id')
                );
                $this
                    ->model_admin
                    ->SaveDrug($save);
            };
        }
        $examFisico = array(
            'peso' => $this
                ->input
                ->post('peso') ,
            'kg' => $this
                ->input
                ->post('kg') ,
            'talla' => $this
                ->input
                ->post('talla') ,
            'pulgada_exf' => $this
                ->input
                ->post('pulgada') ,
            'imc' => $this
                ->input
                ->post('imc') ,
            'ta' => $this
                ->input
                ->post('ta') ,
            'fr' => $this
                ->input
                ->post('fr') ,
            'fc' => $this
                ->input
                ->post('fc') ,
            'hg' => $this
                ->input
                ->post('hg') ,
            'tempo' => $this
                ->input
                ->post('tempo') ,
            'pulso' => $this
                ->input
                ->post('pulso') ,
            'glicemia' => $this
                ->input
                ->post('glicemia') ,
            'radio' => $this
                ->input
                ->post('radio_signo') ,
            'neuro_s' => $this
                ->input
                ->post('neuro_s') ,
            'neuro_text' => $this
                ->input
                ->post('neuro_text') ,
            'cabeza' => $this
                ->input
                ->post('cabeza') ,
            'cabeza_text' => $this
                ->input
                ->post('cabeza_text') ,
            'cuello' => $this
                ->input
                ->post('cuello') ,
            'cuello_text' => $this
                ->input
                ->post('cuello_text') ,
            'abd_insp' => $this
                ->input
                ->post('abd_insp') ,
            'ausc' => $this
                ->input
                ->post('ausc') ,
            'perc' => $this
                ->input
                ->post('perc') ,
            'palpa' => $this
                ->input
                ->post('palpa') ,
            'ext_sup_text' => $this
                ->input
                ->post('ext_sup_text') ,
            'ext_sup' => $this
                ->input
                ->post('ext_sup') ,
            'torax' => $this
                ->input
                ->post('torax') ,
            'torax_text' => $this
                ->input
                ->post('torax_text') ,
            'ext_inf' => $this
                ->input
                ->post('ext_inf') ,
            'ext_inft' => $this
                ->input
                ->post('ext_inft') ,
            'cuad_inf_ext1' => $this
                ->input
                ->post('cuad_inf_ext1') ,
            'mama_izq1' => $this
                ->input
                ->post('mama_izq1') ,
            'cuad_sup_ext1' => $this
                ->input
                ->post('cuad_sup_ext1') ,
            'cuad_inf_ext11' => $this
                ->input
                ->post('cuad_inf_ext11') ,
            'region_retro1' => $this
                ->input
                ->post('region_retro1') ,
            'region_areola_pezon1' => $this
                ->input
                ->post('region_areola_pezon1') ,
            'region_ax1' => $this
                ->input
                ->post('region_ax1') ,
            'cuad_inf_ext2' => $this
                ->input
                ->post('cuad_inf_ext2') ,
            'mama_izq2' => $this
                ->input
                ->post('mama_izq2') ,
            'cuad_sup_ext2' => $this
                ->input
                ->post('cuad_sup_ext2') ,
            'cuad_inf_ext22' => $this
                ->input
                ->post('cuad_inf_ext22') ,
            'region_retro2' => $this
                ->input
                ->post('region_retro2') ,
            'region_areola_pezon2' => $this
                ->input
                ->post('region_areola_pezon2') ,
            'region_ax2' => $this
                ->input
                ->post('region_ax2') ,
            'especuloscopia' => $this
                ->input
                ->post('especuloscopia') ,
            'tacto_bima' => $this
                ->input
                ->post('tacto_bima') ,
            'cervix' => $this
                ->input
                ->post('cervix') ,
            'cervix_text' => $this
                ->input
                ->post('cervix_text') ,
            'utero_text' => $this
                ->input
                ->post('utero_text') ,
            'anexo_derecho_text' => $this
                ->input
                ->post('anexo_derecho_text') ,
            'anexo_iz_text' => $this
                ->input
                ->post('anexo_iz_text') ,
            'inspection_vulval' => $this
                ->input
                ->post('inspection_vulval') ,
            'inspection_vulval_text' => $this
                ->input
                ->post('inspection_vulval_text') ,
            'rectal_text' => $this
                ->input
                ->post('rectal_text') ,
            'rectal' => $this
                ->input
                ->post('rectal') ,
            'genitalm' => $this
                ->input
                ->post('genitalm') ,
            'genitalm_text' => $this
                ->input
                ->post('genitalm_text') ,
            'genitalf_text' => $this
                ->input
                ->post('genitalf_text') ,
            'genitalf' => $this
                ->input
                ->post('genitalf') ,
            'vagina' => $this
                ->input
                ->post('vagina') ,
            'vagina_text' => $this
                ->input
                ->post('vagina_text') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $id_signo = $this
            ->model_admin
            ->saveExamenFisico($examFisico);
        $examFis = $this
            ->db
            ->select('*')
            ->where('id_sig', $id_signo)->get('h_c_examen_fisico')
            ->row_array();
        if ($examFis['peso'] == 0 && $examFis['kg'] == 0 && $examFis['talla'] == '' && $examFis['imc'] == '' && $examFis['ta'] == '' && $examFis['fr'] == '' && $examFis['fc'] == '' && $examFis['hg'] == '' && $examFis['tempo'] == '' && $examFis['pulso'] == '' && $examFis['glicemia'] == 0 && $examFis['neuro_s'] == '' && $examFis['neuro_text'] == '' && $examFis['cabeza'] == '' && $examFis['cabeza_text'] == '' && $examFis['cuello'] == '' && $examFis['cuello_text'] == '' && $examFis['abd_insp'] == '' && $examFis['ausc'] == '' && $examFis['perc'] == '' && $examFis['palpa'] == '' && $examFis['ext_sup'] == '' && $examFis['ext_sup_text'] == '' && $examFis['torax'] == '' && $examFis['torax_text'] == '' && $examFis['ext_inf'] == '' && $examFis['ext_inft'] == '' && $examFis['vagina_text'] == '' && $examFis['vagina'] == '' && $examFis['cuad_inf_ext1'] == '' && $examFis['mama_izq1'] == '' && $examFis['cuad_sup_ext1'] == '' && $examFis['cuad_inf_ext11'] == '' && $examFis['region_retro1'] == '' && $examFis['region_areola_pezon1'] == '' && $examFis['region_ax1'] == '' && $examFis['cuad_inf_ext2'] == '' && $examFis['mama_izq2'] == '' && $examFis['cuad_sup_ext2'] == '' && $examFis['cuad_inf_ext22'] == '' && $examFis['region_retro2'] == '' && $examFis['region_areola_pezon2'] == '' && $examFis['region_ax2'] == '' && $examFis['especuloscopia'] == '' && $examFis['cervix'] == '' && $examFis['cervix_text'] == '' && $examFis['utero_text'] == '' && $examFis['anexo_derecho_text'] == '' && $examFis['anexo_iz_text'] == '' && $examFis['inspection_vulval'] == '' && $examFis['inspection_vulval_text'] == '' && $examFis['tacto_bima'] == '' && $examFis['rectal_text'] == '' && $examFis['rectal'] == '' && $examFis['genitalm'] == '' && $examFis['genitalm_text'] == '' && $examFis['genitalf_text'] == '' && $examFis['genitalf'] == '' && $examFis['vagina'] == '' && $examFis['vagina_text'] == '')
        {
            $this
                ->model_admin
                ->DeleteEmptyExamFis($id_signo);
        }
        $saveExOt = array(
            'oido1' => $this
                ->input
                ->post('oido1') ,
            'oido2' => $this
                ->input
                ->post('oido2') ,
            'nariz' => $this
                ->input
                ->post('nariz') ,
            'boca' => $this
                ->input
                ->post('boca') ,
            'otorrino_cuello1' => $this
                ->input
                ->post('otorrino_cuello1') ,
            'otorrino_cuello2' => $this
                ->input
                ->post('otorrino_cuello2') ,
            'observaciones_ot' => $this
                ->input
                ->post('observaciones_ot') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'user_id' => $this
                ->input
                ->post('user_id') ,
            'id_sig' => $id_signo
        );
        $this
            ->db
            ->insert("h_c_examen_fis_otorrino", $saveExOt);
        $whereot = array(
            'oido1' => '',
            'oido2' => '',
            'nariz' => '',
            'otorrino_cuello1' => '',
            'otorrino_cuello2' => '',
            'observaciones_ot' => '',
        );
        $this
            ->db
            ->where($whereot);
        $this
            ->db
            ->delete('h_c_examen_fis_otorrino');
        $saveExamSis = array(
            'sisneuro' => $this
                ->input
                ->post('sisneuro') ,
            'neurologico' => $this
                ->input
                ->post('neurologico') ,
            'siscardio' => $this
                ->input
                ->post('siscardio') ,
            'cardiova' => $this
                ->input
                ->post('cardiova') ,
            'sist_uro' => $this
                ->input
                ->post('sist_uro') ,
            'urogenital' => $this
                ->input
                ->post('urogenital') ,
            'sis_mu_e' => $this
                ->input
                ->post('sis_mu_e') ,
            'musculoes' => $this
                ->input
                ->post('musculoes') ,
            'sist_resp' => $this
                ->input
                ->post('sist_resp') ,
            'nervioso' => $this
                ->input
                ->post('nervioso') ,
            'linfatico' => $this
                ->input
                ->post('linfatico') ,
            'digestivo' => $this
                ->input
                ->post('digestivo') ,
            'respiratorio' => $this
                ->input
                ->post('respiratorio') ,
            'genitourinario' => $this
                ->input
                ->post('genitourinario') ,
            'sist_diges' => $this
                ->input
                ->post('sist_diges') ,
            'sist_endo' => $this
                ->input
                ->post('sist_endo') ,
            'endocrino' => $this
                ->input
                ->post('endocrino') ,
            'sist_rela' => $this
                ->input
                ->post('sist_rela') ,
            'otros_ex_sis' => $this
                ->input
                ->post('otros_ex_sis') ,
            'cardiova' => $this
                ->input
                ->post('cardiova') ,
            'dorsales' => $this
                ->input
                ->post('dorsales') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->saveExameneSistema($saveExamSis);
        $this
            ->model_admin
            ->DeleteEmptyExameneSistema($this
            ->input
            ->post('hist_id'));
        $sifilisc = $this
            ->input
            ->post('sifilisc');
        $sifilisc1 = (isset($sifilisc)) ? 1 : 0;
        $gonorreac = $this
            ->input
            ->post('gonorreac');
        $gonorreac1 = (isset($gonorreac)) ? 1 : 0;
        $clamidiac = $this
            ->input
            ->post('clamidiac');
        $clamidiac1 = (isset($clamidiac)) ? 1 : 0;
        $save1 = array(
            'optradio' => $this
                ->input
                ->post('optradio') ,
            'edad' => $this
                ->input
                ->post('edad') ,
            'numero' => $this
                ->input
                ->post('numero') ,
            'sexual' => $this
                ->input
                ->post('sexual') ,
            'pareja' => $this
                ->input
                ->post('pareja') ,
            'califica' => $this
                ->input
                ->post('califica') ,
            'califica_text' => $this
                ->input
                ->post('califica_text') ,
            'utilizo' => $this
                ->input
                ->post('utilizo') ,
            'sexual2' => $this
                ->input
                ->post('sexual2') ,
            'planif' => $this
                ->input
                ->post('planif') ,
            'planif_text' => $this
                ->input
                ->post('planif_text') ,
            'embara' => $this
                ->input
                ->post('embara') ,
            'menarquia' => $this
                ->input
                ->post('menarquia') ,
            'fecha_ul_m' => $this
                ->input
                ->post('fecha_ul_m') ,
            'fecha_ovulacion' => $this
                ->input
                ->post('fechaOvulacion') ,
            'semana_fertil' => $this
                ->input
                ->post('semanaFertil') ,
            'amenorea_text' => $this
                ->input
                ->post('amenoreaText') ,
            'amenorea_tiempo' => $this
                ->input
                ->post('amenoreaTiempo') ,
            'menaop' => $this
                ->input
                ->post('menaop') ,
            'cliclo' => $this
                ->input
                ->post('cliclo') ,
            'cliclo_text' => $this
                ->input
                ->post('cliclo_text') ,
            'dura_sang' => $this
                ->input
                ->post('dura_sang') ,
            'dismeno' => $this
                ->input
                ->post('dismeno') ,
            'fecha_ul_pap' => $this
                ->input
                ->post('fecha_ul_pap') ,
            'ant_pap_re' => $this
                ->input
                ->post('ant_pap_re') ,
            'ant_pap_re_text' => $this
                ->input
                ->post('ant_pap_re_text') ,
            'realiza_auto' => $this
                ->input
                ->post('realiza_auto') ,
            'realiza_auto_text' => $this
                ->input
                ->post('realiza_auto_text') ,
            'fecha_ul_mama' => $this
                ->input
                ->post('fecha_ul_mama') ,
            'p' => $this
                ->input
                ->post('p') ,
            'a' => $this
                ->input
                ->post('a') ,
            'c' => $this
                ->input
                ->post('c') ,
            'e' => $this
                ->input
                ->post('e') ,
            'totalGest' => $this
                ->input
                ->post('totalGest') ,
            'otro_infeccion1' => $this
                ->input
                ->post('otro_infeccion1') ,
            'cant_sang' => $this
                ->input
                ->post('cant_sang') ,
            'nuligesta' => $this
                ->input
                ->post('nuligesta') ,
            'complica' => $this
                ->input
                ->post('complica') ,
            'complica_text' => $this
                ->input
                ->post('complica_text') ,
            'complica_dur' => $this
                ->input
                ->post('complica_dur') ,
            'complica_dur_text' => $this
                ->input
                ->post('complica_dur_text') ,
            'infec_tran' => $this
                ->input
                ->post('infec_tran') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'hist_id' => $this
                ->input
                ->post('hist_id') ,
            'date_time' => $insert_date,
            'update_time' => $insert_date,
            'infeccion1' => $sifilisc1,
            'infeccion2' => $gonorreac1,
            'infeccion3' => $clamidiac1,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->saveAntssr($save1);
        $this
            ->model_admin
            ->DeleteEmptySSR($this
            ->input
            ->post('hist_id'));
        $fiebre1 = $this
            ->input
            ->post('fiebre1');
        $fiebre = (isset($fiebre1)) ? 1 : 0;
        $artra1 = $this
            ->input
            ->post('artra1');
        $artra = (isset($artra1)) ? 1 : 0;
        $mia1 = $this
            ->input
            ->post('mia1');
        $mia = (isset($mia1)) ? 1 : 0;
        $exa1 = $this
            ->input
            ->post('exa1');
        $exa = (isset($exa1)) ? 1 : 0;
        $con1 = $this
            ->input
            ->post('con1');
        $con = (isset($con1)) ? 1 : 0;
        $nig11 = $this
            ->input
            ->post('nig11');
        $nig1 = (isset($nig11)) ? 1 : 0;
        $nig22 = $this
            ->input
            ->post('nig22');
        $nig2 = (isset($nig22)) ? 1 : 0;
        $nig33 = $this
            ->input
            ->post('nig33');
        $nig3 = (isset($nig33)) ? 1 : 0;
        $operationobs = $this
            ->input
            ->post('operationobs');
        $save = array(
            'dia1' => $this
                ->input
                ->post('dia1') ,
            'tbc1' => $this
                ->input
                ->post('tbc1') ,
            'hip1' => $this
                ->input
                ->post('hip1') ,
            'pelv' => $this
                ->input
                ->post('pelv') ,
            'infert' => $this
                ->input
                ->post('inf') ,
            'otros1' => $this
                ->input
                ->post('otros1') ,
            'otros1_text' => $this
                ->input
                ->post('otros1_text') ,
            'dia2' => $this
                ->input
                ->post('dia2') ,
            'tbc2' => $this
                ->input
                ->post('tbc2') ,
            'hip2' => $this
                ->input
                ->post('hip2') ,
            'gem' => $this
                ->input
                ->post('gem') ,
            'otros2' => $this
                ->input
                ->post('otros2') ,
            'otros2_text' => $this
                ->input
                ->post('otros2_text') ,
            'fiebre' => $fiebre,
            'artra' => $artra,
            'mia' => $mia,
            'exa' => $exa,
            'con' => $con,
            'hist_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->saveObstetrico1($save);
        $this
            ->model_admin
            ->DeleteEmptyObs1($this
            ->input
            ->post('hist_id'));
        $save1 = array(
            'nig1' => $nig1,
            'nig2' => $nig2,
            'nig3' => $nig3,
            'partos' => $this
                ->input
                ->post('partos') ,
            'arbotos' => $this
                ->input
                ->post('arbotos') ,
            'vaginales' => $this
                ->input
                ->post('vaginales') ,
            'viven' => $this
                ->input
                ->post('viven') ,
            'gestas' => $this
                ->input
                ->post('gestas') ,
            'cesareas' => $this
                ->input
                ->post('cesareas') ,
            'muertos1' => $this
                ->input
                ->post('muertos1') ,
            'nacidov1' => $this
                ->input
                ->post('nacidov1') ,
            'nacidom1' => $this
                ->input
                ->post('nacidom1') ,
            'despues1s' => $this
                ->input
                ->post('despues1s') ,
            'otrosc' => $this
                ->input
                ->post('otrosc') ,
            'rn' => $this
                ->input
                ->post('rn') ,
            'fin' => $this
                ->input
                ->post('fin') ,
            'hist_id' => $this
                ->input
                ->post('hist_id')
        );
        $this
            ->model_admin
            ->saveObstetrico2($save1);
        $vdrl11 = $this
            ->input
            ->post('vdrl11');
        $prev_act = $this
            ->input
            ->post('prev_act');
        $vdrl1 = (isset($vdrl11)) ? 1 : 0;
        $vdrl22 = $this
            ->input
            ->post('vdrl22');
        $vdrl2 = (isset($vdrl22)) ? 1 : 0;
        $save2 = array(
            'vdrl1' => $vdrl1,
            'vdrl2' => $vdrl2,
            'fecha1' => $this
                ->input
                ->post('fecha1') ,
            'fecha2' => $this
                ->input
                ->post('fecha2') ,
            'fecha3' => $this
                ->input
                ->post('fecha3') ,
            'fecha4' => $this
                ->input
                ->post('fecha4') ,
            'sono1' => $this
                ->input
                ->post('sono1') ,
            'sono2' => $this
                ->input
                ->post('sono2') ,
            'sono3' => $this
                ->input
                ->post('sono3') ,
            'sono4' => $this
                ->input
                ->post('sono4') ,
            'sonodia1' => $this
                ->input
                ->post('sonodia1') ,
            'sonodia2' => $this
                ->input
                ->post('sonodia2') ,
            'sonodia3' => $this
                ->input
                ->post('sonodia3') ,
            'sonodia4' => $this
                ->input
                ->post('sonodia4') ,
            'diarest1' => $this
                ->input
                ->post('diarest1') ,
            'diarest2' => $this
                ->input
                ->post('diarest2') ,
            'diarest3' => $this
                ->input
                ->post('diarest3') ,
            'diarest4' => $this
                ->input
                ->post('diarest4') ,
            'fpp1' => $this
                ->input
                ->post('fpp1') ,
            'fpp2' => $this
                ->input
                ->post('fpp2') ,
            'fpp3' => $this
                ->input
                ->post('fpp3') ,
            'fpp4' => $this
                ->input
                ->post('fpp4') ,
            'rest1' => $this
                ->input
                ->post('rest1') ,
            'rest2' => $this
                ->input
                ->post('rest2') ,
            'rest3' => $this
                ->input
                ->post('rest3') ,
            'rest4' => $this
                ->input
                ->post('rest4') ,
            'peso1' => $this
                ->input
                ->post('peso1') ,
            'talla1' => $this
                ->input
                ->post('talla1') ,
            'fum_cal_ges' => $this
                ->input
                ->post('fum_cal_ges') ,
            'fpp_cal_ges' => $this
                ->input
                ->post('fpp_cal_ges') ,
            'sem_act_a' => $this
                ->input
                ->post('sem_act_a') ,
            'prev_act' => $this
                ->input
                ->post('prev_act') ,
            'prev_act_mes' => $this
                ->input
                ->post('prev_act_mes') ,
            'rr' => $this
                ->input
                ->post('r2') ,
            'sencibil' => $this
                ->input
                ->post('sencibil') ,
            'rh' => $this
                ->input
                ->post('rh') ,
            'odont' => $this
                ->input
                ->post('odont') ,
            'papani' => $this
                ->input
                ->post('papani') ,
            'pelvis' => $this
                ->input
                ->post('pelvis') ,
            'colp' => $this
                ->input
                ->post('colp') ,
            'cevix' => $this
                ->input
                ->post('cevix') ,
            'diasmes' => $this
                ->input
                ->post('diasmes') ,
            'rh_option' => $this
                ->input
                ->post('rh_option') ,
            'hist_id' => $this
                ->input
                ->post('hist_id')
        );
        $this
            ->model_admin
            ->saveObstetrico3($save2);
        $save3 = array(
            'pu_fecha1' => $this
                ->input
                ->post('pu_fecha1') ,
            'pu_fecha2' => $this
                ->input
                ->post('pu_fecha2') ,
            'pu_fecha3' => $this
                ->input
                ->post('pu_fecha3') ,
            'pu_t1' => $this
                ->input
                ->post('pu_t1') ,
            'pu_t2' => $this
                ->input
                ->post('pu_t2') ,
            'pu_t3' => $this
                ->input
                ->post('pu_t3') ,
            'pu_pul1' => $this
                ->input
                ->post('pu_pul1') ,
            'pu_pul11' => $this
                ->input
                ->post('pu_pul11') ,
            'pu_pul2' => $this
                ->input
                ->post('pu_pul2') ,
            'pu_pul22' => $this
                ->input
                ->post('pu_pul22') ,
            'pu_pul3' => $this
                ->input
                ->post('pu_pul3') ,
            'pu_pul33' => $this
                ->input
                ->post('pu_pul33') ,
            'pu_ten1' => $this
                ->input
                ->post('pu_ten1') ,
            'pu_ten11' => $this
                ->input
                ->post('pu_ten11') ,
            'pu_ten2' => $this
                ->input
                ->post('pu_ten2') ,
            'pu_ten22' => $this
                ->input
                ->post('pu_ten22') ,
            'pu_ten3' => $this
                ->input
                ->post('pu_ten3') ,
            'pu_ten33' => $this
                ->input
                ->post('pu_ten33') ,
            'pu_inv1' => $this
                ->input
                ->post('pu_inv1') ,
            'pu_inv2' => $this
                ->input
                ->post('pu_inv2') ,
            'pu_inv3' => $this
                ->input
                ->post('pu_inv3') ,
            'loquios1' => $this
                ->input
                ->post('loquios1') ,
            'loquios2' => $this
                ->input
                ->post('loquios2') ,
            'loquios3' => $this
                ->input
                ->post('loquios3') ,
            'hist_id' => $this
                ->input
                ->post('hist_id')
        );
        $this
            ->model_admin
            ->saveObstetrico4($save3);
        $save = array(
            'fecha' => $this
                ->input
                ->post('fecha') ,
            'semana' => $this
                ->input
                ->post('semana') ,
            'peso' => $this
                ->input
                ->post('pesocp') ,
            'tension' => $this
                ->input
                ->post('tension1') ,
            'tension11' => $this
                ->input
                ->post('tension11') ,
            'alt' => $this
                ->input
                ->post('alt1') ,
            'alt11' => $this
                ->input
                ->post('alt11') ,
            'alt111' => $this
                ->input
                ->post('alt111') ,
            'fetal' => $this
                ->input
                ->post('fetal1') ,
            'fetal11' => $this
                ->input
                ->post('fetal11') ,
            'edema' => $this
                ->input
                ->post('edema1') ,
            'edema11' => $this
                ->input
                ->post('edema11') ,
            'otros' => $this
                ->input
                ->post('otroscp') ,
            'evolucion' => $this
                ->input
                ->post('evolucion') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->SaveConPrenatales($save);
        $save2 = array(
            'fecha' => $this
                ->input
                ->post('fecha2cp') ,
            'semana' => $this
                ->input
                ->post('semana2') ,
            'peso' => $this
                ->input
                ->post('peso2') ,
            'tension' => $this
                ->input
                ->post('tension2') ,
            'tension11' => $this
                ->input
                ->post('tension22') ,
            'alt' => $this
                ->input
                ->post('alt2') ,
            'alt11' => $this
                ->input
                ->post('alt22') ,
            'alt111' => $this
                ->input
                ->post('alt222') ,
            'fetal' => $this
                ->input
                ->post('fetal2') ,
            'fetal11' => $this
                ->input
                ->post('fetal22') ,
            'edema' => $this
                ->input
                ->post('edema2') ,
            'edema11' => $this
                ->input
                ->post('edema22') ,
            'otros' => $this
                ->input
                ->post('otros2cp') ,
            'evolucion' => $this
                ->input
                ->post('evolucion2') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date
        );
        $this
            ->model_admin
            ->SaveConPrenatales2($save2);
        $save3 = array(
            'fecha' => $this
                ->input
                ->post('fecha3cp') ,
            'semana' => $this
                ->input
                ->post('semana3') ,
            'peso' => $this
                ->input
                ->post('peso3') ,
            'tension' => $this
                ->input
                ->post('tension3') ,
            'tension11' => $this
                ->input
                ->post('tension33') ,
            'alt' => $this
                ->input
                ->post('alt3') ,
            'alt11' => $this
                ->input
                ->post('alt33') ,
            'alt111' => $this
                ->input
                ->post('alt333') ,
            'fetal' => $this
                ->input
                ->post('fetal3') ,
            'fetal11' => $this
                ->input
                ->post('fetal33') ,
            'edema' => $this
                ->input
                ->post('edema3') ,
            'edema11' => $this
                ->input
                ->post('edema33') ,
            'otros' => $this
                ->input
                ->post('otros3') ,
            'evolucion' => $this
                ->input
                ->post('evolucion3') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date
        );
        $this
            ->model_admin
            ->SaveConPrenatales3($save3);
        $save4 = array(
            'fecha' => $this
                ->input
                ->post('fecha4cp') ,
            'semana' => $this
                ->input
                ->post('semana4') ,
            'peso' => $this
                ->input
                ->post('peso4') ,
            'tension' => $this
                ->input
                ->post('tension4') ,
            'tension11' => $this
                ->input
                ->post('tension44') ,
            'alt' => $this
                ->input
                ->post('alt4') ,
            'alt11' => $this
                ->input
                ->post('alt44') ,
            'alt111' => $this
                ->input
                ->post('alt444') ,
            'fetal' => $this
                ->input
                ->post('fetal4') ,
            'fetal11' => $this
                ->input
                ->post('fetal44') ,
            'edema' => $this
                ->input
                ->post('edema4') ,
            'edema11' => $this
                ->input
                ->post('edema44') ,
            'otros' => $this
                ->input
                ->post('otros4') ,
            'evolucion' => $this
                ->input
                ->post('evolucion4') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date
        );
        $this
            ->model_admin
            ->SaveConPrenatales4($save4);
        $save5 = array(
            'fecha' => $this
                ->input
                ->post('fecha5') ,
            'semana' => $this
                ->input
                ->post('semana5') ,
            'peso' => $this
                ->input
                ->post('peso5') ,
            'tension' => $this
                ->input
                ->post('tension5') ,
            'tension11' => $this
                ->input
                ->post('tension55') ,
            'alt' => $this
                ->input
                ->post('alt5') ,
            'alt11' => $this
                ->input
                ->post('alt55') ,
            'alt111' => $this
                ->input
                ->post('alt555') ,
            'fetal' => $this
                ->input
                ->post('fetal5') ,
            'fetal11' => $this
                ->input
                ->post('fetal55') ,
            'edema' => $this
                ->input
                ->post('edema5') ,
            'edema11' => $this
                ->input
                ->post('edema55') ,
            'otros' => $this
                ->input
                ->post('otros5') ,
            'evolucion' => $this
                ->input
                ->post('evolucion5') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date
        );
        $this
            ->model_admin
            ->SaveConPrenatales5($save5);
        $save6 = array(
            'fecha' => $this
                ->input
                ->post('fecha6') ,
            'semana' => $this
                ->input
                ->post('semana6') ,
            'peso' => $this
                ->input
                ->post('peso6') ,
            'tension' => $this
                ->input
                ->post('tension6') ,
            'tension11' => $this
                ->input
                ->post('tension66') ,
            'alt' => $this
                ->input
                ->post('alt6') ,
            'alt11' => $this
                ->input
                ->post('alt66') ,
            'alt111' => $this
                ->input
                ->post('alt666') ,
            'fetal' => $this
                ->input
                ->post('fetal6') ,
            'fetal11' => $this
                ->input
                ->post('fetal66') ,
            'edema' => $this
                ->input
                ->post('edema6') ,
            'edema11' => $this
                ->input
                ->post('edema66') ,
            'otros' => $this
                ->input
                ->post('otros6') ,
            'evolucion' => $this
                ->input
                ->post('evolucion6') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date
        );
        $this
            ->model_admin
            ->SaveConPrenatales6($save6);
        $save7 = array(
            'fecha' => $this
                ->input
                ->post('fecha7') ,
            'semana' => $this
                ->input
                ->post('semana7') ,
            'peso' => $this
                ->input
                ->post('peso7') ,
            'tension' => $this
                ->input
                ->post('tension7') ,
            'tension11' => $this
                ->input
                ->post('tension77') ,
            'alt' => $this
                ->input
                ->post('alt7') ,
            'alt11' => $this
                ->input
                ->post('alt77') ,
            'alt111' => $this
                ->input
                ->post('alt777') ,
            'fetal' => $this
                ->input
                ->post('fetal7') ,
            'fetal11' => $this
                ->input
                ->post('fetal77') ,
            'edema' => $this
                ->input
                ->post('edema7') ,
            'edema11' => $this
                ->input
                ->post('edema77') ,
            'otros' => $this
                ->input
                ->post('otros7') ,
            'evolucion' => $this
                ->input
                ->post('evolucion7') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date
        );
        $this
            ->model_admin
            ->SaveConPrenatales7($save7);
        $save8 = array(
            'fecha' => $this
                ->input
                ->post('fecha8') ,
            'semana' => $this
                ->input
                ->post('semana8') ,
            'peso' => $this
                ->input
                ->post('peso8') ,
            'tension' => $this
                ->input
                ->post('tension8') ,
            'tension11' => $this
                ->input
                ->post('tension88') ,
            'alt' => $this
                ->input
                ->post('alt8') ,
            'alt11' => $this
                ->input
                ->post('alt88') ,
            'alt111' => $this
                ->input
                ->post('alt888') ,
            'fetal' => $this
                ->input
                ->post('fetal8') ,
            'fetal11' => $this
                ->input
                ->post('fetal88') ,
            'edema' => $this
                ->input
                ->post('edema8') ,
            'edema11' => $this
                ->input
                ->post('edema88') ,
            'otros' => $this
                ->input
                ->post('otros8') ,
            'evolucion' => $this
                ->input
                ->post('evolucion8') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date
        );
        $this
            ->model_admin
            ->SaveConPrenatales8($save8);
        $save9 = array(
            'fecha' => $this
                ->input
                ->post('fecha9') ,
            'semana' => $this
                ->input
                ->post('semana9') ,
            'peso' => $this
                ->input
                ->post('peso9') ,
            'tension' => $this
                ->input
                ->post('tension9') ,
            'tension11' => $this
                ->input
                ->post('tension99') ,
            'alt' => $this
                ->input
                ->post('alt9') ,
            'alt11' => $this
                ->input
                ->post('alt99') ,
            'alt111' => $this
                ->input
                ->post('alt999') ,
            'fetal' => $this
                ->input
                ->post('fetal9') ,
            'fetal11' => $this
                ->input
                ->post('fetal99') ,
            'edema' => $this
                ->input
                ->post('edema9') ,
            'edema11' => $this
                ->input
                ->post('edema99') ,
            'otros' => $this
                ->input
                ->post('otros9') ,
            'evolucion' => $this
                ->input
                ->post('evolucion9') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date
        );
        $this
            ->model_admin
            ->SaveConPrenatales9($save9);
        $this
            ->model_admin
            ->deleteNingunoDroga();
        $this
            ->model_admin
            ->DeleteEmptyControlPrenatal1();
        $this
            ->model_admin
            ->DeleteEmptyControlPrenatal2();
        $this
            ->model_admin
            ->DeleteEmptyControlPrenatal3();
        $this
            ->model_admin
            ->DeleteEmptyControlPrenatal4();
        $this
            ->model_admin
            ->DeleteEmptyControlPrenatal5();
        $this
            ->model_admin
            ->DeleteEmptyControlPrenatal6();
        $this
            ->model_admin
            ->DeleteEmptyControlPrenatal7();
        $this
            ->model_admin
            ->DeleteEmptyControlPrenatal8();
        $this
            ->model_admin
            ->DeleteEmptyControlPrenatal9();
        $query1 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('neuro_s') ,
            'location' => 26
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'name' => $this
                    ->input
                    ->post('neuro_s') ,
                'location' => 26
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save);
        }
        $query2 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cabeza') ,
            'location' => 27
        ));
        if ($query2->num_rows() == 0)
        {
            $save2 = array(
                'name' => $this
                    ->input
                    ->post('cabeza') ,
                'location' => 27
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save2);
        }
        $query3 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cuello') ,
            'location' => 9
        ));
        if ($query3->num_rows() == 0)
        {
            $save3 = array(
                'name' => $this
                    ->input
                    ->post('cuello') ,
                'location' => 9
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save3);
        }
        $query4 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('abd_insp') ,
            'location' => 28
        ));
        if ($query4->num_rows() == 0)
        {
            $save4 = array(
                'name' => $this
                    ->input
                    ->post('abd_insp') ,
                'location' => 28
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save4);
        }
        $query5 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ausc') ,
            'location' => 22
        ));
        if ($query5->num_rows() == 0)
        {
            $save5 = array(
                'name' => $this
                    ->input
                    ->post('ausc') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save5);
        }
        $query6 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('perc') ,
            'location' => 22
        ));
        if ($query6->num_rows() == 0)
        {
            $save6 = array(
                'name' => $this
                    ->input
                    ->post('perc') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save6);
        }
        $query7 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('palpa') ,
            'location' => 22
        ));
        if ($query7->num_rows() == 0)
        {
            $save7 = array(
                'name' => $this
                    ->input
                    ->post('palpa') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save7);
        }
        $query8 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ext_sup') ,
            'location' => 18
        ));
        if ($query8->num_rows() == 0)
        {
            $save8 = array(
                'name' => $this
                    ->input
                    ->post('ext_sup') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save8);
        }
        $query9 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('torax') ,
            'location' => 18
        ));
        if ($query9->num_rows() == 0)
        {
            $save9 = array(
                'name' => $this
                    ->input
                    ->post('torax') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save9);
        }
        $query10 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ext_inf') ,
            'location' => 18
        ));
        if ($query10->num_rows() == 0)
        {
            $save10 = array(
                'name' => $this
                    ->input
                    ->post('ext_inf') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save10);
        }
        $query11 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cervix') ,
            'location' => 29
        ));
        if ($query11->num_rows() == 0)
        {
            $save11 = array(
                'name' => $this
                    ->input
                    ->post('cervix') ,
                'location' => 29
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save11);
        }
        $query12 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('inspection_vulval') ,
            'location' => 24
        ));
        if ($query12->num_rows() == 0)
        {
            $save12 = array(
                'name' => $this
                    ->input
                    ->post('inspection_vulval') ,
                'location' => 24
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save12);
        }
        $query13 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('rectal') ,
            'location' => 14
        ));
        if ($query13->num_rows() == 0)
        {
            $save13 = array(
                'name' => $this
                    ->input
                    ->post('rectal') ,
                'location' => 14
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save13);
        }
        $query14 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('genitalm') ,
            'location' => 15
        ));
        if ($query14->num_rows() == 0)
        {
            $save14 = array(
                'name' => $this
                    ->input
                    ->post('genitalm') ,
                'location' => 15
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save14);
        }
        $query15 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('genitalf') ,
            'location' => 16
        ));
        if ($query15->num_rows() == 0)
        {
            $save15 = array(
                'name' => $this
                    ->input
                    ->post('genitalf') ,
                'location' => 16
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save15);
        }
        $query16 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('vagina') ,
            'location' => 17
        ));
        if ($query16->num_rows() == 0)
        {
            $save16 = array(
                'name' => $this
                    ->input
                    ->post('vagina') ,
                'location' => 17
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save16);
        }
        $query17 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('mama_izq1') ,
            'location' => 11
        ));
        if ($query17->num_rows() == 0)
        {
            $save17 = array(
                'name' => $this
                    ->input
                    ->post('mama_izq1') ,
                'location' => 11
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save17);
        }
        $query18 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('mama_izq2') ,
            'location' => 11
        ));
        if ($query18->num_rows() == 0)
        {
            $save18 = array(
                'name' => $this
                    ->input
                    ->post('mama_izq2') ,
                'location' => 11
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save18);
        }
        $query19 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('region_ax1') ,
            'location' => 12
        ));
        if ($query19->num_rows() == 0)
        {
            $save19 = array(
                'name' => $this
                    ->input
                    ->post('region_ax1') ,
                'location' => 12
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save19);
        }
        $query20 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('region_ax2') ,
            'location' => 12
        ));
        if ($query20->num_rows() == 0)
        {
            $save20 = array(
                'name' => $this
                    ->input
                    ->post('region_ax2') ,
                'location' => 12
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save20);
        }
        $query1 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sisneuro') ,
            'location' => 1
        ));
        if ($query1->num_rows() == 0)
        {
            $save1 = array(
                'name' => $this
                    ->input
                    ->post('sisneuro') ,
                'location' => 1
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save1);
        }
        $query2 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('siscardio') ,
            'location' => 2
        ));
        if ($query2->num_rows() == 0)
        {
            $save2 = array(
                'name' => $this
                    ->input
                    ->post('siscardio') ,
                'location' => 2
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save2);
        }
        $query3 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_uro') ,
            'location' => 3
        ));
        if ($query3->num_rows() == 0)
        {
            $save3 = array(
                'name' => $this
                    ->input
                    ->post('sist_uro') ,
                'location' => 3
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save3);
        }
        $query4 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sis_mu_e') ,
            'location' => 4
        ));
        if ($query4->num_rows() == 0)
        {
            $save4 = array(
                'name' => $this
                    ->input
                    ->post('sis_mu_e') ,
                'location' => 4
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save4);
        }
        $query5 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_resp') ,
            'location' => 7
        ));
        if ($query5->num_rows() == 0)
        {
            $save5 = array(
                'name' => $this
                    ->input
                    ->post('sist_resp') ,
                'location' => 7
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save5);
        }
        $query6 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_diges') ,
            'location' => 19
        ));
        if ($query6->num_rows() == 0)
        {
            $save6 = array(
                'name' => $this
                    ->input
                    ->post('sist_diges') ,
                'location' => 19
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save6);
        }
        $query7 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_endo') ,
            'location' => 21
        ));
        if ($query7->num_rows() == 0)
        {
            $save7 = array(
                'name' => $this
                    ->input
                    ->post('sist_endo') ,
                'location' => 21
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save7);
        }
        $query8 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_rela') ,
            'location' => 22
        ));
        if ($query8->num_rows() == 0)
        {
            $save8 = array(
                'name' => $this
                    ->input
                    ->post('sist_rela') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save8);
        }
    }
    function saveOrtoTrauma()
    {
        $insert_date = date("Y-m-d H:i:s");
        $user_id = $this
            ->input
            ->post('user_id');
        $idenfact = $this
            ->session
            ->userdata['update_enf_act'];
        $upEnf = array(
            'enf_motivo' => $this
                ->input
                ->post('enf_motivo') ,
            'signopsis' => $this
                ->input
                ->post('enf_signopsis') ,
            'laboratorios' => $this
                ->input
                ->post('enf_laboratorios') ,
            'estudios' => $this
                ->input
                ->post('enf_estudios')
        );
        $whereEnf = array(
            'id_enf' => $idenfact
        );
        $this
            ->db
            ->where($whereEnf);
        $this
            ->db
            ->update("h_c_sinopsis", $upEnf);
        $whereimg = array(
            'id_patient' => $this
                ->input
                ->post('hist_id') ,
            'userid' => $this
                ->input
                ->post('user_id') ,
            'id_enfermedad' => 0
        );
        $updimg = array(
            'id_enfermedad' => $idenfact
        );
        $this
            ->db
            ->where($whereimg);
        $this
            ->db
            ->update("saveEnfImage", $updimg);
        $query1 = $this
            ->db
            ->get_where('type_reasons', array(
            'title' => $this
                ->input
                ->post('enf_motivo')
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'title' => $this
                    ->input
                    ->post('enf_motivo') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => $insert_date,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => $insert_date
            );
            $this
                ->model_admin
                ->save_new_causa($save);
        }
        $hab_t_drug = $this
            ->input
            ->post('hab_t_drug');
        $todo_check = $this
            ->input
            ->post('todo_check');
        $todo_check1 = (isset($todo_check)) ? 1 : 0;
        $car_nin_check = $this
            ->input
            ->post('car_nin_check');
        $car_nin_check1 = (isset($car_nin_check)) ? 1 : 0;
        $madre_check = $this
            ->input
            ->post('madre_check');
        $madre_check1 = (isset($madre_check)) ? 1 : 0;
        $padre_check = $this
            ->input
            ->post('padre_check');
        $padre_check1 = (isset($padre_check)) ? 1 : 0;
        $car_h_check = $this
            ->input
            ->post('car_h_check');
        $car_h_check1 = (isset($car_h_check)) ? 1 : 0;
        $car_pe_check = $this
            ->input
            ->post('car_pe_check');
        $car_pe_check1 = (isset($car_pe_check)) ? 1 : 0;
        $nin_check2 = $this
            ->input
            ->post('nin_check2');
        $nin_check22 = (isset($nin_check2)) ? 1 : 0;
        $madre_check2 = $this
            ->input
            ->post('madre_check2');
        $madre_check22 = (isset($madre_check2)) ? 1 : 0;
        $padre_check2 = $this
            ->input
            ->post('padre_check2');
        $padre_check22 = (isset($padre_check2)) ? 1 : 0;
        $h_check2 = $this
            ->input
            ->post('h_check2');
        $h_check22 = (isset($h_check2)) ? 1 : 0;
        $pe_check2 = $this
            ->input
            ->post('pe_check2');
        $pe_check22 = (isset($pe_check2)) ? 1 : 0;
        $nin_check3 = $this
            ->input
            ->post('nin_check3');
        $nin_check33 = (isset($nin_check3)) ? 1 : 0;
        $madre_check3 = $this
            ->input
            ->post('madre_check3');
        $madre_check33 = (isset($madre_check3)) ? 1 : 0;
        $padre_check3 = $this
            ->input
            ->post('padre_check3');
        $padre_check33 = (isset($padre_check3)) ? 1 : 0;
        $h_check3 = $this
            ->input
            ->post('h_check3');
        $h_check33 = (isset($h_check3)) ? 1 : 0;
        $pe_check3 = $this
            ->input
            ->post('pe_check3');
        $pe_check33 = (isset($pe_check3)) ? 1 : 0;
        $nin_check4 = $this
            ->input
            ->post('nin_check4');
        $nin_check44 = (isset($nin_check4)) ? 1 : 0;
        $madre_check4 = $this
            ->input
            ->post('madre_check4');
        $madre_check44 = (isset($madre_check4)) ? 1 : 0;
        $padre_check4 = $this
            ->input
            ->post('padre_check4');
        $padre_check44 = (isset($padre_check4)) ? 1 : 0;
        $h_check4 = $this
            ->input
            ->post('h_check4');
        $h_check44 = (isset($h_check4)) ? 1 : 0;
        $pe_check4 = $this
            ->input
            ->post('pe_check4');
        $pe_check44 = (isset($pe_check4)) ? 1 : 0;
        $nin_check5 = $this
            ->input
            ->post('nin_check5');
        $nin_check55 = (isset($nin_check5)) ? 1 : 0;
        $madre_check5 = $this
            ->input
            ->post('madre_check5');
        $madre_check55 = (isset($madre_check5)) ? 1 : 0;
        $padre_check5 = $this
            ->input
            ->post('padre_check5');
        $padre_check55 = (isset($padre_check5)) ? 1 : 0;
        $h_check5 = $this
            ->input
            ->post('h_check5');
        $h_check55 = (isset($h_check5)) ? 1 : 0;
        $pe_check5 = $this
            ->input
            ->post('pe_check5');
        $pe_check55 = (isset($pe_check5)) ? 1 : 0;
        $nin_check05 = $this
            ->input
            ->post('nin_check05');
        $nin_check055 = (isset($nin_check05)) ? 1 : 0;
        $madre_check05 = $this
            ->input
            ->post('madre_check05');
        $madre_check055 = (isset($madre_check05)) ? 1 : 0;
        $padre_check05 = $this
            ->input
            ->post('padre_check05');
        $padre_check055 = (isset($padre_check05)) ? 1 : 0;
        $h_check05 = $this
            ->input
            ->post('h_check05');
        $h_check055 = (isset($h_check05)) ? 1 : 0;
        $pe_check05 = $this
            ->input
            ->post('pe_check05');
        $pe_check055 = (isset($pe_check05)) ? 1 : 0;
        $nin_check6 = $this
            ->input
            ->post('nin_check6');
        $nin_check66 = (isset($nin_check6)) ? 1 : 0;
        $madre_check6 = $this
            ->input
            ->post('madre_check6');
        $madre_check66 = (isset($madre_check6)) ? 1 : 0;
        $padre_check6 = $this
            ->input
            ->post('padre_check6');
        $padre_check66 = (isset($padre_check6)) ? 1 : 0;
        $h_check6 = $this
            ->input
            ->post('h_check6');
        $h_check66 = (isset($h_check6)) ? 1 : 0;
        $pe_check6 = $this
            ->input
            ->post('pe_check6');
        $pe_check66 = (isset($pe_check6)) ? 1 : 0;
        $nin_check7 = $this
            ->input
            ->post('nin_check7');
        $nin_check77 = (isset($nin_check7)) ? 1 : 0;
        $madre_check7 = $this
            ->input
            ->post('madre_check7');
        $madre_check77 = (isset($madre_check7)) ? 1 : 0;
        $padre_check7 = $this
            ->input
            ->post('padre_check7');
        $padre_check77 = (isset($padre_check7)) ? 1 : 0;
        $h_check7 = $this
            ->input
            ->post('h_check7');
        $h_check77 = (isset($h_check7)) ? 1 : 0;
        $pe_check7 = $this
            ->input
            ->post('pe_check7');
        $pe_check77 = (isset($pe_check7)) ? 1 : 0;
        $nin_check8 = $this
            ->input
            ->post('nin_check8');
        $nin_check88 = (isset($nin_check8)) ? 1 : 0;
        $madre_check8 = $this
            ->input
            ->post('madre_check8');
        $madre_check88 = (isset($madre_check8)) ? 1 : 0;
        $padre_check8 = $this
            ->input
            ->post('padre_check8');
        $padre_check88 = (isset($padre_check8)) ? 1 : 0;
        $h_check8 = $this
            ->input
            ->post('h_check8');
        $h_check88 = (isset($h_check8)) ? 1 : 0;
        $pe_check8 = $this
            ->input
            ->post('pe_check8');
        $pe_check88 = (isset($pe_check8)) ? 1 : 0;
        $nin_check9 = $this
            ->input
            ->post('nin_check9');
        $nin_check99 = (isset($nin_check9)) ? 1 : 0;
        $madre_check9 = $this
            ->input
            ->post('madre_check9');
        $madre_check99 = (isset($madre_check9)) ? 1 : 0;
        $padre_check9 = $this
            ->input
            ->post('padre_check9');
        $padre_check99 = (isset($padre_check9)) ? 1 : 0;
        $h_check9 = $this
            ->input
            ->post('h_check9');
        $h_check99 = (isset($h_check9)) ? 1 : 0;
        $pe_check9 = $this
            ->input
            ->post('pe_check9');
        $pe_check99 = (isset($pe_check9)) ? 1 : 0;
        $nin_check10 = $this
            ->input
            ->post('nin_check10');
        $nin_check1010 = (isset($nin_check10)) ? 1 : 0;
        $madre_check10 = $this
            ->input
            ->post('madre_check10');
        $madre_check1010 = (isset($madre_check10)) ? 1 : 0;
        $padre_check10 = $this
            ->input
            ->post('padre_check10');
        $padre_check1010 = (isset($padre_check10)) ? 1 : 0;
        $h_check10 = $this
            ->input
            ->post('h_check10');
        $h_check1010 = (isset($h_check10)) ? 1 : 0;
        $pe_check10 = $this
            ->input
            ->post('pe_check10');
        $pe_check1010 = (isset($pe_check10)) ? 1 : 0;
        $nin_check11 = $this
            ->input
            ->post('nin_check11');
        $nin_check1111 = (isset($nin_check11)) ? 1 : 0;
        $madre_check11 = $this
            ->input
            ->post('madre_check11');
        $madre_check1111 = (isset($madre_check11)) ? 1 : 0;
        $padre_check11 = $this
            ->input
            ->post('padre_check11');
        $padre_check1111 = (isset($padre_check11)) ? 1 : 0;
        $h_check11 = $this
            ->input
            ->post('h_check11');
        $h_check1111 = (isset($h_check11)) ? 1 : 0;
        $pe_check11 = $this
            ->input
            ->post('pe_check11');
        $pe_check1111 = (isset($pe_check11)) ? 1 : 0;
        $neop_check12 = $this
            ->input
            ->post('neop_check12');
        $neop_check1212 = (isset($neop_check12)) ? 1 : 0;
        $madre_check12 = $this
            ->input
            ->post('madre_check12');
        $madre_check1212 = (isset($madre_check12)) ? 1 : 0;
        $padre_check12 = $this
            ->input
            ->post('padre_check12');
        $padre_check1212 = (isset($padre_check12)) ? 1 : 0;
        $h_check12 = $this
            ->input
            ->post('h_check12');
        $h_check1212 = (isset($h_check12)) ? 1 : 0;
        $pe_check12 = $this
            ->input
            ->post('pe_check12');
        $pe_check1212 = (isset($pe_check12)) ? 1 : 0;
        $psi_check13 = $this
            ->input
            ->post('psi_check13');
        $psi_check1313 = (isset($psi_check13)) ? 1 : 0;
        $madre_check13 = $this
            ->input
            ->post('madre_check13');
        $madre_check1313 = (isset($madre_check13)) ? 1 : 0;
        $padre_check13 = $this
            ->input
            ->post('padre_check13');
        $padre_check1313 = (isset($padre_check13)) ? 1 : 0;
        $h_check13 = $this
            ->input
            ->post('h_check13');
        $h_check1313 = (isset($h_check13)) ? 1 : 0;
        $pe_check13 = $this
            ->input
            ->post('pe_check13');
        $pe_check1313 = (isset($pe_check13)) ? 1 : 0;
        $obs_check14 = $this
            ->input
            ->post('obs_check14');
        $obs_check1414 = (isset($obs_check14)) ? 1 : 0;
        $madre_check14 = $this
            ->input
            ->post('madre_check14');
        $madre_check1414 = (isset($madre_check14)) ? 1 : 0;
        $padre_check14 = $this
            ->input
            ->post('padre_check14');
        $padre_check1414 = (isset($padre_check14)) ? 1 : 0;
        $h_check14 = $this
            ->input
            ->post('h_check14');
        $h_check1414 = (isset($h_check14)) ? 1 : 0;
        $pe_check14 = $this
            ->input
            ->post('pe_check14');
        $pe_check1414 = (isset($pe_check14)) ? 1 : 0;
        $ulp_check15 = $this
            ->input
            ->post('ulp_check15');
        $ulp_check1515 = (isset($ulp_check15)) ? 1 : 0;
        $madre_check15 = $this
            ->input
            ->post('madre_check15');
        $madre_check1515 = (isset($madre_check15)) ? 1 : 0;
        $padre_check15 = $this
            ->input
            ->post('padre_check15');
        $padre_check1515 = (isset($padre_check15)) ? 1 : 0;
        $h_check15 = $this
            ->input
            ->post('h_check15');
        $h_check1515 = (isset($h_check15)) ? 1 : 0;
        $pe_check15 = $this
            ->input
            ->post('pe_check15');
        $pe_check1515 = (isset($pe_check15)) ? 1 : 0;
        $art_check16 = $this
            ->input
            ->post('art_check16');
        $art_check1616 = (isset($art_check16)) ? 1 : 0;
        $madre_check16 = $this
            ->input
            ->post('madre_check16');
        $madre_check1616 = (isset($madre_check16)) ? 1 : 0;
        $padre_check16 = $this
            ->input
            ->post('padre_check16');
        $padre_check1616 = (isset($padre_check16)) ? 1 : 0;
        $h_check16 = $this
            ->input
            ->post('h_check16');
        $h_check1616 = (isset($h_check16)) ? 1 : 0;
        $pe_check16 = $this
            ->input
            ->post('pe_check16');
        $pe_check1616 = (isset($pe_check16)) ? 1 : 0;
        $art_check016 = $this
            ->input
            ->post('art_check016');
        $art_check01616 = (isset($art_check016)) ? 1 : 0;
        $madre_check016 = $this
            ->input
            ->post('madre_check016');
        $madre_check01616 = (isset($madre_check016)) ? 1 : 0;
        $padre_check016 = $this
            ->input
            ->post('padre_check016');
        $padre_check01616 = (isset($padre_check016)) ? 1 : 0;
        $h_check016 = $this
            ->input
            ->post('h_check016');
        $h_check01616 = (isset($h_check016)) ? 1 : 0;
        $pe_check016 = $this
            ->input
            ->post('pe_check016');
        $pe_check01616 = (isset($pe_check016)) ? 1 : 0;
        $zika_check17 = $this
            ->input
            ->post('zika_check17');
        $zika_check1717 = (isset($zika_check17)) ? 1 : 0;
        $madre_check17 = $this
            ->input
            ->post('madre_check17');
        $madre_check1717 = (isset($madre_check17)) ? 1 : 0;
        $padre_check17 = $this
            ->input
            ->post('padre_check17');
        $padre_check1717 = (isset($padre_check17)) ? 1 : 0;
        $h_check17 = $this
            ->input
            ->post('h_check17');
        $h_check1717 = (isset($h_check17)) ? 1 : 0;
        $pe_check17 = $this
            ->input
            ->post('pe_check17');
        $pe_check1717 = (isset($pe_check17)) ? 1 : 0;
        $save = array(
            'todo' => $todo_check1,
            'car_nin' => $car_nin_check1,
            'car_m' => $madre_check1,
            'car_p' => $padre_check1,
            'car_h' => $car_h_check1,
            'car_pe' => $car_pe_check1,
            'car_text' => $this
                ->input
                ->post('car_text') ,
            'hip_nin' => $nin_check22,
            'hip_m' => $madre_check22,
            'hip_p' => $padre_check22,
            'hip_h' => $h_check22,
            'hip_pe' => $pe_check22,
            'hip_text' => $this
                ->input
                ->post('hip_text') ,
            'ec_nin' => $nin_check33,
            'ec_m' => $madre_check33,
            'ec_p' => $padre_check33,
            'ec_h' => $h_check33,
            'ec_pe' => $pe_check33,
            'ec_text' => $this
                ->input
                ->post('ec_text') ,
            'ep_nin' => $nin_check44,
            'ep_m' => $madre_check44,
            'ep_p' => $padre_check44,
            'ep_h' => $h_check44,
            'ep_pe' => $pe_check44,
            'ep_text' => $this
                ->input
                ->post('ep_text') ,
            'as_nin' => $nin_check55,
            'as_m' => $madre_check55,
            'as_p' => $padre_check55,
            'as_h' => $h_check55,
            'as_pe' => $pe_check55,
            'as_text' => $this
                ->input
                ->post('as_text') ,
            'enre_nin' => $nin_check055,
            'enre_m' => $madre_check055,
            'enre_p' => $padre_check055,
            'enre_h' => $h_check055,
            'enre_pe' => $pe_check055,
            'enre_text' => $this
                ->input
                ->post('enre_text') ,
            'tub_nin' => $nin_check66,
            'tub_m' => $madre_check66,
            'tub_p' => $padre_check66,
            'tub_h' => $h_check66,
            'tub_pe' => $pe_check66,
            'tub_text' => $this
                ->input
                ->post('tub_text') ,
            'dia_nin' => $nin_check77,
            'dia_m' => $madre_check77,
            'dia_p' => $padre_check77,
            'dia_h' => $h_check77,
            'dia_pe' => $pe_check77,
            'dia_text' => $this
                ->input
                ->post('dia_text') ,
            'tir_nin' => $nin_check88,
            'tir_m' => $madre_check88,
            'tir_p' => $padre_check88,
            'tir_h' => $h_check88,
            'tir_pe' => $pe_check88,
            'tir_text' => $this
                ->input
                ->post('tir_text') ,
            'hep_tipo' => $this
                ->input
                ->post('hep_tipo') ,
            'hep_nin' => $nin_check99,
            'hep_m' => $madre_check99,
            'hep_p' => $padre_check99,
            'hep_h' => $h_check99,
            'hep_pe' => $pe_check99,
            'hep_text' => $this
                ->input
                ->post('hep_text') ,
            'enfr_nin' => $nin_check1010,
            'enfr_m' => $madre_check1010,
            'enfr_p' => $padre_check1010,
            'enfr_h' => $h_check1010,
            'enfr_pe' => $pe_check1010,
            'enfr_text' => $this
                ->input
                ->post('enfr_text') ,
            'falc_nin' => $nin_check1111,
            'falc_m' => $madre_check1111,
            'falc_p' => $padre_check1111,
            'falc_h' => $h_check1111,
            'falc_pe' => $pe_check1111,
            'falc_text' => $this
                ->input
                ->post('falc_text') ,
            'neop_nin' => $neop_check1212,
            'neop_m' => $madre_check1212,
            'neop_p' => $padre_check1212,
            'neop_h' => $h_check1212,
            'neop_pe' => $pe_check1212,
            'neop_text' => $this
                ->input
                ->post('neop_text') ,
            'psi_nin' => $psi_check1313,
            'psi_m' => $madre_check1313,
            'psi_p' => $padre_check1313,
            'psi_h' => $h_check1313,
            'psi_pe' => $pe_check1313,
            'psi_text' => $this
                ->input
                ->post('psi_text') ,
            'obs_nin' => $obs_check1414,
            'obs_m' => $madre_check1414,
            'obs_p' => $padre_check1414,
            'obs_h' => $h_check1414,
            'obs_pe' => $pe_check1414,
            'obs_text' => $this
                ->input
                ->post('obs_text') ,
            'ulp_nin' => $ulp_check1515,
            'ulp_m' => $madre_check1515,
            'ulp_p' => $padre_check1515,
            'ulp_h' => $h_check1515,
            'ulp_pe' => $pe_check1515,
            'ulp_text' => $this
                ->input
                ->post('ulp_text') ,
            'art_nin' => $art_check1616,
            'art_m' => $madre_check1616,
            'art_p' => $padre_check1616,
            'art_h' => $h_check1616,
            'art_pe' => $pe_check1616,
            'art_text' => $this
                ->input
                ->post('art_text') ,
            'hem_nin' => $art_check01616,
            'hem_m' => $madre_check01616,
            'hem_p' => $padre_check01616,
            'hem_h' => $h_check01616,
            'hem_pe' => $pe_check01616,
            'hem_text' => $this
                ->input
                ->post('hem_text') ,
            'zika_nin' => $zika_check1717,
            'zika_m' => $madre_check1717,
            'zika_p' => $padre_check1717,
            'zika_h' => $h_check1717,
            'zika_pe' => $pe_check1717,
            'zika_text' => $this
                ->input
                ->post('zika_text') ,
            'otros' => $this
                ->input
                ->post('otros') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'date_modif' => $insert_date,
            'operator' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id') ,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $idMarPos = $this
            ->model_admin
            ->marquePositivo($save);
        $counMarP = $this
            ->model_admin
            ->countAnte1($this
            ->input
            ->post('hist_id'));
        if ($counMarP > 1)
        {
            $this
                ->model_admin
                ->DeleteDuplicateMarqueP($idMarPos);
        }
        $newMpat = $this
            ->input
            ->post('newMpat');
        if ($newMpat)
        {
            foreach ($newMpat as $key => $med)
            {
                $savecd = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'part' => 'gnl',
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($savecd);
            }
        }
        $save2 = array(
            'maltratof' => $this
                ->input
                ->post('textmaltrato_g') ,
            'abusos' => $this
                ->input
                ->post('textabuso_g') ,
            'negligencia' => $this
                ->input
                ->post('textneg_g') ,
            'maltrato' => $this
                ->input
                ->post('maltratoemo_g') ,
            'alimentos' => $this
                ->input
                ->post('alimentos_al') ,
            'medicamentos' => $this
                ->input
                ->post('medicamentos_al') ,
            'otros' => $this
                ->input
                ->post('otros_al') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'update_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id')
        );
        $idDes = $this
            ->model_admin
            ->DesantAl($save2);
        $counDesa = $this
            ->model_admin
            ->countDesarollo($this
            ->input
            ->post('hist_id'));
        if ($counDesa > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyDesarollo($idDes);
        }
        $save3 = array(
            'quirurgicos' => $this
                ->input
                ->post('quirurgicos') ,
            'gineco' => $this
                ->input
                ->post('gineco') ,
            'abdominal' => $this
                ->input
                ->post('abdominal') ,
            'toracica' => $this
                ->input
                ->post('toracica') ,
            'transfusion' => $this
                ->input
                ->post('transfusion') ,
            'otros1' => $this
                ->input
                ->post('otros1_g') ,
            'hepatis' => $this
                ->input
                ->post('hepatis') ,
            'hpv' => $this
                ->input
                ->post('hpv') ,
            'toxoide' => $this
                ->input
                ->post('toxoide') ,
            'grouposang' => $this
                ->input
                ->post('grouposang') ,
            'tipificacion' => $this
                ->input
                ->post('tipificacion') ,
            'rh' => $this
                ->input
                ->post('rhoa') ,
            'violencia1' => $this
                ->input
                ->post('violencia1') ,
            'violencia2' => $this
                ->input
                ->post('violencia2') ,
            'violencia3' => $this
                ->input
                ->post('violencia3') ,
            'violencia4' => $this
                ->input
                ->post('violencia4') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id')
        );
        $idAtO = $this
            ->model_admin
            ->saveAnteOtros($save3);
        $counAntOt = $this
            ->model_admin
            ->countAntOtros($this
            ->input
            ->post('hist_id'));
        if ($counAntOt > 1)
        {
            $this
                ->model_admin
                ->DeleteAntOtros($idAtO);
        }
        if (!empty($medicine))
        {
            foreach ($medicine as $med)
            {
                $save = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($save);
            };
        };
        $this
            ->model_admin
            ->deleteMedNinguno();
        $save4 = array(
            'cafe_cant' => $this
                ->input
                ->post('hab_c_caf') ,
            'cafe_frec' => $this
                ->input
                ->post('hab_f_caf') ,
            'pipa_cant' => $this
                ->input
                ->post('hab_c_pip') ,
            'pipa_frec' => $this
                ->input
                ->post('hab_f_pip') ,
            'ciga_can' => $this
                ->input
                ->post('hab_c_ciga') ,
            'ciga_frec' => $this
                ->input
                ->post('hab_f_ciga') ,
            'alc_can' => $this
                ->input
                ->post('hab_c_al') ,
            'alc_frec' => $this
                ->input
                ->post('hab_f_al') ,
            'tab_can' => $this
                ->input
                ->post('hab_c_tab') ,
            'tab_frec' => $this
                ->input
                ->post('hab_f_tab') ,
            'hab_c_drug' => $this
                ->input
                ->post('hab_c_drug') ,
            'hab_f_drug' => $this
                ->input
                ->post('hab_f_drug') ,
            'hookah' => $this
                ->input
                ->post('hookah') ,
            'hab_f_hookah' => $this
                ->input
                ->post('hab_f_hookah') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'update_time' => $insert_date
        );
        $idHabT = $this
            ->model_admin
            ->saveHabitosToxicos($save4);
        $counHabT = $this
            ->model_admin
            ->countHabitosToxicos($this
            ->input
            ->post('hist_id'));
        if ($counHabT > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyHabitosToxicos($idHabT);
        }
        if (!empty($hab_t_drug))
        {
            foreach ($hab_t_drug as $drug)
            {
                $save = array(
                    'name' => $drug,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id')
                );
                $this
                    ->model_admin
                    ->SaveDrug($save);
            };
        }
        $examFisico = array(
            'peso' => $this
                ->input
                ->post('peso') ,
            'kg' => $this
                ->input
                ->post('kg') ,
            'talla' => $this
                ->input
                ->post('talla') ,
            'pulgada_exf' => $this
                ->input
                ->post('pulgada') ,
            'imc' => $this
                ->input
                ->post('imc') ,
            'ta' => $this
                ->input
                ->post('ta') ,
            'fr' => $this
                ->input
                ->post('fr') ,
            'fc' => $this
                ->input
                ->post('fc') ,
            'hg' => $this
                ->input
                ->post('hg') ,
            'tempo' => $this
                ->input
                ->post('tempo') ,
            'pulso' => $this
                ->input
                ->post('pulso') ,
            'glicemia' => $this
                ->input
                ->post('glicemia') ,
            'radio' => $this
                ->input
                ->post('radio_signo') ,
            'neuro_s' => $this
                ->input
                ->post('neuro_s') ,
            'neuro_text' => $this
                ->input
                ->post('neuro_text') ,
            'cabeza' => $this
                ->input
                ->post('cabeza') ,
            'cabeza_text' => $this
                ->input
                ->post('cabeza_text') ,
            'cuello' => $this
                ->input
                ->post('cuello') ,
            'cuello_text' => $this
                ->input
                ->post('cuello_text') ,
            'abd_insp' => $this
                ->input
                ->post('abd_insp') ,
            'ausc' => $this
                ->input
                ->post('ausc') ,
            'perc' => $this
                ->input
                ->post('perc') ,
            'palpa' => $this
                ->input
                ->post('palpa') ,
            'ext_sup_text' => $this
                ->input
                ->post('ext_sup_text') ,
            'ext_sup' => $this
                ->input
                ->post('ext_sup') ,
            'torax' => $this
                ->input
                ->post('torax') ,
            'torax_text' => $this
                ->input
                ->post('torax_text') ,
            'ext_inf' => $this
                ->input
                ->post('ext_inf') ,
            'ext_inft' => $this
                ->input
                ->post('ext_inft') ,
            'cuad_inf_ext1' => $this
                ->input
                ->post('cuad_inf_ext1') ,
            'mama_izq1' => $this
                ->input
                ->post('mama_izq1') ,
            'cuad_sup_ext1' => $this
                ->input
                ->post('cuad_sup_ext1') ,
            'cuad_inf_ext11' => $this
                ->input
                ->post('cuad_inf_ext11') ,
            'region_retro1' => $this
                ->input
                ->post('region_retro1') ,
            'region_areola_pezon1' => $this
                ->input
                ->post('region_areola_pezon1') ,
            'region_ax1' => $this
                ->input
                ->post('region_ax1') ,
            'cuad_inf_ext2' => $this
                ->input
                ->post('cuad_inf_ext2') ,
            'mama_izq2' => $this
                ->input
                ->post('mama_izq2') ,
            'cuad_sup_ext2' => $this
                ->input
                ->post('cuad_sup_ext2') ,
            'cuad_inf_ext22' => $this
                ->input
                ->post('cuad_inf_ext22') ,
            'region_retro2' => $this
                ->input
                ->post('region_retro2') ,
            'region_areola_pezon2' => $this
                ->input
                ->post('region_areola_pezon2') ,
            'region_ax2' => $this
                ->input
                ->post('region_ax2') ,
            'especuloscopia' => $this
                ->input
                ->post('especuloscopia') ,
            'tacto_bima' => $this
                ->input
                ->post('tacto_bima') ,
            'cervix' => $this
                ->input
                ->post('cervix') ,
            'cervix_text' => $this
                ->input
                ->post('cervix_text') ,
            'utero_text' => $this
                ->input
                ->post('utero_text') ,
            'anexo_derecho_text' => $this
                ->input
                ->post('anexo_derecho_text') ,
            'anexo_iz_text' => $this
                ->input
                ->post('anexo_iz_text') ,
            'inspection_vulval' => $this
                ->input
                ->post('inspection_vulval') ,
            'inspection_vulval_text' => $this
                ->input
                ->post('inspection_vulval_text') ,
            'rectal_text' => $this
                ->input
                ->post('rectal_text') ,
            'rectal' => $this
                ->input
                ->post('rectal') ,
            'genitalm' => $this
                ->input
                ->post('genitalm') ,
            'genitalm_text' => $this
                ->input
                ->post('genitalm_text') ,
            'genitalf_text' => $this
                ->input
                ->post('genitalf_text') ,
            'genitalf' => $this
                ->input
                ->post('genitalf') ,
            'vagina' => $this
                ->input
                ->post('vagina') ,
            'vagina_text' => $this
                ->input
                ->post('vagina_text') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $id_signo = $this
            ->model_admin
            ->saveExamenFisico($examFisico);
        $examFis = $this
            ->db
            ->select('*')
            ->where('id_sig', $id_signo)->get('h_c_examen_fisico')
            ->row_array();
        if ($examFis['peso'] == 0 && $examFis['kg'] == 0 && $examFis['talla'] == '' && $examFis['imc'] == '' && $examFis['ta'] == '' && $examFis['fr'] == '' && $examFis['fc'] == '' && $examFis['hg'] == '' && $examFis['tempo'] == '' && $examFis['pulso'] == '' && $examFis['glicemia'] == 0 && $examFis['neuro_s'] == '' && $examFis['neuro_text'] == '' && $examFis['cabeza'] == '' && $examFis['cabeza_text'] == '' && $examFis['cuello'] == '' && $examFis['cuello_text'] == '' && $examFis['abd_insp'] == '' && $examFis['ausc'] == '' && $examFis['perc'] == '' && $examFis['palpa'] == '' && $examFis['ext_sup'] == '' && $examFis['ext_sup_text'] == '' && $examFis['torax'] == '' && $examFis['torax_text'] == '' && $examFis['ext_inf'] == '' && $examFis['ext_inft'] == '' && $examFis['vagina_text'] == '' && $examFis['vagina'] == '' && $examFis['cuad_inf_ext1'] == '' && $examFis['mama_izq1'] == '' && $examFis['cuad_sup_ext1'] == '' && $examFis['cuad_inf_ext11'] == '' && $examFis['region_retro1'] == '' && $examFis['region_areola_pezon1'] == '' && $examFis['region_ax1'] == '' && $examFis['cuad_inf_ext2'] == '' && $examFis['mama_izq2'] == '' && $examFis['cuad_sup_ext2'] == '' && $examFis['cuad_inf_ext22'] == '' && $examFis['region_retro2'] == '' && $examFis['region_areola_pezon2'] == '' && $examFis['region_ax2'] == '' && $examFis['especuloscopia'] == '' && $examFis['cervix'] == '' && $examFis['cervix_text'] == '' && $examFis['utero_text'] == '' && $examFis['anexo_derecho_text'] == '' && $examFis['anexo_iz_text'] == '' && $examFis['inspection_vulval'] == '' && $examFis['inspection_vulval_text'] == '' && $examFis['tacto_bima'] == '' && $examFis['rectal_text'] == '' && $examFis['rectal'] == '' && $examFis['genitalm'] == '' && $examFis['genitalm_text'] == '' && $examFis['genitalf_text'] == '' && $examFis['genitalf'] == '' && $examFis['vagina'] == '' && $examFis['vagina_text'] == '')
        {
            $this
                ->model_admin
                ->DeleteEmptyExamFis($id_signo);
        }
        $saveExOt = array(
            'oido1' => $this
                ->input
                ->post('oido1') ,
            'oido2' => $this
                ->input
                ->post('oido2') ,
            'nariz' => $this
                ->input
                ->post('nariz') ,
            'boca' => $this
                ->input
                ->post('boca') ,
            'otorrino_cuello1' => $this
                ->input
                ->post('otorrino_cuello1') ,
            'otorrino_cuello2' => $this
                ->input
                ->post('otorrino_cuello2') ,
            'observaciones_ot' => $this
                ->input
                ->post('observaciones_ot') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'user_id' => $this
                ->input
                ->post('user_id') ,
            'id_sig' => $id_signo
        );
        $this
            ->db
            ->insert("h_c_examen_fis_otorrino", $saveExOt);
        $whereot = array(
            'oido1' => '',
            'oido2' => '',
            'nariz' => '',
            'otorrino_cuello1' => '',
            'otorrino_cuello2' => '',
            'observaciones_ot' => '',
        );
        $this
            ->db
            ->where($whereot);
        $this
            ->db
            ->delete('h_c_examen_fis_otorrino');
        $saveExamSis = array(
            'sisneuro' => $this
                ->input
                ->post('sisneuro') ,
            'neurologico' => $this
                ->input
                ->post('neurologico') ,
            'siscardio' => $this
                ->input
                ->post('siscardio') ,
            'cardiova' => $this
                ->input
                ->post('cardiova') ,
            'sist_uro' => $this
                ->input
                ->post('sist_uro') ,
            'urogenital' => $this
                ->input
                ->post('urogenital') ,
            'sis_mu_e' => $this
                ->input
                ->post('sis_mu_e') ,
            'musculoes' => $this
                ->input
                ->post('musculoes') ,
            'sist_resp' => $this
                ->input
                ->post('sist_resp') ,
            'nervioso' => $this
                ->input
                ->post('nervioso') ,
            'linfatico' => $this
                ->input
                ->post('linfatico') ,
            'digestivo' => $this
                ->input
                ->post('digestivo') ,
            'respiratorio' => $this
                ->input
                ->post('respiratorio') ,
            'genitourinario' => $this
                ->input
                ->post('genitourinario') ,
            'sist_diges' => $this
                ->input
                ->post('sist_diges') ,
            'sist_endo' => $this
                ->input
                ->post('sist_endo') ,
            'endocrino' => $this
                ->input
                ->post('endocrino') ,
            'sist_rela' => $this
                ->input
                ->post('sist_rela') ,
            'otros_ex_sis' => $this
                ->input
                ->post('otros_ex_sis') ,
            'cardiova' => $this
                ->input
                ->post('cardiova') ,
            'dorsales' => $this
                ->input
                ->post('dorsales') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->saveExameneSistema($saveExamSis);
        $this
            ->model_admin
            ->DeleteEmptyExameneSistema($this
            ->input
            ->post('hist_id'));
        $query1 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('neuro_s') ,
            'location' => 26
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'name' => $this
                    ->input
                    ->post('neuro_s') ,
                'location' => 26
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save);
        }
        $query2 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cabeza') ,
            'location' => 27
        ));
        if ($query2->num_rows() == 0)
        {
            $save2 = array(
                'name' => $this
                    ->input
                    ->post('cabeza') ,
                'location' => 27
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save2);
        }
        $query3 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cuello') ,
            'location' => 9
        ));
        if ($query3->num_rows() == 0)
        {
            $save3 = array(
                'name' => $this
                    ->input
                    ->post('cuello') ,
                'location' => 9
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save3);
        }
        $query4 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('abd_insp') ,
            'location' => 28
        ));
        if ($query4->num_rows() == 0)
        {
            $save4 = array(
                'name' => $this
                    ->input
                    ->post('abd_insp') ,
                'location' => 28
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save4);
        }
        $query5 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ausc') ,
            'location' => 22
        ));
        if ($query5->num_rows() == 0)
        {
            $save5 = array(
                'name' => $this
                    ->input
                    ->post('ausc') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save5);
        }
        $query6 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('perc') ,
            'location' => 22
        ));
        if ($query6->num_rows() == 0)
        {
            $save6 = array(
                'name' => $this
                    ->input
                    ->post('perc') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save6);
        }
        $query7 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('palpa') ,
            'location' => 22
        ));
        if ($query7->num_rows() == 0)
        {
            $save7 = array(
                'name' => $this
                    ->input
                    ->post('palpa') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save7);
        }
        $query8 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ext_sup') ,
            'location' => 18
        ));
        if ($query8->num_rows() == 0)
        {
            $save8 = array(
                'name' => $this
                    ->input
                    ->post('ext_sup') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save8);
        }
        $query9 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('torax') ,
            'location' => 18
        ));
        if ($query9->num_rows() == 0)
        {
            $save9 = array(
                'name' => $this
                    ->input
                    ->post('torax') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save9);
        }
        $query10 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ext_inf') ,
            'location' => 18
        ));
        if ($query10->num_rows() == 0)
        {
            $save10 = array(
                'name' => $this
                    ->input
                    ->post('ext_inf') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save10);
        }
        $query11 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cervix') ,
            'location' => 29
        ));
        if ($query11->num_rows() == 0)
        {
            $save11 = array(
                'name' => $this
                    ->input
                    ->post('cervix') ,
                'location' => 29
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save11);
        }
        $query12 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('inspection_vulval') ,
            'location' => 24
        ));
        if ($query12->num_rows() == 0)
        {
            $save12 = array(
                'name' => $this
                    ->input
                    ->post('inspection_vulval') ,
                'location' => 24
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save12);
        }
        $query13 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('rectal') ,
            'location' => 14
        ));
        if ($query13->num_rows() == 0)
        {
            $save13 = array(
                'name' => $this
                    ->input
                    ->post('rectal') ,
                'location' => 14
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save13);
        }
        $query14 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('genitalm') ,
            'location' => 15
        ));
        if ($query14->num_rows() == 0)
        {
            $save14 = array(
                'name' => $this
                    ->input
                    ->post('genitalm') ,
                'location' => 15
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save14);
        }
        $query15 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('genitalf') ,
            'location' => 16
        ));
        if ($query15->num_rows() == 0)
        {
            $save15 = array(
                'name' => $this
                    ->input
                    ->post('genitalf') ,
                'location' => 16
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save15);
        }
        $query16 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('vagina') ,
            'location' => 17
        ));
        if ($query16->num_rows() == 0)
        {
            $save16 = array(
                'name' => $this
                    ->input
                    ->post('vagina') ,
                'location' => 17
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save16);
        }
        $query17 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('mama_izq1') ,
            'location' => 11
        ));
        if ($query17->num_rows() == 0)
        {
            $save17 = array(
                'name' => $this
                    ->input
                    ->post('mama_izq1') ,
                'location' => 11
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save17);
        }
        $query18 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('mama_izq2') ,
            'location' => 11
        ));
        if ($query18->num_rows() == 0)
        {
            $save18 = array(
                'name' => $this
                    ->input
                    ->post('mama_izq2') ,
                'location' => 11
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save18);
        }
        $query19 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('region_ax1') ,
            'location' => 12
        ));
        if ($query19->num_rows() == 0)
        {
            $save19 = array(
                'name' => $this
                    ->input
                    ->post('region_ax1') ,
                'location' => 12
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save19);
        }
        $query20 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('region_ax2') ,
            'location' => 12
        ));
        if ($query20->num_rows() == 0)
        {
            $save20 = array(
                'name' => $this
                    ->input
                    ->post('region_ax2') ,
                'location' => 12
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save20);
        }
        $query1 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sisneuro') ,
            'location' => 1
        ));
        if ($query1->num_rows() == 0)
        {
            $save1 = array(
                'name' => $this
                    ->input
                    ->post('sisneuro') ,
                'location' => 1
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save1);
        }
        $query2 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('siscardio') ,
            'location' => 2
        ));
        if ($query2->num_rows() == 0)
        {
            $save2 = array(
                'name' => $this
                    ->input
                    ->post('siscardio') ,
                'location' => 2
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save2);
        }
        $query3 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_uro') ,
            'location' => 3
        ));
        if ($query3->num_rows() == 0)
        {
            $save3 = array(
                'name' => $this
                    ->input
                    ->post('sist_uro') ,
                'location' => 3
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save3);
        }
        $query4 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sis_mu_e') ,
            'location' => 4
        ));
        if ($query4->num_rows() == 0)
        {
            $save4 = array(
                'name' => $this
                    ->input
                    ->post('sis_mu_e') ,
                'location' => 4
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save4);
        }
        $query5 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_resp') ,
            'location' => 7
        ));
        if ($query5->num_rows() == 0)
        {
            $save5 = array(
                'name' => $this
                    ->input
                    ->post('sist_resp') ,
                'location' => 7
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save5);
        }
        $query6 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_diges') ,
            'location' => 19
        ));
        if ($query6->num_rows() == 0)
        {
            $save6 = array(
                'name' => $this
                    ->input
                    ->post('sist_diges') ,
                'location' => 19
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save6);
        }
        $query7 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_endo') ,
            'location' => 21
        ));
        if ($query7->num_rows() == 0)
        {
            $save7 = array(
                'name' => $this
                    ->input
                    ->post('sist_endo') ,
                'location' => 21
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save7);
        }
        $query8 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_rela') ,
            'location' => 22
        ));
        if ($query8->num_rows() == 0)
        {
            $save8 = array(
                'name' => $this
                    ->input
                    ->post('sist_rela') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save8);
        }
    }
    function saveOftalmologia()
    {
        $insert_date = date("Y-m-d H:i:s");
        $user_id = $this
            ->input
            ->post('user_id');
        $idenfact = $this
            ->session
            ->userdata['update_enf_act'];
        $upEnf = array(
            'enf_motivo' => $this
                ->input
                ->post('enf_motivo') ,
            'signopsis' => $this
                ->input
                ->post('enf_signopsis') ,
            'laboratorios' => $this
                ->input
                ->post('enf_laboratorios') ,
            'estudios' => $this
                ->input
                ->post('enf_estudios')
        );
        $whereEnf = array(
            'id_enf' => $idenfact
        );
        $this
            ->db
            ->where($whereEnf);
        $this
            ->db
            ->update("h_c_sinopsis", $upEnf);
        $whereimg = array(
            'id_patient' => $this
                ->input
                ->post('hist_id') ,
            'userid' => $this
                ->input
                ->post('user_id') ,
            'id_enfermedad' => 0
        );
        $updimg = array(
            'id_enfermedad' => $idenfact
        );
        $this
            ->db
            ->where($whereimg);
        $this
            ->db
            ->update("saveEnfImage", $updimg);
        $query1 = $this
            ->db
            ->get_where('type_reasons', array(
            'title' => $this
                ->input
                ->post('enf_motivo')
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'title' => $this
                    ->input
                    ->post('enf_motivo') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => $insert_date,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => $insert_date
            );
            $this
                ->model_admin
                ->save_new_causa($save);
        }
        $hab_t_drug = $this
            ->input
            ->post('hab_t_drug');
        $todo_check = $this
            ->input
            ->post('todo_check');
        $todo_check1 = (isset($todo_check)) ? 1 : 0;
        $car_nin_check = $this
            ->input
            ->post('car_nin_check');
        $car_nin_check1 = (isset($car_nin_check)) ? 1 : 0;
        $madre_check = $this
            ->input
            ->post('madre_check');
        $madre_check1 = (isset($madre_check)) ? 1 : 0;
        $padre_check = $this
            ->input
            ->post('padre_check');
        $padre_check1 = (isset($padre_check)) ? 1 : 0;
        $car_h_check = $this
            ->input
            ->post('car_h_check');
        $car_h_check1 = (isset($car_h_check)) ? 1 : 0;
        $car_pe_check = $this
            ->input
            ->post('car_pe_check');
        $car_pe_check1 = (isset($car_pe_check)) ? 1 : 0;
        $nin_check2 = $this
            ->input
            ->post('nin_check2');
        $nin_check22 = (isset($nin_check2)) ? 1 : 0;
        $madre_check2 = $this
            ->input
            ->post('madre_check2');
        $madre_check22 = (isset($madre_check2)) ? 1 : 0;
        $padre_check2 = $this
            ->input
            ->post('padre_check2');
        $padre_check22 = (isset($padre_check2)) ? 1 : 0;
        $h_check2 = $this
            ->input
            ->post('h_check2');
        $h_check22 = (isset($h_check2)) ? 1 : 0;
        $pe_check2 = $this
            ->input
            ->post('pe_check2');
        $pe_check22 = (isset($pe_check2)) ? 1 : 0;
        $nin_check3 = $this
            ->input
            ->post('nin_check3');
        $nin_check33 = (isset($nin_check3)) ? 1 : 0;
        $madre_check3 = $this
            ->input
            ->post('madre_check3');
        $madre_check33 = (isset($madre_check3)) ? 1 : 0;
        $padre_check3 = $this
            ->input
            ->post('padre_check3');
        $padre_check33 = (isset($padre_check3)) ? 1 : 0;
        $h_check3 = $this
            ->input
            ->post('h_check3');
        $h_check33 = (isset($h_check3)) ? 1 : 0;
        $pe_check3 = $this
            ->input
            ->post('pe_check3');
        $pe_check33 = (isset($pe_check3)) ? 1 : 0;
        $nin_check4 = $this
            ->input
            ->post('nin_check4');
        $nin_check44 = (isset($nin_check4)) ? 1 : 0;
        $madre_check4 = $this
            ->input
            ->post('madre_check4');
        $madre_check44 = (isset($madre_check4)) ? 1 : 0;
        $padre_check4 = $this
            ->input
            ->post('padre_check4');
        $padre_check44 = (isset($padre_check4)) ? 1 : 0;
        $h_check4 = $this
            ->input
            ->post('h_check4');
        $h_check44 = (isset($h_check4)) ? 1 : 0;
        $pe_check4 = $this
            ->input
            ->post('pe_check4');
        $pe_check44 = (isset($pe_check4)) ? 1 : 0;
        $nin_check5 = $this
            ->input
            ->post('nin_check5');
        $nin_check55 = (isset($nin_check5)) ? 1 : 0;
        $madre_check5 = $this
            ->input
            ->post('madre_check5');
        $madre_check55 = (isset($madre_check5)) ? 1 : 0;
        $padre_check5 = $this
            ->input
            ->post('padre_check5');
        $padre_check55 = (isset($padre_check5)) ? 1 : 0;
        $h_check5 = $this
            ->input
            ->post('h_check5');
        $h_check55 = (isset($h_check5)) ? 1 : 0;
        $pe_check5 = $this
            ->input
            ->post('pe_check5');
        $pe_check55 = (isset($pe_check5)) ? 1 : 0;
        $nin_check05 = $this
            ->input
            ->post('nin_check05');
        $nin_check055 = (isset($nin_check05)) ? 1 : 0;
        $madre_check05 = $this
            ->input
            ->post('madre_check05');
        $madre_check055 = (isset($madre_check05)) ? 1 : 0;
        $padre_check05 = $this
            ->input
            ->post('padre_check05');
        $padre_check055 = (isset($padre_check05)) ? 1 : 0;
        $h_check05 = $this
            ->input
            ->post('h_check05');
        $h_check055 = (isset($h_check05)) ? 1 : 0;
        $pe_check05 = $this
            ->input
            ->post('pe_check05');
        $pe_check055 = (isset($pe_check05)) ? 1 : 0;
        $nin_check6 = $this
            ->input
            ->post('nin_check6');
        $nin_check66 = (isset($nin_check6)) ? 1 : 0;
        $madre_check6 = $this
            ->input
            ->post('madre_check6');
        $madre_check66 = (isset($madre_check6)) ? 1 : 0;
        $padre_check6 = $this
            ->input
            ->post('padre_check6');
        $padre_check66 = (isset($padre_check6)) ? 1 : 0;
        $h_check6 = $this
            ->input
            ->post('h_check6');
        $h_check66 = (isset($h_check6)) ? 1 : 0;
        $pe_check6 = $this
            ->input
            ->post('pe_check6');
        $pe_check66 = (isset($pe_check6)) ? 1 : 0;
        $nin_check7 = $this
            ->input
            ->post('nin_check7');
        $nin_check77 = (isset($nin_check7)) ? 1 : 0;
        $madre_check7 = $this
            ->input
            ->post('madre_check7');
        $madre_check77 = (isset($madre_check7)) ? 1 : 0;
        $padre_check7 = $this
            ->input
            ->post('padre_check7');
        $padre_check77 = (isset($padre_check7)) ? 1 : 0;
        $h_check7 = $this
            ->input
            ->post('h_check7');
        $h_check77 = (isset($h_check7)) ? 1 : 0;
        $pe_check7 = $this
            ->input
            ->post('pe_check7');
        $pe_check77 = (isset($pe_check7)) ? 1 : 0;
        $nin_check8 = $this
            ->input
            ->post('nin_check8');
        $nin_check88 = (isset($nin_check8)) ? 1 : 0;
        $madre_check8 = $this
            ->input
            ->post('madre_check8');
        $madre_check88 = (isset($madre_check8)) ? 1 : 0;
        $padre_check8 = $this
            ->input
            ->post('padre_check8');
        $padre_check88 = (isset($padre_check8)) ? 1 : 0;
        $h_check8 = $this
            ->input
            ->post('h_check8');
        $h_check88 = (isset($h_check8)) ? 1 : 0;
        $pe_check8 = $this
            ->input
            ->post('pe_check8');
        $pe_check88 = (isset($pe_check8)) ? 1 : 0;
        $nin_check9 = $this
            ->input
            ->post('nin_check9');
        $nin_check99 = (isset($nin_check9)) ? 1 : 0;
        $madre_check9 = $this
            ->input
            ->post('madre_check9');
        $madre_check99 = (isset($madre_check9)) ? 1 : 0;
        $padre_check9 = $this
            ->input
            ->post('padre_check9');
        $padre_check99 = (isset($padre_check9)) ? 1 : 0;
        $h_check9 = $this
            ->input
            ->post('h_check9');
        $h_check99 = (isset($h_check9)) ? 1 : 0;
        $pe_check9 = $this
            ->input
            ->post('pe_check9');
        $pe_check99 = (isset($pe_check9)) ? 1 : 0;
        $nin_check10 = $this
            ->input
            ->post('nin_check10');
        $nin_check1010 = (isset($nin_check10)) ? 1 : 0;
        $madre_check10 = $this
            ->input
            ->post('madre_check10');
        $madre_check1010 = (isset($madre_check10)) ? 1 : 0;
        $padre_check10 = $this
            ->input
            ->post('padre_check10');
        $padre_check1010 = (isset($padre_check10)) ? 1 : 0;
        $h_check10 = $this
            ->input
            ->post('h_check10');
        $h_check1010 = (isset($h_check10)) ? 1 : 0;
        $pe_check10 = $this
            ->input
            ->post('pe_check10');
        $pe_check1010 = (isset($pe_check10)) ? 1 : 0;
        $nin_check11 = $this
            ->input
            ->post('nin_check11');
        $nin_check1111 = (isset($nin_check11)) ? 1 : 0;
        $madre_check11 = $this
            ->input
            ->post('madre_check11');
        $madre_check1111 = (isset($madre_check11)) ? 1 : 0;
        $padre_check11 = $this
            ->input
            ->post('padre_check11');
        $padre_check1111 = (isset($padre_check11)) ? 1 : 0;
        $h_check11 = $this
            ->input
            ->post('h_check11');
        $h_check1111 = (isset($h_check11)) ? 1 : 0;
        $pe_check11 = $this
            ->input
            ->post('pe_check11');
        $pe_check1111 = (isset($pe_check11)) ? 1 : 0;
        $neop_check12 = $this
            ->input
            ->post('neop_check12');
        $neop_check1212 = (isset($neop_check12)) ? 1 : 0;
        $madre_check12 = $this
            ->input
            ->post('madre_check12');
        $madre_check1212 = (isset($madre_check12)) ? 1 : 0;
        $padre_check12 = $this
            ->input
            ->post('padre_check12');
        $padre_check1212 = (isset($padre_check12)) ? 1 : 0;
        $h_check12 = $this
            ->input
            ->post('h_check12');
        $h_check1212 = (isset($h_check12)) ? 1 : 0;
        $pe_check12 = $this
            ->input
            ->post('pe_check12');
        $pe_check1212 = (isset($pe_check12)) ? 1 : 0;
        $psi_check13 = $this
            ->input
            ->post('psi_check13');
        $psi_check1313 = (isset($psi_check13)) ? 1 : 0;
        $madre_check13 = $this
            ->input
            ->post('madre_check13');
        $madre_check1313 = (isset($madre_check13)) ? 1 : 0;
        $padre_check13 = $this
            ->input
            ->post('padre_check13');
        $padre_check1313 = (isset($padre_check13)) ? 1 : 0;
        $h_check13 = $this
            ->input
            ->post('h_check13');
        $h_check1313 = (isset($h_check13)) ? 1 : 0;
        $pe_check13 = $this
            ->input
            ->post('pe_check13');
        $pe_check1313 = (isset($pe_check13)) ? 1 : 0;
        $obs_check14 = $this
            ->input
            ->post('obs_check14');
        $obs_check1414 = (isset($obs_check14)) ? 1 : 0;
        $madre_check14 = $this
            ->input
            ->post('madre_check14');
        $madre_check1414 = (isset($madre_check14)) ? 1 : 0;
        $padre_check14 = $this
            ->input
            ->post('padre_check14');
        $padre_check1414 = (isset($padre_check14)) ? 1 : 0;
        $h_check14 = $this
            ->input
            ->post('h_check14');
        $h_check1414 = (isset($h_check14)) ? 1 : 0;
        $pe_check14 = $this
            ->input
            ->post('pe_check14');
        $pe_check1414 = (isset($pe_check14)) ? 1 : 0;
        $ulp_check15 = $this
            ->input
            ->post('ulp_check15');
        $ulp_check1515 = (isset($ulp_check15)) ? 1 : 0;
        $madre_check15 = $this
            ->input
            ->post('madre_check15');
        $madre_check1515 = (isset($madre_check15)) ? 1 : 0;
        $padre_check15 = $this
            ->input
            ->post('padre_check15');
        $padre_check1515 = (isset($padre_check15)) ? 1 : 0;
        $h_check15 = $this
            ->input
            ->post('h_check15');
        $h_check1515 = (isset($h_check15)) ? 1 : 0;
        $pe_check15 = $this
            ->input
            ->post('pe_check15');
        $pe_check1515 = (isset($pe_check15)) ? 1 : 0;
        $art_check16 = $this
            ->input
            ->post('art_check16');
        $art_check1616 = (isset($art_check16)) ? 1 : 0;
        $madre_check16 = $this
            ->input
            ->post('madre_check16');
        $madre_check1616 = (isset($madre_check16)) ? 1 : 0;
        $padre_check16 = $this
            ->input
            ->post('padre_check16');
        $padre_check1616 = (isset($padre_check16)) ? 1 : 0;
        $h_check16 = $this
            ->input
            ->post('h_check16');
        $h_check1616 = (isset($h_check16)) ? 1 : 0;
        $pe_check16 = $this
            ->input
            ->post('pe_check16');
        $pe_check1616 = (isset($pe_check16)) ? 1 : 0;
        $art_check016 = $this
            ->input
            ->post('art_check016');
        $art_check01616 = (isset($art_check016)) ? 1 : 0;
        $madre_check016 = $this
            ->input
            ->post('madre_check016');
        $madre_check01616 = (isset($madre_check016)) ? 1 : 0;
        $padre_check016 = $this
            ->input
            ->post('padre_check016');
        $padre_check01616 = (isset($padre_check016)) ? 1 : 0;
        $h_check016 = $this
            ->input
            ->post('h_check016');
        $h_check01616 = (isset($h_check016)) ? 1 : 0;
        $pe_check016 = $this
            ->input
            ->post('pe_check016');
        $pe_check01616 = (isset($pe_check016)) ? 1 : 0;
        $zika_check17 = $this
            ->input
            ->post('zika_check17');
        $zika_check1717 = (isset($zika_check17)) ? 1 : 0;
        $madre_check17 = $this
            ->input
            ->post('madre_check17');
        $madre_check1717 = (isset($madre_check17)) ? 1 : 0;
        $padre_check17 = $this
            ->input
            ->post('padre_check17');
        $padre_check1717 = (isset($padre_check17)) ? 1 : 0;
        $h_check17 = $this
            ->input
            ->post('h_check17');
        $h_check1717 = (isset($h_check17)) ? 1 : 0;
        $pe_check17 = $this
            ->input
            ->post('pe_check17');
        $pe_check1717 = (isset($pe_check17)) ? 1 : 0;
        $save = array(
            'todo' => $todo_check1,
            'car_nin' => $car_nin_check1,
            'car_m' => $madre_check1,
            'car_p' => $padre_check1,
            'car_h' => $car_h_check1,
            'car_pe' => $car_pe_check1,
            'car_text' => $this
                ->input
                ->post('car_text') ,
            'hip_nin' => $nin_check22,
            'hip_m' => $madre_check22,
            'hip_p' => $padre_check22,
            'hip_h' => $h_check22,
            'hip_pe' => $pe_check22,
            'hip_text' => $this
                ->input
                ->post('hip_text') ,
            'ec_nin' => $nin_check33,
            'ec_m' => $madre_check33,
            'ec_p' => $padre_check33,
            'ec_h' => $h_check33,
            'ec_pe' => $pe_check33,
            'ec_text' => $this
                ->input
                ->post('ec_text') ,
            'ep_nin' => $nin_check44,
            'ep_m' => $madre_check44,
            'ep_p' => $padre_check44,
            'ep_h' => $h_check44,
            'ep_pe' => $pe_check44,
            'ep_text' => $this
                ->input
                ->post('ep_text') ,
            'as_nin' => $nin_check55,
            'as_m' => $madre_check55,
            'as_p' => $padre_check55,
            'as_h' => $h_check55,
            'as_pe' => $pe_check55,
            'as_text' => $this
                ->input
                ->post('as_text') ,
            'enre_nin' => $nin_check055,
            'enre_m' => $madre_check055,
            'enre_p' => $padre_check055,
            'enre_h' => $h_check055,
            'enre_pe' => $pe_check055,
            'enre_text' => $this
                ->input
                ->post('enre_text') ,
            'tub_nin' => $nin_check66,
            'tub_m' => $madre_check66,
            'tub_p' => $padre_check66,
            'tub_h' => $h_check66,
            'tub_pe' => $pe_check66,
            'tub_text' => $this
                ->input
                ->post('tub_text') ,
            'dia_nin' => $nin_check77,
            'dia_m' => $madre_check77,
            'dia_p' => $padre_check77,
            'dia_h' => $h_check77,
            'dia_pe' => $pe_check77,
            'dia_text' => $this
                ->input
                ->post('dia_text') ,
            'tir_nin' => $nin_check88,
            'tir_m' => $madre_check88,
            'tir_p' => $padre_check88,
            'tir_h' => $h_check88,
            'tir_pe' => $pe_check88,
            'tir_text' => $this
                ->input
                ->post('tir_text') ,
            'hep_tipo' => $this
                ->input
                ->post('hep_tipo') ,
            'hep_nin' => $nin_check99,
            'hep_m' => $madre_check99,
            'hep_p' => $padre_check99,
            'hep_h' => $h_check99,
            'hep_pe' => $pe_check99,
            'hep_text' => $this
                ->input
                ->post('hep_text') ,
            'enfr_nin' => $nin_check1010,
            'enfr_m' => $madre_check1010,
            'enfr_p' => $padre_check1010,
            'enfr_h' => $h_check1010,
            'enfr_pe' => $pe_check1010,
            'enfr_text' => $this
                ->input
                ->post('enfr_text') ,
            'falc_nin' => $nin_check1111,
            'falc_m' => $madre_check1111,
            'falc_p' => $padre_check1111,
            'falc_h' => $h_check1111,
            'falc_pe' => $pe_check1111,
            'falc_text' => $this
                ->input
                ->post('falc_text') ,
            'neop_nin' => $neop_check1212,
            'neop_m' => $madre_check1212,
            'neop_p' => $padre_check1212,
            'neop_h' => $h_check1212,
            'neop_pe' => $pe_check1212,
            'neop_text' => $this
                ->input
                ->post('neop_text') ,
            'psi_nin' => $psi_check1313,
            'psi_m' => $madre_check1313,
            'psi_p' => $padre_check1313,
            'psi_h' => $h_check1313,
            'psi_pe' => $pe_check1313,
            'psi_text' => $this
                ->input
                ->post('psi_text') ,
            'obs_nin' => $obs_check1414,
            'obs_m' => $madre_check1414,
            'obs_p' => $padre_check1414,
            'obs_h' => $h_check1414,
            'obs_pe' => $pe_check1414,
            'obs_text' => $this
                ->input
                ->post('obs_text') ,
            'ulp_nin' => $ulp_check1515,
            'ulp_m' => $madre_check1515,
            'ulp_p' => $padre_check1515,
            'ulp_h' => $h_check1515,
            'ulp_pe' => $pe_check1515,
            'ulp_text' => $this
                ->input
                ->post('ulp_text') ,
            'art_nin' => $art_check1616,
            'art_m' => $madre_check1616,
            'art_p' => $padre_check1616,
            'art_h' => $h_check1616,
            'art_pe' => $pe_check1616,
            'art_text' => $this
                ->input
                ->post('art_text') ,
            'hem_nin' => $art_check01616,
            'hem_m' => $madre_check01616,
            'hem_p' => $padre_check01616,
            'hem_h' => $h_check01616,
            'hem_pe' => $pe_check01616,
            'hem_text' => $this
                ->input
                ->post('hem_text') ,
            'zika_nin' => $zika_check1717,
            'zika_m' => $madre_check1717,
            'zika_p' => $padre_check1717,
            'zika_h' => $h_check1717,
            'zika_pe' => $pe_check1717,
            'zika_text' => $this
                ->input
                ->post('zika_text') ,
            'otros' => $this
                ->input
                ->post('otros') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'date_modif' => $insert_date,
            'operator' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id') ,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $idMarPos = $this
            ->model_admin
            ->marquePositivo($save);
        $counMarP = $this
            ->model_admin
            ->countAnte1($this
            ->input
            ->post('hist_id'));
        if ($counMarP > 1)
        {
            $this
                ->model_admin
                ->DeleteDuplicateMarqueP($idMarPos);
        }
        $newMpat = $this
            ->input
            ->post('newMpat');
        if ($newMpat)
        {
            foreach ($newMpat as $key => $med)
            {
                $savecd = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'part' => 'gnl',
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($savecd);
            }
        }
        $save2 = array(
            'maltratof' => $this
                ->input
                ->post('textmaltrato_g') ,
            'abusos' => $this
                ->input
                ->post('textabuso_g') ,
            'negligencia' => $this
                ->input
                ->post('textneg_g') ,
            'maltrato' => $this
                ->input
                ->post('maltratoemo_g') ,
            'alimentos' => $this
                ->input
                ->post('alimentos_al') ,
            'medicamentos' => $this
                ->input
                ->post('medicamentos_al') ,
            'otros' => $this
                ->input
                ->post('otros_al') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'update_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id')
        );
        $idDes = $this
            ->model_admin
            ->DesantAl($save2);
        $counDesa = $this
            ->model_admin
            ->countDesarollo($this
            ->input
            ->post('hist_id'));
        if ($counDesa > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyDesarollo($idDes);
        }
        $save3 = array(
            'quirurgicos' => $this
                ->input
                ->post('quirurgicos') ,
            'gineco' => $this
                ->input
                ->post('gineco') ,
            'abdominal' => $this
                ->input
                ->post('abdominal') ,
            'toracica' => $this
                ->input
                ->post('toracica') ,
            'transfusion' => $this
                ->input
                ->post('transfusion') ,
            'otros1' => $this
                ->input
                ->post('otros1_g') ,
            'hepatis' => $this
                ->input
                ->post('hepatis') ,
            'hpv' => $this
                ->input
                ->post('hpv') ,
            'toxoide' => $this
                ->input
                ->post('toxoide') ,
            'grouposang' => $this
                ->input
                ->post('grouposang') ,
            'tipificacion' => $this
                ->input
                ->post('tipificacion') ,
            'rh' => $this
                ->input
                ->post('rhoa') ,
            'violencia1' => $this
                ->input
                ->post('violencia1') ,
            'violencia2' => $this
                ->input
                ->post('violencia2') ,
            'violencia3' => $this
                ->input
                ->post('violencia3') ,
            'violencia4' => $this
                ->input
                ->post('violencia4') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id')
        );
        $idAtO = $this
            ->model_admin
            ->saveAnteOtros($save3);
        $counAntOt = $this
            ->model_admin
            ->countAntOtros($this
            ->input
            ->post('hist_id'));
        if ($counAntOt > 1)
        {
            $this
                ->model_admin
                ->DeleteAntOtros($idAtO);
        }
        if (!empty($medicine))
        {
            foreach ($medicine as $med)
            {
                $save = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($save);
            };
        };
        $this
            ->model_admin
            ->deleteMedNinguno();
        $save4 = array(
            'cafe_cant' => $this
                ->input
                ->post('hab_c_caf') ,
            'cafe_frec' => $this
                ->input
                ->post('hab_f_caf') ,
            'pipa_cant' => $this
                ->input
                ->post('hab_c_pip') ,
            'pipa_frec' => $this
                ->input
                ->post('hab_f_pip') ,
            'ciga_can' => $this
                ->input
                ->post('hab_c_ciga') ,
            'ciga_frec' => $this
                ->input
                ->post('hab_f_ciga') ,
            'alc_can' => $this
                ->input
                ->post('hab_c_al') ,
            'alc_frec' => $this
                ->input
                ->post('hab_f_al') ,
            'tab_can' => $this
                ->input
                ->post('hab_c_tab') ,
            'tab_frec' => $this
                ->input
                ->post('hab_f_tab') ,
            'hab_c_drug' => $this
                ->input
                ->post('hab_c_drug') ,
            'hab_f_drug' => $this
                ->input
                ->post('hab_f_drug') ,
            'hookah' => $this
                ->input
                ->post('hookah') ,
            'hab_f_hookah' => $this
                ->input
                ->post('hab_f_hookah') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'update_time' => $insert_date
        );
        $idHabT = $this
            ->model_admin
            ->saveHabitosToxicos($save4);
        $counHabT = $this
            ->model_admin
            ->countHabitosToxicos($this
            ->input
            ->post('hist_id'));
        if ($counHabT > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyHabitosToxicos($idHabT);
        }
        if (!empty($hab_t_drug))
        {
            foreach ($hab_t_drug as $drug)
            {
                $save = array(
                    'name' => $drug,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id')
                );
                $this
                    ->model_admin
                    ->SaveDrug($save);
            };
        }
        $saveof = array(
            'od_sin_con' => $this
                ->input
                ->post('od_sin_con') ,
            'od_con_cor' => $this
                ->input
                ->post('od_con_cor') ,
            'od_mas_o_meno' => $this
                ->input
                ->post('od_mas_o_meno') ,
            'od_cor_act' => $this
                ->input
                ->post('od_cor_act') ,
            'os_sin_con' => $this
                ->input
                ->post('os_sin_con') ,
            'os_con_cor' => $this
                ->input
                ->post('os_con_cor') ,
            'os_mas_o_meno' => $this
                ->input
                ->post('os_mas_o_meno') ,
            'os_cor_act' => $this
                ->input
                ->post('os_cor_act') ,
            'retine1' => $this
                ->input
                ->post('retine1') ,
            'retine2' => $this
                ->input
                ->post('retine2') ,
            'retine3' => $this
                ->input
                ->post('retine3') ,
            'retine4' => $this
                ->input
                ->post('retine4') ,
            'retine5' => $this
                ->input
                ->post('retine5') ,
            'retine6' => $this
                ->input
                ->post('retine6') ,
            'retine7' => $this
                ->input
                ->post('retine7') ,
            'retine8' => $this
                ->input
                ->post('retine8') ,
            'masomenos1' => $this
                ->input
                ->post('masomenos1') ,
            'masomenos2' => $this
                ->input
                ->post('masomenos2') ,
            'masomenos3' => $this
                ->input
                ->post('masomenos3') ,
            'masomenos4' => $this
                ->input
                ->post('masomenos4') ,
            'masomenos5' => $this
                ->input
                ->post('masomenos5') ,
            'masomenos6' => $this
                ->input
                ->post('masomenos6') ,
            'masomenos7' => $this
                ->input
                ->post('masomenos7') ,
            'masomenos8' => $this
                ->input
                ->post('masomenos8') ,
            'ppm' => $this
                ->input
                ->post('ppm') ,
            'converg' => $this
                ->input
                ->post('converg') ,
            'ducvers' => $this
                ->input
                ->post('ducvers') ,
            'convertest' => $this
                ->input
                ->post('convertest') ,
            'od_espera_r' => $this
                ->input
                ->post('od_espera_r') ,
            'od_espera' => $this
                ->input
                ->post('od_espera') ,
            'od_cilindro' => $this
                ->input
                ->post('od_cilindro') ,
            'od_cilindro_r' => $this
                ->input
                ->post('od_cilindro_r') ,
            'eje_od' => $this
                ->input
                ->post('eje_od') ,
            'add_od' => $this
                ->input
                ->post('add_od') ,
            'vision_od' => $this
                ->input
                ->post('vision_od') ,
            'espera_os' => $this
                ->input
                ->post('os_espera') ,
            'os_espera_r' => $this
                ->input
                ->post('os_espera_r') ,
            'cilindro_os' => $this
                ->input
                ->post('os_cilindro') ,
            'os_cilindro_r' => $this
                ->input
                ->post('os_cilindro_r') ,
            'eje_os' => $this
                ->input
                ->post('eje_os') ,
            'add_os' => $this
                ->input
                ->post('add_os') ,
            'vision_os' => $this
                ->input
                ->post('vision_os') ,
            'conj1' => $this
                ->input
                ->post('conj1') ,
            'conj2' => $this
                ->input
                ->post('conj2') ,
            'cornea1' => $this
                ->input
                ->post('cornea1') ,
            'cornea2' => $this
                ->input
                ->post('cornea2') ,
            'pup1' => $this
                ->input
                ->post('pup1') ,
            'pup2' => $this
                ->input
                ->post('pup2') ,
            'crist1' => $this
                ->input
                ->post('crist1') ,
            'crist2' => $this
                ->input
                ->post('crist2') ,
            'vitreo1' => $this
                ->input
                ->post('vitreo1') ,
            'nota' => $this
                ->input
                ->post('not_oftm') ,
            'vitreo2' => $this
                ->input
                ->post('vitreo2') ,
            'fondos1' => $this
                ->input
                ->post('fondos1') ,
            'fondos2' => $this
                ->input
                ->post('fondos2') ,
            'ojo' => "ojo-" . time() . ".png",
            'fondo' => "fondo-" . time() . ".png",
            'id_historial ' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'updated_time' => $insert_date,
            'user_id' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->saveOftalmologia($saveof);
        $this
            ->model_admin
            ->delete_empty_oftal();
        $upload_dir = './assets/img/oftal/';
        $file1 = $upload_dir . "ojo-" . time() . ".png";
        $data1 = $_POST['canvasOj'];
        $data1 = substr($data1, strpos($data1, ",") + 1);
        $data1 = base64_decode($data1);
        file_put_contents($file1, $data1);
        $file2 = $upload_dir . "fondo-" . time() . ".png";
        $data2 = $_POST['canvasFo'];
        $data2 = substr($data2, strpos($data2, ",") + 1);
        $data2 = base64_decode($data2);
        file_put_contents($file2, $data2);
    }
    function saveMedFisRehab()
    {
        $insert_date = date("Y-m-d H:i:s");
        $user_id = $this
            ->input
            ->post('user_id');
        $idenfact = $this
            ->session
            ->userdata['update_enf_act'];
        $upEnf = array(
            'enf_motivo' => $this
                ->input
                ->post('enf_motivo') ,
            'signopsis' => $this
                ->input
                ->post('enf_signopsis') ,
            'laboratorios' => $this
                ->input
                ->post('enf_laboratorios') ,
            'estudios' => $this
                ->input
                ->post('enf_estudios')
        );
        $whereEnf = array(
            'id_enf' => $idenfact
        );
        $this
            ->db
            ->where($whereEnf);
        $this
            ->db
            ->update("h_c_sinopsis", $upEnf);
        $whereimg = array(
            'id_patient' => $this
                ->input
                ->post('hist_id') ,
            'userid' => $this
                ->input
                ->post('user_id') ,
            'id_enfermedad' => 0
        );
        $updimg = array(
            'id_enfermedad' => $idenfact
        );
        $this
            ->db
            ->where($whereimg);
        $this
            ->db
            ->update("saveEnfImage", $updimg);
        $query1 = $this
            ->db
            ->get_where('type_reasons', array(
            'title' => $this
                ->input
                ->post('enf_motivo')
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'title' => $this
                    ->input
                    ->post('enf_motivo') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => $insert_date,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => $insert_date
            );
            $this
                ->model_admin
                ->save_new_causa($save);
        }
        $hab_t_drug = $this
            ->input
            ->post('hab_t_drug');
        $todo_check = $this
            ->input
            ->post('todo_check');
        $todo_check1 = (isset($todo_check)) ? 1 : 0;
        $car_nin_check = $this
            ->input
            ->post('car_nin_check');
        $car_nin_check1 = (isset($car_nin_check)) ? 1 : 0;
        $madre_check = $this
            ->input
            ->post('madre_check');
        $madre_check1 = (isset($madre_check)) ? 1 : 0;
        $padre_check = $this
            ->input
            ->post('padre_check');
        $padre_check1 = (isset($padre_check)) ? 1 : 0;
        $car_h_check = $this
            ->input
            ->post('car_h_check');
        $car_h_check1 = (isset($car_h_check)) ? 1 : 0;
        $car_pe_check = $this
            ->input
            ->post('car_pe_check');
        $car_pe_check1 = (isset($car_pe_check)) ? 1 : 0;
        $nin_check2 = $this
            ->input
            ->post('nin_check2');
        $nin_check22 = (isset($nin_check2)) ? 1 : 0;
        $madre_check2 = $this
            ->input
            ->post('madre_check2');
        $madre_check22 = (isset($madre_check2)) ? 1 : 0;
        $padre_check2 = $this
            ->input
            ->post('padre_check2');
        $padre_check22 = (isset($padre_check2)) ? 1 : 0;
        $h_check2 = $this
            ->input
            ->post('h_check2');
        $h_check22 = (isset($h_check2)) ? 1 : 0;
        $pe_check2 = $this
            ->input
            ->post('pe_check2');
        $pe_check22 = (isset($pe_check2)) ? 1 : 0;
        $nin_check3 = $this
            ->input
            ->post('nin_check3');
        $nin_check33 = (isset($nin_check3)) ? 1 : 0;
        $madre_check3 = $this
            ->input
            ->post('madre_check3');
        $madre_check33 = (isset($madre_check3)) ? 1 : 0;
        $padre_check3 = $this
            ->input
            ->post('padre_check3');
        $padre_check33 = (isset($padre_check3)) ? 1 : 0;
        $h_check3 = $this
            ->input
            ->post('h_check3');
        $h_check33 = (isset($h_check3)) ? 1 : 0;
        $pe_check3 = $this
            ->input
            ->post('pe_check3');
        $pe_check33 = (isset($pe_check3)) ? 1 : 0;
        $nin_check4 = $this
            ->input
            ->post('nin_check4');
        $nin_check44 = (isset($nin_check4)) ? 1 : 0;
        $madre_check4 = $this
            ->input
            ->post('madre_check4');
        $madre_check44 = (isset($madre_check4)) ? 1 : 0;
        $padre_check4 = $this
            ->input
            ->post('padre_check4');
        $padre_check44 = (isset($padre_check4)) ? 1 : 0;
        $h_check4 = $this
            ->input
            ->post('h_check4');
        $h_check44 = (isset($h_check4)) ? 1 : 0;
        $pe_check4 = $this
            ->input
            ->post('pe_check4');
        $pe_check44 = (isset($pe_check4)) ? 1 : 0;
        $nin_check5 = $this
            ->input
            ->post('nin_check5');
        $nin_check55 = (isset($nin_check5)) ? 1 : 0;
        $madre_check5 = $this
            ->input
            ->post('madre_check5');
        $madre_check55 = (isset($madre_check5)) ? 1 : 0;
        $padre_check5 = $this
            ->input
            ->post('padre_check5');
        $padre_check55 = (isset($padre_check5)) ? 1 : 0;
        $h_check5 = $this
            ->input
            ->post('h_check5');
        $h_check55 = (isset($h_check5)) ? 1 : 0;
        $pe_check5 = $this
            ->input
            ->post('pe_check5');
        $pe_check55 = (isset($pe_check5)) ? 1 : 0;
        $nin_check05 = $this
            ->input
            ->post('nin_check05');
        $nin_check055 = (isset($nin_check05)) ? 1 : 0;
        $madre_check05 = $this
            ->input
            ->post('madre_check05');
        $madre_check055 = (isset($madre_check05)) ? 1 : 0;
        $padre_check05 = $this
            ->input
            ->post('padre_check05');
        $padre_check055 = (isset($padre_check05)) ? 1 : 0;
        $h_check05 = $this
            ->input
            ->post('h_check05');
        $h_check055 = (isset($h_check05)) ? 1 : 0;
        $pe_check05 = $this
            ->input
            ->post('pe_check05');
        $pe_check055 = (isset($pe_check05)) ? 1 : 0;
        $nin_check6 = $this
            ->input
            ->post('nin_check6');
        $nin_check66 = (isset($nin_check6)) ? 1 : 0;
        $madre_check6 = $this
            ->input
            ->post('madre_check6');
        $madre_check66 = (isset($madre_check6)) ? 1 : 0;
        $padre_check6 = $this
            ->input
            ->post('padre_check6');
        $padre_check66 = (isset($padre_check6)) ? 1 : 0;
        $h_check6 = $this
            ->input
            ->post('h_check6');
        $h_check66 = (isset($h_check6)) ? 1 : 0;
        $pe_check6 = $this
            ->input
            ->post('pe_check6');
        $pe_check66 = (isset($pe_check6)) ? 1 : 0;
        $nin_check7 = $this
            ->input
            ->post('nin_check7');
        $nin_check77 = (isset($nin_check7)) ? 1 : 0;
        $madre_check7 = $this
            ->input
            ->post('madre_check7');
        $madre_check77 = (isset($madre_check7)) ? 1 : 0;
        $padre_check7 = $this
            ->input
            ->post('padre_check7');
        $padre_check77 = (isset($padre_check7)) ? 1 : 0;
        $h_check7 = $this
            ->input
            ->post('h_check7');
        $h_check77 = (isset($h_check7)) ? 1 : 0;
        $pe_check7 = $this
            ->input
            ->post('pe_check7');
        $pe_check77 = (isset($pe_check7)) ? 1 : 0;
        $nin_check8 = $this
            ->input
            ->post('nin_check8');
        $nin_check88 = (isset($nin_check8)) ? 1 : 0;
        $madre_check8 = $this
            ->input
            ->post('madre_check8');
        $madre_check88 = (isset($madre_check8)) ? 1 : 0;
        $padre_check8 = $this
            ->input
            ->post('padre_check8');
        $padre_check88 = (isset($padre_check8)) ? 1 : 0;
        $h_check8 = $this
            ->input
            ->post('h_check8');
        $h_check88 = (isset($h_check8)) ? 1 : 0;
        $pe_check8 = $this
            ->input
            ->post('pe_check8');
        $pe_check88 = (isset($pe_check8)) ? 1 : 0;
        $nin_check9 = $this
            ->input
            ->post('nin_check9');
        $nin_check99 = (isset($nin_check9)) ? 1 : 0;
        $madre_check9 = $this
            ->input
            ->post('madre_check9');
        $madre_check99 = (isset($madre_check9)) ? 1 : 0;
        $padre_check9 = $this
            ->input
            ->post('padre_check9');
        $padre_check99 = (isset($padre_check9)) ? 1 : 0;
        $h_check9 = $this
            ->input
            ->post('h_check9');
        $h_check99 = (isset($h_check9)) ? 1 : 0;
        $pe_check9 = $this
            ->input
            ->post('pe_check9');
        $pe_check99 = (isset($pe_check9)) ? 1 : 0;
        $nin_check10 = $this
            ->input
            ->post('nin_check10');
        $nin_check1010 = (isset($nin_check10)) ? 1 : 0;
        $madre_check10 = $this
            ->input
            ->post('madre_check10');
        $madre_check1010 = (isset($madre_check10)) ? 1 : 0;
        $padre_check10 = $this
            ->input
            ->post('padre_check10');
        $padre_check1010 = (isset($padre_check10)) ? 1 : 0;
        $h_check10 = $this
            ->input
            ->post('h_check10');
        $h_check1010 = (isset($h_check10)) ? 1 : 0;
        $pe_check10 = $this
            ->input
            ->post('pe_check10');
        $pe_check1010 = (isset($pe_check10)) ? 1 : 0;
        $nin_check11 = $this
            ->input
            ->post('nin_check11');
        $nin_check1111 = (isset($nin_check11)) ? 1 : 0;
        $madre_check11 = $this
            ->input
            ->post('madre_check11');
        $madre_check1111 = (isset($madre_check11)) ? 1 : 0;
        $padre_check11 = $this
            ->input
            ->post('padre_check11');
        $padre_check1111 = (isset($padre_check11)) ? 1 : 0;
        $h_check11 = $this
            ->input
            ->post('h_check11');
        $h_check1111 = (isset($h_check11)) ? 1 : 0;
        $pe_check11 = $this
            ->input
            ->post('pe_check11');
        $pe_check1111 = (isset($pe_check11)) ? 1 : 0;
        $neop_check12 = $this
            ->input
            ->post('neop_check12');
        $neop_check1212 = (isset($neop_check12)) ? 1 : 0;
        $madre_check12 = $this
            ->input
            ->post('madre_check12');
        $madre_check1212 = (isset($madre_check12)) ? 1 : 0;
        $padre_check12 = $this
            ->input
            ->post('padre_check12');
        $padre_check1212 = (isset($padre_check12)) ? 1 : 0;
        $h_check12 = $this
            ->input
            ->post('h_check12');
        $h_check1212 = (isset($h_check12)) ? 1 : 0;
        $pe_check12 = $this
            ->input
            ->post('pe_check12');
        $pe_check1212 = (isset($pe_check12)) ? 1 : 0;
        $psi_check13 = $this
            ->input
            ->post('psi_check13');
        $psi_check1313 = (isset($psi_check13)) ? 1 : 0;
        $madre_check13 = $this
            ->input
            ->post('madre_check13');
        $madre_check1313 = (isset($madre_check13)) ? 1 : 0;
        $padre_check13 = $this
            ->input
            ->post('padre_check13');
        $padre_check1313 = (isset($padre_check13)) ? 1 : 0;
        $h_check13 = $this
            ->input
            ->post('h_check13');
        $h_check1313 = (isset($h_check13)) ? 1 : 0;
        $pe_check13 = $this
            ->input
            ->post('pe_check13');
        $pe_check1313 = (isset($pe_check13)) ? 1 : 0;
        $obs_check14 = $this
            ->input
            ->post('obs_check14');
        $obs_check1414 = (isset($obs_check14)) ? 1 : 0;
        $madre_check14 = $this
            ->input
            ->post('madre_check14');
        $madre_check1414 = (isset($madre_check14)) ? 1 : 0;
        $padre_check14 = $this
            ->input
            ->post('padre_check14');
        $padre_check1414 = (isset($padre_check14)) ? 1 : 0;
        $h_check14 = $this
            ->input
            ->post('h_check14');
        $h_check1414 = (isset($h_check14)) ? 1 : 0;
        $pe_check14 = $this
            ->input
            ->post('pe_check14');
        $pe_check1414 = (isset($pe_check14)) ? 1 : 0;
        $ulp_check15 = $this
            ->input
            ->post('ulp_check15');
        $ulp_check1515 = (isset($ulp_check15)) ? 1 : 0;
        $madre_check15 = $this
            ->input
            ->post('madre_check15');
        $madre_check1515 = (isset($madre_check15)) ? 1 : 0;
        $padre_check15 = $this
            ->input
            ->post('padre_check15');
        $padre_check1515 = (isset($padre_check15)) ? 1 : 0;
        $h_check15 = $this
            ->input
            ->post('h_check15');
        $h_check1515 = (isset($h_check15)) ? 1 : 0;
        $pe_check15 = $this
            ->input
            ->post('pe_check15');
        $pe_check1515 = (isset($pe_check15)) ? 1 : 0;
        $art_check16 = $this
            ->input
            ->post('art_check16');
        $art_check1616 = (isset($art_check16)) ? 1 : 0;
        $madre_check16 = $this
            ->input
            ->post('madre_check16');
        $madre_check1616 = (isset($madre_check16)) ? 1 : 0;
        $padre_check16 = $this
            ->input
            ->post('padre_check16');
        $padre_check1616 = (isset($padre_check16)) ? 1 : 0;
        $h_check16 = $this
            ->input
            ->post('h_check16');
        $h_check1616 = (isset($h_check16)) ? 1 : 0;
        $pe_check16 = $this
            ->input
            ->post('pe_check16');
        $pe_check1616 = (isset($pe_check16)) ? 1 : 0;
        $art_check016 = $this
            ->input
            ->post('art_check016');
        $art_check01616 = (isset($art_check016)) ? 1 : 0;
        $madre_check016 = $this
            ->input
            ->post('madre_check016');
        $madre_check01616 = (isset($madre_check016)) ? 1 : 0;
        $padre_check016 = $this
            ->input
            ->post('padre_check016');
        $padre_check01616 = (isset($padre_check016)) ? 1 : 0;
        $h_check016 = $this
            ->input
            ->post('h_check016');
        $h_check01616 = (isset($h_check016)) ? 1 : 0;
        $pe_check016 = $this
            ->input
            ->post('pe_check016');
        $pe_check01616 = (isset($pe_check016)) ? 1 : 0;
        $zika_check17 = $this
            ->input
            ->post('zika_check17');
        $zika_check1717 = (isset($zika_check17)) ? 1 : 0;
        $madre_check17 = $this
            ->input
            ->post('madre_check17');
        $madre_check1717 = (isset($madre_check17)) ? 1 : 0;
        $padre_check17 = $this
            ->input
            ->post('padre_check17');
        $padre_check1717 = (isset($padre_check17)) ? 1 : 0;
        $h_check17 = $this
            ->input
            ->post('h_check17');
        $h_check1717 = (isset($h_check17)) ? 1 : 0;
        $pe_check17 = $this
            ->input
            ->post('pe_check17');
        $pe_check1717 = (isset($pe_check17)) ? 1 : 0;
        $save = array(
            'todo' => $todo_check1,
            'car_nin' => $car_nin_check1,
            'car_m' => $madre_check1,
            'car_p' => $padre_check1,
            'car_h' => $car_h_check1,
            'car_pe' => $car_pe_check1,
            'car_text' => $this
                ->input
                ->post('car_text') ,
            'hip_nin' => $nin_check22,
            'hip_m' => $madre_check22,
            'hip_p' => $padre_check22,
            'hip_h' => $h_check22,
            'hip_pe' => $pe_check22,
            'hip_text' => $this
                ->input
                ->post('hip_text') ,
            'ec_nin' => $nin_check33,
            'ec_m' => $madre_check33,
            'ec_p' => $padre_check33,
            'ec_h' => $h_check33,
            'ec_pe' => $pe_check33,
            'ec_text' => $this
                ->input
                ->post('ec_text') ,
            'ep_nin' => $nin_check44,
            'ep_m' => $madre_check44,
            'ep_p' => $padre_check44,
            'ep_h' => $h_check44,
            'ep_pe' => $pe_check44,
            'ep_text' => $this
                ->input
                ->post('ep_text') ,
            'as_nin' => $nin_check55,
            'as_m' => $madre_check55,
            'as_p' => $padre_check55,
            'as_h' => $h_check55,
            'as_pe' => $pe_check55,
            'as_text' => $this
                ->input
                ->post('as_text') ,
            'enre_nin' => $nin_check055,
            'enre_m' => $madre_check055,
            'enre_p' => $padre_check055,
            'enre_h' => $h_check055,
            'enre_pe' => $pe_check055,
            'enre_text' => $this
                ->input
                ->post('enre_text') ,
            'tub_nin' => $nin_check66,
            'tub_m' => $madre_check66,
            'tub_p' => $padre_check66,
            'tub_h' => $h_check66,
            'tub_pe' => $pe_check66,
            'tub_text' => $this
                ->input
                ->post('tub_text') ,
            'dia_nin' => $nin_check77,
            'dia_m' => $madre_check77,
            'dia_p' => $padre_check77,
            'dia_h' => $h_check77,
            'dia_pe' => $pe_check77,
            'dia_text' => $this
                ->input
                ->post('dia_text') ,
            'tir_nin' => $nin_check88,
            'tir_m' => $madre_check88,
            'tir_p' => $padre_check88,
            'tir_h' => $h_check88,
            'tir_pe' => $pe_check88,
            'tir_text' => $this
                ->input
                ->post('tir_text') ,
            'hep_tipo' => $this
                ->input
                ->post('hep_tipo') ,
            'hep_nin' => $nin_check99,
            'hep_m' => $madre_check99,
            'hep_p' => $padre_check99,
            'hep_h' => $h_check99,
            'hep_pe' => $pe_check99,
            'hep_text' => $this
                ->input
                ->post('hep_text') ,
            'enfr_nin' => $nin_check1010,
            'enfr_m' => $madre_check1010,
            'enfr_p' => $padre_check1010,
            'enfr_h' => $h_check1010,
            'enfr_pe' => $pe_check1010,
            'enfr_text' => $this
                ->input
                ->post('enfr_text') ,
            'falc_nin' => $nin_check1111,
            'falc_m' => $madre_check1111,
            'falc_p' => $padre_check1111,
            'falc_h' => $h_check1111,
            'falc_pe' => $pe_check1111,
            'falc_text' => $this
                ->input
                ->post('falc_text') ,
            'neop_nin' => $neop_check1212,
            'neop_m' => $madre_check1212,
            'neop_p' => $padre_check1212,
            'neop_h' => $h_check1212,
            'neop_pe' => $pe_check1212,
            'neop_text' => $this
                ->input
                ->post('neop_text') ,
            'psi_nin' => $psi_check1313,
            'psi_m' => $madre_check1313,
            'psi_p' => $padre_check1313,
            'psi_h' => $h_check1313,
            'psi_pe' => $pe_check1313,
            'psi_text' => $this
                ->input
                ->post('psi_text') ,
            'obs_nin' => $obs_check1414,
            'obs_m' => $madre_check1414,
            'obs_p' => $padre_check1414,
            'obs_h' => $h_check1414,
            'obs_pe' => $pe_check1414,
            'obs_text' => $this
                ->input
                ->post('obs_text') ,
            'ulp_nin' => $ulp_check1515,
            'ulp_m' => $madre_check1515,
            'ulp_p' => $padre_check1515,
            'ulp_h' => $h_check1515,
            'ulp_pe' => $pe_check1515,
            'ulp_text' => $this
                ->input
                ->post('ulp_text') ,
            'art_nin' => $art_check1616,
            'art_m' => $madre_check1616,
            'art_p' => $padre_check1616,
            'art_h' => $h_check1616,
            'art_pe' => $pe_check1616,
            'art_text' => $this
                ->input
                ->post('art_text') ,
            'hem_nin' => $art_check01616,
            'hem_m' => $madre_check01616,
            'hem_p' => $padre_check01616,
            'hem_h' => $h_check01616,
            'hem_pe' => $pe_check01616,
            'hem_text' => $this
                ->input
                ->post('hem_text') ,
            'zika_nin' => $zika_check1717,
            'zika_m' => $madre_check1717,
            'zika_p' => $padre_check1717,
            'zika_h' => $h_check1717,
            'zika_pe' => $pe_check1717,
            'zika_text' => $this
                ->input
                ->post('zika_text') ,
            'otros' => $this
                ->input
                ->post('otros') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'date_modif' => $insert_date,
            'operator' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id') ,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $idMarPos = $this
            ->model_admin
            ->marquePositivo($save);
        $counMarP = $this
            ->model_admin
            ->countAnte1($this
            ->input
            ->post('hist_id'));
        if ($counMarP > 1)
        {
            $this
                ->model_admin
                ->DeleteDuplicateMarqueP($idMarPos);
        }
        $newMpat = $this
            ->input
            ->post('newMpat');
        if ($newMpat)
        {
            foreach ($newMpat as $key => $med)
            {
                $savecd = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'part' => 'gnl',
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($savecd);
            }
        }
        $save2 = array(
            'maltratof' => $this
                ->input
                ->post('textmaltrato_g') ,
            'abusos' => $this
                ->input
                ->post('textabuso_g') ,
            'negligencia' => $this
                ->input
                ->post('textneg_g') ,
            'maltrato' => $this
                ->input
                ->post('maltratoemo_g') ,
            'alimentos' => $this
                ->input
                ->post('alimentos_al') ,
            'medicamentos' => $this
                ->input
                ->post('medicamentos_al') ,
            'otros' => $this
                ->input
                ->post('otros_al') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'update_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id')
        );
        $idDes = $this
            ->model_admin
            ->DesantAl($save2);
        $counDesa = $this
            ->model_admin
            ->countDesarollo($this
            ->input
            ->post('hist_id'));
        if ($counDesa > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyDesarollo($idDes);
        }
        $save3 = array(
            'quirurgicos' => $this
                ->input
                ->post('quirurgicos') ,
            'gineco' => $this
                ->input
                ->post('gineco') ,
            'abdominal' => $this
                ->input
                ->post('abdominal') ,
            'toracica' => $this
                ->input
                ->post('toracica') ,
            'transfusion' => $this
                ->input
                ->post('transfusion') ,
            'otros1' => $this
                ->input
                ->post('otros1_g') ,
            'hepatis' => $this
                ->input
                ->post('hepatis') ,
            'hpv' => $this
                ->input
                ->post('hpv') ,
            'toxoide' => $this
                ->input
                ->post('toxoide') ,
            'grouposang' => $this
                ->input
                ->post('grouposang') ,
            'tipificacion' => $this
                ->input
                ->post('tipificacion') ,
            'rh' => $this
                ->input
                ->post('rhoa') ,
            'violencia1' => $this
                ->input
                ->post('violencia1') ,
            'violencia2' => $this
                ->input
                ->post('violencia2') ,
            'violencia3' => $this
                ->input
                ->post('violencia3') ,
            'violencia4' => $this
                ->input
                ->post('violencia4') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id')
        );
        $idAtO = $this
            ->model_admin
            ->saveAnteOtros($save3);
        $counAntOt = $this
            ->model_admin
            ->countAntOtros($this
            ->input
            ->post('hist_id'));
        if ($counAntOt > 1)
        {
            $this
                ->model_admin
                ->DeleteAntOtros($idAtO);
        }
        if (!empty($medicine))
        {
            foreach ($medicine as $med)
            {
                $save = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($save);
            };
        };
        $this
            ->model_admin
            ->deleteMedNinguno();
        $save4 = array(
            'cafe_cant' => $this
                ->input
                ->post('hab_c_caf') ,
            'cafe_frec' => $this
                ->input
                ->post('hab_f_caf') ,
            'pipa_cant' => $this
                ->input
                ->post('hab_c_pip') ,
            'pipa_frec' => $this
                ->input
                ->post('hab_f_pip') ,
            'ciga_can' => $this
                ->input
                ->post('hab_c_ciga') ,
            'ciga_frec' => $this
                ->input
                ->post('hab_f_ciga') ,
            'alc_can' => $this
                ->input
                ->post('hab_c_al') ,
            'alc_frec' => $this
                ->input
                ->post('hab_f_al') ,
            'tab_can' => $this
                ->input
                ->post('hab_c_tab') ,
            'tab_frec' => $this
                ->input
                ->post('hab_f_tab') ,
            'hab_c_drug' => $this
                ->input
                ->post('hab_c_drug') ,
            'hab_f_drug' => $this
                ->input
                ->post('hab_f_drug') ,
            'hookah' => $this
                ->input
                ->post('hookah') ,
            'hab_f_hookah' => $this
                ->input
                ->post('hab_f_hookah') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'update_time' => $insert_date
        );
        $idHabT = $this
            ->model_admin
            ->saveHabitosToxicos($save4);
        $counHabT = $this
            ->model_admin
            ->countHabitosToxicos($this
            ->input
            ->post('hist_id'));
        if ($counHabT > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyHabitosToxicos($idHabT);
        }
        if (!empty($hab_t_drug))
        {
            foreach ($hab_t_drug as $drug)
            {
                $save = array(
                    'name' => $drug,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id')
                );
                $this
                    ->model_admin
                    ->SaveDrug($save);
            };
        }
        $examFisico = array(
            'peso' => $this
                ->input
                ->post('peso') ,
            'kg' => $this
                ->input
                ->post('kg') ,
            'talla' => $this
                ->input
                ->post('talla') ,
            'pulgada_exf' => $this
                ->input
                ->post('pulgada') ,
            'imc' => $this
                ->input
                ->post('imc') ,
            'ta' => $this
                ->input
                ->post('ta') ,
            'fr' => $this
                ->input
                ->post('fr') ,
            'fc' => $this
                ->input
                ->post('fc') ,
            'hg' => $this
                ->input
                ->post('hg') ,
            'tempo' => $this
                ->input
                ->post('tempo') ,
            'pulso' => $this
                ->input
                ->post('pulso') ,
            'glicemia' => $this
                ->input
                ->post('glicemia') ,
            'radio' => $this
                ->input
                ->post('radio_signo') ,
            'neuro_s' => $this
                ->input
                ->post('neuro_s') ,
            'neuro_text' => $this
                ->input
                ->post('neuro_text') ,
            'cabeza' => $this
                ->input
                ->post('cabeza') ,
            'cabeza_text' => $this
                ->input
                ->post('cabeza_text') ,
            'cuello' => $this
                ->input
                ->post('cuello') ,
            'cuello_text' => $this
                ->input
                ->post('cuello_text') ,
            'abd_insp' => $this
                ->input
                ->post('abd_insp') ,
            'ausc' => $this
                ->input
                ->post('ausc') ,
            'perc' => $this
                ->input
                ->post('perc') ,
            'palpa' => $this
                ->input
                ->post('palpa') ,
            'ext_sup_text' => $this
                ->input
                ->post('ext_sup_text') ,
            'ext_sup' => $this
                ->input
                ->post('ext_sup') ,
            'torax' => $this
                ->input
                ->post('torax') ,
            'torax_text' => $this
                ->input
                ->post('torax_text') ,
            'ext_inf' => $this
                ->input
                ->post('ext_inf') ,
            'ext_inft' => $this
                ->input
                ->post('ext_inft') ,
            'cuad_inf_ext1' => $this
                ->input
                ->post('cuad_inf_ext1') ,
            'mama_izq1' => $this
                ->input
                ->post('mama_izq1') ,
            'cuad_sup_ext1' => $this
                ->input
                ->post('cuad_sup_ext1') ,
            'cuad_inf_ext11' => $this
                ->input
                ->post('cuad_inf_ext11') ,
            'region_retro1' => $this
                ->input
                ->post('region_retro1') ,
            'region_areola_pezon1' => $this
                ->input
                ->post('region_areola_pezon1') ,
            'region_ax1' => $this
                ->input
                ->post('region_ax1') ,
            'cuad_inf_ext2' => $this
                ->input
                ->post('cuad_inf_ext2') ,
            'mama_izq2' => $this
                ->input
                ->post('mama_izq2') ,
            'cuad_sup_ext2' => $this
                ->input
                ->post('cuad_sup_ext2') ,
            'cuad_inf_ext22' => $this
                ->input
                ->post('cuad_inf_ext22') ,
            'region_retro2' => $this
                ->input
                ->post('region_retro2') ,
            'region_areola_pezon2' => $this
                ->input
                ->post('region_areola_pezon2') ,
            'region_ax2' => $this
                ->input
                ->post('region_ax2') ,
            'especuloscopia' => $this
                ->input
                ->post('especuloscopia') ,
            'tacto_bima' => $this
                ->input
                ->post('tacto_bima') ,
            'cervix' => $this
                ->input
                ->post('cervix') ,
            'cervix_text' => $this
                ->input
                ->post('cervix_text') ,
            'utero_text' => $this
                ->input
                ->post('utero_text') ,
            'anexo_derecho_text' => $this
                ->input
                ->post('anexo_derecho_text') ,
            'anexo_iz_text' => $this
                ->input
                ->post('anexo_iz_text') ,
            'inspection_vulval' => $this
                ->input
                ->post('inspection_vulval') ,
            'inspection_vulval_text' => $this
                ->input
                ->post('inspection_vulval_text') ,
            'rectal_text' => $this
                ->input
                ->post('rectal_text') ,
            'rectal' => $this
                ->input
                ->post('rectal') ,
            'genitalm' => $this
                ->input
                ->post('genitalm') ,
            'genitalm_text' => $this
                ->input
                ->post('genitalm_text') ,
            'genitalf_text' => $this
                ->input
                ->post('genitalf_text') ,
            'genitalf' => $this
                ->input
                ->post('genitalf') ,
            'vagina' => $this
                ->input
                ->post('vagina') ,
            'vagina_text' => $this
                ->input
                ->post('vagina_text') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $id_signo = $this
            ->model_admin
            ->saveExamenFisico($examFisico);
        $examFis = $this
            ->db
            ->select('*')
            ->where('id_sig', $id_signo)->get('h_c_examen_fisico')
            ->row_array();
        if ($examFis['peso'] == 0 && $examFis['kg'] == 0 && $examFis['talla'] == '' && $examFis['imc'] == '' && $examFis['ta'] == '' && $examFis['fr'] == '' && $examFis['fc'] == '' && $examFis['hg'] == '' && $examFis['tempo'] == '' && $examFis['pulso'] == '' && $examFis['glicemia'] == 0 && $examFis['neuro_s'] == '' && $examFis['neuro_text'] == '' && $examFis['cabeza'] == '' && $examFis['cabeza_text'] == '' && $examFis['cuello'] == '' && $examFis['cuello_text'] == '' && $examFis['abd_insp'] == '' && $examFis['ausc'] == '' && $examFis['perc'] == '' && $examFis['palpa'] == '' && $examFis['ext_sup'] == '' && $examFis['ext_sup_text'] == '' && $examFis['torax'] == '' && $examFis['torax_text'] == '' && $examFis['ext_inf'] == '' && $examFis['ext_inft'] == '' && $examFis['vagina_text'] == '' && $examFis['vagina'] == '' && $examFis['cuad_inf_ext1'] == '' && $examFis['mama_izq1'] == '' && $examFis['cuad_sup_ext1'] == '' && $examFis['cuad_inf_ext11'] == '' && $examFis['region_retro1'] == '' && $examFis['region_areola_pezon1'] == '' && $examFis['region_ax1'] == '' && $examFis['cuad_inf_ext2'] == '' && $examFis['mama_izq2'] == '' && $examFis['cuad_sup_ext2'] == '' && $examFis['cuad_inf_ext22'] == '' && $examFis['region_retro2'] == '' && $examFis['region_areola_pezon2'] == '' && $examFis['region_ax2'] == '' && $examFis['especuloscopia'] == '' && $examFis['cervix'] == '' && $examFis['cervix_text'] == '' && $examFis['utero_text'] == '' && $examFis['anexo_derecho_text'] == '' && $examFis['anexo_iz_text'] == '' && $examFis['inspection_vulval'] == '' && $examFis['inspection_vulval_text'] == '' && $examFis['tacto_bima'] == '' && $examFis['rectal_text'] == '' && $examFis['rectal'] == '' && $examFis['genitalm'] == '' && $examFis['genitalm_text'] == '' && $examFis['genitalf_text'] == '' && $examFis['genitalf'] == '' && $examFis['vagina'] == '' && $examFis['vagina_text'] == '')
        {
            $this
                ->model_admin
                ->DeleteEmptyExamFis($id_signo);
        }
        $saveExOt = array(
            'oido1' => $this
                ->input
                ->post('oido1') ,
            'oido2' => $this
                ->input
                ->post('oido2') ,
            'nariz' => $this
                ->input
                ->post('nariz') ,
            'boca' => $this
                ->input
                ->post('boca') ,
            'otorrino_cuello1' => $this
                ->input
                ->post('otorrino_cuello1') ,
            'otorrino_cuello2' => $this
                ->input
                ->post('otorrino_cuello2') ,
            'observaciones_ot' => $this
                ->input
                ->post('observaciones_ot') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'user_id' => $this
                ->input
                ->post('user_id') ,
            'id_sig' => $id_signo
        );
        $this
            ->db
            ->insert("h_c_examen_fis_otorrino", $saveExOt);
        $whereot = array(
            'oido1' => '',
            'oido2' => '',
            'nariz' => '',
            'otorrino_cuello1' => '',
            'otorrino_cuello2' => '',
            'observaciones_ot' => '',
        );
        $this
            ->db
            ->where($whereot);
        $this
            ->db
            ->delete('h_c_examen_fis_otorrino');
        $saveExamSis = array(
            'sisneuro' => $this
                ->input
                ->post('sisneuro') ,
            'neurologico' => $this
                ->input
                ->post('neurologico') ,
            'siscardio' => $this
                ->input
                ->post('siscardio') ,
            'cardiova' => $this
                ->input
                ->post('cardiova') ,
            'sist_uro' => $this
                ->input
                ->post('sist_uro') ,
            'urogenital' => $this
                ->input
                ->post('urogenital') ,
            'sis_mu_e' => $this
                ->input
                ->post('sis_mu_e') ,
            'musculoes' => $this
                ->input
                ->post('musculoes') ,
            'sist_resp' => $this
                ->input
                ->post('sist_resp') ,
            'nervioso' => $this
                ->input
                ->post('nervioso') ,
            'linfatico' => $this
                ->input
                ->post('linfatico') ,
            'digestivo' => $this
                ->input
                ->post('digestivo') ,
            'respiratorio' => $this
                ->input
                ->post('respiratorio') ,
            'genitourinario' => $this
                ->input
                ->post('genitourinario') ,
            'sist_diges' => $this
                ->input
                ->post('sist_diges') ,
            'sist_endo' => $this
                ->input
                ->post('sist_endo') ,
            'endocrino' => $this
                ->input
                ->post('endocrino') ,
            'sist_rela' => $this
                ->input
                ->post('sist_rela') ,
            'otros_ex_sis' => $this
                ->input
                ->post('otros_ex_sis') ,
            'cardiova' => $this
                ->input
                ->post('cardiova') ,
            'dorsales' => $this
                ->input
                ->post('dorsales') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->saveExameneSistema($saveExamSis);
        $this
            ->model_admin
            ->DeleteEmptyExameneSistema($this
            ->input
            ->post('hist_id'));
        $save = array(
            'marcha_inicio' => $this
                ->input
                ->post('marcha_inicio') ,
            'long_mov_der' => $this
                ->input
                ->post('long_mov_der') ,
            'long_mov_izq' => $this
                ->input
                ->post('long_mov_izq') ,
            'long_simetria' => $this
                ->input
                ->post('long_simetria') ,
            'long_fluidez' => $this
                ->input
                ->post('long_fluidez') ,
            'long_traject' => $this
                ->input
                ->post('long_traject') ,
            'long_tronco' => $this
                ->input
                ->post('long_tronco') ,
            'long_postura' => $this
                ->input
                ->post('long_postura') ,
            'equi_sentado' => $this
                ->input
                ->post('equi_sentado') ,
            'equi_levantarse' => $this
                ->input
                ->post('equi_levantarse') ,
            'equi_intentos' => $this
                ->input
                ->post('equi_intentos') ,
            'equi_biped1' => $this
                ->input
                ->post('equi_biped1') ,
            'equi_biped2' => $this
                ->input
                ->post('equi_biped2') ,
            'equi_emp' => $this
                ->input
                ->post('equi_emp') ,
            'equi_ojos' => $this
                ->input
                ->post('equi_ojos') ,
            'equi_vuelta' => $this
                ->input
                ->post('equi_vuelta') ,
            'equi_sentarse' => $this
                ->input
                ->post('equi_sentarse') ,
            'eval_balsys' => $this
                ->input
                ->post('eval_balsys') ,
            'eval_movim' => $this
                ->input
                ->post('eval_movim') ,
            'eval_monop' => $this
                ->input
                ->post('eval_monop') ,
            'criteria_intens' => $this
                ->input
                ->post('criteria_intens') ,
            'criteria_cuidado1' => $this
                ->input
                ->post('criteria_cuidado1') ,
            'levantar_peso' => $this
                ->input
                ->post('levantar_peso') ,
            'criteria_caminar' => $this
                ->input
                ->post('criteria_caminar') ,
            'criteria_estar_sent' => $this
                ->input
                ->post('criteria_estar_sent') ,
            'criteria_dormir' => $this
                ->input
                ->post('criteria_dormir') ,
            'criteria_sexual' => $this
                ->input
                ->post('criteria_sexual') ,
            'criteria_vida' => $this
                ->input
                ->post('criteria_vida') ,
            'id_historial' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->saveRehabilidad($save);
        $this
            ->model_admin
            ->DeleteEmptyRehab($this
            ->input
            ->post('hist_id'));
        $query1 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('neuro_s') ,
            'location' => 26
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'name' => $this
                    ->input
                    ->post('neuro_s') ,
                'location' => 26
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save);
        }
        $query2 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cabeza') ,
            'location' => 27
        ));
        if ($query2->num_rows() == 0)
        {
            $save2 = array(
                'name' => $this
                    ->input
                    ->post('cabeza') ,
                'location' => 27
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save2);
        }
        $query3 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cuello') ,
            'location' => 9
        ));
        if ($query3->num_rows() == 0)
        {
            $save3 = array(
                'name' => $this
                    ->input
                    ->post('cuello') ,
                'location' => 9
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save3);
        }
        $query4 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('abd_insp') ,
            'location' => 28
        ));
        if ($query4->num_rows() == 0)
        {
            $save4 = array(
                'name' => $this
                    ->input
                    ->post('abd_insp') ,
                'location' => 28
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save4);
        }
        $query5 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ausc') ,
            'location' => 22
        ));
        if ($query5->num_rows() == 0)
        {
            $save5 = array(
                'name' => $this
                    ->input
                    ->post('ausc') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save5);
        }
        $query6 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('perc') ,
            'location' => 22
        ));
        if ($query6->num_rows() == 0)
        {
            $save6 = array(
                'name' => $this
                    ->input
                    ->post('perc') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save6);
        }
        $query7 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('palpa') ,
            'location' => 22
        ));
        if ($query7->num_rows() == 0)
        {
            $save7 = array(
                'name' => $this
                    ->input
                    ->post('palpa') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save7);
        }
        $query8 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ext_sup') ,
            'location' => 18
        ));
        if ($query8->num_rows() == 0)
        {
            $save8 = array(
                'name' => $this
                    ->input
                    ->post('ext_sup') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save8);
        }
        $query9 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('torax') ,
            'location' => 18
        ));
        if ($query9->num_rows() == 0)
        {
            $save9 = array(
                'name' => $this
                    ->input
                    ->post('torax') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save9);
        }
        $query10 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ext_inf') ,
            'location' => 18
        ));
        if ($query10->num_rows() == 0)
        {
            $save10 = array(
                'name' => $this
                    ->input
                    ->post('ext_inf') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save10);
        }
        $query11 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cervix') ,
            'location' => 29
        ));
        if ($query11->num_rows() == 0)
        {
            $save11 = array(
                'name' => $this
                    ->input
                    ->post('cervix') ,
                'location' => 29
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save11);
        }
        $query12 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('inspection_vulval') ,
            'location' => 24
        ));
        if ($query12->num_rows() == 0)
        {
            $save12 = array(
                'name' => $this
                    ->input
                    ->post('inspection_vulval') ,
                'location' => 24
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save12);
        }
        $query13 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('rectal') ,
            'location' => 14
        ));
        if ($query13->num_rows() == 0)
        {
            $save13 = array(
                'name' => $this
                    ->input
                    ->post('rectal') ,
                'location' => 14
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save13);
        }
        $query14 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('genitalm') ,
            'location' => 15
        ));
        if ($query14->num_rows() == 0)
        {
            $save14 = array(
                'name' => $this
                    ->input
                    ->post('genitalm') ,
                'location' => 15
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save14);
        }
        $query15 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('genitalf') ,
            'location' => 16
        ));
        if ($query15->num_rows() == 0)
        {
            $save15 = array(
                'name' => $this
                    ->input
                    ->post('genitalf') ,
                'location' => 16
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save15);
        }
        $query16 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('vagina') ,
            'location' => 17
        ));
        if ($query16->num_rows() == 0)
        {
            $save16 = array(
                'name' => $this
                    ->input
                    ->post('vagina') ,
                'location' => 17
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save16);
        }
        $query17 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('mama_izq1') ,
            'location' => 11
        ));
        if ($query17->num_rows() == 0)
        {
            $save17 = array(
                'name' => $this
                    ->input
                    ->post('mama_izq1') ,
                'location' => 11
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save17);
        }
        $query18 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('mama_izq2') ,
            'location' => 11
        ));
        if ($query18->num_rows() == 0)
        {
            $save18 = array(
                'name' => $this
                    ->input
                    ->post('mama_izq2') ,
                'location' => 11
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save18);
        }
        $query19 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('region_ax1') ,
            'location' => 12
        ));
        if ($query19->num_rows() == 0)
        {
            $save19 = array(
                'name' => $this
                    ->input
                    ->post('region_ax1') ,
                'location' => 12
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save19);
        }
        $query20 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('region_ax2') ,
            'location' => 12
        ));
        if ($query20->num_rows() == 0)
        {
            $save20 = array(
                'name' => $this
                    ->input
                    ->post('region_ax2') ,
                'location' => 12
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save20);
        }
        $query1 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sisneuro') ,
            'location' => 1
        ));
        if ($query1->num_rows() == 0)
        {
            $save1 = array(
                'name' => $this
                    ->input
                    ->post('sisneuro') ,
                'location' => 1
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save1);
        }
        $query2 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('siscardio') ,
            'location' => 2
        ));
        if ($query2->num_rows() == 0)
        {
            $save2 = array(
                'name' => $this
                    ->input
                    ->post('siscardio') ,
                'location' => 2
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save2);
        }
        $query3 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_uro') ,
            'location' => 3
        ));
        if ($query3->num_rows() == 0)
        {
            $save3 = array(
                'name' => $this
                    ->input
                    ->post('sist_uro') ,
                'location' => 3
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save3);
        }
        $query4 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sis_mu_e') ,
            'location' => 4
        ));
        if ($query4->num_rows() == 0)
        {
            $save4 = array(
                'name' => $this
                    ->input
                    ->post('sis_mu_e') ,
                'location' => 4
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save4);
        }
        $query5 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_resp') ,
            'location' => 7
        ));
        if ($query5->num_rows() == 0)
        {
            $save5 = array(
                'name' => $this
                    ->input
                    ->post('sist_resp') ,
                'location' => 7
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save5);
        }
        $query6 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_diges') ,
            'location' => 19
        ));
        if ($query6->num_rows() == 0)
        {
            $save6 = array(
                'name' => $this
                    ->input
                    ->post('sist_diges') ,
                'location' => 19
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save6);
        }
        $query7 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_endo') ,
            'location' => 21
        ));
        if ($query7->num_rows() == 0)
        {
            $save7 = array(
                'name' => $this
                    ->input
                    ->post('sist_endo') ,
                'location' => 21
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save7);
        }
        $query8 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_rela') ,
            'location' => 22
        ));
        if ($query8->num_rows() == 0)
        {
            $save8 = array(
                'name' => $this
                    ->input
                    ->post('sist_rela') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save8);
        }
    }
    function savePediatria()
    {
        $insert_date = date("Y-m-d H:i:s");
        $user_id = $this
            ->input
            ->post('user_id');
        $idenfact = $this
            ->session
            ->userdata['update_enf_act'];
        $upEnf = array(
            'enf_motivo' => $this
                ->input
                ->post('enf_motivo') ,
            'signopsis' => $this
                ->input
                ->post('enf_signopsis') ,
            'laboratorios' => $this
                ->input
                ->post('enf_laboratorios') ,
            'estudios' => $this
                ->input
                ->post('enf_estudios')
        );
        $whereEnf = array(
            'id_enf' => $idenfact
        );
        $this
            ->db
            ->where($whereEnf);
        $this
            ->db
            ->update("h_c_sinopsis", $upEnf);
        $whereimg = array(
            'id_patient' => $this
                ->input
                ->post('hist_id') ,
            'userid' => $this
                ->input
                ->post('user_id') ,
            'id_enfermedad' => 0
        );
        $updimg = array(
            'id_enfermedad' => $idenfact
        );
        $this
            ->db
            ->where($whereimg);
        $this
            ->db
            ->update("saveEnfImage", $updimg);
        $query1 = $this
            ->db
            ->get_where('type_reasons', array(
            'title' => $this
                ->input
                ->post('enf_motivo')
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'title' => $this
                    ->input
                    ->post('enf_motivo') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => $insert_date,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => $insert_date
            );
            $this
                ->model_admin
                ->save_new_causa($save);
        }
        $hab_t_drug = $this
            ->input
            ->post('hab_t_drug');
        $todo_check = $this
            ->input
            ->post('todo_check');
        $todo_check1 = (isset($todo_check)) ? 1 : 0;
        $car_nin_check = $this
            ->input
            ->post('car_nin_check');
        $car_nin_check1 = (isset($car_nin_check)) ? 1 : 0;
        $madre_check = $this
            ->input
            ->post('madre_check');
        $madre_check1 = (isset($madre_check)) ? 1 : 0;
        $padre_check = $this
            ->input
            ->post('padre_check');
        $padre_check1 = (isset($padre_check)) ? 1 : 0;
        $car_h_check = $this
            ->input
            ->post('car_h_check');
        $car_h_check1 = (isset($car_h_check)) ? 1 : 0;
        $car_pe_check = $this
            ->input
            ->post('car_pe_check');
        $car_pe_check1 = (isset($car_pe_check)) ? 1 : 0;
        $nin_check2 = $this
            ->input
            ->post('nin_check2');
        $nin_check22 = (isset($nin_check2)) ? 1 : 0;
        $madre_check2 = $this
            ->input
            ->post('madre_check2');
        $madre_check22 = (isset($madre_check2)) ? 1 : 0;
        $padre_check2 = $this
            ->input
            ->post('padre_check2');
        $padre_check22 = (isset($padre_check2)) ? 1 : 0;
        $h_check2 = $this
            ->input
            ->post('h_check2');
        $h_check22 = (isset($h_check2)) ? 1 : 0;
        $pe_check2 = $this
            ->input
            ->post('pe_check2');
        $pe_check22 = (isset($pe_check2)) ? 1 : 0;
        $nin_check3 = $this
            ->input
            ->post('nin_check3');
        $nin_check33 = (isset($nin_check3)) ? 1 : 0;
        $madre_check3 = $this
            ->input
            ->post('madre_check3');
        $madre_check33 = (isset($madre_check3)) ? 1 : 0;
        $padre_check3 = $this
            ->input
            ->post('padre_check3');
        $padre_check33 = (isset($padre_check3)) ? 1 : 0;
        $h_check3 = $this
            ->input
            ->post('h_check3');
        $h_check33 = (isset($h_check3)) ? 1 : 0;
        $pe_check3 = $this
            ->input
            ->post('pe_check3');
        $pe_check33 = (isset($pe_check3)) ? 1 : 0;
        $nin_check4 = $this
            ->input
            ->post('nin_check4');
        $nin_check44 = (isset($nin_check4)) ? 1 : 0;
        $madre_check4 = $this
            ->input
            ->post('madre_check4');
        $madre_check44 = (isset($madre_check4)) ? 1 : 0;
        $padre_check4 = $this
            ->input
            ->post('padre_check4');
        $padre_check44 = (isset($padre_check4)) ? 1 : 0;
        $h_check4 = $this
            ->input
            ->post('h_check4');
        $h_check44 = (isset($h_check4)) ? 1 : 0;
        $pe_check4 = $this
            ->input
            ->post('pe_check4');
        $pe_check44 = (isset($pe_check4)) ? 1 : 0;
        $nin_check5 = $this
            ->input
            ->post('nin_check5');
        $nin_check55 = (isset($nin_check5)) ? 1 : 0;
        $madre_check5 = $this
            ->input
            ->post('madre_check5');
        $madre_check55 = (isset($madre_check5)) ? 1 : 0;
        $padre_check5 = $this
            ->input
            ->post('padre_check5');
        $padre_check55 = (isset($padre_check5)) ? 1 : 0;
        $h_check5 = $this
            ->input
            ->post('h_check5');
        $h_check55 = (isset($h_check5)) ? 1 : 0;
        $pe_check5 = $this
            ->input
            ->post('pe_check5');
        $pe_check55 = (isset($pe_check5)) ? 1 : 0;
        $nin_check05 = $this
            ->input
            ->post('nin_check05');
        $nin_check055 = (isset($nin_check05)) ? 1 : 0;
        $madre_check05 = $this
            ->input
            ->post('madre_check05');
        $madre_check055 = (isset($madre_check05)) ? 1 : 0;
        $padre_check05 = $this
            ->input
            ->post('padre_check05');
        $padre_check055 = (isset($padre_check05)) ? 1 : 0;
        $h_check05 = $this
            ->input
            ->post('h_check05');
        $h_check055 = (isset($h_check05)) ? 1 : 0;
        $pe_check05 = $this
            ->input
            ->post('pe_check05');
        $pe_check055 = (isset($pe_check05)) ? 1 : 0;
        $nin_check6 = $this
            ->input
            ->post('nin_check6');
        $nin_check66 = (isset($nin_check6)) ? 1 : 0;
        $madre_check6 = $this
            ->input
            ->post('madre_check6');
        $madre_check66 = (isset($madre_check6)) ? 1 : 0;
        $padre_check6 = $this
            ->input
            ->post('padre_check6');
        $padre_check66 = (isset($padre_check6)) ? 1 : 0;
        $h_check6 = $this
            ->input
            ->post('h_check6');
        $h_check66 = (isset($h_check6)) ? 1 : 0;
        $pe_check6 = $this
            ->input
            ->post('pe_check6');
        $pe_check66 = (isset($pe_check6)) ? 1 : 0;
        $nin_check7 = $this
            ->input
            ->post('nin_check7');
        $nin_check77 = (isset($nin_check7)) ? 1 : 0;
        $madre_check7 = $this
            ->input
            ->post('madre_check7');
        $madre_check77 = (isset($madre_check7)) ? 1 : 0;
        $padre_check7 = $this
            ->input
            ->post('padre_check7');
        $padre_check77 = (isset($padre_check7)) ? 1 : 0;
        $h_check7 = $this
            ->input
            ->post('h_check7');
        $h_check77 = (isset($h_check7)) ? 1 : 0;
        $pe_check7 = $this
            ->input
            ->post('pe_check7');
        $pe_check77 = (isset($pe_check7)) ? 1 : 0;
        $nin_check8 = $this
            ->input
            ->post('nin_check8');
        $nin_check88 = (isset($nin_check8)) ? 1 : 0;
        $madre_check8 = $this
            ->input
            ->post('madre_check8');
        $madre_check88 = (isset($madre_check8)) ? 1 : 0;
        $padre_check8 = $this
            ->input
            ->post('padre_check8');
        $padre_check88 = (isset($padre_check8)) ? 1 : 0;
        $h_check8 = $this
            ->input
            ->post('h_check8');
        $h_check88 = (isset($h_check8)) ? 1 : 0;
        $pe_check8 = $this
            ->input
            ->post('pe_check8');
        $pe_check88 = (isset($pe_check8)) ? 1 : 0;
        $nin_check9 = $this
            ->input
            ->post('nin_check9');
        $nin_check99 = (isset($nin_check9)) ? 1 : 0;
        $madre_check9 = $this
            ->input
            ->post('madre_check9');
        $madre_check99 = (isset($madre_check9)) ? 1 : 0;
        $padre_check9 = $this
            ->input
            ->post('padre_check9');
        $padre_check99 = (isset($padre_check9)) ? 1 : 0;
        $h_check9 = $this
            ->input
            ->post('h_check9');
        $h_check99 = (isset($h_check9)) ? 1 : 0;
        $pe_check9 = $this
            ->input
            ->post('pe_check9');
        $pe_check99 = (isset($pe_check9)) ? 1 : 0;
        $nin_check10 = $this
            ->input
            ->post('nin_check10');
        $nin_check1010 = (isset($nin_check10)) ? 1 : 0;
        $madre_check10 = $this
            ->input
            ->post('madre_check10');
        $madre_check1010 = (isset($madre_check10)) ? 1 : 0;
        $padre_check10 = $this
            ->input
            ->post('padre_check10');
        $padre_check1010 = (isset($padre_check10)) ? 1 : 0;
        $h_check10 = $this
            ->input
            ->post('h_check10');
        $h_check1010 = (isset($h_check10)) ? 1 : 0;
        $pe_check10 = $this
            ->input
            ->post('pe_check10');
        $pe_check1010 = (isset($pe_check10)) ? 1 : 0;
        $nin_check11 = $this
            ->input
            ->post('nin_check11');
        $nin_check1111 = (isset($nin_check11)) ? 1 : 0;
        $madre_check11 = $this
            ->input
            ->post('madre_check11');
        $madre_check1111 = (isset($madre_check11)) ? 1 : 0;
        $padre_check11 = $this
            ->input
            ->post('padre_check11');
        $padre_check1111 = (isset($padre_check11)) ? 1 : 0;
        $h_check11 = $this
            ->input
            ->post('h_check11');
        $h_check1111 = (isset($h_check11)) ? 1 : 0;
        $pe_check11 = $this
            ->input
            ->post('pe_check11');
        $pe_check1111 = (isset($pe_check11)) ? 1 : 0;
        $neop_check12 = $this
            ->input
            ->post('neop_check12');
        $neop_check1212 = (isset($neop_check12)) ? 1 : 0;
        $madre_check12 = $this
            ->input
            ->post('madre_check12');
        $madre_check1212 = (isset($madre_check12)) ? 1 : 0;
        $padre_check12 = $this
            ->input
            ->post('padre_check12');
        $padre_check1212 = (isset($padre_check12)) ? 1 : 0;
        $h_check12 = $this
            ->input
            ->post('h_check12');
        $h_check1212 = (isset($h_check12)) ? 1 : 0;
        $pe_check12 = $this
            ->input
            ->post('pe_check12');
        $pe_check1212 = (isset($pe_check12)) ? 1 : 0;
        $psi_check13 = $this
            ->input
            ->post('psi_check13');
        $psi_check1313 = (isset($psi_check13)) ? 1 : 0;
        $madre_check13 = $this
            ->input
            ->post('madre_check13');
        $madre_check1313 = (isset($madre_check13)) ? 1 : 0;
        $padre_check13 = $this
            ->input
            ->post('padre_check13');
        $padre_check1313 = (isset($padre_check13)) ? 1 : 0;
        $h_check13 = $this
            ->input
            ->post('h_check13');
        $h_check1313 = (isset($h_check13)) ? 1 : 0;
        $pe_check13 = $this
            ->input
            ->post('pe_check13');
        $pe_check1313 = (isset($pe_check13)) ? 1 : 0;
        $obs_check14 = $this
            ->input
            ->post('obs_check14');
        $obs_check1414 = (isset($obs_check14)) ? 1 : 0;
        $madre_check14 = $this
            ->input
            ->post('madre_check14');
        $madre_check1414 = (isset($madre_check14)) ? 1 : 0;
        $padre_check14 = $this
            ->input
            ->post('padre_check14');
        $padre_check1414 = (isset($padre_check14)) ? 1 : 0;
        $h_check14 = $this
            ->input
            ->post('h_check14');
        $h_check1414 = (isset($h_check14)) ? 1 : 0;
        $pe_check14 = $this
            ->input
            ->post('pe_check14');
        $pe_check1414 = (isset($pe_check14)) ? 1 : 0;
        $ulp_check15 = $this
            ->input
            ->post('ulp_check15');
        $ulp_check1515 = (isset($ulp_check15)) ? 1 : 0;
        $madre_check15 = $this
            ->input
            ->post('madre_check15');
        $madre_check1515 = (isset($madre_check15)) ? 1 : 0;
        $padre_check15 = $this
            ->input
            ->post('padre_check15');
        $padre_check1515 = (isset($padre_check15)) ? 1 : 0;
        $h_check15 = $this
            ->input
            ->post('h_check15');
        $h_check1515 = (isset($h_check15)) ? 1 : 0;
        $pe_check15 = $this
            ->input
            ->post('pe_check15');
        $pe_check1515 = (isset($pe_check15)) ? 1 : 0;
        $art_check16 = $this
            ->input
            ->post('art_check16');
        $art_check1616 = (isset($art_check16)) ? 1 : 0;
        $madre_check16 = $this
            ->input
            ->post('madre_check16');
        $madre_check1616 = (isset($madre_check16)) ? 1 : 0;
        $padre_check16 = $this
            ->input
            ->post('padre_check16');
        $padre_check1616 = (isset($padre_check16)) ? 1 : 0;
        $h_check16 = $this
            ->input
            ->post('h_check16');
        $h_check1616 = (isset($h_check16)) ? 1 : 0;
        $pe_check16 = $this
            ->input
            ->post('pe_check16');
        $pe_check1616 = (isset($pe_check16)) ? 1 : 0;
        $art_check016 = $this
            ->input
            ->post('art_check016');
        $art_check01616 = (isset($art_check016)) ? 1 : 0;
        $madre_check016 = $this
            ->input
            ->post('madre_check016');
        $madre_check01616 = (isset($madre_check016)) ? 1 : 0;
        $padre_check016 = $this
            ->input
            ->post('padre_check016');
        $padre_check01616 = (isset($padre_check016)) ? 1 : 0;
        $h_check016 = $this
            ->input
            ->post('h_check016');
        $h_check01616 = (isset($h_check016)) ? 1 : 0;
        $pe_check016 = $this
            ->input
            ->post('pe_check016');
        $pe_check01616 = (isset($pe_check016)) ? 1 : 0;
        $zika_check17 = $this
            ->input
            ->post('zika_check17');
        $zika_check1717 = (isset($zika_check17)) ? 1 : 0;
        $madre_check17 = $this
            ->input
            ->post('madre_check17');
        $madre_check1717 = (isset($madre_check17)) ? 1 : 0;
        $padre_check17 = $this
            ->input
            ->post('padre_check17');
        $padre_check1717 = (isset($padre_check17)) ? 1 : 0;
        $h_check17 = $this
            ->input
            ->post('h_check17');
        $h_check1717 = (isset($h_check17)) ? 1 : 0;
        $pe_check17 = $this
            ->input
            ->post('pe_check17');
        $pe_check1717 = (isset($pe_check17)) ? 1 : 0;
        $save = array(
            'todo' => $todo_check1,
            'car_nin' => $car_nin_check1,
            'car_m' => $madre_check1,
            'car_p' => $padre_check1,
            'car_h' => $car_h_check1,
            'car_pe' => $car_pe_check1,
            'car_text' => $this
                ->input
                ->post('car_text') ,
            'hip_nin' => $nin_check22,
            'hip_m' => $madre_check22,
            'hip_p' => $padre_check22,
            'hip_h' => $h_check22,
            'hip_pe' => $pe_check22,
            'hip_text' => $this
                ->input
                ->post('hip_text') ,
            'ec_nin' => $nin_check33,
            'ec_m' => $madre_check33,
            'ec_p' => $padre_check33,
            'ec_h' => $h_check33,
            'ec_pe' => $pe_check33,
            'ec_text' => $this
                ->input
                ->post('ec_text') ,
            'ep_nin' => $nin_check44,
            'ep_m' => $madre_check44,
            'ep_p' => $padre_check44,
            'ep_h' => $h_check44,
            'ep_pe' => $pe_check44,
            'ep_text' => $this
                ->input
                ->post('ep_text') ,
            'as_nin' => $nin_check55,
            'as_m' => $madre_check55,
            'as_p' => $padre_check55,
            'as_h' => $h_check55,
            'as_pe' => $pe_check55,
            'as_text' => $this
                ->input
                ->post('as_text') ,
            'enre_nin' => $nin_check055,
            'enre_m' => $madre_check055,
            'enre_p' => $padre_check055,
            'enre_h' => $h_check055,
            'enre_pe' => $pe_check055,
            'enre_text' => $this
                ->input
                ->post('enre_text') ,
            'tub_nin' => $nin_check66,
            'tub_m' => $madre_check66,
            'tub_p' => $padre_check66,
            'tub_h' => $h_check66,
            'tub_pe' => $pe_check66,
            'tub_text' => $this
                ->input
                ->post('tub_text') ,
            'dia_nin' => $nin_check77,
            'dia_m' => $madre_check77,
            'dia_p' => $padre_check77,
            'dia_h' => $h_check77,
            'dia_pe' => $pe_check77,
            'dia_text' => $this
                ->input
                ->post('dia_text') ,
            'tir_nin' => $nin_check88,
            'tir_m' => $madre_check88,
            'tir_p' => $padre_check88,
            'tir_h' => $h_check88,
            'tir_pe' => $pe_check88,
            'tir_text' => $this
                ->input
                ->post('tir_text') ,
            'hep_tipo' => $this
                ->input
                ->post('hep_tipo') ,
            'hep_nin' => $nin_check99,
            'hep_m' => $madre_check99,
            'hep_p' => $padre_check99,
            'hep_h' => $h_check99,
            'hep_pe' => $pe_check99,
            'hep_text' => $this
                ->input
                ->post('hep_text') ,
            'enfr_nin' => $nin_check1010,
            'enfr_m' => $madre_check1010,
            'enfr_p' => $padre_check1010,
            'enfr_h' => $h_check1010,
            'enfr_pe' => $pe_check1010,
            'enfr_text' => $this
                ->input
                ->post('enfr_text') ,
            'falc_nin' => $nin_check1111,
            'falc_m' => $madre_check1111,
            'falc_p' => $padre_check1111,
            'falc_h' => $h_check1111,
            'falc_pe' => $pe_check1111,
            'falc_text' => $this
                ->input
                ->post('falc_text') ,
            'neop_nin' => $neop_check1212,
            'neop_m' => $madre_check1212,
            'neop_p' => $padre_check1212,
            'neop_h' => $h_check1212,
            'neop_pe' => $pe_check1212,
            'neop_text' => $this
                ->input
                ->post('neop_text') ,
            'psi_nin' => $psi_check1313,
            'psi_m' => $madre_check1313,
            'psi_p' => $padre_check1313,
            'psi_h' => $h_check1313,
            'psi_pe' => $pe_check1313,
            'psi_text' => $this
                ->input
                ->post('psi_text') ,
            'obs_nin' => $obs_check1414,
            'obs_m' => $madre_check1414,
            'obs_p' => $padre_check1414,
            'obs_h' => $h_check1414,
            'obs_pe' => $pe_check1414,
            'obs_text' => $this
                ->input
                ->post('obs_text') ,
            'ulp_nin' => $ulp_check1515,
            'ulp_m' => $madre_check1515,
            'ulp_p' => $padre_check1515,
            'ulp_h' => $h_check1515,
            'ulp_pe' => $pe_check1515,
            'ulp_text' => $this
                ->input
                ->post('ulp_text') ,
            'art_nin' => $art_check1616,
            'art_m' => $madre_check1616,
            'art_p' => $padre_check1616,
            'art_h' => $h_check1616,
            'art_pe' => $pe_check1616,
            'art_text' => $this
                ->input
                ->post('art_text') ,
            'hem_nin' => $art_check01616,
            'hem_m' => $madre_check01616,
            'hem_p' => $padre_check01616,
            'hem_h' => $h_check01616,
            'hem_pe' => $pe_check01616,
            'hem_text' => $this
                ->input
                ->post('hem_text') ,
            'zika_nin' => $zika_check1717,
            'zika_m' => $madre_check1717,
            'zika_p' => $padre_check1717,
            'zika_h' => $h_check1717,
            'zika_pe' => $pe_check1717,
            'zika_text' => $this
                ->input
                ->post('zika_text') ,
            'otros' => $this
                ->input
                ->post('otros') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'date_modif' => $insert_date,
            'operator' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id') ,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $idMarPos = $this
            ->model_admin
            ->marquePositivo($save);
        $counMarP = $this
            ->model_admin
            ->countAnte1($this
            ->input
            ->post('hist_id'));
        if ($counMarP > 1)
        {
            $this
                ->model_admin
                ->DeleteDuplicateMarqueP($idMarPos);
        }
        $newMpat = $this
            ->input
            ->post('newMpat');
        if ($newMpat)
        {
            foreach ($newMpat as $key => $med)
            {
                $savecd = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'part' => 'gnl',
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($savecd);
            }
        }
        $save2 = array(
            'maltratof' => $this
                ->input
                ->post('textmaltrato_g') ,
            'abusos' => $this
                ->input
                ->post('textabuso_g') ,
            'negligencia' => $this
                ->input
                ->post('textneg_g') ,
            'maltrato' => $this
                ->input
                ->post('maltratoemo_g') ,
            'alimentos' => $this
                ->input
                ->post('alimentos_al') ,
            'medicamentos' => $this
                ->input
                ->post('medicamentos_al') ,
            'otros' => $this
                ->input
                ->post('otros_al') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'update_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id')
        );
        $idDes = $this
            ->model_admin
            ->DesantAl($save2);
        $counDesa = $this
            ->model_admin
            ->countDesarollo($this
            ->input
            ->post('hist_id'));
        if ($counDesa > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyDesarollo($idDes);
        }
        $save3 = array(
            'quirurgicos' => $this
                ->input
                ->post('quirurgicos') ,
            'gineco' => $this
                ->input
                ->post('gineco') ,
            'abdominal' => $this
                ->input
                ->post('abdominal') ,
            'toracica' => $this
                ->input
                ->post('toracica') ,
            'transfusion' => $this
                ->input
                ->post('transfusion') ,
            'otros1' => $this
                ->input
                ->post('otros1_g') ,
            'hepatis' => $this
                ->input
                ->post('hepatis') ,
            'hpv' => $this
                ->input
                ->post('hpv') ,
            'toxoide' => $this
                ->input
                ->post('toxoide') ,
            'grouposang' => $this
                ->input
                ->post('grouposang') ,
            'tipificacion' => $this
                ->input
                ->post('tipificacion') ,
            'rh' => $this
                ->input
                ->post('rhoa') ,
            'violencia1' => $this
                ->input
                ->post('violencia1') ,
            'violencia2' => $this
                ->input
                ->post('violencia2') ,
            'violencia3' => $this
                ->input
                ->post('violencia3') ,
            'violencia4' => $this
                ->input
                ->post('violencia4') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id')
        );
        $idAtO = $this
            ->model_admin
            ->saveAnteOtros($save3);
        $counAntOt = $this
            ->model_admin
            ->countAntOtros($this
            ->input
            ->post('hist_id'));
        if ($counAntOt > 1)
        {
            $this
                ->model_admin
                ->DeleteAntOtros($idAtO);
        }
        if (!empty($medicine))
        {
            foreach ($medicine as $med)
            {
                $save = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($save);
            };
        };
        $this
            ->model_admin
            ->deleteMedNinguno();
        $save4 = array(
            'cafe_cant' => $this
                ->input
                ->post('hab_c_caf') ,
            'cafe_frec' => $this
                ->input
                ->post('hab_f_caf') ,
            'pipa_cant' => $this
                ->input
                ->post('hab_c_pip') ,
            'pipa_frec' => $this
                ->input
                ->post('hab_f_pip') ,
            'ciga_can' => $this
                ->input
                ->post('hab_c_ciga') ,
            'ciga_frec' => $this
                ->input
                ->post('hab_f_ciga') ,
            'alc_can' => $this
                ->input
                ->post('hab_c_al') ,
            'alc_frec' => $this
                ->input
                ->post('hab_f_al') ,
            'tab_can' => $this
                ->input
                ->post('hab_c_tab') ,
            'tab_frec' => $this
                ->input
                ->post('hab_f_tab') ,
            'hab_c_drug' => $this
                ->input
                ->post('hab_c_drug') ,
            'hab_f_drug' => $this
                ->input
                ->post('hab_f_drug') ,
            'hookah' => $this
                ->input
                ->post('hookah') ,
            'hab_f_hookah' => $this
                ->input
                ->post('hab_f_hookah') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'update_time' => $insert_date
        );
        $idHabT = $this
            ->model_admin
            ->saveHabitosToxicos($save4);
        $counHabT = $this
            ->model_admin
            ->countHabitosToxicos($this
            ->input
            ->post('hist_id'));
        if ($counHabT > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyHabitosToxicos($idHabT);
        }
        if (!empty($hab_t_drug))
        {
            foreach ($hab_t_drug as $drug)
            {
                $save = array(
                    'name' => $drug,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id')
                );
                $this
                    ->model_admin
                    ->SaveDrug($save);
            };
        }
        $examFisico = array(
            'peso' => $this
                ->input
                ->post('peso') ,
            'kg' => $this
                ->input
                ->post('kg') ,
            'talla' => $this
                ->input
                ->post('talla') ,
            'pulgada_exf' => $this
                ->input
                ->post('pulgada') ,
            'imc' => $this
                ->input
                ->post('imc') ,
            'ta' => $this
                ->input
                ->post('ta') ,
            'fr' => $this
                ->input
                ->post('fr') ,
            'fc' => $this
                ->input
                ->post('fc') ,
            'hg' => $this
                ->input
                ->post('hg') ,
            'tempo' => $this
                ->input
                ->post('tempo') ,
            'pulso' => $this
                ->input
                ->post('pulso') ,
            'glicemia' => $this
                ->input
                ->post('glicemia') ,
            'radio' => $this
                ->input
                ->post('radio_signo') ,
            'neuro_s' => $this
                ->input
                ->post('neuro_s') ,
            'neuro_text' => $this
                ->input
                ->post('neuro_text') ,
            'cabeza' => $this
                ->input
                ->post('cabeza') ,
            'cabeza_text' => $this
                ->input
                ->post('cabeza_text') ,
            'cuello' => $this
                ->input
                ->post('cuello') ,
            'cuello_text' => $this
                ->input
                ->post('cuello_text') ,
            'abd_insp' => $this
                ->input
                ->post('abd_insp') ,
            'ausc' => $this
                ->input
                ->post('ausc') ,
            'perc' => $this
                ->input
                ->post('perc') ,
            'palpa' => $this
                ->input
                ->post('palpa') ,
            'ext_sup_text' => $this
                ->input
                ->post('ext_sup_text') ,
            'ext_sup' => $this
                ->input
                ->post('ext_sup') ,
            'torax' => $this
                ->input
                ->post('torax') ,
            'torax_text' => $this
                ->input
                ->post('torax_text') ,
            'ext_inf' => $this
                ->input
                ->post('ext_inf') ,
            'ext_inft' => $this
                ->input
                ->post('ext_inft') ,
            'cuad_inf_ext1' => $this
                ->input
                ->post('cuad_inf_ext1') ,
            'mama_izq1' => $this
                ->input
                ->post('mama_izq1') ,
            'cuad_sup_ext1' => $this
                ->input
                ->post('cuad_sup_ext1') ,
            'cuad_inf_ext11' => $this
                ->input
                ->post('cuad_inf_ext11') ,
            'region_retro1' => $this
                ->input
                ->post('region_retro1') ,
            'region_areola_pezon1' => $this
                ->input
                ->post('region_areola_pezon1') ,
            'region_ax1' => $this
                ->input
                ->post('region_ax1') ,
            'cuad_inf_ext2' => $this
                ->input
                ->post('cuad_inf_ext2') ,
            'mama_izq2' => $this
                ->input
                ->post('mama_izq2') ,
            'cuad_sup_ext2' => $this
                ->input
                ->post('cuad_sup_ext2') ,
            'cuad_inf_ext22' => $this
                ->input
                ->post('cuad_inf_ext22') ,
            'region_retro2' => $this
                ->input
                ->post('region_retro2') ,
            'region_areola_pezon2' => $this
                ->input
                ->post('region_areola_pezon2') ,
            'region_ax2' => $this
                ->input
                ->post('region_ax2') ,
            'especuloscopia' => $this
                ->input
                ->post('especuloscopia') ,
            'tacto_bima' => $this
                ->input
                ->post('tacto_bima') ,
            'cervix' => $this
                ->input
                ->post('cervix') ,
            'cervix_text' => $this
                ->input
                ->post('cervix_text') ,
            'utero_text' => $this
                ->input
                ->post('utero_text') ,
            'anexo_derecho_text' => $this
                ->input
                ->post('anexo_derecho_text') ,
            'anexo_iz_text' => $this
                ->input
                ->post('anexo_iz_text') ,
            'inspection_vulval' => $this
                ->input
                ->post('inspection_vulval') ,
            'inspection_vulval_text' => $this
                ->input
                ->post('inspection_vulval_text') ,
            'rectal_text' => $this
                ->input
                ->post('rectal_text') ,
            'rectal' => $this
                ->input
                ->post('rectal') ,
            'genitalm' => $this
                ->input
                ->post('genitalm') ,
            'genitalm_text' => $this
                ->input
                ->post('genitalm_text') ,
            'genitalf_text' => $this
                ->input
                ->post('genitalf_text') ,
            'genitalf' => $this
                ->input
                ->post('genitalf') ,
            'vagina' => $this
                ->input
                ->post('vagina') ,
            'vagina_text' => $this
                ->input
                ->post('vagina_text') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $id_signo = $this
            ->model_admin
            ->saveExamenFisico($examFisico);
        $examFis = $this
            ->db
            ->select('*')
            ->where('id_sig', $id_signo)->get('h_c_examen_fisico')
            ->row_array();
        if ($examFis['peso'] == 0 && $examFis['kg'] == 0 && $examFis['talla'] == '' && $examFis['imc'] == '' && $examFis['ta'] == '' && $examFis['fr'] == '' && $examFis['fc'] == '' && $examFis['hg'] == '' && $examFis['tempo'] == '' && $examFis['pulso'] == '' && $examFis['glicemia'] == 0 && $examFis['neuro_s'] == '' && $examFis['neuro_text'] == '' && $examFis['cabeza'] == '' && $examFis['cabeza_text'] == '' && $examFis['cuello'] == '' && $examFis['cuello_text'] == '' && $examFis['abd_insp'] == '' && $examFis['ausc'] == '' && $examFis['perc'] == '' && $examFis['palpa'] == '' && $examFis['ext_sup'] == '' && $examFis['ext_sup_text'] == '' && $examFis['torax'] == '' && $examFis['torax_text'] == '' && $examFis['ext_inf'] == '' && $examFis['ext_inft'] == '' && $examFis['vagina_text'] == '' && $examFis['vagina'] == '' && $examFis['cuad_inf_ext1'] == '' && $examFis['mama_izq1'] == '' && $examFis['cuad_sup_ext1'] == '' && $examFis['cuad_inf_ext11'] == '' && $examFis['region_retro1'] == '' && $examFis['region_areola_pezon1'] == '' && $examFis['region_ax1'] == '' && $examFis['cuad_inf_ext2'] == '' && $examFis['mama_izq2'] == '' && $examFis['cuad_sup_ext2'] == '' && $examFis['cuad_inf_ext22'] == '' && $examFis['region_retro2'] == '' && $examFis['region_areola_pezon2'] == '' && $examFis['region_ax2'] == '' && $examFis['especuloscopia'] == '' && $examFis['cervix'] == '' && $examFis['cervix_text'] == '' && $examFis['utero_text'] == '' && $examFis['anexo_derecho_text'] == '' && $examFis['anexo_iz_text'] == '' && $examFis['inspection_vulval'] == '' && $examFis['inspection_vulval_text'] == '' && $examFis['tacto_bima'] == '' && $examFis['rectal_text'] == '' && $examFis['rectal'] == '' && $examFis['genitalm'] == '' && $examFis['genitalm_text'] == '' && $examFis['genitalf_text'] == '' && $examFis['genitalf'] == '' && $examFis['vagina'] == '' && $examFis['vagina_text'] == '')
        {
            $this
                ->model_admin
                ->DeleteEmptyExamFis($id_signo);
        }
        $saveExOt = array(
            'oido1' => $this
                ->input
                ->post('oido1') ,
            'oido2' => $this
                ->input
                ->post('oido2') ,
            'nariz' => $this
                ->input
                ->post('nariz') ,
            'boca' => $this
                ->input
                ->post('boca') ,
            'otorrino_cuello1' => $this
                ->input
                ->post('otorrino_cuello1') ,
            'otorrino_cuello2' => $this
                ->input
                ->post('otorrino_cuello2') ,
            'observaciones_ot' => $this
                ->input
                ->post('observaciones_ot') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'user_id' => $this
                ->input
                ->post('user_id') ,
            'id_sig' => $id_signo
        );
        $this
            ->db
            ->insert("h_c_examen_fis_otorrino", $saveExOt);
        $whereot = array(
            'oido1' => '',
            'oido2' => '',
            'nariz' => '',
            'otorrino_cuello1' => '',
            'otorrino_cuello2' => '',
            'observaciones_ot' => '',
        );
        $this
            ->db
            ->where($whereot);
        $this
            ->db
            ->delete('h_c_examen_fis_otorrino');
        $saveExamSis = array(
            'sisneuro' => $this
                ->input
                ->post('sisneuro') ,
            'neurologico' => $this
                ->input
                ->post('neurologico') ,
            'siscardio' => $this
                ->input
                ->post('siscardio') ,
            'cardiova' => $this
                ->input
                ->post('cardiova') ,
            'sist_uro' => $this
                ->input
                ->post('sist_uro') ,
            'urogenital' => $this
                ->input
                ->post('urogenital') ,
            'sis_mu_e' => $this
                ->input
                ->post('sis_mu_e') ,
            'musculoes' => $this
                ->input
                ->post('musculoes') ,
            'sist_resp' => $this
                ->input
                ->post('sist_resp') ,
            'nervioso' => $this
                ->input
                ->post('nervioso') ,
            'linfatico' => $this
                ->input
                ->post('linfatico') ,
            'digestivo' => $this
                ->input
                ->post('digestivo') ,
            'respiratorio' => $this
                ->input
                ->post('respiratorio') ,
            'genitourinario' => $this
                ->input
                ->post('genitourinario') ,
            'sist_diges' => $this
                ->input
                ->post('sist_diges') ,
            'sist_endo' => $this
                ->input
                ->post('sist_endo') ,
            'endocrino' => $this
                ->input
                ->post('endocrino') ,
            'sist_rela' => $this
                ->input
                ->post('sist_rela') ,
            'otros_ex_sis' => $this
                ->input
                ->post('otros_ex_sis') ,
            'cardiova' => $this
                ->input
                ->post('cardiova') ,
            'dorsales' => $this
                ->input
                ->post('dorsales') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->saveExameneSistema($saveExamSis);
        $this
            ->model_admin
            ->DeleteEmptyExameneSistema($this
            ->input
            ->post('hist_id'));
        if ($this
            ->input
            ->post('evo') != '' || $this
            ->input
            ->post('tnaci') != '')
        {
            $medicamento = $this
                ->input
                ->post('med');
            $ale1 = $this
                ->input
                ->post('ale1');
            $ale = (isset($ale1)) ? 1 : 0;
            $hep1 = $this
                ->input
                ->post('hep1');
            $hep = (isset($hep1)) ? 1 : 0;
            $amig1 = $this
                ->input
                ->post('amig1');
            $amig = (isset($amig1)) ? 1 : 0;
            $infv1 = $this
                ->input
                ->post('infv1');
            $infv = (isset($infv1)) ? 1 : 0;
            $asm1 = $this
                ->input
                ->post('asm1');
            $asm = (isset($asm1)) ? 1 : 0;
            $nig1 = $this
                ->input
                ->post('nig1');
            $nig = (isset($nig1)) ? 1 : 0;
            $neum1 = $this
                ->input
                ->post('neum1');
            $neum = (isset($neum1)) ? 1 : 0;
            $nig1 = $this
                ->input
                ->post('nig1');
            $nig = (isset($nig1)) ? 1 : 0;
            $cirug1 = $this
                ->input
                ->post('cirug1');
            $cirug = (isset($cirug1)) ? 1 : 0;
            $otot1 = $this
                ->input
                ->post('otot1');
            $otot = (isset($otot1)) ? 1 : 0;
            $deng1 = $this
                ->input
                ->post('deng1');
            $deng = (isset($deng1)) ? 1 : 0;
            $pape1 = $this
                ->input
                ->post('pape1');
            $pape = (isset($pape1)) ? 1 : 0;
            $diar1 = $this
                ->input
                ->post('diar1');
            $diar = (isset($diar1)) ? 1 : 0;
            $paras1 = $this
                ->input
                ->post('paras1');
            $paras = (isset($paras1)) ? 1 : 0;
            $zika1 = $this
                ->input
                ->post('zika1');
            $zika = (isset($zika1)) ? 1 : 0;
            $saram1 = $this
                ->input
                ->post('saram1');
            $saram = (isset($saram1)) ? 1 : 0;
            $chicun1 = $this
                ->input
                ->post('chicun1');
            $chicun = (isset($chicun1)) ? 1 : 0;
            $varicela1 = $this
                ->input
                ->post('varicela1');
            $varicela = (isset($varicela1)) ? 1 : 0;
            $falc1 = $this
                ->input
                ->post('falc1');
            $falc = (isset($falc1)) ? 1 : 0;
            $desco_peso_al_nacer = $this
                ->input
                ->post('desco_peso_al_nacer');
            $desco_peso_al_nacer1 = (isset($desco_peso_al_nacer)) ? 1 : 0;
            $desco_talla_al_nacer = $this
                ->input
                ->post('desco_talla_al_nacer');
            $desco_talla_al_nacer1 = (isset($desco_talla_al_nacer)) ? 1 : 0;
            $lactamat1 = $this
                ->input
                ->post('lactamat1');
            $lactamat = (isset($lactamat1)) ? 1 : 0;
            $leche1 = $this
                ->input
                ->post('leche1');
            $leche = (isset($leche1)) ? 1 : 0;
            $editpedia = $this
                ->input
                ->post('editpedia');
            $save = array(
                'evo' => $this
                    ->input
                    ->post('evo') ,
                'evol_text' => $this
                    ->input
                    ->post('evol_text') ,
                'tnaci' => $this
                    ->input
                    ->post('tnaci') ,
                'describa' => $this
                    ->input
                    ->post('describa') ,
                'edad_gest' => $this
                    ->input
                    ->post('edad_gest') ,
                'peso' => $this
                    ->input
                    ->post('pesopd') ,
                'talla' => $this
                    ->input
                    ->post('talla') ,
                'desco_peso_al_nacer' => $desco_peso_al_nacer1,
                'desco_talla_al_nacer' => $desco_talla_al_nacer1,
                'lactamat' => $lactamat,
                'leche' => $leche,
                'otrosinfo' => $this
                    ->input
                    ->post('otrosinfo') ,
                'traum_text' => $this
                    ->input
                    ->post('traum_text') ,
                'trans_text' => $this
                    ->input
                    ->post('trans_text') ,
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
                'otros_t_text' => $this
                    ->input
                    ->post('otros_t_text') ,
                'motor1' => $this
                    ->input
                    ->post('textgrueso') ,
                'motor2' => $this
                    ->input
                    ->post('textfino') ,
                'lenguaje' => $this
                    ->input
                    ->post('textlenguage') ,
                'social' => $this
                    ->input
                    ->post('textsocial') ,
                'maltratof' => $this
                    ->input
                    ->post('textmaltrato') ,
                'abusos' => $this
                    ->input
                    ->post('textabuso') ,
                'negligencia' => $this
                    ->input
                    ->post('textneg') ,
                'maltrato' => $this
                    ->input
                    ->post('maltratoemo') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'hist_id' => $this
                    ->input
                    ->post('hist_id') ,
                'inserted_time' => $insert_date,
                'updated_time' => $insert_date,
                'id_user' => $this
                    ->input
                    ->post('user_id')
            );
            $this
                ->model_admin
                ->savePedia($save);
            if (!empty($medicamento))
            {
                foreach ($medicamento as $med)
                {
                    $save = array(
                        'medica' => $med,
                        'hist_id' => $this
                            ->input
                            ->post('hist_id')
                    );
                    $this
                        ->model_admin
                        ->SaveMedPed($save);
                }
            }
            $save2 = array(
                'insert_d' => $this
                    ->input
                    ->post('insert_d') ,
                'bcg1' => $this
                    ->input
                    ->post('bcg1') ,
                'resf1' => $this
                    ->input
                    ->post('resf1') ,
                'hepb1' => $this
                    ->input
                    ->post('bcg2') ,
                'resf2' => $this
                    ->input
                    ->post('resf2') ,
                'yel3' => $this
                    ->input
                    ->post('yel3') ,
                'resf3' => $this
                    ->input
                    ->post('resf3') ,
                'bl4' => $this
                    ->input
                    ->post('bl4') ,
                'resf4' => $this
                    ->input
                    ->post('resf4') ,
                'yel5' => $this
                    ->input
                    ->post('yel5') ,
                'resf5' => $this
                    ->input
                    ->post('resf5') ,
                'bl6' => $this
                    ->input
                    ->post('bl6') ,
                'resf6' => $this
                    ->input
                    ->post('resf6') ,
                'gr7' => $this
                    ->input
                    ->post('gr7') ,
                'resf7' => $this
                    ->input
                    ->post('resf7') ,
                'bll8' => $this
                    ->input
                    ->post('bll8') ,
                'resf8' => $this
                    ->input
                    ->post('resf8') ,
                'grr9' => $this
                    ->input
                    ->post('grr9') ,
                'resf9' => $this
                    ->input
                    ->post('resf9') ,
                'yel10' => $this
                    ->input
                    ->post('yel10') ,
                'resf10' => $this
                    ->input
                    ->post('resf10') ,
                'bl11' => $this
                    ->input
                    ->post('bl11') ,
                'resf11' => $this
                    ->input
                    ->post('resf11') ,
                'gr12' => $this
                    ->input
                    ->post('gr12') ,
                'resf12' => $this
                    ->input
                    ->post('resf12') ,
                'yel13' => $this
                    ->input
                    ->post('yel13') ,
                'resf13' => $this
                    ->input
                    ->post('resf13') ,
                'bl14' => $this
                    ->input
                    ->post('bl14') ,
                'resf14' => $this
                    ->input
                    ->post('resf14') ,
                'bll15' => $this
                    ->input
                    ->post('bll15') ,
                'resf15' => $this
                    ->input
                    ->post('resf15') ,
                'srp16' => $this
                    ->input
                    ->post('srp16') ,
                'resf16' => $this
                    ->input
                    ->post('resf16') ,
                'bll17' => $this
                    ->input
                    ->post('bll17') ,
                'resf17' => $this
                    ->input
                    ->post('resf17') ,
                'grr18' => $this
                    ->input
                    ->post('grr18') ,
                'resf18' => $this
                    ->input
                    ->post('resf18') ,
                'hist_id' => $this
                    ->input
                    ->post('hist_id')
            );
            $this
                ->model_admin
                ->saveVacuna($save2);
        }
        $query1 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('neuro_s') ,
            'location' => 26
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'name' => $this
                    ->input
                    ->post('neuro_s') ,
                'location' => 26
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save);
        }
        $query2 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cabeza') ,
            'location' => 27
        ));
        if ($query2->num_rows() == 0)
        {
            $save2 = array(
                'name' => $this
                    ->input
                    ->post('cabeza') ,
                'location' => 27
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save2);
        }
        $query3 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cuello') ,
            'location' => 9
        ));
        if ($query3->num_rows() == 0)
        {
            $save3 = array(
                'name' => $this
                    ->input
                    ->post('cuello') ,
                'location' => 9
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save3);
        }
        $query4 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('abd_insp') ,
            'location' => 28
        ));
        if ($query4->num_rows() == 0)
        {
            $save4 = array(
                'name' => $this
                    ->input
                    ->post('abd_insp') ,
                'location' => 28
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save4);
        }
        $query5 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ausc') ,
            'location' => 22
        ));
        if ($query5->num_rows() == 0)
        {
            $save5 = array(
                'name' => $this
                    ->input
                    ->post('ausc') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save5);
        }
        $query6 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('perc') ,
            'location' => 22
        ));
        if ($query6->num_rows() == 0)
        {
            $save6 = array(
                'name' => $this
                    ->input
                    ->post('perc') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save6);
        }
        $query7 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('palpa') ,
            'location' => 22
        ));
        if ($query7->num_rows() == 0)
        {
            $save7 = array(
                'name' => $this
                    ->input
                    ->post('palpa') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save7);
        }
        $query8 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ext_sup') ,
            'location' => 18
        ));
        if ($query8->num_rows() == 0)
        {
            $save8 = array(
                'name' => $this
                    ->input
                    ->post('ext_sup') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save8);
        }
        $query9 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('torax') ,
            'location' => 18
        ));
        if ($query9->num_rows() == 0)
        {
            $save9 = array(
                'name' => $this
                    ->input
                    ->post('torax') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save9);
        }
        $query10 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('ext_inf') ,
            'location' => 18
        ));
        if ($query10->num_rows() == 0)
        {
            $save10 = array(
                'name' => $this
                    ->input
                    ->post('ext_inf') ,
                'location' => 18
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save10);
        }
        $query11 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('cervix') ,
            'location' => 29
        ));
        if ($query11->num_rows() == 0)
        {
            $save11 = array(
                'name' => $this
                    ->input
                    ->post('cervix') ,
                'location' => 29
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save11);
        }
        $query12 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('inspection_vulval') ,
            'location' => 24
        ));
        if ($query12->num_rows() == 0)
        {
            $save12 = array(
                'name' => $this
                    ->input
                    ->post('inspection_vulval') ,
                'location' => 24
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save12);
        }
        $query13 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('rectal') ,
            'location' => 14
        ));
        if ($query13->num_rows() == 0)
        {
            $save13 = array(
                'name' => $this
                    ->input
                    ->post('rectal') ,
                'location' => 14
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save13);
        }
        $query14 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('genitalm') ,
            'location' => 15
        ));
        if ($query14->num_rows() == 0)
        {
            $save14 = array(
                'name' => $this
                    ->input
                    ->post('genitalm') ,
                'location' => 15
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save14);
        }
        $query15 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('genitalf') ,
            'location' => 16
        ));
        if ($query15->num_rows() == 0)
        {
            $save15 = array(
                'name' => $this
                    ->input
                    ->post('genitalf') ,
                'location' => 16
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save15);
        }
        $query16 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('vagina') ,
            'location' => 17
        ));
        if ($query16->num_rows() == 0)
        {
            $save16 = array(
                'name' => $this
                    ->input
                    ->post('vagina') ,
                'location' => 17
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save16);
        }
        $query17 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('mama_izq1') ,
            'location' => 11
        ));
        if ($query17->num_rows() == 0)
        {
            $save17 = array(
                'name' => $this
                    ->input
                    ->post('mama_izq1') ,
                'location' => 11
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save17);
        }
        $query18 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('mama_izq2') ,
            'location' => 11
        ));
        if ($query18->num_rows() == 0)
        {
            $save18 = array(
                'name' => $this
                    ->input
                    ->post('mama_izq2') ,
                'location' => 11
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save18);
        }
        $query19 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('region_ax1') ,
            'location' => 12
        ));
        if ($query19->num_rows() == 0)
        {
            $save19 = array(
                'name' => $this
                    ->input
                    ->post('region_ax1') ,
                'location' => 12
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save19);
        }
        $query20 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('region_ax2') ,
            'location' => 12
        ));
        if ($query20->num_rows() == 0)
        {
            $save20 = array(
                'name' => $this
                    ->input
                    ->post('region_ax2') ,
                'location' => 12
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save20);
        }
        $query1 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sisneuro') ,
            'location' => 1
        ));
        if ($query1->num_rows() == 0)
        {
            $save1 = array(
                'name' => $this
                    ->input
                    ->post('sisneuro') ,
                'location' => 1
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save1);
        }
        $query2 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('siscardio') ,
            'location' => 2
        ));
        if ($query2->num_rows() == 0)
        {
            $save2 = array(
                'name' => $this
                    ->input
                    ->post('siscardio') ,
                'location' => 2
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save2);
        }
        $query3 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_uro') ,
            'location' => 3
        ));
        if ($query3->num_rows() == 0)
        {
            $save3 = array(
                'name' => $this
                    ->input
                    ->post('sist_uro') ,
                'location' => 3
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save3);
        }
        $query4 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sis_mu_e') ,
            'location' => 4
        ));
        if ($query4->num_rows() == 0)
        {
            $save4 = array(
                'name' => $this
                    ->input
                    ->post('sis_mu_e') ,
                'location' => 4
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save4);
        }
        $query5 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_resp') ,
            'location' => 7
        ));
        if ($query5->num_rows() == 0)
        {
            $save5 = array(
                'name' => $this
                    ->input
                    ->post('sist_resp') ,
                'location' => 7
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save5);
        }
        $query6 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_diges') ,
            'location' => 19
        ));
        if ($query6->num_rows() == 0)
        {
            $save6 = array(
                'name' => $this
                    ->input
                    ->post('sist_diges') ,
                'location' => 19
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save6);
        }
        $query7 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_endo') ,
            'location' => 21
        ));
        if ($query7->num_rows() == 0)
        {
            $save7 = array(
                'name' => $this
                    ->input
                    ->post('sist_endo') ,
                'location' => 21
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save7);
        }
        $query8 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('sist_rela') ,
            'location' => 22
        ));
        if ($query8->num_rows() == 0)
        {
            $save8 = array(
                'name' => $this
                    ->input
                    ->post('sist_rela') ,
                'location' => 22
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save8);
        }
    }
    function saveDermatologo()
    {
        $insert_date = date("Y-m-d H:i:s");
        $user_id = $this
            ->input
            ->post('user_id');
        $idenfact = $this
            ->session
            ->userdata['update_enf_act'];
        $upEnf = array(
            'enf_motivo' => $this
                ->input
                ->post('enf_motivo') ,
            'signopsis' => $this
                ->input
                ->post('enf_signopsis') ,
            'laboratorios' => $this
                ->input
                ->post('enf_laboratorios') ,
            'estudios' => $this
                ->input
                ->post('enf_estudios')
        );
        $whereEnf = array(
            'id_enf' => $idenfact
        );
        $this
            ->db
            ->where($whereEnf);
        $this
            ->db
            ->update("h_c_sinopsis", $upEnf);
        $whereimg = array(
            'id_patient' => $this
                ->input
                ->post('hist_id') ,
            'userid' => $this
                ->input
                ->post('user_id') ,
            'id_enfermedad' => 0
        );
        $updimg = array(
            'id_enfermedad' => $idenfact
        );
        $this
            ->db
            ->where($whereimg);
        $this
            ->db
            ->update("saveEnfImage", $updimg);
        $query1 = $this
            ->db
            ->get_where('type_reasons', array(
            'title' => $this
                ->input
                ->post('enf_motivo')
        ));
        if ($query1->num_rows() == 0)
        {
            $save = array(
                'title' => $this
                    ->input
                    ->post('enf_motivo') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => $insert_date,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => $insert_date
            );
            $this
                ->model_admin
                ->save_new_causa($save);
        }
        $hab_t_drug = $this
            ->input
            ->post('hab_t_drug');
        $todo_check = $this
            ->input
            ->post('todo_check');
        $todo_check1 = (isset($todo_check)) ? 1 : 0;
        $car_nin_check = $this
            ->input
            ->post('car_nin_check');
        $car_nin_check1 = (isset($car_nin_check)) ? 1 : 0;
        $madre_check = $this
            ->input
            ->post('madre_check');
        $madre_check1 = (isset($madre_check)) ? 1 : 0;
        $padre_check = $this
            ->input
            ->post('padre_check');
        $padre_check1 = (isset($padre_check)) ? 1 : 0;
        $car_h_check = $this
            ->input
            ->post('car_h_check');
        $car_h_check1 = (isset($car_h_check)) ? 1 : 0;
        $car_pe_check = $this
            ->input
            ->post('car_pe_check');
        $car_pe_check1 = (isset($car_pe_check)) ? 1 : 0;
        $nin_check2 = $this
            ->input
            ->post('nin_check2');
        $nin_check22 = (isset($nin_check2)) ? 1 : 0;
        $madre_check2 = $this
            ->input
            ->post('madre_check2');
        $madre_check22 = (isset($madre_check2)) ? 1 : 0;
        $padre_check2 = $this
            ->input
            ->post('padre_check2');
        $padre_check22 = (isset($padre_check2)) ? 1 : 0;
        $h_check2 = $this
            ->input
            ->post('h_check2');
        $h_check22 = (isset($h_check2)) ? 1 : 0;
        $pe_check2 = $this
            ->input
            ->post('pe_check2');
        $pe_check22 = (isset($pe_check2)) ? 1 : 0;
        $nin_check3 = $this
            ->input
            ->post('nin_check3');
        $nin_check33 = (isset($nin_check3)) ? 1 : 0;
        $madre_check3 = $this
            ->input
            ->post('madre_check3');
        $madre_check33 = (isset($madre_check3)) ? 1 : 0;
        $padre_check3 = $this
            ->input
            ->post('padre_check3');
        $padre_check33 = (isset($padre_check3)) ? 1 : 0;
        $h_check3 = $this
            ->input
            ->post('h_check3');
        $h_check33 = (isset($h_check3)) ? 1 : 0;
        $pe_check3 = $this
            ->input
            ->post('pe_check3');
        $pe_check33 = (isset($pe_check3)) ? 1 : 0;
        $nin_check4 = $this
            ->input
            ->post('nin_check4');
        $nin_check44 = (isset($nin_check4)) ? 1 : 0;
        $madre_check4 = $this
            ->input
            ->post('madre_check4');
        $madre_check44 = (isset($madre_check4)) ? 1 : 0;
        $padre_check4 = $this
            ->input
            ->post('padre_check4');
        $padre_check44 = (isset($padre_check4)) ? 1 : 0;
        $h_check4 = $this
            ->input
            ->post('h_check4');
        $h_check44 = (isset($h_check4)) ? 1 : 0;
        $pe_check4 = $this
            ->input
            ->post('pe_check4');
        $pe_check44 = (isset($pe_check4)) ? 1 : 0;
        $nin_check5 = $this
            ->input
            ->post('nin_check5');
        $nin_check55 = (isset($nin_check5)) ? 1 : 0;
        $madre_check5 = $this
            ->input
            ->post('madre_check5');
        $madre_check55 = (isset($madre_check5)) ? 1 : 0;
        $padre_check5 = $this
            ->input
            ->post('padre_check5');
        $padre_check55 = (isset($padre_check5)) ? 1 : 0;
        $h_check5 = $this
            ->input
            ->post('h_check5');
        $h_check55 = (isset($h_check5)) ? 1 : 0;
        $pe_check5 = $this
            ->input
            ->post('pe_check5');
        $pe_check55 = (isset($pe_check5)) ? 1 : 0;
        $nin_check05 = $this
            ->input
            ->post('nin_check05');
        $nin_check055 = (isset($nin_check05)) ? 1 : 0;
        $madre_check05 = $this
            ->input
            ->post('madre_check05');
        $madre_check055 = (isset($madre_check05)) ? 1 : 0;
        $padre_check05 = $this
            ->input
            ->post('padre_check05');
        $padre_check055 = (isset($padre_check05)) ? 1 : 0;
        $h_check05 = $this
            ->input
            ->post('h_check05');
        $h_check055 = (isset($h_check05)) ? 1 : 0;
        $pe_check05 = $this
            ->input
            ->post('pe_check05');
        $pe_check055 = (isset($pe_check05)) ? 1 : 0;
        $nin_check6 = $this
            ->input
            ->post('nin_check6');
        $nin_check66 = (isset($nin_check6)) ? 1 : 0;
        $madre_check6 = $this
            ->input
            ->post('madre_check6');
        $madre_check66 = (isset($madre_check6)) ? 1 : 0;
        $padre_check6 = $this
            ->input
            ->post('padre_check6');
        $padre_check66 = (isset($padre_check6)) ? 1 : 0;
        $h_check6 = $this
            ->input
            ->post('h_check6');
        $h_check66 = (isset($h_check6)) ? 1 : 0;
        $pe_check6 = $this
            ->input
            ->post('pe_check6');
        $pe_check66 = (isset($pe_check6)) ? 1 : 0;
        $nin_check7 = $this
            ->input
            ->post('nin_check7');
        $nin_check77 = (isset($nin_check7)) ? 1 : 0;
        $madre_check7 = $this
            ->input
            ->post('madre_check7');
        $madre_check77 = (isset($madre_check7)) ? 1 : 0;
        $padre_check7 = $this
            ->input
            ->post('padre_check7');
        $padre_check77 = (isset($padre_check7)) ? 1 : 0;
        $h_check7 = $this
            ->input
            ->post('h_check7');
        $h_check77 = (isset($h_check7)) ? 1 : 0;
        $pe_check7 = $this
            ->input
            ->post('pe_check7');
        $pe_check77 = (isset($pe_check7)) ? 1 : 0;
        $nin_check8 = $this
            ->input
            ->post('nin_check8');
        $nin_check88 = (isset($nin_check8)) ? 1 : 0;
        $madre_check8 = $this
            ->input
            ->post('madre_check8');
        $madre_check88 = (isset($madre_check8)) ? 1 : 0;
        $padre_check8 = $this
            ->input
            ->post('padre_check8');
        $padre_check88 = (isset($padre_check8)) ? 1 : 0;
        $h_check8 = $this
            ->input
            ->post('h_check8');
        $h_check88 = (isset($h_check8)) ? 1 : 0;
        $pe_check8 = $this
            ->input
            ->post('pe_check8');
        $pe_check88 = (isset($pe_check8)) ? 1 : 0;
        $nin_check9 = $this
            ->input
            ->post('nin_check9');
        $nin_check99 = (isset($nin_check9)) ? 1 : 0;
        $madre_check9 = $this
            ->input
            ->post('madre_check9');
        $madre_check99 = (isset($madre_check9)) ? 1 : 0;
        $padre_check9 = $this
            ->input
            ->post('padre_check9');
        $padre_check99 = (isset($padre_check9)) ? 1 : 0;
        $h_check9 = $this
            ->input
            ->post('h_check9');
        $h_check99 = (isset($h_check9)) ? 1 : 0;
        $pe_check9 = $this
            ->input
            ->post('pe_check9');
        $pe_check99 = (isset($pe_check9)) ? 1 : 0;
        $nin_check10 = $this
            ->input
            ->post('nin_check10');
        $nin_check1010 = (isset($nin_check10)) ? 1 : 0;
        $madre_check10 = $this
            ->input
            ->post('madre_check10');
        $madre_check1010 = (isset($madre_check10)) ? 1 : 0;
        $padre_check10 = $this
            ->input
            ->post('padre_check10');
        $padre_check1010 = (isset($padre_check10)) ? 1 : 0;
        $h_check10 = $this
            ->input
            ->post('h_check10');
        $h_check1010 = (isset($h_check10)) ? 1 : 0;
        $pe_check10 = $this
            ->input
            ->post('pe_check10');
        $pe_check1010 = (isset($pe_check10)) ? 1 : 0;
        $nin_check11 = $this
            ->input
            ->post('nin_check11');
        $nin_check1111 = (isset($nin_check11)) ? 1 : 0;
        $madre_check11 = $this
            ->input
            ->post('madre_check11');
        $madre_check1111 = (isset($madre_check11)) ? 1 : 0;
        $padre_check11 = $this
            ->input
            ->post('padre_check11');
        $padre_check1111 = (isset($padre_check11)) ? 1 : 0;
        $h_check11 = $this
            ->input
            ->post('h_check11');
        $h_check1111 = (isset($h_check11)) ? 1 : 0;
        $pe_check11 = $this
            ->input
            ->post('pe_check11');
        $pe_check1111 = (isset($pe_check11)) ? 1 : 0;
        $neop_check12 = $this
            ->input
            ->post('neop_check12');
        $neop_check1212 = (isset($neop_check12)) ? 1 : 0;
        $madre_check12 = $this
            ->input
            ->post('madre_check12');
        $madre_check1212 = (isset($madre_check12)) ? 1 : 0;
        $padre_check12 = $this
            ->input
            ->post('padre_check12');
        $padre_check1212 = (isset($padre_check12)) ? 1 : 0;
        $h_check12 = $this
            ->input
            ->post('h_check12');
        $h_check1212 = (isset($h_check12)) ? 1 : 0;
        $pe_check12 = $this
            ->input
            ->post('pe_check12');
        $pe_check1212 = (isset($pe_check12)) ? 1 : 0;
        $psi_check13 = $this
            ->input
            ->post('psi_check13');
        $psi_check1313 = (isset($psi_check13)) ? 1 : 0;
        $madre_check13 = $this
            ->input
            ->post('madre_check13');
        $madre_check1313 = (isset($madre_check13)) ? 1 : 0;
        $padre_check13 = $this
            ->input
            ->post('padre_check13');
        $padre_check1313 = (isset($padre_check13)) ? 1 : 0;
        $h_check13 = $this
            ->input
            ->post('h_check13');
        $h_check1313 = (isset($h_check13)) ? 1 : 0;
        $pe_check13 = $this
            ->input
            ->post('pe_check13');
        $pe_check1313 = (isset($pe_check13)) ? 1 : 0;
        $obs_check14 = $this
            ->input
            ->post('obs_check14');
        $obs_check1414 = (isset($obs_check14)) ? 1 : 0;
        $madre_check14 = $this
            ->input
            ->post('madre_check14');
        $madre_check1414 = (isset($madre_check14)) ? 1 : 0;
        $padre_check14 = $this
            ->input
            ->post('padre_check14');
        $padre_check1414 = (isset($padre_check14)) ? 1 : 0;
        $h_check14 = $this
            ->input
            ->post('h_check14');
        $h_check1414 = (isset($h_check14)) ? 1 : 0;
        $pe_check14 = $this
            ->input
            ->post('pe_check14');
        $pe_check1414 = (isset($pe_check14)) ? 1 : 0;
        $ulp_check15 = $this
            ->input
            ->post('ulp_check15');
        $ulp_check1515 = (isset($ulp_check15)) ? 1 : 0;
        $madre_check15 = $this
            ->input
            ->post('madre_check15');
        $madre_check1515 = (isset($madre_check15)) ? 1 : 0;
        $padre_check15 = $this
            ->input
            ->post('padre_check15');
        $padre_check1515 = (isset($padre_check15)) ? 1 : 0;
        $h_check15 = $this
            ->input
            ->post('h_check15');
        $h_check1515 = (isset($h_check15)) ? 1 : 0;
        $pe_check15 = $this
            ->input
            ->post('pe_check15');
        $pe_check1515 = (isset($pe_check15)) ? 1 : 0;
        $art_check16 = $this
            ->input
            ->post('art_check16');
        $art_check1616 = (isset($art_check16)) ? 1 : 0;
        $madre_check16 = $this
            ->input
            ->post('madre_check16');
        $madre_check1616 = (isset($madre_check16)) ? 1 : 0;
        $padre_check16 = $this
            ->input
            ->post('padre_check16');
        $padre_check1616 = (isset($padre_check16)) ? 1 : 0;
        $h_check16 = $this
            ->input
            ->post('h_check16');
        $h_check1616 = (isset($h_check16)) ? 1 : 0;
        $pe_check16 = $this
            ->input
            ->post('pe_check16');
        $pe_check1616 = (isset($pe_check16)) ? 1 : 0;
        $art_check016 = $this
            ->input
            ->post('art_check016');
        $art_check01616 = (isset($art_check016)) ? 1 : 0;
        $madre_check016 = $this
            ->input
            ->post('madre_check016');
        $madre_check01616 = (isset($madre_check016)) ? 1 : 0;
        $padre_check016 = $this
            ->input
            ->post('padre_check016');
        $padre_check01616 = (isset($padre_check016)) ? 1 : 0;
        $h_check016 = $this
            ->input
            ->post('h_check016');
        $h_check01616 = (isset($h_check016)) ? 1 : 0;
        $pe_check016 = $this
            ->input
            ->post('pe_check016');
        $pe_check01616 = (isset($pe_check016)) ? 1 : 0;
        $zika_check17 = $this
            ->input
            ->post('zika_check17');
        $zika_check1717 = (isset($zika_check17)) ? 1 : 0;
        $madre_check17 = $this
            ->input
            ->post('madre_check17');
        $madre_check1717 = (isset($madre_check17)) ? 1 : 0;
        $padre_check17 = $this
            ->input
            ->post('padre_check17');
        $padre_check1717 = (isset($padre_check17)) ? 1 : 0;
        $h_check17 = $this
            ->input
            ->post('h_check17');
        $h_check1717 = (isset($h_check17)) ? 1 : 0;
        $pe_check17 = $this
            ->input
            ->post('pe_check17');
        $pe_check1717 = (isset($pe_check17)) ? 1 : 0;
        $save = array(
            'todo' => $todo_check1,
            'car_nin' => $car_nin_check1,
            'car_m' => $madre_check1,
            'car_p' => $padre_check1,
            'car_h' => $car_h_check1,
            'car_pe' => $car_pe_check1,
            'car_text' => $this
                ->input
                ->post('car_text') ,
            'hip_nin' => $nin_check22,
            'hip_m' => $madre_check22,
            'hip_p' => $padre_check22,
            'hip_h' => $h_check22,
            'hip_pe' => $pe_check22,
            'hip_text' => $this
                ->input
                ->post('hip_text') ,
            'ec_nin' => $nin_check33,
            'ec_m' => $madre_check33,
            'ec_p' => $padre_check33,
            'ec_h' => $h_check33,
            'ec_pe' => $pe_check33,
            'ec_text' => $this
                ->input
                ->post('ec_text') ,
            'ep_nin' => $nin_check44,
            'ep_m' => $madre_check44,
            'ep_p' => $padre_check44,
            'ep_h' => $h_check44,
            'ep_pe' => $pe_check44,
            'ep_text' => $this
                ->input
                ->post('ep_text') ,
            'as_nin' => $nin_check55,
            'as_m' => $madre_check55,
            'as_p' => $padre_check55,
            'as_h' => $h_check55,
            'as_pe' => $pe_check55,
            'as_text' => $this
                ->input
                ->post('as_text') ,
            'enre_nin' => $nin_check055,
            'enre_m' => $madre_check055,
            'enre_p' => $padre_check055,
            'enre_h' => $h_check055,
            'enre_pe' => $pe_check055,
            'enre_text' => $this
                ->input
                ->post('enre_text') ,
            'tub_nin' => $nin_check66,
            'tub_m' => $madre_check66,
            'tub_p' => $padre_check66,
            'tub_h' => $h_check66,
            'tub_pe' => $pe_check66,
            'tub_text' => $this
                ->input
                ->post('tub_text') ,
            'dia_nin' => $nin_check77,
            'dia_m' => $madre_check77,
            'dia_p' => $padre_check77,
            'dia_h' => $h_check77,
            'dia_pe' => $pe_check77,
            'dia_text' => $this
                ->input
                ->post('dia_text') ,
            'tir_nin' => $nin_check88,
            'tir_m' => $madre_check88,
            'tir_p' => $padre_check88,
            'tir_h' => $h_check88,
            'tir_pe' => $pe_check88,
            'tir_text' => $this
                ->input
                ->post('tir_text') ,
            'hep_tipo' => $this
                ->input
                ->post('hep_tipo') ,
            'hep_nin' => $nin_check99,
            'hep_m' => $madre_check99,
            'hep_p' => $padre_check99,
            'hep_h' => $h_check99,
            'hep_pe' => $pe_check99,
            'hep_text' => $this
                ->input
                ->post('hep_text') ,
            'enfr_nin' => $nin_check1010,
            'enfr_m' => $madre_check1010,
            'enfr_p' => $padre_check1010,
            'enfr_h' => $h_check1010,
            'enfr_pe' => $pe_check1010,
            'enfr_text' => $this
                ->input
                ->post('enfr_text') ,
            'falc_nin' => $nin_check1111,
            'falc_m' => $madre_check1111,
            'falc_p' => $padre_check1111,
            'falc_h' => $h_check1111,
            'falc_pe' => $pe_check1111,
            'falc_text' => $this
                ->input
                ->post('falc_text') ,
            'neop_nin' => $neop_check1212,
            'neop_m' => $madre_check1212,
            'neop_p' => $padre_check1212,
            'neop_h' => $h_check1212,
            'neop_pe' => $pe_check1212,
            'neop_text' => $this
                ->input
                ->post('neop_text') ,
            'psi_nin' => $psi_check1313,
            'psi_m' => $madre_check1313,
            'psi_p' => $padre_check1313,
            'psi_h' => $h_check1313,
            'psi_pe' => $pe_check1313,
            'psi_text' => $this
                ->input
                ->post('psi_text') ,
            'obs_nin' => $obs_check1414,
            'obs_m' => $madre_check1414,
            'obs_p' => $padre_check1414,
            'obs_h' => $h_check1414,
            'obs_pe' => $pe_check1414,
            'obs_text' => $this
                ->input
                ->post('obs_text') ,
            'ulp_nin' => $ulp_check1515,
            'ulp_m' => $madre_check1515,
            'ulp_p' => $padre_check1515,
            'ulp_h' => $h_check1515,
            'ulp_pe' => $pe_check1515,
            'ulp_text' => $this
                ->input
                ->post('ulp_text') ,
            'art_nin' => $art_check1616,
            'art_m' => $madre_check1616,
            'art_p' => $padre_check1616,
            'art_h' => $h_check1616,
            'art_pe' => $pe_check1616,
            'art_text' => $this
                ->input
                ->post('art_text') ,
            'hem_nin' => $art_check01616,
            'hem_m' => $madre_check01616,
            'hem_p' => $padre_check01616,
            'hem_h' => $h_check01616,
            'hem_pe' => $pe_check01616,
            'hem_text' => $this
                ->input
                ->post('hem_text') ,
            'zika_nin' => $zika_check1717,
            'zika_m' => $madre_check1717,
            'zika_p' => $padre_check1717,
            'zika_h' => $h_check1717,
            'zika_pe' => $pe_check1717,
            'zika_text' => $this
                ->input
                ->post('zika_text') ,
            'otros' => $this
                ->input
                ->post('otros') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'date_modif' => $insert_date,
            'operator' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id') ,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $idMarPos = $this
            ->model_admin
            ->marquePositivo($save);
        $counMarP = $this
            ->model_admin
            ->countAnte1($this
            ->input
            ->post('hist_id'));
        if ($counMarP > 1)
        {
            $this
                ->model_admin
                ->DeleteDuplicateMarqueP($idMarPos);
        }
        $newMpat = $this
            ->input
            ->post('newMpat');
        if ($newMpat)
        {
            foreach ($newMpat as $key => $med)
            {
                $savecd = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'part' => 'gnl',
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($savecd);
            }
        }
        $save2 = array(
            'maltratof' => $this
                ->input
                ->post('textmaltrato_g') ,
            'abusos' => $this
                ->input
                ->post('textabuso_g') ,
            'negligencia' => $this
                ->input
                ->post('textneg_g') ,
            'maltrato' => $this
                ->input
                ->post('maltratoemo_g') ,
            'alimentos' => $this
                ->input
                ->post('alimentos_al') ,
            'medicamentos' => $this
                ->input
                ->post('medicamentos_al') ,
            'otros' => $this
                ->input
                ->post('otros_al') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'update_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id')
        );
        $idDes = $this
            ->model_admin
            ->DesantAl($save2);
        $counDesa = $this
            ->model_admin
            ->countDesarollo($this
            ->input
            ->post('hist_id'));
        if ($counDesa > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyDesarollo($idDes);
        }
        $save3 = array(
            'quirurgicos' => $this
                ->input
                ->post('quirurgicos') ,
            'gineco' => $this
                ->input
                ->post('gineco') ,
            'abdominal' => $this
                ->input
                ->post('abdominal') ,
            'toracica' => $this
                ->input
                ->post('toracica') ,
            'transfusion' => $this
                ->input
                ->post('transfusion') ,
            'otros1' => $this
                ->input
                ->post('otros1_g') ,
            'hepatis' => $this
                ->input
                ->post('hepatis') ,
            'hpv' => $this
                ->input
                ->post('hpv') ,
            'toxoide' => $this
                ->input
                ->post('toxoide') ,
            'grouposang' => $this
                ->input
                ->post('grouposang') ,
            'tipificacion' => $this
                ->input
                ->post('tipificacion') ,
            'rh' => $this
                ->input
                ->post('rhoa') ,
            'violencia1' => $this
                ->input
                ->post('violencia1') ,
            'violencia2' => $this
                ->input
                ->post('violencia2') ,
            'violencia3' => $this
                ->input
                ->post('violencia3') ,
            'violencia4' => $this
                ->input
                ->post('violencia4') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id')
        );
        $idAtO = $this
            ->model_admin
            ->saveAnteOtros($save3);
        $counAntOt = $this
            ->model_admin
            ->countAntOtros($this
            ->input
            ->post('hist_id'));
        if ($counAntOt > 1)
        {
            $this
                ->model_admin
                ->DeleteAntOtros($idAtO);
        }
        if (!empty($medicine))
        {
            foreach ($medicine as $med)
            {
                $save = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($save);
            };
        };
        $this
            ->model_admin
            ->deleteMedNinguno();
        $save4 = array(
            'cafe_cant' => $this
                ->input
                ->post('hab_c_caf') ,
            'cafe_frec' => $this
                ->input
                ->post('hab_f_caf') ,
            'pipa_cant' => $this
                ->input
                ->post('hab_c_pip') ,
            'pipa_frec' => $this
                ->input
                ->post('hab_f_pip') ,
            'ciga_can' => $this
                ->input
                ->post('hab_c_ciga') ,
            'ciga_frec' => $this
                ->input
                ->post('hab_f_ciga') ,
            'alc_can' => $this
                ->input
                ->post('hab_c_al') ,
            'alc_frec' => $this
                ->input
                ->post('hab_f_al') ,
            'tab_can' => $this
                ->input
                ->post('hab_c_tab') ,
            'tab_frec' => $this
                ->input
                ->post('hab_f_tab') ,
            'hab_c_drug' => $this
                ->input
                ->post('hab_c_drug') ,
            'hab_f_drug' => $this
                ->input
                ->post('hab_f_drug') ,
            'hookah' => $this
                ->input
                ->post('hookah') ,
            'hab_f_hookah' => $this
                ->input
                ->post('hab_f_hookah') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'update_time' => $insert_date
        );
        $idHabT = $this
            ->model_admin
            ->saveHabitosToxicos($save4);
        $counHabT = $this
            ->model_admin
            ->countHabitosToxicos($this
            ->input
            ->post('hist_id'));
        if ($counHabT > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyHabitosToxicos($idHabT);
        }
        if (!empty($hab_t_drug))
        {
            foreach ($hab_t_drug as $drug)
            {
                $save = array(
                    'name' => $drug,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id')
                );
                $this
                    ->model_admin
                    ->SaveDrug($save);
            };
        }
        $saveDerma = array(
            'derma_tipo' => $this
                ->input
                ->post('derma_tipo') ,
            'derma_tipo_text' => $this
                ->input
                ->post('derma_tipo_text') ,
            'derma_morfologia' => $this
                ->input
                ->post('derma_morfologia') ,
            'derma_resto' => $this
                ->input
                ->post('derma_resto') ,
            'derma_morfologia_text' => $this
                ->input
                ->post('derma_morfologia_text') ,
            'derma_resto_text' => $this
                ->input
                ->post('derma_resto_text') ,
            'derma_intero' => $this
                ->input
                ->post('derma_intero') ,
            'derma_intero_text' => $this
                ->input
                ->post('derma_intero_text') ,
            'derma_otros_datos' => $this
                ->input
                ->post('derma_otros_datos') ,
            'derma_otros_datos_text' => $this
                ->input
                ->post('derma_otros_datos_text') ,
            'derma_diagno_der_ini' => $this
                ->input
                ->post('derma_diagno_der_ini') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'updated_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'updated_time' => $insert_date,
            'user_id' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->saveDermatologia($saveDerma);
        $this
            ->model_admin
            ->delete_empty_derma();
        $query9 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('derma_tipo') ,
            'location' => 30
        ));
        if ($query9->num_rows() == 0)
        {
            $save9 = array(
                'name' => $this
                    ->input
                    ->post('derma_tipo') ,
                'location' => 30
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save9);
        }
        $query11 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('derma_morfologia') ,
            'location' => 31
        ));
        if ($query11->num_rows() == 0)
        {
            $save11 = array(
                'name' => $this
                    ->input
                    ->post('derma_morfologia') ,
                'location' => 31
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save11);
        }
        $query12 = $this
            ->db
            ->get_where('historial_dropdown', array(
            'name' => $this
                ->input
                ->post('derma_intero') ,
            'location' => 32
        ));
        if ($query12->num_rows() == 0)
        {
            $save12 = array(
                'name' => $this
                    ->input
                    ->post('derma_intero') ,
                'location' => 32
            );
            $this
                ->model_admin
                ->save_new_historial_dropdown($save12);
        }
    }
    function SaveFormIndicacionesEstudios()
    {
        $historial_id = $this
            ->input
            ->post('historial_id_es');
        $insert_date = date("Y-m-d H:i:s");
        if ($this
            ->input
            ->post('estudios') == '' || $this
            ->input
            ->post('cuerpo') == '')
        {
            $response['status'] = 1;
            $response['message'] = '* Estudios y Parte del cuerpo son obligatorios!';
        }
        else
        {
            $save = array(
                'estudio' => $this
                    ->input
                    ->post('estudios') ,
                'centro' => $this
                    ->input
                    ->post('centro') ,
                'cuerpo' => $this
                    ->input
                    ->post('cuerpo') ,
                'lateralidad' => $this
                    ->input
                    ->post('lateralidad') ,
                'observacion' => $this
                    ->input
                    ->post('observaciones') ,
                'historial_id' => $historial_id,
                'operator' => $this
                    ->input
                    ->post('operators') ,
                'updated_by' => $this
                    ->input
                    ->post('operators') ,
                'insert_date' => $insert_date,
                'updated_time' => $insert_date,
                'emergency' => $this
                    ->input
                    ->post('emergency_id')
            );
            $this
                ->model_admin
                ->SaveFormIndicacionesEstudios($save);
            $query1 = $this
                ->db
                ->get_where('type_studies', array(
                'name' => $this
                    ->input
                    ->post('estudios')
            ));
            if ($query1->num_rows() == 0)
            {
                $save = array(
                    'name' => $this
                        ->input
                        ->post('estudios')
                );
                $this
                    ->db
                    ->insert("type_studies", $save);
            }
            $response['status'] = 0;
            $response['message'] = '';
        }
        echo json_encode($response);
    }
    function DeleteEsudios()
    {
        $id_lab = $this
            ->input
            ->post('id');
        $query = $this
            ->model_admin
            ->DeleteEsudios($id_lab);
    }
    function edit_estudios()
    {
        $data['estudios'] = $this
            ->model_admin
            ->estudios();
        $data['cuerpo'] = $this
            ->model_admin
            ->cuerpo();
        $data['edit_estudios'] = $this
            ->model_admin
            ->print_estudio($this
            ->uri
            ->segment(3));
        $data['id_user'] = $this
            ->uri
            ->segment(4);
        $this
            ->load
            ->view('admin/historial-medical1/estudios/edit_estudios', $data);
    }
    function UpdateFormIndEst()
    {
        $insert_date = date("Y-m-d H:i:s");
        $id = $this
            ->input
            ->post('id');
        $save = array(
            'estudio' => $this
                ->input
                ->post('study2') ,
            'cuerpo' => $this
                ->input
                ->post('cuerpo2') ,
            'lateralidad' => $this
                ->input
                ->post('lateralidad2') ,
            'observacion' => $this
                ->input
                ->post('observaciones2') ,
            'updated_by' => $this
                ->input
                ->post('operator') ,
            'updated_time' => $insert_date
        );
        $this
            ->model_admin
            ->UpdateFormIndEst($save, $id);
    }
    function enviarRecetasToPatient()
    {
        $idpat = $this
            ->input
            ->post('idpat');
        $idoc = $this
            ->input
            ->post('doc');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => '162.144.158.119',
            'smtp_port' => 26,
            'smtp_user' => 'soporte@admedicall.com',
            'smtp_pass' => 'sopote_adm123QW',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => true
        );
        $email = $this
            ->db
            ->select('email')
            ->where('id_p_a', $idpat)->get('patients_appointments')
            ->row('email');
        $doc = $this
            ->db
            ->select('name')
            ->where('id_user', $idoc)->get('users')
            ->row('name');
        $chars = "a1b2c3d4e5f67gh0i9jk2lm3nop0qrs19tuv7w4xy80zAB4CD8E06FGH4IJ1KLW3XYZ0189MNOP2QRS1T9UV$idpat";
        $codigo = substr(str_shuffle($chars) , 0, 6);
        $codigocpt = md5($codigo);
        $link = 'href="https://www.admedicall.com/navigation/search_recipe"';
        $message = "
<html>
<head>

</head>
<body>
<div>
Usted ha recibido de parte del doctor $doc el código # <strong>$codigo</strong> después de una consulta, favor presentar este número al farmacéutico, si desea ver su indicación del clic Puede entrar el código para ver su receta.

<br/><a $link>Puede entrar el código para ver su receta</a>
 </div>    
</body>
</html>";
        $title = "Mensage del doc. $doc";
        $this
            ->load
            ->library('email', $config);
        $this
            ->email
            ->set_newline("\r\n");
        $this
            ->email
            ->set_mailtype("html");
        $this
            ->email
            ->from("soporte@admedicall.com");
        $this
            ->email
            ->to($email);
        $this
            ->email
            ->subject($title);
        $this
            ->email
            ->message($message);
        $this
            ->email
            ->send();
        $sql = "SELECT id_recetas FROM h_c_indicaciones_med_enviar_pat WHERE  id_pat=$idpat && id_doc=$idoc";
        $farma = $this
            ->db
            ->query($sql);
        foreach ($farma->result() as $row2)
        {
            $where = array(
                'id_i_m' => $row2->id_recetas
            );
            $data = array(
                'encrypt_recetas' => $codigocpt
            );
            $this
                ->db
                ->where($where);
            $this
                ->db
                ->update("h_c_indicaciones_medicales", $data);
            $whered = array(
                'id_recetas' => $row2->id_recetas
            );
            $this
                ->db
                ->where($whered);
            $this
                ->db
                ->delete('h_c_indicaciones_med_enviar_pat');
        }
    }
    function recetasForm()
    {
        $data['presentacion'] = $this
            ->model_admin
            ->Presentacion();
        $data['medicamentos'] = $this
            ->model_admin
            ->medicamentos();
        $data['via'] = $this
            ->model_admin
            ->via();
        $data['frecuencia'] = $this
            ->model_admin
            ->frecuencia();
        $data['farmacia'] = $this
            ->model_admin
            ->farmacia();
        $this
            ->load
            ->view('admin/historial-medical1/recetas/recetas-form', $data);
    }
    function allRecetas()
    {
        $data['historial_id'] = $this
            ->input
            ->post('historial_id');
        $data['area'] = $this
            ->input
            ->post('area');
        $data['user_id'] = $this
            ->input
            ->post('user_id');
        $centro_medico = $this
            ->input
            ->post('centro_medico');
        $data['centro_medico'] = $centro_medico;
        $data['perfil'] = $this
            ->db
            ->select('perfil')
            ->where('id_user', $this
            ->input
            ->post('user_id'))
            ->get('users')
            ->row('perfil');
        $data['tot'] = $this
            ->model_admin
            ->hist_count_recetas($this
            ->input
            ->post('historial_id') , $centro_medico);
        $data['IndicacionesPrevias'] = $this
            ->model_admin
            ->IndicacionesPrevias($this
            ->input
            ->post('historial_id') , $centro_medico);
        $data['pag_rec'] = 1;
        $updt = array(
            'singular_id' => 0
        );
        $this
            ->model_admin
            ->UpdateSingularId($this
            ->input
            ->post('historial_id') , $updt);
        $this
            ->load
            ->view('admin/historial-medical1/recetas/all-patients-recetas', $data);
    }
    function edit_recetas()
    {
        $data['edit_recetas'] = $this
            ->model_admin
            ->Recetas1($this
            ->uri
            ->segment(3));
        $data['medicamentos'] = $this
            ->model_admin
            ->medicamentos();
        $data['presentacion'] = $this
            ->model_admin
            ->Presentacion();
        $data['branches'] = $this
            ->model_admin
            ->branches();
        $data['via'] = $this
            ->model_admin
            ->via();
        $data['frecuencia'] = $this
            ->model_admin
            ->frecuencia();
        $data['farmacia'] = $this
            ->model_admin
            ->farmacia();
        $data['id_user'] = $this
            ->uri
            ->segment(4);
        $this
            ->load
            ->view('admin/historial-medical1/recetas/edit_recetas', $data);
    }
    function check_recetas()
    {
        $where = array(
            'historial_id' => $this
                ->input
                ->post('id_pat') ,
            'emergency' => 0
        );
        $update = array(
            'printing' => 0
        );
        $this
            ->db
            ->where($where);
        $this
            ->db
            ->update("h_c_indications_labs", $update);
        $id = $this
            ->input
            ->post('id');
        $checked = array(
            'singular_id' => $this
                ->input
                ->post('print')
        );
        $this
            ->model_admin
            ->check_recetas($checked, $id);
    }
    function DeleteRecetas()
    {
        $id_lab = $this
            ->input
            ->post('id');
        $query = $this
            ->model_admin
            ->DeleteRecetas($id_lab);
    }
    function UpdateFormIndicaciones()
    {
        $insert_date = date("Y-m-d H:i:s");
        $id = $this
            ->input
            ->post('id');
        if ($this
            ->input
            ->post('via') != 'OFTALMICA')
        {
            $oyo = "";
        }
        else
        {
            $oyo = $this
                ->input
                ->post('oyo');
        }
        $save = array(
            'medica' => $this
                ->input
                ->post('medicamento1') ,
            'presentacion' => $this
                ->input
                ->post('presentacion') ,
            'frecuencia' => $this
                ->input
                ->post('frecuencia') ,
            'cantidad' => $this
                ->input
                ->post('cantidad') ,
            'via' => $this
                ->input
                ->post('via') ,
            'oyo' => $oyo,
            'updated_by' => $this
                ->input
                ->post('operator') ,
            'updated_time' => $insert_date
        );
        $this
            ->model_admin
            ->UpdateFormIndicaciones($save, $id);
    }
    function allLaboratoriosInd()
    {
        $data['id_historial'] = $this
            ->input
            ->post('historial_id');
        $data['operator'] = $this
            ->input
            ->post('operator');
        $data['user_id'] = $this
            ->input
            ->post('user_id');
        $data['hist'] = $this
            ->input
            ->post('hist');
        $data['centro_medico'] = $this
            ->input
            ->post('centro_medico');
        $data['emergency_id'] = $this
            ->input
            ->post('emergency_id');
        $data['areaid'] = $this
            ->db
            ->select('area')
            ->where('id_user', $this
            ->input
            ->post('user_id'))
            ->get('users')
            ->row('area');
        $data['str'] = $this
            ->input
            ->post('str');
        $this
            ->load
            ->view('admin/historial-medical1/laboratorios/allLaboratoriosInd', $data);
    }
    function SaveFormIndicacionesLab()
    {
        $labCheckded = $this
            ->input
            ->post('lab');
        $operatorl = $this
            ->input
            ->post('operatorl');
        $historial_id = $this
            ->input
            ->post('historial_id_l');
        $deleteLab = $this
            ->input
            ->post('deleteLab');
        $where = array(
            'historial_id' => $historial_id,
            'user_id' => $this
                ->input
                ->post('operatorl') ,
            'emergency' => 0
        );
        $update = array(
            'singular_id' => 0,
            'printing' => 0
        );
        $this
            ->db
            ->where($where);
        $this
            ->db
            ->update("h_c_indications_labs", $update);
        $save = array(
            'laboratory' => $labCheckded,
            'operator' => $this
                ->input
                ->post('operatorl') ,
            'historial_id' => $historial_id,
            'centro' => $this
                ->input
                ->post('centro_medico') ,
            'insert_time' => date("Y-m-d H:i:s") ,
            'updated_by' => $this
                ->input
                ->post('operatorl') ,
            'updated_time' => date("Y-m-d H:i:s") ,
            'printing2' => 1,
            'user_id' => $this
                ->input
                ->post('user_id') ,
            'emergency' => $this
                ->input
                ->post('emergency_id')
        );
        $this
            ->model_admin
            ->SaveFormIndicacionesLab($save);
    }
    function DeleteHistLab2()
    {
        $labCheckded = $this
            ->input
            ->post('lab');
        $operatorl = $this
            ->input
            ->post('operatorl');
        $historial_id = $this
            ->input
            ->post('historial_id_l');
        $deleteLab = $this
            ->input
            ->post('deleteLab');
        $save = array(
            'laboratory' => $labCheckded,
            'operator' => $this
                ->input
                ->post('operatorl') ,
            'historial_id' => $historial_id,
            'centro' => $this
                ->input
                ->post('centro_medico') ,
            'insert_time' => date("Y-m-d H:i:s") ,
            'updated_by' => $this
                ->input
                ->post('operatorl') ,
            'updated_time' => date("Y-m-d H:i:s") ,
            'printing2' => 1,
            'user_id' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->model_admin
            ->SaveFormIndicacionesLab($save);
        $this
            ->model_admin
            ->DeleteHistLab2($save);
    }
    function allLaboratorios()
    {
        $data['area'] = $this
            ->input
            ->post('area');
        $data['user_id'] = $this
            ->input
            ->post('user_id');
        $centro_medico = $this
            ->input
            ->post('centro_medico');
        $data['centro_medico'] = $centro_medico;
        $historial_id = $this
            ->input
            ->post('historial_id');
        $emergency_id = $this
            ->input
            ->post('emergency_id');
        $data['historial_id'] = $historial_id;
        $data['perfil'] = $this
            ->db
            ->select('perfil')
            ->where('id_user', $this
            ->input
            ->post('user_id'))
            ->get('users')
            ->row('perfil');
        $IndicacionesLab = $this
            ->model_admin
            ->patLab($historial_id, $emergency_id, $centro_medico);
        $data['IndicacionesLab'] = $IndicacionesLab;
        $data['num_count_lab'] = count($IndicacionesLab);
        $this
            ->load
            ->view('admin/historial-medical1/laboratorios/NewIndicationLab', $data);
    }
    function SaveFormIndicaciones()
    {
        if ($this
            ->input
            ->post('medicamento1') == '' || $this
            ->input
            ->post('presentacion') == '' || $this
            ->input
            ->post('frecuencia') == '' || $this
            ->input
            ->post('via') == '')
        {
            $response['status'] = 1;
            $response['message'] = '* Los campos con <strong>*</strong> son obligatorios!';
        }
        else
        {
            $historial_id = $this
                ->input
                ->post('historial_id');
            $where = array(
                'historial_id' => $historial_id,
                'operator' => $this
                    ->input
                    ->post('operator')
            );
            $update = array(
                'singular_id' => 0
            );
            $this
                ->db
                ->where($where);
            $this
                ->db
                ->update("h_c_indicaciones_medicales", $update);
            $save = array(
                'medica' => $this
                    ->input
                    ->post('medicamento1') ,
                'dosis' => $this
                    ->input
                    ->post('medicamentoDosis') ,
                'presentacion' => $this
                    ->input
                    ->post('presentacion') ,
                'frecuencia' => $this
                    ->input
                    ->post('frecuencia') ,
                'cantidad' => $this
                    ->input
                    ->post('cantidad') ,
                'via' => $this
                    ->input
                    ->post('via') ,
                'oyo' => $this
                    ->input
                    ->post('oyo') ,
                'operator' => $this
                    ->input
                    ->post('operator') ,
                'insert_date' => date("Y-m-d H:i:s") ,
                'historial_id' => $historial_id,
                'despachada' => 2,
                'centro' => $this
                    ->input
                    ->post('centro') ,
                'updated_by' => $this
                    ->input
                    ->post('operator') ,
                'updated_time' => date("Y-m-d H:i:s") ,
                'printing' => 1
            );
            $id_ind = $this
                ->model_admin
                ->SaveFormIndicaciones($save);
            $farm = array(
                'id_pat' => $historial_id,
                'id_doc' => $this
                    ->input
                    ->post('operator') ,
                'id_recetas' => $id_ind
            );
            $this
                ->db
                ->insert("h_c_indicaciones_med_enviar_pat", $farm);
            $query = $this
                ->db
                ->get_where('medicaments', array(
                'name' => $this
                    ->input
                    ->post('medicamento1')
            ));
            if ($query->num_rows() == 0)
            {
                $save = array(
                    'name' => $this
                        ->input
                        ->post('medicamento1')
                );
                $this
                    ->model_admin
                    ->save_new_medicaments($save);
            }
            $query = $this
                ->db
                ->get_where('presentacion', array(
                'name' => $this
                    ->input
                    ->post('presentacion')
            ));
            if ($query->num_rows() == 0)
            {
                $savep = array(
                    'name' => $this
                        ->input
                        ->post('presentacion')
                );
                $this
                    ->model_admin
                    ->save_new_presentacion($savep);
            }
            $response['status'] = 0;
            $response['message'] = '';
        }
        echo json_encode($response);
    }
    function new_indication()
    {
        $data['historial_id'] = $this
            ->input
            ->post('historial_id');
        $data['area'] = $this
            ->input
            ->post('area');
        $data['user_id'] = $this
            ->input
            ->post('user_id');
        $singularid = $this
            ->model_admin
            ->print_recetas($this
            ->input
            ->post('historial_id') , 'printing');
        $data['singularid'] = $singularid;
        $data['count'] = count($singularid);
        $data['pag_rec'] = 33;
        $this
            ->load
            ->view('admin/historial-medical1/recetas/NewIndicationOne', $data);
    }
    function allEstudios()
    {
        $historial_id = $this
            ->input
            ->post('historial_id');
        $data['historial_id'] = $historial_id;
        $data['centro_medico'] = $this
            ->input
            ->post('centro_medico');
        $emergency_id = $this
            ->input
            ->post('emergency_id');
        $IndicacionesPreviasEstudios = $this
            ->model_admin
            ->patEstudios($historial_id, $emergency_id);
        $data['IndicacionesPreviasEstudios'] = $IndicacionesPreviasEstudios;
        $data['num_count_es'] = count($IndicacionesPreviasEstudios);
        $data['area'] = $this
            ->input
            ->post('area');
        $data['user_id'] = $this
            ->input
            ->post('user_id');
        $data['perfil'] = $this
            ->db
            ->select('perfil')
            ->where('id_user', $this
            ->input
            ->post('user_id'))
            ->get('users')
            ->row('perfil');
        $this
            ->load
            ->view('admin/historial-medical1/estudios/NewIndicationEs', $data);
    }
    function listarGroupLabHist()
    {
        $data['centro_medico'] = $this
            ->input
            ->post('centro_medico');
        $user_id = $this
            ->input
            ->post('user_id');
        $perfil = $this
            ->db
            ->select('perfil')
            ->where('id_user', $user_id)->get('users')
            ->row('perfil');
        if ($perfil == 'Medico')
        {
            $and = "&& id_doc=$user_id";
        }
        else
        {
            $and = '';
        }
        $sql = "SELECT * FROM h_c_groupo_lab  WHERE rmvd=0 $and GROUP BY groupo ORDER BY groupo ASC";
        $data['query'] = $this
            ->db
            ->query($sql);
        $data['id_historial'] = $this
            ->input
            ->post('historial_id');
        $data['operator'] = $this
            ->input
            ->post('operator');
        $data['user_id'] = $user_id;
        $data['hist'] = $this
            ->input
            ->post('hist');
        $data['emergency_id'] = $this
            ->input
            ->post('emergency_id');
        $data['areaid'] = $this
            ->db
            ->select('area')
            ->where('id_user', $this
            ->input
            ->post('user_id'))
            ->get('users')
            ->row('area');
        $this
            ->load
            ->view('admin/historial-medical1/laboratorios/labGroupoHist', $data);
    }
    function groupDetailedLabHist()
    {
        $data['centro_medico'] = $this
            ->input
            ->post('centro_medico');
        $groupo = $this
            ->input
            ->post('groupo');
        $user_id = $this
            ->input
            ->post('user_id');
        $perfil = $this
            ->db
            ->select('perfil')
            ->where('id_user', $user_id)->get('users')
            ->row('perfil');
        if ($perfil != 'Admin')
        {
            $and = "&& id_doc=$user_id";
        }
        else
        {
            $and = '';
        }
        $sql = "SELECT id, lab_id, lab_name  FROM h_c_groupo_lab  WHERE groupo='$groupo' && rmvd=0 $and ORDER BY groupo ASC";
        $data['query'] = $this
            ->db
            ->query($sql);
        $data['groupo'] = "$groupo";
        $data['id_historial'] = $this
            ->input
            ->post('historial_id');
        $data['operator'] = $this
            ->input
            ->post('operator');
        $data['user_id'] = $user_id;
        $data['hist'] = $this
            ->input
            ->post('hist');
        $data['emergency_id'] = $this
            ->input
            ->post('emergency_id');
        $data['areaid'] = $this
            ->db
            ->select('area')
            ->where('id_user', $this
            ->input
            ->post('user_id'))
            ->get('users')
            ->row('area');
        $this
            ->load
            ->view('admin/historial-medical1/laboratorios/groupoLabDatos', $data);
    }
    function SaveFormIndicacionesLabGroupo()
    {
        $labCheckded = $this
            ->input
            ->post('lab');
        $operatorl = $this
            ->input
            ->post('operatorl');
        $historial_id = $this
            ->input
            ->post('historial_id_l');
        $where = array(
            'historial_id' => $historial_id,
            'user_id' => $this
                ->input
                ->post('user_id') ,
            'emergency' => 0
        );
        $update = array(
            'singular_id' => 0,
            'printing2' => 0
        );
        $this
            ->db
            ->where($where);
        $this
            ->db
            ->update("h_c_indications_labs", $update);
        foreach ($labCheckded as $key => $id)
        {
            $save = array(
                'laboratory' => $id,
                'operator' => $this
                    ->input
                    ->post('operatorl') ,
                'historial_id' => $historial_id,
                'centro' => $this
                    ->input
                    ->post('centro_medico') ,
                'insert_time' => date("Y-m-d H:i:s") ,
                'updated_by' => $this
                    ->input
                    ->post('operatorl') ,
                'updated_time' => date("Y-m-d H:i:s") ,
                'printing' => 1,
                'user_id' => $this
                    ->input
                    ->post('user_id') ,
                'emergency' => $this
                    ->input
                    ->post('emergency_id')
            );
            $this
                ->model_admin
                ->SaveFormIndicacionesLab($save);
        }
    }
    function check_lab()
    {
        $where = array(
            'historial_id' => $this
                ->input
                ->post('id_pat') ,
            'emergency' => 0
        );
        $update = array(
            'printing' => 0,
            'printing2' => 0
        );
        $this
            ->db
            ->where($where);
        $this
            ->db
            ->update("h_c_indications_labs", $update);
        $labid = $this
            ->input
            ->post('labid');
        $checked = array(
            'singular_id' => $this
                ->input
                ->post('print')
        );
        $this
            ->model_admin
            ->check_lab($checked, $labid);
    }
    function DeleteHistLab()
    {
        $id_lab = $this
            ->input
            ->post('id');
        $historial_id = $this
            ->input
            ->post('historial_id_l');
        $query = $this
            ->model_admin
            ->DeleteHistLab($id_lab);
    }
    function showPatientMedicaPedia()
    {
        $data['hist_id'] = $this
            ->input
            ->get('id_pat');
        $data['medica'] = $this
            ->input
            ->get('medica');
        $data['part'] = $this
            ->input
            ->get('part');
        $data['user_id'] = $this
            ->input
            ->get('user_id');
        $data['medicamentos'] = $this
            ->model_admin
            ->search_medic($this
            ->input
            ->get('medica'));
        $this
            ->load
            ->view('admin/historial-medical1/search_medica_ped', $data);
    }
    function showPatientMedica()
    {
        $data['hist_id'] = $this
            ->input
            ->get('id_pat');
        $data['medica'] = $this
            ->input
            ->get('medica');
        $data['part'] = $this
            ->input
            ->get('part');
        $data['user_id'] = $this
            ->input
            ->get('user_id');
        $data['medicaTime'] = $this
            ->input
            ->get('medicaTime');
        $data['medicamentos'] = $this
            ->model_admin
            ->search_medic($this
            ->input
            ->get('medica'));
        $this
            ->load
            ->view('admin/historial-medical1/search_medica', $data);
    }
    function loadPatientMedicine()
    {
        $hist_id = $this
            ->input
            ->post('hist_id');
        $data['part'] = "gnl";
        $data['hist_id'] = $hist_id;
        $data['user_id'] = $this
            ->input
            ->post('user_id');
        $sql = "select * from h_c_patient_medicine where id_patient =$hist_id and part='gnl'";
        $query = $this
            ->db
            ->query($sql);
        $data['medicamentos'] = $query->result();
        $this
            ->load
            ->view('admin/historial-medical1/show-patient-medica', $data);
    }
    function loadPatientMedicinePed()
    {
        $hist_id = $this
            ->input
            ->post('hist_id');
        $data['hist_id'] = $hist_id;
        $data['user_id'] = $this
            ->input
            ->post('user_id');
        $data['part'] = "pedia";
        $sql = "select * from h_c_patient_medicine where id_patient =$hist_id and part='pedia'";
        $query = $this
            ->db
            ->query($sql);
        $data['medicamentos'] = $query->result();
        $this
            ->load
            ->view('admin/historial-medical1/show-patient-medica-med', $data);
    }
    public function pediaForm()
    {
        $id_historial = $this
            ->input
            ->post('historial_id');
        $data['id_historial'] = $id_historial;
        $data['user_id'] = $this
            ->input
            ->post('user_id');
        $date_nacer = $this
            ->db
            ->select('date_nacer')
            ->where('id_p_a', $id_historial)->get('patients_appointments')
            ->row('date_nacer');
        $data['date_nacer'] = date("Y-m-d", strtotime($date_nacer));
        $sql = "SELECT * FROM h_c_ant_pedia where hist_id=$id_historial";
        $query = $this
            ->db
            ->query($sql);
        if ($query->num_rows() > 0)
        {
            $data['query'] = $query;
            $this
                ->load
                ->view('admin/historial-medical1/pediatrico/data_pedia', $data);
        }
        else
        {
            $this
                ->load
                ->view('admin/historial-medical1/pediatrico/empty_pedia', $data);
        }
        $this
            ->load
            ->view('admin/historial-medical1/pediatrico/footer');
    }
    function saveCirujanoVascular()
    {
        $insert_date = date("Y-m-d H:i:s");
        $hab_t_drug = $this
            ->input
            ->post('hab_t_drug');
        $todo_check = $this
            ->input
            ->post('todo_check');
        $todo_check1 = (isset($todo_check)) ? 1 : 0;
        $car_nin_check = $this
            ->input
            ->post('car_nin_check');
        $car_nin_check1 = (isset($car_nin_check)) ? 1 : 0;
        $madre_check = $this
            ->input
            ->post('madre_check');
        $madre_check1 = (isset($madre_check)) ? 1 : 0;
        $padre_check = $this
            ->input
            ->post('padre_check');
        $padre_check1 = (isset($padre_check)) ? 1 : 0;
        $car_h_check = $this
            ->input
            ->post('car_h_check');
        $car_h_check1 = (isset($car_h_check)) ? 1 : 0;
        $car_pe_check = $this
            ->input
            ->post('car_pe_check');
        $car_pe_check1 = (isset($car_pe_check)) ? 1 : 0;
        $nin_check2 = $this
            ->input
            ->post('nin_check2');
        $nin_check22 = (isset($nin_check2)) ? 1 : 0;
        $madre_check2 = $this
            ->input
            ->post('madre_check2');
        $madre_check22 = (isset($madre_check2)) ? 1 : 0;
        $padre_check2 = $this
            ->input
            ->post('padre_check2');
        $padre_check22 = (isset($padre_check2)) ? 1 : 0;
        $h_check2 = $this
            ->input
            ->post('h_check2');
        $h_check22 = (isset($h_check2)) ? 1 : 0;
        $pe_check2 = $this
            ->input
            ->post('pe_check2');
        $pe_check22 = (isset($pe_check2)) ? 1 : 0;
        $nin_check3 = $this
            ->input
            ->post('nin_check3');
        $nin_check33 = (isset($nin_check3)) ? 1 : 0;
        $madre_check3 = $this
            ->input
            ->post('madre_check3');
        $madre_check33 = (isset($madre_check3)) ? 1 : 0;
        $padre_check3 = $this
            ->input
            ->post('padre_check3');
        $padre_check33 = (isset($padre_check3)) ? 1 : 0;
        $h_check3 = $this
            ->input
            ->post('h_check3');
        $h_check33 = (isset($h_check3)) ? 1 : 0;
        $pe_check3 = $this
            ->input
            ->post('pe_check3');
        $pe_check33 = (isset($pe_check3)) ? 1 : 0;
        $nin_check4 = $this
            ->input
            ->post('nin_check4');
        $nin_check44 = (isset($nin_check4)) ? 1 : 0;
        $madre_check4 = $this
            ->input
            ->post('madre_check4');
        $madre_check44 = (isset($madre_check4)) ? 1 : 0;
        $padre_check4 = $this
            ->input
            ->post('padre_check4');
        $padre_check44 = (isset($padre_check4)) ? 1 : 0;
        $h_check4 = $this
            ->input
            ->post('h_check4');
        $h_check44 = (isset($h_check4)) ? 1 : 0;
        $pe_check4 = $this
            ->input
            ->post('pe_check4');
        $pe_check44 = (isset($pe_check4)) ? 1 : 0;
        $nin_check5 = $this
            ->input
            ->post('nin_check5');
        $nin_check55 = (isset($nin_check5)) ? 1 : 0;
        $madre_check5 = $this
            ->input
            ->post('madre_check5');
        $madre_check55 = (isset($madre_check5)) ? 1 : 0;
        $padre_check5 = $this
            ->input
            ->post('padre_check5');
        $padre_check55 = (isset($padre_check5)) ? 1 : 0;
        $h_check5 = $this
            ->input
            ->post('h_check5');
        $h_check55 = (isset($h_check5)) ? 1 : 0;
        $pe_check5 = $this
            ->input
            ->post('pe_check5');
        $pe_check55 = (isset($pe_check5)) ? 1 : 0;
        $nin_check05 = $this
            ->input
            ->post('nin_check05');
        $nin_check055 = (isset($nin_check05)) ? 1 : 0;
        $madre_check05 = $this
            ->input
            ->post('madre_check05');
        $madre_check055 = (isset($madre_check05)) ? 1 : 0;
        $padre_check05 = $this
            ->input
            ->post('padre_check05');
        $padre_check055 = (isset($padre_check05)) ? 1 : 0;
        $h_check05 = $this
            ->input
            ->post('h_check05');
        $h_check055 = (isset($h_check05)) ? 1 : 0;
        $pe_check05 = $this
            ->input
            ->post('pe_check05');
        $pe_check055 = (isset($pe_check05)) ? 1 : 0;
        $nin_check6 = $this
            ->input
            ->post('nin_check6');
        $nin_check66 = (isset($nin_check6)) ? 1 : 0;
        $madre_check6 = $this
            ->input
            ->post('madre_check6');
        $madre_check66 = (isset($madre_check6)) ? 1 : 0;
        $padre_check6 = $this
            ->input
            ->post('padre_check6');
        $padre_check66 = (isset($padre_check6)) ? 1 : 0;
        $h_check6 = $this
            ->input
            ->post('h_check6');
        $h_check66 = (isset($h_check6)) ? 1 : 0;
        $pe_check6 = $this
            ->input
            ->post('pe_check6');
        $pe_check66 = (isset($pe_check6)) ? 1 : 0;
        $nin_check7 = $this
            ->input
            ->post('nin_check7');
        $nin_check77 = (isset($nin_check7)) ? 1 : 0;
        $madre_check7 = $this
            ->input
            ->post('madre_check7');
        $madre_check77 = (isset($madre_check7)) ? 1 : 0;
        $padre_check7 = $this
            ->input
            ->post('padre_check7');
        $padre_check77 = (isset($padre_check7)) ? 1 : 0;
        $h_check7 = $this
            ->input
            ->post('h_check7');
        $h_check77 = (isset($h_check7)) ? 1 : 0;
        $pe_check7 = $this
            ->input
            ->post('pe_check7');
        $pe_check77 = (isset($pe_check7)) ? 1 : 0;
        $nin_check8 = $this
            ->input
            ->post('nin_check8');
        $nin_check88 = (isset($nin_check8)) ? 1 : 0;
        $madre_check8 = $this
            ->input
            ->post('madre_check8');
        $madre_check88 = (isset($madre_check8)) ? 1 : 0;
        $padre_check8 = $this
            ->input
            ->post('padre_check8');
        $padre_check88 = (isset($padre_check8)) ? 1 : 0;
        $h_check8 = $this
            ->input
            ->post('h_check8');
        $h_check88 = (isset($h_check8)) ? 1 : 0;
        $pe_check8 = $this
            ->input
            ->post('pe_check8');
        $pe_check88 = (isset($pe_check8)) ? 1 : 0;
        $nin_check9 = $this
            ->input
            ->post('nin_check9');
        $nin_check99 = (isset($nin_check9)) ? 1 : 0;
        $madre_check9 = $this
            ->input
            ->post('madre_check9');
        $madre_check99 = (isset($madre_check9)) ? 1 : 0;
        $padre_check9 = $this
            ->input
            ->post('padre_check9');
        $padre_check99 = (isset($padre_check9)) ? 1 : 0;
        $h_check9 = $this
            ->input
            ->post('h_check9');
        $h_check99 = (isset($h_check9)) ? 1 : 0;
        $pe_check9 = $this
            ->input
            ->post('pe_check9');
        $pe_check99 = (isset($pe_check9)) ? 1 : 0;
        $nin_check10 = $this
            ->input
            ->post('nin_check10');
        $nin_check1010 = (isset($nin_check10)) ? 1 : 0;
        $madre_check10 = $this
            ->input
            ->post('madre_check10');
        $madre_check1010 = (isset($madre_check10)) ? 1 : 0;
        $padre_check10 = $this
            ->input
            ->post('padre_check10');
        $padre_check1010 = (isset($padre_check10)) ? 1 : 0;
        $h_check10 = $this
            ->input
            ->post('h_check10');
        $h_check1010 = (isset($h_check10)) ? 1 : 0;
        $pe_check10 = $this
            ->input
            ->post('pe_check10');
        $pe_check1010 = (isset($pe_check10)) ? 1 : 0;
        $nin_check11 = $this
            ->input
            ->post('nin_check11');
        $nin_check1111 = (isset($nin_check11)) ? 1 : 0;
        $madre_check11 = $this
            ->input
            ->post('madre_check11');
        $madre_check1111 = (isset($madre_check11)) ? 1 : 0;
        $padre_check11 = $this
            ->input
            ->post('padre_check11');
        $padre_check1111 = (isset($padre_check11)) ? 1 : 0;
        $h_check11 = $this
            ->input
            ->post('h_check11');
        $h_check1111 = (isset($h_check11)) ? 1 : 0;
        $pe_check11 = $this
            ->input
            ->post('pe_check11');
        $pe_check1111 = (isset($pe_check11)) ? 1 : 0;
        $neop_check12 = $this
            ->input
            ->post('neop_check12');
        $neop_check1212 = (isset($neop_check12)) ? 1 : 0;
        $madre_check12 = $this
            ->input
            ->post('madre_check12');
        $madre_check1212 = (isset($madre_check12)) ? 1 : 0;
        $padre_check12 = $this
            ->input
            ->post('padre_check12');
        $padre_check1212 = (isset($padre_check12)) ? 1 : 0;
        $h_check12 = $this
            ->input
            ->post('h_check12');
        $h_check1212 = (isset($h_check12)) ? 1 : 0;
        $pe_check12 = $this
            ->input
            ->post('pe_check12');
        $pe_check1212 = (isset($pe_check12)) ? 1 : 0;
        $psi_check13 = $this
            ->input
            ->post('psi_check13');
        $psi_check1313 = (isset($psi_check13)) ? 1 : 0;
        $madre_check13 = $this
            ->input
            ->post('madre_check13');
        $madre_check1313 = (isset($madre_check13)) ? 1 : 0;
        $padre_check13 = $this
            ->input
            ->post('padre_check13');
        $padre_check1313 = (isset($padre_check13)) ? 1 : 0;
        $h_check13 = $this
            ->input
            ->post('h_check13');
        $h_check1313 = (isset($h_check13)) ? 1 : 0;
        $pe_check13 = $this
            ->input
            ->post('pe_check13');
        $pe_check1313 = (isset($pe_check13)) ? 1 : 0;
        $obs_check14 = $this
            ->input
            ->post('obs_check14');
        $obs_check1414 = (isset($obs_check14)) ? 1 : 0;
        $madre_check14 = $this
            ->input
            ->post('madre_check14');
        $madre_check1414 = (isset($madre_check14)) ? 1 : 0;
        $padre_check14 = $this
            ->input
            ->post('padre_check14');
        $padre_check1414 = (isset($padre_check14)) ? 1 : 0;
        $h_check14 = $this
            ->input
            ->post('h_check14');
        $h_check1414 = (isset($h_check14)) ? 1 : 0;
        $pe_check14 = $this
            ->input
            ->post('pe_check14');
        $pe_check1414 = (isset($pe_check14)) ? 1 : 0;
        $ulp_check15 = $this
            ->input
            ->post('ulp_check15');
        $ulp_check1515 = (isset($ulp_check15)) ? 1 : 0;
        $madre_check15 = $this
            ->input
            ->post('madre_check15');
        $madre_check1515 = (isset($madre_check15)) ? 1 : 0;
        $padre_check15 = $this
            ->input
            ->post('padre_check15');
        $padre_check1515 = (isset($padre_check15)) ? 1 : 0;
        $h_check15 = $this
            ->input
            ->post('h_check15');
        $h_check1515 = (isset($h_check15)) ? 1 : 0;
        $pe_check15 = $this
            ->input
            ->post('pe_check15');
        $pe_check1515 = (isset($pe_check15)) ? 1 : 0;
        $art_check16 = $this
            ->input
            ->post('art_check16');
        $art_check1616 = (isset($art_check16)) ? 1 : 0;
        $madre_check16 = $this
            ->input
            ->post('madre_check16');
        $madre_check1616 = (isset($madre_check16)) ? 1 : 0;
        $padre_check16 = $this
            ->input
            ->post('padre_check16');
        $padre_check1616 = (isset($padre_check16)) ? 1 : 0;
        $h_check16 = $this
            ->input
            ->post('h_check16');
        $h_check1616 = (isset($h_check16)) ? 1 : 0;
        $pe_check16 = $this
            ->input
            ->post('pe_check16');
        $pe_check1616 = (isset($pe_check16)) ? 1 : 0;
        $art_check016 = $this
            ->input
            ->post('art_check016');
        $art_check01616 = (isset($art_check016)) ? 1 : 0;
        $madre_check016 = $this
            ->input
            ->post('madre_check016');
        $madre_check01616 = (isset($madre_check016)) ? 1 : 0;
        $padre_check016 = $this
            ->input
            ->post('padre_check016');
        $padre_check01616 = (isset($padre_check016)) ? 1 : 0;
        $h_check016 = $this
            ->input
            ->post('h_check016');
        $h_check01616 = (isset($h_check016)) ? 1 : 0;
        $pe_check016 = $this
            ->input
            ->post('pe_check016');
        $pe_check01616 = (isset($pe_check016)) ? 1 : 0;
        $zika_check17 = $this
            ->input
            ->post('zika_check17');
        $zika_check1717 = (isset($zika_check17)) ? 1 : 0;
        $madre_check17 = $this
            ->input
            ->post('madre_check17');
        $madre_check1717 = (isset($madre_check17)) ? 1 : 0;
        $padre_check17 = $this
            ->input
            ->post('padre_check17');
        $padre_check1717 = (isset($padre_check17)) ? 1 : 0;
        $h_check17 = $this
            ->input
            ->post('h_check17');
        $h_check1717 = (isset($h_check17)) ? 1 : 0;
        $pe_check17 = $this
            ->input
            ->post('pe_check17');
        $pe_check1717 = (isset($pe_check17)) ? 1 : 0;
        $save = array(
            'todo' => $todo_check1,
            'car_nin' => $car_nin_check1,
            'car_m' => $madre_check1,
            'car_p' => $padre_check1,
            'car_h' => $car_h_check1,
            'car_pe' => $car_pe_check1,
            'car_text' => $this
                ->input
                ->post('car_text') ,
            'hip_nin' => $nin_check22,
            'hip_m' => $madre_check22,
            'hip_p' => $padre_check22,
            'hip_h' => $h_check22,
            'hip_pe' => $pe_check22,
            'hip_text' => $this
                ->input
                ->post('hip_text') ,
            'ec_nin' => $nin_check33,
            'ec_m' => $madre_check33,
            'ec_p' => $padre_check33,
            'ec_h' => $h_check33,
            'ec_pe' => $pe_check33,
            'ec_text' => $this
                ->input
                ->post('ec_text') ,
            'ep_nin' => $nin_check44,
            'ep_m' => $madre_check44,
            'ep_p' => $padre_check44,
            'ep_h' => $h_check44,
            'ep_pe' => $pe_check44,
            'ep_text' => $this
                ->input
                ->post('ep_text') ,
            'as_nin' => $nin_check55,
            'as_m' => $madre_check55,
            'as_p' => $padre_check55,
            'as_h' => $h_check55,
            'as_pe' => $pe_check55,
            'as_text' => $this
                ->input
                ->post('as_text') ,
            'enre_nin' => $nin_check055,
            'enre_m' => $madre_check055,
            'enre_p' => $padre_check055,
            'enre_h' => $h_check055,
            'enre_pe' => $pe_check055,
            'enre_text' => $this
                ->input
                ->post('enre_text') ,
            'tub_nin' => $nin_check66,
            'tub_m' => $madre_check66,
            'tub_p' => $padre_check66,
            'tub_h' => $h_check66,
            'tub_pe' => $pe_check66,
            'tub_text' => $this
                ->input
                ->post('tub_text') ,
            'dia_nin' => $nin_check77,
            'dia_m' => $madre_check77,
            'dia_p' => $padre_check77,
            'dia_h' => $h_check77,
            'dia_pe' => $pe_check77,
            'dia_text' => $this
                ->input
                ->post('dia_text') ,
            'tir_nin' => $nin_check88,
            'tir_m' => $madre_check88,
            'tir_p' => $padre_check88,
            'tir_h' => $h_check88,
            'tir_pe' => $pe_check88,
            'tir_text' => $this
                ->input
                ->post('tir_text') ,
            'hep_tipo' => $this
                ->input
                ->post('hep_tipo') ,
            'hep_nin' => $nin_check99,
            'hep_m' => $madre_check99,
            'hep_p' => $padre_check99,
            'hep_h' => $h_check99,
            'hep_pe' => $pe_check99,
            'hep_text' => $this
                ->input
                ->post('hep_text') ,
            'enfr_nin' => $nin_check1010,
            'enfr_m' => $madre_check1010,
            'enfr_p' => $padre_check1010,
            'enfr_h' => $h_check1010,
            'enfr_pe' => $pe_check1010,
            'enfr_text' => $this
                ->input
                ->post('enfr_text') ,
            'falc_nin' => $nin_check1111,
            'falc_m' => $madre_check1111,
            'falc_p' => $padre_check1111,
            'falc_h' => $h_check1111,
            'falc_pe' => $pe_check1111,
            'falc_text' => $this
                ->input
                ->post('falc_text') ,
            'neop_nin' => $neop_check1212,
            'neop_m' => $madre_check1212,
            'neop_p' => $padre_check1212,
            'neop_h' => $h_check1212,
            'neop_pe' => $pe_check1212,
            'neop_text' => $this
                ->input
                ->post('neop_text') ,
            'psi_nin' => $psi_check1313,
            'psi_m' => $madre_check1313,
            'psi_p' => $padre_check1313,
            'psi_h' => $h_check1313,
            'psi_pe' => $pe_check1313,
            'psi_text' => $this
                ->input
                ->post('psi_text') ,
            'obs_nin' => $obs_check1414,
            'obs_m' => $madre_check1414,
            'obs_p' => $padre_check1414,
            'obs_h' => $h_check1414,
            'obs_pe' => $pe_check1414,
            'obs_text' => $this
                ->input
                ->post('obs_text') ,
            'ulp_nin' => $ulp_check1515,
            'ulp_m' => $madre_check1515,
            'ulp_p' => $padre_check1515,
            'ulp_h' => $h_check1515,
            'ulp_pe' => $pe_check1515,
            'ulp_text' => $this
                ->input
                ->post('ulp_text') ,
            'art_nin' => $art_check1616,
            'art_m' => $madre_check1616,
            'art_p' => $padre_check1616,
            'art_h' => $h_check1616,
            'art_pe' => $pe_check1616,
            'art_text' => $this
                ->input
                ->post('art_text') ,
            'hem_nin' => $art_check01616,
            'hem_m' => $madre_check01616,
            'hem_p' => $padre_check01616,
            'hem_h' => $h_check01616,
            'hem_pe' => $pe_check01616,
            'hem_text' => $this
                ->input
                ->post('hem_text') ,
            'zika_nin' => $zika_check1717,
            'zika_m' => $madre_check1717,
            'zika_p' => $padre_check1717,
            'zika_h' => $h_check1717,
            'zika_pe' => $pe_check1717,
            'zika_text' => $this
                ->input
                ->post('zika_text') ,
            'otros' => $this
                ->input
                ->post('otros') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'date_modif' => $insert_date,
            'operator' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id') ,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $idMarPos = $this
            ->model_admin
            ->marquePositivo($save);
        $counMarP = $this
            ->model_admin
            ->countAnte1($this
            ->input
            ->post('hist_id'));
        if ($counMarP > 1)
        {
            $this
                ->model_admin
                ->DeleteDuplicateMarqueP($idMarPos);
        }
        $newMpat = $this
            ->input
            ->post('newMpat');
        if ($newMpat)
        {
            foreach ($newMpat as $key => $med)
            {
                $savecd = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'part' => 'gnl',
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($savecd);
            }
        }
        $save2 = array(
            'maltratof' => $this
                ->input
                ->post('textmaltrato_g') ,
            'abusos' => $this
                ->input
                ->post('textabuso_g') ,
            'negligencia' => $this
                ->input
                ->post('textneg_g') ,
            'maltrato' => $this
                ->input
                ->post('maltratoemo_g') ,
            'alimentos' => $this
                ->input
                ->post('alimentos_al') ,
            'medicamentos' => $this
                ->input
                ->post('medicamentos_al') ,
            'otros' => $this
                ->input
                ->post('otros_al') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'date_insert' => $insert_date,
            'update_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'update_by' => $this
                ->input
                ->post('user_id')
        );
        $idDes = $this
            ->model_admin
            ->DesantAl($save2);
        $counDesa = $this
            ->model_admin
            ->countDesarollo($this
            ->input
            ->post('hist_id'));
        if ($counDesa > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyDesarollo($idDes);
        }
        $save3 = array(
            'quirurgicos' => $this
                ->input
                ->post('quirurgicos') ,
            'gineco' => $this
                ->input
                ->post('gineco') ,
            'abdominal' => $this
                ->input
                ->post('abdominal') ,
            'toracica' => $this
                ->input
                ->post('toracica') ,
            'transfusion' => $this
                ->input
                ->post('transfusion') ,
            'otros1' => $this
                ->input
                ->post('otros1_g') ,
            'hepatis' => $this
                ->input
                ->post('hepatis') ,
            'hpv' => $this
                ->input
                ->post('hpv') ,
            'toxoide' => $this
                ->input
                ->post('toxoide') ,
            'grouposang' => $this
                ->input
                ->post('grouposang') ,
            'tipificacion' => $this
                ->input
                ->post('tipificacion') ,
            'rh' => $this
                ->input
                ->post('rhoa') ,
            'violencia1' => $this
                ->input
                ->post('violencia1') ,
            'violencia2' => $this
                ->input
                ->post('violencia2') ,
            'violencia3' => $this
                ->input
                ->post('violencia3') ,
            'violencia4' => $this
                ->input
                ->post('violencia4') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_time' => $insert_date,
            'inserted_by' => $this
                ->input
                ->post('user_id')
        );
        $idAtO = $this
            ->model_admin
            ->saveAnteOtros($save3);
        $counAntOt = $this
            ->model_admin
            ->countAntOtros($this
            ->input
            ->post('hist_id'));
        if ($counAntOt > 1)
        {
            $this
                ->model_admin
                ->DeleteAntOtros($idAtO);
        }
        if (!empty($medicine))
        {
            foreach ($medicine as $med)
            {
                $save = array(
                    'medicine' => $med,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id') ,
                    'user_id' => $this
                        ->input
                        ->post('user_id')
                );
                $this
                    ->model_admin
                    ->SaveMedicine($save);
            };
        };
        $this
            ->model_admin
            ->deleteMedNinguno();
        $save4 = array(
            'cafe_cant' => $this
                ->input
                ->post('hab_c_caf') ,
            'cafe_frec' => $this
                ->input
                ->post('hab_f_caf') ,
            'pipa_cant' => $this
                ->input
                ->post('hab_c_pip') ,
            'pipa_frec' => $this
                ->input
                ->post('hab_f_pip') ,
            'ciga_can' => $this
                ->input
                ->post('hab_c_ciga') ,
            'ciga_frec' => $this
                ->input
                ->post('hab_f_ciga') ,
            'alc_can' => $this
                ->input
                ->post('hab_c_al') ,
            'alc_frec' => $this
                ->input
                ->post('hab_f_al') ,
            'tab_can' => $this
                ->input
                ->post('hab_c_tab') ,
            'tab_frec' => $this
                ->input
                ->post('hab_f_tab') ,
            'hab_c_drug' => $this
                ->input
                ->post('hab_c_drug') ,
            'hab_f_drug' => $this
                ->input
                ->post('hab_f_drug') ,
            'hookah' => $this
                ->input
                ->post('hookah') ,
            'hab_f_hookah' => $this
                ->input
                ->post('hab_f_hookah') ,
            'historial_id' => $this
                ->input
                ->post('hist_id') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => $insert_date,
            'update_time' => $insert_date
        );
        $idHabT = $this
            ->model_admin
            ->saveHabitosToxicos($save4);
        $counHabT = $this
            ->model_admin
            ->countHabitosToxicos($this
            ->input
            ->post('hist_id'));
        if ($counHabT > 1)
        {
            $this
                ->model_admin
                ->DeleteEmptyHabitosToxicos($idHabT);
        }
        if (!empty($hab_t_drug))
        {
            foreach ($hab_t_drug as $drug)
            {
                $save = array(
                    'name' => $drug,
                    'id_patient' => $this
                        ->input
                        ->post('hist_id')
                );
                $this
                    ->model_admin
                    ->SaveDrug($save);
            };
        }
        $id = $this
            ->input
            ->post('id_cirujano_vas');
        $cir_vas_dol = $this
            ->input
            ->post('cir_vas_dol');
        $cir_vas_dol1 = (isset($cir_vas_dol)) ? 1 : 0;
        $cir_vas_edema = $this
            ->input
            ->post('cir_vas_edema');
        $cir_vas_edema1 = (isset($cir_vas_edema)) ? 1 : 0;
        $cir_vas_pesadez = $this
            ->input
            ->post('cir_vas_pesadez');
        $cir_vas_pesadez1 = (isset($cir_vas_pesadez)) ? 1 : 0;
        $cir_vas_cansancio = $this
            ->input
            ->post('cir_vas_cansancio');
        $cir_vas_cansancio1 = (isset($cir_vas_cansancio)) ? 1 : 0;
        $cir_vas_quemazo = $this
            ->input
            ->post('cir_vas_quemazo');
        $cir_vas_quemazo1 = (isset($cir_vas_quemazo)) ? 1 : 0;
        $cir_vas_calambred = $this
            ->input
            ->post('cir_vas_calambred');
        $cir_vas_calambred1 = (isset($cir_vas_calambred)) ? 1 : 0;
        $cir_vas_purito = $this
            ->input
            ->post('cir_vas_purito');
        $cir_vas_purito1 = (isset($cir_vas_purito)) ? 1 : 0;
        $cir_vas_hiper = $this
            ->input
            ->post('cir_vas_hiper');
        $cir_vas_hiper1 = (isset($cir_vas_hiper)) ? 1 : 0;
        $cir_vas_ulceras = $this
            ->input
            ->post('cir_vas_ulceras');
        $cir_vas_ulceras1 = (isset($cir_vas_ulceras)) ? 1 : 0;
        $cir_vas_pares = $this
            ->input
            ->post('cir_vas_pares');
        $cir_vas_pares1 = (isset($cir_vas_pares)) ? 1 : 0;
        $cir_vas_claud = $this
            ->input
            ->post('cir_vas_claud');
        $cir_vas_claud1 = (isset($cir_vas_claud)) ? 1 : 0;
        $cir_vas_necrosis = $this
            ->input
            ->post('cir_vas_necrosis');
        $cir_vas_necrosis1 = (isset($cir_vas_necrosis)) ? 1 : 0;
        $cir_vas_necrosis = $this
            ->input
            ->post('cir_vas_necrosis');
        $cir_vas_necrosis1 = (isset($cir_vas_necrosis)) ? 1 : 0;
        $cir_vas_historial = $this
            ->input
            ->post('cir_vas_historial');
        $upload_dir = './assets/img/cirujano-vascular/';
        if ($id == "")
        {
            $saveEnf = array(
                'enf_motivo ' => 'no',
                'signopsis ' => 'no',
                'laboratorios ' => 'no',
                'estudios ' => 'no',
                'historial_id ' => $this
                    ->input
                    ->post('hist_id') ,
                'filter_date' => date("Y-m-d") ,
                'centro_medico' => $this
                    ->input
                    ->post('centro_medico') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => $insert_date,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => $insert_date,
                'user_id' => $this
                    ->input
                    ->post('user_id') ,
            );
            $this
                ->db
                ->insert("h_c_sinopsis", $saveEnf);
            $file1 = $upload_dir . "diagrama-" . time() . ".png";
            $data1 = $_POST['diagrama_cirugia_vascular'];
            $data1 = substr($data1, strpos($data1, ",") + 1);
            $data1 = base64_decode($data1);
            file_put_contents($file1, $data1);
            $saveCirVas = array(
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
                'updated_time' => $insert_date,
                'cir_vas_otros' => $this
                    ->input
                    ->post('cir_vas_otros') ,
                'cir_vas_cirugias' => $this
                    ->input
                    ->post('cir_vas_cirugias') ,
                'cir_vas_alergias' => $this
                    ->input
                    ->post('cir_vas_alergias') ,
                'cir_vas_enf_sis' => $this
                    ->input
                    ->post('cir_vas_enf_sis') ,
                'cir_vas_habitos' => $this
                    ->input
                    ->post('cir_vas_habitos') ,
                'cir_vas_exam_fis_dir' => $this
                    ->input
                    ->post('cir_vas_exam_fis_dir') ,
                'cir_vas_historial' => $this
                    ->input
                    ->post('cir_vas_historial') ,
                'id_historial ' => $this
                    ->input
                    ->post('hist_id') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => $insert_date,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => $insert_date,
                'user_id' => $this
                    ->input
                    ->post('user_id') ,
                'centro_medico' => $this
                    ->input
                    ->post('centro_medico') ,
                'diagrama_cirugia_vascular' => "diagrama-" . time() . ".png"
            );
            $this
                ->db
                ->insert("h_c_cirujano_vascular", $saveCirVas);
        }
        else
        {
            $diagrama = $this
                ->db
                ->select('diagrama_cirugia_vascular')
                ->where('id', $id)->get('h_c_cirujano_vascular')
                ->row('diagrama_cirugia_vascular');
            unlink("./assets/img/cirujano-vascular/" . $diagrama);
            $file1 = $upload_dir . "diagrama-" . time() . ".png";
            $data1 = $_POST['diagrama_cirugia_vascular'];
            $data1 = substr($data1, strpos($data1, ",") + 1);
            $data1 = base64_decode($data1);
            file_put_contents($file1, $data1);
            $upCirVas = array(
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
                'updated_time' => $insert_date,
                'cir_vas_otros' => $this
                    ->input
                    ->post('cir_vas_otros') ,
                'cir_vas_cirugias' => $this
                    ->input
                    ->post('cir_vas_cirugias') ,
                'cir_vas_alergias' => $this
                    ->input
                    ->post('cir_vas_alergias') ,
                'cir_vas_enf_sis' => $this
                    ->input
                    ->post('cir_vas_enf_sis') ,
                'cir_vas_habitos' => $this
                    ->input
                    ->post('cir_vas_habitos') ,
                'cir_vas_exam_fis_dir' => $this
                    ->input
                    ->post('cir_vas_exam_fis_dir') ,
                'cir_vas_historial' => $this
                    ->input
                    ->post('cir_vas_historial') ,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => $insert_date,
                'diagrama_cirugia_vascular' => "diagrama-" . time() . ".png"
            );
            $where = array(
                'id' => $id
            );
            $this
                ->db
                ->where($where);
            $this
                ->db
                ->update("h_c_cirujano_vascular", $upCirVas);
        }
    }
    function show_cirujano_vascular()
    {
        $id = $this
            ->uri
            ->segment(3);
        $id_user = $this
            ->uri
            ->segment(4);
        $data['centro_name'] = $this
            ->db
            ->select('name')
            ->where('id_m_c', $this
            ->uri
            ->segment(5))
            ->get('medical_centers')
            ->row('name');
        $data['user'] = $id_user;
        $data['perfil'] = $this
            ->db
            ->select('perfil')
            ->where('id_user', $id_user)->get('users')
            ->row('perfil');
        $sql = "SELECT * from h_c_cirujano_vascular where id=$id";
        $data['cirujano_vascular'] = $this
            ->db
            ->query($sql);
        $this
            ->load
            ->view('admin/historial-medical1/cirujano-vascular-endovascular/data', $data);
        $this
            ->load
            ->view('admin/historial-medical1/cirujano-vascular-endovascular/footer');
    }
    public function saveOrdMedSala()
    {
        $save2 = array(
            'name' => $this
                ->input
                ->post('sala') ,
            'id_user' => $this
                ->input
                ->post('user_id') ,
            'id_historial' => $this
                ->input
                ->post('historial_id') ,
            'centro' => $this
                ->input
                ->post('centro') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
            'inserted_time' => date("Y-m-d H:i:s")
        );
        $this
            ->db
            ->insert("orden_medica_sala", $save2);
        $insert_id = $this
            ->db
            ->select('idsala')
            ->where("id_user", $this
            ->input
            ->post('user_id'))
            ->where("id_historial", $this
            ->input
            ->post('historial_id'))
            ->order_by('idsala', 'desc')
            ->limit(1)
            ->get('orden_medica_sala')
            ->row('idsala');
        echo json_encode($insert_id);
    }
    public function editSala()
    {
        $update = array(
            'name' => $this
                ->input
                ->post('sala') ,
            'centro' => $this
                ->input
                ->post('centro') ,
            'fecha_ingreso' => date("Y-m-d", strtotime($this
                ->input
                ->post('fecha_ingreso'))) ,
            'diagno_ing' => $this
                ->input
                ->post('diagno_ing')
        );
        $where = array(
            'idsala' => $this
                ->input
                ->post('id')
        );
        $this
            ->db
            ->where($where);
        $this
            ->db
            ->update("orden_medica_sala", $update);
    }
    public function saveOrdenMedicaRecetas()
    {
        if ($this
            ->input
            ->post('printing') == 2)
        {
            $cant_alm = $this
                ->db
                ->select('cantidad_comp')
                ->where('centro', $this
                ->input
                ->post('centro'))
                ->where('id', $this
                ->input
                ->post('medicamento_ord_med'))
                ->get('emergency_medicaments')
                ->row('cantidad_comp');
            $cant_restante = floatval($cant_alm) - floatval($this
                ->input
                ->post('cantidad'));
            $update = array(
                'cantidad_comp' => $cant_restante
            );
            $where = array(
                'centro' => $this
                    ->input
                    ->post('centro') ,
                'id' => $this
                    ->input
                    ->post('medicamento_ord_med')
            );
            $this
                ->db
                ->where($where);
            $this
                ->db
                ->update("emergency_medicaments", $update);
        }
        $save = array(
            'medica' => $this
                ->input
                ->post('medicamento_ord_med') ,
            'presentacion' => $this
                ->input
                ->post('presentacion_ord_med') ,
            'frecuencia' => $this
                ->input
                ->post('frecuencia_ord_med') ,
            'via' => $this
                ->input
                ->post('via_ord_med') ,
            'oyo' => $this
                ->input
                ->post('oyo_ord_med') ,
            'operator' => $this
                ->input
                ->post('operator') ,
            'insert_date' => date("Y-m-d H:i:s") ,
            'historial_id' => $this
                ->input
                ->post('historial_id') ,
            'updated_by' => $this
                ->input
                ->post('operator') ,
            'updated_time' => date("Y-m-d H:i:s") ,
            'nota' => $this
                ->input
                ->post('nota_ord_med') ,
            'printing' => $this
                ->input
                ->post('printing') ,
            'id_sala' => $this
                ->input
                ->post('sala') ,
            'centro' => $this
                ->input
                ->post('centro') ,
            'cantidad' => $this
                ->input
                ->post('cantidad') ,
            'cobertura' => $this
                ->input
                ->post('cobert') ,
            'idem' => $this
                ->input
                ->post('id_em') ,
            'cantidad' => $this
                ->input
                ->post('cantidad') ,
            'descuento' => $this
                ->input
                ->post('descuento')
        );
        $this
            ->db
            ->insert("orden_medica_recetas", $save);
        $query = $this
            ->db
            ->get_where('presentacion', array(
            'name' => $this
                ->input
                ->post('presentacion_ord_med')
        ));
        if ($query->num_rows() == 0)
        {
            $savep = array(
                'name' => $this
                    ->input
                    ->post('presentacion_ord_med')
            );
            $this
                ->model_admin
                ->save_new_presentacion($savep);
        }
    }
    public function allRecetasOrdMed()
    {
        $historial_id = $this
            ->input
            ->post('historial_id');
        $printing = $this
            ->input
            ->post('printing');
        $data['printing'] = $printing;
        $data['historial_id'] = $historial_id;
        $user_id = $this
            ->input
            ->post('user_id');
        $data['area'] = $this
            ->input
            ->post('area');
        $data['user_id'] = $user_id;
        $data['perfil'] = $this
            ->db
            ->select('perfil')
            ->where('id_user', $user_id)->get('users')
            ->row('perfil');
        $sql = "SELECT * FROM orden_medica_recetas WHERE  historial_id=$historial_id && operator=$user_id && printing=$printing order by id_i_m desc";
        $data['IndicacionesPrevias'] = $this
            ->db
            ->query($sql);
        $this
            ->load
            ->view('admin/historial-medical1/orden-medica/recetas/all-patients-recetas', $data);
    }
    public function pagination_data_orden_medica()
    {
        $page = $this
            ->input
            ->get('page');
        $user_id = $this
            ->input
            ->get('user_id');
        $id_patient = $this
            ->input
            ->get('id_patient');
        $perfil = $this
            ->input
            ->get('perfil');
        $direction = $this
            ->input
            ->get('direction');
        $data['direction'] = $direction;
        $data['centro_id'] = $this
            ->input
            ->get('centro_id');
        $data['perfil'] = $perfil;
        $data['id_patient'] = $id_patient;
        $data['user_id'] = $user_id;
        $data['id_em'] = $this
            ->input
            ->get('id_em');
        $data['page'] = $page;
        $per_page = 1;
        $start = ($page - 1) * $per_page;
        $sql = "select * from orden_medica_sala where idsala =$page";
        $data['paginate_oreden_medica'] = $this
            ->db
            ->query($sql);
        $this
            ->load
            ->view('admin/historial-medical1/orden-medica/paginate', $data);
    }
    public function paginationNumberOrdenMedica()
    {
        $where = array(
            'name' => "",
            'direction' => 0,
            'id_user' => $this
                ->input
                ->post('user_id')
        );
        $this
            ->db
            ->where($where);
        $this
            ->db
            ->delete('orden_medica_sala');
        $data['user_id'] = $this
            ->input
            ->post('user_id');
        $data['direction'] = $this
            ->input
            ->post('direction');
        $data['id_historial'] = $this
            ->input
            ->post('id_historial');
        $data['id_emergency'] = $this
            ->input
            ->post('id_emergency');
        $data['centro_id'] = $this
            ->input
            ->post('centro_id');
        $data['perfil'] = $this
            ->db
            ->select('perfil')
            ->where('id_user', $this
            ->input
            ->post('user_id'))
            ->get('users')
            ->row('perfil');
        $this
            ->load
            ->view('admin/historial-medical1/orden-medica/pagination-number', $data);
    }
    public function on_input_cied()
    {
        $value1 = $this
            ->input
            ->get('value');
        $data['value1'] = $value1;
        $data['id_pat'] = $this
            ->input
            ->get('id_pat');
        $data['tab'] = $this
            ->input
            ->get('tab');
        $data['user_id'] = $this
            ->input
            ->get('user_id');
        $data['id_cdia'] = $this
            ->input
            ->get('id_cdia');
        $data['centro_medico'] = $this
            ->input
            ->get('centro_medico');
        $data['origine'] = $this
            ->input
            ->get('origine');
        $data['val1'] = $this
            ->model_admin
            ->Diag_pres($value1);
        $this
            ->load
            ->view('admin/historial-medical1/conclusion/cied', $data);
    }
    public function show_con_by_id()
    {
        $id_con = $this
            ->uri
            ->segment(3);
        $historial_id = $this
            ->uri
            ->segment(4);
        $id_user = $this
            ->uri
            ->segment(5);
        $data['perfil'] = $this
            ->db
            ->select('perfil')
            ->where('id_user', $id_user)->get('users')
            ->row('perfil');
        $data['centro_medico'] = $this
            ->uri
            ->segment(6);
        $origine = $this
            ->uri
            ->segment(7);
        $data['origine'] = $origine;
        $data['user_id'] = $id_user;
        $data['centro_name'] = $this
            ->db
            ->select('name')
            ->where('id_m_c', $this
            ->uri
            ->segment(6))
            ->get('medical_centers')
            ->row('name');
        $data['historial_id'] = $historial_id;
        $data['id_con'] = $id_con;
        $data['show_con_by_id'] = $this
            ->model_admin
            ->show_con_by_id($id_con, $origine);
        $patient_cie10 = $this
            ->model_admin
            ->show_diagno_def($id_con, $origine);
        $data['count_patient_c'] = count($patient_cie10);
        $this
            ->load
            ->view('admin/historial-medical1/conclusion/data', $data);
        $this
            ->load
            ->view('admin/historial-medical1/conclusion/footer', $data);
    }
    public function saveOtrosDiag()
    {
        $query1 = $this
            ->db
            ->get_where('h_c_conclusion_diagno', array(
            'historial_id' => $this
                ->input
                ->post('id_pat') ,
            'current_day' => date('Y-m-d') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
        ));
        if ($query1->num_rows() == 0)
        {
            $saveConDia = array(
                'otros_diagnos' => $this
                    ->input
                    ->post('otros_diagnos') ,
                'id_user' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'historial_id' => $this
                    ->input
                    ->post('id_pat') ,
                'centro_medico' => $this
                    ->input
                    ->post('centro_medico') ,
                'plan' => $this
                    ->input
                    ->post('plan') ,
                'procedimiento' => $this
                    ->input
                    ->post('proced') ,
                'evolucion' => $this
                    ->input
                    ->post('evolucion') ,
                'conclusion_radio' => $this
                    ->input
                    ->post('conclusion_radio') ,
                'current_day' => date('Y-m-d') ,
                'inserted_time' => date("Y-m-d H:i:s") ,
                'updated_time' => date("Y-m-d H:i:s") ,
                'origine' => 0
            );
            $idCond = $this
                ->model_admin
                ->saveConclucionDiag($saveConDia);
            $id_cdia = $idCond;
        }
        else
        {
            $upConDia = array(
                'otros_diagnos' => $this
                    ->input
                    ->post('otros_diagnos') ,
                'plan' => $this
                    ->input
                    ->post('plan') ,
                'procedimiento' => $this
                    ->input
                    ->post('proced') ,
                'evolucion' => $this
                    ->input
                    ->post('evolucion') ,
                'conclusion_radio' => $this
                    ->input
                    ->post('conclusion_radio')
            );
            $this
                ->model_admin
                ->saveUpConclucionDiag($query1->row()->id_cdia, $upConDia);
            $id_cdia = $query1->row()->id_cdia;
        }
        $this
            ->session
            ->set_userdata('update_con_diag', $id_cdia);
        $query2 = $this
            ->db
            ->get_where('h_c_sinopsis', array(
            'historial_id' => $this
                ->input
                ->post('id_pat') ,
            'filter_date' => date('Y-m-d') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
        ));
        if ($query2->num_rows() == 0)
        {
            $saveEnf = array(
                'historial_id' => $this
                    ->input
                    ->post('id_pat') ,
                'centro_medico' => $this
                    ->input
                    ->post('centro_medico') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => date("Y-m-d H:i:s") ,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => date("Y-m-d H:i:s") ,
                'user_id' => $this
                    ->input
                    ->post('user_id') ,
                'filter_date' => date("Y-m-d") ,
                'id_con' => $id_cdia
            );
            $this
                ->model_admin
                ->saveEnfermedad($saveEnf);
        }
        $id_enf = $this
            ->db
            ->select('id_enf')
            ->where('inserted_by', $this
            ->input
            ->post('user_id'))
            ->where('historial_id', $this
            ->input
            ->post('id_pat'))
            ->where('filter_date', date('Y-m-d'))
            ->order_by('id_enf', 'desc')
            ->limit(1)
            ->get('h_c_sinopsis')
            ->row('id_enf');
        $this
            ->session
            ->set_userdata('update_enf_act', $id_enf);
    }
    public function coun_selected_cie10()
    {
        $id_pat = $this
            ->input
            ->get('id_pat');
        $user_id = $this
            ->input
            ->get('user_id');
        $date = date('Y-m-d');
        $sql_con = "SELECT diagno_def FROM h_c_diagno_def_link where p_id=$id_pat AND user_id=$user_id AND DATE(insert_date)='$date' ";
        $atendido_con = $this
            ->db
            ->query($sql_con);
        if ($atendido_con->num_rows() > 0)
        {
            echo "<strong>$atendido_con->num_rows seleccionado(s)</strong><br/>";
            foreach ($atendido_con->result() as $row)
            {
                $cie10 = $this
                    ->db
                    ->select('description')
                    ->where('idd', $row->diagno_def)
                    ->get('cied')
                    ->row('description');
                echo "$cie10<hr/>";
            }
        }
    }
    public function savePatientCied()
    {
        $query1 = $this
            ->db
            ->get_where('h_c_conclusion_diagno', array(
            'historial_id' => $this
                ->input
                ->post('id_pat') ,
            'current_day' => date('Y-m-d') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
        ));
        if ($query1->num_rows() == 0)
        {
            $saveConDia = array(
                'id_user' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'historial_id' => $this
                    ->input
                    ->post('id_pat') ,
                'centro_medico' => $this
                    ->input
                    ->post('centro_medico') ,
                'current_day' => date('Y-m-d') ,
                'inserted_time' => date("Y-m-d H:i:s") ,
                'updated_time' => date("Y-m-d H:i:s") ,
                'origine' => 0
            );
            $this
                ->model_admin
                ->saveConclucionDiag($saveConDia);
        }
        $id_cdia = $this
            ->db
            ->select('id_cdia')
            ->where('inserted_by', $this
            ->input
            ->post('user_id'))
            ->where('historial_id', $this
            ->input
            ->post('id_pat'))
            ->where('current_day', date('Y-m-d'))
            ->order_by('id_cdia', 'desc')
            ->limit(1)
            ->get('h_c_conclusion_diagno')
            ->row('id_cdia');
        $this
            ->session
            ->set_userdata('update_con_diag', $id_cdia);
        $query2 = $this
            ->db
            ->get_where('h_c_sinopsis', array(
            'historial_id' => $this
                ->input
                ->post('id_pat') ,
            'filter_date' => date('Y-m-d') ,
            'inserted_by' => $this
                ->input
                ->post('user_id') ,
        ));
        if ($query2->num_rows() == 0)
        {
            $saveEnf = array(
                'historial_id' => $this
                    ->input
                    ->post('id_pat') ,
                'centro_medico' => $this
                    ->input
                    ->post('centro_medico') ,
                'inserted_by' => $this
                    ->input
                    ->post('user_id') ,
                'inserted_time' => date("Y-m-d H:i:s") ,
                'updated_by' => $this
                    ->input
                    ->post('user_id') ,
                'updated_time' => date("Y-m-d H:i:s") ,
                'user_id' => $this
                    ->input
                    ->post('user_id') ,
                'filter_date' => date("Y-m-d") ,
                'id_con' => $id_cdia
            );
            $this
                ->model_admin
                ->saveEnfermedad($saveEnf);
        }
        $id_enf = $this
            ->db
            ->select('id_enf')
            ->where('inserted_by', $this
            ->input
            ->post('user_id'))
            ->where('historial_id', $this
            ->input
            ->post('id_pat'))
            ->where('filter_date', date('Y-m-d'))
            ->order_by('id_enf', 'desc')
            ->limit(1)
            ->get('h_c_sinopsis')
            ->row('id_enf');
        $this
            ->session
            ->set_userdata('update_enf_act', $id_enf);
        if ($this
            ->input
            ->post('deleteCied') == 1)
        {
            $savecd = array(
                'diagno_def' => $this
                    ->input
                    ->post('cie10') ,
                'p_id' => $this
                    ->input
                    ->post('id_pat') ,
                'con_id_link' => $id_cdia,
                'user_id' => $this
                    ->input
                    ->post('user_id') ,
                'centro_medico' => $this
                    ->input
                    ->post('centro_medico') ,
                'insert_date' => date("Y-m-d H:i:s") ,
                'origine' => 0
            );
            $this
                ->model_admin
                ->SaveConDef($savecd);
        }
        else
        {
            $wheres = array(
                'diagno_def' => $this
                    ->input
                    ->post('cie10') ,
                'p_id' => $this
                    ->input
                    ->post('id_pat') ,
                'con_id_link' => $id_cdia,
                'user_id' => $this
                    ->input
                    ->post('user_id') ,
                'centro_medico' => $this
                    ->input
                    ->post('centro_medico') ,
                'origine' => 0,
            );
            $this
                ->db
                ->where($wheres);
            $this
                ->db
                ->delete('h_c_diagno_def_link');
        }
    }
}

