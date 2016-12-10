<div class="panel">
    <div class="panel-body">
        <?php echo $this->Form->create(false, array('url' => array('controller' => 'pages', 'action' => 'send_inquiry'))); ?>

        <div class="form-group">
            <input type="text" class="form-control" name="contact_fname" id="contact-fname" required="true" placeholder="First Name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="contact_lname" id="contact-lname" required="true" placeholder="Last Name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="contact_number" id="contact-number" required="true" placeholder="Contact Number">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="contact_email" id="contact-email" placeholder="Email Address (optional)">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="contact_msg" id="contact-msg" placeholder="Your Message"></textarea>
        </div>

        <div class="form-group text-right">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Send Message&nbsp;&nbsp;<i
                    class="glyphicon glyphicon-send"></i></button>
        </div>

        <?php echo $this->Form->end() ?>
    </div>
</div>


<!-- <div class="contact panel panel-success">
	<div class="panel-body text-center text-success">
		<div class="h1"><i class="fa fa-check-circle"></i></div>
		<p class="strong h3 mt-0">Message Sent!</p>
		<p class="h4">Thank you for sending us a message.</p>
		<p class="h4">We will be in touch with you soon.</p>
		<div class="spacer"></div>
	</div> --><!-- /.panel-body -->
<!-- </div> --><!-- /.panel -->