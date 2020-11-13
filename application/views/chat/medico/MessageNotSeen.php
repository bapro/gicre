<script>
load_data2();


 function load_data2()
 {
	 var query="";
  $.ajax({
   url:"<?php echo base_url(); ?>admin_medico/search_fetch_medico_chat",
   method:"POST",
   data:{query:query,id_user:<?=$messageFrom?>},
   success:function(data){
    $('#load-medicos').html(data);
   }
  })
 }

});
</script>
