<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SaveHistorialGinecology extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_medical_history');
        $this->load->library('form_validation');
        $this->ID_USER = $this->session->userdata('sessionIdUuser');
        $this->ID_CENTRO = $this->session->userdata('id_centro');
        $this->ID_PATIENT = $this->session->userdata('id_patient');
    }


    public  function saveGinecology_()
    {
        $this->saveGinecology();
    }

    public  function saveGinecology()
    {

        $fecha = $this->input->post('fecha');
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
                'id_patient' => 917,
                'historial_id' => 3

            );
            if (
                $fecha1  != '' || $semana1  != '' ||
                $peso1  != '' || $tension_art_max1  != '' ||
                $tension_art_min1  != '' || $alt_ult1  != '' ||
                $pubis_f1  != '' || $pelv_tr1  != '' ||
                $lat_min1  != '' || $mov_fet1  != '' ||
                $edema1  != '' || $varices1  != '' ||
                $otro1  != '' || $evolution1  != ''
            ) {

                $this->db->insert("h_c_control_prenatal", $data);
            }
        }

        // $query = $this->db->get_where('h_c_control_prenatal', array('historial_id' => 3, 'fecha' => ""));
        // if ($query->num_rows() > 0) {
        //     $this->db->query("DELETE FROM h_c_control_prenatal WHERE historial_id=3");
        // }
    }
}
