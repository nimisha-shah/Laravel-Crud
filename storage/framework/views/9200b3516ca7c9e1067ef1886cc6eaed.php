<?php $__env->startSection('content'); ?>
<div class="card">
        <div class="card-header">
            <h1>Employee List</h1>
            <a href="<?php echo e(url('employee/create')); ?>" class="btn btn-primary">Add</a>
        </div>

       <?php if(Session::has('message')): ?>
       <span class="alert alert-info"><?php echo e(Session::get('message')); ?></span>
       <?php endif; ?>

        <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                    <thead>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Action</th>

                    </thead>
                    </tr>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>                       
                    <td><?php echo e($emp->firstname." ".$emp->lastname); ?></td>
                    <td><?php echo e($emp->mobile); ?></td>
                    <td><?php echo e($emp->email); ?></td>
                    <td>
                    
                        <form action="<?php echo e(route('employee.destroy',$emp->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>                        
                        <a href="<?php echo e(url('employee/'.$emp->id.'/edit')); ?>" class="btn btn-primary">Edit</a>

                        <a href="<?php echo e(route('employee.show',$emp->id)); ?>" class="btn btn-warning">View</a>

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
        </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('employee.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wagento/www/html/blog/resources/views/employee/index.blade.php ENDPATH**/ ?>