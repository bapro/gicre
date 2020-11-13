                                    <div  class="form-group" style="display: none;" id="humano">
                                     <label>NSS</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                     <label>NO. DE AFILIADO</label>
                                    <input type="text" class="form-control input-sm" name="seguro2"  /><br>
                                    </div>
									<!--palic-->
									 <div  class="form-group" style="display: none;" id="palic">
                                     <label>NO. DE AFILIADO</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                     <label>NO. CONTRATO</label>
                                    <input type="text" class="form-control input-sm" name="seguro2"  /><br>
                                    </div>
									
									<div  class="form-group" style="display: none;" id="yunen">
                                     <label>NSS</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                     <label>NO. DE AFILIADO</label>
                                    <input type="text" class="form-control input-sm" name="seguro2"  /><br>
                                    </div>
									
									<div  class="form-group" style="display: none;" id="uasd">
                                     <label>NSS</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                     <label>CARNET</label>
                                    <input type="text" class="form-control input-sm" name="seguro2"  /><br>
                                    </div>
									
									<div  class="form-group" style="display: none;" id="constitucion">
                                     <label>NO. DE AFILIADO</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                    </div>
									
									<div  class="form-group" style="display: none;" id="universal">
                                     <label>NO. DE AFILIADO</label>
                                     <input type="text" class="form-control input-sm" name="seguro1"  /><br/>
                                     <label>NO. CONTRATO</label>
                                    <input type="text" class="form-control input-sm" name="seguro2"  /><br>
                                    </div>
									
									<div  class="form-group" style="display: none;" id="renacer">
                                     <label>NSS</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                     <label>POLIZA</label>
                                    <input type="text" class="form-control input-sm" name="seguro2"  /><br>
                                    </div>
									
									<div  class="form-group" style="display: none;" id="senasa">
                                     <label>NSS</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                   </div>
								   
								   <div  class="form-group" style="display: none;" id="meta">
                                     <label>NSS</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                     <label>POLIZA</label>
                                    <input type="text" class="form-control input-sm" name="seguro2"  /><br>
                                    </div>
									
									<div  class="form-group" style="display: none;" id="colegio">
                                     <label>NO. DE AFILIADO</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                    </div>
									
									<div  class="form-group" style="display: none;" id="simag">
                                     <label>NSS</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                     <label>NO. DE AFILIADO</label>
                                    <input type="text" class="form-control input-sm"  name="seguro2" /><br>
                                    </div>
									
									<div  class="form-group" style="display: none;" id="bmi">
                                     <label>NO. CERTIFICADO</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                    </div>
									<div  class="form-group" style="display: none;" id="banreservas">
                                     <label>CODIGO ASEGURADO</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                    </div>
									<div  class="form-group" style="display: none;" id="subsidiado">
                                     <label>NSS</label>
                                     <input type="text" class="form-control input-sm" name="seguro1" /><br/>
                                    
									</div>
									 <script>
		
                                     $('select[name=seguro_medico]').on('change', function() {
										 //HUMANO
                                     if (this.value == 'ARS HUMANO') 
									 {
                                     $("#humano").show();
									 $("#palic").hide();
									 $("#yunen").hide();
									 $("#uasd").hide();
									 $("#constitucion").hide();
									 $("#universal").hide();
									  $("#renacer").hide();
									  $("#senasa").hide();
									  $("#meta").hide();
									  $("#colegio").hide();
									  $("#simag").hide();
									   $("#bmi").hide();
									   $("#banreservas").hide();
									   $("#subsidiado").hide();
                                     } 
									 
									 //PALIC
									 
									  else if (this.value == 'ARS PALIC SALUD') 
									 {
									$("#palic").show();
									 $("#humano").hide();
									  $("#yunen").hide();
									   $("#uasd").hide();
									   $("#constitucion").hide();
									   $("#universal").hide();
									    $("#renacer").hide();
										$("#senasa").hide();
										$("#meta").hide();
										$("#colegio").hide();
										$("#simag").hide();
										 $("#bmi").hide();
										 $("#banreservas").hide();
										 $("#subsidiado").hide();
                                     }
                                      //YUNEN

                                       else if (this.value == 'ARS YUNEN') 
									 {
									$("#yunen").show();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#uasd").hide();
									   $("#constitucion").hide();
									   $("#universal").hide();
									    $("#renacer").hide();
										$("#senasa").hide();
										$("#meta").hide();
										$("#colegio").hide();
										$("#simag").hide();
										 $("#bmi").hide();
										 $("#banreservas").hide();
										 $("#subsidiado").hide();
                                     }
									 
									   //UASD

                                       else if (this.value == 'ARS UASD') 
									 {
								  $("#uasd").show();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#constitucion").hide();
									   $("#universal").hide();
									    $("#renacer").hide();
										$("#senasa").hide();
										$("#meta").hide();
										$("#colegio").hide();
										$("#simag").hide();
										 $("#bmi").hide();
										 $("#banreservas").hide();
										 $("#subsidiado").hide();
                                     }
									 
									 
									   //CONSTITUCION

                                       else if (this.value == 'ARS CONSTITUCION') 
									 {
								 $("#constitucion").show();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#universal").hide();
									    $("#renacer").hide();
										$("#senasa").hide();
										$("#meta").hide();
										$("#colegio").hide();
										$("#simag").hide();
										 $("#bmi").hide();
										 $("#banreservas").hide();
										 $("#subsidiado").hide();
                                     }
									 
									 
									    //	UNIVERSAL

                                       else if (this.value == 'ARS UNIVERSAL') 
									 {
								$("#universal").show();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									    $("#renacer").hide();
										$("#senasa").hide();
										$("#meta").hide();
										$("#colegio").hide();
										$("#simag").hide();
										 $("#bmi").hide();
										 $("#banreservas").hide();
										 $("#subsidiado").hide();
                                     }
									 
									   //	RENACER

                                       else if (this.value == 'ARS RENACER') 
									 { 
								 $("#renacer").show();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#senasa").hide();
									   $("#meta").hide();
									   $("#colegio").hide();
									   $("#simag").hide();
									    $("#bmi").hide();
										$("#banreservas").hide();
										$("#subsidiado").hide();
                                     }
									 
								 //	SENASA

                                       else if (this.value == 'ARS SENASA CONTRIBUTIVO') 
									 {
                                $("#senasa").show();										 
								 $("#renacer").hide();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#meta").hide();
									   $("#colegio").hide();
									   $("#simag").hide();
									    $("#bmi").hide();
										$("#banreservas").hide();
										$("#subsidiado").hide();
                                     }
									 
									 
									 //	COLEGIO
									    else if (this.value == 'ARS COLEGIO MEDICO DOMINICANO') 
									 {
							  $("#colegio").show();
                                $("#senasa").hide();										 
								 $("#renacer").hide();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#meta").hide();
									   $("#simag").hide();
									    $("#bmi").hide();
										$("#banreservas").hide();
										$("#subsidiado").hide();
                                     }
									 
									 
									  //	SIMAG
									    else if (this.value == 'ARS SIMAG') 
									 {
							$("#simag").show();
							  $("#colegio").hide();
                                $("#senasa").hide();										 
								 $("#renacer").hide();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#meta").hide();
									   $("#bmi").hide();
									   $("#banreservas").hide();
									   $("#subsidiado").hide();
                                     }
									 
									 
									   //	BMI
									    else if (this.value == 'ARS BMI') 
									 {
							$("#bmi").show();
							$("#simag").hide();
							  $("#colegio").hide();
                                $("#senasa").hide();										 
								 $("#renacer").hide();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#meta").hide();
									   $("#banreservas").hide();
									   $("#subsidiado").hide();
									   
                                     }
									 //BANRESERVAS
									 
									 
									   else if (this.value == 'ARS BANRESERVAS') 
									 {
							$("#banreservas").show();
							$("#bmi").hide();
							$("#simag").hide();
							  $("#colegio").hide();
                                $("#senasa").hide();										 
								 $("#renacer").hide();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#meta").hide();
									   $("#subsidiado").hide();
									   
                                     }
									 //subsidiado
									 
									  else if (this.value == 'ARS SENASA SUBSIDIADO') 
									 {
							$("#subsidiado").show();
							$("#banreservas").hide();
							$("#bmi").hide();
							$("#simag").hide();
							  $("#colegio").hide();
                                $("#senasa").hide();										 
								 $("#renacer").hide();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#meta").hide();
									  }
									  
									  
									   else if (this.value == 'ARS FFAA') 
									 {
							$("#subsidiado").show();
							$("#banreservas").hide();
							$("#bmi").hide();
							$("#simag").hide();
							  $("#colegio").hide();
                                $("#senasa").hide();										 
								 $("#renacer").hide();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#meta").hide();
									  }
									  
									   //APS

                                       else if (this.value == 'ARS APS') 
									 {
								  $("#uasd").show();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#constitucion").hide();
									   $("#universal").hide();
									    $("#renacer").hide();
										$("#senasa").hide();
										$("#meta").hide();
										$("#colegio").hide();
										$("#simag").hide();
										 $("#bmi").hide();
										 $("#banreservas").hide();
										 $("#subsidiado").hide();
                                     }
									 //FUTURO
									   else if (this.value == 'ARS FUTURO') 
									 {
							$("#subsidiado").show();
							$("#banreservas").hide();
							$("#bmi").hide();
							$("#simag").hide();
							  $("#colegio").hide();
                                $("#senasa").hide();										 
								 $("#renacer").hide();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#meta").hide();
									  }
									  
									  
									  
									     //GRUPO_MEDICO

                                       else if (this.value == 'ARS GRUPO MEDICO ASOCIADO') 
									 {
								  $("#uasd").show();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#constitucion").hide();
									   $("#universal").hide();
									    $("#renacer").hide();
										$("#senasa").hide();
										$("#meta").hide();
										$("#colegio").hide();
										$("#simag").hide();
										 $("#bmi").hide();
										 $("#banreservas").hide();
										 $("#subsidiado").hide();
                                     }
									 
									 //BANCO_CENTRAL
									    else if (this.value == 'ARS BANCO CENTRAL') 
									 {
							$("#banreservas").show();
							$("#bmi").hide();
							$("#simag").hide();
							  $("#colegio").hide();
                                $("#senasa").hide();										 
								 $("#renacer").hide();
								$("#universal").hide();
								 $("#constitucion").hide();
								  $("#uasd").hide();
									$("#yunen").hide();
                                     $("#humano").hide();
									   $("#palic").hide();
									   $("#meta").hide();
									   $("#subsidiado").hide();
									   
                                     }
									 
								
									  
									 else {
                                      $("#palic").hide();
									    $("#humano").hide();
										 $("#yunen").hide();
										 $("#uasd").hide();
										 $("#constitucion").hide();
										 $("#universal").hide();
										 $("#renacer").hide();
										  $("#senasa").hide();
										  $("#meta").hide();
										  $("#colegio").hide();
										   $("#simag").hide();
										   $("#bmi").hide();
										   $("#banreservas").hide();
										    $("#subsidiado").hide();
                                     }
									
                                     });
                                    </script>