<div class="orders form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2><?php echo __('Export Orders By Date'); ?></h2>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('UserOrder', array('role' => 'form')); ?>

                        <?php if ($myRole != 'companyadmin'): ?>
                            <div class="form-date">
                                <?php echo $this->Form->input('company_id', array('type' => 'select', 'class' => 'form-control')); ?>
                            </div>
                            <br/>
                        <?php endif; ?>
                        <div class="form-group form-inline">
                            <label>Date:&nbsp;&nbsp;&nbsp;</label>
                            <?php echo $this->Form->input('date', array(
                                'type' => 'date', 'class' => 'form-control', 'label' => false,
                                'separator' => '<span class="sep">&nbsp;-&nbsp;</span>')); ?>
                        </div>
                        <div class="form-group form-inline">
                            <label>Time interval:&nbsp;&nbsp;</label>
                            <?php echo $this->Form->input('time_interval', array(
                                'type' => 'time', 'class' => 'form-control', 'label' => false)); ?>
                        </div>
                        <br/>
                        <div class="form-group">
                            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
                        </div>

                    <?php echo $this->Form->end() ?>
                </div>
            </div>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
