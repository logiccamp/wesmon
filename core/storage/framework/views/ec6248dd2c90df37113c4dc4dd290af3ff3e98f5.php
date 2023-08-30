<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
            <?php echo e($data->title); ?>

        </td>
        <td>
            <?php if($data->id != 1): ?>
            <?php echo e($data->price == 0  ? __('Free') : PriceHelper::adminCurrencyPrice($data->price)); ?>

            <?php else: ?>
            <?php echo e($data->id == 1 && $data->is_condition == 1 ? PriceHelper::adminCurrencyPrice($data->minimum_price). ' Up Condition' : 'Free'); ?>

            <?php endif; ?>
        </td>
        <td>

            <div class="dropdown">
                <button class="btn btn-<?php echo e($data->status == 1 ? 'success' : 'danger'); ?> btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo e($data->status == 1 ? __('Enabled') : __('Disabled')); ?>

                </button>
                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?php echo e(route('back.shipping.status',[$data->id,1])); ?>"><?php echo e(__('Enable')); ?></a>
                  <a class="dropdown-item" href="<?php echo e(route('back.shipping.status',[$data->id,0])); ?>"><?php echo e(__('Disable')); ?></a>
                </div>
              </div>

            </div>

        </td>
        <td>
            <div class="action-list">
                <a class="btn btn-secondary btn-sm "
                    href="<?php echo e(route('back.shipping.edit',[$data->id])); ?>">
                    <i class="fas fa-edit"></i>
                </a>
                <?php if($data->id != 1): ?>
                <a class="btn btn-danger btn-sm " data-toggle="modal"
                    data-target="#confirm-delete" href="javascript:;"
                    data-href="<?php echo e(route('back.shipping.destroy',[$data->id])); ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>  
                <?php endif; ?>
             
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/back/shipping/table.blade.php ENDPATH**/ ?>