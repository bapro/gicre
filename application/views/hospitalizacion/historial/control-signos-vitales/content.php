<div id="contSigVitalForm"></div>
   <div class="col-md-7" style="height:550px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 2px hsl(0, 0%, 50%),
    0 0 0 4px hsl(0, 0%, 60%),
    0 0 0 6px hsl(0, 0%, 70%);
    " >
      <div id="list-control-signos-vitales" ></div>
   </div>
 <script>


	
	
	




function contSigVital(){
$("#list-control-signos-vitales").fadeIn().html('listando...').css('font-style','italic').css('color','gray');
$.ajax({
type: "POST",
url: "<?=base_url('control_signos_vitales/listContSigVital')?>",
data:{id_patient:<?=$id_historial?>,id_user:<?=$user_id?>},
success:function(data){ 
$("#list-control-signos-vitales").html(data); 
},

})
}

contSigVitalForm();

function contSigVitalForm(){
$("#list-control-signos-vitales").fadeIn().html('listando...').css('font-style','italic').css('color','gray');
$.ajax({
type: "POST", 
url: "<?=base_url('control_signos_vitales/contSigVitalForm')?>",
data:{id:0,id_patient:<?=$id_historial?>,id_user:<?=$user_id?>},
success:function(data){ 
$("#contSigVitalForm").html(data); 
contSigVital();
},

})
}

 




/*$('.form_datetime').datetimepicker({
      
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		//format: "dd-MM-yyyy HH:ii:ss",
        linkField: "mirror_field_cont_sig",
        linkFormat: "yyyy-mm-dd HH:ii:ss",
		 startDate: "1900-01-01"
    }).on('changeDate', function (e) {
  $(this).focus();
  $(this).validate('revalidateField', 'eventDate');
 
   
});*/	

 </script>