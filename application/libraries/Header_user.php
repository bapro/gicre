<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_user {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				
					    $this->NEC_PRO =$this->CI->session->userdata('NEC_PRO');
						$this->PERFIL =$this->CI->session->userdata('user_perfil');
						$this->ID_USER =$this->CI->session->userdata('user_id');
						$this->USER_NAME =$this->CI->session->userdata('user_name');
						$this->IS_ADMINISTRATIVO =$this->CI->session->userdata('admin_position_centro');
						$this->CI->load->model('model_admin');
						//$this->CI->load->library('create_forms');
						$this->CI->load->model('navigation/account_demand_model');
						$this->controller = $this->CI->session->userdata('USER_CONTROLLER');
						$this->CI->clinical_history = $this->CI->load->database('clinical_history',TRUE);
						//if($this->CI->session->userdata('is_logged_in')=='')
						//{
						//$this->CI->session->set_flashdata('msg','Please Login to Continue');
						//redirect('login');
						//}
        }


function headerAdmin($id_user)
	{
		$userInf = $this->CI->model_admin->editUser($id_user);
		if($userInf){
     foreach($userInf as $rowInf)

		$user_c18 = $this->CI->db->select('name')->where('id_user', $rowInf->inserted_by)->get('users')->row('name');
		$user_c19 = $this->CI->db->select('name')->where('id_user', $rowInf->updated_by)->get('users')->row('name');


		$inserted_time = date("d-m-Y H:i:s", strtotime($rowInf->insert_date));
		$updated_time = date("d-m-Y H:i:s", strtotime($rowInf->update_date));
		$data['creation_info'] = "fue registrado(a) por $user_c18 el $inserted_time y modificado(a) por $user_c19 el $updated_time";
		$data['controller'] ='admin';
		$data['user_perfil'] ='Admin';
		$data['user_name'] =$this->CI->session->userdata('user_name');
		$this->CI->load->view('header', $data);
		}else{
			redirect("login");
		}
	}
	function headerMedico($id_user)
	{
		
		
		$update = array(
            'singular_id' => 0,
			'printing' => 0,
        );
		
		$this->CI->clinical_history->where('operator', $id_user);
		   $this->CI->clinical_history->update('h_c_indicaciones_medicales',$update);
		   
		   $update2 = array(
            'singular_id' => 0,
			'printing' => 0,
        );
		 
		$this->CI->clinical_history->where('operator', $id_user);
		   $this->CI->clinical_history->update('h_c_indications_labs',$update2);
		
		
		$userData = $this->CI->db
			->select("id_user,name, plazo,cuenta_gratis,payment_plan,inserted_by,updated_by,insert_date,update_date,cedula,exequatur,correo,cell_phone,extension,whatsapp_link")
			->where("id_user", $id_user)
			->get("users")
			->row_array();
			
		if ($userData["cuenta_gratis"] == 0) {
			$account_info = '
  <strong>Cuenta gratuita !</strong>
';
		} else {
			if ($userData["payment_plan"] == 1) {
				$termDate1 = date("Y-m-d", strtotime($userData["plazo"] . " + 31 days"));
				$termDate = date("d-m-Y", strtotime($termDate1));
				$contradate = date("d-m-Y", strtotime($userData["plazo"]));
				$account_info = "
Cuenta mensual, fecha inicial: $contradate, <span class='text-danger'>fecha de vencimiento: $termDate</span>!
";
				$delay = date("d-m-Y", strtotime($userData["plazo"] . " + 31 days"));
				$start = date_create(date("Y-m-d", strtotime($delay)));
				$end = date_create();
				$diff = date_diff($start, $end);
				$delay = "<span style='color:red;text-transform:lowercase'>le quedan $diff->days días</span> ";
			} else {
				$termDate1 = date("Y-m-d", strtotime($userData["plazo"] . " + 365 days"));
				$termDate = date("d-m-Y", strtotime($termDate1));
				$contradate = date("d-m-Y", strtotime($userData["plazo"]));
				$account_info = "
 Cuenta anual, fecha inicial: $contradate, <span class='text-danger'>fecha de vencimiento: $termDate</span>!
";
				$delay = date("d-m-Y", strtotime($userData["plazo"] . " + 365 days"));
				$start = date_create(date("Y-m-d", strtotime($delay)));
				$end = date_create();
				$diff = date_diff($start, $end);
				$delay = "<span style='color:red;text-transform:lowercase'>le quedan $diff->days días</span> ";
			}
		}

		$data['controller'] = $this->CI->session->userdata('USER_CONTROLLER');
		$data['perfil'] = $this->CI->session->userdata('user_perfil');
		$data['user_name'] = $this->CI->session->userdata('user_name');
		$data['user_perfil'] = $this->CI->session->userdata('user_perfil');
		$data['doctor_especialidad'] = $this->CI->db->select('title_area')->join('areas', 'users.area = areas.id_ar')->where('id_user', $id_user)->limit(1)->get('users')->row('title_area');


		$user_c18 = $this->CI->db->select('name')->where('id_user', $userData['inserted_by'])->get('users')->row('name');
		$user_c19 = $this->CI->db->select('name')->where('id_user', $userData['updated_by'])->get('users')->row('name');


		$inserted_time = date("d-m-Y H:i:s", strtotime($userData['insert_date']));
		$updated_time = date("d-m-Y H:i:s", strtotime($userData['update_date']));
		$data['creation_info'] = "fue registrado(a) por $user_c18 el $inserted_time y modificado(a) por $user_c19 el $updated_time";

		$first_inserted_hist = $this->CI->clinical_history->select('inserted_time')->where('inserted_by', $id_user)->where('signopsis !=', "")->order_by('id', 'ASC')->limit(1)->get('h_c_enfermedad_actual')->row('inserted_time');
		$data['first_inserted_hist'] = $first_inserted_hist;
		$data['ID_USER'] = $id_user;
		$data['userData'] = $userData;
		$data['account_info'] = $account_info;

		//[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors, $result_seguro_medicos_no_select] = $this->CI->create_forms->getCentroAndSeguroByPerfil($idCentro);
		//$data['result_seguro_medicos'] = $result_seguro_medicos;
		//$data['result_centro_medicos'] = $result_centro_medicos;
		//$data['result_seguro_medicos_no_select'] = $result_seguro_medicos_no_select;
		$this->CI->load->view('header', $data);
	}


	function headerInternalDrug($id_user, $CENTRO_INFO)
	{
		$userData = $this->CI->db
			->select("id_user,name, plazo,cuenta_gratis,payment_plan,inserted_by,updated_by,insert_date,update_date,cedula,exequatur,correo,cell_phone,extension")
			->where("id_user", $id_user)
			->get("users")
			->row_array();
			 $data['userData']=$userData;
			  $data['first_inserted_hist']='';
    	$user_c18 = $this->CI->db->select('name')->where('id_user', $userData['inserted_by'])->get('users')->row('name');
		$user_c19 = $this->CI->db->select('name')->where('id_user', $userData['updated_by'])->get('users')->row('name');
        $data['CENTRO_INFO']=$CENTRO_INFO;

		$inserted_time = date("d-m-Y H:i:s", strtotime($userData['insert_date']));
		$updated_time = date("d-m-Y H:i:s", strtotime($userData['update_date']));
		$data['creation_info'] = "fue registrado(a) por $user_c18 el $inserted_time y modificado(a) por $user_c19 el $updated_time";
		$data['controller'] ='internal_pharmacy';
		$data['user_perfil'] ='Farmacia Interna';
		$data['user_name'] =$this->CI->session->userdata('user_name');
		$this->CI->load->view('header-internal-pharma', $data);
	}

}
				
