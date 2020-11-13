<?php
$this->load->view('admin/header_patient');
$this->load->view('admin/search_patient');
function rand_string( $length ) {

$chars = "0123456789";
return substr(str_shuffle($chars),0,$length);

}
?>
	<style>
	td{text-align:left}
	</style> 
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<div class="col-md-3 hideaside " style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb;border-right:none" > <!-- required for floating -->
 <!-- required for floating -->
<!-- Nav tabs -->
<ul  class="nav nav-pills nav-stacked hide-next-data-patient">
<li class="active" ><a href="#Datos_personales"  data-toggle="tab" class="">I- DATOS PERSONALES  <i class="fa fa-arrow-left datosp" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>
<li><a href="#Contactos_de_emergencia" data-toggle="tab">II- CONTACTOS DE EMERGENCIA</a></li>
<li><a href="#En_case_de_menores_de_edad" data-toggle="tab">III- EN CASE DE MENORES EDAD</a></li>
<li><a  href="#Datos_citas" data-toggle="tab">IV- DATOS CITAS <i class="fa fa-arrow-left datoscitas" style="display:none;font-size:20px;color:red;background:white;border-radius:9px"></i></a></li>

</ul>
<!--
<hr class="rem-hr" id="hr_ad"/>
<img class="img-responsive" style="" src="<?= base_url();?>assets/img/user.png">
 <br/><br/>
 --> 
</div>

<?php
foreach($patient as $row)
	 
	 {
		 setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->insert_date)));	
$update_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->update_date)));	
 
?>
<div class="col-md-9" id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >

<h3 class="h3">Paciente</h3>
<h4 class="h4">
 Nombres : <span style="text-transform:uppercase"><?=$row->nombre?></span>  || Cedula : <?=$row->cedula?>
</h4>
 <?php echo $this->session->flashdata('message_cita'); ?>
<hr id="hr_ad"/>

<form  class="form-horizontal " action="<?php echo site_url('admin/saveUpdatePatient');?>"  > 
<input type="hidden" name="id" value="<?=$row->id_p_a?>">
<div class="tab-content" id="all_dis"  style="margin-left:6%" >
<div class="tab-pane active" id="Datos_personales"> 
<h3 class="h3 show_edit_text"  style="margin-left:100px;display:none">Editar</h3>
<a  style="float:right" class="btn btn-primary btn-sm click-editar" ><i class="fa fa-pencil" aria-hidden="true" title="Editar <?=$row->nombre?>  <?=$row->apellido?>" ></i> Editar </a>
<a  style="float:right;display:none" class="btn btn-success btn-sm save-patient" ><i class="fa fa-pencil" aria-hidden="true" title="Guardar  <?=$row->nombre?>  <?=$row->apellido?>" ></i> Guardar</a>

<div class="form-group">
<label class="control-label col-sm-3"> Nombres</label>
<div class="col-sm-6">
<input type="text" class="form-control"  value="<?=$row->nombre?>" disabled  >

</div>
</div>


<div class="form-group">
<label  class="control-label col-sm-3"> Cedula</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"  value="<?=$row->cedula?>"   ></div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->alias?>"   >

</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-3'>Fecha nacimento</label>
<div class='col-sm-6'>
<input disabled type='text' class='form-control' value='<?=$row->date_nacer?>' >
</div>
</div>

<div class='form-group'>
<label class='control-label col-sm-3'>Edad</label>
<div class='col-sm-2'>
<input disabled type='text' class='form-control' value='<?=$row->edad?>' >
 

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Frecuencia</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"   value="<?=$row->frecuencia?>"  >
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Teléfono residencial</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->tel_resi?>"   >

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Teléfono celular </label>
<div class="col-sm-6">						
<input disabled type="text" class="form-control bfh-phone" value="<?=$row->tel_cel?>"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Correo electrónico </label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->email?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Sexo</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control" value="<?=$row->sexo?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Estado Civil</label>
<div class="col-sm-3">
<input disabled type="text" class="form-control" value="<?=$row->estado_civil?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Nacianalidad</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->nacionalidad?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Seguro médico</label>
<div class="col-sm-5">
<?php 
$seguro_medico=$this->db->select('id_sm, title')->where('id_sm',$row->seguro_medico )
 ->get('seguro_medico')->row_array();
 ?>
