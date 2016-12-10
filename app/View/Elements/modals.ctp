<!-- Modal Contact -->
<div class="modal fade" id="modal-contact">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title strong">Send A Message</h4>
            </div><!-- /.modal-header -->

            <?php echo $this->Form->create(false, array('url' => array('controller' => 'pages', 'action' => 'send_inquiry'))); ?>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact_fname" id="contact-fname"
                                       required="true" placeholder="First Name">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="contact_lname" id="contact-lname"
                                       required="true" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="contact_number" id="contact-number"
                                       required="true" placeholder="Contact number">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" name="contact_email" id="contact-email"
                                       placeholder="Email Address (optional)">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <textarea class="form-control" name="contact_msg" id="contact-msg" rows="5"
                                      placeholder="Your message"></textarea>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default cart-add text-uppercase" data-dismiss="modal">Cancel
                    </button>
                    <button type="submit" class="btn btn-primary cart-add text-uppercase strong" >Send Message</button>
                    <!-- data-toggle="modal" data-target="#modal-contact-send" data-dismiss="modal"-->
                </div><!-- /.modal-footer -->
            <?php echo $this->Form->end() ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Contact Confirmation -->
<div class="modal fade" id="modal-contact-send">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title strong">Confirmation</h4>
            </div><!-- /.modal-header -->

            <div class="modal-body text-center text-success">

                <div class="h1"><i class="fa fa-check-circle"></i></div>
                <p class="strong h3 mt-0">Message Sent!</p>
                <p class="h4">Thank you for sending us a message.</p>
                <p class="h4">We will be in touch with you soon.</p>
                <div class="spacer"></div>

            </div><!-- /.modal-body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-primary text-uppercase cart-add" data-dismiss="modal">Close
                </button>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Cart -->
<div class="modal fade" id="modal-cart">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="_title" class="modal-title strong">[menu title]</h4>
            </div><!-- /.modal-header -->

            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-5">
                        <img id="_image" class="img-responsive" src="http://placehold.it/255x200?text=image"
                             alt="item">
                    </div>

                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled h5">
                                    <li class="text-muted text-uppercase small"><p>includes</p></li>
                                    <li><p id="_description">[menu description]</p></li>
                                </ul>

                                <div class="spacer spacer-5"></div>

                                <ul class="list-unstyled h5">
                                    <li class="text-muted text-uppercase small"><p>price</p></li>
                                    <li><p id="_price">[price]</p></li>
                                </ul>
                            </div>

                            <?php if ($myRole != "Guest" && ($currentController == "pages" && $currentAction == 'cart')): ?>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled h5">
                                        <li class="text-muted text-uppercase small"><p>No. of Order/s</p></li>
                                        <li><input type="number" class="num-order form-control" min="1" value="1"></li>
                                    </ul>
                                </div>
                            <?php endif ?>

                        </div>

                    </div>
                </div><!-- /.row -->

                <?php if ($myRole != 'Guest'): ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-warning small no-margin" role="alert">
                                <p>
                                    <b class="text-uppercase">Disclaimer:</b><br>
                                    All excess orders that are not covered by the companies food benefit will be paid by
                                    the employee.
                                </p>
                            </div>
                        </div>
                    </div><!-- /.row -->

                <?php endif ?>
            </div><!-- /.modal-body -->

            <div class="modal-footer">
                <button type="button" class="btn btn-default text-uppercase cart-add" data-dismiss="modal">Close
                </button>
                <a id="<?= ($myRole != "Guest" && ($currentController == "pages" && $currentAction == 'cart')) ? "update-addon" : "add-order"; ?>"
                   class="btn btn-warning strong text-uppercase cart-add"
                   data-toggle="modal" data-target="#modal-option"
                   data-dismiss="modal"><?= ($myRole != 'Guest') ? 'Add Order' : 'Add to Cart' ?>&nbsp;&nbsp;<i
                        class="glyphicon glyphicon-shopping-cart"></i></a>
            </div><!-- /.modal-footer -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Option -->
<div class="modal fade" id="modal-option">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div><!-- /.modal-header -->

            <div class="modal-body">
                <div class="text-center">
                    <h4 class="strong">Would you like to order some add-ons?</h4>

                    <div class="alert alert-warning small no-margin" role="alert">
                        <p>
                            <b class="text-uppercase">Disclaimer:</b><br>
                            All excess orders that are not covered by the companies food benefit will be paid by the
                            employee.
                        </p>
                    </div>

                    <div class="spacer"></div>
                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-1">
                            <button type="button" class="btn btn-primary btn-lg btn-block strong" data-toggle="modal"
                                    data-target="#modal-addon" data-dismiss="modal">Yes
                            </button>
                            <div class="spacer"></div>
                        </div>
                        <div class="col-sm-5">
                            <a href="/cart" class="btn btn-warning btn-lg btn-block strong">Proceed to Cart</a>
                            <div class="spacer"></div>
                        </div>
                    </div>
                </div><!-- /.text-center -->
            </div><!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Add-On -->
<div class="modal fade" id="modal-addon">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Ons</h4>
                </div><!-- /.modal-header -->

                <div class="modal-body">
                    <div class="row">
                        <div id="addons" class="col-sm-<?=(isset($menus)) ? '6' : '12' ;?>">
                            <ul class="list-unstyled h5">
                                <li class="text-muted text-uppercase small"><p>Select Add-On</p></li>
                                <?php if (isset($menus)) : ?>
                                    <?php foreach ($menus as $menu) {
                                        if (!$menu[$cur_page]['add_on']) continue; ?>
                                        <li>
                                            <div class="radio addon">
                                                <div class="form-group no-margin">
                                                    <input name="addon[<?= $cur_page?>]" id="addon-<?= $menu['AddOn']['id'] ?>"
                                                           value="<?= $menu['AddOn']['id'] ?>" type="checkbox">
                                                    <label for="addon-<?= $menu['AddOn']['id'] ?>"><?= $menu['AddOn']['title'] ?></label>
                                                </div>
                                            </div>
                                        </li>
                                    <?php }  ?>
                                <?php else : ?>
                                        <li><h2>No add-on for this meal.</h2></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php if (isset($menus)) : ?>
                        <div id="num-order" class="col-sm-6">
                            <ul class="list-unstyled h5">
                                <li class="text-muted text-uppercase small"><p>No. of Add-Ons</p></li>
                                    <?php foreach ($menus as $menu) {
                                        if (!$menu[$cur_page]['add_on']) continue; ?>
                                        <li><input type="number" class="form-control" count-addon-id="<?= $menu['AddOn']['id'] ?>" min="1" value="1"></li>
                                    <?php } ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-warning small no-margin" role="alert">
                                <p>
                                    <b class="text-uppercase">Disclaimer:</b><br>
                                    All excess orders that are not covered by the companies food benefit will be paid by
                                    the employee.
                                </p>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.modal-body -->

                <div class="modal-footer">
                    <button type="reset" class="btn btn-default text-uppercase cart-add">Reset</button>
                    <a href="<?= $site_url; ?>cart" id="submit-addon" <?= (isset($cur_page)) ? 'data-meal="'.$cur_page.'"' : '' ?>
                       class="btn btn-warning strong text-uppercase cart-add"><?= ($myRole != 'Guest') ? 'Add Order' : 'Add to Cart' ?>
                        &nbsp;&nbsp;<i class="glyphicon glyphicon-shopping-cart"></i></a>
                </div><!-- /.modal-footer -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
</div><!-- /.modal -->