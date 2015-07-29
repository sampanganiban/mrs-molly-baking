<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $this->model->description; ?>">
    <meta name="author" content="">

    <title><?php echo $this->model->title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top
    <?php
        // Display the changing nav bar when the page is not the homepage
        if( $_GET['page'] != 'home' ) : ?>navbar-shrink<?php endif;
    ?> ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.php?page=home">Mrs. Molly Baking</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li class="hidden">
                        <a href="index.php?page=home"></a>
                    </li>
                    <li>
                        <a href="index.php?page=about">About</a>
                    </li>
                    <li>
                        <a href="index.php?page=contact">Contact</a>
                    </li>
                    <li>
                        <a href="index.php?page=order">Place an Order</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
				  <li role="presentation" class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				      Account <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu">
                      <li><a href="index.php?page=register">Register an Account</a></li>
                      <li><a href="index.php?page=login">Login to your Account</a></li>
                    </ul>
				  </li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <?php 

      if($_GET['page'] == 'home' ) : ?>
          <header>
            <div class="container">
              <div class="intro-text">
                <div class="intro-lead-in">"Just like Grandma Used to Make"</div>
                <div class="intro-heading">Mrs. Molly Baking</div>
                <a href="./order.html" class="btn btn-xl">Place an Order</a>
              </div>
            </div>
          </header> ;
      <?php endif;

    ?>        




