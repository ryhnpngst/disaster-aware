<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/desain.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito Sans';
            background-color: #383538;
            background-blend-mode: multiply;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
    <title>Disater Awareness</title>
</head>

<body>
    <div class="bg-light container-aspiration">

        <form action="{{ route('laporan.store') }}" class="container-form" enctype="multipart/form-data" method="POST">
            <h1>Yuk Tuliskan Aspirasimu!</h1>
            <p>aspirasi dari kamu sangat berharga untuk kami</p>
            @csrf
            <div class="mb-3">
                <label class="form-label" for="image">Foto</label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="title">Judul Aspirasi</label>
                <input class="form-control" id="title" name="title" type="text" placeholder="Judul Aspirasi"/>
                @error('title')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="content">Aspirasi Mu</label>
                <textarea class="form-control" id="content" name="content" type="text" placeholder="Aspirasi Mu" style="height: 10rem;"></textarea>
                @error('content')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="d-grid">
                <button class="btn btn-dark btn-lg" type="button" id="btnKonfirmasiSimpan">Kirimkan Aspirasimu!</button>
            </div>

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
                            Apakah Anda yakin ingin mengirimkan aspirasi ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Ya</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <div class="image-container">
            <img src="{{ asset('assets/massage-box.png') }}" alt="">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        document.getElementById('btnKonfirmasiSimpan').addEventListener('click', function() {
            var modal = new bootstrap.Modal(document.getElementById('konfirmasiModalSimpan'));
            modal.show();
        });
    </script>
</body>

</html>
