 <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2014</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="sitemap.html">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


     <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>

    <?php 

        // If the requested page is the home the header will animate if not then the animated header will turn off and just display the nav bar
        if($_GET['page'] == 'home') : ?> 
            <script src="js/cbpAnimatedHeader.js"></script>
        <?php endif;
        
    ?>
    

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>