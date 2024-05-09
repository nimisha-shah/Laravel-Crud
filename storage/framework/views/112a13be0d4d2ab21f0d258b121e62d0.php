<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Employee Information
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('employee.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="firstname" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($employee->firstname); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Email:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($employee->email); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="mobile" class="col-md-4 col-form-label text-md-end text-start"><strong>Mobile:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($employee->mobile); ?>--<?php echo e($countryname); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Address:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($employee->address); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Gender:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        <?php if($employee->gender == 'F'): ?> 
                        <span>Female</span>
                        <?php else: ?> 
                        <span>Male</span>
                        <?php endif; ?> 
                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Hobby:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($employee->hobby); ?>

                        </div>
                    </div>
                   
                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Image:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <img src="<?php echo e(url('uploads/employee/'.$employee->image)); ?>" alt="Pic" width="400" height="400"></img>
                        </div>
                    </div>
                   
        
            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('employee.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wagento/www/html/blog/resources/views/employee/show.blade.php ENDPATH**/ ?>