<?php 
foreach($results as $rw)


$dcentrofac=$this->db->select('centro_medico')->where('centro_medico',$rw->centro_id)->where('seguro_medico',$rw->seguro_id)->get('factura2')->row('centro_medico');
if($dcentrofac==$rw->centro_id){
$disable='disabled';$tit='No se puede borrar estos tarifarios porque tienen facturas vinculadas';	
}else{
$disable='';$tit='Borrar los tarifarios de este centro medico';
}

?>
<p>
<button id='<?=$rw->centro_id?>' <?=$disable?> title="<?=$tit?>" type="button"  style='background:red'  class="btn btn-primary btn-xs deletem"><i  class="fa fa-trash"></i> Borrar <?=$count?> categorías</button>

</p>


	<ul class="list-group list-group-horizontal-sm agenda-list">
	<?php foreach($results as $row){

	?>
	<li class="list-group-item view-servicios" style='cursor:pointer' id="<?=$row->groupo?>"> <?=$row->groupo?> </li>

	<?php } ?>
	</ul>




<script>
$(".deletem").click(function(e){
	e.preventDefault();
	if (confirm("Seguro de borrar ?"))
			{ 
		var id_seguro = "<?=$rw->seguro_id?>";
	var el = this;
   var del_id = $(this).attr('id');
    $.ajax({
            type:'POST',
            url:'<?=base_url('tarifarios_centro/deleteTarifCentro')?>',
            data: {id : del_id,id_seguro:id_seguro},
            success:function(data) {
	     location.reload(); 
	  }
    });
 };
 });
//=======================================================================================
$('.view-servicios').click(function(){
$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$(this).addClass('active').siblings().removeClass('active');
$("#servicios").hide();	
var categoria = $(this).attr('id');
var id_centro = "<?=$rw->centro_id?>"; 
var id_seguro = "<?=$rw->seguro_id?>";
$.ajax({
type: "POST",
url: "<?=base_url('tarifarios_centro/centro_categoria_servicios')?>",
data: {categoria:categoria,id_centro:id_centro,id_seguro:id_seguro},
cache: true,
 success:function(data){
$(".loadf").hide();	 
 $('#servicios').html(data);
$("#servicios").show();	
$("html, body").animate({ scrollTop: 830 });

/*var x = $("#go_up").position(); //gets the position of the div element...
window.scrollTo(x.left, x.top);*/
},
 
});

return false;
});
</script>