<?php session_start();//neue Session wird erstellt
include("connection.php");include("Func.php"); //allgemine Verbindungen zu anderen Dateien (Funktionen)

if($_SERVER['REQUEST_METHOD'] == "POST") // wenn Formular abgesendet wird
{
  // Werte von den Eingabefeldern des Formulars werden in Variablen gespeichert
  $user_name = $_POST['user'];
  $password = $_POST['pw'];

  if(!empty($user_name) && !empty($password)) //überprüfung ob die Felder leer sind
  {

    //liest von der Datenbank aus mit dem dem eingegebenen Benutztername
    $query = "select * from users where name = '$user_name' limit 1";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);

        if($user_data['password'] == $password ) // überprüfung des Passwortes
        {
          $_SESSION['id'] = $user_data['id']; //übertragung der Session id
          header("Location:index.php"); // witerleitung zur Startseite
          die;
        }
  }
}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Anmeldung Quiz</title>
  </head>
  <body>
     <h2>Login Quiz</h2>
     <form action="login.php" method="post">
       <input type="text" name = "user"  class=" input">
       <input type="password" name ="pw" class = "input">
       <input type="submit" value="Absenden">
     </form>
     <a href="registrieren.php">Registrieren</a>
  </body>
</html>
