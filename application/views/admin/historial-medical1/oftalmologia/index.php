<style>
.control-label{font-size:16px}
.reduce-height{border:none;background:none}
</style>

<br/>
<h4 class="h4 his_med_title">
Examen Fisico Oftalmologia (<b><?=$count_oft?> regitros (s)</b>)
</h4>
<?php if ($count_oft > 0)
{

$i = 1;
 foreach($oftal as $row)
{
$user_c24=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c25=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));	
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
?>
<div class="pagination">
<a title="Creado por :<?=$user_c24?> , fecha : <?=$inserted_time?> &#013 Cambiado por :<?=$user_c25?>, fecha :<?=$updated_time?>" data-toggle="modal" data-target="#ver_oft" href="<?php echo base_url("admin_medico/show_oftalmologia/$row->id_oftal/$user_id")?>">
<?php echo $i; $i++;  ?>
</a></div>
<?php
}
?>

<br/>

<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>

<div class="col-md-12" style="background:" >
<hr class="title-highline-top"/>
<h4>AGUDESA VISUAL</h4>

<table class="table" style="width:70%">
<tr>
<th></th><th>Sin Correccion</th><th>Con Correccion</th><th>Correccion Actual</th>
</tr>
<tr>
<th title='Este campo debe ser lleno para guardar sus datos'>OD <span style='color:red'>*</span></th>
<td title='Este campo debe ser lleno para guardar sus datos'>
<select style="width:20%" class="select2 form-control" id="od_sin_con" title='Este campo debe ser lleno para guardar todos'>
<option value=''>No me dejes vacía</option>
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
<option>N/M</option>
</select>
</td>
<td>
<select  class="select2 form-control" id="od_con_cor">
<option></option>
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
<option>N/M</option>
</select>
</td>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height">
<input type="radio" value='mas' name="od_mas_o_meno" >&nbsp;<span style="font-weight:bold" class="mas">+</span> <br/><input  type="radio" value='menos' name="od_mas_o_meno">&nbsp;<span style="font-weight:bold" class="menos">-</span>
  </span>
<select class="select2 form-control" id="od_cor_act">
<option></option>
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
<select  class="select2 form-control" id="os_sin_con">
<option></option>
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
<option>N/M</option>
</select>
</td>
<td>
<select  class="select2 form-control" id="os_con_cor">
<option></option>
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
<option>N/M</option>
</select>
</td>
</td>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" value='mas' name="os_mas_o_meno"  >&nbsp;<span style="font-weight:bold" class="mas">+</span> <br/><input value='menos' type="radio" name="os_mas_o_meno">&nbsp;<span style="font-weight:bold" class="menos">-</span>
  </span>
<select  class="select2 form-control" id="os_cor_act">
<option></option>
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
<div class="col-md-12" style="background:">
<hr class="title-highline-top"/>

<div class="col-md-4 ">
<h4 class="col-md-offset-10">RETINOSCOPIA </h4>
<table class="table" style="width:90%;">
<tr >
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" value="1" name="masomenos1" >&nbsp;+<br/><input  type="radio" value="0" name="masomenos1">&nbsp;-
  </span>
<select  class="select2 form-control" id="retine1">
<option></option>
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
 <input type="radio" name="masomenos2" value="1">&nbsp;+<br/><input value="0" type="radio" name="masomenos2">&nbsp;-
  </span>
<select  class="select2 form-control" id="retine2">
<option></option>
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
 <input type="radio" name="masomenos3" value="1" >&nbsp;+<br/><input  type="radio" value="0" name="masomenos3">&nbsp;-
  </span>
<select  class="select2 form-control"  id="retine3">
<option></option>
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
 <input type="radio" name="masomenos4" value="1">&nbsp;+<br/><input type="radio" value="0" name="masomenos4">&nbsp;-
  </span>
<select class="select2 form-control" id="retine4">
<option></option>
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
<div class="col-md-4 ">
<br/><br/>
<table class="table" style="width:90%;">
<tr >
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="masomenos5" value="1" >&nbsp;+<br/><input value="0" type="radio" name="masomenos5">&nbsp;-
  </span>
<select  class="select2 form-control" id="retine5">
<option></option>
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
 <input type="radio" name="masomenos6" value="1" >&nbsp;+<br/><input value="0" type="radio" name="masomenos6">&nbsp;-
  </span>
<select  class="select2 form-control" id="retine6">
<option></option>
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
 <input type="radio" name="masomenos7" value="1" >&nbsp;+<br/><input value="0" type="radio" name="masomenos7">&nbsp;-
  </span>
<select  class="select2 form-control"  id="retine7">
<option></option>
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
 <input type="radio" name="masomenos8" value="1" >&nbsp;+<br/><input type="radio" value="0" name="masomenos8">&nbsp;-
  </span>
