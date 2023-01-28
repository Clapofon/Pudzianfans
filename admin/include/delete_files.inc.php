<?php
   if(!isset($_POST['delete-submit']))
   {
      header("Location: ../dashboard/dashboard.php?else");
      exit();
   }
   
   $filePath = $_POST['filePath'];
   $disallowed = array("admin/dashboard/dashboard.php", "admin/dashboard/edit_files.php", "include/delete_files.inc.php", "include/edit_files.inc.php", "include/login.inc.php", "include/upload_files.inc.php", "admin/login.php");

   if(in_array($filePath, $disallowed))
   {
      header("Location: ../dashboard/dashboard.php?d=cannotdelete");
      exit();
   }
   
   $filePath = "../../".$filePath;

   if(!is_file($filePath))
   {
      header("Location: ../dashboard/dashboard.php?d=nosuchfile");
      exit();
   }
   
   if(unlink($filePath))
   {
      header("Location: ../dashboard/dashboard.php?d=success");
      exit();
   }

   header("Location: ../dashboard/dashboard.php?d=error");
   exit();
?>
