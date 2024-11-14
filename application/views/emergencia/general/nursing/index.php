
<div id="insumoIndex"></div>

<script>


   let  countinsumox = 0;
$('#loadInsumoIndex').on('click',function(e){
 countinsumox ++;
	    if(countinsumox==1){
	 $("#insumoIndex").html('<em>cargando insumo...</em> <span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
     insumoIndex();
	   }
});
  insumoIndex();

function insumoIndex(){
$.ajax({
url:"<?php echo base_url(); ?>emergency/insumoIndex",
data: {user_id:<?=$user_id?>,id_historial:<?=$id_historial?>,saved:1,centro_id:<?=$centro_id?>,showinsumoedit:'',table_insumo:"<?=$table_insumo?>",table_insumo_link:"<?=$table_insumo_link?>",idtable:<?=$idtable?>},
method:"POST",
success:function(data){
$("#insumoIndex").html(data);
},

});
}



</script>