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
<?php /*
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
*/ ?>

<?php if(in_array($currentController, array('users', 'menus', 'orders', 'settings'))){ ?>
    <!-- DataTables -->
    <script src="<?= $site_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= $site_url ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<?php } ?>

<!-- SlimScroll 1.3.0 -->
<script src="<?= $site_url ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>


<?php /*
<!-- ChartJS 1.0.1 -->
<!--<script src="--><?php //echo $this->webroot; ?><!--/plugins/chartjs/Chart.min.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="--><?php //echo $this->webroot; ?><!--/dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="--><?php //echo $this->webroot; ?><!--/dist/js/demo.js"></script>-->
 */ ?>
<?php if(in_array($currentController, array('users', 'menus', 'orders', 'settings'))){ ?>
<script>
    (function ($) {
        $("#datatable").DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            <?php if($currentController == "orders"): ?>
                "scrollX": true,
                "columnDefs": [
                    { "width": "15%", "targets": 2 },
                    { "width": "15%", "targets": 3 },
                    { "width": "15%", "targets": 4 },
                    { "width": "15%", "targets": 5 },
                    { "width": "15%", "targets": 6 },
//                    { "width": "20px", "targets": 8 },
                ]
            <?php endif; ?>
        });
    })(jQuery)
</script>
<?php } ?>
