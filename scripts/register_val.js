
	
	
	function checkPass()
{
    //Store the password field objects into variables ...
    var password = document.getElementById('password');
    var pass2 = document.getElementById('cPassword');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(password.value == cPassword.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        cPassword.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
		document.getElementById("mySubmit").enabled = true;
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        cPassword.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
		 document.getElementById("submit").disabled = true;
    }
}  


function checkEmail() {

    var email = document.getElementById("email");
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var message = document.getElementById("emailmessage");
    if (!filter.test(email.value)) {
     message.innerHTML = "Invalid email address"
    email.focus;
    return false;
 }