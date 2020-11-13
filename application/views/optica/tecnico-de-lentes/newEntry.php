<?php
if($result==0){
$show_mes="style='display:none;'";	
} else {
$show_mes="style='color:red; text-transform:lowercase;background:white;border:1px solid red'";;	
}

?>


<span  <?=$show_mes?> class='badge badge-pill' ><?=$result?> nueva(s)</span>