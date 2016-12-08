<div class="menus index row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="page-header">
                    <h1><?php echo __('Add-on Menu'); ?></h1>
                </div>
            </div><!-- end col md 12 -->
            <div class="col-md-8 text-right"><br/>
                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Add-on'), array('action' => 'add'), array('class'=>'btn btn-primary','escape' => false)); ?>
            </div>
        </div><!-- end row -->


        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="datatable" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="10%"></th>
                                <th width="15%">Title</th>
                                <th width="15%">Description</th>
                                <th width="10%">Price</th>

                                <th width="15%">Created</th>
                                <th width="15%">Modified</th>
                                <th width="3%" class="actions"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($addons as $addon): ?>
                                <tr>
                                    <td><img src="<?php echo ($addon['AddOn']['image']) ? h($addon['AddOn']['image']) : 'http://placehold.it/100x100?text=image'; ?>"
                                             width="100" height="100" alt="<?php echo h($addon['AddOn']['title']); ?>"></td>
                                    <td><?php echo h($addon['AddOn']['title']); ?>&nbsp;</td>
                                    <td><?php echo nl2br($addon['AddOn']['description']); ?>&nbsp;</td>
                                    <td><?php echo __($addon['AddOn']['price'] == 0 ? 'Not set' : $addon['AddOn']['price'] . ' PHP'); ?>
                                        &nbsp;</td>

                                    <td><?php echo h($addon['AddOn']['created']); ?>&nbsp;</td>
                                    <td><?php echo h($addon['AddOn']['modified']); ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $addon['AddOn']['id']), array('escape' => false)); ?>
                                        <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $addon['AddOn']['id']), array('escape' => false)); ?>
                                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $addon['AddOn']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $addon['AddOn']['id'])); ?>
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