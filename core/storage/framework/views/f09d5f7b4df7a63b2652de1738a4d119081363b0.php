<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
<meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Brand')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e((route('front.index'))); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator">&nbsp;</li>
                    <li><?php echo e(__('Brand')); ?></li>
                  </ul>
            </div>
        </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container pt-0 pb-5">
    <div class="row g-3">
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4 col-6">
                <a class="b-p-s-b" href="<?php echo e(route('front.catalog') . '?brand=' . $brand->slug); ?>">
                    <img class="d-block hi-50"
                        src="<?php echo e(asset('assets/images/' . $brand->photo)); ?>"
                        alt="<?php echo e($brand->name); ?>" title="<?php echo e($brand->name); ?>">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/front/brand.blade.php ENDPATH**/ ?>