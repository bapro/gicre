<div id='errd'></div>

<table class="table  table-bordered" id='calendatTable' cellspacing="0" >

<tr>
<th>Dia</th>
<th>Centro Medico</th>

</tr>

<?php

$i = 0;
 foreach($agend_result as $row)
{
	
$day=$this->db->select('title')->where('id',$row->day)
->get('diaries')->row('title'); 

?>

<tr>
<td style='width:2px;font-size:11px;color:blue'><?=$day?></td>
<td>
<table class="table  table-striped" style='width:100%'>
<?php
$sql ="SELECT * FROM doctor_agenda  where id_doctor=$id_doctor AND  day='$row->day'";
$query = $this->db->query($sql);
$cpt="";
 foreach ($query->result() as $rows) {
	 
	$centro=$this->db->select('name')->where('id_m_c',$rows->id_centro )
->get('medical_centers')->row('name');

if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
} 
	 ?>
<tr bgcolor='<?=$colorBg?>' id="<?=$rows->id_d_ag?>" >
<td style="width:180px;display:block">
<span class="editSpan centro-n"><?=$centro?></span>
<span style="display:none" class="editInput">
<select   class="form-control select2 centro"   name="centro" >
<?php 

foreach($centro_medico as $rs)
{
$id_centro=$this->db->select('id_centro')->where('id_doctor',$rows->id_doctor)
 ->where('id_centro',$rs->id_m_c)
 ->get('doctor_agenda')->row('id_centro');
		if($rows->id_centro==$id_centro){
		        $selected="selected";
		} else {
		       $selected="";
	    }
echo "<option value='$rs->name' $selected>$rs->name</option>";
}
?>
</select>
</span>
</td>

<td>
<span class="editSpan agenda-n"><?=$rows->agenda?></span>
<span style="display:none" class="editInput">
<select   class="form-control select2  agenda"   name="agenda" >
    <option hidden selected><?=$rows->agenda?></option>
	<option>mañana</option>
	<option>tarde</option>
	<option>noche</option>
</select>
</span>
</td>



<td>
<span class="editSpan citas-n"><?=$rows->citas?> citas</span> 
<span style="display:none" class="editInput">
 <input  class="form-control citas" style='width:60px' type="number"  name="citas" value="<?=$rows->citas?>"  /> 
</span>
 </td>
<td>
<a  class="editBtn" style="float: none;cursor:pointer" ><i class="fa fa-pencil"></i></a>
<a class="saveBtn" style="float: none; display: none;cursor:pointer"><i class="fa fa-check-circle"></i></a>
</td>
<td style='text-align:right'>
<a title="Borrar"  id="<?php echo $rows->id_d_ag?>" class="deleteagenda" style="color:red;cursor:pointer"><i class="fa fa-remove"></i></a>
</td>

</tr>
<?php }  ?>
</table>
</td>


</tr>


<?php }  ?>
</table>

<script>
   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        
        $(this).closest("tr").find(".saveBtn").show();
		
		  $(this).closest("tr").find(".editSpan").hide();
        
        //show edit input
        $(this).closest("tr").find(".editInput").show();
        
    });
	
//---------------------------------------------------------------------------
	$('.saveBtn').on('click',function(){
//var trObj = $(this).closest("tr");
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();
//-------------------------------------------------------------------------------
var centro = $(this).closest("tr").find(".centro").val();
var agenda = $(this).closest("tr").find(".agenda").val();
var cita = $(this).closest("tr").find(".citas").val();
if(cita==""){
alert("Todos los campos son requerido !")
} else {
$(this).closest("tr").find(".editBtn").show();
$(this).hide(); 
$(this).closest("tr").find(".editBtn").show();  

$(this).closest("tr").find(".editInput").hide(); 
$(this).closest("tr").find(".editSpan").show();

//--------------------------------AFECT NEW VALUES-------------------------------------------------
$(this).closest("tr").find(".centro-n").text(centro);
$(this).closest("tr").find(".agenda-n").text(agenda);
$(this).closest("tr").find(".citas-n").text(cita);
//---------------------------------------------------------------------------------

$.ajax({
type:'POST',
url: "<?=base_url('admin/save_edit_agenda')?>",
//dataType: "json",
//data:'id_agenda='+ID+'&'+inputData,
data: {centro:centro,agenda:agenda,citas:cita,id_agenda:ID},
cache: true,
success:function(data){
$('#errd').html(data);
},

 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#errd').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
   }
});
//---------------------------------------------------------------------------	
	$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});
//---------------------------------------------------------------
$(".deleteagenda").click(function(){
if (confirm("Estás seguro de borrar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteDiaryDoctor')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
})
</script>