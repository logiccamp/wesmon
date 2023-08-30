
    <!-- Shop Toolbar-->
        <?php
        function renderStarRating($rating,$maxRating=5) {
            $fullStar = "<i class = 'far fa-star filled'></i>";
            $halfStar = "<i class = 'far fa-star-half filled'></i>";
            $emptyStar = "<i class = 'far fa-star'></i>";
            $rating = $rating <= $maxRating?$rating:$maxRating;

            $fullStarCount = (int)$rating;
            $halfStarCount = ceil($rating)-$fullStarCount;
            $emptyStarCount = $maxRating -$fullStarCount-$halfStarCount;

            $html = str_repeat($fullStar,$fullStarCount);
            $html .= str_repeat($halfStar,$halfStarCount);
            $html .= str_repeat($emptyStar,$emptyStarCount);
            $html = $html;
            return $html;
        }
        ?>

        <div class="row g-3" id="main_div">
            <?php if($items->count() > 0): ?>
                <?php if($checkType != 'list'): ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-3 col-md-4 col-6">
                        <div class="product-card ">
                            <?php if($item->is_stock()): ?>
                                <div class="product-badge
                                    <?php if($item->is_type == 'feature'): ?>
                                    bg-warning
                                    <?php elseif($item->is_type == 'new'): ?>
                                    bg-danger
                                    <?php elseif($item->is_type == 'top'): ?>
                                    bg-info
                                    <?php elseif($item->is_type == 'best'): ?>
                                    bg-dark
                                    <?php elseif($item->is_type == 'flash_deal'): ?>
                                    bg-success
                                    <?php endif; ?>
                                    "> <?php echo e($item->is_type != 'undefine' ?  (str_replace('_',' ',__("$item->is_type"))) : ''); ?>

                                </div>
                            <?php else: ?>
                            <div class="product-badge bg-secondary border-default text-body
                            "><?php echo e(__('out of stock')); ?></div>
                            <?php endif; ?>

                        <?php if($item->previous_price && $item->previous_price !=0): ?>
                        <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($item)); ?></div>
                        <?php endif; ?>
                        <div class="product-thumb">
                            <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" alt="Product">
                            <div class="product-button-group">
                                <a class="product-button wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                <a class="product-button product_compare" href="javascript:;" data-target="<?php echo e(route('fornt.compare.product',$item->id)); ?>" title="<?php echo e(__('Compare')); ?>"><i class="icon-repeat"></i></a>
                                <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="product-card-body">
                            <div class="product-category">
                                <a href="<?php echo e(route('front.catalog').'?category='.$item->category->slug); ?>"><?php echo e($item->category->name); ?></a>
                            </div>
                            <h3 class="product-title"><a href="<?php echo e(route('front.product',$item->slug)); ?>">
                                <?php echo e(strlen(strip_tags($item->name)) > $name_string_count ? substr(strip_tags($item->name), 0, 38) : strip_tags($item->name)); ?>

                            </a></h3>
                            <div class="rating-stars">
                                <?php echo renderStarRating($item->reviews->avg('rating')); ?>

                            </div>
                            <h4 class="product-price">
                                <?php if($item->previous_price !=0): ?>
                                <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del>
                                <?php endif; ?>
                                <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?>

                            </h4>
                        </div>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-12">
                            <div class="product-card product-list">
                                <div class="product-thumb" >
                                <?php if($item->is_stock()): ?>

                                    <div class="product-badge
                                        <?php if($item->is_type == 'feature'): ?>
                                        bg-warning
                                        <?php elseif($item->is_type == 'new'): ?>
                                        bg-danger
                                        <?php elseif($item->is_type == 'top'): ?>
                                        bg-info
                                        <?php elseif($item->is_type == 'best'): ?>
                                        bg-dark
                                        <?php elseif($item->is_type == 'flash_deal'): ?>
                                        bg-success
                                        <?php endif; ?>
                                        "><?php echo e($item->is_type != 'undefine' ?  ucfirst(str_replace('_',' ',$item->is_type)) : ''); ?>

                                    </div>
                                    <?php else: ?>
                                    <div class="product-badge bg-secondary border-default text-body
                                    "><?php echo e(__('out of stock')); ?></div>
                                    <?php endif; ?>
                                    <?php if($item->previous_price && $item->previous_price !=0): ?>
                                    <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($item)); ?></div>
                                    <?php endif; ?>

                                    <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" alt="Product">
                                    <div class="product-button-group">
                                        <a class="product-button wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                        <a data-target="<?php echo e(route('fornt.compare.product',$item->id)); ?>" class="product-button product_compare" href="javascript:;" title="<?php echo e(__('Compare')); ?>"><i class="icon-repeat"></i></a>
                                        <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                                    <div class="product-card-inner">
                                        <div class="product-card-body">
                                            <div class="product-category"><a href="<?php echo e(route('front.catalog').'?category='.$item->category->slug); ?>"><?php echo e($item->category->name); ?></a></div>
                                            <h3 class="product-title"><a href="<?php echo e(route('front.product',$item->slug)); ?>">
                                                <?php echo e(strlen(strip_tags($item->name)) > $name_string_count ? substr(strip_tags($item->name), 0, 52) .'...': strip_tags($item->name)); ?>

                                            </a></h3>
                                            <div class="rating-stars">
                                                <?php echo renderStarRating($item->reviews->avg('rating')); ?>

                                            </div>
                                            <h4 class="product-price">
                                                <?php if($item->previous_price !=0): ?>
                                                <del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del>
                                                <?php endif; ?>
                                                <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?>

                                            </h4>
                                            <p class="text-sm sort_details_show  text-muted hidden-xs-down my-1">
                                            <?php echo e(strlen(strip_tags($item->sort_details)) > 100 ? substr(strip_tags($item->sort_details), 0, 100) : strip_tags($item->sort_details)); ?>

                                            </p>
                                        </div>


                                    </div>
                                </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h4 class="h4 mb-0"><?php echo e(__('No Product Found')); ?></h4>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>


        <!-- Pagination-->
        <div class="row mt-15" id="item_pagination">
            <div class="col-lg-12 text-center">
                <?php echo e($items->links()); ?>

            </div>
        </div>

        <script type="text/javascript" src="<?php echo e(asset('assets/front/js/catalog.js')); ?>"></script>



<?php /**PATH C:\lara\www\emmerce\core\resources\views/front/catalog/catalog.blade.php ENDPATH**/ ?>