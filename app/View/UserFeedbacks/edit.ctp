<div class="breakfasts form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Edit Breakfast'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-9">
            <?php echo $this->Form->create('Company', array('role' => 'form')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('name', array(
                    'label' => 'Company name',
                    'class' => 'form-control',
                    'placeholder' => 'Company name',)); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
                <?php echo $this->Form->input('id', array('type'=>'hidden')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
