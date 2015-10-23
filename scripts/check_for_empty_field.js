$(document).ready(function() {
    $('#upload').bind("click",function() 
    { 
        var imgVal = $('#uploadfile').val(); 
        if(imgVal=='') 
        { 
            alert("Empty input file"); 
            return false; 
        } 


    }); 
});