<?php session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $link = $_POST['link'];
  }

?>
<html lang="en" dir="ltr">
	<?php include_once "header.php"; include_once "mode.php";?>
  <head>
    <link rel="stylesheet" href="setting.css">
    <title>Aiman Media | Mediaplayer</title>
  </head>
  <body>
		<div class="animation">
	    <section>
        <div class="background">
	        <div class="color"></div>
	        <div class="color"></div>
	        <div class="color"></div>
	      </div>
      </section>
            <?php include_once "nav.php"; ?>
            <div class="player">
              <video src="<?php echo $link; ?>" controls="true" height="90%" width="90%" ></video>
              <form action="mediaplayer.php" method="post">
                <input type="text" name="link" placeholder="Hier den Link eingeben">
                <input type="submit" value="Starten" class="start">
              </form>
            </div>
	   </div>
  </body>
</html>
