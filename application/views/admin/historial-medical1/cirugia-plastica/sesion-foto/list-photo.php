<style>
#zoomImg<?=$aside?>-<?=$pos_num?>:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(2.5);
transition: transform 1s linear;  
  z-index:1000;
  position:absolute
}
</style>

<div  class="roundSesionFoto" >
<?php 
if($aside=='r_'){
	$posText='derecha';
}else{
$posText='izquierda';	
}
?>
<em style='font-size:27px;color:green'><strong>#<?=$pos_num?></strong></em>
<i class="fa fa-remove <?=$photo['id']?>" id="<?=$aside?>delSesionFoto<?=$pos_num?>" title="eliminar foto #<?=$pos_num?> a la <?=$posText?>" style='color:red;cursor:pointer;margin-left: 170px ;'></i>
<img  style="width:40%" id="zoomImg<?=$aside?>-<?=$pos_num?>" class="img-responsive sesionFotoRotate" src="<?= base_url();?>/assets/img/sesion-fotos/<?php echo $photo['name']; ?>"  />
</div>
<script>
$("#<?=$aside?>hideSesion<?=$pos_num?>").hide(); 
$('#<?=$aside?>delSesionFoto<?=$pos_num?>').on('click', function(e){ 
e.preventDefault(); 
$.ajax({
url:"<?php echo base_url(); ?>sesionFotos/delSesionFoto1",
data: {id:<?=$photo['id']?>},
method:"POST",
success:function(data){
$("#<?=$aside?>image_file<?=$pos_num?>").val('');
$("#<?=$aside?>sesionFoto<?=$pos_num?>").html('');
$("#<?=$aside?>hideSesion<?=$pos_num?>").show();
  
},

});

});





/*
$("#zoomImg<?=$aside?>-<?=$pos_num?>").on({
   mouseenter: function(){
        $(this).animate({width: '100%', height: 'auto'}, 500);
    },
    mouseleave: function(){
        $(this).animate({width: '40%', height: 'auto'}, 100);
    }
});*/


</script>