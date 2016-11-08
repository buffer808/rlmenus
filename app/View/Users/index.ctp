<div class="users index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Users'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->


    <div class="row">

        <div class="col-md-3 col-md-push-9">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('action' => 'add'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;View All'), array('action' => 'index'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;View Admins Only'), array('action' => 'index',1), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;View Customers Only'), array('action' => 'index',2), array('escape' => false)); ?></li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9 col-md-pull-3">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">System Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <?php /* <th><?php echo $this->Paginator->sort('username'); ?></th>
                            <th><?php echo $this->Paginator->sort('role'); ?></th>
                            <th><?php echo $this->Paginator->sort('text', 'Title'); ?></th>

                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"></th> */ ?>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Title</th>

                            <th>Created</th>
                            <th>Modified</th>
                            <th class="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr <?= ($user['User']['role'] == 'customer' && !isset($c_only)) ? 'class="warning"' : '' ?>>
                                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['text']); ?>&nbsp;</td>

                                <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $user['User']['id']), array('escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->

