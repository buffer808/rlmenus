<div class="lunches index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Lunches'); ?></h1>
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
                        <?php foreach ($lunches as $lunch): ?>
                            <tr>

                                <td>
                                    <?php
                                    if ($the_addon = $lunch['AddOn']['title']) {
                                        echo $this->Html->link($lunch['AddOn']['title'], array('controller' => 'add_ons', 'action' => 'view', $lunch['AddOn']['id']));
                                    } else {
                                        echo $this->Html->link($lunch['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $lunch['Menu']['id']));
                                    }
                                    ?>
                                </td>
                                <td><?php echo h($lunch['Lunch']['created']); ?>&nbsp;</td>
                                <td><?php echo h($lunch['Lunch']['modified']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $lunch['Lunch']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lunch['Lunch']['id'])); ?>
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