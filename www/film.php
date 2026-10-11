<html lang="en" dir="ltr">
	<?php include_once "header.php";

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$one = $_POST['rate'];
		echo $one;
    if ($link = $_POST['one']) {

    }

  }


	 ?>
  <head>
    <link rel="stylesheet" href="film.css">
    <title>Aiman Media | <?php echo $title_name; ?></title>
  </head>
	<?php include_once "mode.php"; ?>
	<body class="<?php echo $return1; ?> movie">
		<div class="animation movie">
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
						<div class="rating">
							<i class="fa fa-star fa-2x" data-index="0"></i>
							<i class="fa fa-star fa-2x" data-index="1"></i>
							<i class="fa fa-star fa-2x" data-index="2"></i>
							<i class="fa fa-star fa-2x" data-index="3"></i>
							<i class="fa fa-star fa-2x" data-index="4"></i>
						</div>
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
			<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
			<script>
			var ratedIndex = -1 , uID = 0;


				$(document).ready(function(){
					resetstarcolor();
					if(localStorage.getItem('ratedIndex') != 0)
					setStar(parseInt(localStorage.getItem('ratedIndex')));
					$('.fa-star').on('click', function(){
						ratedIndex = parseInt($(this).data('index'));
						localStorage.setItem('ratedIndex', ratedIndex);
						savetotheDB();
					});
					$('.fa-star').mouseover(function(){
						resetstarcolor();

						var currentIndex = parseInt($(this).data('index'));
						setStar(currentIndex);

					});
					$('.fa-star').mouseleave(function(){
						resetstarcolor();
						if (ratedIndex != -1) {
							setStar(ratedIndex);
						}
					});

				});
				function setStar(max){
					for(var i = 0; i <= max; i++)
						$('.fa-star:eq('+i+')').css('color', 'rgba(0,0,0,0.6');
				}
				function resetstarcolor(){
					$('.fa-star').css('color','rgba(245,245,245,0.7)');
				}
				function savetotheDB(){
					$.ajax({
						url: "film.php",
						method: "POST",
						dataType: 'json',

						data:{
							save: l,
							uID: uID
							ratedIndex: ratedIndex
						}, success: function(r){
							uID = r.uID;
						}
					});
				}
			</script>


	    <script>
	      function toggleTrailer() {
	        const trailer = document.querySelector('.trailer');
	        const video = document.querySelector('video');
	        trailer.classList.toggle('active')
	        video.currentTime = 0;
	        video.pause();
	      }
	    </script>

	   </div>
  </body>
</html>
