 <div id="loadContSigVitContent" ></div>
 <script>

  let  countconsig = 0;
$('#loadContSigVit').on('click',function(e){
 countconsig ++;
	    if(countconsig==1){
	 $("#loadContSigVitContent").html('<em>cargando control de signos vitales...</em> <span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
     loadContSigVitContent();
	   }

});


function loadContSigVitContent(){
$.ajax({
type: "POST",
url: "<?=base_url('control_signos_vitales/loadContSigVit')?>",
data:{id_patient:<?=$id_historial?>,id_user:<?=$user_id?>},
success:function(data){ 
$("#loadContSigVitContent").html(data); 
},

})
}


 </script>