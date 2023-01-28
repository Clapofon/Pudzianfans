<?php
   if(!isset($_POST['edit-submit']))
   {
      header("Location: ../dashboard/dashboard.php");
      exit();
   }

   $content = $_POST['edited-file'];
   $path = $_POST['path'];

   $file = fopen($path, "w");

   if(fwrite($file, $content) != false)
   {
      header("Location: ../dashboard/dashboard.php?e=success");
      exit();
   }

   fclose($file);

   header("Location: ../dashboard/dashboard.php?e=error");
   exit();

?>
