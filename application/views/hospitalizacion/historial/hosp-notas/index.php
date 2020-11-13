<style>
.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width8 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }

}

</style>


<div class="modal-header text-center"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<div class='result'></div>
<h2 class="modal-title">NOTAS</h2>
</div>

<div class="modal-body" style="max-height: calc(150vh - 210px); overflow-y: auto;" id='background_'>

<div class="col-md-12"  >

<?php
$this->load->view('hospitalizacion/historial/header-patient-data');
?>
<br/>
<div id='paginateSignosVitalesN'></div>
<br/>
<div id="content-signo-vitalesN"></div>
<div class="hide-signo-vitales-n">


<?php
  $this->load->view('admin/emergencia/general/signo-vitales');
  ?>
 </div>
 <div id="content-signo-vitales-n"> </div>
</div>
<div class="col-md-4 hide-signo-vitales-n"  >
<div class="form-group">
  <button  class="btn btn-md btn-success" id="save_exam_fisp"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button> <span  class='resultSolInt'></span>
</div>
</div>
<script type="text/javascript">


	$(".<?=$idg?>searchNombreNota").keyup(function(){
		$.ajax({
		type: "POST",
	url:"<?php echo base_url(); ?>hospitalizacion/getNotaName",
		data:{keyword:$(this).val(),edit:1},
    beforeSend: function(){
			$(".<?=$idg?>searchNombreNota").css("background","#DCDCDC");
		},
	success: function(data){
			$(".<?=$idg?>suggesstion-box").show();
			$(".<?=$idg?>suggesstion-box").html(data);
      $(".<?=$idg?>searchNombreNota").css("background","");
		},
  		});
	});

//To select country name
function selectNotaName1(val) {
$(".<?=$idg?>searchNombreNota").val(val);
$(".<?=$idg?>suggesstion-box").hide();
}


//-----------paginate-------------------------
function paginateSignosVitalesN(){
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/paginateSignosVitales",
data: {user_id:<?=$user_id?>,id_historial:<?=$patient_id?>},
method:"POST",
success:function(data){

$('#paginateSignosVitalesN').html(data);
},

});
}

paginateSignosVitalesN();




$('#save_exam_fisp').on('click', function(event) {
event.preventDefault();
 //------Signos vitales--------------------------
var peso = $("#<?=$idg?>peso").val();
var kg = $("#<?=$idg?>kg").val();
var talla = $("#<?=$idg?>talla").val();
var imc = $("#<?=$idg?>imce").val();
var ta = $("#<?=$idg?>ta").val();
var fr = $("#<?=$idg?>fr").val();
var fc = $("#<?=$idg?>fce").val();
var hg = $("#<?=$idg?>hg").val();
var tempo = $("#<?=$idg?>tempo").val();
var pulso = $("#<?=$idg?>pulso").val();
var glicemia = $("#<?=$idg?>glicemia").val();
var radio_signo= $("input[name='<?=$idg?>radio_signo']:checked").val();
var fcf = $("#<?=$idg?>fcf").val();
var satoe = $("#<?=$idg?>satoe").val();
var hallazgo = $("#<?=$idg?>hallazgo").val();
var nombre_nota = $("#<?=$idg?>searchNombreNota").val();
if(nombre_nota !='' && hallazgo !=''){
$(".resultSolInt").fadeIn().html('guardando...').css('font-style','italic').css('color','gray');
$.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/saveUpExamenFisico')?>",
data: {updated_by:<?=$user_id?>,patient_id:<?=$patient_id?>,fcf:fcf,satoe:satoe,hallazgo:hallazgo,
peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,who:0,
tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemiae:glicemia,nombre_nota:nombre_nota
},

success:function(data){
 $(".resultSolInt").html('hecho').css('color','green').delay( 1000 ).hide(0);
$('#save_exam_fisp').prop('disabled',true);
paginateSignosVitalesN();
$('#save_exam_fisp').prop('disabled',false);

},

});
}else{
$(".resultSolInt").fadeIn().html('falta info...').css('font-style','italic').css('color','red');	
}
});


	</script>
