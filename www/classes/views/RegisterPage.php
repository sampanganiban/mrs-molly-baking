<?php

class RegisterPage extends Page {

	// Properties
	private $username;
	private $email;
	private $emailError;
	private $usernameError;
	private $passwordError;
	private $totalErrors = 0;

	public function contentHTML() {

		include 'templates/registration-form.php';

	}

	public function __construct($model) {

		// Use the parent constructor code
		parent::__construct($model);

		// If the registration form has been submitted
		if( isset( $_POST['register'] ) ) {

			$this->processNewAccount();

		}

	}

	public function processNewAccount() {


		// Make life easier and make form sticky
		$username = trim($_POST['username']);
		$email 	  = trim($_POST['email']);
		$pass 	  = $_POST['password'];
		$conpass  = $_POST['confirm-password'];

		// Save the form data for use later on
		$this->username = $username;
		$this->email    = $email;

		// Validate the username
		if( strlen($username) < 2 || strlen($username) > 20 ) {
			$this->usernameError = 'Username must be between 2 and 20 characters';
			$this->totalErrors++;
		} elseif( !preg_match( '/^[a-zA-Z0-9_\-.]{2,20}$/', $username ) ) {
			$this->usernameError = 'Use only letters, numbers, hyphens, underscores and periods';
			$this->totalErrors++;
		} elseif( $this->model->checkUsernameExists( $username ) ) {
			$this->usernameError = 'Username already in use';
			$this->totalErrors++;
		}

		// Validate the E-Mail
		if( strlen($email) < 6 || strlen($email) > 254 ) {
			$this->emailError = 'Email is invalid length';
			$this->totalErrors++;
		} elseif( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$this->emailError = 'Invalid Email format. example: example@example.com';
			$this->totalErrors++;
		} elseif( $this->model->checkEmailExists( $email ) ) {
			$this->emailError = 'Sorry, this email is already in use';
			$this->totalErrors++;
		}

		// Validate the passwords
		if( strlen($pass) < 8 ) {
			$this->passwordError = 'Passwords must be at least 8 characters long';
			$this->totalErrors++;
		} elseif( $pass != $conpass ) {
			$this->passwordError = 'Passwords do not match';
			$this->totalErrors++;
		}

		// If there are no errors, then register a new account!
		if( $this->totalErrors == 0 ) {

			$this->model->registerNewAccount( $username, $email, $pass );
			
			// Redirect the user
			header('Location: index.php?page=account');

		}
	}
}
