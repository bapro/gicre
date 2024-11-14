		 <h5><strong>DATOS ACTA DE NACIMIENTO <u><?=$hay_acto?></u></strong></h5>
		 <?php 
		  if($query->result() !=NULL){
		 foreach ($query->result() as $rowActa)
		 $id_acta=$rowActa->id;
		 $acta_mun_dis=$rowActa->acta_mun_dis;
		 $acta_num_of=$rowActa->acta_num_of;
		 $acta_mun_libro=$rowActa->acta_mun_libro;
		 $acta_mun_folio=$rowActa->acta_mun_folio;
		 $acta_mun_acta=$rowActa->acta_mun_acta;
		 $ano_libro=$rowActa->ano_libro;
		 $working=$rowActa->working;
		 $acta_num_seg_social=$rowActa->acta_num_seg_social;
		 $acta_fact_riesg=$rowActa->acta_fact_riesg;
		 $escolaridad=$rowActa->escolaridad;
		 $trabaja=$rowActa->trabaja;
		 $afiliado_sdss=$rowActa->afiliado_sdss;
		 $fecha_de_ingreso_nacio=$rowActa->fecha_de_ingreso_nacio;
		 $fecha_de_egreso_salio=$rowActa->fecha_de_egreso_salio;
		 $fecha_de_ingreso_llego=$rowActa->fecha_de_ingreso_llego;
		 $fecha_de_egreso_murio=$rowActa->fecha_de_egreso_murio;
		 }else{
		 $id_acta="";
		 $acta_mun_dis="";	 
		 $acta_num_of="";	
		 $acta_mun_libro="";	
		 $acta_mun_folio="";	
		 $acta_mun_acta="";	
		 $ano_libro="";	
		 $working="";	
		 $acta_num_seg_social="";	
		 $acta_fact_riesg="";
         $escolaridad="";
         $trabaja="";	
		$afiliado_sdss="";	
		$fecha_de_ingreso_nacio="";
		$fecha_de_egreso_salio="";
		$fecha_de_ingreso_llego="";
		$fecha_de_egreso_murio="";   
		 }
		 ?>
	<form class="form-horizontal" id="save-acta" method="POST">
	    <div class="col-md-6">
	<input name="id_acta" value="<?=$id_acta?>" type="hidden" />
	 <div class="form-horizontal" >
  
     <div class="form-group">
      <label class="control-label col-sm-4" >Municipio Distrito:</label>
      <div class="col-sm-8">  
        <input type="text" class="form-control" name="acta_mun_dis" value="<?=$acta_mun_dis?>"  >
      </div>
    </div>
	  <div class="form-group">
      <label class="control-label col-sm-4" >Numero Oficialia:</label>
      <div class="col-sm-8">          
       <input type="text" class="form-control" name="acta_num_of" value="<?=$acta_num_of?>"  >
      </div>
    </div>
	  <div class="form-group">
      <label class="control-label col-sm-4" >Numero De Libro:</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" name="acta_mun_libro" value="<?= $acta_mun_libro ?>"  >
      </div>
    </div>
   
  </div>
   
   </div> 
 <div class="col-md-6">
	
	 <div class="form-horizontal" >
  
     <div class="form-group">
      <label class="control-label col-sm-4" >Numero De Folio:</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" name="acta_mun_folio" value="<?=$acta_mun_folio ?>"  >
      </div>
    </div>
	  <div class="form-group">
      <label class="control-label col-sm-4" >Numero De Acta:</label>
      <div class="col-sm-8">          
       <input type="text" class="form-control"  name="acta_mun_acta" value="<?= $acta_mun_acta ?>"  >
      </div>
    </div>
	  <div class="form-group">
      <label class="control-label col-sm-4" >Año Libro:</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" name="ano_libro"  value="<?= $ano_libro ?>"  >
      </div>
    </div>
   
  </div>

   </div> 
   <div class="col-md-3">
    <strong>ESCOLARIDAD</strong> 
 <div class="form-inline">
 
  <div class="radio-inline">
    <label>
