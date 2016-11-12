<div class="users form">

	<?php /*<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h3><?php echo __('Enter your username and password'); ?></h3>
			</div>
		</div>
	</div> */ ?>

			<?php echo $this->Form->create('User', array('role' => 'form')); ?>


				<?php echo $this->Form->input('username', array('div' => array('class' => 'form-group access has-feedback'), 'label' => array('text' => 'Username', 'class' => 'sr-only'), 'class' => 'form-control', 'placeholder' => 'Username', 'after' => '<span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>', 'autofocus'=>'autofocus'));?>

				<?php echo $this->Form->input('password', array('div' => array('class' => 'form-group access has-feedback'), 'label' => array('text' => 'Password', 'class' => 'sr-only'), 'class' => 'form-control', 'placeholder' => 'Password', 'after' => '<span class="glyphicon glyphicon-lock form-control-feedback" aria-hidden="true"></span>'));?>
				
				<div class="form-group button">
					<?php echo $this->Form->submit(__('Login'), array('class' => 'btn btn-primary btn-lg btn-block text-uppercase strong action')); ?>
				</div>

			<?php echo $this->Form->end() ?>


</div>