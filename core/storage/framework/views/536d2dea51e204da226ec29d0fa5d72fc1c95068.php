<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="product-bulk-delete">
  <td><input type="checkbox" class="bulk-item" value="<?php echo e($data->id); ?>"></td>
    <td>
        <img src="<?php echo e($data->thumbnail ? asset('assets/images/'.$data->thumbnail) : asset('assets/images/placeholder.png')); ?>" alt="Image Not Found">
    </td>
    <td>
        <?php echo e($data->name); ?>

    </td>
    <td>
        <?php echo e(PriceHelper::adminCurrencyPrice($data->discount_price)); ?>

    </td>
    <td>
        <div class="dropdown">
            <button class="btn btn-<?php echo e($data->status == 1 ? 'success' : 'danger'); ?> btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e($data->status == 1 ? __('Publish') : __('Unpublish')); ?>

            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo e(route('back.item.status',[$data->id,1])); ?>"><?php echo e(__('Publish')); ?></a>
              <a class="dropdown-item" href="<?php echo e(route('back.item.status',[$data->id,0])); ?>"><?php echo e(__('Unpublish')); ?></a>
            </div>
          </div>
    </td>
    <td>
      <p class="
        <?php if($data->is_type == 'undefine'): ?>
        <?php else: ?>
            bg-info badge text-white
        <?php endif; ?>
      ">
        <?php if($data->is_type == 'undefine'): ?>
            <?php echo e(__('Not Define')); ?>

        <?php else: ?>
            <?php echo e($data->is_type ? ucfirst(str_replace('_',' ',$data->is_type)) : __('undefine')); ?>

        <?php endif; ?>
        </p>
    </td>
    <td>
      <?php echo e(ucfirst($data->item_type)); ?>

    </td>
    <td>
        <div class="dropdown">
            <button class="btn btn-secondary btn-sm  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e(__('Options')); ?>

            </button>
            <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
              <?php if($data->item_type == 'normal'): ?>
              <a class="dropdown-item" href="<?php echo e(route('back.item.edit',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Edit')); ?></a>
              <?php elseif($data->item_type =='digital'): ?>
              <a class="dropdown-item" href="<?php echo e(route('back.digital.item.edit',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Edit')); ?></a>
              <?php elseif($data->item_type =='affiliate'): ?>
              <a class="dropdown-item" href="<?php echo e(route('back.affiliate.edit',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Edit')); ?></a>
              <?php else: ?>
              <a class="dropdown-item" href="<?php echo e(route('back.license.item.edit',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Edit')); ?></a>
              <?php endif; ?>
                <?php if($data->status == 1): ?>
                <a class="dropdown-item" target="_blank" href="<?php echo e(route('front.product',$data->slug)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('View')); ?></a>
              <?php endif; ?>
              <?php if($data->item_type == 'normal'): ?>
              <a class="dropdown-item" href="<?php echo e(route('back.attribute.index',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Attributes')); ?></a>
              <a class="dropdown-item" href="<?php echo e(route('back.option.index',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Attribute Options')); ?></a>
              <?php endif; ?>
              <a class="dropdown-item" href="<?php echo e(route('back.item.highlight',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Highlight')); ?></a>
              <a class="dropdown-item" data-toggle="modal"
              data-target="#confirm-delete" href="javascript:;"
              data-href="<?php echo e(route('back.item.destroy',$data->id)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e(__('Delete')); ?></a>
            </div>
          </div>

        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/back/item/table.blade.php ENDPATH**/ ?>