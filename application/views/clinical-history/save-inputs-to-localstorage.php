<script>
  /*enfermedad actual*/
var enf_motivo = $("#"+enfermedad_data+"_enf_motivo").val();
var enf_signopsis = $("#"+enfermedad_data+"enf_signopsis").val();	

var enf_laboratorios = $("#"+enfermedad_data+"enf_laboratorios").val();
var enf_estudios = $("#"+enfermedad_data+"enf_estudios").val();
window.onload = function() {
    localStorage.setItem("enf_motivo", enf_motivo);
    localStorage.setItem("enf_signopsis", enf_signopsis);  
    localStorage.setItem("enf_laboratorios", enf_laboratorios);
    localStorage.setItem("enf_estudios", enf_estudios);  
}
</script>