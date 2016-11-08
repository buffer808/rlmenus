<div class="orders index">

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
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp&nbsp;Delete All'), array('controller' => 'orders', 'action' => 'deleteAll'), array('escape' => false)); ?> </li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->


        <div class="col-md-9 col-md-pull-3">
            <div class="box">
                <div class="box-body">
                    <table id="datatable" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <?php /*<th><?php echo $this->Paginator->sort('text', 'Company'); ?></th>
                            <th><?php echo $this->Paginator->sort('employee'); ?></th>
                            <th><?php echo $this->Paginator->sort('breakfast_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('lunch_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('snack_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('dinner_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('midnight_snack_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th> */ ?>

                            <th>Company</th>
                            <th>Employee</th>
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
                        <?php foreach ($orders as $order): ?>


                            <tr>
                                <td>
                                    <?= $order['User']['text'] ?>
                                </td>
                                <td>
                                    <?= $order['Order']['employee'] ?>
                                </td>
                                <td>
                                    <?= $order['Breakfast']['id'] == 0 ? "N/A" : $breakfasts[$order['Breakfast']['id']]; ?>
                                </td>
                                <td>
                                    <?= $order['Lunch']['id'] == 0 ? "N/A" : $lunches[$order['Lunch']['id']]; ?>
                                </td>
                                <td>
                                    <?= $order['Snack']['id'] == 0 ? "N/A" : $snacks[$order['Snack']['id']]; ?>
                                </td>
                                <td>
                                    <?= $order['Dinner']['id'] == 0 ? "N/A" : $dinners[$order['Dinner']['id']]; ?>
                                </td>
                                </td>
                                <td>
                                    <?= $order['MidnightSnack']['id'] == 0 ? "N/A" : $midnightsnacks[$order['MidnightSnack']['id']]; ?>
                                </td>

                                <td><?php echo h($order['Order']['created']); ?>&nbsp;</td>

                                <td class="actions">
                                    <?php if ($myRole != 'canteenadmin'): ?>
                                        <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $order['Order']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
                                    <?php endif ?>
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