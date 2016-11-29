<div class="row">
    <div class="col-xs-12">

        <?php echo $this->Session->flash(); ?>

        <form action="">

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

                            <tr class="text-center">
                                <td class="text-left">
                                    <p>Smoked Garlic Longganisa</p>
                                </td>
                                <td>
                                    <p>10</p>
                                </td>
                                <td>
                                    <p>40.00</p>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-round fa fa-trash"></button>
                                    <button type="button" class="btn btn-default btn-round fa fa-pencil"></button>
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td class="text-left" colspan="4">
                                    <span class="text-muted small text-uppercase">Add-Ons:</span>
                                </td>
                            </tr>

                            <tr class="text-center">
                                <td class="text-left">
                                    <p>Extra Rice</p>
                                </td>
                                <td>1</td>
                                <td>10.00</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-round fa fa-trash"></button>
                                    <button type="button" class="btn btn-default btn-round fa fa-pencil"></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <div class="alert alert-warning small no-margin visible-xs text-center" role="alert">
                        <p>
                            Tap and drag to right to view the other details.
                        </p>
                    </div><!-- /.alert -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->


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
                                        <input type="text" class="form-control" id="fname" placeholder="Your First Name">
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
                                    <label for="contact-number" class="col-sm-5 control-label strong">Contact number</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="contact-number" placeholder="Your Contact number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gender" class="col-sm-5 control-label strong">Create account?</label>
                                    <div class="col-sm-7">
                                        <div class="radio row no-gutters">
                                            <div class="spacer spacer-5"></div>
                                            <div class="col-sm-5">
                                                <input name="register" id="register_yes" value="change_yes" type="radio">
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
                                        <input type="password" class="form-control" id="password" placeholder="Your Password" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="delivery_add" class="col-sm-5 control-label strong">Delivery Address</label>
                                    <div class="col-sm-7">
                                        <textarea rows="5" class="form-control" id="delivery_add" placeholder="Delivery Address"></textarea>
                                    </div>
                                </div>


                            </div><!-- /.col -->

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gender" class="col-sm-5 control-label strong">Are you paying the exact amount?</label>
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
                                        <p class="no-margin"><span class="help-block small no-margin">Note: If YES, please prepare the exact amount of your order. The deliveryman will not carry money upon the delivery.</span></p>
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
                                                <p><small class="text-muted">Php</small> 100.00</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-5 text-right strong">Delivery Charge</label>
                                            <div class="col-sm-7">
                                                <p><small class="text-muted">Php</small> 100.00</p>
                                            </div>
                                        </div>

                                        <div class="row strong">
                                            <label class="col-sm-5 text-right strong">Grand Total</label>
                                            <div class="col-sm-7">
                                                <p><small class="text-muted">Php</small> 100.00</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <div class="col-sm-12">
                                        <!-- <button type="submit" class="btn btn-warning btn-lg text-uppercase strong action">Submit Order</button> -->
                                        <a href="#" class="btn btn-warning btn-lg text-uppercase strong action">Submit Order</a>
                                    </div>
                                </div>

                            </div><!-- /.col -->
                    </div><!-- /.row -->

                    


                </div><!-- /.panel-body -->
            </div><!-- /.panel -->

        </form>

    </div><!-- /.col -->
</div><!-- /.row -->