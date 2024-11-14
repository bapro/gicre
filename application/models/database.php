<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	/*'hostname' => '10.0.0.9',
	'username' => 'root',
	'password' => '15150979',
	'database' => 'jce',*/
	
	/*'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'admedica_version2',*/
	'hostname' => 'localhost',
	'username' => 'admedica_2c0',
	//'password' => 's?CEX~h!=*e)',
	'password' => 'Mm$HL&T_tRHH',
	'database' => 'admedica_2c0',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

//padron

$db['padron'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'admedica_padf',
	'password' => 'Nof[tD9DU!Q@',
	'database' => 'admedica_padronfeb2020',
	/*'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'padron',*/
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);



$db['clinical_history'] = array(
	'dsn'   => '',
	'hostname' => 'localhost',
	'username' => 'admedica_histc',
	'password' => 'e_1D^aOJBBzv',
	'database' => 'admedica_clinical_history',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
