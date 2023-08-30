<?php
function renderStarRating($rating, $maxRating = 5)
{
    $fullStar = "<i class = 'far fa-star filled'></i>";
    $halfStar = "<i class = 'far fa-star-half filled'></i>";
    $emptyStar = "<i class = 'far fa-star'></i>";
    $rating = $rating <= $maxRating ? $rating : $maxRating;

    $fullStarCount = (int) $rating;
    $halfStarCount = ceil($rating) - $fullStarCount;
    $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

    $html = str_repeat($fullStar, $fullStarCount);
    $html .= str_repeat($halfStar, $halfStarCount);
    $html .= str_repeat($emptyStar, $emptyStarCount);
    $html = $html;
    return $html;
}
?>
<div class="features-slider  owl-carousel" >
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="slider-item">
            <div class="product-card ">
                <div class="product-thumb" >
                <?php if(!$item->is_stock()): ?>
                    <div class="product-badge bg-secondary border-default text-body
                    "><?php echo e(__('out of stock')); ?></div>
                <?php endif; ?>
                <?php if($item->previous_price && $item->previous_price !=0): ?>
                <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($item)); ?></div>
                <?php endif; ?>
                <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" alt="Product">
                <div class="product-button-group"><a class="product-button wishlist_store" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                    <a data-target="<?php echo e(route('fornt.compare.product',$item->id)); ?>" class="product-button product_compare" href="javascript:;" title="<?php echo e(__('Compare')); ?>"><i class="icon-repeat"></i></a>
                    <?php echo $__env->make('includes.item_footer',['sitem' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
                <div class="product-card-inner">
                <div class="product-card-body">
                    <div class="product-category"><a href="<?php echo e(route('front.catalog').'?category='.$item->category->slug); ?>"><?php echo e($item->category->name); ?></a></div>
                    <h3 class="product-title"><a href="<?php echo e(route('front.product',$item->slug)); ?>">
                        <?php echo e(strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name)); ?>

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
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<script type="text/javascript" src="<?php echo e(asset('assets/front/js/extraindex.js')); ?>"></script>
<?php /**PATH C:\lara\www\emmerce\core\resources\views/includes/type_product.blade.php ENDPATH**/ ?>