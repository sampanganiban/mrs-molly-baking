<!-- Login Section -->
    <section>
        <div class="container">
            <div class="row">
                <h2 class="section-heading text-center">Login to your Account</h2>
                <h3 class="section-subheading text muted text-center">Logging into your account helps to make placing orders easy for you!</h3>
            </div>
            <div class="row">
                <form novalidate method="post" action="index.php?page=login">

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value="<?php echo $this->username; ?>">
                    <?php $this->bootstrapAlert($this->usernameError, 'danger') ?>
                </div>
                
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    <?php $this->bootstrapAlert($this->passwordError, 'danger') ?>
                </div>
                
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                    <?php $this->bootstrapAlert($this->loginError, 'danger') ?>
                
                </form>
            </div>
        </div>
    </section>