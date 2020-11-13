<?php
$username=$this->db->select('name')->where('id_user',$id_doc_user)->get('users')->row('name');
if(empty($username))	{
redirect('/page404');	
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
 <!-- owl carousel css -->
<style>
td,th{text-align:left} 

</style>
</head>
<!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
 ?>
<body >
  <div class="container" id="background_">
<div class="loadf"></div>
<h3   class="h3">Crear agenda por Dc <?=$username?></h3>



<div class="col-sm-12 table-responsive">


<table class="table  table-striped" id='calendatTable' cellspacing="0" >

<tr>
<th>Días</th>
<th>CENTRO MEDICO</th>
<th>FECHA</th>
<th>HORA</th>
<th colspan='3'>CITAS</th>
</tr>

<?php

$i = 0;
 foreach($diaries as $row)
{
	

?>

<tr >
<td class='red'  >
<label class='dia-title'><?=$row->title;?></label>
<span style='display:none' class='dia'><?=$row->id;?></span>

</td>


<td class='red' style="width:320px;display:block">
<p>
<span class="agenda-resultado"></span>
<select class="form-control select2 required centro_medico"    >
<option value="" hidden>Seleccionar un centro medico</option>
<?php 

foreach($centro_medico as $row)
{ 
echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}
?>
</select>
<br/><br/>

</p>



</td>
<td>
<table>
<tr>
<td>
<div class="form-group">
<label  class="col-sm-4"> Fecha Inicio </label>
<div class="col-sm-6" >
<div class="input-group date">
<input type="text" class="form-control fechaInicio"   />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

</div>

</div>
<br/>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label  class="col-sm-4" >Fecha Fin </label>
<div class="col-sm-6" >
<div class="input-group date">
<input type="text" class="form-control fechaFinal"   />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

</div>

</div>
</td>
</tr>
</table>
</td>
<td>
<table>
<tr>
<td>
<div class="form-group">
<label  class="control-label col-sm-3" >Desde</label>
<div class="col-sm-8" >
<select class="form-control select2 hourDesde">
<?php
$sql2 ="SELECT * FROM hour_from";
$query2 = $this->db->query($sql2);
foreach ($query2->result() as $row) {

echo '<option>'.$row->hour.'</option>';	
}?>
</select> 
</div>
</div>
<br/>
</td>
</tr>
<tr>
<td>
<div class="form-group">
<label  class="control-label col-sm-3" >Hasta</label>
<div class="col-sm-8" >
<select class="form-control select2 hourHasta">
<?php
$sql2 ="SELECT * FROM hour_from order by id DESC";
$query2 = $this->db->query($sql2);
foreach ($query2->result() as $row) {

echo '<option>'.$row->hour.'</option>';	
}?>
</select> 
</div>
</div>
</td>
</tr>
</table>
</td>

<td>

   <input type="number" class='required citas' min="1" style="width: 45px;float:left" >

</td>
<td>
<button  type='button' class="btn btn-primary btn-xs saveAgenda" style="float: none;cursor:pointer"><i class="fa fa-plus"></i></button>

</td>
</tr> 

<?php
$i++;
}

?>

</table>
</div>

</div>
<hr/>
 <?php 
 
 
        $this->load->view('footer');


 ?>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
 <script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script>

moment.locale('es');

	$('.date').datetimepicker({
    format: 'DD-MM-YYYY',
	//minDate: new Date(),
	locale:'es',
	  widgetPositioning: {
         horizontal: 'auto',
        vertical: 'bottom'
        }
})
$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});

/////////////////////////////////////////////////////////////////

$(".saveAgenda").click(function(){
	var iduser="<?=$id_doc_user?>";
	var dia_title = $(this).closest('tr').find('label.dia-title').text();
	var dia = $(this).closest('tr').find('span.dia').text();
	var fechaInicio = $(this).closest('tr').find('.fechaInicio').val();
	var fechaFinal = $(this).closest('tr').find('.fechaFinal').val();
	
	var hourDesde = $(this).closest('tr').find('.hourDesde').val();
	var hourHasta = $(this).closest('tr').find('.hourHasta').val();
	var centro_medico = $(this).closest('tr').find('.centro_medico').val();
	var citas = $(this).closest('tr').find('.citas').val();
		var button = $(this);
	if(centro_medico=="" || fechaInicio=="" || fechaFinal==""  || hourDesde==""  || hourHasta=="" || citas=="" ){
		alert('Debe seleccionar todo los campos del dia '+ dia_title );

	} else {
$.ajax({
type: "POST",
url: "<?=base_url('admin/agend_result')?>",
data: {iduser:iduser,fechaInicio:fechaInicio,fechaFinal:fechaFinal,hourDesde:hourDesde,hourHasta:hourHasta,centro_medico:centro_medico,citas:citas,dia:dia},
cache: true,
success:function(data){
$('.horario').val(null).trigger('change');
 button.closest('tr').find("span.agenda-resultado").html(data);

},

});
	}	});
</script>