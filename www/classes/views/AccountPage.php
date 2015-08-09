<?php

class AccountPage extends Page {

	// Properties

	// Properties for the Additional Info form
	private $firstName;
	private $lastName;
	private $firstNameError;
	private $lastNameError;
	private $totalErrors = 0;
	private $additionalInfoSuccess;
	private $additionalInfoFail;

	// Methods
	public function __construct($model) {
		parent::__construct($model);

		// if updating or inserting additional user info
		if(isset($_POST['additional-info'])) {
			$this->processAdditionalInfo();
		}

	}

	public function contentHTML() {

		// Make sure the user is logged in
		// If not then offer them a login or registration link
		if( isset($_SESSION['username']) == false ) {
			echo 'You need to be logged in';
			return;
		}

		include 'templates/account.php';

		// If user is an admin
		if( $_SESSION['privilege'] == 'admin' ) {

			include 'templates/admin.php';

		}

	}

	// Method to process the additional info form
	private function processAdditionalInfo() {

		// Variables

		// Make the forms sticky
		$this->firstName = trim($_POST['first-name']);
		$this->lastName  = trim($_POST['last-name']);

		// Validate

		// If the first name has the required lengths and symbols
		if( strlen($this->firstName) < 2 ) {
			$this->firstNameError = 'Your first name must be at least 2 characters long';
			$this->totalErrors++;
		} elseif( strlen($this->firstName) > 20 ) {
			$this->firstNameError = 'Your first name must not be longer than 20 characters';
			$this->totalErrors++;
		} elseif( !preg_match('/^[a-zA-Z \-]{2,20}$/', $this->firstName) ) {
			$this->firstNameError = 'Your first name must only consist of letters in the alphabet, spaces and hyphens';
			$this->totalErrors++;
		}

		// If the last name has the required lengths and symbols
		if( strlen($this->lastName) < 2 ) {
			$this->lastNameError = 'Your last name must be at least 2 characters long';
			$this->totalErrors++;
		} elseif( strlen($this->lastName) > 20 ) {
			$this->lastNameError = 'Your last name must not be longer than 20 characters';
			$this->totalErrors++;
		} elseif( !preg_match('/^[a-zA-Z \-]{2,20}$/', $this->lastName) ) {
			$this->lastNameError = 'Your last name must only consist of letters in the alphabet, spaces and hyphens';
			$this->totalErrors++;
		}

		// ADD IN THE BIO AND IMAGE UPLOADER

		// If there are no errors, then add or update the additional information
		if( $this->totalErrors == 0 ) { 
			$result = $this->model->additionalInfo();

			// If result information has been updated or inserted
			if( $result ) {
				$this->additionalInfoSuccess = 'Your information has been successfully changed';
			} else {
				$this->additionalInfoFail = 'Info not updated';
			}
		}


	}


































}
