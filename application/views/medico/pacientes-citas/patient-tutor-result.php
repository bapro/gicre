<?php
if(!empty($patient_tutors ))  
{ 

$output = '';
$outputdata = '';  
$outputtail ='';

$output .= '
<div class="table-responsive lsend">
<table class="table table-bordered">
<thead>
<tr >
<th style="text-align:left">Cedula</th>
<th style="text-align:left">Nombres</th>
<th style="text-align:left">Relación familia</th>
<th style="text-align:left">Agregar</th>
</tr>

</thead>
<tbody>
';

foreach ($patient_tutors as $objects)    
{   
$outputdata .= ' 
<tr style="background:white"> 
<td style="text-align:left;color:green">'.$objects->cedula.'</td>
<td style="text-align:left;color:green;text-transform:uppercase">'.$objects->nombre.'</td>
<td style="text-align:left;color:green">
<select id="relacionf">
<option>Padre</option>
<option>Madre</option>
</select>
<input type="hidden" id="id_nino" value="'.$id_nino.'"/>
<input type="hidden" id="id_tutor" value="'.$objects->id_patient.'">
<input type="hidden" id="name_tutor" value="'.$objects->nombre.'">
</td>
<td style="text-align:left;color:green"><button type="button" id="save_tutor" ><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i></button></td>
</tr>

';
//  echo $outputdata; 

}  

$outputtail .= ' 
</tbody>
 </table>
 </div>
';

echo $output; 
echo $outputdata; 
echo $outputtail;

}  

else  
{  
echo '<i style="font-size:16px;color:#B69200">Datos no encontrados</i>';  
} 
?>
<script>
$("#save_tutor").on('click', function (e) {
e.preventDefault();
var name_tutor  = $("#name_tutor").val();
var id_nino  = $("#id_nino").val();
var id_tutor  = $("#id_tutor").val();
var relacionf  = $("#relacionf").val();
$.ajax({
url: '<?php echo site_url('admin/save_tutor');?>',
type: 'post',
data:{id_nino:id_nino,id_tutor:id_tutor,relacionf:relacionf,name_tutor:name_tutor},
success: function (data) {
	$('#search').val("");
	$('#relacionf').val("");
	$('.lsend').delay(2000).slideUp(1000);
	$('#mes').text("Tutor se agrega con éxito!").fadeIn('slow').delay(3000).fadeOut('slow');
	$('#notienetutor').slideUp();
	$('#tienetutor').slideDown("slow").text("Este paciente tiene tutor(es) !");
	
	
}

});
});   
 

</script>