<?php
        $this->load->view('admin/header_patient');
		$this->load->view('admin/search_patient');
 ?>
 
<div class="col-md-9 " id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<h3 class="h3 hide_crear_nueva_cita">Crear Nueva Cita</h3>
<span class="missingc" style="display:none;color:red">La pestaña <b>DATOS CITAS</b> tiene campos obligatorios.</span>
<span class="missingdp" style="display:none;color:red">La pestaña <b>DATOS PERSONALES</b> tiene campos obligatorios.</span>

<hr class="rem-hr" id="hr_ad"/>
<!-- Tab panes -->
  <?php $this->load->view('admin/formCita');?>
 </div><!--row background_ end -->
 </div><!--container-->
 </div>
 <br/> <br/>
 <?php
        $this->load->view('footer');
 ?>
   </body>

 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
 <script src="<?=base_url();?>assets/js/links_select.js"></script> 
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
 
<script>

//--------------------------------------------------
$(document).on("input", ".patient-nec", function() {
    this.value = this.value.replace(/\D/g,'');
});
/*display inputs*/
$("#button_cedula").on('click', function (e) {
	$(".flash-search").fadeIn(400).html('<span class="load" >buscando... <img  src="<?= base_url();?>assets/img/loading.gif" /></span>');

    e.preventDefault();
    $.ajax({
		url: '<?php echo site_url('admin/getPatientByCedula');?>',
        type: 'post',
        
		data:'patient_cedula='+$(".patient-cedula").val(),
        success: function (data) {
			$(".flash-search").hide();
              		 $("#show_patient_by_cedula").html(data);
					 $("#show_patient_by_cedula").show();
					  $("#no_cedulad_found").html(data);
					   $(".missingc").hide();
					    $(".missingdp").hide();
					  
		  }
		
    });
});
//---------------
//display inputs
$("#seguro_medico").on('change', function (e) {
    e.preventDefault();
    $.ajax({
		url: '<?php echo site_url('admin/seguro_name');?>',
        type: 'post',
        
		data:'seguro_medico='+$("#seguro_medico").val(),
        success: function (data) {
              		 $("#seguro_input").html(data);
        }
		
    });
});
//-----show patient by nec
$("#load_nec").on('change', function () {
 $(".load_nec").fadeIn(400).html('<span class="load"  > <img style="width:50px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

});
$("#load_name").on('change', function () {
 $(".load_nec").fadeIn(400).html('<span class="load"  > <img style="width:50px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

});
</script>

</html>