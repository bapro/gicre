<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h2 class="h2 his_med_title">SESION FOTO</h2>

</div>
<div class="modal-body" >
 <div class="container" style='  height: 100%;overflow-y: scroll;'>
  <div id="showEr"  >
   </div>

<div class="row">
<div class="col-xs-6">
<h3>ANTES</h3>
<table class="table table-striped ">
<?php
for($i=1; $i <=10; $i++){
?>
<tr>
<td>

 <div class="col-lg-12" id="l_hideSesion<?=$i?>">
 <form method="post" class="form-inline" id="l_upload_form_se_f<?=$i?>" enctype="multipart/form-data"> 
   <strong>#<?=$i?></strong> <input type="file" name="image_file" id="l_image_file<?=$i?>" accept=".png, .jpg, .jpeg"   class="form-control"/>
  <input type="hidden" name="user_id" value="<?=$user_id?>" />
   <input type="hidden" name="patient" value="<?=$id_historial?>" />
     <input type="hidden" name="pos_num" id="l_pos_num" value="<?=$i?>" />
	 <input type="hidden" name="position" id="l_position" value="l" />
	 <input type="hidden" name="aside" id="l_aside" value="l_" />
 </form>
  </div>
<div id="l_sesionFoto<?=$i?>"></div>
</td>
</tr>

<?php

}
?>

</table>
</div>
<div class="col-xs-6">
<h3>DESPUES</h3>
<table class="table table-striped" >
<?php
for($ii=1; $ii <=10; $ii++){
?>
<tr>
<td>

 <div class="col-lg-12" id="r_hideSesion<?=$ii?>">
 <form method="post" class="form-inline" id="r_upload_form_se_f<?=$ii?>" enctype="multipart/form-data"> 
   <strong>#<?=$ii?></strong> <input type="file" name="_image_file" id="r_image_file<?=$ii?>" accept=".png, .jpg, .jpeg"   class="form-control"/>
  <input type="hidden" name="_user_id" value="<?=$user_id?>" />
   <input type="hidden" name="_patient" value="<?=$id_historial?>" />
     <input type="hidden" name="_pos_num" id="r_pos_num" value="<?=$ii?>" />
	 <input type="hidden" name="_position" id="r_position" value="r" />
	 <input type="hidden"  id="r_aside" value="r_" />
 </form>
  </div>
<div id="r_sesionFoto<?=$ii?>"></div>
</td>
</tr>

<?php

}
?>

</table>
</div>
</div>

</div>

</div>
<script>


function listSesionPhotos(position,pos_num,aside){
$('#'+aside+'sesionFoto'+pos_num).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
url:"<?php echo base_url(); ?>sesionFotos/listSesionPhotos",
data: {user_id:<?=$user_id?>,patient:<?=$id_historial?>,pos_num:pos_num,position:position,aside:aside},
method:"POST",
success:function(data){
$('#'+aside+'sesionFoto'+pos_num).html(data);
}
});
};



</script>
<?php 

$this->load->view('admin/historial-medical1/cirugia-plastica/sesion-foto/footer-left');
$this->load->view('admin/historial-medical1/cirugia-plastica/sesion-foto/footer-right');
?>






