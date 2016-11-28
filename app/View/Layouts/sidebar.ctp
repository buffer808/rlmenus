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
        
        <h3 class="strong no-margin">Select your meal:</h3>
        <div class="spacer"></div>

        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="well meal text-center">
                    <img class="img-responsive" src="assets/img/item-1.jpg" alt="item">
                    <ul class="list-unstyled info">
                        <li class="h4 strong">Smoked Longanisa</li>
                        <li><p>with Plain Rice and Soup</p></li>
                        <li class="text-center">
                            <a data-toggle="modal" href="#modal-cart" class="btn btn-primary text-uppercase cart-add">Add to Cart</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="well meal text-center">
                    <img class="img-responsive" src="assets/img/item-2.jpg" alt="item">
                    <ul class="list-unstyled info">
                        <li class="h4 strong">Tortang Talong</li>
                        <li><p>with Plain Rice and Side dish</p></li>
                        <li class="text-center">
                            <a data-toggle="modal" href="#modal-cart" class="btn btn-primary text-uppercase cart-add">Add to Cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="spacer"></div>

        <div class="row">
            <div class="col-xs-12">
                <h3 class="strong no-margin">Feedbacks:</h3>
                <div class="spacer"></div>

                <div class="feedback panel panel-default borderless">
                    <div class="panel-heading">
                        <p class="panel-title text-uppercase strong">Current Meal</p>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-4">
                                <img class="img-responsive" src="assets/img/item-1.jpg" alt="item">
                                <ul class="list-unstyled info">
                                    <li class="h4 strong">Smoked Longanisa</li>
                                    <li><p>with Plain Rice and Soup</p></li>
                                </ul>
                            </div>

                            <div class="col-sm-8">
                                
                                <form action="/feedbacks/add" role="form" id="FeedbackAddForm" method="post" accept-charset="utf-8">

                                    <!-- Customer -->
                                    <!-- <div class="row form-group">
                                        <div class="col-sm-12">
                                            <label for="customer">Customer Name</label>
                                        </div>
                                        <div class="col-sm-12"> -->
                                            <!-- If logged out -->
                                            <!-- <input type="text" name="customer" id="customer" class="form-control" placeholder="Customer Name"> -->
                                            <!-- If logged In -->
                                            <!-- <p class="h4 mt-0">Customer Name</p> -->
                                        <!-- </div>
                                    </div> -->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="FeedbackRateQuantity">Quantity</label>
                                                <div class="rating-input input-sm">
                                                    <i class="glyphicon glyphicon-star-empty" data-value="1"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="2"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="3"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="4"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="5"></i>
                                                </div>
                                                <input name="data[Feedback][rate_quantity]" class="input-lg rating hidden" placeholder="Rating" id="FeedbackRateQuantity" type="hidden">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea name="data[Feedback][content]" id="FeedbackContentQuantity" rows="3" class="form-control" placeholder="Your Feedback for Quantity"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="FeedbackRateQuality">Quality</label>
                                                <div class="rating-input input-sm">
                                                    <i class="glyphicon glyphicon-star-empty" data-value="1"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="2"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="3"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="4"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="5"></i>
                                                </div>
                                                <input name="data[Feedback][rate_quality]" class="input-lg rating hidden" placeholder="Rating" id="FeedbackRateQuality" type="hidden">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea name="data[Feedback][content]" id="FeedbackContentQuality" rows="3" class="form-control" placeholder="Your Feedback for Quality"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="FeedbackRateVariety">Variety</label>
                                                <div class="rating-input input-sm">
                                                    <i class="glyphicon glyphicon-star-empty" data-value="1"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="2"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="3"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="4"></i>
                                                    <i class="glyphicon glyphicon-star-empty" data-value="5"></i>
                                                </div>
                                                <input name="data[Feedback][rate_variety]" class="input-lg rating hidden" placeholder="Rating" id="FeedbackRateVariety" type="hidden">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea name="data[Feedback][content]" id="FeedbackContentVariety" rows="3" class="form-control" placeholder="Your Feedback for Variety"></textarea>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-7">
                                            <p class="help-block">Your feedback will help us improve our food quality, quantity and variety.</p>
                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-group text-right">
                                                <input class="btn btn-primary btn-lg btn-block text-uppercase" value="Submit Feedback" type="submit">
                                                <input name="data[Feedback][user_id]" value="3" id="FeedbackUserId" type="hidden">
                                            </div>
                                        </div>
                                    </div><!-- /.row -->

                                </form>

                            </div>
                        </div>
                        
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->


                <div class="feedback panel panel-default borderless">
                    <div class="panel-heading">
                        <p class="panel-title text-uppercase strong">Previous Meals</p>
                    </div>
                    <div class="panel-body">

                        <h4 class="strong text-uppercase">11/26/2016</h4>

                        <div class="row">
                            <div class="col-sm-4">
                                <img class="img-responsive" src="assets/img/item-1.jpg" alt="item">
                                <ul class="list-unstyled info">
                                    <li class="h4 strong">Smoked Longanisa</li>
                                    <li><p>with Plain Rice and Soup</p></li>
                                    <li><p class="text-muted">08:30 AM</p></li>
                                </ul>
                            </div>

                            <div class="col-sm-8">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FeedbackRateQuantity">Quantity</label>
                                            <div class="rating-input input-sm">
                                                <i class="glyphicon glyphicon-star-empty" data-value="1"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="2"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="3"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="4"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="5"></i>
                                            </div>
                                            <input name="data[Feedback][rate_quantity]" class="input-lg rating hidden" placeholder="Rating" id="FeedbackRateQuantity" type="hidden">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Feedback for Quantity</label>
                                            <p>Awesome.</p>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FeedbackRateQuality">Quality</label>
                                            <div class="rating-input input-sm">
                                                <i class="glyphicon glyphicon-star-empty" data-value="1"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="2"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="3"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="4"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="5"></i>
                                            </div>
                                            <input name="data[Feedback][rate_quality]" class="input-lg rating hidden" placeholder="Rating" id="FeedbackRateQuality" type="hidden">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Feedback for Quanlity</label>
                                            <p>Longanisa was overcook.</p>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FeedbackRateVariety">Variety</label>
                                            <div class="rating-input input-sm">
                                                <i class="glyphicon glyphicon-star-empty" data-value="1"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="2"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="3"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="4"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="5"></i>
                                            </div>
                                            <input name="data[Feedback][rate_variety]" class="input-lg rating hidden" placeholder="Rating" id="FeedbackRateVariety" type="hidden">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Feedback for Variety</label>
                                            <p>Awesome.</p>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                            </div>
                        </div>

                        <hr>

                        <h4 class="strong text-uppercase">11/26/2016</h4>

                        <div class="row">
                            <div class="col-sm-4">
                                <img class="img-responsive" src="assets/img/item-2.jpg" alt="item">
                                <ul class="list-unstyled info">
                                    <li class="h4 strong">Tortang Talong</li>
                                    <li><p>with Plain Rice and Soup</p></li>
                                    <li><p class="text-muted">07:30 AM</p></li>
                                </ul>
                            </div>

                            <div class="col-sm-8">
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FeedbackRateQuantity">Quantity</label>
                                            <div class="rating-input input-sm">
                                                <i class="glyphicon glyphicon-star-empty" data-value="1"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="2"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="3"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="4"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="5"></i>
                                            </div>
                                            <input name="data[Feedback][rate_quantity]" class="input-sm rating hidden" placeholder="Rating" id="FeedbackRateQuantity" type="hidden">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Feedback for Quantity</label>
                                            <p>Awesome.</p>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FeedbackRateQuality">Quality</label>
                                            <div class="rating-input input-sm">
                                                <i class="glyphicon glyphicon-star-empty" data-value="1"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="2"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="3"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="4"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="5"></i>
                                            </div>
                                            <input name="data[Feedback][rate_quality]" class="input-sm rating hidden" placeholder="Rating" id="FeedbackRateQuality" type="hidden">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Feedback for Quanlity</label>
                                            <p>It was too oily.</p>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FeedbackRateVariety">Variety</label>
                                            <div class="rating-input input-sm">
                                                <i class="glyphicon glyphicon-star-empty" data-value="1"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="2"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="3"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="4"></i>
                                                <i class="glyphicon glyphicon-star-empty" data-value="5"></i>
                                            </div>
                                            <input name="data[Feedback][rate_variety]" class="input-sm rating hidden" placeholder="Rating" id="FeedbackRateVariety" type="hidden">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Feedback for Variety</label>
                                            <p>Awesome.</p>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                            </div>
                        </div>

                        <hr>

                        <div class="text-center">
                            <ul class="pagination pagination-sm no-margin">
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>

                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->


                <!-- <div class="feedback panel panel-success">
                    <div class="panel-body text-center text-success">
                        <div class="h1"><i class="fa fa-check-circle"></i></div>
                        <p class="strong h3 mt-0">Feedback Sent!</p>
                        <p class="h4">Thank you for providing us your meal feedback.</p>
                        <div class="spacer"></div> -->
                    <!-- </div> --><!-- /.panel-body -->
                <!-- </div> --><!-- /.panel -->

            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.col -->

    <div class="col-xs-12 col-sm-3 col-sm-pull-9">
        <?php echo $this->element('sidebar'); ?>
    </div><!-- /.col -->

    <div class="spacer spacer-30"></div>
</div><!-- .container -->

<div id="webroot" data-value="<?= $site_url; ?>"></div>

 <?php echo $this->element('modals'); ?>

<!-- jQuery -->
<script src="<?= $this->webroot; ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="<?= $this->webroot; ?>assets/js/bootstrap.js"></script>
<!-- add to cart script -->
<script src="<?= $this->webroot; ?>js/add-to-cart.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= $site_url ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Bootstrap Rating -->
<script src="<?= $site_url ?>js/bootstrap-rating-input.min.js"></script>
<script>
    (function ($) {
        $(".textarea").wysihtml5();

        $('.feedback.index .rating').rating({
            'readonly': true
        });
    })(jQuery);
</script>

</body>
</html>
