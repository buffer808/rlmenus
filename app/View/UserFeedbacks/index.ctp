<div class="user-feedbacks index">

    <div class="row">
        <div class="col-md-4">
            <div class="page-header">
                <h1><?= __('Users Feedback'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->


    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <section class="box-body">
                    <?php
                    if (isset($userFeedback) && $userFeedback) {
                        foreach ($userFeedback as $k => $data):
                            $rating = $data['Rating']; ?>
                            <section>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="strong text-uppercase">
                                            <small class="text-lowercase">by:
                                            </small><?= $data['User']['display_name'] ?>
                                            <small class="text-lowercase">of</small> <?= $data['Company']['name'] ?>
                                        </h4>
                                        <p class="text-muted"><?= date('m/d/Y h:i A', strtotime($data['UserFeedback']['created'])) ?></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <img class="img-responsive"
                                             src="<?= ($img = $data['Menu']['image']) ? $img
                                                 : 'http://placehold.it/255x200?text=image' ?>" alt="item">
                                        <ul class="list-unstyled info">
                                            <li class="h4 strong">Smoked Longanisa</li>
                                            <li>
                                                <p style="white-space: pre;"><?= $data['Menu']['description'] ?></p>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="FeedbackRateQuantity<?= $data['UserOrder']['id'] ?>">Quantity</label>
                                                    <input class="input-sm rating" placeholder="Rating"
                                                           type="number" disabled="disabled"
                                                           value="<?= $rating['rate_quantity'] ?>"
                                                           id="FeedbackRateQuantity<?= $data['UserOrder']['id'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Feedback for Quantity</label>
                                                    <div class="feed-msg">
                                                        <p><?= $rating['msg_rate_quantity'] ?></p></div>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label
                                                        for="FeedbackRateQuality<?= $data['UserOrder']['id'] ?>">Quality</label>
                                                    <input class="input-sm rating" placeholder="Rating"
                                                           type="number" disabled="disabled"
                                                           value="<?= $rating['rate_quality'] ?>"
                                                           id="FeedbackRateQuantity<?= $data['UserOrder']['id'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Feedback for Quanlity</label>
                                                    <div class="feed-msg">
                                                        <p><?= $rating['msg_rate_quality'] ?></p></div>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label
                                                        for="FeedbackRateVariety<?= $data['UserOrder']['id'] ?>">Variety</label>
                                                    <input class="input-sm rating" placeholder="Rating"
                                                           type="number" disabled="disabled"
                                                           value="<?= $rating['rate_variety'] ?>"
                                                           id="FeedbackRateQuantity<?= $data['UserOrder']['id'] ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Feedback for Variety</label>
                                                    <div class="feed-msg">
                                                        <p><?= $rating['msg_rate_variety'] ?></p></div>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->

                                    </div>
                                </div>
                            </section>
                            <hr>
                        <?php endforeach; ?>
                        <div class="text-center">
                            <?= $this->Element('bootstrap-paging') ?>
                        </div>
                    <?php } else { ?>
                        <section>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3>No feedbacks from the users.</h3>
                                </div>
                            </div>
                        </section>
                    <?php } ?>

            </div>
        </div>

    </div> <!-- end col md 9 -->
</div><!-- end row -->