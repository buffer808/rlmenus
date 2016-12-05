<div class="feedback index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Feedbacks'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <script>console.log(<?=json_encode($feedback)?>);</script>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <?php
                        $img = '';
                        if (count($feedback['Thread']) == 0 && $feedback['Feedback']['resolved'] == 0) {
                            $img = 'icon-new.png';
                        } elseif (count($feedback['Thread']) > 0 && $feedback['Feedback']['resolved'] == 0) {
                            $img = 'icon-unresolved.png';
                        } else {
                            $img = 'icon-solved.png';
                        }
                        ?>
                        <img class="img-circle" src="<?= $site_url ?>img/<?= $img ?>" alt="User Image">
                        <span class="username"><a href="#"><?= $feedback['Feedback']['title'] ?></a></span>
                        <span class="description">
                            <?= date('M. d, Y ! h:i A', strtotime($feedback['Feedback']['created'])); ?>
                            <span>&nbsp;|&nbsp;</span>
                            <span class="postedBy">posted by: <?= $feedback['User']['display_name'] ?></span>
                        </span>

                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
<!--                        <button type="button" class="btn btn-box-tool" data-widget="collapse">-->
<!--                            <i class="fa fa-minus"></i>-->
<!--                        </button>-->
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <article class="clearfix">
                        <?= "<p>\n" . implode("\n</p>\n<p>", explode('<br />', nl2br($feedback['Feedback']['content']))) . "\n</p>" ?>
                        <p>&nbsp;</p>
                    </article>

                    <!-- Attachment .attachment-block -->
                    <!-- /.attachment-block -->

                    <!--                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>-->
                    <button type="button"
                            class="btn btn-default btn-sm btn-flat <?= ($feedback['Feedback']['resolved']) ? 'bg-green' : '' ?>">
                        <i class="fa fa-check"></i> Solved
                    </button>
                    <span class="pull-right text-muted"><?= count($feedback['Thread']) ?> comments</span>
                </div>
                <!-- /.box-body -->
                <div class="box-footer box-comments">
                    <?php if ($feedback["Thread"]) : ?>
                        <?php foreach ($feedback["Thread"] as $thread) { ?>
                            <div class="box-comment">
                                <!-- User image -->
                                <!--<img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">-->

                                <div class="comment-text">
                                    <span class="username">
                                        <?= $thread['User']['display_name'] ?>
                                        <span class="<?= ($thread['User']['id'] == $myID) ? 'usr-d-post':'' ?> text-muted pull-right">
                                            <?= date('M. d, Y ! h:i A', strtotime($thread['Thread']['created'])); ?>
                                        </span>
                                        <?php if($thread['User']['id'] == $myID): ?>
                                            <span class="usr-action text-muted pull-right hidden">
                                                <?php echo $this->Html->link(
                                                    __('<span class="fa fa-edit"></span>&nbsp;&nbsp;Edit'),
                                                    array('controller'=>'threads','action' => 'edit',$thread['Thread']['id']), array('escape' => false)); ?>
                                            </span>
                                        <?php endif; ?>
                                    </span><!-- /.username -->
                                    <?= "<p>\n" . implode("\n</p>\n<p>", explode('<br />', nl2br($thread['Thread']['comment']))) . "\n</p>" ?>

                                    <!--<div class="action text-right">
                                        <button class="btn btn-default btn-xs">Reply</button>
                                    </div>-->
                                </div>
                                <!-- /.comment-text -->

                                <?php /*<div class="box-comments reply">
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
                            </div><!--/.reply--> */ ?>
                            </div>
                            <!-- /.box-comment -->
                        <?php } ?>
                    <?php endif; ?>
                </div>
                <!-- /.box-footer -->
                <div class="box-footer">
                    <?php echo $this->Form->create('Thread', array('action' => 'add', 'role' => 'form')); ?>
                    <!--<img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg"
                         alt="Alt Text">-->
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <div class="form-group">
                            <!--                                    <textarea class="textarea form-control" placeholder="Add comment here"></textarea>-->
                            <?php echo $this->Form->textarea('comment', array('class' => 'textarea form-control', 'placeholder' => 'Add comment here')); ?>
                        </div>
                        <div class="form-group text-right">
                            <!--                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>-->
                            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
                            <?php echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $myID)); ?>
                            <?php echo $this->Form->input('feedback_id', array('type' => 'hidden', 'value' => $feedback['Feedback']['id'])); ?>
<!--                            --><?php //echo $this->Form->input('redirect', array('type' => 'hidden', 'value' => $this->webroot . 'feedbacks/view/' . $feedback['Feedback']['id'])); ?>
                        </div>
                    </div>
                    <?php echo $this->Form->end() ?>
                </div>
                <!-- /.box-footer -->
            </div><!--/.box-->
        </div><!--/.col-->
        <aside class="col-md-4">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title"><span class="fa fa-gear"></span> Actions</h3>
                </div>
                <div class="box-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp; Add Feedback'), array('controller' => 'feedbacks', 'action' => 'add'), array('escape' => false)); ?></li>
                    </ul>
                </div>
            </div>
        </aside>

    </div><!--/.row-->
</div><!-- end row -->

