<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td>
        <?php echo e($data->name); ?>

    </td>
    <td>
        <?php echo e($data->sign); ?>

    </td>
    <td>
        <?php echo e($data->value); ?>

    </td>
    <td>

        <div class="dropdown">
            <button class="btn btn-<?php echo e($data->is_default == 1 ? 'success' : 'dark'); ?> btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e($data->is_default == 1 ? __('Defualt') : __('Set Defualt')); ?>

            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo e(route('back.currency.status',[$data->id,1])); ?>"><?php echo e(__('Enable')); ?></a>
              <a class="dropdown-item" href="<?php echo e(route('back.currency.status',[$data->id,0])); ?>"><?php echo e(__('Disable')); ?></a>
            </div>
          </div>



    </td>
    <td>
        <div class="action-list">
            <a class="btn btn-secondary btn-sm "
                href="<?php echo e(route('back.currency.edit',$data->id)); ?>">
                <i class="fas fa-edit"></i>
            </a>
            <?php if($data->id != 1): ?>
                <a class="btn btn-danger btn-sm " data-toggle="modal"
                    data-target="#confirm-delete" href="javascript:;"
                    data-href="<?php echo e(route('back.currency.destroy',$data->id)); ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>
            <?php endif; ?>

        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/back/currency/table.blade.php ENDPATH**/ ?>