<select  class="select2 form-control" id="retine8">
<option></option>
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
<div class="col-md-4 table-responsive" style="border-left:1px solid rgb(205,205,205);">
<h4>BALANCE MUSCULAR</h4>
<table class="table" style="width:100%;background:">
<tr>
<td><label>PPM</label></td><td><input type="text" id="ppm" class="form-control"></td>
</tr>
<tr>
<td><label>Converg</label></td><td><input type="text" id="converg" class="form-control"></td>
</tr>
<tr>
<td><label>Duc. y Vers.</label></td><td><input type="text" id="ducvers" class="form-control"></td>
</tr>
<tr>
<td><label>Cover test.</label></td><td><input type="text" id="convertest" class="form-control"></td>
</tr>

</table>
</div>
</div>
<!--
<div class="col-md-12">
<hr class="title-highline-top"/>
<h4>REFRACCION</h4>
<table class="table" style="width:90%" id='hide-refraccion'>
<tr>
<th></th><th>Espera</th><th>Cilindro</th><th>Eje</th><th>Add</th><th>Vision</th>
</tr>
<tr>
<th>OD</th>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="od_espera_r" value="1" >&nbsp;+<br/><input value="0" type="radio" name="od_espera_r">&nbsp;-
  </span>
<select  class="select2 form-control" id="od_espera" >
<option></option>
<option>0.00</option>
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
 <input type="radio" name="od_cilindro_r" value='1'>&nbsp;+<br/><input value='0' type="radio" name="od_cilindro_r">&nbsp;-
  </span>
<select  class="select2 form-control" id="od_cilindro" >
<option></option>
<option>0.00</option>
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
<select class="select2 form-control" id="eje_od" >
<option></option>
<?php 

for($i=0; $i<=180; $i++)
{

    echo "<option value=".$i.">".$i."</option>";
}
?> 
   
</select> 
</td>
<td>
<select class="select2 form-control"  id="add_od" >
<option></option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
   
</select>

</td>
<td>
<select  class="select2 form-control" id="vision_od" >
<option></option>
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
 <input type="radio" name="os_espera_r" value='1'>&nbsp;+<br/><input value='0' type="radio" name="os_espera_r">&nbsp;-
  </span>
<select  class="select2 form-control" id="os_espera" >
<option></option>
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
 <input type="radio" name="os_cilindro_r" value='1'>&nbsp;+<br/><input value='0' type="radio" name="os_cilindro_r">&nbsp;-
  </span>
<select class="select2 form-control" id="os_cilindro" >
<option></option>
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
<select class="select2 form-control" id="eje_os" >
<option></option>
<?php 

for($i=0; $i<=180; $i++)
{

    echo "<option value=".$i.">".$i."</option>";
}
?> 
   
</select> 

</td>

<td>
<select class="select2 form-control" id="add_os" >
<option></option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
   
</select>
</td>
<td>
<select  class="select2 form-control" id="vision_os" >
<option></option>
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

</div>-->
<div class="col-md-12" style="background:">
<hr class="title-highline-top"/>
<div class="col-md-6" style="border-right:1px solid rgb(205,205,205);border-bottom:1px solid rgb(205,205,205);">
<h4 class="h4">LAMPARA DE HENDIDURA</h4>
<table class="table" style="width:100%;">
<tr>
<td><label>Conjuntiva</label></td>
<td><input type="text" id="conj1" class="form-control"></td>
<td><input type="text" id="conj2" class="form-control"></td>
</tr>
<tr>
<td><label>Cornea</label></td>
<td><input type="text" id="cornea1" class="form-control"></td>
<td><input type="text" id="cornea2" class="form-control"></td>
</tr>
<tr>
<td><label>Pupila</label></td>
<td><input type="text" id="pup1" class="form-control"></td>
<td><input type="text" id="pup2" class="form-control"></td>
</tr>
<tr>
<td><label>Cristalino</label></td>
<td><input type="text" id="crist1" class="form-control"></td>
<td><input type="text" id="crist2" class="form-control"></td>
</tr>
<tr>
<td><label>Vitreo</label></td>
<td><input type="text" id="vitreo1" class="form-control"></td>
<td><input type="text" id="vitreo2" class="form-control"></td>
</tr>
<tr>
<td><label>Nota</label></td>
<td colspan='2'><textarea rows="6"  id="not-oftm" class="form-control"></textarea></td>

</tr>
</table>

</div>
<div class="col-md-6" id="div-ojo">
<canvas id="canvas2" width="690" height="200" title='Haz un clic para crear punto, Doble clic para quitar el punto' style="cursor:context-menu;">
</div>
</div>
<div class="col-md-12" style="background:">
<div class="col-md-6"  >

<h4 class="h4">FONDOSCOPIA</h4>
<table class="table" style="width:100%;">
<tr>
<td><input type="text" id="fondos1" class="form-control"></td>
<td><input type="text" id="fondos2" class="form-control"></td>
</tr>
</table>
</div>
<div class="col-md-6" id='frame-fondo1' style="border-top:1px solid rgb(205,205,205);" >

<canvas id="canvas" width="690" height="200" title='Haz un clic para crear punto, Doble clic para quitar el punto' style="cursor:context-menu;"></canvas>

</div>

</div>
<div class="modal fade" id="ver_oft"  role="dialog" tabindex="-1"  >
<div class="modal-dialog" style="width: 100%;" >
<div class="modal-content" >

