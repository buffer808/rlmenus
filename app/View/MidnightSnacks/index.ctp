<div class="midnightSnacks index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Midnight Snacks'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->


    <div class="row">


        <div class="col-md-9">
            <div class="box">
                <div class="box-body">
                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                        <thead>
                        <tr>
                            <th width="40%">Menu</th>
                            <th width="25%">Created</th>
                            <th width="25%">Modified</th>
                            <th width="10%" class="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($midnightSnacks as $midnightSnack): ?>
                            <tr>

                                <td>
                                    <?php if ($the_addon = $midnightSnack['AddOn']['title']) {
                                        echo $this->Html->link($the_addon, array('controller' => 'add_ons', 'action' => 'view', $midnightSnack['AddOn']['id']));
                                    } else {
                                        echo $this->Html->link($midnightSnack['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $midnightSnack['Menu']['id']));
                                    } ?>
                                </td>

                                <td><?php echo h($midnightSnack['MidnightSnack']['created']); ?>&nbsp;</td>
                                <td><?php echo h($midnightSnack['MidnightSnack']['modified']); ?>&nbsp;</td>
                                <td class="actions">

                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $midnightSnack['MidnightSnack']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $midnightSnack['MidnightSnack']['id'])); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p>&nbsp;</p>
                </div>
            </div>


        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->