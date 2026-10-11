<?php session_start();include("connection.php");include("functions.php");$user_data = check_login($con);

    if ($con->connect_error) {
      exit("Fehler bei der verbindung");
    }else {
      $sql = "SELECT * FROM `movie`";
      if ($res = $con->query($sql)) {
        if ($res->num_rows == 0) {
          echo "Es gibt keine vorhandene Datenbank";
        }else {
          $film = $res->num_rows;
          $res->close();
        }
      }else {
        exit("Fehler bei der Verbingung zum Datenpaket");
      }
    }
?>
<?php
$sql2 = "SELECT * FROM `movie` HAVING `media_id` = $film";$res2 = $con->query($sql2);$dsatz2 = $res2->fetch_assoc();$poster_width = $dsatz2["poster_width"];
$sql3 = "SELECT * FROM `movie` HAVING `media_id` = $film - 1";$res3 = $con->query($sql3);$dsatz3 = $res3->fetch_assoc();$poster_width2 = $dsatz3["poster_width"];
$sql4 = "SELECT * FROM `movie` HAVING `media_id` = $film - 2";$res4 = $con->query($sql4);$dsatz4 = $res4->fetch_assoc();$poster_width3 = $dsatz4["poster_width"];
$sql5 = "SELECT * FROM `movie` HAVING `media_id` = $film - 3";$res5 = $con->query($sql5);$dsatz5 = $res5->fetch_assoc();$poster_width4 = $dsatz5["poster_width"];
$sql6 = "SELECT * FROM `movie` HAVING `media_id` = $film - 4";$res6 = $con->query($sql6);$dsatz6 = $res6->fetch_assoc();$poster_width5 = $dsatz6["poster_width"];
?>
<html>
	<?php include_once "header.php"; ?>
  <head>
    <title>Startseite</title>
    <link rel="stylesheet" href="shower.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="lightslider.css">
    <script src="JQuery3.3.1.js"></script>
    <script src="lightslider.js"></script>
  </head>