</div>
</div>
</div>

<div class="modal fade" id="of-ref-mdl"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>

<script>
$('#of-ref-mdl').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});



let pointSizeOjo = 3;
var points2Ojo = [];
var timeout2Ojo = 300;
var clicks2Ojo = 0;

const canvas2Ojo = document.getElementById("canvas2");
const ctx2Ojo = canvas2Ojo.getContext("2d");
let cw2Ojo = (canvas2Ojo.width = 400);
let ch2Ojo = (canvas2Ojo.height = 200);

function getPosition2Ojo(event) {
  var rect2 = canvas2Ojo.getBoundingClientRect();
  return {
    x: event.clientX - rect2.left,
    y: event.clientY - rect2.top
  };
}

function drawCoordinates2Ojo(point, r) {
  ctx2Ojo.fillStyle = "#ff2626"; // Red color
  ctx2Ojo.beginPath();
  ctx2Ojo.arc(point.x, point.y, r, 0, Math.PI * 2, true);
  ctx2Ojo.fill();
}



canvas2Ojo.addEventListener("click", function(e) {
  clicks2Ojo++;
  var m2 = getPosition2Ojo(e);
  // this point won't be added to the points array
  // it's here only to mark the point on click since otherwise it will appear with a delay equal to the timeout
  drawCoordinates2Ojo(m2, pointSizeOjo);
  
  if (clicks2Ojo == 1) {
    setTimeout(function() {
      if (clicks2Ojo == 1) {
        // on click add a new point to the points array
        points2Ojo.push(m2);
      } else { // on double click 
        // 1. check if point in path
        for (let i = 0; i < points2Ojo.length; i++) {
          ctx2Ojo.beginPath();
          ctx2Ojo.arc(points2Ojo[i].x, points2Ojo[i].y, pointSizeOjo, 0, Math.PI * 2, true);

          if (ctx2Ojo.isPointInPath(m2.x, m2.y)) {
            points2Ojo.splice(i, 1); // remove the point from the array
            break;// if a point is found and removed, break the loop. No need to check any further.
          }
        }

        //clear the canvas
        ctx2Ojo.clearRect(0, 0, cw2Ojo, ch2Ojo);
      }
    ctx2Ojo.drawImage(base_imageOjo, 0, 0)
      points2Ojo.map(p => {
        drawCoordinates2Ojo(p, pointSizeOjo);
      });
      clicks2Ojo = 0;
    }, timeout2Ojo);
  }
});


	var canvasLojo = document.getElementById('canvas2'),
	contextL = canvasLojo.getContext('2d');

	ojo1();

	function ojo1()
	{
 
	base_imageOjo = new Image();
	base_imageOjo.src = '<?= base_url();?>assets/img/historial_medical/output-onlinepngtools.png';
	base_imageOjo.onload = function(){
	contextL.drawImage(base_imageOjo, 0, 0);
	}
	}

//-------------------FONDO------------------------------------


var canvas21 = document.getElementById("canvas");

let pointSize = 3;
var points = [];
var timeout = 300;
var clicks = 0;

const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
let cw = (canvas.width = 400);
let ch = (canvas.height = 160);

function getPosition(event) {
  var rect = canvas.getBoundingClientRect();
  return {
    x: event.clientX - rect.left,
    y: event.clientY - rect.top
  };
}

function drawCoordinates(point, r) {
  ctx.fillStyle = "#ff2626"; // Red color
  ctx.beginPath();
  ctx.arc(point.x, point.y, r, 0, Math.PI * 2, true);
  ctx.fill();
}

canvas.addEventListener("click", function(e) {
  clicks++;
  var m = getPosition(e);
  // this point won't be added to the points array
  // it's here only to mark the point on click since otherwise it will appear with a delay equal to the timeout
  drawCoordinates(m, pointSize);
  
  if (clicks == 1) {
    setTimeout(function() {
      if (clicks == 1) {
        // on click add a new point to the points array
        points.push(m);
      } else { // on double click 
        // 1. check if point in path
        for (let i = 0; i < points.length; i++) {
          ctx.beginPath();
          ctx.arc(points[i].x, points[i].y, pointSize, 0, Math.PI * 2, true);

          if (ctx.isPointInPath(m.x, m.y)) {
            points.splice(i, 1); // remove the point from the array
            break;// if a point is found and removed, break the loop. No need to check any further.
          }
        }

        //clear the canvas
        ctx.clearRect(0, 0, cw, ch);
      }

ctx.drawImage(base_image1, 0, 0);

      points.map(p => {
        drawCoordinates(p, pointSize);
      });
      clicks = 0;
    }, timeout);
  }
});
	//************************************************************************************************


	var canvasOjo1 = document.getElementById('canvas'),
	context1 = canvasOjo1.getContext('2d');
	fondo1();

	function fondo1()
	{
 
	base_image1 = new Image();
	base_image1.src = '<?= base_url();?>assets/img/historial_medical/fodoscopia111.png';
	base_image1.onload = function(){
	context1.drawImage(base_image1, 0, 0);
	}
	}
	

</script>
