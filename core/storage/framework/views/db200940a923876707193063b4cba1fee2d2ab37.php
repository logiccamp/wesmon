<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo e($setting->title); ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon"  type="image/x-icon" href="<?php echo e(asset('assets/images/'.$setting->favicon)); ?>"/>

	<!-- Fonts and icons -->
	<script src="<?php echo e(asset('assets/back/js/plugin/webfont/webfont.min.js')); ?>"></script>
	<script id="setFont" data-src="<?php echo e(asset("assets/back/css/fonts.css")); ?>" src="<?php echo e(asset('assets/back/js/plugin/webfont/setfont.js')); ?>"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/back/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/back/css/azzara.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/css/tagify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/css/editor.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/css/bootstrap-iconpicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/css/magnific-popup.css')); ?>">

	<!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/css/custom.css')); ?>">


    <?php if(DB::table('languages')->where('type', 'Dashboard')->where('is_default',1)->first()->rtl == 1): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/back/css/rtl.css')); ?>">
    <?php endif; ?>

    <?php echo $__env->yieldContent('styles'); ?>

</head>
<body>
	<div class="wrapper">
		<div class="main-header " >
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="<?php echo e(route('back.dashboard')); ?>" class="logo">
					<img src="<?php echo e($setting->logo ? asset('assets/images/'.$setting->logo) : asset('assets/images/placeholder.png')); ?>" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize ">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item mr-4">
							<a class="btn btn-sm btn-primary py-1 text-white" title="website" href="<?php echo e(route('front.index')); ?>" target="_blank">
							<b> <?php echo e(__('View Website')); ?></b>
							</a>
						</li>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span  class="badge badge-danger badge-counter"><?php echo e(App\Models\Notification::countRegistration() + App\Models\Notification::countOrder()); ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" id="display-notf" data-href=<?php echo e(route('back.notifications')); ?>>
                                <?php echo $__env->make('back.notification.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </li>

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="<?php echo e(route('back.dashboard')); ?>" aria-expanded="false">
								<div class="avatar-sm avatar avatar-sm">
									<img src="<?php echo e(Auth::guard('admin')->user()->photo ? asset('assets/images/'.Auth::guard('admin')->user()->photo) : asset('assets/images/noimage.png')); ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="<?php echo e(Auth::guard('admin')->user()->photo ? asset('assets/images/'.Auth::guard('admin')->user()->photo) : asset('assets/images/noimage.png')); ?>" alt="image profile" class="avatar-img rounded"></div>

										<div class="u-text">
											<h4><?php echo e(Auth::guard('admin')->user()->name); ?></h4>
											<p class="text-muted"><?php echo e(Auth::guard('admin')->user()->email); ?></p><a href="<?php echo e(route('back.profile')); ?>" class="btn  btn-secondary btn-sm"><?php echo e(__('Update Profile')); ?></a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo e(route('back.profile')); ?>"><?php echo e(__('Update Profile')); ?></a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo e(route('back.password')); ?>"><?php echo e(__('Change Password')); ?></a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo e(route('back.logout')); ?>"><?php echo e(__('Logout')); ?></a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo e(Auth::guard('admin')->user()->photo ? asset('assets/images/'.Auth::guard('admin')->user()->photo) : asset('assets/images/noimage.png')); ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo e(Auth::guard('admin')->user()->name); ?>

									<span class="user-level"><?php echo e(__('Administrator')); ?></span>
								</span>
							</a>
						</div>
					</div>

					<?php if(Auth::guard('admin')->user()->id == 1): ?>
					<?php echo $__env->make('master.inc.super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php else: ?>
					<?php echo $__env->make('master.inc.normal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php endif; ?>

                    <div class="sidebar-footer text-primary d-block text-center pt-3">
                        <span class="d-inline-block"><b>Version 4.7</b></span>
                    </div>

				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
                    <?php echo $__env->yieldContent('content'); ?>
				</div>
			</div>
        </div>

    </div>
    <?php
        $mainbs = [];
        $mainbs['is_announcement'] = $setting->is_announcement;
        $mainbs['announcement_delay'] = $setting->announcement_delay;
        $mainbs['overlay'] = $setting->overlay;
        $mainbs = json_encode($mainbs);
    ?>

<script>
    var mainbs = <?php echo $mainbs; ?>;
</script>
	<!--   Core JS Files   -->
	<script src="<?php echo e(asset('assets/back/js/core/jquery.3.6.0.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/back/js/core/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/back/js/core/bootstrap.min.js')); ?>"></script>

	<!-- jQuery UI -->
	<script src="<?php echo e(asset('assets/back/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/back/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')); ?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo e(asset('assets/back/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>

	<!-- Moment JS -->
	<script src="<?php echo e(asset('assets/back/js/plugin/moment/moment.min.js')); ?>"></script>

	<!-- Datatables -->
	<script src="<?php echo e(asset('assets/back/js/plugin/datatables/datatables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/back/js/plugin/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php echo e(asset('assets/back/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>


	<!-- Bootstrap Notify -->
	<script src="<?php echo e(asset('assets/back/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>

	<!-- Chartjs -->
	<script src="<?php echo e(asset('assets/back/js/plugin/chart.min.js')); ?>"></script>

	<!-- Editor -->
	<script src="<?php echo e(asset('assets/back/js/plugin/editor.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/back/js/plugin/datepicker/bootstrap-datetimepicker.min.js')); ?>"></script>

    <!-- Tagify -->
    <script src="<?php echo e(asset('assets/back/js/tagify.js')); ?>"></script>

    <!-- JS Color -->
    <script src="<?php echo e(asset('assets/back/js/jscolor.js')); ?>"></script>

    <!-- Magnific Popup -->
    <script src="<?php echo e(asset('assets/back/js/jquery.magnific-popup.min.js')); ?>"></script>

    <!-- Sortable -->
    <script src="<?php echo e(asset('assets/back/js/sortable.js')); ?>"></script>

    <!-- Icon Picker -->
    <script src="<?php echo e(asset('assets/back/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script>

	<!-- Azzara JS -->
    <script src="<?php echo e(asset('assets/back/js/ready.min.js')); ?>"></script>

	<!-- Custom JS -->

    <?php echo $__env->yieldContent('scripts'); ?>
	<script src="<?php echo e(asset('assets/back/js/custom.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/master/back.blade.php ENDPATH**/ ?>