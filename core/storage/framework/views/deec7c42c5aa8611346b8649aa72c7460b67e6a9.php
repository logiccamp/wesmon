<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td>
        <?php echo e($data->name); ?>

    </td>
    <td>
        <img src="<?php echo e($data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.png')); ?>" alt="Image Not Found">
    </td>
    <td>
        <?php echo e($data->slug); ?>

    </td>
    <td>
        <div class="dropdown">
            <button class="btn btn-<?php echo e($data->status == 1 ? 'success' : 'danger'); ?> btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e($data->status == 1 ? __('Enabled') : __('Disabled')); ?>

            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo e(route('back.brand.status',[$data->id,1,'status'])); ?>"><?php echo e(__('Enable')); ?></a>
              <a class="dropdown-item" href="<?php echo e(route('back.brand.status',[$data->id,0,'status'])); ?>"><?php echo e(__('Disable')); ?></a>
            </div>
        </div>
    </td>
    <td>
        <div class="dropdown">
            <button class="btn btn-<?php echo e($data->is_popular == 1 ? 'success' : 'danger'); ?> btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e($data->is_popular == 1 ? __('Enabled') : __('Disabled')); ?>

            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo e(route('back.brand.status',[$data->id,1,'is_popular'])); ?>"><?php echo e(__('Enable')); ?></a>
              <a class="dropdown-item" href="<?php echo e(route('back.brand.status',[$data->id,0,'is_popular'])); ?>"><?php echo e(__('Disable')); ?></a>
            </div>
        </div>

    </td>
    <td>
        <div class="action-list">
            <a class="btn btn-secondary btn-sm "
                href="<?php echo e(route('back.brand.edit',$data->id)); ?>">
                <i class="fas fa-edit"></i>
            </a>
            <a class="btn btn-danger btn-sm " data-toggle="modal"
                data-target="#confirm-delete" href="javascript:;"
                data-href="<?php echo e(route('back.brand.destroy',$data->id)); ?>">
                <i class="fas fa-trash-alt"></i>
            </a>
        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/back/brand/table.blade.php ENDPATH**/ ?>