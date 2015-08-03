<?php

class LogoutPage extends Page {

	public function __construct($model) {

		parent::__construct($model);

		// Logout the user
		if( isset($_SESSION['username']) ) {

			// Unset the session
			unset($_SESSION['username']);
			unset($_SESSION['privilege']);
			unset($_SESSION['userID']);

		}

	}

	public function contentHTML() {

		include 'templates/logout.php';

	}

}