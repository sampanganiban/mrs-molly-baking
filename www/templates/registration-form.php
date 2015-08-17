<section>
     <form novalidate action="index.php?page=register" method="post">
        <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Register an Account with us</h2>
                <h3 class="section-subheading text muted">When you sign up with us you will recieve an exclusive discount on your orders as well as updates on what's new in Mrs. Molly Baking</h3>
            </div>
        </div>
          <div class="form-group" class="col-md-6">
            <label for="username">Username:</label>
            <input type="username" class="form-control" value="<?php echo $this->username; ?>" placeholder="iambatman" name="username">
            <?php $this->bootstrapAlert($this->usernameError, 'danger') ?>
          </div>
          <div class="form-group" class="col-md-6">
            <label for="email">Email:</label>
            <input type="email" class="form-control" value="<?php echo $this->email; ?>" placeholder="example@email.com" name="email">
            <?php $this->bootstrapAlert($this->emailError, 'danger') ?>
          </div>
          <div class="form-group" class="col-md-6">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group" class="col-md-6">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm-password">
          </div>
          <?php $this->bootstrapAlert($this->passwordError, 'danger') ?>
          <div class="checkbox">
            <label>
              <input type="checkbox" checked>Receive updates and promotions via email
            </label>
          </div>
          <button type="submit" class="btn btn-primary" name="register">Sign up</button>
        </div>
    </form>
</section>
