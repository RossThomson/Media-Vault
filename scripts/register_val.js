
function checkvalue(id, errortag){
	var result = true;
	
	var nameValue = document.getElementById(id).value;
	if (nameValue == "") {
		
		 document.getElementById(errortag).style.visibility = "visible";
		 document.getElementById('required').style.visibility = "visible";
		 result = false;
	}
	else
	{
		document.getElementById(errortag).style.visibility = "hidden";
	}
	
	
	function matching_passwords(form,the_item)
{
	document.getElementById("MissingPassword").style.visibility = "hidden";
	document.getElementById("MissingPasswordc").style.visibility = "hidden";
	
	var passw = document.getElementById("regform").elements["Password"].value;
	var passwc = document.getElementById("regform").elements["cPassword"].value;
	if (passw != passwc)
	{
		document.getElementById(the_item).style.visibility = "visible";
	}
	else
	{
		document.getElementById(the_item).style.visibility = "hidden";
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