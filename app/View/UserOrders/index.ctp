<div id="orders" class="orders index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Orders'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-3 col-md-push-9">
            <?php if ($myRole != 'canteenadmin'): ?>
                <div class="actions">
                    <div class="panel panel-default">
                        <div class="panel-heading">Actions</div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Order'), array('action' => 'add'), array('escape' => false)); ?></li>
                            </ul>
                        </div><!-- end body -->
                    </div><!-- end panel -->
                </div><!-- end actions -->
            <?php endif; ?>
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Export By Date'), array('action' => 'exportbydate'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp;Export By Date Range'), array('action' => 'exportbydaterange'), array('escape' => false)); ?></li>
                            <?php if ($myRole !== 'companyadmin'): ?>
                                <!--<li><?php /*echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Delete All'), array('controller' => 'orders', 'action' => 'deleteAll'), array('escape' => false)); */ ?> </li>-->
                                <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Delete All'), array('controller' => 'orders', 'action' => 'deleteAll'), array('escape' => false), __('Are you sure you want to delete all on this list?')); ?> </li>

                            <?php endif; ?>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->


        <div class="col-md-9 col-md-pull-3">
            <div class="box">
                <div class="box-body">
                    <table id="datatable" cellpadding="0" cellspacing="0"
                           class="table nowrap table-bordered table-hover" style="width: 1024px;">
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
                            <th class="actions"></th>
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
                                    $meal_ordered = $order["UserOrder"][$m];
                                    if ($meal_ordered): ?>
                                        <td>
                                            <ul>
                                                <?php foreach ($meal_ordered as $key => $val):
                                                if (!$val) continue; ?>
                                                <li>
                                                    <script>console.log(<?=json_encode($val)?>);</script>
                                                    <span><?= $val['Menu']['title'] ?></span>
                                                    <ul>
                                                        <?php foreach ($val['AddOn'] as $k => $addon): ?>
                                                            <li>
                                                                <span class="pull-left"><?= $addon['title'] ?></span> <span class="pull-right">= &nbsp;&nbsp;&nbsp;&nbsp; <?=$addon['numOrder']?></span>
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
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->

<?php
function _getAddOn($args)
{ ?>

    <hr/><strong>Extra order:</strong>
    <ul style='padding: 5px; list-style: none'>
        <?php foreach ($args as $k => $a) {
            echo "<li>{$a}</li>";
        } ?>
    </ul>
    <?php

}
