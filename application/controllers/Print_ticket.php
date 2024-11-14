<?php defined('BASEPATH') or exit('No direct script access allowed');
class Print_ticket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('print_page_model');
        $this->load->library('get_table_data_by_id');
        $this->load->library("search_patient_photo");
        $this->USER_CONTROLLER = $this->session->userdata('USER_CONTROLLER');
        $this->ID_USER = $this->session->userdata('user_id');
        $this->NAME_USER = $this->session->userdata('user_name');
        $this->clinical_history = $this->load->database('clinical_history', TRUE);
        if ($this->session->userdata('is_logged_in') == '') {
            $this->session->set_flashdata('msg', 'Please Login to Continue');
            redirect('login');
        }
    }







    public function patient_invoice()
    {
        $idfacc = $this->input->get('idfacc');
        $print = $this->input->get('print');
        $this->data['print'] = $print;
        $this->data['idfacc'] = $idfacc;
        $this->data['break_after'] = "";
        $this->data['push_down'] = "absolute-element-footer2";

        $mpdf = new \Mpdf\Mpdf(
            [
                'tempDir' => __DIR__ . '/custom/temp/dir/path',
                'mode' => 'utf-8',
                'format' => [240, 70],
                'orientation' => 'L',
                'margin_left' => 4,
                'margin_right' => 4,
                'margin_top' => 5,
                'margin_bottom' => 5,
				'debug' => true
            ]
        );
//$mpdf = new \Mpdf\Mpdf(['debug' => true]);
        $pm = $this
            ->db
            ->select('paciente,medico,centro_medico')
            ->where('idfacc', $idfacc)->get('factura2')
            ->row_array();
        $this->data['last_bill_id'] = $idfacc;
        $this->data['id_doc'] = $pm['medico'];

        $this->data['billing1'] = $this
            ->model_admin
            ->showBilling1($idfacc);
        $billing2 = $this
            ->model_admin
            ->showBilling2($idfacc);
        $this->data['billing2'] = $billing2;
        $this->data['count'] = count($billing2);


        [$get_doctor_info_by_id, $doctor_area] = $this->get_table_data_by_id->getDoctorInfo($pm['medico']);
        $this->data['get_doctor_info_by_id'] = $get_doctor_info_by_id;
        $this->data['doctor_area'] = $doctor_area;

        [$get_centro_info_by_id, $centro_adress] = $this->get_table_data_by_id->getCentroInfo($pm['centro_medico']);
        $this->data['get_centro_info_by_id'] = $get_centro_info_by_id;
        $this->data['centro_adress'] = $centro_adress;

        $factura_modalidad_pago = $this->db->select('*')->where('id_factura', $idfacc)->get('factura_modalidad_pago')->row_array();
        $tasa_cambio_amt = $this->db->select('tasa_dolar, tasa_euro')->where('updated_by', $this->ID_USER)->get('tasa_de_cambio')->row_array();
        $data['pendienteCaja'] = $factura_modalidad_pago['pendienteCaja'];
        $data['tarjeta'] = $factura_modalidad_pago['tarjeta'];
        $data['transferencia'] = $factura_modalidad_pago['transferencia'];
        $data['effectivo'] = $factura_modalidad_pago['effectivo'];
        $data['cheque'] = $factura_modalidad_pago['cheque'];
        $data['disabled_modalidad_de_pago'] = 'disabled';
        $data['checqueNumero'] = $factura_modalidad_pago['checqueNumero'];
        $data['modalidadDePagoId'] = $factura_modalidad_pago['id'];
        $data['btn_fecha_com'] = "";
        $data['tipo_monena'] = $factura_modalidad_pago['money_device'];
        if ($factura_modalidad_pago['money_device'] == "USD$") {
            $data['tasa_cambio'] = $tasa_cambio_amt['tasa_dolar'];
        } elseif ($factura_modalidad_pago['money_device'] == "€") {
            $data['tasa_cambio'] = $tasa_cambio_amt['tasa_euro'];
        } else {
            $data['tasa_cambio'] = 0;
        }

        $this->data['display_report'] = $this->model_admin->showBilling1($idfacc);

        $html = $this->load->view('print-page/ticket/patient-invoice', $this->data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }


    public function patient_invoice_private()
    {
        $idfacc = $this->input->get('idfacc');
        $print = $this->input->get('print');
        $this->data['print'] = $print;
        $mpdf = new \Mpdf\Mpdf(
            [
                'tempDir' => __DIR__ . '/custom/temp/dir/path',

                'mode' => 'utf-8',
                'format' => [240, 70],
                'orientation' => 'L',
                'margin_left' => 4,
                'margin_right' => 4,
                'margin_top' => 10,
                'margin_bottom' => 10,
            ]
        );


        $pm = $this
            ->db
            ->select('paciente,medico,centro_medico')
            ->where('idfacc', $idfacc)->get('factura2')
            ->row_array();
        $this->data['last_bill_id'] = $idfacc;
        $this->data['id_doc'] = $pm['medico'];

        $this->data['billing1'] = $this
            ->model_admin
            ->showBilling1($idfacc);
        $billing2 = $this
            ->model_admin
            ->showBilling2($idfacc);
        $this->data['billing2'] = $billing2;
        $this->data['count'] = count($billing2);


        [$get_doctor_info_by_id, $doctor_area] = $this->get_table_data_by_id->getDoctorInfo($pm['medico']);
        $this->data['get_doctor_info_by_id'] = $get_doctor_info_by_id;
        $this->data['doctor_area'] = $doctor_area;

        $this->data['money_device'] = $this->db->select('money_device')->where('id_factura', $idfacc)->get('factura_modalidad_pago')->row('money_device');
        $html = $this
            ->load
            ->view('print-page/ticket/patient-invoice-private', $this->data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

   
}
