					<script>
				
					var btnDpRq = document.getElementById('btnDpRq');
					btnDpRq.onclick = function() {
					var output = document.getElementById("diag_pre_qui");
					// get action element reference
					var action = document.getElementById("actionSpeechDpRq");
					runSpeechRecognition(output,action);
					}
					
					</script>