<?php

// Capture the ID of the search from the GET array
$search = $_GET['search'];

// Require the config file
require '../../config.php';

// Connect to the database
$dbc = new mysqli('localhost', DB_USER, DB_PASS, DB_NAME);

// Prepare the SQL
$sql = "SELECT
			Description
		FROM
			flavours
		WHERE 
			Description LIKE '%$search%' ";

// Run the query
$resultDB = $dbc->query($sql);

// If there was a result from the database
if( $resultDB->num_rows > 0 ) {

	// Turn it into an array
	$allRelatedSearches = [];

	// While loop to search from database
	while( $relatedSearch = $resultDB->fetch_assoc() ) {
		$allRelatedSearches[] = $relatedSearch['Description'];
	}

	// Convert the PHP associate array into JSON
	$resultJSON = json_encode($allRelatedSearches);

	// Define the mimetype telling the browser it is JSON
	header('Content-Type: application/json');

	// Send this data back to the JS file and display it
	echo $resultJSON;

}