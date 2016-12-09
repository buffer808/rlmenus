<h3 class="strong no-margin">Select your meal:</h3>
<div class="spacer"></div>

<div class="row">

    <?php if ($menus) : ?>
        <?php foreach ($menus as $menu) {
            if ($menu[$cur_page]['add_on']) continue; ?>
            <div class="col-xs-12 col-sm-4">
                <div class="well meal text-center">
                    <img class="img-responsive"
                         src="<?= ($menu['Menu']['image']) ? $menu['Menu']['image'] : 'http://placehold.it/255x200?text=image' ?>"
                         alt="<?= $menu['Menu']['title'] ?>">
                    <ul class="list-unstyled info">
                        <li class="h4 strong"><?= $menu['Menu']['title'] ?></li>
                        <li><p><?= $menu['Menu']['description'] ?></p></li>
                        <li class="text-center">
                            <a data-toggle="modal" data-menu-id="<?= $menu['Menu']['id'] ?>"
                               data-meal="<?= $cur_page ?>" href="#modal-cart"
                               class="btn btn-primary text-uppercase cart-add"><?= ($myRole != 'Guest') ? 'Add Order' : 'Add to Cart' ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } ?>
    <?php else : ?>
        <div class="col-xs-12 col-sm-4">
            <h2>No menu for today.</h2>
        </div>
    <?php endif; ?>


</div>

<div class="spacer"></div>

