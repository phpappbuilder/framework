<?php
use Space\Get as Space;
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/App/phpappbuilder/admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/App/phpappbuilder/admin/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/App/phpappbuilder/admin/assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/App/phpappbuilder/admin/assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/App/phpappbuilder/admin/assets/dist/css/skins/_all-skins.min.css">
    <?php if (Space::Collection('phpappbuilder/admin/add_css') != null) {
    foreach(Space::Collection('phpappbuilder/admin/add_css') as $value) {?>
        <link rel="stylesheet" href="<?php echo $value; ?>">
    <?php }} ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">


   <?=$header?>


    <!-- Left side column. contains the sidebar -->
    <?=$sidebar?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <?=$content_header?>
        <!-- Main content -->
        <section class="content">
            <?=$content?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?=$footer?>
</div>
<!-- ./wrapper -->
<script src="/App/phpappbuilder/admin/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="/App/phpappbuilder/admin/assets/bower_components/raphael/raphael.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/morris.js/morris.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/moment/min/moment.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/App/phpappbuilder/admin/assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="/App/phpappbuilder/admin/assets/dist/js/adminlte.min.js"></script>
<?php if (Space::Collection('phpappbuilder/admin/add_js') != null) {
        foreach(Space::Collection('phpappbuilder/admin/add_js') as $value) {?>
    <script src="<?php echo $value; ?>"></script>
<?php }} ?>
</body>
</html>
