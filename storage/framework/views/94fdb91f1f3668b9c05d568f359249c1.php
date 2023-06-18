<?php $__env->startSection('title', 'Detail Artikel<'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Detail Artikel</h1>
        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <img src="<?php echo e(asset('storage/artikel/'.$artikel->image)); ?>" class="w-100 rounded" style="height: 500px">
                    <hr>
                    <h4><?php echo e($artikel->title); ?></h4>
                    <h6><?php echo e($artikel->author); ?></h6>
                    <p class="tmt-3">
                        <?php echo $artikel->caption; ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\disaster-aware\resources\views/admin/artikel/artikel-show.blade.php ENDPATH**/ ?>