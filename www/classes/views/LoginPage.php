<?php

class LoginPage extends Page {

	// Properties
	private $usernameError;
	private $passwordError;
	private $loginError;
	private $username;
	private $totalErrors = 0;
	
	public function __construct( $model ) {

		parent::__construct($model);

		// If the user has submitted the form
		if( isset($_POST['login']) ) {

			// Process the login form
			$this->processLoginForm();

		}

	}

	public function contentHTML() {

		include 'templates/login.php';

	}

	public function processLoginForm() {

		// Save the login form data
		$this->username = trim($_POST['username']);

		// Validate the form before attempting to log in
		if( trim($_POST['username']) == '' ) {
			$this->usernameError = 'You must provide a username';
			$this->totalErrors++;
		}

		if( $_POST['password'] == '' ) {
			$this->passwordError = 'You must provide a password';
			$this->totalErrors++;
		}

		// If there are no errors
		if( $this->totalErrors == 0 ) {
			// Use the model to check if the user has the right credentials
			$this->model->attemptLogin();

			// If this code runs then the user was not redirected
			// therefore they did not have correct login credentials
			$this->loginError = 'Username or password incorrect';

		}

	}

}









