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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $this->webroot; ?>assets/css/font-awesome.min.css">
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
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary btn-sm navbar-btn text-uppercase"
                                onclick="window.location.href='<?= $this->webroot ?>logout';">logout
                        </button>
                    </li>
                <?php } ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="spacer"></div>

<div class="container">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>

    <div class="spacer spacer-30"></div>
</div><!-- .container -->

<div id="webroot" data-value="<?= $site_url; ?>"></div>
<!-- Modal -->
<div class="modal fade" id="modal-order" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title strong" id="modalLabel">[title]</h4>
            </div>
            <div class="modal-body no-pad">
                <div class="row no-gutters">
                    <div class="col-sm-5">
                        <div class="item">
                            <img id="img" src="assets/img/item-1.jpg" alt="item 1">
                        </div>
                    </div>

                    <div class="col-sm-7">
                        <div id="meal-info">

                            <form id="frm-add-to-cart" action="">

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="small text-uppercase">includes</p>
                                                <ul class="_includes list-unstyled h3">
                                                    <li><p>[includes]</p></li>
                                                </ul>

                                                <div class="h2">
                                                    <p class="small text-uppercase">price</p>
                                                    <p id="_price">[price]</p>
                                                </div>

                                                <div class="h2 mt-0 form-group">
                                                    <label class="small text-uppercase control-label" for="qty_order">Order
                                                        Quantity</label>
                                                    <input type="number" name="qty_order" id="qty_order"
                                                           class="form-control input-lg" value="1" min="1" step="1"
                                                           required="required">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">

                                                <div class="h2 mt-0 mb-0 form-group">
                                                    <label class="small text-uppercase control-label" for="add-on">Add-On</label>
                                                    <select id="add-on" class="form-control input-lg"
                                                            required="required" name="add_on">

                                                    </select>
                                                </div>

                                                <div class="h2 mt-0 form-group">
                                                    <label class="small text-uppercase control-label" for="qty_addon">Add-On
                                                        Quantity</label>
                                                    <input type="number" name="qty_addon" id="qty_addon"
                                                           class="form-control input-lg" value="1" min="1" step="1"
                                                           required="required">
                                                </div>

                                                <button type="submit"
                                                        class="btn btn-warning btn-block btn-lg text-uppercase add-to-cart strong">
                                                    <i class="glyphicon glyphicon-shopping-cart"></i> add to cart
                                                </button>

                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->

                            </form>

                        </div><!-- /#meal-info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= $this->webroot; ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="<?= $this->webroot; ?>assets/js/bootstrap.js"></script>
<!-- add to cart script -->
<script src="<?= $this->webroot; ?>js/add-to-cart.js"></script>

</body>
</html>
