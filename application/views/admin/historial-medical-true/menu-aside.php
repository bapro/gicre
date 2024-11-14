<div class="row">
<?php

foreach($patient as $row)

$pat=$this->db->select('sexo,edad')->where('id_p_a',$row->id_p_a )->get('patients_appointments')->row_array();
if($pat['sexo']=='Feminino' || $pat['sexo']=='Feminina' ){
$control_prenatal='<li><a  href="#control_prenatal"  data-toggle="tab" >V- Control Prenatal</a></li>';
$ssr_obs="
<li><a href='#SSR'  data-toggle='tab' >2- SSR</a></li>
<li><a href='#Obstetrico'  data-toggle='tab' >3- Obstetrico</a></li>
";
} else {
$ssr_obs="";
$control_prenatal='';
}


//---------------------------------check pediatrico
$edad=$pat['edad'];
$edadd = substr($edad, 0, 2);

if((strpos($edad, 'año(s)') == true) && ($edadd <=12)){

$ssr_obs="";

}

if(strpos($edad, 'mes(es)') == true)  {
$pedia="<li><a href='#Pediatrico' data-toggle='tab' >4- Pediatrico</a></li>";
$control_prenatal='';
$ssr_obs="";	
} 
else if(strpos($edad, 'día(s)') == true){
$pedia="<li><a href='#Pediatrico' data-toggle='tab' >4- Pediatrico</a></li>";
$control_prenatal='';	$ssr_obs="";
}
else if((strpos($edad, 'año(s)') == true) && $edadd <=16){

$pedia="<li><a href='#Pediatrico' data-toggle='tab' >4- Pediatrico</a></li>";	

}


else{
$pedia="";
}
?>
<div class="col-sm-3 col-md-2 sidebar" style="background:white;">
<br/> 
<ul  class="nav nav-sidebar ">

<li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li>
<li class="active addb" ><a href="#Datos_personales"  data-toggle="tab" >1- General</a></li>
<li><a href="#Datos_alergista"  data-toggle="tab" >2- Alergista</a></li>
<?=$ssr_obs?>
<?=$pedia?>

<li><a  href="#Enfermedad_Actual" data-toggle="tab" class="tab-enf-act">II- Enfermedad Actual</a></li>

<li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li>
<li><a href="#Rehabilitacion"  data-toggle="tab" >1- Rehabilitacion</a></li>
<li><a href="#examen-fisico"  data-toggle="tab" >2- Fisico</a></li>
<li><a href="#examen-otorino"  data-toggle="tab" >3- Fisico Otorrino</a></li>
<li><a href="#oftalmologia"  data-toggle="tab" >4- Oftalmologia</a></li>
<li><a class="" data-toggle="modal" data-target="#of-ref-mdl" href="<?php echo base_url("admin_medico/oftalRef/$id_historial/$user_id/$centro_medico")?>">5- Refracción</a>
</li>
<li><a href="#Del_Sistema"  data-toggle="tab" >7- Del Sistema</a></li>
<li><a href="#Del_Dermatologico"  data-toggle="tab" >8- Dermatologo</a></li>
<li><a  href="#conclusion"  data-toggle="tab" class="tab-con-diag">IV- Conclusion Diagnóstica</a></li>

<?=$control_prenatal?>
<li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li>
<li><a href="#recetas"  data-toggle="tab" id='show-recetas-data'>1- Recetas </a></li>
<li><a href="#estudios"  data-toggle="tab" id='show-estudios-data' >2- Estudios</a></li>
<li><a href="#laboratorios"  data-toggle="tab" id='show-lab-data' >3- Laboratorios </a></li>


</ul>

</div>
<div class="modal fade" id="of-ref-mdl"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
$('#of-ref-mdl').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
</script>