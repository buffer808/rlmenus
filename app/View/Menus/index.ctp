<div class="menus index row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1><?php echo __('Menus'); ?></h1>
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
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Menu'), array('action' => 'add'), array('escape' => false)); ?></li>

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
                                <th></th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price

                                <th>Created
                                <th>Modified
                                <th class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($menus as $menu): ?>
                                <tr>
                                    <td><img src="<?php echo ($menu['Menu']['image']) ? h($menu['Menu']['image']) : 'http://placehold.it/100x100?text=image'; ?>"
                                             width="100" height="100" alt="<?php echo h($menu['Menu']['title']); ?>"></td>
                                    <td><?php echo h($menu['Menu']['title']); ?>&nbsp;</td>
                                    <td><?php echo nl2br($menu['Menu']['description']); ?>&nbsp;</td>
                                    <td><?php echo __($menu['Menu']['price'] == 0 ? 'Not set' : $menu['Menu']['price'] . ' PHP'); ?>
                                        &nbsp;</td>

                                    <td><?php echo h($menu['Menu']['created']); ?>&nbsp;</td>
                                    <td><?php echo h($menu['Menu']['modified']); ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $menu['Menu']['id']), array('escape' => false)); ?>
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $menu['Menu']['id']), array('escape' => false)); ?>
                                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $menu['Menu']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col md 9 -->
        </div><!-- end row -->

    </div>
</div><!-- end containing of content -->