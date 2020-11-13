
<style>
.control-label{font-size:16px}

</style>

<div id="show_oftalmologia"></div>
<div id="hide_oftalmologia" style="margin-left:210px">

<div  style="background:#E6E6FA">
<p class=" h4 his_med_title"  >Examen Fisico Oftalmologia</p>
 <p><i><b><span  class="success-send-oftal" style="font-size:25px"><?=$count_oftal?></span></b> registros.</i></p>
 </div>
 <div class="col-md-2" >
<?php if ($count_oftal > 0)
{
?>

<select class="form-control" id="id_oftal" >
<option value="" hidden>Mostrar</option>
<?php 

 foreach($oftal as $row)
{ 
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y  - %I:%M%p", strtotime($row->inserted_time)));	
  
?>
<option  title="Medico : <?=$row->inserted_by; ?> - Fecha : <?=$inserted_time; ?>" value='<?=$row->id_oftal;?>'>Registro # <?=$row->id_oftal;?></option>


<?php
}
?>

</select> 

<?php
}

?>
</div>
<span  style="display:none" id="resetoftal">
<button class="btn btn-primary btn-xs" type="button"><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i> Nuevo</button>
</span>
<br/></br>
<p id="flash-oftal"></p>
 <div id="show_oftal_after_select"></div>
<div  id="hide_oftal_after_select" >
<div class="col-md-12" style="background:#E6E6FA" >
<hr class="title-highline-top"/>
<h4>AGUDESA VISUAL</h4>

<table class="table" style="background:#E6E6FA">
<tr>
<th></th><th>Sin Correccion</th><th>Con Correccion</th><th>Correccion Actual</th>
<tr>
<tr>
<th>OD</th>
<td>
<select style="width:80px" class="form-control" id="sin_con_od">
<option>20</option>
<option>25</option>
<option>30</option>
<option>40</option>
<option>80</option>
<option>100</option>
<option>150</option>
<option>200</option>
<option>300</option>
<option>400</option>
<option>600</option>
<option>C/D</option>
<option>P/L</option>
<option>N/PL</option>
</select>
</td>
<td>
<select style="width:80px" class="form-control" id="con_cor_od">
<option>20</option>
<option>25</option>
<option>30</option>
<option>40</option>
<option>80</option>
<option>100</option>
<option>150</option>
<option>200</option>
<option>300</option>
<option>400</option>
<option>600</option>
<option>C/D</option>
<option>P/L</option>
<option>N/PL</option>
</select>
</td>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
   <input type="radio" name="masomenos"  checked>&nbsp;<span style="font-weight:bold" class="mas">+</span> <br/><input  type="radio" name="masomenos">&nbsp;<span style="font-weight:bold" class="menos">-</span>
  </span>
<select style="width:76px;height:44px;" class="form-control" id="cor_act_od">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
</tr>
<tr>
<th>OS</th>
<td>
<select style="width:80px" class="form-control" id="sin_con_os">
<option>20</option>
<option>25</option>
<option>30</option>
<option>40</option>
<option>80</option>
<option>100</option>
<option>150</option>
<option>200</option>
<option>300</option>
<option>400</option>
<option>600</option>
<option>C/D</option>
<option>P/L</option>
<option>N/PL</option>
</select>
</td>
<td>
<select style="width:80px" class="form-control" id="con_cor_os">
<option>20</option>
<option>25</option>
<option>30</option>
<option>40</option>
<option>80</option>
<option>100</option>
<option>150</option>
<option>200</option>
<option>300</option>
<option>400</option>
<option>600</option>
<option>C/D</option>
<option>P/L</option>
<option>N/PL</option>
</select>
</td>
</td>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos0"  checked>&nbsp;<span style="font-weight:bold" class="mas">+</span> <br/><input  type="radio" name="masomenos0">&nbsp;<span style="font-weight:bold" class="menos">-</span>
  </span>
