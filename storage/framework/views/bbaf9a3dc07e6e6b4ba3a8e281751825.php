<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h1>Add Employee</h1>
    </div>

    <div class="card-body">
        <form class="" action="<?php echo e(route('employee.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div>
            <label>First Name</label></br>
            <input type="text" name="firstname" id="firstname" value='' class="form-control">
            <?php if($errors->has('firstname')): ?>
                <span class="text-danger"><?php echo e($errors->first('firstname')); ?></span>
            <?php endif; ?>
            </div>
            <br/>
            <div>
            <label>Last Name</label></br>
            <input type="text" name="lastname" id="lastname" value='' class="form-control">
            </div>
            <?php if($errors->has('lastname')): ?>
            <span class="text-danger"><?php echo e($errors->first('lastname')); ?></span>
            <?php endif; ?>
            <br/>
            <div>
            <label>Email</label></br>
            <input type="text" name="email" id="email" value='' class="form-control">
            </div>
            <div class="row">
                <label>Mobile</label></br>
                <div class="col-md-6">
                <input type="text" name="mobile" id="mobile" value='' class="form-control">
                <?php if($errors->has('mobile')): ?>
                    <span class="text-danger"><?php echo e($errors->first('mobile')); ?></span>
                <?php endif; ?>
                </div>
                
                <div class="col-md-6" class="form-select">
                <label>Country</label></br>
                    <select name="country" id="country">
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="mb-3">
  <label for="address" class="form-label">Address</label>
  <textarea class="form-control" name="address" id="address" rows="3" cols="20"></textarea>
</div>

<div class="mb-3">
<label for="gender" class="form-label">Gender</label>
<input type="radio" name="gender" id="gender" value="M" class="form-check-input">Male
<input type="radio" name="gender" id="gender" value="F" class="form-check-input">Female
</div>

<div class="mb-3">
<label for="Hobby" class="form-label">Hobby</label>
<input type="checkbox" name="hobby[]" id="hobby[]" value="Dancing" class="form-check-input">Dancing
<input type="checkbox" name="hobby[]" id="hobby[]" value="Sports" class="form-check-input">Sports
<input type="checkbox" name="hobby[]" id="hobby[]" value="Swim" class="form-check-input">Swim
</div>

<div class="mb-3">
    <input type="file" name="image" id="image">
</div>
<?php if($errors->has('image')): ?>
    <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
<?php endif; ?>
      
<input type="submit" class="btn btn-primary" value="Save">
</form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('employee.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wagento/www/html/blog/resources/views/employee/create.blade.php ENDPATH**/ ?>