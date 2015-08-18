<?php

// Require config to connect to the database
require '../../config.php';

// Connect to the database
$dbc = new mysqli('localhost', DB_USER, DB_PASS, DB_NAME);

// Filter the username
$username = $dbc->real_escape_string($_POST['username']);

// SQL
$sql = "SELECT Username FROM users WHERE Username = '$username' ";

// Run the SQL
$result = $dbc->query($sql);

// If there is a result
if( $result->num_rows == 1 ) {
	echo 'In use';
} else {
	echo 'Available';
}




