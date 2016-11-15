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
 **/?>


<div class="snacks index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Feedbacks'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->


    <div class="row">
        <div class="col-md-6">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                        <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                        <span class="description">Nov. 15, 2016 ! 7:00 PM</span>
                    </div>
                    <!-- /.user-block -->
<!--                    <div class="box-tools">-->
<!--                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">-->
<!--                            <i class="fa fa-circle-o"></i></button>-->
<!--                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
<!--                        </button>-->
<!--                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
<!--                    </div>-->
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../dist/img/photo1.png" alt="Attachment Image">

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Menudo</a></h4>
                            <div class="attachment-text">
                                Served for lunch last Nov. 02, 2016
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                    <!-- /.attachment-block -->

                    <!-- Social sharing buttons -->
<!--                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>-->
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">45 likes - 2 comments</span>
                </div>
                <!-- /.box-body -->
                <div class="box-footer box-comments">
                    <div class="box-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                        <div class="comment-text">
                            <span class="username">
                                Maria Gonzales
                                <span class="text-muted pull-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.

                            <div class="action text-right">
                                <button class="btn btn-default btn-xs">Reply</button>
                            </div>
                        </div>
                        <!-- /.comment-text -->

                        <div class="box-comments reply">
                            <!-- Put .box-commet here -->
                            <div class="box-comment">
                                <!-- User image -->
                                <img class="img-circle img-sm" src="../dist/img/user5-128x128.jpg" alt="User Image">

                                <div class="comment-text">
                                    <span class="username">
                                        Nora Havisham
                                        <span class="text-muted pull-right">8:03 PM Today</span>
                                    </span><!-- /.username -->
                                    The point of using Lorem Ipsum is that it has a more-or-less
                                    normal distribution of letters, as opposed to using
                                    'Content here, content here', making it look like readable English.
                                </div>
                                <!-- /.comment-text -->
                            </div>
                            <!-- /.box-comment -->
                        </div><!--/.reply-->
                    </div>
                    <!-- /.box-comment -->

                </div>
                <!-- /.box-footer -->
                <div class="box-footer">
                    <form action="#" method="post">
                        <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                        <!-- .img-push is used to add margin to elements next to floating images -->
                        <div class="img-push">
                            <div class="form-group">
                                <textarea class="textarea form-control" placeholder="Add comment here"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-footer -->
            </div><!--/.box-->
        </div><!--/.col-->
    </div><!--/.row-->
</div><!-- end row -->


</div><!-- end containing of content -->