<div class="orders form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2><?php echo __('Export Orders By Date Range'); ?></h2>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-8">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('UserOrder', array('role' => 'form')); ?>
                        <?php if ($myRole != 'companyadmin'): ?>
                            <div class="form-date form-group">
                                <?php echo $this->Form->input('company_id', array('type' => 'select', 'class' => 'form-control')); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group form-inline">
                            <label>From:&nbsp;&nbsp;&nbsp;</label>
                            <?php echo $this->Form->input('from', array(
                                'type' => 'date', 'class' => 'form-control', 'label' => false,
                                'separator' => '<span class="sep">&nbsp;-&nbsp;</span>')); ?>
                            <br/>
                            <?php echo $this->Form->input('time_from', array(
                                'type' => 'time','style'=>'margin-top: -8px;',
                                'class' => 'form-control', 'label' => false)); ?>
                        </div>
                        <div class="form-group form-inline">
                            <label>To:&nbsp;&nbsp;&nbsp;</label>
                            <?php echo $this->Form->input('to', array(
                                'type' => 'date', 'class' => 'form-control', 'label' => false,
                                'separator' => '<span class="sep">&nbsp;-&nbsp;</span>')); ?>
                            <br/>
                            <?php echo $this->Form->input('time_to', array(
                                'type' => 'time','style'=>'margin-top: -8px',
                                'class' => 'form-control', 'label' => false)); ?>
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
