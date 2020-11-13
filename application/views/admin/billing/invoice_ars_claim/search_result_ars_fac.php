<?php
$this->padron_database = $this->load->database('padron',TRUE);
$emty="";
 if($query2->num_rows()==0){
	echo '<div class="alert alert-info">Ya todas son creadas</div>';
     $emty="style='display:none'";
	}
	else {
		$emty='';
		
		?>
<div class="alert alert-info">Lista de <strong><?=$number?></strong> facturas que aún no se han creado</div>
<?php }?>

<table class="table table-striped  paginated" id="factura" <?=$emty?>>
	 <thead>
	<tr style="background:#C9F7FF">
	<td><strong>Fecha</strong></td>
	<td colspan="2"><strong>Paciente</strong></td>
	<td><strong>Cedula</strong></td>
	<td><strong>NSS</strong></td>
	<td><strong>No Autorizacion</strong></td>
	<td><strong>Total Reclamdo</strong></td>
	<td><strong>Aseguradora Pagara</strong></td>
	<td><strong>Paciente Pagara</strong></td>
	<td></td>
	<td><input type="checkbox" id="copy-all" /></td>
	</tr>
	</thead>
	 <tbody id="copy-all-rows">
	<?php
 foreach ($query2->result() as $fac) {
	 	$pat=$this->db->select('paciente,num_af, numauto,codigoprestado,rnc')->where('idfacc',$fac->id2)
	 ->get('factura2')->row_array();
	 
	$paciente=$this->db->select('nombre,cedula,photo,ced1,ced2,ced3')->where('id_p_a',$pat['paciente'])
	 ->get('patients_appointments')->row_array();
	$fecha1 = date("d-m-Y",strtotime($fac->filter));
 
	?>
	<tr>
	<td><?=$fecha1;?></td>
	<td>
<?php

if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($paciente['photo']==""){
	
}
else{
	?>
<img  width="50" height="50" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $paciente['photo']; ?>"  />
<?php

}
?>
</td>
	<td class="fecha1"  style="display:none"><?=$fac->filter;?></td>
	<td class="paciente" style="display:none"><?=$pat['paciente'];?></td>
	<td ><?=$paciente['nombre'];?></td>
	<td ><?=$paciente['cedula'];?></td>
	<td class="num_af"><?=$pat['num_af'];?></td>
	<td class="numauto"><?=$pat['numauto'];?></td>

	<td class="tsubtotal"><?=$fac->subtotal;?></td>
	<td class="totpagseg"><?=$fac->totalpaseg;?></td>
	<td class="totpagpa"><?=$fac->totpapat;?></td>
	<td class="medico" style="display:none"><?=$fac->medico2;?></td>
	<td class="servicio" style="display:none"><?=$fac->service;?></td>
	<td class="codigoprestado" style="display:none"><?=$pat['codigoprestado'];?></td>
	<td class="rnc" style="display:"><?=$pat['rnc'];?></td>
	<td class="seguro_medico" style="display:none"><?=$fac->seguro;?></td>
	<td class="idfacc" style="display:none"><?=$fac->idfac;?></td>
	<td><input type="checkbox"  class="copy-one" value="<?=$fac->idfac;?>" /></td>
	</tr>  

	<?php
	}

	?>
	 </tbody>
	</table>

	<script>
/*	
$('table.paginated').each(function() {
    var currentPage = 0;
    var numPerPage = 10;
    var $table = $(this);
    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });
    $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    for (var page = 0; page < numPages; page++) {
        $('<span class="page-number"></span>').text(page + 1).bind('click', {
            newPage: page
        }, function(event) {
            currentPage = event.data['newPage'];
            $table.trigger('repaginate');
            $(this).addClass('active').siblings().removeClass('active');
        }).appendTo($pager).addClass('clickable');
    }
    $pager.insertBefore($table).find('span.page-number:first').addClass('active');
});

*/


//-----------------------------------------------------------------------------------------
jQuery('#copy-all').on('click', function(e) {

if($(this).is(':checked',true)) {

}
else{
$(".copy-one").prop('checked', false);
}
})




$('#factura').on('click','#copy-all',function(e){
	//jQuery('#copy-all').on('click', function(e) {
	if($(this).is(':checked',true)) {
	$("#copy-all-rows").fadeOut(800, function(){ 
	$(this).remove();
	});
	$("#copy-all-rows").clone().appendTo('#second-table');
	

	$(".disabled-all :input").prop("disabled", false);
	$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
	//search_result();
	}
	})
	

	//CLICKING BY ROW
		
	$('#factura').on('click','.copy-one',function(e){
	if($(this).is(':checked',true)) {
	$(this).closest('tr').fadeOut(800, function(){ 
	$(this).remove();
	});
	$(this).closest('tr').clone().appendTo('#second-table>tbody');
	$(".disabled-all :input").prop("disabled", false);
	$(".disabled-all :input").not("button").not("#numcontrato").css("background", "");
	}
	//search_result();
	})
		
		
		
		$('#second-table').on('click','.copy-one',function(e){
		 e.preventDefault();
        $(this).closest('tr').fadeOut(800, function(){ 
		$(this).remove();
		});
		var id =$(this).val();
		$(this).closest('tr').clone().appendTo('#factura>tbody');
		})
	
	
	

	</script>