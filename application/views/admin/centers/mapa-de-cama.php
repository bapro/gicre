<table class="table table-striped" id="mapa">
<thead>
<tr style="background:#38a7bb;color:white">
<th  style='display:none'>#</th>
<th>SALA</th>
<th># CAMA</th>
<th>SERVICIO</th>
<th>ACCIONES</th>
</tr>
</thead>
<tbody>
<?php
$cpt="";

foreach($queryct->result() as $row)
{
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
}
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr bgcolor='<?=$colorBg?>' id="<?=$row->id?>">
<td>
<span class="editSpan sala-n"><?=$row->sala?></span>
 <input style="display: none;" class="editInput  form-control input-sm sala" name="sala"  type="text"   value="<?=$row->sala?>"  />
</td>
<td>
<span class="editSpan num_cama-n"><?=$row->num_cama?></span>
 <input style="display: none;" class="editInput  form-control input-sm num_cama"  type="text" name="num_cama"  value="<?=$row->num_cama?>"  />
</td>
<td >
<span class="editSpan servicio-n"><?=$row->servicio?></span>
 <input style="display: none;" class="editInput  form-control input-sm servicio"  type="text"  name="servicio" value="<?=$row->servicio?>"  />
</td>

<td>
<div class="btn-group btn-group-sm">
<button type="button" title="" class="btn btn-sm btn-default editBtn " style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
</div>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
<a class="st delete" id="<?=$row->id; ?>" style="color:red;background:white;cursor:pointer"  title="Deshabilitar"><i class="fa fa-ban" aria-hidden="true"></i></a>

</td>


</tr>
<?php
}
?>
</tbody>
</table>
<script>
 $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();

        $(this).closest("tr").find(".saveBtn").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });


	$(".delete").click(function(){
if (confirm("Estás seguro de dehabilitar ?"))
{
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/deshabilitarCamaMapa')?>',
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

//-----------------------------------------------------------------------------------------------------------------

$('.saveBtn').on('click',function(){
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();

//-------------------------------------------------------------------------------
 var sala = $(this).closest("tr").find(".sala").val();
 var num_cama = $(this).closest("tr").find(".num_cama").val();
  var servicio = $(this).closest("tr").find(".servicio").val();
   if(sala=="" || num_cama=="" || servicio==""){
	   alert("Todos los campos son requerido !")
   } else {
  $(this).closest("tr").find(".editBtn").show();
$(this).hide();
 $(this).closest("tr").find(".editBtn").show();

   $(this).closest("tr").find(".editInput").hide();
   	  $(this).closest("tr").find(".editSpan").show();

   //--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".sala-n").text(sala);
	  $(this).closest("tr").find(".num_cama-n").text(num_cama);
	    $(this).closest("tr").find(".servicio-n").text(servicio);


$.ajax({
type:'POST',
url: "<?=base_url('admin_medico/saveEditMapaCama')?>",
dataType: "json",
data:'id='+ID+'&'+inputData,
cache: true,
success:function(data){

}
});
   }
});
</script>