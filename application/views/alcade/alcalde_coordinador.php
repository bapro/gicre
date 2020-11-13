<?php 
foreach ($search->result() as $row) 
    $id=$row->id;
	$super_id=$row->super_id;
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
    <li class="active"><a style="color:green" data-toggle="tab" href="#home">SUPERVISOR</a></li>
</ul>
<div class="tab-content"   >
<div  id="home" class="active tab-pane fade in">
<select class="form-control select2"    id="associate-supervisor">
 <option ></option>
 <?php 
 $sqlmunicipe ="SELECT * FROM soto_supervisor WHERE id !=$super_id";
$query = $this->db->query($sqlmunicipe);
 foreach($query->result() as $row)
 { 
 echo '<option value="'.$row->id.'">'.$row->cedula.' '.$row->nombres.'</option>';
 }
 ?>
 </select>
 <div id="associated-supervisor"></div>
 </div>

<?php
 
$id_municipe=$this->db->select('id_municipe')->where('id',$super_id)->get('soto_supervisor')->row('id_municipe');
if($id_municipe==""){
$where='';	
$disab="disabled";
}
else{
$where="WHERE id !=$id_municipe";	
$disab="";	
}

?>
<ul class="nav nav-tabs">
    <li class="active"><a style="color:green" data-toggle="tab" href="#home">MUNICIPE</a></li>
 </ul>
<div class="tab-content"   >
<div  id="home" class="active tab-pane fade in">
 <input id="id-municipe-change" type='hidden' value="<?=$id_municipe?>" />
 <input id="super_id" type='hidden' value="<?=$super_id?>" />
<select class="form-control select2"   id="associate-muncipe" <?=$disab?>>
 <option ></option>
 <?php 
 $sqlmunicipe ="SELECT * FROM soto_municipe $where";
$query = $this->db->query($sqlmunicipe);
 foreach($query->result() as $row)
 { 
 echo '<option value="'.$row->id.'">'.$row->cedula.' '.$row->nombres.'</option>';
 }
 ?>
 </select>
<div id="load_munic"></div>

 </div>

</div>


</div>
<br/><br/>
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


$('#associate-supervisor').change(function() {
var id_sup = $(this).val();
$('#super_id').val(id_sup);
var id_coord=<?=$id?>;
$('#associate-muncipe').prop('disabled',false);
$.ajax({
type: "GET",
url: "<?=base_url('alcalde/asociate_supervisor_coordinador_data')?>",
data: {id_coord:id_coord,id_sup:id_sup},
success:function(data){
load_supervisor();
load_munic();
},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#associated-supervisor").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	


});





function load_supervisor(){
var super_id=$('#super_id').val();	

$.ajax({
type: "GET",
url: "<?=base_url('alcalde/load_asociate_supervisor')?>",
data: {super_id:super_id},
success:function(data){
$( "#associated-supervisor" ).html( data );

},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#associated-supervisor").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});	


};

load_supervisor();





//-------------------------------------------------------------------------------------

function load_munic(){
var id_sup=$('#super_id').val();

if(id_sup !=""){
$.ajax({
type: "GET",
url: "<?=base_url('alcalde/load_asociate_supervisor_muncipe')?>",
data: {id_sup:id_sup},
success:function(data){

$( "#load_munic" ).html( data );

},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#load_munic").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});	
}

};

load_munic();








$('#associate-muncipe').change(function() {
var id_muni = $(this).val();
$('#id-municipe-change').val(id_muni);
var id_sup=<?=$super_id?>;

$.ajax({
type: "GET",
url: "<?=base_url('alcalde/asociate_supervisor_muncipe')?>",
data: {id_sup:id_sup,id_muni:id_muni},
success:function(data){
load_munic();
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









</script>