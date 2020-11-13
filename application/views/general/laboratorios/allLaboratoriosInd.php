<div class="col-md-9 table-responsive lab-ref">
<table class="table table-striped table-bordered " id="gnl-labo">
 <thead>
<tr style="background:#38a7bb;color:white">
<th style="color:white">Laboratorios </th>
<th style="color:white;width:20px">
<!--
<ul class="nav navbar-nav">
<li class="dropdown">
<span class="dropdown-toggle" data-toggle="dropdown"  ><i style="font-size:24px;color:white" class="fa">&#xf02f;</i><span style="cursor:pointer" class="caret"></span></span>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
<li  style="border-bottom:1px solid"><a target="_blank" href="<?php echo base_url("printings/print_laboratorios_horiz/$id_historial/$areaid/$user_id")?>" style="cursor:pointer;color:black" class="btn-sm print-me1" >Con Formato Horizontal</a></li>
<li role="separator" class="divider"></li>
<li class="dropdown-submenu">
<a>Con Formato Vertical<span class="caret"></span></a>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" >
<li  style='font-style:italic'><a href="<?php echo base_url("printings/print_laboratorios/$id_historial/$areaid/$user_id/1")?>" ><i class="glyphicon glyphicon-triangle-right"></i> con la foto</a></li>
<li  style='font-style:italic'><a href="<?php echo base_url("printings/print_laboratorios/$id_historial/$areaid/$user_id/0")?>" ><i class="glyphicon glyphicon-triangle-right"></i> sin la foto</a></li>
</ul>
</li>

</ul>


</li>

</ul>-->
<ul class="nav navbar-nav">
<li class="dropdown">
<span class="dropdown-toggle" data-toggle="dropdown"  ><i style="font-size:24px;color:white" class="fa">&#xf02f;</i><span style="cursor:pointer" class="caret"></span></span>
<ul class="dropdown-menu" aria-labelledby="about-us">
<li><a target="_blank" href="<?php echo base_url("printings/print_labo/$id_historial/$areaid/$user_id/1")?>" class="print-me1"><i class="glyphicon glyphicon-triangle-right"  ></i>Formato Vertical con la foto</a></li>
<li><a target="_blank" href="<?php echo base_url("printings/print_labo/$id_historial/$areaid/$user_id/0")?>" class="print-me1" ><i class="glyphicon glyphicon-triangle-right" ></i>Formato Vertical sin la foto</a></li>

<li role="separator" class="divider"></li>
<li  style="border-bottom:1px solid"><a target="_blank" href="<?php echo base_url("printings/print_laboratorios_horiz/$id_historial/$areaid/$user_id")?>" style="cursor:pointer;color:black" class="print-me1" ><i class="glyphicon glyphicon-triangle-right"></i>Formato Horizontal</a></li>
</ul>
</li>
</ul>
</th>
</tr>
 </thead>
 <tbody>
<?php 
//$sql ="SELECT laboratories.* FROM laboratories WHERE id NOT IN(SELECT laboratory FROM h_c_indications_labs where historial_id=$id_historial)";
$sql ="SELECT *  FROM laboratories";

$query = $this->db->query($sql);

foreach($query->result() as $row)
{
$cpt="";
//foreach($laboratories as $row)
//{
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
<td><input type='checkbox' name='laborat' class="check-lab" value="<?=$row->id?>"  /></td>
</tr>
<?php 
}
?>
</tbody>
</table>

</div>

<script>


 var $checkb = $('.examplelab td input[type="checkbox"]');
        
    $checkb.change(function(){
        var countCheckedCheckboxes = $checkb.filter(':checked').length;
        // $('#count-checked-checkboxes').text(countCheckedCheckboxes);
        if(countCheckedCheckboxes==12){
			$('.examplelab td input[type="checkbox"]:not(:checked)').prop("disabled",true);
		}else{
		$('.examplelab td input[type="checkbox"]:not(:checked)').prop("disabled",false);	
		}
    });

$('.print-me1').click(function(){
	allLaboratoriosInd();
    if(!$('.examplelab input[type="checkbox"]').is(':checked')){
		
      alert("Por favor marque al menos uno.");
      return false;
    }
});




  $('#gnl-labo').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ]

    } );


var checkboxes = $("input[name='laborat']");
   // submitButt = $('#print-first');

checkboxes.click(function() {
	if(checkboxes.is(":checked")){
		$('#print-first').show();
	} else {
		$('#print-first').hide();
		}
   // submitButt.css("display", "block", !checkboxes.is(":checked"));
});


$('.check-lab').change(function() {
	var labCheckded= $(this).val();
	var operatorl = "<?=$operator?>";
    var historial_id_l ="<?=$id_historial?>";
	var user_id ="<?=$user_id?>";
   if ($(this).is(':checked')) {
     var lab= $(this).val();
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/SaveFormIndicacionesLab')?>',
		data: {lab:lab,historial_id_l:historial_id_l,operatorl:operatorl,user_id:user_id},
		success:function(data) {
		/* $('html,body').animate({
        scrollTop: $(".is_print").offset().top},
        'slow');*/
		allLaboratorios();
		
      },

	});
} else {
	 var lab=labCheckded;
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/DeleteHistLab2')?>',
		data: {lab:lab,historial_id_l:historial_id_l,operatorl:operatorl,user_id:user_id},
		success:function(data) {
			allLaboratorios();
	  },

	});
	
} 
 })
 


</script>