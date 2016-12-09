<div class="companies form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Company'); ?></h1>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-sm-4">
            <img class="img-responsive"
                 src="<?= ($i = $curMeal['Menu']['image']) ? $i : 'http://placehold.it/255x200?text=image' ?>"
                 alt="<?= $curMeal['Menu']['title'] ?>">
            <ul class="list-unstyled info">
                <li class="h4 strong"><?= $curMeal['Menu']['title'] ?></li>
                <li><p style="white-space: pre;"><?= $curMeal['Menu']['description'] ?></p></li>
            </ul>
        </div>
        <div class="col-sm-8">

            <?php echo $this->Form->create('Feedback', array('role' => 'form')); ?>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('rate_quantity', array('class' => 'input-sm rating', 'type' => 'number', 'placeholder' => 'Rating')); ?>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                                            <textarea name="data[Feedback][content]" id="FeedbackContentQuantity"
                                                      rows="3" class="form-control"
                                                      placeholder="Your Feedback for Quantity"></textarea>
                    </div>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('rate_quality', array('class' => 'input-sm rating', 'type' => 'number', 'placeholder' => 'Rating')); ?>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                                            <textarea name="data[Feedback][content]" id="FeedbackContentQuality"
                                                      rows="3" class="form-control"
                                                      placeholder="Your Feedback for Quality"></textarea>
                    </div>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('rate_variety', array('class' => 'input-sm rating', 'type' => 'number', 'placeholder' => 'Rating')); ?>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                                            <textarea name="data[Feedback][content]" id="FeedbackContentVariety"
                                                      rows="3" class="form-control"
                                                      placeholder="Your Feedback for Variety"></textarea>
                    </div>
                </div>
            </div><!-- /.row -->

            <div class="row">
                <div class="col-sm-7">
                    <p class="help-block">Your feedback will help us improve our food quality,
                        quantity and variety.</p>
                </div>

                <div class="col-sm-5">
                    <div class="form-group text-right">
                        <input class="btn btn-primary btn-lg btn-block text-uppercase"
                               value="Submit Feedback" type="submit">
                        <input name="data[Feedback][user_id]" value="3" id="FeedbackUserId"
                               type="hidden">
                    </div>
                </div>
            </div><!-- /.row -->

            <?php echo $this->Form->end() ?>

        </div>
    </div><!-- end row -->
</div>
