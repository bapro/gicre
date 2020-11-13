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

<style>

td,th{text-align:left}

</style>
</head>
<!-- *** welcome message modal box *** -->

 <?php
        $this->load->view('admin/header_admin');
 ?>
<body >
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
  <div class="col-md-4"  style="max-height:200vh;overflow-x:auto">
  <?php
   $cuenta="SELECT name,id_user,payment_plan,is_log_in,last_login_time,login_time,status FROM users WHERE payment_plan >0 ORDER BY is_log_in DESC";
  $cuenta_query=$this->db->query($cuenta);
  ?>
 <h5 class=''>MEDICOS CON PLAN DE PAGO</h5>
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
	   ?>
	<hr/>
	    
<input id="search-plazo" placeholder="buscar" class="form-control"/>

  <div id='plazo-ago'></div>
	</div>
<div class="col-md-8">	
<div  style="overflow-x:auto">

<table  class="table"  cellspacing="0">
<?php
$catot=$this->db->select('perfil')->get('users');
$cadmin=$this->db->select('perfil')->where('perfil','Admin')->get('users');
$camed=$this->db->select('perfil')->where('perfil','Medico')->get('users');
$caamed=$this->db->select('perfil')->where('perfil','Asistente Medico')->get('users');
$caaumed=$this->db->select('perfil')->where('perfil','Auditoria Medica')->get('users');
$vendedors=$this->db->select('perfil')->where('perfil','Vendedor')->get('users');
$farma=$this->db->select('perfil')->where('perfil','Farmacia')->get('users');
?>
 <tr style="background:#5957F7;color:white">
 <th colspan="12">USUARIOS POR PERFILES (<?=$catot->num_rows();?>)</th>
 </tr>
<tr>
<th>Admin (<?=$cadmin->num_rows();?>)</th><td></td>
<th>Medicos (<?=$camed->num_rows();?>)</th><td></td>
<th>Asis. Medicos (<?=$caamed->num_rows();?>)</th><td></td>
<th>Auditoria Medidco (<?=$caaumed->num_rows();?>)</th><td></td>
<th>Vendedores (<?=$vendedors->num_rows();?>)</th><td></td>
<th>Farmacia (<?=$farma->num_rows();?>)</th>
</tr>
</table>
 <table id="example" class="table table-striped table-bordered" style="margin:auto" cellspacing="0">
    <thead>
    <tr style="background:#5957F7;color:white">
	<th  style="width:1px">#</th>
	   <th  style="width:6px">Nombres</th>
	   <th style="width:1px">Con.</th>
	  <th style="width:2px">Perfil</th>
		<th style="width:2px">Status</th>
		 <th style="width:1px">Acciones</th>
     </tr>
    </thead>
    <tbody>
    <?php

$sql="SELECT * FROM users WHERE payment_plan =0 && id_user !=1 ORDER BY is_log_in DESC";
$query=$this->db->query($sql);

foreach($query->result() as $row)
	 {
		 //<a  data-toggle="modal" href="'.base_url().'/admin/userLocation/'.$row->id_user.'"  data-target="#verLocation"  title="Ubicación del usuario"><i style="color:red" class="fa fa-map-marker"></i></a>

	$miembro_desde= date("d-m-Y", strtotime($row->insert_date));
	if($row->is_log_in==1){
 $login_t= date("H:i:s", strtotime($row->login_time));
$userlogin=
'
<img title="conectado desde '.$login_t.'" style="width:20px;color:green" src="'.base_url().'/assets/img/eligibility-jump.png"  />
';
}
else{
	$login_ot= date("d-m-Y H:i:s", strtotime($row->last_login_time));
	if($row->last_login_time=="0000-00-00 00:00:00"){$login_ot="";}else{$login_ot="$login_ot";}
$userlogin='<img title="desconectado desde '.$login_ot.'"  style="width:20px;" src="'.base_url().'/assets/img/user-off-line.png"  />';
}

	 if($row->status==0)
		 {
			 $status="Desactivado";
			 }
	if($row->status==1){
		 $status="Activado";
		 }
		 $title_area= $this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');
		
		if($row->perfil=="Medico")
		 {
			$perfil=1;

		 }
		 else if ($row->perfil=="Asistente Medico"){
		$perfil=2;
		 }

         else if ($row->perfil=="Técnico de lentes"){
		$perfil=4;
		 }
        
     else {$vence="";$title_area="";$perfil=3;}

	 ?>
        <tr>
		<td><?=$row->id_user;?></td>
		<td style="text-transform:uppercase" title="Miembro desde <?=$miembro_desde?>">
		<?=$row->name;?> <i style="font-size:12px;color:blue" class="fa fa-info"></i>
		</td>
		<td><span style="visibility:hidden"><?=$row->is_log_in?></span><?=$userlogin;?></td>
		<td><?=$row->perfil;?> <?=$title_area;?></td>
		<td><?=$status;?></td>
           <td>
		 <a  class="btn btn-primary btn-xs"  href="<?php echo site_url("admin/update_user/$row->id_user/$perfil")?>">Editar</a>
		<?php if($row->status==0)
			{
			?>
			<a class href="<?php echo site_url("admin/ActivarUser/".$row->id_user); ?>">Activar<a>

			<?php
			}

			else {
				?>

		<a class="btn btn-danger btn-xs"  href="<?php echo site_url("admin/DeactivarUser/".$row->id_user); ?>">Desactivar</a>

			<?php
			}
			?>

	</td>
        </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>

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
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

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



/*$("#current_login").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

 setInterval(function(){
  $('#current_login').load("<?php echo base_url('admin/current_login')?>").fadeIn("slow");
 }, 1000);*/




 load_data();
 function load_data(query)
 {
$.ajax({
   url:"<?php echo base_url(); ?>admin/searchPlazo",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#plazo-ago').html(data);
   },
    error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
 $('#plazo-ago').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
   })
 }




  $('#search-plazo').keyup(function(){

  var search = $(this).val();
  if(search !=""){
     load_data(search);
   }else{
     load_data();
   }

});

$('#search-payed-users').on('keyup', function() {
  // Search text
  var text = $(this).val();
 
  // Hide all content class element
  $('.tag_p').hide();

  // Search and show
  $('.tag_p:contains("'+text+'")').show();
 
 });
 
 





$('#search-payed-users').on('keyup', function() {
 
  // Search text
  var text = $(this).val();
  // Search 
  $('.tag_p .title:contains("'+text+'")').closest('.tag_p').show();
 
 });
 $.expr[":"].contains = $.expr.createPseudo(function(arg) {
  return function( elem ) {
   return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
  };
  })
  
  
});


 </script>

</html>
