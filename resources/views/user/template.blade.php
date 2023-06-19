<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Disaster Awareness</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/Frame.png') }}"/>
    <!-- Boostrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    @yield('additional_styles')
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg">
        <div class="container px-5">
            <img src="{{ asset('assets/Frame.png') }}" alt="">
            <a class="navbar-brand" href="{{ route('index') }}">Disaster Awareness</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-5"><a class="nav-link{{ request()->routeIs('index') ? ' active' : '' }}" aria-current="page" href="{{ route('index') }}">Beranda</a></li>
                    <li class="nav-item mx-5"><a class="nav-link{{ request()->routeIs('edukasi.index') ? ' active' : '' }}" href="{{ route('edukasi.index') }}">Edukasi</a></li>
                    <li class="nav-item mx-5"><a class="nav-link{{ request()->routeIs('galeri') ? ' active' : '' }}" href="{{ route('galeri') }}">Galeri</a></li>
                    <li class="nav-item mx-5"><a class="nav-link{{ request()->routeIs('laporan.index') ? ' active' : '' }}" href="{{ route('laporan.index') }}">Aspirasi</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Disaster Awareness 2023</p>
        </div>
    </footer>
    
    <!-- Boostrap5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $message }}',
            })
        </script>
    @endif

    @if(Session::has('success') && !request()->isMethod('post'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get('success') }}',
            })
        </script>
        @php
            Session::forget('success');
        @endphp
    @endif

    @yield('additional_scripts')

</body>
