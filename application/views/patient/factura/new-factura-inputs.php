                               
							   <?php
							   if($value ==1){
								   $cantidad = $invoice_by_regiser['cantidad'];
								    $preciouni = $invoice_by_regiser['preciouni'];
									 $subtotal = $invoice_by_regiser['subtotal'];
									 $totalpaseg = $invoice_by_regiser['totalpaseg'];
									 $descuento = $invoice_by_regiser['descuento'];
									 $totpapat = $invoice_by_regiser['totpapat'];
									 $service = $invoice_by_regiser['service'];
							   }else{
								  $cantidad = 1; 
								   $preciouni = ''; 
								   $subtotal = '';
								   $totalpaseg = '';
								   $descuento = '';
								   $totpapat = '';
								    $service = '';
							   }
							 

								if($seguro !=11){
							
								$getTarifData='getTarifDataSeguroPublico';
								$toDisp="";
								}else{
								$getTarifData='getTarifDataSeguroPrivado';
								
								}
								?>
							   <tr class="calculation">
                                    <td style="width:320px;display:block">
									
									<?php
									
                                   if($centro_type=="privado") {
                                    $service_name=$this->db->select('procedimiento')->where('id_tarif',$service)->get('tarifarios')->row('procedimiento');

										} else {	 
										$service_name=$this->db->select('sub_groupo')->where('id_c_taf',$service)->get('centros_tarifarios')->row('sub_groupo');
										}?>
									
                                        <select style='width:100%' class="form-select form-select-sm get-tarif-data" onChange="<?=$getTarifData?>(this);">
										<option value="<?=$service?>"><?=$service_name?></option>
										<?php
										if($centro_type=='privado') {
										echo $tarifarios;
                                        }else{
											echo $tarifarios_centro;
										}

										?>
										</select>
                                       
                                    </td>
                                    <td class="cantidad">
                                        <input type="text" class="form-control form-control-sm cantidad"   value='<?=$cantidad?>' onkeypress='return validateQty(event);'>
                                    </td>
                                    <td class="precio">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text" id="basic-addon2"><?=$money_device?></span>
                                            <input type="text" class="form-control precio" aria-describedby="basic-addon2" value="<?=$preciouni?>" onkeypress='return onlyfloat(event);'>
                                        </div>
                                    </td>
                                    <td class="row-total">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text" id="basic-addon3"><?=$money_device?></span> 
                                            <input type="text" class="form-control row-total"  aria-describedby="basic-addon3" value='<?=$subtotal?>' >
											 
                                        </div>
                                    </td>
								
									<?php 
								if($seguro !=11){?>
									   <td class="total-pag-seg">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text" id="basic-addon5"><?=$money_device?></span>
                                            <input type="text" class="form-control total-pag-seg"  aria-describedby="basic-addon5" value='<?=$totalpaseg?>' >
											 
                                        </div>
                                    </td>
                                  
									<?php } else{ ?>
								
								<input  class="form-control total-pag-seg"  type="hidden" value="0.00">
								<?php } ?>
								
								
                                    <td class="descuento">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text" id="basic-addon4"><?=$money_device?></span>
                                            <input type="text" class="form-control descuento"  aria-describedby="basic-addon4" value='<?=$descuento?>' onkeypress='return onlyfloat(event);'>
                                        </div>
                                    </td>
                                   <td class="total-pag-pa">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text change-span-device" id="basic-addon6"><?=$money_device?></span>
                                            <input type="text" class="form-control total-pag-pa" aria-describedby="basic-addon6" value="<?=$totpapat?>">
                                        </div>
										<input id="getTarifData" type="hidden" value="<?=$getTarifData?>"  />
                                    </td>
									 <td colspan='3' style='text-align:center'>
									<!-- <?=$buttonFacAdd?>
									 <?=$buttonFac?>
									<button class="btn btn-sm btn-primary" type="button" id="agregar_new_fac"  ><i class="bi bi-mas"></i> Agregar factura</button>-->
									</td>
                                </tr>
								
								<script>
								
							$('.form-select').select2({
							theme: 'bootstrap-5',
							//width: '100%'
							});
	// $('#table-tarifario').find("input").prop("disabled", true);
// $('#table-tarifario').find("select").prop("disabled", true);
								</script>