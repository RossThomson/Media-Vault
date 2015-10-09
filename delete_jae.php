<?php    
 
    if(!$_GET['num'])
    {
        echo "<script>alert('wrong access');";
        echo "history.back();</script>";
    }
    
    @ $db = new mysqli('localhost', 'root', 'root', 'MEDIALYNX');
    if(mysqli_connect_errno())
    {
        echo "DB connect error";
        exit;
    }
    
    $query = "select CONTENTTITLE from CONTENT where CONTENTID=".$_GET['num'];
    $result = $db->query($query);
    if(!$result)
    {
        echo "select query error";
        exit;
    }
    $result = $result->fetch_assoc();
    
    $dir = "uploads/";
    $filename = $result['CONTENTTITLE'];
    
    if(!unlink($dir.$filename))
    {
            echo "file delete error";
            exit;
    }
    
    $query = "delete from CONTENT where CONTENTID=".$_GET['num'];
    $result = $db->query($query);
    if(!$result)
    {
        echo "delete query error";
        exit;
    }
    
    echo "<script>alert('file deleted');";
    echo "history.back();</script>";
 
    $db->close();
    
?>