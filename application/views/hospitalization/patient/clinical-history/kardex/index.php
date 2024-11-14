  <?php if($this->session->userdata('user_perfil') =='Enfermera'){?>
  <div class="col-md-12" >
  <div id="ddzzsw"></div>
   <h5 class="card-title">KARDEX DE MEDICAMENTOS <span id='kardex-num'></span></h5>
  <div id="loadKardexFromOrenMedica"></div>
  </div>
  
 <?php if($query_k_ordm->result() !=NULL){?>
  <div class="col-md-7"  >
  
    <form class="row g-3">
	<div class="col-md-6">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Liquido E.V </label>
				      <input type="text" class="form-control kardex-remove" id='liquido-ev' />
					  <input type="hidden" class="form-control" id='kardex-id_i_m' />
                  <input type="hidden" class="form-control kardex-remove" id='id_med_al' />
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Via</label>
                    <input type="text" class="form-control kardex-remove" id='kardex-via' />
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Frecuencia cada</label>
                  <input type="text" class="form-control kardex-remove" id='kardex-frecuencia'/>
                </div>
               
				</div>
				<div class="col-md-6">
				   <div class="col-12">
                  <label for="inputAddress" class="form-label">Dosis</label>
                    <input type="text" class="form-control kardex-remove" id='kardex-dosis' />
                </div>
				
				  <div class="col-12">
                  <label for="inputAddress" class="form-label">Fecha Hora Realizada <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control kardex-remove" id='kardex-hora'  />
                </div>
				<div class="row">
				 <div class="col-md-6">
                  <label for="inputAddress" class="form-label">Cantidad</label>
                  <input type="text" class="form-control kardex-remove" id='kardex-cantidad'/>
                </div>
				
				 <div class="col-md-6">
                  <label for="inputAddress" class="form-label">Turno <span class="text-danger">*</span></label>
                  
				  <select class="form-select kardex-remove" id="kardex-turno">
				  <option value=""></option>
				  <option>Matutino</option>
				  <option>Vespertino</option>
				  <option>Nocturno</option>
				  </select>
                </div>
				
				</div>
				 </div>
				<div class="col-md-12">
                <div class="text-start">
                  <button type="button" id="kardex-add-med" class="btn btn-primary" disabled>Agregar</button>
                  <button type="button" class="btn btn-secondary" id="cancel-selected-kardex">Cancelar</button>
                </div>
				</div>
				  
              </form><!-- Vertical Form --> 
			
			</div>
 <?php } } ?>
			<div class="col-md-12"  >
			<hr class="prenatal-separator"/>
			<div id="kardex-list" class="kardex-new-med"  >
			
			</div>
			</div>
			
		
  
  
