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
	private $userImageError;
	private $deleteOrderSuccess;
	private $deleteOrderFail;

	// Methods
	public function __construct($model) {
		parent::__construct($model);

		// If updating or inserting additional user info
		if(isset($_POST['additional-info'])) {
			$this->processAdditionalInfo();
		}

		// If the user us an admin
		if( isset($_SESSION['privilege']) && $_SESSION['privilege'] == 'admin' ) {

			// If the admin has submitted the delete button
			if( isset($_POST['delete-order']) ) {
				$this->processDeleteOrder();
			}

		}

	}

	public function contentHTML() {

		// Make sure the user is logged in
		// If not then offer them a login or registration link
		if( !isset($_SESSION['username']) ) {
			echo 'Sorry you need to have an account to access this';
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

		if( strlen($_POST['bio']) > 2000 ) {
			$this->userBioError = 'Sorry, your bio cannot be more than 2000 characters';
			$this->totalErrors++;
		}

		// Attempt to upload the image
		if( $this->totalErrors == 0 && isset($_FILES['profile-image']) && $_FILES['profile-image']['name'] != '' ) {

			// Require the image uploader
			require 'vendor/ImageUploader.php';

			// Create instance of the Image Uploader
			$imageUploader = new ImageUploader();

			// Attempt to upload the file
			$result = $imageUploader->upload('profile-image', 'img/profile-images/original/');

			// If the upload was a success
			if( $result == true ) {

				// Get the file name
				$imageName = $imageUploader->getImageName();

				// Prepare the variables
				$fileLocation = "img/profile-images/original/$imageName";
				$destination = "img/profile-images/avatar/";

				// Make the avatar version
				$imageUploader->resize($fileLocation, 320, $destination, $imageName);

				// Make the icon version
				$destination = "img/profile-images/icon/";
				$imageUploader->resize($fileLocation, 32, $destination, $imageName);

				$_POST['newUserImage'] = $imageName;
			} else {
				// Something went wrong
				$this->totalErrors++;
				$this->userImageError = $imageUploader->errorMessage;
			}

		}

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

	private function processDeleteOrder() {
		$result = $this->model->deleteOrder();

		if($result) {
			$this->deleteOrderSuccess = 'The order you have selected has been deleted';
		} else {
			$this->deleteOrderFail = 'The order has not been deleted';
		}



	}


































}

