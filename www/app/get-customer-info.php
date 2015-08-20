<?php

// Capture the data
$customerID = $_GET['customerID'];

// Require the config file
require '../../config.php';

// Connect to database
$dbc = new mysqli('localhost', DB_USER, DB_PASS, DB_NAME);

// Filter the ID
$customerID = $dbc->real_escape_string($_GET['customerID']);

// Prepare the SQL
$sql = "SELECT email FROM orders WHERE ID = $customerID";

// Run the SQL
$resultDB = $dbc->query($sql);

// If there was no result from the database
if($resultDB->num_rows == 1) {

	// Convert result into an associative array
	$resultASSOC = $resultDB->fetch_assoc();

	// json_encode will convert a PHP associative array into JSON
	$resultJSON = json_encode($resultASSOC);
	
	// Set up the header so JavaScript knows it's JSON
	// Define the mimetype, telling the header that JS is receiving JSON
	// Also tells the browser what type of file they are sending
	// browsers be default will assume the type as text so you need to specify what type it is
	header('Content-Type: application/json');

	// Send this data back to the JS file to display this data, the converted result to JSON
	echo $resultJSON;


} else {


}

