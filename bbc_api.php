<!DOCTYPE html>
<html>
<head>
	<title>API</title>

	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="container">
<div class="row">
		<h1>NEWS OF THE WORLD .. Kein gutes Beispiel!</h1>
	</div>
	<div class="row mt-3">
		<h3>BBC</h3>
	</div>
	<div class="row">
		<?php
		//schlechtes Beispiel, hier wurde nur der Link und der Titel des Artikels imortiert .. ohne styling
		require_once 'RESTful.php'; //Datensicherungs File wird mit require_once verbunden
		$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml'; //URL der API
		$response = curl_get($url); //curl_get Funktion wird aufgerufen für die Datensicherung
		$xml = simplexml_load_string($response); //simplexml_load_string() macht bei XML einen Spring zum Objekt, kurz gesagt wird es bei XML Files benutzt
		foreach ($xml->channel->item as $item) { //foreach Loop, weil es mehere Artikel auf der Webseite gibt
		echo '<a href="'.$item->link.'" target="_blank">'.$item->title.'</a><br>';
		}
		?>
	</div>
	<hr>
	<div class="row">
		<h1>NEWS OF THE WORLD</h1>
	</div>
	
	<div class="row mt-3">
		<h3>BBC</h3>
	</div>
	<div class="row">
		<?php
			$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml'; //URL der API
			$response = curl_get($url); //curl_get Funktion wird aufgerufen für die Datensicherung
			$xml = simplexml_load_string($response); //simplexml_load_string() macht bei XML einen Spring zum Objekt, kurz gesagt wird es bei XML Files benutzt
			foreach ($xml->channel->item as $item) { //foreach Loop, weil es mehere Artikel auf der Webseite gibt
				//Styling der verschiedenen Tags, welche aufgeruft worden sind:
				echo '<div class="col-6">
						<a href="' . $item->link . '" target="_blank">' . $item->title . '</a>
						<p>' . $item->description . '<br>
						<strong>' . $item->pubDate . '</strong></p>
						</div>';
			}
		?>
	</div>
	<hr>
	<div class="row mt-3">
		<h3>CNN</h3>
	</div>
	<div class="row mb-3">	
		<?php
			$url_cnn = 'http://rss.cnn.com/rss/edition_technology.rss'; //URL der API
			$response_cnn = curl_get($url_cnn); //curl_get Funktion wird aufgerufen für die Datensicherung
			$xml_cnn = simplexml_load_string($response_cnn); //simplexml_load_string() macht bei XML einen Spring zum Objekt, kurz gesagt wird es bei XML Files benutzt
			foreach ($xml_cnn->channel->item as $item) {  //foreach Loop, weil es mehere Artikel auf der Webseite gibt
				//Styling der verschiedenen Tags, welche aufgeruft worden sind:
				echo '<div class="col-6"> 
						<a href="' . $item->link . '" target="_blank">' . $item->title . '</a> 
						<p>' . $item->description . '<br>
						<strong>' . $item->pubDate . '</strong></p>
						</div>';
			}
		?>
	</div>
	<hr>
		<div class="row mt-3">
			<h3>Joke of the day</h3>
		</div>
	<div class="row">	
		<?php
			$url_serri = 'http://api.serri.codefactory.live/random/'; //URL der API
			$response_serri = curl_get($url_serri); //curl_get Funktion wird aufgerufen für die Datensicherung
			$joke_serri = json_decode($response_serri); //json_decode() macht das bei JSON, kurz gesagt wird es bei JSON Files benutzt
			//Hier is kein Loop, da immer nur random ein Joke ausgegeben wird
			//Styling der verschiedenen Tags, welche aufgeruft worden sind:
				echo $joke_serri->joke;
		?>
	</div>
	<hr>
</div>
</body>
</html>