<!DOCTYPE html>
<html>
<head>
	<title>Real Player</title>

	<meta content="text/html; charset=UTF-8" http-equiv="content-type">

	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
	<script type="text/javascript" src="assets/js/realplayer.js"></script>

	<!-- <link rel="stylesheet" type="text/css" href="assets/css/ui-lightness/jquery-ui-1.10.4.custom.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.structure.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.theme.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/ui-custom.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<link rel="shortcut icon" href="assets/img/picto.png">

</head>
<body>

<div id="content-wrapper">
	<div id="banner"></div>
	<div id="all">
  		<h1 class="ui-widget-header">Ma musique</h1>
		<ul class="overflow">
			<?php include 'simple_xml_parser.php';?>
		</ul>
	</div>
	<div id="playlist">
		<h1 class="ui-widget-header">Ma playlist</h1>
		<div class="ui-widget-content">
	    	<ol id="myplaylist" class="overflow">
	      		<?php 
	      			$playlist = simplexml_load_file("playlist.xml");
					foreach($playlist as $song) {
				  		echo "<li id='playlist".$song['id']."' playlistId='".$song['id']."' path='".$song->path."'>".$song->titre." - ".$song->artiste."</li>";
				  	}
	      		?>
	    	</ol>
	  	</div>
	</div>
	<div id="player">
		<!-- <div id="nowPlaying">
			<p>Vous écoutez:</p>
		</div> -->
		<audio id="toPlay" songId="" controls autoplay preload>
  			Your browser does not support the audio element
		</audio>
		<button class="boutonNext" id="prev">Prev</button>
		<button class="boutonNext" id="next">Next</button>
	</div>
	<a href="effacerPlaylist.php"><button class="bouton">Effacer la playlist</button></a>
</div>

</body>
</html>

