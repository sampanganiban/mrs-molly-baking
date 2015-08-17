<div class="container">
	<div class="row">
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
				
			} 
	?>
			
		<form method="post" action="index.php?page=account" enctype="multipart/form-data">
			
			<h2>Edit this Menu</h2>
			<p>Edit the selected Menu</p>
				
				<div class="form-group">
					<label class="col-md-2">Menu Name: </label>	
					<input type="text" name="menu-title" value="<?php echo $menuName; ?>" >
					<?php $this->bootstrapAlert($this->menuNameError, 'danger') ?>
				</div>

				<div class="form-group">
					<label class="col-md-2">Menu Image: </label>
					<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
					<input type="file" name="menu-image">
					<?php $this->bootstrapAlert($this->menuImageError, 'danger') ?>
				</div>

				<div class="form-group">
					<input type="submit" value="Edit the Menu" name="edit-menu" class="btn btn-primary" class="col-md-2">
					<?php $this->bootstrapAlert($this->updateMenuSuccess, 'success') ?>
					<?php $this->bootstrapAlert($this->updateMenuFail, 'danger') ?>
				</div>

				<input type="hidden" name="admin-edit" value="">
				<input type="hidden" name="menu-name" value="<?= $_POST['menu-name']; ?>">

		</form>

		<?php endif; ?>

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
</div>




























