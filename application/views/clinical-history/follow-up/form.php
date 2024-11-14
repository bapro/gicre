<div class="tab-content pt-3" >
                <div class="tab-pane fade <?=$show?> <?=$active?>" id="enfAct-left<?=$ident?>" role="tabpanel" aria-labelledby="enfAct-tab<?=$ident?>">
				 <div class="row">
				 <?php if($doc_area_id !=91) {?>
				 <div class="col-md-12">
				<div class="form-floating mb-3">

					<div class="form-control"  style="height: 100px" ><?= $current_disease['enf_motivo']; ?></div>
					<label> Motivo de consulta</label>
					</div>
					</div>
					<div class="col-md-12">
					<div class="form-floating mb-3">
					<div class="form-control overflow-auto"  style="height: 150px"  ><?= $current_disease['signopsis']; ?></div>
					<label>Sinopsis</label>
					</div>
					</div>
				 <?php } else{ ?>
				 <div class="col-md-12">
					<div class="form-floating mb-3">
					<div class="form-control overflow-auto"  style="height: 150px"  ><?= $current_disease['cir_vas_historial']; ?></div>
					<label>Historia</label>
					</div>
					</div>
					 <?php }?>
					</div>
					</div>
                <div class="tab-pane fade" id="conDiag-left<?=$ident?>" role="tabpanel" aria-labelledby="conDiag-tab<?=$ident?>">
                              <div class="row">
						
	 <div class="col-md-12">
<div class="form-floating mb-3">
<div class="form-control" style="height: 100px" ><?= $list_cie10; ?></div>
<label>diagnósticos</label>
</div>
</div>
	 
 <div class="col-md-12">
<div class="form-floating mb-3">
<div class="form-control overflow-auto"  style="height: 150px" ><?= $con_diags['plan']; ?></div>
<label>Plan</label>
</div>
</div>
	 <?php 
	  if($con_diags['otros_diagnos'] !==""){
	  ?>
 <div class="col-md-12">
<div class="form-floating mb-3">
<div class="form-control overflow-auto"  style="height: 150px"><?= $con_diags['otros_diagnos']; ?></div>
<label>Otros diagnósticos</label>
</div>
</div>
 <?php 
	  }
	  if($con_diags['procedimiento'] !==""){
	  ?>
 <div class="col-md-12">
<div class="form-floating mb-3">
<div class="form-control overflow-auto"  style="height: 150px" ><?= $con_diags['procedimiento']; ?></div>
<label>Procedimientos</label>
</div>
</div>	
 <?php } ?>

	  </div>
                </div>
				 <?php if($signo_vitales !=NULL) {?>
                <div class="tab-pane fade" id="sigVit-left<?=$ident?>" role="tabpanel" aria-labelledby="sigVit-tab<?=$ident?>">
        <div class="row">
	   
		<div class="col-lg">
		<table class="table table-sm table-bordered">
		<thead>
		<tr>
		<td>Sistol</td><td>Diastol</td>
		<td> Fr.temp.</td><td>Peso</td>
		<td> Talla</td><td>Pulso</td>
		<td> Glicemia</td><td>Perimetro Cefalico</td>
		</tr>
		</thead>
		<tbody>
		<tr>
		<td><?=$signo_vitales['ta'];?></td><td><?=$signo_vitales['hg'];?></td>
		<td> <?= $signo_vitales['tempo']; ?> </td><td><?=$signo_vitales['peso'];?> lb = <?=$signo_vitales['kg'];?> kg</td>
		<td> <?=$signo_vitales['talla'];?>  metro = 56 inc - IMC: <?=$signo_vitales['imc'];?></td><td> <?=$signo_vitales['pulso'];?> </td>
		<td><?=$signo_vitales['glicemia'];?></td> <td><?=$signo_vitales['signo_v_per_cef'];?> cm</td>
		</tr>
		</tbody>
		</table>
		</div>
	

	</div>	 
                </div>
				 <?php } ?>
              </div>