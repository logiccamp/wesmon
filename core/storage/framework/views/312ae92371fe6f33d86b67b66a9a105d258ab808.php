<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
            <?php echo e($data->title); ?>

        </td>
        <td>
            <?php echo e(strlen(strip_tags($data->details)) > 250 ? substr(strip_tags($data->details),0,250).'...' : strip_tags($data->details)); ?>

        </td>
        <td>

            <div class="dropdown">
                <button class="btn btn-success btn-sm btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo e($data->pos == 2 ? __('Both') : ( $data->pos == 0 ? __('Header') : __('Footer') )); ?>

                </button>
                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?php echo e(route('back.page.pos',[$data->id,2])); ?>"><?php echo e(__('Both')); ?></a>
                  <a class="dropdown-item" href="<?php echo e(route('back.page.pos',[$data->id,0])); ?>"><?php echo e(__('Header')); ?></a>
                  <a class="dropdown-item" href="<?php echo e(route('back.page.pos',[$data->id,1])); ?>"><?php echo e(__('Footer')); ?></a>
                </div>
              </div>

            </div>

        </td>
        <td>
            <div class="action-list">
                <a class="btn btn-secondary btn-sm btn-rounded"
                    href="<?php echo e(route('back.page.edit',[$data->id])); ?>">
                    <i class="fas fa-edit"></i> <?php echo e(__('Edit')); ?>

                </a>
                <a class="btn btn-danger btn-sm btn-rounded" data-toggle="modal"
                    data-target="#confirm-delete" href="javascript:;"
                    data-href="<?php echo e(route('back.page.destroy',[$data->id])); ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/back/page/table.blade.php ENDPATH**/ ?>