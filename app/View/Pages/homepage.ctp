<h2 class="strong text-center">Select Menu</h2>
<div class="spacer"></div>

<div class="row text-center">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1">
		<div class="row">
			
			<?php
			$col = 0;
			$offset = '';
			?>
			
			<?php foreach ($meals as $meal => $menu): $col++; ?>
			
			<?php
				if ( $col == 4 ) : $offset = 'col-sm-offset-2';
				else : $offset = '';
				endif;
			?>

			<div class="col-xs-12 col-sm-4 <?php echo $offset; ?>">
				<a href="meal">
					<div class="well meal">
						<img class="icon" src="<?= $site_url; ?>assets/img/icon-<?= $meal ?>.svg" alt="icon: <?= $meal ?>">
						<h3 class="title"><?= $meal ?></h3>
					</div>
				</a>
			</div>
			<?php endforeach; ?>

		</div><!-- /.row -->
	</div><!-- /.col -->
</div><!-- /.row -->