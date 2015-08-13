<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Hello <em><?php echo $_SESSION['username']; ?></em></h1>
			</div>
		</div>

<?php
	
	// Get the users additional info if it exists
	$result = $this->model->getAdditionalInfo();

	// If there is a result
	if( $result->num_rows == 1 ) {

		// Extract the data
		$data = $result->fetch_assoc();

		$firstName 	= $data['FirstName'];
		$lastName 	= $data['LastName'];
		$bio 		= $data['Bio'];

	} else {
		$firstName 	= '';
		$lastName 	= '';
		$bio 		= '';
	}

	// If the user has updated, use this information
	if( isset($_POST['user-data']) ) {
		$firstName 	= $_POST['first-name'];
		$lastName 	= $_POST['last-name'];
		$bio 		= $_POST['bio'];
	}

?>

		<div class="row" class="col-md-12">
		<!-- Form to update the additional information -->
		  <form method="post" action="index.php?page=account" enctype="multipart/form-data" class="col-md-6">
			<h3>Add or Update additional Info</h3>
			<p>This is will help when placing orders</p>
				<div class="form-group">
					<label for="first-name">First Name:</label>
					<input type="text" value="<?php echo $firstName; ?>" name="first-name" id="first-name" >
					<?php $this->bootstrapAlert($this->firstNameError, 'danger') ?>
				</div>
				<div class="form-group">
					<label for="last-name">Last Name:</label>
					<input type="text" value="<?php echo $lastName; ?>" name="last-name" id="last-name">
					<?php $this->bootstrapAlert($this->lastNameError, 'danger') ?>
				</div>
				<div class="form-group">
					<label for="bio">Biography:</label>
					<textarea name="bio"><?php echo $bio ?></textarea>
				</div>
				<div class="form-group">
					<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
					<label for="profile-image">Profile Image:</label>
					<input type="file" name="profile-image" id="profile-image">
				</div>
				
				<?php $this->bootstrapAlert($this->additionalInfoSuccess, 'success') ?>
				<?php $this->bootstrapAlert($this->additionalInfoFail, 'danger') ?>

				<button class="btn btn-primary" name="additional-info">submit</button>
		  </form>

		<!-- Form to change password -->
		  <form method="post" action="index.php?page=account" class="col-md-6">
		  	<h3>Change your Password</h3>
		  	<p>Change your password to make your account more secure</p>
		  		<div>
					<label for="current-password" class="col-md-5">Your Password:</label>
					<input type="password" name="current-password">
					<?php $this->bootstrapAlert($this->currentPasswordError, 'danger') ?>
				</div>
				<div>
					<label for="new-password" class="col-md-5">New Password:</label>
					<input type="password" name="new-password">
					<?php $this->bootstrapAlert($this->newPasswordError, 'danger') ?>
				</div>
				<div>
					<label for="confirm-password" class="col-md-5">Confirm New Password:</label>
					<input type="password" name="confirm-password">
					<?php $this->bootstrapAlert($this->confirmPasswordError, 'danger') ?>
				</div>

				<?php $this->bootstrapAlert($this->passwordChangeSuccess, 'success') ?>
				<?php $this->bootstrapAlert($this->passwordChangeFail, 'danger') ?>
				
				<button class="btn btn-primary" name="change-password">submit</button>
		  </form>
		</div>
	</div>
</section>