<select style="width:76px;height:44px;" class="form-control" id="cor_act_os">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
</tr>
</table>
</div>
<div class="col-md-12" style="background:#E6E6FA">
<hr class="title-highline-top"/>

<div class="col-md-4">
<h4 class="col-md-offset-10">RETINOSCOPIA </h4>
<table class="table" style="width:40%;background:#E6E6FA">
<tr >
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos1"  checked>&nbsp;+<br/><input  type="radio" name="masomenos1">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="retine1">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td style="border-left:2px solid #38a7bb">
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos2" checked>&nbsp;+<br/><input  type="radio" name="masomenos2">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="retine2">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
</tr>
<tr>
<td style="border-top:2px solid #38a7bb;border-right:2px solid #38a7bb">
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos3" checked>&nbsp;+<br/><input  type="radio" name="masomenos3">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control"  id="retine3">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td style="border-top:2px solid #38a7bb;border-left:2px solid #38a7bb;">
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos4" checked>&nbsp;+<br/><input type="radio" name="masomenos4">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="retine4">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
</tr>
</table>
</div>
<div class="col-md-4">
<br/><br/>
<table class="table" style="width:40%;background:#E6E6FA">
<tr >
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos5"  checked>&nbsp;+<br/><input  type="radio" name="masomenos5">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="retine5">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td style="border-left:2px solid #38a7bb">
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos6" checked>&nbsp;+<br/><input  type="radio" name="masomenos6">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="retine6">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
</tr>
<tr>
<td style="border-top:2px solid #38a7bb;border-right:2px solid #38a7bb">
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos7" checked>&nbsp;+<br/><input  type="radio" name="masomenos7">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control"  id="retine7">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td style="border-top:2px solid #38a7bb;border-left:2px solid #38a7bb;">
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos8" checked>&nbsp;+<br/><input type="radio" name="masomenos8">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="retine8">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
</tr>
</table>
</div>
<div class="col-md-4" style="border-left:1px solid rgb(205,205,205);">
<h4>BALANCE MUSCULAR</h4>
<table class="table" style="width:100%;background:#E6E6FA">
<tr>
<td><label>PPM</label></td><td><input type="checkbox"  name="muscular" value="PPM" ></td><td><input type="text" name="" class="form-control"></td>
</tr>
<tr>
<td><label>Converg</label></td><td><input type="checkbox"  name="muscular" value="Converg"></td><td><input type="text" name="" class="form-control"></td>
</tr>
<tr>
<td><label>Duc. y Vers.</label></td><td><input type="checkbox"  name="muscular" value="Duc. y Vers."></td><td><input type="text" name="" class="form-control"></td>
</tr>
<tr>
<td><label>Cover test.</label></td><td><input type="checkbox"  name="muscular" value="Cover test." ></td><td><input type="text" name="" class="form-control"></td>
</tr>
<tr style="display:none">
<td></td><td><input type="checkbox"  name="muscular" checked ></td>
</tr>
</table>
</div>
</div>

<div class="col-md-12" style="background:#E6E6FA">
<hr class="title-highline-top"/>

<table class="table" style="width:90%;background:#E6E6FA">
<h4>REFRACCION</h4>

<tr>
<th></th><th>Espera</th><th>Cilindro</th><th>Eje</th><th>Add</th><th>Vision</th>
</tr>
<tr>
<th>OD</th>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="esperaod" checked>&nbsp;+<br/><input type="radio" name="esperaod">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="espera_od">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="cilindrood" checked>&nbsp;+<br/><input type="radio" name="cilindrood">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="cilindro_od">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td>
<select class="form-control" style="width:70px" id="eje_od">

<?php 

for($i=0; $i<=180; $i++)
{

    echo "<option value=".$i.">".$i."</option>";
}
?> 
   
</select> 
</td>
<td>
<select class="form-control" style="width:80px" id="add_od">
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
   
</select>

