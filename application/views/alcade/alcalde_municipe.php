<?php 
foreach ($search->result() as $row) 
	$id=$row->id;
	$id_super=$row->supervisor;

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
    <li class="active"><a style="color:green" data-toggle="tab" href="#home">SUPERVISOR <i class="fa fa-angle-double-down"></i></a></li>
</ul>
<div class="tab-content"   >
<div  id="home" class="active tab-pane fade in">
<select class="form-control select2"    id="link-supor">
 <option ></option>
 <?php 
 $sqlmunicipe ="SELECT * FROM soto_supervisor WHERE id_municipe !=$id";
$query = $this->db->query($sqlmunicipe);
 foreach($query->result() as $row)
 { 
 echo '<option value="'.$row->id.'">'.$row->cedula.' '.$row->nombres.'</option>';
 }
 ?>
 </select>
 <div id="associated-su"></div>
 </div>

</div>
<br/><br/><br/><br/><br/>
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



function load_supervisor(){
var id_muni=<?=$id?>;

$("#associated-su").fadeIn(1000).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "GET",
url: "<?=base_url('alcalde/load_asociate_muni_super2')?>",
data: {id_muni:id_muni},
success:function(data){
$( "#associated-su" ).html( data );

},

error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#associated-su").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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

//-------------------------------------------------------------------------------------------


$('#link-supor').change(function() {
var id_sup = $(this).val();

var id_muni=<?=$id?>;

$.ajax({
type: "GET",
url: "<?=base_url('alcalde/asociate_muncipe_sup_data')?>",
data: {id_sup:id_sup,id_muni:id_muni},
success:function(data){
load_supervisor();

},
 
});	

});



</script>