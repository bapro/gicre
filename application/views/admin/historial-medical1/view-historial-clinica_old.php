<?php $data['perfil'] = $perfil;
$historial_id = decrypt_url($this
    ->uri
    ->segment(3));
$user_id = decrypt_url($this
    ->uri
    ->segment(4));
$areaid = decrypt_url($this
    ->uri
    ->segment(5));
$centro_medico = decrypt_url($this
    ->uri
    ->segment(6));
$data['centro_medico'] = $centro_medico;
$hist = decrypt_url($this
    ->uri
    ->segment(7));
$data['hist'] = $hist;
$trueuser = decrypt_url($this
    ->uri
    ->segment(8));
$from_view = decrypt_url($this
    ->uri
    ->segment(9));
$data['trueuser'] = $trueuser;
$where = array(
    'id_p' => $historial_id,
    'id_doc' => $user_id,
    'id_cm' => $centro_medico,
    'origine' => 0
);
$this
    ->db
    ->where($where);
$this
    ->db
    ->delete('hc_save_cied_doc');
if ($historial_id == "" || $historial_id == 0 || $hist == "" || $user_id == "" || $areaid == "" || $centro_medico == "")
{
    redirect('/page404');
}
if ($perfil == "Medico")
{
    $data['centro_data'] = $this
        ->model_admin
        ->view_doctor_centro($trueuser);
}
else if ($perfil == "Asistente Medico")
{
    $data['centro_data'] = $this
        ->model_admin
        ->view_as_doctor_centro($trueuser);
}
else
{
    $data['centro_data'] = $this
        ->account_demand_model
        ->getCentroMedico();
}
$data['centro_title'] = $this
    ->db
    ->select('name')
    ->where('id_m_c', $centro_medico)->get('medical_centers')
    ->row('name');
$data['id_historial'] = $historial_id;
$data['emergency_id'] = 0;
$data['areaid'] = $areaid;
$area = $this
    ->db
    ->select('title_area')
    ->where('id_ar', $areaid)->get('areas')
    ->row('title_area');
$data['area'] = $area;
$alergia = $this
    ->model_admin
    ->Ant_alergia($historial_id);
$data['alergia'] = $alergia;
$data['count_alergia'] = count($alergia);
$data['selectOne'] = $this
    ->model_admin
    ->selectOne();
$data['selectTwo'] = $this
    ->model_admin
    ->selectTwo();
$rows = $this
    ->model_admin
    ->countAnte1($historial_id);
$data['antege'] = $rows;
$ctutor = $this
    ->model_admin
    ->CountTutor($historial_id);
$data['ctutor'] = $ctutor;
$data['tutor'] = $this
    ->model_admin
    ->getTutor($historial_id);
$data['HISTORIAL_MEDICAL'] = $this
    ->model_admin
    ->historial_medical($historial_id);
$data['rowpm'] = $this
    ->model_admin
    ->countPatMed($historial_id);
$data['desa'] = $this
    ->model_admin
    ->showDesarollo($historial_id);
$data['count_ssr'] = $this
    ->model_admin
    ->count_ssr($historial_id);
$data['ssr'] = $this
    ->model_admin
    ->getSSR($historial_id);
$rows = $this
    ->model_admin
    ->countSSR($historial_id);
$data['obs_nav'] = $this
    ->model_admin
    ->sObs($historial_id);
$data['count_obs'] = $this
    ->model_admin
    ->countObs($historial_id);
$data['date_nacer'] = $this
    ->model_admin
    ->historial_medical($historial_id);
$data['count_rehab'] = $this
    ->model_admin
    ->countRehab($historial_id);
$data['rehab'] = $this
    ->model_admin
    ->Rehab($historial_id);
$oftal = $this
    ->model_admin
    ->Oftal($historial_id);
$data['oftal'] = $oftal;
$data['count_oft'] = count($oftal);
$data['count_examensis'] = $this
    ->model_admin
    ->count_examenes_sis($historial_id);
$data['ControPrenal'] = $this
    ->model_admin
    ->ControPrenal($historial_id);
$data['count_cont_prenal'] = $this
    ->model_admin
    ->CountControPrenal($historial_id);
$dermatologo = $this
    ->model_admin
    ->Dermatologo($historial_id);
