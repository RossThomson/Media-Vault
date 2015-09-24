<?php
 
    header("Content-type: text/html; charset=utf-8");
 
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
    
    $query = "select CONTENTTITLE from CONTENT where num=".$_GET['num']";
    $result = $db->query($query);
    if(!$result)
    {
        echo "query error";
        exit;
    }
    $result = $result->fetch_assoc();
    
    $dir = "uploads/";
    $filename = $result['CONTENTTITLE'];
    //$filehash = $result['hash'];
    
    if(file_exists($dir.$filehash))
    {
            header("Content-Type: Application/octet-stream");
            header("Content-Disposition: attachment; filename=".$filename);
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: ".filesize($dir.$filename));
 
            $fp = fopen($dir.$filename, "rb");
            while(!feof($fp))
            {
                echo fread($fp, 1024);
            }
            fclose($fp);
            
            /* $query = "update ftp set down=(down+1) where num=".$_GET['num'];
            $result = $db->query($query);
            if(!$result)
            {    
                echo "down counter update error";
                exit;
            } */
    }
    else
    {
            echo "<script>alert('파일이 없습니다.);";
            echo "history.back();</script>";
            exit;
    }
    $db->close();
    
?>