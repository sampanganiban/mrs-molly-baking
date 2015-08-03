<?php

// Set time for the site
date_default_timezone_set("Pacific/Auckland");

// Start the session
session_start();

// Determine what page the user wants
// If the user has chosen a certain page display that, if not just display the home page
$_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 'home';

// Require some classes
require 'classes/views/Page.php';
require 'classes/models/Model.php';

// Create a switch based on the page requested
switch($_GET['page']) {

	// Homepage
	case 'home':
		require 'classes/models/HomeModel.php';
		require 'classes/views/HomePage.php';
		$model = new HomeModel();
		$page = new HomePage($model);
	break;

	// About page
	case 'about':
		require 'classes/models/AboutModel.php';
		require 'classes/views/AboutPage.php';
		$model = new AboutModel();
		$page = new AboutPage($model);
	break;

	// Contact page
	case 'contact':
		require 'classes/models/ContactModel.php';
		require 'classes/views/ContactPage.php';
		$model = new ContactModel();
		$page = new ContactPage($model);
	break;

	// Order page
	case 'order':
		require 'classes/models/OrderModel.php';
		require 'classes/views/OrderPage.php';
		$model = new OrderModel();
		$page = new OrderPage($model);
	break;

	// Register page
	case 'register':
		require 'classes/models/RegisterModel.php';
		require 'classes/views/RegisterPage.php';
		$model = new RegisterModel();
		$page = new RegisterPage($model);
	break;

	// Account page
	case 'account':
		require 'classes/models/AccountModel.php';
		require 'classes/views/AccountPage.php';

		$model = new AccountModel();
		$page = new AccountPage( $model );
	break;

	// Login page
	case 'login':
		require 'classes/models/LoginModel.php';
		require 'classes/views/LoginPage.php';
		$model = new LoginModel();
		$page = new LoginPage($model);
	break;

	// Logout page
	case 'logout':
		require 'classes/models/LogoutModel.php';
		require 'classes/views/LogoutPage.php';
		$model = new LogoutModel();
		$page = new LogoutPage($model);
	break;

}

// Load the content for each page
$page->buildHTML();
