<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0 bc-title"> <b><?php echo e(__('SMS Setting')); ?></b> </h3>
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
						<div class="col-lg-12">
							<div class="p-5">
								<form class="admin-form" action="<?php echo e(route('back.sms.update')); ?>" method="POST"
									enctype="multipart/form-data">

                                    <?php echo csrf_field(); ?>

									<?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="container pl-0 pr-0 ml-0 mr-0 w-100 mw-100">
                                        <div id="tabs">
                                          <ul class="nav nav-pills nav-secondary nav-justified mb-3" role="tablist">
                                            <li class="nav-item">
                                              <a class="nav-link active" data-toggle="pill" href="#conf"><?php echo e(__('Configuration')); ?></a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" data-toggle="pill" href="#template"><?php echo e(__('SMS Section')); ?></a>
                                            </li>

                                          </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                          <div id="conf" class="container tab-pane active"><br>


                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.update')); ?>" method="POST" enctype="multipart/form-data">

                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group">
                                                        <label class="switch-primary">
                                                          <input type="checkbox" class="switch switch-bootstrap status radio-check" name="is_twilio" value="1" <?php echo e($setting->is_twilio == 1 ? 'checked' : ''); ?>>
                                                          <span class="switch-body"></span>
                                                          <span class="switch-text"><?php echo e(__('SMS Service')); ?></span>
                                                        </label>
                                                    </div>



                                                    

                                                    <div class="radio-show <?php echo e($setting->is_twilio == 0 ? 'd-none' : ''); ?>">

                                                        <div class="form-group ">
                                                            <label for="twilio_sid"><?php echo e(__('Twilio Sid')); ?></label>
                                                            <input type="text" class="form-control " id="twilio_sid" name="twilio_sid" placeholder="<?php echo e(__('Enter Twilio Sid')); ?>" value="<?php echo e($setting->twilio_sid); ?>" >
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="twilio_token"><?php echo e(__('Twilio Token')); ?></label>
                                                            <input type="text" class="form-control " id="twilio_token" name="twilio_token" placeholder="<?php echo e(__('Enter Twilio Token')); ?>" value="<?php echo e($setting->twilio_token); ?>" >
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="twilio_form_number"><?php echo e(__('Twilio Form Number')); ?></label>
                                                            <input type="text" class="form-control " id="twilio_form_number" name="twilio_form_number" placeholder="<?php echo e(__('Enter Twilio Form Number')); ?>" value="<?php echo e($setting->twilio_form_number); ?>" >
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="twilio_country_code"><?php echo e(__('Country Number Code')); ?></label>
                                                            <input type="text" class="form-control" id="twilio_country_code" name="twilio_country_code" placeholder="<?php echo e(__('Country Number Code')); ?>" value="<?php echo e($setting->twilio_country_code); ?>">
                                                           <strong><?php echo e(__('Note')); ?></strong> : <small class="text-primary"><?php echo e(__('Must use country code before (+) sign')); ?></small>
                                                        </div>

                                                    </div>

                                                        <div>

                                                            <div class="form-group d-flex justify-content-center">
                                                                <button type="submit" class="btn btn-secondary btn-block w-100"><?php echo e(__('Submit')); ?></button>
                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                          </div>

                                          <div id="template" class="container tab-pane"><br>

                                            <div class="row justify-content-center">

                                                <div class="col-lg-8">

                                                    <form action="<?php echo e(route('back.setting.update')); ?>" method="POST" enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <?php
                                                        $sms_section = json_decode($setting->twilio_section,true);
                                                    ?>
                                                        <p>Order Number : {order_number} <code>If you need order number then use this tag</code></p>
                                                        
                                                        <div class="form-group ">
                                                            <label for="order_purchase"><?php echo e(__('Order Purchase')); ?></label>
                                                            <textarea name="twilio_section['purchase']" class="form-control" id="order_purchase" placeholder="<?php echo e(__('Enter Message')); ?>"><?php echo e($sms_section["'purchase'"]); ?></textarea>
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="order_status"><?php echo e(__('Order Status')); ?></label>
                                                            <textarea name="twilio_section['order_status']" class="form-control" id="order_status" placeholder="<?php echo e(__('Enter Message')); ?>"><?php echo e($sms_section["'order_status'"]); ?></textarea>
                                                        </div>

                                                        <div class="form-group d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-secondary btn-block w-100"><?php echo e(__('Submit')); ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>

                                      </div>
									<div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/settings/sms.blade.php ENDPATH**/ ?>