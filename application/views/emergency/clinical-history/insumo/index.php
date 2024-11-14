<br/>
<input id="saveCheckBoxIdInsumo"  type="hidden" />
<?php 

$insumo_patient=$this->session->userdata('id_patient');
$insumo_centro=$this->session->userdata('id_centro');

    $sql = "SELECT id_c_taf, sub_groupo FROM  centros_tarifarios_test  where groupo LIKE 'gastable%' OR  groupo LIKE 'material%'  AND centro_id=$insumo_centro GROUP BY sub_groupo";
	$proc= $this->db->query($sql);

 ?>
<h4 class="h4 his_med_title">Peticion de insumo</h4>
<?php  if($this->session->userdata('user_perfil') =='Enfermera'){?>
<div class="row">
<div  class="col-xl-4">
<div class="input-group">
<select id="emer-nursing1" >
<option value=''>
Seleccionar insumo (<?=$proc->num_rows();?> registros)
</option>
<?php 

foreach($proc->result() as $row)
{ 
echo '<option value="'.$row->id_c_taf.'">'.$row->sub_groupo.'</option>';
}
?>
</select>

<input class="form-control form-control-sm" id='cantidad_insumo' type="number" onchange="this.value = Math.max(Math.ceil(Math.abs(this.value || 1)) || 1);" placeholder='cantidad'/>
<span class="input-group-text">
<button type='button' class="btn btn-sm btn-primary" id='pass-insumo-right'><i class="bi bi-arrow-right" aria-hidden="true"></i></button>
</span>
</div>

</div>
<div  class="col-xl-8">
<button type='button' id='guardar-insumo' class="btn btn-sm btn-success" style="display:none">Guardar</button>
<div  class="border p-2" style="height:200px;overflow-y:auto;">
	<br/>
<div id="load-Insumos"></div>
</div>

</div>
</div>
<?php } ?>
<div  class="col-md-12 border mt-3 p-2"  >
<div id="load-Insumos-Saved"></div>
<input value="<?=$table_insumo?>" id='table_insumo' type='hidden' />
<input  id='table_insumo_link' value='<?=$table_insumo_link?>' type='hidden'/>
 <input  id='id_hospit' value='<?=$id_hospit?>' type='hidden'/>

</div>
