<span id="scroll_do"></span>
<div  class="container">
<h5 style="color:green" >TARIFARIOS POR  SEGURO </h5>
<span class="loadf"></span>


<?php 

foreach($results as $rw)
$seguro=$this->db->select('id_sm,title,logo')->where('id_sm',$rw->id_seguro)
->get('seguro_medico')->row_array();


$categoria=$this->db->select('title_area')->where('id_ar',$rw->id_categoria)
->get('areas')->row('title_area');

$codigo_contrato=$this->db->select('codigo')->where('id_seguro',$rw->id_seguro)
->get('codigo_contrato')->row('codigo');

$medico=$this->db->select('name')->where('id_user',$rw->id_doctor)
->get('users')->row('name');
 ?>


<div id="constant_l_s" class="col-md-3" style="height:600px;overflow-y:auto">

</div>
<div class="col-md-9 table-responsive" style="border:1px solid #38a7bb;height:850px;background:rgb(242,242,242)">
<br/>
<select class="form-control select2 "  id="seguro-more" >


</select>
<h2 style="color:green;text-transform:uppercase"  >MEDICO <?=$medico?></h2>
 <hr id="hr_ad"/>
<div id="show_other" ><span class="alert alert-info" >Los tarifarios se muestran aqui.<span></div>
</div>

</div>
<div class="modal fade" id="edit_tarifario" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-body">
</div>
</div>
</div>
</div>
<div class="modal fade" id="EditSeguroMedico"  tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>
<script>

$('#seguro-more').on('change', function(event) {
var id_seguro = $(this).val();
idPlan=0;
launchMe(id_seguro,idPlan);

});


load_doc_seguro()

function load_doc_seguro(){
	
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/load_doc_seguro')?>",
data: {id_doctor:<?=$id_doctor?>},
 success:function(data){
$('#seguro-more').html(data);
},

});	
	
	
}



$('.select2').select2({
placeholder: "SUBIR FACTURAS POR OTRO SEGURO ASIGNADO AL DOCTOR",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});
constant_load_seguro();



function constant_load_seguro(){
$('#constant_l_s').text('Cargando los seguros...');
var user=<?=$user_name?>;
var id_doctor=<?=$id_doctor?>;
var id_seguro=<?=$id_seguro_medico?>;
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/constant_load_seguro')?>",
data: {user:user,id_doctor:id_doctor,id_seguro:id_seguro},
 success:function(data){
$('#constant_l_s').html(data);
    $('html, body').animate({
        scrollTop: $("#scroll_do").offset().top
    }, 1000);
}

});
}



	

//=====================================================================

$( document ).ready(function() {
$('#EditSeguroMedico').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
});


</script>

