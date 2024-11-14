<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Factura extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_admin');
        $this->load->model('navigation/account_demand_model');
    }
    function SaveBill() {
        if ($this->input->post('numauto') != "" && $this->input->post('autopor') != "" && $this->input->post('fecha') != "" && $this->input->post('service') != "" && $this->input->post('cant') != "" && $this->input->post('prec') != "" && $this->input->post('servField') != "") {
            $response['status'] = 0;
            $response['message'] = "";
            $query = $this->db->get_where('factura_num', array('centro' => $this->input->post('centro_medico')));
            if ($query->num_rows() == 0) {
                $save = array('centro' => $this->input->post('centro_medico'), 'num' => 1);
                $idnum = $this->model_admin->SaveBillNum($save);
            } else {
                $num = $this->db->select('num')->where("centro", $this->input->post('centro_medico'))->order_by('id', 'desc')->limit(1)->get('factura_num')->row('num');
                $num = $num + 1;
                $save = array('centro' => $this->input->post('centro_medico'), 'num' => $num);
                $idnum = $this->model_admin->SaveBillNum($save);
            }
            $num = $this->db->select('centro,num')->where('id', $idnum)->get('factura_num')->row_array();
            $num1 = $num['centro'];
            $num2 = $num['num'];
            $num3 = "$num1-$num2";
            $exequatur = $this->db->select('exequatur')->where('id_user', $this->input->post('medico'))->get('users')->row('exequatur');
            $query2 = $this->db->get_where('factura_num', array('exequatur' => $exequatur));
            if ($query2->num_rows() == 0) {
                $save = array('exequatur' => $exequatur, 'num' => 1);
                $idnum2 = $this->model_admin->SaveBillNum($save);
            } else {
                $num = $this->db->select('num')->where("exequatur", $exequatur)->order_by('id', 'desc')->limit(1)->get('factura_num')->row('num');
                $num = $num + 1;
                $save = array('exequatur' => $exequatur, 'num' => $num);
                $idnum2 = $this->model_admin->SaveBillNum($save);
            }
            $exnum = $this->db->select('exequatur,num')->where('id', $idnum2)->get('factura_num')->row_array();
            $exnum1 = $exnum['exequatur'];
            $exnum2 = $exnum['num'];
            $exnum3 = "$exnum1-$exnum2";
            $insert_date = date("Y-m-d H:i:s");
            $filter_date = date("Y-m-d", strtotime($this->input->post('fecha')));
            $save2 = array('medico' => $this->input->post('medico'), 'area' => $this->input->post('area'), 'centro_medico' => $this->input->post('centro_medico'), 'seguro_medico' => $this->input->post('seguro_medico'), 'codigoprestado' => $this->input->post('codigoprestado'), 'paciente' => $this->input->post('patient_id'), 'fecha' => $this->input->post('fecha'), 'filter_date' => $filter_date, 'numauto' => $this->input->post('numauto'), 'autopor' => $this->input->post('autopor'), 'comment' => $this->input->post('comment'), 'numfac' => $exnum3, 'numfac2' => $num3, 'inserted_by' => $this->input->post('inserted_by'), 'inserted_time' => $insert_date, 'update_date' => $insert_date, 'updated_by' => $this->input->post('inserted_by'), 'id_rdv' => $this->input->post('id_apoint'));
            $last_bill_id = $this->model_admin->SaveBill2($save2);
            if ($last_bill_id) {
                $response['status'] = $last_bill_id;
                $response['message'] = '';
                $fecha_fac = date("d-m-Y H:i", strtotime($this->input->post('fecha')));
                $this->session->set_userdata('last_bill_id', $last_bill_id);
                $this->session->set_userdata('medico', $this->input->post('medico'));
                $this->session->set_userdata('factura_inserted_by', $this->input->post('inserted_by'));
                $centro_type = $this->db->select('type')->where('id_m_c', $this->input->post('centro_medico'))->get('medical_centers')->row('type');
                $this->session->set_userdata('centro_medico', $this->input->post('centro_medico'));
                $this->session->set_userdata('centro_type', $centro_type);
                $this->session->set_userdata('is_admin', $this->input->post('is_admin'));
                $exequatur = $this->db->select('exequatur')->where('id_user', $this->input->post('medico'))->get('users')->row('exequatur');
                $service = $this->input->post('service');
                $cantidad = $this->input->post('cantidad');
                $preciouni = $this->input->post('preciouni');
                $subtotal = $this->input->post('subtotal');
                $totalpaseg = $this->input->post('totalpaseg');
                $descuento = $this->input->post('descuento');
                $totpapat = $this->input->post('totpapat');
                $medico = $this->input->post('medico');
                $seguro_medico = $this->input->post('seguro_medico');
                for ($i = 0;$i < count($service);++$i) {
                    $serv = $service[$i];
                    $cant = $cantidad[$i];
                    $pre = $preciouni[$i];
                    $sub = $subtotal[$i];
                    $totpas = $totalpaseg[$i];
                    $desc = $descuento[$i];
                    $totpap = $totpapat[$i];
                    $medico2 = $medico[$i];
                    $seguro = $seguro_medico[$i];
                    $save = array('service' => $serv, 'cantidad' => $cant, 'preciouni' => $pre, 'subtotal' => $sub, 'totalpaseg' => $totpas, 'descuento' => $desc, 'totpapat' => $totpap, 'id2' => $last_bill_id, 'pat_id' => $this->input->post('patient_id'), 'area_id' => $this->input->post('area'), 'medico2' => $medico, 'seguro' => $seguro_medico, 'center_id' => $this->input->post('centro_medico'), 'filter' => $filter_date, 'created_by' => $this->input->post('inserted_by'), 'inserted_time' => $insert_date, 'updated_time' => $insert_date, 'updated_by' => $this->input->post('inserted_by'), 'fecha_fac' => $fecha_fac);
                    $this->model_admin->SaveBill($save);
                    if ($this->db->affected_rows() == 0) {
                        $response['status'] = 2;
                        $response['message'] = "la inserción fallo (id:$last_bill_id)";
                        $this->model_admin->delete_factura2($last_bill_id);
                        $this->model_admin->delete_factura($last_bill_id);
                    }
                }
                $this->model_admin->DeleteEmptyBill();
            } else {
                $response['status'] = 1;
                $response['message'] = 'la inserción fallo!';
            }
        } else {
            $response['status'] = 3;
            $response['message'] = "Los campos con bordillos rojos son obligatorios !";
        }
        echo json_encode($response);
    }
    function factura_table_view() {
        $data['billings2'] = $this->model_admin->ViewFact2($this->input->post('id_facc'));
        $billings = $this->model_admin->ViewFact($this->input->post('id_facc'));
        $data['billings'] = $billings;
        $data['count'] = count($billings);
        $data['idfacc'] = $this->input->post('id_facc');
        $data['is_admin'] = $this->input->post('is_admin');
        $data['user'] = $this->input->post('user');
        $data['identificar'] = $this->input->post('identificar');
        $data['id_patient'] = $this->input->post('id_patient');
        $patient = $this->db->select('plan,seguro_medico')->where('id_p_a', $this->input->post('id_patient'))->get('patients_appointments')->row_array();
        $tarif = $this->db->select('centro_medico,medico,seguro_medico,area')->where('idfacc', $this->input->post('id_facc'))->get('factura2')->row_array();
        $data['centro_in_fac'] = $tarif['centro_medico'];
        $data['medico'] = $tarif['medico'];
        $data['seguro'] = $tarif['seguro_medico'];
        $data['area_id'] = $tarif['area'];
        $data['centro'] = $this->db->select('name')->where('id_m_c', $tarif['centro_medico'])->get('medical_centers')->row('name');
        $data['serv_centro'] = $this->model_admin->Service_centro($tarif['centro_medico'], $tarif['seguro_medico']);
        $val = array('id_doctor' => $tarif['medico'], 'id_seguro' => $tarif['seguro_medico'], 'plan' => $patient['plan']);
        $data['serv'] = $this->model_admin->Serviciomssm($val);
        if ($patient['seguro_medico'] != $tarif['seguro_medico']) {
            $data['seguro_as_been_changed'] = '<span style="color:red">El seguro del paciente ha sido cambiado, esa factura pertenece al seguro anterior. Es recomendable de crear otra factura con el nuevo seguro.<br/></span>';
        } else {
            $data['seguro_as_been_changed'] = '';
        }
        $this->load->view('medico/billing/bill/facturaTableView', $data);
    }
    function billing_print_view1() {
        $this->session->set_userdata('last_bill_id', $this->uri->segment(3));
        $get = $this->db->select('medico,centro_medico')->where('idfacc', $this->uri->segment(3))->get('factura2')->row_array();
        $this->session->set_userdata('medico', $get['medico']);
        $this->session->set_userdata('centro_medico', $get['centro_medico']);
        $centro_type = $this->db->select('type')->where('id_m_c', $get['centro_medico'])->get('medical_centers')->row('type');
        $this->session->set_userdata('centro_type', $centro_type);
        $this->session->set_userdata('is_admin', $this->uri->segment(4));
        redirect('factura/billing_print_view');
    }
    function UpdateBillHead() {
        $filter_date = date("Y-m-d", strtotime($this->input->post('fechaEdit')));
        $update_date = date("Y-m-d H:i:s");
        $save2 = array('fecha' => $this->input->post('fechaEdit'), 'filter_date' => $filter_date, 'numauto' => $this->input->post('numauto'), 'autopor' => $this->input->post('autopor'), 'updated_by' => $this->input->post('user'), 'comment' => $this->input->post('comment'), 'update_date' => $update_date);
        $this->model_admin->UpdateBill2($this->input->post('id_facc'), $save2);
        $where = array('id2' => $this->input->post('id_facc'));
        $update = array('filter' => $filter_date, 'fecha_fac' => $this->input->post('fechaEdit'), 'updated_by' => $this->input->post('user'), 'updated_time' => $update_date);
        $this->db->where($where);
        $this->db->update("factura", $update);
    }
    function updateBillTable() {
        $data['increment_select2'] = $this->input->post('id_fact');
        $data['billings'] = $this->model_admin->updateBillTable($this->input->post('id_fact'));
        $tarif = $this->db->select('centro_medico,medico,seguro_medico,paciente')->where('idfacc', $this->input->post('id_facc'))->get('factura2')->row_array();
        $data['centro_in_fac'] = $tarif['centro_medico'];
        $data['edit_tarifario_centro'] = $this->model_admin->tarifario_centro_bill($tarif['centro_medico']);
        $data['idfacc'] = $this->input->post('id_facc');
        $data['is_admin'] = $this->input->post('is_admin');
        $data['user'] = $this->input->post('user');
        $data['identificar'] = $this->input->post('identificar');
        if ($tarif['seguro_medico'] == 11) {
            $val = array('id_doctor' => $tarif['medico'], 'id_seguro' => $tarif['seguro_medico'], 'id_cm' => $tarif['centro_medico']);
            $data['serv'] = $this->model_admin->ServiciomssmPrivado($val);
            $this->load->view('medico/billing/bill/seguro-privado/updateBillTable', $data);
        } else {
            $id_p_a = $tarif['paciente'];
            $plan = $this->db->select('plan')->where('id_p_a', $id_p_a)->get('patients_appointments')->row('plan');
            $doc_seg = array('id_doctor' => $tarif['medico'], 'id_seguro' => $tarif['seguro_medico'], 'plan' => $plan);
            $data['serv'] = $this->model_admin->Serviciomssm($doc_seg);
            $this->load->view('medico/billing/bill/updateBillTable', $data);
        }
    }
    function get_service_precio() {
        $id = $this->input->post('id_mssm1');
        $doctorid = $this->input->post('doctorid');
        $data['precio'] = $this->db->select('monto')->where('id_tarif', $id)->get('tarifarios')->row('monto');
        $this->load->view('admin/billing/bill/get-service-precio', $data);
    }
    function get_service_precio_centro() {
        $id = $this->input->post('id_mssm1');
        $precio = $this->db->select('monto')->where('id_c_taf', $id)->get('centros_tarifarios')->row('monto');
        echo $precio;
    }
    function UpdateBill1() {
        $update_date = date("Y-m-d H:i:s");
        $save2 = array('updated_by' => $this->input->post('updated_by'), 'update_date' => $update_date);
        $this->model_admin->UpdateBill2($this->input->post('idfacc'), $save2);
        if ($this->input->post('action') == 1) {
            $save = array('service' => $this->input->post('service'), 'cantidad' => $this->input->post('cantidad'), 'preciouni' => $this->input->post('preciouni'), 'subtotal' => $this->input->post('subtotal'), 'totalpaseg' => $this->input->post('totalpaseg'), 'descuento' => $this->input->post('descuento'), 'totpapat' => $this->input->post('totpapat'), 'pat_id' => $this->input->post('id_patient'), 'medico2' => $this->input->post('medico'), 'area_id' => $this->input->post('area_id'), 'seguro' => $this->input->post('seguro'), 'center_id' => $this->input->post('centro'), 'filter' => date('Y-m-d'), 'id2' => $this->input->post('idfacc'), 'updated_by' => $this->input->post('updated_by'), 'updated_time' => $update_date, 'created_by' => $this->input->post('updated_by'), 'inserted_time' => $update_date, 'fecha_fac' => date("d-m-Y H:i"));
            $this->model_admin->SaveBill($save);
        } else {
            $save = array('service' => $this->input->post('service'), 'cantidad' => $this->input->post('cantidad'), 'preciouni' => $this->input->post('preciouni'), 'subtotal' => $this->input->post('subtotal'), 'totalpaseg' => $this->input->post('totalpaseg'), 'descuento' => $this->input->post('descuento'), 'totpapat' => $this->input->post('totpapat'), 'updated_by' => $this->input->post('updated_by'), 'updated_time' => $update_date,);
            $this->model_admin->UpdateBill1($this->input->post('idfac'), $save);
            $id2 = $this->db->select('id2')->where('idfac', $this->input->post('idfac'))->get('factura')->row('id2');
            $idfacc = $this->input->post('idfacc');
            $sql = "SELECT sum(subtotal) as t1, sum(totalpaseg) as t2, sum(totpapat) as t3 FROM factura WHERE id2=$idfacc";
            $query = $this->db->query($sql);
            foreach ($query->result() as $row) $update = array('tsubtotal' => $row->t1, 'totpagseg' => $row->t2, 'totpagpa' => $row->t3);
            $where = array('id_f' => $this->input->post('idfacc'));
            $this->db->where($where);
            $this->db->update("invoice_ars_claims", $update);
        }
    }
    function delete_factura() {
        $this->model_admin->delete_factura3($this->input->post('id'));
    }
    function listarFacturaAbono() {
        $i = 1;
        $total_bono = 0;
        $subtotal = 0;
        $id_facc = $this->input->post('id_facc');
        $sqlsubt = "select subtotal from factura where id2=$id_facc";
        $querysubt = $this->db->query($sqlsubt);
        foreach ($querysubt->result() as $rowquerysubt) {
            $subtotal+= $rowquerysubt->subtotal;
        }
        $itbs1 = $subtotal * 0.18;
        $totgeneral = $itbs1 + $subtotal;
        $totgeneral1 = number_format($totgeneral, 2);
        echo "<table  class='table'>
<tr  style='background:#428bca;color:white'>
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
        $sqlabono = "select * from factura_privado_bono where id_fac=$id_facc order by fecha DESC";
        $abonodata = $this->db->query($sqlabono);
        foreach ($abonodata->result() as $row) {
            $total_bono+= $row->bono;
            $total_bono1 = number_format($total_bono, 2);
            $fechabono = date('d-m-Y', strtotime($row->fecha));
            $bono = number_format($row->bono, 2);
            echo "\n<tr >\n<td>";
            echo $i;
            $i++;
            echo "</td>
<td>$fechabono</td>
<td>RD$$bono <a style='cursor:pointer' class='delete-bono' id='$row->id' ><i class='fa fa-remove' style='color:red'></i></a></td>
</tr>
";
        }
        echo "
<tr >
<td></td>
<th>Total</th>
<th>
RD$$total_bono
</th>
</tr>
";
        $resta = $totgeneral - $total_bono;
        $restaf = number_format($resta, 2);
        echo "
<tr style='background:red;color:white'>
<td></td>
<th>Resta</th>
<th id='bonoResta' style='display:none'>$resta</th>
<th id='bonoRestaF'>RD$$restaf</th>
</tr>
";
        echo "\n</table>\n";
        $url = 'href="' . base_url() . 'factura/deleteAbono/"';
        echo "<script>
$('.delete-bono').on('click', function(event) {
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
listarFacturaAbono();
 
}
});
}
})
</script>
";
    }
    function deleteAbono() {
        $where = array('id' => $this->input->post('id'));
        $this->db->where($where);
        $this->db->delete('factura_privado_bono');
    }
    function saveFacturaBono() {
        $bonoResta = $this->input->post('bonoResta');
        $bono = $this->input->post('bono');
        $fechabono = date('Y-m-d', strtotime($this->input->post('fecha')));
        if ($bono > $bonoResta) {
            echo 2;
        } else {
            $save = array('fecha' => $fechabono, 'bono' => $bono, 'id_fac' => $this->input->post('id_facc'), 'id_user' => $this->input->post('id_user'));
            $this->db->insert("factura_privado_bono", $save);
            if ($this->db->affected_rows() > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }
    function factura_table_view_privado() {
        $data['billings2'] = $this->model_admin->ViewFact2($this->input->post('id_facc'));
        $billings = $this->model_admin->ViewFact($this->input->post('id_facc'));
        $data['billings'] = $billings;
        $data['count'] = count($billings);
        $data['idfacc'] = $this->input->post('id_facc');
        $data['is_admin'] = $this->input->post('is_admin');
        $data['user'] = $this->input->post('user');
        $data['identificar'] = $this->input->post('identificar');
        $data['id_patient'] = $this->input->post('id_patient');
        $tarif = $this->db->select('centro_medico,medico,seguro_medico,area')->where('idfacc', $this->input->post('id_facc'))->get('factura2')->row_array();
        $data['centro_in_fac'] = $tarif['centro_medico'];
        $data['medico'] = $tarif['medico'];
        $data['seguro'] = $tarif['seguro_medico'];
        $data['area_id'] = $tarif['area'];
        $data['centro'] = $this->db->select('name')->where('id_m_c', $tarif['centro_medico'])->get('medical_centers')->row('name');
        $data['serv_centro'] = $this->model_admin->Service_centro($tarif['centro_medico'], $tarif['seguro_medico']);
        $val = array('id_doctor' => $tarif['medico'], 'id_seguro' => $tarif['seguro_medico'], 'id_cm' => $tarif['centro_medico']);
        $data['serv'] = $this->model_admin->ServiciomssmPrivado($val);
        $this->load->view('medico/billing/bill/seguro-privado/facturaTableView', $data);
    }
    function loadComprobanteSelect() {
        $data['id_p_a'] = $this->input->post('id_p_a');
        $data['idfacc'] = $this->input->post('idfacc');
        $data['id_user'] = $this->input->post('id_user');
        $this->load->view('medico/billing/bill/seguro-privado/comprobante', $data);
    }
    function deleted_fac() {
        $data['id_fac'] = $this->uri->segment(3);
        $data['user'] = $this->uri->segment(4);
        $data['identificar'] = $this->uri->segment(5);
        $data['count'] = $this->uri->segment(6);
        $this->load->view('medico/billing/bill/delete-fac', $data);
    }
    function billing_print_view() {
        $idfacc = $this->session->userdata['last_bill_id'];
        $patient = $this->db->select('paciente,id_rdv')->where('idfacc', $idfacc)->get('factura2')->row_array();
        $patient_id = $patient['paciente'];
        $id_rdv = $patient['id_rdv'];
        $medico = $this->session->userdata['medico'];
        $centro_medico = $this->session->userdata['centro_medico'];
        $centro_type = $this->session->userdata['centro_type'];
        $data['is_admin'] = $this->session->userdata['is_admin'];
        $identificar = $this->input->get('identificar');
        $data['idfacc'] = $idfacc;
        $data['centro_type'] = $centro_type;
        $filter_date = $this->db->select('insert_date')->where('p_id', $patient_id)->where('user_id', $medico)->where('centro_medico', $centro_medico)->order_by('insert_date', 'desc')->limit(1)->get('h_c_diagno_def_link')->row('insert_date');
        $data['show_diagno_pat'] = $this->model_admin->show_diagno_pat($patient_id, $medico, $centro_medico, $filter_date);
        $diagnos = $this->db->select('procedimiento,otros_diagnos')->where('historial_id', $patient_id)->where('id_user', $medico)->where('centro_medico', $centro_medico)->order_by('id_cdia', 'desc')->get('h_c_conclusion_diagno')->row_array();
        $data['procedimiento'] = $diagnos['procedimiento'];
        $data['otros_diagnos'] = $diagnos['otros_diagnos'];
        $data['billing1'] = $this->model_admin->showBilling1($idfacc);
        $data['billing2'] = $this->model_admin->showBilling2($idfacc);
        if ($centro_type == "privado") {
            $this->load->view('medico/billing/bill/print_view', $data);
        } else {
            $this->load->view('medico/billing/bill/centro/print_view', $data);
        }
        $this->load->view('medico/billing/bill/print_view_data', $data);
    }
    function procedimientoTarif() {
        $perfil = $this->db->select('perfil')->where('id_user', $this->input->post('user_id'))->get('users')->row('perfil');
        $data['user_id'] = $this->input->post('user_id');
        $data['patient'] = $this->input->post('id_historial');
        $data['seguro'] = $this->input->post('seguro');
        $data['autoNumber'] = $this->input->post('autoNumber');
        $data['perfil'] = $perfil;
        if ($perfil == "Medico") {
            $data['centro_medico_tarif'] = $this->model_admin->view_doctor_centro($this->input->post('user_id'));
            $this->load->view('factura/h_c_procedimiento_tarif', $data);
        } elseif ($perfil == "Asistente Medico") {
            $data['centro_medico_tarif'] = $this->model_admin->view_as_doctor_centro($this->input->post('user_id'));
            $this->load->view('factura/h_c_procedimiento_tarif_as', $data);
        } else {
            $data['centro_medico_tarif'] = $this->account_demand_model->getCentroMedico();
            $this->load->view('factura/h_c_procedimiento_tarif_as', $data);
        }
    }
    function factAmb() {
        $perfil = $this->input->post('perfil');
        $data['id_user'] = $this->input->post('user_id');
        $data['perfil'] = $perfil;
        $data['seguro_id'] = $this->input->post('seguro');
        $data['id_p_a'] = $this->input->post('id_p_a');
        $data['controller'] = $this->input->post('controller');
        $data['seguroName'] = $this->input->post('seguroName');
        if ($perfil == "Medico") {
            $data['centro_medico'] = $this->model_admin->view_doctor_centro($this->input->post('user_id'));
        } elseif ($perfil == "Asistente Medico") {
            $data['centro_medico'] = $this->model_admin->view_as_doctor_centro($this->input->post('user_id'));
        } else {
            $data['centro_medico'] = $this->account_demand_model->getCentroMedico();
        }
        $this->load->view('factura/ambulatoria', $data);
    }
    function paginationProcedFacData__() {
        $data['user_id'] = $this->input->post('user_id');
        $data['id_doc'] = $this->input->post('id_doc');
        $data['patient'] = $this->input->post('patient');
        $this->load->view('factura/pagination-number', $data);
    }
    function paginationProcedFacDataDefault() {
        $user_id = $this->input->get('user_id');
        $id_doc = $this->input->get('id_doc');
        $patient = $this->input->get('patient');
        $autoNomber = $this->db->select('autoNomber')->where('user', $id_doc)->where('patient', $patient)->order_by('id', 'desc')->limit(1)->get('h_c_procedimiento_tarif')->row('autoNomber');
        if ($autoNomber) {
            $sql = "SELECT * FROM h_c_procedimiento_tarif WHERE autoNomber=$autoNomber ORDER BY id DESC";
            $this->paginationProcedFacData_($user_id, $patient, $sql, $autoNomber);
        } else {
            echo "<em>no hay presupuesto</em>";
        }
    }
    function paginationProcedFacData() {
        $user_id = $this->input->get('user_id');
        $patient = $this->input->get('patient');
        $pageNum = $this->input->get('page');
        $sql = "SELECT * FROM h_c_procedimiento_tarif WHERE autoNomber=$pageNum";
        $this->paginationProcedFacData_($user_id, $patient, $sql, $pageNum);
    }
    function paginationProcedFacData_($user_id, $patient, $sql, $autoNum) {
        $data['user_id'] = $user_id;
        $data['patient'] = $patient;
        $data['autoNum'] = $autoNum;
        $procedInfo = $this->db->select('conclucion_diag,centro,inserted_by,time_created,user')->where('autoNomber', $autoNum)->where('id_cd', 0)->get('h_c_procedimiento_tarif')->row_array();
        $data['insertedBy'] = $this->db->select('name')->where('id_user', $procedInfo['inserted_by'])->get('users')->row('name');
        $data['conclucion_diag'] = $procedInfo['conclucion_diag'];
        $data['centro'] = $procedInfo['centro'];
        $data['docUs'] = $procedInfo['user'];
        $data['timeCrt'] = date("d-m-Y H:i:s", strtotime($procedInfo['time_created']));
        $data['query'] = $this->db->query($sql);
        $this->load->view('factura/pagination-data', $data);
    }
    function editFacproced() {
        $user_id = $this->input->post('user_id');
        $autoNomber = $this->input->post('autoNomber');
        $data = array('procedimiento' => $this->input->post('edit-proced'), 'conclucion_diag' => $this->input->post('edit-conc'), 'precio' => $this->input->post('edit-precio'), 'updated_by' => $user_id, 'updated_time' => date("d-m-Y H:i:s"));
        $where = array('id' => $this->input->post('id'));
        $this->db->where($where);
        $this->db->update("h_c_procedimiento_tarif", $data);
        $sql = "SELECT * FROM h_c_procedimiento_tarif WHERE autoNomber=$autoNomber";
        $query = $this->db->query($sql);
        $tot = 0;
        foreach ($query->result() as $row) {
            $tot+= $row->precio;
        }
        $response['total'] = "RD$" . number_format($tot, 2);
        echo json_encode($response);
    }
    function saveNewTarifMedico() {
        $save = array('centro' => $this->input->post('centro'), 'conclucion_diag' => $this->input->post('conc'), 'procedimiento' => $this->input->post('proced'), 'patient' => $this->input->post('patient'), 'user' => $this->input->post('id_doc'), 'inserted_by' => $this->input->post('user_id'), 'updated_by' => $this->input->post('user_id'), 'time_created' => date("Y-m-d H:i:s"), 'updated_time' => date("Y-m-d H:i:s"), 'id_cd' => 0, 'precio' => $this->input->post('precio'), 'autoNomber' => $this->input->post('autoNomber'));
        $this->db->insert("h_c_procedimiento_tarif", $save);
    }
    public function getProcedMonto() {
        $monto = $this->db->select('monto')->where('id_tarif', $this->input->post('id'))->get('tarifarios')->row('monto');
        echo $monto;
    }
    public function save_hist_tarif_pro() {
        $user_id = $this->input->post('user_id');
        $patient = $this->input->post('id_historial');
        $id_cd = $this->input->post('id_cd');
        $data['patient'] = $patient;
        $data['user_id'] = $user_id;
        $data['id_cd'] = $id_cd;
        $data['centro'] = $this->input->post('centro');
        $save = array('id_tarif' => $this->input->post('id_tarif'), 'centro' => $this->input->post('centro'), 'patient' => $patient, 'user' => $user_id, 'time_created' => date("Y-m-d H:i:s"), 'id_cd' => $id_cd);
        $this->db->insert("h_c_procedimiento_tarif", $save);
        $sql = "SELECT * FROM h_c_procedimiento_tarif WHERE patient=$patient AND user=$user_id AND id_cd=$id_cd ORDER BY id DESC";
        $data['query'] = $this->db->query($sql);
        $this->load->view('admin/historial-medical1/conclusion/h_c_procedimiento_tarif', $data);
    }
    public function loadProcedimientoFacData() {
        $id_cd = $this->input->post('id_cd');
        $user_id = $this->input->post('user_id');
        $patient = $this->input->post('patient');
        $data['patient'] = $patient;
        $data['user_id'] = $user_id;
        $data['id_cd'] = $id_cd;
        $data['centro'] = $this->input->post('centro');
        $sql = "SELECT * FROM h_c_procedimiento_tarif WHERE id_cd=$id_cd";
        $data['query'] = $this->db->query($sql);
        $this->load->view('admin/historial-medical1/conclusion/h_c_procedimiento_tarif', $data);
    }
    function loadProcedimientoDoc() {
        $id_doc = $this->input->post('id_doc');
        $seguro = $this->input->post('seguro');
        $sqlpt = "select id_tarif, procedimiento,monto FROM tarifarios WHERE id_seguro=$seguro AND id_doctor=$id_doc GROUP BY procedimiento";
        $proct = $this->db->query($sqlpt);
        foreach ($proct->result() as $rowTaf) {
            echo '<option value="' . $rowTaf->id_tarif . '">' . $rowTaf->procedimiento . '</option>';
        }
    }
    function getCentroType() {
        $type = $this->db->select('type')->where('id_m_c', $this->input->post('id_centro'))->get('medical_centers')->row('type');
        echo $type;
    }
    function get_date_range_seguro_patient() {
        $id_doc = $this->input->get('id_doc');
        $id_centro = $this->input->get('id_centro');
        $seguro = $this->input->get('seguro');
        $sort = $this->input->get('sort');
        if ($sort == 0) {
            $order_by = "ORDER BY filter DESC";
        } else {
            $order_by = "ORDER BY filter ";
        }
        if ($id_doc) {
            $where = "&& medico2=$id_doc";
        } else {
            $where = "&& center_id=$id_centro";
        }
        echo "<option value='' ></option>";
        $sqlpl = "SELECT filter from factura where seguro=$seguro && seguro !=11 $where group by filter $order_by";
        $queryp = $this->db->query($sqlpl);
        foreach ($queryp->result() as $row) {
            $date = date("d-m-Y", strtotime($row->filter));
            echo "<option value='$row->filter'>$date</option>";
        }
    }
    function get_fac_date_report() {
        $checkval = $this->input->get('checkval');
        $centro = $this->input->get('centro');
        $doctor = $this->input->get('doctor');
        $desde = $this->input->get('desde');
        $hasta = $this->input->get('hasta');
        $perfil = $this->input->get('perfil');
        $id_user = $this->input->get('id_user');
        $data1 = array('doctor' => $doctor,
		'centro' => $centro,
		'desde' => $desde,
		'hasta' => $hasta,
		'perfil' => $perfil,
		'id_user' => $id_user,
		'checkval' => $checkval
		);
        if ($perfil == "Admin") {
            $data['controller'] = "admin";
        } else {
            $data['controller'] = "medico";
        }
        $data['checkval'] = $checkval;
        $data['desde'] = $desde;
        $data['hasta'] = $hasta;
        $data['perfil'] = $perfil;
        $data['id_user'] = $id_user;
        $data['centro'] = $centro;
        $data['doctor'] = $doctor;
        if ($checkval == "privado") {
            $data['title'] = "REPOTE DE FACTURAS PACIENTES PRIVADOS";
            $data['display'] = "style='display:none'";
            $data['thnum'] = 6;
            if ($doctor == "") {
                $data['display_report'] = $this->model_admin->get_fac_date_report_privado($data1);
            } else {
                $data['display_report'] = $this->model_admin->get_fac_date_report_centro_privado($data1);
            }
        } else {
            $data['title'] = "REPOTE DE FACTURAS GENERAL";
            $data['display'] = "";
            $data['thnum'] = 9;
            if ($doctor == "") {
                $data['display_report'] = $this->model_admin->get_fac_date_report_general($data1);
            } else {
                $data['display_report'] = $this->model_admin->get_fac_date_report_general_centro_privado($data1);
            }
        }
        $this->load->view('admin/billing/bill/report', $data);
    }
    function report_bill_by_hasta() {
        $checkval = $this->input->get('checkval');
        $id_user = $this->input->get('id_user');
        $perfil = $this->db->select('perfil')->where('id_user', $id_user)->get('users')->row('perfil');
        if ($perfil == "Asistente Medico") {
            $report_bill_by_hasta = $this->model_admin->as_medico_report_bill_hasta($id_user, $checkval);
        } else {
            if ($checkval == "privado") {
                $report_bill_by_hasta = $this->model_admin->report_bill_by_hasta_privado($id_user, $perfil);
            } else {
                $report_bill_by_hasta = $this->model_admin->report_bill_by_hasta_general($id_user, $perfil);
            }
        }
        echo '<option value="" >none</option>';
        foreach ($report_bill_by_hasta as $rf) {
            $date = date("d-m-Y", strtotime($rf->filter_date));
            echo '<option value="' . $rf->filter_date . '">' . $date . '</option>';
        }
    }
    function report_bill_by_desde() {
        $checkval = $this->input->get('checkval');
        $id_user = $this->input->get('id_user');
        $perfil = $this->db->select('perfil')->where('id_user', $id_user)->get('users')->row('perfil');
        if ($perfil == "Asistente Medico") {
            $report_bill_by_desde = $this->model_admin->as_medico_report_bill_desde($id_user, $checkval);
        } else {
            if ($checkval == "privado") {
                $report_bill_by_desde = $this->model_admin->report_bill_by_desde_privado($id_user, $perfil);
            } else {
                $report_bill_by_desde = $this->model_admin->report_bill_by_desde_general($id_user, $perfil);
            }
        }
        echo '<option value="" >none</option>';
        foreach ($report_bill_by_desde as $rf) {
            $date = date("d-m-Y", strtotime($rf->filter_date));
            echo '<option value="' . $rf->filter_date . '">' . $date . '</option>';
        }
    }
    function get_doc_centro() {
        $id_user = $this->input->post('id_user');
        $doctor = $this->db->select('name,perfil')->where('id_user', $id_user)->get('users')->row_array();
        if ($doctor['perfil'] == "Medico") {
            echo '<option value="" ></option>';
            echo '<option value="' . $id_user . '">' . $doctor['name'] . '</option>';
        } else if ($doctor['perfil'] == "Asistente Medico") {
            $sql = "SELECT id_doctor FROM  centro_doc_as WHERE id_asdoc=$id_user group by id_doctor";
            $querysig = $this->db->query($sql);
            echo '<option value="" >none</option>';
            foreach ($querysig->result() as $rf) {
                $doctor = $this->db->select('name')->where('id_user', $rf->id_doctor)->get('users')->row('name');
                echo '<option value="' . $rf->id_doctor . '">' . $doctor . '</option>';
            }
        } else {
            $id_centro = $this->input->post('id_centro');
            $sql = "SELECT medico FROM  factura2 WHERE centro_medico=$id_centro group by medico";
            $querysig = $this->db->query($sql);
            echo '<option value="" >none</option>';
            foreach ($querysig->result() as $rf) {
                $doctor = $this->db->select('name')->where('id_user', $rf->medico)->get('users')->row('name');
                echo '<option value="' . $rf->medico . '">' . $doctor . '</option>';
            }
        }
    }
    public function loadMedicoFac() {
        $id_user = $this->input->post('id_user');
        $doctor = $this->db->select('name,perfil')->where('id_user', $id_user)->get('users')->row_array();
        if ($doctor['perfil'] == "Medico") {
            echo '<option value="" ></option>';
            echo '<option value="' . $id_user . '">' . $doctor['name'] . '</option>';
        } elseif ($doctor['perfil'] == "Asistente Medico") {
            $sql = "SELECT id_doctor FROM  centro_doc_as WHERE id_asdoc=$id_user group by id_doctor";
            $querysig = $this->db->query($sql);
            echo '<option value="" >none</option>';
            foreach ($querysig->result() as $rf) {
                $doctor = $this->db->select('name')->where('id_user', $rf->id_doctor)->get('users')->row('name');
                echo '<option value="' . $rf->id_doctor . '">' . $doctor . '</option>';
            }
        } else {
            $admin_position_centro = $this->session->userdata['admin_position_centro'];
            if ($admin_position_centro) {
                $where = "WHERE centro_medico=$admin_position_centro";
            } else {
                $where = "";
            }
            $sql = "SELECT medico FROM  factura2 $where group by medico";
            $querysig = $this->db->query($sql);
            echo '<option value="" >none</option>';
            foreach ($querysig->result() as $rf) {
                $doctor = $this->db->select('name')->where('id_user', $rf->medico)->get('users')->row('name');
                echo '<option value="' . $rf->medico . '">' . $doctor . '</option>';
            }
        }
    }
    function getCentroFacDateRange() {
        $admin_centro = $this->input->post('admin_centro');
        $perfil = $this->input->post('perfil');
        $id_user = $this->input->post('id_user');
        $checktype = $this->input->post('checktype');
        if ($perfil == "Asistente Medico") {
            $centro = $this->model_admin->view_as_doctor_centro_fac($id_user, $checktype);
        } else {
            $centro = $this->model_admin->report_bill_by_date_centro_fac($id_user, $perfil, $checktype, $admin_centro);
        }
        echo '<option value="" hidden></option>';
        foreach ($centro as $rowc) {
            $centroc = $this->db->select('name')->where('id_m_c', $rowc->centro_medico)->get('medical_centers')->row('name');
            echo "<option value='$rowc->centro_medico' >$centroc</option>";
        }
    }
    function getcentEsp() {
        $id_centro = $this->input->post('id_centro');
        $sql = "SELECT especialidad FROM  medial_center_esp WHERE id_medical_center=$id_centro";
        $querysig = $this->db->query($sql);
        foreach ($querysig->result() as $rf) {
            $esp = $this->db->select('title_area')->where('id_ar', $rf->especialidad)->get('areas')->row('title_area');
            echo '<option value="" hidden></option>';
            echo '<option value="' . $rf->especialidad . '">' . $esp . '</option>';
        }
    }
    function loadSimon() {
        $sql = "select * from simon_pdss order by grupo DESC";
        $query = $this->db->query($sql);
        echo "<option value=''>Entrar codigo simon</option>";
        foreach ($query->result() as $row) {
            echo '<option value="' . $row->simon . '">' . $row->simon . '-' . $row->procedimientos . '</option>';
        }
    }
}
