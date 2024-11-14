<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Conclusion_egreso_proced extends CI_Controller {
public function __construct()
{
parent::__construct();

  $this->load->library('form_validation'); 
}


public function saveProcedRealizados()
{
$is_found=$this->db->select('id')->where('id_procedimiento',$this->input->post('id'))->where('id_pat',$this->input->post('id_pat'))->get('hosp_proced_realizado')->row('id'); 
	if(!$is_found){
 $savedas = array(
'id_pat'=>$this->input->post('id_pat'),
'id_centro'  => $this->input->post('centro_id'),
'id_seg'=> $this->input->post('id_seg'),
'created_by' =>$this->input->post('id_user'),
'created_time' =>date("Y-m-d H:i:s"),
'id_procedimiento' =>$this->input->post('id')
   );
$this->db->insert("hosp_proced_realizado",$savedas);	
}
}


public function listProcedRealizados(){
	
	$i=1;
$id_pat= $this->input->post('id');
echo "<table  class='table'>
<tr  style='background:#428bca;color:white'>
";
$sqlabono = "select * from hosp_proced_realizado where id_pat=$id_pat";
$abonodata= $this->db->query($sqlabono);
foreach($abonodata->result() as $row)
{
$tarif=$this->db->select('sub_groupo, monto')->where('id_c_taf',$row->id_procedimiento)->get('centros_tarifarios')->row_array(); 
$sub_groupo=$tarif['sub_groupo'];
$monto=$tarif['monto'];
echo"
<tr >
<td>";echo $i;$i++; echo "</td>
<td>$sub_groupo</td>
<td>$monto</td>
<td><a style='cursor:pointer' class='delete-bono' id='$row->id' ><i class='fa fa-remove' style='color:red'></i></a></td>
</tr>
";
}
echo "
</table>
";
	
$url='href="'.base_url().'conclusion_egreso_proced/deleteProcedRealizados/"';
echo "<script>
$('.delete-bono').on('click', function(event) {
if (confirm('Lo quieres quitar ?'))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:$url,
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
listarProcedRealizados();
 
}
});
}
})
</script>
";	
	
}

 function deleteProcedRealizados(){
$where = array(
  'id'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->delete('hosp_proced_realizado');


}



}