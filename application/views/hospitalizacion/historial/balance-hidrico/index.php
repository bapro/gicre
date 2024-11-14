<div class="col-md-12 backg"  >
<style>
.b-h{width:100%;}
td { 

}

</style>
<?php 
$enfermera=$this->db->select('name')->where('id_user',$user_id)->get('users')->row('name');
?>
<h4 class="h4 his_med_title">Balance Hídrico</h4>
</div>
<ul class="nav nav-tabs">
  <li class="active"><a  data-toggle="tab" href="#Turno-7-2">TURNO 7-2</a></li>
    <li><a data-toggle="tab" href="#Turno-2-9">TURNO 2-9</a></li>
  <li ><a data-toggle="tab" href="#Turno-9-7">TURNO 9-7</a></li>
  
<!--  <li class="active" id='turno72'><a  href="#">TURNO 7-2</a></li>
    <li id='turno29'><a  href="#">TURNO 2-9</a></li>
  <li  id='turno97'><a  href="#">TURNO 9-7</a></li>-->
 </ul>
 <div class="col-md-12"  >
<div class="tab-content grand-total-turno">
<div  id="Turno-7-2" class="active tab-pane fade in">
<div id="paginateTurno72"></div>
<div id="content-turno-paginate-72"></div>
<div  class='opacity-turno'>
<form method="post" id='SaveTurno72'>
<input type='hidden' name='user_id' value="<?=$user_id?>"/>
<input type='hidden' name='id_patient' value="<?=$id_historial?>"/>
<input type='hidden' name='centro_id' value="<?=$centro_id?>">
<input type='hidden' name='id_turno72' value=""/>
<div class="col-xs-8 "  >
<table class='table b-h '>
<tr>
<td>
<table class='table' id='table-turno-7-2-liq'>
<tr>
<th colspan='3'>LIQUIDOS INGERIDOS</th>
</tr>
<tr>
<th>Hora</th><th>Solución</th><th>Meds</th><th>Vo</th>
</tr>

<tr>
<td>7:00 am</td><td><input type='text' class="form-control turno72_sol" name="turno72_1"  /></td>
<td><input type='text' class="form-control turno72_med" name="turno72_2"  /></td>
<td><input type='text' class="form-control turno72_vo" name="turno72_3" /></td>
</tr>
<tr>
<td>8:00 am</td><td><input type='text' class="form-control turno72_sol" name="turno72_4" /></td>
<td><input type='text' class="form-control turno72_med" name="turno72_5" /></td>
<td><input type='text' class="form-control turno72_vo" name="turno72_6" /></td>
</tr>
<tr>
<td>9:00 am</td><td><input type='text' class="form-control turno72_sol" name="turno72_4_" /></td>
<td><input type='text' class="form-control turno72_med" name="turno72_7" /></td>
<td><input type='text' class="form-control turno72_vo" name="turno72_8" /></td>
</tr>
<tr>
<td>10:00 am</td><td><input type='text' class="form-control turno72_sol" name="turno72_9" /></td>
<td><input type='text' class="form-control turno72_med" name="turno72_10" /></td>
<td><input type='text' class="form-control turno72_vo" name="turno72_11" /></td>
</tr>
<tr>
<td>11:00 am</td><td><input type='text' class="form-control turno72_sol" name="turno72_12" /></td>
<td><input type='text' class="form-control turno72_med" name="turno72_13" /></td>
<td><input type='text' class="form-control turno72_vo" name="turno72_14" /></td>
</tr>
<tr>
<td>12:00 pm</td><td><input type='text' class="form-control turno72_sol" name="turno72_15" /></td>
<td><input type='text' class="form-control turno72_med" name="turno72_16" /></td>
<td><input type='text' class="form-control turno72_vo" name="turno72_17" /></td>
</tr>
<tr>
<td>1:00 pm</td><td><input type='text' class="form-control turno72_sol" name="turno72_18" /></td>
<td><input type='text' class="form-control turno72_med" name="turno72_19" /></td>
<td><input type='text' class="form-control turno72_vo" name="turno72_19_" /></td>
</tr>
<tr>
<td>2:00 pm</td><td><input type='text' class="form-control turno72_sol" name="turno72_20" /></td>
<td><input type='text' class="form-control turno72_med" name="turno72_21" /></td>
<td><input type='text' class="form-control turno72_vo" name="turno72_22" /></td>
</tr>
<tr>
<th>TOTAL<br/>
<input name='turno72_23' id='turno72_23' type='hidden'/>
<input name='turno72_24' id='turno72_24' type='hidden'/>
<input name='turno72_25' id='turno72_25' type='hidden'/>
</th>
<th class='tot_turno72_sol clear-turno72' >0</th> 
<th  class='tot_turno72_med clear-turno72' >0 </th>
<th  class='tot_turno72_vo clear-turno72' >0</th>
</tr>
</table>
</td >
<td    style=' padding:5px;'>
<table class='table b-h ' id='table-turno-7-2-el'>
<tr>
<th colspan='3'>ELIMINADOS</th>
</tr>
<tr>
<th>Diuresis</th><th>Evacuación</th>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di" name='turno72_26' /></td> 
<td><input type='text' class="form-control turno72_eva" name='turno72_27' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di" name='turno72_28' /></td>
<td><input type='text' class="form-control turno72_eva" name='turno72_29' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di" name='turno72_30' /></td>
<td><input type='text' class="form-control turno72_eva" name='turno72_31' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di" name='turno72_32' /></td>
<td><input type='text' class="form-control turno72_eva" name='turno72_33' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di" name='turno72_34' /></td>
<td><input type='text' class="form-control turno72_eva" name='turno72_35' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di" name='turno72_36' /></td>
<td><input type='text' class="form-control turno72_eva" name='turno72_37' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di" name='turno72_38' /></td>
<td><input type='text' class="form-control turno72_eva" name='turno72_39' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di" name='turno72_40' /></td>
<td><input type='text' class="form-control turno72_eva" name='turno72_41' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di" name='turno72_42' /></td>
<td><input type='text' class="form-control turno72_eva" name='turno72_43' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno72_di"  name='turno72_44'/></td>
<td><input type='text' class="form-control turno72_eva" name='turno72_45' /></td>
</tr>
<tr>

