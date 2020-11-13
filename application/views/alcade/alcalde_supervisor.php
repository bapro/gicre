<?php
foreach ($search->result() as $row) 

	$id_municipe=$row->id_municipe;


?>

<style>
td,th{text-align:left;font-size:11px}
</style>
<i>Resultado de la busqueda</span></i>

 <div class="row" style='font-size:11px'>
<hr id="hr_ad"/>
<?php $this->load->view('alcade/search-result-member');?>
  <div class="col-md-6" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb">
<ul class="nav nav-tabs">
    <li class="active"><a style="color:green" data-toggle="tab" href="#home">MUNCIPE</a></li>
    <li ><a data-toggle="tab" style="color:green" class="show-btn-fac-amb" href="#menu1">COORDINADORES</a></li>
 </ul>
<div class="tab-content"   >
<div  id="home" class="active tab-pane fade in">
<select class="form-control select2"    id="associate-muncipe">
 <option ></option>
 <?php 
 $sqlmunicipe ="SELECT * FROM soto_municipe";
$query = $this->db->query($sqlmunicipe);
 foreach($query->result() as $row)
 { 
 echo '<option value="'.$row->id.'">'.$row->cedula.' '.$row->nombres.'</option>';
 }
 ?>
 </select>
 <input id="id-municipe-change" type='hidden' value="<?=$id_member?>" />
 <div id="associated-municipe"></div>
 </div>
 
 
 
 <div  class="tab-pane fade in"  id="menu1">
<select class="form-control select2"    id="select-coordinador">
 <option ></option>
 <?php 
 $sqlcoordinador ="SELECT * FROM soto_coordinador WHERE super_id !=$id_member";
$queryc = $this->db->query($sqlcoordinador);
 foreach($queryc->result() as $row)
 { 
 echo '<option value="'.$row->id.'">'.$row->cedula.' '.$row->nombres.'</option>';
 }
 ?>
 </select>
 
 <div id="associated-coordinador"></div>
 </div>
</div>

</div>
</div>

<div class="modal fade" id="edit_member"  role="dialog" >
<div class="modal-dialog" >
<div class="modal-content" >

</div>
</div>
</div>
<script>

$('#edit_member').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('.select2').select2({ 
  
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});




$('#associate-muncipe').change(function() {
var id_muni = $(this).val();
var id_sup=<?=$id_member?>;
$('#id-municipe-change').val(id_sup);


$.ajax({
type: "GET",
url: "<?=base_url('alcalde/asociate_supervisor_muncipe')?>",
data: {id_sup:id_sup,id_muni:id_muni},
success:function(data){
load_municipe();
},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#associated-municipe").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	


});




function load_municipe(){
var id_sup=$('#id-municipe-change').val();
$.ajax({
type: "GET",
url: "<?=base_url('alcalde/load_asociate_supervisor_muncipe')?>",
data: {id_sup:id_sup},
success:function(data){
$( "#associated-municipe" ).html( data ); 

},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#associated-municipe").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	


};

load_municipe();




function load_coodinador(){
var id_sup=<?=$id_member?>;

$.ajax({
type: "GET",
url: "<?=base_url('alcalde/load_asociate_supervisor_coordinador')?>",
data: {id_sup:id_sup},
success:function(data){
$( "#associated-coordinador" ).html( data );

},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#associated-coodinador").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	


};

load_coodinador();






$('#select-coordinador').change(function() {
var id_coord = $(this).val();

var id_sup=<?=$id_member?>;

$.ajax({
type: "GET",
url: "<?=base_url('alcalde/asociate_supervisor_coordinador_data')?>",
data: {id_sup:id_sup,id_coord:id_coord},
success:function(data){
//$( "#associated-coordinador" ).html( data );
 load_coodinador();
},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#associated-coordinador").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	


});






</script>