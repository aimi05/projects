<?php session_start();

   /* Beenden der Session */
   session_destroy();
   $_SESSION = array();
?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>ADD MOVIE</title>
   </head>
   <body>
     <h3>Anmeldung</h3>
     <form action="add_movie2.php" method="post">
       <p>Name <input type="text" name="n"></p>
       <p>Passwort <input type="password" name="p"></p>
       <p><input type="submit"></p>
     </form>
   </body>
 </html>
