<style>
textarea.zz {

  pointer-events: none;

}
table.table-fixed td{
    border: rgb(177,177,177) solid 1px !important;
}


table.table-fixed th{
    border: rgb(177,177,177) solid 1px !important;
}

 @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 900px; /* New width for default modal */
        }
        .modal-sm {
          width: 350px; /* New width for small modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 950px; /* New width for large modal */
		     height: 900px; /* control height here */
        }
    }
.lab-size{font-size:12px}

</style>

<?php

 foreach($showSelectContP1 as $row)

$user_c40=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c41=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));

?>

<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Control Prenal # <span class="round"><?=$row->id_c1?></span> </h3><br/>
<h5 class="modal-title text-center"  >
Creado por :<?=$user_c40?> | fecha :<?=$inserted_time?>  | <span style="color:red"> Cambiado por :<?=$user_c41?> | fecha :<?=$updated_time?></span>
</h5>
<div class="col-md-12 text-center"> <a target="_blank" href="<?php echo base_url("printings/print_if_foto_/$row->id_c1/0/0/contp")?>"  style="cursor:pointer" title="Imprimir Control Prenatal" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a></div>


</div>
<input type="hidden" id="id_c1" value="<?=$row->id_c1?>">
<input type="hidden" id="updated_by" value="<?=$user?>">

<div class="modal-body disable-all" style=" overflow-y: auto;">

<table  class="table table-bordered table-fixed" id="flashcontprn" style="background:#E6E6FA;">
<tr style="text-transform:uppercase">
<td><label class="lab-size">#</label></td>
<td><label class="lab-size">Fecha de la consulta</label></td>
<td><label class="lab-size">Semana de amenorrea</label></td>
<td><label class="lab-size">Peso (lb)</label></td>
<td><label class="lab-size">Tension Arterial Max.Min.- (mm Hg)</label></td>
<td><label class="lab-size">[Alt. Ulterina] - [Present Pubis.FondoCef] - [Pelv.Tr]</label></td>
<td><label class="lab-size">F.C.F.(lat.-min.-Mov.Fetal)</label></td>
<td><label class="lab-size">Edema - Varices</label></td>
<td><label class="lab-size">Otros</label></td>
<td><label class="lab-size">Evolucion</label></td>
<td><label class="lab-size">Editar</label></td>
</tr>
<?php
if(!empty($showSelectContP1 ))  
{
 foreach($showSelectContP1 as $row)


$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));

if($row->id_user==$id_user || $perfil=="Admin") {$display="";}	else {$display="style='display:none'";}	
?>
<tr style="background:white">
<td>1</td>
<td>
<span class="editSpan fechacpp"><?=$row->fecha?></span>
<input class="editInput  form-control input-sm fecha-cpp format-d-c" type="text"  value="<?=$row->fecha?>" style="display: none;color:black">
</td>

<td>
<span class="editSpan semanacpp"><?=$row->semana?></span>
<input class="editInput  form-control input-sm semana-cpp" type="text"  value="<?=$row->semana?>" style="display: none;color:black">
</td>


<td>
<span class="editSpan pesocpp"><?=$row->peso?></span>
<input class="editInput  form-control input-sm peso-cpp" type="text"  value="<?=$row->peso?>" style="display: none;color:black">
</td>


<td>
<span class="tensionhide1"><span class="tension1cpp" style="width:20px"><?=$row->tension?></span>-<span class="tension11cpp"><?=$row->tension11?></span></span>
<div class="input-group sepa tensionshow1" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height tension1-cpp"    type="text" value="<?=$row->tension?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height tension11-cpp"  type="text"   value="<?=$row->tension11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="alt1-hide"><span class="alt1cpp">[<?=$row->alt?>]</span> - <span class="alt11cpp"> [<?=$row->alt11?>]</span> - <span class="alt111cpp">[<?=$row->alt111?>]</span></span>
<div class="input-group sepa alt1-show" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height alt1-cpp"    type="text" value="<?=$row->alt?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height alt11-cpp"  type="text"   value="<?=$row->alt11?>"  style="color:black"/>
 <span class="input-group-addon reduce-height" >-</span>
  <input class="editInput  form-control input-sm reduce-height alt111-cpp"  type="text"   value="<?=$row->alt111?>"  style="color:black"/>
 </div>
</td>




