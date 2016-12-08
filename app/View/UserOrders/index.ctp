<div id="orders" class="orders index">

    <div class="row">
        <div class="col-md-4">
            <div class="page-header">
                <h1><?php echo __('Orders'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
        <div class="col-md-8 text-right">
            <br>

            <?php if (in_array($myRole, array('companyadmin','canteenadmin','admin'))): ?>
                <?php if ($myRole !== 'companyadmin'): ?>
                    <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Delete All'), array('controller' => 'user_orders', 'action' => 'deleteAll'), array('class' => 'btn btn-default', 'escape' => false), __('Are you sure you want to delete all on this list?')); ?>
                <?php endif; ?>

                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Export By Date'), array('action' => 'exportbydate'), array('class' => 'btn btn-default', 'escape' => false)); ?>

                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Export By Date Range'), array('action' => 'exportbydaterange'), array('class' => 'btn btn-default', 'escape' => false)); ?>

                <?php if ($myRole != 'canteenadmin'): ?>
                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Order'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="datatable" cellpadding="0" cellspacing="0"
                           class="table nowrap table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Company</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Snack</th>
                            <th>Dinner</th>
                            <th>Midnight Snack</th>
                            <th>Created</th>
                            <?php if (!in_array($myRole, array('canteenadmin','employee'))): ?>
                                <th width="3%" class="actions"></th>
                            <?php endif ?>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($usersOrder as $k => $order): ?>
                            <tr>
                                <td><?= $order['User']['display_name'] ?></td>
                                <td><?= $order['Company']['name'] ?></td>

                                <?php
                                foreach (array('breakfast', 'lunch', 'snack', 'dinner', 'midnightsnack') as $m) {
                                    if (!$order["UserOrder"][$m]) {
                                        echo "<td>N/A</td>";
                                        continue;
                                    }

                                    if ($meal_ordered = $order["UserOrder"][$m]): ?>
                                        <td>
                                            <ul>
                                                <?php foreach ($meal_ordered as $key => $val):
                                                    if (!$val) continue; ?>
                                                    <li>
                                                        <script>console.log(<?=json_encode($val)?>);</script>
                                                        <span><strong><?= $val['Menu']['title'] ?></strong></span>
                                                        <ul>
                                                            <?php foreach ($val['AddOn'] as $k => $addon): ?>
                                                                <li>
                                                                    <span class="pull-left">- <?= $addon['title'] ?></span>
                                                                    <span class="pull-right">= &nbsp;&nbsp;&nbsp;&nbsp; <?= $addon['numOrder'] ?></span>
                                                                    <span class="clearfix"></span>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </td>
                                    <?php endif;
                                } ?>
                                <td><?= $order['UserOrder']['created'] ?></td>
                                <?php if (!in_array($myRole, array('canteenadmin','employee'))): ?>
                                <td class="actions">
                                        <?php echo $this->Form->postLink(
                                            '<span class="glyphicon glyphicon-remove"></span>',
                                            array(
                                                'action' => 'delete',
                                                $order['UserOrder']['id']),
                                            array('escape' => false),
                                            __('Are you sure you want to delete # %s?', $order['UserOrder']['id'])
                                        ); ?>
                                </td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->
