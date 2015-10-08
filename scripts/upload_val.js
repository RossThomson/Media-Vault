



   
function checkMusicFile(form) {
	var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"]; 
    var arrInputs = form.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var Input = arrInputs[i];
        if (Input.type == "file") {
            var sFileName = Input.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry not a valid image file is invalid.  Allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}