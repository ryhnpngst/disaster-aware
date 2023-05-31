@extends('admin.template')

@section('title', 'Detail Artikel<')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Detail Artikel</h1>
        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <img src="{{ asset('storage/artikel/'.$artikel->image) }}" class="w-100 rounded" style="height: 500px">
                    <hr>
                    <h4>{{ $artikel->title }}</h4>
                    <h6>{{ $artikel->author }}</h6>
                    <p class="tmt-3">
                        {!! $artikel->caption !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection