 <div class="row">
   <div class="col-lg-5">
  <div class="card-body">
  <div id="contSigVitalForm"></div>
  </div>
  </div>
   <div class="col-lg-7 border"  style="height:500px;overflow-y:auto;" >
		 <h5 class="card-title">REGISTROS</h5>
      <div id="list-control-signos-vitales" ></div>
   </div>
   </div>

 <script>


	
	
	




function contSigVital(){
$("#list-control-signos-vitales").fadeIn().html('listando...').css('color','gray');
$.ajax({
type: "POST",
url: "<?=base_url('emerg_control_signos_vitales/listContSigVital')?>",
data:{},
success:function(data){ 
$("#list-control-signos-vitales").html(data); 
},

})
}

contSigVitalForm(0);

function contSigVitalForm(id){
$("#list-control-signos-vitales").fadeIn().html('listando...').css('color','gray');
$.ajax({
type: "POST", 
url: "<?=base_url('emerg_control_signos_vitales/contSigVitalForm')?>",
data:{id:id},
success:function(data){ 
$("#contSigVitalForm").html(data); 
contSigVital();
},

})
}


 </script>