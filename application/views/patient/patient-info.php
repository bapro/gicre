 <div class="row g-1">
      <div class="col-sm-5">

        <!--<div class="card">
          <div class="card-body profile-card pt-1 d-flex flex-column align-items-center">
		  <STRONG>NOMBRES</STRONG>
   <h6 class="text-center"><?=$get_patient_info_by_id['nombre']?> </h6>
          </div>
        </div>-->




  <div class="card">
            <div class="card-body profile-card d-flex flex-column align-items-center py-2">
             <?=$patient_photo?>
		 <h5><?=$get_patient_info_by_id['nombre']?></h5>
            </div>
          </div>

  </div>

      <div class="col-sm-7">

        <div class=" ">
<div class="card-body  align-items-center">
	
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
          </tr>
         
        </tbody>
      </table>
    </div>
	
	</div>
  </div>
</div>

</div>