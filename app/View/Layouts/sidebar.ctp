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

    <style>
        .meal .info p, #modal-cart #_description {
            white-space: pre !important;
            text-align: left;
        }
        .radio.addon label[for*="addon"] {
            padding-left: 10px;
        }
        a#hotline {
            padding: 6px;
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
                    <button id="hotline" href="tel:00000" class="btn btn-link btn-sm navbar-btn text-uppercase">Call us<span class="h4 strong">&nbsp;</span></button>
                </li>
                <li>
                    <a id="hotline" href="tel:639328800189" class="btn btn-link btn-sm navbar-btn text-uppercase"><span class="h4 strong">+63 932 880 0189</span></a>
                </li>
                <li>
                    <a id="hotline" href="tel:639175399852" class="btn btn-link btn-sm navbar-btn text-uppercase"><span class="h4 strong">+63 917 539 9852</span></a>
                </li>
                <li id="cart">
                    <?php echo $this->Html->link(
                        '<span class="glyphicon glyphicon-shopping-cart text-primary"></span> <span>' . $counter . '</span>',
                        array('controller'=>'pages', 'action' => 'cart'), array('escape' => false)); ?>
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
                            <?php if (!in_array($myRole, array('customer','employee'))): ?>
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


<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="h4 panel panel-default panel-body">Menu for <span class="strong"><?php echo $settings['Next Date']; ?></span></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-9 col-sm-push-3">

            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
            
        </div><!-- /.col -->

        <div class="col-xs-12 col-sm-3 col-sm-pull-9">
            <?php echo $this->element('sidebar'); ?>
        </div><!-- /.col -->

        <div class="spacer spacer-30"></div>
    </div>
</div><!-- .container -->

<div id="webroot" data-value="<?= $site_url; ?>"></div>

<?php echo $this->element('modals'); ?>

<?php echo $this->Element('load-js'); ?>

</body>
</html>
