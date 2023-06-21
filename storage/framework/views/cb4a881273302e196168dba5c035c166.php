

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"> Dashboard</h1>

        <form action="<?php echo e(url('/dashboard/update-user').'/'.base64_encode($data_user->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-xl-6 col-xxl-5 ">
                    <label class="form-label" for="first_name">ชื่อ</label> 
                    <input type="text" id="first_name"  name="first_name" class="form-control" value="<?php echo e($data_user->first_name); ?>" />
                </div>
                <div class="col-xl-6 col-xxl-5 ">
                    <label class="form-label" for="last_name">นามสกุล</label> 
                    <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo e($data_user->last_name); ?>" />
                </div>
                <div class="col-xl-6 col-xxl-5">
                    <label class="form-label" for="position_id">ตำแหน่ง</label> 
                    <select class="form-select mb-3" id="position_id" name="position_id">
                        <option >เลือกตำแหน่ง</option>
                        <?php $__currentLoopData = $data_position; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val_position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($val_position->id); ?>" <?php echo e($val_position->id == $data_user->position_id ? "selected":""); ?>><?php echo e($val_position->position_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary text-sm">บันทึก</button>
            <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-sm btn-warning text-sm">กลับ</a>
        </form>
    </div>


   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascipt'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/dashboard/dashboardEdit.blade.php ENDPATH**/ ?>