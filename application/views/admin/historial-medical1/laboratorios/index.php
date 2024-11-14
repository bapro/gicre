<?php
if($perfil !='Medico'){
	$and='';	
	}else{
	$and="&& id_doc=$user_id";		
	}
 $sql ="SELECT * FROM h_c_groupo_lab  WHERE rmvd=0 $and GROUP BY groupo ORDER BY groupo ASC";
$query= $this->db->query($sql);
if($perfil=='Asistente Medico'){
$disabled_search='disabled';	
}else{
$disabled_search='';	
}
?>
<h4 class="h4 his_med_title">Indicaciones laboratorios</h4>
 <hr class="hr_ad"/>
<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>
<table class='table'>
<tr>
<td style='width:10%'>
<button class='btn btn-default btn-xs' type='button' id='reload-groupos'>Seleccionar Laboratorios agrupados (<?=$query->num_rows()?>)</button>
</td>
<td>
<select  class="form-control select2"   id="list-group" <?=$disabled_search?>>

</select>
</td>
<td></td>
</tr>

</table>
 <div class="col-xs-6">
<input type='text' class="form-control"  id="buscar-laboratorios" placeholder='buscar laboratorios' <?=$disabled_search?>/>
</div>
 <div class="col-xs-6">
<button class='btn btn-default btn-xs' type='button' id='enviar-email-labo' disabled >Enviar Laboratorios Al Paciente</button>	
</div>
 <div class="col-md-12">
 <br/>
<div id="allLaboratoriosInd"></div>

</div>

<div class="col-md-12">
 <hr class="hr_ad"/>
<div class="col-md-5">
<div class="form-group">
<label class="control-label">Mostrar Recetas Por Centro Médico</label>
<select  class="form-control select2 indicacionPorCentro"    >
 <option value="<?=$centro_medico?>"><?=$centro_title?></option>
 <?php 

 foreach($centro_data as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>
</select>
</div>
</div>
</div>
 <div class="col-md-12">

 <hr class="hr_ad"/>
<p  class="h4 his_med_title" >Indicaciones previas </p>

<div  id="new_indication_lab"></div>
<div  id="allLaboratorios">

</div>

</div>
<script>

$('.indicacionPorCentro').on('change', function(e) {
	e.preventDefault();
	 $("#allLaboratorios").html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	 $('html, body').animate({
  scrollTop: $("#allLaboratorios").offset().top
});
      allLaboratorios($(this).val());

});



let  countlab = 0;	
$('#show-lab-data').on('click', function(e) {
	e.preventDefault();
	   countlab ++;
	   if(countlab==1){
	 $("#allLaboratorios").html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	 allGroupoLab();
      allLaboratorios(<?=$centro_medico?>);
	   }
});

let timerlab = null;
$("#buscar-laboratorios").keydown(function(){
       clearTimeout(timerlab); 
       timerlab = setTimeout(searchLab, 1000)
});

function searchLab() {

    let emergency_id = <?=$emergency_id?>;
    let hist = <?=$hist?>;
    let historial_id = $("#hist_id").val();
    let operator = $("#inserted_by").val();
    let user_id = <?=$user_id?>;
   let str= $("#buscar-laboratorios").val();
    $("#allLaboratoriosInd").fadeIn().html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(str == "") {
    $("#allLaboratoriosInd").hide();

}else {
    $.ajax({
url:"<?php echo base_url(); ?>saveHistorial/allLaboratoriosInd",
data: {historial_id:historial_id,operator:operator,user_id:user_id,emergency_id:emergency_id,hist:hist,str:str,centro_medico:<?=$centro_medico?>},
method:"POST",
success:function(data){
$('#allLaboratoriosInd').html(data);
}
});
}
}
</script>