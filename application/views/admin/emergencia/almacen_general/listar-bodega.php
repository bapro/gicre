<table class='table table-striped' id='bodaga-table'>

<tr>
<th>BODEGA</th><th>CANTIDAD</th><th>ACCIONES</th>
</tr>

<?php
$cantTot=0;
$sqlbod ="SELECT *  FROM  emergency_bodega where idalm=$idal";
$querybod = $this->db->query($sqlbod);
foreach ($querybod->result() as $rowbdg){
	
	 $cantTot += $rowbdg->cant;
	?>
<tr id="<?=$rowbdg->idb?>">
<td><?=$rowbdg->name?></td>
<td>
<span class="editSpan edit-bodega-1"><?=$rowbdg->cant?></span>
 <input style="display: none;width:100px;text-align:center" class="editInput  form-control input-sm edit-bodega" name="edit-bodega"  type="text"   value="<?=$rowbdg->cant?>"  />
</td>
<td>
<div class="btn-group btn-group-sm">
<button type="button"  class="btn btn-xs editBtn " style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
</div>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
<a class="st delete-tarifarios" id="" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

</td>
</tr>

<?php
}
?>

<tr>
<th>Total</th>
<th id='cantTot'><?=$cantTot?></th>
<th></th>
</tr>
</table>
<table id='hhhh'></table>
<script>
   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();

        $(this).closest("tr").find(".saveBtn").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });
	
//------------------------------------------------------------------

$('.saveBtn').on('click',function(){
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();

//-------------------------------------------------------------------------------
 var bodega = $(this).closest("tr").find(".edit-bodega").val();
 
   if(bodega==""){
	   alert("Cual es la cantidad !")
   } else {
  $(this).closest("tr").find(".editBtn").show();
$(this).hide();
 $(this).closest("tr").find(".editBtn").show();

   $(this).closest("tr").find(".editInput").hide();
   	  $(this).closest("tr").find(".editSpan").show();

   //--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".edit-bodega-1").text(bodega);

//---------------------------------------------------------------------------------
$.ajax({
type:'POST',
url: "<?=base_url('emergency/save_edit_bodega')?>",
dataType: "json",
data:'id_bodega='+ID+'&'+inputData,
cache: true,
success:function(data){
alert(4);
},

});
   }
});


</script>