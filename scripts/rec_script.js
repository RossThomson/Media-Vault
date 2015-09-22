function checkAnswer() {
	var answer = document.getElementsByID('answer');
	var trueAnswer = document.getElementById('trueAnswer');
	var check = document.getElementById('check');
	var goodColour = "#66cc66";
    var badColour = "#ff6666";

	if (trueAnswer.value != null && answer.value == trueAnswer.value) {
		trueAnswer.style.backgroundColor = goodColour;
		check.style.color = goodColour;
		check.innerHTML = "Answers Match";
		document.getElementById("submit").disabled = false;
	} else if(trueAnswer.value != null && answer.value != trueAnswer.value) {
		trueAnswer.style.backgroundColor = badColour;
		check.style.color = badColour;
		check.innerHTML = "Answers do not match";
		document.getElementById("submit").disabled = true;
	} else {
		check.style.color = white;
		check.innerHTML = "";		
	}
}