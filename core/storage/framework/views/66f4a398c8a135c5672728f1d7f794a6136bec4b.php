<?php $__env->startSection('title'); ?>
    <?php echo e(__('Campaign Product')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($setting->meta_keywords); ?>">
<meta name="description" content="<?php echo e($setting->meta_description); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-title">
    <div class="container">
      <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
                <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a>
                </li>
                <li class="separator"></li>
                <li><a href="<?php echo e(route('front.campaign')); ?>"><?php echo e(__('Campaign Products')); ?></a>
                </li>
              </ul>
          </div>
      </div>
    </div>
  </div>
  <!-- Page Content-->

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
    <div class="deal-of-day-section pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 class="h3"><?php echo e($setting->campaign_title); ?></h2>
                        <div class="right-area">
                                <div class="countdown countdown-alt" data-date-time="<?php echo e($setting->campaign_end_date); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <?php $__currentLoopData = $campaign_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compaign_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-gd">
                <div class="product-card">
                    <div class="product-thumb">
                        <?php if($compaign_item->item->is_stock()): ?>
                            <div class="product-badge
                            <?php if($compaign_item->item->is_type == 'feature'): ?>
                            bg-warning
                            <?php elseif($compaign_item->item->is_type == 'new'): ?>

                            <?php elseif($compaign_item->item->is_type == 'top'): ?>
                            bg-info
                            <?php elseif($compaign_item->item->is_type == 'best'): ?>
                            bg-dark
                            <?php elseif($compaign_item->item->is_type == 'flash_deal'): ?>
                            bg-success
                            <?php endif; ?>
                            ">
                            <?php echo e(ucfirst(str_replace('_',' ',$compaign_item->item->is_type))); ?>

                            </div>

                            <?php else: ?>
                            <div class="product-badge bg-secondary border-default text-body
                            "><?php echo e(__('out of stock')); ?></div>
                            <?php endif; ?>

                            <?php if($compaign_item->previous_price && $compaign_item->previous_price !=0): ?>
                            <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($compaign_item->item)); ?></div>
                            <?php endif; ?>

                        <img src="<?php echo e(asset('assets/images/'.$compaign_item->item->thumbnail)); ?>" alt="Product">
                        <div class="product-button-group">
                            <a class="product-button wishlist_store" href="<?php echo e(route('user.wishlist.store',$compaign_item->item->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                            <a data-target="<?php echo e(route('fornt.compare.product',$compaign_item->item->id)); ?>" class="product-button product_compare" href="javascript:;" title="<?php echo e(__('Compare')); ?>"><i class="icon-repeat"></i></a>
                            <?php echo $__env->make('includes.item_footer',['sitem' => $compaign_item->item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="product-card-body">

                        <div class="product-category"><a href="<?php echo e(route('front.catalog').'?category='.$compaign_item->item->category->slug); ?>"><?php echo e($compaign_item->item->category->name); ?></a></div>
                        <h3 class="product-title"><a href="<?php echo e(route('front.product',$compaign_item->item->slug)); ?>">
                            <?php echo e(strlen(strip_tags($compaign_item->item->name)) > 35 ? substr(strip_tags($compaign_item->item->name), 0, 35) : strip_tags($compaign_item->item->name)); ?>

                        </a></h3>
                        <div class="rating-stars">
                            <?php echo renderStarRating($compaign_item->item->reviews->avg('rating')); ?>

                        </div>
                        <h4 class="product-price">
                        <?php if($compaign_item->item->previous_price != 0): ?>
                        <del><?php echo e(PriceHelper::setPreviousPrice($compaign_item->item->previous_price)); ?></del>
                        <?php endif; ?>
                        <?php echo e(PriceHelper::grandCurrencyPrice($compaign_item->item)); ?>

                        </h4>

                    </div>

                </div>
            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/front/campaign.blade.php ENDPATH**/ ?>