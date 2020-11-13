<?php
foreach($ssr_update as $row)
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$upda_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->update_time)));	
echo "Cambiado por : $row->updated_by | fecha de cambio : $upda_time";
?>