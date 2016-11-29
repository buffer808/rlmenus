<div class="feedback panel">
	<div class="panel-body">


		<form action="/feedbacks/add" role="form" id="FeedbackAddForm" method="post" accept-charset="utf-8">

		<!-- Customer -->
		<div class="row form-group">
			<div class="col-sm-6">
				<label for="customer">Customer Name</label>
			</div>
			<div class="col-sm-6">
				<!-- If logged out -->
				<input type="text" name="customer" id="customer" class="form-control" placeholder="Customer Name">
				<!-- If logged In -->
				<!-- <p class="h4 mt-0">Customer Name</p> -->
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="FeedbackRateQuantity">Rate Quantity</label>
					<div class="rating-input input-lg">
						<i class="glyphicon glyphicon-star-empty" data-value="1"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="2"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="3"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="4"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="5"></i>
					</div>
					<input name="data[Feedback][rate_quantity]" class="input-lg rating hidden" placeholder="Rating" id="FeedbackRateQuantity" type="hidden">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<textarea name="data[Feedback][content]" id="FeedbackContentQuantity" rows="3" class="textarea form-control" placeholder="Your Feedback for Quantity"></textarea>
				</div>
			</div>
		</div><!-- /.row -->

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="FeedbackRateQuality">Rate Quality</label>
					<div class="rating-input input-lg">
						<i class="glyphicon glyphicon-star-empty" data-value="1"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="2"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="3"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="4"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="5"></i>
					</div>
					<input name="data[Feedback][rate_quality]" class="input-lg rating hidden" placeholder="Rating" id="FeedbackRateQuality" type="hidden">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<textarea name="data[Feedback][content]" id="FeedbackContentQuality" rows="3" class="textarea form-control" placeholder="Your Feedback for Quality"></textarea>
				</div>
			</div>
		</div><!-- /.row -->

		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="FeedbackRateVariety">Rate Variety</label>
					<div class="rating-input input-lg">
						<i class="glyphicon glyphicon-star-empty" data-value="1"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="2"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="3"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="4"></i>
						<i class="glyphicon glyphicon-star-empty" data-value="5"></i>
					</div>
					<input name="data[Feedback][rate_variety]" class="input-lg rating hidden" placeholder="Rating" id="FeedbackRateVariety" type="hidden">
				</div>
			</div>

			<div class="col-sm-6">
				<div class="form-group">
					<textarea name="data[Feedback][content]" id="FeedbackContentVariety" rows="3" class="textarea form-control" placeholder="Your Feedback for Variety"></textarea>
				</div>
			</div>
		</div><!-- /.row -->

		<div class="row">
			<div class="col-sm-6">
				<p class="help-block">Your feedback will help us improve our food quality, quantity and variety.</p>
			</div>

			<div class="col-sm-6">
				<div class="form-group text-right">
					<input class="btn btn-primary btn-lg btn-block text-uppercase" value="Submit Feedback" type="submit">
					<input name="data[Feedback][user_id]" value="3" id="FeedbackUserId" type="hidden">
				</div>
			</div>
		</div><!-- /.row -->

		</form>

	</div><!-- /.panel-body -->
</div><!-- /.panel -->


<!-- <div class="feedback panel panel-success">
	<div class="panel-body text-center text-success">
		<div class="h1"><i class="fa fa-check-circle"></i></div>
		<p class="strong h3 mt-0">Feedback Sent!</p>
		<p class="h4">Thank you for providing us your meal feedback.</p>
		<div class="spacer"></div>
	</div> --><!-- /.panel-body -->
<!-- </div> --><!-- /.panel -->