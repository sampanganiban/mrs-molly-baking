<form method="POST" action="index.php?page=order" enctype="multipart/form-data">
    <section>
        <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Place an Order</h2>
                <h3 class="section-subheading text muted">Place an order and we'll contact you using the contact details you have provided.</h3>
            </div>
        </div>

<?php

    // Get the users additional info if it exists
    $result = $this->model->displayUserInfo();

    // If the person has logged in
    if( isset($_SESSION['username']) && $result->num_rows == 1 ) {

   

            // Extract the data
            $userInfo = $result->fetch_assoc();

            $placingOrderFirstName = $userInfo['FirstName'];
            $placingOrderLastName  = $userInfo['LastName'];

    
    } else {
        
            $placingOrderFirstName  = '';
            $placingOrderLastName   = '';
    }


?>
          <div class="form-group" class="col-md-6">
            <label for="first-name">First Name:</label>
            <input type="text" class="form-control" id="first-name"  name="first-name" value="<?php echo $placingOrderFirstName; ?>" placeholder="John">
            <?php $this->bootstrapAlert($this->firstNameError, 'danger') ?>
          </div>
          <div class="form-group" class="col-md-6">
            <label for="last-name">Last Name:</label>
            <input type="text" class="form-control" id="last-name"  name="last-name" value="<?php echo $placingOrderLastName; ?>" placeholder="Smith">
            <?php $this->bootstrapAlert($this->lastNameError, 'danger') ?>
          </div>
          <div class="form-group" class="col-md-6">
            <label for="email">Contact Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com">
            <?php $this->bootstrapAlert($this->emailError, 'danger') ?>
          </div>
          <div class="form-group" class="col-md-6">
            <label>Select a Menu: </label>
            <select class="form-control" name="menu">
              <?php

                // Use the model to get all menus
                $result = $this->model->getMenus();

                // Loop through the result and display all the usernames
                while( $row = $result->fetch_assoc() ) {

                  echo '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';

                }

              ?>
            </select>
          </div>
           <div class="form-group">
            <label for="message" class="col-md-2">Enquiries about your order:</label>
            <textarea name="message" id="message" placeholder=" Message.." cols="30" rows="5"></textarea>
          </div>
          <div>
            <button type="submit" class="btn btn-primary" name="order-placed">Place order</button>
            <?php $this->bootstrapAlert($this->placeOrderSuccess, 'success') ?>
            <?php $this->bootstrapAlert($this->placeOrderFail, 'danger') ?>
          </div>
        </div>
    </section>
</form>
    