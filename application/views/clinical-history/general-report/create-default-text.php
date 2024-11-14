 <section class="py-3">
        <div class="container">
           

            <div class="card">
					
			   <div class="card-body">
			   <h2 class="card-text">Crear Reporte General Por Defecto</h2>
			   <hr>
			<form  id="save-patient-cita" method="post" >

			<div class="row">
			<div class="col-md-6">
			<label class="form-label">Seleccionar El Nombre Del Reporte <span
			class="text-danger">*</span></label>
			<select class="form-select" name="report-name" id="report-name" >
			<option></option>
			</select>


			</div>
			<div class="col-md-9 mb-2">
			<br>
			<label class="form-label">Escribir Texto Por Defecto<span
			class="text-danger">*</span></label>
			
			<em id="onchange-select"></em>
		<div  id="quill-editor-default-text-gr" class="border  rounded-2 quill-text" style="height:600px"></div>
			<!--<textarea class="form-control" style="height:400px"></textarea>-->
			</div>
			

			<div class="d-flex">
			<div class="flex-fill pt-2">
			<button class="btn btn-primary" type="button" id="saveTextName"><i class="fa fa-save"></i>
				CREAR </button> <span id="saveTxt"></span>	
			
			</div>
			
			</div>

			</form>
                </div>
            </div>
			<input id="isEmpt" type="hidden" value="0" />
        </div>
    </section>
	
	<script>
	var id_enf_act  = 0;
	</script>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url();?>assets_new/vendor/quill/quill.min.js?rnd=<?= time() ?>"></script>
   <script src="<?= base_url();?>assets_new/js/create-quill.js?rnd=<?= time() ?>" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script>
$(document).ready(function() {
	
var dataName;
	 dataName = [
	<?php 
				foreach($query->result() as $row) {
					$id_name= $this->clinical_history->select('id_name')->where('id_name', $row->id)->get('hc_reporte_general_default_text')->row('id_name');	
					if($id_name){
					$limed="<i class='bi bi-asterisk text-danger'></i>";
					}else{
					$limed="";
					}?>
					{
   id: "<?=$row->id?>",
   text: "<?=$row->name?>",
   html: "<?=$limed?> <?=$row->name?>",
},
				<?php }
				
				
				
				foreach($query2->result() as $row2) {
					$id_name= $this->clinical_history->select('id_name')->where('id_name', $row2->id)->get('hc_reporte_general_default_text')->row('id_name');	
					if($id_name){
					$limed="<i class='bi bi-asterisk text-danger'></i>";
					}else{
					$limed="";
					}?>
					{
   id: "<?=$row2->id?>",
   text: "<?=$row2->name?>",
   html: "<?=$limed?> <?=$row2->name?>",
},
				<?php }
	?>
	
];
function template(dataName) {
	return dataName.html;
}	
$('.form-select').select2({
	
 language: {
      noResults: function() {
		
        return '<button  type="button" class="btn btn-primary btn-sm" onclick="noResultsButtonClicked()">Agregar</button>';
      },
    },
theme: 'bootstrap-5',
width: '100%',
data: dataName,
templateResult: template,
escapeMarkup: function(markup) {
    return markup;
  }
});




 var quillDtGr = new Quill($("#quill-editor-default-text-gr").get(0), 
		optionsQuillEditor,
		);


$('#report-name').on('change', function(){ 
var textContent;

$.ajax({
url:"<?php echo base_url(); ?>modal_report_general/searchText",
method:"POST",
data:{textNameId:$(this).val()},
dataType: 'json',
beforeSend: function(){
$('#onchange-select').addClass('fa fa-spinner').css("font-size", "9px");

},
success:function(response){
	$('#onchange-select').removeClass('fa fa-spinner').css("font-size", "9px");;
textContent = quillDtGr.clipboard.convert(response.message);
quillDtGr.setContents(textContent);
$('#isEmpt').val(response.status);
$('#saveTxt').html('');
},

});

});


$('#saveTextName').on('click', function(e){ 
e.preventDefault();

var textTEXT = quillDtGr.root.innerText;
var textHTML =quillDtGr.root.innerHTML;

if($('#report-name').val()=="" || quillDtGr.getLength()==1){
	alert('Los campos no deben ser vacillos');
}else{
$.ajax({
url:"<?php echo base_url(); ?>modal_report_general/saveTextName",
method:"POST",
data:{textNameId:$('#report-name').val(), textName:textHTML, action:$('#isEmpt').val()},
dataType: 'json',
beforeSend: function(){
	$('#saveTextName').prop('disabled', true);
$('#saveTxt').html('Espera...');

},
success:function(response){
	
	$('#saveTxt').html(response.message).removeClass('fa fa-spinner');
	$('#saveTextName').prop('disabled', false);

},

});
}
});


		
});

function noResultsButtonClicked() {
	
	
  $.ajax({
url:"<?php echo base_url(); ?>modal_report_general/create_new_name",
method:"POST",
data:{reportGeneralName:$('.select2-search__field')[0].value},
//dataType: 'json',

success:function(data){
	
location.reload();
},

});
}
</script>

	

	 
</body>

</html>