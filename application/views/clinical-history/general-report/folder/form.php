
    <div class="col-md-12">
        <hr />
       <header class="text-center">Subir Archivo</header>
	   <div id="divMsgRg" class="alert alert-success" style="display: none">
   <span id="msgRg"></span>
  </div>
        <input type="hidden" id="url_load_rg" value="<?php echo base_url(); ?>patient_document_controller/listFolders" />
      
        <?php echo  form_open_multipart("patient_document_controller/uploadDocumento", ['id' => 'uploadDocumentoRg', 'class' => 'form-horizontal']); ?>
           <input type="hidden" name="table_name" id="table_name_rg" value="hc_general_report_documents" />
           <input type="hidden" id="folder_name_rg" name="folder_name" value="assets_new/img/general-report/" />
        <input id="id_patient_to_load_rg" name="id_p_a" type="hidden" value="<?= $idpatient ?>" />
        <?php echo form_input(['multiple' => 'multiple', 'id' => 'document_file_rg', 'accept' => 'image/*,.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.zip,.rar,.7zip', 'type' => 'file', 'class' => 'form-control']);

        echo "<p class='text-center'>Elegir imagen(es) para subir (<= 4 MB)</p>";
        echo form_close(); ?>
        <div class="progress">
            <div class="progress-bar"></div>
        </div>
        <div id="listFoldersRg"></div>


    </div>