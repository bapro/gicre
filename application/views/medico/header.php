<?php $delay = "";
$plan = $this->db
    ->select("plazo,cuenta_gratis,payment_plan")
    ->where("id_user", $this->session->userdata["medico_id"])
    ->get("users")
    ->row_array();
if ($plan["cuenta_gratis"] == 0) {
    $account_info = '<div class="col-xs-11 alert alert-info"  >
  <strong>Usted tiene una cuenta gratuita !</strong>
</div>';
} else {
    if ($plan["payment_plan"] == 1) {
        $termDate1 = date("Y-m-d", strtotime($plan["plazo"] . " + 31 days"));
        $termDate = date("d-m-Y", strtotime($termDate1));
        $contradate = date("d-m-Y", strtotime($plan["plazo"]));
        $account_info = "<div class='col-xs-11 alert alert-info' style='text-align:center'  >
  <strong>Usted tiene una cuenta mensual, fecha inicial: $contradate, fecha de vencimiento: $termDate!</strong>
</div>";
        $delay = date("d-m-Y", strtotime($plan["plazo"] . " + 31 days"));
        $start = date_create(date("Y-m-d", strtotime($delay)));
        $end = date_create();
        $diff = date_diff($start, $end);
        $delay = "<span style='color:red;text-transform:lowercase'>le quedan $diff->days días</span> ";
    } else {
        $termDate1 = date("Y-m-d", strtotime($plan["plazo"] . " + 365 days"));
        $termDate = date("d-m-Y", strtotime($termDate1));
        $contradate = date("d-m-Y", strtotime($plan["plazo"]));
        $account_info = "<div class='col-xs-11 alert alert-info' style='text-align:center' >
  <strong>Usted tiene una cuenta anual, fecha inicial: $contradate, fecha de vencimiento: $termDate!</strong>
</div>";
        $delay = date("d-m-Y", strtotime($plan["plazo"] . " + 365 days"));
        $start = date_create(date("Y-m-d", strtotime($delay)));
        $end = date_create();
        $diff = date_diff($start, $end);
        $delay = "<span style='color:red;text-transform:lowercase'>le quedan $diff->days días</span> ";
    }
}
?><!doctypehtml><html lang="en"><head><meta charset="utf-8"><title>ADMEDICALL</title><meta name="viewport" content="width=device-width, initial-scale=1"><link href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral"rel="stylesheet"><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"rel="stylesheet"><link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"rel="stylesheet"><link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"rel="stylesheet"><link href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"rel="stylesheet"><link href="<?= base_url() ?>assets/css/style.default.css"rel="stylesheet"id="theme-stylesheet"><link href="<?= base_url() ?>assets/css/passwordscheck.css"rel="stylesheet"><link href="<?= base_url() ?>assets/css/autocomplete.css?rnd=133" rel="stylesheet"><link href="<?= base_url() ?>assets/css/custom.css?rnd=132"rel="stylesheet"><link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"rel="stylesheet"><link href="<?= base_url() ?>assets/img/adms.png"rel="shortcut icon"type="image/x-icon"><style>th{text-align:center}td{font-size:17px}label{color:#000}img.img-responsive{max-width:18%;heigth:auto;display:block}a.active{outline:0}.req{color:red}@-moz-keyframes blink{0%{opacity:1}50%{opacity:0}100%{opacity:1}}@-webkit-keyframes blink{0%{opacity:1}50%{opacity:0}100%{opacity:1}}@-ms-keyframes blink{0%{opacity:1}50%{opacity:0}100%{opacity:1}}@keyframes blink{0%{opacity:1}50%{opacity:0}100%{opacity:1}}.blink-image{-moz-animation:blink normal 2s infinite ease-in-out;-webkit-animation:blink normal 2s infinite ease-in-out;-ms-animation:blink normal 2s infinite ease-in-out;animation:blink normal 2s infinite ease-in-out}.paginationh{display:flex}#paginationh{overflow-x:auto;width:100%}ul.paginationh{list-style:none;text-align:center;font-size:12px}li.paninate-li{list-style:none;float:left;margin-right:16px;padding:5px;border:2px solid #0063dc;background:#dcdcdc;color:#0063dc}li.paninate-li:hover{color:#ff0084;cursor:pointer}</style><script>setTimeout(function(){$('#new_message').load("<?php echo base_url(
    "medico/newMessageReceived"
); ?>").fadeIn("slow");}, 1000);	function hidePopAfterOnlineInternetConnection(){$("#myModalConnection").modal("hide"),$("#myModalConnectionBack").modal({backdrop:"static",keyboard:!1}),setTimeout(function(){$("#myModalConnectionBack").modal("hide")},2e3)}function showPopForOfflineConnection(){$("#myModalConnection").modal({backdrop:"static",keyboard:!1}),$(".spinning-me").fadeIn().html('<span style="font-size:15px;color:#B3AF76" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load text-danger"></span>')}window.addEventListener("offline",function(n){showPopForOfflineConnection()}),window.addEventListener("online",function(n){hidePopAfterOnlineInternetConnection()})</script></head><?php
if (empty($this->session->userdata["medico_id"])) {
    redirect("https://www.admedicall.com");
}
$id_usr = $this->session->userdata["medico_id"];
$userInf = $this->db
    ->select("area,cell_phone,update_date")
    ->where("id_user", $id_usr)
    ->get("users")
    ->row_array();
$area_id = $userInf["area"];
$cell_phone = $userInf["cell_phone"];
$update_date = date("m-Y", strtotime($userInf["update_date"]));
$area = $this->db
    ->select("title_area")
    ->where("id_ar", $area_id)
    ->get("areas")
    ->row("title_area");
