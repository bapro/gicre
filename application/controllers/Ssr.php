<?php
    class Ssr extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->ID_USER = $this->session->userdata('sessionIdUuser');
			 $this->ID_CENTRO = $this->session->userdata('id_centro');
            $this->ID_PATIENT = $this->session->userdata('id_patient');
			  $this->clinical_history = $this->load->database('clinical_history',TRUE);
        }


        public function form()
        {
            $this->load->library("user_register_info");
            $page = $this->input->get('page');
            $data['ssr_data'] = $this->input->get('signo');
            $query_ex_uro = $this->clinical_history->query("SELECT * FROM  h_c_ant_ssr WHERE id=$page");
            $data['query_ssr'] = $query_ex_uro->result();
            $this->load->view('clinical-history/ginecology/ssr/form', $data);
          echo "<script>
		  $('.spinner-border').hide();
		  
		   if ($('#' + $page + '_fecha_ul_m').val() != '') {
      calculateFechaUlPap($page);
    }
	
  var isSexual = $('input:radio[name=' + $page + '_optradio]:checked').val();
			
if(isSexual=='No'){
 $('.disabled-all-fields-ha-tenido-re-sex textarea').val('');
	  $('.disabled-all-fields-ha-tenido-re-sex input').val('');
	  $('.disabled-all-fields-ha-tenido-re-sex select').val('');
				$('.disabled-all-fields-ha-tenido-re-sex input').prop('checked', 0);
				$('.disabled-all-fields-ha-tenido-re-sex input').prop('disabled', 1);
				$('.disabled-all-fields-ha-tenido-re-sex textarea').prop('disabled', 1);
				$('.disabled-all-fields-ha-tenido-re-sex select').prop('disabled', 1);	
}
	
	  </script>";
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
                'utilizo' => $this->input->post('utilizo'),
                'sexual2' => $this->input->post('sexual2'),
                'planif' => $this->input->post('planif'),
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
				'inserted_by' => $this->ID_USER,
				'inserted_time' => date("Y-m-d H:i:s"),
                'updated_by' => $this->ID_USER,
                'updated_time' => date("Y-m-d H:i:s")
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
    }
