

<?php $__env->startSection('content'); ?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="card mb-4">
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-0 bc-title"><b><?php echo e(__('Add Product')); ?></b> </h3>
        </div>
    </div>
</div>

<!-- Form -->
<?php if(session()->has('multipledomain')): ?>
<div class="alert alert-danger" style="background-color: #FFE4E4;" id="license_alert">
    <strong>One Purchase Code Use in multiple domain :</strong>
    <?php $__currentLoopData = session()->get('multipledomain'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p style="margin-bottom: 0px;color: #155724;"><?php echo e($item); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <hr>
    <strong>
        <?php echo e(__('Envato not allow to install script multiple domin using one purchase code. ')); ?>

        <br>
        <?php echo e(__('One purched codes for one Domin.
        Author can take action any time for that.')); ?>

        <br>
        <hr>
        <?php echo e(__('Author Contact : geniusdevs24@gmail.com')); ?>

    </strong>
</div>
<?php else: ?>
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <a href="<?php echo e(route('back.item.create')); ?>" class="card card-stats card-round">
                <div class="card-body">
                    <div class="text-center py-3">
                        <div class="d-inline-block">
                            <div class="icon-big text-center icon-primary bubble-shadow-small  px-3">
                                <i class="fab fa-product-hunt"></i>
                            </div>
                        </div>
                        <div class="d-block mt-3">
                            <div class="numbers">
                                <h2 class="card-title"><b><?php echo e(__('Add Physical Product')); ?></b></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-6">
            <a href="<?php echo e(route('back.digital.item.create')); ?>" class="card card-stats card-round">
                <div class="card-body">
                    <div class="text-center py-3">
                        <div class="d-inline-block">
                            <div class="icon-big text-center icon-info bubble-shadow-small  px-3">
                                <i class="fab fa-digital-ocean"></i>
                            </div>
                        </div>
                        <div class="d-block mt-3">
                            <div class="numbers">
                                <h2 class="card-title"><b><?php echo e(__('Add Digital Product')); ?></b></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-6">
            <a href="<?php echo e(route('back.license.item.create')); ?>" class="card card-stats card-round">
                <div class="card-body">
                    <div class="text-center py-3">
                        <div class="d-inline-block">
                            <div class="icon-big text-center icon-success bubble-shadow-small  px-3">
                                <i class="far fa-copyright"></i>
                            </div>
                        </div>
                        <div class="d-block mt-3">
                            <div class="numbers">
                                <h2 class="card-title"><b><?php echo e(__('Add Licence Product')); ?></b></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-6">
            <a href="<?php echo e(route('back.affiliate.create')); ?>" class="card card-stats card-round">
                <div class="card-body">
                    <div class="text-center py-3">
                        <div class="d-inline-block">
                            <div class="icon-big text-center icon-success bubble-shadow-small  px-3">
                                <i class="fab fa-affiliatetheme"></i>
                            </div>
                        </div>
                        <div class="d-block mt-3">
                            <div class="numbers">
                                <h2 class="card-title"><b><?php echo e(__('Add Affiliate Product')); ?></b></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/item/add.blade.php ENDPATH**/ ?>