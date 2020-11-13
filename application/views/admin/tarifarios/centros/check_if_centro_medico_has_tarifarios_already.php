
<?php

if($results > 0)
{
	


$centro_name=$this->db->select('name')->where('id_m_c',$id_c)
->get('medical_centers')->row('name');

$codigo_contrato=$this->db->select('id,codigo,updated_by,updated_time')->where('id_centro',$id_c)
->get('codigo_contrato')->row_array();
//	$updated_timec = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($codigo_contrato['updated_time'])));	
$updated_timec = date("d-m-Y H:i:s", strtotime($codigo_contrato['updated_time']));

	?>

<div class="modal fade" id="mostrar" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
<div class="modal-dialog modal-lg">

<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title uppercase" id="Login" style="color:green" >Tarifarios de <?=$centro_name?></h4>
</div>
<div class="modal-body">

<h4 style="color:green" >
Codigo Contrato :  <span id="hide-cc"><?=$codigo_contrato['codigo']?></span>
 <input type="text"  id="show-cc" style="display:none;width:150px;text-align:center" value="<?=$codigo_contrato['codigo']?>"/>
  <button  type="button" title="Ultimo cambio hecho &#10; por <?=$codigo_contrato['updated_by']?> &#10; fecha  <?=$updated_timec?>" class="btn btn-sm btn-default" id="show-s-b-cc" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
 <button type="button" id="save-b-cc" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
 </h4>

 <hr id="hr_ad"/>
<h5 style="color:green"></h5>
<br/>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered" id="example2">
<thead>
<tr style="background:#38a7bb;color:white">
<th>CUPS</th>
<th>SIMON</th>
<th>SERVICO</th>
<th>MONTO</th>
<th>Accion</th>
</tr>
</thead>
<tbody>
<?php
$cpt="";
$sql ="SELECT * FROM centros_tarifarios where centro_id=$id_c";
$query = $this->db->query($sql);

foreach($query->result() as $row)
{
	//$updated_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_date)));	
	$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_date));
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr bgcolor='<?=$colorBg?>' id="<?=$row->id_c_taf; ?>" >
<td>
<span class="editSpan cups-n"><?=$row->cups?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm cups" name="cups"  type="text"   value="<?=$row->cups?>"  />
</td>
<td>
<span class="editSpan simons-n"><?=$row->simons?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm simons" name="simons"  type="text"   value="<?=$row->simons?>"  />
</td>
<td>
<span class="editSpan sub_groupo-n"><?=$row->sub_groupo?></span>
 <input style="display: none;width:100%" class="editInput  form-control input-sm sub_groupo" name="sub_groupo"  type="text"   value="<?=$row->sub_groupo?>"  />
</td>
<td>
<span class="editSpan monto-n"><?=$row->monto?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm monto" name="monto"  type="text"   value="<?=$row->monto?>"  />
</td>
<!--<td >
<a data-toggle="modal" data-target="#edit_tarifario" class="st" href="<?php echo base_url('admin/edit_tarifario_centro/'.$row->id_c_taf)?>" title="Editar un tarifario"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a class="st delete-tarifarios-centro" id="<?=$row->id_c_taf; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
</td>-->
<td>
<div class="btn-group btn-group-sm">
<button type="button" class="btn btn-sm btn-default editBtn " title="Ultimo cambio hecho &#10; por <?=$row->updated_by?> &#10; fecha  <?=$updated_time?>" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
</div>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
<a class="st delete-tarifarios-centro" id="<?=$row->id_c_taf; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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
</div> 
</div> 

<script>
$(document).ready(function() {
    $('#example2').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
	
	

	
	$("#import2").prop("disabled",true) ;
	
	
	
$(".delete-tarifarios-centro").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/delete_tarifarios_centro')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
})	
	
})



//---------------------------------------------------------------------------------------
   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        
        $(this).closest("tr").find(".saveBtn").show();
		
		  $(this).closest("tr").find(".editSpan").hide();
        
        //show edit input
        $(this).closest("tr").find(".editInput").show();
        
    });

//---------------------------------------------------------------------------------------


	$('.saveBtn').on('click',function(){
var updated_by ="<?=$updated_by?>";
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();
//-------------------------------------------------------------------------------
  var cups = $(this).closest("tr").find(".cups").val();
 var simons = $(this).closest("tr").find(".simons").val();
  var sub_groupo = $(this).closest("tr").find(".sub_groupo").val();
   var monto = $(this).closest("tr").find(".monto").val();
   if(cups=="" || simons=="" || sub_groupo=="" || monto==""){
	   alert("Todos los campos son requerido !")
   } else {
  $(this).closest("tr").find(".editBtn").show();
$(this).hide(); 
 $(this).closest("tr").find(".editBtn").show();  
   
   $(this).closest("tr").find(".editInput").hide(); 
   	  $(this).closest("tr").find(".editSpan").show();
	  
   //--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".cups-n").text(cups);
	  $(this).closest("tr").find(".simons-n").text(simons);
	    $(this).closest("tr").find(".sub_groupo-n").text(sub_groupo);
      $(this).closest("tr").find(".monto-n").text(monto);
//---------------------------------------------------------------------------------


$.ajax({
type:'POST',
url: "<?=base_url('admin/save_edit_tarifario_centro')?>",
dataType: "json",
data:'id_c_taf='+ID+'&'+inputData+"&updated_by="+updated_by,
cache: true,
success:function(data){

}
});
   }
});


//---------------------------------------------------------------------------------------------------------
   $('#show-s-b-cc').on('click',function(){
         //hide edit button
        $("#show-cc").show();
        
        $("#hide-cc").hide();
		$(this).hide();
        $("#save-b-cc").show();
    });


 $('#save-b-cc').on('click', function () {

var codigo_id  = "<?=$codigo_contrato['id']?>";
 var codigo  = $("#show-cc").val();
  var user_name  = "<?=$updated_by?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/save_edit_c_c');?>',
data:{codigo_id:codigo_id,codigo:codigo,user_name:user_name},
success: function(data){
$("#show-cc").hide();
$("#hide-cc").show();
$("#hide-cc").text(codigo);	
 $("#save-b-cc").hide();
  $("#show-s-b-cc").show();
},
});
});
</script>	
	
	

<div class="alert alert-warning">El Centro Medico<strong> <?=$centro_name?></strong>  ya tiene tarifarios <a data-toggle="modal" data-target="#mostrar"  href='#'>Ver</a></div>

 <?php 

}
else {
echo '<script>

 $("#import2").prop("disabled",false) 
</script>';	
}
?>

<div class="modal fade" id="mostrar" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body">
</div>
</div>
</div>
</div>