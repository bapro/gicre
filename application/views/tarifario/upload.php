 <section class="py-3">
        <div class="container d-flex align-items-center justify-content-center">
		 <div class="col-lg-9">
            <div class="card bg-light">
                <div class="card-body">
				<div id="show-error"></div>
                    <div class="row g-2 align-items-center">
                        
                       
                            <h3 class="text-primary text-center text-md-start">IMPORTACION DE TARIFARIOS</h3>
                            <div class="bg-th p-4 my-1">
                                El archivo excel debe tener los siguientes
                                columnas:
                                codigo, simon, procedimiento, monto
                            </div>
                        
                  
			
			  
			     <form class="row g-3" method="post"  id="import_tarifarios"  enctype="multipart/form-data">
				 <div class="col-md-8">
                  <input type="hidden" class="form-control" value="<?=$doctor_ct?>" id="medico_id" name="medico_id">
                    <input type="text" class="form-control form-control-sm" value="Dr(a) <?=$doctor_name?>" disabled>
                </div>
                <div class="col-4">
                 
                    <input type="text" class="form-control form-control-sm" value="<?=$area?>" disabled>
					 <input type="hidden" name="area_id" value="<?=$area_id?>" >
                </div>
                <div class="col-md-12">
                   <input  class="form-control form-control-sm"  type="file" name="file" class="file required" required id="file">
                </div>
                <div class="col-md-12">
				<div class="input-group input-group-sm">
                  
              <span class="input-group-text">Codigo prestador</span>
			   <input type="text" class="form-control form-control-sm" id="codigo_medico" name="codigo_medico" required>
                    </div>
                 
                </div>
                
				<?php 
                  if($seguro_name !=""){
				?>
                <div class="col-md-7">
                <input type="hidden" class="form-control form-control-sm" name="seguro_id" id="seguro_id" value="<?=$seguro_ct?>" >
                    <input type="text" class="form-control form-control-sm"  value="Seguro: <?=$seguro_name?>" disabled>
                </div>
                <div class="col-md-5">
				
                 <input type="hidden" class="form-control form-control-sm select2-plan" name="plan_id" id="plan_id" value="<?=$plan_id?>">
				 <?php if($plan_id==0) {?>
				 <input type="text" class="form-control form-control-sm" id="plan_or_centro_id" placeholder="<?=$label?>" >
				  <div id="suggestion-planCentro-list"></div>
             
				 <?php } else{  ?>
                    <input type="text" class="form-control form-control-sm"  value="<?=$label?>: <?=$plan_name?>" disabled>
					<?php }   ?>
                </div>
              <?php 
				  } else {
				?>
				  <div class="col-md-6">
				    <label class="form-label">Seguro Médicos</label>
                 <select class="form-select form-select-seg" id="seguro_id" name="seguro_id" required>
				 	<option value="" ></option>
				<?php foreach ($query->result() as $mes){
				$seguro=$this->db->select('title')->where('id_sm',$mes->seguro_medico)->get('seguro_medico')->row('title'); 
				?>
				<option value="<?=$mes->seguro_medico?>" ><?=$seguro?></option>
				<?php
				}
				?>       
                  </select>
                </div>
                <div class="col-md-6">
				<label class="form-label" id='plan-o-seguro'><?=$label?></label>
                    <select class="form-select form-select-seg" id="plan_id" name="plan_id" required>
                               
                  </select>
                </div>
				<?php 
				  } 
				?>
                <div class="text-center">
                  <button type="submit" id="import-btn" class="btn btn-primary">Guardar</button>
                
                </div>
              </form>
			    </div>
                </div>
            </div>
        </div>
<div id="show-error-up"></div>

    </section>
	
