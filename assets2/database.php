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
	'username' => 'admedica_webv2',
	//'password' => 's?CEX~h!=*e)',
	'password' => 'i,h[MMAg#(WO',
	'database' => 'gicre',
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
	'username' => 'admedica_webv2',
	'password' => 'i,h[MMAg#(WO',
	'database' => 'admedica_padrondominicano',
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
