<?php $__env->startSection('template_title'); ?>
    <?php echo e(trans('installer_messages.environment.wizard.templateTitle')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <i class="fa fa-database fa-fw" aria-hidden="true"></i>
    <?php echo trans('installer_messages.environment.wizard.title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <div class="tabs tabs-full">
        <?php if(session()->has('license_success')): ?>
            <div class="alert alert-success" style="background-color: #d4edda;" id="license_alert">
                <p style="margin-bottom: 0px;color: #155724;"><?php echo e(session()->get('license_success')); ?></p>
            </div>
        <?php endif; ?>

        <?php if(session()->has('domin_url')): ?>
            <div class="alert alert-success" style="background-color: #d4edda;" id="license_alert">
                <strong>This Purchase Code Already Use for other Domin :</strong>
                <?php $__currentLoopData = session()->get('domin_url'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p style="margin-bottom: 0px;color: #155724;"><?php echo e($item); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <strong>
                     Envato not allow to install multiple domin. One purched codes for one Domin.
                     Author can take action any time for that.
                    <br>
                    Author Contact : geniusdevs24@gmail.com 
                </strong>
            </div> 
        <?php endif; ?>

        <form method="post" action="<?php echo e(route('LaravelInstaller::environmentSaveWizard')); ?>" class="tabs-wrap">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div>
                <div class="form-group <?php echo e($errors->has('app_name') ? ' has-error ' : ''); ?>">
                    <label for="app_name">
                        App Name
                    </label>
                    <input type="text" name="app_name" id="app_name" value="" placeholder="App Name" />
                    <?php if($errors->has('app_name')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('app_name')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('app_debug') ? ' has-error ' : ''); ?>" style="margin-bottom: 5px;">
                    <label for="app_debug">
                        App Debug
                    </label>
                    <label for="app_debug_true">
                        <input type="radio" name="app_debug" id="app_debug_true" value=true />
                        True
                    </label>
                    <label for="app_debug_false">
                        <input type="radio" name="app_debug" id="app_debug_false" value=false checked />
                        False
                    </label>
                    <?php if($errors->has('app_debug')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('app_debug')); ?>

                        </span>
                    <?php endif; ?>
                </div>


                <div class="form-group <?php echo e($errors->has('app_url') ? ' has-error ' : ''); ?>">
                    <label for="app_url">
                        App Url
                    </label>
                    <input type="url" name="app_url" id="app_url" value="http://localhost" placeholder="App Url" />
                    <?php if($errors->has('app_url')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('app_url')); ?>

                        </span>
                    <?php endif; ?>
                </div>


                <div class="form-group <?php echo e($errors->has('database_hostname') ? ' has-error ' : ''); ?>">
                    <label for="database_hostname">
                       Database Host
                    </label>
                    <input type="text" name="database_hostname" id="database_hostname" value="127.0.0.1" placeholder="Database Host" />
                    <?php if($errors->has('database_hostname')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_hostname')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('database_name') ? ' has-error ' : ''); ?>">
                    <label for="database_name">
                        Database Name
                    </label>
                    <input type="text" name="database_name" id="database_name" value="" placeholder="Database Name" />
                    <?php if($errors->has('database_name')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_name')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('database_username') ? ' has-error ' : ''); ?>">
                    <label for="database_username">
                       User Name
                    </label>
                    <input type="text" name="database_username" id="database_username" value="" placeholder="User Name" />
                    <?php if($errors->has('database_username')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_username')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo e($errors->has('database_password') ? ' has-error ' : ''); ?>">
                    <label for="database_password">
                        Database Password
                    </label>
                    <input type="password" name="database_password" id="database_password" value="" placeholder="Database Password" />
                    <?php if($errors->has('database_password')): ?>
                        <span class="error-block">
                            <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                            <?php echo e($errors->first('database_password')); ?>

                        </span>
                    <?php endif; ?>
                </div>

                <div class="buttons">
                    <button class="button" type="submit">
                        Install
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

        </form>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('vendor.installer.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/vendor/installer/environment-wizard.blade.php ENDPATH**/ ?>