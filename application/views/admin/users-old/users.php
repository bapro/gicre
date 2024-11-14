<?php $id_admin=$this->session->userdata['admin_id']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="<?=base_url();?>assets/css/passwordscheck.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />

</head>
<body>

 <?php
        $this->load->view('admin/header_admin');
 ?>

 <div class="container">
  <div class="row">

 <div class="col-md-12">
 <div class="col-md-3">
 <span class="hide-mes-pas"><?php echo $this->session->flashdata('msg_pass'); ?></span>
<a style="color:red" href="<?php echo site_url("admin/changePassw/$id_admin");?>" data-toggle="modal"   data-target="#changepassw" ><i class="fa fa-pencil"></i>  Cambiar Contraseña</a>
 </div>

 </div>


</div>

 <?php echo $this->session->flashdata('success_msg'); ?>


 <hr id="hr_ad"/>
<a class="btn btn-primary btn-xs st"    href="<?php echo site_url('admin/create_user');?>">Registrar Usuario</a><br/><br/>
 <div class="col-md-12">
  <div class="col-md-3"  style="max-height:150vh;overflow-x:auto">
<?php
if($admin_centro){
$cuenta="SELECT name,users.id_user,payment_plan,is_log_in,last_login_time,login_time,status FROM users 
RIGHT JOIN user_centro_administrativo ON users.id_user=user_centro_administrativo.id_user 
WHERE id_centro =$admin_centro && payment_plan >0  ORDER BY is_log_in DESC";
$cuenta_query=$this->db->query($cuenta);

}else{
$cuenta="SELECT name,id_user,payment_plan,is_log_in,last_login_time,login_time,status FROM users WHERE payment_plan >0 ORDER BY is_log_in DESC";
$cuenta_query=$this->db->query($cuenta);
}
?>
 <h4>MEDICOS CON PLAN DE PAGO</h4> 
 <em>Total <?=$cuenta_query->num_rows()?></em>
 
<input type="text" id="search-payed-users" value="">
 <?php
 
  $i=1;
   foreach($cuenta_query->result() as $rowcuento)
   {
	$product=$this->db->select('plan,precio')->where('id',$rowcuento->payment_plan)->get('medico_precio_plan')->row_array();
$agda=$this->db->select('id_doctor')->where('id_doctor',$rowcuento->id_user)->get('doctor_agenda_test')->row('id_doctor');
	if($agda){
		$say='Hay centro medico afectado';
		
	}else{
		$say='<font style="color:red">No hay centro medico afectado</font>';
	}


	if($rowcuento->is_log_in==1){
 $login_t= date("H:i:s", strtotime($rowcuento->login_time));
$userlogin=
'
<img title="conectado desde '.$login_t.'" style="width:13px;color:green" src="'.base_url().'/assets/img/eligibility-jump.png"  />
';
}
else{
	$login_ot= date("d-m-Y H:i:s", strtotime($rowcuento->last_login_time));
	if($rowcuento->last_login_time=="0000-00-00 00:00:00"){$login_ot="";}else{$login_ot="$login_ot";}
$userlogin='<img title="desconectado desde '.$login_ot.'"  style="width:13px;" src="'.base_url().'/assets/img/user-off-line.png"  />';
}

    
	   ?>
   <div class='alert alert-info tag_p'  data-search-term="<?=$rowcuento->name?>" data-tag="<?=$rowcuento->name?>">
   <?php echo $i;$i++ ?>- <strong><a style='text-transform:uppercase' href="<?php echo site_url("admin/update_user/$rowcuento->id_user/1")?>"><?=$rowcuento->name?> </a></strong><?=$userlogin?></br>plan <?=$product['plan']?>  $<?=$product['precio']?> USD<br/><?=$say?></br>
<?php if($rowcuento->status==0)
			{
			?>
			<a class='btn btn-primary btn-xs' href="<?php echo site_url("admin/ActivarUser/".$rowcuento->id_user); ?>">Activar<a>

			<?php
			}

			else {
				?>

		<a class="btn btn-danger btn-xs"  href="<?php echo site_url("admin/DeactivarUser/".$rowcuento->id_user); ?>">Desactivar</a>

			<?php
			}
			?>
   
   </div>
	   
	   <?php
   }
   $catot=$this->db->select('perfil')->get('users');
	   ?>
	
	   </div>
  
<div class="col-md-9">	
 <h4>USUARIOS POR PERFILES (<?=$catot->num_rows();?>)</h4>
<div  style="overflow-x:auto">


<?php

$cadmin=$this->db->select('perfil')->where('perfil','Admin')->get('users');
$camed=$this->db->select('perfil')->where('perfil','Medico')->get('users');
$caamed=$this->db->select('perfil')->where('perfil','Asistente Medico')->get('users');
$caaumed=$this->db->select('perfil')->where('perfil','Auditoria Medica')->get('users');
$vendedors=$this->db->select('perfil')->where('perfil','Vendedor')->get('users');
$farma=$this->db->select('perfil')->where('perfil','Farmacia')->get('users');



