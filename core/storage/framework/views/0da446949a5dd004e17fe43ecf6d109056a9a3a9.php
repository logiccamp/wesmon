<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Shipping Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0 "><b><?php echo e(__('Update Shipping')); ?></b> </h3>

                <a class="btn btn-primary btn-sm" href="<?php echo e(route('back.shipping.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
                </div>
        </div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body ">
					<!-- Nested Row within Card Body -->
					<div class="row justify-content-center">
						<div class="col-lg-12">
								<form class="admin-form" action="<?php echo e(route('back.shipping.update',$shipping->id)); ?>"
									method="POST" enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>

                                    <?php echo method_field('PUT'); ?>

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

									<div class="form-group">
										<label for="title"><?php echo e(__('Title')); ?> *</label>
										<input type="text" name="title" class="form-control" id="title"
											placeholder="<?php echo e(__('Enter Title')); ?>" value="<?php echo e($shipping->title); ?>" >
									</div>

									<?php if($shipping->id ==1): ?>
									<div class="form-group">
                                        <label for="price"><?php echo e(__('Minimum Order Amount')); ?> *</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span
                                                    class="input-group-text"><?php echo e(PriceHelper::adminCurrency()); ?></span>
                                            </div>
                                            <input type="text" id="price"
                                                name="minimum_price" class="form-control"
                                                placeholder="<?php echo e(__('Enter Price')); ?>"
                                                value="<?php echo e(PriceHelper::setPrice($shipping->minimum_price)); ?>" >
                                        </div>
										<label for="is_condition" class="text-left">
											<input type="checkbox" name="is_condition" <?php echo e($shipping->is_condition == 1 ? 'checked' : ''); ?> class="my-2" id="is_condition">
										<?php echo e(__('Condition Free Shipping')); ?>

										</label>
                                    </div>
									<?php else: ?>
									<div class="form-group">
                                        <label for="price"><?php echo e(__('Shipping Cost')); ?> *</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span
                                                    class="input-group-text"><?php echo e(PriceHelper::adminCurrency()); ?></span>
                                            </div>
                                            <input type="text" id="price"
                                                name="price" class="form-control"
                                                placeholder="<?php echo e(__('Enter Price')); ?>"
                                                value="<?php echo e(PriceHelper::setPrice($shipping->price)); ?>" >
                                        </div>
                                    </div>
									<?php endif; ?>
                                  

								

									<div class="form-group">
										<button type="submit" class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
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

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/shipping/edit.blade.php ENDPATH**/ ?>