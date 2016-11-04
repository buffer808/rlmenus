<div class="orders form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2><?php echo __('Export Orders By Date Range'); ?></h2>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('Order', array('role' => 'form')); ?>
                        <?php if ($myRole != 'companyadmin'): ?>
                            <div class="form-date">
                                <?php echo $this->Form->input('company', array('type' => 'select', 'class' => 'form-control')); ?>
                            </div>
                            <br/>
                        <?php endif; ?>
                        <div class="form-date">
                            <?php echo $this->Form->input('from', array('type' => 'date', 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-date">
                            <?php echo $this->Form->input('to', array('type' => 'date', 'class' => 'form-control')); ?>
                        </div>
                        <br/>
                        <div class="form-group">
                            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
                        </div>
                    <?php echo $this->Form->end() ?>
                </div>
            </div>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
