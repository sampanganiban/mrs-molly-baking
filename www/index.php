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
		$page = new HomePage();
	break;

}