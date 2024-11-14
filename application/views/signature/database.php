<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	/*'username' => 'admedica_2c0',
	'password' => 'Mm$HL&T_tRHH',
	'database' => 'admedica_2c0',*/
	
	'username' => 'admedica_gicrev2',
	'password' => 'FQpg+YuS?K7j',
	'database' => 'admedica_gicre_v2',
	
	
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
	/*'username' => 'admedica_histc',
	'password' => 'e_1D^aOJBBzv',
	'database' => 'admedica_clinical_history',*/
	
	'username' => 'admedica_gicrev2',
	'password' => 'FQpg+YuS?K7j',
	'database' => 'admedica_gicre_histmed_v2',
	
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


/*$db['gicre_version2'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'admedica_gicrev2',
	'password' => 'FQpg+YuS?K7j',
	'database' => 'admedica_gicre_v2',
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



$db['gicre_hismed_version2'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'admedica_gicrev2',
	'password' => 'FQpg+YuS?K7j',
	'database' => 'admedica_gicre_histmed_v2',
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
);*/

