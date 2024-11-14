<p class="">Subir Archivo</p>
<input type="hidden" id="url_load" value="<?php echo base_url(); ?>patient_controller/listFolders" />
<input type="hidden" id="url_count_files" value="<?php echo base_url(); ?>patient_controller/url_count_files" />
<?php echo  form_open_multipart("patient_controller/uploadDocumento", ['id' => 'uploadDocumento', 'class' => 'form-horizontal']); ?>
<input type="hidden" name="table_name" id="table_name" value="patients_folders" />
<input id="id_p_a" name="id_p_a" type="hidden" value="<?=$idpatient?>" />
<input id="insertedBy" name="insertedBy" type="hidden" value="<?=$this->session->userdata('user_id')?>" />
<input type="hidden" id="folder_name" name="folder_name" value="assets/img/patients-folder/" />
<?php echo form_input(['name' => 'image_file', 'id' => 'image_file', 'accept' => 'image/*,.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.zip,.rar,.7zip', 'type' => 'file', 'class' => 'form-control']);

echo "<p class='text-center'>Elegir imagen(es) para subir (<= 4 MB)</p>";
echo form_close(); ?>
<div class="progress">
<div class="progress-bar"></div>
</div>
<div id="listFolders"></div>