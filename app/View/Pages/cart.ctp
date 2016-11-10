<div class="row">
	<div class="col-xs-12">

		<?php echo $this->Session->flash(); ?>

		<form action="">

		<div class="panel panel-default borderless module">
			<div class="panel-heading h3">
				Cart
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-striped table-hover mb-0">
					<thead>
						<tr class="strong text-uppercase">
							<th width="40%" class="text-left">Orders</th>
							<th width="20%" class="text-center">Order Qty</th>
							<th width="20%" class="text-center">Action</th>
							<th width="20%" class="text-center">Price</th>
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
								<button type="button" class="close fl-n"><span aria-hidden="true">&times;</span></button>
							</td>
							<td>
								<p>40.00</p>
							</td>
						</tr>
						<tr class="text-center">
							<td class="text-left" colspan="4">
								<p><span class="text-muted small text-uppercase">Add-On:</span></p>
							</td>
						</tr>
						<tr class="text-center">
							<td class="text-left">
								<p>Rice</p>
							</td>
							<td>1</td>
							<td>
								<button type="button" class="close fl-n"><span aria-hidden="true">&times;</span></button>
							</td>
							<td>10.00</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div><!-- /.panel -->


		<div class="panel panel-default borderless module">
			<div class="panel-heading h3">
				Billing Details
			</div>
			<div class="panel-body">
				<div class="row form-horizontal">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="fname" class="col-sm-4 control-label strong">First Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="fname" placeholder="First Name">
							</div>
						</div>

						<div class="form-group">
							<label for="lname" class="col-sm-4 control-label strong">Last Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="lname" placeholder="Last Name">
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="col-sm-4 control-label strong">E-mail</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" id="email" placeholder="E-mail">
							</div>
						</div>

						<div class="form-group">
							<label for="contact-number" class="col-sm-4 control-label strong">Contact number</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="contact-number" placeholder="Contact number">
							</div>
						</div>

						<div class="form-group">
							<label for="gender" class="col-sm-4 control-label strong">Create account?</label>
							<div class="col-sm-8">
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
							<label for="contact-number" class="col-sm-4 control-label strong">Password</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="password" placeholder="Password" disabled>
							</div>
						</div>

						
					</div><!-- /.col -->

					<div class="col-sm-6">
						<div class="form-group">
							<label for="gender" class="col-sm-4 control-label strong">Do you need change?</label>
							<div class="col-sm-8">
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
								<p class="no-margin"><span class="help-block small no-margin">Note: If NO, please prepare the exact amount of your bill.</span></p>
							</div>
						</div>

						<div class="form-group">
							<label for="amount" class="col-sm-4 control-label strong">Cash in hand</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="amount" placeholder="Amount">
							</div>
						</div>
						
						<div class="form-group">
							<label for="delivery_add" class="col-sm-4 control-label strong">Delivery Address</label>
							<div class="col-sm-8">
								<textarea rows="5" class="form-control" id="delivery_add" placeholder="Delivery Address"></textarea>
							</div>
						</div>

					</div><!-- /.col -->
				</div><!-- /.row -->

				<div class="form-group text-right">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-success btn-lg text-uppercase strong action">Submit Order</button>
					</div>
				</div>

				
			</div><!-- /.panel-body -->
		</div><!-- /.panel -->

		

		</form>

	</div><!-- /.col -->
</div><!-- /.row -->
