<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cancel_table extends CI_Controller {
public function __construct()
{
parent::__construct();
   $this->ID_USER =$this->session->userdata('user_id');
   	$this->clinical_history = $this->load->database('clinical_history', TRUE);
	$this->hospitalization_emgergency = $this->load->database('hospitalization_emgergency',TRUE);
}


function showReasonTexaraCancelation(){
$table = $this->input->post('table');
$id_table = $this->input->post('id_table');
$div = $this->input->post('div');
echo "<input id='table-to-cancel' type='hidden' value='$table' />";
echo "<strong><em>Cancelar registro #$id_table</em></strong>";
echo "
<div class='form-floating mb-3'>
<textarea class='form-control cl-ord-med-study' id='reasonToCancelTable' placeholder='Escribir porque quiere cancelar este registro' style='width: 100%'></textarea>
<label for='ordenMedicaEstNota'>Escribir porque quiere cancelar este registro</label>
</div>
<button class='btn btn-sm btn-danger float-end m-1 anular-$div'>Anular</button>
<button class='btn btn-sm btn-success float-end m-1 save-$div' id='$id_table'>Guardar</button>

</div>

";

}

function table()
{
    $id = $this->input->post('id');
	$table = $this->input->post('tableName');
	$database = $this->input->post('database');
	$field = $this->input->post('field');
	$value = $this->input->post('value');
  $this->$database->query("UPDATE $table SET $field = $value WHERE id=$id");
  
  
  $data = array( 
                'id_table' => $id,
				'table_name' => $this->input->post('tableName'),
                 'reason' => $this->input->post('reasonToCancelTable'),
                'canceled_by' => $this->ID_USER,
                 'canceled_time' => date("Y-m-d H:i:s"),
               
               
             );
            
           $this->db->insert('cancel_reasons_tables',$data);
 
}





}