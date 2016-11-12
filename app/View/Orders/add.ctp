<div class="orders form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Order'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">
<!--        <pre>--><?//=print_r(array($breakfasts, $lunches, $snacks, $dinners,$midnightsnacks, $addons), true)?><!--</pre>-->
        <div class="col-md-3 col-md-push-9">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Orders'), array('action' => 'index'), array('escape' => false)); ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->

        <div class="col-md-9 col-md-pull-3">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $this->Form->create('Order', array('role' => 'form')); ?>
                            <div class="form-group">
                                <?php echo $this->Form->input('employee', array('class' => 'form-control', 'placeholder' => 'Employee')); ?>
                            </div>
                            <?php if ($myRole != 'companyadmin'): ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'Company', 'label' => 'Company')); ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <?php echo $this->Form->input('breakfast_id', array('class' => 'form-control', 'placeholder' => 'Breakfast Id')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('lunch_id', array('class' => 'form-control', 'placeholder' => 'Lunch Id')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('snack_id', array('class' => 'form-control', 'placeholder' => 'Snack Id')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('dinner_id', array('class' => 'form-control', 'placeholder' => 'Dinner Id')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('midnightsnack_id', array('class' => 'form-control')); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <header>
                                <strong>Add-ons</strong>
                                <hr/>
                            </header>
                            <!--<div class="form-group">
                                <?php /*echo $this->Form->input('addon_id', array('multiple' => true, 'class' => 'form-control', 'style'=>'height:330px;')); */ ?>
                            </div>-->
                            <?php if (!empty($addons['Breakfast'])): ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input('Order.addon_id.breakfast', array(
                                        'label' => 'Breakfast',
                                        'multiple' => true,
                                        'class' => 'form-control',
                                        'options' => $addons['Breakfast'])); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($addons['Lunch'])): ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input('Order.addon_id.lunch', array(
                                        'label' => 'Lunch',
                                        'multiple' => true,
                                        'class' => 'form-control',
                                        'options' => $addons['Lunch'])); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($addons['Snack'])): ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input('Order.addon_id.snack', array(
                                        'label' => 'Snack',
                                        'multiple' => true,
                                        'class' => 'form-control',
                                        'options' => $addons['Snack'])); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($addons['Dinner'])): ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input('Order.addon_id.dinner', array(
                                        'label' => 'Dinner',
                                        'multiple' => true,
                                        'class' => 'form-control',
                                        'options' => $addons['Dinner'])); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($addons['MidnightSnack'])): ?>
                                <div class="form-group">
                                    <?php echo $this->Form->input('Order.addon_id.msnack', array(
                                        'label' => 'Midnight Snack',
                                        'multiple' => true,
                                        'class' => 'form-control',
                                        'options' => $addons['MidnightSnack'])); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix"></div>
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
