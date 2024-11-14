<?php defined('BASEPATH') or exit('No direct script access allowed');
class Update extends CI_Controller
{


    public function index()
    {
       
$file = './assets/ACTUALIZACION GICRERD.pdf';
$filename = './assets/ACTUALIZACION GICRERD.pdf';
  
// Header content type
header('Content-type: application/pdf');
  
header('Content-Disposition: inline; filename="' . $filename . '"');
  
header('Content-Transfer-Encoding: binary');
  
header('Accept-Ranges: bytes');
  
// Read the file
@readfile($file);
  
  
  
  
  
  
  
     
    }


}