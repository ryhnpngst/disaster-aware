<?php $__env->startSection('title', 'Detail Galeri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Detail Galeri</h1>

        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <img src="<?php echo e(asset('storage/galeri/'.$galeri->image)); ?>" class="w-100 rounded" style="height: 500px">
                    <hr>
                    <h4><?php echo e($galeri->title); ?></h4>
                    <p class="tmt-3">
                        <?php echo $galeri->caption; ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\disaster-aware\resources\views/admin/galeri/galeri-show.blade.php ENDPATH**/ ?>