</td>
<td>
<select style="width:80px" class="form-control" id="vision_od">
<option>20</option>
<option>25</option>
<option>30</option>
<option>40</option>
<option>80</option>
<option>100</option>
<option>150</option>
<option>200</option>
<option>300</option>
<option>400</option>
<option>600</option>
<option>C/D</option>
<option>P/L</option>
<option>N/PL</option>
</select>

</td>
</tr>
<tr>
<th>OS</th>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="esperaos" checked>&nbsp;+<br/><input type="radio" name="esperaos">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="espera_os">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="cilindroos" checked>&nbsp;+<br/><input type="radio" name="cilindroos">&nbsp;-
  </span>
<select style="width:76px;height:44px;" class="form-control" id="cilindro_os">
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td>
<select class="form-control" style="width:70px" id="eje_os">

<?php 

for($i=0; $i<=180; $i++)
{

    echo "<option value=".$i.">".$i."</option>";
}
?> 
   
</select> 

</td>

<td>
<select class="form-control" style="width:80px" id="add_os">
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
   
</select>
</td>
<td>
<select style="width:80px" class="form-control" id="vision_os">
<option>20</option>
<option>25</option>
<option>30</option>
<option>40</option>
<option>80</option>
<option>100</option>
<option>150</option>
<option>200</option>
<option>300</option>
<option>400</option>
<option>600</option>
<option>C/D</option>
<option>P/L</option>
<option>N/PL</option>
</select>
</td>
</tr>
</table>

</div>
<div class="col-md-12" style="background:#E6E6FA">
<hr class="title-highline-top"/>
<div class="col-md-6" style="border-right:1px solid rgb(205,205,205);">
<h4>COMPARA HENDIDURA</h4>
<table class="table" style="width:100%;background:#E6E6FA">
<tr>
<td><label>Conjuntiva</label></td><td><input type="text" name="" class="form-control"></td><td><input type="text" name="" class="form-control"></td>
</tr>
<tr>
<td><label>Cornea</label></td><td><input type="text" name="" class="form-control"></td><td><input type="text" name="" class="form-control"></td>
</tr>
<tr>
<td><label>Pupila</label></td><td><input type="text" name="" class="form-control"></td><td><input type="text" name="" class="form-control"></td>
</tr>
<tr>
<td><label>Cristalino</label></td><td><input type="text" name="" class="form-control"></td><td><input type="text" name="" class="form-control"></td>
</tr>
<tr>
<td><label>Vitreo</label></td><td><input type="text" name="" class="form-control"></td><td><input type="text" name="" class="form-control"></td>
</tr>
<tr style="display:none">
<td></td><td><input type="checkbox"  name="muscular" checked ></td>
</tr>
</table>
</div>
<div class="col-md-6" style="background:#E6E6FA" >
<img src="<?= base_url();?>assets/img/historial_medical/oyoss.png"  alt=""/><br/>
<h4>FONDOSCOPIA</h4>
<img src="<?= base_url();?>assets/img/historial_medical/fodoscopia111.png"  alt=""/>
</div>
</div>