<input disabled type="text" class="form-control" value="<?=$seguro_medico['title']?>">

<input id="seguro_medico" type="hidden" class="form-control" value="<?=$row->seguro_medico?>">

</div>
</div>
<div id="seguro_input"></div>
<div class="form-group">
<label class="control-label col-sm-3">Provincia</label>
<div class="col-sm-5">
<?php 
$provincia=$this->db->select('title')->where('id',$row->provincia )
 ->get('provinces')->row('title');
 ?>
<input disabled type="text" class="form-control" value="<?=$provincia?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Municipio</label>
<div class="col-sm-4">

<?php 
$municipio=$this->db->select('title_town')->where('id_town',$row->municipio )
 ->get('townships')->row('title_town');
 ?>
<input disabled type="text" class="form-control" value="<?=$municipio?>">

</div>
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Barrio </label>
<div class="col-sm-5">
<input disabled type="text" class="form-control"  value="<?=$row->barrio?>"  >
</div>							
</div>
<div class="form-group">
<label   class="control-label col-sm-3"> Calle</label>
<div class="col-sm-4">
<input disabled type="text" class="form-control"  value="<?=$row->calle?>"  >
</div>
		
</div>
<a href="#anchor" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

</div>
 <div class="tab-pane" id="Contactos_de_emergencia">
 <h3 class="h3 show_edit_text"  style="margin-left:100px;display:none">Editar</h3>
<a  style="float:right" class="btn btn-primary btn-sm click-editar" ><i class="fa fa-pencil" aria-hidden="true" title="Editar <?=$row->nombre?>  <?=$row->apellido?>" ></i> Editar </a>
<a  style="float:right;display:none" class="btn btn-success btn-sm save-patient" ><i class="fa fa-pencil" aria-hidden="true" title="Guardar  <?=$row->nombre?>  <?=$row->apellido?>" ></i> Guardar</a>
<div class="form-group">
<label  class="control-label col-sm-3">Nombres</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_nombre?>">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Alias</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_alias?>">
</div>
</div>
<input type="hidden"  name="solicitud" value="1EC"  readonly>
<div class="form-group">
<label class="control-label col-sm-3" >Celular</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"  value="<?=$row->contacto_em_cel?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Telefono 1</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_tel1?>">
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">Telefono 2</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control" value="<?=$row->contacto_em_tel2?>">

 </div>
</div>
 </div>
<div class="tab-pane" id="En_case_de_menores_de_edad">
<h3 class="h3 show_edit_text"  style="margin-left:100px;display:none">Editar</h3>
<a  style="float:right" class="btn btn-primary btn-sm click-editar" ><i class="fa fa-pencil" aria-hidden="true" title="Editar <?=$row->nombre?>  <?=$row->apellido?>" ></i> Editar </a>
<a  style="float:right;display:none" class="btn btn-success btn-sm save-patient" ><i class="fa fa-pencil" aria-hidden="true" title="Guardar  <?=$row->nombre?>  <?=$row->apellido?>" ></i> Guardar</a>
<div class="form-group">
<br/>
<label class="control-label col-sm-3"  >Responsable legal</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"  value="<?=$row->responsable_legal?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Cedula ó Pasaporte</label>
<div class="col-sm-6">
<input disabled type="text" class="form-control"  value="<?=$row->responsable_legal?>"  >
</div>
</div>
</div>
</form>
<div class="tab-pane " id="Datos_citas">
<a data-toggle="modal"   data-target="#NewC" style="float:right"  class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true" title="Nueva Cita"  ></i> nueva cita </a>
<div id="hide_view_cita" >
<i><?=$number_cita?> citas</i>
<table class="table" style="font-size:15px">
<tr style="background:white;color:#38a7bb"><th>1-NEC</th><th>Causa</th><th>Centro medico</th><th>Area</th><th>Doctor</th><th>Fecha</th><th>Editar</th></tr>
<?php
foreach($rendez_vous as $row_rd)
{
//-----------causa--------------------
$caus=$this->db->select('title')->where('id',$row_rd->causa )
->get('type_reasons')->row_array();
//---------centro medico-------------------
$centro=$this->db->select('name')->where('id_m_c',$row_rd->centro )
->get(' medical_centers')->row_array();
//---------centro medico-------------------
$area=$this->db->select('title_area')->where('id_ar',$row_rd->area )
->get(' areas')->row_array();
//------------doctor--------------------
$doctor=$this->db->select('first_name,last_name')->where('id',$row_rd->doctor )
   ->get('doctors')->row_array();
?>
<tr>
<td><?=$row_rd->nec?></td>
<td><?=$caus['title']?></td>
<td><?=$centro['name']?></td>
<td><?=$area['title_area']?></td>
<td><?=$doctor['first_name'];?> <?=$doctor['last_name'];?></td>
<td><?=$row_rd->fecha_propuesta?></td>
<td><a style="cursor:pointer" title="Editar cita : <?=$row_rd->nec?> " data-toggle="modal" data-target="#EditC"  data-target="#EditC" href="<?php echo site_url("admin/UpdateCita/".$row_rd->id_apoint)?>" ><i class="fa fa-pencil" aria-hidden="true" ></i> </a></td>

</tr>
<?php
}
?>
</table>

