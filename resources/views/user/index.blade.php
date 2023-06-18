@extends('user.template')

@section('additional_styles')

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
@endsection

@section('content')
    
  <!-- Header-->
  <header class="bg-dark py-5" style="background-image: url(https://wallpaperaccess.com/full/930661.jpg);">
    <div class="container px-lg-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-lg-6">
          <div class="text-center my-5">
            <h1 class="display-5 fw-bolder text-white mb-2">Satukan Suara Selamatkan Bumi</h1>
            <p class="lead text-white-50 mb-4">"Menjaga dan melindungi bumi berarti menjaga diri sendiri sebagaimana
              manusia ditakdirkan tidak untuk merusak"</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
              <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#artikel">Ayo Mulai</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Edukasi section-->
  <section class="bg-light py-5 border-bottom" id="Edukasi">
    <div class="container px-5 my-5">
      <!-- Nested row for non-featured blog posts-->
      <div class="row" id="artikel">
        @if ($artikels)
            @foreach ($artikels as $artikel)
              <div class="col-lg-4">
                <!-- Blog post-->
                <div class="card mb-4">
                  <a href="#!"><img class="card-img-top" src="{{ asset('/storage/artikel/'.$artikel->image) }}"
                      alt="..." /></a>
                  <div class="card-body">
                    <div class="small text-muted">{{ $artikel->created_at->format('d F Y'); }}</div>
                    <h2 class="card-title h4">{{ $artikel->title }}</h2>
                    <p class="card-text">{{ $artikel->caption}}</p>
                    <a class="btn btn-primary" href="{{ route('edukasi.show', $artikel->id) }}">Lanjut Baca</a>
                  </div>
                </div>
              </div>
            @endforeach
        @endif
      </div>
    </div>
  </section>
  <!-- Galeri section-->
  <section class="py-5 border-bottom" id="Galeri">
    <div class="container px-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-6">
          <h2 class="font-weight-light">Mengabadikan Momen Bersama View dan Panorama Alam</h1>
        </div>
        <div class="col-lg-6">
          <p>"Jelajahi hutan pedalaman Indonesia untuk melihat dan mengenal lebih jauh keindahan flora dan fauna yang
            langka pada 5 pulau berbeda</p>
        </div>
      </div>
      <div class="row gx-5">
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
              <img
                src="https://images.unsplash.com/photo-1446329813274-7c9036bd9a1f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                class="d-block w-100 c-img" alt="Slide 1">
              <div class="carousel-caption top-0 mt-4">
                <p class="display-1 fw-bolder text-capitalize">let's raise awareness
                </p>
                <h1 class="mt-5 fs-3 text-uppercase">In every disaster, there is a valuable lesson</h1>
                <a class="btn btn-primary px-4 py-2 fs-5 mt-5" href="{{ route('galeri') }}">Jelajahi Lebih Banyak Foto</a>
              </div>
            </div>
            <div class="carousel-item c-item" data-bs-interval="10000">
              <img
                src="https://images.unsplash.com/photo-1683009427660-b38dea9e8488?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80"
                class="d-block w-100 c-img" alt="Slide 2">
              <div class="carousel-caption top-0 mt-4">
                <p class="display-1 fw-bolder text-capitalize">The forest is a nature reserve</p>
                <h1 class="text-uppercase fs-3 mt-5">Come join us in protecting nature</h1>
                <a class="btn btn-primary px-4 py-2 fs-5 mt-5" href="{{ route('galeri') }}">Jelajahi Lebih Banyak Foto</a>
              </div>
            </div>
            <div class="carousel-item c-item" data-bs-interval="10000">
              <img
                src="https://images.unsplash.com/photo-1492496913980-501348b61469?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80"
                class="d-block w-100 c-img" alt="Slide 3">
              <div class="carousel-caption top-0 mt-4">
                <p class="display-1 fw-bolder text-capitalize">Taking care of the environment</p>
                <h1 class="text-uppercase fs-3 mt-5"> Go go green</h1>
                <a class="btn btn-primary px-4 py-2 fs-5 mt-5" href="{{ route('galeri') }}">Jelajahi Lebih Banyak Foto</a>
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
      </div>
    </div>
  </section>
  <!-- Team section-->
  <section class="bg-light py-5 border-bottom" id="Team">
    <div class="container px-5 my-5 px-5">
      <div class="py-5 team3 bg-light">
        <div class="container">
          <div class="row justify-content-center mb-4">
            <div class="col-md-7 text-center">
              <h3 class="mb-3">Belajar dan Jelajahi alam bersama ditemani dengan komunitas peduli lingkungan yang berpendidikan</h3>
            </div>
          </div>
          <div class="row">
            <!-- column  -->
            <div class="col-lg-4 mb-4">
              <!-- Row -->
              <div class="row">
                <div class="col-md-12">
                  <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t1.jpg" alt="wrapkit"
                    class="img-fluid" />
                </div>
                <div class="col-md-12">
                  <div class="pt-2">
                    <h5 class="mt-4 font-weight-medium mb-0">Satrio Wicaksono</h5>
                    <h6 class="subtitle">Reviewer Aspirasi</h6>
                  </div>
                </div>
              </div>
              <!-- Row -->
            </div>
            <!-- column  -->
            <!-- column  -->
            <div class="col-lg-4 mb-4">
              <!-- Row -->
              <div class="row">
                <div class="col-md-12 pro-pic">
                  <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t2.jpg" alt="wrapkit"
                    class="img-fluid" />
                </div>
                <div class="col-md-12">
                  <div class="pt-2">
                    <h5 class="mt-4 font-weight-medium mb-0">Laode Fardhan</h5>
                    <h6 class="subtitle">Editor Artikel</h6>
                  </div>
                </div>
              </div>
              <!-- Row -->
            </div>
            <!-- column  -->
            <!-- column  -->
            <div class="col-lg-4 mb-4">
              <!-- Row -->
              <div class="row">
                <div class="col-md-12 pro-pic">
                  <img src="https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/team/t3.jpg" alt="wrapkit"
                    class="img-fluid" />
                </div>
                <div class="col-md-12">
                  <div class="pt-2">
                    <h5 class="mt-4 font-weight-medium mb-0">Odi Parody</h5>
                    <h6 class="subtitle">Fotographer & Videographer</h6>
                  </div>
                </div>
              </div>
              <!-- Row -->
            </div>
            <!-- column  -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5 border-bottom" id=""
    style="background-image: url(https://wallpapercrafter.com/desktop1/630619-nature-pier-lake-mountain-calm-stars-night-2K.jpg);">
    <div class="container px-5">
      <div class="row gx-5 align-items-center justify-content-center">
        <div class="col-lg-12">
          <div class="text-center my-5">
            <h1 class="display-5 fw-bolder text-white mb-2">Mari Bergabung</h1>
            <h1 class="display-5 fw-bolder text-white mb-2">Bersama Kami</h1>
            <p class="lead text-white-50 mb-4">"Team kami akan menyortir melewati beberapa tahap, dan hanya akan
              beberapa
              yang memperoleh kesempatan untuk mengaspirasikannya.
              Pastikan anda adalah salah satunya!"</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
              <a class="btn btn-outline-light btn-lg px-4" href="#!">Tunjukan aspirasimu</a>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="text-center my-5">
            <img src="{{ asset('assets/disaster-awareness-low-resolution-logo-color-on-transparent-background 1.png') }}" alt=""
              srcset="">
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>

@endsection

@section('additional_scripts')

  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  <script src="https://kit.fontawesome.com/129b446e97.js" crossorigin="anonymous"></script>
    
@endsection