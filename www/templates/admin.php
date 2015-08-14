<div class="container">
	<div class="row">
		<table class="table">
		<h2>Customer ORDERS</h2>
			<tr>
			  <th>Order No.</th>
			  <th>Menu: </th>
			  <th>First Name: </th>
			  <th>Last Name: </th>
			  <th>Email: </th>
			  <th>Message: </th>
			  <th>Delete Order that has been Delivered: </th>
			</tr>
			<?php

				// Get the orders from the database
				$result = $this->model->getAllOrders();

			?>
			
			<!-- This will loop through and display each order made -->
			<?php while($row = $result->fetch_assoc()): ?>
				<tr>
					<form method="post" action="index.php?page=account">
						<td><?php echo $row['ID']; ?></td>
						<td><?php echo $row['Name']; ?></td>
						<td><?php echo $row['FirstName']; ?></td>
						<td><?php echo $row['LastName']; ?></td>
						<td><?php echo $row['Email']; ?></td>
						<td><?php echo $row['Message']; ?></td>
						<input type="hidden" value="<?php echo $row['ID']; ?>" name="ID">	
						<td><input type="submit" value="Ready to DELETE order" class="btn btn-info" name="delete-order"></td>
						<?php $this->bootstrapAlert($this->deleteOrderSuccess, 'success') ?>
						<?php $this->bootstrapAlert($this->deleteOrderFail, 'danger') ?>
					</form>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
	<div class="row">
		<table class="table">
		<h2>Customer Enquiries</h2>
			<tr>
			  <th>First Name: </th>
			  <th>Last Name: </th>
			  <th>Email: </th>
			  <th>Message: </th>
			  <th>Delete Message: </th>
			</tr>
			<?php

				// Get the customer enquiries from the database
				$result = $this->model->getAllMessages();

			?>
			
			<!-- This will loop through and display each order made -->
			<?php while($row = $result->fetch_assoc()): ?>
				<tr>
					<form method="post" action="index.php?page=account">
						<td><?php echo $row['FirstName']; ?></td>
						<td><?php echo $row['LastName']; ?></td>
						<td><?php echo $row['Email']; ?></td>
						<td><?php echo $row['Message']; ?></td>
						<input type="hidden" value="<?php echo $row['ID']; ?>" name="ID">	
						<td><input type="submit" value="Delete Message" class="btn btn-info" name="delete-message"></td>
						<?php $this->bootstrapAlert($this->deleteMessageSuccess, 'success') ?>
						<?php $this->bootstrapAlert($this->deleteMessageFail, 'danger') ?>
					</form>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>

	<?php 


		if( isset($_POST['admin-edit'])) : 

			// Get the menu details
			$result = $this->model->displayMenuInfo();

			// If there is a result
			if( $result ) {
				

				// Extract the data

				$menuName = $result[0]['Name'];
			
			} else {

				$menuName = '';
				$menuDes  = '';
				
			} ?>
			
			<form method="post" action="index.php?page=account">
				
				<h2>Edit this Menu</h2>
				<p>Update the Menus</p>
					
					<div>
						<label>Menu Name: </label>	
						<input type="text" name="menu-title" value="<?php echo $menuName; ?>">

						<?php

							foreach($result as $item) {
								echo '<p>'.$item['Description'].'</p>';
							}


						?>
					</div>

			</form>

		<?php endif; ?>

	
</div>




























