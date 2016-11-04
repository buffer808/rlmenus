<div class="menus view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Menu'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Menu'), array('action' => 'edit', $menu['Menu']['id']), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Menu'), array('action' => 'delete', $menu['Menu']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?> </li>

                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9 col-md-pull-3">
            <div class="box">
                <div class="box-body">
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <tbody>

                        <tr>
                            <th><?php echo __('Title'); ?></th>
                            <td>
                                <?php echo h($menu['Menu']['title']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo __('Description'); ?></th>
                            <td>
                                <?php echo nl2br($menu['Menu']['description']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo __('Price'); ?></th>
                            <td>
                                <?php echo __($menu['Menu']['price'] == 0 ? 'Not set' : $menu['Menu']['price'] . ' PHP'); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo __('Created'); ?></th>
                            <td>
                                <?php echo h($menu['Menu']['created']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo __('Modified'); ?></th>
                            <td>
                                <?php echo h($menu['Menu']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col md 9 -->

    </div>
</div>
