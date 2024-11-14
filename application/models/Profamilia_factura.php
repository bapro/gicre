<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Profamilia_factura extends CI_Model
{
 var $table = 'rendez_vous';

 var $column_search = array("id_patient");  
     var $column_order = array(null, "id_patient");
    // $this->order = array('FECHA_NAC' => 'asc');
	
  private $profamilia_fact;
  function __construct()
  {
 parent::__construct();
    $this->profamilia_fact = $this->load->database('profamilia',TRUE);
  }
  
  //-------------------------------------------------------------------------------------------------------------------------------
 

}
