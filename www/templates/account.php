<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1>Hello <?php echo $_SESSION['username']; ?></h1>
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

		<div class="row">
		  <form method="post" action="index.php?page=account" enctype="multipart/form-data">
			<h3>Add or Update your additional Info</h3>
			<p>This is will help when placing orders</p>
				<div class="form-group">
					<label for="first-name">
						First Name:
					</label>
					<input type="text" value="<?php echo $this->firstName; ?>" name="first-name" id="first-name" >
					<?php $this->bootstrapAlert($this->firstNameError, 'danger') ?>
				</div>
				<div class="form-group">
					<label for="last-name">
						Last Name:
					</label>
					<input type="text" value="<?php echo $this->lastName; ?>" name="last-name" id="last-name">
					<?php $this->bootstrapAlert($this->lastNameError, 'danger') ?>
				</div>
				<div class="form-group">
					<label for="bio">
						Biography:
					</label>
					<textarea name="bio">
						
					</textarea>
				</div>
				<div class="form-group">
					<label for="profile-image">
						Profile Image:
					</label>
					<input type="file" name="profile-image" id="profile-image">
				</div>
				
				<?php $this->bootstrapAlert($this->additionalInfoSuccess, 'success') ?>

				<?php $this->bootstrapAlert($this->additionalInfoFail, 'danger') ?>

				<button class="btn btn-primary" name="additional-info">submit</button>
		  </form>	
		</div>
	</div>
</section>