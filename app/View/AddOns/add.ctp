<div class="menus form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Add-on'); ?></h1>
            </div>
        </div>
    </div>

    <?php if(!empty($meal)){ ?>
        <div class="col-md-4">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('AddOn', array('role' => 'form')); ?>

                    <div class="form-group">
                        <?php echo $this->Form->input('addon_id', array('label' => 'Select an add-on', 'class' => 'form-control', 'placeholder' => 'Add-on Id')); ?>
                        <?php echo $this->Form->input('add_on', array('type'=>'hidden', 'value'=>1)); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
                    </div>

                    <?php echo $this->Form->end() ?>
                </div>
            </div>

        </div>
    <?php } else {?>
    <div class="row">
        <div class="col-md-3 col-md-push-9">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Menus'), array('action' => 'index'), array('escape' => false)); ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9 col-md-pull-3">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('AddOn', array('role' => 'form', 'enctype'=>'multipart/form-data')); ?>

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
                        <?php echo $this->Form->input('image', array('class' => 'form-control', 'type'=>'file')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
                    </div>

                    <?php echo $this->Form->end() ?>
                </div>
            </div>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
    <?php } ?>
</div>
