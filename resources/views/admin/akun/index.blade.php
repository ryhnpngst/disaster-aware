@extends('admin.template')

@section('title', 'Daftar Akun')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Daftar Akun</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        @if(Auth::user()->role === 'admin')
                                            <button type="button" class="fas fa-trash-alt" style="color: #E02D1B; border: none; background: none;" data-toggle="modal" data-target="#konfirmasiModalHapus-{{ $user->id }}"></button>
                                        @else
                                            <button type="button" class="fas fa-trash-alt" style="color: #E02D1B; border: none; background: none;" data-toggle="modal" data-target="#konfirmasiModalHapus" disabled></button>
                                        @endif
                                    </td>
                                </tr>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="konfirmasiModalHapus-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalHapusLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus akun ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form action="{{ route('admin.akun.destroy', $user->id) }}" method="POST">
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
                                    Data Akun Belum Tersedia!
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
