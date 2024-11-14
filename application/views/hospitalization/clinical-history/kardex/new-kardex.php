<?php
 if($querykardex->result() !=NULL){

	 ?>


<div class="card">
<div class="card-body">
<ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true"><strong>Kardex realizado(s)</strong> (<i><?=$querykardex->num_rows()?></i>)</button>
</li>
<li class="nav-item flex-fill" role="presentation">
<button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#listreturn" type="button" role="tab" aria-controls="profile" aria-selected="false">Listado de devolucion</strong> (<i id="count_kar_dev"></i>)</button>
</li>

</ul>
<div class="tab-content pt-2" id="borderedTabJustifiedContent">
<div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
<input id="saveCheckBoxId" type="hidden" />
              <div style='overflow-x:auto;'>
<table  class="table table-striped" style="width:100%"  id='new-kardex-table'>

	<thead>
	<tr>

	<td colspan='8' style="text-align:right">
	
	
	</td>
	</tr>
    <tr style="background:#428bca;">
	<th style="color:white"><strong>#</strong></th>
	   <th style="color:white"><strong>Medicamento</strong></th>
	   <th style="color:white">Dosis</th>
	    <th style="color:white">Via</th> 
		<th style="color:white">Usuario</th> 
		<th style="color:white">Fecha</th>
<th style="color:white"><strong>Cantidad</strong></th>		
		<th style="color:white;text-align:left">
		<?php if($this->session->userdata('user_perfil')=="Enfermera"){?>
		Elegir todo <input type="checkbox" id="copy-all"  /> <?php echo ' <button type="button" id="btnPrintKardexMed" class="btn btn-sm btn-outline-light show-kardex-print" style="display:none;position:absolute" ><i class="fa fa-print"></i></button>'; ?>
		<?php } ?>
	</th> 
		<th></th>
     </tr>
	
    </thead>
    <tbody>
    <?php

	 foreach($querykardex->result() as $row)
     {
	$op=$this->db->select('name')->where('id_user',$row->kardex_user)->get('users')->row('name');
	$fecha = date("d-m-Y H:i:s", strtotime($row->kardex_fecha));
	$kardex_left=$this->hospitalization_emgergency->select('resta')->where('id_i_m',$row->id)->get('devolucion_almacen_lab')->row('resta');
	if($kardex_left){
		$cantidad = $kardex_left;
	}else{
		$cantidad = $row->cantidad;
	}
	if(is_numeric($row->medica)){		
		$medica=$this->hospitalization_emgergency->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name'); 
		 }else{
			$medica=$row->medica; 
		 }
	 ?>
	<tr id="<?=$row->id; ?>" >
	<td class="id_kardex"><?=$row->id;?></td>
	<td><?=$medica;?></td>
    
     <td class="hide-cancel-td-kardex"><?=$row->dosis;?></td>
	<td class="hide-cancel-td-kardex"><?=$row->via?></td>
	<td class="hide-cancel-td-kardex"><?=$op?></td>
	<td  class="hide-cancel-td-kardex"><?=$fecha?></td>
	<td class="hide-cancel-td-kardex">
	<span class="editSpanKardex lab-n"><?=$cantidad;?></span>
	
	 <div class="input-group editInputKardex"  style="display: none;">
	 <input class="form-control input-sm edit-cant-k" name="edit-lab"  type="number" min="1"  value="<?=$cantidad?>"  />
        <span class="input-group-text">
			<button type="button" title="guardar" class="btn btn-sm btn-success saveReturnKardex m-1" ><i class="bi bi-save2"></i> </button>
	<button type="button" title="Cancelar devolucion" class="btn btn-sm btn-outline-primary cancel-kardex"><i class="bi bi-x"></i></button>
		</span>
       </div>
	
	</td>
		<td  class="hide-cancel-td-kardex">
		<?php if($this->session->userdata('user_perfil')=="Enfermera"){?>
		<div class="d-flex">
		<div class="flex-fill p-1">
		<button type="button" title="Devolucionar"  class="return-kardex btn btn-primary btn-sm" id="<?=$row->id; ?>"  ><i class="bi bi-arrow-return-left"></i></button>
		</div>
		<div class="flex-fill p-1">
		<button type="button" title="Cancelar kardex" class="cancelar-kardex btn btn-outline-danger btn-sm" id="<?=$row->id; ?>"  ><i class="bi bi-x"></i></button>
		</div>
		<div class="flex-fill p-1">
		<input class="float-end copy-one" type="checkbox" value="<?=$row->id; ?>"  />
		</div>
		</div>
		<?php } ?>
		
		
		 </td>
		 <td colspan='7'>
	<div class="show-text-area-reason-cancel-kardex" style="display:none">
	
	<div class='form-floating mb-3'>
<textarea class='form-control cl-ord-med-study reasonToCancelRegisterTableKardex'  placeholder='Escribir porque quiere cancelar este registro' style='width: 100%'></textarea>
<label for='ordenMedicaEstNota'>Porque lo quiere cancelar?</label>
</div>
<button class='btn btn-sm btn-danger float-end m-1 anular-cancel-kardex'>Anular</button>
<button class='btn btn-sm btn-success float-end m-1 save-cancel-kardex' id='<?=$row->id; ?>'>Guardar</button>

	
	</div>
	
	</td>
       </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>
</div>
                </div>
                <div class="tab-pane fade" id="listreturn" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="devolucion-list-pat"></div>
                </div>
               
              </div><!-- End Bordered Tabs Justified -->

            </div>
          </div>


 <?php
	 }else{
		$nb_kardex=0; 
	 }
	 ?>

