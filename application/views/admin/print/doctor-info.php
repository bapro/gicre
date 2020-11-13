<?php
$updated_by=$this->db->select('update_by,date_modif,id_user')->where('historial_id',$this->uri->segment(3))->get('h_c_marque_positivo')->row_array();
$perfil=$this->db->select('perfil')->where('id_user',$updated_by['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['area']="";
$this->data['updated_by']=$updated_by['update_by'];
$this->data['date_modif']=$updated_by['date_modif'];
$this->data['execuatur']="";
}
else {
$this->data['updated_by']=$updated_by['update_by'];
$this->data['date_modif']=$updated_by['date_modif'];
$this->data['area']=$this->db->select('title_area')->where('id_ar',$this->uri->segment(4))->get('areas')->row('title_area');
$this->data['execuatur']=$this->db->select('exequatur')->where('id_user',$updated_by['id_user'])->get('users')->row('exequatur');
}
?>