<div class="col-md-12">
 <hr class="hr_ad"/>
<p class="h4 his_med_title">III- Indicaciones Laboratorios</p>
<div class="col-md-6 table-responsive lab-ref" style='height:550px'>
<input id='search-ord-med-lab' class="form-control" placeholder='BUSCAR...' />
<table class="table table-striped table-bordered selectedlabom" id='paginate-lab-ord-med' >
 <thead>
<tr style="background:#38a7bb;color:white">
<th style="color:white">LABORATORIOS </th>
<th style="color:white;width:20px">
<i style="font-size:24px;color:white" class="fa fa-angle-double-right" aria-hidden="true"></i>
</th>
</tr>
 </thead>
 <tbody>
<?php 
$sql ="SELECT *  FROM laboratories order by name asc";

$query = $this->db->query($sql);

foreach($query->result() as $row)
{
$cpt="";
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>	
<tr bgcolor="<?=$colorBg ;?>">
<td  style="width:2px" ><?=$row->name?></td>
<td><input type='checkbox' name='laborat' class="check-lab2 btn-dis-or-med" value="<?=$row->id?>" disabled /></td>
</tr>
<?php 
}
?>
</tbody>
</table>

</div>
<div class="col-md-6" style="top:20px;height:550px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 1px hsl(0, 0%, 50%),
    0 0 0 2px hsl(0, 0%, 60%),
    0 0 0 3px hsl(0, 0%, 70%);
    ">
<div id="allLaboratoriosOrdMed"></div>
</div>
</div>
<script>
$('.check-lab2').change(function() {
	var labCheckded= $(this).val();
   if ($(this).is(':checked')) {
     var lab= $(this).val();
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/saveOrdMedLab')?>',
		data: {lab:lab,historial_id_l:<?=$id_historial?>,user_id:<?=$user_id?>,sala:$("#copy-sala").val(),
		cobert:0,id_em:0,cantidad:0,centro:0,printing:1,descuento:0,centro:0,printing:1},
		success:function(data) {
		allLaboratoriosOrdMed();
		
      },
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#allLaboratoriosOrdMed').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  
	});
} else {
	 var lab=labCheckded;
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/DeleteOrdMedLab')?>',
		data: {lab:lab,historial_id_l:<?=$id_historial?>,user_id:<?=$user_id?>,centro:0,printing:1},
		success:function(data) {
			allLaboratoriosOrdMed();
	  },

	});
	
} 
 })
 

function allLaboratoriosOrdMed()
{
$("#allLaboratoriosOrdMed").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var historial_id = <?=$id_historial?>;
var user_id  = <?=$user_id?>;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/allLaboratoriosOrdMed",
data: {historial_id:historial_id,user_id:user_id,printing:1,centro:0},
method:"POST",
success:function(data){
$('#allLaboratoriosOrdMed').html(data);
}
});
}


	 var $checkboxes = $('.selectedlabom td input[type="checkbox"]');
        
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        if(countCheckedCheckboxes==12){
			$('.selectedlabom td input[type="checkbox"]:not(:checked)').prop("disabled",true);
		}else{
		$('.selectedlabom td input[type="checkbox"]:not(:checked)').prop("disabled",false);	
		}
    });

 $("#search-ord-med-lab").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#paginate-lab-ord-med tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>