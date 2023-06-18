<?php $__env->startSection('additional_styles'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Artikel'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <?php if(session('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Artikel</h1>

        <!-- Add Button -->
        <a href="<?php echo e(route('admin.artikel.create')); ?>" class="btn btn-primary mb-4">
            <span class="text">Tambah Data</span>
        </a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Judul Artikel</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($artikel->title); ?></td>
                                    <td class="text-center">
                                        <img src="<?php echo e(asset('/storage/artikel/'.$artikel->image)); ?>" alt="" width="100px">
                                    </td>
                                    <td><?php echo e($artikel->author); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.artikel.show', $artikel->id)); ?>" class="p-3">
                                            <i class="fas fa-eye" style="color: #2E59D9"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.artikel.edit', $artikel->id)); ?>" class="p-3">
                                            <i class="fas fa-edit" style="color: #F4B619;"></i>
                                        </a>
                                        <button type="button" class="fas fa-trash-alt" style="color: #E02D1B; border: none; background: none;" data-toggle="modal" data-target="#konfirmasiModalHapus"></button>
                                    </td>
                                </tr>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="konfirmasiModalHapus" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalHapusLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus artikel ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form action="<?php echo e(route('admin.artikel.destroy', $artikel->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger">Ya</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="alert alert-danger">
                                    Data Artikel Belum Tersedia!
                                </div>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional_scripts'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
    
    <script>
        // Ambil elemen pesan flash
        var flashMessage = document.querySelector('.alert');
    
        // Cek apakah elemen pesan flash ada
        if (flashMessage) {
            // Set timeout untuk menghapus pesan flash setelah 3 detik (3000 milidetik)
            setTimeout(function() {
                flashMessage.remove();
            }, 3000);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\disaster-aware\resources\views/admin/artikel/index.blade.php ENDPATH**/ ?>