if($admin_centro){
	
	 $sql_adm="SELECT * FROM users WHERE perfil='Admin' ORDER BY is_log_in DESC";
	$query_adm=$this->db->query($sql_adm);
	$num_adm = $query_adm->num_rows();
	
	$sql_as_adtivo="SELECT * FROM users
	RIGHT JOIN user_centro_administrativo ON users.id_user=user_centro_administrativo.id_user 
	WHERE id_centro =$admin_centro ORDER BY is_log_in DESC";
	$query_advos=$this->db->query($sql_as_adtivo);
	$num_advos = $query_advos->num_rows();
	
	
	$sql_medicos ="SELECT * FROM users 
	RIGHT JOIN doctor_agenda_test ON users.id_user=doctor_agenda_test.id_doctor 
	WHERE id_centro =$admin_centro  GROUP BY id_doctor ORDER BY is_log_in DESC";
	$query_medicos=$this->db->query($sql_medicos);
	$num_medicos = $query_medicos->num_rows();
	
	$sql_as_medicos ="SELECT * FROM users 
	RIGHT JOIN doctor_centro_medico ON users.id_user=doctor_centro_medico.id_doctor 
	WHERE centro_medico =$admin_centro GROUP BY id_doctor ORDER BY is_log_in DESC";
	$query_as_medicos=$this->db->query($sql_as_medicos);
	$num_as_medicos = $query_as_medicos->num_rows();
	$hide_adtivo="style='display:none'";
	
}else{
	
	 $sql_adm="SELECT * FROM users
	 WHERE id_user NOT IN(SELECT id_user FROM user_centro_administrativo) && perfil='Admin' && id_user !=1 ORDER BY is_log_in DESC";
	$query_adm=$this->db->query($sql_adm);
	$num_adm = $query_adm->num_rows();
	
	 $sql_as_adtivo="SELECT * FROM users
	RIGHT JOIN user_centro_administrativo ON users.id_user=user_centro_administrativo.id_user 
	WHERE users.id_user !=1  ORDER BY is_log_in DESC";
	$query_advos=$this->db->query($sql_as_adtivo);
	$num_advos = $query_advos->num_rows();
	
    $sql_medicos="SELECT * FROM users WHERE payment_plan =0 &&  perfil='Medico' ORDER BY is_log_in DESC";
	$query_medicos=$this->db->query($sql_medicos);
	$num_medicos = $query_medicos->num_rows();
	
    $sql_as_medicos="SELECT * FROM users WHERE perfil='Asistente Medico' ORDER BY is_log_in DESC";
	$query_as_medicos=$this->db->query($sql_as_medicos);
	$num_as_medicos = $query_as_medicos->num_rows();
    $hide_adtivo="";	
	
}

?>
<ul class="nav nav-tabs">
<li  class="active"><a data-toggle="tab" href="#medicos">MEDICOS (<?=$num_medicos ?>)</a></li>
  <li><a  data-toggle="tab" href="#asistente-medicos">ASISTENTE MEDICOS (<?=$num_as_medicos ?>)</a></li>
<li><a data-toggle="tab" href="#administrativo">ADMINISTRATIVO (<?=$num_advos ?>)</a></li>
  <li <?=$hide_adtivo?>><a data-toggle="tab" href="#admin">ADMIN (<?=$num_adm ?>)</a></li>
 </ul>
  <div class="tab-content">
  
    <div  id="administrativo" class="tab-pane fade in">
 <?php
 $data['queries']=$query_advos;
   $center_name= $this->db->select('name')->where('id_m_c',$admin_centro)->get('medical_centers')->row('name');
  $data['user_perf']="Administrativo<br/> <em>$center_name</em>";

 $this->load->view('admin/users/users-data', $data);
 ?>
</div>
  
   <div  id="medicos" class="active tab-pane fade in">
 <?php
 $data['queries']=$query_medicos;
   $data['user_perf']="Medico";
 $this->load->view('admin/users/users-data', $data);
 ?>
</div>
<div  id="asistente-medicos" class="tab-pane fade in">
 <?php
 $data['queries']=$query_as_medicos;
 $data['user_perf']="Asistente Medico";
 $this->load->view('admin/users/users-data', $data);
 ?>
</div>

<div  id="admin" class="tab-pane fade in">
 <?php
 $data['queries']=$query_adm;
 $data['user_perf']="Admin";
 $this->load->view('admin/users/users-data', $data);
 ?>
</div>
 </div>
</div>
</div>	
   <div class="col-md-4" style="overflow-x:auto">



 </div>


<hr/>
 <div class="row">
 <div class="col-md-12">
<a class="btn btn-primary btn-xs st"    href="<?php echo site_url('admin/create_user');?>">Registrar Usuario</a><br/><br/>
  </div>
</div>
</div>

<div class="modal fade" id="changepassw" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>


<div class="modal fade" id="account-extent" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>



  <div class="modal fade" id="verLocation" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>



</div>





 <?php


        $this->load->view('admin/footer');
 $this->load->view('admin/modal');

 ?>


 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript">


	$( document ).ready(function() {
	$('#changepassw').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	});

	$('#account-extent').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	});

	$('#verLocation').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	});

 setTimeout(function() {
    $('.hide-mes-pas').fadeOut('slow');
}, 2000);




$('#search-payed-users').on('keyup', function() {
  // Search text
  var text = $(this).val();
 
  // Hide all content class element
  $('.tag_p').hide();

  // Search and show
  $('.tag_p:contains("'+text+'")').show();
 
 });
 
 


 $.expr[":"].contains = $.expr.createPseudo(function(arg) {
  return function( elem ) {
   return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
  };
  })
  
  
});


 </script>
   </body>
</html>