<input name='turno72_46' id='turno72_46' type='hidden'/>
<input name='turno72_47' id='turno72_47' type='hidden'/>
<th class='tot_turno72_di clear-turno72' >0</th> 
<th class='tot_turno72_eva clear-turno72' >0</th>  
</tr>
</table>
</td>
</tr>
</table>
</div>

<div class="col-xs-4"  >
  <div class="input-group">
       <span class="input-group-addon">Enfermera</span>
    <input type="text" class="form-control" id='turno72_enfermera' name='turno72_enfermera' value='<?=$enfermera?>' readonly />
    </div>
 <hr/>
   <div class="input-group">
       <span class="input-group-addon">Egreso T</span>
    <input type="text" class="form-control" id='turno_72_egreso_t' name='turno_72_egreso_t' readonly />
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Ingreso T</span>
    <input type="text" class="form-control" id='turno_72_ingreso_t'  name='turno_72_ingreso_t' readonly />
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Balance</span>
    <input type="text" class="form-control" id='turno_72_balance' name='turno_72_balance' readonly />
    </div>
	<br/>
<button type='submit' class="btn btn-sm btn-success" id='submitTurno72' >Guardar Turno 7-2</button>
<span id='successTurno72'></span>
</div>
</form>
</div>
</div>
<!-----------------TURNO 2-9------------------>
<div  id="Turno-2-9" class="tab-pane fade in" >
<div id="paginateTurno29">3</div>
<div id="content-turno-paginate-29"></div>
<form method="post" id='SaveTurno29'>
<input type='hidden' name='user_id' value="<?=$user_id?>"/>
<input type='hidden' name='id_patient' value="<?=$id_historial?>"/>
<input type='hidden' name='centro_id' value="<?=$centro_id?>">
<input type='hidden' name='id_turno29' value=""/>
<div class="col-xs-8 "  >
<table class='table b-h '>
<tr>
<td>
<table class='table' id='table-turno-2-9-liq'>
<tr>
<th colspan='3'>LIQUIDOS INGERIDOS</th>
</tr>
<tr>
<th>Hora</th><th>Solución</th><th>Meds</th><th>Vo</th>
</tr>

