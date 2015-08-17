<?php

class HomeModel extends model {

	// Properties

	// Methods
	public function getAllCupcakes() {

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
					Type = 'Cupcake'
			   ";

		$result = $this->dbc->query($sql);

		$allMenus = [];

		while( $row = $result->fetch_assoc() ) {
			$allMenus[] = $row;
		}


		return $allMenus;

	}

	public function getAllCakes() {

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
					Type = 'Cake'
			   ";

		$result = $this->dbc->query($sql);

		$allMenus = [];

		while( $row = $result->fetch_assoc() ) {
			$allMenus[] = $row;
		}

		return $allMenus;

	}


	public function getAllPies() {

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
					Type = 'Pie'
			   ";

		$result = $this->dbc->query($sql);

		$allMenus = [];

		while( $row = $result->fetch_assoc() ) {
			$allMenus[] = $row;
		}

		return $allMenus;

	}


}