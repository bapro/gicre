<?php
 $id_paginate=$params['id_paginate'] ;
   $total=$params['total'] ;
 ?>
<nav aria-label="Page navigation example" >
		 <em class="text-muted"><?=$total?> registro(s)</em>
		 <div style="overflow-x:auto;">
<ul class="pagination" id="<?=$id_paginate?>">
				<?php 
				foreach($params['rows'] as $row)
				{
				$inserted_time=date("d-m-Y H:i:s",strtotime($row->inserted_time));
				echo '<li   class="p-1 page-item '.$id_paginate.'"   id="'.$row->id.'"><a  class="page-link" href="#">'.$inserted_time.'</a></li>';
				}?>
</ul>
</div>
</nav>
  <div class="spinner-border text-primary" role="status" style="display:none">
			<span class="visually-hidden">Loading...</span>
</div>


