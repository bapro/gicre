<div class="row">

<div class="col-sm-3 col-md-2 sidebar" style="background:white;">
<br/> 
<ul  class="nav nav-sidebar" >
<?php

foreach($patient as $row)

$infomore=$this->db->select('inserted_by,update_time,created_time,update_time,update_by')->
where('id_patient',$row->id_p_a )
->get('rendez_vous')->row_array();
if (preg_match('/GINECOLOGIA/',$area) && ($row->sexo == 'Masculino' && $row->edad > '16 año(s)' )){
//if($area =="GINECOLOGIA ONCOLOGICA"  || $area =="GINECOLOGIA Y OBSTETRICIA"){


?>
<li><a class="this-is-a-title"><strong>I- ANTECEDENTES </strong></a></li>
<li class="active addb" ><a href="#Datos_personales" class="show-all-btn-when" data-toggle="tab" >&rArr; General</a></li>
<hr  class="hr_ad"/>
<li><a  href="#Enfermedad_Actual" class="show-all-btn-when tab-enf-act" data-toggle="tab" >II- Enfermedad Actual</a></li>

<li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li>
<li><a href="#Rehabilitacion" class="show-all-btn-when" data-toggle="tab" >&rArr; Rehabilitacion</a></li>
<li><a href="#examen-fisico" class="show-all-btn-when" data-toggle="tab" >&rArr; Fisico</a></li>
<li><a href="#oftalmologia" class="show-all-btn-when" data-toggle="tab" >&rArr; Oftalmologia</a></li>
<li><a href="#Del_Sistema" class="show-all-btn-when" data-toggle="tab" >&rArr; Del Sistema</a></li>
<hr class="hr_ad"/>
<li><a  href="#conclusion" class="show-all-btn-when tab-con-diag" data-toggle="tab"  >IV- Conclusion Diagnóstica</a></li>


<li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li>
<li><a href="#recetas" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Recetas </a></li>
<li><a href="#estudios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Estudios</a></li>
<li><a href="#laboratorios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Laboratorios </a></li>
<?php
}
elseif(preg_match('/GINECOLOGIA/',$area) && ($row->sexo == 'Masculino' && $row->edad <= '16 año(s)' )){
?>	
<li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li>
<li class="active addb" ><a href="#Datos_personales" class="show-all-btn-when" data-toggle="tab" >&rArr; General</a></li>
<li><a href="#Pediatrico" class="show-all-btn-when" data-toggle="tab" >&rArr; Pediatrico</a></li>

<li><a  href="#Enfermedad_Actual" class="show-all-btn-when tab-enf-act" data-toggle="tab" >II- Enfermedad Actual</a></li>

<li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li>
<li><a href="#Rehabilitacion" class="show-all-btn-when" data-toggle="tab" >&rArr; Rehabilitacion</a></li>
<li><a href="#examen-fisico" class="show-all-btn-when" data-toggle="tab" >&rArr; Fisico</a></li>
<li><a href="#oftalmologia" class="show-all-btn-when" data-toggle="tab" >&rArr; Oftalmologia</a></li>
<li><a href="#Del_Sistema" class="show-all-btn-when" data-toggle="tab" >&rArr; Del Sistema</a></li>

<li><a  href="#conclusion" class="show-all-btn-when tab-con-diag" data-toggle="tab" >IV- Conclusion Diagnóstica</a></li>


<li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li>
<li><a href="#recetas" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Recetas </a></li>
<li><a href="#estudios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Estudios</a></li>
<li><a href="#laboratorios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Laboratorios </a></li>


<?php
}

elseif(preg_match('/GINECOLOGIA/',$area) && ($row->sexo == 'Feminino')){
?>
<li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li>
<li class="active addb" ><a href="#Datos_personales" class="show-all-btn-when" data-toggle="tab" >&rArr; General</a></li>
<li><a href="#SSR" class="show-all-btn-when" data-toggle="tab" >&rArr; SSR</a></li>
<li><a href="#Obstetrico" class="show-all-btn-when" data-toggle="tab" >&rArr; Obstetrico</a></li>

<li><a  href="#Enfermedad_Actual" class="show-all-btn-when tab-enf-act" data-toggle="tab" >II- Enfermedad Actual</a></li>

<li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li>
<li><a href="#examen-fisico" class="show-all-btn-when" data-toggle="tab" >&rArr; Fisico</a></li>
<li><a href="#Del_Sistema" class="show-all-btn-when" data-toggle="tab" >&rArr; Del Sistema</a></li>

<li><a  href="#conclusion" class="show-all-btn-when tab-con-diag" data-toggle="tab" >&rArr; Conclusion Diagnóstica</a></li>

<li><a  href="#control_prenatal" class="show-all-btn-when" data-toggle="tab" >&rArr; Control Prenatal </a></li>

<li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li>
<li><a href="#recetas" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Recetas </a></li>
<li><a href="#estudios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Estudios</a></li>
<li><a href="#laboratorios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Laboratorios </a></li>

<?php
}

