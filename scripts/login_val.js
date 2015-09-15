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
		document.getElementById("submit").disabled = true;
 }
 
 else {
	 email.style.backgroundColor = goodColor;
	  message.innerHTML = "Valid email address";
	  message.style.color = goodColor;
	  document.getElementById("submit").disabled = false;
 }
}