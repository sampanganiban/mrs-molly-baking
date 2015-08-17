<?php

class AccountModel extends Model {

	public function getAllOrders() {

		return $this->dbc->query("SELECT orders.ID, FirstName,  LastName,  Email,  Message, Name FROM orders JOIN menus ON orders.menuID = menus.ID");

	}

	public function getAllMessages() {

			return $this->dbc->query("SELECT ID, FirstName,  LastName,  Email,  Message FROM customers_enquiries");

	}

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

	public function updatePassword() {

		// Get the username of the person logged in
		$username = $_SESSION['username'];

		// Require the password compat library
		require 'vendor/password.php';

		// Hash the new password
		$hashedPassword = password_hash($_POST['new-password'], PASSWORD_BCRYPT);

		// Prepare UPDATE SQL
		$sql = "UPDATE users SET Password = '$hashedPassword' WHERE Username = '$username'";

		// Run the SQL
		$this->dbc->query($sql);

		// Ensure the password update worked
		if( $this->dbc->affected_rows != 0 ) {
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
				WHERE userID = $userID";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// Filter the user data
		$firstName 	= $this->filter($_POST['first-name']);
		$lastName 	= $this->filter($_POST['last-name']);
		$bio 		= $this->filter($_POST['bio']);

		// If there is a result then do an update
		if( $result->num_rows == 1 ) {

			// If the user has provided an image
			if( isset($_POST['profile-image']) ) {

				$image = $this->filter($_POST['profile-image']);

				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				if($data['ProfileImage'] != 'default.jpg') {
					
					// Delete the old images
					unlink('img/profile-images/original/'.$data['ProfileImage']);
					unlink('img/profile-images/icon/'.$data['ProfileImage']);
					unlink('img/profile-images/avatar/'.$data['ProfileImage']);
				}
			
			} else {
				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				// No new image
				$image = $data['ProfileImage'];
			}

			// UPDATE
			$sql = "UPDATE users_additional_info SET FirstName = '$firstName', LastName = '$lastName', ProfileImage = '$image', Bio = '$bio' WHERE userID = $userID";

		} elseif( $result->num_rows == 0 ) {

			// If there was a newUserImage in the post array that means an image was provided
			if( isset($_POST['newUserImage']) ) {
				
				$image = $this->filter($_POST['newUserImage']);
			
			} else {
			
				$image = 'default.jpg';
			
			}
			
			// INSERT
			$sql = "INSERT INTO users_additional_info VALUES (NULL, $userID, '$firstName', '$lastName', '$image', '$bio')";
		
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

		return $this->dbc->query("SELECT FirstName, LastName, Bio FROM users_additional_info WHERE UserID = ".$_SESSION['userID']);

	}


	public function deleteOrder() {

		$ID = $_POST['ID'];
	
		$sql = "DELETE FROM orders WHERE ID = $ID";

	 	$this->dbc->query($sql);

	 	// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}

		return false;

	}

	public function deleteMessage() {

		$ID = $_POST['ID'];
	
		$sql = "DELETE FROM customers_enquiries WHERE ID = $ID";

	 	$this->dbc->query($sql);

	 	// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}

		return false;

	}

	public function displayMenuInfo() {

		$menuName = $_POST['menu-name'];

		// Prepare the sql
		$sql = "SELECT
					Description,
					Name,
					MenuImage
				FROM
					flavours
				JOIN
					menu_flavours
				ON
					menu_flavours.flavourID =  flavours.ID
				JOIN 
					menus
				ON 
					menu_flavours.menuID = menus.ID
				JOIN 
					menu_types
				ON 
					menus.ID = menu_types.menuID
				JOIN 
					types
				ON 
					menu_types.typeID = types.ID
				WHERE 
					Name = '$menuName'
			   ";

		$result = $this->dbc->query($sql);

		// Loop through all the results and put them into an associative array
		$allItems = [];

		while( $row = $result->fetch_assoc() ) {
			$allItems[] = $row;
		}

		return $allItems;

	}

	public function updateMenu() {
		
		// Inputs taken from the edit menu form
		
		$originalMenuName = $this->filter($_POST['menu-name']);

		// Get the ID of this menu
		$sql = "SELECT ID FROM menus WHERE Name = '$originalMenuName'";
		$result = $this->dbc->query($sql);
		$result = $result->fetch_assoc();
		$menuID = $result['ID'];

		// If the user has provided an image
		if( isset($_POST['menu-image']) ) {
			$menuImage   = $_POST['menu-image'];
		}else {
			// Get the current file name
			$sql = "SELECT MenuImage FROM menus WHERE ID = '$menuID'";
			$result = $this->dbc->query($sql);
			$result = $result->fetch_assoc();
			$menuImage = $result['MenuImage'];
		}

		// Filter the inputs
		// $menuName  = $this->filter($menuName);
		$menuImage = $this->filter($menuImage);
		$newTitle    = $_POST['menu-title'];
		$_POST['menu-name'] = $newTitle;

		// Prepare the sql
		$sql = " UPDATE menus SET Name = '$newTitle', MenuImage  = '$menuImage' WHERE ID = '$menuID' ";

		// Run the query
		$this->dbc->query($sql);

		// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}

		return false;

	}


























}