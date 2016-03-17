<div class="dinners form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Dinner'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">

		<div class="col-md-9">
			<?php echo $this->Form->create('Dinner', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('menu_id', array('class' => 'form-control', 'placeholder' => 'Menu Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
