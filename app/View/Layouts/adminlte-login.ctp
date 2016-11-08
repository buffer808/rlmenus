<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Redlanch Food Delivery | Login</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<?php
	echo $this->Html->meta('icon');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>

	<!-- Bootstrap 3.3.6 -->
	<!-- <link rel="stylesheet" href="<?php echo $site_url; ?>bootstrap/css/bootstrap.min.css"> -->
	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
	<!-- Theme style -->
	<!-- <link rel="stylesheet" href="<?php echo $site_url; ?>dist/css/AdminLTE.min.css"> -->
	<!-- iCheck -->
	<!-- <link rel="stylesheet" href="<?php echo $site_url; ?>plugins/iCheck/square/blue.css"> -->

	<link rel="stylesheet" href="<?= $this->webroot; ?>assets/css/app.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition login-page">


<div class="container">

	<div class="spacer spacer-30"></div>


	<div class="row no-gutters">
		<div class="col-xs-10 col-sm-6 col-md-4 col-xs-offset-1 col-sm-offset-3 col-md-offset-4">

			

			<div class="panel panel-default borderless module">
				
				<div class="panel-heading h3">

					<div class="row">
						<div class="col-xs-7">
							Login
						</div>

						<div class="col-xs-5">
							<a href="<?php echo $site_url; ?>" title="Go to home page">
								<img src="<?php echo $site_url; ?>img/rlfd-logo-bg.png" alt="Redlanch Cafeteria" class="img-responsive">
							</a>
						</div>
					</div>
					
				</div><!-- /.panel-heading -->


				<div class="panel-body">
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>
				</div><!-- /.panel-body -->

			</div><!-- /.panel -->

		</div><!-- /.col -->
	</div><!-- /.row -->


	<div class="spacer spacer-30"></div>
</div><!-- .container -->


<!-- jQuery 2.2.3 -->
<script src="<?php echo $site_url; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $site_url; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<!-- <script src="<?php echo $site_url; ?>plugins/iCheck/icheck.min.js"></script> -->

<!-- <script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
</script> -->
</body>
</html>
