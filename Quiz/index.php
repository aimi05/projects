<?php session_start();include("connection.php");include("Func.php");$user_data = check_login($con);
//neue Session wird gestartet
//notwendige Funktionen und Verbindungen werden angeangen
//überprüfung des Benutzers mit der Funktion check_login();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quiz Auswählen</title>
    <h2>Wählen sie ihr Quiz aus</h2>
<a href="EU.php">Europa-Quiz</a> <br>
<a href="NA.php">Nordamerika-Quiz</a><br>
<a href="AU.php">Australien-Quiz</a><br>
<a href="SA.php">Südamerika-Quiz</a><br>
<a href="AS.php">Asien-Quiz</a><br>
<a href="AF.php">Afrika-Quiz</a><br>
  </head>
  <body>
  </body>
</html>
