<div class="feedback index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Feedbacks'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->


    <div class="row">
        <div class="col-md-8">
            <?php foreach ($feedbacks as $feedback) : ?>
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
                            <span class="username"><a
                                    href="<?= $this->webroot . 'feedbacks/view/' . $feedback['Feedback']['id'] ?>"><?= $feedback['Feedback']['title'] ?></a></span>
                            <span class="description">
                                <?= date('M. d, Y ! h:i A', strtotime($feedback['Feedback']['created'])); ?>
                                <span>&nbsp;|&nbsp;</span>
                                <span class="postedBy">posted by: <?= $feedback['User']['display_name'] ?></span>
                            </span>

                        </div>
                        <!-- /.user-block -->

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <article class="clearfix">
                            <?= "<p>\n" . implode("\n</p>\n<p>", explode('<br />', nl2br(substr($feedback['Feedback']['content'], 0, 320) . ((strlen($feedback['Feedback']['content']) > 320) ? ' [...]' : '')))) . "\n</p>" ?>
                            <p>&nbsp;</p>
                        </article>

                        <!-- Attachment .attachment-block -->
                        <!-- /.attachment-block -->

                        <a href="<?= $this->webroot . 'feedbacks/view/' . $feedback['Feedback']['id'] ?>"
                           class="btn btn-default btn-sm btn-flat">
                            read more
                        </a>
                        <span class="pull-right text-muted"><?= count($feedback['Thread']) ?> comments</span>
                    </div>
                    <!-- /.box-body -->
                </div><!--/.box-->
            <?php endforeach; ?>
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

