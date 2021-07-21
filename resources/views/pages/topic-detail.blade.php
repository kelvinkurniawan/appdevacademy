@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="header bg-primary pb-6 pt-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Classes</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Rooms</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data->room->name }}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($data->title, 5, $end='...') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<!-- Page Content -->
<div class="container-fluid mt--6">
    <div class="row">
        @if ($data->embed != null)
            <div class="col-md-6">
        @else
            <div class="col-md-8">
        @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $data->created_at->diffForHumans() }} by {{ $data->user->name }} </h6>
                    <p class="card-text">{!! $data->body !!}</p>
                </div>
            </div>
        </div>
        @if ($data->embed != null)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->title }}</h5>
                        {!! convertYoutube($data->embed->url) !!}
                    </div>
                </div>
            </div>
        @endif
    </div>

    @include('layouts.footers.auth')
</div>

@endsection
