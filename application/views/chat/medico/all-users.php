<style>
.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: #B3B6FE;
}

#tblChat td{text-align:left;font-size:14px;text-transform:uppercase}


tr.highlighted td {
    background:  #B3B6FE;
}

</style>

  <div class="table-responsive" style="background-image: linear-gradient(to right,white, #B0C6B0);">
     <table class="table table-striped table-hover" id="tblChat">

 <?php if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
	if($row->is_log_in==1){
		$login='<span style=" height: 12px;width: 12px; background-color: #41BC07; border-radius: 50%; display: inline-block;"></span>';
	    $userlogin='<img  style="width:30px;color:green" src="'.base_url().'/assets/img/eligibility-jump.png"  />';
		}else{
			$login='<span style=" height: 12px;width: 12px; background-color: gray; border-radius: 50%; display: inline-block;"></span>';
			$userlogin='<img  style="width:30px;" src="'.base_url().'/assets/img/user-off-line.png"  />';
			}
    if($row->perfil=='Admin'){$area='Admin';}else if($row->perfil=='Asistente Medico'){$area='Asistente Medico';}else{$area=$row->title_area;}
	$message=$this->db->select('message')->where('message_from',$row->id_user)->where('message_to',$id_user)->where('seen',0)->get('chat_medico')->row('message');
	if($message !=""){$bell='<i  class="fa fa-bell blink-image" style="color:red;font-size:10px"></i>';}else{$bell="";}
	
    $output .= '
      <tr style="cursor:pointer">
	  <td class="get-user-id" style="display:none">'.$row->id_user.'</td>
	  <td >'.$userlogin.'</td>
	    <th class="messageToN" style="display:none">'.$row->name.' </th>
       <td style="text-transform:uppercase;font-size:12px">'.$row->name.'  '.$bell.'</td>
       <td style="font-size:12px" class="area">'.$area.'</td>
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
 $('#tblChat tr').removeClass('highlighted');
    $(this).addClass('highlighted');
$("#chat-historial").fadeIn().html('<span   class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id = $(this).closest('tr').find('td.get-user-id').text();
var messageToName = $(this).closest('tr').find('th.messageToN').text();
var area = $(this).closest('tr').find('td.area').text();
 var espage = ' - ' + area + '  ';
var userInfo = messageToName.concat(espage);
$("#chat-medico").show();
$("#chat-with").show();
$("#receiver-status").show();
$("#message-to").val(id);
$("#message-to-name").text(userInfo);
load_message();load_data();
});



  </script>