<?php
function rand_string( $length ) {

$chars = "0123456789";
return substr(str_shuffle($chars),0,$length);

}
?>