<?php

class Model {
	
	// Properties
	protected $dbc;
	public $title;
	public $description;

	// Constructor to connect to the database
	public function __construct() {

		// Connect to the database
		$this->dbc = new mysqli('localhost', DB_USER, DB_PASS, DB_NAME);

	}

	// Methods
	public function getPageInfo() {

		// Obtain the name of the requested page
		$requestedPage = $_GET['page'];

		// Prepare the query
		$sql = "SELECT Title, Description FROM pages WHERE Name = '$requestedPage'";

		// Run the query
		$result = $this->dbc->query($sql);

		// Convert the result into an associative array
		$pageData = $result->fetch_assoc();

		// Save the title and description in the properties above
		$this->title       = $pageData['Title'];
		$this->description = $pageData['Description'];
	}

	// Filter the inputs and values
	protected function filter( $value ) {
		return $this->dbc->real_escape_string( $value );
	}
}