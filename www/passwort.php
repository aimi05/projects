<html lang="en" dir="ltr">
	<?php include_once "header.php"; ?>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Passwort zurücksetzen Aiman Media</title>
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
              <h2>Passwort zurücksetzen</h2>
                <?php
                if(isset($_POST["submit"])){
                  mail("aiman.borg@gmx.de", "Jemand möchte sein Passwort zurücksetzen", "Benutzername: ".$_POST["n"]." Email: ".$_POST["e"]. "  Neues Passwort: ".$_POST["p"]);
                  ?>
                  <h1 style="color: rgba(255, 255, 255, 0.6); size: 1.1em;">Das Passwort wird in den nächsten 24h zurückgesetzt !</h1>
                  <?php
                }
                 ?>
              <form method="post">
                <div class="inputbox">
                  <input type="text" placeholder="Benutzername" required name="n">
                </div>
                <div class="inputbox">
                  <input type="email" placeholder="E-mail" required name="e">
                </div>
                <div class="inputbox">
                  <input type="password" placeholder=" Neues Passwort" required name="p">
                </div>
                <div class="inputbox">
                  <input type="submit" value="Passwort zurücksetzen" name="submit" class="pw">
                </div>
                <p class="forget">Kein Account ?
                  <a href="registrieren.php">Registrieren</a>
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
    <div class="animation">
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
