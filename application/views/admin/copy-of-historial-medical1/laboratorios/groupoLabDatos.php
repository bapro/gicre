<div class="col-md-12  lab-ref ">
<table id="grouped-lab" class="table table-striped examplelabhist" >
<thead>
<tr style="background:#38a7bb;color:white">
<th style="display:none"> </th>
<th style="color:white">Laboratorios </th>
<th style="color:white;width:20px">
<button class='btn btn-default btn-xs' style='background:red;color:white' type='button' id='save-groupo-lab'>Indicar</button>
<!--<ul class="nav navbar-nav show-imp-lab-grop" style='display:none'>
<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown"  ><i style="font-size:24px;color:white" class="fa">&#xf02f;</i><span style="cursor:pointer" class="caret"></span></span>
<ul class="dropdown-menu">
 <li><a data-toggle="modal" data-target="#print_lab_gr_foto"  href="<?php echo base_url("printings/print_if_foto/$id_historial/$areaid/$user_id/lab")?>"  style="cursor:pointer;color:black" class="btn-sm print-me1" > Vert.</a></li>
<li><a target="_blank" href="<?php echo base_url("printings/print_laboratorios_horiz/$id_historial/$areaid/$user_id")?>" style="cursor:pointer;color:black" class="btn-sm print-me1" > Horiz.</a></li>
</ul>
</li>
</ul>-->
<ul class="nav navbar-nav show-imp-lab-grop" style='display:none'>
	<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;color:white"></i><span class="caret"></span></span>
		<ul class="dropdown-menu">
		<li>
		<a>FORMATO VERTICAL</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$id_historial/vert/1/printing/h_c_indications_labs")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$id_historial/vert/0/printing/h_c_indications_labs")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		<li>
		<a>FORMATO HORIZONTAL</a>
	    <a  class="imprimirRecetasForPat horiz" id='1' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$id_historial/horiz/1/printing/h_c_indications_labs")?>"  style="cursor:pointer;color:black" >con la foto</a>
		<a  class="imprimirRecetasForPat horiz" id='0' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$id_historial/horiz/0/printing/h_c_indications_labs")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
		</li>
		</ul>
		</li>
</ul>
</th>
</tr>

</thead>
<tbody>
<?php 


foreach($query->result() as $row)
{

?>
<tr>
<td  style="display:none">
<?=$row->id;?></td>
<td  style="text-transform:uppercase">
<?=$row->lab_name;?></td>

<td style="width:1px" >

<input type='checkbox' name='check-lab-grp' class="check-lab-grp" id="print_<?=$row->lab_id?>" value="<?=$row->lab_id?>" checked />

</td>

</tr>

<?php
}
?>
</tbody>    
</table>

</div>


<script>


if(<?=$hist?>==4){
$('.check-lab').prop('disabled',true);	
}
else{
$('.check-lab').prop('disabled',false);	
}

//-------------------------------------------------------------------------------------------
  $('.examplelabhist').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'asc'] ],

    } );
	//-----------------------------------------------------------------------------------------
	
	  $('#save-groupo-lab').on('click', function(event) {
event.preventDefault();
var nuevolab  = $("#nuevo-lab").val();
var nuevogroupo  = $("#nuevo-groupo").val();
if ($(".check-lab-grp").is(':checked')) {
	var checked = [];
            $.each($("input[name='check-lab-grp']:checked"), function(){
                checked.push($(this).val());
            });
$('#save-groupo-lab').prop('disabled',true);
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveFormIndicacionesLabGroupo')?>",
data: {lab:checked,historial_id_l:<?=$id_historial?>,operatorl:<?=$operator?>,user_id:<?=$user_id?>,emergency_id:<?=$emergency_id?>},
success:function(data){
$('.show-imp-lab-grop').show();
$('#save-groupo-lab').prop('disabled',false);
allLaboratorios();
},


});		
}else{
alert('Elige al menos uno');	
}
});


;
</script>