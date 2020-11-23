<!DOCTYPE html>
<html>
<head>
	<title>API</title>

	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>

<div class="container">
	<div class="row">
		<h1>NEWS OF THE WORLD</h1>
	</div>
	
	<div class="row mt-3">
		<h3>BBC</h3>
	</div>
	<div class="row">
	<?php
require_once'RESTful.php';
$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
$response = curl_get($url);
$xml = simplexml_load_string($response);
foreach ($xml->channel->item as $item) {
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
$url_cnn = 'http://rss.cnn.com/rss/edition_technology.rss';
$response_cnn = curl_get($url_cnn);
$xml_cnn = simplexml_load_string($response_cnn);
foreach ($xml_cnn->channel->item as $item) {
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
$url_serri = 'http://api.serri.codefactory.live/random/';
$response_serri = curl_get($url_serri);
$joke_serri = json_decode($response_serri);

			echo $joke_serri->joke;
	

?>
	</div>

	<hr>

</div>

</body>
</html>