<tr>
<td>3:00 pm</td><td><input type='text' class="form-control turno29_sol" name="turno29_1"  /></td>
<td><input type='text' class="form-control turno29_med" name="turno29_2"  /></td>
<td><input type='text' class="form-control turno29_vo" name="turno29_3" /></td>
</tr>
<tr>
<td>4:00 pm</td><td><input type='text' class="form-control turno29_sol" name="turno29_4" /></td>
<td><input type='text' class="form-control turno29_med" name="turno29_5" /></td>
<td><input type='text' class="form-control turno29_vo" name="turno29_6" /></td>
</tr>
<tr>
<td>5:00 pm</td><td><input type='text' class="form-control turno29_sol" name="turno29_4_" /></td>
<td><input type='text' class="form-control turno29_med" name="turno29_7" /></td>
<td><input type='text' class="form-control turno29_vo" name="turno29_8" /></td>
</tr>
<tr>
<td>6:00 pm</td><td><input type='text' class="form-control turno29_sol" name="turno29_9" /></td>
<td><input type='text' class="form-control turno29_med" name="turno29_10" /></td>
<td><input type='text' class="form-control turno29_vo" name="turno29_11" /></td>
</tr>
<tr>
<td>7:00 pm</td><td><input type='text' class="form-control turno29_sol" name="turno29_12" /></td>
<td><input type='text' class="form-control turno29_med" name="turno29_13" /></td>
<td><input type='text' class="form-control turno29_vo" name="turno29_14" /></td>
</tr>
<tr>
<td>8:00 pm</td><td><input type='text' class="form-control turno29_sol" name="turno29_15" /></td>
<td><input type='text' class="form-control turno29_med" name="turno29_16" /></td>
<td><input type='text' class="form-control turno29_vo" name="turno29_17" /></td>
</tr>
<tr>
<td>9:00 pm</td><td><input type='text' class="form-control turno29_sol" name="turno29_18" /></td>
<td><input type='text' class="form-control turno29_med" name="turno29_19" /></td>
<td><input type='text' class="form-control turno29_vo" name="turno29_19_" /></td>
</tr>

<tr>
<th>TOTAL<br/><br/>
<input name='turno29_23' id='turno29_23' type='hidden'/>
<input name='turno29_24' id='turno29_24' type='hidden'/>
<input name='turno29_25' id='turno29_25' type='hidden'/>
</th>
<th class='tot_turno29_sol clear-turno29' >0</th> 
<th  class='tot_turno29_med clear-turno29' >0 </th>
<th  class='tot_turno29_vo clear-turno29' >0</th>
</tr>
</table>
</td >
<td    style=' padding:5px;'>
<table class='table b-h ' id='table-turno-2-9-el'>
<tr>
<th colspan='3'>ELIMINADOS</th>
</tr>
<tr>
<th>Diuresis</th><th>Evacuación</th>
</tr>
<tr>
<td><input type='text' class="form-control turno29_di" name='turno29_26' /></td> 
<td><input type='text' class="form-control turno29_eva" name='turno29_27' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno29_di" name='turno29_28' /></td>
<td><input type='text' class="form-control turno29_eva" name='turno29_29' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno29_di" name='turno29_30' /></td>
<td><input type='text' class="form-control turno29_eva" name='turno29_31' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno29_di" name='turno29_32' /></td>
<td><input type='text' class="form-control turno29_eva" name='turno29_33' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno29_di" name='turno29_34' /></td>
<td><input type='text' class="form-control turno29_eva" name='turno29_35' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno29_di" name='turno29_36' /></td>
<td><input type='text' class="form-control turno29_eva" name='turno29_37' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno29_di" name='turno29_38' /></td>
<td><input type='text' class="form-control turno29_eva" name='turno29_39' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno29_di" name='turno29_40' /></td>
<td><input type='text' class="form-control turno29_eva" name='turno29_41' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno29_di" name='turno29_42' /></td>
<td><input type='text' class="form-control turno29_eva" name='turno29_43' /></td>
</tr>

<tr>

