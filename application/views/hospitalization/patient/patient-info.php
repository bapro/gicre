 <div class="row ">
      <div class="col-xl-3">

        <!--<div class="card">
          <div class="card-body profile-card pt-1 d-flex flex-column align-items-center">
		  <STRONG>NOMBRES</STRONG>
   <h6 class="text-center"><?=$get_patient_info_by_id['nombre']?> </h6>
          </div>
        </div>-->




  <div class="card">
            <div class="card-body profile-card d-flex flex-column align-items-center py-2">
             <?=$patient_photo?>
		
              <!--<img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">-->
              
			  
               <!--<div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>-->
            </div>
          </div>

  </div>

      <div class="col-xl-9">

        <div class=" ">
<div class="card-body  align-items-center">
	 <h5><?=$get_patient_info_by_id['nombre']?></h5>
    <div style="overflow-x:auto;">
      <table class="table  table-striped  ">
        <thead>
          <tr>
           
            <!--<th scope="col">NEC</th>-->
             <th scope="col">Edad</th>
          <th scope="col">NEC</th>
            <th scope="col">Cédula</th>
            <th scope="col">Tel.</th>
            <th scope="col">Seguro</th>
            <th scope="col">Causa</th>
			 <th scope="col">Cama</th>
			  <th scope="col">Fecha de Ingreso</th>
          </tr>
        </thead>
        <tbody>
          <tr>
           
           <!-- <td>6685</td>-->
            <td><?=$patient_age?></td>
            <td><?=$get_patient_info_by_id['id_p_a']?></td>
            <td><?=$get_patient_info_by_id['cedula']?></td>
            <td><?=$get_patient_info_by_id['tel_cel']?></td>
			<td><?=$get_patient_seguro_info_by_id['title']?></td>
			
			<td><?=$causa?></td>
			<td><?=$cama?></td>
			<td><?=$admitted_time?></td>
			
          </tr>
         
        </tbody>
      </table>
    </div>
	
	</div>
  </div>
</div>

</div>