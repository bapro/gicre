<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_abono extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
	
		 $this->ID_USER=$this->session->userdata('user_id');
		 $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		 $this->ID_PATIENT = $this->session->userdata('ID_PATIENT');
		   $this->ADMIN_POSITION_CENTRO = $this->session->userdata('admin_position_centro');
		  $this->PERFIL = $this->session->userdata('user_perfil');
		  //  if($this->session->userdata('is_logged_in')=='')
   // {
    // $this->session->set_flashdata('msg','Please Login to Continue');
   //  redirect('login/backTologin');
//}
	
		
	}
	
	
 
 
 
 
 function listarFacturaAbono(){
$i=1;
$total_bono=0;
$subtotal=0;
$id_facc=$this->input->post('id_facc');
$sqlsubt="select subtotal from factura where id2=$id_facc";
$querysubt=$this->db->query($sqlsubt);
foreach($querysubt->result()as $rowquerysubt){
$subtotal+=$rowquerysubt->subtotal;
}
$itbs1=$subtotal*0.18;
$totgeneral=$itbs1+$subtotal;
$totgeneral1=number_format($totgeneral,2);
echo"<table  class='table'>
<tr  style='background:#428bca;
color:white'>
<th></th>
<th>Total General</th>
<th>RD$$totgeneral1</th> 
</tr>
 <tr>
<th>#</th>
<th>FECHA</th>
<th>ABONO</th> 
</tr>

";
$sqlabono="select * from factura_privado_bono where id_fac=$id_facc order by fecha DESC";
$abonodata=$this->db->query($sqlabono);
foreach($abonodata->result()as $row){
$total_bono+=$row->bono;
$total_bono1=number_format($total_bono,2);
$fechabono=date('d-m-Y',strtotime($row->fecha));
$bono=number_format($row->bono,2);
echo"\n<tr >\n<td>";
echo $i;
$i++;
echo"</td>
<td>$fechabono</td>
<td>RD$$bono <a style='cursor:pointer' class='delete-bono' id='$row->id' ><i class='fa fa-remove text-danger'></i></a></td>
</tr>
";
}
echo"
<tr >
<td></td>
<th>Total</th>
<th>
RD$$total_bono
</th>
</tr>
";
$resta=$totgeneral-$total_bono;
$restaf=number_format($resta,2);
echo"
<tr class='bg-danger' style='
color:white'>
<td></td>
<th>Resta</th>
<th id='bonoResta' style='display:none'>$resta</th>
<th id='bonoRestaF'>RD$$restaf</th>
</tr>
";
echo "\n</table>\n";
$url='href="'.base_url().'Patient_abono/deleteAbono/"';
echo"<script>
$('.delete-bono').on('click', function(event) {

if (confirm('Lo quieres borrar ?'))
{
 
var el = this;

var del_id = $(this).attr('id');


$.ajax({

type:'POST',
url:$url,
data: {
id : del_id}
,
success:function(response) {

$(el).closest('tr').css('background','tomato');

$(el).closest('tr').fadeOut(800, function(){
 
$(this).remove();

}
);

listarFacturaAbono();

 
}

}
);

}

}
)
</script>
";
}
 
 
 
 
 
 
 function deleteAbono(){
$where=array('id'=>$this->input->post('id'));
$this->db->where($where);
$this->db->delete('factura_privado_bono');
}


function saveFacturaBono(){
$bonoResta=$this->input->post('bonoResta');
$bono=$this->input->post('bono');
$fechabono=date('Y-m-d',strtotime($this->input->post('fecha')));
if($bono>$bonoResta){
echo 2;
}
else{
$save=array('fecha'=>$fechabono,'bono'=>$bono,'id_fac'=>$this->input->post('id_facc'),'id_user'=>$this->ID_USER);
$this->db->insert("factura_privado_bono",$save);
if($this->db->affected_rows()>0){
echo 1;
}
else{
echo 0;
}
}
}
 
 
 
 
 
 
 
}