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
                            <li class="breadcrumb-item active" aria-current="page">{{ $room->name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" data-toggle="modal" data-target="#createNew" class="btn btn-sm btn-neutral">Project</a>
                    <a href="#" data-toggle="modal" data-target="#createNew" class="btn btn-sm btn-neutral">Discussion</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
<!-- Page Content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="list-group">
                @foreach ($data as $row)
                    <a href="{{ route('student.topic.detail', [$room->id, $row->id]) }}" class="list-group-item list-group-item-action flex-column align-items-start ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $row->title }}</h5>
                            <small>{{ $row->created_at->diffForHumans() }} by {{ $row->user->name }}</small>
                        </div>
                        <small>{{ $row->type->name }}
                            @if($row->type->name == 'assignment')
                            <strong>Will be end in {{ $row->deadline }}</strong>
                            @endif
                        </small>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>

@endsection
