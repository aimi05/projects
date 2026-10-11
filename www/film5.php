<?php session_start();

	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);

	/*$user_data = check_login($con);
  $Servername = "localhost";
  $Username = "root";
  $Password = "root";
  $DBNAME = "media";
  $port = "3306";
  $con = mysqli_connect($Servername, $Username, $Password, $DBNAME,$port);*/
    if ($con->connect_error) {
      exit("Fehler bei der verbindung");
    }else {
      $sql = "SELECT * FROM `movie` HAVING `media_id` = 5";
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
          $video = $dsatz["video"];
          $poster_height = $dsatz["poster_height"];
          $poster_width = $dsatz["poster_width"];
          $res->close();
        }
      }else {
        exit("Fehler bei der Verbingung zum Datenpaket");
      }
    }
include_once "film.php";
?>
