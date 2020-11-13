<script>
 $(window).on( "load", function() {
	 var idpatient=<?=$row->id_p_a?>; 
	var seguro_medico = $("#seguro_medico").val();
      $.ajax({
		url: '<?php echo site_url('admin/get_input_view_edit');?>',
        type: 'post',
        
		data:{idpatient:idpatient,seguro_medico:seguro_medico},
        success: function (data) {
              		 $("#seguro_input").html(data);
        }
		
    });
    });


function getDoc(val) {
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin/get_doc');?>',
	data:'id_esp='+val,
	success: function(data){
	$("#doctor_dropdown").prop('disabled', false);
		$("#doctor_dropdown").html(data);
	}
	});
}

//-----save new cita---------------
$('#add_n').on('click', function(event) {
var causa = $("#causa").val();
var centro_medico = $("#centro_medico").val();
var especialidad = $("#especialidad").val();
var doctor_dropdown = $("#doctor_dropdown").val();
var fecha_propuesta = $("#fecha_propuesta").val();
var nec = $("#nec").val();
var id_patient = $("#id_patient").val();
$.ajax({
type: "POST",
url: "<?=base_url('admin/add_new_cita')?>",
data: {causa:causa,centro_medico:centro_medico,especialidad:especialidad,doctor:doctor_dropdown,fecha_propuesta:fecha_propuesta,nec:nec,id_patient:id_patient},

cache: true,
success:function(data){ 
$("#show_edit_cita").hide();
$(".hide_neuvac").show();
$("#load_new_cita").html(data);
$("#load_new_cita").slideDown();
$(".selectpicker").val('default');
$(".selectpicker").selectpicker("refresh");
$('#reset_data')[0].reset();

}  
});

return false;
});
$("#datoscitas").click(function(){
	$("#show_edit_cita").hide();
$(".hide_neuvac").show();
$("#hide_view_cita").show();
})


function IsNumeric(n){
    return !isNaN(n);
}

	$("#button_show_edit_cita").click(function(){
		$("#doctor_dropdown").prop('disabled', true);
		$('#doctor_dropdown').val('');
	$("#load_new_cita").hide();
	$(".hide_neuvac").hide();
	$("#hide_view_cita").hide();
	$("#show_edit_cita").slideDown();
	 var numLow = $("#lownumber").val();
        var numHigh = $("#highnumber").val();
        
        var adjustedHigh = (parseFloat(numHigh) - parseFloat(numLow)) + 1;
        
        var numRand = Math.floor(Math.random()*adjustedHigh) + parseFloat(numLow);
        
        if ((IsNumeric(numLow)) && (IsNumeric(numHigh)) && (parseFloat(numLow) <= parseFloat(numHigh)) && (numLow != '') && (numHigh != '')) {
            $("#nec").val(numRand);
        } else {
            $("#nec").val("Careful now...");
        }
        
        return false;
});


</script>