<?php
  session_start();

   if(!isset($_SESSION['adminId']))
   {
      header("Location: ../../index.php");
      exit();
   }

      if(!isset($_POST['edit-submit']))
      {
         header("Location: dashboard.php?e=nosuchfile");
         exit();
      }
      
      $filePath = $_POST["filePath"];
      $filePath = "../../".$filePath;

      $pathFinal = mb_substr($filePath, 5);
      $pathFinal = "strona".$pathFinal;

      if(file_exists($filePath) && is_file($filePath))
      {
         $file = fopen($filePath,"rt");
         $content = fread($file, filesize($filePath));
      }

      fclose($file);

?>
   <!DOCTYPE HTML>
   <html lang="pl">
   <head>
   	<meta charset="utf-8">
   	<title>Home</title>
   	<link href="../../css/main.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
   <link href="../../css/fontello.css" rel="stylesheet">


   </head>
   <body style="overflow-y: hidden;">
      <main style="margin: 0;">
         <div class="file-edit-textbox" id="editor">

         </div>

         <div class="editor-file-path">Editing: <?php echo($pathFinal); ?></div>

         <div class="form-container" style="width: 100% !important; margin: 0 !important; padding: 0 !important;">
            <form action="../include/edit_files.inc.php" method="post">
               <textarea id="code" type="hidden" name="edited-file" value="" style="display: none;">
                  <?php
                     echo($content);
                  ?>
               </textarea>
               <input type="hidden" name="path" value="<?php echo($filePath);?>">
               <button type="submit" name="edit-submit" class="editor-edit-submit-button">edit</button>
            </form>
         </div>

      </main>

      <script src="../../src/ace.js" type="text/javascript" charset="utf-8"></script>
      <script>
            var el = document.getElementById("editor");
            var text = el.innerHTML;
            var editor = ace.edit(el);
            editor.session.setValue(text);
            editor.setTheme("ace/theme/monokai");
            editor.session.setMode("ace/mode/php");

            var content = document.getElementById("code").value;
            editor.setValue(content);

            editor.getSession().on('change', function() {
               update()
            });

            function update()
            {
               var val = editor.getSession().getValue();
               var divecho = document.getElementById("code");
               divecho.innerHTML = val;
            }
      </script>

<?php
   require "../../footer.php";
?>