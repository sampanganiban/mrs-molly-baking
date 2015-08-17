<?php

define('DB_NAME', 'molly_baking');
// Make sure in place of root you would add the name of your user added in Cpanel
define('DB_USER', 'root');
// Add in the password in user
define('DB_PASS', '');

// To impliment
// The config.php file must be above the root directory for the site
// Open up the index.php
// After starting the session
// add require '../config.php';
// Jump over to the model and the 'root' and change to DB_USER, DB_PASS and DB_NAME in the dbc 