   <?php 
 if($query_sql_v_at->num_rows() >0){
	 foreach($query_sql_v_at->result() as $rowht)

		$violencia1= $rowht->violencia1;
	$violencia2= $rowht->violencia2;
	$violencia3= $rowht->violencia3; 
	$violencia4= $rowht->violencia4;
	$id_ao  =$rowht->id ;
		  $in_by = $rowht->inserted_by;
$up_by = $this->session->userdata('user_id');
$in_time = $rowht->inserted_time;
$up_time = date("Y-m-d H:i:s");
	 
 }else{
	$violencia1= "";
	$violencia2= "";
	$violencia3= ""; 
	$violencia4= "";
	
	$id_ao  =0; 
    $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
 }
 
 $intra_family_options = array("", "No", "Pareja", "Ex-pareja", "Familia", "Conocido");
 
 
 
	?>
  
  
  <div class="col-sm-12">
   <?php
 if($id_ao > 0){
$params = array('table' => 'h_c_ante_otros', 'id'=>$id_ao);
echo $this->user_register_info->get_operation_info($params);
 }
?>
                     <div class="col-12">
                       <label for="inputNanme4" class="form-label">Se ha sentido alguna vez afectado/a, lastimado/a emocionalmente o psicológicamente por alguna persona importante para usted?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select" id="<?=$id_ao?>_ant_violencia1" aria-label="Floating label select example">
						 <?php
						 foreach($intra_family_options as $intra_family_option){
							 if($violencia1==$intra_family_option) {
							 $selected="selected";
						}else{
							$selected=""; 
						 }
						echo "<option $selected>$intra_family_option</option>"; 
						 }
						 
						 ?>
                           
                         </select>
                         <label for="ant_violencia1">Seleccionar</label>
                       </div>
                     </div>
                     <div class="col-12">
                       <label for="ant_violencia2" class="form-label">Alguna vez alguien le ha hecho daño físico?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select" id="<?=$id_ao?>_ant_violencia2" aria-label="Floating label select example">
                           <?php  foreach($intra_family_options as $intra_family_option){
							   	 if($violencia2==$intra_family_option) {
							 $selected="selected";
						}else{
							$selected=""; 
						 }
							echo "<option $selected>$intra_family_option</option>"; 
						 }?>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                     </div>
                     <div class="col-12">
                       <label for="ant_violencia3" class="form-label">En algún momento has sido tocado/a, manoseado/a o forzado/a a tener contacto o relación sexual?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select" id="<?=$id_ao?>_ant_violencia3" aria-label="Floating label select example">
                            <?php  foreach($intra_family_options as $intra_family_option){
									 if($violencia3==$intra_family_option) {
							 $selected="selected";
						}else{
							$selected=""; 
						 }
							echo "<option $selected>$intra_family_option</option>"; 
						 }?>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                     </div>
                     <div class="col-12">
                       <label for="ant_violencia4" class="form-label">Cuándo era niño/a, fue tocado/a de una manera inapropriada por alguien?</label>
                       <div class="form-floating mb-3">
                         <select class="form-select" id="<?=$id_ao?>_ant_violencia4" aria-label="Floating label select example">
                           <?php  foreach($intra_family_options as $intra_family_option){
							   	 if($violencia4==$intra_family_option) {
							 $selected="selected";
						}else{
							$selected=""; 
						 }
							echo "<option $selected>$intra_family_option</option>"; 
						 }?>
                         </select>
                         <label>Seleccionar</label>
                       </div>
                     </div>
                   </div>
				   <input type="hidden"   value="<?=$id_ao?>"  id="id_intf" >
				   <input value="<?=$id_ao?>" type="hidden" id="id_ao1" />
				   <?php if($query_sql_v_at->num_rows() > 0){?>
				<div class="float-end">
				<br/>
				
				<button type="button" class="btn btn-success" id="saveEditIntraFam">Guardar </button><span id="successIntraFamViol" class="p-2" style="position:absolute"></span>
			 </div>
			 <?php } 
			 
	$datavio= array(
'vio_up_time'=>$up_time,
'vio_in_time' =>$in_time,
'vio_in_by'=>$in_by,
'vio_up_by' => $up_by
);

$this->session->set_userdata($datavio);
			 
			 
			 ?>
			 
		