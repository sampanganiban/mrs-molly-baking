<?php

class ContactModel extends Model {

	public function sendEnquiry() {

		// Filter the data
		$firstName = $this->filter($_POST['first-name']);
		$lastName  = $this->filter($_POST['last-name']);
		$email     = $this->filter($_POST['email']);
		$message   = $this->filter($_POST['message']);

		// Prepare the SQL to insert the order
		$sql = "INSERT INTO customers_enquiries VALUES (NULL, '$firstName', '$lastName', '$email', '$message' )";

		// Run the SQL
		$this->dbc->query($sql);

		// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}	

		return false;
	
	}
	
}