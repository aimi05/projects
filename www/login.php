<?php session_start();include("connection.php");include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					if($user_data['password'] === $password && $user_data['userlook'] == '0')
					{
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location:index.php");
						die;
					}else {

					}
					$iddd == $user_data['userlook'];
					switch($iddd) {
					    case 1:
					        $return2 == "<p>Bitte warte sie bis ihr Account freigeschaltet wird !</p>";
					        break;
					    case 2:
					        $return2 == "<p>Ihr Account ist gesperrt !</p>";
					        break;
					}
				}
			}
		}
	}
?>
<html lang="en" dir="ltr">
	<?php include_once "header.php"; ?>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Login Aiman Media</title>
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
          <h2>Login</h2>
					<p><?php echo $return2; ?></p>
          <form method="post">
            <div class="inputbox">
              <input type="text" placeholder="Benutzername" required name="user_name">
            </div>
            <div class="inputbox">
              <input type="password" placeholder="Passwort" required name="password">
            </div>
            <div class="inputbox">
              <input type="submit" value="Login" class="lo">
            </div>
            <p class="forget">Passwort vergessen ?
              <a href="passwort.php">Hier</a>
            </p>
            <p class="forget">Kein Account ?
              <a href="registrieren.php">Registrieren</a>
            </p>
          </form>
        </div>
      </div>
    </div>
    </section>
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
