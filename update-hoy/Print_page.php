 public function print_indicaciones($table,$date,$id_patient,$operator, $centro, $position, $ifphoto)
    {
		echo $table ;
		ini_set('memory_limit', '1024M');
		$userInfo=$this->clinical_history->select('operator, insert_time, centro')->where('operator',$operator)->get($table)->row_array();
		$this->data['registerInfo'] = $userInfo;
		if($userInfo){
		 $this->indicationHeader($id_patient, $table, $centro, $ifphoto,$userInfo);
		} else{
			echo '<p style="text-align:center">La impresion se mostra una sola vez</p>';
			return false; 
		}
	
			
		
			 $this->data['centroId'] = $centro;
		 if ($position == 'vert')
            {
                $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path', 'format' => 'A5']);
            }
            else
            {
                $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path', array(
                    'mode' => 'utf-8',
                    'format' => 'A5-L'
                ) ]);
            }
			//$mpdf = new \Mpdf\Mpdf(['debug' => true]);
			 $this->data['mpdf'] = $mpdf;
			  if ($table == 'h_c_indicaciones_medicales')
            {
                $this->data['title'] = "RECETAS";
				$query_rows= $this->clinical_history->query("SELECT * FROM  h_c_indicaciones_medicales WHERE operator=$operator AND historial_id=$id_patient  AND DATE(insert_time)='$date'");
				$this->data['query_rows'] =$query_rows->result();
            }
            elseif ($table == 'h_c_indications_labs')
            {
                $this->data['title'] = "LABORATORIOS";
				
				$this->data['partlab1']= $this->clinical_history->query("SELECT * FROM  h_c_indications_labs WHERE  historial_id=$id_patient AND operator=$operator AND DATE(insert_time)='$date' LIMIT 10");
	            $this->data['partlab2']= $this->clinical_history->query("SELECT * FROM  h_c_indications_labs WHERE  historial_id=$id_patient AND operator=$operator AND DATE(insert_time)='$date' LIMIT 10, 60");
			}else{
				
			$this->data['title'] = "ESTUDIOS";
				$query_rows= $this->clinical_history->query("SELECT * FROM  h_c_indicaciones_estudio WHERE operator=$operator AND historial_id=$id_patient  AND DATE(insert_time)='$date'");
				$this->data['query_rows'] =$query_rows->result();	
			}
            $this->data['table'] = $table;
           
         $html1 = $this->load->view('print-page/header1', $this->data, true);
            $html2 = $this ->load->view('print-page/clinical-history/indications/indications', $this->data, true);
            
            $mpdf->WriteHTML($html1);
			$mpdf->WriteHTML($html2);
			$mpdf->Output();
			
			
			
		
		
	}