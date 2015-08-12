 <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Please send us any enquiries you may have</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="index.php?page=contact" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your First Name" name="first-name">
                                    <?php $this->bootstrapAlert( $this->contactFirstNameError ,'danger') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Last Name" name="last-name">
                                    <?php $this->bootstrapAlert( $this->contactLastNameError ,'danger') ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email" name="email">
                                    <?php $this->bootstrapAlert( $this->contactEmailError ,'danger') ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message" name="message"></textarea>
                                    <?php $this->bootstrapAlert( $this->contactMessageError ,'danger') ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <?php $this->bootstrapAlert( $this->contactFail, 'danger') ?>
                                <?php $this->bootstrapAlert( $this->contactSuccess, 'success') ?>
                                <button type="submit" class="btn btn-xl" name="message-sent">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>