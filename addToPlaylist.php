<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		//recherche de la chanson dont l'id est $_GET['id'] dans all.xml
		$all = simplexml_load_file("all.xml");
		$xpath = "//song[@id = ".$id."]";
		
		$resultat = $all->xpath($xpath);

		foreach ($resultat as $song) {
			$titre= $song->titre;
			$artiste= $song->artiste;
			$duree= $song->duree;
			$path= $song->path;
		}
		
		//recupere l'id de la dernière chanson dans playlist.xml
		$playlist = simplexml_load_file("playlist.xml");
		
		if($playlist->xpath("//song")){
			$xpath = "//song[last()]";
			$resultat = $playlist->xpath($xpath);
			foreach ($resultat as $song) {
				$lastId = $song['id'];
			}

			//attribue l'id suivant
			$nextId = $lastId + 1;
		} else {
			$nextId = 0;
		}

		//lire le contenuexistant de playlist.xml
		$playlist = file_get_contents("playlist.xml");
	
		//les contenus a ajouter
		$toAdd= "<song id='" . $nextId . "'><titre>" . $titre . "</titre><artiste>" . $artiste .  "</artiste><duree>" . $duree . "</duree><path>" . $path . "</path></song>\n
		</playlist>";
		
		//remplace '</playlist>' par $toAdd
		file_put_contents("playlist.xml", str_replace("</playlist>", $toAdd, $playlist));

		echo "Fait";
	}
	else echo "Error";
?>