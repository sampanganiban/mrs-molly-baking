<?php

class AccountModel extends Model {

	public function checkPassword( $password ) {

		// Get the username of the person who is logged in
		$username = $_SESSION['username'];

		// Get the password of the account that is logged in
		$result = $this->dbc->query("SELECT Password FROM users WHERE Username = '$username'");

		// Convert into an associative array
		$data = $result->fetch_assoc();

		// Need the password compat library
		require 'vendor/password.php';

		// Compare the current password against user existing password
		if( password_verify($password, $data['Password']) ) {
			return true;
		} else {
			return false;
		}

	}
}