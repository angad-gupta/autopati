<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('admin/global/css/icons/icomoon/styles.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('admin/css/bootstrap_limitless.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('admin/css/layout.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('admin/css/components.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('admin/css/colors.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('admin/css/extra.css')); ?>" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
   <?php echo toastr_css(); ?>
    <!-- Core JS files -->
    <script src="<?php echo e(asset('admin/global/js/main/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/global/js/main/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/global/js/plugins/loaders/blockui.min.js')); ?>"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo e(asset('admin/global/js/plugins/ui/moment/moment.min.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/js/app.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/js/custom.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>

    <script src="<?php echo e(asset('admin/global/js/plugins/visualization/d3/d3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/global/js/plugins/visualization/d3/d3_tooltip.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/master.js')); ?>"></script>

    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>


    <script src="<?php echo e(asset('admin/global/js/demo_pages/datatables_basic.js')); ?>"></script>
    
    <?php echo toastr_js(); ?>

    <!-- /theme JS files -->
    <?php echo $__env->yieldContent('script'); ?>

</head>

<body class="sidebar-xs">


    <?php echo $__env->make('admin::includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Page content -->
    <div class="page-content">

        <?php echo $__env->make('admin::includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main content -->
        <div class="content-wrapper">
            <?php if(!Request::is('admin/dashboard')): ?>
            <?php echo $__env->make('admin::includes.page_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

            <!-- Content area -->
            <div class="content">

                <?php echo app('toastr')->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- /content area -->

            <?php echo $__env->make('admin::includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>
<?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app\Modules\Admin\Providers/../Resources/views/layout.blade.php ENDPATH**/ ?>