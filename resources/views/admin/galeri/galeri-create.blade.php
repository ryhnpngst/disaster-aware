@extends('admin.template')

@section('title', 'Tambah Galeri')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Tambah Galeri</h1>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="p-3">
                        @csrf
            
                        <div class="mb-3">
                          <label for="image" class="form-label">Foto</label>
                          <input type="file" class="form-control" id="image" name="image">
            
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                          <label for="title" class="form-label">Judul Galeri</label>
                          <input type="text" class="form-control" id="title" name="title">
                        </div>
                        @error('title')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label for="caption" class="form-label">Caption Galeri</label>
                            <textarea class="form-control" id="caption" rows="3" name="caption"></textarea>
                          </div>
                          @error('caption')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasiModalSimpan">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>

                            <!-- Modal Konfirmasi Simpan -->
                            <div class="modal fade" id="konfirmasiModalSimpan" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalSimpanLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Simpan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menyimpan galeri ini?
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
        </div>
    </div>
@endsection