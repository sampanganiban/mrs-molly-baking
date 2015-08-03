<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1>Hello <?php echo $_SESSION['username']; ?></h1>
			</div>
		</div>
		<div class="row">
		  <form method="post" aciton="">
			<h3>Add or Update your additional Info</h3>
			<p>This is will help when placing orders</p>
				<div class="form-group">
					<label for="first-name">
						First Name:
					</label>
					<input type="text" name="first-name" id="first-name">
				</div>
				<div class="form-group">
					<label for="last-name">
						Last Name:
					</label>
					<input type="text" name="last-name" id="last-name">
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
				<button class="btn btn-primary" name="additional-info">submit</button>
		  </form>	
		</div>
	</div>
</section>