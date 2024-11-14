 <?php 
if($queryEmp->result() !=NULL){
$headerTitle="Employee Info  <button type='button'  class='btn btn-primary btn-xs' id='click-editar' ><i class='fa fa-pencil' aria-hidden='true' title='Edit' ></i> Edit </button>";
$disabled="disabled";
$crearNuevo="<button type='button'  $display class='btn btn-primary btn-xs' id='click-nuevo' ><i class='fa fa-plus' aria-hidden='true' title='Create' ></i> Create </button>";
foreach ($queryEmp->result() as $row)
$inserted_by=$row->inserted_by;
$inserted_time=$row->inserted_time;
$id=$row->id;
$clock=$row->clock;
$employee_name=$row->employee_name;
$gender=$row->gender;
$gbl_shift=$row->gbl_shift;
$date_sen=$row->date_sen;
$terminated_date=$row->terminated_date;
$status=$row->status;
$title=$row->title;
$depart=$row->depart;
$super_clock=$row->super_clock;
$super_name=$row->super_name;
$gbl_cost=$row->gbl_cost;
$dr_pr_dept=$row->dr_pr_dept;
$national_id=$row->national_id;
$date_of_birth=$row->birth_date;
}else{
$date_of_birth="";
$crearNuevo="";
$inserted_by=$id_user;
$inserted_time=date("Y-m-d H:i:s");
$id=0;
$headerTitle="Create Employee";
$disabled="";
$clck=$this->db->select('clock')->order_by('id','DESC')->limit(1)->get('employees')->row('clock');
$clock=$clck + 1;
$employee_name="";
$gender="";
$date_sen="";	
$status	="";
$title="";
$depart="";
$gbl_shift="";
$super_clock="";
$super_name="";
$gbl_cost="";
$dr_pr_dept="";
$national_id="";
$terminated_date="";
}
$termDv='';
$termD="";
if($status=='Terminated'){
	//$termDv=date("d-m-Y",strtotime($terminated_date));
	$termDv=$terminated_date;
$termD="";

}else{
	$termD="style='display:none'";
}

?>
  <ul class="nav nav-tabs">
    <li class="active">
	<a  data-toggle="tab" href="#datos-empleado">
	<?=$headerTitle?> <?=$crearNuevo?>
	</a>
	</li>
   
  </ul>
   <div class="tab-content"> 
<div id="datos-empleado" class="tab-pane fade in active"> 
<form  id="save-datos-empleado" class="form-horizontal" method="post"  > 
<input name="idEmp" id="idEmp" type="hidden" value="<?=$id?>" />
<input name="inserted_by" type="hidden" value="<?=$inserted_by?>" />
<input name="updated_by" type="hidden" value="<?=$id_user?>" />
<input name="inserted_time" type="hidden" value="<?=$inserted_time?>" />
<input name="centro" type="hidden" value="<?=$id_cm?>" />
<input id="saveDatosEmpleado" type="hidden" value="<?=base_url('zona_franca/saveDatosEmpleado')?>" />
<div class="form-group">
<label class="control-label col-sm-3"> Clock</label>
<div class="col-sm-3">
<input type="text" class="form-control"  value="<?=$clock?>"  name="clock"  id="clockValue"  <?=$disabled?>  >
<div id="clockInfo"></div>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3"> Employee Name</label>
<div class="col-sm-7">
<input type="text" class="form-control"  value="<?=$employee_name?>" name="employee_name"  <?=$disabled?>  required>

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"> Date Of Birth</label>
<div class="col-sm-4">
<input type="text" class="form-control date_f"  value="<?=$date_of_birth?>" name="date_of_birth"  <?=$disabled?>  required>

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Gender</label>
<div class="col-sm-4">

<div class="radio">

<?php
if($gender == 'M'){
	$checked="checked";
}
else{
	$checked="";
}
?>
<label>
<input type="radio" name="gender" value="M" <?=$checked?> <?=$disabled?>  required>
Masculino
</label>
</div>
<div class="radio">
<?php
if($gender == 'F'){
	$checked="checked";
}
else{
	$checked="";
}
?>
<label>
<input type="radio" name="gender" value="F" <?=$checked?>  <?=$disabled?>>
Femenina
</label>
</div>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" >Date Seniority Calc </label>
<div class="col-sm-4" >
<input  type="text"  class="form-control date_f" value="<?=$date_sen?>" name="date_sen" <?=$disabled?> > 
</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3" >Status</label>
<div class="col-sm-4">

