<div id="conclucionForm"></div><div class="fade modal"id="ver_con_d"role="dialog"tabindex="-1"><div class="modal-dialog modal-inc-width"><div class="modal-content"></div></div></div><script>function conclucionForm(){$.ajax({url:"<?php echo base_url(); ?>admin_medico/conclucionForm",data:{historial_id:"<?=$historial_id?>",user_id:"<?=$user_id?>",centro_medico:"<?=$centro_medico?>"},method:"POST",success:function(o){$("#conclucionForm").html(o)},error:function(o,e,n){alert("An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!"),$("#conclucionForm").html("<p>status code: "+o.status+"</p><p>errorThrown: "+n+"</p><p>jqXHR.responseText:</p><div>"+o.responseText+"</div>"),console.log("jqXHR:"),console.log(o),console.log("textStatus:"),console.log(e),console.log("errorThrown:"),console.log(n)}})}function doStuff2(){var o=$(".on_input_pro").val();$(".pro_result").fadeIn().html('<span class="load" style="margin-left:350px"><img  src="<?=base_url()?>assets/img/loading.gif" /></span>'),""==o?$(".pro_result").hide():$.get("<?php echo base_url(); ?>admin_medico/on_input_pro?value="+o+"&id_pat=<?=$id_historial?>&tab=exam-1",function(o){$(".pro_result").html(o)})}conclucionForm(),$(".on_input_pro").keydown(function(){clearTimeout(timer),timer=setTimeout(doStuff2,1e3)})</script>