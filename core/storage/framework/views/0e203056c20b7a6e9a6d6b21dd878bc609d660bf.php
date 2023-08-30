<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-0 bc-title"><b><?php echo e(__('Edit Currency')); ?></b> </h3>
            <a class="btn btn-primary btn-sm" href="<?php echo e(route('back.currency.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
            </div></div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body ">
					<!-- Nested Row within Card Body -->
					<div class="row justify-content-center">
						<div class="col-lg-12">
								<form class="admin-form" action="<?php echo e(route('back.currency.update',$currency->id)); ?>" method="POST"
									enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>
									<?php echo method_field('PUT'); ?>
									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

									<div class="form-group">
										<label for="name"><?php echo e(__('Currency Name')); ?> *</label>
										<input type="text" name="name" class="form-control" id="name"
											placeholder="<?php echo e(__('Currency Name')); ?>" value="<?php echo e($currency->name); ?>" >
									</div>

									<div class="form-group">
										<label for="sign"><?php echo e(__('Currency Sign')); ?> *</label>
										<input type="text" name="sign" class="form-control" id="sign"
											placeholder="<?php echo e(__('Currency Sign')); ?>" value="<?php echo e($currency->sign); ?>" >
									</div>

									<div class="form-group">
										<label for="value"><?php echo e(__('Currency Value')); ?> *</label>
										<input type="text" name="value" class="form-control" id="value"
											placeholder="<?php echo e(__('Currency Value')); ?>" value="<?php echo e($currency->value); ?>" >
									</div>

								<div class="form-group">
										<button type="submit"
											class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/currency/edit.blade.php ENDPATH**/ ?>