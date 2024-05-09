<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <h1>Edit Employee</h1>
        </div>
        <div class="float-end">
         <a href="<?php echo e(route('employee.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
         </div>
    </div>

    <div>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>
    </div>

    <div class="card-body">
        <form class="" action="<?php echo e(url('employee',$employee->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
            <div>
            <label>First Name</label></br>
            <input type="text" name="firstname" id="firstname" value='<?php echo e($employee->firstname); ?>' class="form-control">
            <?php if($errors->has('firstname')): ?>
                <span class="text-danger"><?php echo e($errors->first('firstname')); ?></span>
            <?php endif; ?>
            </div>
            <br/>
            <div>
            <label>Last Name</label></br>
            <input type="text" name="lastname" id="lastname" value='<?php echo e($employee->lastname); ?>' class="form-control">
            </div>
            <?php if($errors->has('lastname')): ?>
            <span class="text-danger"><?php echo e($errors->first('lastname')); ?></span>
            <?php endif; ?>
            <br/>
            <div>
            <label>Email</label></br>
            <input type="text" name="email" id="email" value='<?php echo e($employee->email); ?>' class="form-control">
            </div>
            <div class="row">
                <label>Mobile</label></br>
                <div class="col-md-6">
                <input type="text" name="mobile" id="mobile" value='<?php echo e($employee->mobile); ?>' class="form-control">
                <?php if($errors->has('mobile')): ?>
                    <span class="text-danger"><?php echo e($errors->first('mobile')); ?></span>
                <?php endif; ?>
                </div>
                
                <div class="col-md-6" class="form-select">
                <label>Country</label></br>
                    <select name="country" id="country">
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"  <?php echo e($employee->country == $country->id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="mb-3">
  <label for="address" class="form-label">Address</label>
  <textarea class="form-control" name="address" id="address" rows="3" cols="20"><?php echo e($employee->address); ?></textarea>
</div>

<div class="mb-3">
<label for="gender" class="form-label">Gender</label>
<input type="radio" name="gender" id="gender" value="M" class="form-check-input" <?php echo e($employee->gender =='M' ? 'checked' : ''); ?>>Male
<input type="radio" name="gender" id="gender" value="F" class="form-check-input" <?php echo e($employee->gender =='F' ? 'checked' : ''); ?>>Female
</div>

<div class="mb-3">
<label for="Hobby" class="form-label">Hobby</label>
<input type="checkbox" name="hobby[]" id="hobby[]" value="Dancing" <?php echo e(in_array('Dancing', $exhobby) ? 'checked' : ''); ?> class="form-check-input">Dancing
<input type="checkbox" name="hobby[]" id="hobby[]" value="Sports" <?php echo e(in_array('Sports', $exhobby) ? 'checked' : ''); ?> class="form-check-input">Sports
<input type="checkbox" name="hobby[]" id="hobby[]" value="Swim" <?php echo e(in_array('Swim', $exhobby) ? 'checked' : ''); ?> class="form-check-input">Swim
</div>

<div class="mb-3">
    <input type="file" name="image" id="image">
    <?php if($employee->image): ?>
    Photo Preview:
    <img src="<?php echo e("/uploads/employee/".$employee->image); ?>" width="200" height="200">
    <?php endif; ?>
</div>

      
<input type="submit" class="btn btn-primary" value="Save">
</form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('employee.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wagento/www/html/blog/resources/views/employee/edit.blade.php ENDPATH**/ ?>