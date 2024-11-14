 let timeout;

    // traversing the DOM and getting the input and span using their IDs

    let password = document.getElementById('pass1')
    let strengthBadge = document.getElementById('StrengthDisp')
    let btnSend = document.getElementById('sendPassw')
	let passLength = document.getElementById('passLength')
	
    // The strong and weak password Regex pattern checker

    let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{10,})')
    let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{10,}))')
    
    function StrengthChecker(PasswordParameter){
        // We then change the badge's color and text based on the password strength
		 strengthBadge.style.fontStyle = "italic"
		 let digit=password.value.length
		
        if(strongPassword.test(PasswordParameter)) {
			 strengthBadge.style.color = "green"
            strengthBadge.textContent = 'Fuerte' + " (" +  digit + " " + "dígitos)"
			btnSend.removeAttribute('disabled')
        } else if(mediumPassword.test(PasswordParameter)){
			 strengthBadge.style.color = 'blue'
            strengthBadge.textContent = 'Medium' + " (" + digit + " " + "dígitos)"
			btnSend.disabled = true;
        } else{
            strengthBadge.style.color = 'red'
            strengthBadge.textContent = 'Débil' + " (" +  digit + " " + "dígitos)"
			btnSend.disabled = true;
        }
    }

    // Adding an input event listener when a user types to the  password input 

    password.addEventListener("input", () => {

        //The badge is hidden by default, so we show it

        strengthBadge.style.display= 'block'
        clearTimeout(timeout);

        //We then call the StrengChecker function as a callback then pass the typed password to it

        timeout = setTimeout(() => StrengthChecker(password.value), 500);

        //Incase a user clears the text, the badge is hidden again

        if(password.value.length !== 0){
            strengthBadge.style.display != 'block'
        } else{
            strengthBadge.style.display = 'none'
        }
			
    });
	
