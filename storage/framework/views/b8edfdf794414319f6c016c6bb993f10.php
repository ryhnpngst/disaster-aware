<?php $__env->startSection('content'); ?>

    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo e(asset('storage/artikel/'.$artikel->image)); ?>" alt="..." /></figure>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Tanggal terbit <?php echo e($artikelDate); ?> </div>
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1"><?php echo e($artikel->title); ?></h1>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><?php echo $artikel->content; ?></p>
                    </section>
                </article>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Keterangan</div>
                    <div class="card-body">
                        <h6>Penulis</h6>
                        <p><small><?php echo e($artikel->author); ?></small></p>
                        <h6>Tanggal Terbit</h6>
                        <p><small><?php echo e($artikelDate); ?></small></p>
                        <h6>Lokasi</h6>
                        <p><i class="fa-solid fa-location-dot"></i><?php echo e($artikel->location); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional_scripts'); ?>

    <!-- font Awsesome -->
    <script src="https://kit.fontawesome.com/129b446e97.js" crossorigin="anonymous"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\disaster-aware\resources\views/user/edukasi/edukasi-detail.blade.php ENDPATH**/ ?>