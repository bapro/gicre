
<input type="hidden" id="id_user" value="<?=$user_id?>" > 
<input type="hidden" id="id_patient" value="<?=$id_historial?>" > 
<input type="hidden" id="id_centro" value="<?=$centro_medico?>" > 
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h4 class="h3 his_med_title">COLPOSCOPIA</h4>

</div>
<div class="modal-body" id="background_">
 <div class="container" style='  height: 600px;overflow-y: scroll;'>
 <div class="row">
  
  

  <hr class="prenatal-separator"/>

<form class="form-horizontal" method="post">

<div class="col-md-12">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#datos-pers-hal">DATOS PERSONALES Y HALLAZGOS</a></li>
  <li><a  data-toggle="tab" href="#vulvoscopia">VULVOSCOPIA</a></li>
  
 </ul>
 <div class="tab-content grand-total-turno">
 
 <div  id="datos-pers-hal" class="active tab-pane fade in">

 <div id="paginationNumberColcoscopy"></div>

<div id="colcoscopyContentDatosPersonales"></div>

</div>
 <div  id="vulvoscopia" class="tab-pane fade in">
 <div id="paginateVulvoscopia"></div>
<div id="vulvoscopiaContent"></div>

</div>
  </div>
    </div>
   
 </form>

</div>
</div>

</div>

<script>
function paginateColcoscopia() {

$.ajax({
url: "<?php echo site_url('colcoscopy_content/paginateColcoscopy');?>",
type: 'post',
data:{id_user:<?=$user_id?>, id_patient:<?=$id_historial?>, id_centro:<?=$centro_medico?>},
success: function (data) {
$("#paginationNumberColcoscopy").html(data);

},
});
}
paginateColcoscopia();
colcoscopyContentDatosPersonales();

function colcoscopyContentDatosPersonales() {

$.ajax({
url: "<?php echo site_url('colcoscopy_content/colcoscopyContentDatosPersonales');?>",
type: 'post',
data:{id_user:<?=$user_id?>, id_patient:<?=$id_historial?>, id_centro:<?=$centro_medico?>},
success: function (data) {
$("#colcoscopyContentDatosPersonales").html(data);

},
});
}


function vulvoscopiaContent() {

$.ajax({
url: "<?php echo site_url('colcoscopy_content/vulvoscopiaContent');?>",
type: 'post',
data:{id_user:<?=$user_id?>, id_patient:<?=$id_historial?>, id_centro:<?=$centro_medico?>},
success: function (data) {
$("#vulvoscopiaContent").html(data);

},
});
}

vulvoscopiaContent();

function paginateVulvoscopia() {

$.ajax({
url: "<?php echo site_url('colcoscopy_content/paginateVulvoscopia');?>",
type: 'post',
data:{id_user:<?=$user_id?>, id_patient:<?=$id_historial?>, id_centro:<?=$centro_medico?>},
success: function (data) {
$("#paginateVulvoscopia").html(data);

},
});
}
paginateVulvoscopia();

</script>
