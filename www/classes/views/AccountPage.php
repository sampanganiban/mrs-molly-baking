<?php

class AccountPage extends Page {

	// Properties
	private $totalErrors = 0;

	// Properties for the Additional Info form
	private $firstName;
	private $lastName;
	private $bio;
	private $userBioError;
	private $firstNameError;
	private $lastNameError;
	private $additionalInfoSuccess;
	private $additionalInfoFail;
	private $userImageError;
	private $deleteOrderSuccess;
	private $deleteOrderFail;
	private $deleteMessageSuccess;
	private $deleteMessageFail;

	// Properties for changing password
	private $currentPasswordError;
	private $newPasswordError;
	private $confirmPasswordError;
	private $passwordChangeSuccess;
	private $passwordChangeFail;

	// Properties for updating the menu
	private $menuName;
	private $menuFlavour;
	private $menuNameError;
	private $menuFlavourError;
	private $menuImageError;
	private $updateMenuSuccess;
	private $updateMenuFail;

	// Methods
	public function __construct($model) {
		parent::__construct($model);

		// Make sure a user has logged in, if not then offer them a login or registration link
		if( !isset($_SESSION['username']) ) {	
			// Redirect the user to login to their account
			header('Location: index.php?page=login');
		}

		// If updating or inserting additional user info
		if(isset($_POST['additional-info'])) {
			$this->processAdditionalInfo();
		}	

		// If a user submits the changing password form
		if(isset($_POST['change-password'])) {
			$this->processPasswordChange();
		}

		// If the user us an admin
		if( isset($_SESSION['privilege']) && $_SESSION['privilege'] == 'admin' ) {

			// If the admin has submitted the deleting order button
			if( isset($_POST['delete-order']) ) {
				$this->processDeleteOrder();
			}

			// If the admin has submitted the deleting message button
			if( isset($_POST['delete-message']) ) {
				$this->processDeleteMessage();
			}

			// If the admin has clicked the update menu button
			if( isset($_POST['edit-menu'])) {
				$this->processMenuEdit();
			}

		}

	}

	public function contentHTML() {

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
		$this->bio       = trim($_POST['bio']);

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

		if( strlen($this->bio) > 2000 ) {
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
				$destination = "img/profile-images/avatars/";

				// Make the avatar version
				$imageUploader->resize($fileLocation, 320, $destination, $imageName);

				// Make the icon version
				$destination = "img/profile-images/icon/";
				$imageUploader->resize($fileLocation, 32, $destination, $imageName);

				$_POST['profile-image'] = $imageName;
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

	private function processPasswordChange() {

		// Create variables for passwords
		$currentPassword = $_POST['current-password'];
		$newPassword	 = $_POST['new-password'];
		$confirmPassword = $_POST['confirm-password'];

		// Validate the form
		if( strlen($currentPassword) == 0 ) {
			$this->currentPasswordError = 'This is required';
			$this->totalErrors++;
		} elseif( !$this->model->checkPassword($currentPassword) ) {
			$this->currentPasswordError = 'Incorrect password';
			$this->totalErrors++;
		}

		if( strlen($newPassword) < 8 ) {
			$this->newPasswordError = 'Your new password needs to be longer than 8 characters';
			$this->totalErrors++;
		}

		if( $confirmPassword != $newPassword ) {
			$this->confirmPasswordError = 'Does not match the new password';
			$this->totalErrors++;
		}

		// If no errors
		if( $this->totalErrors == 0 ) {

			// Update the password
			$result = $this->model->updatePassword();

			// If updating the password was a success
			if( $result ) {
				$this->passwordChangeSuccess = 'Successfully changed your password!';
			} else {
				$this->passwordChangeFail = 'Something went wrong updating your password';
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

	private function processDeleteMessage() {
		$result = $this->model->deleteMessage();

		if($result) {
			$this->deleteMessageSuccess = 'The message you have selected has been deleted';
		} else {
			$this->deleteMessageFail = 'The message has not been deleted';
		}

	}

	private function processMenuEdit() {

		// Make sure the form is sticky and save its inputs
		$this->menuName  = trim($_POST['menu-title']);
		
		// Validate the menu name
		if( strlen($this->menuName) < 8 ) {
			$this->menuNameError = 'Sorry the menu name must not be shorter than 10 characters';
			$this->totalErrors++;
		} elseif( strlen($this->menuName) > 30 ) {
			$this->menuNameError = 'Sorry the menu name must not be longer than 30 characters';
			$this->totalErrors++;
		}


		// Attempt to upload the menu image
		if( $this->totalErrors == 0 && isset($_FILES['menu-image']) && $_FILES['menu-image']['name'] != '' ) {
			
			$file      = $_FILES['menu-image'];
			$imageName = $file['name'];

			// Require the image uploader
			require 'vendor/ImageUploader.php';

			// Create instance of the Image Uploader
			$imageUploader = new ImageUploader();

			// Attempt to upload the file
			$result = $imageUploader->upload('menu-image', 'img/menu/home-menu/menu-images/');

			// die($result);

			// If the upload was a success
			if( $result == true ) {

				// Get the file name
				$imageName = $imageUploader->getImageName();

				// Prepare the variables
				$fileLocation = "img/menu/home-menu/menu-images/$imageName";
				$destination = "img/menu/home-menu/menu-images/";

				// Resize the menu image
				$imageUploader->resize($fileLocation, 320, $destination, $imageName);

				$_POST['menu-image'] = $imageName;

			} else {
				// Something went wrong
				$this->totalErrors++;
				$this->menuImageError = $imageUploader->errorMessage;
			}

		}

		if( $this->totalErrors == 0 ) { 
			$result = $this->model->updateMenu();

			// If the menu successfully updated
			if($result) {
				$this->updateMenuSuccess = 'You have updated the menu';
			} else {
				$this->updateMenuFail = 'Menu was not updated';
			}
		
		}


	}


































}

