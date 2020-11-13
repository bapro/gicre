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
    <span id="oneTime" style="display:none"><?=$numMes?></span><span  style="display:none" id="twoTime"></span>
    <span id="not-reload-us" style="display:none"></span><span id="reload-us"  style="display:none"></span>
     <table class="table table-striped table-hover" id="tblChat">

 <?php if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
 $sender=$this->db->select('name,perfil,area')->where('id_user',$row->message_from)->get('users')->row_array();  
  $areat=$this->db->select('title_area')->where('id_ar',$sender['area'])->get('areas')->row('title_area');
  
  
  if($sender['perfil']=='Admin'){$area='Admin';}else if($sender['perfil']=='Asistente Medico'){$area='Asistente Medico';}else{$area=$areat;}

 
 
 if($count > 0)
    {
      $bell="<span class='fa-stack fa-1x'>
  <i class='fa fa-circle fa-stack-2x'></i>
  <i class='fa fa-bell fa-stack-1x fa-inverse'></i>
   <span class='badge'>$count</span>
  </span>";
    }else{
      $bell="";
    }
	
    $output .= '
      <tr style="cursor:pointer">
	  <td class="get-user-id" style="display:none">'.$row->message_from.'</td>
	  <td >'.$sender['name'].'</td>
	  <td >'.$area.'</td>
	    <th class="messageToN" style="display:none">'.$sender['name'].'  </th>
       <td style="text-transform:uppercase;font-size:12px"> '.$bell.' </td>
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
	alert(4);
var idChatWith = $(this).closest('tr').find('td.get-user-id').text();
//var messageToName = $(this).closest('tr').find('th.messageToN').text();
//var area = $(this).closest('tr').find('td.area').text();
 //var espage = ' - ' + area + '  ';
//var userInfo = messageToName.concat(espage);
//$("#chat-medico").show();
//$("#chat-with").show();
//$("#receiver-status").show();
//$("#message-to").val(idChatWith);
//$("#message-to-name").text(userInfo);
//$("#chat-box").fadeIn().html('<span   class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
   url:"<?php echo base_url(); ?>admin_medico/viewSenderMesssge",
   method:"POST",
   data:{idChatWith:idChatWith,id_user:<?=$id_user?>},
   success:function(data){
  //$('#chat-box').html(data);
  alert(<?=$id_user?>);

   },

   })
});


  </script>