<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <?php /*  <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $myUsername ?></p>
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>*/ ?>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!--            <li class="header">MAIN NAVIGATION</li>-->
            <li>&nbsp;</li>


            <?php if ($myRole != 'customer') { ?>

                <?php /*if ($myRole): */?>
                    <li <?= $currentController == "dashboards" ? "class='active'" : "" ?>>
                        <?= $this->Html->link(__('<i class="fa fa-dashboard"></i> <span>Dashboard</span>'), array('controller' => 'dashboards', 'action' => 'index'), array('escape' => false)) ?>
                    </li>
                <?php /*endif */?>


                <?php if (in_array($myRole, array('admin','canteenadmin', 'companyadmin'))) : ?>
                    <li <?= $currentController == "users" ? "class='active'" : "" ?>>
                        <?= $this->Html->link(__('<i class="fa fa-users"></i> <span>Users</span>'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)) ?>
                    </li>
                <?php endif; ?>

                <?php if (!in_array($myRole, array('companyadmin', 'employee'))): ?>
                    <li <?= $currentController == "menus" && $currentAction != 'today' ? "class='active'" : "" ?>>
                        <?= $this->Html->link(__('<i class="fa fa-list-ul"></i> <span>Menus</span>'), array('controller' => 'menus', 'action' => 'index'), array('escape' => false)) ?></a>
                    </li>
                    <li <?= $currentController == "add_ons" && $currentAction != 'today' ? "class='active'" : "" ?>>
                        <?= $this->Html->link(__('<i class="fa fa-list-alt"></i> <span>Add-on Menu</span>'), array('controller' => 'add_ons', 'action' => 'index'), array('escape' => false)) ?></a>
                    </li>
                <?php endif ?>


                <li <?= $currentAction == "today" ? "class='active'" : "" ?>>
                    <?= $this->Html->link(__('<i class="fa fa-cutlery"></i> <span>Next Meal</span>'), array('controller' => 'menus', 'action' => 'today'), array('escape' => false)) ?>
                </li>

                <li <?= $currentController == "orders" && $currentAction != 'today' ? "class='active'" : "" ?>>
                    <?= $this->Html->link(__('<i class="fa fa-pencil-square-o"></i> <span>Orders</span>'), array('controller' => 'orders', 'action' => 'index'), array('escape' => false)) ?>
                </li>

                <?php if (!in_array($myRole, array('companyadmin', 'employee'))): ?>
                    <li <?= $currentController == "settings" ? "class='active'" : "" ?>>
                        <?= $this->Html->link(__('<i class="fa fa-gear"></i> <span>Settings</span>'), array('controller' => 'settings', 'action' => 'index'), array('escape' => false)); ?>
                    </li>
                    <li <?= $currentController == "companies" ? "class='active'" : "" ?>>
                        <?= $this->Html->link(__('<i class="fa fa-link"></i> <span>Companies</span>'), array('controller' => 'companies', 'action' => 'index'), array('escape' => false)); ?>
                    </li>
                    <li class="treeview <?= in_array($currentController, array("feedbacks","user_feedbacks")) ? "active" : "" ?>">
                        <a href="#">
                            <i class="fa fa-flag"></i>
                            <span>Feedbacks</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <?php $flag_new_feed = ($new_feed) ? '<small class="label pull-right bg-yellow">' . $new_feed . '</small>' : '';
                        $flag_not_solved = ($not_solved) ? '<small class="label pull-right bg-red">' . $not_solved . '</small>' : ''; ?>
                        <ul class="treeview-menu">
                            <li <?= $currentController == "feedbacks" ? "class=\"active\"" : "" ?>>
                                <?= $this->Html->link(
                                __('<i class="fa fa-circle-o"></i> <span>Feedbacks</span> <span class="pull-right-container">' . $flag_new_feed . $flag_not_solved .'</span>'),
                                array('controller' => 'feedbacks', 'action' => 'index'),
                                array('escape' => false)); ?>
                            </li>
                            <li <?= $currentController == "user_feedbacks" ? "class=\"active\"" : "" ?>>
                                <?= $this->Html->link(
                                __('<i class="fa fa-circle-o"></i> <span>Users Feedback</span> <span class="pull-right-container"></span>'),
                                array('controller' => 'user_feedbacks', 'action' => 'index'),
                                array('escape' => false)); ?>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

            <?php } ?>

            <?php if ($myUsername != 'Guest'): ?>

                <li>
                    <?= $this->Html->link(
                        __('<i class="fa fa-asterisk"></i> <span>Edit Password</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-red hidden">0</small>
                            </span>'),
                        array('controller' => 'users', 'action' => 'editpassword'),
                        array('escape' => false)); ?>
                </li>
                <li> <?= $this->Html->link(__("<i class='fa fa-sign-out'></i> <span style='white-space: pre-line;'>Logout {$myTitle}</span>"), array('controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?></li>
            <?php endif ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>