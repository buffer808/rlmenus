<!DOCTYPE html>
<html>
<head>
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

</head>
<body>

<?php echo $this->fetch('content'); ?>

</body>
</html>
