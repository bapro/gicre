     <br/>
  <div class="col-md-12" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >

<h4 class="h4 alert alert-info"> Listado De Documentos</h4>
<div id="patientDocData"></div>
   </div>


<script>

function patientDocData()
{
$('#patientDocData').fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
url:"<?php echo base_url(); ?>patient/listFolders",
data: {id_patient:<?=$id_historial?>,table_name:"patients_folders",folder_name:"assets/img/patients-folder/", from:0}, 
method:"POST",
success:function(data){
$('#patientDocData').html(data);
}
});
}


//var countPatDocD = 0;

$('#show-patient-documentos').on('click', function(e) {
	//e.preventDefault();
	  // countPatDocD ++;
	   // if(countPatDocD==1){
	patientDocData();
	  // }
});
</script>