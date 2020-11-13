<?php 
$this->padron_database = $this->load->database('padron',TRUE);
foreach ($search->result() as $row) 
	$nombres=$row->nombres;
	$telefono=$row->telefono;
	$cedula=$row->cedula;
	$direccion=$row->direccion;
	$mesa=$row->mesa;
	$id=$row->id;
	$sector=$row->sector;

$vced1 = substr($row->cedula, 0, 3);
$vced2 = substr($row->cedula, 3, 7);
$vced3 = substr($row->cedula, -1);
?>
<style>
td,th{text-align:left;font-size:11px}
</style>
<i>Resultado de la busqueda</span></i>
 <div class="row" style='font-size:11px'>
<hr id="hr_ad"/>
<h3 style="color:green"><?=$member?> <i class="fa fa-angle-double-right"></i></h3>
 <div class="col-md-2">
 <?php
if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$vced1)
->where('SEQ_CED',$vced2)
->where('VER_CED',$vced3)
->get('fotos')->row('IMAGEN');
echo '<img style="display:inline-block; width:100%; height:auto;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$readonlyag="readonly";
} 
else if($row->photo==""){
$readonlyag="";
?>
<img  style="display:inline-block; width:100%; height:auto;"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	$readonlyag="";
	?>
<img  style="display:inline-block; width:100%; height:auto;"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>
 
 </div>
  <div class="col-md-4">
<table class="table" style='font-size:11px'>

<tr>
<th> NOMBRES</th>
<td>
<?=$nombres?>
</td>
</tr>

<tr>
<th> CEDULA</th>
<td>
<?=$cedula?>
</td>
</tr>
<tr>
<th> TELEFONO</th>
<td>
<?=$telefono?>
</td>
</tr>
<tr>
<th> DIRECCION</th>
<td>
<?=$direccion?>
</td>
</tr>
<tr>
<th> MESA</th>
<td>
<?=$mesa?>
</td>
</tr>

<tr>
<th> SECTOR</th>
<td>
<?=$sector?>
</td>
</tr>


  <tr>
    <td><input type="submit" value="EDITAR" class="btn btn-primary btn-xs" /></td><td></td>
  </tr>
</table>
</div>
<div class="col-md-6" >
<?php
if($member=="SUPERVISOR"){
$member2="COORDINADOR";
$municipio="display:none";	
$sqldetectmember ="SELECT * FROM soto_coordinador WHERE super_id=$id_member";
$sqlcood ="SELECT id, cedula,nombres FROM soto_coordinador ";	
$tableassociated='soto_coordinador';
} else{
	$id_sup=$this->db->select('id_sup')->where('id_coord',$id_member)->get('coord_super')->row('id_sup');
$sqldetectmember ="SELECT * FROM supervisor  WHERE id=$id_sup";
$member2="SUPERVISOR";	
$municipio="";	
}


 ?>
<h4  style="color:green"><?=$member2?> <i class="fa fa-angle-double-right"></i></h4>

<select class="form-control select2"    id="associate-member">
 <option ></option>
 <?php 
 
$query = $this->db->query($sqlcood);
 foreach($query->result() as $row)
 { 
 echo '<option value="'.$row->id.'">'.$row->cedula.' '.$row->nombres.'</option>';
 }
 ?>
 </select>
<div style="overflow-x:auto;">
<table class="table" style='font-size:11px'>
<thead>
<tr><th>Foto</th><th>Nombres</th><th>Cedula</th><th>Telefono</th><th  style="color:green;">MUNICIPE</th></tr>
</thead>
<?php
$querys = $this->db->query($sqldetectmember);
 foreach ($querys->result() as $rows) { ?>
<tr>
<td  title="Haga un clic para editar">
 <?php
 
 $eced1 = substr($rows->cedula, 0, 3);
$eced2 = substr($rows->cedula, 3, 7);
$eced3 = substr($rows->cedula, -1);
 
if($rows->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$eced1)
->where('SEQ_CED',$eced2)
->where('VER_CED',$eced3)
->get('fotos')->row('IMAGEN');
echo '<img width="50" height="50" src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$readonlyag="readonly";
} 
else if($rows->photo==""){
?>
<img  width="50" height="50"  src="<?= base_url();?>/assets/img/user.png"  />
<?php	
}
else{
	?>
<img  width="50" height="50"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $rows->photo; ?>"  />
<?php

}
?>

</td>
<td style='font-size:11px'><?=$rows->nombres?></td>
<td style='font-size:11px'> <?=$rows->cedula?></td>
<td style='font-size:11px'> <?=$rows->telefono?> <span style="color:blue;pointer:cursor" title="Direccion : <?=$rows->direccion?> &#013 Mesa : <?=$rows->mesa?> &#013 Sector : <?=$rows->sector?>" ><i class="fa fa-plus"></i></span></td>
<!--<td style="<?=$municipio?>">
<?php
$sqls ="SELECT id FROM municipe WHERE supervisor=$rows->id";
$querys = $this->db->query($sqls);
$count=$querys->num_rows();
$rowm = $querys->row();
if($rowm !=NULL){
?>
<a id="<?=$rowm->id?>" class="get-this-one" style="cursor:pointer;color:red" ><i class="glyphicon glyphicon-eye-open"></i> <?=$count?></a>
<div  class="push-down-sup" style="display:none"></div>
<?php }
else{
echo '<a class="btn btn-primary btn-xs" href="'.base_url().'alcalde/municipe/'.$id_sup.'" >CREAR MUNICIPIO</a>';	
	
}?>
</td>-->

</tr>
<?php }?>
</table>
<div id="associated-data"></div>
</div>

</div>
</div>


<script>

$('#associate-member').change(function() {
var id = $(this).val();
var table='<?=$tableassociated?>';
var id_member=<?=$id_member?>;



$.ajax({
type: "GET",
url: "<?=base_url('alcalde/asociate_member_data')?>",
data: {id_member:id_member,table:table,id:id},
success:function(data){
$( "#associated-data" ).html( data ); 
},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#associated-data").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	




});


function associated_member(){
var table='<?=$tableassociated?>';
var id_member=<?=$id_member?>;	

$.ajax({
type: "GET",
url: "<?=base_url('alcalde/load_asociate_member_data')?>",
data: {id_member:id_member,table:table},
success:function(data){
$( "#associated-data" ).html( data ); 

},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#associated-data").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	


};

associated_member();



$('.get-this-one').click(function() {
var mun_id = $(this).attr('id');
var el = $(this).closest('td').find('.push-down-sup');
$.get( "<?php echo base_url();?>alcalde/municipe_data?mun_id="+mun_id, function( data ){
el.html(data).slideToggle("slow"); 
}); 

});

$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});

</script>