<td>
<span class="fetal1-hide"><span class="fetal1cpp"><?=$row->tension?></span>-<span class="fetal11cpp"><?=$row->tension11?></span></span>
<div class="input-group sepa fetal1-show" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height fetal1-cpp"    type="text" value="<?=$row->fetal?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height fetal11-cpp"  type="text"   value="<?=$row->fetal11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="edema1-hide"><span class="edema1cpp"><?=$row->edema?></span>-<span class="edema11cpp"><?=$row->edema11?></span></span>
<div class="input-group sepa edema1-show" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height edema1-cpp"    type="text" value="<?=$row->edema?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height edema11-cpp"  type="text"   value="<?=$row->edema11?>"  style="color:black"/>
 </div>
</td>





<td>
<span class="otros-hide"><span class="otroscpp"><?=$row->otros?></span></span>
<textarea  style="display:none;width:150px"  class="form-control otros-cpp" cols="20"><?=$row->otros ?></textarea>
</td>


<td>
<span class="evolucion-hide"><span class="otroscpp evolucioncpp"><?=$row->evolucion?></span></span>
<textarea  style="display:none;width:150px"  class="form-control evolucion-cpp" cols="20"><?=$row->evolucion ?></textarea>
</td>



<td>
<span <?=$display?>>
<div class="btn-group btn-group-sm">
<?php
$us1=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
 ?>
<button type="button" class="btn btn-sm btn-default editBtn" style="float: none;" title="Cambiado por :<?=$us1?> | fecha :<?=$updated_time?>"><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;">Guardar</button>
<!--<button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>-->
</span>
</td>
</tr>


<?php
}
if(!empty($showSelectContP2))  
{

//--second row-------------------------------------------------------------------------------------------------------------->


 foreach($showSelectContP2 as $row)

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
?>

<tr>
<td>2</td>
<td>
<span class="editSpan2 fechacpp2"><?=$row->fecha?></span>
<input class="editInput2 form-control input-sm fecha-cpp2 format-d-c" type="text"  value="<?=$row->fecha?>" style="display: none;color:black">
</td>

<td>
<span class="semanacpp2 editSpan2"><?=$row->semana?></span>
<input class="editInput2 form-control input-sm semana-cpp2" type="text"  value="<?=$row->semana?>" style="display: none;color:black">
</td>


<td>
<span class="pesocpp2 editSpan2"><?=$row->peso?></span>
<input class="editInput2  form-control input-sm peso-cpp2" type="text"  value="<?=$row->peso?>" style="display: none;color:black">
</td>


<td>
<span class="tensionhide2 editSpan2"><span class="tension1cpp2"><?=$row->tension?></span>-<span class="tension11cpp2"><?=$row->tension11?></span></span>
<div class="input-group sepa tensionshow2 editInput2" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height tension1-cpp2"    type="text" value="<?=$row->tension?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height tension11-cpp2"  type="text"   value="<?=$row->tension11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="alt1-hide2 editSpan2"><span class="alt1cpp2"><?=$row->alt?></span>-<span class="alt11cpp2"><?=$row->alt11?></span>-<span class="alt111cpp2"><?=$row->alt111?></span></span>
<div class="input-group sepa alt1-show2 editInput2" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height alt1-cpp2"    type="text" value="<?=$row->alt?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height alt11-cpp2"  type="text"   value="<?=$row->alt11?>"  style="color:black"/>
 <span class="input-group-addon reduce-height" >-</span>
  <input class="editInput  form-control input-sm reduce-height alt111-cpp2"  type="text"   value="<?=$row->alt111?>"  style="color:black"/>
 </div>
</td>




<td>
<span class="fetal1-hide2 editSpan2"><span class="fetal1cpp2"><?=$row->tension?></span>-<span class="fetal11cpp2"><?=$row->tension11?></span></span>
<div class="input-group sepa fetal1-show2 editInput2" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height fetal1-cpp2"    type="text" value="<?=$row->fetal?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height fetal11-cpp2"  type="text"   value="<?=$row->fetal11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="edema1-hide2 editSpan2"><span class="edema1cpp2"><?=$row->edema?></span>-<span class="edema11cpp2"><?=$row->edema11?></span></span>
<div class="input-group sepa edema1-show2 editInput2" style="display: none;" >
<input class="form-control input-sm reduce-height edema1-cpp2"    type="text" value="<?=$row->edema?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="form-control input-sm reduce-height edema11-cpp2"  type="text"   value="<?=$row->edema11?>"  style="color:black"/>
 </div>
</td>





<td>
<span class="otros-hide2 editSpan2"><span class="otroscpp2"><?=$row->otros?></span></span>
<textarea  style="display:none;width:150px"  class="form-control otros-cpp2 editInput2" cols="20"><?=$row->otros ?></textarea>
</td>


<td>
<span class="evolucion-hide2 editSpan2"><span class="evolucioncpp2"><?=$row->evolucion?></span></span>
<textarea  style="display:none;width:150px"  class="form-control evolucion-cpp2 editInput2" cols="20"><?=$row->evolucion ?></textarea>
</td>



<td>
<span <?=$display?>>
<div class="btn-group btn-group-sm"> 
<?php
$us2=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
 ?>
<button type="button" class="btn btn-sm btn-default editBtn2" style="float: none;" title="Cambiado por :<?=$us2?> | fecha :<?=$updated_time?>"><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn2" class="btn btn-sm btn-success saveBtn2" style="float: none; display: none;">Guardar</button>
<!--<button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>-->
</span>
</td>
</tr>



<?php

}
//--third row-------------------------------------------------------------------------------------------------------------->

