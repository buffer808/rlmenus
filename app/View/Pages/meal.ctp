<h3 class="strong no-margin">Select your meal:</h3>
<div class="spacer"></div>

<div class="row">

    <?php if($menus) : ?>
        <?php foreach($menus as $menu){ if($menu[$cur_page]['add_on']) continue; ?>
            <div class="col-xs-12 col-sm-4">
                <div class="well meal text-center">
                    <img class="img-responsive" src="<?= ($menu['Menu']['image']) ? $menu['Menu']['image'] : 'http://placehold.it/255x200?text=image' ?>" alt="<?= $menu['Menu']['title'] ?>">
                    <ul class="list-unstyled info">
                        <li class="h4 strong"><?= $menu['Menu']['title'] ?></li>
                        <li><p><?= $menu['Menu']['description'] ?></p></li>
                        <li class="text-center">
                            <a data-toggle="modal" data-menu-id="<?= $menu['Menu']['id'] ?>" data-meal="<?= $cur_page ?>" href="#modal-cart"
                               class="btn btn-primary text-uppercase cart-add"><?= ($myRole!='Guest') ? 'Add Order' : 'Add to Cart'?></a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } ?>
    <?php else : ?>
        <h2>No menu for today.</h2>
    <?php endif; ?>


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
                        <img class="img-responsive" src="<?= $site_url ?>assets/img/item-1.jpg" alt="item">
                        <ul class="list-unstyled info">
                            <li class="h4 strong">Smoked Longanisa</li>
                            <li><p>with Plain Rice and Soup</p></li>
                        </ul>
                    </div>

                    <div class="col-sm-8">
                        
                        <?php echo $this->Form->create('Feedback', array('role' => 'form')); ?>

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
                                        <?php echo $this->Form->input('rate_quantity', array('class' => 'input-sm rating', 'type'=>'number', 'placeholder' => 'Rating')); ?>
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
                                        <?php echo $this->Form->input('rate_quality', array('class' => 'input-sm rating', 'type'=>'number', 'placeholder' => 'Rating')); ?>
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
                                        <?php echo $this->Form->input('rate_variety', array('class' => 'input-sm rating', 'type'=>'number', 'placeholder' => 'Rating')); ?>
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

                        <?php echo $this->Form->end() ?>

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
                        <img class="img-responsive" src="<?= $site_url ?>assets/img/item-1.jpg" alt="item">
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
                        <img class="img-responsive" src="<?= $site_url ?>assets/img/item-2.jpg" alt="item">
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