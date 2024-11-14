<?php
$sql ="SELECT lab_id,id_doc FROM  h_c_groupo_lab ";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
$update="UPDATE laboratories SET id_user=$row->id_doc WHERE id=$row->lab_id";

$this->db->query($update);
 }

?>
