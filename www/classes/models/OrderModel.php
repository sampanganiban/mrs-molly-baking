<?php

class OrderModel extends Model {

	// Function to get the menus and display them on the order form
	public function getMenus() {

		return $this->dbc->query("SELECT Name, Price FROM menus");
	
	}
	
}