<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rejuvenate_api_run extends CI_Controller {

function index()
 {
  $this->load->view('rejuvenate/index');
 }

 function action()
 {
  if($this->input->post('data_action'))
  {
   $data_action = $this->input->post('data_action');

  

   if($data_action == "fetch_single")
   {
    $api_url = "http://localhost/gicre/rejuvenate_api/fetch_single";

    $form_data = array(
     'id'  => $this->input->post('user_id')
    );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;

 }







 if($data_action == "fetch_single_search")
   {
    $api_url = "http://localhost/gicre/rejuvenate_api/fetch_single";

    $form_data = array(
     'id'  => $this->input->post('user_id')
    );

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_POST, true);

    curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    echo $response;

 }











  if($data_action == "fetch_all")
   {
    $api_url = "http://localhost/gicre/rejuvenate_api/";

    $client = curl_init($api_url);

    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    curl_close($client);

    $result = json_decode($response);

    $output = '';

    if(count($result) > 0)
    {
     foreach($result as $row)
     {
      $output .= '
      <tr>
       <td>'.$row->nombre.'</td>
       <td>'.$row->cedula.'</td>
       <td><butto type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id_p_a.'">Edit</button></td>
       <td></td>
      </tr>

      ';
     }
    }
    else
    {
     $output .= '
     <tr>
      <td colspan="4" align="center">No Data Found</td>
     </tr>
     ';
    }

    echo $output;
   }
  }
 } 
  
  
  
  
  
  
  
  
  
  
  
  
  

  }
 
 


?>