
<div class="modal-header "  id="background_" >
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">Cirugía Torácica y General</h3>

</div>
<div class="modal-body" id="background_" >
 <div class="container">
 <div class="row">
  <div id="paginationNumber"></div>

<hr class="prenatal-separator"/>
<button class="btn btn-xs btn-primary" id="nuevo-form">NUEVO REGISTRO</button>
<hr class="prenatal-separator"/>
<div id="contenth"></div>

<div id="hide-form-cirugia">
  <form class="form-horizontal" method="post">
  <h3>CREAR NUEVO REGISTRO</h3>
  <hr/>
    <div class="form-group">
      <label class="control-label col-sm-2" >HORA INICIO:</label>
      <div class="col-sm-2">
		<select class="form-control select2" id="hora_inicio" >
		<?php
		echo $option;
		$sql2 ="SELECT * FROM hour_from order by id ASC";
		$query2 = $this->db->query($sql2);
		foreach ($query2->result() as $row) {
		if($genda['hour_from'] == $row->hour) {
		echo "<option selected>".$row->hour."</option>";
		} else {
		echo "<option >".$row->hour."</option>";
		}
		}?>
		</select>

      </div>
	   <label class="control-label col-sm-2" >HORA FINALIZACION:</label>
      <div class="col-sm-2">
      	<select class="form-control select2" id="hora_final" >
		<?php
		echo $option;
		$sql2 ="SELECT * FROM hour_from order by id DESC";
		$query2 = $this->db->query($sql2);
		foreach ($query2->result() as $row) {
		if($genda['hour_to'] == $row->hour) {
		echo "<option selected>".$row->hour."</option>";
		} else {
		echo "<option >".$row->hour."</option>";
		}
		}?>
		</select>
	 </div>
    </div>
	  <div class="form-group">
	 <label class="control-label col-sm-3">DIAGNOSTICO PRE-FBC:</label>
	  <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="diag_pre_fbc"   ></textarea>
	 </div>
    </div>
	<div class=" col-md-3"></div>
	<div class=" col-md-9">
	<div style="overflow-x:auto;">
    <table class="table" style="width:75%">
	 <tr>
      <td>S/V:</td>
      <td>
      <input  class="form-control clear-cirugia-toracia" id="svta"   />
      </td>

      <td >mmhg:</td>
      <td>
      <input  class="form-control clear-cirugia-toracia" id="mmhg">
      </td>

      <td >l/min:</td>
      <td>
      <input  class="form-control clear-cirugia-toracia" id="minfr">
      </td>

      <td >Res/min:</td>
      <td>
      <input  class="form-control clear-cirugia-toracia" id="resmin">
      </td>
    </tr>

	 <tr>
      <td>TA:</td>
      <td>
      <input  class="form-control clear-cirugia-toracia" id="tacir"   />
      </td>

      <td >FC:</td>
      <td>
      <input  class="form-control clear-cirugia-toracia" id="fccir">
      </td>

      <td >FR:</td>
      <td>
      <input  class="form-control clear-cirugia-toracia" id="frcir">
      </td>

      <td >SATO2:</td>
      <td>
      <input  class="form-control clear-cirugia-toracia" id="sato2">
      </td>
    </tr>
  </table>
   </div>
	   </div>
	   <div class="form-group">
      <label class="control-label col-sm-3" >FOSAS NASALES:</label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="fosas_nasales"   ></textarea>
      </div>
    </div>

       <div class="form-group">
      <label class="control-label col-sm-3" >CUERDAS BOCALES:</label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="cuerdad_bocales"   ></textarea>
      </div>
    </div>

         <div class="form-group">
      <label class="control-label col-sm-3" >TRAQUEA:</label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="traqua_text"   ></textarea>
      </div>
    </div>

	  <div class="form-group">
      <label class="control-label col-sm-3" >CARINA:</label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="carina_text"   ></textarea>
      </div>
    </div>


	 <div class="form-group">
      <label class="control-label col-sm-3" >BRONQUIO PRINCIPAL DERECHO: </label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="bronquio_principal" ></textarea>
      </div>
    </div>

	 <div class="form-group">
      <label class="control-label col-sm-3" >LSD, LM, LID:</label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="lsd_lm"   ></textarea>
      </div>
    </div>

		 <div class="form-group">
      <label class="control-label col-sm-3" >BRONQUIO PRINCIPAL IZQUIERDO:</label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="bronquio_prince_iz"   ></textarea>
      </div>
    </div>
		 <div class="form-group">
      <label class="control-label col-sm-3" >LSI, LII:</label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="lsi_lii"   ></textarea>
      </div>
    </div>
	  <div class="col-md-3">
	  </div>
    <div class="col-md-9">
      <label class="checkbox-inline">
  <input type="checkbox" name="cepillado_bronquial" class="unchecked-me-c" > CEPILLADO BRONQUIAL
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="lavado_bronco" class="unchecked-me-c"> LAVADO BRONCOALVEOLAR
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="broncoas" class="unchecked-me-c" > BRONCOASPIRADO
</label><br>
      <label class="checkbox-inline">
  <input type="checkbox" name="biopsia_bronq" class="unchecked-me-c"> BIOPSIA BRONQUIAL
