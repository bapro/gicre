<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Appointment_notification_job extends CI_Model{
    function __construct() {
       // $this->userTbl = 'users';
	 }

    public function getUpcomingAppointments() {
       /* $currentDateTime = date('Y-m-d H:i:s');
        $oneHourLater = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($currentDateTime)));
        $this->db->where('CONCAT(filter_date, " ", hora_de_cita, " ", am_pm) >', $currentDateTime);
        $this->db->where('CONCAT(filter_date, " ", hora_de_cita, " ", am_pm) <=', $oneHourLater);
        $this->db->where('alerted', 0);
        $this->db->where('canceled', 0);*/
		
		 $currentDateTime = date('Y-m-d');
         $oneHourLater = date('Y-m-d', strtotime('+24 hour', strtotime($currentDateTime)));
        $this->db->where('filter_date >', $currentDateTime);
         $this->db->where('filter_date <=', $oneHourLater);
        $this->db->where('alerted',0);
         $this->db->where('canceled',0);
		

        return $this->db->get('rendez_vous')->result();

    }

    public function markAsAlerted($appointmentId) {
        $this->db->set('alerted', 1);
        $this->db->where('id_apoint', $appointmentId);
        $this->db->update('rendez_vous');
    }

    public function logNotification($appointmentId, $body) {
        $data = array(
            'appointment_id' => $appointmentId,
            'message' => $body,
            'sent_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('upcoming_appointments_notification_history', $data);
    }
	
	}