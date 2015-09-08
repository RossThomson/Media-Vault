
	
	
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
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        cPassword.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  


function validate_email(form, the_item)
{
	var str = document.getElementById("regform").elements["email"].value;
	var test = str.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})+$/)
	if (test == "" || test == null)
	{
		document.getElementById("invalid_email").style.visibility = "visible";
		document.getElementById("required").style.visibility = "visible";
	} 
	else{
		document.getElementById("invalid_email").style.visibility = "hidden";
	}
}