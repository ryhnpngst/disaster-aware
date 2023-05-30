@extends('admin.template')

@section('title', 'Detail Galeri')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Detail Galeri</h1>

        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <img src="{{ asset('storage/galeri/'.$galeri->image) }}" class="w-100 rounded" style="height: 500px">
                    <hr>
                    <h4>{{ $galeri->title }}</h4>
                    <p class="tmt-3">
                        {!! $galeri->caption !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection