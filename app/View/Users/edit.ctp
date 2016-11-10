<div class="users form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Edit User'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3 col-md-push-9">
            <?php if ($myRole != 'customer') { ?>
                <div class="actions">
                    <div class="panel panel-default">
                        <div class="panel-heading">Actions</div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('action' => 'index'), array('escape' => false)); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div><!-- end col md 3 -->
        <div class="col-md-9 col-md-pull-3">
            <div class="box">
                <div class="box-body">
                    <?php echo $this->Form->create('User', array('role' => 'form')); ?>

                    <div class="form-group">
                        <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Username')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('role', array('class' => 'form-control', 'placeholder' => 'Role', 'disabled' => 'disabled')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('text', array('class' => 'form-control', 'placeholder' => 'Name', 'label' => 'Display Name')); ?>
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
