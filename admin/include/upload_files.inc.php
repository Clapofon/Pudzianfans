<?php
    if(isset($_POST['upload-submit']))
    {
        header("Location: ../dashboard/dashboard.php?else");
        exit();
    }
        $path = $_POST['path'];
        $lastChar = mb_substr($path, -1);
        
        $file = $_FILES['file'];
        
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        $allowed = array('php', 'css', 'html', 'js', 'png', 'jpg', 'jpeg', 'jfif', 'gif', 'pdf', 'txt', 'mp4');
        
        if(!in_array($fileActualExt, $allowed))
        {
            echo("You cant...");
            exit();
        }
        
        if($fileError !== 0)
        {
            echo("Error uploading");
            exit();
        }
        
        if($filesize > 10000000)
        {
            echo("Too big");
            exit();
        }
        
        if($lastChar == "/")
        {
            $fileDestination = "/var/www/html/strona/".$path.$fileName;
        }
        else
        {
            $fileDestination = "/var/www/html/strona/".$path."/".$fileName;
        }
        
        if(move_uploaded_file($fileTmpName, $fileDestination))
        {
            header("Location: ../dashboard/dashboard.php?u=success");
        }

        header("Location: ../dashboard/dashboard.php?u=error");

?>                              