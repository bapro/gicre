<div class="col-sm-6" >
  <em style='font-size:14px' class="alert-info">creado por <?=$inserted_by?> - <?=$inserted_time?></em>
 <table  class="table table-striped " cellspacing="0">
   <thead>
     <tr>
	   <th>#</th><th>Sintoma</th><th>Causa</th><th>Med.</th><th>Dosis</th><!--<th>Quitar</th>-->
     </tr>
    </thead>
    <tbody>
    <?php 
	 $cpt="";
	
	foreach($result_data->result() as $row)
	 
	 {
	$med=$this->db->select('med')->where('id',$row->id_med)->get('salud_oc_med')->row('med');
	 ?>
        <tr>
		<td><?=$row->id;?></td>
		<td><?=$row->sintoma;?></td>
		<td><?=$row->causa_med;?></td>
		<td><?=$med;?></td>
		<td><?=$row->dosis_med?></td>
        <!-- <td><a title="quitar" style="cursor:pointer" class='remove-med-pass-left' id="<?=$row->id; ?>" ><i class="fa fa-remove" style="color:red"></i></a></td>-->
		 </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>
 
 
 
</div>

 <div class="col-sm-6" >
 <br/>
 <label class="control-label">Nota</label>
 <br/>
 
 <textarea  class="form-control"  rows='8' readonly><?=$nota?></textarea>
</div>
