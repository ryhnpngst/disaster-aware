@extends('user.template')

@section('content')

    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('storage/artikel/'.$artikel->image) }}" alt="..." /></figure>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Tanggal terbit {{ $artikelDate }} </div>
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $artikel->title }}</h1>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{!! $artikel->content !!}</p>
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
                        <p><small>{{ $artikel->author }}</small></p>
                        <h6>Tanggal Terbit</h6>
                        <p><small>{{ $artikelDate }}</small></p>
                        <h6>Lokasi</h6>
                        <p><i class="fa-solid fa-location-dot"></i>{{ $artikel->location }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('additional_scripts')

    <!-- font Awsesome -->
    <script src="https://kit.fontawesome.com/129b446e97.js" crossorigin="anonymous"></script>
    
@endsection