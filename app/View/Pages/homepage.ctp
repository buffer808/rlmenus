<?php foreach ($meals as $meal => $menu): ?>
	<div id="<?= strtolower($meal) ?>" class="panel panel-default borderless">
		<div class="panel-heading">
			<p class="panel-title pull-left meal"><b><?= $meal ?></b></p>
			<!--            <p class="panel-title pull-right time"><span>08:00 AM</span> to <span>10:30</span> AM</p>-->
			<div class="clearfix"></div>
		</div>

		<div class="panel-body no-pad">
			<div class="row no-gutters">
				<?php foreach ($menu[1] as $m): ?>
					<?php if ($m['Menu']['id'] == null) {
						$_addon[] = (isset($m['AddOn'])) ? $m['AddOn'] : array();
						continue;
					} ?>
					<div class="col-md-4">
						<div class="item">
							<img src="<?= $m['Menu']['image'] ? $site_url.h($m['Menu']['image']) : 'http://placehold.it/570x400?text=image'; ?>" alt="<?php echo __($m['Menu']['title']); ?>">
							<h4 class="title"><?php echo __($m['Menu']['title']); ?></h4>
							<button  class="btnViewMeal btn btn-warning btn-round" data-toggle="modal" data-target="#modal-order">
								<i class="glyphicon glyphicon-shopping-cart"></i>
								<span class="hidden _item" data-menu-id="<?= $m['Menu']['id'] ?>"></span>
								<!--							<span class="hidden _item" data-meal="--><?//= strtolower($meal) ?><!--"></span>-->
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