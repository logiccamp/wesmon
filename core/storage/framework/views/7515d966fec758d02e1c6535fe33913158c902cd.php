<?php $__env->startSection('content'); ?>

<div class="container-fluid">

	<!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class=" mb-0 bc-title"> <b><?php echo e(__('Email')); ?></b> </h3>
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
								<form class="admin-form" action="<?php echo e(route('back.email.update')); ?>" method="POST"
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
                                              <a class="nav-link" data-toggle="pill" href="#template"><?php echo e(__('Templates')); ?></a>
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
                                                          <input type="checkbox" class="switch switch-bootstrap status radio-check" name="smtp_check" value="1" <?php echo e($setting->smtp_check == 1 ? 'checked' : ''); ?>>
                                                          <span class="switch-body"></span>
                                                          <span class="switch-text"><?php echo e(__('SMTP Service')); ?></span>
                                                        </label>
                                                    </div>
                                                    

                                                    <div class="radio-show <?php echo e($setting->smtp_check == 0 ? 'd-none' : ''); ?>">

                                                        <div class="form-group ">
                                                            <label for="email_host"><?php echo e(__('SMTP Host')); ?></label>
                                                            <input type="text" class="form-control " id="email_host" name="email_host" placeholder="<?php echo e(__('Enter SMTP Host')); ?>" value="<?php echo e($setting->email_host); ?>" ="">
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="email_port"><?php echo e(__('SMTP Port')); ?></label>
                                                            <input type="text" class="form-control " id="email_port" name="email_port" placeholder="<?php echo e(__('Enter SMTP Port')); ?>" value="<?php echo e($setting->email_port); ?>" ="">
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="email_encryption"><?php echo e(__('SMTP Encryption')); ?></label>
                                                            <input type="text" class="form-control " id="email_encryption" name="email_encryption" placeholder="<?php echo e(__('Enter SMTP Encryption')); ?>" value="<?php echo e($setting->email_encryption); ?>" ="">
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="email_user"><?php echo e(__('SMTP Username')); ?></label>
                                                            <input type="text" class="form-control " id="email_user" name="email_user" placeholder="<?php echo e(__('Enter SMTP Username')); ?>" value="<?php echo e($setting->email_user); ?>" ="">
                                                        </div>

                                                        <div class="form-group ">
                                                            <label for="email_pass"><?php echo e(__('SMTP Password')); ?></label>
                                                            <input type="text" class="form-control " id="email_pass" name="email_pass" placeholder="<?php echo e(__('Enter SMTP Password')); ?>" value="<?php echo e($setting->email_pass); ?>" ="">
                                                        </div>

                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="email_from"><?php echo e(__('Email From')); ?></label>
                                                        <input type="text" class="form-control " id="email_from" name="email_from" placeholder="<?php echo e(__('Enter Email From')); ?>" value="<?php echo e($setting->email_from); ?>" ="">
                                                    </div>


                                                    <div class="form-group ">
                                                        <label for="email_from_name"><?php echo e(__('Email From Name')); ?></label>
                                                        <input type="text" class="form-control " id="email_from_name" name="email_from_name" placeholder="<?php echo e(__('Enter Email From Name')); ?>" value="<?php echo e($setting->email_from_name); ?>" ="">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="contact_email"><?php echo e(__('Contact Email')); ?></label>
                                                        <input type="text" class="form-control " id="contact_email" name="contact_email" placeholder="<?php echo e(__('Enter Contact Email')); ?>" value="<?php echo e($setting->contact_email); ?>" ="">
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

                                            <!-- DataTales -->
                                            <div class="card shadow mb-4">
                                                <div class="card-body">

                                                    <div class="gd-responsive-table">
                                                        <table class="table table-bordered table-striped" id="admin-table" width="100%" cellspacing="0">

                                                            <thead>
                                                                <tr>
                                                                    <th width="20%"><?php echo e(__('Type')); ?></th>
                                                                    <th width="20%"><?php echo e(__('Subject')); ?></th>
                                                                    <th width="15%"><?php echo e(__('Actions')); ?></th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo e($data->type); ?>

                                                                    </td>
                                                                    <td>
                                                                        <?php echo e($data->subject); ?>

                                                                    </td>
                                                                    <td>
                                                                        <div class="action-list">
                                                                            <a class="btn btn-secondary btn-sm"
                                                                                href="<?php echo e(route('back.template.edit',$data->id)); ?>">
                                                                                <i class="fas fa-edit"></i> <?php echo e(__('Edit')); ?>

                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>

                                                        </table>
                                                    </div>
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

<?php echo $__env->make('master.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/settings/email.blade.php ENDPATH**/ ?>