$data['dermatologo'] = $dermatologo;
$data['historial_id'] = $historial_id;
$data['count_examensis'] = $this
    ->model_admin
    ->count_examenes_sis($historial_id);
$idpatient = $historial_id;
$data['nec'] = $this
    ->model_admin
    ->getNec();
$data['idpatient'] = $idpatient;
$patient = $this
    ->model_admin
    ->historial_medical($idpatient);
$data['patient'] = $patient;
$query = $this
    ->model_admin
    ->RendezVous($idpatient);
$data['patid'] = $idpatient;
$value = array(
    'singular_id' => 0
);
$this
    ->model_admin
    ->UpdateSingularId($idpatient, $value);
$data['GinecOb'] = $this
    ->model_admin
    ->GinecOb();
$data['drug'] = $this
    ->model_admin
    ->droga();
$rows = $this
    ->model_admin
    ->countAnte1($historial_id);
$data['antege'] = $rows;
$data['user_id'] = $user_id;
if ($perfil == "Admin")
{
    $where_gnr = '';
    $where_fib = '';
    $where_q = '';
}
else
{
    $where_gnr = "AND id_user=$trueuser";
    $where_fib = "AND user=$trueuser";
    $where_q = "AND id_user=$trueuser";
}
$count_gnl = $this
    ->db
    ->query("SELECT id_patient FROM hc_cirugia_reporte WHERE id_patient=$historial_id $where_gnr");
$data['count_gnl'] = $count_gnl->num_rows();
$count_fib = $this
    ->db
    ->query("SELECT id_patient  FROM hc_cirugia_toracica WHERE id_patient=$historial_id $where_fib");
$data['count_fib'] = $count_fib->num_rows();
$count_qui = $this
    ->db
    ->query("SELECT id_patient FROM hc_quirurgica WHERE id_patient=$historial_id $where_gnr");
$data['count_qui'] = $count_qui->num_rows();
$count_ipps = $this
    ->db
    ->query("SELECT historial_id  FROM h_c_ipss WHERE historial_id=$historial_id $where_gnr");
$data['count_ipps'] = $count_ipps->num_rows();
$count_ord = $this
    ->db
    ->query("SELECT id_historial  FROM orden_medica_sala WHERE id_historial=$historial_id $where_gnr");
$data['count_ord'] = $count_ord->num_rows();
$count_card = $this
    ->db
    ->query("SELECT patient  FROM hc_evaluacion_car_vas WHERE patient=$historial_id $where_gnr");
$data['count_card'] = $count_card->num_rows();
$this
    ->load
    ->view('admin/historial-medical1/js-links');
$data['desa'] = $this
    ->model_admin
    ->showDesarollo($historial_id);
$data['AntOtros'] = $this
    ->model_admin
    ->GetAntOtros($historial_id);
$data['HABITOS'] = $this
    ->model_admin
    ->GetHabitos($historial_id);
$data['droga'] = $this
    ->model_admin
    ->showDrug($historial_id);
$row_ant = $this
    ->model_admin
    ->showAnte($historial_id);
$data['row_ant'] = $row_ant;
$today = date('Y-m-d');
$sql_con1 = "SELECT historial_id FROM h_c_sinopsis WHERE historial_id=$historial_id";
$atendido_con1 = $this
    ->db
    ->query($sql_con1);
if ($from_view == 1)
{
    $data['saveHistBtn'] = 'style="display:none"';
    $data['nocreatecita'] = '<span style="color:green" title= "visto ' . $atendido_con1->num_rows() . ' vece(s)">' . $atendido_con1->num_rows() . ' <i style="color:green" class="fa fa-eye" ></i> </span>';
}
else
{
    if ($perfil == 'Admin')
    {
        $sql_con2 = "SELECT historial_id FROM h_c_sinopsis where filter_date ='$today' AND historial_id=$historial_id";
    }
    else
    {
        $sql_con2 = "SELECT historial_id FROM h_c_sinopsis where filter_date ='$today' AND historial_id=$historial_id AND user_id=$user_id";
    }
    $atendido_con2 = $this
        ->db
        ->query($sql_con2);
    if ($atendido_con2->num_rows() == 0 && $hist != 4)
    {
        $data['saveHistBtn'] = '';
        if ($atendido_con1->num_rows() == 0)
        {
            $data['nocreatecita'] = '';
        }
        else
        {
            $data['nocreatecita'] = '<span style="color:green" title= "visto ' . $atendido_con1->num_rows() . ' vece(s)">' . $atendido_con1->num_rows() . ' <i style="color:green" class="fa fa-eye" ></i> </span>';
        }
    }
    else
    {
        $data['saveHistBtn'] = 'style="display:none"';
        $data['nocreatecita'] = '<span style="color:green" title= "visto ' . $atendido_con1->num_rows() . ' vece(s)">' . $atendido_con1->num_rows() . ' <i style="color:green" class="fa fa-eye" ></i> </span>';
    }
}
$this
    ->load
    ->view('admin/historial-medical1/header-hist', $data);
