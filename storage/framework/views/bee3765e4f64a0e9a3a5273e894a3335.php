<?php $__env->startSection('content'); ?>

    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-5">
                <h1 class="font-weight-light">Suaka Margasatwa</h1>
                <h4 class="font-weight-light">Terus Selamatkan Semua Nyawa</h4>
                <p>Lindungi hewan dari perburuan liar. Lindungi masa depan keanekaragaman hewan sebagai makhluk hidup di bumi.</p>
            </div>
        </div>

        <?php if($artikelFirst): ?>
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body">
                    <!-- Heading Row-->
                    <div class="row gx-4 gx-lg-5 align-items-center my-5">
                        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0"
                                src="<?php echo e(asset('/storage/artikel/'.$artikelFirst->image)); ?>" alt="<?php echo e($artikelFirst->title); ?>" /></div>
                        <div class="col-lg-5">
                            <h1 class="font-weight-light"><?php echo e($artikelFirst->title); ?></h1>
                            <p><?php echo e($artikelFirst->caption); ?></p>
                            <a class="btn btn-primary" href="<?php echo e(route('edukasi.show', $artikelFirst->id)); ?>">Lanjut Baca</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Call to Action-->
        <?php if($artikelSecond): ?>
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body">
                    <!-- Heading Row-->
                    <div class="row gx-4 gx-lg-5 align-items-center my-5">
                        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0"
                                src="<?php echo e(asset('/storage/artikel/'.$artikelSecond->image)); ?>" alt="<?php echo e($artikelSecond->title); ?>" /></div>
                        <div class="col-lg-5">
                            <h1 class="font-weight-light"><?php echo e($artikelSecond->title); ?></h1>
                            <p><?php echo e($artikelSecond->caption); ?></p>
                            <a class="btn btn-primary" href="<?php echo e(route('edukasi.show', $artikelSecond->id)); ?>">Lanjut Baca</a>
                        </div>
                    </div>

                    <?php if($artikelThird): ?>
                        <div class="row gx-4 gx-lg-5 align-items-center my-5">
                            <div class="col-lg-5">
                                <h1 class="font-weight-light"><?php echo e($artikelThird->title); ?></h1>
                                <p><?php echo e($artikelThird->caption); ?></p>
                                <a class="btn btn-primary" href="<?php echo e(route('edukasi.show', $artikelThird->id)); ?>">Lanjut Baca</a>
                            </div>
                            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0"
                                    src="<?php echo e(asset('/storage/artikel/'.$artikelThird->image)); ?>" alt="<?php echo e($artikelThird->title); ?>" /></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>  
        <?php endif; ?>

        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7">
                <h1>Informasi Lengkap Mengenai Flora dan Fauna</h1>
            </div>
            <div class="col-lg-5">
                <p>Hutan hujan dataran rendah Borneo adalah ekoregion dalam bioma hutan berdaun lebar lembab tropis dan subtropis besar.</p>
            </div>
        </div>
        <!-- Content Row-->

        <?php if($artikels): ?>
            <?php $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <!--image-->
                            <img class="card-img-top" src="<?php echo e(asset('/storage/artikel/'.$artikel->image)); ?>" alt="<?php echo e($artikel->title); ?>" />
                            <div class="card-body">
                                <h2 class="card-title"><?php echo e($artikel->title); ?></h2>
                                <p class="card-text"><?php echo e($artikel->caption); ?></p>
                            </div>
                            <div class="card-footer"><a class="btn btn-primary btn-sm" href="<?php echo e(route('edukasi.show', $artikel->id)); ?>">Lanjut Baca</a></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\disaster-aware\resources\views/user/edukasi/index.blade.php ENDPATH**/ ?>