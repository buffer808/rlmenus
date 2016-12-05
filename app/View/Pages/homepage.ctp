<h2 class="strong text-center">Select Menu</h2>
<div class="spacer"></div>

<div class="row text-center">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <div class="row">

            <?php $col = 0; $offset = ''; ?>

            <?php foreach ($meals as $meal): $col++; ?>

                <?php $offset = ($col == 4) ? 'col-sm-offset-2' : ($col == 1 && count($meals) == 2) ? 'col-sm-offset-2' : ''; ?>

                <div class="col-xs-12 col-sm-4 <?php echo $offset; ?>">
                    <a href="<?= $site_url . "meal/" . $meal ?>">
                        <div class="well meal">
                            <img class="icon" src="<?= $site_url; ?>assets/img/icon-<?= $meal ?>.svg"
                                 alt="icon: <?= $meal ?>">
                            <h3 class="title"><?= $meal ?></h3>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

        </div><!-- /.row -->
    </div><!-- /.col -->
</div><!-- /.row -->


<div class="row">
    <div class="col-sm-6">
        <h2 class="strong">Customer Feedback</h2>
        <div class="spacer"></div>

        <?php echo $this->element('home-feedback'); ?>
    </div>

    <div class="col-sm-6">
        <h2 class="strong">Send A Message</h2>
        <div class="spacer"></div>

        <?php echo $this->element('home-contact-form'); ?>
    </div>
</div>