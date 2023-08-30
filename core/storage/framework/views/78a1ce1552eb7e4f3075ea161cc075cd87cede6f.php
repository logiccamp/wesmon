<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0"><b><?php echo e(__('Payment')); ?></b></h3>
                </div>
        </div>
    </div>

	<!-- Form -->
	<div class="row">

		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg">
				<div class="card-body ">
					<!-- Nested Row within Card Body -->
					<div class="row">
                        <div class="col-lg-3">
                            <div class="nav flex-column m-3 nav-pills nav-secondary" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    <a class="nav-link active" data-toggle="pill" href="#cod"><?php echo e(__('Cash On Delivery')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#stripe"><?php echo e(__('Stripe')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#paypal"><?php echo e(__('Paypal')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#molly"><?php echo e(__('Mollie')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#paytm"><?php echo e(__('Paytm')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#razorpay"><?php echo e(__('Razorpay')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#sslcommerz"><?php echo e(__('SSL commerz')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#mercadopago"><?php echo e(__('Mercadopago')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#authorize"><?php echo e(__('Authorize.Net')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#paystack"><?php echo e(__('Paystack')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#flutterwave"><?php echo e(__('Flutterwave')); ?></a>
                                    <a class="nav-link" data-toggle="pill" href="#bank"><?php echo e(__('Bank Transfer')); ?></a>

                            </div>
                        </div>
						<div class="col-lg-9">
							<div class="p-5">
								<div class="admin-form">

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="container pl-0 pr-0 ml-0 mr-0 w-100 mw-100">
                                        <div id="tabs">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                          <div id="cod" class="container tab-pane active"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($cod->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Cash On Delivery')); ?></span>
                                                        </label>
                                                    </div>

                                                        <div class="image-show <?php echo e($cod->status == 1 ? '' : 'd-none'); ?>">

                                                            <div class="form-group">
                                                                <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                                <input type="text" class="form-control" name="name" id="name" value="<?php echo e($cod->name); ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                                <div class="col-lg-12 pb-1">
                                                                    <img class="admin-setting-img"
                                                                        src="<?php echo e($cod->photo ? asset('assets/images/'.$cod->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                        alt="No Image Found">
                                                                </div>
                                                                <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                            </div>

                                                            <div class="form-group position-relative col-xl-12">
                                                                <label class="file">
                                                                    <input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                    <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                                </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                                <textarea name="text" id="text" class="form-control " rows="5"
                                                                    placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                    ><?php echo e($cod->text); ?></textarea>
                                                            </div>

                                                            <input type="hidden" name="unique_keyword" value="cod">

                                                        </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                          <div id="stripe" class="container tab-pane"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($stripe->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Stripe')); ?></span>
                                                        </label>
                                                    </div>


                                                    <div class="image-show <?php echo e($stripe->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($stripe->photo ? asset('assets/images/'.$stripe->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    stripe="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($stripe->name); ?>">
                                                        </div>
                                                        <?php $__currentLoopData = $stripeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $pdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <div class="form-group">
                                                                <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $stripe->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                                <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $stripe->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($pdata); ?>" >
                                                            </div>


                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($stripe->text); ?></textarea>
                                                        </div>

                                                        <input type="hidden" name="unique_keyword" value="stripe">

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                          <div id="paypal" class="container tab-pane"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($paypal->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Paypal')); ?></span>
                                                        </label>
                                                    </div>


                                                    <div class="image-show <?php echo e($paypal->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($paypal->photo ? asset('assets/images/'.$paypal->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    alt="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($paypal->name); ?>">
                                                        </div>

                                                        <?php $__currentLoopData = $paypalData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $pdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <?php if($pkey == 'check_sandbox'): ?>

                                                                <div class="form-group  col-xl-4 col-md-6">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="pkey[<?php echo e(__($pkey)); ?>]" class="custom-control-input" <?php echo e($pdata == 1  ? 'checked' : ''); ?> id="<?php echo e($pkey); ?>">
                                                                        <label class="custom-control-label" for="<?php echo e($pkey); ?>">
                                                                        <?php echo e(__( $paypal->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            <?php else: ?>

                                                                <div class="form-group">
                                                                    <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $paypal->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                                    <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $paypal->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($pdata); ?>" >
                                                                </div>

                                                            <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($paypal->text); ?></textarea>
                                                        </div>

                                                        <input type="hidden" name="unique_keyword" value="paypal">

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>
                                          <div id="molly" class="container tab-pane"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($molly->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Mollie')); ?></span>
                                                        </label>
                                                    </div>



                                                    <div class="image-show <?php echo e($molly->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($molly->photo ? asset('assets/images/'.$molly->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    alt="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file"  accept="image/*"  class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($molly->name); ?>">
                                                        </div>

                                                        <?php $__currentLoopData = $mollyData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $pdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="form-group">
                                                            <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $molly->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                            <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $molly->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($pdata); ?>" >
                                                        </div>


                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <input type="hidden" name="unique_keyword" value="mollie">

                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($molly->text); ?></textarea>
                                                        </div>

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary "><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                          <div id="paytm" class="container tab-pane"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($paytm->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Paytm')); ?></span>
                                                        </label>
                                                    </div>



                                                    <div class="image-show <?php echo e($paytm->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group col-xl-12">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($paytm->photo ? asset('assets/images/'.$paytm->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    stripe="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file" class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($paytm->name); ?>">
                                                        </div>

                                                        <?php $__currentLoopData = $paytmData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $paytmData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if($pkey == 'paytm_mode'): ?>
                                                                <div class="form-group  col-xl-4 col-md-6">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="pkey[<?php echo e(__($pkey)); ?>]" class="custom-control-input" <?php echo e($paytmData == 1  ? 'checked' : ''); ?> id="<?php echo e($pkey); ?>">
                                                                        <label class="custom-control-label" for="<?php echo e($pkey); ?>">
                                                                        <?php echo e(__( $paypal->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            <?php else: ?>

                                                                <div class="form-group">
                                                                    <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $paytm->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                                    <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $paytm->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($pdata); ?>" >
                                                                </div>

                                                            <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($paytm->text); ?></textarea>
                                                        </div>

                                                        <input type="hidden" name="unique_keyword" value="paytm">

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary btn-block w-50"><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                          <div id="sslcommerz" class="container tab-pane"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($sslcommerz->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display sslcommerz')); ?></span>
                                                        </label>
                                                    </div>


                                                    <div class="image-show <?php echo e($sslcommerz->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group col-xl-12">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($sslcommerz->photo ? asset('assets/images/'.$sslcommerz->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    stripe="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file" class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($sslcommerz->name); ?>">
                                                        </div>

                                                        <?php $__currentLoopData = $sslcommerzData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $sslcommerzData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($pkey == 'check_sandbox'): ?>

                                                                <div class="form-group  col-xl-4 col-md-6">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="pkey[<?php echo e(__($pkey)); ?>]" class="custom-control-input" <?php echo e($sslcommerzData == 1  ? 'checked' : ''); ?> id="ssl<?php echo e($pkey); ?>">
                                                                        <label class="custom-control-label" for="ssl<?php echo e($pkey); ?>">
                                                                        <?php echo e(__( $sslcommerz->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>

                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            <?php else: ?>
                                                                    <div class="form-group col-xl-12">
                                                                        <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $sslcommerz->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                                        <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $sslcommerz->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($sslcommerzData); ?>" required>
                                                                    </div>
                                                            <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($sslcommerz->text); ?></textarea>
                                                        </div>

                                                        <input type="hidden" name="unique_keyword" value="sslcommerz">

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary btn-block w-50"><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                          <div id="mercadopago" class="container tab-pane"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($mercadopago->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Mercadopago')); ?></span>
                                                        </label>
                                                    </div>



                                                    <div class="image-show <?php echo e($mercadopago->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group col-xl-12">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($mercadopago->photo ? asset('assets/images/'.$mercadopago->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    stripe="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file" class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($mercadopago->name); ?>">
                                                        </div>

                                                        <?php $__currentLoopData = $mercadopagoData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $mercadopagoData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if($pkey == 'check_sandbox'): ?>

                                                        <div class="form-group  col-xl-4 col-md-6">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="pkey[<?php echo e(__($pkey)); ?>]" class="custom-control-input" <?php echo e($mercadopagoData == 1  ? 'checked' : ''); ?> id="authorize<?php echo e($pkey); ?>">
                                                                <label class="custom-control-label" for="authorize<?php echo e($pkey); ?>">
                                                                <?php echo e(__( $mercadopago->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>

                                                                </label>
                                                            </div>
                                                        </div>

                                                        <?php else: ?>
                                                            <div class="form-group col-xl-12">
                                                                <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $mercadopago->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                                <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $mercadopago->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($mercadopagoData); ?>" required>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($mercadopago->text); ?></textarea>
                                                        </div>

                                                        <input type="hidden" name="unique_keyword" value="mercadopago">

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary btn-block w-50"><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                          <div id="authorize" class="container tab-pane"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($authorize->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Authorize.Net')); ?></span>
                                                        </label>
                                                    </div>


                                                    <div class="image-show <?php echo e($authorize->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group col-xl-12">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($authorize->photo ? asset('assets/images/'.$authorize->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    stripe="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file" class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($authorize->name); ?>">
                                                        </div>

                                                        <?php $__currentLoopData = $authorizeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $authorizeData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if($pkey == 'check_sandbox'): ?>

                                                        <div class="form-group  col-xl-4 col-md-6">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="pkey[<?php echo e(__($pkey)); ?>]" class="custom-control-input" <?php echo e($authorizeData == 1  ? 'checked' : ''); ?> id="mer<?php echo e($pkey); ?>">
                                                                <label class="custom-control-label" for="mer<?php echo e($pkey); ?>">
                                                                <?php echo e(__( $authorize->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>

                                                                </label>
                                                            </div>
                                                        </div>

                                                        <?php else: ?>
                                                            <div class="form-group col-xl-12">
                                                                <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $authorize->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                                <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $authorize->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($authorizeData); ?>" required>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($authorize->text); ?></textarea>
                                                        </div>

                                                        <input type="hidden" name="unique_keyword" value="authorize">

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary btn-block w-50"><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                           <div id="paystack" class="container tab-pane"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($paystack->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Paystack')); ?></span>
                                                        </label>
                                                    </div>



                                                    <div class="image-show <?php echo e($paystack->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group col-xl-12">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($paystack->photo ? asset('assets/images/'.$paystack->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    stripe="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file" class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($paystack->name); ?>">
                                                        </div>

                                                        <?php $__currentLoopData = $paystackData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $paystackData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if($pkey == 'check_sandbox'): ?>

                                                        <div class="form-group  col-xl-4 col-md-6">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="pkey[<?php echo e(__($pkey)); ?>]" class="custom-control-input" <?php echo e($paystackData->status == 1  ? 'checked' : ''); ?> id="mer<?php echo e($pkey); ?>">
                                                                <label class="custom-control-label" for="mer<?php echo e($pkey); ?>">
                                                                <?php echo e(__( $paystack->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>

                                                                </label>
                                                            </div>
                                                        </div>

                                                        <?php else: ?>
                                                            <div class="form-group col-xl-12">
                                                                <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $paystack->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                                <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $paystack->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($paystackData); ?>" required>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($paystack->text); ?></textarea>
                                                        </div>

                                                        <input type="hidden" name="unique_keyword" value="paystack">

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary btn-block w-50"><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                          <div id="bank" class="container tab-pane"><br>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($bank->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Bank Transfer')); ?></span>
                                                        </label>
                                                    </div>
                                                    <div class="image-show <?php echo e($bank->status == 1 ? '' : 'd-none'); ?>">
                                                        <div class="form-group col-xl-12">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($bank->photo ? asset('assets/images/'.$bank->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    stripe="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file" class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($bank->name); ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control text-editor" rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($bank->text); ?></textarea>
                                                        </div>

                                                        <input type="hidden" name="unique_keyword" value="bank">

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary btn-block w-50"><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                          <div id="razorpay" class="container tab-pane"><br>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($razorpay->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Razorpay')); ?></span>
                                                        </label>
                                                    </div>

                                                    <div class="image-show <?php echo e($razorpay->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group col-xl-12">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($razorpay->photo ? asset('assets/images/'.$razorpay->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    stripe="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file" class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($razorpay->name); ?>">
                                                        </div>

                                                        <?php $__currentLoopData = $razorpayData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $razorpayData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if($pkey == 'check_sandbox'): ?>

                                                        <div class="form-group  col-xl-4 col-md-6">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="pkey[<?php echo e(__($pkey)); ?>]" class="custom-control-input" <?php echo e($razorpayData->status == 1  ? 'checked' : ''); ?> id="mer<?php echo e($pkey); ?>">
                                                                <label class="custom-control-label" for="mer<?php echo e($pkey); ?>">
                                                                <?php echo e(__( $razorpay->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>

                                                                </label>
                                                            </div>
                                                        </div>

                                                        <?php else: ?>
                                                            <div class="form-group col-xl-12">
                                                                <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $razorpay->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                                <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $razorpay->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($razorpayData); ?>" required>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($razorpay->text); ?></textarea>
                                                        </div>
                                                        <input type="hidden" name="unique_keyword" value="razorpay">
                                                    </div>
                                                        <div>
                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary btn-block w-50"><?php echo e(__('Submit')); ?></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                          </div>


                                          <div id="flutterwave" class="container tab-pane"><br>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <form action="<?php echo e(route('back.setting.payment.update')); ?>" method="POST"
                                                    enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                            <input type="checkbox" class="switch switch-bootstrap " name="status" value="1" <?php echo e($flutterwave->status == 1 ? 'checked' : ''); ?>>
                                                            <span class="switch-body"></span>
                                                            <span class="switch-text"><?php echo e(__('Display Flutterwave')); ?></span>
                                                        </label>
                                                    </div>

                                                    <div class="image-show <?php echo e($flutterwave->status == 1 ? '' : 'd-none'); ?>">

                                                        <div class="form-group col-xl-12">
                                                            <label for="name"><?php echo e(__('Current Image')); ?></label>
                                                            <div class="col-lg-12 pb-1">
                                                                <img class="admin-setting-img"
                                                                    src="<?php echo e($flutterwave->photo ? asset('assets/images/'.$flutterwave->photo) : asset('assets/images/placeholder.png')); ?>"
                                                                    stripe="No Image Found">
                                                            </div>
                                                            <span><?php echo e(__('Image Size Should Be 52 x 35.')); ?></span>
                                                        </div>

                                                        <div class="form-group position-relative col-xl-12">
                                                            <label class="file">
                                                                <input type="file" class="upload-photo" name="photo" id="file" aria-label="File browser example">
                                                                <span class="file-custom text-left"><?php echo e(__('Upload Image...')); ?></span>
                                                            </label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name"><?php echo e(__('Enter Name')); ?> *</label>
                                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo e($flutterwave->name); ?>">
                                                        </div>

                                                        <?php $__currentLoopData = $flutterwaveData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $flutterwaveData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if($pkey == 'check_sandbox'): ?>

                                                        <div class="form-group  col-xl-4 col-md-6">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="pkey[<?php echo e(__($pkey)); ?>]" class="custom-control-input" <?php echo e($flutterwaveData->status == 1  ? 'checked' : ''); ?> id="mer<?php echo e($pkey); ?>">
                                                                <label class="custom-control-label" for="mer<?php echo e($pkey); ?>">
                                                                <?php echo e(__( $flutterwave->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>

                                                                </label>
                                                            </div>
                                                        </div>

                                                        <?php else: ?>
                                                            <div class="form-group col-xl-12">
                                                                <label for="inp-<?php echo e(__($pkey)); ?>"><?php echo e(__( $flutterwave->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?></label>
                                                                <input type="text" class="form-control" id="inp-<?php echo e(__($pkey)); ?>" name="pkey[<?php echo e(__($pkey)); ?>]"  placeholder="<?php echo e(__( $flutterwave->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($flutterwaveData); ?>" required>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="form-group">
                                                            <label for="text"><?php echo e(__('Enter Text')); ?> *</label>
                                                            <textarea name="text" id="text" class="form-control " rows="5"
                                                                placeholder="<?php echo e(__('Enter Text')); ?>"
                                                                ><?php echo e($flutterwave->text); ?></textarea>
                                                        </div>
                                                        <input type="hidden" name="unique_keyword" value="flutterwave">
                                                    </div>
                                                        <div>
                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary btn-block w-50"><?php echo e(__('Submit')); ?></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                          </div>

                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/settings/payment.blade.php ENDPATH**/ ?>