<?php include_once "mode.php"; ?>
  <body>
    <div class="animation">
  		<div class="allow">
        <img src="close.png" onclick="toggleconnection();" >
				<center><h1>Um die Sperre aufzuheben, müssen sie den Zugriff der folgenden Website <a href="https://aiman.mywire.org:54639">Erlauben</a> .</h1></center>
      </div>

      <?php include_once "nav.php"; ?>

      <section id="main">
        <h1 class="showcase-heading">Neueinsteiger</h1>
        <ul id="autoWidth" class="cs-hidden">
          <li class="item-a">
            <div class="showcase-box">
              <a href="film<?php echo $film; ?>.php"><img src="<?php echo $poster_width; ?>"></a>
            </div>
          </li>
          <li class="item-b">
            <div class="showcase-box">
              <a href="film<?php echo $film - 1; ?>.php"><img src="<?php echo $poster_width2; ?>"></a>
            </div>
          </li>
          <li class="item-c">
            <div class="showcase-box">
              <a href="film<?php echo $film - 2; ?>.php"><img src="<?php echo $poster_width3; ?>"></a>
            </div>
          </li>
          <li class="item-d">
            <div class="showcase-box">
              <a href="film<?php echo $film - 3; ?>.php"><img src="<?php echo $poster_width4; ?>"></a>
            </div>
          </li>
          <li class="item-e">
            <div class="showcase-box">
              <a href="film<?php echo $film - 4; ?>.php"><img src="<?php echo $poster_width5; ?>"></a>
            </div>
          </li>
        </ul>
      </section>
      <section id="latest">
        <h1 class="latest-heading">Top Filme</h1>
        <ul id="autoWidth2" class="cs-hidden">
          <li class="item-a">
            <a href="index3.php">
            <div class="latest-box">
              <div class="latest-b-img">
                <img src="https://91.65.212.125:54705/nas/filelink.lua?id=ba1383444aac5863">
              </div>
              <div class="latest-b-text">
                <strong>Endame 2019</strong>
                <p>Action/Sci-Fi</p>
              </div>
            </div>
            </a>
          </li>
          <li class="item-b">
            <a href="#">
            <div class="latest-box">
              <div class="latest-b-img">
                <img src="https://91.65.212.125:54705/nas/filelink.lua?id=ba1383444aac5863">
              </div>
              <div class="latest-b-text">
                <strong>Ocean’s Eleven 2001</strong>
                <p>Krimi/Komödie</p>
              </div>
            </div>
            </a>
          </li>
          <li class="item-c">
            <a href="#">
            <div class="latest-box">
              <div class="latest-b-img">
                <img src="https://91.65.147.205:54705/nas/filelink.lua?id=d2bc9e0d9fe9cd07">
              </div>
              <div class="latest-b-text">
                <strong>Infinity War 2018</strong>
                <p>Action/Sci-Fi</p>
              </div>
            </div>
            </a>
          </li>
          <li class="item-d">
            <a href="#">
            <div class="latest-box">
              <div class="latest-b-img">
                <img src="https://91.65.147.205:54705/nas/filelink.lua?id=394e48f030521068">
              </div>
              <div class="latest-b-text">
                <strong>Kingsman 2 2017</strong>
                <p>Action</p>
              </div>
            </div>
            </a>
          </li>
          <li class="item-e">
            <a href="#">
            <div class="latest-box">
              <div class="latest-b-img">
                <img src="https://91.65.147.205:54705/nas/filelink.lua?id=93a48925c5a419d6">
              </div>
              <div class="latest-b-text">
                <strong>Ocean’s 8 2018</strong>
                <p>Komödie/Krimi</p>
              </div>
            </div>
            </a>
          </li>
          <li class="item-f">
            <a href="#">
            <div class="latest-box">
              <div class="latest-b-img">
                <img src="https://91.65.147.205:54705/nas/filelink.lua?id=cba3916b79003178">
              </div>
              <div class="latest-b-text">
                <strong>Harry Potter 4 2005</strong>
                <p>Fantasy/Abenteuer</p>
              </div>
            </div>
            </a>
          </li>
          <li class="item-g">
            <a href="#">
            <div class="latest-box">
              <div class="latest-b-img">
                <img src="https://91.65.147.205:54705/nas/filelink.lua?id=f9662ceab21a1793">
              </div>
              <div class="latest-b-text">
                <strong>Fluch der Karibik 1</strong>
                <p>Abenteuer/Action</p>
              </div>
            </div>
            </a>
          </li>
          <li class="item-h">
            <a href="index5.php">
            <div class="latest-box">
              <div class="latest-b-img">
                <img src="https://91.65.147.205:54705/nas/filelink.lua?id=0857729f6237bbdf">
              </div>
              <div class="latest-b-text">
                <strong>Ocean's Twelve 2004</strong>
                <p>Krimi/Komödie</p>
              </div>
            </div>
          </li>
          <li class="item-i">
            <a href="#">
            <div class="latest-box">
              <div class="latest-b-img">
                <img src="https://91.65.147.205:54705/nas/filelink.lua?id=da2d40617ba36a54">
              </div>
              <div class="latest-b-text">
                <strong>Harry Potter 5 2007</strong>
                <p>Fantasy/Abenteuer</p>
              </div>
            </div>
            </a>
          </li>
        </ul>
      </section>
  		<section id="serien">
  			<h1 class="showcase-heading">Top Serien</h1>
        <ul id="autoWidth3" class="cs-hidden">
          <li class="item-a">
            <div class="showcase-box">
              <a href="#"><img src="https://91.65.212.125:54705/nas/filelink.lua?id=b8a7168047e56abf"></a>
            </div>
          </li>
          <li class="item-b">
            <div class="showcase-box">
              <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=6e8331b5da412afb"></a>
            </div>
          </li>
          <li class="item-c">
            <div class="showcase-box">
              <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=00819444bb83e499"></a>
            </div>
          </li>
          <li class="item-d">
            <div class="showcase-box">
              <a href="#"><img src=""></a>
            </div>
          </li>
          <li class="item-e">
            <div class="showcase-box">
              <a href="#"><img src=""></a>
            </div>
          </li>
        </ul>
  		</section>
      <div class="movies-heading">
        <h2>Top 10</h2>
      </div>
      <section id="movie-list">
        <div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=15aaf8e026c6d19f"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
        <div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=93a48925c5a419d6"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
        <div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=f9662ceab21a1793"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
        <div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=394e48f030521068"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
        <div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=d2bc9e0d9fe9cd07"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
        <div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=470ca6ac9e9edde8"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
        <div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=9d86088534bc7d07"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
        <div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=630f630322ee280f"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
  			<div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=630f630322ee280f"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
  			<div class="movie-box">
          <div class="movie-img">
            <a href="#"><img src="https://91.65.147.205:54705/nas/filelink.lua?id=630f630322ee280f"></a>
          </div>
          <a href="#"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></a>
        </div>
      </section>
      <div class="btns">
        <a href="#">Alle Filme und Serien</a>
      </div>
      <script>
            $(document).ready(function() {
        $('#autoWidth,#autoWidth2,#autoWidth3').lightSlider({
            autoWidth:true,
            loop:true,
            onSliderLoad: function() {
                $('#autoWidth,#autoWidth2,#autoWidth3').removeClass('cs-hidden');
            }
        });
        });
      </script>
  		<script>
        function toggleconnection() {
          const allow = document.querySelector('.allow');
          allow.classList.toggle('active')
        }
      </script>
    </div>
  </body>
</html>
