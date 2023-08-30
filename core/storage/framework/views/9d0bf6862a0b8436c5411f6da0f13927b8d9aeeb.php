<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
            <img src="<?php echo e($data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.png')); ?>" alt="Image Not Found">
        </td>
        <td>
            <?php echo e($data->title); ?>

        </td>

        <td>
            <div class="action-list">
                <a class="btn btn-secondary btn-sm "
                    href="<?php echo e(route('back.service.edit',$data->id)); ?>">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm " data-toggle="modal"
                    data-target="#confirm-delete" href="javascript:;"
                    data-href="<?php echo e(route('back.service.destroy',$data->id)); ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/back/service/table.blade.php ENDPATH**/ ?>