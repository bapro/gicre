<?php 
 if($query_abuse_mistreat->num_rows() >0){
	 foreach($query_abuse_mistreat->result() as $rowht)

		$maltratof= $rowht->maltratof;
	$abusos= $rowht->abusos;
	$negligencia= $rowht->negligencia; 
	$maltrato= $rowht->negligencia;
	  $in_by = $rowht->inserted_by;
$up_by = $this->session->userdata('user_id');
$in_time = $rowht->inserted_time;
$up_time = date("Y-m-d H:i:s");
	$idas   =$rowht->id ;
	
 }else{
	$maltratof= "";
	$abusos= "";
	$negligencia= ""; 
	$maltrato= "";
	
	$idas   =0; 

   $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
 }
 

	?>
  <div class="col-sm-10" id="abuse-suspition-form">
   <?php
  
 if($idas > 0){
$params = array('table' => 'h_c_abuse_suspition', 'id'=>$idas);
echo $this->user_register_info->get_operation_info($params); 
 }
?>
                     <div class="form-floating mb-3">
                       <textarea class="form-control txt-abs" id="<?=$idas?>_ant_physic_abuse" placeholder="Maltrato Físico" style="height:150px"><?=$maltratof?></textarea>
                       <label for="ant_physic_abuse">Maltrato Físico</label>
                     </div>
                     <div class="form-floating mb-3">
                       <textarea class="form-control txt-abs" id="<?=$idas?>_ant_sexual_abuse" placeholder="Abuso Sexual" style="height:150px"><?=$abusos?></textarea>
                       <label for="ant_sexual_abuse">Abuso Sexual</label>
                     </div>
                     
                     <div class="form-floating mb-3">
                       <textarea class="form-control txt-abs" id="<?=$idas?>_ant_negligence" placeholder="Niguno" style="height:150px"><?=$negligencia?></textarea>
                       <label for="ant_negligence">Negligencia</label>
                     </div>

                     <div class="form-floating mb-3">
                       <textarea class="form-control txt-abs" id="<?=$idas?>_ant_emotional" placeholder="Niguno" style="height:150px"><?=$maltrato?></textarea>
                       <label for="ant_emotional">Maltrato Emocional</label>
                     </div>
			
					      <?php if($query_abuse_mistreat->num_rows() > 0){?>
						  
				<div class="float-end">
				<br/>
				
				
				<button type="button" class="btn btn-success" id="saveEditAbuseSis">Guardar </button><span id="successAbuseMal" class="p-2" style="position:absolute"></span>
			 </div>
			 <?php } 
			 
			 $dataab= array(
'sab_up_time'=>$up_time,
'sab_in_time' =>$in_time,
'sab_in_by'=>$in_by,
'sab_up_by' => $up_by
);

$this->session->set_userdata($dataab);

			 
			 ?>
                   </div>
				   <input type="hidden"   value="<?=$idas?>"  id="id_ab_sus" >
				   <input type="hidden" id="abuse-suspition-is-data" value="<?= $idas ?>" />
				
				   
				