<div class="menus form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Edit Menu'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3 col-md-push-9">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">

                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Menu.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Menu.id'))); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Menus'), array('action' => 'index'), array('escape' => false)); ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9 col-md-pull-3">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('Menu', array('role' => 'form')); ?>

                        <div class="form-group">
                            <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('price', array('class' => 'form-control', 'placeholder' => 'Price')); ?>
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
