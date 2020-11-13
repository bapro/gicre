<?php 
$user=$this->db->select('name,is_log_in')->where('id_user',$id)->get('users')->row_array();
$name=$user['name'];
$is_log_in=$user['is_log_in'];
if($is_log_in==1){$login= '<span style=" height: 12px;width: 12px; background-color: green; border-radius: 50%; display: inline-block;"></span>';}else{$login=  '<span style=" height: 12px;width: 12px; background-color: gray; border-radius: 50%; display: inline-block;"></span>';}
echo "{$name} {$login}";
?>