<input name='turno29_46' id='turno29_46' type='hidden'/>
<input name='turno29_47' id='turno29_47' type='hidden'/>
<th class='tot_turno29_di clear-turno29' >0</th> 
<th class='tot_turno29_eva clear-turno29' >0</th>  
</tr>
</table>
</td>
</tr>
</table>
</div>

<div class="col-xs-4"  >
  <div class="input-group">
       <span class="input-group-addon">Enfermera</span>
    <input type="text" class="form-control" id='turno29_enfermera' name='turno29_enfermera' value='<?=$enfermera?>' readonly />
    </div>
 <hr/>
   <div class="input-group">
       <span class="input-group-addon">Egreso T</span>
    <input type="text" class="form-control" id='turno_29_egreso_t' name='turno_29_egreso_t'  readonly  />
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Ingreso T</span>
    <input type="text" class="form-control turno_29_ingreso_t" id='turno_29_ingreso_t'  name='turno_29_ingreso_t' readonly  />
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Balance</span>
    <input type="text" class="form-control" id='turno_29_balance' name='turno_29_balance'  readonly />
    </div>
	<br/>
<button type='submit' class="btn btn-sm btn-success" id='submitTurno29' >Guardar Turno 2-9</button>
<span id='successTurno29'></span>
</div>
</form>
</div>
<!---------turno 9-7---------------------->
<div  id="Turno-9-7" class="tab-pane fade in" >
<div id="paginateTurno97"></div>
<div id="content-turno-paginate-97"></div>
<form method="post" id='SaveTurno97'>
<input type='hidden' name='user_id' value="<?=$user_id?>"/>
<input type='hidden' name='id_patient' value="<?=$id_historial?>"/>
<input type='hidden' name='centro_id' value="<?=$centro_id?>">
<input type='hidden' name='id_turno97' value=""/>
<div class="col-xs-8 "  >
<table class='table b-h '>
<tr>
<td>
<table class='table' id='table-turno-9-7-liq'>
<tr>
<th colspan='3'>LIQUIDOS INGERIDOS</th>
</tr>
<tr>
<th>Hora</th><th>Solución</th><th>Meds</th><th>Vo</th>
</tr>

<tr>
<td>10:00 pm</td><td><input type='text' class="form-control turno97_sol" name="turno97_1"  /></td>
<td><input type='text' class="form-control turno97_med" name="turno97_2"  /></td>
<td><input type='text' class="form-control turno97_vo" name="turno97_3" /></td>
</tr>
<tr>
<td>11:00 pm</td><td><input type='text' class="form-control turno97_sol" name="turno97_4" /></td>
<td><input type='text' class="form-control turno97_med" name="turno97_5" /></td>
<td><input type='text' class="form-control turno97_vo" name="turno97_6" /></td>
</tr>
<tr>
<td>12:00 pm</td><td><input type='text' class="form-control turno97_sol" name="turno97_4_" /></td>
<td><input type='text' class="form-control turno97_med" name="turno97_7" /></td>
<td><input type='text' class="form-control turno97_vo" name="turno97_8" /></td>
</tr>
<tr>
<td>1:00 am</td><td><input type='text' class="form-control turno97_sol" name="turno97_9" /></td>
<td><input type='text' class="form-control turno97_med" name="turno97_10" /></td>
<td><input type='text' class="form-control turno97_vo" name="turno97_11" /></td>
</tr>
<tr>
<td>2:00 am</td><td><input type='text' class="form-control turno97_sol" name="turno97_12" /></td>
<td><input type='text' class="form-control turno97_med" name="turno97_13" /></td>
<td><input type='text' class="form-control turno97_vo" name="turno97_14" /></td>
</tr>
<tr>
<td>3:00 am</td><td><input type='text' class="form-control turno97_sol" name="turno97_15" /></td>
<td><input type='text' class="form-control turno97_med" name="turno97_16" /></td>
<td><input type='text' class="form-control turno97_vo" name="turno97_17" /></td>
</tr>
<tr>
<td>4:00 am</td><td><input type='text' class="form-control turno97_sol" name="turno97_18" /></td>
<td><input type='text' class="form-control turno97_med" name="turno97_19" /></td>
<td><input type='text' class="form-control turno97_vo" name="turno97_19_" /></td>
</tr>
<tr>
<td>5:00 am</td><td><input type='text' class="form-control turno97_sol" name="turno97_20" /></td>
<td><input type='text' class="form-control turno97_med" name="turno97_21" /></td>
<td><input type='text' class="form-control turno97_vo" name="turno97_22" /></td>
</tr>

