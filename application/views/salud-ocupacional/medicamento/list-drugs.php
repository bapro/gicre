
<select class="form-control id_med"   name="id_med" >
<option value=""></option>
<?php
foreach($querymed->result() as $rw){
 $fecha = date("d-m-Y", strtotime($rw->expired));
		echo "<option value=".$rw->id.">".$rw->med." --- (expired date: ".$fecha.")</option>";
	}

?>
</select>



<script>

 $('.id_med').select2({ 
  placeholder: "SELECCIONAR",
    tags: true
 
});


$('.id_med').on('change', function(event){
  event.preventDefault();
   $('#drug-title').html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
  $.ajax({
  url: "<?php echo site_url('salud_ocupacional_med/updateDrug');?>",
   method:"POST",
   dataType:"json",
   data:{id:$(this).val()},
   success:function(data)
   {
	  $('#drug-title').html("Update drug #"+ data.id_drug);
	  $('#med_drug').val(data.med_drug);
	  $('#med_present').val(data.med_present);
	  $('#med_amount').val(data.med_amount);
	  $('#amt_available').val(data.med_amount);
	  $('#med_expired').val(data.med_expired);
	  $('#drug_id').val(data.id_drug);
	  $('#is_expired').val(data.is_expired);
	  //$('#info_drug').html(data.info);
	 
    
   },
 
  })
  });
</script>