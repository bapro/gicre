<?php
function getPatientAge($birthday) {

$age_format = '';
$diff = date_diff(date_create(), date_create($birthday));
$years = $diff->format("%y");
$months = $diff->format("%m");
$days = $diff->format("%d");

if ($years) {
$age_format = ($years < 2) ? '1 año' : "$years años";
} else {
$age_format = '';
if ($months) $age_format .= ($months < 2) ? '1 mes ' : "$months meses ";
if ($days) $age_format .= ($days < 2) ? '1 día' : "$days días";
}
return trim($age_format);
}
?>