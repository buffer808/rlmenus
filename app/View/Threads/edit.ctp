<div class="feedbacks form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Thread'); ?></h1>
			</div>
		</div>
	</div>


	<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<div class="box">
				<div class="box-body">
					<?php echo $this->Form->create('Thread', array('action' => 'edit', 'role' => 'form')); ?>
					<div class="img-push">
						<div class="form-group">
							<?php echo $this->Form->textarea('comment', array('class' => 'textarea form-control', 'placeholder' => 'Add comment here')); ?>
						</div>
						<div class="form-group text-right">
							<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
							<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
							<?php echo $this->Form->input('user_id', array('type' => 'hidden')); ?>
							<?php echo $this->Form->input('feedback_id', array('type' => 'hidden')); ?>
						</div>
					</div>
					<?php echo $this->Form->end() ?>
				</div>
			</div>


		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
