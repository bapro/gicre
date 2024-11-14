<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AppointmentNotificationJob extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('appointment_notification_job');
		$this->load->model('model_general');
        $this->load->library("whatsapp_api");
    }

    public function index()
    {
        $totalSent = 0;
        $upcomingAppointments = $this->appointment_notification_job->getUpcomingAppointments();
     //   print_r($upcomingAppointments); exit;
        foreach ($upcomingAppointments as $appointment) {
            $this->sendAppointmentAlert($appointment);
            // mark it, once it triggered. so that we can avoid duplicate.
            $this->appointment_notification_job->markAsAlerted($appointment->id_apoint);
            $totalSent++;
        }
        echo "{$totalSent} jobs completed at ".date('d-m-Y H m A').".";
    }

    private function sendAppointmentAlert($appointment) {
        $data = $this->getPatientAppointmentData($appointment);
        if($data && $data['body'] && $data['patientPhoneNumber'] && $data['medicalCenterLogo']) {
            $this->sendWhatsappNotificationToPatient(1, $data);
        } 
        $this->appointment_notification_job->logNotification($appointment->id_apoint,json_encode($data));
    }

    private function getPatientAppointmentData($appointment)
    {
        $patient = $this->getPatient($appointment->id_patient);
        $patient_num = $patient->tel_cel;
		$patient_nec = $appointment->id_patient;
        $patient_number = preg_replace("/[^0-9]/", "", $patient_num);
		$patient_age = $this->model_general->calculatePatientAge($patient->date_nacer);
		$seguro_medico_info = $this->getSeguroMedico($patient->seguro_medico);
		$seguro_name = $seguro_medico_info->title;
        $patient_edad =$patient_age['age_complete'];
        if (strlen($patient_number) != 10) return;
        $doctorInfo = $this->getDoctor($appointment->doctor);
        $medicalCenterInfo = $this->getMedicalCenter($appointment->centro);
        $areaInfo = $this->getArea($appointment->area);

        $doc_whatsapp_phone = $doctorInfo->whatsapp_link;
        $reply_number = preg_replace("/[^0-9]/", "", $doc_whatsapp_phone);

        $patient_name = trim(strtoupper($patient->nombre));
        $doctor = strtoupper($doctorInfo->name);
        $area = strtoupper($areaInfo);
        $centro = strtoupper($medicalCenterInfo->name);
        $causa = $appointment->causa;
        $fecha_propuesta = strtoupper(date("d-m-Y", strtotime($appointment->fecha_propuesta)));
        $hora_de_cita = $appointment->hora_de_cita ?: "";
        $am_pm = $appointment->am_pm;
        $cell_phone = $doctorInfo->cell_phone ? "*CONTACTO:* " . $doctorInfo->cell_phone : "";
        $link = "https://wa.me/+1$reply_number";
       $body="";
        $body .= "*PACIENTE:* $patient_name\n";
		$body .= "*NEC:* $patient_nec\n";
		$body .= "*EDAD:* $patient_edad\n";
		$body .= "*SEGURO:* $seguro_name\n";
        /*$body .= "*MÉDICO:* $doctor\n";
        $body .= "*ESPECIALIDAD:* $area\n";
        $body .= "*CENTRO MÉDICO:* $centro\n";
        $body .= "*MOTIVO DE CONSULTA:* $causa\n";
        $body .= "*FECHA PROPUESTA:* $fecha_propuesta\n";
        $body .= "*HORA:* $hora_de_cita $am_pm\n";
        $body .= "$cell_phone\n";*/
		
		$body .= "\n";
		$body .="*SU SALUD ES IMPORTANTE PARA NOSOTROS* Y LES RECORDAMOS QUE USTED TIENE UNA CITA PARA EL DIA: $fecha_propuesta A LAS $hora_de_cita $am_pm CON EL DOCTOR: *$doctor*, MEDICO: $area, EN EL CENTRO MEDICO: *$centro*.";
		$body .= "\n";
		$body .= "\n";
		$body .= "$cell_phone";
		$body .= "\n";
		$body .= "\n";
        $body .= "*NOTA:* De no asistir a la cita favor comunicar: $link\n";

        return ['body' => $body, 'patientPhoneNumber' => $patient_number, 'medicalCenterLogo' => $medicalCenterInfo->logo];

    }

    private function getPatient($patientId)
    {
        return $this->db->select('nombre, tel_cel, date_nacer, seguro_medico')->where('id_p_a', $patientId)->get('patients_appointments')->row();
    }

    private function getDoctor($id)
    {
        return $this->db->select('name, cell_phone, whatsapp_link')->where('id_user', $id)->get('users')->row();
    }

    private function getMedicalCenter($id)
    {
        return $this->db->select('name, logo')->where('id_m_c', $id)->get('medical_centers')->row();

    }


 private function getSeguroMedico($id)
    {
        return $this->db->select('title')->where('id_sm', $id)->get('seguro_medico')->row();

    }


    private function getArea($id)
    {
        return $this->db->select('title_area')->where('id_ar', $id)->get('areas')->row('title_area');
    }

    private function sendWhatsappNotificationToPatient($client_id, $data)
    {
        $params = array(
            'client_id' => $client_id,
           // 'to' => "+18298108469", 
			'to' => $data['patientPhoneNumber'], 
            'centro_logo' => "https://gicrerd.com/assets/img/centros_medicos/{$data['medicalCenterLogo']}",
            'body' => $data['body'],
        );

        $this->whatsapp_api->sendWhatsappNotificationToPatient($params); // Update the return value of this method to determine if the notification triggered successfully.
        return true;
    }
}



