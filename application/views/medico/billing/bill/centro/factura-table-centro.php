 <div class="col-md-12 searchb ">
<h4 class="h4" >FACTURA</h4>
<br/>
 <form class="form-inline">
 <?php 
 $createddate=date("d-m-Y");
   ?>
   <div class="form-group">
      <label>Fecha:</label>
      <input  class="form-control"  value="<?=$createddate?>" readonly>
    </div>
    <div class="form-group">
      <label>No Autorizacion:</label>
     <input  type="text" id="numauto" class="form-control change-red"/>
    </div>
    <div class="form-group">
      <label>Autorizado por:</label>
     <input  type="text" id="autopor" class="form-control change-red"/>
    </div>
  </form><br/>
 </div>
 
 <div class="col-sm-12 showdown3 searchb" >
<div style="overflow-x:auto">
<table class="table table-striped table-bordered table-condensed tab_logic turf" id="turf">
<thead>
<tr class="trback">
<td class="heading" title="Añadir fila" id="add_row" style="cursor:pointer;font-size:13px;color:blue;background:white"><span class="glyphicon glyphicon-plus-sign"></span></td>
<th class="heading">
<?php if(empty($serv_centro)) {
	echo "<span style='color:#B18904'>No hay servicios | <a target='_blank' href='".base_url()."/medico/import_rates_fac_centro/$id_centro'>Crear</a></span>";
	$disabled="disabled";$display="none";
} else {
?>
Servicio
<?php
$disabled="";
}
?>
</th>
<th class="heading">Cantidad</th>
<th class="heading">Precio Unitario</th>
<th class="heading">Sub-Total</th>
<th class="heading">Total Pagar Seguro</th>
<th class="heading">Descuento</th>
<th class="heading">Total Pagar Paciente</th>
</tr>
</thead>
<tfoot >
<tr class="grand-total persist" style="background:#d5d370;font-size:18px">
<th style="background:white"></th>
<th  colspan="3">TOTALES</th>
<!--<th id="cantidad-grand-total">0.00</th>
<th id="precio-grand-total">0.00</th>-->
<th>RD$ <span id="table-grand-total" >0.00</span></th>
<th>RD$ <span id="seguro-grand-total">0.00</span></th>
<th style='color:red'>RD$ <span id="descuento-grand-total">0.00</span></th>
<th>RD$ <span id="tot-paciente-grand-total">0.00</span></th>
</tr>

<tr>
<td title="Borrar fila con casilla marcada" style="color:red;font-size:13px;display:none;cursor:pointer;background:white" id='delete_row'><span class="glyphicon glyphicon-minus-sign"></span></td><td colspan="8"></td>
</tr>
</tfoot>
<tbody>
<tr id='addr1' class="calculation visible change-red">
<td></td>
<td style="width:180px;display:block">

<select class="service form-control select2"  onChange="getSegName(this);">
<option value="" hidden></option>
<?php foreach($serv_centro as $s){?>
<option  value="<?=$s->id_c_taf?>"><?=$s->sub_groupo?></option>
<?php
}
?>
</select>
</td>
<td class="cantidad">
<input type="text" class="cantidad form-control "  tabindex="1" onkeypress='return validateQty(event);' />
</td>
<td class="precio">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input class="precio form-control float" type="text"  tabindex="2" onkeypress='return onlyfloat(event);' />
</div>
</td>
<td class="row-total">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="row-total form-control" value="0.00" readonly />
</div>
</td>
<td class="total-pag-seg">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="total-pag-seg form-control"  tabindex="3" readonly />
</div>
</td>
<td class="descuento">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input style='color:red' type="text" class="descuento form-control float"  tabindex="4" onkeypress='return onlyfloat(event);'/>
</div>
</td>
<td class="total-pag-pa">
<div class="input-group">
<span class="input-group-addon">RD$</span>
<input type="text" class="total-pag-pa form-control" value="0.00" tabindex="5" readonly />
</div>
</td>
</tr>

<tr id='addr2' class="calculation visible">
</tbody>
</table>
<div id="required_fac" style="color:red"></div>
</div>
</div>

<div class="col-sm-12 showdown3 searchb" >
<br/>
<div style="overflow-x:auto">
<div class="col-sm-9" >
<input id="total-pagar-paciente" type="hidden"> <input type="hidden" id="descuento1">   <input type="hidden" id="total-pago-seguro">    <input id="sub-total" type="hidden">  
<textarea class="form-control" rows="10" placeholder="Comentario" id="comment" ></textarea>
<br/>
<a style="font-size:24px" href="#"><i class="fa fa-arrow-circle-up"></i></a>
</div>
<div class="col-sm-3">
<button id="save_factura" style="margin-left:14px" type="button" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>

</div>
</div>
</div>