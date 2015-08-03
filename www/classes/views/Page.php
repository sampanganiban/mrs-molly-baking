<?php

class Page {

	// Properties
	public $title;
	public $description;
	public $model;

	// Constructor
	public function __construct($model) {
		$this->model = $model;

		// Get the page data
		$this->model->getPageInfo();

	}

	// Function to build the HTML
	public function buildHTML() {

		// Load the header
		include 'templates/header.php';

		// Load the content
		$this->contentHTML();

		// Load the footer
		include 'templates/footer.php';

	}

	// Function to display alert messages
	public function bootstrapAlert( $message, $type ) {
		if( $message == '' ) { return; }

		echo '<div class="alert alert-'.$type.'">';
		echo $message;
		echo '</div>';
	}


}
