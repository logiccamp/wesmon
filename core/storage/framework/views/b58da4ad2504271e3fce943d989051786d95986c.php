<?php $__env->startSection('content'); ?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="card mb-4">
    <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-0 bc-title"><b><?php echo e(__('Create Product')); ?></b> </h3>
            <a class="btn btn-primary   btn-sm" href="<?php echo e(route('back.item.index')); ?>"><i class="fas fa-chevron-left"></i> <?php echo e(__('Back')); ?></a>
        </div>
    </div>
</div>

<!-- Form -->


<div class="row">
    <div class="col-lg-12">
            <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<!-- Nested Row within Card Body -->
<form class="admin-form tab-form" action="<?php echo e(route('back.affiliate.store')); ?>" method="POST" enctype="multipart/form-data">
<input type="hidden" value="affiliate" name="item_type">
<?php echo csrf_field(); ?>
    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"><?php echo e(__('Name')); ?> *</label>
                        <input type="text" name="name" class="form-control item-name"
                            id="name" placeholder="<?php echo e(__('Enter Name')); ?>"
                            value="<?php echo e(old('name')); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="affiliate__link"><?php echo e(__('Affiliate Link')); ?> *</label>
                        <input type="text" name="affiliate_link" class="form-control"
                            id="affiliate__link" placeholder="<?php echo e(__('Enter Affiliate Link')); ?>"
                            value="<?php echo e(old('name')); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="slug"><?php echo e(__('Slug')); ?> *</label>
                        <input type="text" name="slug" class="form-control"
                            id="slug" placeholder="<?php echo e(__('Enter Slug')); ?>"
                            value="<?php echo e(old('slug')); ?>" >
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group pb-0  mb-0">
                        <label class="d-block"><?php echo e(__('Featured Image')); ?> *</label>
                    </div>
                    <div class="form-group pb-0 pt-0 mt-0 mb-0">
                    <img class="admin-img lg" src="" >
                    </div>
                    <div class="form-group position-relative ">
                        <label class="file">
                            <input type="file"  accept="image/*"   class="upload-photo" name="photo"
                                id="file"  aria-label="File browser example">
                            <span
                                class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                        </label>
                        <br>
                        <span class="mt-1 text-info"><?php echo e(__('Image Size Should Be 800 x 800. or square size')); ?></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group pb-0  mb-0">
                        <label><?php echo e(__('Gallery Images')); ?> </label>
                    </div>
                    <div class="form-group pb-0 pt-0 mt-0 mb-0">
                        <div id="gallery-images" class="">
                            <div class="d-block gallery_image_view">
                            </div>
                        </div>
                    </div>
                    <div class="form-group position-relative ">
                        <label class="file">
                            <input type="file"  accept="image/*"  name="galleries[]" id="gallery_file" aria-label="File browser example" accept="image/*" multiple>
                            <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                        </label>
                        <br>
                        <span class="mt-1 text-info"><?php echo e(__('Image Size Should Be 800 x 800. or square size')); ?></span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="sort_details"><?php echo e(__('Short Description')); ?> *</label>
                        <textarea name="sort_details" id="sort_details"
                            class="form-control"
                            placeholder="<?php echo e(__('Short Description')); ?>"
                            ><?php echo e(old('sort_details')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="details"><?php echo e(__('Description')); ?> *</label>
                        <textarea name="details" id="details"
                            class="form-control text-editor"
                            rows="6"
                            placeholder="<?php echo e(__('Enter Description')); ?>"
                            ><?php echo e(old('details')); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label for="tags"><?php echo e(__('Product Tags')); ?>

                            </label>
                        <input type="text" name="tags" class="tags"
                            id="tags"
                            placeholder="<?php echo e(__('Tags')); ?>"
                            value="">
                    </div>
                    <div class="form-group">
                        <label class="switch-primary">
                            <input type="checkbox" class="switch switch-bootstrap status radio-check" name="is_specification" value="1" checked>
                            <span class="switch-body"></span>
                            <span class="switch-text"><?php echo e(__('Specifications')); ?></span>
                        </label>
                    </div>
                    <div id="specifications-section">
                        <div class="d-flex">

                            <div class="flex-grow-1">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        name="specification_name[]"
                                        placeholder="<?php echo e(__('Specification Name')); ?>" value="">
                                    </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        name="specification_description[]"
                                        placeholder="<?php echo e(__('Specification description')); ?>" value="">
                                    </div>
                            </div>
                            <div class="flex-btn">
                                <button type="button" class="btn btn-success add-specification" data-text="<?php echo e(__('Specification Name')); ?>" data-text1="<?php echo e(__('Specification Description')); ?>"> <i class="fa fa-plus"></i> </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="meta_keywords"><?php echo e(__('Meta Keywords')); ?>

                            </label>
                        <input type="text" name="meta_keywords" class="tags"
                            id="meta_keywords"
                            placeholder="<?php echo e(__('Enter Meta Keywords')); ?>"
                            value="">
                    </div>

                    <div class="form-group">
                        <label
                            for="meta_description"><?php echo e(__('Meta Description')); ?>

                            </label>
                        <textarea name="meta_description" id="meta_description"
                            class="form-control" rows="5"
                            placeholder="<?php echo e(__('Enter Meta Description')); ?>"
                        ><?php echo e(old('meta_description')); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-secondary mr-2"><?php echo e(__('Save')); ?></button>
                    <button type="submit" class="btn btn-info "><?php echo e(__('Save & Edit')); ?></button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="discount_price"><?php echo e(__('Current Price')); ?>

                            *</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"><?php echo e(PriceHelper::adminCurrency()); ?></span>
                            </div>
                            <input type="text" id="discount_price"
                                name="discount_price" class="form-control"
                                placeholder="<?php echo e(__('Enter Current Price')); ?>"
                                min="1" step="0.1"
                                value="<?php echo e(old('discount_price')); ?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="previous_price"><?php echo e(__('Previous Price')); ?>

                            </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"><?php echo e($curr->sign); ?></span>
                            </div>
                            <input type="text" id="previous_price"
                                name="previous_price" class="form-control"
                                placeholder="<?php echo e(__('Enter Previous Price')); ?>"
                                min="1" step="0.1"
                                value="<?php echo e(old('previous_price')); ?>" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="category_id"><?php echo e(__('Select Category')); ?> *</label>
                        <select name="category_id" id="category_id" data-href="<?php echo e(route('back.get.subcategory')); ?>" class="form-control" >
                            <option value="" selected><?php echo e(__('Select One')); ?></option>
                            <?php $__currentLoopData = DB::table('categories')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="subcategory_id"><?php echo e(__('Select Sub Category')); ?> </label>
                        <select name="subcategory_id" id="subcategory_id" data-href="<?php echo e(route('back.get.childcategory')); ?>" class="form-control">
                            <option value=""><?php echo e(__('Select One')); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="childcategory_id"><?php echo e(__('Select Child Category')); ?> </label>
                        <select name="childcategory_id" id="childcategory_id" class="form-control">
                            <option value=""><?php echo e(__('Select One')); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="brand_id"><?php echo e(__('Select Brand')); ?> </label>
                        <select name="brand_id" id="brand_id" class="form-control" >
                            <option value="" selected><?php echo e(__('Select Brand')); ?></option>
                            <?php $__currentLoopData = DB::table('brands')->whereStatus(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="sku" class="form-control"
                            id="sku" placeholder="<?php echo e(__('Enter SKU')); ?>"
                            value="<?php echo e(Str::random(10)); ?>" >
                    </div>
                    <div class="form-group">
                        <label for="video"><?php echo e(__('Video Link')); ?> </label>
                        <input type="text" name="video" class="form-control"
                            id="video" placeholder="<?php echo e(__('Enter Video Link')); ?>"
                            value="<?php echo e(old('video')); ?>">
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>


</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/item/affiliate/create.blade.php ENDPATH**/ ?>