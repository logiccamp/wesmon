<?php if(App\Models\Notification::count() > 0): ?>
    <h6 class="dropdown-header">
        <?php echo e(__('Notifications')); ?>

        <a class="text-dark float-right" id="clear-notf" data-href="<?php echo e(route('back.notifications.clear')); ?>" href="javascript:;">
            <small><?php echo e(__('Clear All')); ?></small>
        </a>
    </h6>

    <?php $__currentLoopData = App\Models\Notification::orderby('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($notf->user_id != null): ?>
            <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('back.user.show',$notf->user_id)); ?>">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                <i class="fas fa-user text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?php echo e($notf->created_at->diffForHumans()); ?></div>
                <?php echo e(__('A new user has registered.')); ?>

            </div>
            </a>
        <?php endif; ?>
        <?php if($notf->order_id != null): ?>
            <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('back.order.invoice',$notf->order_id)); ?>">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                <i class="fas fa-donate text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500"><?php echo e($notf->created_at->diffForHumans()); ?></div>
                <?php echo e(__('You have recieved a new order.')); ?>

            </div>
            </a>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(App\Models\Notification::count() > 0): ?>

        <a class="dropdown-header mt-1 d-block text-center"  href="<?php echo e(route('back.view.notification')); ?>"> <?php echo e(__('View All')); ?> </a>

    <?php endif; ?>
<?php else: ?>


<h6 class="dropdown-header">
    <?php echo e(__('Notifications')); ?>

</h6>
<a class="dropdown-item d-flex align-items-center" href="javascript:;">
    <div>
        <?php echo e(__('No Notifications')); ?>

    </div>
</a>
<?php endif; ?>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/back/notification/index.blade.php ENDPATH**/ ?>