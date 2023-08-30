<?php $__env->startSection('title'); ?>
 <?php echo e($item->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
<meta name="keywords" content="<?php echo e($item->meta_keywords); ?>">
<meta name="description" content="<?php echo e($item->meta_description); ?>">
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
                <li><a href="<?php echo e(route('front.catalog')); ?>"><?php echo e(__('Shop')); ?></a>
                </li>
                <li class="separator"></li>
                <li><?php echo e($item->name); ?></li>
              </ul>
          </div>
      </div>
    </div>
</div>
  <!-- Page Content-->
<div class="container padding-bottom-1x mb-1">
    <div class="row">
      <!-- Poduct Gallery-->
      <div class="col-xxl-5 col-lg-6 col-md-6">
        <div class="product-gallery">
            <?php if($item->video): ?>
            <div class="gallery-wrapper">
                <div class="gallery-item video-btn text-center">
                    <a href="<?php echo e($item->video); ?>" title="Watch video"></a>
                </div>
            </div>
          <?php endif; ?>
          <?php if($item->is_stock()): ?>
          <span class="product-badge
          <?php if($item->is_type == 'feature'): ?>
          bg-warning
          <?php elseif($item->is_type == 'new'): ?>
          bg-success
          <?php elseif($item->is_type == 'top'): ?>
          bg-info
          <?php elseif($item->is_type == 'best'): ?>
          bg-dark
          <?php elseif($item->is_type == 'flash_deal'): ?>
            bg-success
          <?php endif; ?>
          "><?php echo e($item->is_type != 'undefine' ?  ucfirst(str_replace('_',' ',$item->is_type)) : ''); ?></span>

          <?php else: ?>
          <span class="product-badge bg-secondary border-default text-body
          "><?php echo e(__('out of stock')); ?></span>
          <?php endif; ?>

          <?php if($item->previous_price && $item->previous_price !=0): ?>
          <div class="product-badge bg-goldenrod  ppp-t"> -<?php echo e(PriceHelper::DiscountPercentage($item)); ?></div>
          <?php endif; ?>

          <div class="product-thumbnails insize">
            <div class="product-details-slider owl-carousel" >
            <div class="item"><img src="<?php echo e(asset('assets/images/'.$item->photo)); ?>" alt="zoom"  /></div>
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item"><img src="<?php echo e(asset('assets/images/'.$gallery->photo)); ?>" alt="zoom"  /></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
        </div>
      </div>

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
        <!-- Product Info-->
        <div class="col-xxl-7 col-lg-6 col-md-6">
            <div class="details-page-top-right-content d-flex align-items-center">
                <div class="div w-100">
                    <input type="hidden" id="item_id" value="<?php echo e($item->id); ?>">
                    <input type="hidden" id="demo_price" value="<?php echo e(PriceHelper::setConvertPrice($item->discount_price)); ?>">
                    <input type="hidden" value="<?php echo e(PriceHelper::setCurrencySign()); ?>" id="set_currency">
                    <input type="hidden" value="<?php echo e(PriceHelper::setCurrencyValue()); ?>" id="set_currency_val">
                    <input type="hidden" value="<?php echo e($setting->currency_direction); ?>" id="currency_direction">
                    <h4 class="mb-2 p-title-main"><?php echo e($item->name); ?></h4>
                    <div class="mb-3">
                        <div class="rating-stars d-inline-block gmr-3">
                        <?php echo renderStarRating($item->reviews->avg('rating')); ?>

                        </div>
                        <?php if($item->is_stock()): ?>
                            <span class="text-success  d-inline-block"><?php echo e(__('In Stock')); ?></span>
                        <?php else: ?>
                            <span class="text-danger  d-inline-block"><?php echo e(__('Out of stock')); ?></span>
                        <?php endif; ?>
                    </div>


                    <?php if($item->is_type == 'flash_deal'): ?>
                    <?php if(date('d-m-y') != \Carbon\Carbon::parse($item->date)->format('d-m-y')): ?>
                    <div class="countdown countdown-alt mb-3" data-date-time="<?php echo e($item->date); ?>">
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>

                    <span class="h3 d-block price-area">
                    <?php if($item->previous_price != 0): ?>
                        <small class="d-inline-block"><del><?php echo e(PriceHelper::setPreviousPrice($item->previous_price)); ?></del></small>
                    <?php endif; ?>
                    <span id="main_price" class="main-price"><?php echo e(PriceHelper::grandCurrencyPrice($item)); ?></span>
                    </span>

                    <p class="text-muted"><?php echo e($item->sort_details); ?> <a href="#details" class="scroll-to"><?php echo e(__('Read more')); ?></a></p>

                    <div class="row margin-top-1x">
                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($attribute->options->count() != 0): ?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="<?php echo e($attribute->name); ?>"><?php echo e($attribute->name); ?></label>
                                <select class="form-control attribute_option" id="<?php echo e($attribute->name); ?>">
                                    <?php $__currentLoopData = $attribute->options->where('stock','!=','0'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($option->name); ?>" data-type="<?php echo e($attribute->id); ?>" data-href="<?php echo e($option->id); ?>" data-target="<?php echo e(PriceHelper::setConvertPrice($option->price)); ?>"><?php echo e($option->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row align-items-end pb-4">
                        <div class="col-sm-12">
                            <?php if($item->item_type == 'normal'): ?>
                            <div class="qtySelector product-quantity">
                              <span class="decreaseQty subclick"><i class="fas fa-minus "></i></span>
                              <input type="text" class="qtyValue cart-amount" value="1">
                              <span class="increaseQty addclick"><i class="fas fa-plus"></i></span>
                                <input type="hidden" value="3333" id="current_stock">
                            </div>
                            <?php endif; ?>
                            <div class="p-action-button">
                              <?php if($item->item_type != 'affiliate'): ?>
                                <?php if($item->is_stock()): ?>
                                <button class="btn btn-primary m-0 a-t-c-mr" id="add_to_cart"><i class="icon-bag"></i><span><?php echo e(__('Add to Cart')); ?></span></button>
                                <button class="btn btn-primary m-0" id="but_to_cart"><i class="icon-bag"></i><span><?php echo e(__('Buy Now')); ?></span></button>
                                <?php else: ?>
                                    <button class="btn btn-primary m-0"><i class="icon-bag"></i><span><?php echo e(__('Out of stock')); ?></span></button>
                                <?php endif; ?>
                              <?php else: ?>
                              <a href="<?php echo e($item->affiliate_link); ?>" target="_blank" class="btn btn-primary m-0"><span><i class="icon-bag"></i><?php echo e(__('Buy Now')); ?></span></a>
                              <?php endif; ?>

                            </div>

                        </div>
                    </div>

                    <div class="div">
                        <div class="t-c-b-area">
                            <?php if($item->brand_id): ?>
                            <div class="pt-1 mb-1"><span class="text-medium"><?php echo e(__('Brand')); ?>:</span>
                                    <a href="<?php echo e(route('front.catalog').'?brand='.$item->brand->slug); ?>"><?php echo e($item->brand->name); ?></a>
                                </div>
                            <?php endif; ?>

                                <div class="pt-1 mb-1"><span class="text-medium"><?php echo e(__('Categories')); ?>:</span>
                                    <a href="<?php echo e(route('front.catalog').'?category='.$item->category->slug); ?>"><?php echo e($item->category->name); ?></a>
                                        <?php if($item->subcategory->name): ?>
                                        /
                                        <?php endif; ?>
                                    <a href="<?php echo e(route('front.catalog').'?subcategory='.$item->subcategory->slug); ?>"><?php echo e($item->subcategory->name); ?></a>
                                        <?php if($item->childcategory->name): ?>
                                        /
                                        <?php endif; ?>
                                    <a href="<?php echo e(route('front.catalog').'?childcategory='.$item->childcategory->slug); ?>"><?php echo e($item->childcategory->name); ?></a>
                                </div>
                                <div class="pt-1 mb-1"><span class="text-medium"><?php echo e(__('Tags')); ?>:</span>
                                    <?php if($item->tags): ?>
                                    <?php $__currentLoopData = explode(',',$item->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->last): ?>
                                    <a href="<?php echo e(route('front.catalog').'?tag='.$tag); ?>"><?php echo e($tag); ?></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('front.catalog').'?tag='.$tag); ?>"><?php echo e($tag); ?></a>,
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <?php if($item->item_type == 'normal'): ?>
                                <div class="pt-1 mb-4"><span class="text-medium"><?php echo e(__('SKU')); ?>:</span> #<?php echo e($item->sku); ?></div>
                                <?php endif; ?>
                        </div>

                        <div class="mt-4 p-d-f-area">
                            <div class="left">
                                <a class="btn btn-primary btn-sm wishlist_store wishlist_text" href="<?php echo e(route('user.wishlist.store',$item->id)); ?>"><span><i class="icon-heart"></i></span>
                                <?php if(Auth::check() && App\Models\Wishlist::where('user_id',Auth::user()->id)->where('item_id',$item->id)->exists()): ?>
                                <span><?php echo e(__('Added To Wishlist')); ?></span>
                                <?php else: ?>
                                <span class="wishlist1"><?php echo e(__('Wishlist')); ?></span>
                                <span class="wishlist2 d-none"><?php echo e(__('Added To Wishlist')); ?></span>
                                <?php endif; ?>
                                </a>
                                <button class="btn btn-primary btn-sm  product_compare" data-target="<?php echo e(route('fornt.compare.product',$item->id)); ?>" ><span><i class="icon-repeat"></i><?php echo e(__('Compare')); ?></span></button>
                            </div>

                            <div class="d-flex align-items-center">
                                <span class="text-muted mr-1"><?php echo e(__('Share')); ?>: </span>
                                <div class="d-inline-block a2a_kit">
                                    <a class="facebook  a2a_button_facebook" href="">
                                        <span><i class="fab fa-facebook-f"></i></span>
                                    </a>
                                    <a class="twitter  a2a_button_twitter" href="">
                                        <span><i class="fab fa-twitter"></i></span>
                                    </a>
                                    <a class="linkedin  a2a_button_linkedin" href="">
                                        <span><i class="fab fa-linkedin-in"></i></span>
                                    </a>
                                    <a class="pinterest   a2a_button_pinterest" href="">
                                        <span><i class="fab fa-pinterest"></i></span>
                                    </a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" padding-top-3x mb-3" id="details">
            <div class="col-lg-12">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true"><?php echo e(__('Descriptions')); ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification" type="button" role="tab" aria-controls="specification" aria-selected="false"><?php echo e(__('Specifications')); ?></a>
                </li>
            </ul>
            <div class="tab-content card">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab"">
                <?php echo $item->details; ?>

                </div>
                <div class="tab-pane fade show" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                <div class="comparison-table">
                    <table class="table table-bordered">
                        <thead class="bg-secondary">
                        </thead>
                        <tbody>
                        <tr class="bg-secondary">
                            <th class="text-uppercase"><?php echo e(__('Specifications')); ?></th>
                            <td><span class="text-medium"><?php echo e(__('Descriptions')); ?></span></td>
                        </tr>
                        <?php if($sec_name): ?>
                        <?php $__currentLoopData = array_combine($sec_name,$sec_details); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sname => $sdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($sname); ?></th>
                            <td><?php echo e($sdetail); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <tr class="text-center">
                            <td colspan="2"><?php echo e(__('No Specifications')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


  <!-- Reviews-->
  <div class="container  review-area">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2 class="h3"><?php echo e(__('Latest Reviews')); ?></h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
              <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div class="single-review">
                  <div class="comment">
                    <div class="comment-author-ava"><img class="lazy" data-src="<?php echo e(asset('assets/images/'.$review->user->photo)); ?>" alt="Comment author"></div>
                    <div class="comment-body">
                      <div class="comment-header d-flex flex-wrap justify-content-between">
                        <div>
                            <h4 class="comment-title mb-1"><?php echo e($review->subject); ?></h4>
                            <span><?php echo e($review->user->first_name); ?></span>
                            <span class="ml-3"><?php echo e($review->created_at->format('M d, Y')); ?></span>
                        </div>
                        <div class="mb-2">
                          <div class="rating-stars">
                            <?php
                                for($i=0; $i<$review->rating;$i++){
                                 echo "<i class = 'far fa-star filled'></i>";
                                }
                            ?>
                          </div>
                        </div>
                      </div>
                      <p class="comment-text  mt-2"><?php echo e($review->review); ?></p>

                    </div>
                  </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <div class="card p-5">
                <?php echo e(__('No Review')); ?>

              </div>
              <?php endif; ?>
              <div class="row mt-15">
                <div class="col-lg-12 text-center">
                    <?php echo e($reviews->links()); ?>

                </div>
            </div>

          </div>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <div class="d-inline align-baseline display-3 mr-1"><?php echo e(round($item->reviews->avg('rating'),2)); ?></div>
                  <div class="d-inline align-baseline text-sm text-warning mr-1">
                    <div class="rating-stars"><?php echo renderStarRating($item->reviews->avg('rating')); ?></div>
                  </div>
                </div>
                <div class="pt-3">
                  <label class="text-medium text-sm">5 <?php echo e(__('stars')); ?> <span class="text-muted">- <?php echo e($item->reviews->where('status',1)->where('rating',5)->count()); ?></span></label>
                  <div class="progress margin-bottom-1x">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo e($item->reviews->where('status',1)->where('rating',5)->sum('rating') * 20); ?>%; height: 2px;" aria-valuenow="100" aria-valuemin="<?php echo e($item->reviews->where('rating',5)->sum('rating') * 20); ?>" aria-valuemax="100"></div>
                  </div>
                  <label class="text-medium text-sm">4 <?php echo e(__('stars')); ?> <span class="text-muted">- <?php echo e($item->reviews->where('status',1)->where('rating',4)->count()); ?></span></label>
                  <div class="progress margin-bottom-1x">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo e($item->reviews->where('status',1)->where('rating',4)->sum('rating') * 20); ?>%; height: 2px;" aria-valuenow="<?php echo e($item->reviews->where('rating',4)->sum('rating') * 20); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <label class="text-medium text-sm">3 <?php echo e(__('stars')); ?> <span class="text-muted">- <?php echo e($item->reviews->where('status',1)->where('rating',3)->count()); ?></span></label>
                  <div class="progress margin-bottom-1x">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo e($item->reviews->where('rating',3)->sum('rating') * 20); ?>%; height: 2px;" aria-valuenow="<?php echo e($item->reviews->where('rating',3)->sum('rating') * 20); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <label class="text-medium text-sm">2 <?php echo e(__('stars')); ?> <span class="text-muted">- <?php echo e($item->reviews->where('status',1)->where('rating',2)->count()); ?></span></label>
                  <div class="progress margin-bottom-1x">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo e($item->reviews->where('status',1)->where('rating',2)->sum('rating') * 20); ?>%; height: 2px;" aria-valuenow="<?php echo e($item->reviews->where('rating',2)->sum('rating') * 20); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <label class="text-medium text-sm">1 <?php echo e(__('star')); ?> <span class="text-muted">- <?php echo e($item->reviews->where('status',1)->where('rating',1)->count()); ?></span></label>
                  <div class="progress mb-2">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo e($item->reviews->where('status',1)->where('rating',1)->sum('rating') * 20); ?>; height: 2px;" aria-valuenow="0" aria-valuemin="<?php echo e($item->reviews->where('rating',1)->sum('rating') * 20); ?>" aria-valuemax="100"></div>
                  </div>
                </div>
                <?php if(Auth::user()): ?>
                    <div class="pb-2"><a class="btn btn-primary btn-block" href="#" data-bs-toggle="modal" data-bs-target="#leaveReview"><span><?php echo e(__('Leave a Review')); ?></span></a></div>
                    <?php else: ?>
                    <div class="pb-2"><a class="btn btn-primary btn-block" href="<?php echo e(route('user.login')); ?>" ><span><?php echo e(__('Login')); ?></span></a></div>
                <?php endif; ?>
              </div>
            </div>
          </div>


    </div>
  </div>

  <?php if(count($related_items)>0): ?>
  <div class="relatedproduct-section container padding-bottom-3x mb-1 s-pt-30">
    <!-- Related Products Carousel-->
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2 class="h3"><?php echo e(__('You May Also Like')); ?></h2>
            </div>
        </div>
    </div>
    <!-- Carousel-->
    <div class="row">
        <div class="col-lg-12">
            <div class="relatedproductslider owl-carousel" >
                <?php $__currentLoopData = $related_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slider-item">
                        <div class="product-card">

                            <?php if($related->is_stock()): ?>
                                <?php if($related->is_type == 'new'): ?>
                                <?php else: ?>
                                    <div class="product-badge
                                    <?php if($related->is_type == 'feature'): ?>
                                    bg-warning

                                    <?php elseif($related->is_type == 'top'): ?>
                                    bg-info
                                    <?php elseif($related->is_type == 'best'): ?>
                                    bg-dark
                                    <?php elseif($related->is_type == 'flash_deal'): ?>
                                    bg-success
                                    <?php endif; ?>
                                    "><?php echo e($related->is_type != 'undefine' ?  ucfirst(str_replace('_',' ',$related->is_type)) : ''); ?></div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <div class="product-badge bg-secondary border-default text-body
                                    "><?php echo e(__('out of stock')); ?></div>
                            <?php endif; ?>
                                    <?php if($related->previous_price && $related->previous_price !=0): ?>
                                    <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($related)); ?></div>
                            <?php endif; ?>

                            <?php if($related->previous_price && $related->previous_price !=0): ?>
                            <div class="product-badge product-badge2 bg-info"> -<?php echo e(PriceHelper::DiscountPercentage($related)); ?></div>
                            <?php endif; ?>
                            <div class="product-thumb">
                                <img class="lazy" data-src="<?php echo e(asset('assets/images/'.$related->thumbnail)); ?>" alt="Product">
                                <div class="product-button-group">
                                    <a class="product-button wishlist_store" href="<?php echo e(route('user.wishlist.store',$related->id)); ?>" title="<?php echo e(__('Wishlist')); ?>"><i class="icon-heart"></i></a>
                                    <a class="product-button product_compare" href="javascript:;" data-target="<?php echo e(route('fornt.compare.product',$related->id)); ?>" title="<?php echo e(__('Compare')); ?>"><i class="icon-repeat"></i></a>
                                    <?php echo $__env->make('includes.item_footer',['sitem' => $related], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            <div class="product-card-body">
                              <div class="product-category"><a href="<?php echo e(route('front.catalog').'?category='.$related->category->slug); ?>"><?php echo e($related->category->name); ?></a></div>
                              <h3 class="product-title"><a href="<?php echo e(route('front.product',$related->slug)); ?>">
                                <?php echo e(strlen(strip_tags($related->name)) > 35 ? substr(strip_tags($related->name), 0, 35) : strip_tags($related->name)); ?>

                            </a></h3>
                              <h4 class="product-price">
                                <?php if($related->previous_price !=0): ?>
                                    <del><?php echo e(PriceHelper::setPreviousPrice($related->previous_price)); ?></del>
                                <?php endif; ?>
                                <?php echo e(PriceHelper::grandCurrencyPrice($related)); ?> </h4>
                            </div>

                          </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
        </div>
    </div>
  </div>
  <?php endif; ?>




<?php if(auth()->guard()->check()): ?>
<form class="modal fade ratingForm" action="<?php echo e(route('front.review.submit')); ?>" method="post" id="leaveReview" tabindex="-1">
  <?php echo csrf_field(); ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo e(__('Leave a Review')); ?></h4>
        <button class="close modal_close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php
            $user = Auth::user();
        ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-name"><?php echo e(__('Your Name')); ?></label>
              <input class="form-control" type="text" id="review-name" value="<?php echo e($user->first_name); ?>" required>
            </div>
          </div>
          <input type="hidden" name="item_id" value="<?php echo e($item->id); ?>">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-email"><?php echo e(__('Your Email')); ?></label>
              <input class="form-control" type="email" id="review-email" value="<?php echo e($user->email); ?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-subject"><?php echo e(__('Subject')); ?></label>
              <input class="form-control" type="text" name="subject" id="review-subject" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="review-rating"><?php echo e(__('Rating')); ?></label>
              <select name="rating" class="form-control" id="review-rating">
                <option value="5">5 <?php echo e(__('Stars')); ?></option>
                <option value="4">4 <?php echo e(__('Stars')); ?></option>
                <option value="3">3 <?php echo e(__('Stars')); ?></option>
                <option value="2">2 <?php echo e(__('Stars')); ?></option>
                <option value="1">1 <?php echo e(__('Star')); ?></option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="review-message"><?php echo e(__('Review')); ?></label>
          <textarea class="form-control" name="review" id="review-message" rows="8" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit"><span><?php echo e(__('Submit Review')); ?></span></button>
      </div>
    </div>
  </div>
</form>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/front/catalog/product.blade.php ENDPATH**/ ?>