</div>
</div>
<script>
$(function() {
	$('#save_ftalmologia').on('click', function(event) {
$('html, body').animate({ scrollTop: 0 }, 0);
 $(".success-send-oftal").fadeIn(600).html('<span class="load"><img style="width:50px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
 var sin_con_od   = $("#sin_con_od").val();
 var  con_cor_od  = $("#con_cor_od").val();
var cor_act_od   = $("#cor_act_od").val();
 var sin_con_os   = $("#sin_con_os").val();
 var con_cor_os = $("#con_cor_os").val();
 var cor_act_os  = $("#cor_act_os").val();
 var  retine1  = $("#retine1").val();
 var retine2 = $("#retine2").val();
var retine3   = $("#retine3").val();
 var retine4  = $("#retine4").val();
 var retine5  = $("#retine5").val();
 var retine6 = $("#retine6").val();
 var retine7   = $("#retine7").val();
 var retine8  = $("#retine8").val();
 /*
 var ppm  = $("#ppm").val();
 var converg  = $("#converg").val();
 var duycers  = $("#duycers").val();
 var covertest  = $("#covertest").val();
  */
 
var muscularc = [];

// Initializing array with Checkbox checked values
$("input[name='muscular']:checked").each(function(){
muscularc.push(this.value);
});
		
 var espera_od  = $("#espera_od").val();
 var cilindro_od = $("#cilindro_od").val();
 var eje_od   = $("#eje_od").val();
 var add_od  = $("#add_od").val();
 var vision_od  = $("#vision_od").val();
 var espera_os = $("#espera_os").val();
  var cilindro_os = $("#cilindro_os").val();
  var eje_os = $("#eje_os").val();
  var add_os = $("#add_os").val();
  var vision_os = $("#vision_os").val();
  var pupilas_od1 = $("#pupilas_od1").val();  	
	var pupilas_od2 = $("#pupilas_od2").val();
 var pupilas_os1 = $("#pupilas_os1").val();
 var pupilas_os2 = $("#pupilas_os2").val();
var historial_id = <?=$id_historial?>;
 var inserted_by = $("#inserted_by").val();

$.ajax({
type: "POST",
url: "<?=base_url('admin/saveOftalmologia')?>",
data:{sin_con_od:sin_con_od,con_cor_od:con_cor_od,
cor_act_od:cor_act_od,sin_con_os:sin_con_os,con_cor_os:con_cor_os,
cor_act_os:cor_act_os,retine1:retine1,retine2:retine2,
retine3:retine3,retine4:retine4,retine5:retine5,retine6:retine6,retine7:retine7,
retine8:retine8,muscular:muscularc,
espera_od:espera_od,cilindro_od:cilindro_od,eje_od:eje_od,add_od:add_od,
vision_od:vision_od,espera_os:espera_os,cilindro_os:cilindro_os,
eje_os:eje_os,add_os:add_os,vision_os:vision_os,pupilas_od1:pupilas_od1,
pupilas_od2:pupilas_od2,pupilas_os1:pupilas_os1,pupilas_os2:pupilas_os2,historial_id:historial_id,inserted_by:inserted_by},

cache: true,
success:function(data){ 
$('.success-send-oftal').hide();
$("#hide_oftalmologia").hide(); 
$("#show_oftalmologia").html(data);
$("#show_oftalmologia").show();

}  
});

return false;
});
});


//---------------------------

$("#id_oftal").on('change', function (e) {
e.preventDefault();
$("#flash-oftal").fadeIn(400).html('<span class="load">Mostrando... <img src="<?= base_url();?>assets/img/loading.gif" /></span>');

$.ajax({
url: '<?php echo site_url('admin/showOftalById');?>',
type: 'post',
data:'on_select_show='+$("#id_oftal").val(),
success: function (data) {
	//$(".historial_save").prop("disabled", true);
	$("#flash-oftal").hide();
	$("#show_oftal_after_select").html(data);
	$("#show_oftal_after_select").show();
	$("#hide_oftal_after_select").hide();
	$("#resetoftal").show();
	 }
});
});


	 //refresh
$("#resetoftal").on('click', function (e) {
e.preventDefault();
var id_historial='<?=$id_historial?>';
$.ajax({
url: '<?php echo site_url('admin/createOftalmologia');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#oftalmologiashow").html(data);
	$("#oftalmologiashow").show();
	$("#rehabilitationshow").hide();
	$("#examensisshow").hide();
	$("#signoshow").hide();
	$("#examenshow").hide();
	$("#enfermedadshoww").hide();
	$("#home").hide();
	$("#estudiosshow").hide();
	$("#recetasshow").hide();
	$("#laboratoriosshow").hide();
	$("#conclucionshow").hide();
}

});
});
</script>
