
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo e($setting->title); ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo e(asset('assets/images/'.$setting->favicon)); ?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo e(asset('assets/back/js/plugin/webfont/webfont.min.js')); ?>"></script>
	<script id="setFont" data-src="<?php echo e(asset("assets/back/css/fonts.css")); ?>" src="<?php echo e(asset('assets/back/js/plugin/webfont/setfont.js')); ?>"></script>


	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/back/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/back/css/azzara.min.css')); ?>">
</head>

<body class="login">

        <?php echo $__env->yieldContent('content'); ?>

    <?php
        $mainbs = [];
        $mainbs['is_announcement'] = $setting->is_announcement;
        $mainbs['announcement_delay'] = $setting->announcement_delay;
        $mainbs['overlay'] = $setting->overlay;
        $mainbs = json_encode($mainbs);
    ?>

	<script src="<?php echo e(asset('assets/back/js/core/jquery.3.2.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/back/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/back/js/core/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/js/core/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/js/ready.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/master/back-login.blade.php ENDPATH**/ ?>