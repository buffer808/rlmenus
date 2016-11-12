<div class="breakfasts index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo ($is_addon) ? __('Breakfast Add-ons') : __('Breakfasts'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->


    <div class="row">

        <!--<pre><?/*=print_r($breakfasts, true)*/?></pre>-->

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
                        <?php foreach ($breakfasts as $breakfast): ?>
                            <tr>
                                <td>
                                    <?php
                                    if($the_addon = $breakfast['AddOn']['title']){
                                        echo $this->Html->link($the_addon, array('controller' => 'add_ons', 'action' => 'view', $breakfast['AddOn']['id']));
                                    }else{
                                        echo $this->Html->link($breakfast['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $breakfast['Menu']['id']));
                                    }
                                    ?>
                                </td>
                                <td><?php echo h($breakfast['Breakfast']['created']); ?>&nbsp;</td>
                                <td><?php echo h($breakfast['Breakfast']['modified']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $breakfast['Breakfast']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $breakfast['Breakfast']['id'])); ?>
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