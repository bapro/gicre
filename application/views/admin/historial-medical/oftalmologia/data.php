<style>
input.rem{background:none;border:none}
#bthide{visibility:hidden}
</style>
<div class="not-stuck" style="background:#E6E6FA;margin-top:5%">
<div class="container">
 <span class="loading" style="display: none;"><span class="content"><img src="<?php echo base_url().'assets/img/loading.gif';  ?>"/></span></span>
 
 <button  style="margin-top:3%;margin-left:68%;color:blue" class="btn-sm historial_save" id="submit"  ><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
		 <?php
if(!empty($posts)): foreach($posts as $row):
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row['inserted_time'])));	

		
 ?>
 <div class="row" style="margin-top:14%">


<div class="post-list" id="postList">

<div class="col-md-12" style="border-bottom: 2px groove #38a7bb;">
<div class="col-md-12">
 <button  class="btn-sm btn-success " onclick="window.location.href='<?php echo site_url("admin/createOftalmologia/".$row['id_historial']); ?>'"  ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Oftalmologia </button>
  <br/> <br/>
 </div>
<div class="col-md-7" >

<!-- <?php echo $this->session->flashdata('success_rehabilitacion'); ?>-->
<p class=" h4 his_med_title"  >oftalmologia # <?=$row['id_oftal'] ?></p>
</div>
<div class="col-md-5" >
Ingresado por <?=$row['inserted_by']?> al <?=$insert_date  ?>
</div>
</div>


<div class="col-md-12" >
<table class="table">
<tr>
<th></th><th>Sin Correccion</th><th>Cerca</th><th>Con Correccion</th><th>Cerca</th><th>Correccion Actual</th>
<tr>
<tr>
<th>OD</th><td><?=$row['sin_con_od']?></td><td><?=$row['cerca_od']?></td><td><?=$row['con_cor_od']?></td><td><?=$row['cerca1_od']?></td><td><?=$row['cor_act_od']?></td>
</tr>
<tr>
<th>OS</th><td><?=$row['sin_con_os']?></td><td><?=$row['cerca_os']?></td><td><?=$row['con_cor_os']?></td><td><?=$row['cerca1_os']?></td><td><?=$row['cor_act_os']?></td>
</tr>
</table>

</div>



<div class="col-xs-12">
<hr class="title-highline-top"/>
<div class="col-xs-8">
<h5 class="col-xs-offset-5">RETINOSCOPIA<h5>
</div>
<div class="col-xs-4">
<h5 class="">BALANCE MUSCULAR<h5>
</div>
</div>
<div class="col-xs-12">
<div class="col-xs-4">
<table>
<tr >
<td style="border-right:2px solid #38a7bb"><input type="text" class="form-control rem" value="<?=$row['retine1']?>"/></td><td><input type="text" class="form-control rem" value="<?=$row['retine2']?>"/></td>
</tr>
<tr>
<td style="border-right:2px solid #38a7bb;border-top:2px solid #38a7bb"><input type="text" class="form-control rem" value="<?=$row['retine3']?>"/></td><td  style="border-top:2px solid #38a7bb"><input type="text" class="form-control rem" value="<?=$row['retine4']?>"/></td>
</tr>
</table>
</div>
<div class="col-xs-4">
<table>

<tr >
<td style="border-right:2px solid #38a7bb"><input type="text" class="form-control rem" value="<?=$row['retine5']?>"/></td><td><input type="text" class="form-control rem" value="<?=$row['retine5']?>"/></td>
</tr>
<tr>
<td style="border-right:2px solid #38a7bb;border-top:2px solid #38a7bb"><input type="text" class="form-control rem" value="<?=$row['retine7']?>"/></td><td  style="border-top:2px solid #38a7bb"><input type="text" class="form-control rem" value="<?=$row['retine8']?>"/></td>
</tr>
</table>
</div>
<div class="col-xs-3" style="border-left:1px solid rgb(205,205,205);">

<table class="table" style="width:300px">

<tr>
<td><?=$row['muscular']?></td>
</tr>

</table>
</div>
</div>

<div class="col-md-12">
<hr class="title-highline-top"/>
<div class="col-md-9" style="border-right:1px solid rgb(205,205,205);">
<table class="table">
<h5>REFRACCION</h5>

<tr>
<th></th><th>Espera</th><th>Cilindro</th><th>Eje</th><th>Add</th><th>Vision</th>
<tr>
<tr>
<th>OD</th><td><?=$row['espera_od']?></td><td><?=$row['cilindro_od']?></td><td><?=$row['eje_od']?></td><td><?=$row['add_od']?></td><td><?=$row['vision_od']?></td>
</tr>
<tr>
<th>OS</th><td><?=$row['espera_os']?></td><td><?=$row['cilindro_os']?></td><td><?=$row['eje_os']?></td><td><?=$row['add_os']?></td><td><?=$row['vision_os']?></td>
</tr>
</table>
</div>
<div class="col-md-3">
<table class="table">
<h5>PUPILAS</h5>
<tr><th>OD</th><th>OS</th></tr>
<tr><td><?=$row['pupilas_od1']?></td><td><?=$row['pupilas_od2']?></td></tr>
<tr><td><?=$row['pupilas_os1']?></td><td><?=$row['pupilas_os2']?></td></tr>
</table>
</div>
</div>
  <?php endforeach; else:  ?>
            <p>Post(s) not available.</p>
            <?php endif;  ?>
            
        </div>
   </div>
 
</div>
</div>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
 $('#bthide').click(function(){
   id = $(this).attr('title');
   txt = $(this).text();
   if (txt == 'Ocultar'){
  
     $(this).text('Mostrar');
	 $(".not-stuck").css("margin-top", "100px");
	 $(".stuck").css("margin-top", "-45px");
	 $(".push-save-down").css("margin-top", "-129px");
   }
   else{
      $(this).text('Ocultar');
	  $(".not-stuck").css("margin-top", "180px");
	  $(".stuck").css("margin-top", "-4px");
	  $(".push-save-down").css("margin-top", "-129px");
	  
   }
   $("#"+id).slideToggle(200);
   

  });
//----------------------------------------------------------
$(document).ready( function() {
 $('#deletesuccess').delay(3000).fadeOut();
 });
</script>