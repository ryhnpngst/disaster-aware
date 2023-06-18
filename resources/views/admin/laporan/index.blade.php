@extends('admin.template')

@section('additional_styles')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('title', 'Daftar Laporan')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Laporan</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Pengguna</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Judul Laporan</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Validasi</th>
                                <th class="text-center">Status Laporan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)
                                <tr>
                                    <td>{{ $report->title }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/laporan/'.$report->image) }}" alt="" width="100px">
                                    </td>
                                    <td>
                                        @if ($report->is_validated == 0)
                                            Laporan Belum Divalidasi
                                        @else
                                            Laporan Sudah Divalidasi
                                        @endif
                                    </td>
                                    <td>{{ $report->status }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.laporan.show', $report->id) }}" class="p-3">
                                            <i class="fas fa-eye" style="color: #2E59D9"></i>
                                        </a>
                                        <button type="button" class="fas fa-trash-alt" style="color: #E02D1B; border: none; background: none;" data-toggle="modal" data-target="#konfirmasiModalHapus"
                                            @if ($report->status !== 'Selesai Diproses')
                                                disabled
                                            @endif
                                        ></button>
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
                                                    Apakah Anda yakin ingin menghapus laporan ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form action="{{ route('admin.laporan.destroy', $report->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Ya</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            @empty
                                <div class="alert alert-danger">
                                    Data Laporan Belum Tersedia!
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('additional_scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    
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
@endsection