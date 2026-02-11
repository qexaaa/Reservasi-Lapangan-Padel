

<?php $__env->startSection('content'); ?>
<div class="container">

    
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">

        
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">

                    
                    <h4 class="text-center mb-4">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </h4>

                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            <?php echo e($errors->first()); ?>

                        </div>
                    <?php endif; ?>

                    
                    <form method="POST" action="/login">
                        <?php echo csrf_field(); ?> 

                        
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>

                                
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Masukkan email"
                                    required
                                >
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">

                                
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>

                                
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    placeholder="Masukkan password"
                                    required
                                >

                                
                                <div class="input-group-append">
                                    <span
                                        class="input-group-text toggle-password"
                                        data-target="password"
                                    >
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/larh6135/public_html/project_laravel/resources/views/auth/login.blade.php ENDPATH**/ ?>