<?php $__env->startSection('content'); ?>



<!-- Start of Main Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b><?php echo e(__('All Products')); ?></b></h3>
                    <div class="right">
                        <a href="<?php echo e(route('back.csv.export')); ?>" class="btn btn-info btn-sm d-inline-block"><?php echo e(__('CSV Export')); ?></a>
                        <form class="d-inline-block" action="<?php echo e(route('back.bulk.delete')); ?>" method="get">
                            <input type="hidden" value="" name="ids[]" id="bulk_delete">
                            <input type="hidden" value="items" name="table">
                            <button class="btn btn-danger btn-sm"><?php echo e(__('Bulk Delete')); ?></button>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <input type="hidden" id="product_url" value="<?php echo e(route('back.item.index')); ?>">

	<!-- DataTales -->
	<div class="card shadow mb-4">
		<div class="card-body">
            <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="<?php echo e(route('back.item.index')); ?>" method="GET">
                <div class="product-filter-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mb-2"><b><?php echo e(__('Product Filter :')); ?></b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6" >
                            <div class="form-group px-0">
                                <select class="form-control" name="item_type">
                                    <option value=""><?php echo e(__('All Product')); ?></option>
                                    <option value="normal" <?php echo e(request()->input('item_type') == 'normal' ? 'selected' : ''); ?>><?php echo e(__('Physical Product')); ?></option>
                                    <option value="digital" <?php echo e(request()->input('item_type') == 'digital' ? 'selected' : ''); ?>><?php echo e(__('Digital Product')); ?></option>
                                    <option value="license" <?php echo e(request()->input('item_type') == 'license' ? 'selected' : ''); ?>><?php echo e(__('Licence Product')); ?></option>
                                    <option value="affiliate" <?php echo e(request()->input('item_type') == 'affiliate' ? 'selected' : ''); ?>><?php echo e(__('Affiliat Product')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6" >
                            <div class="form-group px-0">
                                <select class="form-control" name="is_type">
                                    <option  disabled><?php echo e(__('Select Type')); ?></option>
                                    <option value=""><?php echo e(__('All Type')); ?></option>
                                    <option value="undefine" <?php echo e(request()->input('is_type') == 'undefine' ? 'selected' : ''); ?>><?php echo e(__('Undefine Product')); ?></option>
                                    <option value="new" <?php echo e(request()->input('is_type') == 'new' ? 'selected' : ''); ?>><?php echo e(__('New Arrival')); ?></option>
                                    <option value="flash_deal" <?php echo e(request()->input('is_type') == 'flash_deal' ? 'selected' : ''); ?>><?php echo e(__('Flash Deal Product')); ?></option>
                                    <option value="feature" <?php echo e(request()->input('is_type') == 'feature' ? 'selected' : ''); ?>> <?php echo e(__('Featured Product')); ?></option>
                                    <option value="best" <?php echo e(request()->input('is_type') == 'best' ? 'selected' : ''); ?>><?php echo e(__('Best Product')); ?></option>
                                    <option value="top" <?php echo e(request()->input('is_type') == 'top' ? 'selected' : ''); ?>><?php echo e(__('Top Product')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6" >
                            <div class="form-group px-0">
                                <select class="form-control" name="category_id">
                                    <option disabled><?php echo e(__('Select Category')); ?></option>
                                    <option value=""><?php echo e(__('All Category')); ?></option>
                                    <?php $__currentLoopData = DB::table('categories')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>" <?php echo e(request()->input('category_id') == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6" >
                            <div class="form-group px-0">
                                <select class="form-control" name="orderby">
                                    <option disabled><?php echo e(__('Select Order')); ?></option>
                                    <option value="asc" <?php echo e(request()->input('orderby') == 'asc' ? 'selected' : ''); ?>><?php echo e(__('Ascending order')); ?></option>
                                    <option value="desc" <?php echo e(request()->input('orderby') == 'desc' ? 'selected' : ''); ?>><?php echo e(__('Descending order')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <button type="submit" class="btn btn-primary  py-2  d-inline-block"><?php echo e(__('Filter Product')); ?></button>
                        </div>
                    </div>
                </div>
            </form>



            <br>
			<div class="gd-responsive-table">
				<table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">

					<thead>
						<tr>
							<th> <input type="checkbox" data-target="product-bulk-delete" class="form-control bulk_all_delete"> </th>
							<th><?php echo e(__('Image')); ?></th>
                            <th width="30%"><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Price')); ?></th>
							<th><?php echo e(__('Status')); ?></th>
							<th><?php echo e(__('Type')); ?></th>
							<th><?php echo e(__('Item Type')); ?></th>
							<th><?php echo e(__('Actions')); ?></th>
						</tr>
					</thead>

					<tbody>
                        <?php echo $__env->make('back.item.table',compact('datas'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>

</div>

</div>
<!-- End of Main Content -->



  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

		<!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Confirm Delete?')); ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
		</div>

		<!-- Modal Body -->
        <div class="modal-body">
			<?php echo e(__('You are going to delete this item. All contents related with this item will be lost.')); ?> <?php echo e(__('Do you want to delete it?')); ?>

		</div>

		<!-- Modal footer -->
        <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
			<form action="" class="d-inline btn-ok" method="POST">

                <?php echo csrf_field(); ?>

                <?php echo method_field('DELETE'); ?>

                <button type="submit" class="btn btn-danger"><?php echo e(__('Delete')); ?></button>

			</form>
		</div>

      </div>
    </div>
  </div>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/item/index.blade.php ENDPATH**/ ?>