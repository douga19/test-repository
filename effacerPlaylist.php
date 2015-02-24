<?php
	$playlist = simplexml_load_file("emptyPlaylist.xml");
	$playlist->asXml("playlist.xml");
	header("location:index.php")
?>