if(!empty($showSelectContP3))  
{
 foreach($showSelectContP3 as $row)

$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
	
?>

<tr  style="background:white">
<td>3</td>
<td>
<span class="editSpan3 fechacpp3"><?=$row->fecha?></span>
<input class="editInput3 form-control input-sm fecha-cpp3  format-d-c" type="text"  value="<?=$row->fecha?>" style="display: none;color:black">
</td>

<td>
<span class="semanacpp3 editSpan3"><?=$row->semana?></span>
<input class="editInput3 form-control input-sm semana-cpp3" type="text"  value="<?=$row->semana?>" style="display: none;color:black">
</td>


<td>
<span class="pesocpp3 editSpan3"><?=$row->peso?></span>
<input class="editInput3  form-control input-sm peso-cpp3" type="text"  value="<?=$row->peso?>" style="display: none;color:black">
</td>


<td>
<span class="editSpan3"><span class="tension1cpp3"><?=$row->tension?></span>-<span class="tension11cpp3"><?=$row->tension11?></span></span>
<div class="input-group sepa tensionshow3 editInput3" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height tension1-cpp3"    type="text" value="<?=$row->tension?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height tension11-cpp3"  type="text"   value="<?=$row->tension11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan3"><span class="alt1cpp3"><?=$row->alt?></span>-<span class="alt11cpp3"><?=$row->alt11?></span>-<span class="alt111cpp3"><?=$row->alt111?></span></span>
<div class="input-group sepa alt1-show3 editInput3" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height alt1-cpp3"    type="text" value="<?=$row->alt?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height alt11-cpp3"  type="text"   value="<?=$row->alt11?>"  style="color:black"/>
 <span class="input-group-addon reduce-height" >-</span>
  <input class="editInput  form-control input-sm reduce-height alt111-cpp3"  type="text"   value="<?=$row->alt111?>"  style="color:black"/>
 </div>
</td>




<td>
<span class="editSpan3"><span class="fetal1cpp3"><?=$row->tension?></span>-<span class="fetal11cpp3"><?=$row->tension11?></span></span>
<div class="input-group sepa fetal1-show3 editInput3" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height fetal1-cpp3"    type="text" value="<?=$row->fetal?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height fetal11-cpp3"  type="text"   value="<?=$row->fetal11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan3"><span class="edema1cpp3"><?=$row->edema?></span>-<span class="edema11cpp3"><?=$row->edema11?></span></span>
<div class="input-group sepa edema1-show3 editInput3" style="display: none;" >
<input class="form-control input-sm reduce-height edema1-cpp3"    type="text" value="<?=$row->edema?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="form-control input-sm reduce-height edema11-cpp3"  type="text"   value="<?=$row->edema11?>"  style="color:black"/>
 </div>
</td>





<td>
<span class="editSpan3"><span class="otroscpp3"><?=$row->otros?></span></span>
<textarea  style="display:none;width:150px"  class="form-control otros-cpp3 editInput3" cols="20"><?=$row->otros ?></textarea>
</td>


<td>
<span class="editSpan3"><span class="evolucioncpp3"><?=$row->evolucion?></span></span>
<textarea  style="display:none;width:150px"  class="form-control evolucion-cpp3 editInput3" cols="20"><?=$row->evolucion ?></textarea>
</td>



<td>
<span <?=$display?>>
<div class="btn-group btn-group-sm"> 
<?php
$us3=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
 ?>
<button type="button" class="btn btn-sm btn-default editBtn3" style="float: none;" title="Cambiado por :<?=$us3?> | fecha :<?=$updated_time?>"><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn3" class="btn btn-sm btn-success saveBtn3" style="float: none; display: none;">Guardar</button>
<!--<button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>-->
</span>
</td>
</tr>



<?php
}
if(!empty($showSelectContP4 ))  
{
//fourth----------------------------------------------
 foreach($showSelectContP4 as $row)

$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
	
?>	

<tr>
<td>4</td>
<td>
<span class="editSpan4 fechacpp4"><?=$row->fecha?></span>
<input class="editInput4 form-control input-sm fecha-cpp4  format-d-c" type="text"  value="<?=$row->fecha?>" style="display: none;color:black">
</td>

<td>
<span class="semanacpp4 editSpan4"><?=$row->semana?></span>
<input class="editInput4 form-control input-sm semana-cpp4" type="text"  value="<?=$row->semana?>" style="display: none;color:black">
</td>


<td>
<span class="pesocpp4 editSpan4"><?=$row->peso?></span>
<input class="editInput4  form-control input-sm peso-cpp4" type="text"  value="<?=$row->peso?>" style="display: none;color:black">
</td>


<td>
<span class="editSpan4"><span class="tension1cpp4"><?=$row->tension?></span>-<span class="tension11cpp4"><?=$row->tension11?></span></span>
<div class="input-group sepa tensionshow4 editInput4" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height tension1-cpp4"    type="text" value="<?=$row->tension?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height tension11-cpp4"  type="text"   value="<?=$row->tension11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan4"><span class="alt1cpp4"><?=$row->alt?></span>-<span class="alt11cpp4"><?=$row->alt11?></span>-<span class="alt111cpp4"><?=$row->alt111?></span></span>
<div class="input-group sepa alt1-show4 editInput4" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height alt1-cpp4"    type="text" value="<?=$row->alt?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height alt11-cpp4"  type="text"   value="<?=$row->alt11?>"  style="color:black"/>
 <span class="input-group-addon reduce-height" >-</span>
  <input class="editInput  form-control input-sm reduce-height alt111-cpp4"  type="text"   value="<?=$row->alt111?>"  style="color:black"/>
 </div>
</td>




<td>
<span class="editSpan4"><span class="fetal1cpp4"><?=$row->tension?></span>-<span class="fetal11cpp4"><?=$row->tension11?></span></span>
<div class="input-group sepa fetal1-show4 editInput4" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height fetal1-cpp4"    type="text" value="<?=$row->fetal?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height fetal11-cpp4"  type="text"   value="<?=$row->fetal11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan4"><span class="edema1cpp4"><?=$row->edema?></span>-<span class="edema11cpp4"><?=$row->edema11?></span></span>
<div class="input-group sepa edema1-show4 editInput4" style="display: none;" >
<input class="form-control input-sm reduce-height edema1-cpp4"    type="text" value="<?=$row->edema?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="form-control input-sm reduce-height edema11-cpp4"  type="text"   value="<?=$row->edema11?>"  style="color:black"/>
 </div>
</td>





<td>
<span class="editSpan4"><span class="otroscpp4"><?=$row->otros?></span></span>
<textarea  style="display:none;width:150px"  class="form-control otros-cpp4 editInput4" cols="20"><?=$row->otros ?></textarea>
</td>


<td>
<span class="editSpan4"><span class="evolucioncpp4"><?=$row->evolucion?></span></span>
<textarea  style="display:none;width:150px"  class="form-control evolucion-cpp4 editInput4" cols="20"><?=$row->evolucion ?></textarea>
</td>



<td>
<span <?=$display?>>
<div class="btn-group btn-group-sm">
<?php
$us4=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
 ?> 
<button type="button" class="btn btn-sm btn-default editBtn4" style="float: none;" title="Cambiado por :<?=$us4?> | fecha :<?=$updated_time?>"><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn4" class="btn btn-sm btn-success saveBtn4" style="float: none; display: none;">Guardar</button>
<!--<button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>-->
</span>
</td>
</tr>
 <?php
}
if(!empty($showSelectContP5 ))  
{

//fifth----------------------------------------------
 foreach($showSelectContP5 as $row)


$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
	
?>

<tr  style="background:white">
<td>5</td>
<td>
<span class="editSpan5 fechacpp5"><?=$row->fecha?></span>
<input class="editInput5 form-control input-sm fecha-cpp5  format-d-c" type="text"  value="<?=$row->fecha?>" style="display: none;color:black">
</td>

<td>
<span class="semanacpp5 editSpan5"><?=$row->semana?></span>
<input class="editInput5 form-control input-sm semana-cpp5" type="text"  value="<?=$row->semana?>" style="display: none;color:black">
</td>


<td>
<span class="pesocpp5 editSpan5"><?=$row->peso?></span>
<input class="editInput5  form-control input-sm peso-cpp5" type="text"  value="<?=$row->peso?>" style="display: none;color:black">
</td>


<td>
<span class="editSpan5"><span class="tension1cpp5"><?=$row->tension?></span>-<span class="tension11cpp5"><?=$row->tension11?></span></span>
<div class="input-group sepa tensionshow5 editInput5" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height tension1-cpp5"    type="text" value="<?=$row->tension?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height tension11-cpp5"  type="text"   value="<?=$row->tension11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan5"><span class="alt1cpp5"><?=$row->alt?></span>-<span class="alt11cpp5"><?=$row->alt11?></span>-<span class="alt111cpp5"><?=$row->alt111?></span></span>
<div class="input-group sepa alt1-show5 editInput5" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height alt1-cpp5"    type="text" value="<?=$row->alt?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height alt11-cpp5"  type="text"   value="<?=$row->alt11?>"  style="color:black"/>
 <span class="input-group-addon reduce-height" >-</span>
  <input class="editInput  form-control input-sm reduce-height alt111-cpp5"  type="text"   value="<?=$row->alt111?>"  style="color:black"/>
 </div>
</td>




<td>
<span class="editSpan5"><span class="fetal1cpp5"><?=$row->tension?></span>-<span class="fetal11cpp5"><?=$row->tension11?></span></span>
<div class="input-group sepa fetal1-show5 editInput5" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height fetal1-cpp5"    type="text" value="<?=$row->fetal?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height fetal11-cpp5"  type="text"   value="<?=$row->fetal11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan5"><span class="edema1cpp5"><?=$row->edema?></span>-<span class="edema11cpp5"><?=$row->edema11?></span></span>
<div class="input-group sepa edema1-show5 editInput5" style="display: none;" >
<input class="form-control input-sm reduce-height edema1-cpp5"    type="text" value="<?=$row->edema?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="form-control input-sm reduce-height edema11-cpp5"  type="text"   value="<?=$row->edema11?>"  style="color:black"/>
 </div>
</td>





<td>
<span class="editSpan5"><span class="otroscpp5"><?=$row->otros?></span></span>
<textarea  style="display:none;width:150px"  class="form-control otros-cpp5 editInput5" cols="20"><?=$row->otros ?></textarea>
</td>


<td>
<span class="editSpan5"><span class="evolucioncpp5"><?=$row->evolucion?></span></span>
<textarea  style="display:none;width:150px"  class="form-control evolucion-cpp5 editInput5" cols="20"><?=$row->evolucion ?></textarea>
</td>



<td>
<span <?=$display?>>
<div class="btn-group btn-group-sm">
<?php
$us5=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
 ?> 
<button type="button" class="btn btn-sm btn-default editBtn5" style="float: none;" title="Cambiado por :<?=$us5?> | fecha :<?=$updated_time?>"><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn5" class="btn btn-sm btn-success saveBtn5" style="float: none; display: none;">Guardar</button>
<!--<button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>-->
</span>
</td>
</tr>
 <?php
 }
