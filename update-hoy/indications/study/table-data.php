
<table class="table table-striped table-sm" id="ind-study-data">
<thead>
 <tr>
    <th scope="col">#</th>
    <th scope="col">Fecha</th>
    <th scope="col">Estudios</th>
    <th scope="col">Parte del cuerpo</th>
    <th scope="col">Lateralidad</th>
    <th scope="col">Nota</th>
    <th scope="col">Operator</th>
    <th scope="col">&#128438; </th>
    <th scope="col" >Acciones</th>
   <!-- <th scope="col" colspan="2">Eliminar</th>-->
  </tr>
</thead>

</table>

<div class="modal fade" id="editIndEst" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar estudio</h4>
         
            <button type="button" class="btn btn-primary p-2">   <i class="bi bi-printer"></i></button>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="min-height: 1500px;">
       
  <div class="card-body">
     <div class="card">

   
        </div>

</div>
</div>
</div>
</div>
</div>
	<input type="hidden" value="<?=$historial_id?>" id="id_patient_est" />
<script>

$(document).ready(function(){

    $(document).on('click', '.update-this-study ', function(){  
           assignStudyToForm($(this).attr("id"), $(this).attr("id"));
       });

   $(document).on('click', '.copy-this-study ', function(){  
           assignStudyToForm($(this).attr("id"), 0);

 });


    function assignStudyToForm(idQueryTable, idRegistro){
          
           $.ajax({  
                url:"<?php echo base_url(); ?>h_c_indication_study/fetch_single_estudio",  
                method:"POST",  
                data:{id:idQueryTable},  
                dataType:"json",  
                success:function(data)  
                {   
                     $('#floatingIndEst').val(data.estudio);  
                     $('#floatingIndBody').val(data.cuerpo); 
                     $('#floatingIndLat').val(data.lateralidad);
                     $('#floatingIndObs').val(data.observacion); 
                     $('#id_ind_study').val(idRegistro);  
                     $('#resetIndEst').show(); 
                    $('html, body').animate({
                    scrollTop: $("#scroll_to_ind_study").offset().top
                    },0);
                     //$('#user_uploaded_image').html(data.user_image);  
                      
                }  
           })  
      }

 


$('#ind-study-data').DataTable({
    "ajax": {
        url :"<?php echo base_url(); ?>h_c_indication_study/study_list",
        type :'GET',
        'data': {
				 id_patient: $("#id_patient_est").val()

              },
    },
	order: [[0, 'desc']],
// 	"aLengthMenu": [
//     [25, 50, 100, 200, -1],
//     [25, 50, 100, 200, "All"]
// ],
});


 

$(document).on('click', '.delete-this-study', function(){ 
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('H_c_indication_study/delete')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
//indication_med_down();

}
});
}
}) 


});




       </script>