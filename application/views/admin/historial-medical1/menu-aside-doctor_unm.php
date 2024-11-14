<div class="row">
<?php 
foreach($patient as $row)
if($area=="OFTALMOLOGIA"||$area=="DERMATOLOGO" || $area=="Cirujano Vascular Y Endovascular" || $area=="CONSEJERIA"  || $area=="UROLOGIA"){
	$hideExaYSist="style='display:none'";
	}else{
		$hideExaYSist="";
		} 
		
	if($area=="Cirujano Vascular Y Endovascular") {
		$enfTab="cirujano-vascular";
	}else{
		$enfTab="Enfermedad_Actual";
	}

if($area=="CONSEJERIA"){
	$show_con_diag="style='display:none'";
}else{
$show_con_diag="";	
}
		
if($area=="UROLOGIA"){
$show_exam_fis_urologo="";
}else{
	$show_exam_fis_urologo="style='display:none'";
}	
		
		?>
		<div class="col-md-2 col-sm-3 sidebar"style="background:#fff"id="menu-left-as">
		<h1>HISTORIA CLINICA</h1>
		<ul class="nav nav-sidebar">
		<li><a class="this-is-a-title"><strong>I- ANTECEDENTES</strong></a></li>
		<li class="active addb"><a class="show-all-btn-when"data-toggle="tab"href="#Datos_personales">
		⇒ General
		<!--<span id="uro-ant-btns" style="disable:none">
		<button type="button" class="btn btn-success btn-sm" style="border:1px solid;display:none" id="saveEditUroAnt" >Guardar</button>
		<button type="button" class="btn btn-warning btn-sm" style="border:1px solid;" id="showEditUroAnt">Editar</button>
        
		</span>-->
		</a></li>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#<?=$enfTab?>"id="show-enf-form" >⇒ Enfermedad Actual <span class="tab-enf-act"></span></a></li>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#conclusion" <?=$show_con_diag?>>⇒ Conclusion Diagnóstica <span class="tab-con-diag"></span></a></li>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#examen-fisico" id="getExamFisSelected" <?=$hideExaYSist?> >⇒ Fisico</a></li>
		<li>
		<a class="show-all-btn-when"data-toggle="tab"href="#examen-fisico-urologo" id="getExamFisSelectedUrologo" <?=$show_exam_fis_urologo?>>
		⇒ Fisico
		<!--<span id="urology-btns" style="display:none">
		<button  type="button" class="btn btn-default btn-sm reload-urology" >Nuevo</button>
		<button type="button" class="btn btn-success btn-sm" style="border:1px solid;display:none" id="saveEditUrology" >Guardar</button>
		<button type="button" class="btn btn-warning btn-sm" style="border:1px solid" id="showEditUrology">Editar</button>
        </span>-->
		</a>
		</li>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#Del_Sistema"id="show-examSis-form" <?=$hideExaYSist?> >⇒ Del Sistema</a></li>
		<?php if(preg_match('/GINECOLOGIA/',$area)&&($row->sexo=='Femenina')){ ?>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#SSR">⇒ SSR</a></li>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#Obstetrico">⇒ Obstetrico</a></li>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#control_prenatal">⇒ Control Prenatal</a></li>
		<?php }
		if($area=="MEDICINA FISICA Y REHABILITACION"){ ?>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#Rehabilitacion">⇒ Rehabilitacion</a></li>
		<?php }
		if($area=="OFTALMOLOGIA"){ ?>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#oftalmologia">⇒ Oftalmologia</a></li>
		<li><a class=""data-toggle="modal"href="<?php echo base_url("admin_medico/oftalRef/$id_historial/$user_id/$centro_medico") ?>"data-target="#of-ref-mdl">⇒ Refracción</a></li>
		<?php  }
		if($area=="CONSEJERIA") { ?>
		<li>
		<a class="show-all-btn-when"data-toggle="tab"href="#consejeria" id="show-consejeria">
		⇒ Consejería
		<!--<span id="counseling-btns" style="display:none">
		<hr class="prenatal-separator"/>
		<button  type="button" class="btn btn-default btn-sm reload-consejeria" >Nuevo</button>
		<button type="button" class="btn btn-success btn-sm" style="border:1px solid;display:none" id="saveEditCounseling" >Guardar</button>
		<button type="button" class="btn btn-warning btn-sm" style="border:1px solid" id="showEditCounseling">Editar</button>
        
		</span>-->
		</a>
		</li>
		<?php
		}
		if(preg_match('/PEDIATR/',$area)){ ?>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#Pediatrico"id="pediat_show_btn">⇒ Pediatrico</a></li>
		<?php }if($area=="DERMATOLOGO"){ ?>
		<li><a data-toggle="tab"href="#Del_Dermatologico">⇒ Dermatologo</a></li>
		<?php }  ?>
		<li><a class="this-is-a-title"><strong>VI- INDICACIONES</strong></a></li>
		<li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#recetas"id="show-recetas-data">⇒ Recetas</a></li>
		<li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#estudios"id="show-estudios-data">⇒ Estudios</a></li>
		<li><a class="hide-all-btn-when-incaciones"data-toggle="tab"href="#laboratorios"id="show-lab-data">⇒ Laboratorios</a></li>
		<li><a class="show-all-btn-when"data-toggle="tab"href="#patient-documentos" id="show-patient-documentos"><strong>⇒ Documentos</strong></a></li>
		
		</ul>
		</div>
		</div>
		<div class="fade modal"id="of-ref-mdl"role="dialog"tabindex="-1">
		<div class="modal-dialog modal-md">
		<div class="modal-content">
		</div>
		</div>
		</div>
		<script>$("#of-ref-mdl").on("hidden.bs.modal",function(){$(this).removeData("bs.modal")});$(function(){ var navMain = $("#menu-left-as");navMain.on("click", "a", null, function () {navMain.collapse('hide');});});</script>