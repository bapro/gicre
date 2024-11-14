<style>
th,td{ text-align: left;}
</style>

<?php
$i=1;
$sql ="SELECT clock, id_p_a FROM employees" ;
/*$sql ="SELECT employees.national_id AS nat_id,employees_.national_id AS nat_id2, employees.id_p_a AS id_pat
 FROM employees
 INNER JOIN employees_
 ON employees.national_id=employees_.national_id" ;
$query= $this->db->query($sql);

foreach($query->result() as $row) {
$clock= $this->db->select('clock')->where('clock',$row->clock)->get('employees_')->row('clock');
	if($clock==$row->clock && $row->id_p_a !=NULL ){
	
	
$sql_update="UPDATE employees_
 SET id_p_a =$row->id_p_a
 WHERE clock = $row->clock"; 	

$query= $this->db->query($sql_update);
	}

}*/	
 ?>

 <div id="errorrr"></div>
 <form method="post"   class="form-horizontal" id="import_form_employees" enctype="multipart/form-data" >
<label class="control-label"  >Update Employees </label>
<input type="file" name="file" class="file required"  id="file" required  accept=".xls, .xlsx, .csv" />
 <input  name="creaded_by" value="1" type="hidden" class="form-control"  />

<input  name="centro" value="104" type="hidden" class="form-control"  />

<br/>
<input  type="submit" name="import-employees" id="import-employees" value="Import" class="btn btn-info"  />
<br/><br/>
</form>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>

$('#import_form_employees').on('submit', function(event){
event.preventDefault();
	if($("#upload-employees").val()==""){
alert("Upload the excel file that has the list of employees.");
}
else{
$('#import-employees').val('espera mienstras importando...').prop("disabled",true);
$.ajax({
url:"<?php echo base_url(); ?>utilitaire/import_employees_",
method:"POST",
//dataType: 'json',
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
alert('Los empleados importados con éxito');
location.reload(true);
//$('#errorrr').html(response.status);
//window.location.href = "<?php echo site_url('utilitaire/redirect_me');?>";
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#errorrr').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
};
});
</script>
