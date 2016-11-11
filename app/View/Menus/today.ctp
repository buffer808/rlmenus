<div class="menus view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Menu For (' . $settings['Next Date'] . ')'); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if ($myRole == 'admin' || $myRole == 'canteenadmin') : ?>

            <div class="col-md-3 col-md-push-9">

                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">
                        <li class=""><a href="#delete-action" data-toggle="tab" aria-expanded="true">Remove</a></li>
                        <li class="active"><a href="#add-action" data-toggle="tab" aria-expanded="false">Add</a></li>
                        <li class="pull-left header"><i class="fa fa-gear"></i>Actions</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="tab-pane" id="delete-action" style="position: relative;">
                            <ul class="nav nav-pills nav-stacked">

                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Breakfast'), array('controller' => 'breakfasts', 'action' => 'index'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Breakfast Add-on'), array('controller' => 'breakfasts', 'action' => 'index', 1), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Lunch'), array('controller' => 'lunches', 'action' => 'index'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Lunch Add-on'), array('controller' => 'lunches', 'action' => 'index', 1), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Snack'), array('controller' => 'snacks', 'action' => 'index'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Snack Add-on'), array('controller' => 'snacks', 'action' => 'index', 1), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Dinner'), array('controller' => 'dinners', 'action' => 'index'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Dinner Add-on'), array('controller' => 'dinners', 'action' => 'index', 1), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Midnight Snack'), array('controller' => 'midnight_snacks', 'action' => 'index'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove Midnight Snack Add-on'), array('controller' => 'midnight_snacks', 'action' => 'index', 1), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                                <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Remove All'), array('controller' => 'menus', 'action' => 'deleteAllMenus'), array('escape' => false), __('Are you sure you want to delete all on this list?')); ?> </li>
                                <li>
                                    <hr/>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-pane active" id="add-action" style="position: relative;">

                            <ul class="nav nav-pills nav-stacked">

                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Breakfast'), array('controller' => 'breakfasts', 'action' => 'add'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Breakfast Add-on'), array('controller' => 'add_ons', 'action' => 'add', 'Breakfast'), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Lunch'), array('controller' => 'lunches', 'action' => 'add'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Lunch Add-on'), array('controller' => 'add_ons', 'action' => 'add', 'Lunch'), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Snack'), array('controller' => 'snacks', 'action' => 'add'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Snack Add-on'), array('controller' => 'add_ons', 'action' => 'add', 'Snack'), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Dinner'), array('controller' => 'dinners', 'action' => 'add'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Dinner Add-on'), array('controller' => 'add_ons', 'action' => 'add', 'Dinner'), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Midnight Snack'), array('controller' => 'midnight_snacks', 'action' => 'add'), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Add Midnight Snack Add-on'), array('controller' => 'add_ons', 'action' => 'add', 'MidnightSnack'), array('escape' => false)); ?> </li>
                                <li>
                                    <hr/>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div><!-- end col md 3 -->

        <?php endif; ?>
        <div class="<?= ($myRole == 'admin' || $myRole == 'canteenadmin') ? 'col-md-9 col-md-pull-3' : 'col-md-12' ?>">
            <div class="box">
                <div class="box-body">
                    <!--<pre><?php /*print_r($meals) */ ?></pre>-->
                    <?php foreach ($meals as $title => $meal) : ?>
                        <?php if (count($meal[1]) > 0): ?>
                            <table cellpadding="0" cellspacing="0" class="table table-striped12">
                                <tbody>

                                <tr class="active">

                                    <th colspan="2"><h3><?php echo __($title); ?>
                                            &nbsp;<?php echo ' (' . $settings[$title] . ')'; ?></h3></th>
                                    <th></th>

                                </tr>
                                <?php $_addon = array(); ?>
                                <?php foreach ($meal[1] as $m): ?>
                                    <?php if ($m['Menu']['id'] == null) {
                                        $_addon[] = (isset($m['AddOn'])) ? $m['AddOn'] : array();
                                        continue;
                                    } ?>
                                    <tr>
                                        <td class="col-md-2">
                                            <img class="img-responsive"
                                                 src="<?= ($menu_img = $m['Menu']['image']) ? $menu_img : 'http://placehold.it/100x100?text=image' ?>"
                                                 alt="meal">
                                        </td>
                                        <th class="col-md-7">
                                            <?php if ($m['Menu']['price'] == 0): ?>
                                                <?php echo __($m['Menu']['title']); ?> &nbsp;&nbsp;
                                            <?php else: ?>
                                                <?php echo __($m['Menu']['title']); ?>
                                                &nbsp;&nbsp;(Price: <?php echo __($m['Menu']['price'] . ' PHP'); ?>)
                                            <?php endif; ?>
                                        </th>
                                        <td class="col-md-3">
                                            <?php echo nl2br($m['Menu']['description']); ?>
                                        </td>

                                    </tr>
                                <?php endforeach ?>

                                <?php if ($_addon): ?>
                                    <tr class="active">
                                        <th colspan="2"><h4>Meal add-on/s</h4></th>
                                        <th></th>
                                    </tr>

                                    <?php foreach ($_addon as $a) { ?>
                                        <tr>
                                            <td class="col-md-2">
                                                <img class="img-responsive"
                                                     src="<?= ($menu_img = $a['image']) ? $menu_img : 'http://placehold.it/100x100?text=image' ?>"
                                                     alt="meal">
                                            </td>
                                            <th class="col-md-7">
                                                <?php if ($a['price'] == 0): ?>
                                                    <?php echo __($a['title']); ?> &nbsp;&nbsp;
                                                <?php else: ?>
                                                    <?php echo __($a['title']); ?>
                                                    &nbsp;&nbsp;(Price: <?php echo __($a['price'] . ' PHP'); ?>)
                                                <?php endif; ?>
                                            </th>
                                            <td class="col-md-4">
                                                <?php echo nl2br($a['description']); ?>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>

        </div><!-- end col md 9 -->

    </div>
</div>
