<!-- jQuery 2.2.3 -->
<script src="<?= $site_url ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= $site_url ?>bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= $site_url ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= $site_url ?>dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?= $site_url ?>plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- add to cart -->
<script src="<?= $site_url ?>js/add-to-cart.js"></script>


<?php /*
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
*/ ?>

<?php if (in_array($currentController, array('users', 'menus', 'orders', 'settings', 'user_orders', 'companies'))) { ?>
    <!-- DataTables -->
    <script src="<?= $site_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= $site_url ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<?php } ?>

<!-- SlimScroll 1.3.0 -->
<script src="<?= $site_url ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>


<?php if (in_array($currentController, array('feedbacks', 'threads', 'pages'))) : ?>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= $site_url ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<?php endif; ?>

<?php if (in_array($currentController, array('feedbacks', 'pages', 'user_feedbacks'))) : ?>
    <!-- Bootstrap Rating -->
    <script src="<?= $site_url ?>js/bootstrap-rating-input.min.js"></script>
    <script type="text/javascript">
        (function ($) {
            $('.feedback.index .rating, ' +
                '#prev-feedback input[disabled="disabled"], ' +
                '.user-feedbacks input[disabled="disabled"]').rating({
                'readonly': true
            });
        })(jQuery);
    </script>
<?php endif; ?>

<?php /*
<!-- ChartJS 1.0.1 -->
<!--<script src="--><?php //echo $this->webroot; ?><!--/plugins/chartjs/Chart.min.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?php //echo $this->webroot; ?><!--/dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="--><?php //echo $this->webroot; ?><!--/dist/js/demo.js"></script>-->
 */ ?>
<?php if (in_array($currentController, array('users', 'menus', 'orders', 'settings','user_orders', 'companies'))) { ?>
    <script>
        (function ($) {
//             $("#datatable").DataTable({
//                 "paging": true,
//                 "ordering": true,
//                 "info": true,
//                 <?php if($currentController == "orders"): ?>
//                 "sscrollX": true,
//                 "columnDefs": [
//                     {"width": "15%", "targets": 2},
//                     {"width": "15%", "targets": 3},
//                     {"width": "15%", "targets": 4},
//                     {"width": "15%", "targets": 5},
//                     {"width": "15%", "targets": 6},
// //                    { "width": "20px", "targets": 8 },
//                 ]
//                 <?php endif; ?>
//             });
                $("#datatable").DataTable();
        })(jQuery)
    </script>
<?php } ?>


<?php if (in_array($currentController, array('feedbacks', 'threads'))) : ?>
    <script>
        (function ($) {
            $(".textarea").wysihtml5();
        })(jQuery);
    </script>
<?php endif; ?>

<?php if (in_array($currentController, array('pages'))) : ?>
    <script src="<?= $site_url ?>js/scripts.js"></script>
    <?php if(isset($msg_sent) && $msg_sent==true): ?>
        <script>
            $('#modal-contact-send').modal('show');
        </script>
    <?php endif; ?>
<?php endif; ?>

<?php if (in_array($currentController, array('dashboards'))) : ?>
    <!-- ChartJS 1.0.1 -->
    <script src="<?= $site_url ?>plugins/chartjs/Chart.min.js"></script>
    <script src="<?= $site_url ?>js/dashboard.js"></script>
<?php endif; ?>
