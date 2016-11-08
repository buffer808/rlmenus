<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Redlanch Food Delivery | <?php echo $title_for_layout; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" type="image/x-icon" href="<?php echo $site_url; ?>img/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $site_url; ?>img/favicon.ico">

    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= $site_url ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= $site_url ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $site_url ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= $site_url ?>dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="<?= $site_url ?>styles.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-black <?php //sidebar-collapse0 ?> sidebar-mini">
<div class="wrapper">

    <?php echo $this->Element('main-header'); ?>

    <?php echo $this->Element('main-sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <?php echo $this->Element('content-header'); ?>

        <?php echo $this->Session->flash(); ?>

        <!-- Main content -->
        <section class="content" style="position: relative;">
            <div class="row">
                <div class="col-md-12">

                    <?php echo $this->fetch('content'); ?>

                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <?php echo $this->Element('main-footer'); ?>

    <?php echo $this->Element('control-sidebar'); ?>


</div>
<!-- ./wrapper -->

<?php echo $this->Element('load-js'); ?>

</body>
</html>
