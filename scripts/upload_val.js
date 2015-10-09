



   
function checkImageFile(form) {
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
                    alert("Sorry not a valid image file.  Allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}

 
function checkMusicFile(form) {
	var _validFileExtensions = [".mp3", ".mp2"]; 
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
                    alert("Sorry not a valid music file.  Allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}



function checkVideoFile(form) {
	var _validFileExtensions = [".mp4", ".mpeg", ".avi"]; 
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
                    alert("Sorry not a valid video file.  Allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}


function checkDocFile(form) {
	var _validFileExtensions = [".doc", ".pdf", ".docx", ".csv", ".txt", ".ppt", ".pptx"]; 
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
                    alert("Sorry not a valid document file.  Allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}
