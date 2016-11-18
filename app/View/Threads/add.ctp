<div class="feedbacks form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Feedback'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('Feedback', array('role' => 'form')); ?>

                    <div class="form-group">
                        <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title')); ?>

                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->textarea('content', array('class' => 'textarea form-control', 'placeholder' => 'Feedback')); ?>
                    </div>

                    <div class="form-group text-right">
                        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
                        <?php echo $this->Form->input('user_id', array('type'=>'hidden', 'value'=> $myID)); ?>
                    </div>

                    <?php echo $this->Form->end() ?>
                </div>
            </div>


        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
