<!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">The services we provide for every</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-info fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Great Service</h4>
                    <p class="text-muted">Please contact us for any enquiries and we will contact you as soon as possible.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-newspaper-o fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Up to Date</h4>
                    <p class="text-muted">Stay up to date by registering an account with Mrs. Molly Baking. When you sign up with us you will also 
                    recieve a <strong>special discount</strong> exclusive to Mrs. Molly members.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-heart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Made with Love</h4>
                    <p class="text-muted">Mrs. Molly Baking guarantees quality baking that is always made with love.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Menus</h2>
                    <h3 class="section-subheading text-muted">Check out our menu packages of our baking</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
<!-- Cupcakes image -->
                        <img src="./img/menu/main-page/cupcakes.jpg" class="img-responsive" alt="">
<!-- Cupcakes image -->
                    </a>
                    <div class="portfolio-caption">
                        <h4>Cupcakes</h4>
                        <p class="text-muted">Check out our Cupcake Menus</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
<!-- Cakes image -->
                        <img src="./img/menu/main-page/cakes.jpg" class="img-responsive" alt="">
<!-- Cakes image -->
                    </a>
                    <div class="portfolio-caption">
                        <h4>Cakes</h4>
                        <p class="text-muted">Have a look at our delicious Cakes menu</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
<!-- Pies image -->
                        <img src="./img/menu/main-page/pies.jpg" class="img-responsive" alt="">
<!-- Pies image -->
                    </a>
                    <div class="portfolio-caption">
                        <h4>Savoury &amp; Sweet Pies</h4>
                        <p class="text-muted">Check out our unique Pie menu</p>
                    </div>
                </div>
    </section>

    <!-- Menu Modals -->

    <!-- Menu Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Cupcake Packages</h2>
                            <p>Choose the package that best suits your needs</p>

                            <?php

                                // Get all the menus
                                $result = $this->model->getAllCupcakes();

                                // Get the names of the menus
                                $menuNames = [];

                                // Get the image associated with the menu
                                $menuImages = [];

                                foreach( $result as $image ) {
                                    $menuImages[] = $image['MenuImage'];
                                }

                                foreach( $result as $item ) {
                                    $menuNames[] = $item['Name'];
                                }

                                // Eliminate the duplicates
                                $menuNames = array_unique($menuNames);
                                $counter = 0;

                                // Loop through each result and display them inside the modal
                                foreach( $menuNames as $menu ) : ?>

                                    <div class="col-lg-4">
                                        <img src="img/menu/home-menu/menu-images/<?= $menuImages[$counter]; ?>" class="col-lg-12">
                                        <h3><?= $menu ?>: </h3>
                                        <p>This menu includes:</p>
                                        <?php

                                            $counter+=3;
                                            // Loop over all the results and find the descriptions that match this menu
                                            foreach($result as $item) {
                                                if( $item['Name'] == $menu ) {
                                                    echo '<p>'.$item['Description'].'</p>';
                                                }
                                            }

                                        ?>
                                        <a href="index.php?page=order" class="btn btn-primary">I want this!</a>
                                        
                                        <?php if(isset($_SESSION['privilege']) && $_SESSION['privilege'] == 'admin' ) : ?>
                                        <form method="post" action="index.php?page=account">
                                            <input type="hidden" name="menu-name" value="<?php echo $menu; ?>">  
                                            <input type="submit" name="admin-edit" value="Edit this menu" class="btn">
                                        </form>

                                        <?php endif; ?>

                                    
                                    </div>

                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Cake Packages</h2>
                            <p>Choose a cake best for your occasion</p>

                            <?php

                                // Get all the menus
                                $result = $this->model->getAllCakes();

                                // Get the names of the menus
                                $menuNames = [];

                                // Get the image associated with the menu
                                $menuImages = [];

                                foreach( $result as $image ) {
                                    $menuImages[] = $image['MenuImage'];
                                }

                                foreach( $result as $item ) {
                                    $menuNames[] = $item['Name'];
                                }

                                // Eliminate the duplicates
                                $menuNames = array_unique($menuNames);
                                $counter = 0;

                                // Loop through each result and display them inside the modal
                                foreach( $menuNames as $menu ) : ?>

                                    <div class="col-lg-4">
                                        <img src="img/menu/home-menu/menu-images/<?= $menuImages[$counter]; ?>" class="col-lg-12">
                                        <h3><?= $menu ?>: </h3>
                                        <p>Flavours of this Cake: </p>
                                        <?php

                                            $counter++;

                                            // Loop over all the results and find the descriptions that match this menu
                                            foreach($result as $item) {
                                                if( $item['Name'] == $menu ) {
                                                    echo '<p>'.$item['Description'].'</p>';
                                                }
                                            }

                                        ?>
                                        <a href="index.php?page=order" class="btn btn-primary">I want this!</a>

                                        <?php if(isset($_SESSION['privilege']) && $_SESSION['privilege'] == 'admin' ) : ?>
                                        <form method="post" action="index.php?page=account">
                                            <input type="hidden" name="menu-name" value="<?php echo $menu; ?>">  
                                            <input type="submit" name="admin-edit" value="Edit this menu" class="btn">
                                        </form>
                                        <?php endif; ?>
                                    
                                    </div>
                                    


                                <?php endforeach; ?>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Pie Packages</h2>
                            <p>Try something different at your gathering, with our delicious savoury or sweet selections</p>

                            <?php

                                // Get all the menus
                                $result = $this->model->getAllPies();

                                // Get the names of the menus
                                $menuNames = [];

                                // Get the image associated with the menu
                                $menuImages = [];

                                foreach( $result as $image ) {
                                    $menuImages[] = $image['MenuImage'];
                                }

                                foreach( $result as $item ) {
                                    $menuNames[] = $item['Name'];
                                }

                                // Eliminate the duplicates
                                $menuNames = array_unique($menuNames);
                                $counter = 0;

                                // Loop through each result and display them inside the modal
                                foreach( $menuNames as $menu ) : ?>

                                    <div class="col-lg-4">
                                        <img src="img/menu/home-menu/menu-images/<?= $menuImages[$counter]; ?>" class="col-lg-12">
                                        <h3><?= $menu ?>: </h3>
                                        <p>Flavour of this Pie:</p>
                                        <?php

                                            $counter++;

                                            // Loop over all the results and find the descriptions that match this menu
                                            foreach($result as $item) {
                                                if( $item['Name'] == $menu ) {
                                                    echo '<p>'.$item['Description'].'</p>';
                                                }
                                            }

                                        ?>
                                        <a href="index.php?page=order" class="btn btn-primary">I want this!</a>
                                        
                                        <?php if(isset($_SESSION['privilege']) && $_SESSION['privilege'] == 'admin' ): ?>
                                            <form method="post" action="index.php?page=account">
                                                <input type="hidden" name="menu-name" value="<?php echo $menu; ?>">  
                                                <input type="submit" name="admin-edit" value="Edit this menu" class="btn">
                                            </form>
                                        <?php endif; ?>
                                    
                                    </div>                    

                                <?php endforeach; ?>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

