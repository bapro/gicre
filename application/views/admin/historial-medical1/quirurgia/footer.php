					<script>
				
					var btnDpRq = document.getElementById('btnDpRq');
					btnDpRq.onclick = function() {
					var output = document.getElementById("diag_pre_qui");
					// get action element reference
					var action = document.getElementById("actionSpeechDpRq");
					runSpeechRecognition1(output,action);
					}
					
					
					
					function runSpeechRecognition1(output,action) {

var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
var recognition1 = new SpeechRecognition();

// This runs when the speech recognition1 service starts
recognition1.onstart = function() {
action.innerHTML = "<small>escuchando, habla...</small>";
};

recognition1.onspeechend = function() {
action.innerHTML = "<small>grabación terminó...</small>";
recognition1.stop();

}

// This runs when the speech recognition1 service returns result
recognition1.onresult = function(event) {
var transcript = event.results[0][0].transcript;
var confidence = event.results[0][0].confidence;
//output.innerHTML = "<b>Text:</b> " + transcript + "<br/> <b>Confidence:</b> " + confidence*100+"%";
//output.classList.remove("hide");
//output.value=transcript;
output.value += transcript + " ";
};

// start recognition1
recognition1.start();
}
					
					
					</script>