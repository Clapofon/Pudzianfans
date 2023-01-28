<?php
   session_start();

   if(!isset($_SESSION['adminId']))
   {
      header("Location: ../../index.php");
      exit();
   }

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
   <meta charset="utf-8">
   <title>Admin dashboard</title>
   <link href="../../css/main.css" rel="stylesheet">
   <link href="../../css/fontello.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
   <nav class="flex container-fluid main-nav admin-nav">
      <ul class="flex nav">
         <li class="dropdown admin-dropdown">
            Tools
            <ul class="inside">
               <li>
                  <a href="dashboard.php?u=true"><i class="icon-upload"></i> upload</a>
               </li>
               <li>
                  <a href="dashboard.php?e=true"><i class="icon-pencil"></i> edit</a>
               </li>
               <li>
                  <a href="dashboard.php?d=true"><i class="icon-trash"></i> delete</a>
               </li>
               <li>
                  <a href="dashboard.php?fs=true"><i class="icon-folder"></i> file structure</a>
               </li>
            </ul>
         </li>
      </ul>
         <div class="nav-form-container">
            <form action="../../include/logout.inc.php" method="post">
            <button name="logout-submit" type="submit">Logout</button>
            </form>
         </div>
   </nav>
   <main class="container">

      <div class="header-block">Admin Panel</div>

      <?php
         if(isset($_GET['u']))
         {
            if($_GET['u'] == "true")
            {
               ?>
                  <h1 style="text-align: center;">Upload files</h1>

                  <div class="form-container">
                     <form action="../include/upload_files.inc.php" method="post" enctype="multipart/form-data">
                        <input name="path" placeholder="file path (starts from site/)">
                        <label for="file-upload" class="file-upload-button">
                            Select file ...
                        </label>
                        <input id="file-upload" type="file" name="file">
                        <button type="submit" name="upload-submit">upload</button>
                     </form>
                  </div>
               <?php
            }
            else if($_GET['u'] == "success")
            {
               ?>
                  <p class="green-color">File uploaded successfuly!</p>
               <?php
            }
            else if($_GET['u'] == "error")
            {
               ?>
                  <p class="red-color">There was an error uploading file!</p>
               <?php
            }
         }
         else if(isset($_GET['e']))
         {
            if($_GET['e'] == "true")
            {
               ?>
                  <h1 style="text-align: center;">Edit files</h1>

                  <div class="form-container">
                     <form action="edit_files.php" method="post">
                        <input name="filePath" placeholder="file path (starts from strona/)">
                        <button type="submit" name="edit-submit">edit</button>
                     </form>
                  </div>
               <?php
            }
            else if($_GET['e'] == "success")
            {
               ?>
                  <p class="green-color">Edited file successfuly!</p>
               <?php
            }
            else if($_GET['e'] == "error")
            {
               ?>
                  <p class="red-color">There was an error editing your file!</p>
               <?php
            }
            else if($_GET['e'] == "nosuchfile")
            {
               ?>
                  <p class="red-color">No such file!</p>
               <?php
            }
         }
         else if(isset($_GET['d']))
         {
            if($_GET['d'] == "true")
            {
               ?>
                  <h1 style="text-align: center;">Delete files</h1>

                  <div class="form-container">
                     <form action="../include/delete_files.inc.php" method="post">
                        <input name="filePath" placeholder="file path (starts from strona/)">
                        <button type="submit" name="delete-submit">delete</button>
                     </form>
                  </div>
               <?php
            }
            else if($_GET['d'] == "success")
            {
               ?>
                  <p class="green-color">Deleted file successfuly!</p>
               <?php
            }
            else if($_GET['d'] == "error")
            {
               ?>
                  <p class="red-color">There was an error deleting your file!</p>
               <?php
            }
            else if($_GET['d'] == "nosuchfile")
            {
               ?>
                  <p class="red-color">No such file!</p>
               <?php
            }
         }
         else if(isset($_GET['uc']))
         {
             if($_GET['uc'] == "true")
             {
                 require_once "../include/users_num_check.inc.php";
                 echo("Users online: ".online::who());
             }
         }
         else if(isset($_GET['fs']))
         {
             if($_GET['fs'] == "true")
             {
                 require_once "../include/list-contents.inc.php";

                 listFolderFiles("../../../strona");
             }
         }
      ?>
   </main>
                                                                           