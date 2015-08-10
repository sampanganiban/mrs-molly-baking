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

	public function additionalInfo() {

		// Get the userID
		$userID = $_SESSION['userID'];

		// Query to see if there is existing info in the database
		$sql = "SELECT FirstName, LastName, ProfileImage, Bio
				FROM users_additional_info
				WHERE UserID = $userID";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// Filter the user data
		$firstName 	= $this->filter($_POST['first-name']);
		$lastName 	= $this->filter($_POST['last-name']);
		$bio 		= $this->filter($_POST['bio']);
		// $image 		= $this->filter($_POST['newUserImage']);

		// If there is a result then do an update
		if( $result->num_rows == 1 ) {
			// UPDATE
			$sql = "UPDATE users_additional_info
					SET FirstName = '$firstName',
						LastName = '$lastName',
						Bio = '$bio'
					WHERE UserID = $userID";

		} elseif( $result->num_rows == 0 ) {
			// INSERT
			$sql = "INSERT INTO users_additional_info
					VALUES (NULL, $userID, '$firstName', '$lastName', 'default.jpg', '$bio')";
		}

		// Run the SQL
		$this->dbc->query($sql);

		// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}

		return false;

	}

	public function getAdditionalInfo() {

		return $this->dbc->query("	SELECT FirstName, LastName, Bio
									FROM users_additional_info
									WHERE UserID = ".$_SESSION['userID']);

	}

}