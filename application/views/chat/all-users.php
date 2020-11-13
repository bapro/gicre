<style>
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: #B3B6FE;
}

#tblChat td{text-align:left;font-size:14px;text-transform:uppercase}


tr.highlighted td {
    background:  #B3B6FE;
}
.badge{
  position: relative;
  margin-left: 60%;
  margin-top: -60%;
  background:red;
}
</style>

  <div class="table-responsive" style="background-image: linear-gradient(to right,white, #B0C6B0);">
   <span id="not-reload-us" style="display:none"></span><span id="reload-us"  style="display:none"></span>
    <span id="no-message" style="display:none"></span><span id="new-message"  style="display:none"></span>
<table class="table table-striped table-hover" id="tblChat">

 <?php if($dataUsers->num_rows() > 0)
{

foreach($dataUsers->result() as $row)
{

if($row->is_log_in==1){
$login='<span style=" height: 12px;width: 12px; background-color: #41BC07; border-radius: 50%; display: inline-block;"></span>';
$userlogin='<img  style="width:30px;color:green" src="'.base_url().'/assets/img/eligibility-jump.png"  />';
}else{
$login='<span style=" height: 12px;width: 12px; background-color: gray; border-radius: 50%; display: inline-block;"></span>';
$userlogin='<img  style="width:30px;" src="'.base_url().'/assets/img/user-off-line.png"  />';
}
if($row->perfil=='Admin'){$area='Admin';}else if($row->perfil=='Asistente Medico'){$area='Asistente Medico';}else if($row->perfil=='Vendedor'){$area='Vendedor';}else{$area=$row->title_area;}

$querym = $this->db->query("SELECT message FROM chat_medico WHERE message_from=$row->id_user AND message_to=$id_user ORDER BY id desc");
$rowm = $querym->row_array();
$mest=$rowm['message'];
$resultm = mb_substr($mest, 0, 15);
if($resultm !=""){
$mrs="$resultm...";	
} else{
$mrs="";	
}

$query = $this->db->query("SELECT message FROM chat_medico WHERE message_from=$row->id_user AND message_to=$id_user AND seen=0 ");

if($query->num_rows() > 0)
{
$bell="<span class='fa-stack fa-1x'>
<i class='fa fa-circle fa-stack-2x'></i>
<i class='fa fa-bell fa-stack-1x fa-inverse'></i>
<span class='badge'>$query->num_rows</span>
</span>";
}else{
$bell="";
}

$output .= '

<tr  title="Chatear con '.$row->name.'" style="cursor:pointer">
<td class="get-user-id" style="display:none">'.$row->id_user.'</td>
<td >'.$userlogin.'</td>
<th class="messageToN" style="display:none">'.$row->name.'  </th>
<td>'.$row->name.' <em style="font-size:11px;color:black;text-transform:lowercase" ><i>'.$mrs.'</i></em>  <span class="hide-bell">'.$bell.'</span> </td>
<td style="font-size:12px;color:black" class="area">'.$area.'</td>
<td class="login-bullet" >'.$login.'</td>
</tr>

';
}
}
else
{
$output .= '<tr>
<td colspan="5">No usuario encuentrado</td>
</tr>';
}
$output .= '</table>';
echo $output;
?>

 </div>
<script>
$('#tblChat tr').click(function() {
var idChatWith = $(this).closest('tr').find('td.get-user-id').text();
$(this).closest('tr').find('td.login-bullet').fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
type: "POST",
url: "<?php echo base_url(); ?><?php echo $control ?>/chatWithBoxId",
data: {idChatWith:idChatWith},
success:function(data){
window.location.href="<?php echo base_url(); ?><?php echo $control ?>/chatWithBox";

}  
});
});


var id_user=<?=$id_user?>;

$("#no-message").load("<?php echo base_url("admin_medico/newMessageSent")?>?id_user="+id_user);

$("#not-reload-us").load("<?php echo base_url("admin_medico/connectedUsers")?>?id_user="+id_user);

setInterval(function(){
 $("#new-message").load("<?php echo base_url("admin_medico/newMessageSent")?>?id_user="+id_user);
  $("#reload-us").load("<?php echo base_url("admin_medico/connectedUsers")?>?id_user="+id_user);
  var first = $("#reload-us").text();
 var second = $("#not-reload-us").text();
if(first != second){
load_data(); 
$("#reload-us").text(second);
}
 var nom = $("#no-message").text();
 var newm = $("#new-message").text();

if(nom != newm){
load_data(); 
$("#new-message").text(nom);
}
}, 5000);
  </script>