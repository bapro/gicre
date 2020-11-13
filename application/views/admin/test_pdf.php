<?php	
$this->padron_database = $this->load->database('padron',TRUE);
$last_bill_id=$this->db->select('idfacc,paciente')->order_by('idfacc','desc')->limit(1)->get('factura2')->row_array();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 $billing1=$this->model_admin->showBilling1($last_bill_id['idfacc']);
  foreach($billing1->result() as $row1)
 $paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3')->where('id_p_a',$row1->paciente)
 ->get('patients_appointments')->row_array();
 

 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
// Example of Image from data stream ('PHP rules')

$imgpat='<img  width="75" height="75"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	

echo $imgpat;

echo $last_bill_id;