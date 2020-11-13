<?php
 if ($query->result() != null) {
foreach ($query->result() as $mes){
	$messageFrom=$mes->message_from;
	$messageTo=$mes->message_to;
	$mesa=$mes->message;
	$time=$mes->stime;
	$seen=$mes->seen;
	if($seen=="1"){$color="color:green";$visto="<i style='color: #41BC07'  class='fa fa-check-circle'></i>";}else{$color="";$visto="<i style='color:gray'  class='fa fa-check-circle'></i>";}
	$time1 = date("d-m-Y", strtotime($time));
	$hm = date("H:i", strtotime($time));
	$today=date("d-m-Y");
	$ayer=date('d-m-Y', strtotime('-1 days'));
	 if($time1==$today){
		$time1="hoy $hm"; 
	 } 
	 elseif($time1==$ayer){
	$time1="ayer $hm"; 	 
	 }
	 else{
		$time1="$time1 $hm";  
	 }
	 
	 if(preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '<a href="$1">$1</a>', $mesa)){
		 if($messageFrom==$messageFromiD){
		$mesa=preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '<a style="color:white" title="Haga un clic para abrir el enlace." target="_blank" href="$1">$1</a>', $mesa); 
	 } else{
		$mesa=preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '<a  title="Haga un clic para abrir el enlace." target="_blank" href="$1">$1</a>', $mesa);  
	 }
	 } else{
	$mesa=$mesa;	 
	 }
	 $message=nl2br($mesa);
	$imgpat='<img  style="width:30px;color:green" src="'.base_url().'/assets/img/user.png"  />';	
//----------------------------------------------------------------------------------------------------------
if($messageFrom==$messageFromiD){
	$is_me= "
<div class='message me'>
$imgpat
<p class='info'>
<span style='font-size:11px'>$messageFromName</span>
<br/><strong>$message</strong><br/>
<span style='font-size:11px;float:right'>$time1 </span>
<span><a  id='$mes->id' title='borrar' class='deletem' style='color:white;cursor:pointer'><i class='fa fa-trash-o'  ></i></a></span>
</p>
<span style='font-size:15px;float:left;$color'><strong><i>$visto &nbsp; </i></strong></span>
</div>
";
} else {
	
	$is_me= "
<div class='message' >
$imgpat
<p class='info'>
<span style='font-size:11px'>$messageToName</span>
<br/><strong>$message</strong><br/>
<span style='font-size:11px;float:right'>$time1</span>
</p>
</div>
";	

}	
echo $is_me;	

}
 } else {
	 echo "<div style='text-align: center;color:red'>No hay chat con $messageToName.</div>";
 }
?>

<script>

//delete message
$(function() {
$(".deletem").click(function(e){
	e.preventDefault();
	if (confirm("Borrar este mensage ?"))
			{ 
		
		var el = this;
   var del_id = $(this).attr('id');
    $.ajax({
            type:'POST',
            url:'<?=base_url('admin_medico/DeleteMessage')?>',
            data: {id : del_id},
            success:function(data) {
		$(el).closest('div').css('background','tomato');
    $(el).closest('div').fadeOut(800, function(){ 
     $(this).remove();
    });
	  }
    });
 };
 });
  })
  
  //---------------------------------------------------------------------


  </script>