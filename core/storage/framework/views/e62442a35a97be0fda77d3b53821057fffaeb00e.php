
<?php
    $cart = Session::has('cart') ? Session::get('cart') : [];
    $total =0;
    $option_price = 0;
    $cartTotal = 0;
?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive shopping-cart">
            <table class="table table-bordered">

              <thead>
                <tr>
                  <th><?php echo e(__('Product Name')); ?></th>
                  <th><?php echo e(__('Product Price')); ?></th>
                  <th class="text-center"><?php echo e(__('Quantity')); ?></th>
                  <th class="text-center"><?php echo e(__('Subtotal')); ?></th>
                  <th class="text-center"><a class="btn btn-sm btn-primary" href="<?php echo e(route('front.cart.clear')); ?>"><span><?php echo e(__('Clear Cart')); ?></span></a></th>
                </tr>
              </thead>

              <tbody id="cart_view_load" data-target="<?php echo e(route('cart.get.load')); ?>">

                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php

                    $cartTotal +=  ($item['main_price'] + $total + $item['attribute_price']) * $item['qty'];
                ?>
                <tr>
                    <td>
                      <div class="product-item"><a class="product-thumb" href="<?php echo e(route('front.product',$item['slug'])); ?>"><img src="<?php echo e(asset('assets/images/'.$item['photo'])); ?>" alt="Product"></a>
                        <div class="product-info">
                          <h4 class="product-title"><a href="<?php echo e(route('front.product',$item['slug'])); ?>">
                            <?php echo e(strlen(strip_tags($item['name'])) > 45 ? substr(strip_tags($item['name']), 0, 45) . '...' : strip_tags($item['name'])); ?>


                        </a></h4>

                          <?php $__currentLoopData = $item['attribute']['option_name']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionkey => $option_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <span><em><?php echo e($item['attribute']['names'][$optionkey]); ?>:</em> <?php echo e($option_name); ?> (<?php echo e(PriceHelper::setCurrencyPrice($item['attribute']['option_price'][$optionkey])); ?>)</span>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                      </div>
                    </td>
                    <td class="text-center text-lg"><?php echo e(PriceHelper::setCurrencyPrice($item['main_price'])); ?></td>

                    <td class="text-center">
                     <?php if($item['item_type'] != 'digital'): ?>
                        <div class="qtySelector product-quantity">
                        <span class="decreaseQtycart cartsubclick" data-id="<?php echo e($key); ?>" data-target="<?php echo e(PriceHelper::GetItemId($key)); ?>"><i class="fas fa-minus"></i></span>
                        <input type="text" disabled class="qtyValue cartcart-amount" value="<?php echo e($item['qty']); ?>">
                        <span class="increaseQtycart cartaddclick" data-id="<?php echo e($key); ?>" data-target="<?php echo e(PriceHelper::GetItemId($key)); ?>"><i class="fas fa-plus"></i></span>
                          <input type="hidden" value="3333" id="current_stock">
                      </div>
                     <?php endif; ?>

                    </td>
                    <td class="text-center text-lg"><?php echo e(PriceHelper::setCurrencyPrice($item['main_price'] * $item['qty'])); ?></td>

                    <td class="text-center"><a class="remove-from-cart" href="<?php echo e(route('front.cart.destroy',$key)); ?>" data-toggle="tooltip" title="Remove item"><i class="icon-x"></i></a></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
            </table>
          </div>
    </div>
</div>


  <div class="card mt-4">
      <div class="card-body">
        <div class="shopping-cart-footer">
            <div class="column">
                <form class="coupon-form" method="post" id="coupon_form" action="<?php echo e(route('front.promo.submit')); ?>">
                <?php echo csrf_field(); ?>
                <input class="form-control form-control-sm" name="code" type="text" placeholder="<?php echo e(__('Coupon code')); ?>" required>
                <button class="btn btn-primary btn-sm" type="submit"><span><?php echo e(__('Apply Coupon')); ?></span></button>
                </form>
            </div>

            <div class="text-right text-lg column <?php echo e(Session::has('coupon') ? '' : 'd-none'); ?>"><span class="text-muted"><?php echo e(__('Discount')); ?> (<?php echo e(Session::has('coupon') ? Session::get('coupon')['code']['title'] : ''); ?>) : </span><span class="text-gray-dark"><?php echo e(PriceHelper::setCurrencyPrice(Session::has('coupon') ? Session::get('coupon')['discount'] : 0)); ?></span></div>

            <div class="text-right column text-lg"><span class="text-muted"><?php echo e(__('Subtotal')); ?>: </span><span class="text-gray-dark"><?php echo e(PriceHelper::setCurrencyPrice($cartTotal - (Session::has('coupon') ? Session::get('coupon')['discount'] : 0))); ?></span></div>


        </div>
        <div class="shopping-cart-footer">
            <div class="column"><a class="btn btn-primary " href="<?php echo e(route('front.catalog')); ?>"><span><i class="icon-arrow-left"></i> <?php echo e(__('Back to Shopping')); ?></span></a></div>
            <div class="column"><a class="btn btn-primary" href="<?php echo e(route('front.checkout.billing')); ?>"><span><?php echo e(__('Checkout')); ?></span></a></div>
        </div>
      </div>
  </div>
</div>


<?php /**PATH C:\lara\www\emmerce\core\resources\views/includes/cart.blade.php ENDPATH**/ ?>