<?php
if($escolaridad =="si"){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' name='escolaridad' value='si' $selected /> si";
?>
  </label>
  </div>
  <div class="radio-inline">
    <label for="option2">
	<?php
	if($escolaridad =="no"){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' name='escolaridad' value='no' $selected /> no";
?>

    </label>
  </div>
    </div>
	 </div>
	 
	   <div class="col-md-4">
    <strong>TRABAJA</strong> 
 <div class="form-inline">
 
  <div class="radio-inline">
    <label>
	<?php
if($trabaja =="si"){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' name='trabaja' value='si' $selected /> si";
?>
    </label>
  </div>
  <div class="radio-inline">
    <label>
		<?php
if($trabaja =="no"){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' name='trabaja' value='no' $selected /> no";
?>

    </label>
  </div>
    </div>
	 <div class="form-group"  >
      <label class="control-label col-sm-2" >Donde Trabaja?</label>
      <div class="col-sm-10">          
        <textarea class="form-control" id="working" name="working" placeholder="Nombre de la impresa o negocio"><?= $working ?> </textarea>
      </div>
    </div>
	
	
	 </div>
	 
	   <div class="col-md-3">
    <strong>AFILIADO SDSS</strong> 
 <div class="form-inline">
 
  <div class="radio-inline">
    <label for="option1">
		<?php
if($afiliado_sdss =="si"){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' name='afiliado_sdss' value='si' $selected /> si";
?>
    </label>
  </div>
  <div class="radio-inline">
    <label for="option2">
			<?php
if($afiliado_sdss =="no"){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' name='afiliado_sdss' value='no' $selected /> si";
?>

    </label>
  </div>
    </div>
	
	 </div>
	  <div class="col-md-5">
	 <div class="form-group">
      <label class="control-label col-sm-3" >Num. De Seguridad Social:</label>
      <div class="col-sm-9">          
        <input class="form-control" name="acta_num_seg_social" value="<?= $acta_num_seg_social ?>"  />
      </div>
    </div>
	  </div>
	    <div class="col-md-6">
		 <div class="form-group">
      <label class="control-label col-sm-5" >Factores de Riesgos Enfermedades Discapacidad:</label>
      <div class="col-sm-7">          
        <textarea class="form-control" rows="6" name="acta_fact_riesg"><?= $acta_fact_riesg ?> </textarea>
      </div>
    </div>
		</div>
		
		 <div class="col-md-3">
		  <strong>FECHA DE INGRESO</strong> 
		<div class="form-group"  >
		<label class="control-label col-sm-2" >Nació</label>
		<div class="col-sm-9">          
		<input type="text" class="form-control dateInsert"  name="fecha_de_ingreso_nacio"  value="<?=$fecha_de_ingreso_nacio?>">
		</div>
		</div>

		<div class="form-group"  >
		<label class="control-label col-sm-2" >Llegó</label>
		<div class="col-sm-9">          
		<input type="text" class="form-control dateInsert" name="fecha_de_ingreso_llego" value="<?=$fecha_de_ingreso_llego?>">
		</div>
		</div>  

		</div>
		
		 <div class="col-md-3">
		 
		 <strong>FECHA DE EGRESO</strong> 
		 		<div class="form-group"  >
		<label class="control-label col-sm-2" >Salió</label>
		<div class="col-sm-9">          
		<input type="text" class="form-control dateInsert"  name="fecha_de_egreso_salio" value="<?=$fecha_de_egreso_salio?>">
		</div>
		</div>

		<div class="form-group"  >
		<label class="control-label col-sm-2" >Murió</label>
		<div class="col-sm-9">          
		<input type="text" class="form-control dateInsert" name="fecha_de_egreso_murio" value="<?=$fecha_de_egreso_murio?>">
		</div>
		</div>  

		</div>
		<div class="col-md-12">
		 <button type="submit" class="btn btn-primary  btn-sm" id="acta-fue-agregada">AGREAR ACTA <?=$hay_acto?>  </button>
		 <div id="result-acta"></div>
		  <input id="ifMemberAsBirthCertificate" name="id_member" id="id_member" value="<?=$id_member?>" type="hidden"/>
		    <input id="ifMemberAsBirthCertificate" name="id_jefe" value="<?=$id_jefe?>" type="hidden"/>
		    <input  name="tiene_acta"  value="si" type="hidden"/>
		 </div>
		
		 </form>
		<script>
		   $("input[name='trabaja']").change(function(){
			 var option = $(this).val();
             if(option =="si"){			 
			   $("#working").prop("disabled", false);
			 }else{
				 $("#working").prop("disabled", true); 
			 }
			});
			
			
			
$('#save-acta').on('submit', function (e) {
	e.preventDefault();
$.ajax({
url: "<?=base_url('search/saveActaData')?>", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(response)   // A function to be called if request succeeds
{
if(response.status == 1){
$('#result-acta').html('<p class="alert alert-warning">'+response.message+'</p>');
$('#working').focus();
} else{
	$('#result-acta').html('<p class="alert alert-success">'+response.message+'</p>');
	$('#acta-fue-agregada').prop("disabled", true);
}
},
 
});
});
		</script>