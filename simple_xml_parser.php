<?php 
	$all_xml = simplexml_load_file("all.xml");

	$song_xpath = "/all/song";

	$chanson = $all_xml->xpath($song_xpath);

	foreach($chanson as $song) {
  		echo "<li id=".$song['id']." path='".$song->path."'>".$song->titre." - ".$song->artiste."</li>";
  	}

?>
