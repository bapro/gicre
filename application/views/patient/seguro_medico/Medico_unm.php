<?php class Medico_unm extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_medico');
        $this->load->model('model_admin');
        $this->load->model("padron_model");
        $this->load->model("login_model");
        $this->load->model('navigation/account_demand_model');
        $this->load->library("pagination");
        $this->load->model('excel_import_model');
        $this->load->model('model_emergencia');
        $this->load->library('excel');
        $this->load->library('form_validation');
        if ($this->session->userdata('medico_is_logged_in') == '') {
            $this->session->set_flashdata('msg', 'Please Login to Continue');
            redirect('login');
        }
    }
    Public function chatBox() {
        $data['iduser'] = $this->session->userdata['medico_id'];
        $perfil = $this->session->userdata['medico_perfil'];
        $name = $this->session->userdata['medico_name'];
        $userInfo = "$name $perfil";
        $data['userInfo'] = $userInfo;
        $data['onlyadmin'] = "none";
        $this->load->view('chat/chatBox', $data);
    }
    public function laboratory() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $medico_id = $this->session->userdata['medico_id'];
        $data['medico_id'] = $medico_id;
        $this->load->view('medico/header', $data);
        $sqllbb = "SELECT * FROM h_c_groupo_lab WHERE id_doc=$medico_id && rmvd=0 GROUP BY groupo ORDER BY id DESC";
        $querylbb = $this->db->query($sqllbb);
        $data['totallab'] = $querylbb->num_rows();
        $this->load->view('admin/medicos/lab', $data);
    }
    public function chatWithBoxId() {
        $idChatWith = $this->input->post('idChatWith');
        $this->session->set_userdata('idChatWith', $this->input->post('idChatWith'));
        redirect('medico/chatWithBox');
    }
    public function redirectFromCorro($sender_id, $receive_id) {
        $this->session->set_userdata('medico_id', $sender_id);
        $this->session->set_userdata('idChatWith', $receive_id);
        redirect('medico/chatWithBox');
    }
    public function orden_medica() {
        $user_id = decrypt_url($this->uri->segment(3));
        $id_historial = decrypt_url($this->uri->segment(4));
        if ($user_id == "" || $id_historial == "") {
            redirect('/page404');
        }
        $data['user_id'] = $user_id;
        $data['id_historial'] = $id_historial;
        $data['title'] = "ORDEN MEDICA";
        $this->padron_database = $this->load->database('padron', TRUE);
        $paciente = $this->db->select('photo,ced1,ced2,ced3')->where('id_p_a', $this->uri->segment(4))->get('patients_appointments')->row_array();
        if ($paciente['photo'] == "padron") {
            $photo = $this->padron_database->select('IMAGEN')->where('MUN_CED', $paciente['ced1'])->where('SEQ_CED', $paciente['ced2'])->where('VER_CED', $paciente['ced3'])->get('fotos')->row('IMAGEN');
            $imgpat = '<img  style="width:70px;"  src="data:image/jpeg;base64,' . base64_encode($photo) . '"  />';
        } else if ($paciente['photo'] == "") {
            $imgpat = '<img  style="width:70px;" src="' . base_url() . '/assets/img/user.png"  />';
        } else {
            $imgpat = '<img  style="width:70px;" src="' . base_url() . '/assets/img/patients-pictures/' . $paciente['photo'] . '"  />';
        }
        $data['display'] = "<td style='width:40px'>$imgpat</td>";
        $this->load->view('admin/historial-medical1/orden-medica/index', $data);
    }
    public function newMessageReceived() {
        $data['iduser'] = $this->session->userdata['medico_id'];
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $message = $this->db->select('id')->where('message_to', $this->session->userdata['medico_id'])->where('seen', 0)->get('chat_medico');
        $data['result'] = $message->num_rows();
        $this->load->view('chat/medico/new-message-medico', $data);
    }
    public function chatWithBox() {
        $id_user = $this->session->userdata['medico_id'];
        $idChatWith = $this->session->userdata['idChatWith'];
        $data['output'] = '';
        $query = '';
        $data['id_user'] = $id_user;
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data['dataUsers'] = $this->model_admin->search_fetch_medico_chat($query, $id_user);
        $query = $this->db->get_where('chat_medico', array('message_to' => $id_user));
        $data['numMes'] = $query->num_rows();
        $where2 = array('message_from' => $idChatWith, 'message_to' => $id_user);
        $updateData2 = array('seen' => 1);
        $this->db->where($where2);
        $this->db->update("chat_medico", $updateData2);
        $data['messageFromiD'] = $id_user;
        $data['messageToName'] = $this->db->select('name')->where('id_user', $idChatWith)->get('users')->row('name');
        $data['messageFromName'] = $this->db->select('name')->where('id_user', $id_user)->get('users')->row('name');
        $sql = "SELECT id, message,stime,message_from,message_to,seen  FROM  chat_medico
 WHERE
message_from=$id_user AND message_to=$idChatWith
OR
message_from=$idChatWith AND message_to=$id_user
 order by id asc";
        $query = $this->db->query($sql);
        $data['query'] = $query;
        $data['messageTo'] = $idChatWith;
        $data['messageFrom'] = $id_user;
        $query1 = $this->db->get_where('chat_is_user_typing', array('id_user' => $id_user, 'id_sender' => $idChatWith));
        if ($query1->num_rows() == 0 && $idChatWith != 0) {
            $save = array('id_user' => $id_user, 'id_sender' => $idChatWith, 'is_typing' => "no");
            $this->db->insert("chat_is_user_typing", $save);
        }
        $where2 = array('message_from' => $idChatWith, 'message_to' => $id_user);
        $updateData2 = array('seen' => 1);
        $this->db->where($where2);
        $this->db->update("chat_medico", $updateData2);
        $data['idChatWith'] = $idChatWith;
        $data['id_user'] = $id_user;
        $data['messageFromiD'] = $id_user;
        $data['messageTo'] = $idChatWith;
        $data['messageFrom'] = $id_user;
        $user = $this->db->select('name,perfil')->where('id_user', $idChatWith)->get('users')->row_array();
        $name = $user['name'];
        $perfil = $user['perfil'];
        $data['messageToName'] = "$name - $perfil";
        $data['messageFromName'] = $this->db->select('name')->where('id_user', $id_user)->get('users')->row('name');
        $sql = "SELECT id, message,stime,message_from,message_to,seen  FROM  chat_medico
 WHERE
message_from=$id_user AND message_to=$idChatWith
OR
message_from=$idChatWith AND message_to=$id_user
 order by id asc";
        $query = $this->db->query($sql);
        $data['query'] = $query;
        $this->load->view('chat/chatHistorialData', $data);
    }
    public function clearHist() {
        $area = $this->db->select('area')->where('id_user', $this->session->userdata['medico_id'])->get('users')->row('area');
        if ($area == 91) {
            $wheredel = array('enf_motivo' => "", 'signopsis' => "", 'inserted_by' => $this->session->userdata['medico_id']);
            $this->db->where($wheredel);
            $this->db->delete('h_c_sinopsis');
        }
        if ($area != 91) {
            $queryHist = $this->db->get_where('h_c_sinopsis', array('enf_motivo' => "", 'signopsis' => "", 'inserted_by' => $this->session->userdata['medico_id']));
            if ($queryHist->num_rows() > 0) {
                $rowId = $queryHist->row();
                $where1 = array('id_con' => $rowId->id_con);
                $this->db->where($where1);
                $this->db->delete('h_c_sinopsis');
                $where2 = array('id_cdia' => $rowId->id_con);
                $this->db->where($where2);
                $this->db->delete('h_c_conclusion_diagno');
                $where3 = array('con_id_link' => $rowId->id_con);
                $this->db->where($where3);
                $this->db->delete('h_c_diagno_def_link');
            }
        }
    }
    public function index() {
        $this->clearHist();
        $area_id = $this->db->select('area')->where('id_user', $this->session->userdata['medico_id'])->get('users')->row('area');
        $data['area_id'] = $area_id;
        $data['controller'] = "medico";
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $where = array('user' => $this->session->userdata['medico_id']);
        $whereImg = array('userid' => $this->session->userdata['medico_id'], 'id_enfermedad' => 0);
        $iduser = $this->session->userdata['medico_id'];
        $wherel = array('operator' => $iduser);
        $updatel = array('singular_id' => 0, 'printing' => 0, 'printing2' => 0);
        $this->db->where($wherel);
        $this->db->update("h_c_indications_labs", $updatel);
        $wherell = array('operator' => $iduser);
        $updatell = array('singular_id' => 0, 'printing' => 0);
        $this->db->where($wherell);
        $this->db->update("h_c_indicaciones_medicales", $updatell);
        $this->db->where($whereImg);
        $this->db->delete('saveEnfImage');
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $data['iduser'] = $iduser;
           $appointments1 = $this->model_medico->getMedicoAp($iduser);
            $querycentro = $this->model_medico->getMedicoCentro($iduser);
            $getPatientsMedico = $this->model_medico->getPatientsMedico($iduser);
            $data['totalrows'] = count($appointments1);
            $wherecc = array('user_id' => $iduser);
            $this->db->where($wherecc);
            $this->db->delete('h_c_diagno_def_link_clown');
            $where1 = array('user_id' => $iduser);
            $this->db->where($where1);
            $this->db->delete('h_c_patient_medicine_clown');
            $where = array('seen_hoy' => 0, 'doctor' => $iduser);
            $update = array('seen_hoy' => 1);
            $this->db->where($where);
            $this->db->update("rendez_vous", $update);
        
        $data['countTotalCitaDocNum'] = '';
        $data['displayTotInfo'] = 'none';
        $config = array();
        $config["base_url"] = base_url() . "medico_unm/index";
        $config["total_rows"] = count($appointments1);
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['first_link'] = 'Primero';
        $config['last_link'] = 'Último';
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $hoy = date("d-m-Y");
            $appointments = $this->model_medico->getMedicoApHoy($iduser, $config["per_page"], $page);
            $sql = "select * FROM rendez_vous WHERE centro=60  && cancelar=0 ORDER BY id_patient LIMIT 15 DESC ";
            $query = $this->db->query($sql);
            $data['patientHoyQ'] = $query->result();
			$appointments = $query->result();
      
        $data['appointments'] = $appointments;
        $data['centro_medico'] = $querycentro;
        $data['countc'] = count($querycentro);
        $qt = $this->db->select('id_patient')->where('doctor', $iduser)->like('update_time', date("Y-m-d"))->get('rendez_vous');
        $data['num_r'] = $qt->num_rows();
        $this->load->view('medico/header', $data);
        $current_date = date('Y-m-d');
    
        if ($area_id == 87) {
            $this->load->view('optica/optometra/index', $data);
        } else {
            $this->load->view('medico/index', $data);
        }
    }
    public function SeachCitaResultAs() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $iduser = $this->session->userdata['medico_id'];
        $data['iduser'] = $iduser;
        $data['perfil'] = 'Asistente Medico';
        $date1 = date("Y-m-d", strtotime($this->input->get('date_from')));
        $date2 = date("Y-m-d", strtotime($this->input->get('date_to')));
        $val = array('date1' => $date1, 'date2' => $date2, 'doctor' => $this->input->get('doctor'));
        $data['date1'] = $this->input->get('date_from');
        $data['date2'] = $this->input->get('date_to');
        $data['doctor'] = $this->input->get('doctor');
        $query = $this->model_medico->get_centro_medico_datepicker_as($val);
        $data['VER_CONFIRMADA_SOLICITUD'] = $query;
        $data['exam'] = 2;
        $this->load->view('medico/header', $data);
        $this->load->view('admin/pacientes-citas/view_get_centro_medico', $data);
    }
    public function SeachCitaResult() {
        $data['controller'] = "medico";
        $where = array('user' => $this->session->userdata['medico_id']);
        $this->db->where($where);
        $this->db->delete('detect_user_on_hist');
        $iduser = $this->session->userdata['medico_id'];
        $data['area_id'] = $this->db->select('area')->where('id_user', $iduser)->get('users')->row('area');
        $data['iduser'] = $iduser;
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $date1 = date("Y-m-d", strtotime($this->input->get('date_from')));
        $date2 = date("Y-m-d", strtotime($this->input->get('date_to')));
        $val = array('date1' => $date1, 'date2' => $date2, 'doctor' => $iduser, 'centro' => $this->input->get('centro'), 'perfil' => $this->session->userdata['medico_perfil']);
        $data['date1'] = $this->input->get('date_from');
        $data['date2'] = $this->input->get('date_to');
        $data['centro'] = $this->input->get('centro');
        if ($this->session->userdata['medico_perfil'] == "Medico") {
            $querycentro = $this->model_medico->getMedicoCentro($iduser);
        } else {
            $querycentro = $this->model_admin->view_as_doctor_centro($iduser);
        }
        $data['centro_medico'] = $querycentro;
        $query = $this->model_medico->get_centro_medico_datepicker($val);
        $data['VER_CONFIRMADA_SOLICITUD'] = $query;
        $data['exam'] = 2;
        $this->load->view('medico/header', $data);
        $this->load->view('admin/pacientes-citas/view_get_centro_medico', $data);
    }
    public function newEntry() {
        $message = $this->db->select('id_apoint')->where('confirmada', 0)->where('cancelar', 0)->where('doctor', $this->session->userdata['medico_id'])->where('fecha_propuesta', date("d-m-Y"))->where('seen_hoy', 0)->get('rendez_vous');
        $data['result'] = $message->num_rows();
        $this->load->view('optica/tecnico-de-lentes/newEntry', $data);
    }
    public function seachRefraccion() {
        $where = array('user' => $this->session->userdata['medico_id']);
        $this->db->where($where);
        $this->db->delete('detect_user_on_hist');
        $iduser = $this->session->userdata['medico_id'];
        $data['area_id'] = $this->db->select('area')->where('id_user', $iduser)->get('users')->row('area');
        $data['iduser'] = $iduser;
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $date1 = date("Y-m-d", strtotime($this->input->get('date_from')));
        $date2 = date("Y-m-d", strtotime($this->input->get('date_to')));
        $val = array('date1' => $date1, 'date2' => $date2, 'doctor' => $iduser, 'centro' => $this->input->get('centro'), 'perfil' => $this->session->userdata['medico_perfil']);
        $data['date1'] = $this->input->get('date_from');
        $data['date2'] = $this->input->get('date_to');
        $data['centro'] = $this->input->get('centro');
        if ($this->session->userdata['medico_perfil'] == "Medico") {
            $querycentro = $this->model_medico->getMedicoCentro($iduser);
        } else {
            $querycentro = $this->model_admin->view_as_doctor_centro($iduser);
        }
        $data['centro_medico'] = $querycentro;
        $query = $this->model_medico->get_centro_medico_datepicker($val);
        $data['appointments'] = $query;
        $data['exam'] = 2;
        $this->load->view('medico/header', $data);
        $this->load->view('optica/optometra/seachRefraccion', $data);
    }
    public function expiredMedicoLogout() {
        $dataLogOut = array('is_log_in' => 0, 'login_time' => "");
        $this->login_model->user_logout($this->session->userdata['medico_id'], $dataLogOut);
        $this->login_model->user_login_twice_remove($this->session->userdata['medico_id']);
        $array_items = array('medico_name', 'medico_password', 'medico_perfil', 'medico_id', 'medico_is_logged_in');
        $this->session->unset_userdata($array_items);
        $this->session->set_userdata('PaymentSession', 'Su plazo ha sido agotado, por favor contacte al administrador : (809) 717-3303');
        redirect('payment/index');
    }
    public function loadMyPatients() {
        $iduser = $this->session->userdata['medico_id'];
        $perfil = $this->session->userdata['medico_perfil'];
        if ($perfil == "Medico") {
            $getPatientsMedico = $this->model_medico->getPatientsMedico($iduser);
            $data['count'] = count($getPatientsMedico);
            $data['getPatientsMedico'] = $getPatientsMedico;
        } else {
            $getPatientsMedico = $this->model_medico->getPatientsAsisMedico($iduser);
            $data['count'] = count($getPatientsMedico);
            $data['getPatientsMedico'] = $getPatientsMedico;
        }
        $this->load->view('medico/pacientes-citas/loadMyPatients', $data);
    }
    public function historial_medical() {
        $this->clearHist();
        $where = array('historial_id' => decrypt_url($this->uri->segment(3)));
        $update = array('singular_id' => 0, 'printing' => 0);
        $this->db->where($where);
        $this->db->update("h_c_indicaciones_medicales", $update);
        $update2 = array('singular_id' => 0, 'printing' => 0, 'printing2' => 0);
        $this->db->update("h_c_indications_labs", $update2);
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $this->load->view('admin/historial-medical1/view-historial-clinica', $data);
    }
    public function new_centro_medico() {
        $data['inserted_by'] = $this->session->userdata['medico_id'];
        $data['controller'] = 'medico';
        $data['countries'] = $this->model_admin->getCountries();
        $data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
        $data['centro_medico'] = $this->account_demand_model->getCentroMedico();
        $data['especialidades'] = $this->model_admin->getEspecialidades();
        $data['provinces'] = $this->model_admin->getProvinces();
        $data['causa'] = $this->model_admin->getCausa();
        $this->load->view('medico/header');
        $this->load->view('admin/centers/create', $data);
    }
    Public function patients() {
        $iduser = $this->session->userdata['medico_id'];
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $data['iduser'] = $iduser;
        $querycentro = $this->model_medico->getMedicoCentro($iduser);
        $data['centro_medico'] = $querycentro;
        $data['countc'] = count($querycentro);
        $data['appointments'] = $this->model_medico->getMedicoAp($iduser);
        redirect('medico/create_cita');
    }
    public function get_centro_medico() {
        $iduser = $this->session->userdata['medico_id'];
        $data['area_id'] = $this->db->select('area')->where('id_user', $iduser)->get('users')->row('area');
        $data['id_usr'] = $iduser;
        $centro_medico = $this->input->post('centro_medico');
        $val = array('centro' => $centro_medico, 'doctor' => $iduser);
        $data['VER_CONFIRMADA_SOLICITUD'] = $this->model_medico->get_centro_medico($val);
        $data['centro_name'] = $this->db->select('name')->where('id_m_c', $centro_medico)->get('medical_centers')->row('name');
        $data['exam'] = 1;
        $this->load->view('admin/pacientes-citas/view_get_centro_medico', $data);
    }
    public function enfermedadshow() {
        $historial_id = $this->input->post('id_historial');
        $data['historial_id'] = $historial_id;
        $data['count_enf'] = $this->model_medico->CountEnfermedad($historial_id);
        $data['enfermedad'] = $this->model_medico->Enfermedad($historial_id);
        $this->load->view('medico/enfermedadshow', $data);
    }
    public function examenf() {
        $historial_id = $this->input->post('id_historial');
        $data['historial_id'] = $historial_id;
        $data['count_exam'] = $this->model_medico->count_examenes($historial_id);
        $data['examen'] = $this->model_medico->Examenes($historial_id);
        $this->load->view('medico/examenf', $data);
    }
    public function signos() {
        $historial_id = $this->input->post('id_historial');
        $data['historial_id'] = $historial_id;
        $data['count_signos'] = $this->model_medico->count_signos($historial_id);
        $data['signos'] = $this->model_medico->Signos($historial_id);
        $this->load->view('medico/signos', $data);
    }
    public function examensis() {
        $historial_id = $this->input->post('id_historial');
        $data['historial_id'] = $historial_id;
        $data['count_examensis'] = $this->model_medico->count_examenes_sis($historial_id);
        $data['examensis'] = $this->model_medico->Examensis($historial_id);
        $this->load->view('medico/examensis', $data);
    }
    public function recetas() {
        $historial_id = $this->input->post('id_historial');
        $data['historial_id'] = $historial_id;
        $data['count_examensis'] = $this->model_medico->count_examenes_sis($historial_id);
        $data['medicamentos'] = $this->model_medico->medicamentos();
        $data['branches'] = $this->model_medico->branches();
        $data['IndicacionesPrevias'] = $this->model_medico->IndicacionesPrevias($historial_id);
        $data['num_count'] = $this->model_medico->hist_count($historial_id);
        $data['via'] = $this->model_medico->via();
        $data['frecuencia'] = $this->model_medico->frecuencia();
        $data['farmacia'] = $this->model_medico->farmacia();
        $this->load->view('medico/recetas', $data);
    }
    public function Estudios() {
        $historial_id = $this->input->post('id_historial');
        $data['historial_id'] = $historial_id;
        $data['estudios'] = $this->model_medico->estudios();
        $data['cuerpo'] = $this->model_medico->cuerpo();
        $data['IndicacionesPreviasEstudios'] = $this->model_medico->IndicacionesPreviasEs();
        $data['num_count_es'] = $this->model_medico->hist_count_es();
        $this->load->view('medico/estudios', $data);
    }
    public function Laboratorios() {
        $historial_id = $this->input->post('id_historial');
        $data['historial_id'] = $historial_id;
        $data['laboratories'] = $this->model_medico->laboratories();
        $data['IndicacionesLab'] = $this->model_medico->IndicacionesLab();
        $data['num_count_lab'] = $this->model_medico->hist_count_lab();
        $this->load->view('medico/laboratorios', $data);
    }
    public function create_new_patient_from_padron($ced1, $ced2, $ced3) {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $id_user = $this->session->userdata['medico_id'];
        $data['name'] = $this->session->userdata['medico_id'];
        $data['id_user'] = $id_user;
        $this->load->view('medico/header', $data);
        $data['is_admin'] = "no";
        $data['ced1'] = $ced1;
        $data['ced2'] = $ced2;
        $data['ced3'] = $ced3;
        $data['doc'] = $this->session->userdata['medico_id'];
        $this->load->view('admin/pacientes-citas/redirect_patient_result', $data);
    }
    public function employee_data() {
        $this->session->set_userdata('id_patient', $this->input->get('id_patient'));
        $this->session->set_userdata('centro', $this->input->get('centro'));
        $this->session->set_userdata('id_user', $this->input->get('id_user'));
        redirect("medico/employee_data_");
    }
    public function employee_data_() {
        $idpatient = $this->session->userdata['id_patient'];
        $id_cm = $this->session->userdata['centro'];
        $doc = $this->session->userdata['id_user'];
        $this->patient_data($idpatient, $id_cm, $doc);
    }
    public function patient() {
        $idpatient = $this->uri->segment(3);
        $id_cm = $this->uri->segment(4);
        $doc = $this->uri->segment(5);
        $this->patient_data($idpatient, $id_cm, $doc);
    }
    public function patient_data($idpatient, $id_cm, $doc) {
        $where = array('user' => $this->session->userdata['medico_id']);
        $this->db->where($where);
        $this->db->delete('detect_user_on_hist');
        $perfil = $this->session->userdata['medico_perfil'];
        $data['perfil'] = $perfil;
        $data['name'] = $this->session->userdata['medico_name'];
        $id_user = $this->session->userdata['medico_id'];
        $data['id_cm'] = $id_cm;
        $data['doc'] = $doc;
        $data['nec'] = $this->model_admin->getNec();
        $data['idpatient'] = $idpatient;
        $data['id_user'] = $id_user;
        $data['area'] = $this->db->select('area')->where('id_user', $id_user)->get('users')->row('area');
        $data['GET_NAMEF'] = $this->model_admin->GET_NAMEF($idpatient);
        $data['countries'] = $this->model_admin->getCountries();
        $data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
        $data['municipios'] = $this->model_admin->getTownships();
        $data['provinces'] = $this->model_admin->getProvinces();
        $data['patient'] = $this->model_admin->historial_medical($idpatient);
        $search_rdv_doc = array('id_patient' => $idpatient, 'doctor' => $id_user);
        $search_rdv_as_doc = array('id_patient' => $idpatient, 'centro' => $this->uri->segment(4), 'doctor' => $this->uri->segment(5));
        if ($perfil == "Medico") {
            $query = $this->model_admin->RendezVousDoc($search_rdv_doc);
            $data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
        } else {
            $query = $this->model_medico->getAsMedicoApRdv($search_rdv_as_doc);
            $data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
        }
        $data['patid'] = $idpatient;
        $ctutor = $this->model_admin->CountTutor($idpatient);
        $data['ctutor'] = $ctutor;
        $data['tutor'] = $this->model_admin->getTutor($idpatient);
        $data['rendez_vous'] = $query;
        $data['number_cita'] = count($query);
        $data['nueva_cita'] = "";
        $data['is_admin'] = "no";
        $data['controller'] = 'medico';
        $this->load->view('medico/header', $data);
        $data['is_historial'] = $this->model_admin->countAnte1($idpatient);
        $count_emergency_patient_doc = $this->model_emergencia->count_emergency_patient_doc($idpatient, $this->uri->segment(4));
        $data['patient_admitas'] = $count_emergency_patient_doc;
        $data['number_patient_admitas'] = count($count_emergency_patient_doc);
        $this->load->view('admin/pacientes-citas/patient', $data);
        $this->load->view('admin/pacientes-citas/footer_patient_search');
        $this->load->view('medico/pacientes-citas/cita-footer');
    }
    public function cita_patient_padron() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $val = array('MUN_CED' => $this->uri->segment(3), 'SEQ_CED' => $this->uri->segment(4), 'VER_CED' => $this->uri->segment(5));
        $patient = $this->padron_model->getPatientCedulaPad($val);
        $data['photo'] = $this->padron_model->getPhoto($val);
        $id_user = $this->session->userdata['medico_id'];
        $data['area_id'] = $this->db->select('area')->where('id_user', $id_user)->get('users')->row('area');
        $data['id_user'] = $id_user;
        $data['is_admin'] = "no";
        $data['patient'] = $patient;
        $data['nec'] = $this->model_admin->getNec();
        $data['countries'] = $this->model_admin->getCountries();
        if ($this->session->userdata['medico_perfil'] == "Medico") {
            $data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
            $data['seguro_medico'] = $this->model_admin->view_doctor_seguro($id_user);
        } else {
            $data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
            $as_medico_centro = $this->db->select('centro_medico')->where('id_doctor', $id_user)->get('doctor_centro_medico')->row('centro_medico');
            $data['seguro_medico'] = $this->model_admin->view_doctor_seguro_as($as_medico_centro);
        }
        $data['especialidades'] = $this->model_admin->getEspecialidades();
        $data['provinces'] = $this->model_admin->getProvinces();
        $data['causa'] = $this->model_admin->getCausa();
        $data['municipios'] = $this->model_admin->getTownships();
        $data['doctors'] = $this->model_admin->display_all_doctors();
        $last_patient_id = $this->db->select('id_apoint')->order_by('id_apoint', 'desc')->limit(1)->get('rendez_vous')->row('id_apoint');
        $lidp = $last_patient_id + 1;
        $data['patid'] = $lidp;
        $ctutor = $this->model_admin->CountTutor($lidp);
        $data['ctutor'] = $ctutor;
        $data['tutor'] = $this->model_admin->getTutor($lidp);
        $data['name'] = $this->session->userdata['medico_id'];
        $this->load->view('medico/header', $data);
        $this->load->view('admin/pacientes-citas/search_patient', $data);
        $this->load->view('medico/pacientes-citas/patient-found-in-padron', $data);
        $this->load->view('admin/pacientes-citas/footer_patient_search');
        $this->load->view('medico/pacientes-citas/cita-footer');
    }
    public function create_cita_() {
        $rules = array(array('field' => 'nombre', 'label' => 'nombre', 'rules' => 'required',), array('field' => 'date_nacer', 'label' => 'Fecha de nacimiento', 'rules' => 'required'), array('field' => 'seguro_medico', 'label' => 'seguro médico', 'rules' => 'required'), array('field' => 'tel_cel', 'label' => 'Telefono celular', 'rules' => 'required'), array('field' => 'sexo', 'label' => 'sexo', 'rules' => 'required'), array('field' => 'estado_civil', 'label' => 'Estado civil', 'rules' => 'required'), array('field' => 'nacionalidad', 'label' => 'Nacionalidad', 'rules' => 'required'));
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $msg = '<h3 style="color:red">El formulario no se ha guadado, favor revisar :</h3>';
            $this->session->set_flashdata('error_messages', $msg);
            $this->create_cita();
        } else {
            $controller = $this->input->post('controllername');
            $query = $this->db->get_where('patients_appointments', array('nombre' => $this->input->post('nombre'), 'date_nacer' => $this->input->post('date_nacer'), 'tel_cel' => $this->input->post('tel_cel')));
            if ($query->num_rows() > 0) {
                $data['controller'] = $controller;
                $this->load->view('admin/pacientes-citas/duplicate_patient_padron', $data);
            } else {
                if ($this->input->post('seguro_medico') == 11) {
                    $plan = 0;
                } else {
                    if ($this->input->post('plan')) {
                        $plan = $this->input->post('plan');
                    } else {
                        $plan = 0;
                    }
                }
                $photo_location = $this->input->post('photo_location');
                $inputname = $this->input->post('inputname');
                $inputf = $this->input->post('inputf');
                $insert_date = date("Y-m-d H:i:s");
                $filter_date = date("Y-m-d");
                if ($photo_location == 2) {
                    $imgExt = strtolower(pathinfo($_FILES["picture"]['name'], PATHINFO_EXTENSION));
                    $extension = explode('.', $_FILES['picture']['name']);
                    $logo = rand() . '.' . $extension[1];
                    $destination = './assets/img/patients-pictures/' . $logo;
                    move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
                } else {
                    $logo = "";
                }
                $save1 = array('nombre' => $this->input->post('nombre'), 'apodo' => $this->input->post('apodo'), 'photo' => $logo, 'cedula' => $this->input->post('cedula'), 'date_nacer' => $this->input->post('date_nacer'), 'date_nacer_format' => $this->input->post('date_nacer_format'), 'edad' => $this->input->post('age'), 'frecuencia' => $this->input->post('frecuencia'), 'tel_resi' => $this->input->post('tel_resi'), 'tel_cel' => $this->input->post('tel_cel'), 'email' => $this->input->post('email'), 'sexo' => $this->input->post('sexo'), 'estado_civil' => $this->input->post('estado_civil'), 'nacionalidad' => $this->input->post('nacionalidad'), 'seguro_medico' => $this->input->post('seguro_medico'), 'afiliado' => $this->input->post('afiliado'), 'plan' => $plan, 'provincia' => $this->input->post('provincia'), 'municipio' => $this->input->post('municipio'), 'barrio' => $this->input->post('barrio'), 'calle' => $this->input->post('calle'), 'contacto_em_nombre' => $this->input->post('contacto_em_nombre'), 'contacto_em_alias' => $this->input->post('contacto_em_alias'), 'contacto_em_cel' => $this->input->post('contacto_em_cel'), 'contacto_em_tel1' => $this->input->post('contacto_em_tel1'), 'contacto_em_tel2' => $this->input->post('contacto_em_tel2'), 'responsable_legal' => $this->input->post('responsable_legal'), 'cedula_o_pass_menos_edad' => $this->input->post('cedula_o_pass_menos_edad'), 'inserted_by' => $this->input->post('creadted_by'), 'updated_by' => $this->input->post('creadted_by'), 'insert_date' => $insert_date, 'update_date' => $insert_date, 'filter_date' => $filter_date);
                $id_pat = $this->model_admin->save_patient($save1);
                $this->session->set_userdata('sessionIdPatient', $id_pat);
                $saveN = array('nec1' => "NEC-$id_pat");
                $this->model_admin->insert_nec($id_pat, $saveN);
                for ($i = 0;$i < count($inputname), $i < count($inputf);++$i) {
                    $inp = $inputname[$i];
                    $inf = $inputf[$i];
                    $saveInputs = array('patient_id' => $id_pat, 'input_name' => $inp, 'inputf' => $inf, 'seguro_id' => $this->input->post('seguro_medico'));
                    $this->model_admin->saveInput($saveInputs);
                }
                $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";
                $this->session->set_flashdata('success_msg', $msg);
                $centro_type = $this->db->select('type')->where('id_m_c', $this->input->post('centro_medico'))->get('medical_centers')->row('type');
                $this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain', $centro_type);
                $this->session->set_userdata('sessionIdPatientNewCita', $id_pat);
                $this->session->set_userdata('sessionIdDocNewCita', $this->input->post('doctor'));
                $this->session->set_userdata('sessionIdCentNewCita', $this->input->post('centro_medico'));
                $this->session->set_userdata('sessionIdSegNewCita', $this->input->post('seguro_medico'));
                $this->session->set_userdata('id_user', $this->input->post('id_user'));
                if ($this->input->post('orientation') == 0) {
                    $dayNumber = $this->db->select('id')->where('title', $this->input->post('fecha_filter'))->get('diaries')->row('id');
                    $filter_date1 = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
                    $save2 = array('nec' => "NEC-$id_pat", 'causa' => $this->input->post('causa'), 'centro' => $this->input->post('centro_medico'), 'area' => $this->input->post('especialidad'), 'doctor' => $this->input->post('doctor'), 'id_patient' => $id_pat, 'fecha_propuesta' => $this->input->post('fecha_propuesta'), 'weekday' => $dayNumber, 'update_by' => $this->input->post('creadted_by'), 'inserted_by' => $this->input->post('creadted_by'), 'created_time' => $insert_date, 'update_time' => $insert_date, 'filter_date' => $filter_date1, 'cancelar' => 0, 'hora_de_cita' => $this->input->post('hora_de_cita'));
                    $id_rdv = $this->model_admin->save_rendevous($save2);
                    $this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);
                    $query1 = $this->db->get_where('type_reasons', array('title' => $this->input->post('causa')));
                    if ($query1->num_rows() == 0) {
                        $save = array('title' => $this->input->post('causa'), 'inserted_by' => $this->input->post('creadted_by'), 'inserted_time' => $insert_date, 'updated_by' => $this->input->post('creadted_by'), 'updated_time' => $insert_date);
                        $this->model_admin->save_new_causa($save);
                    }
                    $area_id = $this->db->select('area')->where('id_user', $this->input->post('creadted_by'))->get('users')->row('area');
                    if ($area_id == '87') {
                        redirect("medico/index");
                    } else {
                        redirect("medico/gh0rtgkrr4g5");
                    }
                }
                if ($this->input->post('orientation') == 3) {
                    $savedas = array('centro' => $this->input->post('hosp_centro'), 'esp' => $this->input->post('hosp_esp'), 'doc' => $this->input->post('hosp_doctor'), 'causa' => $this->input->post('hosp_causa'), 'via' => $this->input->post('hosp_ingreso'), 'id_patient' => $id_pat, 'sala' => $this->input->post('hosp_sala'), 'servicio' => $this->input->post('hosp_servicio'), 'cama' => $this->input->post('hosp_cama'), 'hosp_auto' => $this->input->post('hosp_auto'), 'hosp_auto_por' => $this->input->post('hosp_auto_por'), 'inserted' => $this->input->post('creadted_by'), 'updated' => $this->input->post('creadted_by'), 'timeinserted' => $insert_date, 'timeupdated' => $insert_date, 'cancelar' => 0);
                    $this->db->insert("hospitalization_data", $savedas);
                    $id_user = $this->input->post('creadted_by');
                    redirect("hospitalizacion/hospitalizacion_list/$id_pat/$id_user");
                } elseif ($this->input->post('orientation') == 2) {
                    $query1 = $this->db->get_where('emergency_adm_data', array('id_em_c' => $this->input->post('em_name')));
                    if ($query1->num_rows() == 0) {
                        $save = array('em_name' => $this->input->post('em_name'), 'id' => 1);
                        $this->db->insert("emergency_adm_data", $save);
                    }
                    $query2 = $this->db->get_where('emergency_adm_data', array('id_em_c' => $this->input->post('paciente_referido')));
                    if ($query2->num_rows() == 0) {
                        $save = array('em_name' => $this->input->post('paciente_referido'), 'id' => 2);
                        $this->db->insert("emergency_adm_data", $save);
                    }
                    $query3 = $this->db->get_where('emergency_adm_data', array('id_em_c' => $this->input->post('medio_llegado')));
                    if ($query3->num_rows() == 0) {
                        $save = array('em_name' => $this->input->post('medio_llegado'), 'id' => 3);
                        $this->db->insert("emergency_adm_data", $save);
                    }
                    $query3 = $this->db->get_where('emergency_adm_data', array('id_em_c' => $this->input->post('estado_paciente')));
                    if ($query3->num_rows() == 0) {
                        $save = array('em_name' => $this->input->post('estado_paciente'), 'id' => 4);
                        $this->db->insert("emergency_adm_data", $save);
                    }
                    if ($this->input->post('enviado_a') == 1) {
                        $go_to = "triaje";
                    } else {
                        $go_to = "Emergencia General";
                    }
                    $save = array('id_pat' => $id_pat, 'centro' => $this->input->post('emergencia-centro'), 'causa' => $this->input->post('em_name'), 'paciente_referido_por' => $this->input->post('paciente_referido'), 'medio_de_llegado' => $this->input->post('medio_llegado'), 'enviado_a' => $this->input->post('enviado_a'), 'enviado_name' => $go_to, 'estado_de_paciente' => $this->input->post('estado_paciente'), 'inserted_by' => $this->input->post('creadted_by'), 'update_by' => $this->input->post('creadted_by'), 'created_date' => date("Y-m-d"), 'create_time' => date("H:i:s"), 'update_date' => date("Y-m-d"), 'update_time' => date("H:i:s"));
                    $this->db->insert("emergency_patients", $save);
                    $enviado_a = $this->input->post('enviado_a');
                    $id_pat_emergencia = $id_pat;
                    $iduser = $this->input->post('creadted_by');
                    redirect("emergency/emergency_patient/$enviado_a/$id_pat_emergencia/$iduser");
                } else {
                    $this->session->set_userdata('id_cm', $this->input->post('factura-centro'));
                    $this->session->set_userdata('id_d', $this->input->post('facturar-doc'));
                    $this->session->set_userdata('id_p_a', $id_pat);
                    $this->session->set_userdata('id_seg', $this->input->post('seguro_medico'));
                    redirect("$controller/redirect_fac");
                }
            }
        }
    }
    public function save_new_patient_from_padron() {
        $rules = array(array('field' => 'seguro_medico', 'label' => 'seguro médico', 'rules' => 'required'), array('field' => 'tel_cel', 'label' => 'Telefono celular', 'rules' => 'required'));
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $msg = '<h3 style="color:red">El formulario no se ha guadado, favor revisar :</h3>';
            $this->session->set_flashdata('error_messages', $msg);
            $ced1 = $this->input->post('ced1');
            $ced2 = $this->input->post('ced2');
            $ced3 = $this->input->post('ced3');
            $this->create_new_patient_from_padron($ced1, $ced2, $ced3);
        } else {
            $queryd = $this->db->get_where('patients_appointments', array('ced1' => $this->input->post('ced1'), 'ced2' => $this->input->post('ced2'), 'ced3' => $this->input->post('ced3')));
            if ($queryd->num_rows() > 0) {
                $data['controller'] = "medico";
                $this->load->view('admin/pacientes-citas/duplicate_patient_padron', $data);
            } else {
                if ($this->input->post('seguro_medico') == 11) {
                    $plan = 0;
                } else {
                    $plan = $this->input->post('plan');
                }
                $MUN_CED = $this->input->post('ced1');
                $SEQ_CED = $this->input->post('ced2');
                $VER_CED = $this->input->post('ced3');
                $id_user = $this->input->post('id_user');
                $this->session->set_userdata('MUN_CED', $MUN_CED);
                $this->session->set_userdata('SEQ_CED', $SEQ_CED);
                $this->session->set_userdata('VER_CED', $VER_CED);
                $this->session->set_userdata('id_user', $id_user);
                $this->session->set_userdata('sessionIdSegNewCita', $this->input->post('seguro_medico'));
                $centro_type = $this->db->select('type')->where('id_m_c', $this->input->post('centro_medico'))->get('medical_centers')->row('type');
                $this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain', $centro_type);
                $this->session->set_userdata('sessionIdCentNewCita', $this->input->post('centro_medico'));
                $this->session->set_userdata('sessionIdDocNewCita', $this->input->post('doctor'));
                $inputname = $this->input->post('inputname');
                $inputf = $this->input->post('inputf');
                $insert_date = date("Y-m-d H:i:s");
                $modify_date = date("Y-m-d H:i:s");
                $filter_date = date("Y-m-d");
                $photo_location = $this->input->post('photo_location');
                if ($photo_location == 2) {
                    $imgExt = strtolower(pathinfo($_FILES["picture"]['name'], PATHINFO_EXTENSION));
                    $extension = explode('.', $_FILES['picture']['name']);
                    $logo = rand() . '.' . $extension[1];
                    $destination = './assets/img/patients-pictures/' . $logo;
                    move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
                } else if ($photo_location == 1) {
                    $logo = "padron";
                } else if ($photo_location == 0) {
                    $logo = "";
                } else {
                }
                $save1 = array('nombre' => $this->input->post('nombre'), 'photo' => $logo, 'cedula' => $this->input->post('cedula'), 'ced1' => $this->input->post('ced1'), 'ced2' => $this->input->post('ced2'), 'ced3' => $this->input->post('ced3'), 'date_nacer' => $this->input->post('date_nacer'), 'date_nacer_format' => $this->input->post('date_nacer_format'), 'edad' => $this->input->post('age'), 'frecuencia' => $this->input->post('frecuencia'), 'tel_resi' => $this->input->post('tel_resi'), 'tel_cel' => $this->input->post('tel_cel'), 'email' => $this->input->post('email'), 'sexo' => $this->input->post('sexo'), 'estado_civil' => $this->input->post('estado_civil'), 'nacionalidad' => "Dominican Republic", 'seguro_medico' => $this->input->post('seguro_medico'), 'afiliado' => $this->input->post('afiliado'), 'plan' => $plan, 'provincia' => $this->input->post('provincia'), 'municipio' => $this->input->post('municipio'), 'barrio' => $this->input->post('barrio'), 'calle' => $this->input->post('calle'), 'contacto_em_nombre' => $this->input->post('contacto_em_nombre'), 'contacto_em_alias' => $this->input->post('contacto_em_alias'), 'contacto_em_cel' => $this->input->post('contacto_em_cel'), 'contacto_em_tel1' => $this->input->post('contacto_em_tel1'), 'contacto_em_tel2' => $this->input->post('contacto_em_tel2'), 'responsable_legal' => $this->input->post('responsable_legal'), 'cedula_o_pass_menos_edad' => $this->input->post('cedula_o_pass_menos_edad'), 'inserted_by' => $this->input->post('id_user'), 'updated_by' => $this->input->post('id_user'), 'insert_date' => $insert_date, 'update_date' => $insert_date, 'filter_date' => $filter_date);
                $id_pat = $this->model_admin->save_patient($save1);
                $this->session->set_userdata('sessionIdPatient', $id_pat);
                $saveN = array('nec1' => "NEC-$id_pat");
                $this->model_admin->insert_nec($id_pat, $saveN);
                for ($i = 0;$i < count($inputname), $i < count($inputf);++$i) {
                    $inp = $inputname[$i];
                    $inf = $inputf[$i];
                    $saveInputs = array('patient_id' => $id_pat, 'input_name' => $inp, 'inputf' => $inf);
                    $this->model_admin->saveInput($saveInputs);
                }
                $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";
                $this->session->set_flashdata('success_msg', $msg);
                if ($this->input->post('orientation') == 0) {
                    $dayNumber = $this->db->select('id')->where('title', $this->input->post('weekday'))->get('diaries')->row('id');
                    $filter_date1 = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
                    $save2 = array('nec' => "NEC-$id_pat", 'causa' => $this->input->post('causa'), 'centro' => $this->input->post('centro_medico'), 'area' => $this->input->post('especialidad'), 'doctor' => $this->input->post('doctor'), 'id_patient' => $id_pat, 'fecha_propuesta' => $this->input->post('fecha_propuesta'), 'weekday' => $dayNumber, 'update_by' => $this->input->post('id_user'), 'inserted_by' => $this->input->post('id_user'), 'created_time' => $insert_date, 'update_time' => $insert_date, 'filter_date' => $filter_date1, 'cancelar' => 0, 'hora_de_cita' => $this->input->post('hora_de_cita'));
                    $id_rdv = $this->model_admin->save_rendevous($save2);
                    $this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);
                    $this->session->set_userdata('id_esp', $this->input->post('especialidad'));
                    if ($this->input->post('especialidad') == 87) {
                        redirect('medico/index');
                    } else {
                        redirect('medico/gh0rtgkrr4g5');
                    }
                } else {
                    $this->session->set_userdata('id_cm', $this->input->post('factura-centro'));
                    $this->session->set_userdata('id_d', $this->input->post('facturar-doc'));
                    $this->session->set_userdata('id_p_a', $id_pat);
                    $this->session->set_userdata('id_seg', $this->input->post('seguro_medico'));
                    redirect("medico/redirect_fac");
                }
            }
        }
    }
    public function gh0rtgkrr4g5() {
        $idpatient = $this->session->userdata['sessionIdPatient'];
        $data['idpatient'] = $idpatient;
        $data['patid'] = $idpatient;
        $patient = $this->db->select('nombre,nec1,photo,ced1,ced2,ced3')->where('id_p_a', $idpatient)->get('patients_appointments')->row_array();
        $data['nombre'] = $patient['nombre'];
        $data['nec'] = $patient['nec1'];
        $data['photo'] = $patient['photo'];
        $data['ced1'] = $patient['ced1'];
        $data['ced2'] = $patient['ced2'];
        $data['ced3'] = $patient['ced3'];
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $id_dd = $this->session->userdata['sessionIdDocNewCita'];
        $data['id_dd'] = $id_dd;
        $data['id_cm'] = $this->session->userdata['sessionIdCentNewCita'];
        $data['id_rdv'] = $this->session->userdata['sessionIdNewCitaAgain'];
        $data['id_seguro'] = $this->session->userdata['sessionIdSegNewCita'];
        $data['centro_type'] = $this->session->userdata['sessionCentroTypeSeguroNewCitaAgain'];
        $query = $this->model_admin->RendezVous($idpatient);
        $val = array('doctor' => $this->session->userdata['sessionIdDocNewCita'], 'id_patient' => $idpatient);
        $query_doc = $this->model_admin->RendezVousDoc($val);
        $data['is_admin'] = "no";
        $data['number_cita'] = count($query);
        $this->load->view('medico/header', $data);
        $this->load->view('admin/pacientes-citas/tutor/124gh0rtgkrr4g5', $data);
        $this->load->view('admin/footer', $data);
    }
    public function fact() {
        $this->session->set_userdata('id_cm', $this->input->get('centro'));
        $this->session->set_userdata('id_d', $this->input->get('doc'));
        $this->session->set_userdata('id_p_a', $this->input->get('id'));
        $this->session->set_userdata('id_seg', $this->input->get('seg'));
        redirect('medico/redirect_fac');
    }
    public function redirect_fac() {
        $identificar_ = $this->db->select('type')->where('id_m_c', $this->session->userdata['id_cm'])->get('medical_centers')->row('type');
        $id_apoint = encrypt_url('fac');
        $id_cm = encrypt_url($this->session->userdata['id_cm']);
        $identificar = encrypt_url($identificar_);
        $id_d = encrypt_url($this->session->userdata['id_d']);
        $id_seg = encrypt_url($this->session->userdata['id_seg']);
        $id_p_a = encrypt_url($this->session->userdata['id_p_a']);
        redirect("medico/patient_billing/$identificar/$id_apoint/$id_d/$id_cm/$id_seg/$id_p_a");
    }
    public function create_cita() {
        $id_user = $this->session->userdata['medico_id'];
        $data['id_user'] = $id_user;
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_id'];
        if ($this->session->userdata['medico_perfil'] == "Medico") {
            $data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
            $data['seguro_medico'] = $this->model_admin->view_doctor_seguro($id_user);
            $centro_num = $this->db->select('type, id_m_c')->join('doctor_agenda_test', 'doctor_agenda_test.id_centro = medical_centers.id_m_c')->where('id_doctor', $id_user)->group_by('id_centro')->get('medical_centers');
        } else {
            $centro_num = $this->db->select('id_m_c,type')->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c')->where('id_doctor', $id_user)->group_by('centro_medico')->get('medical_centers');
            $data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
            $as_medico_centro = $this->db->select('centro_medico')->where('id_doctor', $id_user)->get('doctor_centro_medico')->row('centro_medico');
            $data['seguro_medico'] = $this->model_admin->view_doctor_seguro_as($as_medico_centro);
        }
        $data['nec'] = $this->model_admin->getNec();
        $data['countries'] = $this->model_admin->getCountries();
        $data['provinces'] = $this->model_admin->getProvinces();
        $data['causa'] = $this->model_admin->getCausa();
        $data['municipios'] = $this->model_admin->getTownships();
        $last_patient_id = $this->db->select('id_p_a')->order_by('id_p_a', 'desc')->limit(1)->get('patients_appointments')->row('id_p_a');
        $lidp = $last_patient_id + 1;
        $data['patid'] = $lidp;
        $data['is_admin'] = "no";
        $sqlc = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=1";
        $data['queryc'] = $this->db->query($sqlc);
        $sqlrp = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=2";
        $data['queryrp'] = $this->db->query($sqlrp);
        $sqlml = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=3";
        $data['queryml'] = $this->db->query($sqlml);
        $sqlep = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=4";
        $data['queryep'] = $this->db->query($sqlep);
        $area_id = $this->db->select('area')->where('id_user', $this->session->userdata['medico_id'])->get('users')->row('area');
        $this->load->view('medico/header', $data);
        $data['controllerUser'] = 'medico';
        $rowType = $centro_num->row();
        $data['centro_type'] = $rowType->type;
        $data['id_m_c'] = $rowType->id_m_c;
        $this->load->view('admin/pacientes-citas/search_patient', $data);
        if ($area_id == 87) {
            $this->load->view('optica/optometra/create_patient', $data);
        } else {
            $this->load->view('medico/pacientes-citas/create-cita', $data);
        }
        $this->load->view('admin/pacientes-citas/footer_patient_search');
        $this->load->view('medico/pacientes-citas/cita-footer');
    }
    public function patient_paginate() {
        $data['id_user'] = $this->session->userdata['medico_id'];
        $data['user_id'] = $this->session->userdata['medico_id'];
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['nombre'] = $this->input->get('patient_nombres');
        $data['patient_apellido'] = $this->input->get('patient_apellido');
        $data['patient_apellido2'] = $this->input->get('patient_apellido2');
        $data['controllerUser'] = 'medico';
        $this->load->view('medico/header', $data);
        $data['backbutton'] = '<a style="color:red"   href="' . base_url() . 'medico/create_cita/"  >Volver a buscar</a>';
        $this->load->view('admin/pacientes-citas/display-names', $data);
    }
    public function patient_billing_() {
        $identificar = $this->uri->segment(3);
        $id_apoint = $this->uri->segment(4);
        $id_d = $this->uri->segment(5);
        $id_cm = $this->uri->segment(6);
        $id_seg = $this->uri->segment(7);
        $id_p_a = $this->uri->segment(8);
        redirect("medico/patient_billing/$identificar/$id_apoint/$id_d/$id_cm/$id_seg/$id_p_a");
    }
    public function patient_billing($identificar, $id_apoint, $id_d, $id_cm, $id_seg, $id_p_a) {
        $identificar = decrypt_url($identificar);
        $id_apoint = decrypt_url($id_apoint);
        $id_d = decrypt_url($id_d);
        $id_cm = decrypt_url($id_cm);
        $id_seg = decrypt_url($id_seg);
        $id_p_a = decrypt_url($id_p_a);
        if ($identificar == "" || $id_apoint == "" || $id_d == "" || $id_cm == "" || $id_seg == "") {
            redirect('medico/billing_medicos');
        }
        $data['is_admin'] = "no";
        $data['identificar'] = $identificar;
        $data['id_apoint'] = $id_apoint;
        $data['id_d'] = $id_d;
        $data['id_cm'] = $id_cm;
        $data['id_seg'] = $id_seg;
        $data['id_p_a'] = $id_p_a;
        $data['name'] = $this->session->userdata['medico_id'];
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $this->load->view('medico/header', $data);
        $this->load->view('medico/billing/bill/billing-commun', $data);
    }
    public function bill_() {
        $id = encrypt_url($this->uri->segment(3));
        $identificar = encrypt_url($this->uri->segment(4));
        redirect("medico/billView/$id/$identificar");
    }
    public function bill() {
        $id = $this->uri->segment(3);
        $identificar = $this->uri->segment(4);
        $this->billView($id, $identificar);
    }
    public function billView($idFac, $ident) {
        $data['name'] = $this->session->userdata['medico_id'];
        $data['is_admin'] = "no";
        $this->load->view('medico/header', $data);
        $data['id'] = $idFac;
        $data['identificar'] = $ident;
        $data['controller'] = "medico";
        $this->load->view('medico/billing/bill/view-bill-commnun', $data);
    }
    public function facturas_borradas() {
        $data['user'] = $this->session->userdata['medico_id'];
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $this->load->view('medico/header', $data);
        $this->load->view('medico/billing/bill/view-facturas-borradas', $data);
    }
    public function viewPrivateBill_() {
        $id = encrypt_url($this->uri->segment(3));
        $identificar = encrypt_url($this->uri->segment(4));
        redirect("medico/privateBillView/$id/$identificar");
    }
    public function viewPrivateBill() {
        $id = $this->uri->segment(3);
        $identificar = $this->uri->segment(4);
        $this->privateBillView($id, $identificar);
    }
    function privateBillView($idbill, $identificar) {
        $data['id'] = $idbill;
        $data['identificar'] = $identificar;
        $data['name'] = $this->session->userdata['medico_id'];
        $data['is_admin'] = "no";
        $this->load->view('medico/header', $data);
        $data['controller'] = "medico";
        $this->load->view('medico/billing/bill/seguro-privado/view-bill-commnun', $data);
    }
    public function patients_requests() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $user_id = $this->session->userdata['medico_id'];
        $data['user_id'] = $user_id;
        $this->load->view('medico/header', $data);
        if ($this->session->userdata['medico_perfil'] == 'Medico') {
            $sql = "SELECT id_patient, id_apoint, fecha_propuesta, nec FROM rendez_vous WHERE doctor=$user_id && confirmada=1 ORDER BY id_apoint DESC";
        } else {
            $sql = "SELECT id_patient, id_apoint, fecha_propuesta, nec FROM rendez_vous

JOIN doctor_centro_medico on doctor_centro_medico.centro_medico=rendez_vous.centro

 WHERE id_doctor=$user_id && confirmada=1 ORDER BY id_apoint DESC";
        }
        $query = $this->db->query($sql);
        $data['query'] = $query;
        $this->load->view('admin/pacientes-citas/patients_requests', $data);
    }
    public function lab_lentes() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $user_id = $this->session->userdata['medico_id'];
        $data['user_id'] = $user_id;
        $this->load->view('medico/header', $data);
        $sql = "SELECT * FROM laboratory_lentes WHERE  enviado=0 ORDER BY id DESC";
        $query = $this->db->query($sql);
        $data['query'] = $query;
        $this->load->view('optica/lab-lentes', $data);
    }
    public function lentes_propuestos() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $user_id = $this->session->userdata['medico_id'];
        $data['user_id'] = $user_id;
        $this->load->view('medico/header', $data);
        $sql = "SELECT * FROM h_c_of_refracion JOIN laboratory_lentes ON h_c_of_refracion.id= laboratory_lentes.id_refraccion WHERE  enviado=1";
        $query = $this->db->query($sql);
        $data['query'] = $query;
        $this->load->view('optica/lentes_propuestos', $data);
    }
    public function diseases() {
        $data['perfil'] = ($this->session->userdata['medico_perfil']);
        $data['name'] = ($this->session->userdata['medico_name']);
        $data['all_reasons'] = $this->model_admin->display_all_reasons();
        $this->load->view('medico/header', $data);
        $this->load->view('medico/deseases', $data);
    }
    public function save_disease() {
        $author = ($this->session->userdata['medico_name']);
        $insert_date = date("Y-m-d H:i:s");
        $disease = $this->input->post('disease');
        $query = $this->db->get_where('type_reasons', array('title' => $disease));
        if ($query->num_rows() > 0) {
            $msg = "<div class='alert alert-warning' style='text-align:center;font-size:20px' id='deletesuccess'>Area : <span style='color:green'>$disease </span> ya existe .</div>";
            $this->session->set_flashdata('success_msg', $msg);
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $save = array('title' => $disease, 'updated_by' => $author, 'updated_time' => $insert_date);
            $this->model_admin->save_disease($save);
            $msg = "<div class='alert alert-success' style='text-align:center;font-size:20px' id='deletesuccess'>Area : <span style='color:green'>$disease </span> se guada con exito .</div>";
            $this->session->set_flashdata('success_msg', $msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function delete_causa() {
        $query = $this->model_admin->delete_causa($this->input->post('id'));
    }
    public function mssm() {
        $data['name'] = $this->session->userdata['medico_name'];
        $id_user = $this->session->userdata['medico_id'];
        $data['user_name'] = $id_user;
        $perfil = $this->session->userdata['medico_perfil'];
        $data['perfil'] = $perfil;
        $data['tarifarios_grouped_seguro'] = $this->model_admin->tarifarios_grouped_seguro_doc($id_user);
        $data['especialidades'] = $this->model_admin->doct_es_tarif($id_user);
        $this->load->view('medico/header', $data);
        if ($perfil == "Asistente Medico") {
            $data['all_medical_centers'] = $this->model_admin->display_all_medical_centers_docs($id_user, $perfil);
            $this->load->view('medico/billing/mssm/create', $data);
        } else {
            $data['all_medical_centers'] = $this->model_admin->view_doctor_centro($id_user);
            $this->load->view('medico/billing/mssm/create-medico', $data);
        }
    }
    public function upload_employees() {
        $data['name'] = $this->session->userdata['medico_name'];
        $id_user = $this->session->userdata['medico_id'];
        $data['user_name'] = $id_user;
        $perfil = $this->session->userdata['medico_perfil'];
        $data['perfil'] = $perfil;
        $this->load->view('medico/header', $data);
        $data['all_medical_centers'] = $this->model_admin->display_all_medical_centers_docs($id_user, $perfil);
        $this->load->view('ficha-empleado/upload-employees', $data);
        $this->load->view('ficha-empleado/footer');
    }
    public function searchEmployees() {
        $this->upload_employees();
        $centro = $this->input->get('centro');
        $data['centro'] = $centro;
        $data['centro_name'] = $this->db->select('name')->where('id_m_c', $centro)->get('medical_centers')->row('name');
        $sql = "SELECT * FROM employees WHERE centro =$centro";
        $query = $this->db->query($sql);
        $sqlAct = "SELECT * FROM employees WHERE centro =$centro && status ='Active'";
        $queryAct = $this->db->query($sqlAct);
        $sqlTerm = "SELECT * FROM employees WHERE centro =$centro && status ='Terminated'";
        $queryTerm = $this->db->query($sqlTerm);
        $total = $query->num_rows();
        if ($total > 0) {
            $this->load->view('ficha-empleado/upload-employees-form', $data);
        } else {
            $data['total'] = $total;
            $data['totalAct'] = $queryAct->num_rows();
            $data['totalTerm'] = $queryTerm->num_rows();
            $this->load->view('ficha-empleado/list-employees', $data);
        }
    }
	
	
	    public function upload_employees_files($centro) {
       
	   
	       $this->upload_employees();
       
        $data['centro'] = $centro;
        $data['centro_name'] = $this->db->select('name')->where('id_m_c', $centro)->get('medical_centers')->row('name');
        $sql = "SELECT * FROM employees WHERE centro =$centro";
        $query = $this->db->query($sql);
        $sqlAct = "SELECT * FROM employees WHERE centro =$centro && status ='Active'";
        $queryAct = $this->db->query($sqlAct);
        $sqlTerm = "SELECT * FROM employees WHERE centro =$centro && status ='Terminated'";
        $queryTerm = $this->db->query($sqlTerm);
        $total = $query->num_rows();
        if ($total > 0) {
            $this->load->view('ficha-empleado/upload-employees-form', $data);
        } else {
            $data['total'] = $total;
            $data['totalAct'] = $queryAct->num_rows();
            $data['totalTerm'] = $queryTerm->num_rows();
            $this->load->view('ficha-empleado/list-employees', $data);
        }
		
       
    }
	
	
	
	
	
	
	
    public function display_tarif_doc() {
        $this->mssm();
        $doct_tarif = $this->input->get('doct_tarif');
        $data['id_doctor'] = $doct_tarif;
        $results = $this->model_admin->display_tarif_doc($doct_tarif);
        $data['results'] = $results;
        $count = count($results);
        $id_seguro_medico = $this->db->select('seguro_medico')->where('id_doctor', $doct_tarif)->get('doctor_seguro')->row('seguro_medico');
        $data['id_seguro_medico'] = $id_seguro_medico;
        if ($count > 0) {
            $this->load->view('admin/tarifarios/doctors/display_tarif_doc', $data);
        } else {
            $data['doctor'] = $this->db->select('area,name')->where('id_user', $doct_tarif)->get('users')->row_array();
            $sql = "SELECT seguro_medico  FROM  doctor_seguro WHERE id_doctor=$doct_tarif";
            $data['query'] = $this->db->query($sql);
            $data['id_centro'] = 0;
            $this->load->view('admin/tarifarios/doctors/facturarPatNotFound', $data);
        }
    }
    public function get_doc_centro() {
        echo "<option value=''></option>";
        $id_medical_center = $this->input->post('id_medical_center');
        $RESULT_DOCTOR = $this->model_admin->get_doctor($id_medical_center);
        foreach ($RESULT_DOCTOR as $row) {
            echo "<option value='$row->id_user'>$row->name</option>";
        }
    }
    public function get_doc_seguros() {
        echo "<option value=''></option>";
        $id_medical_center = $this->input->post('id_medical_center');
        $RESULT = $this->model_admin->view_doctor_seguro_as($id_medical_center);
        foreach ($RESULT as $row) {
            echo "<option value='$row->id_sm'>$row->title</option>";
        }
    }
    public function display_tarif_doc_() {
        $this->mssm();
        $id_seguro = $this->input->get('id_seguro');
        $doct_tarif = $this->session->userdata['medico_id'];
        $data['id_doctor'] = $doct_tarif;
        $results = $this->model_admin->display_tarif_doc_($doct_tarif, $id_seguro);
        $data['results'] = $results;
        $count = count($results);
        $data['id_seguro_medico'] = $id_seguro;
        if ($count > 0) {
            $this->load->view('admin/tarifarios/doctors/display_tarif_doc', $data);
        } else {
            $data['doctor'] = $this->db->select('area,name')->where('id_user', $doct_tarif)->get('users')->row_array();
            $sql = "SELECT seguro_medico  FROM  doctor_seguro WHERE id_doctor=$doct_tarif && seguro_medico=$id_seguro";
            $data['query'] = $this->db->query($sql);
            $data['id_centro'] = $this->input->get('id_centro');
            $this->load->view('admin/tarifarios/doctors/facturarPatNotFound', $data);
        }
    }
    public function import_rates_fac_centro() {
        $data['id_c'] = $this->uri->segment(3);
        $data['created_by'] = $this->session->userdata['medico_name'];
        $this->load->view('medico/tarifarios/excel_import_fac_centro', $data);
    }
    public function display_tarif_seguro() {
        $data['seguro_id'] = $this->input->post('seguro_id');
        $this->load->view('medico/tarifarios/doctors/display_tarif_seguro', $data);
    }
    public function loadDocTarif() {
        $data['user_name'] = $this->session->userdata['medico_id'];
        $id_doc = $this->session->userdata['medico_id'];
        $seguro_id = $this->input->post('seguro_id');
        $data['seguro_id'] = $seguro_id;
        $data['id_doctor'] = $id_doc;
        $taf = array('id_doctor' => $id_doc, 'id_seguro' => $seguro_id);
        $results = $this->model_admin->display_tarif_seguro_doc($taf);
        $data['results'] = $results;
        $data['count'] = count($results);
        $data['seguro'] = $this->db->select('title')->where('id_sm', $seguro_id)->get('seguro_medico')->row('title');
        $seguro = $this->db->select('id_sm,title,logo')->where('id_sm', $seguro_id)->get('seguro_medico')->row_array();
        if ($seguro['logo'] == "") {
            $data['seguro_logo'] = "";
        } else {
            $data['seguro_logo'] = '<img  style="width:90px;" src="' . base_url() . '/assets/img/seguros_medicos/' . $seguro['logo'] . '"  />';
        }
        $codigo_contrato = $this->db->select('codigo,id,inserted_by,updated_by,updated_time,inserted_time')->where('id_seguro', $seguro_id)->where('id_doctor', $id_doc)->get('codigo_contrato')->row_array();
        $u1 = $this->db->select('name')->where('id_user', $codigo_contrato['inserted_by'])->get('users')->row('name');
        $u2 = $this->db->select('name')->where('id_user', $codigo_contrato['updated_by'])->get('users')->row('name');
        $data['u2'] = $u2;
        $data['u1'] = $u1;
        $data['codigo'] = $codigo_contrato['codigo'];
        $data['codigo_id'] = $codigo_contrato['id'];
        $data['updated_time'] = date("d-m-Y H:i:s", strtotime($codigo_contrato['updated_time']));
        $data['inserted_time'] = date("d-m-Y H:i:s", strtotime($codigo_contrato['inserted_time']));
        $this->load->view('medico/tarifarios/doctors/loadDocTarif', $data);
    }
    public function saveNewTarifMedico() {
        if ($this->input->post('cups') != "" && $this->input->post('simons') != "" && $this->input->post('procedimiento') != "" && $this->input->post('monto') != "") {
            $data = array('codigo' => $this->input->post('cups'), 'simon' => $this->input->post('simons'), 'procedimiento' => $this->input->post('procedimiento'), 'id_categoria' => $this->input->post('categoria'), 'monto' => $this->input->post('monto'), 'id_doctor' => $this->session->userdata['medico_id'], 'id_seguro' => $this->input->post('id_seguro'), 'inserted_by' => $this->session->userdata['medico_id'], 'inserted_date' => date("Y-m-d H:i:s"), 'updated_by' => $this->session->userdata['medico_id'], 'updated_date' => date("Y-m-d H:i:s"));
            $this->model_admin->saveNewTarifMedico($data);
        }
    }
    public function mssm_service_data() {
        $id_tarif = $this->input->get('id_tarif');
        $id_user = ($this->session->userdata['medico_id']);
        $procedimiento = $this->db->select('procedimiento')->where('id_tarif', $id_tarif)->get('tarifarios')->row('procedimiento');
        $data['servicio'] = $procedimiento;
        $get = array('procedimiento' => $procedimiento, 'id_user' => $id_user);
        $data['tarifarios_by_seguros'] = $this->model_admin->tarifarios_by_seguros_doc($get);
        $this->load->view('admin/tarifarios/doctors/search-by-service-result', $data);
    }
    public function import_rates() {
        $id_user = $this->uri->segment(3);
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $id_user = $this->session->userdata['medico_id'];
        $data['user_name'] = $id_user;
        $data['id_user'] = $id_user;
        $id_area = $this->db->select('area')->where('id_user', $id_user)->get('users')->row('area');
        $area_info = $this->db->select('id_ar, title_area')->where('id_ar', $id_area)->get('areas')->row_array();
        $data['a_i'] = $area_info['id_ar'];
        $data['area'] = $area_info['title_area'];
        $data['tarifarios_grouped'] = $this->model_admin->tarifarios_grouped();
        $data['all_seguro'] = $this->model_admin->view_doctor_seguro($id_user);
        $data['all_medical_centers'] = $this->model_admin->view_doctor_centro($id_user);
        $this->load->view('medico/header', $data);
        $this->load->view('medico/tarifarios/doctors/load_tarif_doc_form', $data);
    }
    public function load_tarif_doc_form() {
        $id_user = ($this->session->userdata['medico_id']);
        $data['all_seguro'] = $this->model_admin->view_doctor_seguro($id_user);
        $data['user_name'] = ($this->session->userdata['medico_name']);
        $data['area'] = $this->input->post('area');
        $data['a_i'] = $this->input->post('a_i');
        $data['perfil'] = $this->input->post('perfil');
        $data['tarifarios_grouped'] = $this->model_admin->tarifarios_grouped();
        $data['last_id_doc'] = $this->db->select('id_doctor')->order_by('id_tarif', 'desc')->limit(1)->get('tarifarios')->row('id_doctor');
        $data['especialidades'] = $this->model_admin->getEspecialidades();
        $this->load->view('medico/tarifarios/doctors/load_tarif_doc_form', $data);
    }
    public function fetch_excel_import() {
        $cpt = "";
        $id_user = ($this->session->userdata['medico_id']);
        $user = ($this->session->userdata['medico_name']);
        $last_id_cat = $this->db->select('id_categoria')->order_by('id_tarif', 'desc')->limit(1)->get('tarifarios')->row('id_categoria');
        $data = $this->excel_import_model->selectDoc($id_user);
        $data_centro = $this->excel_import_model->select_centros_doc($user);
        $output = '
<span style="display:none" id="id_categoria">' . $last_id_cat . '</span>
<h3 align="center">Total Tarifarios Medicos- ' . $data->num_rows() . '</h3>
<h3 align="center" id="hide_last_centro">Total Tarifarios Centro Medicos- ' . $data_centro->num_rows() . '</h3>
';
        echo $output;
    }
    public function check_if_doc_has_tarifarios_for_this_seguro() {
        $data['updated_by'] = $this->session->userdata['medico_name'];
        $id_doctor = $this->session->userdata['medico_id'];
        $data['id_doctor'] = $id_doctor;
        $data['id_seguro'] = $this->input->post('id_seguro');
        $get = array('id_doctor' => $id_doctor, 'id_seguro' => $this->input->post('id_seguro'));
        $data['results'] = $this->model_admin->check_if_doc_has_tarifarios_for_this_seguro($get);
        $this->load->view('admin/tarifarios/doctors/check_if_doc_has_tarifarios_for_this_seguro', $data);
    }
    public function editCentroEmail() {
        $where = array('id_m_c' => $this->input->post('id'));
        $update = array('email' => $this->input->post('email'));
        $this->db->where($where);
        $this->db->update("medical_centers", $update);
    }
    public function check_if_centro_medico_has_tarifarios_already() {
        $data['updated_by'] = ($this->session->userdata['medico_name']);
        $id_c = $this->input->post('id_c');
        $data['id_c'] = $id_c;
        $data['results'] = $this->model_admin->check_if_centro_medico_has_tarifarios_already($id_c);
        $data['updated_by'] = $this->input->post('updated_by');
        $this->load->view('medico/tarifarios/centros/check_if_centro_medico_has_tarifarios_already', $data);
    }
    public function invoice_ars_claim() {
        $data['perfil'] = ($this->session->userdata['medico_perfil']);
        $data['name'] = ($this->session->userdata['medico_name']);
        $id_user = ($this->session->userdata['medico_id']);
        $data['id_user'] = $id_user;
        $data['results'] = $this->model_admin->doc_invoice_ars_claim($id_user);
        $this->load->view('medico/header', $data);
        $this->load->view('medico/billing/invoice_ars_claim/view-all', $data);
    }
    public function billings() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $data['user_id'] = $this->session->userdata['medico_id'];
        $data['controller'] = "medico";
        $this->load->view('medico/header', $data);
        $this->load->view('admin/billing/bill/all-billings');
    }
    public function bills_data() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $id_user = $this->session->userdata['medico_id'];
        $data['id_user'] = $id_user;
        $data['blocked'] = $this->model_admin->CountFactura2BlockedDoc($id_user);
        $data['un_blocked'] = $this->model_admin->CountFactura2UnBlockedDoc($id_user);
        $data['billings'] = $this->model_admin->BillingsDoc($id_user);
        $this->load->view('medico/billing/bill/data', $data);
    }
    public function medical_centers() {
        $perfil = $this->session->userdata['medico_perfil'];
        $data['perfil'] = $perfil;
        $data['name'] = $this->session->userdata['medico_name'];
        $this->load->view('medico/header', $data);
        $data['all_medical_centers'] = $this->model_admin->display_all_medical_centers_docs($this->session->userdata['medico_id'], $perfil);
        $this->load->view('medico/centers/medicos/medical_centers', $data);
    }
    public function health_insurances() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $this->load->view('medico/header', $data);
        $data['all_seguro_medico'] = $this->model_admin->display_all_medical_insurances_docs($this->session->userdata['medico_id']);
        $this->load->view('medico/centers/seguros/health_insurances', $data);
    }
    public function EditSeguroMedico() {
        $data['name'] = $this->session->userdata['medico_name'];
        $id_seguro = $this->uri->segment(3);
        $data['id_seguro'] = $id_seguro;
        $data['ALL_FIELDS'] = $this->model_admin->all_fields();
        $data['EditSeguroMedico'] = $this->model_admin->EditSeguroMedico($id_seguro);
        $this->load->view('medico/centers/seguros/health_insurance', $data);
    }
    public function centro_medico() {
        $data['name'] = $this->session->userdata['medico_name'];
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $id_medical_center = $this->uri->segment(3);
        $data['CENTRO_MEDICO'] = $this->model_admin->display_centro_medico($id_medical_center);
        $data['CENTRO_MEDICO_ESPECIALIDADED'] = $this->model_admin->display_centro_medical_esp($id_medical_center);
        $data['CENTRO_MEDICO_SEGURO'] = $this->model_admin->display_centro_medical_seguro($id_medical_center);
        $data['RESULT_DOCTOR'] = $this->model_admin->get_doctor($id_medical_center);
        $data['CENTRO_PROVINCE'] = $this->db->select('title')->join('medical_centers', 'provinces.id = medical_centers.provincia')->where('id_m_c', $id_medical_center)->limit(1)->get('provinces')->row('title');
        $data['CENTRO_MUNICIPIO'] = $this->db->select('title_town')->join('medical_centers', 'townships.id_town = medical_centers.municipio')->where('id_m_c', $id_medical_center)->limit(1)->get('townships')->row('title_town');
        $data['RESULT_ASDOCTOR'] = $this->model_admin->get_asistente_doctor($id_medical_center);
        $data['hide'] = 1;
        $this->load->view('medico/header', $data);
        $this->load->view('admin/centers/medical_center', $data);
    }
    public function billing_medicos() {
        $data['admin_centro'] = 0;
        $perfil = $this->session->userdata['medico_perfil'];
        $data['perfil'] = $perfil;
        $data['name'] = $this->session->userdata['medico_name'];
        $id_user = $this->session->userdata['medico_id'];
        $data['id_user'] = $id_user;
        $this->load->view('medico/header', $data);
        $search_patients_factura = $this->model_admin->search_patients_facturaDoc($id_user, $perfil);
        $data['contler'] = 'medico';
        $data['search_patients_factura'] = $search_patients_factura;
        $data['count'] = count($search_patients_factura);
        $data['search_date_range_seguro_factura'] = $this->model_admin->search_date_range_seguro_factura($id_user, $perfil);
        if ($this->session->userdata['medico_perfil'] == "Medico") {
            $data['centro'] = $this->model_admin->report_bill_by_date_centro($id_user, $perfil);
        } else {
            $data['centro'] = $this->model_admin->view_as_doctor_centro($id_user);
            $centro = $this->db->select('centro_medico')->where('id_doctor', $this->session->userdata['medico_id'])->get('doctor_centro_medico')->row('centro_medico');
        }
        $this->load->view('admin/billing/bill/create-bill', $data);
    }
    public function get_seguro_date_range() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $id_user = $this->session->userdata['medico_id'];
        $data['id_user'] = $id_user;
        $data['seguro'] = $this->input->post('seguro');
        $data['desde'] = $this->input->post('desde-search');
        $data['hasta'] = $this->input->post('hasta-search');
        $data['centro'] = $this->input->post('centro-search');
        $this->load->view('admin/billing/bill/get_seguro_date_range', $data);
    }
    public function print_billing_report() {
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $desde = $this->uri->segment(3);
        $hasta = $this->uri->segment(4);
        $checkval = $this->uri->segment(5);
        $id_user = $this->uri->segment(6);
        $doctor = $this->uri->segment(7);
        $centro = $this->uri->segment(8);
        $data1 = array('doctor' => $doctor, 'centro' => $centro, 'desde' => $desde, 'hasta' => $hasta, 'id_user' => $id_user, 'checkval' => $checkval, 'perfil' => $this->session->userdata['medico_perfil']);
        $mpdf->AddPage('L');
        $mpdf->setFooter("Página {PAGENO} de {nb}");
        $this->data['centro'] = $centro;
        $this->data['doctor'] = $doctor;
        $this->data['desde'] = $desde;
        $this->data['hasta'] = $hasta;
        $this->data['checkval'] = $checkval;
        if ($checkval == "privado") {
            if ($doctor == 0) {
                $display_report = $this->model_admin->get_fac_date_report_privado($data1);
            } else {
                $display_report = $this->model_admin->get_fac_date_report_centro_privado($data1);
            }
        } else {
            if ($doctor == 0) {
                $display_report = $this->model_admin->get_fac_date_report_general($data1);
            } else {
                $display_report = $this->model_admin->get_fac_date_report_general_centro_privado($data1);
            }
        }
        $this->data['display_report'] = $display_report;
        $this->data['count'] = count($display_report);
        $html = $this->load->view('admin/print/print_billing_report', $this->data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function create_invoice_ars_claim() {
        $data['admin_position_c'] = 0;
        $data['name'] = $this->session->userdata['medico_id'];
        $name = $this->session->userdata['medico_name'];
        $id_user = $this->session->userdata['medico_id'];
        $perfil = $this->session->userdata['medico_perfil'];
        if ($perfil == "Medico") {
            $where = "WHERE seguro_medico !=11 AND medico=$id_user";
            $data['option'] = "<option value='$id_user'>$name</option>";
            $data['where_report'] = "where medico=$id_user";
        } else {
            $data['where_report'] = "where inserted_by=$id_user";
            $data['option'] = "";
            $where = "JOIN doctor_centro_medico ON doctor_centro_medico.centro_medico=factura2.centro_medico WHERE seguro_medico !=11  AND id_doctor=$id_user";
        }
        $data['perfil'] = $perfil;
        $sql1 = "SELECT filter_date FROM factura2 $where  GROUP BY filter_date";
        $data['query1'] = $this->db->query($sql1);
        $sql2 = "SELECT filter_date FROM factura2  $where  GROUP BY filter_date ORDER BY filter_date DESC";
        $data['query2'] = $this->db->query($sql2);
        $data['is_admin'] = "no";
        $area_id = $this->db->select('area')->where('id_user', $id_user)->get('users')->row('area');
        $data['area_id'] = $area_id;
        $data['area'] = $this->db->select('title_area')->where('id_ar', $area_id)->get('areas')->row('title_area');
        $data['id_user'] = $id_user;
        $data['date_range1'] = $this->model_admin->date_range_doctor($id_user, $perfil);
        $data['areas'] = $this->model_admin->get_serv_fac2($id_user, $perfil);
        $data['paciente'] = $this->model_admin->invoicePacienteDoc($id_user, $perfil);
        $data['ars'] = $this->model_admin->ArsDoc($id_user, $perfil);
        $this->load->view('medico/header', $data);
        $this->load->view('medico/billing/invoice_ars_claim/create', $data);
    }
    public function get_fac_ars_by_patient() {
        $patient = $this->input->get('patient');
        $data['patient'] = $patient;
        $medico_id = $this->session->userdata['medico_id'];
        $perfil = $this->session->userdata['medico_perfil'];
        if ($perfil == "Medico") {
            $data['medico'] = $this->session->userdata['medico_id'];
        } else {
            $sql = "SELECT medico FROM factura2 join doctor_centro_medico on doctor_centro_medico.centro_medico= factura2.centro_medico WHERE id_doctor=$medico_id and paciente=$patient";
            $query = $this->db->query($sql);
            $row = $query->row();
            $data['medico'] = $row->medico;
        }
        $data['is_admin'] = $this->input->get('is_admin');
        $data['display_billings'] = $this->model_admin->get_fac_ars_by_patient($patient, $medico_id, $perfil);
        $this->load->view('admin/billing/invoice_ars_claim/get_fac_ars_patient', $data);
    }
    public function import_rates_fac() {
        $data['id_doc'] = $this->uri->segment(3);
        $data['id_seg'] = $this->uri->segment(4);
        $data['decide'] = $this->uri->segment(5);
        $data['created_by'] = $this->session->userdata['medico_name'];
        $this->load->view('medico/tarifarios/excel_import_fac', $data);
    }
    public function import_exel() {
        $id_doc = $this->session->userdata['medico_id'];
        $inserted_date = date("Y-m-d H:i:s");
        $categoria = $this->db->select('area')->where('id_user', $id_doc)->get('users')->row('area');
        $seguro = $this->input->post('seguro');
        $plan = $this->input->post('plan');
        $creaded_by = $this->session->userdata['medico_name'];
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2;$row <= $highestRow;$row++) {
                    $cod = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $sim = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $proced = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $mont = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $data[] = array('codigo' => $cod, 'simon' => $sim, 'procedimiento' => $proced, 'monto' => $mont, 'id_categoria' => $categoria, 'id_seguro' => $seguro, 'plan' => $plan, 'id_doctor' => $id_doc, 'inserted_by' => $creaded_by, 'updated_by' => $creaded_by, 'inserted_date' => $inserted_date, 'updated_date' => $inserted_date);
                }
            }
            $this->excel_import_model->insert($data);
        }
        $id_seguro = $this->db->select('id_seguro')->order_by('id_tarif', 'desc')->limit(1)->get('tarifarios')->row('id_seguro');
        $data = array('codigo' => $this->input->post('codigo_medico'), 'id_seguro' => $id_seguro, 'id_doctor' => $id_doc, 'inserted_by' => $creaded_by, 'updated_by' => $creaded_by, 'updated_time' => $inserted_date, 'inserted_time' => $inserted_date);
        $this->model_admin->save_codigo_contrato($data);
    }
    public function edit_causa() {
        $date = date("Y-m-d H:i:s");
        $id = $this->input->post('ida');
        $data = array('title' => $this->input->post('title'), 'updated_by' => $this->input->post('updated_by'), 'updated_time' => $date,);
        $this->model_admin->edit_causa($id, $data);
    }
    public function update_user() {
        $data['perfil'] = $this->session->userdata['medico_perfil'];
        $data['name'] = $this->session->userdata['medico_name'];
        $id = $this->session->userdata['medico_id'];
		$data['admin_centro']= "";
        $data['especialidades'] = $this->model_admin->getEspecialidades();
        $data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
        $data['agendaDocCentro'] = $this->model_admin->agendaDocCentro($id);
        $data['editUser'] = $this->model_admin->editUser($id);
        $data['id_user'] = $id;
        $data['id_cu_us'] = $id;
        $data['hide'] = "style='display:none'";
        $this->load->view('medico/header', $data);
        $this->load->view('admin/users/update-medico', $data);
    }
    public function saveDoctorUpdate() {
        $id_user = $this->input->post('id_user');
        $agenda = $this->input->post('agenda');
        $name = $this->input->post('nombre');
        $modify_date = date("Y-m-d H:i:s");
        $data = array('name' => $name, 'username' => $this->input->post('user'), 'cell_phone' => $this->input->post('primer_tel'), 'extension' => $this->input->post('extension'), 'cedula' => $this->input->post('cedula'), 'exequatur' => $this->input->post('exequatur'), 'correo' => $this->input->post('email'), 'link_pago' => $this->input->post('link_pago'), 'link_video_conf' => $this->input->post('link_video_conf'), 'update_date' => $modify_date, 'updated_by' => $id_user);
        $this->model_admin->DeactivarUser($id_user, $data);
        $config['upload_path'] = "./assets/update";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("selloimage")) {
            $data = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/update/' . $data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '60%';
            $config['width'] = 362;
            $config['height'] = 90;
            $config['new_image'] = './assets/update/' . $data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $save = array('sello' => $data['file_name'], 'doc' => $id_user);
            $this->db->insert("doctor_sello", $save);
        }
        if ($this->upload->do_upload("logo-tipo")) {
            $data = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/update/' . $data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '60%';
            $config['width'] = 250;
            $config['height'] = 250;
            $config['new_image'] = './assets/update/' . $data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $save = array('sello' => $data['file_name'], 'doc' => $id_user, 'dist' => 1);
            $this->db->insert("doctor_sello", $save);
        }
        $msg = "<h4 id='deletesuccess'  style='text-align:center;color:green'>Doctor se edita con exito .</h4>";
        $this->session->set_flashdata('success_msg', $msg);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function UpdateCita() {
        $id_cita = $this->uri->segment(3);
        $data['name'] = ($this->session->userdata['medico_name']);
        $id_user = ($this->session->userdata['medico_id']);
        $data['FindCita'] = $this->model_admin->FindCita($id_cita);
        $data['causa'] = $this->model_admin->getCausa();
        $data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
        $data['especialidades'] = $this->model_admin->getEspecialidades();
        $data['doctors'] = $this->model_admin->display_all_doctors();
        $this->load->view('medico/pacientes-citas/UpdateCita', $data);
    }
    public function payment_received() {
        $perfil = $this->session->userdata['medico_perfil'];
        $data['perfil'] = $perfil;
        $data['name'] = $this->session->userdata['medico_name'];
        $this->load->view('medico/header', $data);
        $id_doctor = $this->session->userdata['medico_id'];
        $sql = "SELECT * FROM payments WHERE id_doctor=$id_doctor ORDER BY payment_id DESC";
        $data['query'] = $this->db->query($sql);
        $data['id_doctor'] = $id_doctor;
        $this->load->view('medico/payment/payment_received', $data);
    }
    public function readMensages() {
        $perfil = $this->session->userdata['medico_perfil'];
        $data['perfil'] = $perfil;
        $data['name'] = $this->session->userdata['medico_name'];
        $idDoc = $this->session->userdata['medico_id'];
        $where2 = array('message_to' => $idDoc);
        $updateData2 = array('seen' => 1);
        $this->db->where($where2);
        $this->db->update("chat_medico", $updateData2);
        $data['messageFromiD'] = '';
        $data['dataUsers'] = '';
        $data['messageToName'] = "";
        $data['messageFromName'] = '';
        $sql = "SELECT id, message,stime,message_from,message_to,seen FROM chat_medico WHERE message_to=$idDoc ORDER by id DESC";
        $query = $this->db->query($sql);
        $data['query'] = $query;
        $data['messageTo'] = '';
        $data['messageFrom'] = '';
        $this->load->view('mensage/index', $data);
    }
}
