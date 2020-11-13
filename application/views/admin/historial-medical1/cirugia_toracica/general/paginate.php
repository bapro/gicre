<?php
foreach ($cirugia_paginate->result() as $rowp) {
$inserted_time = date("d-m-Y H:i:s", strtotime($rowp->inserted_time));
 $doc=$this->db->select('name')->where('id_user',$rowp->id_user)
 ->get('users')->row('name');	
?>
 <form class="form-horizontal" method="post" id="change-bgd-pag-re" >
  <h5 style="color:#FF0084">REGISTRO #<?=$page?> | creado por <?=$doc?>, <?=$inserted_time?></h5>
  
         <div class="form-group">
      <label class="control-label col-sm-2" >FECHA:</label>
      <div class="col-sm-3">          
      		<input class="form-control" id="fecha-rep-gnl" name="fecha-rep-gnl" value='<?=$inserted_time?>' >
      </div>
	
    </div>
  
       <div class="form-group">
      <label class="control-label col-sm-2" >REPORTE:</label>
      <div class="col-sm-5">          
      		<select class="form-control select2" id="cirugia_reportee" >
		<?php
		echo "<option>$rowp->reporte</option>";
		echo "<option></option>";
		$sql ="SELECT name FROM hc_cirugia_name  WHERE name !='$rowp->reporte' ORDER BY name DESC";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
		
		echo "<option >".$row->name."</option>";
		}
		?>
		</select> 
      </div>
	  <?php
	  if($rowp->id_enf !=0 && $rowp->id_cond !=0){?>
	   	  <div class="col-sm-3" ><div class="alert alert-info" style='text-align:center'> Historia Actual esta anexada.</div></div>
	  <?php } ?>
    </div>
  
       <div class="form-group">
      <label class="control-label col-sm-2" >DETALLE:</label>
      <div class="col-sm-8">          
      <textarea rows='12' class="form-control clear-cirugia-toracia" id="cirugia_detallee" ><?=$rowp->detalle?></textarea>
      </div>
    </div>
	
	
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
	<button type="button" id="save-cirugia-generales" class="btn btn-md btn-success"><i class="fa fa-check after-action" style="display:none;color:blue;font-size:35px;position:absolute"></i> CAMBIAR</button>
		 <a  class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/$rowp->id/$id_patient/$user_id/$centro_medico/r")?>"  ><i class="fa fa-print"></i> Imprimir Vert.</a>
      <a  class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c1/$rowp->id/$id_patient/$user_id/$centro_medico/r")?>"  ><i class="fa fa-print"></i> Imprimir Horiz.</a>
	  </div>
    </div>

  </form>
<?php
}

?>

<script>
$(".select2").select2({
tags: true
});

$(".load-cirugia").not('.registro-li').hide();

$('#save-cirugia-generales').on('click', function(event) {
	event.preventDefault();
var id_cirugia_toracia =<?=$rowp->id?>;	
	
var cirugia_detalle =$("#cirugia_detallee").val();
var cirugia_reporte=$("#cirugia_reportee").val();
var fecha=$("#fecha-rep-gnl").val();
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/saveCirugiaReporte",
data: {cirugia_reporte:cirugia_reporte,cirugia_detalle:cirugia_detalle.trim(),id_cirugia_toracia_rep:id_cirugia_toracia,fecha:fecha},
method:"POST",
success:function(data){
  $('.after-action').fadeIn('slow', function(){
    $('.after-action').delay(3000).fadeOut(); 
    });
}
});
	
});

$('input[name="fecha-rep-gnl"]').mask('00-00-0000 00:00:00');

</script>

