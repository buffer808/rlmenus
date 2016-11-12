<div class="snacks form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Midnight Snack'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-4">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('MidnightSnack', array('role' => 'form')); ?>

                    <div class="form-group">
                        <?php echo $this->Form->input('menu_id', array('class' => 'form-control', 'placeholder' => 'Menu Id')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
                    </div>

                    <?php echo $this->Form->end() ?>
                </div>
            </div>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