if(!empty($showSelectContP6 ))  
{

//sixfth----------------------------------------------
 foreach($showSelectContP6 as $row)

$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
	
?>
<tr>
<td>6</td>
<td>
<span class="editSpan6 fechacpp6"><?=$row->fecha?></span>
<input class="editInput6 form-control input-sm fecha-cpp6  format-d-c" type="text"  value="<?=$row->fecha?>" style="display: none;color:black">
</td>

<td>
<span class="semanacpp6 editSpan6"><?=$row->semana?></span>
<input class="editInput6 form-control input-sm semana-cpp6" type="text"  value="<?=$row->semana?>" style="display: none;color:black">
</td>


<td>
<span class="pesocpp6 editSpan6"><?=$row->peso?></span>
<input class="editInput6  form-control input-sm peso-cpp6" type="text"  value="<?=$row->peso?>" style="display: none;color:black">
</td>


<td>
<span class="editSpan6"><span class="tension1cpp6"><?=$row->tension?></span>-<span class="tension11cpp6"><?=$row->tension11?></span></span>
<div class="input-group sepa tensionshow6 editInput6" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height tension1-cpp6"    type="text" value="<?=$row->tension?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height tension11-cpp6"  type="text"   value="<?=$row->tension11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan6"><span class="alt1cpp6"><?=$row->alt?></span>-<span class="alt11cpp6"><?=$row->alt11?></span>-<span class="alt111cpp6"><?=$row->alt111?></span></span>
<div class="input-group sepa alt1-show6 editInput6" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height alt1-cpp6"    type="text" value="<?=$row->alt?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height alt11-cpp6"  type="text"   value="<?=$row->alt11?>"  style="color:black"/>
 <span class="input-group-addon reduce-height" >-</span>
  <input class="editInput  form-control input-sm reduce-height alt111-cpp6"  type="text"   value="<?=$row->alt111?>"  style="color:black"/>
 </div>
</td>




<td>
<span class="editSpan6"><span class="fetal1cpp6"><?=$row->tension?></span>-<span class="fetal11cpp6"><?=$row->tension11?></span></span>
<div class="input-group sepa fetal1-show6 editInput6" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height fetal1-cpp6"    type="text" value="<?=$row->fetal?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height fetal11-cpp6"  type="text"   value="<?=$row->fetal11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan6"><span class="edema1cpp6"><?=$row->edema?></span>-<span class="edema11cpp6"><?=$row->edema11?></span></span>
<div class="input-group sepa edema1-show6 editInput6" style="display: none;" >
<input class="form-control input-sm reduce-height edema1-cpp6"    type="text" value="<?=$row->edema?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="form-control input-sm reduce-height edema11-cpp6"  type="text"   value="<?=$row->edema11?>"  style="color:black"/>
 </div>
</td>





<td>
<span class="editSpan6"><span class="otroscpp6"><?=$row->otros?></span></span>
<textarea  style="display:none;width:160px"  class="form-control otros-cpp6 editInput6" cols="20"><?=$row->otros ?></textarea>
</td>


<td>
<span class="editSpan6"><span class="evolucioncpp6"><?=$row->evolucion?></span></span>
<textarea  style="display:none;width:160px"  class="form-control evolucion-cpp6 editInput6" cols="20"><?=$row->evolucion ?></textarea>
</td>



<td>
<span <?=$display?>>
<div class="btn-group btn-group-sm"> 
<?php
$us6=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
 ?>
<button type="button" class="btn btn-sm btn-default editBtn6" style="float: none;" title="Cambiado por :<?=$us6?> | fecha :<?=$updated_time?>"><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn6" class="btn btn-sm btn-success saveBtn6" style="float: none; display: none;">Guardar</button>
<!--<button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>-->
</span>
</td>

</tr>

 <?php
 }
