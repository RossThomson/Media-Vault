<?php
 
    if(!$_FILES['file']['name'])
    {
        echo "<script>alert('Choose a file you would like to upload.');";
        echo "history.back();</script>";
        exit;
    }
    
    if(strlen($_FILES['file']['name']) > 255)
    {
        echo "<script>alert('File name is too long');";
        echo "history.back();</script>";
        exit;
    }
    
    $date = date("YmdHis", time());
    $dir = "./files/";
    $file_hash = $date.$_FILES['file']['name'];
    $file_hash = md5($file_hash);
    $upfile = $dir.$file_hash;
 
    if(is_uploaded_file($_FILES['file']['tmp_name']))
    {
            if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
            {
                    echo "upload error";
                    exit;
            }
    }
    
    @ $db = new mysqli('localhost', 'root', 'root', 'Media-Lynx');
    if(mysqli_connect_errno())
    {
        echo "DB error";
        exit;
    }
    
    $query = "insert into ftp (name, hash, time) 
              values('".$_FILES['file']['name']."', 
              '".$file_hash."', '".$date."')";
    $result = $db->query($query);
    if(!$result)
    {
        echo "DB upload error";
        exit;
    }
    
    $db->close();
    
    echo "<script>alert('Uploaded sucessfully');";
    echo "history.back();</script>";
    
?>