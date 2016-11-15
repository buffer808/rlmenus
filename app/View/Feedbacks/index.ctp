<?php /**
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
                    <ul id="feedbacks">
                    <?php foreach ($feedbacks as $feed): ?>
                        <li>
                            <header>
                                <h3 class="_title">
                                    <?php if ($the_addon = $snack['AddOn']['title']) {
                                        echo $this->Html->link($the_addon, array('controller' => 'add_ons', 'action' => 'view', $snack['AddOn']['id']));
                                    } else {
                                        echo $this->Html->link($snack['Menu']['title'], array('controller' => 'menus', 'action' => 'view', $snack['Menu']['id']));
                                    } ?>
                                </h3>
                                <small class="date-posted"><?php echo h($snack['Snack']['created']); ?>&nbsp;</small>
                                <small class="date-modified"><?php echo h($snack['Snack']['modified']); ?>&nbsp;</small>
                            </header>
                            <section class="_message">

                            </section>
                            <td class="actions">
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $snack['Snack']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $snack['Snack']['id'])); ?>
                            </td>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->