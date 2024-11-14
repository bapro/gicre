<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Doctor_back_end extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
 
}


public function link_doctors_citas_to_doctor(){


$save_one= array(
'current_doctor' =>$this->input->post('iddoc'),
	'target_doctor' => $this->input->post('target_doctor'),
   'id_center' =>$this->input->post('idcentro')
	);

	$this->db->insert("medico_citas_linked_medicos",$save_one);


}



function listarLinkedDoc()
{
$current_doctor=$this->input->post('iddoc');
$idcentro=$this->input->post('idcentro');
echo "<table  class='table'>
<tr  style='background:#428bca;color:white'>
<th>Doctores Vinculados</th>
<th></th> 
</tr>


";
$sql = "select id, name, target_doctor FROM medico_citas_linked_medicos
JOIN users ON users.id_user = medico_citas_linked_medicos.target_doctor
 where id_center=$idcentro";
$query= $this->db->query($sql);
foreach($query->result() as $row)
{

echo"
<tr >
<td>$row->name</td>
<td><a style='cursor:pointer' class='remove-doc' id='$row->id' ><i class='fa fa-remove' style='color:red'></i></a></td>
</tr>
";
}
 echo "
</table>
";

$url='href="'.base_url().'doctor_back_end/remove_doc_target/"';
echo "<script>
$('.remove-doc').on('click', function(event) {
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
listarLinkedDoc();
 
}
});
}
})
</script>
";
}


 function remove_doc_target(){
$where = array(
  'id'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->delete('medico_citas_linked_medicos');


}






/*public function link_doctors_citas_to_doctor(){

	$where = array(
	'id_center' =>$this->input->post('idcentro')
	);

	$this->db->where($where);
	$this->db->delete('medico_citas_linked_medicos');


$save_one= array(

	'linked_doctors' => $this->input->post('iddoc'),
   'id_center' =>$this->input->post('idcentro')
	);

		$this->db->insert("medico_citas_linked_medicos",$save_one);



$linked_doctors=$this->input->post('linked_doctors');	
if($linked_doctors !=0){
for ($i = 0; $i < count($linked_doctors); ++$i ) {
    $values = $linked_doctors[$i];

	$save= array(
	'current_doctor' =>$this->input->post('iddoc'),
    'linked_doctors' => $values,daledaelo 
	'id_center' =>$this->input->post('idcentro')
	);

		$this->db->insert("medico_citas_linked_medicos",$save);
}
}

}*/




public function saveDoctorUpdate(){
$id_user  = $this->input->post('id_user');
$area=$this->input->post('especialidad');
$modify_date=date("Y-m-d H:i:s");
$seguro_medico  = $this->input->post('seguro_medico');

$data3 = array(
'name' =>$this->input->post('nombre'),
'correo' =>$this->input->post('email'),
 'area' =>$area,
 'cedula' =>$this->input->post('cedula'),
'cell_phone' => $this->input->post('primer_tel'),
'exequatur' => $this->input->post('exequatur'),
'link_pago' => $this->input->post('link_pago'),
'link_video_conf' => $this->input->post('link_video_conf'),
'update_date' => $modify_date,
'updated_by' => $id_user
  );

$this->model_admin->DeactivarUser($id_user,$data3);
//-------------------------------------------------------
$this->model_admin->deleteDocSeg($id_user);

for ($i = 0; $i < count($seguro_medico); ++$i ) {
    $seg = $seguro_medico[$i];

	$saves= array(
	'id_doctor' =>$id_user,
	'seguro_medico' => $seg
	);

	$this->model_admin->saveDoctorSeguro($saves);
}

 if($this->input->post('if-selloimage')==1){
			
  $extension = explode('.', $_FILES['selloimage']['name']);
$sello = rand() . '.' . $extension[1];
$destination = './assets/update/' . $sello;
move_uploaded_file($_FILES['selloimage']['tmp_name'], $destination);
			$save = array(
			'sello'=>$sello,
			'doc'=>$id_user
			);
			$this->db->insert("doctor_sello",$save);

		}
//-----------------------SAVE LOGO TIPO-----------------------------------------------------------
 if($this->input->post('if-logo-tipo-empty')==1){
      $extension = explode('.', $_FILES['logo-tipo']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/update/' . $logo;
move_uploaded_file($_FILES['logo-tipo']['tmp_name'], $destination);


$save = array(
'sello'=>$logo,
'doc'=>$id_user,
'dist'=>1
);
$this->db->insert("doctor_sello",$save);;
}

$msg = "<h4 id='deletesuccess'  style='text-align:center;color:green'>Usuario se edita con exito.</h4>";
$this->session->set_flashdata('success_msg', $msg);

redirect($_SERVER['HTTP_REFERER']);

}


public function getDocAgendaCentro(){
 $iddoc= $this->input->post('iddoc');
 $data['iddoc']=$iddoc;
 $idcentro= $this->input->post('idcentro');
 $data['perfil']= $this->input->post('perfil');
 $data['idcentro']=$idcentro;
$data['diaries']=$this->model_admin->getDiaries();
$data['centro_name']=$this->db->select('name')->where('id_m_c',$idcentro)
->get('medical_centers')->row('name');
$this->load->view('admin/users/load_doc_agenda_update',$data);
}


public function download_excel_file_model($excel_file){

$this->load->helper('download');
$excelFile = "$excel_file.xlsx";

$file = './assets/update/'.$excelFile;

//download file from directory
force_download($file, NULL);


}










}