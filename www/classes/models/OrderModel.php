<?php

class OrderModel extends Model {

	// Function to get the menus and display them on the order form
	public function getMenus() {

		return $this->dbc->query("SELECT ID, Name, Price FROM menus");
	
	}

	// Function to place the order into the database
	public function placeNewOrder() {

		// Filter the data
		$menu      = $this->filter($_POST['menu']);
		$firstName = $this->filter($_POST['first-name']);
		$lastName  = $this->filter($_POST['last-name']);
		$email     = $this->filter($_POST['email']);
		$message   = $this->filter($_POST['message']);

		// Prepare the SQL to insert the order
		$sql = "INSERT INTO orders VALUES (NULL, '$menu', '$firstName', '$lastName', '$email', '$message' )";

		// Run the SQL
		$this->dbc->query($sql);

		// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}	

		return false;
	
	}
	
}