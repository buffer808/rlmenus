<div class="users index">

    <div class="row">
        <div class="col-md-4">
            <div class="page-header">
                <h1><?php echo __('Users'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
        <div class="col-md-8 text-right"><br/>
            <?php if ($myRole == "admin"): ?>
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;View All'), array('action' => 'index'), array('class' => 'btn btn-default', 'escape' => false)); ?>
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;View Admins Only'), array('action' => 'index', 1), array('class' => 'btn btn-default', 'escape' => false)); ?>
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-link"></span>&nbsp;&nbsp;View Customers Only'), array('action' => 'index', 2), array('class' => 'btn btn-default', 'escape' => false)); ?>
            <?php endif; ?>
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
        </div>
    </div><!-- end row -->


    <div class="row">

        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" cellpadding="0" cellspacing="0" class="table table-bordered table-hover" style="">
                        <thead>
                        <tr>
                            <?php /* <th><?php echo $this->Paginator->sort('username'); ?></th>
                            <th><?php echo $this->Paginator->sort('role'); ?></th>
                            <th><?php echo $this->Paginator->sort('text', 'Title'); ?></th>

                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"></th> */ ?>
                            <th>Username</th> <!--width="20%"-->
                            <th>Role</th> <!--width="20%"-->
                            <th>Display Name</th> <!--width="20%"-->
                            <th>Company</th> <!--width="20%"-->

                            <th>Created</th> <!--width="15%"-->
                            <th>Modified</th> <!--width="15%"-->
                            <th class="actions"></th> <!--width="10%" -->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr <?= ($user['User']['role'] == 'customer' && !isset($c_only)) ? 'class="warning"' : '' ?>>
                                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['display_name']); ?>&nbsp;</td>
                                <td><?php echo h($user['Company']['name']); ?>&nbsp;</td>
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

