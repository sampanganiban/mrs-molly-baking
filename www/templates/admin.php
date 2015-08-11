<div class="container"> 
	<div class="row">
		<table class="table">
		<h2>ORDERS</h2>
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
					</form>
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
</div> 