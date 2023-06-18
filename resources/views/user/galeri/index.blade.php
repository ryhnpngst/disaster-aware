@extends('user.template')

@section('additional_styles')
    
    <style>
        .c-item {
            height: 480px;
        }

        .c-img {
            height: 100%;
            object-fit: cover;
            filter: brightness(0.6);
        }
    </style>

@endsection

@section('content')

    <!-- carousel-->
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active c-item" data-bs-interval="10000">
                <img src="https://images.unsplash.com/photo-1446329813274-7c9036bd9a1f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    class="d-block w-100 c-img" alt="Slide 1">
                <div class="carousel-caption top-0 mt-4">
                    <p class="display-1 fw-bolder text-capitalize">let's raise awareness of the importance of the environment</p>
                    <h1 class="mt-5 fs-3 text-uppercase">In every disaster, there is a valuable lesson</h1>
                </div>
            </div>
            <div class="carousel-item c-item" data-bs-interval="10000">
                <img src="https://images.unsplash.com/photo-1683009427660-b38dea9e8488?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                    class="d-block w-100 c-img" alt="Slide 2">
                <div class="carousel-caption top-0 mt-4">
                    <p class="display-1 fw-bolder text-capitalize">The forest is a nature reserve</p>
                    <h1 class="text-uppercase fs-3 mt-5">Come join us in protecting nature</h1>
                </div>
            </div>
            <div class="carousel-item c-item" data-bs-interval="10000">
                <img src="https://images.unsplash.com/photo-1492496913980-501348b61469?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80"
                    class="d-block w-100 c-img" alt="Slide 3">
                <div class="carousel-caption top-0 mt-4">
                    <p class="display-1 fw-bolder text-capitalize">Taking care of the environment is the key</p>
                    <h1 class="text-uppercase fs-3 mt-5"> Go go green</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @forelse ($galeris as $galeri)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('storage/galeri/'.$galeri->image)  }}" alt="{{ $galeri->title }}" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{ $galeri->title }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>

@endsection