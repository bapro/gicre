<div class="col-sm-12 searchb" style="font-size:13px" id="dont-display-me-when-pop" >
<br/>
 <form class="form-inline">
   <div class="form-group">
      <label>Fecha:</label>
      <input  class="form-control" id='fecha-fac' value="<?=date("d-m-Y")?>" >
    </div>
    <div class="form-group">
      <label>No autorización:</label> 
     <input  type="text" id="numauto" class="form-control change-red"/> 
    </div>
    <div class="form-group">
      <label>Autorizado por:</label>
     <input  type="text" id="autopor"  class="form-control change-red"/>
	 <button id="consultar_nap" type="button" class="btn btn-primary btn-xs" style="display:<?=$ws?>" <?=$disabledNap?>><i class="fa fa-rocket" aria-hidden="true"></i> Consultar Nap</button>
	<button id="cancel_nap" type="button" class="btn btn-default btn-xs" style="display:none"> Cancelar Nap</button>
	<input id="nap_state" value="0" type="hidden"/>
    </div>
	<!-- <em id="nssNbTimes">3 veces</em>-->
  </form>
  <br/>
  <textarea class="form-control" rows="6" id="MotivoAnulacion" style="display:none" placeholder="escribir motivo de anulacion del nap"></textarea>
  <br/>
 </div>

 