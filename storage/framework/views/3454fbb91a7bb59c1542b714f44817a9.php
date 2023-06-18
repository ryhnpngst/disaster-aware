<?php $__env->startSection('title', 'Edit Laporan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Edit Laporan</h1>

        <div class="row">
            <div class="col-8">
                <div class="card shadow mb-4">
                    <form action="<?php echo e(route('admin.laporan.update', $report->id)); ?>" method="POST" enctype="multipart/form-data" class="p-3">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
            
                        <div class="mb-3">
                          <label for="image" class="form-label">Foto</label>
                          <input type="file" class="form-control" id="image" name="image">
            
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                          <label for="title" class="form-label">Judul Laporan</label>
                          <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title', $report->title)); ?>">
                        </div>
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="mb-3">
                            <label for="content" class="form-label">Detail Laporan</label>
                            <textarea class="form-control" id="content" rows="3" name="content"><?php echo e(old('content', $report->content)); ?></textarea>
                          </div>
                          <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasiModalUpdate">Update</button>
                        <button type="reset" class="btn btn-warning">Reset</button>

                        <!-- Modal Konfirmasi Update -->
                        <div class="modal fade" id="konfirmasiModalUpdate" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalUpdateLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menyimpan update laporan ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Ya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-warning px-5" data-toggle="modal" data-target="#konfirmasiModalValidasi"
                    <?php if($report->status == 'Sedang Diproses' || $report->status == 'Selesai Diproses'): ?>
                        disabled
                    <?php endif; ?>
                >Validasi</button>

                <button type="button" class="btn btn-success px-5" data-toggle="modal" data-target="#konfirmasiModalSelesai"
                    <?php if($report->status == 'Belum Diproses' || $report->status == 'Selesai Diproses'): ?>
                        disabled
                    <?php endif; ?>
                >Selesai</button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Validasi -->
    <div class="modal fade" id="konfirmasiModalValidasi" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalValidasiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Validasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin memvalidasi laporan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="<?php echo e(route('admin.laporan.validasi', $report->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
    
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Selesai -->
    <div class="modal fade" id="konfirmasiModalSelesai" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalSelesaiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Selesai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menyelesaikan laporan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="<?php echo e(route('admin.laporan.selesai', $report->id)); ?>" method="POST" class="mt-2">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\disaster-aware\resources\views/admin/laporan/laporan-edit.blade.php ENDPATH**/ ?>