<?php $__env->startSection('content'); ?>



    <div class="card">
        <div class="card-header">
           Crud ajax in laravel
           <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Create New Product</a>
           <button type="button" class="btn btn-success btn-sm float-end" data-toggle="modal" data-target="#addModal">Add New</button>
        </div>

        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Manufacture year</th>
                        <th>Engine Capacity</th>
                        <th>Fuel Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($allcars) > 0): ?>
                    <?php $__currentLoopData = $allcars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($car->id); ?></td>
                        <td><?php echo e($car->name); ?></td>
                        <td><?php echo e($car->manufacture_year); ?></td>
                        <td><?php echo e($car->engine_capacity); ?></td>
                        <td><?php echo e($car->fuel_type); ?></td>
                        <td>
                          <a href="" class="btn button-primary">View</a>
                          <a href="">Edit</a>
                          <a href="">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">
                            No data found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!---add car modal --->
    <!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Car</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="carForm" name="carForm" class="form-horizontal">
                   <input type="hidden" name="carid" id="carid">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>       
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Manufacture Year</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="manufacture_year" name="manufacture_year" placeholder="Enter Manufacture Year" value="" required="">                           
                        </div>
                    </div>   
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Engine Capacity</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="engine_capacity" name="engine_capacity" placeholder="Enter Engine Capacity" value="" required="">                           
                        </div>
                    </div>   
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Fuel Type</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="fuel_type" name="fuel_type" placeholder="Enter Fuel Type" value="" required="">                           
                        </div>
                    </div>      
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                    </div>
                </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#createNewProduct').click(function () {
        $('#addModal').modal('show');
    });

    $('#saveBtn').click(function(e){
        //Ajax request

        e.preventDefault();
        $(this).html('Sending....');

        let formdata = $(this).serialize();
        $.ajax({
            data:formdata,
            url: "<?php echo e(route('addCar')); ?>",
            type: "POST",         
            dataType: 'json',
            beforeSend:function(){
                $('#saveBtn').prop('disabled',true);
            },
            complete:function(){
                $('#saveBtn').prop('disabled',false);
            },
            success: function(data){
                alert("test");
            },
            error:function(data){

            }
        });

    });


   });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('car.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wagento/www/html/blog/resources/views/car/show.blade.php ENDPATH**/ ?>