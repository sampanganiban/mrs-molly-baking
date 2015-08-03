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

		// Validate the inputs
		if(strlen($this->firstName) < 2) {
			$this->firstNameError = 'Your First Name needs be to be at least 2 characters';
		}




	}




















}