<div class="feedback panel">
    <div class="panel-body">
        <?php echo $this->Form->create('Feedback', array('url'=>array('controller'=>'feedbacks', 'action' => 'add'), 'role' => 'form')); ?>

        <?php echo $this->Form->input('menu_id', array('type' => 'hidden', 'value' => 0)); ?>
        <?php echo $this->Form->input('user_order_id', array('type' => 'hidden', 'value' => 0)); ?>
        <?php echo $this->Form->input('cur_page', array('type' => 'hidden', 'value' => '')); ?>

        <!-- Customer -->
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="customer">Customer Name</label>
                </div>
                <div class="col-sm-6">
                    <?php echo $this->Form->input('customer', array('label' => false, 'class' => 'form-control', 'type' => 'text',
                        'id' => 'customer', 'placeholder' => 'Customer Name', 'required' => true)); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('rate_quantity', array('class' => 'rate_quantity input-lg rating', 'type' => 'number',
                        'data-rate-msg' => 'msg_rate_quantity', 'placeholder' => 'Rating')); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->textarea('msg_rate_quantity', array('row'=>3,
                        'class' => 'textarea form-control', 'placeholder' => 'Your Feedback for Quantity')); ?>
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('rate_quality', array('class' => 'input-lg rating', 'type' => 'number',
                        'data-rate-msg' => 'msg_rate_quality', 'placeholder' => 'Rating')); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->textarea('msg_rate_quality', array('row'=>3,
                        'class' => 'textarea form-control', 'placeholder' => 'Your Feedback for Quality')); ?>
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->input('rate_variety', array('class' => 'input-lg rating', 'type' => 'number',
                        'data-rate-msg' => 'msg_rate_variety', 'placeholder' => 'Rating')); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $this->Form->textarea('msg_rate_variety', array('row'=>3,
                        'class' => 'textarea form-control', 'placeholder' => 'Your Feedback for Variety')); ?>
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-sm-7">
                <p class="help-block">Your feedback will help us improve our food quality,
                    quantity and variety.</p>
            </div>

            <div class="col-sm-5">
                <div class="form-group text-right">
                    <?php echo $this->Form->submit(__('Submit Feedback'), array(
                        'class' => 'btn btn-primary btn-lg btn-block text-uppercase')); ?>
                </div>
            </div>
        </div><!-- /.row -->

        <?php echo $this->Form->end() ?>

    </div><!-- /.panel-body -->
</div><!-- /.panel -->