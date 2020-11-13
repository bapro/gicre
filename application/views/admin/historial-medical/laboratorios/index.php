  <?php

$name=($this->session->userdata['admin_name']);
?>

<ul>
<div class="col-xs-12 move_left" style="margin-left:160px" >
<h4 class="h4 his_med_title">Indicaciones laboratorios</h4>
<br/>
<form  id="formLabo" class="form-horizontal"  method="post"  >
<input type="hidden" value="<?=$name?>" id="operatorl" name="operatorl"/>
<input type="hidden" value="<?=$historial_id?>" id="historial_id_l" name="historial_id_l"/>

<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>
<div class="form-group">

<div class="col-md-9">
<!--<select  class="form-control chosen-labo" data-placeholder="Comienza a escribir un laboratorio." multiple  id="laborat" required>-->
<table class="table table-striped table-bordered" id="example">
 <thead>
<tr style="background:#38a7bb;color:white">
<th>Laboratorios</th>
<th>Seleccione</th>
</tr>
 </thead>
 <tbody>
<?php 
$cpt="";
foreach($laboratories as $row)
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
<tr bgcolor="<?=$colorBg ;?>">
<td  style="width:2px" ><?=$row->name?></td>
<td><input type='checkbox' name='laborat'  value="<?=$row->id?>"  /></td>
</tr>
<?php 
}
?>
</tbody>
</table>
</div>

</div>


<div class="col-md-5" >
<div class="btn-group">
<button type="submit" id="saveIndicacionesMedicales" class="btn btn-primary btn-xs" >
<i class="fa fa-floppy-o" aria-hidden="true"></i>
indicar
</button>
</form>
<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li><a target="_blank" href="<?php echo base_url('admin/print_laboratorios/'.$historial_id)?>"> Exportar indicaciones</a></li>


</ul>

</div>
 </div>

</form>
<br/><br/>
<p class="h4 his_med_title">Indicaciones previas</p>
<p id="successE" class='alert alert-success' style="text-aling:center;display:none"><i class="fa fa-check" aria-hidden="true"></i> Indicacion agregada</p>
<div id="new_indication_lab"></div>
<div id="tablab">
<div id="new_c"></div>
<span style="color:green;" id="hide_c"><i><?=$num_count_lab?> datos</i></span>
<table  class="table table-striped table-bordered" style="background:white" cellspacing="0">
   <thead>
    <tr>
	   <th style="width:1px"><strong>Fecha</strong></th>
        <th style="width:5px">Laboratorio</th>
		 <th style="width:5px">Operador</th>
		 <th style="width:5px">Eliminar</th> 
	 </tr>
    </thead>
    <tbody>
    <?php foreach($IndicacionesLab as $row)
	 
	 {
	 ?>
        <tr>
		<td><?=$row->insert_time;?></td>
		<td><?=$row->laboratory;?></td>
		<td><?=$row->operator;?></td>
		 <td> <a title="Eliminar laboratorio <?=$row->laboratory;?>" class="st deletelab" id="<?=$row->id_lab; ?>"  style="background:rgb(223,0,0);cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
		   
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
</div>

</ul>
</div>
<script>

$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
} );



//isertion of indications laboratories

$(function() {

$('#formLabo').on('submit', function(event) {
var operatorl = $("#operatorl").val();
var historial_id_l = $("#historial_id_l").val();
var lab = [];
$("input[name='laborat']:checked").each(function(){
lab.push(this.value);
});
  
$.ajax({
type: "POST",
url: "<?=base_url('admin/SaveFormIndicacionesLab')?>",
data: {laboratorios:lab,operatorl:operatorl,historial_id_l:historial_id_l},

cache: true,
success:function(data){
$('.chosen-labo').val('').trigger('chosen:updated');	
//$("#errorBoxl").hide();
$('#successE').fadeIn('slow').delay(3000).fadeOut('slow'); 
$("#new_indication_lab").html(data);
$("#tablab").hide();

}  
});

return false;
});
});

//delete laboratorio

$(".deletelab").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var historial_id_l = $("#historial_id_l").val();
$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteHistLab')?>',
data: {id : del_id,historial_id_l:historial_id_l},
success:function(response) {
//update_lab.text($('#myTable tbody tr').length)),
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
$("#hide_c").hide();
$("#new_c").html(data);
$("#new_c").show();
 
}
});
}
})
</script>