<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0 bc-title"> <b><?php echo e(__('Maintainance')); ?></b> </h3>
                </div>
        </div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body ">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-12">
							<div class="p-5">
								<div class="admin-form">

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="row justify-content-center">

                                        <div class="col-lg-8">

                                            <form action="<?php echo e(route('back.setting.update')); ?>" method="POST"
                                            enctype="multipart/form-data">

                                            <?php echo csrf_field(); ?>

                                                <div class="form-group">
                                                    <label class="switch-primary">
                                                      <input type="checkbox" class="switch switch-bootstrap status radio-check" name="is_maintainance" value="1" <?php echo e($setting->is_maintainance == 1 ? 'checked' : ''); ?>>
                                                      <span class="switch-body"></span>
                                                      <span class="switch-text"><?php echo e(__('Maintainance Mode')); ?></span>
                                                    </label>
                                                </div>

                                                <div class="image-show <?php echo e($setting->is_maintainance == 1 ? '' : 'd-none'); ?>">

                                                    <div class="form-group">
                                                        <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                        <div class="col-lg-12 pb-1">
                                                            <img class="admin-img lg"
                                                                src="<?php echo e($setting->maintainance_image ? asset('assets/images/'.$setting->maintainance_image) : asset('assets/images/placeholder.png')); ?>"
                                                                alt="No Image Found">
                                                        </div>
                                                        <span><?php echo e(__('Image Size Should Be 520 x 529.')); ?></span>
                                                    </div>

                                                    <div class="form-group position-relative text-center">
                                                        <label class="file">
                                                            <input type="file"  accept="image/*"  class="upload-photo" name="maintainance_image" id="file" aria-label="File browser example">
                                                            <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                        </label>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="maintainance_text"><?php echo e(__('Maintainance Mode Text')); ?> *</label>
                                                        <textarea name="maintainance_text" id="maintainance_text" class="form-control" rows="6" placeholder="<?php echo e(__('Maintainance Mode Text')); ?>"><?php echo e($setting->maintainance_text); ?></textarea>
                                                    </div>

                                                </div>



                                                <div>

                                                    <div class="form-group d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
                                                    </div>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/settings/maintainance.blade.php ENDPATH**/ ?>