<?php if (!in_array($myRole, array('Guest', 'customer'))): ?>

    <div class="row">
        <div class="col-xs-12">
            <h3 class="strong no-margin">Feedbacks:</h3>
            <div class="spacer"></div>

            <div class="feedback panel panel-default borderless">
                <div class="panel-heading">
                    <p class="panel-title text-uppercase strong">Current Meal</p>
                </div>
                <div class="panel-body">

                    <div id="current-meal" class="row">
                        <?php if (isset($curMeal['Orders']) && $curMeal['Orders']) { ?>
                        <?php foreach ($curMeal['Orders'] as $k => $data) : ?>
                            <div class="col-sm-4">
                                <img class="img-responsive"
                                     src="<?= ($i = $data['Menu']['image']) ? $i : 'http://placehold.it/255x200?text=image' ?>"
                                     alt="<?= $data['Menu']['title'] ?>">
                                <ul class="list-unstyled info">
                                    <li class="h4 strong"><?= $data['Menu']['title'] ?></li>
                                    <li><p style="white-space: pre;"><?= $data['Menu']['description'] ?></p></li>
                                </ul>
                            </div>
                            <div class="col-sm-8">

                                <?php echo $this->Form->create('UserFeedback', array('controller' => 'user_feedbacks', 'action' => 'add', 'role' => 'form')); ?>

                                <?php echo $this->Form->input('menu_id', array('type' => 'hidden', 'value' => $data['Menu']['id'])); ?>
                                <?php echo $this->Form->input('user_order_id', array('type' => 'hidden', 'value' => $curMeal['UserOrder']['id'])); ?>
                                <?php echo $this->Form->input('cur_page', array('type' => 'hidden', 'value' => $cur_page)); ?>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('rate_quantity', array('class' => 'rate_quantity input-sm rating', 'type' => 'number',
                                                'data-rate-msg'=>'msg_rate_quantity', 'placeholder' => 'Rating')); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <?php echo $this->Form->textarea('msg_rate_quantity', array(
                                                'class' => 'textarea form-control', 'placeholder' => 'Your Feedback for Quantity')); ?>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('rate_quality', array('class' => 'input-sm rating', 'type' => 'number',
                                                'data-rate-msg'=>'msg_rate_quality', 'placeholder' => 'Rating')); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <?php echo $this->Form->textarea('msg_rate_quality', array(
                                                'class' => 'textarea form-control', 'placeholder' => 'Your Feedback for Quality')); ?>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('rate_variety', array('class' => 'input-sm rating', 'type' => 'number',
                                                'data-rate-msg' => 'msg_rate_variety', 'placeholder' => 'Rating')); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <?php echo $this->Form->textarea('msg_rate_variety', array(
                                                'class' => 'textarea form-control', 'placeholder' => 'Your Feedback for Variety')); ?>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-7">
                                        <p class="help-block">Your feedback will help us improve our food quality,
                                            quantity and variety.</p>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group text-right">
                                            <?php echo $this->Form->submit(__('Submit Feedback'), array(
                                                'class' => 'btn btn-primary btn-lg btn-block text-uppercase')); ?>
                                        </div>
                                    </div>
                                </div><!-- /.row -->

                                <?php echo $this->Form->end() ?>

                            </div>
                        <?php endforeach; ?>
                        <?php } else { ?>
                            <div class="col-md-12 text-center">
                                <h2>You have no order today.</h2>
                                <br/>
                            </div>
                        <?php } ?>
                    </div>

                </div><!-- /.panel-body -->
            </div><!-- /.panel -->


            <div id="prev-feedback" class="feedback panel panel-default borderless">
                <div class="panel-heading">
                    <p class="panel-title text-uppercase strong">Previous Meals</p>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($prevMeal) && $prevMeal):
                        foreach ($prevMeal as $k => $data):
                            $rating = $data['Rating']; ?>
                            <section>
                                <h4 class="strong text-uppercase"><?= date('m/d/Y', strtotime($data['UserFeedback']['created'])) ?></h4>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img class="img-responsive"
                                             src="<?= ($img = $data['Menu']['image']) ? $img
                                                 : 'http://placehold.it/255x200?text=image' ?>" alt="item">
                                        <ul class="list-unstyled info">
                                            <li class="h4 strong">Smoked Longanisa</li>
                                            <li>
                                                <p style="white-space: pre;"><?= $data['Menu']['description'] ?></p>
                                            </li>
                                            <li>
                                                <p class="text-muted"><?= date('h:i A', strtotime($data['UserFeedback']['created'])) ?></p>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-8">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="FeedbackRateQuantity<?= $data['UserOrder']['id'] ?>">Quantity</label>
                                                    <input class="input-sm rating" placeholder="Rating" type="number" disabled="disabled"
                                                           value="<?= $rating['rate_quantity'] ?>"
                                                           id="FeedbackRateQuantity<?= $data['UserOrder']['id'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Feedback for Quantity</label>
                                                    <div class="feed-msg"><p><?= $rating['msg_rate_quantity'] ?></p></div>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="FeedbackRateQuality<?= $data['UserOrder']['id'] ?>">Quality</label>
                                                    <input class="input-sm rating" placeholder="Rating" type="number" disabled="disabled"
                                                           value="<?= $rating['rate_quality'] ?>"
                                                           id="FeedbackRateQuantity<?= $data['UserOrder']['id'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Feedback for Quanlity</label>
                                                    <div class="feed-msg"><p><?= $rating['msg_rate_quality'] ?></p></div>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="FeedbackRateVariety<?= $data['UserOrder']['id'] ?>">Variety</label>
                                                    <input class="input-sm rating" placeholder="Rating" type="number" disabled="disabled"
                                                           value="<?= $rating['rate_variety'] ?>"
                                                           id="FeedbackRateQuantity<?= $data['UserOrder']['id'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Feedback for Variety</label>
                                                    <div class="feed-msg"><p><?= $rating['msg_rate_variety'] ?></p></div>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->

                                    </div>
                                </div>
                            </section>
                            <hr>
                        <?php endforeach; ?>

                        <div class="text-center">
                            <?= $this->Element('bootstrap-paging') ?>
                        </div>

                    <?php else: ?>
                        <div class="text-center">
                            <h2>You have no feedbacks yet.</h2>
                        </div>
                    <?php endif; ?>

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
<?php endif; ?>