$sql = "SELECT * from message_to_users where userid=$id_usr and seen=0";
$query = $this->db->query($sql);
if ($query->num_rows() > 0) {
    $updatetext = "Tenemos actualizacion en el sistema.";
    $show = "";
} else {
    $updatetext = "";
    $show = "none";
}
if ($area_id == "87") {
    $opto_med = "display:none";
} else {
    $opto_med = "";
}
?><header><div class="navbar-affixed-top"data-offset-top="300"data-spy="affix"><div class="navbar navbar-default yamm"id="navbar"role="navigation"style="background:linear-gradient(to top,#fff,#e0e5e6"><div class="container"><div class="navbar-header"><a class="home navbar-brand"><span style="position:absolute;z-index:3000px;top:-2px"><img alt="logo"src="<?= base_url() ?>assets/img/gicle1.png"style="width:160px"class="hidden-sm hidden-xs"></span><img alt="Admedicall"src="<?= base_url() ?>assets/img/gicle1.png"style="width:110px"class="visible-sm visible-xs"><span class="sr-only">Admedicall</span></a><div class="navbar-buttons"><button class="btn-template-main navbar-toggle"type="button"data-target="#navigation"data-toggle="collapse"><span class="sr-only">Toggle navigation</span> <i class="fa fa-align-justify"></i></button></div></div><br><div class="collapse navbar-collapse"id="navigation"style="font-size:10px"><ul class="nav navbar-nav"style="margin-left:10%"><?php
$this->load->view("medico/view_acciones");
if ($this->session->userdata["medico_perfil"] == "Medico") {
    $show_delay = $delay;
} else {
    $show_delay = "";
}
?></ul><ul class="nav navbar-nav navbar-right"><li class="dropdown"><a class="dropdown-toggle"title="<?= $this
    ->session->userdata[
    "medico_name"
] ?>: usuario de GICRE "data-hover="dropdown"data-toggle="dropdown"style="cursor:pointer"><img alt=""src="<?= base_url() ?>assets/img/user.png"style="width:25px;border-radius:20px"><?= mb_substr(
    $this->session->userdata["medico_name"],
    0,
    15
) ?>...<span class="caret"></span></a><ul class="dropdown-menu"><li><a><?= $this
    ->session->userdata[
    "medico_perfil"
] ?> <?= $area ?><br><?= $show_delay ?></a></li><li><a href="<?php echo site_url(
    "medico/update_user"
); ?>"><i class="fa fa-eye"></i> Mi Cuenta</a></li><?php if (
    $this->session->userdata["medico_perfil"] == "Medico"
) { ?><li style="<?= $opto_med ?>"><a href="<?php echo site_url(
    "medico/payment_received"
); ?>"><i class="fa fa-circle-o"></i> Servicio</a></li><li style="<?= $opto_med ?>"><a href="<?php echo site_url(
    "medico/laboratory"
); ?>"><i class="fa fa-flask"></i> Laboratorios</a></li><?php } ?><li><a href="<?php echo site_url(
    "login/medico_logout"
); ?>"><i class="fa fa-sign-out"></i> cerrar sesión</a></li></ul></li><li id="new_message"></li></ul></div></div></div></div></header><body><hr id="hr_ad"><div class="container"><div class="row"><div class="hide-me col-xs-1"><a class="btn btn-primary btn-xs"title="<- atras"onclick="history.back()"><i class="fa fa-arrow-left"aria-hidden="true"></i></a><?php
$sql = "SELECT * FROM  hc_cirugia_reporte WHERE id_user=$id_usr ORDER BY id ASC";
$cirugia_toracico = $this->db->query($sql);
?></div><?= $account_info ?><div class="col-md-12"><div id="new-update"><?php $this->load->view(
    "new-update"
); ?></div></div><br><br></div><hr id="hr_ad"class="hide-me"><a name="anchor"></a><div class="fade modal"id="update"role="dialog"tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div><div class="fade modal"id="myModalConnection"role="dialog"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><div class="alert text-center alert-danger"><h4>Parece que su conexión a Internet está fuera de línea.</h4></div><div class="alert text-center alert-warning"><i>Intentando reconectar </i><span class="spinning-me"></span></div></div></div></div></div><div class="fade modal"id="myModalConnectionBack"role="dialog"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><div class="alert text-center alert-success"><h4>Esta connectado.</h4></div></div></div></div></div><div class="fade modal"id="historial-clinica-reporte-general"role="dialog"><div class="modal-dialog modal-md"><div class="modal-content"><div class="modal-header"><button class="close"type="button"aria-hidden="true"data-dismiss="modal">×</button><h3 class="modal-title">Reporte General de la historial medica de los pacientes (<?= $cirugia_toracico->num_rows() ?>)</h3></div><div class="modal-body"><?php if (
    $cirugia_toracico->num_rows() > 0
) { ?><div style="overflow-x:auto"><table class="table table-striped"><thead><tr style="background:#5957f7;color:#fff"><th>#</th><th>PACIENTE</th><th>REPORTE</th><th>DETALLE</th><th>FECHA</th></tr></thead><tbody><?php
$i = 1;
foreach ($cirugia_toracico->result() as $row) {

    $patientehcn = $this->db
        ->select("nombre")
        ->where("id_p_a", $row->id_patient)
        ->get("patients_appointments")
        ->row("nombre");
    $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));
    ?><tr><td style="font-size:11px"><?php
echo $i;
$i++;
?></td><td style="font-size:11px"><?= $patientehcn ?></td><td style="font-size:11px"><?= $row->reporte ?></td><td style="font-size:11px"><?= $row->detalle ?></td><td style="font-size:11px"><?= $fecha ?></td></tr><?php
}
?></tbody></table></div><?php } ?></div></div></div></div>