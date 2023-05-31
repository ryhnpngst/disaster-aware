@extends('admin.template')

@section('title', 'Detail Laporan')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Detail Laporan</h1>

        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <img src="{{ asset('storage/laporan/'.$report->image) }}" class="w-100 rounded" style="height: 500px">
                    <hr>
                    <h4>{{ $report->title }}</h4>
                    <p class="tmt-3">
                        {!! $report->content !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection