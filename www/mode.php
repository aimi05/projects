<?php
$user = check_user($con);
for ($i=0; $i < 1 ; $i++) {
  if ($con->connect_error) {
    exit("Fehler bei der Verbindung");
  }else {
    $sqlm = "SELECT * FROM `users` HAVING `user_id` = $user";
    if ($resm = $con->query($sqlm)) {
      if ($resm->num_rows == 0) {
        echo "Es gibt keine vorhandene Datenbank";
      }else {
        $dsatzm = $resm->fetch_assoc();
        $mode = $dsatzm["mode"];
        $auto = $dsatzm["auto"];
        if ($auto == "on") {
          $return1 = "media";
        }else {
          if ($mode == "light") {
            $return1 = "light";
          }else {
            $return1 = "dark-mode";
          }
        }
        $resm->close();
      }
    }else {
      exit("Fehler bei der Verbingung zum Datenpaket");
    }
  }
}
?>
<body class="<?php echo $return1; ?>">
  <script>
  </script>
  <script>
  const BODY = document.querySelector('body');
  if (BODY.classList.contains('media')) {
    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
      BODY.classList.remove('media');
      BODY.classList.add('dark-mode');
    }else {
      BODY.classList.remove('media');
      BODY.classList.add('light');
    }
  }
  </script>
</body>
<?php

 ?>
