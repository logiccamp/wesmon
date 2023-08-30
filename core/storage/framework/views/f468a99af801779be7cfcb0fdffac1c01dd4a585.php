<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
<meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Title-->
<div class="page-title">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a> </li>
                <li class="separator"></li>
                <li><?php echo e(__('Shop')); ?></li>
              </ul>
          </div>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-top-filter-wrapper">
                    <div class="row">
                        <div class="col-md-10 gd-text-sm-center">
                            <div class="sptfl">
                                <div class="quickFilter">
                                    <h4 class="quickFilter-title"><i class="fas fa-filter"></i><?php echo e(__('Quick filter')); ?></h4>
                                    <ul id="quick_filter">
                                        <li><a datahref=""><i class="icon-chevron-right pr-2"></i><?php echo e(__('All products')); ?> </a></li>
                                        <li class=""><a href="javascript:;" data-href="feature"><i class="icon-chevron-right pr-2"></i><?php echo e(__('Featured products')); ?> </a></li>
                                        <li class=""><a href="javascript:;" data-href="best"><i class="icon-chevron-right pr-2"></i><?php echo e(__('Best sellers')); ?> </a></li>
                                        <li class=""><a href="javascript:;" data-href="top"><i class="icon-chevron-right pr-2"></i><?php echo e(__('Top rated')); ?> </a></li>
                                        <li class=""><a href="javascript:;" data-href="new"><i class="icon-chevron-right pr-2"></i><?php echo e(__('New Arrival')); ?> </a></li>
                                    </ul>
                                </div>
                                <div class="shop-sorting">
                                    <label for="sorting"><?php echo e(__('Sort by')); ?>:</label>
                                    <select class="form-control" id="sorting">
                                    <option value=""><?php echo e(__('All Products')); ?></option>
                                    <option value="low_to_high" <?php echo e(request()->input('low_to_high') ? 'selected' : ''); ?>><?php echo e(__('Low - High Price')); ?></option>
                                    <option value="high_to_low" <?php echo e(request()->input('high_to_low') ? 'selected' : ''); ?>><?php echo e(__('High - Low Price')); ?></option>
                                    </select><span class="text-muted"><?php echo e(__('Showing')); ?>:</span><span>1 - <?php echo e($setting->view_product); ?> <?php echo e(__('items')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 gd-text-sm-center">
                            <div class="shop-view"><a class="list-view <?php echo e(Session::has('view_catalog') && Session::get('view_catalog') == 'grid' ? 'active' : ''); ?> " data-step="grid" href="javascript:;" data-href="<?php echo e(route('front.catalog').'?view_check=grid'); ?>"><i class="fas fa-th-large"></i></a>
                                <a class="list-view <?php echo e(Session::has('view_catalog') && Session::get('view_catalog') == 'list' ? 'active' : ''); ?>" href="javascript:;" data-step="list" data-href="<?php echo e(route('front.catalog').'?view_check=list'); ?>"><i class="fas fa-list"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3">

          <div class="col-lg-9 order-lg-2" id="list_view_ajax">
            <?php echo $__env->make('front.catalog.catalog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>

          <!-- Sidebar          -->
          <div class="col-lg-3 order-lg-1">
            <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
            <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
              <!-- Widget Categories-->
              <section class="widget widget-categories card rounded p-4">
                <h3 class="widget-title"><?php echo e(__('Shop Categories')); ?></h3>
                <ul id="category_list" class="category-scroll">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="has-children  <?php echo e(isset($category) && $category->id == $getcategory->id ? 'expanded active' : ''); ?> ">
                      <a class="category_search" href="javascript:;"  data-href="<?php echo e($getcategory->slug); ?>"><?php echo e($getcategory->name); ?></a>

                        <ul id="subcategory_list">
                            <?php $__currentLoopData = $getcategory->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e(isset($subcategory) && $subcategory->id == $getsubcategory->id ? 'active' : ''); ?>">
                              <a class="subcategory" href="javascript:;" data-href="<?php echo e($getsubcategory->slug); ?>"><?php echo e($getsubcategory->name); ?></a>

                              <ul id="childcategory_list">
                                <?php $__currentLoopData = $getsubcategory->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getchildcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php echo e(isset($childcategory) && $getchildcategory->id == $getchildcategory->id ? 'active' : ''); ?>">
                                  <a class="childcategory" href="javascript:;" data-href="<?php echo e($getchildcategory->slug); ?>"><?php echo e($getchildcategory->name); ?></a>

                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                      </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </section>

              <?php if($setting->is_range_search == 1): ?>
                   <!-- Widget Price Range-->
              <section class="widget widget-categories card rounded p-4">
                <h3 class="widget-title"><?php echo e(__('Filter by Price')); ?></h3>
                <form class="price-range-slider" method="post" data-start-min="<?php echo e(request()->input('minPrice') ? request()->input('minPrice') : '0'); ?>" data-start-max="<?php echo e(request()->input('maxPrice') ? request()->input('maxPrice') : $setting->max_price); ?>" data-min="0" data-max="<?php echo e($setting->max_price); ?>" data-step="5">
                  <div class="ui-range-slider"></div>
                  <footer class="ui-range-slider-footer">
                    <div class="column">
                      <button class="btn btn-primary btn-sm" id="price_filter" type="button"><span><?php echo e(__('Filter')); ?></span></button>
                    </div>
                    <div class="column">
                      <div class="ui-range-values">
                        <div class="ui-range-value-min"><?php echo e(PriceHelper::setCurrencySign()); ?><span class="min_price"></span>
                          <input type="hidden">
                        </div>-
                        <div class="ui-range-value-max"><?php echo e(PriceHelper::setCurrencySign()); ?><span class="max_price"></span>
                          <input type="hidden">
                        </div>
                      </div>
                    </div>
                  </footer>
                </form>
              </section>
              <?php endif; ?>

              <?php if($setting->is_attribute_search == 1): ?>
              <?php $__currentLoopData = $attrubutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrubute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              <section class="widget widget-categories card rounded p-4">
                <h3 class="widget-title"><?php echo e(__('Filter by')); ?> <?php echo e($attrubute->name); ?></h3>
                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($attrubute->keyword == $option->attribute->keyword): ?>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input option" <?php echo e(isset($subcategory) && $subcategory->id == $option->id ? 'checked' : ''); ?>   type="checkbox" value="<?php echo e($option->name); ?>" id="<?php echo e($attrubute->id); ?><?php echo e($option->name); ?>">
                  <label class="custom-control-label" for="<?php echo e($attrubute->id); ?><?php echo e($option->name); ?>"><?php echo e($option->name); ?><span class="text-muted"></span></label>
              </div>  
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </section>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

              <!-- Widget Brand Filter-->
              <section class="widget widget-categories card rounded p-4">
                <h3 class="widget-title"><?php echo e(__('Filter by Brand')); ?></h3>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input brand-select" type="checkbox" value="" id="all-brand">
                  <label class="custom-control-label" for="all-brand"><?php echo e(__('All Brands')); ?></label>
                </div>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getbrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input brand-select" <?php echo e(isset($brand) && $brand->id == $getbrand->id ? 'checked' : ''); ?> type="checkbox" value="<?php echo e($getbrand->slug); ?>" id="<?php echo e($getbrand->slug); ?>">
                    <label class="custom-control-label" for="<?php echo e($getbrand->slug); ?>"><?php echo e($getbrand->name); ?></label>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </section>


            </aside>
          </div>
        </div>
      </div>



      <form id="search_form" class="d-none" action="<?php echo e(route('front.catalog')); ?>" method="GET">

        <input type="text" name="maxPrice" id="maxPrice" value="<?php echo e(request()->input('maxPrice') ? request()->input('maxPrice') : ''); ?>">
        <input type="text" name="minPrice" id="minPrice" value="<?php echo e(request()->input('minPrice') ? request()->input('minPrice') : ''); ?>">
        <input type="text" name="brand" id="brand" value="<?php echo e(isset($brand) ? $brand->slug : ''); ?>">
        <input type="text" name="brand" id="brand" value="<?php echo e(isset($brand) ? $brand->slug : ''); ?>">
        <input type="text" name="category" id="category" value="<?php echo e(isset($category) ? $category->slug : ''); ?>">
        <input type="text" name="quick_filter" id="quick_filter" value="">
        <input type="text" name="childcategory" id="childcategory" value="<?php echo e(isset($childcategory) ? $childcategory->slug : ''); ?>">
        <input type="text" name="page" id="page" value="<?php echo e(isset($page) ? $page : ''); ?>">
        <input type="text" name="attribute" id="attribute" value="<?php echo e(isset($attribute) ? $attribute : ''); ?>">
        <input type="text" name="option" id="option" value="<?php echo e(isset($option) ? $option : ''); ?>">
        <input type="text" name="subcategory" id="subcategory" value="<?php echo e(isset($subcategory) ? $subcategory->slug : ''); ?>">
        <input type="text" name="sorting" id="sorting" value="<?php echo e(isset($sorting) ? $sorting : ''); ?>">
        <input type="text" name="view_check" id="view_check" value="<?php echo e(isset($view_check) ? $view_check : ''); ?>">


        <button type="submit" id="search_button" class="d-none"></button>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/front/catalog/index.blade.php ENDPATH**/ ?>