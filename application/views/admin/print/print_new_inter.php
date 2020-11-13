<style>
#footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
</style>
<body  style='font-size:10px'>
<br/>

<table  style="font-size:11px;width:100%">
<thead>
<tr style="background:#D7E495">
<td style="text-align:left"><strong>Medico</strong></td>
<td style="text-align:left"><strong>Area</strong></td>
<td style="text-align:left"><strong>Causa</strong></td>
<td style="text-align:left"><strong>Fecha</strong></td>
</thead>
<tbody>

<?php
$i = 1;
foreach($query->result() as $row) 
 
$areat=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');
$fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$medico=$this->db->select('name')->where('id_user',$row->doc)->get('users')->row('name');
?>
<tr>
<td style="text-align:left;"><?=$medico?></td>
<td style="text-align:left;"><?=$areat?></td>
<td style="text-align:left"><?=$row->causa?></td>
<td style="text-align:left"><?=$fecha?></td>
</tr> 

</tbody>

 </table>
 <table class='r-b' style='width:100%;border-top:none' >
<tr>
<td style="font-size:8px"><strong><i>Dr</strong> <?=$doctor?></i></td>
<td style="font-size:8px"><i>Area <?=$area?></i></strong></td>
<td style="font-size:8px"><strong><i>Ex.</strong> <?=$exequatur?></i></td>
<td style="color:red;font-size:8px">
<?php 
$firma_doc="$id_doc-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>

 </td>
</tr>
</table>

<hr/>
<h3>RESPUESTA</h3>
<p>
<?=$row->response?>
</p>
<p>
<?php
$response_time = date("d-m-Y H:i:s", strtotime($row->response_time));
$user_response=$this->db->select('name,exequatur,area')->where('id_user',$row->user_response)->get('users')->row_array();
$doc2=$user_response['name'];
if($row->user_response !=0){
$response_text="respondida por doctor(a) $doc2";
}else{
$response_text="no hay respuesta";	
}
echo "<em>$response_text</em>";

$area2=$this->db->select('title_area')->where('id_ar',$user_response['area'])->get('areas')->row('title_area');
?>

</p>
<div id=''>
<table class='r-b' style='border-top:1px solid #DCDCDC;width:100%' >
<tr>
<td style="font-size:8px"><strong><i>Area <?=$area2?></i></strong></td>
<td style="font-size:8px"><strong><i>Ex. <?=$user_response['exequatur']?></strong> </i></td>
<td style="font-size:8px"><i> <?=$response_time;?></i> </td>
<td style="font-size:8px"><?php 
$firma_doc2="$row->user_response-1.png";

$signature2 = "assets/update/$firma_doc2";

if (file_exists($signature2)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc2?>"  />
<?php
} else {

}
?> </td>
</tr>
</table>

</div>