<table class="table table-sm table-striped mb-0" id="table-tarifario">
						<thead>
							<tr class="bg-th">
								<th scope="col" style="width:180px;display:block">
									Area 
								</th>
								<th scope="col">
									<?php
									echo $tipo_tarifario . ' <span class="text-danger">*</span>';
									?>

								</th>
								<th scope="col">Cantidad <span class="text-danger">*</span></th>
								<th scope="col">Precio Unitario <span class="text-danger">*</span></th>
								<th scope="col">Sub-Total</th>
								<?php if ($this->session->userdata('seguroId') != 11) { ?>
									<th scope="col">Total Pagar Seguro</th>
								<?php } ?>
								<th scope="col">Descuento</th>
								<th scope="col">Total Pagar Paciente</th>
								<th scope="col"></th>
							</tr>
						</thead>
						
						<tbody>
							<tr id="addr1" class="align-middle calculation">
								<td style="width:170px;">
								 <input id="center_tariff_area" value="0" type="hidden"  />
									<select style='width:100%' class="form-select select2 form-select-sm center_service_on_change" onChange="center_area_on_change(this);">
										<option value=""></option>
										<?php
										foreach ($select_servicios->result() as $rowS) {

											echo "<option>$rowS->groupo</option>";
										}

										?>

									</select>
								</td>
								<td style="width:280px;display:block">
									<span id="hideTarifCentro">

										<select style='width:100%' class="form-select select2 save-servicios form-select-sm get-tarif-data bind-area-to-list consultTafFromWebservice" onChange="getTarifDataSeguroPrivado(this);">

											
										</select>
									</span>
									



								</td>
								<td class="cantidad">
									<input type="text" class="form-control form-control-sm cantidad" value='1' onkeypress='return validateQty(event);'>
								</td>
								<td class="precio">
									<div class="input-group input-group-sm">
										<span class="input-group-text change-span-device" id="basic-addon2">RD$</span>
										<input type="text" class="form-control precio" aria-describedby="basic-addon2">
									</div>
								</td>
								<td>
									<div class="input-group input-group-sm">
										<span class="input-group-text change-span-device" id="basic-addon3">RD$</span>
										<input type="text" class="form-control row-total" aria-describedby="basic-addon3">
										
									</div>
								</td>
								<?php if ($this->session->userdata('seguroId') != 11) { ?>
									<td class="total-pag-seg">
										<div class="input-group input-group-sm">
											<span class="input-group-text change-span-device" id="basic-addon4">RD$</span>
											<input type="text" class="form-control total-pag-seg" value="0.00" aria-describedby="basic-addon4">
											<!--<input type="hidden" class="form-control total-monto-cambiado" >-->
										</div>
									</td>
								<?php } else { ?>
									<input type="hidden" class="form-control total-pag-seg" value="0.00">
									
								<?php }  ?>
								<td>
									<div class="input-group input-group-sm">
										<span class="input-group-text change-span-device" id="basic-addon5">RD$</span>
										<input type="text" class="form-control descuento text-danger" aria-describedby="basic-addon5" onkeypress='return onlyfloat(event);'>
									</div>
								</td>
								<td>
									<div class="input-group input-group-sm">
										<span class="input-group-text change-span-device" id="basic-addon6">RD$</span>
										<input type="text" class="form-control total-pag-pa" value="0.00" aria-describedby="basic-addon6">
									</div>
								</td>
								<td><input type='checkbox' name='chkbox' class='remove'></td>
								<td></td>
							</tr>

							<!--<tr id='addr2' class="calculation visible">-->
                 </tbody>
				 <tfoot>
							<tr class="align-middle bg-tbl-f text-center fw-bold">
								<td colspan="4">
									TOTALES
								</td>
								<td>
									<span class="change-span-device">RD$</span> <span id="table-grand-total">0.00</span>
								</td>
								<?php if ($this->session->userdata('seguroId') != 11) { ?>
									<td>
										<span class="change-span-device">RD$</span> <span id="seguro-grand-total">0.00</span>
									</td>
								<?php } ?>
								<td>
									<div class="text-danger">
										<span class="change-span-device">RD$</span> <span id="descuento-grand-total">0.00</span>
									</div>
								</td>
								<td>
									<span class="change-span-device"> RD$</span> <span id="tot-paciente-grand-total">0.00</span>
								</td>
								<td style="width:7%">
									<!--<button type="button" id="add_row" class="btn btn-outline-primary btn-sm" disabled><i class="bi bi-plus-square-fill"></i></button>-->
									<button type="button" title="Marca una casilla para quitar una fila" style="display:none" id="delete_row" class="btn btn-outline-danger btn-sm"><i class="bi bi-x-lg"></i></button>

								</td>
							</tr>
							<!--<tr>
								<td colspan='8' title="Borrar fila con casilla marcada" style="display:none" class="text-end" id="delete_row"><button type="button"  class="btn btn-outline-danger btn-sm" ><i class="bi bi-x-lg"></i></button></td><td colspan="8"></td>
								</tr>-->
						</tfoot>
					</table>
					
		<script>
		$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%'
	});
	
	
	$(function() {
		$("#table-tarifario").on("click", ".calculation", recalc);
		$("#table-tarifario").on("keyup blur", ".form-control", recalc);

		
		$(document).on("click", "#delete_row", function() {
			delRow(), recalc()
		});
	});
	
	</script>