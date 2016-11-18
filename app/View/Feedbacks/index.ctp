<div class="feedback index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Feedbacks'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->


    <div class="row">
        <aside class="col-md-3 col-md-push-9">
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
        <div class="col-md-9 col-md-pull-3">
            <?php if ($feedbacks): ?>
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
                                <img class="img-circle" src="<?= $site_url ?>img/<?= $img ?>" alt="Feedback Status">
                                <span class="username"><a
                                        href="<?= $this->webroot . 'feedbacks/view/' . $feedback['Feedback']['id'] ?>"><?= $feedback['Feedback']['title'] ?></a></span>
                                <span class="description">
                                    <?= date('M. d, Y ! h:i A', strtotime($feedback['Feedback']['created'])); ?>
                                    <span>&nbsp;|&nbsp;</span>
                                    <span class="postedBy">posted by: <?= $feedback['Feedback']['employee'] ?></span>
                                    <span>&nbsp;|&nbsp;</span>
                                    <span class="postedBy"><?= $feedback['User']['text'] ?></span>
                                </span>

                            </div>
                            <!-- /.user-block -->
                            <?php if ($feedback['User']['id'] == $myID): ?>
                                <div class="box-tools">
                                    <?php echo $this->Html->link(
                                        __('<span class="fa fa-edit"></span>&nbsp;&nbsp;Edit'),
                                        array('controller' => 'feedbacks', 'action' => 'edit', $feedback['Feedback']['id']), array('escape' => false)); ?>
                                    <span>&nbsp;&nbsp;</span>
                                    <?php echo $this->Form->postLink(
                                        __('<span class="fa fa-remove"></span>&nbsp;&nbsp;Delete'),
                                        array('controller' => 'feedbacks', 'action' => 'delete', $feedback['Feedback']['id']), array('escape' => false),
                                        __('Are you sure you want to delete # %s?', $feedback['Feedback']['id'])); ?>
                                </div>
                                <!-- /.box-tools -->
                            <?php endif; ?>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <article class="clearfix">
                                <?= "<p>\n" . implode("\n</p>\n<p>", explode('<br />', nl2br(substr($feedback['Feedback']['content'], 0, 320) . ((strlen($feedback['Feedback']['content']) > 320) ? ' [...]' : '')))) . "\n</p>" ?>
                                <p>&nbsp;</p>
                                <div class="form-inline">
                                    <div class="form-goup clearfix">
                                        <label class="pull-left">Rating: </label>
                                        <input type="number" data-max="5" data-min="1" class="pull-left rating input-sm"
                                               disabled="disabled" value="<?= $feedback['Feedback']['rating'] ?>">
                                    </div>
                                </div>
                            </article>

                            <!-- Attachment .attachment-block -->
                            <!-- /.attachment-block -->
                            <footer>
                                <hr/>
                                <a href="<?= $this->webroot . 'feedbacks/view/' . $feedback['Feedback']['id'] ?>"
                                   class="btn btn-default btn-sm btn-flat">
                                    read more
                                </a>
                                <span class="pull-right text-muted"><?= count($feedback['Thread']) ?> comments</span>
                            </footer>
                        </div>
                        <!-- /.box-body -->
                    </div><!--/.box-->
                <?php endforeach; ?>
            <?php else: ?>
                <div class="box box-widget">
                    <div class="box-body">
                        <h3 style="margin: 5px;">No Feedback found</h3>
                    </div>
                    <!-- /.box-body -->
                </div><!--/.box-->
            <?php endif; ?>
        </div><!--/.col-->


    </div><!--/.row-->
</div><!-- end row -->

