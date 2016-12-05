<div class="row">
    <div class="col-xs-12">

        <?php echo $this->Session->flash(); ?>

        <form id="frmCart" action="">

            <div class="panel panel-default borderless module">
                <div class="panel-heading h3">
                    Your Order
                </div><!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr class="strong text-uppercase">
                                <th width="40%" class="text-left">Orders</th>
                                <th width="20%" class="text-center">Quantity</th>
                                <th width="20%" class="text-center">Price</th>
                                <th width="20%" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($cart): ?>
                                <?php foreach (array('Breakfast', 'Lunch', 'Snack', 'Dinner', 'MidnightSnack') as $meal) {
                                    $ctr = 0;
                                    if (!empty($cart[$meal])): $ctr2=0; ?>
                                        <tr class="text-center meal-h">
                                            <td class="text-left" colspan="4">
                                                <span class="text-muted small text-uppercase"><?= $meal ?>:</span>
                                            </td>
                                        </tr>
                                        <?php foreach ($cart[$meal] as $k => $m) { ?>
                                            <?php if ($ctr > 0): ?>
                                                <tr class="text-center meal-h">
                                                    <td class="text-left" colspan="4" style="padding: 2px;"></td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr class="text-center">
                                                <td class="text-left">
                                                    <p><?= $m['title'] ?></p>
                                                </td>
                                                <td><p><?= ($myRole != 'Guest') ? 1 : '#' ?></p></td>
                                                <td><p><?= 'Php ' . $m['price'] . '.00' ?></p></td>
                                                <td>
                                                    <a href="#" id="<?= $m['id'] ?>" data-meal="<?= $meal ?>"
                                                       data-cat="main"
                                                       class="remove-menu-id btn btn-danger btn-round fa fa-trash"></a>
                                                    <?php if (in_array($myRole, array('Guest', 'customer'))): ?>
                                                        <a href="#" id="edit-menu-id-<?= $m['id'] ?>"
                                                           data-meal="<?= $meal ?>"
                                                           class="btn btn-default btn-round fa fa-pencil"></a>
                                                    <?php endif; ?>

                                                </td>
                                            </tr>

                                            <?php if (!empty($m['AddOns'])):
                                                $_m = ($meal == "MidnightSnack") ? 'msnack' : strtolower($meal); ?>
                                                <tr class="text-center">
                                                    <td class="text-left" colspan="4">
                                                        <span class="text-muted small text-uppercase">Add-Ons:</span>
                                                    </td>
                                                </tr>
                                                <?php foreach ($m['AddOns'] as $k => $a) { ?>
                                                <tr class="text-center">
                                                    <td class="text-left">
                                                        <p><?= $a['title'] ?></p>
                                                    </td>
                                                    <td><?= $a['numOrder'] ?></td>
                                                <td><?= 'Php ' . ($a['price'] * $a['numOrder']) . '.00' ?></td>
                                                    <td>
                                                        <a href="#" id="<?= $a['id'] ?>" data-meal="<?= $meal ?>" data-cat="addon"
                                                           class="remove-menu-id btn btn-danger btn-round fa fa-trash"></a>
                                                        <a href="#" data-menu-id="<?= $m['id'] ?>" data-addon-id="<?= $a['id'] ?>"
                                                           data-num-order="<?= $a['numOrder'] ?>" data-toggle="modal"
                                                           data-target="#modal-cart" data-meal="<?= $meal ?>"
                                                           class="edit-menu btn btn-default btn-round fa fa-pencil"></a>
                                                    </td>
                                                </tr>
                                            <?php } endif;
                                            $ctr++; $ctr2++;
                                        }
                                    endif;
                                }
                            else: ?>
                                <tr class="text-center">
                                    <td class="text-left" colspan="4">
                                        <span class="text-muted small text-uppercase">No order yet? Go select your meal <a
                                                href="<?= $site_url ?>meal">HERE</a>.</span>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <div class="alert alert-warning small no-margin visible-xs text-center" role="alert">
                        <p>
                            Tap and drag to right to view the other details.
                        </p>
                    </div><!-- /.alert -->
                    <?php if (in_array($myRole, array('admin', 'canteenadmin', 'companyadmin', 'employee'))): ?>
                        <hr/>
                        <div class="alert alert-warning small no-margin" role="alert">
                            <p>
                                <b class="text-uppercase">Disclaimer:</b><br>
                                All excess orders that are not covered by the companies food benefit will be paid by the
                                employee.
                            </p>
                        </div>
                        <hr/>
                        <div class="form-group pull-right">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-warning btn-lg text-uppercase strong action" value="Submit Order">
                                <input type="hidden" name="data[user_id]" value="<?= $myID ?>" id="user_id">
                            </div>
                        </div>
                        <div class="form-group pull-left">
                            <div class="col-sm-12">
                                <a href="/meal" class="btn btn-default btn-lg text-uppercase strong action">Select a meal</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->


            <?php if ($myRole == 'Guest'): ?>
                <div class="panel panel-default borderless module">
                    <div class="panel-heading h3">
                        Billing Details
                    </div>
                    <div class="panel-body">
                        <div class="row form-horizontal">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fname" class="col-sm-5 control-label strong">First Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="fname"
                                               placeholder="Your First Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lname" class="col-sm-5 control-label strong">Last Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="lname" placeholder="Your Last Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-5 control-label strong">E-mail</label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" id="email" placeholder="Your E-mail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contact-number" class="col-sm-5 control-label strong">Contact
                                        number</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="contact-number"
                                               placeholder="Your Contact number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gender" class="col-sm-5 control-label strong">Create account?</label>
                                    <div class="col-sm-7">
                                        <div class="radio row no-gutters">
                                            <div class="spacer spacer-5"></div>
                                            <div class="col-sm-5">
                                                <input name="register" id="register_yes" value="change_yes"
                                                       type="radio">
                                                <label for="register_yes">Yes</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input name="register" id="register_no" value="change_no" type="radio">
                                                <label for="register_no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="contact-number" class="col-sm-5 control-label strong">Password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="password"
                                               placeholder="Your Password" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="delivery_add" class="col-sm-5 control-label strong">Delivery
                                        Address</label>
                                    <div class="col-sm-7">
                                        <textarea rows="5" class="form-control" id="delivery_add"
                                                  placeholder="Delivery Address"></textarea>
                                    </div>
                                </div>


                            </div><!-- /.col -->

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gender" class="col-sm-5 control-label strong">Are you paying the exact
                                        amount?</label>
                                    <div class="col-sm-7">
                                        <div class="radio row no-gutters">
                                            <div class="spacer spacer-5"></div>
                                            <div class="col-sm-5">
                                                <input name="change" id="change_yes" value="change_yes" type="radio">
                                                <label for="change_yes">Yes</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input name="change" id="change_no" value="change_no" type="radio">
                                                <label for="change_no">No</label>
                                            </div>
                                        </div>
                                        <div class="spacer"></div>
                                        <p class="no-margin"><span class="help-block small no-margin">Note: If YES, please prepare the exact amount of your order. The deliveryman will not carry money upon the delivery.</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="amount" class="col-sm-5 control-label strong">Cash in hand</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="amount" placeholder="Amount">
                                    </div>
                                </div>

                                <div class="spacer"></div>

                                <div id="summary-total" class="panel panel-warning module">
                                    <div class="panel-heading no-margin strong h4">
                                        Summary
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <label class="col-sm-5 text-right strong">Sub Total</label>
                                            <div class="col-sm-7">
                                                <p>
                                                    <small class="text-muted">Php</small>
                                                    100.00
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-5 text-right strong">Delivery Charge</label>
                                            <div class="col-sm-7">
                                                <p>
                                                    <small class="text-muted">Php</small>
                                                    100.00
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row strong">
                                            <label class="col-sm-5 text-right strong">Grand Total</label>
                                            <div class="col-sm-7">
                                                <p>
                                                    <small class="text-muted">Php</small>
                                                    100.00
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <div class="col-sm-12">
                                        <!-- <button type="submit" class="btn btn-warning btn-lg text-uppercase strong action">Submit Order</button> -->
                                        <a href="#" class="btn btn-warning btn-lg text-uppercase strong action">Submit
                                            Order</a>
                                    </div>
                                </div>

                            </div><!-- /.col -->
                        </div><!-- /.row -->


                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->

            <?php endif ?>
        </form>

    </div><!-- /.col -->
</div><!-- /.row -->