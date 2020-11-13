<?php if($queryexneu->result() !=NULL){ ?>
<table  class="table table-striped kardex-orden-medica" style="width:100%"  >
<thead>
    <tr style="background:#428bca;">
	   <th style="color:white"><strong>Fecha y hora</strong></th>
	   <th style="color:white">Insumo</th>
	    <th style="color:white">Frecuencia</th> 
		<th style="color:white">Via</th> 
		  <th style="color:white"><strong>Dosis</strong></th>
       <th style="color:white">Mas</th>
		<th style="color:white"></th>
     </tr>
    </thead>
    <tbody>
    <?php

	 foreach($queryexneu->result() as $row)

	 {
		$op=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
        $fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));
		   $med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');
		 ?>
       <tr >
	   <td class='id_i_m' style='display:none'><?=$row->id_i_m;?></td>
		<td class='medfecha'><?=$fecha;?></td>
		<td class='medica-kardex'><?=$med;?></td>
		<td class='frecuencia'><?=$row->frecuencia?></td>
		<td class='via'><?=$row->via?></td>
		<td  class='dosis'><?=$row->dosis;?></td>
		 <td title='Presentation: <?=$row->presentacion?> &#013 Nota: <?=$row->nota?> &#013 Operator: <?=$op?>' ><i class="fa fa-plus"></i></td>
	<td><input type="radio"  class="copy-one" name='copy-me' /></td>

      </tr>

	 <?php
	 }
	 ?>
    </tbody>
</table>
 <?php
	 }else{
		echo "<em>No hay medicamento en el orden medica...</em>"; 
	 }
	 ?>
<script>
$('.kardex-orden-medica').on('click','.copy-one',function(e){
	if($(this).is(':checked',true)) {
	$(this).closest('tr').fadeOut(800, function(){ 
	$(this).remove();
	});
	var id_i_m =$(this).closest('tr').find('td.id_i_m').text();
	var medica =$(this).closest('tr').find('td.medica-kardex').text();
	var frecuencia =$(this).closest('tr').find('td.frecuencia').text();
	var via =$(this).closest('tr').find('td.via').text();
	var dosis =$(this).closest('tr').find('td.dosis').text();
	var fecha =$(this).closest('tr').find('td.medfecha').text();
	$("#kardex-id_i_m").val(id_i_m);
	$("#liquido-ev").val(medica);
	$("#kardex-frecuencia").val(frecuencia);
	$("#kardex-via").val(via);
	$("#kardex-dosis").val(dosis);
	//$("#kardex-hora").val(fecha);
	$(".disabled-btn-kardex").prop('disabled',false);
	$(".disabled-btn-kardex").prop('disabled',false);
	}
})
</script>