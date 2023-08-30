<?php $__env->startSection('title'); ?>
    <?php echo e(__('Cart')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
<meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumbs">
                    <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                    <li class="separator"></li>
                    <li><?php echo e(__('Cart')); ?></li>
                  </ul>
            </div>
        </div>
    </div>
  </div>

  <?php if(Session::has('cart') && count(Session::get('cart')) > 0): ?>
  <div class="container padding-bottom-3x mb-1">

    <!-- Shopping Cart-->
    <div id="view_cart_load">
        <?php echo $__env->make('includes.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

</div>
  <?php else: ?>
  <div class="container padding-bottom-3x mb-1">
    <div class="card text-center">
      <div class="card-body padding-top-2x">
        <h3 class="card-title"><?php echo e(__('Your shopping cart is empty.')); ?></h3>
       <a class="btn btn-outline-primary m-4" href="<?php echo e(route('front.catalog')); ?>"><i class="icon-package pr-2"></i><?php echo e(__('View our products')); ?></a></div>
      </div>
    </div>
  <?php endif; ?>
  <!-- Page Content-->


<?php $__env->stopSection(); ?>


<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/front/catalog/cart.blade.php ENDPATH**/ ?>