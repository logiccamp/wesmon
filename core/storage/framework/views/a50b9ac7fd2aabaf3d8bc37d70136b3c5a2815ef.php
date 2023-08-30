<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="d-sm-flex align-items-center justify-content-between">
        <h3 class="mb-0 bc-title"><b><?php echo e(__('Update Profile')); ?></b></h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('back.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo e(__('Update Profile')); ?></a></li>
        </ol>
        </div>
    </div>

	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body ">
					<!-- Nested Row within Card Body -->
					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="p-5">
								<form class="admin-form" action="<?php echo e(route('back.profile.update')); ?>" method="POST" enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

									<div class="form-group">
										<label for="name"><?php echo e(__('Current Image')); ?></label>
										<div class="col-lg-12 pb-1">
											<img class="admin-img"
												src="<?php echo e($data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.png')); ?>"
												alt="No Image Found">
										</div>
										<span><?php echo e(__('Image Size Should Be 40 x 40.')); ?></span>
									</div>

									<div class="form-group position-relative text-center">
										<label class="file">
											<input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file" aria-label="File browser example">
											<span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
										</label>
									</div>
									<div class="form-group">
										<label for="name"><?php echo e(__('User Name')); ?> *</label>
										<input type="text" name="name" class="form-control" id="name" placeholder="<?php echo e(__('User Name')); ?>"
											value="<?php echo e($data->name); ?>" >
									</div>


									<div class="form-group">
										<label for="email"><?php echo e(__('Email Address')); ?> *</label>
										<input type="email" name="email" class="form-control" id="email"
											placeholder="<?php echo e(__('Email Address')); ?>" value="<?php echo e($data->email); ?>" >
									</div>

									<div class="form-group">
										<label for="phone"><?php echo e(__('Phone Number')); ?> *</label>
										<input type="text" name="phone" class="form-control" id="phone"
											placeholder="<?php echo e(__('Phone Number')); ?>" value="<?php echo e($data->phone); ?>" >
									</div>


									<div class="form-group">
										<button type="submit" class="btn btn-secondary btn-block"><?php echo e(__('Submit')); ?></button>
									</div>


									<div>
								</form>



							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/dashboard/profile.blade.php ENDPATH**/ ?>