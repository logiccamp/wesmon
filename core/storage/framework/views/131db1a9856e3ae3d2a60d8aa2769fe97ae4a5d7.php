<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.permissions.templateTitle')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
    <i class="fa fa-folder fa-fw" aria-hidden="true"></i>
    <?php echo e(trans('installer_messages.permissions.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>

    <ul class="list">
        <?php $__currentLoopData = $permissions['permissions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list__item list__item--permissions <?php echo e($permission['isSet'] ? 'success' : 'error'); ?>">
            <?php if($permission['folder'] == 'storage/framework/'): ?>
            storage/framework/
            <?php elseif($permission['folder'] == 'storage/logs/'): ?>
            storage/logs/
            <?php elseif($permission['folder'] == 'bootstrap/cache/'): ?>
            bootstrap/cache/
            <?php elseif($permission['folder'] == '../assets/images/'): ?>
            assets/images/
            <?php elseif($permission['folder'] == '../assets/sitemaps/'): ?>
            assets/sitemaps/
            <?php elseif($permission['folder'] == '../assets/files/'): ?>
            assets/files/
            <?php elseif($permission['folder'] == 'resources/lang/'): ?>
            resources/lang/
            <?php endif; ?>
            <span>
                <i class="fa fa-fw fa-<?php echo e($permission['isSet'] ? 'check-circle-o' : 'exclamation-circle'); ?>"></i>
                <?php echo e($permission['permission']); ?>

            </span>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php if( ! isset($permissions['errors'])): ?>
        <div class="buttons">
            <a href="<?php echo e(route('LaravelInstaller::license')); ?>" class="button">
                Verify License
                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/vendor/installer/permissions.blade.php ENDPATH**/ ?>