<div class="menus view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add-on'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Add-on'), array('action' => 'edit', $addon['AddOn']['id']), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Add-on'), array('action' => 'delete', $addon['AddOn']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $addon['AddOn']['id'])); ?> </li>

                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9 col-md-pull-3">
            <div class="box">
                <div class="box-body">

                    <div class="thumbnail">
                        <img src="<?php echo ($addon['AddOn']['image']) ? h($addon['AddOn']['image']) : 'http://placehold.it/100x100?text=image'; ?>" alt="<?php echo h($addon['AddOn']['title']); ?>">
                    </div>

                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <tbody>

                        <tr>
                            <th><?php echo __('Title'); ?></th>
                            <td>
                                <?php echo h($addon['AddOn']['title']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo __('Description'); ?></th>
                            <td>
                                <?php echo nl2br($addon['AddOn']['description']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo __('Price'); ?></th>
                            <td>
                                <?php echo __($addon['AddOn']['price'] == 0 ? 'Not set' : $addon['AddOn']['price'] . ' PHP'); ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo __('Created'); ?></th>
                            <td>
                                <?php echo h($addon['AddOn']['created']); ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo __('Modified'); ?></th>
                            <td>
                                <?php echo h($addon['AddOn']['modified']); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col md 9 -->

    </div>
</div>