if(!empty($showSelectContP7 ))  
{

//seventth----------------------------------------------
 foreach($showSelectContP7 as $row)

$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
	
?>

<tr  style="background:white">
<td>7</td>
<td>
<span class="editSpan7 fechacpp7"><?=$row->fecha?></span>
<input class="editInput7 form-control input-sm fecha-cpp7  format-d-c" type="text"  value="<?=$row->fecha?>" style="display: none;color:black">
</td>

<td>
<span class="semanacpp7 editSpan7"><?=$row->semana?></span>
<input class="editInput7 form-control input-sm semana-cpp7" type="text"  value="<?=$row->semana?>" style="display: none;color:black">
</td>


<td>
<span class="pesocpp7 editSpan7"><?=$row->peso?></span>
<input class="editInput7  form-control input-sm peso-cpp7" type="text"  value="<?=$row->peso?>" style="display: none;color:black">
</td>


<td>
<span class="editSpan7"><span class="tension1cpp7"><?=$row->tension?></span>-<span class="tension11cpp7"><?=$row->tension11?></span></span>
<div class="input-group sepa tensionshow7 editInput7" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height tension1-cpp7"    type="text" value="<?=$row->tension?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height tension11-cpp7"  type="text"   value="<?=$row->tension11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan7"><span class="alt1cpp7"><?=$row->alt?></span>-<span class="alt11cpp7"><?=$row->alt11?></span>-<span class="alt111cpp7"><?=$row->alt111?></span></span>
<div class="input-group sepa alt1-show7 editInput7" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height alt1-cpp7"    type="text" value="<?=$row->alt?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height alt11-cpp7"  type="text"   value="<?=$row->alt11?>"  style="color:black"/>
 <span class="input-group-addon reduce-height" >-</span>
  <input class="editInput  form-control input-sm reduce-height alt111-cpp7"  type="text"   value="<?=$row->alt111?>"  style="color:black"/>
 </div>
</td>




<td>
<span class="editSpan7"><span class="fetal1cpp7"><?=$row->tension?></span>-<span class="fetal11cpp7"><?=$row->tension11?></span></span>
<div class="input-group sepa fetal1-show7 editInput7" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height fetal1-cpp7"    type="text" value="<?=$row->fetal?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height fetal11-cpp7"  type="text"   value="<?=$row->fetal11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan7"><span class="edema1cpp7"><?=$row->edema?></span>-<span class="edema11cpp7"><?=$row->edema11?></span></span>
<div class="input-group sepa edema1-show7 editInput7" style="display: none;" >
<input class="form-control input-sm reduce-height edema1-cpp7"    type="text" value="<?=$row->edema?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="form-control input-sm reduce-height edema11-cpp7"  type="text"   value="<?=$row->edema11?>"  style="color:black"/>
 </div>
</td>





<td>
<span class="editSpan7"><span class="otroscpp7"><?=$row->otros?></span></span>
<textarea  style="display:none;width:170px"  class="form-control otros-cpp7 editInput7" cols="20"><?=$row->otros ?></textarea>
</td>


<td>
<span class="editSpan7"><span class="evolucioncpp7"><?=$row->evolucion?></span></span>
<textarea  style="display:none;width:170px"  class="form-control evolucion-cpp7 editInput7" cols="20"><?=$row->evolucion ?></textarea>
</td>



<td>
<span <?=$display?>>
<div class="btn-group btn-group-sm">
<?php
$us8=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
 ?> 
<button type="button" class="btn btn-sm btn-default editBtn7" style="float: none;" title="Cambiado por :<?=$us8?> | fecha :<?=$updated_time?>"><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn7" class="btn btn-sm btn-success saveBtn7" style="float: none; display: none;">Guardar</button>
<!--<button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>-->
</span>
</td>
</tr>

 <?php
}
if(!empty($showSelectContP8 ))  
{

//eighth----------------------------------------------
 foreach($showSelectContP8 as $row)

$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));		
?>	

