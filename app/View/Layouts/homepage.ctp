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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?= $this->webroot; ?>assets/css/app.css">

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
                    <a href="#">
                        <span class="glyphicon glyphicon-shopping-cart text-primary"></span> <span>0</span>
                    </a>
                </li>
                <li class="dropdown">
                    <?php if ($myRole == "Guest") { ?>
                        <a href="<?= $this->webroot ?>login" class="btn btn-danger">Login</a>
                    <?php } else { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?= $myTitle ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= $this->webroot ?>users/view/<?= $myID ?>">Profile</a></li>
                            <li><a href="#">Orders</a></li>
                            <li><a href="<?= $this->webroot ?>logout">Sign Out</a></li>
                        </ul>
                    <?php } ?>
                </li>
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


<!-- Modal -->
<div class="modal fade" id="modal-order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                TEST
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= $this->webroot; ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="<?= $this->webroot; ?>assets/js/bootstrap.js"></script>

</body>
</html>
