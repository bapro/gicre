 <?=$seguro?>
 <table class="table table-sm table-striped mb-0" id="table-tarifario">
                            <thead>
                                <tr class="bg-th">
                                    <th >
									<?php
										echo $tipo_tarifario. ' <span class="text-danger">*</span>';
										if($tarifarios==NULL){
										?>
                                    <a href="<?php echo base_url("tarifarios/upload/".$values_container['doctor_ct']."/".$values_container['seguro_ct']."/".$values_container['tarif_plan_ct']."/".$values_container['centro'])?>"class="btn btn-sm btn-outline-primary">No hay tarifarios crear</a>
										<?php }  ?>
									
									</th>
                                    <th>Cantidad <span class="text-danger">*</span></th>
                                    <th>Precio Unitario <span class="text-danger">*</span></th>
                                    <th>Sub-Total</th>
									<?php if($seguro !=11){?>
									<th >Total Pagar Seguro</th>
									<?php } ?>
                                    <th>Descuento</th>
                                    <th>Total Pagar Paciente</th>
									 <th></th>
                                </tr>
                            </thead>
							<tfoot>
							     <tr class="align-middle bg-tbl-f text-center fw-bold">
                                    <td colspan="3">
                                        TOTALES
                                    </td>
									<td>
                                        RD$ <span id="table-grand-total" >0.00</span>
                                    </td>
										<?php if($seguro !=11){?>
                                     <td >
                                        RD$ <span id="seguro-grand-total">0.00</span>
                                    </td>
									<?php } ?>
                                    <td>
                                        <div class="text-danger">
                                            RD$ <span id="descuento-grand-total">0.00</span>
                                        </div>
                                    </td>
                                    <td>
                                        RD$ <span id="tot-paciente-grand-total">0.00</span>
                                    </td>
									<td style="width:7%">
									<button type="button" id="add_row" class="btn btn-outline-primary btn-sm" disabled><i class="bi bi-plus-square-fill"></i></button>
									  <button type="button" title="Marca una casilla para quitar una fila" style="display:none" id="delete_row" class="btn btn-outline-danger btn-sm" ><i class="bi bi-x-lg"></i></button>
									
									 </td>
                                </tr>
								<!--<tr>
								<td colspan='8' title="Borrar fila con casilla marcada" style="display:none" class="text-end" id="delete_row"><button type="button"  class="btn btn-outline-danger btn-sm" ><i class="bi bi-x-lg"></i></button></td><td colspan="8"></td>
								</tr>-->
								</tfoot>
                            <tbody>
                                <tr id="addr1" class="align-middle calculation">
                                   <td style="width:280px;display:block">
								  
								    <select style='width:100%' class="form-select select2 save-servicios form-select-sm get-tarif-data" onChange="<?=$getTarifData?>(this);">
										
                                        <?php
										if($get_centro_info_by_id['type']=='privado') {
										echo $tarifarios;
                                        }else{
											echo $tarifarios_centro;
										}
										?>
										</select>
								   
                                    </td>
                                    <td class="cantidad">
                                        <input type="text" class="form-control form-control-sm cantidad"   value='1' onkeypress='return validateQty(event);'>
                                    </td>
                                    <td class="precio">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon2">RD$</span>
                                            <input type="text" class="form-control precio" aria-describedby="basic-addon2" >
                                        </div>
                                    </td>
                                    <td class="row-total">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon3">RD$</span>
                                            <input type="text" class="form-control row-total"  aria-describedby="basic-addon3">
											 <input  class="form-control total-pag-seg"  type="hidden" value="0.00">
                                        </div>
                                    </td>
									<?php if($seguro !=11){?>
									  <td class="total-pag-seg" >
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon4">RD$</span>
                                            <input type="text" class="form-control total-pag-seg"  aria-describedby="basic-addon4">
											<input type="hidden" class="form-control total-monto-cambiado" >
                                        </div>
                                    </td>
									<?php } ?>
                                    <td class="descuento">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon5">RD$</span>
                                            <input type="text" class="form-control descuento text-danger"  aria-describedby="basic-addon5" onkeypress='return onlyfloat(event);'>
                                        </div>
                                    </td>
                                    <td class="total-pag-pa">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon6">RD$</span>
                                            <input type="text" class="form-control total-pag-pa" aria-describedby="basic-addon6">
                                        </div>
                                    </td>
									 <td>
									 </td>
                                </tr>
								
								<tr id='addr2' class="calculation visible">
								
								
								
                            </tbody>
                        </table>