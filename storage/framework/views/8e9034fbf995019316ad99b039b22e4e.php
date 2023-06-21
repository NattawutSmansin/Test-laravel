

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"> Dashboard</h1>

        <div class="row">
            <div class="col-xl-12 col-xxl-5 d-flex">
                <div class="table-responsive w-100">
                    <table class="table table-bordered table-hover">
                        <thead class="text-center">
                            <th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>เวลาใช้งานล่าสุด</th>
                            <th>เครื่องมือ</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center text-sm"><?php echo e($key+1); ?></td>
                                    <td class="text-sm"><?php echo e($val_user->first_name); ?></td>
                                    <td class="text-sm"><?php echo e($val_user->last_name); ?></td>
                                    <td class="text-sm"><?php echo e($val_user->ORMPosition == null? 'ยังไม่พบข้อมูลตำแหน่ง':$val_user->ORMPosition->position_name); ?></td>
                                    <td class="text-center text-sm"><?php echo e($val_user->last_login_at != NULL ? date('d-m-Y H:i:s', strtotime($val_user->last_login_at )) : 'ยังไม่ได้ลงชื่อใช้งาน'); ?></td>
                                    <td class="text-center text-sm">
                                        <a href="<?php echo e(url('/dashboard').'/'.base64_encode($val_user->id)); ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                        <a href="<?php echo e(url('/dashboard/delete-user').'/'.base64_encode($val_user->id)); ?>" class="btn round btn-danger btn-sm">ลบ</a>
                                    </td>

                                </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>


   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascipt'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.templateAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/dashboard/dashboardIndex.blade.php ENDPATH**/ ?>