
	
	
	function checkPass()
{
    var password = document.getElementById('password');
    var pass2 = document.getElementById('cPassword');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
	
    if(password.value == cPassword.value){
      	cPassword.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
		document.getElementById("submit").disabled = false;
    }
	else if (password.value != cPassword.value) {
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        cPassword.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
		 document.getElementById("submit").disabled = true;
    }
	
	else if (password.value || cPassword.value == null) {
		 message.style.color = white;
			message.innerHTML = "";
		
	}
}  


function checkEmail() {

    var email = document.getElementById("email");
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var message = document.getElementById("emailmessage");
	var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if (!filter.test(email.value)) {
	  email.style.backgroundColor = badColor;
     message.innerHTML = "Invalid email address";
	  message.style.color = badColor;
 }
 
 else {
	 email.style.backgroundColor = goodColor;
	  message.innerHTML = "Valid email address";
	  message.style.color = goodColor;
 }
}



function firstNameVal(){
	var name = document.getElementById("name");
	var goodColor = "#66cc66";
    var badColor = "#ff6666";
	var message = document.getElementById("namemessage");
	var alphaExp = /^[a-zA-Z]+$/;
	if(name.value.match(alphaExp)){
		  message.innerHTML = "";
	}else{
	  message.innerHTML = "Letters only";
	  message.style.color = badColor;
	}
}

function surnameVal(){
	var name = document.getElementById("surname");
	var goodColor = "#66cc66";
    var badColor = "#ff6666";
	var message = document.getElementById("surnamemessage");
	var alphaExp = /^[a-zA-Z]+$/;
	if(surname.value.match(alphaExp)){
		  message.innerHTML = "";
	}else{
	  message.innerHTML = "Letters only";
	  message.style.color = badColor;
	}
}