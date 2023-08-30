<?php $__env->startSection('content'); ?>

        <div class="wrapper wrapper-login">
            <div class="container container-login animated fadeIn">
                <h3 class="text-center"><?php echo e(__('Sign In To Admin')); ?></h3>
                <div class="login-form">

                    <form action="<?php echo e(route('back.login.submit')); ?>" method="POST">

                        <?php echo csrf_field(); ?>

                        <?php echo $__env->make('alerts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="form-group form-floating-label">
                            <input id="username" name="login_email" type="email" class="form-control input-border-bottom" value="<?php echo e(old('login_email')); ?>">
                            <label for="username" class="placeholder"><?php echo e(__('Email Address')); ?></label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="password" name="login_password" type="password" class="form-control input-border-bottom">
                            <label for="password" class="placeholder"><?php echo e(__('Password')); ?></label>
                            
                        </div>

                        <div class="row justify-content-center form-sub m-0">
                            <a href="<?php echo e(route('back.forgot')); ?>" class="link float-right"><?php echo e(__('Forget Password ?')); ?></a>
                        </div>

                        <div class="form-action mb-3">
                            <button type="submit" class="btn btn-secondary  btn-login"><?php echo e(__('Sign In')); ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.back-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\lara\www\emmerce\core\resources\views/back/auth/login.blade.php ENDPATH**/ ?>