<?php
foreach($ExamFisById as $rowExF)
$user_c22=$this->db->select('name')->where('id_user',$rowExF->inserted_by)->get('users')->row('name');
$user_c23=$this->db->select('name')->where('id_user',$rowExF->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($rowExF->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($rowExF->updated_time));
?>
<style>
@media (min-width: 768px) {
  .modal-inc-width3 {
    width: 95%;
    margin: auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}
</style>
<div class="modal-header"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<div class="col-md-6"  >
<h3 class="modal-title"  >Examen fisico # <?=$rowExF->id_sig?></h3>
Creado por :<?=$user_c22?>, <?=$inserted_time?> <br/>
<span style="color:red"> Cambiado por :<?=$user_c23?> | fecha :<?=$update_time?></span> 
</div>
<div class="col-md-3"  >
<br/><br/>
 <?php if($rowExF->id_user==$id_user || $perfil=="Admin") {?>
<button type="button"  class="show_modif_exam_fis btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
<button type="button" id="save_exam_fis_hide" class="save_exam_fis_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$rowExF->id_sig/0/0/examfis")?>"  style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
</div>
</div>
<div class="modal-body" style="max-height: calc(150vh - 210px); overflow-y: auto;">
<div  class="form-horizontal"    >
<input type="hidden" id="id_sig" value="<?=$rowExF->id_sig?>">
<input type="hidden" id="updated_by" value="<?=$user?>">
<div class="col-md-12 disable-all backg" style="background:white;">
<div class="col-md-12" >
<div id='reload-table-signo'></div>
</div>
<div class="col-md-12" style="overflow-x:auto;"  >

<table class="table"  cellspacing="0" >
  <tr>
  <th class="col-xs-4">Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td class="ida" ><br/><br/>
<label  class="col-sm-3 control-label">Peso</label>
<div class="input-group">
	<input class="form-control"  id="pesoex" value="<?=$rowExF->peso?>" type="text" >
   <span class="input-group-addon">lb</span>
   <input class="form-control" id="kgex" value="<?=$rowExF->kg?>" type="text" readonly>
	<span class="input-group-addon">kg</span>
</div>

</td>
<td title="Tension Arterial" style=""><br/><br/>
<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (mm)</span>

<input class="form-control"  id="taex" value="<?=$rowExF->ta?>" type="text"> 
</div>
</div>

<div class="col-sm-6">
<div class="input-group">
<span class="input-group-addon">Tens. art. (hg)</span>

<input class="form-control " id="hgex" value="<?=$rowExF->hg?>"  type="text">
</div>
</div>
</td>
<td style="width:1px" >
<br/>
<br/>
<?php
if($rowExF->radio =="SANO"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='SANO' $selected /> SANO";
?>
 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;">

<label  class="col-sm-2 control-label">Talla</label>
<div class="col-sm-8">
<div class="input-group">
<input class="form-control" title="talla en metro" id="tallaex"  type="text" value="<?=$rowExF->talla?>"  type="text">
   <span class="input-group-addon">m</span>
</div>
</div>


</td>
<td style="width:5px;">
<label for="new_discount" class="col-sm-1 control-label">Fr</label>
<div class="col-sm-3" title="Frecuencia respiratoria">
<div class="input-group">
<input class="form-control" id="frex" value="<?=$rowExF->fr?>" type="text" >

</div>
</div>
<label  class="col-sm-2 control-label">Tempo.</label>
<div class="col-sm-5 col-sm-offset-1">
<div class="input-group" title="Temperatura">
<input class="form-control " id="tempoex" value="<?=$rowExF->tempo?>" type="text" >
<span class="input-group-addon"> &#8451 </span>

</div>
</div>
</td>
<td style="width:1px" >
<?php
if($rowExF->radio =="AGUDAMENTE ENFERMA"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='AGUDAMENTE ENFERMA' $selected /> AGUDAMENTE ENFERMA";
?></td>
</tr>



<tr>

<td class="ida" style="width:1px;">
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-7">
	<div class="input-group">
		<input class="form-control formatnum" id="imcex" value="<?=$rowExF->imc?>" type="text" >
	   
	</div>
</div>
 </td>
<td style="width:5px;">
<label  class="col-sm-1 control-label">Fc</label>
                    <div class="col-sm-3">
                        <div class="input-group" title="Frecuencia cardiaca">
                            <input class="form-control" id="fcex" value="<?=$rowExF->fc?>" type="text" >
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">Pulso</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="pulsoex" type="text" value="<?=$rowExF->pulso?>" >
                            <span class="input-group-addon">Pm</span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<?php
if($rowExF->radio =="CRONICAMENTE ENFERMA"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='CRONICAMENTE ENFERMA' $selected /> CRONICAMENTE ENFERMA";
?></td>
</tr>

<tr>

<td style="width:12px">
<label  class="col-sm-2 control-label">Glicemia</label>
<div class="col-sm-7 col-sm-offset-1">
<input class="form-control" id="glicemiae" value="<?=$rowExF->glicemia?>"  type="text">

<i class="fa fa-warning glicemiae" style='color:red;display:none'>Glicemia anormal !</i>
</div>	   
 </td>

<td style="width:1px" >
</td>
</tr>



</table>

</div>