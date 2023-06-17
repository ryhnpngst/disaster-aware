@extends('user.template')

@section('content')

    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-5">
                <h1 class="font-weight-light">Business Name or Tagline</h1>
                <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it,
                    but it makes a great use of the standard Bootstrap core components. Feel free to use this template
                    for any project you want!</p>
            </div>
        </div>

        @if ($artikelFirst)
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body">
                    <!-- Heading Row-->
                    <div class="row gx-4 gx-lg-5 align-items-center my-5">
                        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0"
                                src="{{ asset('/storage/artikel/'.$artikelFirst->image) }}" alt="{{ $artikelFirst->title }}" /></div>
                        <div class="col-lg-5">
                            <h1 class="font-weight-light">{{ $artikelFirst->title }}</h1>
                            <p>{{ $artikelFirst->caption }}</p>
                            <a class="btn btn-primary" href="{{ route('edukasi.show', $artikelFirst->id) }}">Call to Action!</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Call to Action-->
        @if ($artikelSecond)
            <div class="card text-white bg-secondary my-5 py-4 text-center">
                <div class="card-body">
                    <!-- Heading Row-->
                    <div class="row gx-4 gx-lg-5 align-items-center my-5">
                        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0"
                                src="{{ asset('/storage/artikel/'.$artikelSecond->image) }}" alt="{{ $artikelSecond->title }}" /></div>
                        <div class="col-lg-5">
                            <h1 class="font-weight-light">{{ $artikelSecond->title }}</h1>
                            <p>{{ $artikelSecond->caption }}</p>
                            <a class="btn btn-primary" href="{{ route('edukasi.show', $artikelSecond->id) }}">Call to Action!</a>
                        </div>
                    </div>

                    @if ($artikelThird)
                        <div class="row gx-4 gx-lg-5 align-items-center my-5">
                            <div class="col-lg-5">
                                <h1 class="font-weight-light">{{ $artikelThird->title }}</h1>
                                <p>{{ $artikelThird->caption }}</p>
                                <a class="btn btn-primary" href="{{ route('edukasi.show', $artikelThird->id) }}">Call to Action!</a>
                            </div>
                            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0"
                                    src="{{ asset('/storage/artikel/'.$artikelThird->image) }}" alt="{{ $artikelThird->title }}" /></div>
                        </div>
                    @endif
                </div>
            </div>  
        @endif

        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7">
                <h1>uwu</h1>
            </div>
            <div class="col-lg-5">
                <p>This is a template that is great for small businesses. It doesn't have too much fancy flare
                    to it, but it makes a great use of the standard Bootstrap core components. Feel free to use
                    this template for any project you want!</p>
                <a class="btn btn-primary" href="#!">Call to Action!</a>
            </div>
        </div>
        <!-- Content Row-->

        @if ($artikels)
            @foreach ($artikels as $artikel)
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <!--image-->
                            <img class="card-img-top" src="{{ asset('/storage/artikel/'.$artikel->image) }}" alt="{{ $artikel->title }}" />
                            <div class="card-body">
                                <h2 class="card-title">{{ $artikel->title }}</h2>
                                <p class="card-text">{{ $artikel->caption }}</p>
                            </div>
                            <div class="card-footer"><a class="btn btn-primary btn-sm" href="{{ route('edukasi.show', $artikel->id) }}">More Info</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
    
@endsection