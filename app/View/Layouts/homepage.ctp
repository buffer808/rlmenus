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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?= $this->webroot; ?>assets/css/app.css">
    <style>
        #contact-msg {
            min-height: 157px !important;
        }
        body.pages.cart a.fa.fa-trash, body.pages.cart a.fa.fa-pencil {
            padding-top: 5px;
        }
        .meal-h{
            background: #eee;
        }

        #datatable_wrapper, table#datatable{
            background: #ffffff;
            padding: 15px;
        }
        #datatable_filter, #datatable_paginate{
            text-align: right;
        }

        table#datatable ul{
            padding-left: 0;
        }
        table#datatable ul ul{
            padding-left: 15px;
        }
        table#datatable li {
            list-style: none;
        }
        .box{
            background: #ffffff;
            padding: 10px 20px;
        }
    </style>
</head>

<body class="<?= $currentController .' '.$currentAction?>">

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
    </div><!-- /.container -->
</nav>


<div class="spacer"></div>

<div class="container">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>

    <div class="spacer spacer-30"></div>
</div><!-- .container -->

<div id="webroot" class="hidden" data-value="<?= $site_url; ?>"></div>
<div id="user_id" class="hidden" data-value="<?= $myID; ?>"></div>

<?php if(in_array($currentController, array('pages')) && in_array($currentAction, array('cart'))):
     echo $this->element('modals');
endif; ?>

<!-- jQuery -->
<script src="<?= $this->webroot; ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="<?= $this->webroot; ?>assets/js/bootstrap.js"></script>
<!-- add to cart -->
<script src="<?= $this->webroot; ?>js/add-to-cart.js"></script>

<?php if (in_array($currentController, array('user_orders'))) { ?>
    <!-- DataTables -->
    <script src="<?= $site_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= $site_url ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<?php } ?>
<?php if (in_array($currentController, array('user_orders'))) { ?>
    <script>
        (function ($) {
            $("#datatable").DataTable();
        })(jQuery)
    </script>
<?php } ?>
</body>
</html>
