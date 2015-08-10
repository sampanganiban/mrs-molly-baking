<?php

class OrderPage extends Page {

	// Properties
	private $firstName;
	private $lastName;
	private $email;
	private $menu;

	private $firstNameError;
	private $lastNameError;
	private $emailError;
	private $placeOrderSuccess;
	private $placeOrderFail;
	private $totalErrors = 0;
	
	// Methods
	public function __construct($model) {

		// User the parent constructor code
		parent::__construct($model);

		// If the order form has been submitted
		if(isset($_POST['order-placed'])) {

			// Send to function that will process the order form
			$this->processOrder();

		}

	}

	// Load the order content
	public function contentHTML() {

		include 'templates/order.php';

	}

	public function processOrder() {

		// Create variable the field inputs and make them sticky
		$this->firstName = trim($_POST['first-name']);
		$this->lastName  = trim($_POST['last-name']);
		$this->email     = trim($_POST['email']);
		$this->menuOption= $_POST['menu'];

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

		// If the email is valid
		if( strlen($this->email) < 6 || strlen($this->email) > 254 ) {
			$this->emailError = 'Email is an invalid length';
		} elseif( !filter_var( $this->email, FILTER_VALIDATE_EMAIL ) ) {
			$this->emailError = 'Invalid Email format. example@example.com';
		}

		// If there are no errors, then continue to place their order into the database
		if( $this->totalErrors == 0 ) { 
			$result = $this->model->placeNewOrder();

			// If result is good then tell the user if their order was successful or not
			if( $result ) {
				$this->placeOrderSuccess = 'Thank you for placing an order with Mrs Molly Baking!';
			} else {
				$this->placeOrderFail = 'Sorry, something went wrong when placing your order, please try in a few minutes.';
			}

		}

	}















}