if ($user_id == 344)
{
    $this
        ->load
        ->view('admin/historial-medical1/menu-aside-doc-344', $data);
}
else
{
    $this
        ->load
        ->view('admin/historial-medical1/menu-aside-doctor_unm', $data);
}
$this
    ->load
    ->view('admin/historial-medical1/historial-medical-unm', $data);
if ($rows < 1)
{
    $this
        ->load
        ->view('admin/historial-medical1/footer-empty', $data);
}
else
{
    $this
        ->load
        ->view('admin/historial-medical1/all-data/footer-ant-general');
}
$id_rdv = $this
    ->db
    ->select('id_rdv')
    ->where('paciente', $historial_id)->where('medico', $user_id)->where('filter_date', date('Y-m-d'))
    ->order_by('id_rdv', 'desc')
    ->limit(1)
    ->get('factura2')
    ->row('id_rdv');
if ($id_rdv)
{
    $id_rdv = $id_rdv;
}
else
{
    $id_rdv = 0;
}
$data['id_rdv'] = $id_rdv;
$id_apoint = $this
    ->db
    ->select('id_apoint')
    ->where('id_patient', $historial_id)->where('doctor', $user_id)->order_by('id_apoint', 'desc')
    ->limit(1)
    ->get('rendez_vous')
    ->row('id_apoint');
$data['id_apoint'] = $id_apoint;
$id_segu = $this
    ->db
    ->select('seguro_medico')
    ->where('id_p_a', $historial_id)->get('patients_appointments')
    ->row('seguro_medico');
$data['id_segu'] = $id_segu;
$type = $this
    ->db
    ->select('type')
    ->where('id_m_c', $centro_medico)->get('medical_centers')
    ->row('type');
$data['type'] = $type;
$this
    ->load
    ->view('admin/historial-medical1/footer-commun', $data);
foreach ($patient as $row);
if (preg_match('/GINECOLOGIA/', $area) && ($row->sexo == 'Femenina'))
{
    $this
        ->load
        ->view('admin/historial-medical1/saveByArea/saveGinecologia', $data);
}
elseif ($area == "OFTALMOLOGIA")
{
    $this
        ->load
        ->view('admin/historial-medical1/saveByArea/saveOftalmologia', $data);
}
elseif ($area == "MEDICINA FISICA Y REHABILITACION")
{
    $this
        ->load
        ->view('admin/historial-medical1/saveByArea/saveMedFisRehab', $data);
}
elseif (preg_match('/PEDIATR/', $area))
{
    $this
        ->load
        ->view('admin/historial-medical1/saveByArea/savePediatria', $data);
}
elseif ($area == "DERMATOLOGO")
{
    $this
        ->load
        ->view('admin/historial-medical1/saveByArea/saveDermatologo', $data);
}
elseif ($area == "Cirujano Vascular Y Endovascular")
{
    $this
        ->load
        ->view('admin/historial-medical1/saveByArea/saveCirujanoVascular', $data);
}
elseif ($area == "CONSEJERIA")
{
    $this
        ->load
        ->view('admin/historial-medical1/saveByAreaUnm/saveCounseling', $data);
}
elseif ($area == "UROLOGIA")
{
    $this
        ->load
        ->view('admin/historial-medical1/saveByAreaUnm/saveUrology', $data);
}
else
{
    $this
        ->load
        ->view('admin/historial-medical1/saveByArea/saveHistStandart', $data);
}
$this
    ->load
    ->view('admin/historial-medical1/pressBtnHist', $data);

echo '<div class="modal fade" id="relacion_familiares" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content"></div>
	</div>
</div>
</body>

</html>'; ?> 