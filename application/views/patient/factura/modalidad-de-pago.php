  <div class="card my-3">
                <div class="card-body">
			
                    <div class="row" id="saveToSessionFactura">
						<div class="col-md-6  border py-2">
						<div class="row">
							<h3 class="card-title py-2">Datos de la factura</h3>
						  <input type="hidden" class="form-control form-control-sm" id="modalidadDePagoId" name="modalidadDePagoId"  value="<?=$modalidadDePagoId?>"  >
				<?php if($values_container_decrpyted['seguroId'] !=11){
					$row="";
				}else{
					$row='-3';
				}?>
				 <div class="col-sm<?=$row?>">
					<label class="form-label">Fecha <span class="text-danger">*</span></label>
                            <input type="date" id="fecha-fac" value="<?=date("Y-m-d",strtotime($fecha_factura))?>" class="form-control form-control-sm">
					</div>
					<?php if($values_container_decrpyted['seguroId'] !=11){?>
					<div class="col-sm">
					<label class="form-label">No autorización <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="numauto" value="<?=$numauto?>">
					</div>
					<div class="col-sm">
					<label class="form-label">Autorizado por <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="autopor" value="<?=$autopor?>" >
			</div>
					
				
					<?php } else {?>
					  <input type="hidden" class="form-control form-control-sm" id="numauto" value="0">
					  <input type="hidden" class="form-control form-control-sm" id="autopor"  value="0">
					<?php } ?>
					
					
					 
					<div class="col-sm-12">
					<br/>
					
					<div class="form-floating" id="MotivoAnulacion" style="display:none" >
				<textarea class="form-control" rows="6"  placeholder="Escribir motivo de anulación del nap"></textarea>
				<label for="MotivoAnulacion">Escribir motivo de anulación del nap</label>
				 <br/>
				</div>
						  
							<button id="consultar_nap" type="button" class="btn btn-primary btn-xs" style="display:<?=$ws?>" <?=$disabledNap?>><i class="fa fa-rocket" aria-hidden="true"></i> Consultar Nap</button>
<button id="cancel_nap" type="button" class="btn btn-danger btn-xs" style="display:none"> Cancelar Nap</button>
<input id="nap_state" value="0" type="hidden"/>
					</div>
					<div class="col-sm-12">
					<hr/>
					<label class="form-label">Comentrio</label>
                            <textarea  class="form-control form-control-sm"  id="comment"><?=$comment?> </textarea>
							<br/>
							<button type="button" id="update_factura_fecha_com" <?=$btn_fecha_com?> class="btn btn-primary btn-sm" >Guardar</button>
						
					</div>
					
					</div>
					</div>
                        <div class="col-md-6 clear-all-mod-pag-values border py-2">
			 <div class="row g-3">
              	<h3 class="card-title py-2">Modalidad de pago</h3>
				<?php if($tipo_monena) {
					$tipo_monena=$tipo_monena;
				}else{
				$tipo_monena='RD$';	
				}?>
                <div class="col-md-6">
				<label>Tarjeta</label>
				<div class="input-group ">
                  
              <span class="input-group-text change-span-device"><?=$tipo_monena?></span>
			   <input type="text" class="form-control form-control-sm reduce-total" id="tarjeta" name="tarjeta" value="<?=$tarjeta?>" <?=$disabled_modalidad_de_pago?> >
                    </div>
                 
                </div>
                <div class="col-md-6">
                	<label>Transferencia bancaria</label>
                    <div class="input-group ">
                  <span class="input-group-text change-span-device"><?=$tipo_monena?></span>
			   <input type="text" class="form-control form-control-sm reduce-total" id="transferencia" name="transferencia" value="<?=$transferencia?>"  <?=$disabled_modalidad_de_pago?>>
                    </div>
                </div>
                <div class="col-6">
                 
                  <label>Efectivo</label>
                    <div class="input-group ">
                <span class="input-group-text change-span-device"><?=$tipo_monena?></span>
			   <input type="text" class="form-control form-control-sm reduce-total" id="effectivo" name="effectivo" value="<?=$effectivo?>"  <?=$disabled_modalidad_de_pago?> >
                    </div>
					
                </div>
                <div class="col-md-6">
                <label>Cheque</label>
                     <div class="input-group ">
                <span class="input-group-text change-span-device"><?=$tipo_monena?></span>
			   <input type="text" class="form-control form-control-sm reduce-total" id="cheque" name="cheque" value="<?=$cheque?>" <?=$disabled_modalidad_de_pago?> >
			     <span class="input-group-text">#</span>
				  <input type="text" class="form-control form-control-sm" id="checque-numero" name="checque-numero" value="<?=$checqueNumero?>"  <?=$disabled_modalidad_de_pago?> >
                    </div>
                </div>
				
                <div class="col-md-6">
                <small class="text-danger float-end" id="must-zero">* debe ser igual a 0</small>
                  <div class="input-group ">
                  
              <span class="input-group-text">Pendiente de caja</span>
			   <input type="text" class="form-control form-control-sm" id="pendiente-de-caja" name="pendiente-de-caja" readonly value="<?=$pendienteCaja?>" <?=$disabled_modalidad_de_pago?> >
			  
                    </div>
					
                </div>
			  <div class="col-md-6 text-start">
			  <br/>
                  <button type="button" id="save_factura" class="btn btn-primary btn-lg" <?=$disabled_modalidad_de_pago?>>Guardar</button>
				   
                  <div id="required_fac" class="pt-2"></div>
                </div>
				
              </div>
                        </div>
					
					
                    </div>
                </div>
            </div>
			
			<script>
		
			</script>