<tr>
<td>8</td>
<td>
<span class="editSpan8 fechacpp8"><?=$row->fecha?></span>
<input class="editInput8 form-control input-sm fecha-cpp8  format-d-c" type="text"  value="<?=$row->fecha?>" style="display: none;color:black">
</td>

<td>
<span class="semanacpp8 editSpan8"><?=$row->semana?></span>
<input class="editInput8 form-control input-sm semana-cpp8" type="text"  value="<?=$row->semana?>" style="display: none;color:black">
</td>


<td>
<span class="pesocpp8 editSpan8"><?=$row->peso?></span>
<input class="editInput8  form-control input-sm peso-cpp8" type="text"  value="<?=$row->peso?>" style="display: none;color:black">
</td>


<td>
<span class="editSpan8"><span class="tension1cpp8"><?=$row->tension?></span>-<span class="tension11cpp8"><?=$row->tension11?></span></span>
<div class="input-group sepa tensionshow8 editInput8" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height tension1-cpp8"    type="text" value="<?=$row->tension?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height tension11-cpp8"  type="text"   value="<?=$row->tension11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan8"><span class="alt1cpp8"><?=$row->alt?></span>-<span class="alt11cpp8"><?=$row->alt11?></span>-<span class="alt111cpp8"><?=$row->alt111?></span></span>
<div class="input-group sepa alt1-show8 editInput8" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height alt1-cpp8"    type="text" value="<?=$row->alt?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height alt11-cpp8"  type="text"   value="<?=$row->alt11?>"  style="color:black"/>
 <span class="input-group-addon reduce-height" >-</span>
  <input class="editInput  form-control input-sm reduce-height alt111-cpp8"  type="text"   value="<?=$row->alt111?>"  style="color:black"/>
 </div>
