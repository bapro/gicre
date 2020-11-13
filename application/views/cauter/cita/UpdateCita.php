<?php $name=($this->session->userdata['cauter_name']);
  ?>

<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<?php
foreach($FindCita as $edit_cit)

?>
<h3 class="modal-title">Edita Cita : <?=$edit_cit->nec?></h3>

</div>
<div   id="background_" >
<br/>
<div id="userText" class="form-horizontal"  > 
<form method="post"  action="<?php echo site_url("cauter/saveUpdateCita");?>">
<input type="hidden" name="update_by" value="<?=$name?>"/>
<input type="hidden" name="id_patient" value="<?=$edit_cit->id_patient?>">
<input type="hidden" name="id_cita" value="<?=$edit_cit->id_apoint?>">
<input type="hidden" name="nec" value="<?=$edit_cit->nec?>"/>
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6">
<select class="form-control select2"     name="causa" id="causa" >
<?php
foreach($causa as $ca){
	
	if($edit_cit->causa == $ca->id) {
		echo "<option value=".$ca->id." selected>".$ca->title."</option>";
	} else {
		echo "<option value=".$ca->id.">".$ca->title."</option>";
	}
}
?>
</select>
</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-6">
<select class="form-control select2"    id="especialidad" name="especialidad"  onChange="getDoc(this.value);" >
<?php
foreach($especialidades as $esp){
	
	if($edit_cit->area == $esp->id_ar) {
		echo "<option value=".$esp->id_ar." selected>".$esp->title_area."</option>";
	} else {
		echo "<option value=".$esp->id_ar.">".$esp->title_area."</option>";
	}
}
?>
 </select>
</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">
 <span id="hide_this_on_change">
<?php
$medico=$this->db->select('name')->where('id_user',$edit_cit->doctor)->get('users')->row('name');

$sql ="SELECT first_name FROM doctors where area=$edit_cit->area";
$query = $this->db->query($sql);

?>

</span>
 <span id="show_this_on_change" style="display:">
<select class="form-control select2"  name="doctor" id="doctor_dropdown2"  >
<?php
foreach($query->result() as $doc)
{
$medico1=$this->db->select('name')->where('id_user',$doc->first_name)->get('users')->row('name');

if($edit_cit->doctor == $doc->first_name)
{
echo "<option value=".$edit_cit->doctor." selected>".$medico1."</option>";
} 
else
{
echo "<option value=".$doc->first_name.">".$medico1."</option>";

}
}
?>
</select>
</span>
</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" >Fecha propuesta <span class="req">*</span></label>
<div class="col-sm-6">
<div class="input-group date form_pro col-md-12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">
<input type="text" class="form-control" id="fecha_propuesta" name="fecha_propuesta" value="<?=$edit_cit->fecha_propuesta?>" readonly>
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span><br/>
</div>
<input type="hidden" name="fecha_filter" id="mirror_pro" value="" readonly />
</div>
</div>

 <button type="submit" style="margin-left:154px" class="btn btn-primary btn-sm" ><i class="fa fa-floppy-o" aria-hidden="true"  ></i> Guardar </button>
<br/><br/>
 </form>
</div>
</div>

<script>

function getDoc(val) {
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('cauter/get_doc');?>',
	data:'id_esp='+val,
	success: function(data){
	$("#doctor_dropdown2").html(data);
	
	},
	});
}

 $('.select2').select2({ 
  placeholder: "SELECCIONAR",
   tags: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});

  $.fn.modal.Constructor.prototype.enforceFocus = function () {
        $(document)
        .off('focusin.bs.modal') // guard against infinite focus loop
        .on('focusin.bs.modal', $.proxy(function (e) {
            if (this.$element[0] !== e.target && !this.$element.has(e.target).length && !$(e.target).closest('.select2-dropdown').length) {
                this.$element.trigger('focus')
            }
        }, this))
    }
	
	
			$('.form_pro').datetimepicker({
      language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		format: "dd MM yyyy - hh:ii:s",
        linkField: "mirror_pro",
        linkFormat: "yyyy-mm-dd",
		 startDate: "1900-01-01"
    });
	$(".form_pro").datetimepicker( "setDate", new Date());

//------------------display especialidad by doctor---------------



$('#especialidad').on('change', function(event){
$('#doctor_dropdown2').val("").trigger('change');
var especialidad = $(this).val();
$.ajax({
url: '<?php echo site_url('cauter/get_doc');?>',
type: 'post',
data:'id_esp='+especialidad,
success: function (data) {

$("#doctor_dropdown2").html(data);

}

});
});
</script>