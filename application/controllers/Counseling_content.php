<?php defined('BASEPATH')OR exit('No direct script access allowed');class Counseling_content extends CI_Controller{public function __construct(){parent::__construct();}function paginationData(){$page=$this->input->get('page');$idUser=$this->input->get('idUser');$data['user_id']=$idUser;$data['id_emp']=$page;$per_page=1;$start=($page-1)*$per_page;$sql="select * from h_c_counsellig WHERE id=$page";$data['query_cnsling']=$this->db->query($sql);$data['action_id']=1;$data['idpatient']=$this->input->get('id_patient');$this->load->view('admin/historial-medical1/counseling/form',$data);$this->load->view('admin/historial-medical1/counseling/footer',$data);}function loadCounselingContent(){$user_id=$this->input->post('user_id');$idpatient=$this->input->post('idpatient');$data['user_id']=$user_id;$data['idpatient']=$idpatient;$sql_cnsling2="SELECT *  FROM  h_c_counsellig WHERE id_patient=0";$query_cnsling2=$this->db->query($sql_cnsling2);$data['query_cnsling']=$query_cnsling2;$this->load->view('admin/historial-medical1/counseling/counseling-content',$data);}function paginateCounseling(){$idpatient=$this->input->post('idpatient');$data['idpatient']=$idpatient;$data['user_id']=$this->input->post('user_id');$sql_cnsling="SELECT *  FROM  h_c_counsellig WHERE id_patient=$idpatient ORDER BY id DESC";$query_cnsling=$this->db->query($sql_cnsling);$data['query_cnsling']=$query_cnsling;$data['nb_cnsling']=$query_cnsling->num_rows();$this->load->view('admin/historial-medical1/counseling/paginate-number',$data);}function material_delivery(){$idpatient=$this->input->post('idpatient');if($this->input->post('value')){$save=array('description'=>$this->input->post('value'),'id_patient'=>$idpatient,'date_inserted'=>date('Y-m-d H:i:s'),'id_user'=>$this->input->post('user_id'));$this->db->insert("h_c_counsellig_mateterials",$save);}$i=1;$sql_cnsling="SELECT *  FROM  h_c_counsellig_mateterials WHERE id_patient=$idpatient ORDER BY id DESC";$query=$this->db->query($sql_cnsling);$count=$query->num_rows();echo '<table class="table">
<tr>
<th>#</th>
<th>DESCRIPCION</th>
<th>OPERADOR</th>
<th>FECHA</th>
<th></th>
</tr>';foreach($query->result()as $row){$fecha=date('d-m-Y H:i:s',strtotime($row->date_inserted));$user=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');echo"\n<tr >\n<td>";echo $i;$i++;echo"</td>
<td>$row->description</td>
<td>$user</td>
<td>$fecha</td>
<td><a style='cursor:pointer' class='delete-material' id='$row->id' ><i class='fa fa-remove' style='color:red'></i></a></td>
</tr>
";}echo "</table>";$url='href="'.base_url().'counseling_content/remove_material_delivery"';echo"<script>
$('.delete-material').on('click', function(event) {
if (confirm('Lo quieres borrar ?'))
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

}
});
}
})
</script>
";}function remove_material_delivery(){$where=array('id'=>$this->input->post('id'));$this->db->where($where);$this->db->delete('h_c_counsellig_mateterials');}}