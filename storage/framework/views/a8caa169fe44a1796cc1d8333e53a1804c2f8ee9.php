<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ADMIN PAGE </title>

    <!-- Bootstrap -->
    <link href="<?php echo e(URL::asset('')); ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(URL::asset('')); ?>css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(URL::asset('')); ?>css/nprogress.css" rel="stylesheet">
    <link href="<?php echo e(URL::asset('')); ?>css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(URL::asset('')); ?>css/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('')); ?>css/bootstrap-datetimepicker.min.css">










<!-- Custom Theme Style -->
    <link href="<?php echo e(URL::asset('')); ?>css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md body-content">
<div class="container body">
    <div class="main_container">
    <?php echo $__env->make('admin.partial.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- top navigation -->
    <?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- /top navigation -->

        <!-- page content -->
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="right_col" role="main">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo e(URL::asset('')); ?>js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo e(URL::asset('')); ?>js/bootstrap.min.js"></script>
<!-- FastClick -->

<!-- Custom Theme Scripts -->
<script src="<?php echo e(URL::asset('')); ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(URL::asset('')); ?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo e(URL::asset('')); ?>js/moment.js"></script>
<script src="<?php echo e(URL::asset('')); ?>js/bootstrap-datetimepicker.min.js"></script>

 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format:'YYYY/MM/DD HH:mm:ss'
                });
            });
        </script>



<script>
    $(".language_tab li:first").addClass("active");
    $(".tab-content .tab-pane:first").addClass("in");
    $(".tab-content .tab-pane:first").addClass("active");
</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
