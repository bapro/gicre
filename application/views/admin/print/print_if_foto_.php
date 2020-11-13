<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title>ADMEDICALL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

td,th{text-align:left}

</style>
</head>

<div  class="container" id="background_">
<div class="row" >
<div class="col-md-6  col-md-offset-3">
<h1><i class="fa fa-print"></i> IMPRIMIR</h1>
<span class="radio">
<input type="radio" name="foto" class="foto" value="1"> Con la foto
</span>
<span class="radio">
<input type="radio" name="foto" class="foto" value="0" > Sin la foto
</span>
 </div>
 </div>
 </div>

 
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
 <script>

  
 $(function() {
    $('.foto:not(:checked)').on('change', function() {
        //window.location.href = "http://www.example.com?variable=" + this.value;
		var historial_id=<?=$historial_id?>;
		var id=<?=$id?>;
		var area=<?=$area?>;
		var user='<?=$user?>';
		var url;
		if(user=='lab'){
		url = "<?php echo base_url(); ?>printings/print_laboratorios?historial_id="+historial_id+"&area="+id+"&user="+area+"&val="+this.value;	
		}else if(user=='rec'){
		url = "<?php echo base_url(); ?>printings/print_recetas?historial_id="+historial_id+"&val="+this.value;		
		}else if(user=='gnl'){
		url = "<?php echo base_url(); ?>printings/print_ant_gnrl?historial_id="+historial_id+"&val="+this.value;	
		}
		
		else if(user=='enf'){
		url = "<?php echo base_url(); ?>printings/print_enf_act?historial_id="+historial_id+"&val="+this.value;	
		}
		
		
		else if(user=='diag'){
		url = "<?php echo base_url(); ?>printings/print_conc_d?historial_id="+historial_id+"&val="+this.value;	
		}
		
		else if(user=='examfis'){
		url = "<?php echo base_url(); ?>printings/print_exa_f?historial_id="+historial_id+"&val="+this.value;	
		}
		else if(user=='ssr'){
		url = "<?php echo base_url(); ?>printings/print_ssr?historial_id="+historial_id+"&val="+this.value;	
		}
		
		
		else if(user=='rehab'){
		url = "<?php echo base_url(); ?>printings/print_rehab?historial_id="+historial_id+"&val="+this.value;	
		}
		
			else if(user=='obs'){
		url = "<?php echo base_url(); ?>printings/print_ant_obs?historial_id="+historial_id+"&val="+this.value;	
		}
		
		else if(user=='ofal'){
		url = "<?php echo base_url(); ?>printings/oftal?historial_id="+historial_id+"&val="+this.value;	
		}
		
		
		else if(user=='sis'){
		url = "<?php echo base_url(); ?>printings/print_exam_sis?historial_id="+historial_id+"&val="+this.value;	
		}
		
		else if(user=='contp'){
		url = "<?php echo base_url(); ?>printings/print_cont_p?historial_id="+historial_id+"&val="+this.value;	
		}

		else if(user=='alerg'){
		url = "<?php echo base_url(); ?>printings/print_alerg?historial_id="+historial_id+"&val="+this.value;	
		}

        else if(user=='examfisoto'){
		url = "<?php echo base_url(); ?>printings/exmen_fisico_otorrino?historial_id="+historial_id+"&val="+this.value;	
		}

	   else if(user=='diag_p_f'){
		url = "<?php echo base_url(); ?>printings/diag_p_f?historial_id="+historial_id+"&val="+this.value;	
		}
	   else if(user=='ofal_ref'){
		url = "<?php echo base_url(); ?>printings/ofal_ref?historial_id="+historial_id+"&val="+this.value;	
		}
		else if(user=='ofal_ref_'){
		url = "<?php echo base_url(); ?>printings/ofal_ref_?historial_id="+historial_id+"&val="+this.value;	
		}
		else if(user=='ofal_ref_h'){
		url = "<?php echo base_url(); ?>printings/ofal_ref_h?historial_id="+historial_id+"&val="+this.value;	
		}
		
		else {
        url = "<?php echo base_url(); ?>printings/print_estudios?historial_id="+historial_id+"&id="+id+"&area="+area+"&user="+user+"&val="+this.value;
		}
	   
	   
	   window.location.href=url;
	   
	 
		
    });
});
  </script>