		  <?php
		  
		  if($solCon_data==0){
			  $hosp_desc_sol_inter='';
			  $hosp_sol_int_cent='';
			  $hosp_sol_int_esp='';
			  $hosp_sol_int_doc1='';
			  $asked_byasked_by='';
			  $respuesta_doc='';
			  $asked_by='';
			  $id_interconsulta=0;
			  $in_byic=$this->session->userdata('user_id');
		  }else{
			 foreach ($queryscon as $row)
			  $hosp_desc_sol_inter=$row->descripcion;
			  $hosp_sol_int_cent=$row->centro;
			  $hosp_sol_int_esp=$row->esp;
			  $hosp_sol_int_doc1=$row->asked_to;
			  $asked_by=$row->asked_by;
			  $respuesta_doc=$row->respuesta;
			   $id_interconsulta=$row->id;
			   $in_byic = $row->inserted_by;
		  }
		  $current_doc_id=$this->session->userdata('user_id');
		  $current_doc_name=$this->session->userdata['user_name'];
		  ?>
		  <form id="saveSolInterForm">
 <div class="row">
<div id="paginateSolInterCons"></div>
 <div class="col-md-5">
 <input type="hidden"  name="id_interconsulta" value="<?=$id_interconsulta?>"  />
   <div class="mb-2">
  <label class="form-label"><span style="color:red">*</span> Doctor</label>
             <select name="hosp_sol_int_doc" id="hosp_sol_int_doc1" class="form-select clear-conInt">
			 <?php
                 $query = $this->db->query("SELECT id_doctor FROM  doctor_agenda_test 
	WHERE id_centro=$centro_medico GROUP BY id_doctor");
                   foreach($query->result() as $row){
					   if($row->id_doctor==$hosp_sol_int_doc1){
						  $selected = "selected";
					   }else{
						  $selected = "" ;
					   }
					   $docName= $this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
					   echo "<option $selected value='$row->id_doctor'>$docName</option>";
				   }
                ?>         
                  </select>
		  
	
		     
  </div>
  </div>
		<div class="col-md-7">

		<label><span style="color:red">*</span> Descripción de solicitud</label>
		<textarea class="form-control clear-conInt" name="hosp_desc_sol_inter" style="height: 100px"><?=$hosp_desc_sol_inter?></textarea>
		<br/>
		
			<?php
         if($solCon_data > 0) {
			if($asked_by==$this->session->userdata('user_id')) {
			$disabled2='disabled';
			}else{
			$disabled2='';	 
			} 
			?>
		<label for="hosp_desc_sol_response">Respuesta de Interconsulta</label>
			<textarea class="form-control clear-conInt" name="hosp_desc_sol_response" style="height: 100px" <?=$disabled2?>><?=$respuesta_doc?></textarea>
			
		 <?php } ?>
		<div class="mb-3"> 
<br/>		

		<?php if($this->session->userdata('user_id')==$in_byic){?>
		<button type="submit" class="btn btn-success" id="saveSolInter" <?=$this->session->userdata('show_edit_btn')?>>Guardar y Enviar </button>
		<?php  }?>
	  
	    <button type="button" id="newSolInter" class="btn btn-primary btn-sm ">Nuevo</button>  
		<br/><span  id='resultSolInt'></span> 

		</div>
		</div>
  
 
 </div>
 

</form>

<script>
 $(document).ready(function() {
 $(".spinner-border").hide();

$('#hosp_sol_int_doc1').select2({
		theme: 'bootstrap-5',
		width: '100%'
		
		
	});
 $("#newSolInter").click(function(event) {
            event.preventDefault();
            var li = "pagination-hosp_interconsultas-li";
            var controller = "hosp_interconsultas";
            var div = "hospSolCon-form";
			loadPagination('hosp_interconsultas');
            resetForm(li, controller, div);
        });



$('#saveSolInterForm').on('submit', function(event) {
event.preventDefault();	 
$('#saveSolInter').prop("disabled",true);

$.ajax({
url: "<?=base_url('emerg_interconsultas/saveSolInter')?>",
method:"POST",
dataType: 'json',
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(response){
if(response.status == 0){
 Swal.fire({
        html: response.message,
        icon: 'error',
      })
}else if(response.status == 1){
	loadPagination('emerg_interconsultas');
} else{
	Swal.fire({
        html: response.message,
        icon: 'error',
      })
}


$('#saveSolInter').prop("disabled",false);
	
},


});

});

});


	function paginateSolInterCons(){
$.ajax({
url:"<?php echo base_url(); ?>emerg_interconsultas/pagination",
data: {},
method:"POST",
success:function(data){

$('#pagination-hosp_interconsultas').html(data);
},

});
}






function registroSolInterDoc() {

$.ajax({
	type: "POST",
	url: '<?php echo site_url('emerg_interconsultas/registroSolInterDoc');?>',
	//data:{id_user:<?=$asked_by?>,resp:1},
	data:{id_user:1,resp:1},
	success: function(data){
	$("#registroSolInterDoc").html(data);

	},

	});
}


function registroRespInterDoc() {

$.ajax({
	type: "POST",
	url: '<?php echo site_url('emerg_interconsultas/registroSolInterDoc');?>',
	//data:{id_user:<?=$hosp_sol_int_doc1?>,resp:2},
	data:{id_user:1,resp:2},
	success: function(data){
	$("#registroRespInterDoc").html(data);

	},

	});
}

</script>