<div class="radio">

<?php

if($status == 'Active'){
	$isActive='';
	$checked="checked";
}
else{
	$checked="";
	$isActive='style="display:none"';
}
?>
<label>
<input type="radio" name="status" value="Active" <?=$checked?> required  <?=$disabled?>>
Active
<span <?=$isActive?> class="isActive"><i class="fa fa-check " style ="color:green" aria-hidden="true"></i></span>
 
 </label>
</div>
<div class="radio">
<?php
if($status =='Terminated'){
	$isActive1='';
	$checked="checked";
}
else{
	$checked="";
	$isActive1='style="display:none"';
}
?>
<label>
<input type="radio" name="status" value="Terminated" <?=$checked?>  <?=$disabled?>>
Terminated
<span <?=$isActive1?> class="dateEnd">
<i class="fa fa-close " style="color:red" aria-hidden="true"></i>
</span>  

<span <?=$termD?> class="dateEnd">
<input  type='text'  class='form-control date_f'   value='<?=$termDv?>' id="terminated_date" name='terminated_date' <?=$disabled?>  >
</span>

</label>
</div>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" >Title</label>
<div class="col-sm-6">
<input  type="text"  class="form-control"   value="<?=$title?>" name="title"  <?=$disabled?>   required>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Department </label>
<div class="col-sm-6">						
<input  type="text"  class="form-control bfh-phone" value="<?=$depart?>" name="depart"  <?=$disabled?>   required>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3">GBL Shift ID</label>
<div class="col-sm-6">
<input  type="text"  class="form-control" value="<?=$gbl_shift?>" name="gbl_shift" id="gbl_shift" <?=$disabled?>   >

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3">Supervisor Clock </label>
<div class="col-sm-6">
<input  type="text"  class="form-control" value="<?=$super_clock?>" name="super_clock" <?=$disabled?>   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > Supervisor Name</label>
<div class="col-sm-6">
<input  type="text"  class="form-control" value="<?=$super_name?>" name="super_name"  <?=$disabled?>  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" > GBL Cost Center</label>
<div class="col-sm-6">
<input  type="text"  class="form-control" value="<?=$gbl_cost?>" name="gbl_cost"  <?=$disabled?>  >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >DR/PR Department</label>
<div class="col-sm-6">

<input  type="text"  class="form-control" value="<?=$dr_pr_dept?>" name="dr_pr_dept"  <?=$disabled?>  >

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >National ID</label>
<div class="col-sm-4">

<input  type="text"  class="form-control" value="<?=$national_id?>" name="national_id"  <?=$disabled?> >

</div>
</div>

 <div class="col-sm-6  col-xs-offset-1" >
 <BR/><BR/>
      <button type="submit" class="btn btn-success  btn-lg" <?=$disabled?> >GUARDAR DATOS</button>
	  <div id="insertionResultEmp"></div>
	  <br/><br/><br/>
    </div>

</form>
</div>

</div>
 <script src="<?=base_url();?>assets/js/employee.js?rnd=182"></script> 
 
 <script>
 var textInput = document.getElementById('clockValue');

// Init a timeout variable to be used below
var timeout = null;

// Listen for keystroke events
textInput.onkeyup = function (e) {

    // Clear the timeout if it has already been set.
    // This will prevent the previous task from executing
    // if it has been less than <MILLISECONDS>
    clearTimeout(timeout);

    // Make a new timeout set to go off in 800ms
    timeout = setTimeout(function () {
       // console.log('Input Value:', textInput.value);
	   if(textInput.value !=""){
	   checkClock(textInput.value);
	   }
    }, 500);
};


function checkClock(str){

$("#clockInfo").fadeIn().html('<span style="font-size:15px;position:absolute" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

 $.ajax({
type: "POST",
url: "<?=base_url('zona_franca/checkClock')?>",
data: {clock:str},
success:function(data){
$("#clockInfo").html(data);
},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#clockInfo").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});




};
 </script>