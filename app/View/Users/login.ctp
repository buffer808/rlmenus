<div class="users form">

	<?php /*<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h3><?php echo __('Enter your username and password'); ?></h3>
			</div>
		</div>
	</div> */ ?>


		<div class="col-md-12">
		
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Username'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Login'), array('class' => 'btn btn-primary btn-block btn-flat')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
