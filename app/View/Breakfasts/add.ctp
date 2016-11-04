<div class="breakfasts form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Breakfast'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-4">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('Breakfast', array('role' => 'form')); ?>

                    <div class="form-group">
                        <?php echo $this->Form->input('menu_id', array('label' => 'Select a menu', 'class' => 'form-control', 'placeholder' => 'Menu Id')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
                    </div>

                    <?php echo $this->Form->end() ?>
                </div>
            </div>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