<tr>
<td>6:00 am</td><td><input type='text' class="form-control turno97_sol" name="turno97_23_" /></td>
<td><input type='text' class="form-control turno97_med" name="turno97_24_" /></td>
<td><input type='text' class="form-control turno97_vo" name="turno97_25_" /></td>
</tr>


<tr>
<th>TOTAL
<input name='turno97_23' id='turno97_23' type='hidden'/>
<input name='turno97_24' id='turno97_24' type='hidden'/>
<input name='turno97_25' id='turno97_25' type='hidden'/>
</th>
<th class='tot_turno97_sol clear-turno97' >0</th> 
<th  class='tot_turno97_med clear-turno97' >0 </th>
<th  class='tot_turno97_vo clear-turno97' >0</th>
</tr>
</table>
</td >
<td    style=' padding:5px;'>
<table class='table b-h ' id='table-turno-9-7-el'>
<tr>
<th colspan='3'>ELIMINADOS</th>
</tr>
<tr>
<th>Diuresis</th><th>Evacuación</th>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di" name='turno97_26' /></td> 
<td><input type='text' class="form-control turno97_eva" name='turno97_27' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di" name='turno97_28' /></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_97' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di" name='turno97_30' /></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_31' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di" name='turno97_32' /></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_33' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di" name='turno97_34' /></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_35' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di" name='turno97_36' /></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_37' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di" name='turno97_38' /></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_39' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di" name='turno97_40' /></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_41' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di" name='turno97_42' /></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_43' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di"  name='turno97_44'/></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_45' /></td>
</tr>
<tr>
<td><input type='text' class="form-control turno97_di"  name='turno97_46_' id='turno97_46_' /></td>
<td><input type='text' class="form-control turno97_eva" name='turno97_47_' /></td>
</tr>
<tr>

<input name='turno97_46' id='turno97_46' type='hidden'/>
<input name='turno97_47' id='turno97_47' type='hidden'/>
<th class='tot_turno97_di clear-turno97' ><br/>0</th> 
<th class='tot_turno97_eva clear-turno97' ><br/>0</th>  
</tr>
</table>
</td>
</tr>
</table>
</div>

<div class="col-xs-4"  >
  <div class="input-group">
       <span class="input-group-addon">Enfermera</span>
    <input type="text" class="form-control" id='turno97_enfermera' name='turno97_enfermera' value='<?=$enfermera?>' readonly />
    </div>
 <hr/>
   <div class="input-group">
       <span class="input-group-addon">Egreso T</span>
    <input type="text" class="form-control" id='turno_97_egreso_t' name='turno_97_egreso_t'  readonly />
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Ingreso T</span>
    <input type="text" class="form-control turno_97_ingreso_t" id='turno_97_ingreso_t'  name='turno_97_ingreso_t'  readonly />
    </div>
   <hr/>
   <div class="input-group">
       <span class="input-group-addon">Balance</span>
    <input type="text" class="form-control" id='turno_97_balance' name='turno_97_balance' readonly  />
    </div>
	<br/>
<button type='submit' class="btn btn-sm btn-success" id='submitTurno97' >Guardar Turno 9-7</button>
<span id='successTurno97'></span>
</div>
</form>
</div>
</div>
</div>
<div class="col-md-12"  >
  <div id='turno-grand-total'>
   <div class="form-group row">
    <div class="col-sm-3">
   <div class="input-group">
       <span class="input-group-addon">Ingreso General</span>
    <input type="text" class="form-control "  />
    </div>
    </div>
	
	<div class="col-sm-3">
   <div class="input-group">
       <span class="input-group-addon">Egreso General</span>
    <input type="text" class="form-control"  />
    </div>
    </div>
	
		<div class="col-sm-3">
   <div class="input-group">
       <span class="input-group-addon">Balance Hidrico</span>
    <input type="text" class="form-control"  />
    </div>
    </div>
	</div>
  </div>

</div>
<?php $this->load->view('hospitalizacion/historial/balance-hidrico/footer');?>