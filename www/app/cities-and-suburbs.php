<?php

// Capture the ID
$cityID = $_GET['cityID'];

// Require the config file
require '../../config.php';

// Connect to the database
$dbc = new mysqli('localhost', DB_USER, DB_PASS, DB_NAME);

// Filter the ID
$cityID = $dbc->real_escape_string($_GET['cityID']);

// Prepare SQL
$sql = "SELECT cityName, suburbName 
		FROM suburbs 
		JOIN cities
		ON cities.cityID = suburbs.cityID
		WHERE cities.cityID ='$cityID'";

// Run the query
$resultDB = $dbc->query($sql);

// If there was a result from the database
if( $resultDB->num_rows > 0 ) {

	$allSuburbs = [];

	while( $suburb = $resultDB->fetch_assoc() ) {
		$allSuburbs[] = $suburb['suburbName'];
	}

	// Convert result into an associate array
	// $resultASSOC = $resultDB->fetch_assoc();

	// Convert the PHP associate array into JSON
	$resultJSON = json_encode($allSuburbs);

	// Define the mimetype telling the browser it is JSON
	header('Content-Type: application/json');

	// Send this data back to the JS file and display it
	echo $resultJSON;

} else {

}
