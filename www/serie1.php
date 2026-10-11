<?php session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
  /*$Servername = "localhost";
  $Username = "root";
  $Password = "root";
  $DBNAME = "media";
  $port = "3306";
  $con = mysqli_connect($Servername, $Username, $Password, $DBNAME,$port);*/
    if ($con->connect_error) {
      exit("Fehler bei der verbindung");
    }else {
      $sql = "SELECT * FROM `serie` HAVING `media_id` = 2";
      if ($res = $con->query($sql)) {
        if ($res->num_rows == 0) {
          echo "Es gibt keine vorhandene Datenbank";
        }else {
          $dsatz = $res->fetch_assoc();
          $media_id = $dsatz["media_id"];
          $title_name = $dsatz["title_name"];
          $media_bg_cover = $dsatz["media_bg_cover"];
          $title_img = $dsatz["title_img"];
          $release_year = $dsatz["release_year"];
          $fsk = $dsatz["fsk"];
          $length = $dsatz["length"];
          $genre = $dsatz["genre"];
          $blurb = $dsatz["blurb"];
					$folgen = $dsatz['folgen'];
		      $folge1 = $dsatz['folge1'];
		      $folge2 = $dsatz['folge2'];
		      $folge3 = $dsatz['folge3'];
		      $folge4 = $dsatz['folge4'];
		      $folge5 = $dsatz['folge5'];
		      $folge6 = $dsatz['folge6'];
		      $folge7 = $dsatz['folge7'];
		      $folge8 = $dsatz['folge8'];
		      $folge9 = $dsatz['folge9'];
		      $folge10 = $dsatz['folge10'];
		      $folge11 = $dsatz['folge11'];
		      $folge12 = $dsatz['folge12'];
		      $folge13 = $dsatz['folge13'];
		      $folge14 = $dsatz['folge14'];
		      $folge15 = $dsatz['folge15'];
		      $folge16 = $dsatz['folge16'];
		      $folge17 = $dsatz['folge17'];
		      $folge18 = $dsatz['folge18'];
		      $folge19 = $dsatz['folge19'];
		      $folge20 = $dsatz['folge20'];
		      $folge21 = $dsatz['folge21'];
		      $folge22 = $dsatz['folge22'];
		      $folge23 = $dsatz['folge23'];
		      $folge24 = $dsatz['folge24'];
		      $folge25 = $dsatz['folge25'];
		      $folge26 = $dsatz['folge26'];
		      $folge27 = $dsatz['folge27'];
		      $folge28 = $dsatz['folge28'];
		      $folge29 = $dsatz['folge29'];
		      $folge30 = $dsatz['folge30'];
		      $folge31 = $dsatz['folge31'];
          $poster_height = $dsatz["poster_height"];
          $poster_width = $dsatz["poster_width"];
          $res->close();
        }
      }else {
        exit("Fehler bei der Verbingung zum Datenpaket");
      }
    }
?>



<html lang="en" dir="ltr">
	<?php include_once "header.php"; ?>
  <head>
    <link rel="stylesheet" href="film.css">
    <title>Aiman Media | <?php echo $title_name; ?></title>
  </head>
	<?php include_once "mode.php"; ?>
	<body class="<?php echo $return1; ?> ">
		<div class="animation serie">
	    <section>
	      <div class="background">
	        <div class="color"></div>
	        <div class="color"></div>
	        <div class="color"></div>
	      </div>
	      <div class="banner">
	        <img src="<?php echo $media_bg_cover; ?>" class="bg">
	        <div class="content">
	          <img src="<?php echo $title_img; ?>" class="movieTile">
	          <h4>
	            <span><?php echo $release_year; ?></span>
	            <span><i><?php echo $fsk; ?></i></span>
	            <span><?php echo $length; ?></span>
	            <span><?php echo $genre; ?></span>
	          </h4>
	          <p><?php echo $blurb; ?></p>
	          <div class="buttons">
	            <a href="#" onclick="toggleTrailer();"><i class="fa fa-play" aria-hidden="true">Play</i></a>
	            <a href="#"><i class="fa fa-plus" aria-hidden="true"> Meine Liste</i></a>
	          </div>
						<div class="test">
							<div class="feedback">
								<input type="radio" name="rate" id="rate-5">
								<label for="rate-5" class="fa fa-star"></label>
								<input type="radio" name="rate" id="rate-4">
								<label for="rate-4" class="fa fa-star"></label>
								<input type="radio" name="rate" id="rate-3">
								<label for="rate-3" class="fa fa-star"></label>
								<input type="radio" name="rate" id="rate-2">
								<label for="rate-2" class="fa fa-star"></label>
								<input type="radio" name="rate" id="rate-1">
								<label for="rate-1" class="fa fa-star"></label>
							</div>
						</div>
						<div class="folgen-anzeige">
							<?php
							$p = 1;
							 while ($folgen >= $p) {
								echo "<div class='box ";
								echo $p;
								echo "'>";
								echo "<h4>";
								echo $p++;
								echo "</h4>";
								echo "</div>";
							} ?>
	        </div>
	        <a href="<?php echo $video; ?>"class="play"><img src="<?php echo $downloadbtn; ?>">Downlaod</a>
	      </div>
	    </section>

						<?php include_once "nav.php"; ?>

	    <div class="trailer">
	      <video src="<?php echo $video; ?>" controls="true" height="90%" width="90%" poster="<?php echo $media_bg_cover; ?>">

	      </video>
	      <img src="<?php echo $closebtn; ?>" class="close" onclick="toggleTrailer();">
	    </div>
	    <script>
	      function toggleTrailer() {
	        const trailer = document.querySelector('.trailer');
	        const video = document.querySelector('video');
	        trailer.classList.toggle('active')
	        video.currentTime = 0;
	        video.pause();
	      }
				const BOX = document.querySelector('.box');
				const ONE = document.querySelector('.1');
					BOX.classList.contains('1')
				if (true) {

				}
	    </script>
	   </div>
  </body>
</html>
