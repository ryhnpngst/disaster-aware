@extends('admin.template')

@section('title', 'Edit Laporan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Detail Laporan</h1>

        <div class="row">
            <div class="card shadow mb-4 mr-4">
                <div class="card-body">
                    <img src="{{ asset('storage/laporan/'.$report->image) }}" class="w-100 rounded" style="height: 500px">
                    <hr>
                    <h4>{{ $report->title }}</h4>
                    <p class="tmt-3">
                        {!! $report->content !!}
                    </p>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-warning px-5" data-toggle="modal" data-target="#konfirmasiModalValidasi"
                    @if ($report->status == 'Sedang Diproses' || $report->status == 'Selesai Diproses')
                        disabled
                    @endif
                >Validasi</button>

                <button type="button" class="btn btn-success px-5" data-toggle="modal" data-target="#konfirmasiModalSelesai"
                    @if ($report->status == 'Belum Diproses' || $report->status == 'Selesai Diproses')
                        disabled
                    @endif
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
                    <form action="{{ route('admin.laporan.validasi', $report->id) }}" method="POST">
                        @csrf
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
                    <form action="{{ route('admin.laporan.selesai', $report->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection