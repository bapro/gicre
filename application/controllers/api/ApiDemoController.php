<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH .'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class ApiDemoController extends RestController 
{
public function __construct()
{
parent::__construct();

$this->load->model('api_model');
$this->load->library('form_validation');
 
}
	public function index_get()
	{
		
		$data = $this->api_model->all_users();
		$this->response($data->result_array(), RestController::HTTP_OK);

	}
	
	
	
		function fetch_single_get($id)
	{
		if($id)
		{
			$data = $this->api_model->fetch_single_user($id);

			foreach($data as $row)
			{
				$output['name'] = $row['name'];
				$output['username'] = $row['username'];
			}
			//echo json_encode($output);
			
			$this->response($output, RestController::HTTP_OK);
			
		}
	}
	
	
	function insert_post()
	{
		$this->form_validation->set_rules('name', 'First Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'name'	=>	$this->input->post('name'),
				'username'		=>	$this->input->post('username')
			);

			  $this->db->insert("users",$data);	
               $insert_id = $this->db->insert_id();
				if($insert_id > 0)
				{
				$this->response([
				'status' => true,
				'message' => 'NEW STUDENT CREATED'
				], RestController::HTTP_OK); 
				}else{
				$this->response([
				'status' => false,
				'message' => 'ALL FIEDS ARE REQUIRED'
				], RestController::HTTP_BAD_REQUEST);
				}
		}
		else
		{
			 $this->response([
                'status' => false,
                'message' => 'ALL FIEDS ARE REQUIRED',
				'name_error'	=>	form_error('name'),
				'username_error'	=>	form_error('username')
            ], RestController::HTTP_BAD_REQUEST);
		}

	}
	
	
	



	public function fetch_update_put($id)
	{
		
		
		
		$this->form_validation->set_data($this->put());
		
		
		
		
		$this->form_validation->set_rules('name', 'First Name', 'required');

		$this->form_validation->set_rules('username', 'Last Name', 'required');
		if($this->form_validation->run())
		{	
			$data = array(
				'name'=>$this->put('name'),
				'username'=>$this->put('username')
			);

			$this->api_model->update_api($id, $data);

				$this->response([
				'status' => true,
				'message' => 'NEW STUDENT UPDATED'
				], RestController::HTTP_OK); 
		}
		else
		{
			 $this->response([
                'status' => false,
                'message' => 'ALL FIEDS ARE REQUIRED',
				'name_error'	=>	form_error('name'),
				'username_error'	=>	form_error('username')
            ], RestController::HTTP_BAD_REQUEST);
		}

	}




	function delete_data_delete($id)
	{
		if($id)
		{
			if($this->api_model->delete_single_user($id))
			{
				 $this->response([
                'status' => true,
                'message' => 'STUDENT DELETED'
            ], RestController::HTTP_OK); 
			}
			else
			{
				 $this->response([
                'status' => false,
                'message' => 'FAILED TO DELETE STUDENT'
            ], RestController::HTTP_BAD_REQUEST);
			}
			
		}
	}








	
}

?>