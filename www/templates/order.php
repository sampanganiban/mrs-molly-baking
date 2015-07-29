<form>
    <section>
        <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Place an Order</h2>
                <h3 class="section-subheading text muted">Place an order and we'll contact you using the contact details you have added.</h3>
            </div>
        </div>
          <div class="form-group" class="col-md-6">
            <label for="first-name">First Name:</label>
            <input type="text" class="form-control" id="first-name" placeholder="John">
          </div>
          <div class="form-group" class="col-md-6">
            <label for="last-name">Last Name:</label>
            <input type="text" class="form-control" id="last-name" placeholder="Smith">
          </div>
          <div class="form-group" class="col-md-6">
            <label for="email">Contact Email:</label>
            <input type="email" class="form-control" id="email" placeholder="example@example.com">
          </div>
          <div class="form-group" class="col-md-6">
            <label>Select a Menu: </label>
            <select class="form-control" name="menu">
                <option></option>
                <option></option>
                <option></option>
            </select>
          </div>
           <div class="form-group">
            <label for="message" class="col-md-2">Enquiries about your order:</label>
            <textarea name="message" id="message" placeholder=" Message.." cols="30" rows="5"></textarea>
          </div>
          <div>
            <button type="submit" class="btn btn-primary" name="order-placed">Place order</button>
          </div>
        </div>
    </section>
</form>
    