</label>
            <label class="checkbox-inline">
  <input type="checkbox" name="biopsia_tras" class="unchecked-me-c"> BIOPSIA TRASBRONQUIAL
</label>
        <label class="checkbox-inline">
  <input type="checkbox" name="puncion_tras" class="unchecked-me-c"> PUNCION TRASBRONQUIAL
</label>
      <br/><br/>
    </div>

    	 <div class="form-group">
      <label class="control-label col-sm-3">COMPLICACIONES:</label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="complic_text"   ></textarea>
      </div>
    </div>

	  	 <div class="form-group">
      <label class="control-label col-sm-3" >DIAGNOSTICO POST-FBC:</label>
      <div class="col-sm-5">
      <textarea  class="form-control clear-cirugia-toracia" id="diag_post_fbc"   ></textarea>
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
	  <button type="button" id="save-cirugia-toracia" class="btn btn-md btn-success"><i class="fa fa-check after-actionp" style="display:none;color:blue;font-size:30px;position:absolute"></i> GUARDAR</button>
		<a id="imprimir-cirugia" style="display:none"  class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/c_t_0/$id_historial/$user_id/$centro_medico/g")?>"  ><i class="fa fa-print"></i> Imprimir</a>
    </div>

    </div>

	<div id="rrrt"></div>
  </form>
</div>
</div>
</div>
</div>

<script>
 $('.select2').select2({
  tags: true
});

function paginationNumber(){
var centro_medico=<?=$centro_medico?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/showCirugiaTabulation",
data: {id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_medico:centro_medico},
method:"POST",
success:function(data){
$('#paginationNumber').html(data);
},

});
}

paginationNumber();


$('#save-cirugia-toracia').on('click', function(event) {
	event.preventDefault();
	$('#save-cirugia-toracia').prop("disabled",true);
	$('#save-cirugia-toracia').text("guardando...");
var hora_inicio =$("#hora_inicio").val();
var hora_final=$("#hora_final").val();
var diag_pre_fbc=$("#diag_pre_fbc").val();
var svta=$("#svta").val();
var mmhg=$("#mmhg").val();
var minfr=$("#minfr").val();
var resmin=$("#resmin").val();

var fosas_nasales=$("#fosas_nasales").val();
var cuerdad_bocales=$("#cuerdad_bocales").val();
var traqua_text=$("#traqua_text").val();
var carina_text=$("#carina_text").val();
var bronquio_principal=$("#bronquio_principal").val();
var  lsd_lm =$("#lsd_lm").val();
var  bronquio_prince_iz=$("#bronquio_prince_iz").val();
var  lsi_lii=$("#lsi_lii").val();

var cepillado_bronquial = [];
 $("input[name='cepillado_bronquial']:checked").each(function(){
  cepillado_bronquial.push(this.value);
 });

var lavado_bronco = [];
 $("input[name='lavado_bronco']:checked").each(function(){
  lavado_bronco.push(this.value);
 });

var broncoas = [];
 $("input[name='broncoas']:checked").each(function(){
  broncoas.push(this.value);
 });

var biopsia_bronq = [];
 $("input[name='biopsia_bronq']:checked").each(function(){
  biopsia_bronq.push(this.value);
 });


var biopsia_tras = [];
 $("input[name='biopsia_tras']:checked").each(function(){
  biopsia_tras.push(this.value);
 });


var puncion_tras = [];
 $("input[name='puncion_tras']:checked").each(function(){
  puncion_tras.push(this.value);
 });

var  complic_text=$("#complic_text").val();
var  diag_post_fbc=$("#diag_post_fbc").val();

var id_user  = <?=$user_id?>;
var id_patient = <?=$id_historial?>;
var id_cirugia_toracia=0;

var  tacir=$("#tacir").val();
var  fccir=$("#fccir").val();
var  frcir=$("#frcir").val();
 var sato2=$("#sato2").val();
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/cirugiaToracia",
data: {hora_inicio:hora_inicio,hora_final:hora_final,svta:svta,mmhg:mmhg, minfr: minfr,resmin:resmin,diag_pre_fbc:diag_pre_fbc,tacir:tacir,fccir:fccir,
fosas_nasales:fosas_nasales.trim(), cuerdad_bocales:cuerdad_bocales.trim(),traqua_text:traqua_text.trim(),id_cirugia_toracia:id_cirugia_toracia,frcir:frcir,
carina_text:carina_text.trim(),bronquio_principal:bronquio_principal.trim(),lsd_lm:lsd_lm.trim(),bronquio_prince_iz:bronquio_prince_iz.trim(),lsi_lii:lsi_lii.trim(),
id_user:id_user,id_patient:id_patient,cepillado_bronquial:cepillado_bronquial,lavado_bronco:lavado_bronco,diag_post_fbc:diag_post_fbc.trim(),sato2:sato2,
broncoas:broncoas,biopsia_bronq:biopsia_bronq,biopsia_tras:biopsia_tras,puncion_tras:puncion_tras,complic_text:complic_text.trim(),
 },
method:"POST",
success:function(data){
paginationNumber();
  $('.after-action').fadeIn('slow', function(){
    $('.after-action').delay(3000).fadeOut();
    });
$('#imprimir-cirugia').show();
$('#save-cirugia-toracia').prop("disabled",false);
$('#save-cirugia-toracia').text("GUARDAR");
}
});

});
</script>