</td>




<td>
<span class="editSpan8"><span class="fetal1cpp8"><?=$row->tension?></span>-<span class="fetal11cpp8"><?=$row->tension11?></span></span>
<div class="input-group sepa fetal1-show8 editInput8" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height fetal1-cpp8"    type="text" value="<?=$row->fetal?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height fetal11-cpp8"  type="text"   value="<?=$row->fetal11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan8"><span class="edema1cpp8"><?=$row->edema?></span>-<span class="edema11cpp8"><?=$row->edema11?></span></span>
<div class="input-group sepa edema1-show8 editInput8" style="display: none;" >
<input class="form-control input-sm reduce-height edema1-cpp8"    type="text" value="<?=$row->edema?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="form-control input-sm reduce-height edema11-cpp8"  type="text"   value="<?=$row->edema11?>"  style="color:black"/>
 </div>
</td>





<td>
<span class="editSpan8"><span class="otroscpp8"><?=$row->otros?></span></span>
<textarea  style="display:none;width:180px"  class="form-control otros-cpp8 editInput8" cols="20"><?=$row->otros ?></textarea>
</td>


<td>
<span class="editSpan8"><span class="evolucioncpp8"><?=$row->evolucion?></span></span>
<textarea  style="display:none;width:180px"  class="form-control evolucion-cpp8 editInput8" cols="20"><?=$row->evolucion ?></textarea>
</td>



<td>
<span <?=$display?>>
<div class="btn-group btn-group-sm">
<?php
$us9=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
 ?>  
