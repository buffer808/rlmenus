<div class="snacks index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Snacks'); ?></h1>
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

                            <th>Menu</th>
                            <th>Created</th>
                            <th>Modified</th>
                            <th class="actions"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($snacks as $snack): ?>
                            <tr>

                                <td>
                                    <?php if ($the_addon = $snack['AddOn']['title']) {
                                        echo $this->Html->link($the_addon, array('controller' => 'add_ons', 'action' => 'view', $snack['AddOn']['id']));
                                    } else {
                                        echo $this->Html->link($snack['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $snack['Menu']['id']));
                                    } ?>
                                </td>
                                <td><?php echo h($snack['Snack']['created']); ?>&nbsp;</td>
                                <td><?php echo h($snack['Snack']['modified']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $snack['Snack']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $snack['Snack']['id'])); ?>
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