	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Update_user extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model("model_admin");
}

	
	
	public function updateUserAdmin(){
	
	$where = array(
	'is_admin' => 1
	);
		$update = array(
		'perfil' => ""
		);
		$this->db->where($where);
		$this->db->update("users", $update);
		
}



	public function updateUserAdminBack(){
	
	$where = array(
	'is_admin' => 1
	);
		$update = array(
		'perfil' => "Admin"
		);
		$this->db->where($where);
		$this->db->update("users", $update);
		
}






public function exportCSVbill1(){
$data['users'] = $this->model_admin->Users();
$this->load->view('admin/historial-medical1/show-patient-medica-medT.php', $data);
}

// Export data in CSV format
  public function exportCSVbill(){
   // file name
   $filename = 'users_'.date('Ymd').'.csv';
   header("Content-Description: File Transfer");
   header("Content-Disposition: attachment; filename=$filename");
   header("Content-Type: application/csv; ");

   // get data
   $usersData = $this->model_admin->exportCSVbill();

   // file creation
   $file = fopen('php://output', 'w');

   $header = array("id_user","name","last_name","username", "password","perfil","correo","exequatur","cell_phone","extension","cedula","area","user_ars","insert_date","update_date","status","codigo_seguriad","inserted_by","updated_by","is_log_in","login_time","last_login_time","id_as_m_med", "plazo", "payment_plan", "cuenta_gratis", "link_pago", "link_video_conf", "webs_passvarchar", "affiliated",  "id_p_a", "last_page_visited", "whatsapp_link", "is_admin");
   fputcsv($file, $header);
   foreach ($usersData as $key=>$line){
     fputcsv($file,$line);
   }
   $this->db->empty_table('users');
   fclose($file);
   exit;

  }	
	







}