<button type="button" class="btn btn-sm btn-default editBtn8" style="float: none;" title="Cambiado por :<?=$us9?> | fecha :<?=$updated_time?>"><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn8" class="btn btn-sm btn-success saveBtn8" style="float: none; display: none;">Guardar</button>
<!--<button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>-->
</span>
</td>
</tr>

 <?php
}

//nineth----------------------------------------------
if(!empty($showSelectContP9 ))  
{

 foreach($showSelectContP9 as $row9)

$updated_time = date("d-m-Y H:i:s", strtotime($row9->updated_time));			
?>

<tr  style="background:white">
<td>9</td>
<td>
<span class="editSpan9 fechacpp9"><?=$row9->fecha?></span>
<input class="editInput9 form-control input-sm fecha-cpp9  format-d-c" type="text"  value="<?=$row9->fecha?>" style="display: none;color:black">
</td>

<td>
<span class="semanacpp9 editSpan9"><?=$row9->semana?></span>
<input class="editInput9 form-control input-sm semana-cpp9" type="text"  value="<?=$row9->semana?>" style="display: none;color:black">
</td>


<td>
<span class="pesocpp9 editSpan9"><?=$row9->peso?></span>
<input class="editInput9  form-control input-sm peso-cpp9" type="text"  value="<?=$row9->peso?>" style="display: none;color:black">
</td>


<td>
<span class="editSpan9"><span class="tension1cpp9"><?=$row9->tension?></span>-<span class="tension11cpp9"><?=$row9->tension11?></span></span>
<div class="input-group sepa tensionshow9 editInput9" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height tension1-cpp9"    type="text" value="<?=$row9->tension?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height tension11-cpp9"  type="text"   value="<?=$row9->tension11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan9"><span class="alt1cpp9"><?=$row9->alt?></span>-<span class="alt11cpp9"><?=$row9->alt11?></span>-<span class="alt111cpp9"><?=$row9->alt111?></span></span>
<div class="input-group sepa alt1-show9 editInput9" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height alt1-cpp9"    type="text" value="<?=$row9->alt?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height alt11-cpp9"  type="text"   value="<?=$row9->alt11?>"  style="color:black"/>
 <span class="input-group-addon reduce-height" >-</span>
  <input class="editInput  form-control input-sm reduce-height alt111-cpp9"  type="text"   value="<?=$row9->alt111?>"  style="color:black"/>
 </div>
</td>




<td>
<span class="editSpan9"><span class="fetal1cpp9"><?=$row9->tension?></span>-<span class="fetal11cpp9"><?=$row9->tension11?></span></span>
<div class="input-group sepa fetal1-show9 editInput9" style="display: none;" >
<input class="editInput  form-control input-sm reduce-height fetal1-cpp9"    type="text" value="<?=$row9->fetal?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="editInput  form-control input-sm reduce-height fetal11-cpp9"  type="text"   value="<?=$row9->fetal11?>"  style="color:black"/>
 </div>
</td>



<td>
<span class="editSpan9"><span class="edema1cpp9"><?=$row9->edema?></span>-<span class="edema11cpp9"><?=$row9->edema11?></span></span>
<div class="input-group sepa edema1-show9 editInput9" style="display: none;" >
<input class="form-control input-sm reduce-height edema1-cpp9"    type="text" value="<?=$row9->edema?>" style="color:black" /> 
<span class="input-group-addon reduce-height" >-</span>
 <input class="form-control input-sm reduce-height edema11-cpp9"  type="text"   value="<?=$row9->edema11?>"  style="color:black"/>
 </div>
</td>





<td>
<span class="editSpan9"><span class="otroscpp9"><?=$row9->otros?></span></span>
<textarea  style="display:none;width:190px"  class="form-control otros-cpp9 editInput9" cols="20"><?=$row9->otros ?></textarea>
</td>


<td>
<span class="editSpan9"><span class="evolucioncpp9"><?=$row9->evolucion?></span></span>
<textarea  style="display:none;width:190px"  class="form-control evolucion-cpp9 editInput9" cols="20"><?=$row9->evolucion ?></textarea>
</td>



<td>
<span <?=$display?>>
<div class="btn-group btn-group-sm">
<?php
$us10=$this->db->select('name')->where('id_user',$row9->updated_by)->get('users')->row('name');
 ?>  
<button type="button" class="btn btn-sm btn-default editBtn9" style="float: none;" title="Cambiado por :<?=$us10?> | fecha :<?=$updated_time?>"><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn9" class="btn btn-sm btn-success saveBtn9" style="float: none; display: none;">Guardar</button>
<!--<button type="button" class="btn btn-sm btn-danger confirmBtn" style="float: none; display: none;">Confirm</button>-->
</span>
</td>
</tr>
<?php }?>
 </table>
 </div>
 



