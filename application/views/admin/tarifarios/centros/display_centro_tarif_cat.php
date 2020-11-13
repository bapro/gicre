<p><a id='<?=$rw->centro_id?>' title='Borrar los tarifarios de este centro medico' class='deletem' style='color:red;cursor:pointer' >Borrar <i class="fa fa-trash-o"></i></a> <?=$count?> categorías</p>

<table class="table table-striped table-bordered"  >

<tr >
<?php
$i = 1;
$cpt="";
foreach($results as $row)
{
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>

<td style='background:<?=$colorBg?>'><a href="" class="view-servicios" title="Ver sus servicos" id="<?=$row->groupo?>"><?=$row->groupo?></a></td>
<?php
}
?>

</tr>
</table>
<?php foreach($results as $rw)?>
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
            url:'<?=base_url('admin_medico/DeleteTarifCentro')?>',
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
$("#servicios").hide();	
var categoria = $(this).attr('id');
var id_centro = "<?=$rw->centro_id?>"; 
var id_seguro = "<?=$rw->seguro_id?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin/centro_categoria_servicios')?>",
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