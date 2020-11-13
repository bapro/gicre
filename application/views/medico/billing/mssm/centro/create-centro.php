<style>

.pter {pointer-events:none;}
td,th{text-align:left;}

.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}



</style>

  <div class="container">
   <span id="result"></span>
 <span class="loadf"></span>
 <div class="row">
<div class="col-md-12" >
 <h2 class="h2" align="center" style="color:#38a7bb">MANTENIMIENTO DE SERVICOS POR CENTRO MEDICO</h2>
  <hr id="hr_ad"/>
 </div>
  <div class="col-md-12">
<div class="col-lg-3" style="font-size:17px"><strong>Busqueda de tarifarios </strong></div> 
<br/><br/>
 </div>

 <div class="col-lg-12 searchb">

<div class="col-lg-5">
<label class="control-label">Seleccione un centro medico</label>


<select class="form-control select2" id="id_centro">
<option value="" hidden></option>
<?php 

//foreach($tarif_cat as $row)
foreach($all_medical_centers as $row)
{ 
?>
<option value="<?=$row->id_m_c?>"><?=$row->name?></option>
<?php
}
?>
</select>
<br/>
<br/>
</div>

<br/><br/>
</div>
</div>
 <hr id="hr_ad"/>
<div id="search_by_centro_result"></div>

</div>
<br/><br/>
</div>
 <?php
        $this->load->view('footer');
 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>

<script>

$('.select2').select2({
	 width: '100%',
 placeholder: "SELECCIONAR",
    allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});	


//==================================================

 $('#id_centro').on('change', function () {
$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id_centro  = $(this).val();
var user_name  = "<?=$name?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin/display_tarif_centro_categoria');?>',
data:{id_centro:id_centro,user_name:user_name},
success: function(data){
$(".loadf").hide();
$("#search_by_centro_result").html(data);
},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

});
});


</script>

</html>