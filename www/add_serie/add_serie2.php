<?php session_start();
   if(isset($_POST["n"]))
   {
      /* Falls Name und Passwort korrekt */
      if($_POST["n"] == "" && $_POST["p"] == "")
      {
         $_SESSION["n"] = $_POST["n"];
      }
   }

   /* Kontrolle, ob innerhalb der Session */
   if (!isset($_SESSION["n"]))
      exit("<p>Zugang verweigert<br /><a href='add_serie.php'>Zum Login</a></p>");
?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>ADD SERIE</title>
   </head>
   <body>
     <h3>Intro-Seite</h3>
     <p><a href="add_serie3.php">Zum Serie Hinzufügen</a></p>
     <p><a href="add_serie.php">Abmeldung</a></p>
   </body>
 </html>