<?php
}
?>
</div><!--view cita end-->
<div id="load_new_cita"></div>

<!-- nueva cita form-->
<!--show form cita end-->
</div><!--div datos citas ends-->

 </div>
 


</div>

 </div><!--container-->
 </div>
<div class="modal fade" id="NewC" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >
<div class="modal-body">
<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h4 style="margin-left:20px">Crear Nueva Cita </h4>
</div>
<div  style=" height:74vh; overflow-y: auto;" id="background_" >
<br/>
<div id="userText" class="form-horizontal"  > 
<form method="post" name="myform" action="<?php echo site_url('admin/add_new_cita');?>">
<input  type="hidden" id="nec"  value="NEC-<?php echo rand_string(4);?>"  >
<input  type="hidden" name="id_patient" id="id_patient"  value="<?=$row->id_p_a?>"  >
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6">
<select class="form-control selectpicker"  data-show-subtext="true" data-live-search="true" name="causa" id="causa" >
<option value="">Selecionne</option>
<?php 

foreach($causa as $ca)
{ 
echo '<option value="'.$ca->id.'">'.$ca->title.'</option>';
}
?>

</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-7">
<select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" name="centro_medico" id="centro_medico" >
 <option value="">Selecionne</option>
 <?php 

 foreach($centro_medico as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>

 </select>
 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6">
<select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="especialidad" name="especialidad"  onChange="getDoc(this.value);" >
 <option value="">Selecionne</option>
 <?php 

 foreach($especialidades as $esp)
 { 
 echo '<option value="'.$esp->id_ar.'">'.$esp->title_area.'</option>';
 }
 ?>
 </select>
</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">

<select class="form-control"  name="doctor" id="doctor_dropdown" disabled >

</select>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" >Fecha propuesta <span class="req">*</span></label>
<div class="col-sm-6">
<div class="input-group date form_pro col-md-12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control fecha_propuesta" id="fecha_propuesta" name="fecha_propuesta"  readonly>
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span><br/>
</div>
<input type="hidden" name="fecha_filter" id="mirror_pro" value="" readonly />
</div>
</div>
</form>
</div>
</div>
</div>
 </div>
    </div>
</div>

<div class="modal fade" id="EditC" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >
<div class="modal-body">
</div>
 </div>
    </div>
</div>
 <?php
        $this->load->view('footer');
 ?>
   </body>

 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
 <script src="<?=base_url();?>assets/js/links_select.js"></script> 
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
  
<script>
 $(window).on( "load", function() {
	 var idpatient=<?=$row->id_p_a?>; 
	var seguro_medico = $("#seguro_medico").val();
      $.ajax({
		url: '<?php echo site_url('admin/get_input_view_edit');?>',
        type: 'post',
        
		data:{idpatient:idpatient,seguro_medico:seguro_medico},
        success: function (data) {
              		 $("#seguro_input").html(data);
        }
		
    });
    });


function getDoc(val) {
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/get_doc');?>',
	data:'id_esp='+val,
	success: function(data){
	$("#doctor_dropdown").prop('disabled', false);
		$("#doctor_dropdown").html(data);
	}
	});
}

$('.click-editar').on('click', function() {
$(".click-editar").hide();
$(".show_edit_text").slideDown(1000);
$(".save-patient").slideDown(1000);
$("#all_dis").find('input').prop('disabled', false);
});

 $('#EditC').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
</script>
</html>