elseif($area=="MEDICINA FISICA Y REHABILITACION" ){
?>
<li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li>
<li class="active addb" ><a href="#Datos_personales" class="show-all-btn-when"  data-toggle="tab" >&rArr; General</a></li>
<li><a  href="#Enfermedad_Actual" class="show-all-btn-when tab-enf-act" data-toggle="tab" >II- Enfermedad Actual</a></li>

<li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li>
<li><a href="#Rehabilitacion" class="show-all-btn-when" data-toggle="tab" >&rArr; Rehabilitacion</a></li>
<li><a href="#examen-fisico" class="show-all-btn-when" data-toggle="tab" >&rArr; Fisico</a></li>
<li><a href="#Del_Sistema" class="show-all-btn-when" data-toggle="tab" >&rArr; Del Sistema</a></li>
<hr  class="hr_ad" />
<li><a  href="#conclusion" class="show-all-btn-when tab-con-diag" data-toggle="tab" >&rArr; Conclusion Diagnóstica</a></li>

<li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li>
<li><a href="#recetas" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Recetas </a></li>
<li><a href="#estudios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Estudios</a></li>
<li><a href="#laboratorios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Laboratorios </a></li>
<?php	
}
elseif	($area=="OFTALMOLOGIA" ){	
?>	
<li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li>
<li class="active addb" ><a href="#Datos_personales" class="show-all-btn-when" data-toggle="tab" >&rArr; General</a></li>

<li><a  href="#Enfermedad_Actual" class="show-all-btn-when tab-enf-act" data-toggle="tab" >II- Enfermedad Actual</a></li>

<li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li>
<li><a href="#oftalmologia" class="show-all-btn-when" data-toggle="tab" >&rArr; Oftalmologia</a></li>
<li><a class="" data-toggle="modal" data-target="#of-ref-mdl" href="<?php echo base_url("admin_medico/oftalRef/$id_historial/$user_id/$centro_medico")?>">&rArr; Refracción</a>

<li><a  href="#conclusion" class="show-all-btn-when tab-con-diag" data-toggle="tab" >&rArr; Conclusion Diagnóstica</a></li>

<li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li>
<li><a href="#recetas" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Recetas </a></li>
<li><a href="#estudios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Estudios</a></li>
<li><a href="#laboratorios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Laboratorios </a></li>

<?php	

}
elseif	($area=="PEDIATRIA" ){	
?>
<li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li>
<li class="active addb" ><a href="#Datos_personales" class="show-all-btn-when" data-toggle="tab" >&rArr; General</a></li>

<li><a href="#Pediatrico" class="show-all-btn-when" id="pediat_show_btn" data-toggle="tab" >II- Pediatrico</a></li>

<li><a  href="#Enfermedad_Actual" class="show-all-btn-when  tab-enf-act" id="enfact_show_btn" data-toggle="tab" >III- Enfermedad Actual</a></li>

<li><a href="#examen-fisico" class="show-all-btn-when" data-toggle="tab" >IV- Fisico</a></li>
<li><a href="#Del_Sistema" class="show-all-btn-when" data-toggle="tab" >V- Del Sistema</a></li>
<li><a  href="#conclusion" class="show-all-btn-when tab-con-diag" data-toggle="tab"  >VI- Conclusion Diagnóstica</a></li>

<li><a class="this-is-a-title"><strong>VII- INDICACIONES</strong></a></li>
<li><a href="#recetas" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Recetas </a></li>
<li><a href="#estudios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Estudios</a></li>
<li><a href="#laboratorios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Laboratorios </a></li>
<?php	
}
elseif ($area=="DERMATOLOGO" ){
?>
<li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li>
<li class="active addb" ><a href="#Datos_personales" class="show-all-btn-when" data-toggle="tab" >&rArr; General</a></li>

<li><a  href="#Enfermedad_Actual" class="show-all-btn-when  tab-enf-act" id="enfact_show_btn" data-toggle="tab" >III- Enfermedad Actual</a></li>

<li><a href="#Del_Dermatologico"  data-toggle="tab" >V- Dermatologo</a></li>

<li><a  href="#conclusion" class="show-all-btn-when tab-con-diag" data-toggle="tab"  >VI- Conclusion Diagnóstica</a></li>

<li><a class="this-is-a-title"><strong>VII- INDICACIONES</strong></a></li>
<li><a href="#recetas" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Recetas </a></li>
<li><a href="#estudios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Estudios</a></li>
<li><a href="#laboratorios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Laboratorios </a></li>

<?php
}
else {
?>

<li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li>
<li class="active addb" ><a class="show-all-btn-when" href="#Datos_personales"  data-toggle="tab" >&rArr; General</a></li>

<li><a  href="#Enfermedad_Actual" class="show-all-btn-when tab-enf-act" data-toggle="tab" ><strong>II- Enfermedad Actual</strong></a></li>

<li><a class="this-is-a-title"><strong>III- EXAMEN</strong></a></li>
<li><a href="#examen-fisico" class="show-all-btn-when" data-toggle="tab" >&rArr; Fisico</a></li>
<!--<li><a href="#examen-otorino" class="show-all-btn-when" data-toggle="tab" >&rArr; Fisico Otorrino</a></li>-->
<li><a href="#Del_Sistema" class="show-all-btn-when" data-toggle="tab" >&rArr; Del Sistema</a></li>

<li><a  href="#conclusion" class="show-all-btn-when tab-con-diag" data-toggle="tab" ><strong>IV- Conclusion Diagnóstica</strong></a></li>

<li><a class="this-is-a-title"><strong>V- INDICACIONES</strong></a></li>
<li><a href="#recetas" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Recetas </a></li>
<li><a href="#estudios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Estudios</a></li>
<li><a href="#laboratorios" class="hide-all-btn-when-incaciones" data-toggle="tab" >&rArr; Laboratorios </a></li>


<?php	
} 
?>
</ul>

</div>


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