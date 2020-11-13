<?php
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter('{PAGENO}');
  $data1 = array(
	'seguro' => $seguro,
    'desde' => $desde,
	'hasta' => $hasta,
	'centro' => $centro
  
	);
	 $this->data['display_report'] = $this->model_admin->get_seguro_date_range($data1);
	      $this->data['title']="RESULTADO DEL BUSQUADOR DE FACTURAS POR RANGO DE FECHA";
		   $this->data['centro']=$centro;
			 $this->data['desde']=$desde;
			 $this->data['hasta']=$hasta;
			 $this->data['seguro']=$seguro;
			if($seguro==11){
			 $this->data['display']="style='display:none'";
              $this->data['thnum']=7;	
			}else{
		    $this->data['display']="";
            $this->data['thnum']=10;
			}
	
	$html =$this->load->view('admin/billing/bill/date-patient-seguro',  $this->data);
	$mpdf->WriteHTML($html);
$mpdf->Output();
	?>
