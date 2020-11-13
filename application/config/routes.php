<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin/historial_medical_past/(:num)/(:num)(:num)/(:num)/(:num)/(:num)'] = 'admin/historial_medical_past/$1/$2/$3/$4/$5/$6';
