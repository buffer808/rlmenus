<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Redlanch Food Delivery
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
    echo $this->Html->meta('icon');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= $site_url ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $this->webroot; ?>assets/css/font-awesome.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= $site_url ?>dist/css/skins/_all-skins.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?= $this->webroot; ?>assets/css/app.css">

    <style type="text/css">
        #meal-info ._includes p{
            white-space: pre !important;
        }

        .modal-content .overlay {
            background-attachment: scroll;
            background-clip: border-box;
            background-color: rgba(255, 255, 255, 0.701961);
            background-image: none;
            background-origin: padding-box;
            background-position-x: 0%;
            background-position-y: 0%;
            background-repeat-x: ;
            background-repeat-y: ;
            background-size: auto;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 3px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            box-sizing: border-box;
            color: rgb(51, 51, 51);
            display: block;
            font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            text-size-adjust: 100%;
            top: 0px;
            z-index: 50;
            -webkit-font-smoothing: antialiased;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        .modal-content .overlay .fa{
            position: absolute;
            top: 50%;
            font-size: 50px;
            left: 50%;
            margin: -15px;
        }
    </style>

</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand no-pad" href="<?= $this->webroot; ?>">
                <img src="<?= $this->webroot; ?>assets/img/logo-rlfd.png" alt="logo" class="img-responsive">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button id="hotline" href="tel:0000000" class="btn btn-link btn-sm navbar-btn text-uppercase">Call us <span class="h4 strong">000-0000</span></button>
                </li>
                <li id="cart">
                    <!-- <a href="#">
                        <span class="glyphicon glyphicon-shopping-cart text-primary"></span> <span>0</span>
                    </a> -->

                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart text-primary"></span> <span>' . $counter . '</span>', array('action' => 'cart'), array('escape' => false)); ?>
                </li>

                <?php if ($myRole == "Guest") { ?>
                    <li id="user">
                        <button type="button" class="btn btn-primary btn-sm navbar-btn text-uppercase"
                                onclick="window.location.href='<?= $this->webroot ?>login';">login
                        </button>
                    </li>
                <?php } else { ?>
                    <li id="user" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?= $myTitle ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if ($myRole != "customer"): ?>
                                <li><a href="<?= $this->webroot ?>dashboard"><span class="fa fa-dashboard"></span>&nbsp;&nbsp;Dashboard</a>
                                </li>
                            <?php endif; ?>
                            <li><a href="<?= $this->webroot ?>users/view/<?= $myID ?>"><span class="fa fa-user"></span>&nbsp;&nbsp;&nbsp;Profile</a>
                            </li>
                            <li><a href="<?= $this->webroot . (($myRole != 'customer') ? 'orders' : '#') ?>"><span
                                        class="fa fa-pencil-square-o"></span>&nbsp;&nbsp;Orders</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= $this->webroot ?>logout">
                                    <span class="text-danger"><i class="fa fa-sign-out"></i> Sign Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="spacer"></div>

<div class="container">
    <div class="col-xs-12 col-sm-9 col-sm-push-3">

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        
    </div><!-- /.col -->

    <div class="col-xs-12 col-sm-3 col-sm-pull-9">
        <?php echo $this->element('sidebar'); ?>
    </div><!-- /.col -->

    <div class="spacer spacer-30"></div>
</div><!-- .container -->

<div id="webroot" data-value="<?= $site_url; ?>"></div>

<?php echo $this->element('modals'); ?>

<?php echo $this->Element('load-js'); ?>

</body>
</html>
