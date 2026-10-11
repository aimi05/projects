<?php session_start();

	include("connection.php");
	include("functions.php");
?>



<html lang="en" dir="ltr">
	<?php include_once "header.php"; ?>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Registrierung Aiman Media</title>
  </head>
	<body class="light">
		<div class="moon">
			<div class="sun">
				<div class="mode">
					<i class="far fa-sun" id="switch1"></i>
				</div>
			</div>
		</div>
		<div class="animation">
    <form method="post">
      <section>
      <div class="color"></div>
      <div class="color"></div>
      <div class="color"></div>
      <div class="box">
        <div class="sqaure" style="--i:0;"></div>
        <div class="sqaure" style="--i:1;"></div>
        <div class="sqaure" style="--i:2;"></div>
        <div class="sqaure" style="--i:3;"></div>
        <div class="sqaure" style="--i:4;"></div>
        <div class="container">
            <div class="form">
              <h2>Registrieren</h2>
							<?php
							if($_SERVER['REQUEST_METHOD'] == "POST")
							{
								//something was posted
								$user_name = $_POST['user_name'];
								$password = $_POST['password'];
								$email = $_POST['email'];
								$mode = "light";
								$auto = "on";
								$birth = $_POST['birth'];

								if(!empty($user_name)  && !empty($password) && !is_numeric($user_name))
								{

									//save to database
									$user_id = random_num(20);
									$query = "insert into users (user_id,user_name,password,email,userlook,mode,auto,birth) values ('$user_id','$user_name','$password','$email',1,'$mode','$auto','$birth')";

									mysqli_query($con, $query);
									mail($email,"Willkommen bei aiman media",$user_name. " ihr Passwort lauetet: ".$password. " Bei Fehler bitte melden sie sich bei Aiman Borghoul ()");
									mail("","Jemand möchte sich registrieren",$user_name. " möchte sich registieren mit dem Passwort: ".$password. " Bei Fehler bitte melden sie sich bei Aiman Borghoul ()");

									echo '<p>Sie könne sich in den nächsten 24h <a href="login.php">anmelden</a> !</p>';
									die;
								}
								else
								{
									echo "Please enter some valid information!";
								}
							}

							 ?>
              <form method="post">
                <div class="inputbox">
                  <input type="text" placeholder="Benutzername" required name="user_name">
                </div>
                <div class="inputbox">
                  <input type="password" placeholder="Passwort" required name="password">
                </div>
                <div class="inputbox">
                  <input type="email" placeholder="E-mail" required name="email">
                </div>
								<div class="inputbox">
									<p class="bday">Geburstdatum:</p>
									<input type="date" required name="birth">
								</div>
                <div class="inputbox">
                  <input type="submit" value="Registrieren" name="submit" class="re">
                </div>
                <p class="forget">Passwort vergessen ?
                  <a href="passwort.php">Hier</a>
                </p>
                <p class="forget">Schon angemeldet ?
                  <a href="login.php">Login</a>
                </p>
              </form>
            </div>
        </div>
      </div>
      </section>
    </form>
		</div>
		<script>
		 let DARKMODE = false;
		 const BUTTON = document.getElementById('switch1');
		 const BODY = document.querySelector('body');
		 if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
			 DARKMODE = true;
		 }else {
			 DARKMODE = false;
		 }
		 const switchMode = () => {
			 DARKMODE = !DARKMODE;
			 setClasstoBody();
		 };
		 const setClasstoBody = () => {
			 if (DARKMODE) {
				 BODY.classList.remove('light');
				 BODY.classList.add('dark-mode');
				 BUTTON.classList.remove('far', 'fa-sun');
				 BUTTON.classList.add('fas', 'fa-moon');
			 }else {
				 BODY.classList.add('light');
				 BODY.classList.remove('dark-mode');
				 BUTTON.classList.remove('fas', 'fa-moon');
				 BUTTON.classList.add('far', 'fa-sun');
			 }
		 };
		 BUTTON.addEventListener('click', switchMode);
		 setClasstoBody();
	 </script>
  </body>
</html>
