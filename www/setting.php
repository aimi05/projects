<?php session_start();include("connection.php");include("functions.php");
$user = check_user($con);

if ($con->connect_error) {
  exit("Fehler bei der Verbindung");
}else {
  $sql = "SELECT * FROM `users` HAVING `user_id` = $user";
  if ($res = $con->query($sql)) {
    if ($res->num_rows == 0) {
      echo "Es gibt keine vorhandene Datenbank";
    }else {
      $dsatz = $res->fetch_assoc();
      $mode = $dsatz["mode"];
      $auto = $dsatz["auto"];
    }
  }else {
    exit("Fehler bei der Verbingung zum Datenpaket");
  }
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $mode_new = $_POST['mode'];
  $auto_new = $_POST['auto'];
  $name_new = $_POST['name'];
  $pw_new = $_POST['pw'];
  $gb_new = $_POST['gb'];
  if (!empty($name_new)) {
    $query4 = "UPDATE `users` SET `user_name` = '$name_new' WHERE `users`.`user_id` = $user; ";
    mysqli_query($con,$query4);
  }
  if (!empty($gb_new)) {
    $query5 = "UPDATE `users` SET `birth` = '$gb_new' WHERE `users`.`user_id` = $user; ";
    mysqli_query($con,$query5);
  }
  if (!empty($pw_new)) {
    $query6 = "UPDATE `users` SET `password` = '$pw_new' WHERE `users`.`user_id` = $user; ";
    mysqli_query($con,$query6);
  }
  if ($auto_new == 'on') {
    $query3 = "UPDATE `users` SET `auto` = 'on' WHERE `users`.`user_id` = $user; ";
    mysqli_query($con,$query3);
  }else {
    $query2 = "UPDATE `users` SET `auto` = 'off' WHERE `users`.`user_id` = $user; ";
    mysqli_query($con,$query2);
  }
  if ($mode_new == 'dark-mode') {
    $query1 = "UPDATE `users` SET `mode` = 'dark-mode' WHERE `users`.`user_id` = $user; ";
    mysqli_query($con,$query1);
  }else {
    $query = "UPDATE `users` SET `mode` = 'light' WHERE `users`.`user_id` = $user; ";
    mysqli_query($con,$query);
  }header("Location:setting.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<?php include_once "header.php"; ?>
  <head>
    <link rel="stylesheet" href="setting.css">
    <title>Aiman Media | Einstellungen</title>
  </head>
  <body class="<?php echo $mode; ?>">
    <div class="<?php echo $auto; ?>" id="helper">
		<div class="animation">
	    <section>
        <div class="background">
	        <div class="color"></div>
	        <div class="color"></div>
	        <div class="color"></div>
	      </div>
        <div class="content">
          <form method="post">
            <div class="ld">
              <h4>Dark- und Lightmode einstellen:</h4>
                <p>Stellen Sie hier Darkmode oder Lightmode einstellen:</p>
                <label class="switch">
                    <input type="checkbox" name="mode" id="switch1" value="<?php echo $mode; ?>">
                    <span class="slider round"></span>
                </label>
                  <p>Auto-mode:</p>
                <label class="switch2">
                    <input type="checkbox" name="auto" id="switch2" value="<?php echo $auto; ?>">
                    <span class="slider round"></span>
                </label>

              </div>

              <h4>Persönliche Daten ändern:</h4>
              <div class="in-box">
          <input type="text" name="name" placeholder="Name ändern"></div>
                  <div class="in-box">
                <input type="password" name="pw" placeholder="Passwort ändern"></div>
                    <div class="in-box">
                <input type="date" name="gb" placeholder="Geburtsdatum ändern">
                </div>
                <div class="in-box">
            <input type="submit" class="senden set sub" value="Speichern">
            </div>
          </form>
        </div>
      </section>

            <?php include_once "nav.php"; ?>

	   </div>
     </div>
     <script>
      let DARKMODE = false;
      const BUTTON = document.getElementById('switch1');
      const AUTO = document.getElementById('switch2');
      const BODY = document.querySelector('body');
      const HELPER = document.getElementById('helper');
      let AUT;
        if (HELPER.classList.contains('on')) {
          AUT = true;
        }else {
          AUT = false;
        }
      const setClasstoBody = () => {
        if (DARKMODE) {
          BODY.classList.remove('light');
          BODY.classList.add('dark-mode');
          BUTTON.value = "dark-mode";
        }else {
          BODY.classList.add('light');
          BODY.classList.remove('dark-mode');
          BUTTON.value = "light";
        }
      };
      const switchAuto = () => {
        AUT = !AUT;
        setClasstoHelper();
      };
      const setClasstoHelper = () => {
        if (AUT) {
          HELPER.classList.remove('off');
          HELPER.classList.add('on');
          AUTO.value = "on";
          if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            DARKMODE = true;
          }else {
            DARKMODE = false;
          }
          setClasstoBody();
        }else {
          HELPER.classList.add('off');
          HELPER.classList.remove('on');
          AUTO.value = "off";
        }
      };
      const switchMode = () => {
        if (!AUT) {
          DARKMODE = !DARKMODE;
          setClasstoBody();
        }else {

        }
      };
      if (HELPER.classList.contains('on')) {
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
          DARKMODE = true;
        }else {
          DARKMODE = false;
        }
        setClasstoBody();
      }else {

      }
      AUTO.addEventListener('click', switchAuto);
      BUTTON.addEventListener('click', switchMode);
    </script>
  </body>
</html>
