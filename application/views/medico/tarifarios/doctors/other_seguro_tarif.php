<?php 
$seguro=$this->db->select('id_sm,title,logo')->where('id_sm',$id_seguro)
->get('seguro_medico')->row_array();


if($seguro['logo']==""){
$seguro_logo="";
} else{
$seguro_logo='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguro['logo'].'"  />';	
}

$codigo_contrato=$this->db->select('codigo,id,updated_by,updated_time')->where('id_seguro',$id_seguro)
->get('codigo_contrato')->row_array();
$updated_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($codigo_contrato['updated_time'])));	
$medico=$this->db->select('first_name')->where('id',$id_doctor)
->get('doctors')->row('first_name');
foreach($results as $cat)
$categoria=$this->db->select('title_area')->where('id_ar',$cat->id_categoria)
->get('areas')->row('title_area');


 ?>



<h4 style="color:green" >
Seguro Medico : <a data-toggle="modal" data-target="#EditSeguroMedico" target="_blank"  href="<?php echo base_url('admin/EditSeguroMedico/'.$id_seguro)?>" ><?=$seguro['title']?></a>
<?php echo $seguro_logo; ?>
 - Codigo Contrato : <input type="text"  id="show-cc" style="display:none;width:150px;text-align:center" value="<?=$codigo_contrato['codigo']?>"/>
 <span id="hide-cc"><?=$codigo_contrato['codigo']?></span> 
 <button title="Ultimo cambio hecho &#10; por <?=$codigo_contrato['updated_by']?> &#10; fecha  <?=$updated_time?>" type="button" class="btn btn-sm btn-default" id="show-s-b-cc" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
 <button type="button" id="save-b-cc" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
 </h4>
 <hr id="hr_ad"/>
<h5 style="color:green"><?php echo $categoria?></h5>
<br/>
<table class="table table-striped table-bordered" id="example2">
<thead>
<tr style="background:#38a7bb;color:white">
<th>CODIGO</th>
<th>SIMON</th>
<th>PROCEDIMIENTO</th>
<th>MONTO</th>
<th>ACCIONES</th>
</tr>
</thead>
<tbody>
<?php
$cpt="";
$noedit="yes";
foreach($results as $row)
{
$updated_timed = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_date)));	
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr bgcolor='<?=$colorBg?>' id="<?=$row->id_tarif?>">
<td>
<span class="editSpan codigo-n"><?=$row->codigo?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm codigo" name="codigo"  type="text"   value="<?=$row->codigo?>"  />
</td>
<td>
<span class="editSpan simon-n"><?=$row->simon?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm simon"  type="text" name="simon"  value="<?=$row->simon?>"  />
</td>
<td>
<span class="editSpan procedimiento-n"><?=$row->procedimiento?></span>
 <input style="display: none;width:100%" class="editInput  form-control input-sm procedimiento"  type="text"  name="procedimiento" value="<?=$row->procedimiento?>"  />
</td>
<td>
<span class="editSpan monto-n"><?=$row->monto?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm monto"  type="text" name="monto"  value="<?=$row->monto?>"  />
</td>
<!--
<td>
<a data-toggle="modal" data-target="#edit_tarifario" class="st" href="<?php echo base_url("admin/edit_tarifario/$row->id_tarif/$noedit")?>" title="Editar un tarifario"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a class="st delete-tarifarios" id="<?=$row->id_tarif; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
</td>
-->
<td>
<div class="btn-group btn-group-sm">
<button type="button" title="Ultimo cambio hecho &#10; por <?=$row->updated_by?> &#10; fecha  <?=$updated_timed?>" class="btn btn-sm btn-default editBtn " style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
<a class="st delete-tarifarios" id="<?=$row->id_tarif; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

</td>


</tr>
<?php
}
?>
</tbody>
</table>

<script>
$(document).ready(function() {
    $('#example2').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
	
	
	    $('#edit_tarifario').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
	
	
	$(".delete-tarifarios").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/delete_tarifarios')?>',
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


//---------------------------------------------------------------------------------------------------------
   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        
        $(this).closest("tr").find(".saveBtn").show();
		
		  $(this).closest("tr").find(".editSpan").hide();
        
        //show edit input
        $(this).closest("tr").find(".editInput").show();
        
    });
} );



$('.saveBtn').on('click',function(){
var updated_by  = "<?=$user_name?>";
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();

//-------------------------------------------------------------------------------
 var codigo = $(this).closest("tr").find(".codigo").val();
 var simon = $(this).closest("tr").find(".simon").val();
  var procedimiento = $(this).closest("tr").find(".procedimiento").val();
   var monto = $(this).closest("tr").find(".monto").val();
   if(codigo=="" || simon=="" || procedimiento=="" || monto==""){
	   alert("Todos los campos son requerido !")
   } else {
  $(this).closest("tr").find(".editBtn").show();
$(this).hide(); 
 $(this).closest("tr").find(".editBtn").show();  
   
   $(this).closest("tr").find(".editInput").hide(); 
   	  $(this).closest("tr").find(".editSpan").show();
	  
   //--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".codigo-n").text(codigo);
	  $(this).closest("tr").find(".simon-n").text(simon);
	    $(this).closest("tr").find(".procedimiento-n").text(procedimiento);
      $(this).closest("tr").find(".monto-n").text(monto);
//---------------------------------------------------------------------------------


$.ajax({
type:'POST',
url: "<?=base_url('admin/save_edit_tarif')?>",
dataType: "json",
data:'id_tarif='+ID+'&'+inputData+"&updated_by="+updated_by,
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
var codigo  = $("#show-cc").val();
  if(codigo==""){
	 alert("El codigo no se puede dejar vacio !");
 } else { 
var codigo_id  = "<?=$codigo_contrato['id']?>";
 var user_name  = "<?=$user_name?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin/save_edit_c_c');?>',
data:{codigo_id:codigo_id,codigo:codigo,user_name:user_name},
success: function(data){
$("#show-cc").hide();
$("#hide-cc").show();
$("#hide-cc").text(codigo);	
 $("#save-b-cc").hide();
  $("#show-s-b-cc").show();
},
});
 }
});
</script>