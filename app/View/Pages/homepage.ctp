

	<!--<div class="row header">
		<div class="col-md-6">
			<p class="h2">Menu for <b>Friday</b></p>
		</div>
		<div class="col-md-6">
			<p class="h2 text-right"><b>04</b> <span>November</span> 2016</p>
		</div>
	</div>-->

	<?php foreach ($meals as $meal => $menu): ?>
	<div id="breakfast" class="panel panel-default borderless">
		<div class="panel-heading">
			<p class="panel-title pull-left meal"><b><?= $meal ?></b></p>
<!--            <p class="panel-title pull-right time"><span>08:00 AM</span> to <span>10:30</span> AM</p>-->
			<div class="clearfix"></div>
		</div>

		<div class="panel-body no-pad">
			<div class="row no-gutters">
			<?php foreach ($menu[1] as $m): ?>
				<div class="col-md-4">
					<div class="item">
						<img src="<?= $m['Menu']['image'] ? $site_url.h($m['Menu']['image']) : 'http://placehold.it/570x400?text=image'; ?>" alt="<?php echo __($m['Menu']['title']); ?>">
						<h4 class="title"><?php echo __($m['Menu']['title']); ?></h4>
						<button class="btn btn-warning btn-round" data-toggle="modal" data-target="#modal-order">
							<i class="glyphicon glyphicon-shopping-cart"></i>
						</button>
						<span class="price text-center"><?php echo __($m['Menu']['price']); ?></span>
						<div class="overlay"></div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div><!-- #breakfast -->
	<?php endforeach; ?>

	<div id="snack" class="panel panel-default borderless">
		<div class="panel-heading">
			<p class="panel-title pull-left meal"><b>Snack</b></p>
<!--            <p class="panel-title pull-right time"><span>08:00 AM</span> to <span>10:30</span> AM</p>-->
			<div class="clearfix"></div>
		</div>

		<div class="panel-body no-pad">
			<div class="row no-gutters">

				<div class="col-md-4">
					<div class="item">
						<img src="<?= $site_url; ?>assets/img/item-1.jpg" alt="item 1">
						<h4 class="title">Smoked Garlic Longganisa</h4>
						<button class="btn btn-warning btn-round" data-toggle="modal" data-target="#modal-order">
							<i class="glyphicon glyphicon-shopping-cart"></i>
						</button>
						<span class="price text-center">40</span>
						<div class="overlay"></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="item">
						<img src="<?= $site_url; ?>assets/img/item-1.jpg" alt="item 1">
						<h4 class="title">Smoked Garlic Longganisa</h4>
						<button class="btn btn-warning btn-round" data-toggle="modal" data-target="#modal-order">
							<i class="glyphicon glyphicon-shopping-cart"></i>
						</button>
						<span class="price text-center">40</span>
						<div class="overlay"></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="item">
						<img src="<?= $site_url; ?>assets/img/item-1.jpg" alt="item 1">
						<h4 class="title">Smoked Garlic Longganisa</h4>
						<button class="btn btn-warning btn-round" data-toggle="modal" data-target="#modal-order">
							<i class="glyphicon glyphicon-shopping-cart"></i>
						</button>
						<span class="price text-center">40</span>
						<div class="overlay"></div>
					</div>
				</div>

			</div>
		</div>
	</div><!-- #breakfast -->










